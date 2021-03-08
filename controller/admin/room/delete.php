<?php
    session_start();
    if($_SESSION['status']!="admin"){
    header("location:../../../admin/index.php?message=not_login");
    }else if(!isset($_GET['id'])) {
        header("location:../../../admin/room/show/");
    } else{
        include "../../../config/config.php";
        $id = $_GET['id'];
        $srcpath = "location: ../../../admin/room/show/";

        //remove expired contract
        $check = $mysqli->prepare('select contract.id from contract where contract.room = ?');
        $check->bind_param('i',$id);
        $check->execute();
        $check->store_result();
        $check->bind_result($contractid);
        if($check->num_rows > 0){
            while($row = $check->fetch()){
              include '../../../controller/admin/contract/delete.php?id={$contractid}';
            }
          }
                
        //delete room
        $delete = $mysqli->prepare("DELETE FROM room WHERE id = ?");
        $delete->bind_param('i', $id);
        $result = $delete->execute();
        if($result) {
            
            // Success
            header($srcpath."?message=success");
            $delete->close();
        } else {
            // If Error Occured
            header($srcpath."?message=faildelete");
            $delete->close();
        }

        
        

    }




?>