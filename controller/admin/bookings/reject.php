<?php
    
    session_start();
    if($_SESSION['status']!="admin"){
        header("location:../../../index.php?message=not_login");
    }else if(!isset($_GET['id'])) {
        header("location:../../../admin/bookings/show/");
    } else {
        include "../../../config/config.php";
        $id = $_GET['id'];
        $srcpath = "location: ../../../admin/bookings/show/";
        $studentemail = "";
        
        //get data
        $check = $mysqli->prepare("select student.email from student join booking on booking.student = student.id 
        join roomtype on roomtype.id = booking.roomtype where booking.id = ?");
        $check->bind_param('s',$id);
        $check->execute();
        $check->store_result();
        $check->bind_result($email);
        
        if($check->num_rows == 1){
            while($row = $check->fetch()){
                $studentemail = $email;

            }
        } else {
            header($srcpath.'?message=fail');
        }

        //update booking status
        $stmt = $mysqli->prepare("update booking set status = 'rejected' where id = ?");
        $stmt->bind_param("s",$id);
        $result = $stmt->execute();
        if($result){
            //send email notification
            ini_set( 'display_errors', 1 );   
            error_reporting( E_ALL );    
            
            $to = "$studentemail";    
            $from= "noreply@hostel.apu.edu.my";
            $subject = "Booking Rejected";    
            $message = "Your Booking with Booking ID = ".$id." has been rejected! \nCheck your new contract here: https://127.0.0.1/gcs/student/contract";   
            $headers = "From:" . $from . "\r\n";
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