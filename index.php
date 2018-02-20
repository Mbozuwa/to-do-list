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

		$allData = "INSERT INTO tasks (task) VALUES ('$task')";

		mysqli_query($db, $allData);
		header('location: index.php'); 
	}

	$tasks = $oDB->GetAll("SELECT * FROM tasks");

	var_dump($tasks);
	die();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Todo list</title>
</head>
<body>
	<div class="header">
		<h1>To do list </h1>
	</div>

	<form method="POST" action="index.php">
		<input type="text" name="task">
		<button type="submit" name="submit">Toevoegen</button>
	</form>

	<table>
		<thead>
			<th>Nummer</th>
			<th>Taak</th>
			<th>Actie</th>
		</thead>
		<tbody>
		<?php while ($row = ($tasks)) { ?>	
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td class="task"><?php echo $row['task']; ?></td>
				<td class="delete">
					<a href="#">X</a>
				</td>
			</tr>
		<?php } ?>		
		</tbody>
	</table>
</body>
</html>
