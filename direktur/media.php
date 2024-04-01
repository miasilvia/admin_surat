<!--dari Media web lama -->
<?php
error_reporting(0);
session_start();

if (empty($_SESSION['username
  ']) and empty($_SESSION['passuser'])) {
    include "403.html";
} else {
    include "../config/koneksi.php";

?>
    <?php
    if ($_SESSION['level'] !== "direktur") {
        die("Anda Bukan Direktur");
    }
    ?>
    <!doctype html>
    <html>

    <head>
        <meta charset="UTF-8">
        <!--IE Compatibility modes-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--Mobile first-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Dashboard</title>
        <?php
        include "header.php";
        ?>

    <body class="  ">
        <div class="bg-dark dk" id="wrap">
            <div id="top">
                <!-- .navbar -->
                <nav class="navbar navbar-inverse navbar-static-top">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <header class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a href="index.html" class="navbar-brand"><img src="assets/img/polindra2.png" alt=""></a>

                        </header>

                        <div class="topnav">
                            <div class="btn-group">
                                <a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip" class="btn btn-default btn-sm" id="toggleFullScreen">
                                    <i class="glyphicon glyphicon-fullscreen"></i>
                                </a>
                            </div>

                            <div class="btn-group">
                                <a href="../logout.php" data-toggle="tooltip" data-original-title="Logout" data-placement="bottom" class="btn btn-metis-1 btn-sm">
                                    <i class="fa fa-power-off"></i>
                                </a>
                            </div>

                        </div>



                        <?php
                        include "menu.php";
                        ?>

                    </div>

                    <?php
                    include "konten.php";
                    ?>

                <?php } ?>

                <?php
                include "footer.php";
                ?>