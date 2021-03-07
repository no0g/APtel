<?php
    session_start();
    if($_SESSION['status']!="admin"){
    header("location:../index.php?message=not_login");
    }else if(!isset($_POST['add'])) {
    header("location:../../../admin/room/new/");
    }else {
        include "../../../config/config.php";
        //initiate
        $name = $_POST['name'];
        $roomtype = $_POST['roomtype'];
        $roomtypeid = "";
        //get roomtypeid
        $check = $mysqli->prepare("select roomtype.id from roomtype where roomtype.name = ?");
        $check->bind_param('s',$roomtype);
        $check->execute();
        $check->store_result();
        $check->bind_result($id);
        
        if($check->num_rows > 0){
            while($row = $check->fetch()){
                $roomtypeid = $id;
            }
        }

        $stmt = $mysqli->prepare("INSERT INTO room (name, type) VALUES ( ?,?)");
        $stmt->bind_param("ss", $name,$roomtypeid);
        $result = $stmt->execute();
        if($result) {
            // Success
            header("location: ../../../admin/room/new/?message=success");
            $stmt->close();
        } else {
            // If Error Occured
            header("location: ../../../admin/room/new/?message=fail");
            $stmt->close();
        } 

            
        
    }


?>