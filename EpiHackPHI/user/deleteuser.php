<?php

//To start the session and if not login to the system, redirect to the index page 
include("../ssi/session_handling.php");
require_once("../common/dbconnection_inc.php"); 
$user_id=$_REQUEST['user_id'];

$sql="SELECT * FROM user u, user_role ur,login l WHERE u.user_role_id=ur.user_role_id AND l.user_id=u.user_id AND u.user_id=$user_id";
$result_user=mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result);


//data con
if($user_id!=$_SESSION['mdcc_user_id'] && $row['user_role_name']!='Super Admin'){
require_once("../common/dbconnection_inc.php"); 
$userdel="DELETE FROM user WHERE user_id='$user_id'";
$logindel="DELETE FROM login WHERE user_id='$user_id'";
$reuserdel=mysqli_query($conn,$userdel);
$relogindel=mysqli_query($conn,$logindel);
if($relogindel && $reuserdel){
		header("Location:usermanagement.php?msg=$msg");
	}
} else{
	header("Location:usermanagement.php?msg=User%20can%20not%20be%20deleted");
}

?>