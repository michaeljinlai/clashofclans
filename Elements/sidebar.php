<?php require($_SERVER['DOCUMENT_ROOT']."/clashofclans/Elements/header.php"); ?>
<html>

<!-- Mobile device options -->
<!-- <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"> -->

<div class="sidebar">
	<ul class="nav nav-sidebar">
		<!-- Logo -->
		<li>
			<img class="ptd-logo" src="img/ptd.png" />
		</li>
		<!-- Logo -->
		<div class="sidebar-line">

		</div>
		<li>
			<a onclick="loadDoc('Home')" data-toggle="tooltip" title="Home" class="sidebar-item-link active" data-placement="right">
				<span class="fa fa-home fa-sidebar-home"></span>
				<span class="sidebar-text">Home</span>
			</a>
		</li>
		<li>
			<a onclick="loadDoc('Members')" data-toggle="tooltip" title="Members" class="sidebar-item-link" data-placement="right">
				<span class="fa fa-users fa-sidebar"></span>
				<span class="sidebar-text">Members</span>
			</a>
		</li>
		<li>
			<a onclick="loadDoc('WarLog')" data-toggle="tooltip" title="War Log" class="sidebar-item-link" data-placement="right">
				<span class="fa fa-shield fa-sidebar-home"></span>
				<span class="sidebar-text">War Log</span>
			</a>
		</li>
		<li>
			<a onclick="loadDoc('Statistics')" data-toggle="tooltip" title="Statistics" class="sidebar-item-link" data-placement="right">
				<span class="fa fa-bar-chart fa-sidebar"></span>
				<span class="sidebar-text">Statistics</span>
			</a>
		</li>
		<!-- Only show Profile button if they are logged in -->
		<?php 
		if(!empty($_SESSION['user'])) { echo '
			<li>
				<a onclick="loadDoc(\'Profile\')" data-toggle="tooltip"title="Profile" class="sidebar-item-link" data-placement="right">
					<span class="glyphicon glyphicon-cog glyph-sidebar"></span>
					<span class="sidebar-text">Profile</span>
				</a>
			</li>';}
		?>
		<!-- Only show User button if the user is an administrator -->
		<?php 
		if(!empty($_SESSION['user']) && $_SESSION['user']['privilege'] === 'administrator') {echo '
			<li>
				<a onclick="loadDoc(\'Users\')" data-toggle="tooltip"title="Users" class="sidebar-item-link" data-placement="right">
					<span class="glyphicon glyphicon-list-alt glyph-sidebar"></span>
					<span class="sidebar-text">Users</span>
				</a>
			</li>';}
		?>
		<!-- Only show Profile button if the user is an administrator -->
		<?php 
		if(!empty($_SESSION['user']) && $_SESSION['user']['privilege'] === 'administrator') { echo '
			<li>
				<a href="updateMembers.php" data-toggle="tooltip" title="Update DB" class="sidebar-item-link" data-placement="right">
					<span class="glyphicon glyphicon-refresh glyph-sidebar"></span>
					<span class="sidebar-text">Update DB</span>
				</a>
			</li>';}
		?>
		<!-- Only show Profile button if the user is an administrator -->
		<?php 
		if(!empty($_SESSION['user']) && $_SESSION['user']['privilege'] === 'administrator') { echo '
			<li>
				<a onclick="loadDoc(\'Upload\')" data-toggle="tooltip" title="Upload" class="sidebar-item-link" data-placement="right">
					<span class="glyphicon glyphicon-floppy-saved glyph-sidebar"></span>
					<span class="sidebar-text">Upload</span>
				</a>
			</li>';}
		?>
		<?php 
		if(!empty($_SESSION['user']) && $_SESSION['user']['privilege'] === 'administrator') { echo '
			<li>
				<a onClick="loadDelete(\'Delete\')" data-toggle="tooltip" title="Delete" class="sidebar-item-link" data-placement="right">
					<span class="glyphicon glyphicon-floppy-remove glyph-sidebar"></span>
					<span class="sidebar-text">Delete</span>
				</a>
			</li>';}
		?>
		<!-- Only show log out button if they are logged in -->
		<?php 
		if(!empty($_SESSION['user'])) { echo '
			<li>
				<a href="logout.php" data-toggle="tooltip" title="Logout" class="sidebar-item-link" data-placement="right">
					<span class="glyphicon glyphicon-log-out glyph-sidebar"></span>
					<span class="sidebar-text">Logout</span>
				</a>
			</li>';
		}
		?>
		<!-- Only show log in button if they are not logged in -->		
		<?php 
		if(empty($_SESSION['user'])) { echo '
			<li class="sidebar-log-in">
				<a href="login.php" data-toggle="tooltip" title="Login" class="sidebar-item-link" data-placement="right">
					<span class="glyphicon glyphicon-log-in glyph-sidebar"></span>
					<span class="sidebar-text">Login</span>
				</a>
			</li>';
		}
		?>			
	</ul>
</div>
</html>

<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/app.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- So the Tooltips show on top of the body container -->
<script>
$(function () {
	$('[data-toggle="tooltip"]').tooltip({container: 'body'});
});
</script>

<!-- DataTables -->
<script id="testTwo" type="text/javascript" charset="utf8" src="https://cdn.datatables.net/s/bs/dt-1.10.10/datatables.min.js"></script>

<!-- Sidebar Button Tab Changes -->
<script>
function loadDoc(str) {
		$("#main").load("Pages/"+str+".php", function() {
	    // This gets executed when the content is loaded
	    //$.get("//code.jquery.com/jquery-1.10.2.min.js");
	    //$.get("//cdn.datatables.net/1.10.10/js/jquery.dataTables.js");
	});
}
</script>

<!-- Sidebar Delete Button -->
<!-- For some reasons I can't get this to work when the two delete php files are in the Pages folder -->
<script>
function loadDelete(str) {
		$("#main").load(str+".php", function() {
	    // This gets executed when the content is loaded
	    //$.get("//code.jquery.com/jquery-1.10.2.min.js");
	    //$.get("//cdn.datatables.net/1.10.10/js/jquery.dataTables.js");
	});
}
</script>

<!-- War Log Details Changes -->
<script>
function loadWar(id) {
		$("#main").load("Pages/WarDetails.php?id="+id, function() {
	    // Code here gets executed when the content is loaded
	});
}
</script>

<!-- Player Details -->
<script>
function loadPlayer(name) {
		$("#statisticsMain").load("Pages/PlayerDetails.php?name="+name, function() {
	    // Code here gets executed when the content is loaded
	});
}
</script>

<!-- Active Class when sidebar is clicked -->
<script>
$(function () {
	$('.nav li a').click(function (e) {
    //e.preventDefault(); // For some reason this line prevents the logout button the the sidebar from working
    $('.nav li a').removeClass('active');
    $(this).closest('a').addClass('active');
});
});
</script>

<!-- Makes Chat Popout -->
<script type="text/javascript">
  // <![CDATA[
    function openWindow(url,width,height,options,name) {
      width = width ? width : 800;
      height = height ? height : 600;
      options = options ? options : 'resizable=yes';
      name = name ? name : 'openWindow';
      window.open(
        url,
        name,
        'screenX='+(screen.width-width)/2+',screenY='+(screen.height-height)/2+',width='+width+',height='+height+','+options
      )
    }
  // ]]>
</script>

<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-70397779-1', 'auto');
  ga('send', 'pageview');

</script>

<!-- Highcharts -->
<script src="js/highcharts.js"></script>
<script src="js/modules/data.js"></script>
<script src="js/modules/exporting.js"></script>