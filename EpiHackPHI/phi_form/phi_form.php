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
        <title>Communicable Disease Report </title>
        <link rel="stylesheet" type="text/css" href="../css/layout.css" />
        <link rel="icon" href="../images/title.png" />
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
        <script type="text/javascript" src="../js/jquery-1.8.3.min.js"></script>
<?php include('../ssi/datepicker.php'); ?>
        



        <style type="text/css">
            #main li{line-height: 1;}
            #main hr{margin-top: 5px; margin-bottom: 5px;}
        </style>

        <style type="text/css">
            .w1{ width:340px;}
        </style>

        <!--         Text box : user can type only numbers and / 
                <script type="text/javascript">
                    function isNumberKey(evt) {
                        var charCode = (evt.which) ? evt.which : event.keyCode;
                        if (charCode != 46 && charCode > 31
                                && charCode != 47 && (charCode < 48 || charCode > 57))
                            return false;
        
                        return true;
                    }
                </script>    -->

<!--        <script type="text/javascript">
            function checkMDCCno(str)
            {
                var xmlhttp;
                if (window.XMLHttpRequest)
                {// code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else
                {// code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function ()
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        document.getElementById("show").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "getMDCCno.php?id=" + str, true);
                xmlhttp.send();
            }
        </script>-->

<!--        <script>
            function checkPatientRegistrationForm() {

                if (document.getElementById('mdcc_no').value == "") {
                    document.getElementById('show').innerHTML = "MDCC number can not be blank";
                    document.getElementById('mdcc_no').focus();
                    return false;
                }
                if (document.getElementById('baby_name').value == "") {
                    document.getElementById('show').innerHTML = "Patient name can not be blank";
                    document.getElementById('baby_name').focus();
                    return false;
                }
                if (document.getElementById('datepicker').value == "") {
                    document.getElementById('show').innerHTML = "Date of birth can not be blank";
                    document.getElementById('datepicker').focus();
                    return false;
                }

                var mdcc_no = /^([1-9]){1}[0-9]{0,3}[/][0-9]{1}[0-9]{1}$/;
                if (!document.getElementById('mdcc_no').value.match(mdcc_no)) {
                    alert("MDCC number does not match the XXX/YY format, e.g. 145/15 without first zeroes.");
                    document.getElementById('mdcc_no').focus();
                    document.getElementById('mdcc_no').select();
                    return false;
                }

                var name = /^[a-zA-Z /]+$/;
                if (!document.getElementById('baby_name').value.match(name)) {
                    alert("Invalid Name.");
                    document.getElementById('baby_name').focus();
                    document.getElementById('baby_name').select();
                    return false;
                }

                var date = /^(19|20)\d\d[\- /.](0[1-9]|1[012])[\- /.](0[1-9]|[12][0-9]|3[01])$/;
                if (!document.getElementById('datepicker').value.match(date)) {
                    alert("Date does not match the YYYY-MM-DD format.");
                    document.getElementById('datepicker').focus();
                    document.getElementById('datepicker').select();
                    return false;
                }

                if (document.getElementById('datepicker').value > "<?php echo $today ?>") {
                    alert("You can not select future dates.");
                    document.getElementById('datepicker').focus();
                    document.getElementById('datepicker').select();
                    return false;
                }


            }
        </script>-->


    </head>
    <!-- include class in the body tag for sidebar/navigation -->
    <body class="drawer drawer-right" onLoad="getTime()">
<?php include('../ssi/sidebar.php'); ?>

        <div id="master">

            <div id="banner">
<?php include('../ssi/header.php'); ?>
            </div> 

            <div id="nav" style="color:white">
<?php include('../ssi/navigation.php'); ?>
            </div>

            &nbsp;</div>

        <div id="content" style="min-height:400px">


            <!--<h2 align="center"> PUBLIC HEALTH DEPARTMENT COMMUNICABLE DISEASE REPORT - PART 1   </h2>-->
            <p align="center">&nbsp;</p>

            <table width="80%" border="0" align="center" cellspacing="5">
                <tr>
                    <th scope="col">

                        <a href="../login/usermenu.php"/>
                        <button class="btn btn-primary"><i class="glyphicon glyphicon-home"></i> Home </button>

<!--                        <a href="Patient_Registration_Management.php"/>
                        <button class="btn btn-primary"><i class="glyphicon glyphicon-tag"></i> Patient Management </button>-->

                        <a href="phi_form.php"/>
                        <button class="btn btn-primary"><i class="glyphicon glyphicon-user"></i> Refresh </button><br/> <br/>

                        <span style="color:#F00; font-size:16px; font-style:italic; ">
<?php
if (isset($_REQUEST['msg'])) {
    echo base64_decode($_REQUEST['msg']);
}
?>  &nbsp;</span>

                    </th>
                    <th width="43%" >&nbsp;  </th>
                </tr>
            </table>
            <p><br/>

            </p>
            <!--            <form method="post" action="add_patient_process.php" onSubmit="return checkPatientRegistrationForm()">
                            <table width="100%" border="0" align="center">
                                <tr>
                                    <td><table border="0" class="table t1">
                                            <tr>
                                                <td colspan="3" style="text-align:center"><span id="show" style="color:#FF0000"> </span> 
                                                    <span style="color:#F00; font-size:16px; font-style:italic; ">
           
                                                    &nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td>Hospital ID</td>
                                              <td>:</td>
                                              <td><input type="text" class="textbox w1 form-control" id="hospital_id" name="hospital_id"/></td>
                                            </tr> 
                                            <tr>
                                                <td>Disease as notified<span style="color:red;">&nbsp;*</span></td>
                                                <td>:</td>
                                                <td><input type="text" class="textbox w1 form-control" id="mdcc_no" name="mdcc_no" onkeypress="return isNumberKey(event)" onKeyUp="checkMDCCno(this.value)" /></td>
                                                <td>Date<span style="color:red;">&nbsp;*</span></td>
                                                <td>:</td>
                                                <td><input type="text" id="datepicker" class="form-control" size="10" name="baby_date_of_birth" placeholder="YYYY-MM-DD" />
                                            </tr>
                                            <tr>
                                                <td>Disease as confirmed<span style="color:red;">&nbsp;*</span></td>
                                                <td>:</td>
                                                <td><input type="text" class="textbox w1 form-control" id="mdcc_no" name="mdcc_no" onkeypress="return isNumberKey(event)" onKeyUp="checkMDCCno(this.value)" /></td>
                                                <td>Date<span style="color:red;">&nbsp;*</span></td>
                                                <td>:</td>
                                                <td><input type="text" class="form-control" id="datepicker" size="10" name="baby_date_of_birth" placeholder="YYYY-MM-DD" />
                                            </tr>
                                            <tr>
                                                <td>Name of Patient<span style="color:red;">&nbsp;*</span></td>
                                                <td>:</td>
                                                <td><input class="textbox w1 form-control text-uppercase" type="text" id="baby_name" name="baby_name"/></td>
                                            </tr>
                                            <tr>
                                                <td>Patient's movements three weeks prior to onset address.<span style="color:red;">&nbsp;*</span></td>
                                                <td>:</td>
                                                <td><textarea class="textbox w1 form-control text-uppercase" type="" id="baby_name" name="baby_name"/></textarea></td>
                                            </tr>
                                            <tr>
                                                <td>Age<span style="color:red;">&nbsp;*</span></td>
                                                <td>:</td>
                                                <td><input class="textbox w1 form-control text-uppercase" type="number" id="baby_name" name="baby_name"/></td>
                                            </tr>
                                            <tr>
                                                <td>Ethnic Group<span style="color:red;">&nbsp;*</span></td>
                                                <td>:</td>
                                                <td><select class="form-control">
                                                                <option selected>Sinhalese</option>
                                                                <option>Tamil</option>
                                                                <option>Muslim</option>
                                                                <option>Burgher</option>
                                                                <option>Other</option>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td>Date of onset<span style="color:red;">&nbsp;*</span></td>
                                                <td>:</td>
                                                <td><input type="text" class="form-control" id="datepicker" size="10" name="baby_date_of_birth" placeholder="YYYY-MM-DD" />
                                            </tr>
                                            <tr>
                                                <td>Date of Hospitalization<span style="color:red;">&nbsp;*</span></td>
                                                <td>:</td>
                                                <td><input type="text" class="form-control" id="datepicker" size="10" name="baby_date_of_birth" placeholder="YYYY-MM-DD" />
                                            </tr>
                                            <tr>
                                                <td>Date of discharge<span style="color:red;">&nbsp;*</span></td>
                                                <td>:</td>
                                                <td><input type="text" class="form-control" id="datepicker" size="10" name="baby_date_of_birth" placeholder="YYYY-MM-DD" />
                                            </tr>
                                             <tr>
                                                <td>Laboratory Findings Outcome<span style="color:red;">&nbsp;*</span></td>
                                                <td>:</td>
                                                <td><textarea class="textbox w1 form-control text-uppercase" type="" id="baby_name" name="baby_name"/></textarea></td>
                                            </tr>
                                             <tr>
                                                <td>Where isolate nature of case one case in outbreak<span style="color:red;">&nbsp;*</span></td>
                                                <td>:</td>
                                                <td><input type="checkbox" name="vehicle" value="Bike"> Recovered<br>
                                                    <input type="checkbox" name="vehicle" value="Bike"> Died<br>
                                                    <input type="checkbox" name="vehicle" value="Bike">Home<br>
                                                    <input type="checkbox" name="vehicle" value="Bike"> Haospital<br>
                                                    <input type="checkbox" name="vehicle" value="Bike">Not isolated<br>
                                                    <input type="checkbox" name="vehicle" value="Bike"> Isolated case<br>
                                                    <input type="checkbox" name="vehicle" value="Bike"> Report needed<br>
                                                
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="panel panel-default" colspan="3">
                                                    <div class="panel-body " style="text-align: center"><b>CONTRACTS INVESTIGATED</b>
                                                        <table>
                                                            <thead>
                                                                <tr>
                                                            <th>Name</th>
                                                            <th>Age</th>
                                                            <th>Gender</th>
                                                            <th>Remarks</th>
                                                            <td></td>
                                                                </tr>
                                                            </thead>
                                                            <tr>
                                                                <td><input class="textbox w1 form-control text-uppercase" type="text" id="baby_name" name="baby_name"/></td>
                                                                <td><input class="textbox w1 form-control text-uppercase" type="number" id="baby_name" name="baby_name"/></td>
                                                                <td><input class="textbox w1 form-control text-uppercase" type="text" id="baby_name" name="baby_name"/></td>
                                                                <td><input class="textbox w1 form-control text-uppercase" type="text" id="baby_name" name="baby_name"/></td>
                                                                
                                                                <td><a href="#">+</a></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </td>
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
            
                        </form>-->
            <?php
            if (isset($_GET['id'])) {
//                    echo $_GET['id'];
                $id = $_GET['id'];
                $sql = "SELECT * FROM tbl_patient_data WHERE (pat_id=$id)";
                 $result = mysqli_query($conn, $sql);
//                $count=mysqli_num_rows($result);
                $row = mysqli_fetch_array($result);
            } else {
//                echo "no id";
                $row=null;
            }

            
//echo $sql; die;
           
//                echo $row['pat_name'];
//                die;
//                echo '<pre>';
//                print_r($row);
//                echo '</pre>';
//                die;
            ?>
            <div class="row well">


                <div class="col-md-12 panel panel-default">

                   

                    <div class="row"
                         <div class="col-md-6">
                            <h1>PUBLIC HEALTH DEPARTMENT</h1>
                            <h3>COMMUNICABLE DISEASE REPORT - PART 1</h3>

                        </div>

                        <form action="add_phi_process.php" method="POST">
                            <input type="text" name="pat_id" value="<?php if (isset($id)) {echo $id;} ?>" hidden>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <!--<div class="col-md-6" style="padding-left:0px">-->
                                    <label for="phiRef">PHI Reference No:</label>
                                    <input id="phiRef"type="text" class="form-control" name="phi_ref" value="" required>
                                    <!--</div>-->
                                    <!--<div class="col-md-6" style="padding-right:0px">-->
                                    <label for="mohNot">MOH Notification No:</label>
                                    <input id="mohNot"type="text" class="form-control" name="moh_not" value="" required>
                                    <!--</div>-->   
                                    <label for="phiRan">PHI Range:</label>
                                    <input id="phiRan"type="text" class="form-control" name="phi_ran" value="" required>
                                    <!--</div>-->
                                    <!--<div class="col-md-6" style="padding-right:0px">-->
                                    <label for="mohArea">MOH/HO/Area:</label>
                                    <input id="mohArea"type="text" class="form-control " name="moh_area" value="" required>
                                </div>
                            </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-md-6" style="padding-left:0px">
                            <label for="notified">Disease as notified:</label>
                            <input id="notified"type="text" class="form-control" name="notified" value="<?php echo $row['pat_virus'] ?>" v>
                        </div>
                        <div class="col-md-6" style="padding-right:0px">
                            <label for="notifiedDate">Date:</label>
                            <input id="notifiedDate"type="text" class="form-control " name="notified_date" value="<?php echo $row['pat_invdate'] ?>" required>
                        </div>   
                    </div>
                    <div class="form-group">
                        <div class="col-md-6" style="padding-left:0px">
                            <label>Disease as confirmed:</label>
                            <select name="conf_dis" class="form-control" required>
                                <option selected disabled>Please Select</option>
                                <option value="1">Cholera</option>
                                <option value="2">Plague</option>
                                <option value="3">Yellow Fever</option>
                                <option value="4">Acute Poliomyclitis / Acute Flaccid Paralysis</option>
                                <option value="5">Chicken pox</option>
                                <option value="6">Dengue Fever / Dengue Haemorhagic Fever</option>
                                <option value="7">Diptheria</option>
                                <option value="8">Dysentary</option>
                                <option value="9">Encephalitis</option>
                                <option value="10">Enteric Fever</option>
                                <option value="11">Food poisoning</option>
                                <option value="12">Human Rabies</option>
                                <option value="13">Leptospirosis</option>
                                <option value="14">Malaria</option>
                                <option value="15">Measles</option>
                                <option value="16">Meningitis</option>
                                <option value="17">Mumps</option>
                                <option value="18">Rubella / Congenital Rubella Syndrom</option>
                                <option value="19">Simple Continued Fever of over 7days or more</option>
                                <option value="20">Tetanus</option>
                                <option value="21">Neonatal Tetanus</option>
                                <option value="22">Typhus Fever</option>
                                <option value="23">Viral Hepatitis</option>
                                <option value="24">Whooping Cough</option>
                                <option value="25">Tuberculosis</option>
                                <option value="26">Other</option>
                            </select>
                            <!--<input id="confirmed"type="text" class="form-control" name="confirmed">-->
                        </div>
                        <div class="col-md-6" style="padding-right:0px">
                            <label for="confDate">Date:</label>
                            <input id="confDate" type="text" class="form-control " name="conf_date" required>
                        </div>   
                    </div>
                    <div class="form-group">
                        <label for="patName">Name of Patient:</label>
                        <input id="patName"type="text" class="form-control" name="pat_name" value="<?php echo $row['pat_name'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="moveAddress">Patients movements three weeks prior to onset address:</label>
                        <textarea name="move_address" id="moveAddress" class="form-control" required><?php echo $row['pat_street'] . ' , ' . $row['pat_sward']; ?></textarea>
                    </div>
<!--                    <div class="form-group">
                        <div class=" panel panel-default">
                            <div class="panel-body">
                                <h5>GPS Location</h5>
                                <div class="col-md-6">
                                    <label for="location">Lat</label>
                                    <input id="lat" type="text" class="form-control" name="lat" >
                                </div>
                                <div class="col-md-6">
                                    <label for="location">Lon</label>
                                    <input id="lon"type="text" class="form-control" name="lon" >
                                </div>
                            </div>
                        </div>
                    </div>-->
                    <div class="form-group">
                        <div class="col-md-6" style="padding-left:0px">
                            <label for="patAge">Age:</label>
                            <input id="patAge"type="number" class="form-control" name="pat_age" value="<?php echo $row['pat_yrs'] ?>" required>
                        </div>  
                        <div class="col-md-6" style="padding-right:0px">
                            <label>Ethnic Group:</label>
                            <select name="ethnic" class="form-control" required>
                                <option selected disabled>Please Select</option>
                                <option value="Sinhalese">Sinhalese</option>
                                <option value="Tamil">Tamil</option>
                                <option value="Muslim">Muslim</option>
                                <option value="Burgher">Burgher</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>   
                    </div>
                    <div class="form-group">
                        <div class="col-md-4" style="padding-left:0px">
                            <label>Date of onset:</label>
                            <input id="onSetDate"type="text" class="form-control " name="onset_date" value="<?php echo $row['pat_date'] ?>" required>
                        </div>
                        <div class="col-md-4" style="padding-left:0px">
                            <label>Date of Hospitalization:</label>
                            <input id="hosDate"type="text" class="form-control " name="hos_date" value="<?php echo $row['pat_date'] ?>" required>
                        </div>
                        <div class="col-md-4" style="padding-left:0px">
                            <label for="disDate">Date of discharge:</label>
                            <input id="disDate"type="text" class="form-control " name="dis_date" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="labOut">Laboratory Findings Outcome:</label>
                        <textarea name="lab_out" id="labOut" class="form-control"><?php echo $row['pat_test_done'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Outcome</label><br> 
                        <select name="outbreak" class="form-control">
                            <option selected disabled>Please Select</option>
                            <option value="Recovered">Recovered</option>
                            <option value="Died">Died</option>

                        </select>

                        <label>Isolate</label><br> 
                        <select name="isolate" class="form-control">
                            <option selected disabled>Please Select</option>
                            <option value="Home">Home</option>
                            <option value="Hospital">Hospital</option>
                            <option value="not_isolated">Not Isolated</option>
                            <option value="isolated_case">Isolated Case</option>
                            <option value="report_needed">Report Needed</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <hr>
                        <h1 style="text-align: center">CONTACTS INVESTIGATE</h1>
                        <hr>
                        <h2>1. Patient's Household</h2>
                        <div class=" row panel panel-default">
                            <div id="pH1"  >
                                <div class="col-md-4">
                                    <label for="patHouName1">Name:</label>
                                    <input id="patHouName1"type="text" class="form-control" name="patHouName1" >
                                </div>
                                <div class="col-md-1">
                                    <label for="patHouAge1">Age:</label>
                                    <input id="patHouAge1"type="number" class="form-control" name="patHouAge1">
                                </div>
                                <div class="col-md-2">
                                    <label for="patHouGen1">Gender:</label>
                                    <select id="patHouGen1" class="form-control" name="patHouGen1">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="patHouRem1">Remarks:</label>
                                    <input id="patHouRem1"type="text" class="form-control" name="patHouRem1">
                                </div>
                                <div class="col-md-1">
                                    <input id="pH1btn"  type="button" style="margin-top:18px" value="+" class="btn btn-success">
                                </div>
                            </div>
                            <div id="pH2" hidden>
                                <div class="col-md-4">
                                    <label for="patHouName2">Name:</label>
                                    <input id="patHouName2"type="text" class="form-control" name="patHouName2">
                                </div>
                                <div class="col-md-1">
                                    <label for="patHouAge2">Age:</label>
                                    <input id="patHouAge2"type="number" class="form-control" name="patHouAge2">
                                </div>
                                <div class="col-md-2">
                                    <label for="patHouGen2">Gender:</label>
                                    <select id="patHouGen2" class="form-control" name="patHouGen2">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="patHouRem2">Remarks:</label>
                                    <input id="patHouRem2"type="text" class="form-control" name="patHouRem2">
                                </div>
                                <div class="col-md-1">
                                    <input id="pH2btn"  type="button" style="margin-top:18px" value="+" class="btn btn-success">
                                </div>
                            </div>
                            <div id="pH3" hidden>
                                <div class="col-md-4">
                                    <label for="patHouName3">Name:</label>
                                    <input id="patHouName3"type="text" class="form-control" name="patHouName3">
                                </div>
                                <div class="col-md-1">
                                    <label for="patHouAge3">Age:</label>
                                    <input id="patHouAge3"type="number" class="form-control" name="patHouAge3">
                                </div>
                                <div class="col-md-2">
                                    <label for="patHouGen3">Gender:</label>
                                    <select id="patHouGen3" class="form-control" name="patHouGen3">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="patHouRem3">Remarks:</label>
                                    <input id="patHouRem3"type="text" class="form-control" name="patHouRem3">
                                </div>
                                <div class="col-md-1">
                                    <input id="pH3btn"  type="button" style="margin-top:18px" value="+" class="btn btn-success">
                                </div>
                            </div>
                            <div id="pH4" hidden>
                                <div class="col-md-4">
                                    <label for="patHouName4">Name:</label>
                                    <input id="patHouName4"type="text" class="form-control" name="patHouName4">
                                </div>
                                <div class="col-md-1">
                                    <label for="patHouAge4">Age:</label>
                                    <input id="patHouAge4"type="number" class="form-control" name="patHouAge4">
                                </div>
                                <div class="col-md-2">
                                    <label for="patHouGen4">Gender:</label>
                                    <select id="patHouGen4" class="form-control" name="patHouGen4">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="patHouRem4">Remarks:</label>
                                    <input id="patHouRem4"type="text" class="form-control" name="patHouRem4">
                                </div>
                                <div class="col-md-1">
                                    <input id="pH4btn"  type="button" style="margin-top:18px" value="+" class="btn btn-success">
                                </div>
                            </div>
                            <div id="pH5" hidden>
                                <div class="col-md-4">
                                    <label for="patHouName5">Name:</label>
                                    <input id="patHouName5"type="text" class="form-control" name="patHouName5">
                                </div>
                                <div class="col-md-1">
                                    <label for="patHouAge5">Age:</label>
                                    <input id="patHouAge5"type="number" class="form-control" name="patHouAge5">
                                </div>
                                <div class="col-md-2">
                                    <label for="patHouGen5">Gender:</label>
                                    <select id="patHouGen5" class="form-control" name="patHouGen5">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="patHouRem5">Remarks:</label>
                                    <input id="patHouRem5"type="text" class="form-control" name="patHouRem5">
                                </div>
                                <div class="col-md-1">
                                    <input id="pH5btn"  type="button" style="margin-top:18px" value="+" class="btn btn-success">
                                </div>
                            </div>
                            <div id="pH6" hidden>
                                <div class="col-md-4">
                                    <label for="patHouName6">Name:</label>
                                    <input id="patHouName6"type="text" class="form-control" name="patHouName6">
                                </div>
                                <div class="col-md-1">
                                    <label for="patHouAge6">Age:</label>
                                    <input id="patHouAge6"type="number" class="form-control" name="patHouAge6">
                                </div>
                                <div class="col-md-2">
                                    <label for="patHouGen6">Gender:</label>
                                    <select id="patHouGen6" class="form-control" name="patHouGen6">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="patHouRem6">Remarks:</label>
                                    <input id="patHouRem6"type="text" class="form-control" name="patHouRem6">
                                </div>
                                <div class="col-md-1">
                                    <input id="pH6btn"  type="button" style="margin-top:18px" value="+" class="btn btn-success">
                                </div>
                            </div>
                            <div id="pH7" hidden>
                                <div class="col-md-4">
                                    <label for="patHouName7">Name:</label>
                                    <input id="patHouName7"type="text" class="form-control" name="patHouName7">
                                </div>
                                <div class="col-md-1">
                                    <label for="patHouAge7">Age:</label>
                                    <input id="patHouAge7"type="number" class="form-control" name="patHouAge7">
                                </div>
                                <div class="col-md-2">
                                    <label for="patHouGen7">Gender:</label>
                                    <select id="patHouGen7" class="form-control" name="patHouGen7">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="patHouRem7">Remarks:</label>
                                    <input id="patHouRem7"type="text" class="form-control" name="patHouRem7">
                                </div>
                                <div class="col-md-1">
                                    <input id="pH7btn"  type="button" style="margin-top:18px" value="+" class="btn btn-success">
                                </div>
                            </div>
                            <div id="pH8" hidden>
                                <div class="col-md-4">
                                    <label for="patHouName8">Name:</label>
                                    <input id="patHouName8"type="text" class="form-control" name="patHouName8">
                                </div>
                                <div class="col-md-1">
                                    <label for="patHouAge8">Age:</label>
                                    <input id="patHouAge8"type="number" class="form-control" name="patHouAge8">
                                </div>
                                <div class="col-md-2">
                                    <label for="patHouGen8">Gender:</label>
                                    <select id="patHouGen8" class="form-control" name="patHouGen8">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="patHouRem8">Remarks:</label>
                                    <input id="patHouRem8"type="text" class="form-control" name="patHouRem8">
                                </div>
                                <div class="col-md-1">
                                    <input id="pH8btn"  type="button" style="margin-top:18px" value="+" class="btn btn-success">
                                </div>
                            </div>
                            <div id="pH9" hidden>
                                <div class="col-md-4">
                                    <label for="patHouName9">Name:</label>
                                    <input id="patHouName9"type="text" class="form-control" name="patHouName9">
                                </div>
                                <div class="col-md-1">
                                    <label for="patHouAge9">Age:</label>
                                    <input id="patHouAge9"type="number" class="form-control" name="patHouAge9">
                                </div>
                                <div class="col-md-2">
                                    <label for="patHouGen9">Gender:</label>
                                    <select id="patHouGen9" class="form-control" name="patHouGen9">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="patHouRem9">Remarks:</label>
                                    <input id="patHouRem9"type="text" class="form-control" name="patHouRem9">
                                </div>
                                <div class="col-md-1">
                                    <input id="pH9btn"  type="button" style="margin-top:18px" value="+" class="btn btn-success">
                                </div>
                            </div>
                            <div id="pH10" hidden>
                                <div class="col-md-4">
                                    <label for="patHouName10">Name:</label>
                                    <input id="patHouName10"type="text" class="form-control" name="patHouName10">
                                </div>
                                <div class="col-md-1">
                                    <label for="patHouAge10">Age:</label>
                                    <input id="patHouAge10"type="number" class="form-control" name="patHouAge10">
                                </div>
                                <div class="col-md-2">
                                    <label for="patHouGen10">Gender:</label>
                                    <select id="patHouGen10" class="form-control" name="patHouGen10">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="patHouRem10">Remarks:</label>
                                    <input id="patHouRem10"type="text" class="form-control" name="patHouRem10">
                                </div>
                                <div class="col-md-1">
                                    <!--<button class="btn btn-success" style="margin-top:18px" > +</button>-->
                                </div>
                            </div>
                        </div>
                        <input type="number" id="patHouCount" hidden name="patHouCount">
                        <h2>2. Other contacts</h2>
                        <div class=" row panel panel-default">
                            <div id="oCon1" >
                                <div class="col-md-4">
                                    <label for="othConName1">Name:</label>
                                    <input id="othConName1"type="text" class="form-control" name="othConName1">
                                </div>
                                <div class="col-md-1">
                                    <label for="othConAge1">Age:</label>
                                    <input id="othConAge1"type="number" class="form-control" name="othConAge1">
                                </div>
                                <div class="col-md-2">
                                    <label for="othConGen1">Gender:</label>
                                    <select id="othConGen1" class="form-control" name="othConGen1">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="othConRem1">Remarks:</label>
                                    <input id="othConRem1"type="text" class="form-control" name="othConRem1">
                                </div>
                                <div class="col-md-1">
                                    <input id="oCon1btn"  type="button" style="margin-top:18px" value="+" class="btn btn-success">
                                </div> 
                            </div>
                            <div id="oCon2" hidden>
                                <div class="col-md-4">
                                    <label for="othConName2">Name:</label>
                                    <input id="othConName2"type="text" class="form-control" name="othConName2">
                                </div>
                                <div class="col-md-1">
                                    <label for="othConAge2">Age:</label>
                                    <input id="othConAge2"type="number" class="form-control" name="othConAge2">
                                </div>
                                <div class="col-md-2">
                                    <label for="othConGen2">Gender:</label>
                                    <select id="othConGen2" class="form-control" name="othConGen2">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="othConRem2">Remarks:</label>
                                    <input id="othConRem2"type="text" class="form-control" name="othConRem2">
                                </div>
                                <div class="col-md-1">
                                    <input id="oCon2btn"  type="button" style="margin-top:18px" value="+" class="btn btn-success">
                                </div> 
                            </div>
                            <div id="oCon3" hidden>
                                <div class="col-md-4">
                                    <label for="othConName3">Name:</label>
                                    <input id="othConName3"type="text" class="form-control" name="othConName3">
                                </div>
                                <div class="col-md-1">
                                    <label for="othConAge3">Age:</label>
                                    <input id="othConAge3"type="number" class="form-control" name="othConAge3">
                                </div>
                                <div class="col-md-2">
                                    <label for="othConGen3">Gender:</label>
                                    <select id="othConGen3" class="form-control" name="othConGen3">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="othConRem3">Remarks:</label>
                                    <input id="othConRem3"type="text" class="form-control" name="othConRem3">
                                </div>
                                <div class="col-md-1">
                                    <input id="oCon3btn"  type="button" style="margin-top:18px" value="+" class="btn btn-success">
                                </div> 
                            </div>
                            <div id="oCon4" hidden>
                                <div class="col-md-4">
                                    <label for="othConName4">Name:</label>
                                    <input id="othConName4"type="text" class="form-control" name="othConName4">
                                </div>
                                <div class="col-md-1">
                                    <label for="othConAge4">Age:</label>
                                    <input id="othConAge4"type="number" class="form-control" name="othConAge4">
                                </div>
                                <div class="col-md-2">
                                    <label for="othConGen4">Gender:</label>
                                    <select id="othConGen4" class="form-control" name="othConGen4">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="othConRem4">Remarks:</label>
                                    <input id="othConRem4"type="text" class="form-control" name="othConRem4">
                                </div>
                                <div class="col-md-1">
                                    <input id="oCon4btn"  type="button" style="margin-top:18px" value="+" class="btn btn-success">
                                </div> 
                            </div>
                            <div id="oCon5" hidden>
                                <div class="col-md-4">
                                    <label for="othConName5">Name:</label>
                                    <input id="othConName5"type="text" class="form-control" name="othConName5">
                                </div>
                                <div class="col-md-1">
                                    <label for="othConAge5">Age:</label>
                                    <input id="othConAge5"type="number" class="form-control" name="othConAge5">
                                </div>
                                <div class="col-md-2">
                                    <label for="othConGen5">Gender:</label>
                                    <select id="othConGen5" class="form-control" name="othConGen5">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="othConRem5">Remarks:</label>
                                    <input id="othConRem5"type="text" class="form-control" name="othConRem5">
                                </div>
                                <div class="col-md-1">
                                    <input id="oCon5btn"  type="button" style="margin-top:18px" value="+" class="btn btn-success">
                                </div> 
                            </div>
                            <div id="oCon6" hidden>
                                <div class="col-md-4">
                                    <label for="othConName6">Name:</label>
                                    <input id="othConName6"type="text" class="form-control" name="othConName6">
                                </div>
                                <div class="col-md-1">
                                    <label for="othConAge6">Age:</label>
                                    <input id="othConAge6"type="number" class="form-control" name="othConAge6">
                                </div>
                                <div class="col-md-2">
                                    <label for="othConGen6">Gender:</label>
                                    <select id="othConGen6" class="form-control" name="othConGen6">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="othConRem6">Remarks:</label>
                                    <input id="othConRem6"type="text" class="form-control" name="othConRem6">
                                </div>
                                <div class="col-md-1">
                                    <input id="oCon6btn"  type="button" style="margin-top:18px" value="+" class="btn btn-success">
                                </div> 
                            </div>
                            <div id="oCon7" hidden>
                                <div class="col-md-4">
                                    <label for="othConName7">Name:</label>
                                    <input id="othConName7"type="text" class="form-control" name="othConName7">
                                </div>
                                <div class="col-md-1">
                                    <label for="othConAge7">Age:</label>
                                    <input id="othConAge7"type="number" class="form-control" name="othConAge7">
                                </div>
                                <div class="col-md-2">
                                    <label for="othConGen7">Gender:</label>
                                    <select id="othConGen7" class="form-control" name="othConGen7">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="othConRem7">Remarks:</label>
                                    <input id="othConRem7"type="text" class="form-control" name="othConRem7">
                                </div>
                                <div class="col-md-1">
                                    <input id="oCon7btn"  type="button" style="margin-top:18px" value="+" class="btn btn-success">
                                </div> 
                            </div>
                            <div id="oCon8" hidden>
                                <div class="col-md-4">
                                    <label for="othConName8">Name:</label>
                                    <input id="name"type="text" class="form-control" name="othConName8">
                                </div>
                                <div class="col-md-1">
                                    <label for="othConAge8">Age:</label>
                                    <input id="othConAge8"type="number" class="form-control" name="othConAge8">
                                </div>
                                <div class="col-md-2">
                                    <label for="othConGen8">Gender:</label>
                                    <select id="othConGen8" class="form-control" name="othConGen8">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="othConRem8">Remarks:</label>
                                    <input id="othConRem8"type="text" class="form-control" name="othConRem8">
                                </div>
                                <div class="col-md-1">
                                    <input id="oCon8btn"  type="button" style="margin-top:18px" value="+" class="btn btn-success">
                                </div> 
                            </div>
                            <div id="oCon9" hidden>
                                <div class="col-md-4">
                                    <label for="othConName9">Name:</label>
                                    <input id="othConName9"type="text" class="form-control" name="othConName9">
                                </div>
                                <div class="col-md-1">
                                    <label for="othConAge9">Age:</label>
                                    <input id="othConAge9"type="number" class="form-control" name="othConAge9">
                                </div>
                                <div class="col-md-2">
                                    <label for="othConGen9">Gender:</label>
                                    <select id="othConGen9" class="form-control" name="othConGen9">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="othConRem9">Remarks:</label>
                                    <input id="othConRem9"type="text" class="form-control" name="othConRem9">
                                </div>
                                <div class="col-md-1">
                                    <input id="oCon9btn"  type="button" style="margin-top:18px" value="+" class="btn btn-success">
                                </div> 
                            </div>
                            <div id="oCon10" hidden>
                                <div class="col-md-4">
                                    <label for="othConName10">Name:</label>
                                    <input id="othConName10"type="text" class="form-control" name="othConName10">
                                </div>
                                <div class="col-md-1">
                                    <label for="othConAge10">Age:</label>
                                    <input id="othConAge10"type="number" class="form-control" name="othConAge10">
                                </div>
                                <div class="col-md-2">
                                    <label for="othConGen10">Gender:</label>
                                    <select id="othConGen10" class="form-control" name="othConGen10">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="othConRem10">Remarks:</label>
                                    <input id="othConGen10"type="text" class="form-control" name="othConGen10">
                                </div>
                                <div class="col-md-1">
                                     <!--<input id="oCon10btn"  type="button" style="margin-top:18px" value="+" class="btn btn-success">-->
                                </div> 
                            </div>
                            <input type="number" id="othConCount" hidden name="othConCount">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <h2>Remarks</h2>
                        <hr>
                        <textarea name="message" id="message" class="form-control">Type remarks here.....</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="subDate">Date:</label>
                        <input id="subDate"type="text" class="form-control datepicker" name="subDate">
                    </div>
                    <div class="col-md-6" style="margin-top:28px" >
                        <label for="signature">Signature:</label>
                        <label for="signature">.......................................</label>
                        <input type="submit" value="Save Changers" class="btn btn-success" style="float:right">
                    </div>
                    <!--</div>-->
                    <div>
                    <!--<input type="submit" value="Save Changers" class="btn btn-success">-->
                    </div>
                    </form>
                </div>
            </div>
            <br/><br/>
            <!--</div>-->

            <div id="footer" class="height35">
                <?php include('../ssi/footer.php'); ?>
            </div>

        </div>

    <!--</div>-->
</body>	
<script>
    $("#notifiedDate").datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        altField: "#alternate",
        altFormat: "yy MM d , DD"
    });
    $("#confDate").datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        altField: "#alternate",
        altFormat: "yy MM d , DD"
    });
    $("#onSetDate").datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        altField: "#alternate",
        altFormat: "yy MM d , DD"
    });
    $("#hosDate").datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        altField: "#alternate",
        altFormat: "yy MM d , DD"
    });
    $("#disDate").datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        altField: "#alternate",
        altFormat: "yy MM d , DD"
    });
    $("#subDate").datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        altField: "#alternate",
        altFormat: "yy MM d , DD"
    });
    $('#pH1btn').click(function () {
        $('#pH2').show();
    });
    $('#pH2btn').click(function () {
        $('#pH3').show();
    });
    $('#pH3btn').click(function () {
        $('#pH4').show();
    });
    $('#pH4btn').click(function () {
        $('#pH5').show();
    });
    $('#pH5btn').click(function () {
        $('#pH6').show();
    });
    $('#pH6btn').click(function () {
        $('#pH7').show();
    });
    $('#pH7btn').click(function () {
        $('#pH8').show();
    });
    $('#pH8btn').click(function () {
        $('#pH9').show();
    });
    $('#pH9btn').click(function () {
        $('#pH10').show();
    });
//    -------------------
    $('#oCon1btn').click(function () {
//        alert('clicked');
        $('#oCon2').show();
    });
    $('#oCon2btn').click(function () {
        $('#oCon3').show();
    });
    $('#oCon3btn').click(function () {
        $('#oCon4').show();
    });
    $('#oCon4btn').click(function () {
        $('#oCon5').show();
    });
    $('#oCon5btn').click(function () {
        $('#oCon6').show();
    });
    $('#oCon6btn').click(function () {
        $('#oCon7').show();
    });
    $('#oCon7btn').click(function () {
        $('#oCon8').show();
    });
    $('#oCon8btn').click(function () {
        $('#oCon9').show();
    });
    $('#oCon9btn').click(function () {
        $('#oCon10').show();
    });

</script>
</html>