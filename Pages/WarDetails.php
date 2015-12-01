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

		for ($i = 0; $i < $event['starsWon'] - $event['starsEarned']; $i++)
			echo '<img src="img/Star-Previously-Won.png" class="war-star-img" />';
		
		for ($i = 0; $i < $event['starsEarned']; $i++)
			echo '<img src="img/Star.png" class="war-star-img" />';
		
		for ($i = 0; $i < 3 - $event['starsWon']; $i++)
			echo '<img src="img/Star-Empty.png" class="war-star-img" />';

		echo '</span>';
		echo '</div>';
	}

	// Display player info and attack result in war events
	function displayPlayer($event, $isHome) {
		if ($isHome)
			$nameDisplay = $event['homePlayerPosition'].". ".$event['homePlayer'];
		else
			$nameDisplay = $event['enemyPlayerPosition'].". ".$event['enemyPlayer'];

		$successfulAttack = $event['starsWon'] > 0;

		if ($event['isHomeAttack'] == !$isHome) {
			echo '<img class="war-event-img" src="img/Shield'.($successfulAttack ? "-Broken" : "").'.png" />';			
			echo '<span class="war-name-display">'.$nameDisplay.'</span>';
			if ($successfulAttack)
				echo '<div class="war-event-defeat">Defeat</div>';		
			else
				echo '<div class="war-event-defended">Defended!</div>';			
		} else {
			echo '<img class="war-event-img" src="img/Sword'.($successfulAttack ? "" : "-Broken").'.png" />';											
			echo '<span class="war-name-display">'.$nameDisplay.'</span>';
			displayResult($event);
		}
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

<h1 class="page-header">War Details <small><?php echo '#'.$json['id'].' versus '.$json['enemy']['name']; ?></small></h1>
<ol class="breadcrumb">
    <li><a href="" onClick="loadDoc('WarLog'); return false;">War Log</a></li>
    <li>War <?php echo $json['id'] ?></li>
</ol>
<ul class="nav nav-pills">
<li class="active"><a data-toggle="pill" href="#warStats">War Stats</a></li>
<li><a data-toggle="pill" href="#warEvents">War Events</a></li>
<li><a data-toggle="pill" href="#myTeam">My Team</a></li>
<li><a data-toggle="pill" href="#enemyTeam">Enemy Team</a></li>
<li><a data-toggle="pill" href="#warWeights">Weights</a></li>
<li><a data-toggle="pill" href="#warAnalysis">Analysis</a></li>
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
					<th></th>
					<th>Time Remaining</th>
					<th><?php echo $json['home']['name']; ?></th>
					<th><?php echo $json['enemy']['name']; ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($json['events'] as $event) : ?>
					<tr class="
						<?php 
							if ($event['starsEarned'] === 0)
								echo 'war-event-background-neutral';
							elseif ($event['isHomeAttack'] === true && $event['starsEarned'] > 0)
								echo 'war-event-background-win';
							elseif ($event['isHomeAttack'] === false && $event['starsEarned'] > 0)
								echo 'war-event-background-lose';
						?>
					">
						<td class="col-xs-1"><?php echo '<span class="war-event-id">'.$event['id'].'</span>'; ?></td>
						<td class="col-xs-1"><?php echo '<span class="war-time-remain">'.$event['timeLeftDisplay'].'</span>'; ?></td>
						<td class="col-xs-5"><?php displayPlayer($event, true) ?></td>
						<td class="col-xs-5"><?php displayPlayer($event, false) ?></td>
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
				<?php foreach ($json['home']['roster'] as $player) : ?>
				<tr>
					<td class="col-xs-1"><?php echo $player['position']; ?></td>				
					<td class="col-xs-2"><?php echo $player['name']; ?></td>
					<td class="col-xs-1"><?php echo $player['townHall']; ?></td>
					<td class="col-xs-2"><?php displayAttack($player, 1); ?></td>
					<td class="col-xs-2"><?php displayAttack($player, 2); ?></td>
					<td class="col-xs-1"><?php displayTotalStars($player); ?></td>
					<td class="col-xs-2"><?php displayEnemyBestAttack($player); ?></td>
					<td class="col-xs-1"><?php echo $player['totalDefenses']; ?></td>
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
				<?php foreach ($json['enemy']['roster'] as $player) : ?>
				<tr>
					<td class="col-xs-1"><?php echo $player['position']; ?></td>
					<td class="col-xs-2"><?php echo $player['name']; ?></td>
					<td class="col-xs-1"><?php echo $player['townHall']; ?></td>
					<td class="col-xs-2"><?php displayAttack($player, 1); ?></td>
					<td class="col-xs-2"><?php displayAttack($player, 2); ?></td>
					<td class="col-xs-1"><?php displayTotalStars($player); ?></td>
					<td class="col-xs-2"><?php displayEnemyBestAttack($player); ?></td>
					<td class="col-xs-1"><?php echo $player['totalDefenses']; ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<!-- Weights Tab -->
	<div id="warWeights" class="tab-pane fade">
		<div class="col-xs-6">
			<table id="war-weights-home" class="war-weights table table-striped table-bordered table-hover dt-responsive members-table">
				<thead>
					<tr>
						<th colspan="5">
							<?php echo $json['home']['name']; ?>
							<span class="war-weights-subtitle">Total Offense: <?php echo $json['home']['totalOffenseWeight']; ?></span>
							<span class="war-weights-subtitle">Total Defense: <?php echo $json['home']['totalDefenseWeight']; ?></span>
						</th>
					</tr>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>TH</th>
						<!-- <th>Gold/Elixir</th> -->
						<!-- <th>Dark Elixir</th> -->
						<th>Offense</th>
						<th>Defense</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($json['home']['roster'] as $player) : ?>
					<tr>
						<td class="col-xs-1"><?php echo $player['position']; ?></td>
						<td class="col-xs-9"><?php echo $player['name']; ?></td>
						<td class="col-xs-1"><?php echo $player['townHall']; ?></td>
						<!-- <td class="col-xs-1"><?php echo $player['goldAndElixir']; ?></td> -->
						<!-- <td class="col-xs-1"><?php echo $player['darkElixir']; ?></td> -->
						<td class="col-xs-1"><?php echo $player['offenseWeight']; ?></td>
						<td class="col-xs-1"><?php echo $player['defenseWeight']; ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

		<div class="col-xs-6">
			<table id="war-weights-enemy" class="war-weights table table-striped table-bordered table-hover dt-responsive members-table">
				<thead>
					<tr>
						<th colspan="5">
							<?php echo $json['enemy']['name']; ?>
							<span class="war-weights-subtitle">Total Offense: <?php echo $json['enemy']['totalOffenseWeight']; ?></span>
							<span class="war-weights-subtitle">Total Defense: <?php echo $json['enemy']['totalDefenseWeight']; ?></span>
						</th>
					</tr>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>TH</th>
						<!-- <th>Gold/Elixir</th> -->
						<!-- <th>Dark Elixir</th> -->
						<th>Offense</th>
						<th>Defense</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($json['enemy']['roster'] as $player) : ?>
					<tr>
						<td class="col-xs-1"><?php echo $player['position']; ?></td>
						<td class="col-xs-9"><?php echo $player['name']; ?></td>
						<td class="col-xs-1"><?php echo $player['townHall']; ?></td>
						<!-- <td class="col-xs-1"><?php echo $player['goldAndElixir']; ?></td> -->
						<!-- <td class="col-xs-1"><?php echo $player['darkElixir']; ?></td> -->
						<td class="col-xs-1"><?php echo $player['offenseWeight']; ?></td>
						<td class="col-xs-1"><?php echo $player['defenseWeight']; ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
	<!-- Analysis Tab -->
	<div id="warAnalysis" class="tab-pane fade">
		<div id="container" style="width:100%; height:400px;"></div>
		<table id="war-analysis" class="war-events table table-striped table-hover dt-responsive members-table">
			<thead>
				<tr>
					<th></th>
					<th>Time Remaining</th>
				</tr>
			</thead>
			<tbody>
				<?php $runningTotal = 0; ?>
				<?php foreach ($json['events'] as $event) : ?>
					<tr>
						<td>
							<?php 
								$runningTotal = $runningTotal + $event['starsEarned'];
								echo $runningTotal; 
							?>
						</td>
						<td><?php echo $event['timeLeftSeconds']; ?></td>
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
	    	],
	    	bInfo: false
	    });

	    $('.war-team').DataTable({
			paging: false,
			"dom": '<"pull-left"f><"pull-right"li>tp',
	    	language: {
		        search: "_INPUT_",
		        searchPlaceholder: "Search"
		    },
	    	aoColumnDefs: [
	    		{ bSortable: false, aTargets: [ 3, 4, 6 ] }
	    	],
	    	bInfo: false
		});

	    var warWeightTable = $('.war-weights').DataTable({
	    	paging: false,
	    	bFilter: false,
	    	bInfo: false,
	    	aoColumnDefs: [
	    		{ bSortable: false, aTargets: [ 1 ] }
	    	]
	    });

	    $('a.toggle-vis').on( 'click', function (e) {
	        e.preventDefault();
	 
	        // Get the column API object
	        var column = warWeightTable.column( $(this).attr('data-column') );
	 
	        // Toggle the visibility
	        column.visible( ! column.visible() );
	    });
	});
</script>

<script>
$(function () {
    $('#container').highcharts({
        data: {
            table: 'war-analysis'
        },
        chart: {
            type: 'line'
        },
        title: {
            text: 'Data extracted from a HTML table in the page'
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
                    this.point.y + ' ' + this.point.name.toLowerCase();
            }
        }
    });
});
</script>