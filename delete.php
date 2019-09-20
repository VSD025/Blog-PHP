<?php 
	$link = mysqli_connect('localhost', 'root', 'rootroot') or die('Connection error: ' . mysql_error());
	mysqli_select_db($link, 'blog');
	$query = "DELETE FROM posts WHERE (id=".$_GET['id'].")";
	mysqli_query($link, $query) or die('Deleting error ' . mysql_error());
	header("Location: admin.php");
	echo "<meta http-equiv='refresh' content='0'>";
?>