<?php
session_start();
 
include '../../config/config.php';
if(isset($_POST['submit'])){
    $email = $_SESSION['email'];
    $targetDir = "../../uploads/payment/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    
    $check = $mysqli->prepare("SELECT contract.id FROM contract join student 
    on student.id = contract.student WHERE student.email = ? and contract.endDate > now()");
    $check->bind_param('s', $email);
    $check->execute();
    $check->store_result();
    $check->bind_result($id);

    if($check->num_rows == 1){
        while($check->fetch()){
            $check = $mysqli->prepare("SELECT * FROM payment join contract 
            on payment.contract = contract.id WHERE payment.contract = ? and payment.status = 'waiting'");
            $check->bind_param('s', $id);
            $check->execute();
            $check->store_result();
            if($check->num_rows > 0){
                header("location: ../../student/bills/?message=waiting");
                $check->close();
            }
            else {
                if(!empty($_FILES["file"]["name"])){
                    $allowTypes = array('jpg','png','jpeg','pdf');
                    if(in_array($fileType, $allowTypes)){
                        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                            $stmt = $mysqli->prepare("INSERT INTO payment (contract, file) VALUES ( ?, ?)");
                            $stmt->bind_param("ss", $id, $fileName);
                            $result = $stmt->execute();
                            if($result) {
                                // Success
                                header("location: ../../student/bills/?message=success");
                                $stmt->close();
                            } else {
                                // If Error Occured
                                header("location: ../../student/bills/?message=fail");
                                $stmt->close();
                            } 
                        }
                        else {
                            header("location: ../../student/bills/?message=fail");
                        }
                    }
                    else {
                        header("location: ../../student/bills/?message=type");
                    }
                }
            }
            
        }
    }
    else {

    }
}

?>