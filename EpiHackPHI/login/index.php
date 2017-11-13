<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>

<!--META-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>epihack - Sri Lanka</title>
<link rel="icon" href="images/title.png" />

<!--STYLESHEETS-->
<link href="css/style.css" rel="stylesheet" type="text/css" />

<!--SCRIPTS-->
<script src="../common/js/jquery-1.8.3.min.js" type="text/javascript"></script>

<!--Slider-in icons-->
<script type="text/javascript">
$(document).ready(function() {
	$(".username").focus(function() {
		$(".user-icon").css("left","-48px");
	});
	$(".username").blur(function() {
		$(".user-icon").css("left","0px");
	});
	
	$(".password").focus(function() {
		$(".pass-icon").css("left","-48px");
	});
	$(".password").blur(function() {
		$(".pass-icon").css("left","0px");
	});
});
</script>

<script type="text/javascript">
	//JQuery Validation
	$(document).ready(function(){
        $("form").submit(function(event){
			
			// Empty User Name and Password Validation 
			if($("#username").val()=="" && $("#pass").val()==""){
				$("#showmsg").text("Empty User Name and Password");
				$("#username").focus();
				event.preventDefault();				
				return false;	
			}
			
			// Empty User Name and Password Validation 
			if($("#username").val()==""){
				$("#showmsg").text("Empty User Name");
				$("#username").focus();
				event.preventDefault();				
				return false;	
			}
			
			// Empty User Name and Password Validation 
			if($("#pass").val()==""){
				$("#showmsg").text("Empty Password");
				$("#pass").focus();
				event.preventDefault();				
				return false;	
			}
		});		
    });
		
</script>

</head>
<body>

<!--WRAPPER-->
<div id="wrapper">

	<!--SLIDE-IN ICONS-->
    <div class="user-icon"></div>
    <div class="pass-icon"></div>
    <!--END SLIDE-IN ICONS-->

<!--LOGIN FORM-->
<form name="login-form" class="login-form" action="validate.php" method="post">

	<!--HEADER-->
    <div class="header" align="center">
    <!--TITLE--><h1> Login </h1>
    <!--END TITLE-->
    <!--DESCRIPTION-->
    <h1> <b><font face="Constantia, Lucida Bright, DejaVu Serif, Georgia, serif"> &lt;epi<font color="#009900">hack</font>/&gt; </b> </h1>
   <!--END DESCRIPTION-->
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->
    <div class="content">
	<!--USERNAME--><input name="username" type="text" id="username" class="input username"  placeholder="User Name" /><!--END USERNAME-->
    <!--PASSWORD--><input name="pass" type="password" id="pass" class="input password"  placeholder="Password"/><!--END PASSWORD-->
    </div>
    <!--END CONTENT-->
    
    
    <!--FOOTER-->
    <div class="footer" align="center">
    <div id="showmsg">
	<?php 
    //If the user name or password invalid 
    if(isset($_REQUEST['msg'])){
        //Display the error message
        echo $_REQUEST['msg'];
    } ?>
    
    </div>
    <br/>
    <p>
      <!--LOGIN BUTTON-->      
      <input type="submit" name="sub" id="sub" value="Login" class="button" />
    </p>
	<br/>
    <div>
		<a href="forgotpassword.php"  style="color:#1C6DA2;" rel="facebox">Forgot Password <img src="images/fogot_password.png" height="20" width="20" style="vertical-align:middle">  </img> </a>
    </div>
    <!--END LOGIN BUTTON-->
    </div>
    <!--END FOOTER-->

</form>

<!--END LOGIN FORM-->

</div>
<!--END WRAPPER-->

<!--GRADIENT--><div class="gradient"></div><!--END GRADIENT-->

</body>
</html>