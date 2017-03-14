<?php

session_start();
$id = $_GET['id'];

if(isset($_SESSION['cart_items'][$id])){
	$_SESSION['cart_items'][$id]++;
} else {
	$_SESSION['cart_items'][$id] = 1;
}

header('location: edititem.php');

?>