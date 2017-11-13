<?php

//To start the session and if not login to the system, redirect to the index page 
include("../ssi/session_handling.php");

$user_id=$_SESSION['mdcc_user_id'];

//data con
require_once("../common/dbconnection_inc.php"); 
$current_password=$_POST['current_password'];
$pass=$_POST['pass'];
$cpass=$_POST['cpass'];


$user_select="SELECT * FROM login WHERE user_id='$user_id'";
$user_result=mysqli_query($conn,$user_select);
$user_row= mysqli_fetch_array($user_result);

$p=$user_row['password'];


$cp=sha1($current_password);


if($p!=$cp){
		$msg=base64_encode("<font color='#FF0000'>Sorry, Current password is wrong. Please check. . .</font>");
		header("location:change_password.php?msg=$msg");
		
	} elseif($pass!=$cpass){
			$msg=base64_encode("<font color='#FF0000'>Sorry, New password and confirm password not matched. Please check. . .</font>");
			header("location:change_password.php?msg=$msg");	
			}else{
				
				$epass=sha1($pass);
				$sql="UPDATE login SET password='$epass' WHERE user_id='$user_id'";
				mysqli_query($conn,$sql);
				
				$msg=base64_encode("<font color='#00FF00'>Password has been successfully updated</font>");
				header("Location:change_password.php?msg=$msg");
				
				}

?>
