<?php

//To start the session and if not login to the system, redirect to the index page 
include("../ssi/session_handling.php");

$created_by=$_SESSION['mdcc_username']
?>

<?php 

//data con
require_once("../common/dbconnection_inc.php"); 

$pat_id=$_POST['pat_id']; 

$rdhs=$_POST['rdhs']; 
$moh_area=$_POST['moh_area']; 
$moh_reg_no=$_POST['moh_reg_no']; 
$age_year=$_POST['age_year']; 
$age_months=$_POST['age_months']; 
$gender=$_POST['gender']; 
$occupation=$_POST['occupation']; 
$source_of_notification=$_POST['source_of_notification']; 
$specify=$_POST['specify']; 
$disease_as_notified=$_POST['disease_as_notified']; 
$disease_as_confirmed=$_POST['disease_as_confirmed']; 
$confirmed_by=$_POST['confirmed_by']; 
$nature_of_confirmation=$_POST['nature_of_confirmation']; 
$date_of_onset=$_POST['date_of_onset']; 
$date_of_notification=$_POST['date_of_notification']; 
$date_of_confirmation=$_POST['date_of_confirmation']; 
$lat=$_POST['lat']; 
$lon=$_POST['lon']; 


date_default_timezone_set("Asia/Colombo");
$created_on=date("Y-m-d H:i:s");


if(1==2){
		$msg=base64_encode("<font color='#FF0000'>ID is exsiting...</font>");
		header("location:moh_form.php?msg=$msg");

	} else{
		echo $sqlin_moh_form="INSERT INTO moh VALUES('', '$pat_id', '$rdhs', '$moh_area', '$moh_reg_no', '$age_year', '$age_months', '$gender', '$occupation', '$source_of_notification', '$specify', '$disease_as_notified', '$disease_as_confirmed', '$confirmed_by', '$nature_of_confirmation', '$date_of_onset', '$date_of_notification', '$date_of_confirmation', '', '', 'updated', '$created_by', '$created_on', '', '')";
	
		if (mysqli_query($conn,$sqlin_moh_form)){
			$msg=base64_encode("<font color='#00FF00'>Record Successfully Added to the Database... </font>");
			 
		}else{
			$msg=base64_encode("<font color='#FF0000'>Sorry, Record Update Fail. Please try again...</font>");
			
		}
		header("location:../moh_dashboard/moh_dashboard.php?msg=$msg");
		}


?>
