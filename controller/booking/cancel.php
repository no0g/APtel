<?php 

include '../../config/config.php';


// Retrieve Id
$id = $_GET['id'];
$stmt = $mysqli->prepare("Select * FROM booking WHERE id = ? and status = 'accepted'");
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows ==0){
    
    $delete = $mysqli->prepare("DELETE FROM booking WHERE id = ?");
    $delete->bind_param('i', $id);
    $result1 = $delete->execute();
    if($result1) {
        
        // Success
        header("location: ../../student/bookings/?message=success");
        $delete->close();
    } else {
        // If Error Occured
        header("location: ../../student/bookings/?message=fail");
        $delete->close();
    }
}
else{
    header("location: ../../student/bookings/?message=fail");
    $stmt->close();
}
 
?>