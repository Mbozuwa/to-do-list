<?php 
	include("location: edit.php");
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
		<button type="submit" name="submit">Bewerken</button>
	</form>
</body>
</html>