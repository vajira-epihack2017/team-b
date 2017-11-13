<?php

//To start the session and if not login to the system, redirect to the index page 
include("../ssi/session_handling.php");

date_default_timezone_set("Asia/Colombo");
$today=date("Y-m-d");

//To start the session and if not login to the system, redirect to the index page 
include("../ssi/session_handling.php");

//data con
require_once("../common/dbconnection_inc.php"); 
//$sql544="SELECT * FROM hospital_form";
//$result544=mysqli_query($conn,$sql544);
//$row544=mysqli_fetch_assoc($result544);

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
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
              rel="stylesheet">



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


<h2 align="center"> COMMUNICABLE DISEASE - PART II</h2>
<p align="center">

<?php if(isset($_REQUEST['msg'])){
			echo base64_decode($_REQUEST['msg']);
		}
    ?>&nbsp;</p>

<table width="80%" border="0" align="center" cellspacing="5">
  <tr>
    <th scope="col">
       
        <a href="../login/usermenu.php"/>
    	<button class="btn btn-primary"><i class="glyphicon glyphicon-home"></i> Home </button>

        
    </th>
    <th width="43%" >&nbsp;  </th>
  </tr>
</table>
<br/><br/>
<!--*******************************-->


							<table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
										<td> </td>
                                        <td> Ref no</td>
										<td> Date</td>
                                        <td> Name</td>
                                        <td> Address </td>
                                        <td> Tel. No </td>
                                        <td> Action </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    
									<?php
									
										//$sql544="SELECT * FROM hospital_form";
										//$result544=mysqli_query($conn,$sql544);
										
										 //$comments = mysqli_query($sql544, $conn);
										 //while ($row = mysql_fetch_array($comments, MYSQL_ASSOC)) {
										
										
										//$sql="SELECT * FROM epihack.tbl_patient_data";
										$sql="SELECT *, tbl_patient_data.pat_id AS ptid, tbl_patient_data.pat_name AS ptnm FROM tbl_patient_data LEFT JOIN phi ON phi.pat_id = tbl_patient_data.pat_id WHERE phi.pat_id IS NULL";
										
										$result544=mysqli_query($conn, $sql);

										$p = 0;
										while($row544w=mysqli_fetch_array($result544)){
                                            $p = $p + 1;
											echo "<tr>";
											echo "<th>" . $p . "</th>";
											echo "<th>" . $row544w["pat_refno"] . "</th>";
											echo "<th>" . $row544w["pat_invdate"] . "</th>";
											echo "<th>" . $row544w["ptnm"] . "</th>";
											echo "<th>" . $row544w["pat_street"] ." ". $row544w["pat_sward"] . "</th>";
											echo "<th>" . $row544w["pat_mobile"] . "</th>";
											echo " <th>
										<a href='../phi_form/phi_form.php?id=" . $row544w["ptid"] . "' class='btn btn-small btn-success'><i class='btn-icon-only icon-ok'> </i>Complete</a>
											 </th>";
											echo "</tr>";
										}
									?>
									
								</tbody>
							</table>


<!--*******************************-->
<br/><br/>
</div>
              
        <div id="footer" class="height35">
           <?php include('../ssi/footer.php');?>
        </div>
        
  </div>
    
 </div>
</body>	

</html>