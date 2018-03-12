<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$DBname = "todo";
	include('adodb5/adodb.inc.php');
	$oDB = ADONewConnection('mysqli');
	$oDB->Connect($servername, $username, $password, $DBname);

		if(isset($_POST['update'])){
			$name = $_POST['name'];
			$id = $_POST['edit'];

			$oDB->execute("UPDATE lists SET name='$name' WHERE id= $id");
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
		<h1>Bewerk hier je lijst</h1>
	</div>

	<form method="POST" action="index.php">
		<input type="text" name="lists_id" placeholder="Nieuwe naam">
		<button type="submit" name="update" value=" value= <?php echo $_GET['edit'];?> ">Bewerken</button>
	</form>
</body>
</html>