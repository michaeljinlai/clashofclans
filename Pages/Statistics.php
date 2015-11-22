<?php 

    // First we execute our common code to connection to the database and start the session 
    require($_SERVER['DOCUMENT_ROOT']."/clashofclans/database.php"); 
     
    // Everything below this point in the file is secured by the login system 
     
    // We can retrieve a list of members from the database using a SELECT query. 
    // In this case we do not have a WHERE clause because we want to select all 
    // of the rows from the database table. 
    $query = " 
        SELECT 
            name, 
            role, 
            expLevel,
            trophies,
            clanRank,
            previousClanRank,
            donations,
            donationsReceived,
            leagueBadgeImg_s,
            leagueBadgeImg_xl 
        FROM members 
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
    <h1 class="page-header">Statistics</h1>
    <table id="myTable" class="table table-striped table-bordered table-hover dt-responsive statistics-table"> <!-- Removed: width="100%", cellspacing="0" -->
        <thead>
            <tr> 
                <th>Name</th> 
                <th>Role</th> 
                <th>Exp Level</th> 
                <th>Trophies</th> 
                <th>Clan Rank</th> 
                <th>Previous Clan Rank</th> 
                <th>Donations</th> 
                <th>Donations Received</th> 
                <th>Badge</th> 
            </tr> 
        </thead>
        <tbody>
            <?php foreach($rows as $row): ?> 
                <tr> 
                    <td><?php echo $row['name']; ?></td> 
                    <td><?php echo $row['role']; ?></td> 
                    <td><div class='experience-level'><?php echo $row['expLevel']; ?></div></td> 
                    <td><?php echo $row['trophies']; echo '<img src="https://clashofclans.com/img/shared/trophy.png" width="50" height="50" />'?></td> 
                    <td><?php echo $row['clanRank']; ?></td> 
                    <td><?php echo $row['previousClanRank']; ?></td> 
                    <td><?php echo $row['donations']; ?></td> 
                    <td><?php echo $row['donationsReceived']; ?></td>
                    <td><?php echo '<img src="'.$row['leagueBadgeImg_xl'].'" />'; ?></td> 
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