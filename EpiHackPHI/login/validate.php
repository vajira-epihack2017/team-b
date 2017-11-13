<?php
//Start a session
if(!isset($_SESSION)){
	session_start();
}

$t=time(); //Time ID
//Database connection
require_once("../common/dbconnection_inc.php");

//To get the User name and password and prevent from SQL injection
$username=mysqli_real_escape_string($conn,$_POST['username']); //To get the User Name
$p=mysqli_real_escape_string($conn,$_POST['pass']);

$pass=sha1($p); //To get the Password and get encrpted one



//To check the Username and password in the table (sql query)
$sql="SELECT * FROM login WHERE username='$username' AND password='$pass'";

//To execute the query
$result=mysqli_query($conn,$sql) 
or die("Query having an error ".mysqli_error($conn));

//To count the records
$count=mysqli_num_rows($result);

if($count!=0){
	//To get all details about User
	$sqluser="SELECT * FROM user u,login l,user_role ur
	WHERE l.username='$username' AND 
	l.password='$pass' AND u.user_id=l.user_id 
	AND u.user_role_id=ur.user_role_id";
	$resultuser=mysqli_query($conn,$sqluser) 
	or die("Query having an error ".mysqli_error($conn));
	
	//To get a record into an array 
	$rowuser=mysqli_fetch_assoc($resultuser);
	//To create sessions to store user details
	$_SESSION['mdcc_fname']=$rowuser['fname'];
	$_SESSION['mdcc_lname']=$rowuser['lname'];
	$_SESSION['mdcc_email']=$rowuser['email'];
	$_SESSION['mdcc_user_role_id']=$rowuser['user_role_id'];
	$_SESSION['mdcc_user_role_name']=$rowuser['user_role_name'];
	$_SESSION['mdcc_user_id']=$rowuser['user_id'];
	$_SESSION['mdcc_password']=$rowuser['password'];
	$_SESSION['mdcc_username']=$rowuser['username'];
	
	//Session ID for user
	$_SESSION['mdcc_session_id']=$rowuser['user_id']."_".$t;
	
	//To redirect to user previlege page.....
	header("Location:usermenu.php");
	
	
}else{
//Invalid User Name or Password
$msg="Invalid User Name or Password....";
header("Location:index.php?msg=$msg");
	
}


?>

