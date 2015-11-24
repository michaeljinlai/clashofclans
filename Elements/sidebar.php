<?php require($_SERVER['DOCUMENT_ROOT']."/clashofclans/Elements/header.php"); ?>
<html>

<!-- Mobile device options -->
<!-- <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"> -->
<meta name="viewport" content="width=device-width; initial-scale=1.0;">

<div class="sidebar">
	<ul class="nav nav-sidebar">
		<li>
			<a onclick="loadDoc('Home')" data-toggle="tooltip" title="Home" class="sidebar-item-link active" data-placement="right">
				<span class="glyphicon glyphicon-home glyph-sidebar"></span>
				<span class="sidebar-text">Home</span>
			</a>
		</li>
		<!-- Only show Profile button if they are logged in -->
		<?php 
		if(!empty($_SESSION['user'])) {echo '
			<li>
				<a onclick="loadDoc(\'Profile\')" data-toggle="tooltip"title="Profile" class="sidebar-item-link" data-placement="right">
					<span class="glyphicon glyphicon-user glyph-sidebar"></span>
					<span class="sidebar-text">Profile</span>
				</a>
			</li>';}
		?>
		<li>
			<a onclick="loadDoc('Users')" data-toggle="tooltip"title="Users" class="sidebar-item-link" data-placement="right">
				<span class="glyphicon glyphicon-list-alt glyph-sidebar"></span>
				<span class="sidebar-text">Users</span>
			</a>
		</li>
		<!-- Only show Profile button if the user is an administrator -->
		<?php 
		if(!empty($_SESSION['user']) && $_SESSION['user']['privilege'] === 'administrator') {echo '
			<li>
				<a href="updateMembers.php" data-toggle="tooltip" title="Update Database" class="sidebar-item-link" data-placement="right">
					<span class="glyphicon glyphicon-refresh glyph-sidebar"></span>
					<span class="sidebar-text">Update Database</span>
				</a>
			</li>';}
		?>
		<li>
			<a onclick="loadDoc('Members')" data-toggle="tooltip" title="Members" class="sidebar-item-link" data-placement="right">
				<span class="glyphicon glyphicon-align-left glyph-sidebar"></span>
				<span class="sidebar-text">Members</span>
			</a>
		</li>
		<li>
			<a onclick="loadDoc('Statistics')" data-toggle="tooltip" title="Statistics" class="sidebar-item-link" data-placement="right">
				<span class="glyphicon glyphicon-plus glyph-sidebar"></span>
				<span class="sidebar-text">Statistics</span>
			</a>
		</li>
		<li>
			<a onclick="loadDoc('Channels')" data-toggle="tooltip" title="Channels" class="sidebar-item-link" data-placement="right">
				<span class="glyphicon glyphicon-facetime-video glyph-sidebar"></span>
				<span class="sidebar-text">Channels</span>
			</a>
		</li>
		<li>
			<a onclick="loadDoc('Videos')" data-toggle="tooltip" title="Videos" class="sidebar-item-link" data-placement="right">
				<span class="glyphicon glyphicon-play-circle glyph-sidebar"></span>
				<span class="sidebar-text">Videos</span>
			</a>
		</li>
		<!-- Only show log out button if they are logged in -->
		<?php 
		if(!empty($_SESSION['user'])) {echo '
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
		if(empty($_SESSION['user'])) {echo '
			<li>
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

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
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
		$( "#main" ).load( "Pages/"+str+".php", function() {
	    // This gets executed when the content is loaded
	    //$.get("//code.jquery.com/jquery-1.10.2.min.js");
	    //$.get("//cdn.datatables.net/1.10.10/js/jquery.dataTables.js");
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