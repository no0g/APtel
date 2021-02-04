<?php 
// Session Start
session_start();
 
// Destroy Session
session_destroy();
 
header("location:../student/index.php?message=logout");
$stmt->close();
?>