<?php 

    // First we execute our common code to connection to the database and start the session 
    require($_SERVER['DOCUMENT_ROOT'].'clashofclans/database.php'); 
     
    // At the top of the page we check to see whether the user is logged in or not 
    if(empty($_SESSION['user']) || $_SESSION['user']['privilege'] !== 'administrator') 
    { 
        // If they are not, we redirect them to the login page. 
        header('Location:'.$_SERVER['DOCUMENT_ROOT'].'clashofclans/login.php'); 
         
        // Remember that this die statement is absolutely critical.  Without it, 
        // people can view your members-only content without logging in. 
        die("Redirecting to login.php"); 
    } 
    
    // Everything below this point in the file is secured by the login system 
     
    // We can display the user's username to them by reading it from the session array.  Remember that because 
    // a username is user submitted content we must use htmlentities on it before displaying it to the user. 
?> 

<?php require($_SERVER['DOCUMENT_ROOT'].'clashofclans/Elements/sidebar.php'); ?>


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

<!-- Empty Content Until Something Is Clicked -->
<div>Hello <?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?>, secret content!</div><br /> 
<a href="memberlist.php">Memberlist</a><br /> 
<a href="edit_account.php">Edit Account</a><br />

</div>

<script>
function loadDoc(str) {
  var xhttp;
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("main").innerHTML = xhttp.responseText;
    }
  }
  if (str === 'Home'){
    xhttp.open("GET", "Pages/Home.php", true);
  }
  xhttp.send();
}
</script>