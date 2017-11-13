<?php

//data con
require_once("../common/dbconnection_inc.php"); 

//To start the session and if not login to the system, redirect to the index page 
include("../ssi/session_handling.php");

if(isset($_POST['generate'])){


$sql = "SELECT * FROM `phi` WHERE ethnic='burgher';";
$result=mysqli_query($conn, $sql);
//$row1=mysqli_fetch_assoc($result);
$count=mysqli_num_rows($result);

$sql1 = "SELECT * FROM `phi` WHERE ethnic='Other';";
$result1=mysqli_query($conn, $sql1);
$count1=mysqli_num_rows($result1);

$sql2 = "SELECT * FROM `phi` WHERE ethnic='Sinhalese';";
$result2=mysqli_query($conn, $sql2);
$count2=mysqli_num_rows($result2);

$sql3 = "SELECT * FROM `phi` WHERE ethnic='tamil';";
$result3=mysqli_query($conn, $sql3);
$count3=mysqli_num_rows($result3);

$sql4 = "SELECT * FROM `phi` WHERE ethnic='Muslim';";
$result4=mysqli_query($conn, $sql4);
$count4=mysqli_num_rows($result4);

}

?>


<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>epihack</title>
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

<!-- Live Search -->  
  
<script src="../js/typeahead.min.js"></script>
    
<script>
    $(document).ready(function(){
    $('input.mdcc_no').typeahead({
        name: 'mdcc_no',
        remote:'../ssi/search_mdcc_no.php?key=%QUERY',
        limit : 10
    });
});
</script>

<!-- Text box : user can type only numbers only for phone numbers -->
	<script type="text/javascript">
    function isPhoneNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode != 46 && charCode > 31
        && (charCode < 48 || charCode > 57))
            return false;
    
        return true;
    }
    </script>
    

<!-- check patient name Ajax -->
<script type="text/javascript">
function checkPatientName(str)
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
    document.getElementById("show1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","../ssi/getPatientName.php?id="+str,true);
xmlhttp.send();
}
</script>

<script src="../js/highcharts.js"></script>
<script src="../js/highcharts_exporting.js"></script>


<script>

$(function () {
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Ethnicity Summary'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: "Brands",
            colorByPoint: true,
            data: [
			
			
			<?php if($count!=0){?>{
                name: "Burgher",
                y: <?php echo $count; ?>
            },<?php } ?> 
			
			
			<?php if($count1!=0){?>{
                name: "Others",
                y: <?php echo $count1; ?>
            },<?php } ?> 
			
			
			<?php if($count2!=0){?>{
                name: "Sinhala",
                y: <?php echo $count2; ?>
            },<?php } ?> 
			
			
			<?php if($count3!=0){?>{
                name: "Tamil",
                y: <?php echo $count3; ?>
            },<?php } ?> 
			
			
			<?php if($count4!=0){?>{
                name: "Muslim",
                y: <?php echo $count4; ?>
            },<?php } ?> 
						 			
]
        }]
    });
});

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


<h2 align="center"> <strong>Ethnicity Summary </strong></h2>
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
<form action="ethnicity.php" method="post">
  <div align="left">


  <table width="772" border="0" class="table-condensed t1">
    <tbody>
      <tr>
        <td width="16">&nbsp;</td>
        <td width="134" valign="top"><strong</strong>
        <td width="29" valign="top">:</td>
        <td width="371"> </span>
        
        &nbsp;</td>
        <td width="200"><button type="submit" name="generate" class="btn btn-primary"> Generate </button></td>
      </tr>
    </tbody>
  </table>
</div>
 </form>

<?PHP if(isset($_POST['generate'])){ ?>

<br/>
  <div id="boxprint">
    <br/>
  <?php if($count!=0 or $count1!=0 or $count2!=0 or $count3!=0 or $count4!=0){ ?>
  
  
  
  <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
  
  
  <br />
  
  
    
</div> <!-- Print DiV end -->
   
   <br/>
   
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