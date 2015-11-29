<?php require($_SERVER['DOCUMENT_ROOT']."/clashofclans/Elements/header.php"); ?>

<?php 
	$str = file_get_contents('../database/war-history/json/'.$_GET['id'].'.json');
	$json = json_decode($str, true);

	// Display damage and stars
	function displayResult($event, $useGameFont = true) {
		echo '<div>';
		if ($useGameFont)
			echo '<span class="war-dmg war-event-dmg">'.$event['damage']."% ".'</span>';
		else
			echo'<span class="war-team-dmg">'.$event['damage']."% ".'</span>';
		echo '<span class="war-star-img-container">';
		$count = 0;
		while ($count < $event['starsWon'] - $event['starsEarned']) {
			echo '<img src="img/Star-Previously-Won.png" class="war-star-img" />';
			$count = $count + 1;
		}
		$count = 0;
		while ($count < $event['starsEarned']) {
			echo '<img src="img/Star.png" class="war-star-img" />';
			$count = $count + 1;
		}
		$count = 0;
		while ($count < 3 - $event['starsWon']) {
			echo '<img src="img/Star-Empty.png" class="war-star-img" />';
			$count = $count + 1;
		}
		echo '</span>';
		echo '</div>';
	}

	// Used in My Team and Enemy Team only
	function displayAttack($player, $attackNum) {
		$attack = ($attackNum == 1) ? $player['attack1'] : $player['attack2'];
		if ($player['attacksUsed'] >= $attackNum) {
			echo '<span class="">'.$attack['targetPosition'].". ".$attack['target'].'</span>';
			displayResult($attack, false);
		}
	}

	function displayTotalStars($player) {
		echo $player['attack1']['starsEarned'] + $player['attack2']['starsEarned'];
		echo "/";
		echo $player['attack1']['starsWon'] + $player['attack2']['starsWon'];
	}

	// Used in My Team and Enemy Team only
	function displayEnemyBestAttack($player) {
		if ($player['totalDefenses'] > 0) {
			$attack = $player['enemyBestAttack'];
			echo '<span class="">'.$attack['targetPosition'].". ".$attack['target'].'</span>';
			displayResult($attack, false);
		}
	}
?>

<!-- Datatables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/bs/dt-1.10.10/datatables.min.css"/> 

<h1 class="page-header">War Details <small><?php echo '#'.$json['id'].' versus '.$json['enemy']['name']; ?></small></h2>
<ul class="nav nav-pills">
<li><a onClick="loadDoc('WarLog')">Back</a></li>
<li class="active"><a data-toggle="pill" href="#warStats">War Stats</a></li>
<li><a data-toggle="pill" href="#warEvents">War Events</a></li>
<li><a data-toggle="pill" href="#myTeam">My Team</a></li>
<li><a data-toggle="pill" href="#enemyTeam">Enemy Team</a></li>
</ul>

