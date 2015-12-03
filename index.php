<?php 
require($_SERVER['DOCUMENT_ROOT']."/clashofclans/database.php"); 
?> 

<?php require($_SERVER['DOCUMENT_ROOT']."/clashofclans/Elements/sidebar.php"); ?>

<div class="sidebar-toggle">
  <div class="">
    <i class="icon-menu hide glyphicon glyphicon-triangle-right sidebar-arrow"></i>
  </div>

  <div class="">
    <i class="icon-menu-open glyphicon glyphicon-triangle-right gly-rotate-180 sidebar-arrow"></i>
  </div>

</div>

<div class="main" id="main"></div>

<script>
$(document).ready(function(){

    $(window).resize(function(){
        $('body').css('width', '100%').css('width', '-='+$('.sidebar').width());
    });

    $("#main").load("Pages/Home.php", function() {});
    $("[data-toggle='tooltip']").tooltip('destroy');
});
</script>


