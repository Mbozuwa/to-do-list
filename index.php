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

		$allData = $oDB->GetAll("INSERT INTO tasks (task_id, task, time) VALUES ('?, $task, ?')");

		header('location: index.php'); 
	}

	$getTasks = $oDB->GetAll("SELECT * FROM tasks");
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
		<?php foreach ($getTasks as $getTask) { ?>	
			<tr>
				<td><?php echo $getTask['task_id']; ?></td>
				<td class="task"><?php echo $getTask['task']; ?></td>
				<td class="delete">
					<a href="#">X</a>
				</td>
			</tr>
		<?php } ?>		
		</tbody>
	</table>
</body>
</html>
