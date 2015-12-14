<div class="enter-effect">

    <h1 class="page-header">Statistics</h1>
    <ol class="breadcrumb">
        <li><a href="" onClick="loadDoc('Home'); return false;">Home</a></li>
        <li>Statistics</li>
    </ol>

	<?php // Begin pie chart of roles within clan

	    // First we execute our common code to connection to the database and start the session 
	    require($_SERVER['DOCUMENT_ROOT']."/clashofclans/database.php"); 
	     
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
	 
		require($_SERVER['DOCUMENT_ROOT']."/clashofclans/Elements/header.php"); 
	  
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

	<?php // Begin information of each player

	$query = " 
	    SELECT 
	        name,
	        totalAttacks,
	        starsEarned,
	        starsWon,
	        damage,
	        avgStarsEarned,
	        offenseValCalc,
	        defenseValCalc
	    FROM members_statistics 
	"; 

	try { 
	    // These two statements run the query against your database table. 
	    $stmt = $db->prepare($query); 
	    $stmt->execute(); 
	} 
	catch (PDOException $ex) { 
	    // Note: On a production website, you should not output $ex->getMessage(). 
	    // It may provide an attacker with helpful information about your code.  
	    die("Failed to run query: " . $ex->getMessage()); 
	} 
	   
	// Finally, we can retrieve all of the found rows into an array using fetchAll 
	$rows = $stmt->fetchAll();

	// Legend
	// $rows['name'] Player names
	// $rows['totalAttacks'] Total attacks
	// $rows['starsEarned'] Stars earned
	// $rows['starsWon'] Stars won
	// $rows['damage'] Total damage
	// $rows['avgStarsEarned'] Total damage
	// $rows['offenseValCalc'] Total damage
	// $rows['damage'] Total damage

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
	        <?php foreach ($rows as $member) : ?>
	            <tr>
					<td style="text-align:center;"><a onclick="loadPlayer('<?php echo urlencode($member['name']); ?>')" class="btn btn-primary">View</a></td>
					<td><?php echo $member['name']; ?></td>
					<td><?php echo $member['totalAttacks']; ?></td>
					<td><?php echo $member['starsEarned']; ?></td>
					<td><?php echo $member['starsWon']; ?></td>
					<td><?php echo $member['damage']; ?></td>
					<td><?php echo number_format((float)$member['starsEarned']/$member['totalAttacks'], 2, '.', ''); ?></td>
	            </tr>
	        <?php endforeach; ?>
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