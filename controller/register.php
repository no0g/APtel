<?php 
// Session Start
session_start();
 
include '../config/database.php';

if(isset($_POST['register'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $tpnumber = $_POST['tpnumber'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    require_once '../config/config.php';
    // Get user exist or not from the database

    $check = $mysqli->prepare("SELECT * FROM student WHERE email = ? ");
    $check->bind_param('s', $email);
    $check->execute();
    $check->store_result();
    // Row Images
    if($check->num_rows > 0){
        header("location: ../student/register/index.php?message=fail");
    }
    else if(!preg_match('|@mail.apu.edu.my|',$email)){
        header("location:  ../student/register/index.php?message=fail");
    }
    else{
        
        
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()";
        $password = substr(str_shuffle($chars),0,8);
        $stmt = $mysqli->prepare("INSERT INTO student (firstName, lastName, tpnumber, email, contact, password) VALUES (?, ?, ?,?,?,?)");
        $hash = password_hash($password,PASSWORD_DEFAULT);
        $stmt->bind_param("ssssss", $firstname, $lastname, $tpnumber,$email,$contact, $hash);
        $result = $stmt->execute();
        if($result) {   
            // Success
            
            
            ini_set( 'display_errors', 1 );   
            error_reporting( E_ALL );    
               
            $to = "$email";    
            $from= "noreply@hostel.apu.edu.my";
            $subject = "Account Registration in APU Hostel Management System";    
            $message = "Congratulations!, You are registered and here is your credentials to login \nEmail: {$email}, Password: {$password}";   
            $headers = "From:" . $from . "\r\n";
            // $headers .= "Reply-To: noreply@gcs.lol\r\n";
            // $headers .= "Return-Path: noreply@gcs.lol\r\n";    
            if(mail($to,$subject,$message, $headers)){
                header("location: ../student/register/index.php?message=success");
            }else{
                header("location: ../student/register/index.php?message=email");
            }
            
            
            
            $stmt->close();
        } else {
            // If Error Occured
            header("location: ../vote/register/index.php?message=fail");
            $stmt->close();
        } 
    
    }

    
    
  }

?>