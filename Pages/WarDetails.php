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
	    <table class="table table-striped table-bordered table-hover dt-responsive members-table">
			<thead>
				<tr>
					<th colspan="3">Attack Totals</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>13</td>
					<td>Attacks Used</td>
					<td>11</td>
				</tr>
				<tr>
					<td>13</td>
					<td>Attacks Won</td>
					<td>11</td>
				</tr>
				<tr>
					<td>13</td>
					<td>Attacks Lost</td>
					<td>11</td>
				</tr>
				<tr>
					<td>13</td>
					<td>Attacks Remaining</td>
					<td>11</td>
				</tr>
			</tbody>
		</table>
	    <table class="table table-striped table-bordered table-hover dt-responsive members-table">
			<thead>
				<tr>
					<th colspan="3">Best Attacks</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>13</td>
					<td>3 Stars</td>
					<td>11</td>
				</tr>
				<tr>
					<td>13</td>
					<td>2 Stars</td>
					<td>11</td>
				</tr>
				<tr>
					<td>13</td>
					<td>1 Star</td>
					<td>11</td>
				</tr>
			</tbody>
		</table>
	    <table class="table table-striped table-bordered table-hover dt-responsive members-table">
			<thead>
				<tr>
					<th colspan="3">Attack Stats</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>13</td>
					<td>New Stars Per Attack</td>
					<td>11</td>
				</tr>
				<tr>
					<td>13</td>
					<td>Average Destruction</td>
					<td>11</td>
				</tr>
				<tr>
					<td>13</td>
					<td>Average Attack Duration</td>
					<td>11</td>
				</tr>
			</tbody>
		</table>
	    <table class="table table-striped table-bordered table-hover dt-responsive members-table">
			<thead>
				<tr>
					<th colspan="3">Featured Battles</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>name</td>
					<td>Most Heroic Attack</td>
					<td>name</td>
				</tr>
				<tr>
					<td>name</td>
					<td>Most Heroic Defense</td>
					<td>name</td>
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