<?php

$users[] = ['username','password'];
$new = ['peejay','peejay'];

$user1 = $users;
$user1[] = $new;

$user2 = $users;
array_push($user2,$new);

echo "USER 1: <br>";
print_r($user1);

echo "USER 2: <br>";
print_r($user2);

echo "<br>";

$string = file_get_contents("users.json");
if($string)
	$array = json_decode($string, true);
$array[] = $new;

$fp = fopen('users.json', 'w');
fwrite($fp, json_encode($array, JSON_PRETTY_PRINT));
fclose($fp);

print_r($array);

?>