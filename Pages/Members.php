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
     
    try { 
        // These two statements run the query against your database table. 
        $stmt = $db->prepare($query); 
        $stmt->execute(); 
    } 
    catch (PDOException $ex) { 
        // Note: On a production website, you should not output $ex->getMessage(). 
        // It may provide an attacker with helpful information about your code.  
        die("Failed to run query: " . $ex->getMessage()); 
    } 
         
    // Finally, we can retrieve all of the found rows into an array using fetchAll 
    $rows = $stmt->fetchAll();

    function displayRole($role) {
        if ($role == "member")
            echo "Member";
        elseif ($role == "admin")
            echo "Elder";
        elseif ($role == "coLeader")
            echo "Co-leader";
        elseif ($role == "leader")
            echo "Leader";
        else
            echo "";
    }
?> 

<?php require($_SERVER['DOCUMENT_ROOT']."/clashofclans/Elements/header.php"); ?>

<!-- Datatables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/bs/dt-1.10.10/datatables.min.css"/> 

<div class="table-responsive">
    <h1 class="page-header">Members</h1>
    <ol class="breadcrumb">
        <li><a href="" onClick="loadDoc('Home'); return false;">Home</a></li>
        <li>Members</li>
    </ol>
    <table id="memberTable" class="table table-striped table-bordered table-hover dt-responsive members-table"> <!-- Removed: width="100%", cellspacing="0" -->
        <thead>
            <tr> 
                <th>#</th> 
                <th>Name</th> 
                <th>Troops Donated</th> 
                <th>Troops Received</th> 
                <th>Trophies</th> 
            </tr> 
        </thead>
        <tbody>
            <?php foreach($rows as $row): ?> 
                <tr> 
                    <td class="col-xs-1"><div class="clan-rank"><?php echo $row['clanRank']; ?></div></td> 
                    <td class="col-xs-8">
                        <?php echo '<img class="badge-img" src="'.$row['leagueBadgeImg_xl'].'" />'; ?>
                        <span class="experience-level"><?php echo $row['expLevel']; ?></span>
                        <span class="member-name"><?php echo $row['name']; ?></span>
                        <div class="member-role"><?php displayRole($row['role']); ?></div>
                    </td>
                    <td class="col-xs-1"><div class="troops-donated-received"><?php echo $row['donations']; ?></div></td> 
                    <td class="col-xs-1"><div class="troops-donated-received"><?php echo $row['donationsReceived']; ?></div></td>
                    <td class="col-xs-1"><div class="trophies"><?php echo $row['trophies']; echo '<img class="trophy-image" src="https://clashofclans.com/img/shared/trophy.png" width="35" height="35" />'; ?></div></td>
                </tr> 
            <?php endforeach; ?> 
        </tbody>
    </table> 
</div>

<script id="testThree" type="text/javascript">
    $(document).ready(function(){
        $('#memberTable').DataTable({
            paging: false,
            "dom": '<"pull-left"f><"pull-right"li>tp',
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search"
            }
        });
    });
</script>