<?php

require($_SERVER['DOCUMENT_ROOT']."/clashofclans/database.php"); 

// Check if user is logged in
if(empty($_SESSION['user']) || $_SESSION['user']['privilege'] !== 'administrator') 
{ 
  // If they are not, we redirect them to the login page. 
  header("Location: login.php"); 

  // Remember that this die statement is absolutely critical.  Without it, 
  // people can view your members-only content without logging in. 
  die("Redirecting to login.php"); 
} 

// Gets an array of all json file names (including '.' and '..')
$directory = 'database/war-history/json';

// Remove the '.' and '..' from the array
$scanned_directory = array_diff(scandir($directory), array('..', '.'));

$playerArray = array();
$attacksUsedArray = array();
$starsEarnedArray = array();
$totalStarsWonArray = array(); 
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
  $totalStarsWonArray[$i] = 0;
  $totalDamageArray[$i] = 0;
}

$fullArray = array($playerArray, $attacksUsedArray, $starsEarnedArray, $totalStarsWonArray, $totalDamageArray);

// Legend
// $fullArray[0] List of all player names
// $fullArray[1] Total attacks
// $fullArray[2] Stars earned
// $fullArray[3] Stars won
// $fullArray[4] Total damage

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
              $fullArray[3][$count] = $fullArray[3][$count] + $roster['attack1']['starsWon'];
              $fullArray[4][$count] = $fullArray[4][$count] + $roster['attack1']['damage'];
            }
            if ($roster['attack2']['target'] !== "") {
              $fullArray[1][$count] = $fullArray[1][$count] + 1;
              $fullArray[2][$count] = $fullArray[2][$count] + $roster['attack2']['starsEarned'];
              $fullArray[3][$count] = $fullArray[3][$count] + $roster['attack2']['starsWon'];
              $fullArray[4][$count] = $fullArray[4][$count] + $roster['attack2']['damage'];
            }
          }
          $count = $count + 1;
      }
  }
}

if (!empty($fullArray[0][0])) {

    $truncateTable = "TRUNCATE TABLE members_statistics";
    $stmt = $db->prepare($truncateTable); 
    $result = $stmt->execute(); 

  for ($i = 0; $i < count($playerArray); $i++) {

    $query = " 
        INSERT INTO members_statistics ( 
            name,
            totalAttacks,
            starsEarned,
            starsWon,
            damage,
            avgStarsEarned,
            offenseValCalc,
            defenseValCalc
        ) VALUES ( 
            :name,
            :totalAttacks,
            :starsEarned,
            :starsWon,
            :damage,
            :avgStarsEarned,
            :offenseValCalc,
            :defenseValCalc
        ) 
    "; 

    $query_params = array( 
        ':name' => $fullArray[0][$i],
        ':totalAttacks' => $fullArray[1][$i],
        ':starsEarned' => $fullArray[2][$i],
        ':starsWon' => $fullArray[3][$i],
        ':damage' => $fullArray[4][$i],
        ':avgStarsEarned' => $fullArray[2][$i]/$fullArray[1][$i],
        ':offenseValCalc' => null,
        ':defenseValCalc' => null
    ); 
     
    try 
    { 
        // Execute the query to create the user 
        $stmt = $db->prepare($query); 
        $result = $stmt->execute($query_params); 
    } 
    catch(PDOException $ex) 
    { 
        // Note: On a production website, you should not output $ex->getMessage(). 
        // It may provide an attacker with helpful information about your code.  
        die("Failed to run query: " . $ex->getMessage()); 
    } 

  }

  header("Location: redirect.php?class=success&message=Please wait to be redirected"); 
  die(); 

}

else {
  header("Location: redirect.php?class=warning&message=An error has occured"); 
  die(); 
}

?>