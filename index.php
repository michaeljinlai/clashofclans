<?php 

// First we execute our common code to connection to the database and start the session 
require($_SERVER['DOCUMENT_ROOT']."/clashofclans/database.php"); 

?> 

<?php require($_SERVER['DOCUMENT_ROOT']."/clashofclans/Elements/sidebar.php"); ?>

<div class="sidebar-toggle">
  <!-- This Menu Button is active when side menu is not open -->
  <div class="">
    <i class="icon-menu glyphicon glyphicon-triangle-right sidebar-arrow"></i>
  </div>

  <!-- This Menu Button is active when side menu is open -->
  <div class="">
    <i class="icon-menu-open hide glyphicon glyphicon-triangle-right gly-rotate-180 sidebar-arrow"></i>
  </div>

</div>

<div class="main" id="main">
  <div>
      <h1 class="page-header">Home</h1>
      <div>Hello <?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?>, secret content!</div><br /> 
      <a href="memberlist.php">Memberlist</a><br /> 
      <a href="chat/" onclick="openWindow(this.href);this.blur();return false;">Chat</a>
  </div>
</div>

<!-- Calculates the width of sidebar everytime the window is resized and adjusts the body -->
<script>
$(document).ready(function(){
    $(window).resize(function(){
        $('body').css('width', '100%').css('width', '-='+$('.sidebar').width());
    });
});
</script>


