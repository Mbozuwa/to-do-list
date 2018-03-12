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

		header('location: list_index.php'); 
	}

		// if (isset($_POST['ASC'])) {
		// 	$sorting = $oDB->Execute("SELECT * FROM tasks ORDER BY task ASC");

		// } elseif (isset($_POST['DESC'])) {
		// 	$sorting = $oDB->Execute("SELECT * FROM tasks ORDER BY task DESC");
		// }

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

	<form method="POST" action="list_index.php">
		<input type="text" name="lists_id" placeholder="Voer hier je lijst id in.">
		<input type="text" name="task" placeholder="Voer hier je taak in.">
		<input type="text" name="time" placeholder="Voer hier je tijd in.">
		<button type="submit" name="submit">Toevoegen</button>
	</form>

	<table>
			<thead>
				<th>lijst id</th>
				<th><a href='?order=Taak&&sort=$sort'>Taak</a></th>
				<th><a href='?Tijd&&sort=$sort'>Tijd</th>
				<th></th>
			</thead>
		<tbody>
		<?php foreach ($getTasks as $getTask) { ?>	
			<tr>
				<td class="task"><?php echo $getTask['lists_id']; ?></td>
				<td class="task"><?php echo $getTask['task']; ?></td>
				<td class="task"><?php echo $getTask['time']; ?></td>
				<td class="edit">
					<a href="edit_index.php?edit=<?php echo $getTask['task_id']; ?>">bewerken</a>
				</td>
				<td class="delete">
					<a href="list_index.php?delete=<?php echo $getTask['task_id']; ?>">verwijderen</a>
				</td>
			</tr>
		<?php } ?>		
		</tbody>
	</table>
</body>
</html>
