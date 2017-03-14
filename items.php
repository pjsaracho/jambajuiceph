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

$sql = "SELECT DISTINCT category FROM items";
$result = mysqli_query($conn,$sql);

echo "<form method='post' action=''>";
echo "<select name='category'>";
echo "<option>All</option>";
while($row = mysqli_fetch_assoc($result)){
	$category = $row['category'];
	if(isset($_POST['category']) && $_POST['category']==$category)
		echo "<option selected>$category</option>";
	else
		echo "<option>$category</option>";
}
echo "</select> <input type='submit' name='search' value='Search'>";
echo "</form><br>";

if(isset($_POST['search']) && $_POST['category']!="All"){
	$category = $_POST['category'];
	$sql = "SELECT * FROM items WHERE category = '$category'";
}else
	$sql = "SELECT * FROM items";

$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){
	$id = $row['id'];
	$name = htmlspecialchars($row['name']);
	$subname = htmlspecialchars($row['subname']);
	$description = $row['description'];
	$price = $row['price'];
	$image = $row['image'];
	$category = $row['category'];

	echo "<div class='item_image'><img src='$image'></div>";

	echo "<h3>$name</h3> <h5>$subname</h5> $description <br> Php $price";

	echo "<br><a href='edit.php?id=$id'><button>Edit</button></a>
		<a href='delete.php?id=$id'><button>Delete</button></a>";

	echo "<div style='clear:both'></div>";
}

?>

</body>
</html>
