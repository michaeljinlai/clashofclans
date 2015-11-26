<?php require($_SERVER['DOCUMENT_ROOT']."/clashofclans/Elements/header.php"); ?>

<?php 
	$str = file_get_contents('../database/war-history/json/'.$_GET['id'].'.json');
	$json = json_decode($str, true);
?>

<!-- Datatables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/bs/dt-1.10.10/datatables.min.css"/> 

<h1 class="page-header">War Details <small><?php echo '#'.$json['id'].' versus '.$json['enemy']['name']; ?></small></h2>
<ul class="nav nav-pills">
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
				<th class="col-xs-4">Prepare to Die</th>
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
    <table class="war-events table table-striped table-bordered table-hover dt-responsive members-table">
		<thead>
			<tr>
				<th>Prepare to Die</th>
				<th><?php echo $json['enemy']['name']; ?></th>
				<th>Time Until War Ends</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($json['events'] as $event) : ?>
				<tr>
					<td class="col-xs-4">
						<?php 
							if ($event['isHomeAttack'] === false) {
								if ($event['starsWon'] > 0) {
									echo '<img class="war-event-img" src="img/Shield-Broken.png" width="30" height="30" />';
								}
								elseif ($event['starsWon'] === 0) {
									echo '<img class="war-event-img" src="img/Shield.png" width="30" height="30" />';
								}
							}
							elseif ($event['isHomeAttack'] === true) {
								if ($event['starsWon'] > 0) {
									echo '<img class="war-event-img" src="img/Sword.png" width="30" height="30" />';
									$count = 0;
									while ($count < $event['starsWon'] - $event['starsEarned']) {
										echo '<img src="img/Star-Previously-Won.png" width="18" height="18" />';
										$count = $count + 1;
									}
									$count = 0;
									while ($count < $event['starsEarned']) {
										echo '<img src="img/Star.png" width="18" height="18" />';
										$count = $count + 1;
									}
									$count = 0;
									while ($count < 3 - $event['starsWon']) {
										echo '<img src="img/Star-Empty.png" width="18" height="18" />';
										$count = $count + 1;
									}
								}
								elseif ($event['starsWon'] === 0) {
									echo '<img class="war-event-img" src="img/Sword-Broken.png" width="30" height="30" />';
									while ($count < $event['starsWon'] - $event['starsEarned']) {
										echo '<img src="img/Star-Previously-Won.png" width="18" height="18" />';
										$count = $count + 1;
									}
									$count = 0;
									while ($count < $event['starsEarned']) {
										echo '<img src="img/Star.png" width="18" height="18" />';
										$count = $count + 1;
									}
									$count = 0;
									while ($count < 3 - $event['starsWon']) {
										echo '<img src="img/Star-Empty.png" width="18" height="18" />';
										$count = $count + 1;
									}
								}
							}
							echo $event['homePlayer']; 
						?>
					</td>
					<td class="col-xs-4">
						<?php 
							if ($event['isHomeAttack'] === false) {
								if ($event['starsWon'] > 0) {
									echo '<img class="war-event-img" src="img/Sword.png" width="30" height="30" />';
									$count = 0;
									while ($count < $event['starsWon'] - $event['starsEarned']) {
										echo '<img src="img/Star-Previously-Won.png" width="18" height="18" />';
										$count = $count + 1;
									}
									$count = 0;
									while ($count < $event['starsEarned']) {
										echo '<img src="img/Star.png" width="18" height="18" />';
										$count = $count + 1;
									}
									$count = 0;
									while ($count < 3 - $event['starsWon']) {
										echo '<img src="img/Star-Empty.png" width="18" height="18" />';
										$count = $count + 1;
									}
								}
								elseif ($event['starsWon'] === 0) {
									echo '<img class="war-event-img" src="img/Sword-Broken.png" width="30" height="30" />';
									while ($count < $event['starsWon'] - $event['starsEarned']) {
										echo '<img src="img/Star-Previously-Won.png" width="18" height="18" />';
										$count = $count + 1;
									}
									$count = 0;
									while ($count < $event['starsEarned']) {
										echo '<img src="img/Star.png" width="18" height="18" />';
										$count = $count + 1;
									}
									$count = 0;
									while ($count < 3 - $event['starsWon']) {
										echo '<img src="img/Star-Empty.png" width="18" height="18" />';
										$count = $count + 1;
									}
								}
							}
							elseif ($event['isHomeAttack'] === true) {
								if ($event['starsWon'] > 0) {
									echo '<img class="war-event-img" src="img/Shield-Broken.png" width="30" height="30" />';
								}
								elseif ($event['starsWon'] === 0) {
									echo '<img class="war-event-img" src="img/Shield.png" width="30" height="30" />';
								}
							}
							echo $event['enemyPlayer']; 
						?>
					</td>
					<td class="col-xs-4"><?php echo $event['timeLeftDisplay'].' until war ends'; ?></td>
				</tr>
			<?php endforeach; ?>
				<tr>
					<td colspan="2"></td>
					<td>War Started</td>
				</tr>
		</tbody>
	</table>
</div>
	<!-- My Team Tab -->    
<div id="myTeam" class="tab-pane fade">

    <table class="war-my-team table table-striped table-bordered table-hover dt-responsive members-table">
		<thead>
			<tr>
				<th>#</th>
				<th>Experience</th>
				<th>Name</th>
				<th>Attack 1</th>
				<th>Attack 2</th>
				<th>Stars</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($json['home']['roster'] as $enemy) : ?>
			<tr>
				<td class="col-xs-1"><?php echo $enemy['position']; ?></td>
				<td class="col-xs-1">Unknown</td>
				<td class="col-xs-3"><?php echo $enemy['name']; ?></td>
				<td class="col-xs-3"><?php echo $enemy['attack1']['target']; ?></td>
				<td class="col-xs-3"><?php echo $enemy['attack2']['target']; ?></td>
				<td class="col-xs-1"><?php echo ($enemy['attack1']['starsEarned'] + $enemy['attack2']['starsEarned']); ?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<!-- Enemy Team Tab -->
<div id="enemyTeam" class="tab-pane fade">
    <table class="war-enemy-team table table-striped table-bordered table-hover dt-responsive members-table">
		<thead>
			<tr>
				<th>#</th>
				<th>Experience</th>
				<th>Name</th>
				<th>Attack 1</th>
				<th>Attack 2</th>
				<th>Stars</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($json['enemy']['roster'] as $enemy) : ?>
			<tr>
				<td class="col-xs-1"><?php echo $enemy['position']; ?></td>
				<td class="col-xs-1">Unknown</td>
				<td class="col-xs-3"><?php echo $enemy['name']; ?></td>
				<td class="col-xs-3"><?php echo $enemy['attack1']['target']; ?></td>
				<td class="col-xs-3"><?php echo $enemy['attack2']['target']; ?></td>
				<td class="col-xs-1"><?php echo ($enemy['attack1']['starsEarned'] + $enemy['attack2']['starsEarned']); ?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
</div>