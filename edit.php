<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$DBname = "todo";
	include('adodb5/adodb.inc.php');
	$oDB = ADONewConnection('mysqli');
	$oDB->Connect($servername, $username, $password, $DBname);

		if(isset($_GET['update'])){
		$id = $_GET['update'];
		$oDB->execute("UPDATE tasks (task) SET task WHERE task_id = ".$id);
		header("location: index.php");
	}