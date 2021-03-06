<?php
    session_start();
    if($_SESSION['status']!="admin"){
        header("location:../../../index.php?message=not_login");
    }else if(!isset($_GET['id'])) {
        header("location:../../../admin/bookings/show/");
    } else{
        include "../../../config/config.php";
        $id = $_GET['id'];
        $srcpath = "location: ../../../admin/bookings/show/";
        //check student has active contract
        
        $check = $mysqli->prepare('select contract.id FROM contract join student on student.id = contract.student where contract.endDate > now() AND student.id = (select student.id from student join booking ON booking.student = student.id WHERE booking.id = ?)');
        $check->bind_param('i',$id);
        $check->execute();
        $check->store_result();
        if($check->num_rows > 0){
            header($srcpath.'?message=active');
        }else{
            $studentemail = "";
            $roomtype = "";
            $studentid = "";
            $starDate = "";
            $endDate = "";
            $price = "";
            //get data
            $check = $mysqli->prepare("select student.id, booking.startDate, booking.endDate, booking.roomtype, student.email, roomtype.price from student join booking on booking.student = student.id 
            join roomtype on roomtype.id = booking.roomtype where booking.id = ?");
            $check->bind_param('s',$id);
            $check->execute();
            $check->store_result();
            $check->bind_result($idraw,$sDate,$eDate,$roomtyperaw,$email,$priceraw);
            
            if($check->num_rows == 1){
                while($row = $check->fetch()){
                    $studentemail = $email;
                    $roomtype = $roomtyperaw;
                    $studentid = $idraw;
                    $starDate = $sDate;
                    $endDate = $eDate;
                    $price = $priceraw;
                }
            } else {
                header($srcpath.'?message=fail');
            }


            //get avail room
            $roomid = "";
            $check = $mysqli->prepare("select room.id from room left join contract ON
            contract.room = room.id 
            where room.type = ? and (contract.endDate < now() or contract.endDate is null) limit 1");
            $check->bind_param('s',$roomtype);
            $check->execute();
            $check->store_result();
            $check->bind_result($roomidraw);
            
            if($check->num_rows == 1){
                while($row = $check->fetch()){
                    $roomid = $roomidraw;
                }
            } else {
                header($srcpath.'?message=failroom');
            }

            //create contract
            $check = $mysqli->prepare("insert into contract (student,room,startDate,endDate,price) values (?,?,?,?,?)");
            $check->bind_param('sssss',$studentid,$roomid,$starDate,$endDate,$price);
            $result = $check->execute();

            if($result){
                //update booking status
                $stmt = $mysqli->prepare("update booking set status = 'accepted' where id = ?");
                $stmt->bind_param("s",$id);
                $result = $stmt->execute();
                if($result){
                    //send email notification
                    ini_set( 'display_errors', 1 );   
                    error_reporting( E_ALL );    
                    
                    $to = "$studentemail";    
                    $from= "noreply@hostel.apu.edu.my";
                    $subject = "Booking Accepted";    
                    $message = "Your Booking with Booking ID = ".$id." has accepted! \nCheck your new contract here: https://127.0.0.1/gcs/student/contract";   
                    $headers = "From:" . $from . "\r\n";
                    if(mail($to,$subject,$message, $headers)){
                        
                        header($srcpath."?message=successaccept");
                    }
                    else {
                        header($srcpath."?message=fail");
                    }
                        
                } else {
                    header($srcpath.'?message=fail');
                }
            } else {
                header($srcpath.'?message=fail');
            }
            



            
                

        }



    }

?>