<?php
    session_start();
    if($_SESSION['status']!="admin"){
    header("location:../index.php?message=not_login");
    }else if(!isset($_POST['add'])) {
    header("location:../../../admin/roomtype/new/");
    }else {
        include "../../../config/config.php";
        //initiate
        $name = $_POST['name'];
        $price = $_POST['price'];
        $size = $_POST['size'];
        $Description = $_POST['Description'];
        $targetDir = "../../../uploads/room/";
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $filewithpath = "../../../uploads/room/".$fileName;
        if(!empty($_FILES["file"]["name"])){
            $allowTypes = array('jpg','png','jpeg','pdf');
            if(in_array($fileType, $allowTypes)){
                if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                    $stmt = $mysqli->prepare("INSERT INTO roomtype (name, image, size, Description, price) VALUES ( ?,?, ?,?,?)");
                    $stmt->bind_param("sssss", $name, $fileName, $size, $Description, $price);
                    $result = $stmt->execute();
                    if($result) {
                        // Success
                        header("location: ../../../admin/roomtype/new/?message=success");
                        $stmt->close();
                    } else {
                        // If Error Occured
                        header("location: ../../../admin/roomtype/new/?message=fail");
                        $stmt->close();
                    } 
                }
                else {
                    header("location: ../../../admin/roomtype/new/?message=fail");
                }
            }
        }
    }


?>