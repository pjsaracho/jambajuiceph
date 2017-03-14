<?php

$id = $_GET['id'];
$string = file_get_contents("items.json");
$items = json_decode($string, true);
$index = array_search($id,array_column($items, 'id'));

unset($items[$index]);

$fp = fopen('items.json', 'w');
fwrite($fp, json_encode($items, JSON_PRETTY_PRINT));
fclose($fp);

header('location:edititem.php');

?>