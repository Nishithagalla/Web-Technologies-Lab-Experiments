<?php 
session_start();

	include("connec.php");
	include("func.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 70%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: #49b568;
		margin: auto;
		width: 300px;
		padding: 150px;
        box-shadow: 10px 20px 30px darkgreen;
	}

	</style>

	<div id="box">
		
		<form method="post">
            
			<div style="font-size: 40px;margin: 10px;color: white;">Signup Page</div>
            
            <input id="text" type="text" name="user_name" placeholder="username"> <br><br>
            
			<input id="text" type="password" name="password" placeholder="password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
            
		</form>
	</div>
</body>
</html>