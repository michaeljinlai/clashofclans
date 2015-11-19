<?php require($_SERVER['DOCUMENT_ROOT']."/clashofclans/Elements/header.php"); ?>
<html>
<div class="sidebar">
	<ul class="nav nav-sidebar">
		<li>
			<a onclick="loadDoc('Home')" data-toggle="tooltip" title="Home" class="sidebar-item-link active" data-placement="right">
				<span class="glyphicon glyphicon-home glyph-sidebar"></span>
				<span class="sidebar-text">Home</span>
			</a>
		</li>
		<li>
			<a onclick="loadDoc('Profile')" data-toggle="tooltip"title="Profile" class="sidebar-item-link" data-placement="right">
				<span class="glyphicon glyphicon-user glyph-sidebar"></span>
				<span class="sidebar-text">Profile</span>
			</a>
		</li>	
		<li>
			<a onclick="loadDoc('Members')" data-toggle="tooltip"title="Members" class="sidebar-item-link" data-placement="right">
				<span class="glyphicon glyphicon-list-alt glyph-sidebar"></span>
				<span class="sidebar-text">Members</span>
			</a>
		</li>
		<li>
			<!-- This one does not have onclick="loadDoc('Chat')" because I am using it to popup the chat window -->
			<a href="chat/" onclick="openWindow(this.href);this.blur();return false;" data-toggle="tooltip" title="Enter Chat" class="sidebar-item-link" data-placement="right">
				<span class="glyphicon glyphicon-globe glyph-sidebar"></span>
				<span class="sidebar-text">Enter Chat</span>
			</a>
		</li>
		<li>
			<a onclick="loadDoc('Following')" data-toggle="tooltip" title="Following" class="sidebar-item-link" data-placement="right">
				<span class="glyphicon glyphicon-heart glyph-sidebar"></span>
				<span class="sidebar-text">Following</span>
			</a>
		</li>
		<li>
			<a onclick="loadDoc('Games')" data-toggle="tooltip" title="Games" class="sidebar-item-link" data-placement="right">
				<span class="glyphicon glyphicon-plus glyph-sidebar"></span>
				<span class="sidebar-text">Games</span>
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
		<li>
			<a onclick="loadDoc('Statistics')" data-toggle="tooltip" title="Statistics" class="sidebar-item-link" data-placement="right">
				<span class="glyphicon glyphicon-align-left glyph-sidebar"></span>
				<span class="sidebar-text">Statistics</span>
			</a>
		</li>
<?php 
if(!empty($_SESSION['user'])) {echo '
		<li>
			<a href="logout.php" data-toggle="tooltip" title="Logout" class="sidebar-item-link" data-placement="right">
				<span class="glyphicon glyphicon-log-out glyph-sidebar"></span>
				<span class="sidebar-text">Logout</span>
			</a>
		</li>';}
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