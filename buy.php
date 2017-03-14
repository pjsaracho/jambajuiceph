<?php

session_start();
$id = $_GET['id'];
$user = $_SESSION['username'];
$b = ['name'=>$user,'item'=>$id];

$fp = fopen('buy.json', 'a+');
$string = file_get_contents("buy.json");
fclose($fp);

if($string!='null'){
	$buy = json_decode($string, true);
}
$buy[] = $b;

$fp = fopen('buy.json', 'w');
fwrite($fp, json_encode($buy, JSON_PRETTY_PRINT));
fclose($fp);

header('location:match.php?bid=$id');

?>