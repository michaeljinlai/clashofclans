<?php 

    // First we execute our common code to connection to the database and start the session 
require($_SERVER['DOCUMENT_ROOT']."/clashofclans/database.php"); 

    // At the top of the page we check to see whether the user is logged in or not 
if(empty($_SESSION['user']) || $_SESSION['user']['privilege'] !== 'administrator') 
{ 
        // If they are not, we redirect them to the login page. 
  header("Location: login.php"); 

        // Remember that this die statement is absolutely critical.  Without it, 
        // people can view your members-only content without logging in. 
  die("Redirecting to login.php"); 
} 

    // Everything below this point in the file is secured by the login system 

    // We can display the user's username to them by reading it from the session array.  Remember that because 
    // a username is user submitted content we must use htmlentities on it before displaying it to the user. 
?> 

<?php require($_SERVER['DOCUMENT_ROOT']."/clashofclans/Elements/sidebar.php"); ?>

<!-- Mobile device options -->
<!-- <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"> -->
<meta name="viewport" content="width=device-width; initial-scale=1.0;">

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
      <?php 
        if(!empty($_SESSION['user'])) {
          echo '<div>Hello '.htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8').', secret content!</div><br />';
        }
      ?>
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


