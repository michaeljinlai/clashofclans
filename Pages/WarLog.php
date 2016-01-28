<?php require($_SERVER['DOCUMENT_ROOT']."/clashofclans/Elements/header.php"); ?>

<!-- Datatables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/bs/dt-1.10.10/datatables.min.css"/> 

<?php
	// Gets an array of all json file names (including '.' and '..')
	$directory = '../database/war-history/json';

	// Remove the '.' and '..' from the array
	$scanned_directory = array_diff(scandir($directory), array('..', '.'));
?>

<div class="enter-effect">
	<div class="table-responsive">
	    <h1 class="page-header">War Log</h1>
	    <ol class="breadcrumb">
		    <li><a href="" onClick="loadDoc('Home'); return false;">Home</a></li>
		    <li>War Log</li>
		</ol>
		<div id="war-log-container">
		    <table id="memberTable" class="table table-striped table-bordered table-hover table-condensed dt-responsive members-table">
				<thead>
					<tr>
						<th class="col-xs-1"></th>
						<th>#</th>
						<th>Size</th>
						<th>Destruction</th>
						<th>Stars</th>
						<th>My Clan</th>
						<th>Enemy Clan</th>
						<th>Stars</th>
						<th>Destruction</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($scanned_directory as $warFile) : ?>
					<?php 
						$str = file_get_contents('../database/war-history/json/'.$warFile);
						$json = json_decode($str, true);
					?>
						<tr class="
							<?php 
								if ($json['summary']['result'] == "Draw")
									echo 'war-log-background-neutral';
								elseif ($json['summary']['result'] == "Victory")
									echo 'war-log-background-win';
								else
									echo 'war-log-background-lose';
							?>
						">
							<td style="text-align:center;"><a onclick="loadWar('<?php echo $json['id']; ?>')" class="btn btn-primary">View</a></td>
							<td><?php echo $json['id']; ?></td>
							<td><?php echo $json['home']['size']; ?></td>
							<td><?php echo number_format((float)$json['summary']['home']['totalDestruction'], 2, '.', ''); ?>%</td>
							<td><?php echo ($json['summary']['home']['3Star']*3 + $json['summary']['home']['2Star']*2 + $json['summary']['home']['1Star']); ?></td>
							<td><?php echo $json['home']['name']; ?></td>
							<td><?php echo $json['enemy']['name']; ?></td>
							<td><?php echo ($json['summary']['enemy']['3Star']*3 + $json['summary']['enemy']['2Star']*2 + $json['summary']['enemy']['1Star']); ?></td>
							<td><?php echo number_format((float)$json['summary']['enemy']['totalDestruction'], 2, '.', ''); ?>%</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
	    $('#memberTable').DataTable({
	    	"order": [[1, 'dsc']],
	    	language: {
		        search: "_INPUT_",
		        searchPlaceholder: "Search"
		    },
		    aoColumnDefs: [
		    	{ bSortable: false, aTargets: [ 0 ] }
		    ]
	    });
	});
</script>
