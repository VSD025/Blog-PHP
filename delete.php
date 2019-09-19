<?php 
	$link = mysqli_connect('localhost', 'root', 'rootroot') or die('Не удалось соединиться: ' . mysql_error());
	mysqli_select_db($link, 'blog') or die('Не удалось выбрать базу данных');
	$query = "DELETE FROM posts WHERE (id=".$_GET['id'].")";
	mysqli_query($link, $query) or die('Удаление не удалось: ' . mysql_error());
	echo "<meta http-equiv='refresh' content='0'>";
?>