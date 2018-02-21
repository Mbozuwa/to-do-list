<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$DBname = "todo";
	include('adodb5/adodb.inc.php');
	include('delete.php');
	$oDB = ADONewConnection('mysqli');
	$oDB->Connect($servername, $username, $password, $DBname);

	if (isset($_POST['submit'])) {
		$listsId = $_POST['lists_id'];
		$task = $_POST['task'];
		$time = $_POST['time'];

		$allData = $oDB->GetAll("INSERT INTO tasks (lists_id, task, time) VALUES ('$listsId', '$task', '$time')");

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
		<input type="text" name="lists_id" placeholder="Voer hier je list id in.">
		<input type="text" name="task" placeholder="Voer hier je taak in.">
		<input type="text" name="time" placeholder="Voer hier je tijd in.">
		<button type="submit" name="submit">Toevoegen</button>
	</form>

	<table>
		<thead>
			<th>Nummer</th>
			<th>Taak</th>
			<th>Tijd</th>
			<th>Actie</th>
		</thead>
		<tbody>
		<?php foreach ($getTasks as $getTask) { ?>	
			<tr>
				<td><?php echo $getTask['task_id']; ?></td>
				<td class="task"><?php echo $getTask['task']; ?></td>
				<td class="task"><?php echo $getTask['time']; ?></td>
				<td class="edit">
					<a href="edit_index.php?edit=<?php echo $getTask['task_id']; ?>">bewerken</a>
				</td>
				<td class="delete">
					<a href="index.php?delete=<?php echo $getTask['task_id']; ?>">verwijderen</a>
				</td>
			</tr>
		<?php } ?>		
		</tbody>
	</table>
</body>
</html>
