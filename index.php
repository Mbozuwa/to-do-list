<?php
include('adodb5/adodb.inc.php');

session_start();

$_SESSION['user_id'] = 1;

$db = new PDO('mysql:dbname=todo;host=localhost', 'root', '');

if (!isset == $_SESSION['user_id'] = 1{
	die("You are not logged in yet.");
}