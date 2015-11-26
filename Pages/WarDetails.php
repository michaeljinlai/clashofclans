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
				<th class="col-xs-4">Enemy Clan Name</th>
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
				<td class="col-xs-4">13</td>
				<td class="col-xs-4">Attacks Used</td>
				<td class="col-xs-4">11</td>
			</tr>
			<tr>
				<td class="col-xs-4">13</td>
				<td class="col-xs-4">Attacks Won</td>
				<td class="col-xs-4">11</td>
			</tr>
			<tr>
				<td class="col-xs-4">13</td>
				<td class="col-xs-4">Attacks Lost</td>
				<td class="col-xs-4">11</td>
			</tr>
			<tr>
				<td class="col-xs-4">13</td>
				<td class="col-xs-4">Attacks Remaining</td>
				<td class="col-xs-4">11</td>
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
				<td class="col-xs-4">13</td>
				<td class="col-xs-4">3 Stars</td>
				<td class="col-xs-4">11</td>
			</tr>
			<tr>
				<td class="col-xs-4">13</td>
				<td class="col-xs-4">2 Stars</td>
				<td class="col-xs-4">11</td>
			</tr>
			<tr>
				<td class="col-xs-4">13</td>
				<td class="col-xs-4">1 Star</td>
				<td class="col-xs-4">11</td>
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
				<td class="col-xs-4">13</td>
				<td class="col-xs-4">New Stars Per Attack</td>
				<td class="col-xs-4">11</td>
			</tr>
			<tr>
				<td class="col-xs-4">13</td>
				<td class="col-xs-4">Average Destruction</td>
				<td class="col-xs-4">11</td>
			</tr>
			<tr>
				<td class="col-xs-4">13</td>
				<td class="col-xs-4">Average Attack Duration</td>
				<td class="col-xs-4">11</td>
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
				<td class="col-xs-4">name</td>
				<td class="col-xs-4">Most Heroic Attack</td>
				<td class="col-xs-4">name</td>
			</tr>
			<tr>
				<td class="col-xs-4">name</td>
				<td class="col-xs-4">Most Heroic Defense</td>
				<td class="col-xs-4">name</td>
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
				<th>Enemy Clan Name</th>
				<th>Time Until War Ends</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="col-xs-4">Name</td>
				<td class="col-xs-4">Name</td>
				<td class="col-xs-4">11h until war ends</td>
			</tr>
			<tr>
				<td class="col-xs-4">Name</td>
				<td class="col-xs-4">Name</td>
				<td class="col-xs-4">11h until war ends</td>
			</tr>
			<tr>
				<td class="col-xs-4">Name</td>
				<td class="col-xs-4">Name</td>
				<td class="col-xs-4">11h until war ends</td>
			</tr>
			<tr>
				<td class="col-xs-4">Name</td>
				<td class="col-xs-4">Name</td>
				<td class="col-xs-4">11h until war ends</td>
			</tr>
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
			<tr>
				<td class="col-xs-1">1</td>
				<td class="col-xs-1">126</td>
				<td class="col-xs-3">Boo</td>
				<td class="col-xs-3">Enemy Name</td>
				<td class="col-xs-3">Enemy Name</td>
				<td class="col-xs-1">3</td>
			</tr>
			<tr>
				<td class="col-xs-1">2</td>
				<td class="col-xs-1">126</td>
				<td class="col-xs-3">Boo</td>
				<td class="col-xs-3">Enemy Name</td>
				<td class="col-xs-3">Enemy Name</td>
				<td class="col-xs-1">3</td>
			</tr>
			<tr>
				<td class="col-xs-1">3</td>
				<td class="col-xs-1">126</td>
				<td class="col-xs-3">Boo</td>
				<td class="col-xs-3">Enemy Name</td>
				<td class="col-xs-3">Enemy Name</td>
				<td class="col-xs-1">3</td>
			</tr>
			<tr>
				<td class="col-xs-1">4</td>
				<td class="col-xs-1">126</td>
				<td class="col-xs-3">Boo</td>
				<td class="col-xs-3">Enemy Name</td>
				<td class="col-xs-3">Enemy Name</td>
				<td class="col-xs-1">3</td>
			</tr>
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
			<tr>
				<td class="col-xs-1">1</td>
				<td class="col-xs-1">126</td>
				<td class="col-xs-3">Boo</td>
				<td class="col-xs-3">Ally Name</td>
				<td class="col-xs-3">Ally Name</td>
				<td class="col-xs-1">3</td>
			</tr>
			<tr>
				<td class="col-xs-1">2</td>
				<td class="col-xs-1">126</td>
				<td class="col-xs-3">Boo</td>
				<td class="col-xs-3">Ally Name</td>
				<td class="col-xs-3">Ally Name</td>
				<td class="col-xs-1">3</td>
			</tr>
			<tr>
				<td class="col-xs-1">3</td>
				<td class="col-xs-1">126</td>
				<td class="col-xs-3">Boo</td>
				<td class="col-xs-3">Ally Name</td>
				<td class="col-xs-3">Ally Name</td>
				<td class="col-xs-1">3</td>
			</tr>
			<tr>
				<td class="col-xs-1">4</td>
				<td class="col-xs-1">126</td>
				<td class="col-xs-3">Boo</td>
				<td class="col-xs-3">Ally Name</td>
				<td class="col-xs-3">Ally Name</td>
				<td class="col-xs-1">3</td>
			</tr>
		</tbody>
	</table>
</div>
</div>

<?php echo $_GET['id']; ?>