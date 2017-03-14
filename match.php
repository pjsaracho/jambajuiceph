<?php

$string = file_get_contents("buy.json");
$buy = json_decode($string, true);

$string = file_get_contents("sell.json");
$sell = json_decode($string, true);

$fp = fopen('match.json', 'a+');
$string = file_get_contents("match.json");
fclose($fp);

if($string!='null'){
	$match = json_decode($string, true);
}

if(isset($_GET['bid'])){
	foreach ($sell as $skey => $svalue) {
//		foreach ($buy as $bkey => $bvalue) {
			//echo $svalue['item']." ".$bvalue['item']."<br>";
			if($svalue['item'] == $buy[$_GET['bid']]['item'])
				print_r ($match[] = ['item'=>$svalue['item'],
							'seller'=>$svalue['name'],
							'buyer'=>$buy[$_GET['bid']]['name']]);
			//echo "<br>";
//		}
	}
}

$fp = fopen('match.json', 'w');
fwrite($fp, json_encode($match, JSON_PRETTY_PRINT));
fclose($fp);

header('location:edititem.php');

?>