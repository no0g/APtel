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
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="fname">First name</label>
                    <input type="text" class="form-control" value='.htmlspecialchars($firstName).' readonly>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="lname">Last name</label>
                    <input type="text" class="form-control" value='.htmlspecialchars($lastName).' readonly>
                </div>
        </div>
        <div class="col-sm-6">
                <div class="form-group">
                    <label for="city">Room </label>
                    <input type="text" class="form-control" value='.htmlspecialchars($roomname).' readonly>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="city">Price</label>
                    <input type="text" class="form-control" placeholder=price value="RM '.htmlspecialchars($price).'" readonly >
                </div>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="State">Start Date</label>
                            <input type="date" class="form-control" value='.htmlspecialchars($startDate).'  readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="Zip">End Date</label>
                            <input type="date" class="form-control" value='.htmlspecialchars($startDate).' readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ';
        //Set title
        $mpdf->SetTitle('Contract '.$id);
        // Write some HTML code:
        $mpdf->WriteHTML($html);
        $filename = 'Contract '.$id.'.pdf';
        // Output a PDF file directly to the browser
        $mpdf->Output($filename,'I');
      }
    }
}


?>