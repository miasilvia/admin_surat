<?php
include "config/koneksi.php";
function antiinjection($data)
{
  global $konek;
  $filter = mysqli_real_escape_string($konek, stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES))));
  return $filter;
}

$username = antiinjection($_POST['username']);
$pass     = antiinjection(md5($_POST['password']));

$login = mysqli_query($konek, "SELECT * FROM admin WHERE username='$username' AND password='$pass'");
$ketemu = mysqli_num_rows($login);
$r = mysqli_fetch_array($login);

if ($ketemu == 1) {
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

  if ($r['level'] == 'Admin') {
    echo "<script>alert('Selamat Datang $_SESSION[namalengkap]'); window.location = 'admin/media.php?hal=dashboard'</script>";
    header('location:admin/media.php?hal=dashboard');
  } else if ($r['level'] == 'direktur') {
    echo "<script>alert('Selamat Datang $_SESSION[namalengkap]'); window.location = 'direktur/media.php?dir=dashboard'</script>";
    header('location:direktur/media.php?dir=dashboard');
  } else if ($r['level'] == 'Unit Kerja') {
    echo "<script>alert('Selamat Datang $_SESSION[namalengkap]'); window.location = 'unit_kerja/media.php?unit=dashboard'</script>";
    header('location:unit_kerja/media.php?unit=dashboard');
  }
} else {
  echo "<script>alert('Login Gagal, username atau password anda salah'); window.location = 'index.php'</script>";
}
