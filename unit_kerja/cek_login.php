<?php
include "../config/koneksi.php";
function anti_injection($data)
{
  global $konek;
  $filter = mysqli_real_escape_string($konek, stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES))));
  return $filter;
}

$username = $_POST['username'];
$pass     = md5($_POST['password']);

// pastikan username dan password adalah berupa huruf atau angka.
//if (!ctype_alnum($username) OR !ctype_alnum($pass)){
// echo "Sekarang loginnya tidak bisa di injeksi lho.";
//}
//else{
$login = mysqli_query($konek, "SELECT * FROM direktur WHERE username='$username' AND password='$pass'");
$ketemu = mysqli_num_rows($login);
$r = mysqli_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0) {
  session_start();

  $_SESSION['id_login']     = $r['id_admin'];
  $_SESSION['username']     = $r['username'];
  $_SESSION['namalengkap']  = $r['nama_lengkap'];
  $_SESSION['passuser']     = $r['password'];
  $_SESSION['level']        = $r['level'];
  $_SESSION['id_unitPengelola'] = $r['id_unitPengelola'];


  $sid_lama = session_id();

  session_regenerate_id();

  $sid_baru = session_id();

  //mysql_query("UPDATE admin SET id_session='$sid_baru' WHERE username='$username'");
  echo "<script>alert('Selamat Datang $_SESSION[namalengkap]'); window.location = 'media.php?dir=dashboard'</script>";
  header('location:media.php?dir=dashboard');
} else {
  echo "<script>alert('Login Gagal, username atau password anda salah'); window.location = '../index.php'</script>";
}
//}