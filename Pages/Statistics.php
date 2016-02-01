<?php 
    include("../include.php");
    require($_SERVER['DOCUMENT_ROOT'].ROOT_PATH."/database.php"); 

    // TODO: set as global function
    function safeDivide($a, $b, $decimals) {
        if ($b == 0)
            return 0;
        return number_format($a / $b, $decimals);
    }
?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/bs/dt-1.10.10/datatables.min.css"/> 

<div class="enter-effect">
    <h1 class="page-header">Statistics</h1>
    <ol class="breadcrumb">
        <li><a href="" onClick="loadDoc('Home'); return false;">Home</a></li>
        <li>Statistics</li>
    </ol>

    <?php // Begin information of each player
        try {
            $query = "SELECT * FROM members_statistics WHERE (active = 1 AND warsJoined > 3)"; 
            $stmt = $db->prepare($query); 
            $stmt->execute();
            $members = $stmt->fetchAll();
        } catch (PDOException $ex) { 
            die("Failed to run query: ".$ex->getMessage()); 
        } 
    ?>

    <div id="members-stats-container">
        <table id="members-stats" class="table table-striped table-bordered table-hover table-condensed dt-responsive members-table">
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Town Hall</th>
                    <th>Wars Recorded</th>
                    <th>Attacks</th>
                    <th>Defenses</th>
                    <th>Stars Earned</th>
                    <th>Offense Damage</th>
                    <th>Defense Damage</th>
                    <th>Rating</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($members as $member) : ?>
                    <tr>
                        <td class="col-xs-1"></td>
                        <td><a class="pointer" onclick="loadPlayer('<?php echo urlencode($member['playerId']); ?>')"><?php echo $member['name']; ?></a></td>
                        <td class="col-xs-1"><?php echo $member['townHall']; ?></td>
                        <td class="col-xs-1"><?php echo $member['warsJoined']; ?></td>
                        <td class="col-xs-1"><?php echo $member['totalAttacks']; ?></td>
                        <td class="col-xs-1"><?php echo $member['totalDefenses']; ?></td>
                        <td class="col-xs-1"><?php echo $member['starsEarned']; ?></td>
                        <td class="col-xs-1"><?php echo safeDivide($member['totalDamage'], $member['totalAttacks'], 1); ?>%</td>
                        <td class="col-xs-1"><?php echo safeDivide($member['totalDamageDefense'], $member['totalDefenses'], 1); ?>%</td>
                        <td class="col-xs-1"><?php echo safeDivide($member['totalRating2'], $member['warsJoined'], 3); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<script type="text/javascript">
$(document).ready(function(){
    var t = $('#members-stats').DataTable({
        stateSave: true,
        stateDuration: -1,
        pageLength: 25,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search"
        },
        columnDefs: [ {
            searchable: false,
            orderable: false,
            targets: 0
        } ],
        order: [[ 9, 'dsc' ]]
    });

    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
});
</script>
