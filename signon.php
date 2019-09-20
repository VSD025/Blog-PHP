<?php require_once("includes/connection.php"); ?>
<?php require("includes/constants.php"); ?>
<?php $con = mysqli_connect(db_server,db_user,db_pass,db_name); ?>
<?php
	
	if(isset($_POST["signon"])){
	
	if(!empty($_POST['username']) && !empty($_POST['password'])) {
 $username=htmlspecialchars($_POST['username']);
 $password=htmlspecialchars($_POST['password']);
 $query=mysqli_query($con,"SELECT * FROM users WHERE username='".$username."'");
  $numrows=mysqli_num_rows($query);
if($numrows==0)
   {
	$sql="INSERT INTO users (username,password) VALUES('$username', '$password')";
$result=mysqli_query($con,$sql);
if($result){
	print("Account Successfully Created");
} else {
 print("Failed to insert data information!");
  }
	} else {
	print( "That username already exists! Please try another one!");
   }
	} else {
	print( "All fields are required!");
	}
	}
	?>


	<html lang="en">
	<head>
	<meta charset="utf-8"> 
 <title>Page</title>
<link href="css/style.css" media="screen" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'rel='stylesheet' type='text/css'>
	</head>
	<body>
<div class="container mregister">
<div id="login">
 <h1>Sign on</h1>
<form action="signon.php" id="registerform" method="post"name="registerform">
<p><label for="user_pass">Username<br>
<input class="input" id="username" name="username"size="20" type="text" value=""></label></p>
<p><label for="user_pass">Password<br>
<input class="input" id="password" name="password"size="32"   type="password" value=""></label></p>
<p class="submit"><input class="button" id="signon" name= "signon" type="submit" value="Sign on"></p>
<a href= "index.php">Sign in</a>
<a href= "neadmin.php"><br>As guest</a>
 </form>
</div>
</div>
<footer>
 </footer>
</body>
</html>
