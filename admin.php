<?php
require ("includes/connection.php");
$otvet = mysqli_query($con,'SELECT * FROM `posts`');
?>
<?php require("includes/constants.php");
$con = mysqli_connect(db_server,db_user,db_pass,db_name); ?>
<?php
if(isset($_POST['title'])){
	$sql = mysqli_query($con, "INSERT INTO  `posts` (title,content)  VALUES('{$_POST['title']}', '{$_POST['content']}')");
	if ($sql) {
      echo '<p>Данные успешно добавлены в таблицу.</p>';
      echo "<meta http-equiv='refresh' content='0'>";
    } else {
      echo '<p>Произошла ошибка: ' . mysqli_error($connect) . '</p>';
    }

if(isset($_POST['del'])){
	$connect = mysqli_connect("localhost","root","rootroot","blog") or die("Ошибка " . mysqli_error($link));
	$query = "DELETE FROM posts WHERE (id=".$_GET['id'].")";
	mysqli_query($link, $query) or die('Удаление не удалось: ' . mysqli_error());
    echo "<meta http-equiv='refresh' content='0'>";	
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
 		<form action="" method="POST">
		<!-- <input type="button" value="Add new post" onClick='location.href="new_post.html"'> -->
		<h3>Title</h3>
		<p><input type="text" name="title" /><br></p>
		<h3>Content</h3>
		<p><textarea name="content"></textarea><br></p>
		<input type="submit" name="send" value="post"> 
		</form>
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
