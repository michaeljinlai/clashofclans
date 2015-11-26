<?php require($_SERVER['DOCUMENT_ROOT']."/clashofclans/Elements/header.php"); ?>

<?php 
	$str = file_get_contents('../database/war-history/json/'.$_GET['id'].'.json');
	$json = json_decode($str, true);
?>

<!-- Datatables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/bs/dt-1.10.10/datatables.min.css"/> 

<h1 class="page-header">War Details</h2>
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
				<td class="col-xs-4">Unknown</td>
				<td class="col-xs-4">Attacks Won</td>
				<td class="col-xs-4">Unknown</td>
			</tr>
			<tr>
				<td class="col-xs-4">Unknown</td>
				<td class="col-xs-4">Attacks Lost</td>
				<td class="col-xs-4">Unknown</td>
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
					<td class="col-xs-4"><?php echo $event['homePlayer']; ?></td>
					<td class="col-xs-4"><?php echo $event['enemyPlayer']; ?></td>
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

	<table class="war-clan-info table table-striped table-bordered table-hover dt-responsive members-table">
		<thead>
			<tr>
				<th>Prepare to Die</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="col-xs-6">Total Points</td>
				<td class="col-xs-6">123</td>
			</tr>
			<tr>
				<td class="col-xs-6">Wars Won</td>
				<td class="col-xs-6">123</td>
			</tr>
			<tr>
				<td class="col-xs-6">Members</td>
				<td class="col-xs-6">123</td>
			</tr>
			<tr>
				<td class="col-xs-6">Type</td>
				<td class="col-xs-6">123</td>
			</tr>
			<tr>
				<td class="col-xs-6">Required Trophies</td>
				<td class="col-xs-6">123</td>
			</tr>
			<tr>
				<td class="col-xs-6">War Frequency</td>
				<td class="col-xs-6">123</td>
			</tr>
			<tr>
				<td class="col-xs-6">Clan Location</td>
				<td class="col-xs-6">123</td>
			</tr>
			<tr>
				<td class="col-xs-6">Clan Tag</td>
				<td class="col-xs-6">123</td>
			</tr>
		</tbody>
	</table>

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

<?php echo $_GET['id']; ?>