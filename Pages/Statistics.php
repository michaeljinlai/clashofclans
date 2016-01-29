<?php 
    require($_SERVER['DOCUMENT_ROOT']."/clashofclans/database.php");
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
            $query = "SELECT * FROM members_statistics WHERE active = 1"; 
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
                    <th>Attacks</th>
                    <th>Stars Earned</th>
                    <th>Average Damage %</th>
                    <th>Rating</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($members as $member) : ?>
                    <tr>
                        <td class="col-xs-1"></td>
                        <td class="col-xs-3"><a class="pointer" onclick="loadPlayer('<?php echo urlencode($member['playerId']); ?>')"><?php echo $member['name']; ?></a></td>
                        <td class="col-xs-2"><?php echo $member['totalAttacks']; ?></td>
                        <td class="col-xs-2"><?php echo $member['starsEarned']; ?></td>
                        <td class="col-xs-2"><?php echo number_format($member['totalDamage'] / $member['totalAttacks'], 1); ?></td>
                        <td class="col-xs-2"><?php echo number_format($member['totalRating'] / $member['warsJoined'], 3); ?></td>
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
        iDisplayLength: 10,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search"
        },
        columnDefs: [ {
            searchable: false,
            orderable: false,
            targets: 0
        } ],
        order: [[ 5, 'dsc' ]]
    });

    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
});
</script>
