<?php
    
    session_start();
    if($_SESSION['status']!="admin"){
        header("location:../../../admin/index.php?message=not_login");
    }else if(!isset($_GET['id'])) {
        header("location:../../../admin/payment/show/");
    } else {
        include "../../../config/config.php";
        $id = $_GET['id'];
        $srcpath = "location: ../../../admin/payment/show/";
        
        
        //get data
        $studentemail = "";
        $amount = "";
        $overdue= "";
        $contractid = "";
        $roomname = "";
        $check = $mysqli->prepare("select student.email, payment.amount, contract.overdue, contract.id, room.name from payment join contract on contract.id = payment.contract join student on student.id = contract.student join room on room.id = contract.room where payment.id = ?");
        $check->bind_param('s',$id);
        $check->execute();
        $check->store_result();
        $check->bind_result($email, $amountrw, $overduerw, $contractidrw, $roomnamerw);
        if($check->num_rows == 1){
            while($row = $check->fetch()){
                $studentemail = $email;
                $roomname = $roomnamerw;
                $amount = $amountrw;
                $contractid = $contractidrw;
                $overdue = $overduerw;
                
            }
        } else {
            header($srcpath.'?message=fail');
        }

        //update booking status
        $stmt = $mysqli->prepare("update payment set status = 'rejected' where id = ?");
        $stmt->bind_param("s",$id);
        $result = $stmt->execute();
        if($result){
            //send email notification
            ini_set( 'display_errors', 1 );   
            error_reporting( E_ALL );    
            
            $to = "$studentemail";    
            $from= "noreply@hostel.apu.edu.my";
            $subject = "Booking Rejected";    
            $message = "Your Payment for \nContractID: {$contractid}\nRoom: {$roomname}\nAmount: {$amount}\nHas been accepted, you current overdue is RM {$overdue}";            $headers = "From:" . $from . "\r\n";
            if(mail($to,$subject,$message, $headers)){
                
                header($srcpath."?message=successreject");
            }
            else {
                header($srcpath."?message=fail");
            }
                
        } else {
            header($srcpath.'?message=fail');
        }

    }

?>