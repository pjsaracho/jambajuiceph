<?php
	$message = "";
	session_start();
	if(isset($_SESSION['message'])){
		$message = "<div class='alert alert-success'>".$_SESSION['message']."</div>";
		unset($_SESSION['message']);
	}

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		include('connection.php');
		$username = $_POST['username'];
		$password = sha1($_POST['password']);
		$sql = "SELECT * FROM users WHERE username = '$username'";
		$result = mysqli_query($conn,$sql);
		if($result){
			while($row = mysqli_fetch_assoc($result)){
				if($row['password']==$password){
					session_start();
					$_SESSION['message'] = "Login Successful";
					$_SESSION['username'] = $username;
					$_SESSION['role'] = $row['role'];
					header('location:home.php');
				}
			}
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	
	<?php echo $message; ?>

	<h1> LOGIN </h1>

	<form method='post' action=''>
		<div class="form-group">
		<input type="text" name="username" placeholder="Username">
		</div>
		<div class="form-group">
		<input type="password" name="password" placeholder="Password">
		</div>
		<div class="form-group">
		<input class="btn btn-success" class="btn btn-default" type="button" name="login" value="Login"> 
		</div>
	</form>

</body>
</html>