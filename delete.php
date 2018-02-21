<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$DBname = "todo";
	include('adodb5/adodb.inc.php');
	$oDB = ADONewConnection('mysqli');
	$oDB->Connect($servername, $username, $password, $DBname);

	if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		$oDB->execute("DELETE FROM tasks WHERE task_id = ".$id);
		header("location: index.php");
	}