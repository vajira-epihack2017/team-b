<?php

//To start the session and if not login to the system, redirect to the index page 
include("../ssi/session_handling.php");

//data con
require_once("../common/dbconnection_inc.php"); 

$user_name=$_SESSION['mdcc_username'];


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
<?php include('../ssi/datepicker.php');?>
<?php //include('../ssi/datepicker_today.php');?>



	<style type="text/css">
		#main li{line-height: 1;}
		#main hr{margin-top: 5px; margin-bottom: 5px;}
	</style>
    
    <style type="text/css">
		.w1{ width:340px;}
	</style>
    
<!-- Text box : user can type only numbers and / -->
	<script type="text/javascript">
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode != 46 && charCode > 31
        && charCode != 47 && (charCode < 48 || charCode > 57))
            return false;
    
        return true;
    }
    </script>    
    
<script type="text/javascript">
function checkMDCCno(str)
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
xmlhttp.open("GET","getMDCCno.php?id="+str,true);
xmlhttp.send();
}
</script>

<script>
function checkPatientRegistrationForm(){
	if(document.getElementById('mdcc_no').value==""){
		document.getElementById('show').innerHTML="MDCC number can not be blank";
		document.getElementById('mdcc_no').focus();
		 return false;		
		}
	if(document.getElementById('baby_name').value==""){
		document.getElementById('show').innerHTML="Patient name can not be blank";
		document.getElementById('baby_name').focus();
		 return false;		
		}
	if(document.getElementById('datepicker').value==""){
		document.getElementById('show').innerHTML="Date of birth can not be blank";
		document.getElementById('datepicker').focus();
		 return false;		
		}
		
		var mdcc_no=/^([1-9]){1}[0-9]{0,3}[/][0-9]{1}[0-9]{1}$/;
	if(!document.getElementById('mdcc_no').value.match(mdcc_no)){
		alert("MDCC number does not match the XXX/YY format, e.g. 145/15 without first zeroes.");
		document.getElementById('mdcc_no').focus();
		document.getElementById('mdcc_no').select();
		return false;
		}
				
		var name=/^[a-zA-Z ]+$/;
	if(!document.getElementById('baby_name').value.match(name)){
		alert("Invalid Name.");
		document.getElementById('baby_name').focus();
		document.getElementById('baby_name').select();
		return false;
		}	

		var date=/^(19|20)\d\d[\- /.](0[1-9]|1[012])[\- /.](0[1-9]|[12][0-9]|3[01])$/;
	if(!document.getElementById('datepicker').value.match(date)){
		alert("Date does not match the YYYY-MM-DD format.");
		document.getElementById('datepicker').focus();
		document.getElementById('datepicker').select();
		return false;
		}	
	}
</script>


</head>
<!-- include class in the body tag for sidebar/navigation -->
<body class="drawer drawer-right" onLoad="getTime()">
	<?php include('../ssi/sidebar.php');?>

  <div id="master">
  
        <div id="banner">
            <?php include('../ssi/header.php');?>
        </div> 

    <div id="nav" style="color:white">
			<?php include('../ssi/navigation.php');?>
    </div>
    
    &nbsp;</div>

<div id="content" style="min-height:400px">


<h2 align="center"> Change Password   </h2>
<p align="center">&nbsp;</p>

<table width="80%" border="0" align="center" cellspacing="5">
  <tr>
    <th scope="col">
       
        <a href="../login/usermenu.php"/>
    	<button class="btn btn-primary"><i class="glyphicon glyphicon-home"></i> Home </button>
       
    </th>
    <th width="43%" >&nbsp;  </th>
  </tr>
</table>
<p><br/>
  
</p>
<form method="post" action="change_password_process.php" onSubmit="return checkPatientRegistrationForm()">
  <table width="50%" border="0" align="center">
  <tr>
    <td><table border="0" class="table t1">
      <tr>
         <td colspan="3" style="text-align:center"><span id="show"> </span> 
        <span style="color:#F00; font-size:16px; font-style:italic; ">
   				 <?php if(isset($_REQUEST['msg'])){
					echo base64_decode($_REQUEST['msg']);
					}
				 ?>  &nbsp;</span>
    &nbsp;</td>
      </tr>
      <tr>
        <td>User Name</td>
        <td>:</td>
        <td><input type="text" class="textbox w1 form-control" id="uname" name="uname" value="<?php echo $user_name; ?>" readonly/></td>
      </tr>
      <tr>
        <td>Current Password<span style="color:red;">*</span></td>
        <td>:</td>
        <td><input type="password" class="textbox w1 form-control" id="current_password" name="current_password" /></td>
      </tr>
      <tr>
        <td>New Password<span style="color:red;">*</span></td>
        <td>:</td>
        <td><input class="textbox w1 form-control text-capitalize" type="password" id="pass" name="pass"/></td>
      </tr>
      <tr>
        <td>Confirm Password<span style="color:red;">&nbsp;*</span></td>
        <td>:</td>
        <td><input class="textbox w1 form-control text-capitalize" type="password" id="cpass" name="cpass"/></td>
      </tr>
      <tr>
        <td><span style="color:red;">&nbsp;*</span> <span  style="font-family:Tahoma, Geneva, sans-serif"> Required Field</span></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><button type="submit" class="btn btn-success"> <i class="glyphicon glyphicon-ok"></i> Register </button> &nbsp;
        	<button type="reset" class="btn btn-primary"> <i class="glyphicon glyphicon-refresh"></i> Clear </button> &nbsp;
            <a href="../login/usermenu.php"> <button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Cancel </button></a> &nbsp;
        </td>
      </tr>
    </table></td>
    </tr>
</table>
<br/>
 
</form>
  <br/><br/>
</div>
              
        <div id="footer" class="height35">
           <?php include('../ssi/footer.php');?>
        </div>
        
  </div>
    
 </div>
</body>	

</html>