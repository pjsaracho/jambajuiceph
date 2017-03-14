<?php
	
function get_title(){
	echo "Items Page";
}

function display_content(){
	$items = [
		['name'=>'Mango-A-Go-Go® Smoothie',
		'category'=>'Classic Smoothies',
		'price'=>'Php 150',
		'image'=>'Images/maggs.png'],
		['name'=>'Razzmatazz® Smoothie',
		'category'=>'Classic Smoothies',
		'price'=>'Php 150',
		'image'=>'Images/rs.png'],
		['name'=>'Strawberry Surf Rider™ Smoothie',
		'category'=>'Classic Smoothies',
		'price'=>'Php 150',
		'image'=>'Images/ssrs.png'],
		['name'=>'Aloha Pineapple® Smoothie',
		'category'=>'Classic Smoothies',
		'price'=>'Php 150',
		'image'=>'Images/aps.png'],
		['name'=>'Caribbean Passion® Smoothie',
		'category'=>'Classic Smoothies',
		'price'=>'Php 150',
		'image'=>'Images/cps.png'],
		['name'=>'Strawberry Whirl™ Smoothie',
		'category'=>'All Fruit Smoothies',
		'price'=>'Php 150',
		'image'=>'Images/allfruit/sws1.png']
	];

	foreach ($items as $row) {
		$name = $row['name'];
		$category = $row['category'];
		$price = $row['price'];
		$image = $row['image'];

		echo "<div class='col-xs-4'>";
		echo "<img src='$image'>";
		echo "<p>$name</p>";
		echo "<p>$price</p>";
		echo "<button class='btn btn-success'>Add to Cart</button>";
		echo "</div>";

	}
}

require_once('home.php');
?>
