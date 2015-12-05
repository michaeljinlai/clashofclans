<?php

// Gets an array of all json file names (including '.' and '..')
$directory = 'database/war-history/json';

// Remove the '.' and '..' from the array
$scanned_directory = array_diff(scandir($directory), array('..', '.'));

$playerArray = array();
$attacksUsedArray = array();

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
}

$fullArray = array($playerArray, $attacksUsedArray);

// Legend
// $fullArray[0] List of all player names
// $fullArray[0] List of total stars earned

foreach ($scanned_directory as $warFile) {
	$str = file_get_contents('database/war-history/json/'.$warFile);
	$json = json_decode($str, true);

	foreach ($json['home']['roster'] as $roster) {

        // Put all attacks used
        $count = 0;
        foreach ($fullArray[0] as $wat) {
	        if ($wat === $roster['name']) {
	        	$fullArray[1][$count] = $fullArray[1][$count] + 5;
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


































