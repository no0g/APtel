<?php
require_once  '../../vendor/autoload.php';

 
session_start();
    if($_SESSION['status']!="login"){
        header("location:../index.php?message=not_login");
}

if(isset($_GET['id'])){
    $mpdf = new \Mpdf\Mpdf();
    // Create an instance of the class:
    require_once '../../config/config.php';
    $email = $_SESSION['email'];
    $id = $_GET['id'];
    $check = $mysqli->prepare("SELECT contract.id,student.firstName, student.lastName, room.name, contract.price, contract.startDate, contract.endDate from contract join student 
                                on student.id = contract.student join room 
                                on contract.room = room.id 
                                where contract.id = ?");
    $check->bind_param('i', $id);
    $check->execute();
    $check->store_result();
    $check->bind_result($id,$firstName,$lastName,$roomname, $price, $startDate,$endDate);

    if($check->num_rows == 1){
      while($row = $check->fetch()){
    
        $html='
        
        <h1>Contract</h1>
        <table style="width:100%">
            <tr>
                <th>Contract ID: </th>
                <td>'.htmlspecialchars($id).'</td>

            </tr>
            <tr>
                <th>First Name: </th>
                <td>'.htmlspecialchars($firstName).'</td>


            </tr>
            <tr>
                <th>Last Name: </th>
                <td>'.htmlspecialchars($lastName).'</td>

            </tr>
            </tr>
            <tr>
                <th>Room Name: </th>
                <td>'.htmlspecialchars($roomname).'</td>

            </tr>
            <tr>
                <th>Price: </th>
                <td>'.htmlspecialchars($price).'</td>

            </tr>
            <tr>
                <th>Start Date: </th>
                <td>'.htmlspecialchars($startDate).'</td>

            </tr>
            <tr>
                <th>End Date: </th>
                <td>'.htmlspecialchars($endDate).'</td>

        </tr>

        </table>
        <span><br>*This contract is computer generated, no signature is required</span>
        ';
        //Set title
        $mpdf->SetTitle('Contract '.$id);
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
}


?>