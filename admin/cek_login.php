<?php
include "../config/koneksi.php";
function anti_injection($data)
{
  global $konek;
  $filter = mysqli_real_escape_string($konek, stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES))));
  return $filter;
}

$username = anti_injection($_POST['username']);
$pass     = anti_injection(md5($_POST['password']));

$login = mysqli_query($konek, "SELECT * FROM admin WHERE username='$username' AND password='$pass'");
$ketemu = mysqli_num_rows($login);
$r = mysqli_fetch_array($login);

if ($ketemu > 0) {
  session_start();

  $_SESSION['id_login']     = $r['id_admin'];
  $_SESSION['username']     = $r['username'];
  $_SESSION['namalengkap']  = $r['nama_lengkap'];
  $_SESSION['passuser']     = $r['password'];

  $sid_lama = session_id();
  session_regenerate_id();
  $sid_baru = session_id();

  echo "<script>alert('Selamat Datang $_SESSION[namalengkap]'); window.location = 'media.php?hal=dashboard'</script>";
  header('location:media.php?hal=dashboard');
} else {
  echo "<script>alert('Login Gagal, username atau password anda salah'); window.location = '../index.php'</script>";
}
