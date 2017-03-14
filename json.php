<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "larasongs";

$conn = mysqli_connect($host, $username, $password, $database);

$sql = "SELECT * FROM songs";

$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result)){
	$output[] = $row;
}

//print json_encode($output);

$fp = fopen('results.json', 'w');
fwrite($fp, json_encode($output, JSON_PRETTY_PRINT));
fclose($fp);

//var_dump($output);

?>