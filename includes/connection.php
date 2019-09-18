<?php
	require("constants.php");
	$con = mysqli_connect(db_server,db_user,db_pass) or die(mysqli_error());
	mysqli_select_db($con,db_name) or die("Cannot select DB");
	?>