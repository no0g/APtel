<?php 
// Session Start
session_start();
 
include '../../config/config.php';

if(isset($_POST['submit'])){
    $email = $_SESSION['email'];
    $roomtype = $_POST['roomtype'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    
    if($startDate == $endDate){
        header("location: ../../student/bookings/request/?message=minimum");
        exit();
    }

    if($startDate > $endDate){
        header("location: ../../student/bookings/request/?message=minimum");
        exit();
    }
    if (date('Y-m-d',strtotime($endDate.'-4 month')) < $startDate){
        header("location: ../../student/bookings/request/?message=minimum");
        exit();
    }
    

    //Get student id
    $check = $mysqli->prepare("SELECT student.id FROM student WHERE student.email = ? and student.id not in  (select student.id from booking join student on booking.student = student.id WHERE booking.status = 'waiting') ");
    $check->bind_param('s', $email);
    $check->execute();
    $check->store_result();
    $check->bind_result($id);


    if($check->num_rows > 0){
     while($row = $check->fetch()){

            $check = $mysqli->prepare("SELECT id FROM roomtype WHERE name = ? ");
            $check->bind_param('s', $roomtype);
            $check->execute();
            $check->store_result();
            $check->bind_result($roomtypeid);
        
            if($check->num_rows > 0){
            while($row = $check->fetch()){
            
                $stmt = $mysqli->prepare("INSERT INTO booking (student, roomtype, startDate, endDate) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $id, $roomtypeid, $startDate, $endDate);
                $result = $stmt->execute();
                if($result) {
                    // Success
                    header("location: ../../student/bookings/request/?message=success");
                    $stmt->close();
                } else {
                    // If Error Occured
                    header("location: ../../student/bookings/request/?message=fail");
                    $stmt->close();
                } 
            }
            }
        
        
        

     }
    }
    else {
        header("location: ../../student/bookings/request/?message=waiting");
    }
  }

?>