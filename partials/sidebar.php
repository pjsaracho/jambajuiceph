<?php
	session_start();
	if(!isset($_SESSION['username'])){
?>
	<form>
		<div class="form-group">
			<label for="email">Email address:</label>
			<input type="email" class="form-control" id="email">
		</div>
		<div class="form-group">
			<label for="pwd">Password:</label>
			<input type="password" class="form-control" id="pwd">
		</div>
		<div class="checkbox">
			<label><input type="checkbox"> Remember me</label>
		</div>
		<button type="submit" class="btn btn-default">Submit</button>
	</form>
<?php
} else {
	echo "Welcome ".$_SESSION['username'];
	echo "<br>".$_SESSION['role'];
}

?>