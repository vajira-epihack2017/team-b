<?php

//To start the session and if not login to the system, redirect to the index page 
include("../ssi/session_handling.php");

$created_by=$_SESSION['mdcc_username']
?>

<?php 

//data con
require_once("../common/dbconnection_inc.php"); 

$pat_id=$_POST['pat_id'];

$phi_ref=$_POST['phi_ref'];
$moh_not=$_POST['moh_not'];
$phi_ran=$_POST['phi_ran'];
$moh_area=$_POST['moh_area'];
$notified=$_POST['notified'];
$notified_date=$_POST['notified_date'];
$conf_dis=$_POST['conf_dis'];
$conf_date=$_POST['conf_date'];
$pat_name=$_POST['pat_name'];
$move_address=$_POST['move_address'];
$pat_age=$_POST['pat_age'];
$ethnic=$_POST['ethnic'];
$onset_date=$_POST['onset_date'];
$hos_date=$_POST['hos_date'];
$dis_date=$_POST['dis_date'];
$lab_out=$_POST['lab_out'];
$outbreak=$_POST['outbreak'];
$isolate=$_POST['isolate'];


date_default_timezone_set("Asia/Colombo");
$created_on=date("Y-m-d H:i:s");


if(1==2){
		$msg=base64_encode("<font color='#FF0000'>ID is exsiting...</font>");
		header("location:phi_form.php?msg=$msg");

	} else{
		///echo $sqlin_phi_form="INSERT INTO phi ('', '$phi_ref', '$moh_not', '$phi_ran', '$moh_area', '$notified', '$notified_date', '$conf_dis', '$conf_date', '$pat_name', '$move_address', '$pat_age', '$ethnic', '$onset_date', '$hos_date', '$dis_date', '$lab_out', '$outbreak', '$isolate', '111', '$created_by', '$created_on', '', '')";
		
		//echo $sqlin_phi_form="INSERT INTO `phi`.`phi` (`id`, `phi_ref`, `moh_not`, `phi_ran`, `moh_area`, `notified`, `notified_date`, `conf_dis`, `conf_date`, `pat_name`, `move_address`, `pat_age`, `ethnic`, `onset_date`, `hos_date`, `dis_date`, `lab_out`, `outbreak`, `isolate`, `status`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES (NULL, '10000034', 'werwe', 'werwe', 'werw', 'ewrwe', '2017-11-22 00:00:00', 'werwerwe', '2017-11-01 00:00:00', 'werwer', 'werwer', '1', 'sdfsdfsd', '2017-11-08 00:00:00', '2017-11-09 00:00:00', '2017-11-10 00:00:00', 'sdfsdfsd', 'sdfsdf', 'sdfsd', '22', 'sdfsdf', '2017-11-01 00:00:00', 'sdfsdf', '2017-11-29 00:00:00');";
		
		$sqlin_phi_form="INSERT INTO `phi`.`phi` (`id`, `phi_ref`, `moh_not`, `phi_ran`, `moh_area`, `notified`, `notified_date`, `conf_dis`, `conf_date`, `pat_name`, `move_address`, `pat_age`, `ethnic`, `onset_date`, `hos_date`, `dis_date`, `lab_out`, `outbreak`, `isolate`, `status`, `created_by`, `created_on`, `modified_by`, `modified_on`, `pat_id`) VALUES ('', '$phi_ref', '$moh_not', '$phi_ran', '$moh_area', '$notified', '$notified_date', '$conf_dis', '$conf_date', '$pat_name', '$move_address', '$pat_age', '$ethnic', '$onset_date', '$hos_date', '$dis_date', '$lab_out', '$outbreak', '$isolate', 'pending', '$created_by', '$created_on', '', '', '$pat_id');";
		
		
		
	
		if (mysqli_query($conn,$sqlin_phi_form)){
			$msg=base64_encode("<font color='#00FF00'>Record Successfully Added to the Database... </font>");
			 
		}else{
			$msg=base64_encode("<font color='#FF0000'>Sorry, Record Update Fail. Please try again...</font>");
			
		}
		header("location:msg_mobuzz.php?msg=$msg");
		}


?>
