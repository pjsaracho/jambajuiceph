<!DOCTYPE html>
<html lang="en">
<head>
	<title>Edit Page</title>
</head>
<body>

<?php

include('connection.php');
mysqli_set_charset($conn,"UTF8");

$id = $_GET['id'];

if(isset($_POST['edit'])){
	$name = $_POST['name'];
	$subname = $_POST['subname'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$image = $_POST['image'];
	$sql = "UPDATE items SET name = '$name', subname = 'subname', description = '$description', price = '$price', image = '$image' WHERE id = '$id'";
	mysqli_query($conn,$sql);

	die("Item successfully updated. <br><a href='items.php'>Go back to ITEMS page</a>");
	//header('location:items.php');
}

$sql = "SELECT * FROM items WHERE id = '$id'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){
	$name = $row['name'];
	$subname = $row['subname'];
	$description = $row['description'];
	$price = $row['price'];
	$image = $row['image'];

	echo "<form method='post' action=''>
		Name: 
		<input type='text' name='name' value='$name'><br>
		Subname: 
		<input type='text' name='subname' value='$subname'><br>
		Description: 
		<textarea name='description'> $description </textarea><br>
		Price: 
		<input type='number' name='price' value='$price'><br>
		Image Location: 
		<input type='text' name='image' value='$image'><br>
		<input type='submit' name='edit' value='Edit'>
	</form>";
}

?>

</body>
</html>