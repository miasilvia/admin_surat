<head>
    <title>Halaman Admin</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css">
    <!-- JavaScript -->
    <script src="assets/lib/jquery/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
</head>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "../config/koneksi.php";  // File koneksi ke database

// Query untuk mendapatkan data admin
$sqlAdmin = "SELECT * FROM admin WHERE username = '" . $_SESSION['username'] . "'";
$resultAdmin = $konek->query($sqlAdmin);
$b = $resultAdmin->fetch_assoc();

// Query untuk mendapatkan jabatan

$sqlJabatan = "SELECT * FROM jabatan WHERE id_jabatan = '" . $b['id_jabatan'] . "'";
$resultJabatan = $konek->query($sqlJabatan);
$p2 = $resultJabatan->fetch_assoc();

$tgl_sekarang = date('Y-m-d');
$format = date('d F Y', strtotime($tgl_sekarang));
?>

<body>
    <!-- Navbar -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">

        <!-- .nav -->
        <ul class="nav navbar-nav">
            <li><a class="dropdown-toggle" href="?hal=permintaan"><span class="label label-pill label-danger count"></span>
                    Permintaan</a></li>
            <li><a href="?hal=permintaan&aksi=arsip"><span class="label label-pill label-danger count"></span>
                    Kiriman Surat Keluar</a></li>
        </ul>
        <!-- /.nav -->
    </div>
    </div>
    <!-- /.container-fluid -->
    </nav>
    <header class="head">
        <div class="search-bar">

            <!-- /.main-search -->
        </div>
        <!-- /.search-bar -->
        <div class="main-bar">

        </div>
        <!-- /.main-bar -->
    </header>
    <!-- /.head -->
    </div>
    <!-- /#top -->
    <div id="left">
        <div class="media user-media bg-dark dker">
            <div class="user-media-toggleHover">
                <span class="fa fa-user"></span>
            </div>
            <div class="user-wrapper bg-dark">


                <div class="media-body">
                    <h5 align="center" class="media-heading">Nama : <?php echo "$b[nama_lengkap]"; ?></h5>
                    <ul class="list-unstyled user-info">

                        <li align="center">
                            Jabatan : <?php echo "$p2[nama_jabatan]"; ?></li>
                        <li align="center"> <br>
                            <small><i class="fa fa-calendar"></i>&nbsp;<?php echo " $format"; ?></small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #menu -->
        <ul id="menu" class="bg-blue dker">
            <li class="nav-header">Menu</li>
            <li class="nav-divider"></li>
            <li class="">
                <a href="?hal=dashboard">
                    <i class="fa fa-dashboard"></i><span class="link-title">&nbsp;Dashboard</span>
                </a>
            </li>
            <li class="">
                <a href="javascript:;">
                    <i class="fa fa-building "></i>
                    <span class="link-title">SURAT MASUK</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="collapse">
                    <li>
                        <a href="?hal=data-suratmasuk">
                            <i class="fa fa-angle-right"></i>&nbsp; Agenda Surat Masuk </a>
                    </li>
                    <li>
                        <a href="?hal=arsip-suratmasuk">
                            <i class="fa fa-angle-right"></i>&nbsp; Arsip Surat Masuk </a>
                    </li>
                    <li>
                        <a href="?hal=arsip-disposisi">
                            <i class="fa fa-angle-right"></i>&nbsp; Arsip Surat Disposisi Umum </a>
                    </li>
                    <li>
                        <a href="?hal=proses-surat">
                            <i class="fa fa-angle-right"></i>&nbsp; Lihat Proses Surat Masuk </a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="javascript:;">
                    <i class="fa fa-tasks"></i>
                    <span class="link-title">SURAT KELUAR</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="collapse">
                    <li>
                        <a href="?hal=nomor-surat">
                            <i class="fa fa-angle-right"></i>&nbsp; Penomoran Surat Keluar </a>
                    </li>
                    <li>
                        <a href="?hal=data-suratkeluar">
                            <i class="fa fa-angle-right"></i>&nbsp; Arsip Surat Keluar</a>
                    </li>

                </ul>
            </li>
            <li class="">
                <a href="javascript:;">
                    <i class="fa fa-tasks"></i>
                    <span class="link-title">BUAT SURAT</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="collapse">
                    <li>
                        <a href="?hal=buat-suratdinas">
                            <i class="fa fa-angle-right"></i>&nbsp; Buat Surat Dinas </a>
                    </li>
                    <li>
                        <a href="?hal=buat-suratdinas&aksi=tampilTugas">
                            <i class="fa fa-angle-right"></i>&nbsp; Buat Surat Tugas </a>
                    </li>

                </ul>
            </li>
            <li class="">
                <a href="javascript:;">
                    <i class="fa fa-pencil"></i>
                    <span class="link-title">
                        LAPORAN
                    </span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="collapse">
                    <li>
                        <a href="?hal=laporan-suratmasuk">
                            <i class="fa fa-angle-right"></i>&nbsp; Laporan Surat Masuk </a>
                    </li>
                    <li>
                        <a href="?hal=laporan-suratkeluar">
                            <i class="fa fa-angle-right"></i>&nbsp; Laporan Surat Keluar</a>
                    </li>

                </ul>
            </li>
            <li class="">
                <a href="javascript:;">
                    <i class="fa fa-pencil"></i>
                    <span class="link-title">
                        MANAJEMEN USER
                    </span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="collapse">
                    <li>
                        <a href="?hal=admin">
                            <i class="fa fa-angle-right"></i>&nbsp; User Pengelola </a>
                    </li>

                </ul>
            </li>
            <li class="">
                <a href="javascript:;">
                    <i class="fa fa-pencil"></i>
                    <span class="link-title">
                        MANAJEMEN TAMBAHAN
                    </span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="collapse">
                    <li>
                        <a href="?hal=jabatan">
                            <i class="fa fa-angle-right"></i>&nbsp; Jabatan </a>
                    </li>
                    <li>
                        <a href="?hal=unit-pengelola">
                            <i class="fa fa-angle-right"></i>&nbsp;Unit Pengelola</a>
                    </li>

                </ul>
            </li>




        </ul>
        <br>
        <br /><br /><br /><br /><br /><br /><br /><br /><br />
        <!-- /#left -->

        <!-- Script -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <script>
            $(document).ready(function() {
                function load_unseen_notification(view = '') {
                    $.ajax({
                        url: "fetch.php",
                        method: "POST",
                        data: {
                            view: view
                        },
                        dataType: "json",
                        success: function(data) {
                            $('.dropdown-menu').html(data.notification);
                            if (data.unseen_notification > 0) {
                                $('.count').html(data.unseen_notification);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }

                load_unseen_notification();

                $('#comment_form').on('submit', function(event) {
                    event.preventDefault();
                    if ($('#subject').val() != '' && $('#comment').val() != '') {
                        var form_data = $(this).serialize();
                        $.ajax({
                            url: "modul/surat_masuk/aksi_suratmasuk.php",
                            method: "POST",
                            data: form_data,
                            success: function(data) {
                                $('#comment_form')[0].reset();
                                load_unseen_notification();
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                            }
                        });
                    } else {
                        alert("Both Fields are Required");
                    }
                });

                $(document).on('click', '.dropdown-toggle', function() {
                    $('.count').html('');
                    load_unseen_notification('yes');
                });

                setInterval(function() {
                    load_unseen_notification();
                }, 5000);
            });
        </script>
        <!-- End Script -->