<div class="tab-content">
	<!-- War Stats Tab -->
	<div id="warStats" class="tab-pane fade in active">
	    <table class="war-clan-vs-clan table table-striped table-bordered table-hover dt-responsive members-table">
			<thead>
				<tr>
					<th class="col-xs-4"><?php echo $json['home']['name']; ?></th>
					<th class="col-xs-4">VS</th>
					<th class="col-xs-4"><?php echo $json['enemy']['name']; ?></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="col-xs-4"><?php echo $json['summary']['home']['totalStars'] ?></td>
					<td class="col-xs-4">Final Score</td>
					<td class="col-xs-4"><?php echo $json['summary']['enemy']['totalStars'] ?></td>		
				</tr>
				<tr>
					<td class="col-xs-4"><?php echo number_format((float)$json['summary']['home']['totalDestruction'], 2, '.', ''); ?>%</td>
					<td class="col-xs-4">Total Destruction</td>
					<td class="col-xs-4"><?php echo number_format((float)$json['summary']['enemy']['totalDestruction'], 2, '.', '');?>%</td>		
				</tr>
			</tbody>
		</table>
	    <table class="war-stats table table-striped table-bordered table-hover dt-responsive members-table">
			<thead>
				<tr>
					<th colspan="3">Attack Totals</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="col-xs-4"><?php echo $json['summary']['home']['attacksUsed'] ?></td>
					<td class="col-xs-4">Attacks Used</td>
					<td class="col-xs-4"><?php echo $json['summary']['enemy']['attacksUsed'] ?></td>
				</tr>
				<tr>
					<td class="col-xs-4"><?php echo $json['summary']['home']['attacksWon'] ?></td>
					<td class="col-xs-4">Attacks Won</td>
					<td class="col-xs-4"><?php echo $json['summary']['enemy']['attacksWon'] ?></td>
				</tr>
				<tr>
					<td class="col-xs-4"><?php echo $json['summary']['home']['attacksLost'] ?></td>
					<td class="col-xs-4">Attacks Lost</td>
					<td class="col-xs-4"><?php echo $json['summary']['enemy']['attacksLost'] ?></td>
				</tr>
				<tr>
					<td class="col-xs-4"><?php echo $json['summary']['home']['attacksRemaining'] ?></td>
					<td class="col-xs-4">Attacks Remaining</td>
					<td class="col-xs-4"><?php echo $json['summary']['enemy']['attacksRemaining'] ?></td>
				</tr>
			</tbody>
		</table>
	    <table class="war-stats table table-striped table-bordered table-hover dt-responsive members-table">
			<thead>
				<tr>
					<th colspan="3">Best Attacks</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="col-xs-4"><?php echo $json['summary']['home']['3Star']; ?></td>
					<td class="col-xs-4">3 Stars</td>
					<td class="col-xs-4"><?php echo $json['summary']['enemy']['3Star']; ?></td>
				</tr>
				<tr>
					<td class="col-xs-4"><?php echo $json['summary']['home']['2Star']; ?></td>
					<td class="col-xs-4">2 Stars</td>
					<td class="col-xs-4"><?php echo $json['summary']['enemy']['2Star']; ?></td>
				</tr>
				<tr>
					<td class="col-xs-4"><?php echo $json['summary']['home']['1Star']; ?></td>
					<td class="col-xs-4">1 Star</td>
					<td class="col-xs-4"><?php echo $json['summary']['enemy']['1Star']; ?></td>
				</tr>
			</tbody>
		</table>
	    <table class="war-stats table table-striped table-bordered table-hover dt-responsive members-table">
			<thead>
				<tr>
					<th colspan="3">Attack Stats</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="col-xs-4">Unknown</td>
					<td class="col-xs-4">New Stars Per Attack</td>
					<td class="col-xs-4">Unknown</td>
				</tr>
				<tr>
					<td class="col-xs-4">Unknown</td>
					<td class="col-xs-4">Average Destruction</td>
					<td class="col-xs-4">Unknown</td>
				</tr>
				<tr>
					<td class="col-xs-4">Unknown</td>
					<td class="col-xs-4">Average Attack Duration</td>
					<td class="col-xs-4">Unknown</td>
				</tr>
			</tbody>
		</table>
	    <table class="war-stats table table-striped table-bordered table-hover dt-responsive members-table">
			<thead>
				<tr>
					<th colspan="3">Featured Battles</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="col-xs-4">Unknown</td>
					<td class="col-xs-4">Most Heroic Attack</td>
					<td class="col-xs-4">Unknown</td>
				</tr>
				<tr>
					<td class="col-xs-4">Unknown</td>
					<td class="col-xs-4">Most Heroic Defense</td>
					<td class="col-xs-4">Unknown</td>
				</tr>
			</tbody>
		</table>
	</div>
	<!-- War Events Tab -->    
	<div id="warEvents" class="tab-pane fade">
	    <table id="war-events" class="war-events table table-striped table-hover dt-responsive members-table">
			<thead style="border-top:5px solid red;">
				<tr>
					<th>#</th>
					<th>Time Remaining</th>
					<th>Prepare to Die</th>
					<th><?php echo $json['enemy']['name']; ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($json['events'] as $event) : ?>
					<tr class="
						<?php 
							if ($event['starsEarned'] === 0) {
								echo 'war-event-background-neutral';
							}
							elseif ($event['isHomeAttack'] === true && $event['starsEarned'] > 0) {
								echo 'war-event-background-win';
							}
							elseif ($event['isHomeAttack'] === false && $event['starsEarned'] > 0) {
								echo 'war-event-background-lose';
							}
						?>
					">
						<td class="col-xs-1"><?php echo '<span class="war-event-id">'.$event['id'].'</span>'; ?></td>
						<td class="col-xs-1"><?php echo '<span class="war-time-remain">'.$event['timeLeftDisplay'].'</span>'; ?></td>
						<td class="col-xs-5">
							<?php							
								$nameDisplay = $event['homePlayerPosition'].". ".$event['homePlayer'];
								if ($event['isHomeAttack'] === false) {
									if ($event['starsWon'] > 0) {
										echo '<img class="war-event-img" src="img/Shield-Broken.png" />';
									}
									elseif ($event['starsWon'] === 0) {
										echo '<img class="war-event-img" src="img/Shield.png" />';
									}
									echo '<span class="war-name-display">'.$nameDisplay.'</span>';
									if ($event['starsWon'] > 0) {
										echo '<div class="war-event-defeat">Defeat</div>';
									}
									elseif ($event['starsWon'] === 0) {
										echo '<div class="war-event-defended">Defended!</div>';
									}
								}
								elseif ($event['isHomeAttack'] === true) {
									if ($event['starsWon'] > 0) {
										echo '<img class="war-event-img" src="img/Sword.png" />';
									}
									elseif ($event['starsWon'] === 0) {
										echo '<img class="war-event-img" src="img/Sword-Broken.png" />';									
									}
									echo '<span class="war-name-display">'.$nameDisplay.'</span>';
									displayResult($event);
								}
							?>
						</td>
						<td class="col-xs-5">
							<?php 
								$nameDisplay = $event['enemyPlayerPosition'].". ".$event['enemyPlayer'];
								if ($event['isHomeAttack'] === false) {
									if ($event['starsWon'] > 0) {
										echo '<img class="war-event-img" src="img/Sword.png" />';
									}
									elseif ($event['starsWon'] === 0) {
										echo '<img class="war-event-img" src="img/Sword-Broken.png" />';
									}
									echo '<span class="war-name-display">'.$nameDisplay.'</span>'; 
									displayResult($event);
								}
								elseif ($event['isHomeAttack'] === true) {
									if ($event['starsWon'] > 0) {
										echo '<img class="war-event-img" src="img/Shield-Broken.png" />';
									}
									elseif ($event['starsWon'] === 0) {
										echo '<img class="war-event-img" src="img/Shield.png" />';
									}
									echo '<span class="war-name-display">'.$nameDisplay.'</span>'; 
									if ($event['starsWon'] > 0) {
										echo '<div class="war-event-defeat">Defeat</div>';
									}
									elseif ($event['starsWon'] === 0) {
										echo '<div class="war-event-defended">Defended!</div>';
									}
								}
							?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<!-- My Team Tab -->    
	<div id="myTeam" class="tab-pane fade">

	    <table id="war-my-team" class="war-team table table-striped table-bordered table-hover dt-responsive members-table">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Town Hall</th>				
					<th>Attack 1</th>
					<th>Attack 2</th>
					<th>Total Stars</th>
					<th>Enemy Best Attack</th>
					<th>Total Defenses</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($json['home']['roster'] as $enemy) : ?>
				<tr>
					<td class="col-xs-1"><?php echo $enemy['position']; ?></td>				
					<td class="col-xs-2"><?php echo $enemy['name']; ?></td>
					<td class="col-xs-1"><?php echo $enemy['townHall']; ?></td>
					<td class="col-xs-2"><?php displayAttack($enemy, 1); ?></td>
					<td class="col-xs-2"><?php displayAttack($enemy, 2); ?></td>
					<td class="col-xs-1"><?php displayTotalStars($enemy); ?></td>
					<td class="col-xs-2"><?php displayEnemyBestAttack($enemy); ?></td>
					<td class="col-xs-1"><?php echo $enemy['totalDefenses']; ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<!-- Enemy Team Tab -->
	<div id="enemyTeam" class="tab-pane fade">
	    <table id="war-enemy-team" class="war-team table table-striped table-bordered table-hover dt-responsive members-table">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Town Hall</th>
					<th>Attack 1</th>
					<th>Attack 2</th>
					<th>Total Stars</th>
					<th>Home Best Attack</th>
					<th>Total Defenses</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($json['enemy']['roster'] as $enemy) : ?>
				<tr>
					<td class="col-xs-1"><?php echo $enemy['position']; ?></td>				
					<td class="col-xs-2"><?php echo $enemy['name']; ?></td>
					<td class="col-xs-1"><?php echo $enemy['townHall']; ?></td>
					<td class="col-xs-2"><?php displayAttack($enemy, 1); ?></td>
					<td class="col-xs-2"><?php displayAttack($enemy, 2); ?></td>
					<td class="col-xs-1"><?php displayTotalStars($enemy); ?></td>
					<td class="col-xs-2"><?php displayEnemyBestAttack($enemy); ?></td>
					<td class="col-xs-1"><?php echo $enemy['totalDefenses']; ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
	    $('#war-events').DataTable({
	    	paging: false,
	    	"dom": '<"pull-left"f><"pull-right"li>tp',
	    	language: {
		        search: "_INPUT_",
		        searchPlaceholder: "Search"
		    },
	    	aoColumnDefs: [
	    		{ bSortable: false, aTargets: [ 1, 2, 3 ] }
	    	]
	    });

	    $('#war-my-team').DataTable({
			paging: false,
			"dom": '<"pull-left"f><"pull-right"li>tp',
	    	language: {
		        search: "_INPUT_",
		        searchPlaceholder: "Search"
		    },
	    	aoColumnDefs: [
	    		{ bSortable: false, aTargets: [ 3, 4, 6 ] }
	    	]
		});

	    $('#war-enemy-team').DataTable({
	    	paging: false,
	    	"dom": '<"pull-left"f><"pull-right"li>tp',
	    	language: {
		        search: "_INPUT_",
		        searchPlaceholder: "Search"
		    },
	    	aoColumnDefs: [
	    		{ bSortable: false, aTargets: [ 3, 4, 6 ] }
	    	]
	    });
	});
</script>