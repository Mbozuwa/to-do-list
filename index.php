<?php
	$db = mysqli_connect('localhost', 'root', '', 'todo');

	if (isset($_POST['submit'])) {
		$task = $_POST['task'];

		$allData = "INSERT INTO tasks (task) VALUES ('$task')";

		mysqli_query($db, $allData);
		header('location: index.php'); 
	}

	$tasks = mysql_query($db, "SELECT * FROM tasks");

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
		<?php while ($row = mysqli_fetch_array($tasks)) { ?>	
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
