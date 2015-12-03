<?php require($_SERVER['DOCUMENT_ROOT']."/clashofclans/Elements/header.php"); ?>
<html>

<div class="sidebar">
	<ul class="nav nav-sidebar">
		<li>
			<img class="ptd-logo" src="img/ptd.png" />
		</li>
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
		<?php 
		if(!empty($_SESSION['user'])) { echo '
			<li>
				<a onclick="loadDoc(\'Profile\')" data-toggle="tooltip"title="Profile" class="sidebar-item-link" data-placement="right">
					<span class="glyphicon glyphicon-cog glyph-sidebar"></span>
					<span class="sidebar-text">Profile</span>
				</a>
			</li>';}
		?>
		<?php 
		if(!empty($_SESSION['user']) && $_SESSION['user']['privilege'] === 'administrator') {echo '
			<li>
				<a onclick="loadDoc(\'Users\')" data-toggle="tooltip"title="Users" class="sidebar-item-link" data-placement="right">
					<span class="glyphicon glyphicon-list-alt glyph-sidebar"></span>
					<span class="sidebar-text">Users</span>
				</a>
			</li>';}
		?>
		<?php 
		if(!empty($_SESSION['user']) && $_SESSION['user']['privilege'] === 'administrator') { echo '
			<li>
				<a href="updateMembers.php" data-toggle="tooltip" title="Update DB" class="sidebar-item-link" data-placement="right">
					<span class="glyphicon glyphicon-refresh glyph-sidebar"></span>
					<span class="sidebar-text">Update DB</span>
				</a>
			</li>';}
		?>
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

<script>
$(function () {
	$('[data-toggle="tooltip"]').tooltip({container: 'body'});
});
</script>

<script id="testTwo" type="text/javascript" charset="utf8" src="https://cdn.datatables.net/s/bs/dt-1.10.10/datatables.min.js"></script>

<script>
function loadDoc(str) {
		$("#main").load("Pages/"+str+".php", function() {
	});
}
</script>

<script>
function loadDelete(str) {
		$("#main").load(str+".php", function() {
	});
}
</script>

<script>
function loadWar(id) {
		$("#warMain").load("Pages/WarDetails.php?id="+id, function() {
	});
}
</script>

<script>
$(function () {
	$('.nav li a').click(function (e) {
    $('.nav li a').removeClass('active');
    $(this).closest('a').addClass('active');
});
});
</script>

<script type="text/javascript">
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
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-70397779-1', 'auto');
  ga('send', 'pageview');

</script>

<script src="js/highcharts.js"></script>
<script src="js/modules/data.js"></script>
<script src="js/modules/exporting.js"></script>