<?php

session_start();
$id = $_GET['id'];
$user = $_SESSION['username'];
$s = ['name'=>$user,'item'=>$id];

$fp = fopen('sell.json', 'a+');
$string = file_get_contents("sell.json");
fclose($fp);

if($string!='null'){
	$sell = json_decode($string, true);
}
$sell[] = $s;

$fp = fopen('sell.json', 'w');
fwrite($fp, json_encode($sell, JSON_PRETTY_PRINT));
fclose($fp);

header('location:match.php?sid=$id');

?>