<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>QUẢN TRỊ</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/datepicker3.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">

        <!--Custom Font-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        <script src="../js/ckeditor/ckeditor.js"></script>
    </head>
    <body>
        <?php
        include_once("../connection.php");
        ?>
        <?php
        require_once '../classes/myClass.php';
        ?>
        <?php
        $tvClass = new Thanhvien();
        $tvClass->checkLoggedGoLoginRule("qt");
        ?>
        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <?php include('top.php') ?>
                <!-- /top nge -->
            </div><!-- /.container-fluid -->
        </nav>
        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
            <?php include('left.php') ?>
            <!-- /left nge -->
        </div><!--/.sidebar-->

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <?php
            if (isset($_GET['trang'])) {
                $trang = 'trang/' . $_GET['trang'];
                if (isset($_GET['link'])) {
                    $trang .= ('/' . $_GET['link'] . '.php');
                } else {
                    $trang .= '/index.php';
                }
            } else {
                $trang = 'content.php';
            }
            include($trang);
            ?>
            <!--/.main-->
        </div>	<!--/.main-->

        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/chart.min.js"></script>
        <script src="js/chart-data.js"></script>
        <script src="js/easypiechart.js"></script>
        <script src="js/easypiechart-data.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script src="js/custom.js"></script>
        <script>
            window.onload = function () {
                var chart1 = document.getElementById("line-chart").getContext("2d");
                window.myLine = new Chart(chart1).Line(lineChartData, {
                    responsive: true,
                    scaleLineColor: "rgba(0,0,0,.2)",
                    scaleGridLineColor: "rgba(0,0,0,.05)",
                    scaleFontColor: "#c5c7cc"
                });
            };

            $(function () {
                $('[data-toggle="popover"]').popover();
            });
            
            $('.popover-dismiss').popover({
                trigger: 'focus'
            })
        </script>

    </body>
</html>