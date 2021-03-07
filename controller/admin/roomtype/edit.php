<?php 

    session_start();
        if($_SESSION['status']!="admin"){
          header("location:../index.php?message=not_login");
        }else if(!isset($_POST['edit'])) {
        header("location:../../../admin/roomtype/show/");
        }else{
            include "../../../config/config.php";
            $id = $_POST['id'];
            $price = $_POST['price'];
            $name = $_POST['name'];
            $size = $_POST['size'];
            $description = $_POST['Description'];
            $roomid = "";
            $srcpath = "location: ../../../admin/roomtype/edit/?id=".$id;

            
            
            // update roomtype  
            $stmt = $mysqli->prepare("update roomtype set price = ?, name = ?, size = ?, Description = ? where id = ?");
            $stmt->bind_param("sssss", $price, $name, $size, $description, $id);
            $result = $stmt->execute();

            if($result){
               
                header($srcpath."&message=success");
            } else {
                
                header($srcpath."&message=fail");
            }
       }

    

?>