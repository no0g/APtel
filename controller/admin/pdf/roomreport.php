<?php
    session_start();
    if($_SESSION['status']!="admin"){
    header("location:../../../admin/index.php?message=not_login");
    } else {
        require_once  '../../../vendor/autoload.php';
        $mpdf = new \Mpdf\Mpdf();
        require_once '../../../config/config.php';
        $email = $_SESSION['email'];
        $id = $_GET['id'];
        $check = $mysqli->prepare("SELECT room.id, room.name,roomtype.name from room join roomtype on roomtype.id = room.type");
        
        $check->execute();
        $check->store_result();
        $check->bind_result($id,$roomname,$roomtype);
        $html = '<h1>Booking Report</h1>
        <table style="width:100%">
        <tr>
            <th>Room ID</th>
            <th>Room Name</th> 
            <th>Room Type</th>
            <th>Status</th>
        </tr>';
        if($check->num_rows > 0){
            while($row = $check->fetch()){
                $status = '';
                $stmt = $mysqli->prepare('select room.id from room where room.id = ? and room.id not in (select room.id from room join contract on contract.room = room.id where contract.endDate > now())');
                $stmt->bind_param('s',$id);
                $stmt->execute();
                $stmt->store_result();
                if($stmt->num_rows > 0){
                    $status= 'Available';
                }
                else {
                    $status = 'Not Available';
                }
                $html=$html.'
                    <tr>
                        <td>'.htmlspecialchars($id).'</td>
                        <td>'.htmlspecialchars($roomname).'</td>
                        <td>'.htmlspecialchars($roomtype).'</td>
                        <td>'.htmlspecialchars($status).'</td>
                    </tr>

                ';
                
            }
            $html = $html.'
            </table>
            <span><br>*This report is computer generated, no signature is required</span>';
            $mpdf->SetTitle('Booking Report');
                // CSS
            $stylesheet = file_get_contents('style.css');
    
            $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
    
            // Write some HTML code:
            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
            $filename = 'Contract '.$id.'.pdf';
            // Output a PDF file directly to the browser
            $mpdf->Output($filename,'I');
        }
    }
?>