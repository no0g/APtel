<?php 
// Session Start
session_start();
include "../config/config.php";


$stmt = $mysqli->prepare("INSERT INTO log (description) VALUES (?)");
$logdesc = "user: ". $_SESSION['email'] . " Log Out";
$stmt->bind_param("s",$logdesc);
$stmt->execute();
unset($_SESSION['email']);
// Destroy Session
session_destroy();
 
header("location:../student/index.php?message=logout");
$stmt->close();
?>