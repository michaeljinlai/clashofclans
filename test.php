<?php

// Gets an array of all json file names (including '.' and '..')
$directory = 'database/war-history/json';

// Remove the '.' and '..' from the array
$scanned_directory = array_diff(scandir($directory), array('..', '.'));

$playerArray = array();
$attacksUsedArray = array();
$starsEarnedArray = array();
$totalDamageArray = array(); 

foreach ($scanned_directory as $warFile) {
	$str = file_get_contents('database/war-history/json/'.$warFile);
	$json = json_decode($str, true);

	foreach ($json['home']['roster'] as $roster) {

		// Put all player names into playerArray
		if(!in_array($roster['name'], $playerArray)) {
        	array_push($playerArray, $roster['name']);
        }

	}
}	

for ($i = 0; $i < count($playerArray); $i++) {
	$attacksUsedArray[$i] = 0;
	$starsEarnedArray[$i] = 0;
	$totalDamageArray[$i] = 0;
}

$fullArray = array($playerArray, $attacksUsedArray, $starsEarnedArray, $totalDamageArray);

// Legend
// $fullArray[0] List of all player names
// $fullArray[1] Total attacks
// $fullArray[2] Stars earned

foreach ($scanned_directory as $warFile) {
	$str = file_get_contents('database/war-history/json/'.$warFile);
	$json = json_decode($str, true);

	foreach ($json['home']['roster'] as $roster) {
        // Put all data in array
        $count = 0;
        foreach ($fullArray[0] as $player) {
	        if ($player === $roster['name']) {
	        	if ($roster['attack1']['target'] !== "") {
	        		$fullArray[1][$count] = $fullArray[1][$count] + 1;
	        		$fullArray[2][$count] = $fullArray[2][$count] + $roster['attack1']['starsEarned'];
	        		$fullArray[3][$count] = $fullArray[3][$count] + $roster['attack1']['damage'];
	        	}
	        	if ($roster['attack2']['target'] !== "") {
	        		$fullArray[1][$count] = $fullArray[1][$count] + 1;
	        		$fullArray[2][$count] = $fullArray[2][$count] + $roster['attack2']['starsEarned'];
	        		$fullArray[3][$count] = $fullArray[3][$count] + $roster['attack2']['damage'];
	        	}
	        }
	        $count = $count + 1;
	    }
	}
}	

var_dump($fullArray);





// $array1 = array("ben", "tom", "james");
// $array2 = array("1", "2", "3");
// $array3 = array($array1, $array2);

// print_r($array3);
// echo '<br>';

// $count = 0;
// foreach ($array3[0] as $wat) {
// 	if ($wat === "tom") {
// 		$array3[1][$count] = $array3[1][$count] + 5;
// 	}
// 	$count = $count + 1;
// }

// print_r($array3);

?>


































