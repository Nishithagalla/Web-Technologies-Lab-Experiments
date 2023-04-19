<?php
session_start();

	include("connec.php");
	include("func.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>My website</title>
</head>
<body>

	<a href="signup.php">Login </a>
	<h1>WELCOME TO HOME PAGE</h1>

	<br>
</body>
</html>
