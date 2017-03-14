<?php

session_start();
$string = file_get_contents("items.json");
$items = json_decode($string, true);

if(isset($_SESSION['cart_items'])){
	foreach ($_SESSION['cart_items'] as $id => $quantity) {
		$index = array_search($id,array_column($items, 'id'));
		$id = $items[$index]['id'];
		$name = $items[$index]['name'];
		$subname = $items[$index]['subname'];
		$description = $items[$index]['description'];
		$price = $items[$index]['price'];
		$image = $items[$index]['image'];
		$category = $items[$index]['category'];

		echo "<div class='item_image'><img src='$image'></div>";

		echo "<h3>$name ($quantity)</h3> <h5>$subname</h5> $description <br> Php $price";

		echo "<div style='clear:both'></div>";
	}
}

?>