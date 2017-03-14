<?php

if(isset($_POST['add'])){
	$string = file_get_contents("items.json");
	$items = json_decode($string, true);

	$new_item['id'] = $_POST['id'];
	$new_item['name'] = $_POST['name'];
	$new_item['subname'] = $_POST['subname'];
	$new_item['description'] = $_POST['description'];
	$new_item['price'] = $_POST['price'];
	$new_item['image'] = $_POST['image'];
	$new_item['category'] = $_POST['category'];

	$items[] = $new_item;

	$fp = fopen('items.json', 'w');
	fwrite($fp, json_encode($items, JSON_PRETTY_PRINT));
	fclose($fp);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Item Page</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">

<?php session_start(); if(isset($_SESSION['role']) && $_SESSION['role']=='admin'){ ?>
	<h3>Add New Item</h3>
	<form class="form-horizontal" method='post'>
		<div class="form-group">
			<label class="col-xs-2" for="id">ID:</label>
			<input class="col-xs-4" type="text" class="form-control" name="id">
		</div>
		<div class="form-group">
			<label class="col-xs-2" for="name">Name:</label>
			<input class="col-xs-4" type="text" class="form-control" name="name">
		</div>
		<div class="form-group">
			<label class="col-xs-2" for="subname">Subname:</label>
			<input class="col-xs-4" type="text" class="form-control" name="subname">
		</div>
		<div class="form-group">
			<label class="col-xs-2" for="description">Description:</label>
			<input class="col-xs-4" type="text" class="form-control" name="description">
		</div>
		<div class="form-group">
			<label class="col-xs-2" for="price">Price:</label>
			<input class="col-xs-4" type="text" class="form-control" name="price">
		</div>
		<div class="form-group">
			<label class="col-xs-2" for="image">Image:</label>
			<input class="col-xs-4" type="text" class="form-control" name="image">
		</div>
		<div class="form-group">
			<label class="col-xs-2" for="category">Category:</label>
			<input class="col-xs-4" type="text" class="form-control" name="category">
		</div>
		<input type="submit" name="add" value="Add Item">
	</form>
<?php }else echo "Please log in as admin." ?>
</div>
</body>
</html>
