<?php

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		include('connection.php');
		if($_POST['password']==$_POST['pw2']){
			$username = $_POST['username'];
			$password = sha1($_POST['password']);
			$sql = "INSERT INTO users (username,password,role) VALUES ('$username','$password','regular')";
			$result = mysqli_query($conn,$sql);
			if($result){
				session_start();
				$_SESSION['message'] = "Registration Successful";
				header('location:login.php');
			}
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<h1> REGISTER </h1>

	<form method='post' action=''>
		<div class="form-group">
		<input type="text" name="username" placeholder="Username">
		</div>
		<div class="form-group">
		<input type="password" name="password" placeholder="Password">
		</div>
		<div class="form-group">
		<input type="password" name="pw2" placeholder="Confirm Password">
		</div>
		<div class="form-group">
		<input class="btn btn-success" class="btn btn-default" type="submit" name="register" value="Register"> 
		</div>
	</form>

</body>
</html>