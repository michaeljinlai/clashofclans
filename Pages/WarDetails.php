<?php 

    require($_SERVER['DOCUMENT_ROOT']."/clashofclans/database.php"); 
     
?> 

<?php require($_SERVER['DOCUMENT_ROOT']."/clashofclans/Elements/header.php"); ?>

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
    <div id="warStats" class="tab-pane fade in active">
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
				</tr>
			</tbody>
		</table>
    </div>
    <div id="warEvents" class="tab-pane fade">

    </div>
    <div id="myTeam" class="tab-pane fade">

    </div>
    <div id="enemyTeam" class="tab-pane fade">

    </div>
  </div>
</div>

<?php echo $_GET['id']; ?>

<script type="text/javascript">
    $(document).ready(function(){
    $('#myTable').DataTable();
});
</script>