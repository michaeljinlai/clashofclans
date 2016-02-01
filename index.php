<?php 
    include("include.php");
	require($_SERVER['DOCUMENT_ROOT'].ROOT_PATH."/database.php"); 
	require($_SERVER['DOCUMENT_ROOT'].ROOT_PATH."/Elements/sidebar.php"); 
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
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}
$(document).ready(function(){

    $(window).resize(function(){
        $('body').css('width', '100%').css('width', '-='+$('.sidebar').width());
    });

    // Both of these will be loaded once the page initally loads
    $("#main").load("Pages/Home.php", function() {});
    $("[data-toggle='tooltip']").tooltip('destroy');

    if (getCookie("sidebar")=="close") {
    	$('.icon-menu-open').click();
    }    

});
</script>


