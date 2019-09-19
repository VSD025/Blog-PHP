<?php require("includes/constants.php");
$con = mysqli_connect(db_server,db_user,db_pass,db_name); ?>
<?php
require ("includes/connection.php");
$otvet = mysqli_query($con,'SELECT * FROM `posts`');
?>
<html lang="en">
    <head>
        <meta charset="utf-32">
        <title>Blog</title>
        <link href="css/style.css" media="screen" rel="stylesheet">
		<link href= 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    </head>
    <body>
 	<header>
 		<style>
 			article {
 				text-align: center
 			}
 		</style>
 	</header>
 	<article> 
 		<?
 			while($row = mysqli_fetch_assoc($otvet)){
 			echo "<section>
 			<h2>{$row['title']}</h2>
 			<p>{$row['content']}</p>
 			</section>";
		}
 			
 		?>
 		
 	</article>
    </body>
</html>