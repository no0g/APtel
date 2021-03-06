<?php 
session_start();

include '../config/config.php';

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
			$_SESSION['email'] = $email;
			$_SESSION['status'] = "login";
			$stmt = $mysqli->prepare("INSERT INTO log (description) VALUES (?)");
			$logdesc = "user: ". $email . " Log In";
			$stmt->bind_param("s",$logdesc);
			$stmt->execute();
			header("location:../student/roomtype/");
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

?>