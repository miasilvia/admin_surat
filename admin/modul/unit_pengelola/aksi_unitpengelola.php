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
    mysqli_query($konek, "DELETE FROM unit_pengelola WHERE id_unitPengelola='$_GET[id]'");
    echo "
  <script>alert('Data Berhasil dihapus'); window.location = '../../media.php?hal=unit-pengelola'</script>";
  }

  // Input kategori
  elseif ($act == 'input') {

    mysqli_query($konek, "INSERT INTO unit_pengelola(unit_pengelola) VALUES('$_POST[unit_pengelola]')");
    echo "
  <script>alert('Data Berhasil diinputkan'); window.location = '../../media.php?hal=unit-pengelola'</script>";
  }

  // Update kategori
  elseif ($act == 'update') {

    mysqli_query($konek, "UPDATE unit_pengelola SET unit_pengelola = '$_POST[unit_pengelola]' WHERE id_unitPengelola = '$_POST[id]'");
    echo "
  <script>alert('Data Berhasil diedit'); window.location = '../../media.php?hal=unit-pengelola'</script>";
  }
}
