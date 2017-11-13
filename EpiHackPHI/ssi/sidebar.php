<?php

//To start the session and if not login to the system, redirect to the index page 
include("session_handling.php");

$role_id=$_SESSION['mdcc_user_role_id'];

?>


<!-- Left position Side Bar -->
<link rel="stylesheet" type="text/css" href="../bootstrap/drawer/drawer.min.css"/>
<script type="text/javascript" src="../bootstrap/drawer/jquery.drawer.min.js"></script>
<script type="text/javascript" src="../bootstrap/drawer/iscroll-min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
  $(".drawer").drawer();
});
</script>

<!-- Clock -->
<script>
            function getTime()
            {
                var today = new Date();
                var h = today.getHours();
                var m = today.getMinutes();
                var s = today.getSeconds();
                // add a zero in front of numbers<10
                m = checkTime(m);
                s = checkTime(s);
                document.getElementById('showtime').innerHTML = h + ":" + m + ":" + s;
                t = setTimeout(function () {
                    getTime()
                }, 500);
            }
            function checkTime(i) {
                if (i < 10)
                {
                    i = "0" + i;
                }
                return i;
            }
</script>

<style type="text/css">
.navigationButton{
    padding-bottom: 5px;
    padding-right: 5px;
    padding-left: 5px;
    padding-top: 5px;
}
</style>

  <header role="banner">
  <div class="drawer-header">
    <button type="button" class="drawer-toggle drawer-hamburger">
      <span class="sr-only">toggle navigation</span>
      <span class="drawer-hamburger-icon"></span>
    </button>
  </div>

  <div class="drawer-main drawer-default" style="background-color:#337AB7">
    <nav class="drawer-nav" role="navigation">
      <div class="drawer-brand" align="center"><span style="font-size:32px; color:white;">Navigation</span></div>

		<ul class="drawer-submenu" style="padding: 5px 5px 0;">
            <li style="padding-bottom:5px;"><a href="../login/usermenu.php" class="list-group-item navigationButton"><i class="glyphicon glyphicon-home"></i> &nbsp; Home </a></li> 
            
            <?php if(($role_id==1) || ($role_id==6) || ($role_id==10)||($role_id==14)) { ?> <li style="padding-bottom:5px;"><a href ="../phi_dashboard/phi_dashboard.php" class="list-group-item navigationButton"><img src="../images/phi_db.png" width="20" height="20"> PHI Dashboard </a></li><?php } ?> 
            
            <?php if(($role_id==1) || ($role_id==6) || ($role_id==10)||($role_id==14)) { ?> <li style="padding-bottom:5px;"><a href ="../moh_dashboard/moh_dashboard.php" class="list-group-item navigationButton"><img src="../images/moh_db.png" width="20" height="20"> MOH Dashboard  </a></li><?php } ?> 
            
            <?php if(($role_id==6) || ($role_id==10)||($role_id==14)) { ?> <li style="padding-bottom:5px;"><a href ="../phi_form/phi_form.php" class="list-group-item navigationButton"><img src="../images/register-icon-png-219.png" width="20" height="20"> PHI (411) </a></li> <?php } ?>
            
                       
           <?php if(($role_id==6) || ($role_id==10)||($role_id==14)) { ?> <li style="padding-bottom:5px;"><a href ="../moh_form/moh_form.php" class="list-group-item navigationButton"><img src="../images/moh.png" width="20" height="20"> MOH (411A) </a></li><?php } ?>
            
           
           <?php if(($role_id==1) || ($role_id==6) || ($role_id==10)||($role_id==14)) { ?> <li style="padding-bottom:5px;"><a href ="../user/usermanagement.php" class="list-group-item navigationButton"><img src="../images/add-user-icon.jpg" width="20" height="20"> User Management </a></li><?php } ?> 
           
               
                       
          </ul>
          
          <div align="center" ><span style="color:lightblue; font-weight:400;font-size:50px; font-family: -webkit-body;" id="showtime"></span></div>
          
      <!-- To display clock in Navigation bar-->
      <div class="drawer-footer"></div>
    </nav>
  </div>
  </header>
  
