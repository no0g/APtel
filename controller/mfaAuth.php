<?php 
session_start();

include '../config/config.php';


if(isset($_SESSION['pending'])){
	$otp = $_SESSION['otp'];
	$userOtp = $_POST['otp'];
	$email = $_SESSION['email'];
	if(!strcmp($otp,$userOtp)){
		unset($_SESSION['pending']);
		unset($_SESSION['otp']);

		//logging
		$stmt = $mysqli->prepare("INSERT INTO log (description) VALUES (?)");
		$logdesc = "user: ". $email . " Log In Success";
		$stmt->bind_param("s",$logdesc);
		$stmt->execute();
		$_SESSION['status']="login";
		header("location:../student/roomtype/");
	} else{
		unset($_SESSION['email']);
		unset($_SESSION['otp']);
		unset($_SESSION['pending']);
		$stmt = $mysqli->prepare("INSERT INTO log (description) VALUES (?)");
		$logdesc = "user: ". $email . " Log In Failed";
		$stmt->bind_param("s",$logdesc);
		$stmt->execute();

		//send email notif
		ini_set( 'display_errors', 1 );   
		error_reporting( E_ALL );    
		
		$to = "$email";    
		$from= "noreply@hostel.apu.edu.my";
		$subject = "Suspicious Activity from Your Account";    
		$message = "There was a Login Attempt to your account, if it was not you try to change the password to secure your account";   
		$headers = "From:" . $from . "\r\n";
		if(mail($to,$subject,$message, $headers)){
			session_destroy();
			header("location:../student/?=fail");
		}
		
	}

} else{
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		$check = $mysqli->prepare("SELECT password FROM student WHERE email = ? ");
		$check->bind_param('s', $email);
		$check->execute();
		$check->store_result();
		$check->bind_result($hash);
			
		if($check->num_rows == 1) {
			while($check->fetch()){
				if(password_verify($password,$hash)){
					
					// $_SESSION['status'] = "login";
		
					// $stmt = $mysqli->prepare("INSERT INTO log (description) VALUES (?)");
					// $logdesc = "user: ". $email . " Log In";
					// $stmt->bind_param("s",$logdesc);
					// $stmt->execute();
					$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()";
					$otp = substr(str_shuffle($chars),0,6);
					$_SESSION['otp'] = $otp;
					$_SESSION['pending']="true";
					ini_set( 'display_errors', 1 );   
					error_reporting( E_ALL );    
					
					$to = "$email";    
					$from= "noreply@hostel.apu.edu.my";
					$subject = "Your OTP";    
					$message = "Here is your OTP: {$otp}";   
					$headers = "From:" . $from . "\r\n";
					// $headers .= "Reply-To: noreply@gcs.lol\r\n";
					// $headers .= "Return-Path: noreply@gcs.lol\r\n";    
					if(mail($to,$subject,$message, $headers)){
						$_SESSION['email'] = $email;
						header("location:../student/mfa.php");
					}
		
					
				}
				else{
					header("location:../student/index.php?message=fail");
				}
			}
		} else if($email === '' || $password === '') {
			header("location:../student/index.php?message=noCredential");
		} else {
			header("location:../student/index.php?message=fail");
		}
}




?>