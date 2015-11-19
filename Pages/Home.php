<?php 

    // First we execute our common code to connection to the database and start the session 
    require($_SERVER['DOCUMENT_ROOT']."/clashofclans/database.php"); 

?> 

<div>
    <h1 class="page-header">Home</h1>
      <?php 
          if(!empty($_SESSION['user'])) {
            echo '<div>Hello '.htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8').', secret content!</div><br />';
          }
      ?>
</div>