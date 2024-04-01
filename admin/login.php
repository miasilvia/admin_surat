<?php
error_reporting(0);
session_start();
include "config/koneksi.php";
if (empty($_SESSION['namauser']) and empty($_SESSION['passuser'])) {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <!--IE Compatibility modes-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--Mobile first-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Login Page</title>

        <meta name="description" content="Free Admin Template Based On Twitter Bootstrap 3.x">
        <meta name="author" content="">

        <meta name="msapplication-TileColor" content="#5bc0de" />
        <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />

        <!-- Bootstrap -->
        <link rel="stylesheet" href="assets/lib/bootstrap/css/bootstrap.css">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="assets/lib/font-awesome/css/font-awesome.css">

        <!-- Metis core stylesheet -->
        <link rel="stylesheet" href="assets/css/main.css">

        <!-- metisMenu stylesheet -->
        <link rel="stylesheet" href="assets/lib/metismenu/metisMenu.css">

        <!-- onoffcanvas stylesheet -->
        <link rel="stylesheet" href="assets/lib/onoffcanvas/onoffcanvas.css">

        <!-- animate.css stylesheet -->
        <link rel="stylesheet" href="assets/lib/animate.css/animate.css">


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    </head>

    <body class="login">

        <div class="form-signin">
            <div class="text-center">
                <img src="assets/img/logo.png" alt="Metis Logo">
            </div>
            <hr>
            <div class="tab-content">
                <div id="login" class="tab-pane active">
                    <form action="cek_login.php" method="post" id="form-2">
                        <p class="text-muted text-center">
                            Enter your username and password
                        </p>
                        <input type="text" name="email" placeholder="email" class="form-control top">
                        <input type="password" name="password" placeholder="Password" class="form-control bottom">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block" type="submit" value="Login">Sign in</button>
                    </form>
                </div>
                <div id="forgot" class="tab-pane">
                    <form action="?hal=lupa_pasword">
                        <p class="text-muted text-center">Enter your valid e-mail</p>
                        <input type="email" placeholder="mail@domain.com" class="form-control">
                        <br>
                        <button class="btn btn-lg btn-danger btn-block" type="submit">Recover Password</button>
                    </form>
                </div>
                <div id="signup" class="tab-pane">
                    <form action="simpanuser.php" method="post">
                        <input type="text" name="nama" placeholder="nama" class="form-control top">
                        <input type="email" name="email" placeholder="mail@domain.com" class="form-control middle">
                        <input type="password" name="password" placeholder="password" class="form-control middle">


                        <input type="text" name="telpon" placeholder="telpon" class="form-control top">
                        <select name='jabatan' onchange='aturNamaKota(this.id)' id='jabatan'>
                            <option value=0 selected>- Choose Your City -</option>
                            <?php
                            $tampil = mysqli_query($konek, "SELECT * FROM jabatan order BY nama_jabatan");
                            while ($r = mysqli_fetch_array($tampil)) {
                                echo "<option value=$r[id_jabatan]>$r[nama_jabatan]</option>";
                            }
                            ?>
                        </select>

                        <br>
                        <tr>
                            <td>&nbsp;</td>
                            <td><img src='captcha.php'></td>
                        </tr></br><br>

                        <input name="kode" type="text" placeholder="Masukkan 6 kode diatas" />


                        <button class="btn btn-lg btn-success btn-block" type="submit" value="Daftar">Register</button>
                    </form>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <ul class="list-inline">
                    <li><a class="text-muted" href="#login" data-toggle="tab">Login</a></li>
                    <li><a class="text-muted" href="#forgot" data-toggle="tab">Forgot Password</a></li>
                    <li><a class="text-muted" href="#signup" data-toggle="tab">Signup</a></li>
                </ul>
            </div>
        </div>


        <!--jQuery -->
        <script src="assets/lib/jquery/jquery.js"></script>

        <!--Bootstrap -->
        <script src="assets/lib/bootstrap/js/bootstrap.js"></script>


        <script type="text/javascript">
            (function($) {
                $(document).ready(function() {
                    $('.list-inline li > a').click(function() {
                        var activeForm = $(this).attr('href') + ' > form';
                        $(activeForm).addClass('animated fadeIn');
                        setTimeout(function() {
                            $(activeForm).removeClass('animated fadeIn');
                        }, 1000);
                    });
                });
            })(jQuery);
        </script>
    <?php
} else {
    echo "<script>window.alert('anda sudah melakukan login')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php?hal=home'>";
}
    ?>
    </body>

    </html>