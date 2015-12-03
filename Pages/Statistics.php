<div>
    <h1 class="page-header">Statistics</h1>
    <ol class="breadcrumb">
        <li><a href="" onClick="loadDoc('Home'); return false;">Home</a></li>
        <li>Statistics</li>
    </ol>
</div>

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