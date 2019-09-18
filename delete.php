<?php require("includes/constants.php");?>
<?php
require ("includes/connection.php"); ?>

<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location: index.php");
} else { 
		$con = mysqli_connect(db_server,db_user,db_pass,db_name); 
	    or die('Не удалось соединиться: ' . mysql_error());
	//echo 'Соединение успешно установлено';
		mysqli_select_db($con, 'posts') or die('Не удалось выбрать базу данных');
		// Выполняем SQL-запрос
		$query = "DELETE FROM posts WHERE (id=".$_GET['id'].")";
		mysqli_query($con, $query) or die('Удаление не удалось: ' . mysql_error());
		header("location: admin.php");
} ?>