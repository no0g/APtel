<?php
    session_start();
    if($_SESSION['status']!="admin"){
    header("location:../../../admin/index.php?message=not_login");
    }else if(!isset($_GET['id'])) {
        header("location:../../../admin/roomtype/show/");
    } else{
        include "../../../config/config.php";
        $id = $_GET['id'];
        $srcpath = "location: ../../../admin/roomtype/edit/?id=".$id;

        //remove related bookings

        $delete = $mysqli->prepare("DELETE FROM booking WHERE roomtype = ?");
        $delete->bind_param('i', $id);
        $result = $delete->execute();
        if($result) {
            
            $delete = $mysqli->prepare("DELETE FROM roomtype WHERE id = ?");
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


        } else {

            $delete = $mysqli->prepare("DELETE FROM roomtype WHERE id = ?");
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

        
        

    }




?>