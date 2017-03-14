<?php

$string = file_get_contents("results.json");

$array = json_decode($string, true);

foreach ($array as $key => $value) {
	//
}

?>