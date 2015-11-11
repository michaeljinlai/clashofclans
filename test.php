<?php require('Elements/header.php'); ?>
<html>
<div class="sidebar">
<ul class="nav nav-sidebar">
    <li>
        <a href="#" data-toggle="tooltip" title="Some tooltip text!" class="sidebar-item-link" data-placement="right">
            <span class="glyphicon glyphicon-home glyph-sidebar"></span><span class="sidebar-text">Home</span>
            
        </a>
    </li>
	<li>
		<a class ="sidebar-item-link" href="#">
			<span class="glyphicon glyphicon-user glyph-sidebar"></span>
			<span class="sidebar-text">Profile</span>
		</a>
	</li>
	<li>
		<a class ="sidebar-item-link" href="#">
			<span class="glyphicon glyphicon-heart glyph-sidebar"></span>
			<span class="sidebar-text">Favourites</span>
		</a>
	</li>
	<li>
		<a class ="sidebar-item-link" href="#">
			<span class="glyphicon glyphicon-envelope glyph-sidebar"></span>
			<span class="sidebar-text">Messages</span>
		</a>
	</li>
	<li>
		<a class ="sidebar-item-link" href="#">
			<span class="glyphicon glyphicon-plus glyph-sidebar"></span>
			<span class="sidebar-text">Games</span>
		</a>
	</li>
	<li>
		<a class ="sidebar-item-link" href="#">
			<span class="glyphicon glyphicon-facetime-video glyph-sidebar"></span>
			<span class="sidebar-text">Channels</span>
		</a>
	</li>
	<li>
		<a class ="sidebar-item-link" href="#">
			<span class="glyphicon glyphicon-play-circle glyph-sidebar"></span>
			<span class="sidebar-text">Videos</span>
		</a>
	</li>
	<li>
		<a class ="sidebar-item-link" href="#">
			<span class="glyphicon glyphicon-align-left glyph-sidebar"></span>
			<span class="sidebar-text">Statistics</span>
		</a>
	</li>
</ul>
</div>
</html>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/app.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip({container: 'body'});
});
</script>
