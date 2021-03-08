<?php 

    session_start();
        if($_SESSION['status']!="admin"){
          header("location:../../../admin/index.php?message=not_login");
        }else if(!isset($_POST['edit'])) {
        header("location:../../../admin/contract/show/");
        }else{
            include "../../../config/config.php";
            $id = $_POST['id'];
            $price = $_POST['price'];
            $roomname = $_POST['roomname'];
            $overdue = $_POST['overdue'];
            $roomid = "";
            $srcpath = "location: ../../../admin/contract/edit/?id=".$id;

            //get roomid with roomname
            $stmt = $mysqli->prepare("select id from room where name = ?");
            $stmt->bind_param("s",  $roomname);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($roomidrw);
            if($stmt->num_rows == 1){
                while($row = $stmt->fetch()){
                    $roomid = $roomidrw;
                }
                
            }

            $stmt = $mysqli->prepare("update contract set price = ?, overdue = ?, room = ? where id = ?");
            $stmt->bind_param("ssss", $price, $overdue, $roomid, $id);
            $result = $stmt->execute();

            if($result){
               
                header($srcpath."&message=success");
            } else {
                
                header($srcpath."&message=fail");
            }
       }

    

?>