<?php

//To start the session and if not login to the system, redirect to the index page 
include("../ssi/session_handling.php");

$role_id=$_SESSION['mdcc_user_role_id'];

//data con
require_once("../common/dbconnection_inc.php"); 
$sql="SELECT * FROM user u, user_role ur,login l WHERE u.user_role_id=ur.user_role_id AND l.user_id=u.user_id ORDER BY u.user_id DESC";
$result=mysqli_query($conn, $sql);

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

<link href="../common/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<link href="../common/js/facebox/facebox.css" media="screen" rel="stylesheet" type="text/css" />

<script src="../common/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="../common/js/jquery-ui.js" type="text/javascript"></script>
<script src="../common/js/facebox/facebox.js" type="text/javascript"></script>


<!-- DataTables CSS -->
<link href="../DataTables/css/jquery.dataTables.css" rel="stylesheet" type="text/css"/>
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="../DataTables/js/jquery.dataTables.js"></script>

<!-- DataTables Function -->   
<script type="text/javascript">
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>


<script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : '../common/js/facebox/loading.gif',
        closeImage   : '../common/js/facebox/closelabel.png'
      });
    })
  </script>
  
  <!-- Delete Function --> 
<script type="text/javascript" src="../js/check.js">
</script>

<script type="text/javascript">
function searchUsers(str)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("show1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","searchUsers.php?id="+str,true);
xmlhttp.send();
}
</script>

</head>
<body>

  <div id="master">
  
        <div id="banner">
           <?php include('../ssi/header.php'); ?>
        </div> 

    <div id="nav" style="color:white">
		<?php include('../ssi/navigation.php'); ?>
    
    &nbsp;</div>
           
<div id="content" style="min-height:400px">


<h2 align="center"> User Management </h2>
<p>&nbsp;  </p>

<table width="80%" border="0" align="center" cellspacing="5" class="t1">
  <tr>
    <th scope="col">
            
        <a href="../login/usermenu.php"/>
    	<button class="btn btn-primary"><i class="glyphicon glyphicon-home"></i> Home</button>
        
    	<a href="adduser.php" rel="facebox"/>
    	<button class="btn btn-primary"><i class="glyphicon glyphicon-user"></i> Add User </button>
        
    </th>
    </th>
  </tr>
  <tr>
    <td colspan="2"><p style="color:#390; font-size:16px; font-style:italic; ">
    <?php if(isset($_REQUEST['msg'])){
			echo $_REQUEST['msg'];
		}
    ?>
    &nbsp;</p>
    <div id="show1">
      <table width="100%" border="1" cellspacing="5" class="table table-hover" id="table_id">
      	<thead>
        <tr style="background:#CCCCCC">
          <th width="10%" scope="col"><strong>User ID</strong></th>
          <th width="13%" scope="col"><strong>User Name</strong></th>
          <th width="14%" scope="col"><strong>First Name</strong></th>
          <th width="16%" scope="col"><strong>Last Name</strong></th>
          <th width="15%" scope="col"><strong>Email</strong></th>
          <th width="12%" scope="col"><strong>User Role</strong></th>
          <th width="20%" scope="col"><strong>Action</strong></th>
        </tr>
        </thead>
        <tbody>
        <?php while($row=mysqli_fetch_array($result)){
			?>
        <tr>
          <td> <?php echo $row['user_id']; ?> &nbsp; </td>
          <td> <?php echo $row['username']; ?> &nbsp;</td>
          <td> <?php echo $row['fname']; ?> &nbsp;</td>
          <td> <?php echo $row['lname']; ?> &nbsp;</td>
          <td> <?php echo $row['email']; ?> &nbsp;</td>
          <td> <?php echo $row['user_role_name']; ?> &nbsp;</td>
          <td> 
          <a href="edituser.php?user_id=<?php echo $row['user_id']; ?>" rel="facebox">
          <button class="btn btn-primary" type="button"> <i class="glyphicon glyphicon-edit icon-write"></i> Edit </button></a> &nbsp;
          
          <a href="deleteuser.php?user_id=<?php echo $row['user_id']; ?>" onClick="return del('a User?')"> 
		  <?php if($row['user_id']!=$_SESSION['mdcc_user_id'] && $row['user_role_name']!="Super Admin"){ ?>
          <button class="btn btn-danger" type="button"> <i class="glyphicon glyphicon-trash icon-write"></i> Delete </button></a> &nbsp;
          <?php } ?></td>
        </tr>
        <?php } ?>
        </tbody>
      </table>
      </div>
      <p>&nbsp;</p></td>
    </tr>
</table>
</div>
              
        <div id="footer" class="height35">
           <?php include('../ssi/footer.php'); ?>
        </div>
        
  </div>
    
 </div>
</body>	

</html>