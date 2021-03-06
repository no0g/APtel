<?php 

    session_start();
        if($_SESSION['status']!="admin"){
          header("location:../index.php?message=not_login");
        }else if(!isset($_POST['edit'])) {
        header("location:../../../admin/student/show/");
        }else{
            include "../../../config/config.php";
            $id = $_POST['id'];
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $tpnumber = $_POST['tpnumber'];
            $email = $_POST['email'];
            $contact = $_POST['contact'];
            $srcpath = "location: ../../../admin/student/edit/?id=".$id;

            $stmt = $mysqli->prepare("update student set firstName = ?, lastName = ?, tpnumber = ?, email = ?, contact = ? where id = ?");
            $stmt->bind_param("ssssss", $firstName, $lastName, $tpnumber,$email,$contact, $id);
            $result = $stmt->execute();

            if($result){
               
                header($srcpath."&message=success");
            } else {
                
                header($srcpath."&message=fail");
            }
       }

    

?>