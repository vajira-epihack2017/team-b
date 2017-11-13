	<?php

//data con
require_once("../common/dbconnection_inc.php"); 

//To start the session and if not login to the system, redirect to the index page 
include("../ssi/session_handling.php");

$ethnicity_select="SELECT * FROM ethnicity";
$ethnicity_select_result=mysqli_query($conn,$ethnicity_select);

$district_select="SELECT * FROM district";
$district_select_result=mysqli_query($conn,$district_select);

$province_select="SELECT * FROM province";
$province_select_result=mysqli_query($conn,$province_select);

if(isset($_POST['generate'])){


$from=$_POST['from'];
$to=$_POST['to'];


$sql = "SELECT date_of_confirmation as district_name, count(id) as count_d
FROM moh
WHERE date_of_confirmation BETWEEN '$from' AND '$to'
GROUP BY date_of_confirmation";

//SELECT date_of_confirmation, count(id) FROM phi.moh group by date_of_confirmation;


$result=mysqli_query($conn, $sql);
$count=mysqli_num_rows($result);
}

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

	<style type="text/css">
		#main li{line-height: 1;}
		#main hr{margin-top: 5px; margin-bottom: 5px;}
	</style>
    
    
<script src="../js/highcharts.js"></script>
<script src="../js/highcharts_exporting.js"></script>

<script>
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Patient Dengue Confirmation Details'
        },
        subtitle: {
            text: 'From <?php echo $from; ?>  To <?php echo $to; ?>  '
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Confirmation (No of Patients)'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: 'Confirmation : <b>{point.y:.0f}</b>'
        },
        series: [{
            name: 'Patient Confirmation',
            data: [
			<?php while($row=mysqli_fetch_array($result)){ ?>
                ['<?php echo $row['district_name']; ?>', <?php echo $row['count_d']; ?>],

			<?php } ?>
            ],
            dataLabels: {
                enabled: true,
                rotation: 0,
                color: '#FFFFFF',
                align: 'center',
                format: '{point.y:.0f}', // one decimal
                y: 25, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });
});
</script>
    
        
<script>
function printDiv(divID) {
          
var prtContent = document.getElementById(divID);
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=600,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
    
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

<div id="content">


<h2 align="center"> <strong>Patient Dengue Confirmation Details</strong></h2>
<p align="center">&nbsp;</p>
<table width="80%" border="0" align="center" cellspacing="5">
  <tr>
    <th scope="col"> <a href="../login/usermenu.php">
      <button class="btn btn-primary"><i class="glyphicon glyphicon-home"></i> Home </button>
      </a> &nbsp;<a href="reports.php">
        <button class="btn btn-primary"><i class="glyphicon glyphicon-tag"></i> Reports</button>
        </a></th>
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
<form action="reports_patient_confirm.php" method="post">
  <div align="left">


  <table width="772" border="0" class="table-condensed t1">
    <tbody>
      <tr>
        <td width="16">&nbsp;</td>
        <td width="218" height="37">&nbsp;</td>
        <td width="12">&nbsp;</td>
        <td width="359">&nbsp;</td>
        <td width="145">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Date From</td>
        <td>:</td>
        <td><input type="text" name="from" class="textbox" id="datepicker" placeholder="Select a Date"/>&nbsp;</td>
        <td><button type="submit" name="generate" class="btn btn-primary"> Generate </button></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Date To</td>
        <td>:</td>
        <td><input type="text" name="to" class="textbox" id="datepicker2" placeholder="Select a Date"/>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td></td>
        <td>&nbsp;</td>
      </tr>
    </tbody>
  </table>
</div>
 </form>

<?PHP if(isset($_POST['generate'])){ ?>

<div id="boxprint">
<?php if($count!=0){ ?>

<div id="container" style="min-width: 300px; height: 400px; margin: 0 auto"></div>
 
</div> <!-- Print DiV end -->
   
<p align="center"> 
<button type="button" onClick="javascript:printDiv('boxprint')" class="btn btn-primary">
<i class="glyphicon glyphicon-file" ></i>Print</button>
</p>
   
	<?php }else{ ?>
<p align="center" class="alert-danger">No Records......</p>
<?php } ?>


<?PHP } ?>
  <br/>
	</div>
 </div>
              
        <div id="footer" class="height35">
           <?php include('../ssi/footer.php');?>
        </div>
        
 
    

</body>	

</html>