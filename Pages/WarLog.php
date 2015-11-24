<?php require($_SERVER['DOCUMENT_ROOT']."/clashofclans/Elements/header.php"); ?>

<!-- Datatables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/bs/dt-1.10.10/datatables.min.css"/> 

<div class="table-responsive">
    <h1 class="page-header">War Log</h1>
    <table id="myTable" class="table table-striped table-bordered table-hover dt-responsive members-table">
		<thead>
			<tr>
				<th>Time</th>
				<th>My Clan</th>
				<th>Enemy Clan</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>2d ago</td>
				<td>Prepare to Die</td>
				<td>Enemy Clan Name</td>
				<td>Button</td>
			</tr>
		</tbody>
	</table>
</div>

<script type="text/javascript">
    $(document).ready(function(){
    $('#myTable').DataTable();
});
</script>


