<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['passuser'])) {
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
  include "../../../config/koneksi.php";
  include "../../../config/fungsi_seo.php";

  $act = $_GET['act'];

  // Hapus Kategori
  if ($act == 'hapus') {
    mysqli_query($konek, "DELETE FROM jabatan WHERE id_jabatan='$_GET[id]'");
    echo "
  <script>alert('Data Berhasil dihapus'); window.location = '../../media.php?hal=jabatan'</script>";
  }

  // Input kategori
  elseif ($act == 'input') {

    mysqli_query($konek, "INSERT INTO jabatan(nama_jabatan) VALUES('$_POST[nama_jabatan]')");
    echo "
  <script>alert('Data Berhasil ditambahkan'); window.location = '../../media.php?hal=jabatan'</script>";
  }

  // Update kategori
  elseif ($act == 'update') {

    mysqli_query($konek, "UPDATE jabatan SET nama_jabatan = '$_POST[nama_jabatan]' WHERE id_jabatan = '$_POST[id]'");
    echo "
  <script>alert('Data Berhasil diedit'); window.location = '../../media.php?hal=jabatan'</script>";
  }
}
