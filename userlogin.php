<?php

// 	$fp = fopen('users.json', 'w');
// 	fwrite($fp, json_encode($users, JSON_PRETTY_PRINT));
// 	fclose($fp);

$string = file_get_contents("users.json");
$users = json_decode($string, true);

if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = sha1($_POST['password']);

	foreach ($users as $user) {
		if($username==$user['username'] && $password==$user['password']){
			echo "login successful!";
			session_start();
			$_SESSION['username'] = $username;
			if($username=='admin')
				$_SESSION['role'] = 'admin';	
			else
				$_SESSION['role'] = 'regular';
		}
	}
}

if(isset($_POST['register'])){
	$new_user = ['username'=>$_POST['username'],
				'password'=>sha1($_POST['password'])];

	if($_POST['password']==$_POST['confirmpw']){

		$users[] = $new_user;
		//array_push($users, $new_user);

		$fp = fopen('users.json', 'w');
		fwrite($fp, json_encode($users, JSON_PRETTY_PRINT));
		fclose($fp);
	}
}

?>

<h3>LOGIN</h3>
<form method="POST">
	Username: <input type="text" name="username"><br>
	Password: <input type="password" name="password"><br>
	<input type="submit" name="login" value="Login">
</form>

<h3>REGISTER</h3>
<form method="POST">
	Username: <input type="text" name="username"><br>
	Password: <input type="password" name="password"><br>
	Confirm Password: <input type="password" name="confirmpw"><br>
	<input type="submit" name="register" value="Register">
</form>
