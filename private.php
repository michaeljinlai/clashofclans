<?php 

    // First we execute our common code to connection to the database and start the session 
    require("database.php"); 
     
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

<?php require('Elements/sidebar.php'); ?>


<div class="sidebar-toggle">
    <!-- This Menu Button is active when side menu is not open -->
    <div class="icon-menu">
        <i class="glyphicon glyphicon-triangle-right"></i>
    </div>

    <!-- This Menu Button is active when side menu is open -->
    <div class="icon-menu-open rotateOneEighty hide">
        <i class="glyphicon glyphicon-triangle-right gly-rotate-180"></i>
    </div>

</div>


<div class="main">

<div>Hello <?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?>, secret content!</div><br /> 
<a href="memberlist.php">Memberlist</a><br /> 
<a href="edit_account.php">Edit Account</a><br /> 
<a href="logout.php">Logout</a>
</div>

<div class="container">
      <h2>Glyphicon Examples</h2>
      <p>Envelope icon: <span class="glyphicon glyphicon-envelope"></span></p>    
      <p>Envelope icon as a link:
        <a href="#">
          <span class="glyphicon glyphicon-envelope"></span>
        </a>
      </p>
      <p>Search icon: <span class="glyphicon glyphicon-search"></span></p>
      <p>Search icon on a button:
        <button type="button" class="btn btn-default">
          <span class="glyphicon glyphicon-search"></span> Search
        </button>
      </p>
      <p>Search icon on a styled button:
        <button type="button" class="btn btn-info">
          <span class="glyphicon glyphicon-search"></span> Search
        </button>
      </p>
      <p>Print icon: <span class="glyphicon glyphicon-print"></span></p>      
      <p>Print icon on a styled link button:
        <a href="#" class="btn btn-success btn-lg">
          <span class="glyphicon glyphicon-print"></span> Print 
        </a>
      </p> 
    </div>