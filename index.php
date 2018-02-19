<?php
	$db = mysqli_connect('localhost', 'root', '', 'todo');

	if (isset($_POST['submit'])) {
		$task = $_POST['task'];

		$query = "SELECT * FROM tasks WHERE task = '$task'";
		mysql_query($db, "INSERT INTO tasks (task) VALUES ('$task')");
		header('location: index.php'); 
	}
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
		<button type="submit" name="submit">Add your task here</button>
	</form>

	<table>
		<thead>
			<th>N</th>
			<th>Task</th>
			<th>Action</th>
		</thead>
		<tbody>
			<td>1</td>
			<td class="task">The first placeholder</td>
			<td class="delete">
				<a href="#">X</a>
			</td>
		</tbody>
	</table>
</body>
</html>
