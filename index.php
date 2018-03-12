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
		$list_id = $_POST['id'];
		$name = $_POST['name'];

		$allData = $oDB->GetAll("INSERT INTO lists (id, name) VALUES ('$list_id', '$name')");

		header('location: index.php'); 
	}

		// if (isset($_POST['ASC'])) {
		// 	$sorting = $oDB->Execute("SELECT * FROM tasks ORDER BY task ASC");

		// } elseif (isset($_POST['DESC'])) {
		// 	$sorting = $oDB->Execute("SELECT * FROM tasks ORDER BY task DESC");
		// }

	$getLists = $oDB->GetAll("SELECT * FROM lists");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Todo list</title>
</head>
<body>
	<div class="header">
		<h1>Lijsten<h1>
	</div>
	<form method="POST" action="index.php">
		<input type="text" name="id" placeholder="Voer hier je lijst id in.">
		<input type="text" name="name" placeholder="Voer hier je lijst naam in.">
		<button type="submit" name="submit">Toevoegen</button>
	</form>

	<table>
			<thead>
				<th>lijst id</th>
				<th>Naam</a></th>
				<th></th>
			</thead>
		<tbody>
		<?php foreach ($getLists as $getList) { ?>	
			<tr>
				<td class="task"><?php echo $getList['id']; ?></td>
				<td class="task"><?php echo $getList['name']; ?></td>
				<td class="edit">
					<a href="edit_list_index.php?edit=<?php echo $getList['id']; ?>">bewerken</a>
				</td>
				<td class="delete">
					<a href="index.php?remove=<?php echo $getList['id']; ?>">verwijderen</a>
				</td>
			</tr>
		<?php } ?>		
		</tbody>
	</table>
</body>
</html>
