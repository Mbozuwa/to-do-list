<?php	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$DBname = "todo";
	include('adodb5/adodb.inc.php');
	$oDB = ADONewConnection('mysqli');
	$oDB->Connect($servername, $username, $password, $DBname);

	if (isset($_POST['submit'])) {
		$task = $_POST['task'];

		$allData = $oDB->GetAll("INSERT INTO tasks (task) VALUES ('$task')");

		header('location: index.php'); 
	}
