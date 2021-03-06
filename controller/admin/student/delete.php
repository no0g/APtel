<?php
session_start();
if($_SESSION['status']!="admin"){
  header("location:../index.php?message=not_login");
}else if(!isset($_GET['id'])) {
    header("location:../../../admin/student/show/");
} else{
    include "../../../config/config.php";
    $id = $_GET['id'];
    $srcpath = "location: ../../../admin/student/edit/?id=".$id;
    $delete = $mysqli->prepare("DELETE FROM student WHERE id = ?");
    $delete->bind_param('i', $id);
    $result = $delete->execute();
    if($result) {
        
        // Success
        header($srcpath."&message=successdelete");
        $delete->close();
    } else {
        // If Error Occured
        header($srcpath."&message=faildelete");
        $delete->close();
    }
    

}




?>