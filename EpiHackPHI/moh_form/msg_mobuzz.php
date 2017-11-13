<?php

//To start the session and if not login to the system, redirect to the index page 
include("../ssi/session_handling.php");

//data con
require_once("../common/dbconnection_inc.php"); 
?>

<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Analytical System for MDCC </title>
<link rel="stylesheet" type="text/css" href="../css/layout.css" />
<link rel="icon" href="../images/title.png" />
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
<script type="text/javascript" src="../js/jquery-1.8.3.min.js"></script>

</head>
<!-- include class in the body tag for sidebar/navigation -->
<body class="drawer drawer-right" onLoad="getTime()">
	<?php include_once('../ssi/sidebar.php');?>

  <div id="master">
  
        <div id="banner">
            <?php include('../ssi/header.php');?>
        </div> 

    <div id="nav" style="color:white">
		<?php include('../ssi/navigation.php');?>   
   	</div>

<div id="content">


<h2 align="center">&nbsp; </h2>
<h2 align="center" style="color:#F00">Concent!</h2>
<table width="100%" border="0" align="center" class="table">
  <tr>
    <td height="45"><h3>Patient has given consent to receive an invitation to Mo-Buzz by SMS</h3></td>
  </tr>
  
    
  <tr>
    <td><a href="../phi_dashboard/phi_dashboard.php"> <button type="button" class="btn btn-info"><i class="glyphicon glyphicon-ok"></i> Ok </button></a>
    
    </td>
  </tr>
</table>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
</div>
              
        <div id="footer" class="height35">
           <?php include('../ssi/footer.php');?>
        </div>
        
  </div>
    
 </div>
</body>	

</html>