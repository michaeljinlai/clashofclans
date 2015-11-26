<?php require($_SERVER['DOCUMENT_ROOT']."/clashofclans/Elements/header.php"); ?>

<!-- Datatables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/bs/dt-1.10.10/datatables.min.css"/> 

<?php
	// Gets an array of all json file names (including '.' and '..')
	$directory = '../database/war-history/json';

	// Remove the '.' and '..' from the array
	$scanned_directory = array_diff(scandir($directory), array('..', '.'));
?>

<div id="warMain">
	<div class="table-responsive">
	    <h1 class="page-header">War Log</h1>
	    <table id="myTable" class="table table-striped table-bordered table-hover dt-responsive members-table">
			<thead>
				<tr>
					<th>Time</th>
					<th>Percentage</th>
					<th>Stars</th>
					<th>My Clan</th>
					<th>Enemy Clan</th>
					<th>Stars</th>
					<th>Percentage</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($scanned_directory as $warFile) : ?>
				<?php 
					$str = file_get_contents('../database/war-history/json/'.$warFile);
					$json = json_decode($str, true);
				?>
					<tr>
						<td>Unknown</td>
						<td><?php echo $json['summary']['home']['totalDestruction']; ?></td>
						<td><?php echo ($json['summary']['home']['3Star']*3 + $json['summary']['home']['2Star']*2 + $json['summary']['home']['1Star']); ?></td>
						<td>Prepare to Die</td>
						<td><?php echo $json['enemy']['name']; ?></td>
						<td><?php echo ($json['summary']['enemy']['3Star']*3 + $json['summary']['enemy']['2Star']*2 + $json['summary']['enemy']['1Star']); ?></td>
						<td><?php echo $json['summary']['enemy']['totalDestruction']; ?></td>
						<td><a onclick="loadWar('<?php echo $json['id']; ?>')" class="btn btn-primary">Details</a></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
    $('#myTable').DataTable();
});
</script>


