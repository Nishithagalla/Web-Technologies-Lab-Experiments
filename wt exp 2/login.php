<?php

session_start();

	include("connec.php");
	include("func.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{

		//something was posted
		$user_name = $_POST['user_name'];
		$_SESSION['user'] = 	$user_name;
		$password = $_POST['password'];


		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);

					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];

							?>
               <script type="text/javascript">
               	alert("<?php echo $_SESSION['user']; ?>");
               </script>
							<?php


						header("Location: index1.php");
						die;
					}
				}
			}

			echo "wrong username or password!";
		}
		else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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

		background-color: #21bab2;
        margin:auto;
		width: 300px;
		padding: 150px;
        box-shadow:10px 20px 30px #11605c;
	}

	</style>

	<div id="box">

		<form method="post">
			<div style="font-size: 40px;margin: 10px;color: white;">Login Page</div>

			<input id="text" type="text" name="user_name" placeholder="username"><br><br>
			<input id="text" type="password" name="password" placeholder="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html>
