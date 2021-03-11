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
        $check = $mysqli->prepare("SELECT booking.id, student.firstName, student.lastName, roomtype.name, booking.startDate, booking.endDate, booking.status from booking join student on student.id = booking.student join roomtype on roomtype.id = booking.roomtype");
        
        $check->execute();
        $check->store_result();
        $check->bind_result($id,$firstName,$lastName,$roomname,  $startDate,$endDate,$status);
        $html = '<h1>Booking Report</h1>
        <table style="width:100%">
        <tr>
            <th>Booking ID</th>
            <th>Student Name</th> 
            <th>Room Type</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Status</th>
        </tr>';
        if($check->num_rows > 0){
            while($row = $check->fetch()){
                $html=$html.'
                    <tr>
                        <td>'.htmlspecialchars($id).'</td>
                        <td>'.htmlspecialchars($firstName).' '.htmlspecialchars($lastName).'</td>
                        <td>'.htmlspecialchars($roomname).'</td>
                        <td>'.htmlspecialchars($startDate).'</td>
                        <td>'.htmlspecialchars($endDate).'</td>
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