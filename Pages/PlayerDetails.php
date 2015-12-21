<?php

	require($_SERVER['DOCUMENT_ROOT']."/clashofclans/database.php"); 

		$currentName = $_GET['name'];

		$query = " 
	    SELECT * FROM members_statistics WHERE name = '$currentName'
	"; 
	 
	try { 
	    // Execute the query to create the user 
	    $stmt = $db->prepare($query); 
	    $stmt->execute(); 
	} 
	catch (PDOException $ex) { 
	    // Note: On a production website, you should not output $ex->getMessage(). 
	    // It may provide an attacker with helpful information about your code.  
	    die("Failed to run query: " . $ex->getMessage()); 
	} 

	$rows = $stmt->fetchAll();
	$members_statistics_id = $rows[0]['id'];

	$query = " 
    SELECT 
        war_id,
        attackNumber,
        damage,
        target,
        enemyClan,
        starsWon,
        starsEarned
    FROM members_attacks
    WHERE members_statistics_id = '$members_statistics_id'
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

?>

<div class="enter-effect">

	<h1 class="page-header">Player Statistics <small><?php echo '('.$_GET['name'].')'; ?></small></h1>
	<ol class="breadcrumb">
	    <li><a href="" onClick="loadDoc('Home'); return false;">Home</a></li>
	    <li><a href="" onClick="loadDoc('Statistics'); return false;">Statistics</a></li>
	    <li><?php echo $_GET['name']; ?></li>
	</ol>	

	<table class="table table-striped table-bordered table-hover dt-responsive members-table">
		<thead>
			<tr>
				<th>War Number</th>
				<th>Attack #</th>
				<th>Damage</th>
				<th>Enemy</th>
				<th>Enemy Clan</th>
				<th>Stars Won</th>
				<th>Stars Earned</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($rows as $attack) : ?>
				<tr>
					<td><a onclick="loadWar('<?php echo $attack['war_id']; ?>')" class="pointer"><?php echo $attack['war_id']; ?></a></td>
					<td>Attack <?php echo $attack['attackNumber']; ?></td>
					<td><?php echo $attack['damage']; ?></td>
					<td><?php echo $attack['target']; ?></td>
					<td><?php echo $attack['enemyClan']; ?></td>
					<td><?php echo $attack['starsWon']; ?></td>
					<td><?php echo $attack['starsEarned']; ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

</div>