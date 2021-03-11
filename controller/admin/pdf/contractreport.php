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
        $check = $mysqli->prepare("SELECT contract.id, student.firstName, student.lastName, room.name, roomtype.name, contract.startDate, contract.endDate,contract.price,contract.overdue from contract join student on student.id = contract.student join room on room.id = contract.room join roomtype on roomtype.id = room.type");
        
        $check->execute();
        $check->store_result();
        $check->bind_result($id,$firstName,$lastName,$roomname,$roomtype,  $startDate,$endDate,$price, $overdue);
        $html = '<h1>Contract Report</h1>
        <table style="width:100%">
        <tr>
            <th>Contract ID</th>
            <th>Student Name</th> 
            <th>Room Name</th>
            <th>Room Type</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Price</th>
            <th>Overdue</th>
        </tr>';
        if($check->num_rows > 0){
            while($row = $check->fetch()){
                $html=$html.'
                    <tr>
                        <td>'.htmlspecialchars($id).'</td>
                        <td>'.htmlspecialchars($firstName).' '.htmlspecialchars($lastName).'</td>
                        <td>'.htmlspecialchars($roomname).'</td>
                        <td>'.htmlspecialchars($roomtype).'</td>
                        <td>'.htmlspecialchars($startDate).'</td>
                        <td>'.htmlspecialchars($endDate).'</td>
                        <td>'.htmlspecialchars($price).'</td>
                        <td>'.htmlspecialchars($overdue).'</td>
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
            $filename = 'Contract Report.pdf';
            // Output a PDF file directly to the browser
            $mpdf->Output($filename,'I');
        }
    }
?>