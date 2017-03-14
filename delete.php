<!DOCTYPE html>
<html lang="en">
<html>
<head>
	<title></title>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
		.item_image{
			float: left;
		}
	</style>
</head>
<body>

<?php

include('connection.php');
mysqli_set_charset($conn,"UTF8");

$id = $_GET['id'];

if(isset($_POST['yes'])){
	$sql = "DELETE FROM items WHERE id='$id'";
	mysqli_query($conn,$sql);

	die("Item successfully deleted. <br><a href='items.php'>Go back to ITEMS page</a>");
	//header('location:items.php');
}

if(isset($_POST['no']))
	header('location:items.php');

$sql = "SELECT * FROM items WHERE id = 'id'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){
	$id = $row['id'];
	$name = $row['name'];
	$subname = $row['subname'];
	$description = $row['description'];
	$price = $row['price'];
	$image = $row['image'];
	$category = $row['category'];

	echo "<div class='item_image'><img src='$image'></div>";

	echo "<h3>$name</h3> <h5>$subname</h5> $description <br> Php $price";

	echo "<div style='clear:both'></div>";
}

echo "Are you sure you want to delete this item? <br>";
echo "<form method='post' action=''>
		<input type='submit' name='yes' value='Yes'>
		<input type='submit' name='no' value='No'>
	</form>";


?>

</body>
</html>
