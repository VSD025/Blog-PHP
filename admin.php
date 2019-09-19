<?php
require ("includes/connection.php");
$otvet = mysqli_query($con,'SELECT * FROM `posts`');
?>
<?php require("includes/constants.php");
$con = mysqli_connect(db_server,db_user,db_pass,db_name); ?>
<?php
if(isset($_POST['title'])){
	if(!empty($_POST['title']) && !empty($_POST['content'])) {
		echo "All fields are required!";
		$sql = mysqli_query($con, "INSERT INTO  `posts` (title,content)  VALUES('{$_POST['title']}', '{$_POST['content']}')");
		if ($sql) {
      		echo '<p>Данные успешно добавлены в таблицу.</p>';
      		echo "<meta http-equiv='refresh' content='0'>";
    	} else {
      		echo '<p>Произошла ошибка: ' . mysqli_error($connect) . '</p>';
    	}
    }
if(isset($_POST['del'])){
    // echo "<meta http-equiv='refresh' content='0'>";	
}


}
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <link href="css/style.css" media="screen" rel="stylesheet">
		<link href= 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    </head>
    <body>
 	<header>
 		<div>
 		<form action="" method="POST">
		<!-- <input type="button" value="Add new post" onClick='location.href="new_post.html"'> -->
		<h3 style="text-align: center;">Title</h3>
		<p><input type="text" name="title" size="70" style="display: block; margin: 0 auto;" /><br></p>
		<h3 style="text-align: center;">Content</h3>
		<p><textarea name="content" rows="22" cols="100" style="display: block; margin: 0 auto;"></textarea><br></p>
		<input type="submit" name="send" value="post" style="display: block; margin: 0 auto;"> 
		</form>
		</div>
 	</header>
 	<article> 
 		<?
 			while($row = mysqli_fetch_assoc($otvet)){
 			echo "<section>
 			<h2>{$row['title']}</h2>
 			{$row['content']}
 			</section>";
 			echo ' 
 			<form action="" method="POST">
 				<input type="submit" name="del" value="delete">
 			</form>';
		}
 			
 		?>
 			
 		
 	</article>
    </body>
</html>
