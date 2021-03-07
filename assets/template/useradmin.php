<?php


?>
<li class="dropdown user-menu"> 

    <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
    <?php
            require_once "../../../config/config.php";
            $email = $_SESSION["email"];
            
            $check = $mysqli->prepare("SELECT firstName,lastName,image FROM admin WHERE email = ? ");
            $check->bind_param("s", $email);
            $check->execute();
            $check->store_result();
            $check->bind_result($firstName,$lastName,$image);
    
            if($check->num_rows > 0){
            while($row = $check->fetch()){
                // $firstName=$row=["firstName"];
                // $lastName=$row["lastName"];
                // $image=$row["image"];

    ?>
    <img src=<?php echo '../'.$image?> class="user-image" alt="User Image" />
    <span class="d-none d-lg-inline-block"><?php echo htmlspecialchars($firstName) . " " . htmlspecialchars($lastName); ?> </span>
    </button>
    <ul class="dropdown-menu dropdown-menu-right">
    <!-- User image -->
    <li class="dropdown-header">
        <img src=<?php echo '../'.$image; ?> class="img-circle" alt="User Image" />
        <div class="d-inline-block">
        <?php echo htmlspecialchars($firstName) . " " . htmlspecialchars($lastName); ?> <small class="pt-1"><?php echo htmlspecialchars($email);?></small>
        </div>
    </li>
    <?php } $check->close();}?>
    <li>
        <a href="../../changepassword"> <i class="mdi mdi-settings"></i> Change Password </a>
    </li>
    <li class="dropdown-footer">
        <a href="../../../controller/logoutAuth.php"> <i class="mdi mdi-logout"></i> Log Out </a>
    </li>
    </ul>
</li>            
            