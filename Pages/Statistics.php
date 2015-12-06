<div class="enter-effect">
    <h1 class="page-header">Statistics</h1>
    <ol class="breadcrumb">
        <li><a href="" onClick="loadDoc('Home'); return false;">Home</a></li>
        <li>Statistics</li>
    </ol>


<?php 

    // First we execute our common code to connection to the database and start the session 
    require($_SERVER['DOCUMENT_ROOT']."/clashofclans/database.php"); 
     
    // Everything below this point in the file is secured by the login system 
     
    // We can retrieve a list of members from the database using a SELECT query. 
    // In this case we do not have a WHERE clause because we want to select all 
    // of the rows from the database table. 
    $query = " 
        SELECT 
            name, 
            role, 
            expLevel,
            trophies,
            clanRank,
            previousClanRank,
            donations,
            donationsReceived,
            leagueBadgeImg_s,
            leagueBadgeImg_xl 
        FROM members 
    "; 
     
    try 
    { 
        // These two statements run the query against your database table. 
        $stmt = $db->prepare($query); 
        $stmt->execute(); 
    } 
    catch(PDOException $ex) 
    { 
        // Note: On a production website, you should not output $ex->getMessage(). 
        // It may provide an attacker with helpful information about your code.  
        die("Failed to run query: " . $ex->getMessage()); 
    } 
         
    // Finally, we can retrieve all of the found rows into an array using fetchAll 
    $rows = $stmt->fetchAll(); 
?> 

<?php require($_SERVER['DOCUMENT_ROOT']."/clashofclans/Elements/header.php"); ?>

<?php // Testing Area
  
  // Initialize variables
  $leaderCount = 0;
  $coLeaderCount = 0;
  $adminCount = 0;
  $memberCount = 0;

  foreach ($rows as $row) {
    switch ($row['role']) {
      case 'leader':
        $leaderCount = $leaderCount + 1;
        break;
      case 'coLeader':
        $coLeaderCount = $coLeaderCount + 1;
        break;
      case 'admin':
        $adminCount = $adminCount + 1;
        break;
      case 'member':
        $memberCount = $memberCount + 1;
        break;
    }
  }

  $total = $leaderCount+$coLeaderCount+$adminCount+$memberCount;

?>

<div id="container" style="width:100%; height:400px;"></div>
<div style="padding-top: 50px; text-align: center;">More coming soon!</div>

<table id="datatable" class="hide">
  <thead>
    <tr>
      <th>Role</th>
      <th>#</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Leader</td>
      <td><?php echo $leaderCount; ?></td>
    </tr>
    <tr>
      <td>Co-leader</td>
      <td><?php echo $coLeaderCount; ?></td>
    </tr>
    <tr>
      <td>Elder</td>
      <td><?php echo $adminCount; ?></td>
    </tr>
    <tr>
      <td>Member</td>
      <td><?php echo $memberCount; ?></td>
    </tr>
  </tbody>
</table>

<br>

<?php

// Gets an array of all json file names (including '.' and '..')
$directory = '../database/war-history/json';

// Remove the '.' and '..' from the array
$scanned_directory = array_diff(scandir($directory), array('..', '.'));

$playerArray = array();
$attacksUsedArray = array();
$starsEarnedArray = array();
$totalStarsWonArray = array(); 
$totalDamageArray = array(); 

foreach ($scanned_directory as $warFile) {
  $str = file_get_contents('../database/war-history/json/'.$warFile);
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
  $str = file_get_contents('../database/war-history/json/'.$warFile);
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

//var_dump($fullArray);

?>

<table class="table table-striped table-bordered table-hover dt-responsive">
  <thead>
    <tr>
      <th class="col-xs-1"></th>
      <th>Name</th>
      <th>Total Attacks</th>
      <th>Stars Earned</th>
      <th>Stars Won</th>
      <th>Total Damage</th>
      <th>Avg Stars Earned / Attack</th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i = 0; $i < count($playerArray); $i++) : ?>
      <tr>
        <td style="text-align:center;"><a onclick="loadPlayer('<?php echo urlencode($fullArray[0][$i]); ?>')" class="btn btn-primary">View</a></td>
        <td><?php echo $fullArray[0][$i]; ?></td>
        <td><?php echo $fullArray[1][$i]; ?></td>
        <td><?php echo $fullArray[2][$i]; ?></td>
        <td><?php echo $fullArray[3][$i]; ?></td>
        <td><?php echo $fullArray[4][$i]; ?></td>
        <td><?php echo number_format((float)$fullArray[2][$i]/$fullArray[1][$i], 2, '.', ''); ?></td>
      </tr>
    <?php endfor; ?>
  </tbody>
</table>

</div>

<script>
$(function () {
    $('#container').highcharts({
        data: {
            table: 'datatable'
        },
        chart: {
            type: 'pie'
        },
        credits: {
            enabled: false
        },
        title: {
            text: 'Distribution of Roles'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Units'
            }
        },
        tooltip: {
            formatter: function () {
                return '<b>' + this.series.name + '</b><br/>' +
                    this.point.y + ' ' + this.point.name;
            }
        }
    });
});
</script>