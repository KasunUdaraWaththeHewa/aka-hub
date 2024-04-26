<?php
$HTMLHead = new HTMLHead($data['title']);
// $header = new header();
$sidebar = new Sidebar("adminpanel");
$chartFive = new AdminPanelChartFive();
$calendar = new Calendar();
?>

<div id="sidebar-active" class="hideScrollbar">

    <?php $welcomeSearch = new WelcomeSearch(); ?>

    <div class="main-grid flex">
        <div class="left">
            <div class="threeCardDiv">
                <div class="cardTotalUsers">
                    <?php if ($data["count_total_users"] !== null) : ?>
                        <div class="divUsersContainor">
                            <?= $data["count_total_users"] ?> Total Users
                        </div>
                    <?php endif; ?>
                </div>
                <div class="cardActiveUsers">
                    <?php if ($data["count_role_users"] !== null) : ?>
                        <div class="divUsersContainor">
                            <?= $data["count_role_users"] ?> Roled Users
                        </div>
                    <?php endif; ?>
                </div>
                <div class="cardNewUsers">
                    <?php if ($data["count_new_users"] !== null) : ?>
                        <div class="divUsersContainor">
                            <?= $data["count_new_users"] ?> New Users
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="fourGraphsContainor">
                <div class="graphLineContainor">
                    <div class="graphContainor">
                        <div id="chartContainer1" style="height: 220px; width: 100%;"></div>
                    </div>
                    <div class="graphContainor">
                        <div id="chartContainer2" style="height: 220px; width: 100%;"></div>
                    </div>
                </div>
                <div class="graphLineContainor">
                    <div class="graphContainor">
                        <div id="chartContainer4" style="height: 220px; width: 100%;"></div>
                    </div>
                    <div class="graphContainor">
                        <div id="chartContainer3" style="height: 220px; width: 100%;"></div>
                    </div>
                </div>
                <div class="graphLineContainor">
                    <div class="graphContainorFive">
                        <div id="chartContainer5" style="height: 220px; width: 100%; padding:20px"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="calendarContainor">
                <?php echo $calendar->render(); ?>
            </div>
        </div>
    </div>

    <style>
        .main-grid .left {
            width: 75%;
            height: 150vh;
            padding-bottom: 50px;
        }

        .main-grid .right {
            flex-grow: 1;
            height: 150vh;
        }

        .threeCardDiv {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            height: 175px;
            width: 100%;
            z-index: +5;
            color: white;
            padding: 25px;
        }

        .cardTotalUsers {
            width: 27%;
            height: 100%;
            background-color: #2684FF;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            padding: 1rem;
            justify-content: center;
            align-items: center;
            text-align: center;
            display: flex;
            margin-left: 50px;
        }

        .cardTotalUsers:hover {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        }

        .cardActiveUsers {
            width: 27%;
            height: 100%;
            background-color: #ff9b2d;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            padding: 1rem;
            justify-content: center;
            align-items: center;
            display: flex;
        }

        .cardActiveUsers:hover {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        }

        .cardNewUsers {
            width: 27%;
            height: 100%;
            background-color: #2684FF;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            padding: 1rem;
            justify-content: center;
            align-items: center;
            margin-right: 50px;
            display: flex;
        }

        .cardNewUsers:hover {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        }

        .divUsersContainor {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .graphLineContainor {
            height: 100%;
            width: 100%;
            display: flex;
            margin-top: 50px;
            justify-content: center;
            align-items: center;
        }

        .graphContainor {
            width: 55%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .graphContainorFive {
            width: 50%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>

</div>



<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var dataPoints = <?php echo json_encode($data["chartOne"], JSON_NUMERIC_CHECK); ?>;
        var chart1 = new CanvasJS.Chart("chartContainer1", {
            animationEnabled: true,
            exportEnabled: true,
            axisY: {
                title: "Yearly Users",
            },
            data: [{
                type: "spline",
                markerSize: 5,
                xValueFormatString: "DD",
                xValueType: "dateTime",
                dataPoints: dataPoints
            }]
        });

        chart1.render();
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var dataPoints = <?php echo json_encode($data["chartTwo"], JSON_NUMERIC_CHECK); ?>;
        var chart2 = new CanvasJS.Chart("chartContainer2", {
            animationEnabled: true,
            exportEnabled: true,
            data: [{
                type: "pie",
                // showInLegend: "true",
                legendText: "{label}",
                indexLabelFontSize: 10,
                indexLabel: "{label} - #percent%",
                yValueFormatString: "฿#,##0",
                dataPoints: dataPoints
            }]
        });

        chart2.render();
    });
</script>

<script>
    // Initialize chart when the document is ready
    document.addEventListener("DOMContentLoaded", function() {
        var dataPoints = <?php echo json_encode($data["chartThree"], JSON_NUMERIC_CHECK); ?>;
        var chart3 = new CanvasJS.Chart("chartContainer3", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "light2",
            axisY: {
                title: "Number of Students"
            },
            data: [{
                type: "column",
                dataPoints: dataPoints
            }]
        });

        chart3.render();
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var dataPoints = <?php echo json_encode($data["chartFour"], JSON_NUMERIC_CHECK); ?>;
        var chart4 = new CanvasJS.Chart("chartContainer4", {
            animationEnabled: true,
            exportEnabled: true,
            data: [{
                type: "pie",
                // showInLegend: "true",
                legendText: "{label}",
                indexLabelFontSize: 10,
                indexLabel: "{label} - #percent%",
                yValueFormatString: "฿#,##0",
                dataPoints: dataPoints
            }]
        });

        chart4.render();
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var dataPoints = <?php echo json_encode($data["chartFive"], JSON_NUMERIC_CHECK); ?>;
        var chart5 = new CanvasJS.Chart("chartContainer5", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "light2",
            subtitles: [{
                backgroundColor: "#2eacd1",
                fontSize: 16,
                fontColor: "white",
                padding: 5
            }],
            legend: {
                fontFamily: "calibri",
                fontSize: 14,
            },
            data: [{
                type: "doughnut",
                startAngle: 90,
                dataPoints: dataPoints
            }]
        });

        chart5.render();
    });
</script>