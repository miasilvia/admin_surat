<?php
error_reporting(0);
session_start();

if (empty($_SESSION['username']) and empty($_SESSION['passuser'])) {
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
  include "../../../config/koneksi.php";
  include "../../../config/fungsi_thumb.php";
  include "../../../config/fungsi_seo.php";

  $p = $_GET['hal'];
  $act = $_GET['act'];

  // Hapus 
  if ($act == 'hapus') {

    mysqli_query($konek, "DELETE FROM unit_kerja WHERE id_unitKerja='$_GET[id]'");
    echo "
  <script>alert('Data Berhasil dihapus'); window.location = '../../media.php?hal=unit-kerja'</script>";
  }


  // Input 
  elseif ($act == 'input') {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $id_jabatan = $_POST['id_jabatan'];
    $password = md5($_POST['password']);
    $c_password = md5($_POST['c_password']);
    if ($password != $c_password) {

      print "<script>alert('Konfirmasi password harus sama dengan password !');
javascript:history.go(-1);</script>";
      exit;
    }
    if ((!empty($nama)) && (!empty($username)) && (!empty($password))) {
      $query = mysqli_query($konek, "INSERT INTO unit_kerja (nama,username,id_jabatan,password)
values ('$nama','$username','$id_jabatan','$password');");
      echo "
        <script>
          alert('Registrasi Berhasil!'); 
          window.location = '../../media.php?hal=unit-kerja'
        </script>";
    } else {
      echo "
        <script>
          alert('Maaf, tidak boleh ada field yang kosong'); 
          window.location = '../../media.php?hal=unit-kerja'
        </script>";
    }
  } elseif ($act == 'update') {
    $r = mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM unit_kerja where id_unitKerja   = '$_POST[id]'"));
    $pass_lama = md5($_POST["pass_lama"]);
    $pass_baru = md5($_POST["pass_baru"]);
    if (empty($_POST["pass_baru"]) or empty($_POST["pass_ulangi"])) {

      mysqli_query($konek, "UPDATE unit_kerja SET   nama  = '$_POST[nama]', username = '$_POST[username]', id_jabatan= '$_POST[id_jabatan]'
                             WHERE id_unitKerja   = '$_POST[id]'");

      echo "
    <script>
      alert('Anda harus mengisikan semua data pada form Ganti Password.'); 
      window.location = '../../media.php?hal=unit-kerja'
    </script>";
    } else {
      // Apabila password lama cocok dengan password admin di database

      if ($_POST["pass_baru"] == $_POST["pass_ulangi"]) {
        mysqli_query($konek, "UPDATE unit_kerja SET password = '$pass_baru', nama  = '$_POST[nama]', username = '$_POST[username]', id_jabatan= '$_POST[id_jabatan]'   WHERE id_unitKerja   = '$_POST[id]'");
        echo "
          <script>
            alert('Update Password Berhasil'); 
            window.location = '../../media.php?hal=unit-kerja'
          </script>";
      } else {
        echo "
        <script>
          alert('Password baru yang anda masukkan tidak sama'); 
          window.location = '../../media.php?hal=unit-kerja'
        </script>";
      }
    }
  }
}
