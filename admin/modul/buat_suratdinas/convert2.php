<?php
// menyertakan autoloader
require_once '../../dompdf/dompdf_config.inc.php';
include '../../../config/koneksi.php';
$user = mysqli_query($konek, "SELECT * from buat_suratdinas WHERE id_buatsurat='" . $_GET['id'] . "'");
$r = mysqli_fetch_array($user);

$nomor = $r['nomor_surat'];

$tgl_surat = $r['tgl_surat'];

$jabatan_ttd = $r['jabatan_ttd'];
$nama_ttd = $r['nama_ttd'];
$isi_surat = $r['isi_surat'];

$nomor_induk = $r['nomor_induk'];
$kota = $r['kota'];
$tembusan = $r['tembusan'];

$format = date('d F Y', strtotime($tgl_surat));
$html =
    '<html>   
<head>
<link rel="stylesheet" href="style.css">
</head
<body><pre>' .
    '<center><img  src="../logo4.png"></center>' .

    '<center><font face="times new roman"><strong>SURAT TUGAS </strong>' .
    '<br/>Nomor Surat&emsp;&emsp;&emsp;:	' . $nomor .
    '</font></pre>' .
    '<br/>' . $isi_surat .

    '<table width="2200px" border="0">' .
    '<tr>' .
    '<td >' .
    '<td>' .
    '<p ><font face="times new roman" >' .
    $format .
    '<br/>' . $jabatan_ttd .
    'Politeknik Negeri Indramayu,</p>' .
    '<br><br><br>' .
    '<p><font face="times new roman" ><strong>' . $nama_ttd . '</strong>' .
    '<br>' . $nomor_induk . '</p>' .

    '</td></table>' . $tembusan .

    '</font></body></html>';
// mengacu ke namespace DOMPDF


// menggunakan class dompdf
$dompdf = new Dompdf();


$dompdf->load_Html($html);

// (Opsional) Mengatur ukuran kertas dan orientasi kertas


// Menjadikan HTML sebagai PDF
$dompdf->render();

// Output akan menghasilkan PDF (1 = download dan 0 = preview)
$dompdf->stream("Data.pdf", array("Attachment" => 0));
