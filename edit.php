<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$DBname = "todo";
	include('adodb5/adodb.inc.php');
	$oDB = ADONewConnection('mysqli');
	$oDB->Connect($servername, $username, $password, $DBname);

		if(isset($_POST['update'])){
			$listsId = $_POST['lists_id'];
			$task = $_POST['task'];
			$time = $_POST['time'];
			$id = $_GET['edit'];

			$oDB->execute("UPDATE tasks (task) SET lists_id = '$lists_id', task = '$task', time = '$time' WHERE task_id = ".$id);

			header("location: index.php");
		}
	