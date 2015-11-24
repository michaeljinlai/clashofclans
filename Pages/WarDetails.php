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
      <h3>HOME</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div id="warEvents" class="tab-pane fade">
      <h3>Menu 1</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="myTeam" class="tab-pane fade">
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="enemyTeam" class="tab-pane fade">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
  </div>
</div>

<?php echo $_GET['id']; ?>