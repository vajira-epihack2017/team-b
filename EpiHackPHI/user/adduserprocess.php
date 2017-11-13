<?php

//To start the session and if not login to the system, redirect to the index page 
include("../ssi/session_handling.php");

//data con
require_once("../common/dbconnection_inc.php"); 
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$uname=$_POST['uname'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$urole=$_POST['urole'];
$number=$_POST['number'];

$sql="SELECT * FROM login WHERE username='$uname'";
$result=mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);
if($count!=0){
		$msg="User Name is exsiting...";
		header("location:usermanagement.php?msg=$msg");
	} else{
		$sqlin="INSERT INTO user VALUES('','$fname','$lname', '$email', '$number', '$urole')";
		mysqli_query($conn,$sqlin);
		$user_id=mysqli_insert_id($conn); //mysqli_insert_id - > id of last record
		$epass=sha1($pass);
		$sqlinlog="INSERT INTO login VALUES('$uname', '$epass','$user_id')";
		mysqli_query($conn,$sqlinlog);
		$msg="User Name is exsiting...";
		header("Location:usermanagement.php");
		}

?>
