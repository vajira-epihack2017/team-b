<?php

//To start the session and if not login to the system, redirect to the index page 
include("../ssi/session_handling.php");

$user_id=$_REQUEST['user_id'];

//data con
require_once("../common/dbconnection_inc.php"); 
$sqluser="SELECT * FROM user u, user_role ur,login l WHERE u.user_role_id=ur.user_role_id AND l.user_id=u.user_id AND u.user_id='$user_id'";
$resultuser=mysqli_query($conn,$sqluser);
$rowuser=mysqli_fetch_assoc($resultuser);


//To start the session
if(!isset($_SESSION)){
	session_start();	
}
$role_id=$_SESSION['mdcc_user_role_id'];

//data con
require_once("../common/dbconnection_inc.php"); 
$sql="SELECT * FROM user_role";
$result=mysqli_query($conn,$sql);
?>

<script type="text/javascript">
function checkUserName(str)
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
    document.getElementById("show").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getUserName.php?id="+str,true);
xmlhttp.send();
}
</script>

<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../css/layout.css"/>
<style type="text/css"> #msg{color:#F00; font-style:italic;} </style>
<form method="post" action="editUserProcess.php?user_id=<?php echo $user_id; ?> " onsubmit="return checkForm()">

<table width="50%" border="0" align="center" cellspacing="5" class=" table table-condensed table-hover t1">
  <tr>
    <td><span id="msg"></span> &nbsp;</td>
  </tr>
  <tr>
    <td>First Name</td>
  </tr>
  <tr>
    <td><label for="fname"></label><input type="text" name="fname" id="fname" required value="<?php echo $rowuser['fname'];?>"> &nbsp; </td>
  </tr>
  <tr>
    <td>Last Name</td>
  </tr>
  <tr>
    <td><label for="lname"></label><input type="text" name="lname" id="lname" required value="<?php echo $rowuser['lname'];?>"> &nbsp; </td>
  </tr>
  <tr>
    <td>Email</td>
  </tr>
  <tr>
    <td><label for="email"></label><input type="text" name="email" id="email" required value="<?php echo $rowuser['email'];?>"> &nbsp; </td>
  </tr>
  <tr>
    <td>User Role</td>
  </tr>
  <tr>
    <td><select name="urole" id="urole" >
    <option value="<?php echo $rowuser['user_role_id'];?>">
    <?php echo $rowuser['user_role_name'];?>
    </option>
    <?php while($row=mysqli_fetch_array($result)){ 
	if($rowuser['user_role_name']==$row['user_role_name']){
		continue;
		}
	
	
	?>
    	<option value="<?php echo $row['user_role_id']; ?>">
        <?php echo $row['user_role_name']; ?>
        </option>
    <?php } ?>
    </select> &nbsp; </td>
  </tr>
  <tr>
    <td>Ward or MOH Number</td>
  </tr>
  <tr>
    <td><input type="text" name="number" id="number" value="<?php echo $rowuser['number'];?>"></td>
  </tr>
  <tr>
    <td>User Name</td>
  </tr>
  <tr>
    <td> <input type="text" name="uname" id="uname" onkeyup="checkUserName(this.value)"  required value="<?php echo $rowuser['username'];?>" disabled> &nbsp; <span id="show"> </span> </td>
  </tr>
  <tr>
    <td>Change Password (If required only)</td>
  </tr>
  <tr>
    <td> <input type="text" name="password" id="password"></td>
  </tr>
  <tr>
    <td><button type="submit" class="btn btn-primary"> <i class="glyphicon glyphicon-edit"></i> Edit </button> &nbsp;</td>
  </tr>
</table>
</form>