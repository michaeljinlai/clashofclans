<?php require($_SERVER['DOCUMENT_ROOT']."/clashofclans/Elements/header.php"); ?>

<!-- Datatables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/bs/dt-1.10.10/datatables.min.css"/> 

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
			<tr>
				<td>2d ago</td>
				<td>50%</td>
				<td>star</td>
				<td>Prepare to Die</td>
				<td>Enemy Clan Name</td>
				<td>star</td>
				<td>50%</td>
				<td><a onclick="loadWar('23432')" class="btn btn-primary">Details</a></td>
			</tr>
		</tbody>
	</table>
</div>

</div>

<script type="text/javascript">
    $(document).ready(function(){
    $('#myTable').DataTable();
});
</script>


<!-- War Log Details Changes -->
<script>
function loadWar(id) {
		$("#warMain").load("Pages/WarDetails.php?id="+id, function() {
	    // Code here gets executed when the content is loaded
	});
}
</script>