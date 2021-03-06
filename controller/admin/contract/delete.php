<?php
    session_start();
    if($_SESSION['status']!="admin"){
    header("location:../../../index.php?message=not_login");
    }else if(!isset($_GET['id'])) {
        header("location:../../../admin/contract/show/");
    } else{
        include "../../../config/config.php";
        $id = $_GET['id'];
        $srcpath = "location: ../../../admin/contract/edit/?id=".$id;
        $delete = $mysqli->prepare("DELETE FROM contract WHERE id = ?");
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