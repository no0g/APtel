<?php 
session_start();

include '../../config/config.php';

if(isset($_POST['submit'])){
    $email = $_SESSION['email'];
    $curPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $newPasswordConfirm = $_POST['newPasswordConfirm'];
    
    if(strcmp($newPassword,$newPasswordConfirm) != 0){
        header("location: ../../student/changepassword/?message=notsame");
        
    }
    $symbol    = preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $newPassword);
    $uppercase = preg_match('@[A-Z]@', $newPassword);
    $lowercase = preg_match('@[a-z]@', $newPassword);
    $number    = preg_match('@[0-9]@', $newPassword);

    if(!$symbol || !$uppercase || !$lowercase || !$number || strlen($newPassword) < 8) {
    // tell the user something went wrong
        header("location: ../../student/changepassword/?message=regex");
    }
    else {
        $check = $mysqli->prepare("SELECT password FROM student WHERE email = ? ");
        $check->bind_param('s', $email);
        $check->execute();
        $check->store_result();
        $check->bind_result($hash);
    
        if($check->num_rows == 1){
            while($check->fetch()){
                if(password_verify($curPassword,$hash)){
                    $hash = password_hash($newPassword,PASSWORD_DEFAULT);
                    $stmt = $mysqli->prepare("UPDATE student SET password = ? WHERE email = ?");
                    $stmt->bind_param("ss", $hash, $email);
                    $result = $stmt->execute();
                    if($result) {
                        // Success
                        header("location: ../../student/changepassword/?message=success");
                        $stmt->close();
                    } else {
                        // If Error Occured
                        header("location: ../../student/changepassword/?message=fail");
                        $stmt->close();
                    }
                }
                else {
                    header("location: ../../student/changepassword/?message=wrong");
                }
            }
    
        }
    }

   

}

?>