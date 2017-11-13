<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>

<!--META-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>epihack - Sri Lanka</title>
<link rel="icon" href="images/title.png" />

<!--STYLESHEETS-->
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="../common/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<link href="../common/js/facebox/facebox.css" media="screen" rel="stylesheet" type="text/css" />

<!--SCRIPTS-->
<script src="../common/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="../common/js/jquery-ui.js" type="text/javascript"></script>
<script src="../common/js/facebox/facebox.js" type="text/javascript"></script>

<script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : '../common/js/facebox/loading.gif',
        closeImage   : '../common/js/facebox/closelabel.png'
      });
    })
  </script>


<!--Slider-in icons-->
<script type="text/javascript">
$(document).ready(function() {
	$(".username").focus(function() {
		$(".email-icon").css("left","-48px");
	});
	$(".username").blur(function() {
		$(".email-icon").css("left","0px");
	});
	
});
</script>


<script type="text/javascript">
	//JQuery Validation
	$(document).ready(function(){
        $("form").submit(function(event){
			
			
			if($("#email").val()==""){
				$("#showmsg").text("Empty Email Address");
				$("#email").focus();
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
    <div class="email-icon"></div>
    <!--END SLIDE-IN ICONS-->

<!--LOGIN FORM-->
<form name="log" id="log" class="login-form" method="post" action="forgotpasswordprocess.php">

	<!--HEADER-->
    <div class="header" align="center">
    <!--TITLE--><h1> Forgot Password </h1>
    <br/>
    <!--END TITLE-->
    <!--DESCRIPTION-->
    <span style="text-align:left">Enter your email address to reset system password, otherwise you can try again.</span><!--END DESCRIPTION-->
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->
    <div class="content">
	<!--E mail--><input type="text" name="email" id="email" class="input username"  placeholder="Email Address" required/><!--END E mail-->
    </div>
    <!--END CONTENT-->
    
    
    <!--FOOTER-->
    <div class="footer" align="center">
    <div id="showmsg">
		<?php 
        //If the user name or password invalid 
        if(isset($_REQUEST['msg'])){
            //Display the error message
            echo base64_decode($_REQUEST['msg']);
        } ?>
        
        &nbsp;</div>
    <br/>
    <br/>
    <p>
      <!--LOGIN BUTTON-->      
      <input type="submit" name="sub" id="sub" value="Reset" class="button" /> &nbsp;
      <a href="index.php"><input type="button" name="sub" id="sub" value="Login" class="button" /></a>
    </p>
	<br/>
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