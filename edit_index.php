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
			$id = $_POST['edit'];

			$oDB->execute("UPDATE tasks SET task='$task',tijd='$tijd',lists_id='$lists_id' WHERE task_id= $id");
			header("location: index.php");
		}
?>	

<!DOCTYPE html>
<html>
<head>
	<title>bewerken</title>
</head>
<body>
	<div class="header">
		<h1>Bewerk hier je taak</h1>
	</div>

	<form method="POST" action="index.php">
		<input type="text" name="lists_id" placeholder="Voer hier je list id in.">
		<input type="text" name="task" placeholder="Voer hier je taak in.">
		<input type="text" name="time" placeholder="Voer hier je tijd in.">
		<button type="submit" name="update" value=" value= <?php echo $_GET['edit'];?> ">Bewerken</button>
	</form>
</body>
</html>