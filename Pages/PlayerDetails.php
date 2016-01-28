<?php
    require($_SERVER['DOCUMENT_ROOT']."/clashofclans/database.php"); 

    $playerId = $_GET['name'];

    try {
        // Get player name
        $query = "SELECT * FROM members_statistics WHERE playerId = '$playerId'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $player = $stmt->fetchAll()[0];

        // Get player attacks
        $query = "SELECT * FROM members_attacks WHERE playerId = '$playerId'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $attacks = $stmt->fetchAll();
    } catch (PDOException $ex) {
        die("Failed to run query: ".$ex->getMessage());
    }

    function displayResult($attack) {
        for ($i = 0; $i < $attack['starsWon'] - $attack['starsEarned']; $i++)
            echo '<img src="img/Star-Previously-Won.png" class="war-star-img" />';
        
        for ($i = 0; $i < $attack['starsEarned']; $i++)
            echo '<img src="img/Star.png" class="war-star-img" />';
        
        for ($i = 0; $i < 3 - $attack['starsWon']; $i++)
            echo '<img src="img/Star-Empty.png" class="war-star-img" />';
    }
?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/bs/dt-1.10.10/datatables.min.css"/> 

<div class="enter-effect">
    <h1 class="page-header">Player Statistics</h1>
    <ol class="breadcrumb">
        <li><a href="" onClick="loadDoc('Home'); return false;">Home</a></li>
        <li><a href="" onClick="loadDoc('Statistics'); return false;">Statistics</a></li>
        <li><?php echo $player['name']; ?></li>
    </ol>
    <h3>Overview</h3>

    <div id="player-overview-container">
        <table id="player-overview1" class="table table-bordered table-hover table-condensed dt-responsive members-table">
            <tbody>
                <tr>
                    <td class="col-xs-7">Name</td>
                    <td class="col-xs-5"><?php echo $player['name']; ?></td>
                </tr>
                <tr>
                    <td>In-game ID</td>
                    <td><?php echo $playerId; ?></td>
                </tr>
                <tr>
                    <td>Town Hall</td>
                    <td><?php echo $player['townHall']; ?></td>
                </tr>
                <tr>
                    <td>Offense Weight</td>
                    <td><?php echo $player['offenseWeight']; ?></td>
                </tr>
                <tr>
                    <td>Defense Weight</td>
                    <td><?php echo $player['defenseWeight']; ?></td>
                </tr>
                <tr>
                    <td>Gold/Elixir Available</td>
                    <td><?php echo $player['goldElixir']; ?></td>
                </tr>
                <tr>
                    <td>Dark Elixir Available</td>
                    <td><?php echo $player['darkElixir']; ?></td>
                </tr>
            </tbody>
        </table>

        <table id="player-overview2" class="table table-bordered table-hover table-condensed dt-responsive members-table">
            <tbody>
                <tr>
                    <td class="col-xs-7">Wars Recorded</td>
                    <td class="col-xs-5"><?php echo $player['warsJoined']; ?></td>
                </tr>
                <tr>
                    <td>Total Attacks</td>
                    <td><?php echo $player['totalAttacks']; ?></td>
                </tr>
                <tr>
                    <td>Attacks Missed</td>
                    <td><?php echo $player['warsJoined'] * 2 - $player['totalAttacks']; ?></td>
                </tr>
                <tr>
                    <td>Total Defenses</td>
                    <td><?php echo $player['totalAttacks']; ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <h3>Attack Log</h3>
    <div id="attack-log-container">
        <table id="attack-log" class="table table-striped table-bordered table-hover table-condensed dt-responsive members-table">
            <thead>
                <tr>
                    <th>War</th>
                    <th>Name</th>
                    <th>Clan</th>
                    <th>My TH</th>
                    <th>Enemy TH</th>
                    <th>My Rank</th>
                    <th>Enemy Rank</th>
                    <th>Stars</th>
                    <th>Damage</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($attacks as $attack) : ?>
                    <tr>
                        <td><a onclick="loadWar('<?php echo $attack['warId']; ?>')" class="pointer"><?php echo $attack['warId']; ?></a></td>
                        
                        <td><?php echo $attack['target']; ?></td>
                        <td><?php echo $attack['enemyClan']; ?></td>
                        <td class="col-xs-1"><?php echo $attack['townHall']; ?></td>
                        <td class="col-xs-1"><?php echo $attack['enemyTownHall']; ?></td>
                        <td class="col-xs-1"><?php echo $attack['rank']; ?></td>
                        <td class="col-xs-1"><?php echo $attack['enemyRank']; ?></td>
                        <td><?php displayResult($attack); ?></td>
                        <td><?php echo $attack['damage']; ?>%</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<script type="text/javascript">
$(document).ready(function(){
    var t = $('#attack-log').DataTable({
        order: [[ 0, 'dsc' ]],
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search"
        },
        aoColumnDefs: [
            { bSortable: false, aTargets: [ 1, 2, 3, 4, 5, 6, 7, 8 ] }
        ]
    });
});
</script>