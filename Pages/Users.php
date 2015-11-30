<?php 

    // First we execute our common code to connection to the database and start the session 
    require($_SERVER['DOCUMENT_ROOT']."/clashofclans/database.php"); 
     
    // Check if user is logged in
    if(empty($_SESSION['user']) || $_SESSION['user']['privilege'] !== 'administrator') 
    { 
        // If they are not, we redirect them to the login page. 
        header("Location: ../login.php"); 

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

<?php require($_SERVER['DOCUMENT_ROOT']."/clashofclans/Elements/header.php"); ?>

<!-- Datatables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/bs/dt-1.10.10/datatables.min.css"/> 

<div class="table-responsive">
    <h1 class="page-header">Users</h1>
    <table id="myTable" class="table table-striped table-bordered table-hover dt-responsive"> <!-- Removed: width="100%", cellspacing="0" -->
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
</div>

<script id="testThree" type="text/javascript">
    $(document).ready(function(){
    $('#myTable').DataTable();
});
</script>