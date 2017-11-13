<?php

//To start the session and if not login to the system, redirect to the index page 
include("../ssi/session_handling.php");

$un=$_GET['id'];
//data con
require_once("../common/dbconnection_inc.php"); 
$sql="SELECT * FROM login WHERE username='$un'";
$result=mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);
if($count!=0){
	echo "<font color='#FF0000'> Existing </font>";
	
} else{
	echo "<font color='green'> Not Existing </font>";
}
?>