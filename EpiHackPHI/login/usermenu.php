<?php

//To start the session and if not login to the system, redirect to the index page 
include("../ssi/session_handling.php");

$role_id=$_SESSION['mdcc_user_role_id']
?>

<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>epihack - Sri Lanka </title>
<link rel="stylesheet" type="text/css" href="../css/layout.css" />
<link rel="icon" href="../images/title.png" />
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
<script type="text/javascript" src="../js/jquery-1.8.3.min.js"></script>

</head>
<!-- include class in the body tag for sidebar/navigation -->
<body class="drawer drawer-right" onLoad="getTime()">
	<?php include('../ssi/sidebar.php');?>

 
  <div id="master">
  
        <div id="banner">
            <?php include('../ssi/header.php');?>
        </div> 

    <div id="nav" style="color:white">
			<?php include('../ssi/navigation.php');?>
    </div>
           
	<div id="content">


<h2 align="center"><?php echo $_SESSION['mdcc_user_role_name']; ?> Menu</h2>
<?php if($role_id==14) { ?>
<table width="100%" border="0" align="center" class="table-condensed">
  <tr align="center">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr align="center">
      <td width="25%"><a href ="../phi_dashboard/phi_dashboard.php"><img src="../images/phi_db.png" width="75" height="75"></a></td>
      <td width="25%"><a href ="../moh_dashboard/moh_dashboard.php"><img src="../images/moh_db.png" width="75" height="75"></a></td>
      <td width="25%"><a href ="../statistics/reports.php"><img src="../images/statistics.png" width="75" height="75"></a></td>
    </tr>
    <tr align="center">
      <td height="53"><a href ="../phi_dashboard/phi_dashboard.php">
        <button type="button" class="btn btn-primary" style="width:200px;">PHI Dashboard </button>
        </a> &nbsp; </td>
      <td><a href ="../moh_dashboard/moh_dashboard.php">
        <button type="button" class="btn btn-primary" style="width:200px;">MOH Dashboard </button>
        </a> &nbsp; </td>
      <td><a href ="../statistics/reports.php">
        <button type="button" class="btn btn-primary" style="width:200px;">Statistics</button>
        </a> &nbsp; </td>
    </tr>
    <tr align="center">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr align="center">
      <td><a href ="../phi_form/phi_form.php"><img src="../images/register-icon-png-219.png" width="75" height="75"></a></td>
      <td><a href ="../moh_form/moh_form.php"><img src="../images/moh.png" width="75" height="75"></a></td>
      <td><a href ="../user/usermanagement.php"><img src="../images/add-user-icon.jpg" width="75" height="75"></a></td>
    </tr>
    <tr align="center">
      <td><a href ="../phi_form/phi_form.php">
        <button type="button" class="btn btn-primary" style="width:200px;">PHI (411) </button>
      </a> &nbsp; </td>
      <td><a href ="../moh_form/moh_form.php">
        <button type="button" class="btn btn-primary" style="width:200px;">MOH (411A) </button>
      </a> &nbsp; </td>
      <td><a href ="../user/usermanagement.php">
        <button type="button" class="btn btn-primary" style="width:200px;">User Management</button>
      </a> &nbsp; </td>
    </tr>
    <tr align="center">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    </table>
<?php } ?>


</div>
              
        <div id="footer" class="height35">
			<?php include('../ssi/footer.php');?>
        </div>
        
  </div>
    
 </div>
</body>	

</html>