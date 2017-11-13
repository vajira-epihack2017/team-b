<?php

//To start the session and if not login to the system, redirect to the index page 
include("../ssi/session_handling.php");

//data con
require_once("../common/dbconnection_inc.php"); 


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

	<style type="text/css">
		#main li{line-height: 1;}
		#main hr{margin-top: 5px; margin-bottom: 5px;}
	</style>
    
        
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

<!-- Show / Hide check box -->
<script>
$(document).ready(function(){
    $('#other').change(function(){
        if(this.checked)
            $('#feedingOther').show('1000');
        else
            $('#feedingOther').hide('1000');

    });
});
</script>

<!-- Google Charts 

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1.1", {packages:["table"]});
      google.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('number', 'Salary');
        data.addColumn('boolean', 'Full Time Employee');
        data.addRows([
          ['Mike',  {v: 10000, f: '$10,000'}, true],
          ['Jim',   {v:8000,   f: '$8,000'},  false],
          ['Alice', {v: 12500, f: '$12,500'}, true],
          ['Bob',   {v: 7000,  f: '$7,000'},  true]
        ]);

        var table = new google.visualization.Table(document.getElementById('table_div'));

        table.draw(data, {showRowNumber: true, width: '70%', height: '100%'});
      }
    </script>-->


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

<div id="content">


<h2 align="center"> <strong>Reports</strong></h2>
<table width="80%" border="0" align="center" cellspacing="5">
  <tr>
    <th scope="col"> <a href="../login/usermenu.php">
      <button class="btn btn-primary"><i class="glyphicon glyphicon-home"></i> Home </button>
      </a></th>
  </tr>
  <tr>
    <th scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="2" scope="col"> <span style="color:#390; font-size:16px; font-style:italic; ">
      <?php if(isset($_REQUEST['msg'])){
			echo base64_decode($_REQUEST['msg']);
		}
    ?>
      &nbsp;</span>&nbsp;</th>
  </tr>
</table>
<p align="center">&nbsp;</p>

<div align="left"></div>
<table width="80%" border="0" align="center" class=" table">
  <tr align="center">
    <td><a href ="statistics.php"><img src="../images/reports_patient_registration_district_analysis.png" width="90" height="90"></a></td>
    <td><a href ="reports_patient_confirm.php"><img src="../images/reports_patient_registration.gif" width="90" height="90"></a></td>
    <td><a href ="ethnicity.php"><img src="../images/reports_patient_surgery_summary_chart.png" width="90" height="90"></a></td>
    <td>&nbsp;</td>
  </tr>
  <tr align="center">
    <td><a href ="statistics.php">
      <button type="button" class="btn btn-primary">statistics</button>
    </a> &nbsp; </td>    
    <td><a href ="reports_patient_confirm.php"><button type="button" class="btn btn-primary">Patient Confirmation</button></a></td>
    <td><a href ="ethnicity.php">
      <button type="button" class="btn btn-primary">Ethnicity</button>
    </a></td>
    <td></td>
  </tr>
  </table>



  
  
  
  </div>

  

  

</div>
              
        <div id="footer" class="height35">
           <?php include('../ssi/footer.php');?>
        </div>
        
  </div>
    
 </div>
</body>	

</html>