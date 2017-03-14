<?php

if(isset($_POST['submit'])){
	if($_POST['password']==$_POST['pw2']){
		$user = [$_POST['username'],sha1($_POST['password']),'regular'];

		$string = file_get_contents("users.json");
		if($string)
			$array = json_decode($string, true);
		$array[] = $user;
		$fp = fopen('users.json', 'w');
		fwrite($fp, json_encode($array, JSON_PRETTY_PRINT));
		fclose($fp);

		session_start();
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['role'] = 'regular';

		header('location:menu.php');
	}
}

function get_title(){
	echo "Register";
}

function display_content(){
	echo "	<form method='POST'>
				<div class='form-group'>
				    <label for='username'>Username:</label>
					<input type='text' class='form-control' name='username'>
				</div>
				<div class='form-group'>
				    <label for='password'>Password:</label>
					<input type='password' class='form-control' name='password'>
				</div>
				<div class='form-group'>
				    <label for='pw2'>Confirm Password:</label>
					<input type='password' class='form-control' name='pw2'>
				</div>
				<input type='submit' class='btn btn-primary' name='submit'>
			</form>";
}

require_once('home.php');

?>
