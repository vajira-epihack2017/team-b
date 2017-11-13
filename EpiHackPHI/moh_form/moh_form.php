<?php

//To start the session and if not login to the system, redirect to the index page 
include("../ssi/session_handling.php");

//data con
require_once("../common/dbconnection_inc.php"); 

date_default_timezone_set("Asia/Colombo");
$today=date("Y-m-d");

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
<?php include('../ssi/datepicker2.php');?>
<?php include('../ssi/datepicker3.php');?>




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
				
		var name=/^[a-zA-Z /]+$/;
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
		
	if(document.getElementById('datepicker').value>"<?php echo $today ?>"){
		alert("You can not select future dates.");
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


<h2 align="center"> COMMUNICABLE DISEASE - PART II (411A)</h2>
<p align="center">&nbsp;</p>

<table width="80%" border="0" align="center" cellspacing="5">
  <tr>
    <th scope="col">
       
        <a href="../login/usermenu.php"/>
    	<button class="btn btn-primary"><i class="glyphicon glyphicon-home"></i> Home </button>

        <a href="Patient_Registration_Management.php"/>
    	<button class="btn btn-primary"><i class="glyphicon glyphicon-tag"></i>  Management </button>
        
        <a href="moh_form.php"/>
    	<button class="btn btn-primary"><i class="glyphicon glyphicon-user"></i> Add Record </button>
        
    </th>
    <th width="43%" >&nbsp;  </th>
  </tr>
</table>
<p><br/>
  
</p>
<form method="post" action="add_moh_form.php" onSubmit="return checkPatientRegistrationForm()">
  <table width="50%" border="0" align="center">
  <tr>
    <td><table border="0" class="table t1">
      <tr>
         <td colspan="3" style="text-align:center"><span id="show" style="color:#FF0000"> </span> 
        <span style="color:#F00; font-size:16px; font-style:italic; ">
   				 <?php if(isset($_REQUEST['msg'])){
					echo base64_decode($_REQUEST['msg']);
					}
				 ?>  &nbsp;</span>
    &nbsp;</td>
      </tr>
<!--      <tr>
        <td>Hospital ID</td>
        <td>:</td>
        <td><input type="text" class="textbox w1 form-control" id="hospital_id" name="hospital_id"/></td>
      </tr> -->
      <tr>
        <td>RDHS Div<span style="color:red;">&nbsp;*</span></td>
        <td>:</td>
        <td><input class="textbox w1 form-control text-uppercase" type="text" id="rdhs"  name="rdhs" value="CMC"></td>
      </tr>
      <tr>
        <td>MOH Area<span style="color:red;">&nbsp;*</span></td>
        <td>:</td>
        <td><select class="textbox w1 form-control text-uppercase" name="moh_area" id="moh_area">
                <option value=""> Please Select </option>
                <option value="d1"> D1 </option>
                <option value="d2a"> D2A </option>
                <option value="d2b"> D2B </option>
                <option value="d3"> D3 </option>
                <option value="d4"> D4 </option>
                <option value="d5"> D5</option>

              </select></td>
      </tr>
      <tr>
        <td>MOH Register No.</td>
        <td>:</td>
        <td><input class="textbox w1 form-control text-uppercase" type="text" id="moh_reg_no"  name="moh_reg_no"></td>
      </tr>
      <tr>
        <td>Age of Patient</td>
        <td>:</td>
        <td>
        <input class="textbox w1 form-control text-uppercase" type="number" id="age_year"  name="age_year" placeholder="Year(s)"> <br/>
        <input class="textbox w1 form-control text-uppercase" type="number" id="age_months"  name="age_months" placeholder="Month(s)">
        </td>
      </tr>
      <tr>
        <td>Sex of Patient</td>
        <td>:</td>
        <td>
        <label class="radio-inline"><input type="radio" name="gender" id="male" value="Male">Male</label>
        <label class="radio-inline"><input type="radio" name="gender" id="female" value="female">Female</label>
        </td>
      </tr>
      <tr>
        <td>Occupation</td>
        <td>:</td>
        <td><input class="textbox w1 form-control text-uppercase" type="text" id="occupation"  name="occupation"></td>
      </tr>
      <tr>
        <td>Source of Notification<span style="color:red;">&nbsp;*</span></td>
        <td>:</td>
        <td><select class="textbox w1 form-control text-uppercase" name="source_of_notification" id="source_of_notification">
                <option value=""> Please Select </option>
                <option value="hospital"> Hospital </option>
                <option value="dispensary"> Dispensary </option>
                <option value="phi"> PHI </option>
                <option value="gramasevaka"> Gramasevaka </option>
                <option value="school_teacher"> School Teacher </option>
                <option value="private_practitioner"> Private Practitioner </option>
				<option value="ayurvedic_physician"> Ayurvedic Physician </option>
                <option value="estate_superintendent"> Estate Superintendent </option>
                <option value="other"> Other </option>
                <option value="active_servelance by_phi" selected> Active Servelance by PHI </option>
              </select></td>
      </tr>
      
      <tr id="other_yes" hidden="">
        <td>Specify</td>
        <td>:</td>
        <td ><textarea class="textbox w1 form-control text-uppercase" rows="5" id="specify" name="specify" cols="50"></textarea></td>
      </tr>
      
      <tr>
        <td>Disease as Notified</td>
        <td>:</td>
        <td><input class="textbox w1 form-control text-uppercase" type="text" id="disease_as_notified"  name="disease_as_notified"></td>
      </tr>
      <tr>
        <td>Disease as Confirmed</td>
        <td>:</td>
        <td><input class="textbox w1 form-control text-uppercase" type="text" id="disease_as_confirmed"  name="disease_as_confirmed"></td>
      </tr>
      <tr>
        <td>Confirmed by</td>
        <td>:</td>
                <td><select class="textbox w1 form-control text-uppercase" name="confirmed_by" id="confirmed_by">
                <option value=""> Please Select </option>
                <option value="hospital_mo"> Hospital M.O </option>
                <option value="moh"> MOH </option>
                <option value="other_govt_mo"> Other Govt.M.O </option>
                <option value="apothecary"> Apothecary </option>
                <option value="practitioner"> Practitioner </option>
              </select></td>
      </tr>
      <tr>
        <td>Nature of Confirmation</td>
        <td>:</td>
        <td><select class="textbox w1 form-control text-uppercase" name="nature_of_confirmation" id="nature_of_confirmation">
                <option value=""> Please Select </option>
                <option value="hospital_mo"> Clinical Only </option>
                <option value="clinical_and_epidemiological"> Clinical and Epidemiological </option>
                <option value="clinical_and_bacteriological"> Clinical and Bacteriological </option>
                <option value="clinical_and_serological"> Clinical and Serological </option>
                <option value="clinical_bacteriological_and_serological"> Clinical, Bacteriological and Serological </option>
                <option value="clinical_and_direct_microscop"> Clinical and Direct Microscopy </option>
              </select></td>
      </tr>
      <tr>
        <td>Date of Onset</td>
        <td>:</td>
        <td><input type="text" class="textbox w1 form-control text-uppercase" id="datepicker" name="date_of_onset" placeholder="YYYY-MM-DD" /></td>
      </tr>
      <tr>
        <td>Date of Notification</td>
        <td>:</td>
        <td><input type="text" class="textbox w1 form-control text-uppercase" id="datepicker2" name="date_of_notification" placeholder="YYYY-MM-DD" /></td>
      </tr>
      <tr>
        <td>Date of Confirmation</td>
        <td>:</td>
        <td><input type="text" class="textbox w1 form-control text-uppercase" id="datepicker3" name="date_of_confirmation" placeholder="YYYY-MM-DD" /></td>
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
	<script>
      $(function() {
        $( ".datepicker" ).datepicker({
          dateFormat: 'yy-mm-dd',
          changeMonth: true,
          changeYear: true,
          altField: "#alternate",
          altFormat: "yy MM d , DD"
        });
      });
      </script>
      
      	<script>
		$(document).ready(function(){
			$('#source_of_notification').change(function(){
				if(document.getElementById("source_of_notification").value == "other"){
					$('#other_yes').show('1000');
				}
				else{
				    $('#other_yes').hide('1000');
					document.getElementById("specify").value = "";
				
				}
				
			});
		});
		</script>
    </html>