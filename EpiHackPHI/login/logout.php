<?php

//To start the session and if not login to the system, redirect to the index page 
include("../ssi/session_handling.php");


//Session Destroy
session_destroy();
header("refresh:2, url=index.php");

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

<body>

  <div id="master">
  
        <div id="banner">
            <?php include('../ssi/header.php');?>
        </div> 

    <div id="nav">&nbsp;</div>
    <div id="content" style="min-height:485px; padding-top:100px;">
    <table align="center">
    <tr>
        <td> <h2> Successfully Logout From The System. . . </h2> </td>
    </tr>
    </tr>
        <td><img src="../images/loading.gif"/></td>
    </tr>
    </table>
    </div>
              
        <div id="footer" class="height35">
           <span>Copyright &copy; - 2015 phi - All Righs Recerved.</span>
        </div>
        
  </div>
    
 </div>
</body>	

</html>