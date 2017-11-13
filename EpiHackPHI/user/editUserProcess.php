<?php

//To start the session and if not login to the system, redirect to the index page 
include("../ssi/session_handling.php");

//data con
require_once("../common/dbconnection_inc.php"); 
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$urole=$_POST['urole'];
$number=$_POST['number'];
$password=$_POST['password'];
$user_id=$_REQUEST['user_id'];
$NewPassword=sha1($password);


$sql="UPDATE user SET fname='$fname',lname='$lname',email='$email',user_role_id='$urole', number='$number' WHERE user_id='$user_id'";
mysqli_query($conn,$sql);

if($password!=""){
$sql1="UPDATE login SET password='$NewPassword' WHERE user_id='$user_id'";
mysqli_query($conn,$sql1);
}


$msg="A record has been successfully updated";

header("Location:usermanagement.php?msg=$msg");


?>
