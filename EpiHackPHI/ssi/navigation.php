<?php

//To start the session and if not login to the system, redirect to the index page 
include("session_handling.php");


?>

    <div style="float:right; padding-right:60px; font-weight:normal;padding-top:10px; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif">
    
    <?php echo " Welcome ". $_SESSION['mdcc_fname']." ".$_SESSION['mdcc_lname']." &nbsp; | &nbsp; Logged As : ".$_SESSION['mdcc_user_role_name']; ?> &nbsp; | &nbsp;<a href="../user/change_password.php" class="a1"> Change Password  </a>  &nbsp;|
    &nbsp; <a href="../login/logout.php" class="a1"> <u> Logout </u> </a>
    </div>