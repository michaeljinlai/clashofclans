<?php 
	// First we execute our common code to connection to the database and start the session 
	require($_SERVER['DOCUMENT_ROOT']."/clashofclans/database.php"); 
	require($_SERVER['DOCUMENT_ROOT']."/clashofclans/Elements/sidebar.php"); 
?>

<div class="sidebar-toggle">
	<!-- This Menu Button is active when side menu is not open -->
	<div class="">
		<i class="icon-menu hide glyphicon glyphicon-triangle-right sidebar-arrow"></i>
	</div>
	
	<!-- This Menu Button is active when side menu is open -->
	<div class="">
		<i class="icon-menu-open glyphicon glyphicon-triangle-right gly-rotate-180 sidebar-arrow"></i>
	</div>
</div>

<div class="main" id="main">

</div>

<!-- Calculates the width of sidebar everytime the window is resized and adjusts the body -->
<script>
$(document).ready(function(){

    $(window).resize(function(){
        $('body').css('width', '100%').css('width', '-='+$('.sidebar').width());
    });

    // Both of these will be loaded once the page initally loads
    $("#main").load("Pages/Home.php", function() {});
    $("[data-toggle='tooltip']").tooltip('destroy');

});
</script>


