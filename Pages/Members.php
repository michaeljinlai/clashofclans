<?php 

    // First we execute our common code to connection to the database and start the session 
    require($_SERVER['DOCUMENT_ROOT']."/clashofclans/database.php"); 
     
    // At the top of the page we check to see whether the user is logged in or not 
    if(empty($_SESSION['user'])) 
    { 
        // If they are not, we redirect them to the login page. 
        header("Location: login.php"); 
         
        // Remember that this die statement is absolutely critical.  Without it, 
        // people can view your members-only content without logging in. 
        die("Redirecting to login.php"); 
    } 
     
    // Everything below this point in the file is secured by the login system 
     
    // We can retrieve a list of members from the database using a SELECT query. 
    // In this case we do not have a WHERE clause because we want to select all 
    // of the rows from the database table. 
    $query = " 
        SELECT 
            id, 
            username, 
            email 
        FROM users 
    "; 
     
    try 
    { 
        // These two statements run the query against your database table. 
        $stmt = $db->prepare($query); 
        $stmt->execute(); 
    } 
    catch(PDOException $ex) 
    { 
        // Note: On a production website, you should not output $ex->getMessage(). 
        // It may provide an attacker with helpful information about your code.  
        die("Failed to run query: " . $ex->getMessage()); 
    } 
         
    // Finally, we can retrieve all of the found rows into an array using fetchAll 
    $rows = $stmt->fetchAll(); 
?> 

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/bs/dt-1.10.10,af-2.1.0,r-2.0.0/datatables.min.css"/>
 

<h1>Memberlist</h1> 
<table id="myTable"> 
    <thead>
        <tr> 
            <th>ID</th> 
            <th>Username</th> 
            <th>E-Mail Address</th> 
        </tr> 
    </thead>
    <tbody>
        <?php foreach($rows as $row): ?> 
            <tr> 
                <td><?php echo $row['id']; ?></td> <!-- htmlentities is not needed here because $row['id'] is always an integer --> 
                <td><?php echo htmlentities($row['username'], ENT_QUOTES, 'UTF-8'); ?></td> 
                <td><?php echo htmlentities($row['email'], ENT_QUOTES, 'UTF-8'); ?></td> 
            </tr> 
        <?php endforeach; ?> 
    </tbody>
</table> 

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">

<script id="testThree" type="text/javascript">
    $(document).ready(function(){
    $('#myTable').DataTable();
});
</script>

<!-- jQuery -->
<!-- <script id="testOne" type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script> -->
  
<!-- DataTables -->
<!-- <script id="testTwo" type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script> -->