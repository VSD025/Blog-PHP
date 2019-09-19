<?php session_start(); ?>
<?php require_once("includes/connection.php"); ?>
<?php require("includes/constants.php");
$con = mysqli_connect(db_server,db_user,db_pass,db_name); ?>
<?php
if(isset($_POST["signin"])){
	if(!empty($_POST['username']) && !empty($_POST['password'])) {
		$username=htmlspecialchars($_POST['username']);
		$password=htmlspecialchars($_POST['password']);
		$query = mysqli_query($con,"SELECT * FROM users WHERE username='".$username."' AND password='".$password."'");
		$numrows=mysqli_num_rows($query);
		if($numrows!=0)
		{
			while($row=mysqli_fetch_assoc($query))
			{
				$dbusername=$row['username'];
  				$dbpassword=$row['password'];
 			}
  			if($username == $dbusername && $password == $dbpassword){
	 			$_SESSION['session_username']=$username;	 
   				header("Location: admin.php");
   			}
			} else {
				echo  "Invalid username or password!";
 			}
		} else {
    		echo "All fields are required!";
		}
	}
?>
<head>
<meta charset="utf-8">
<title>Page</title>
<link href="css/style.css" media="screen" rel="stylesheet">
<link href= 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head> 
<body>
<div class="container mlogin">
<div id="login">
<h1>Sign in</h1>
<form action="" id="loginform" method="post"name="loginform">
<p><label for="user_login">Username<br>
<input class="input" id="username" name="username"size="20"
type="text" value=""></label></p>
<p><label for="user_pass">Password<br>
 <input class="input" id="password" name="password"size="20"
  type="password" value=""></label></p> 
	<p class="submit"><input class="button" name="signin"type= "submit" value="Log In"></p>
<a href= "neadmin.php">As guest</a>
   </form>
 </div>
  </div>
<footer>
</footer>
</body>
</html>