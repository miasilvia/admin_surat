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
    mysqli_query($konek, "DELETE FROM direktur WHERE id_direktur='$_GET[id]'");
    header('location:../../media.php?hal=direktur');
  }
  // Input 
  elseif ($act == 'input') {
    $nama_lengkap = $_POST['nama_lengkap'];
    $username = $_POST['username'];
    $id_jabatan = $_POST['id_jabatan'];
    $password = md5($_POST['password']);
    $c_password = md5($_POST['c_password']);
    if ($password != $c_password) {

      print "<script>alert('Konfirmasi password harus sama dengan password !');
javascript:history.go(-1);</script>";
      exit;
    }
    if ((!empty($nama_lengkap)) && (!empty($username)) && (!empty($password))) {
      $query = mysqli_query($konek, "INSERT INTO direktur (nama_lengkap,username,id_jabatan,password)
values ('$nama_lengkap','$username','$id_jabatan','$password');");
      echo "
        <script>
          alert('Registrasi Berhasil!'); 
          window.location = '../../media.php?hal=direktur'
        </script>";
    } else {
      echo "
        <script>
          alert('Maaf, tidak boleh ada field yang kosong'); 
          window.location = '../../media.php?hal=direktur'
        </script>";
    }
  } elseif ($act == 'update') {

    $r = mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM direktur where id_direktur   = '$_POST[id]'"));
    $pass_lama = md5($_POST["pass_lama"]);
    $pass_baru = md5($_POST["pass_baru"]);
    if (empty($_POST["pass_baru"]) or empty($_POST["pass_ulangi"])) {

      mysqli_query($konek, "UPDATE direktur SET   nama_lengkap  = '$_POST[nama_lengkap]', username = '$_POST[username]', id_jabatan= '$_POST[id_jabatan]'
                             WHERE id_direktur   = '$_POST[id]'");

      echo "
    <script>
      alert('Anda harus mengisikan semua data pada form Ganti Password.'); 
      window.location = '../../media.php?hal=direktur'
    </script>";
    } else {
      // Apabila password lama cocok dengan password admin di database

      if ($_POST["pass_baru"] == $_POST["pass_ulangi"]) {
        mysqli_query($konek, "UPDATE direktur SET password = '$pass_baru',nama_lengkap  = '$_POST[nama_lengkap]', username = '$_POST[username]', id_jabatan= '$_POST[id_jabatan]'   WHERE id_direktur  = '$_POST[id]'");
        echo "
          <script>
            alert('Update Password Berhasil'); 
            window.location = '../../media.php?hal=direktur'
          </script>";
      } else {
        echo "
        <script>
          alert('Password baru yang anda masukkan tidak sama'); 
          window.location = '../../media.php?hal=direktur'
        </script>";
      }
    }
  }
}
