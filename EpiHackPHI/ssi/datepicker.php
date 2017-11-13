<?php

//To start the session and if not login to the system, redirect to the index page 
include("session_handling.php");


?>


<link rel="stylesheet" href="../Datepicker/jquery-ui.css">
<script src="../Datepicker/jquery-ui.js"></script>
<link rel="stylesheet" href="../Datepicker/theme.css">



<!-- Datepicker -->
<script>
  $(function() {
    $( "#datepicker" ).datepicker({
	  dateFormat: 'yy-mm-dd',
      changeMonth: true,
      changeYear: true,
	  altField: "#alternate",
      altFormat: "yy MM d , DD"
    });
  });
  </script>