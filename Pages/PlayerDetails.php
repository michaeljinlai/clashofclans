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
        $query = "SELECT * FROM war_events WHERE (playerId = '$playerId' AND isAttack = 1) ORDER BY warId DESC, attackId DESC";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $attacks = $stmt->fetchAll();

        // Get player defenses
        $query = "SELECT * FROM war_events WHERE (playerId = '$playerId' AND isAttack = 0) ORDER BY warId DESC, attackId DESC";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $defenses = $stmt->fetchAll();
    } catch (PDOException $ex) {
        die("Failed to run query: ".$ex->getMessage());
    }

    // Globals
    $numWars = $player['warsJoined'];
    $numAttacks = $player['totalAttacks'];

    // Helper functions
    function getResult($attack) {
        $result = "";
        for ($i = 0; $i < $attack['starsWon'] - $attack['starsEarned']; $i++)
            $result .= '<img src="img/Star-Previously-Won.png" class="war-star-img" />';
        for ($i = 0; $i < $attack['starsEarned']; $i++)
            $result .= '<img src="img/Star.png" class="war-star-img" />';
        for ($i = 0; $i < 3 - $attack['starsWon']; $i++)
            $result .= '<img src="img/Star-Empty.png" class="war-star-img" />';
        return $result;
    }

    function displayEventsTable($events) {    
        echo "
            <div id=\"event-log-container\">
                <table class=\"event-log table table-striped table-bordered table-hover table-condensed dt-responsive members-table\">        
                    <thead>
                        <tr>
                            <th>War</th>
                            <th>Clan</th>
                            <th>Name</th>
                            <th>My TH</th>
                            <th>Enemy TH</th>
                            <th>My Rank</th>
                            <th>Enemy Rank</th>
                            <th>Stars</th>
                            <th>Damage</th>
                        </tr>
                    </thead>
                    <tbody>
        ";
        foreach ($events as $event) {
            echo "
                        <tr>
                            <td><a onclick=\"loadWar('".$event['warId']."')\" class=\"pointer\">".$event['warId']."</a></td>
                            <td>".$event['enemyClan']."</td>
                            <td>".$event['enemyName']."</td>
                            <td class=\"col-xs-1\">".$event['myTH']."</td>
                            <td class=\"col-xs-1\">".$event['enemyTH']."</td>
                            <td class=\"col-xs-1\">".$event['myRank']."</td>
                            <td class=\"col-xs-1\">".$event['enemyRank']."</td>
                            <td>".getResult($event)."</td>
                            <td>".$event['damage']."%</td>
                        </tr>
            ";
        }
        echo "
                    </tbody>
                </table>
            </div>
        ";
    }

    function displayRow($col1, $col2) {
        echo "
            <tr>
                <td class=\"col-xs-8\">".$col1."</td>
                <td class=\"col-xs-4\">".$col2."</td>
            </td>
        ";
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
        <table class="player-overview table table-striped table-bordered table-hover table-condensed dt-responsive members-table">
            <thead><tr><th colspan="2">Player Details</th></tr></thead>
            <tfoot><tr><td colspan="2"><span style="font-size:x-small">* Weights as of war <?php echo $attacks[0]['warId'] ?></td></tr></span></tfoot>
            <tbody>
                <?php
                    displayRow("Name", $player['name']);
                    displayRow("In-game ID", $playerId);
                    displayRow("Town Hall", $player['townHall']);
                    displayRow("Wars Recorded", $player['warsJoined']);
                    displayRow("Offense Weight*", $player['offenseWeight']);
                    displayRow("Defense Weight*", $player['defenseWeight']);
                    displayRow("Gold/Elixir Available*", $player['goldElixir']);
                    displayRow("Dark Elixir Available*", $player['darkElixir']);
                ?>
            </tbody> 
        </table>

        <table class="player-overview table table-striped table-bordered table-hover table-condensed dt-responsive members-table">
            <thead><tr><th colspan="2">Offense Stats</th></tr></thead>
            <tbody>
                <?php
                    displayRow("Total Attacks", $numAttacks);
                    displayRow("Attacks Missed", $numWars * 2 - $numAttacks);
                    displayRow("Total Stars", $player['starsWon']);
                    displayRow("Average Stars", number_format($player['starsWon'] / $numAttacks, 2));
                    // displayRow("Stars Earned", $player['starsEarned']);
                    displayRow("Stars Earned per War", number_format($player['starsEarned'] / $numWars, 2));
                    displayRow("Average Damage", number_format($player['totalDamage'] / $numAttacks, 2)."%");
                    displayRow("Rating", number_format($player['totalRating'] / $numWars, 3));
                ?>
            </tbody>
        </table>

        <table class="player-overview table table-striped table-bordered table-hover table-condensed dt-responsive members-table">
            <thead><tr><th colspan="2">Defense Stats</th></tr></thead>
            <tbody>
                <?php
                    $numDefenses = count($defenses);
                    $totalStarsGiven = 0;
                    $totalStarsLost = 0;
                    $totalDamage = 0;

                    foreach (array_reverse($defenses) as $defense) {
                        $totalStarsGiven += $defense['starsEarned'];
                        $totalStarsLost += $defense['starsWon'];
                        $totalDamage += $defense['damage'];
                    }

                    displayRow("Total Defenses", $numDefenses);
                    displayRow("Defenses per War", number_format($numDefenses / $numWars, 2));
                    // displayRow("Average Attacks to 3 Star", number_format($totalAttacksTo3 / $numWars, 2));
                    displayRow("Total Stars Given", $totalStarsGiven);
                    displayRow("Stars Given per War", number_format($totalStarsGiven / $numWars, 2));
                    displayRow("Stars per Defense", number_format($totalStarsLost / $numDefenses, 2));
                    displayRow("Average Damage", number_format($totalDamage / $numDefenses, 2)."%");
                ?>
            </tbody>
        </table>
    </div>

    <!-- <h3>Charts</h3> -->
    <div id="offense-charts-container" class="statistics-charts-container"></div>
    <div id="defense-charts-container" class="statistics-charts-container"></div>

    <h3>Attack Log</h3>
    <?php displayEventsTable($attacks); ?>

    <h3>Defense Log</h3>
    <?php displayEventsTable($defenses); ?>
</div>

<?php
    class ChartStats {
        private $stars; // [ 0, 1, 2, 3 ]
        private $townHall; // [ 4 .. 11 ]
        private $threeStarType; // [ "First Hit", "Clean Up", "Practice" ]

        private $color = array(
            'blue'      => "#7cb5ec",
            'red'       => "#f45b5b",
            'green'     => "#81d981",
            'black'     => "#434348",
            'orange'    => "#f7a35c",
            'gold'      => "#e4d354",
            'purple'    => "#8085e9"
        );
        private $keyColor;

        function __construct($invertColor = false) {
            $this->stars = array();
            $this->threeStarType = array();
            $this->townHall = array();
            $this->keyColor = array(
                '0 Stars'   => ($invertColor) ? $this->color['green'] : $this->color['red'],
                '1 Star'    => ($invertColor) ? $this->color['blue'] : $this->color['orange'],
                '2 Stars'   => ($invertColor) ? $this->color['orange'] : $this->color['blue'],
                '3 Stars'   => ($invertColor) ? $this->color['red'] : $this->color['green'],
                'First Hit' => $this->color['green'],
                'Clean Up'  => $this->color['blue'],
                'Practice'  => $this->color['orange'],
                'TH11'      => $this->color['gold'],
                'TH10'      => $this->color['red'],
                'TH9'       => $this->color['black'],
                'TH8'       => $this->color['orange'],
                'TH7'       => $this->color['purple']
            );
        }

        function addStars($won, $earned) {
            $key = ($won == 1) ? '1 Star' : $won.' Stars';
            $this->addToArray($this->stars, $key);
 
            if ($won == 3) {
                if ($earned == 3)
                    $key = 'First Hit';
                elseif ($earned > 0)
                    $key = 'Clean Up';
                else
                    $key = 'Practice';
                $this->addToArray($this->threeStarType, $key);
            }
        }

        function addTownHall($townHall) {
            $key = 'TH'.$townHall;
            $this->addToArray($this->townHall, $key);
        }

        private function addToArray(&$array, $key) {
            if (!array_key_exists($key, $array))
                $array[$key] = 0;
            $array[$key]++;
        }

        private function getJSArray($arr) {
            $jsArray = array();
            foreach ($arr as $key => $value) {
                $color = (array_key_exists($key, $this->keyColor)) ? $this->keyColor[$key] : null;
                array_push($jsArray, array('name' => $key, 'y' => $value, 'color' => $color));
            }
            $jsArray = json_encode($jsArray);
            $jsArray = preg_replace('/"([a-zA-Z]+[a-zA-Z0-9_]*)":/','$1:', $jsArray);
            echo $jsArray;
        }

        function getStars() {
            $this->getJSArray($this->stars);
        }

        function getThreeStarType() {
            $this->getJSArray($this->threeStarType);
        }

        function getTownHall() {
            $this->getJSArray($this->townHall);
        }
    }

    $attackStats = new ChartStats();
    foreach ($attacks as $attack) {
        $attackStats->addStars($attack['starsWon'], $attack['starsEarned']);
        $attackStats->addTownHall($attack['enemyTH']);
    }

    $defenseStats = new ChartStats(true);
    foreach ($defenses as $defense) {
        $defenseStats->addStars($defense['starsWon'], $defense['starsEarned']);
        $defenseStats->addTownHall($defense['enemyTH']);
    }
?>

<script type="text/javascript">
/**
 * Pie title plugin
 * Author: Torstein Hønsi
 * Original: http://jsfiddle.net/highcharts/tnSRA/
 * Last revision: 2015-08-31
 */
(function (Highcharts) {
    Highcharts.seriesTypes.pie.prototype.setTitle = function (titleOption) {
        var chart = this.chart,
            center = this.center || (this.yAxis && this.yAxis.center),
            labelBox,
            box,
            format;
        
        if (center && titleOption) {
            box = {
                x: chart.plotLeft + center[0] - 0.5 * center[2],
                y: chart.plotTop + center[1] - 0.5 * center[2],
                width: center[2],
                height: center[2]
            };
            
            format = titleOption.text || titleOption.format;
            format = Highcharts.format(format, this);

            if (this.title) {
                this.title.attr({
                    text: format
                });
                
            } else {
                this.title = this.chart.renderer.label(format)
                    .css(titleOption.style)
                    .add()
            }
            labelBBox = this.title.getBBox();
            titleOption.width = labelBBox.width;
            titleOption.height = labelBBox.height;
            this.title.align(titleOption, null, box);
        }
    };
    
    Highcharts.wrap(Highcharts.seriesTypes.pie.prototype, 'render', function (proceed) {
        proceed.call(this);
        this.setTitle(this.options.title);
    });
} (Highcharts));

// Charts
$(function(){
    $('#offense-charts-container').highcharts({
        title: {
            text: 'Offense'
        },
        credits: {
            enabled: false
        },
        exporting: {
            enabled: false
        },
        series: [{
            type: 'pie',
            name: 'Stars Won',
            title: {
                align: 'center',
                format: '{name}',
                verticalAlign: 'top',
                y: -30
            },
            center: ['15%', null],
            size: 125,
            animation: false,
            data: <?php $attackStats->getStars(); ?>,
        }, {
            type: 'pie',
            name: '3 Star Type',
            title: {
                align: 'center',
                format: '{name}',
                verticalAlign: 'top',
                y: -30
            },
            center: ['50%', null],
            size: 125,
            animation: false,
            data: <?php $attackStats->getThreeStarType(); ?>,
        }, {
            type: 'pie',
            name: 'Town Halls Attacked',
            title: {
                align: 'center',
                format: '{name}',
                verticalAlign: 'top',
                y: -30
            },
            center: ['85%', null],
            size: 125,
            animation: false,
            data: <?php $attackStats->getTownHall(); ?>,
        }],
        plotOptions: {
            pie: {
                dataLabels: {
                    distance: 5
                }
            }
        },
        tooltip: {
            formatter: function () {
                return '<b>' + this.point.name + '</b>: ' + this.point.y + ' (' + this.percentage.toFixed(0) + '%)';
            }
        }
    });
});

$(function(){
    $('#defense-charts-container').highcharts({
        title: {
            text: 'Defense'
        },
        credits: {
            enabled: false
        },
        exporting: {
            enabled: false
        },
        series: [{
            type: 'pie',
            name: 'Stars',
            title: {
                align: 'center',
                format: '{name}',
                verticalAlign: 'top',
                y: -30
            },
            center: ['33%', null],
            size: 125,
            animation: false,
            data: <?php $defenseStats->getStars(); ?>,
        }, {
            type: 'pie',
            name: 'Town Halls Attacked By',
            title: {
                align: 'center',
                format: '{name}',
                verticalAlign: 'top',
                y: -30
            },
            center: ['66%', null],
            size: 125,
            animation: false,
            data: <?php $defenseStats->getTownHall(); ?>,
        }],
        plotOptions: {
            pie: {
                dataLabels: {
                    distance: 5
                }
            }
        },
        tooltip: {
            formatter: function () {
                return '<b>' + this.point.name + '</b>: ' + this.point.y + ' (' + this.percentage.toFixed(0) + '%)';
            }
        }
    });
});

// Attack & defense log table
$(document).ready(function(){
    $('.event-log').DataTable({
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