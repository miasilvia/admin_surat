<?php
error_reporting(0);
session_start();

if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";

include "../../../config/fungsi_thumb.php";
include "../../../config/fungsi_seo.php";

$p=$_GET['hal'];
$act=$_GET['act'];

// Hapus 
if ($act=='hapus'){
 
     mysqli_query("DELETE FROM admin WHERE id_admin='$_GET[id]'");
  echo"
  <script>alert('Data Berhasil Dihapus'); window.location = '../../media.php?hal=admin'</script>";

  }
// Input 
elseif ($act=='input'){
$nama_lengkap = $_POST['nama_lengkap'];
$username = $_POST['username'];
$level = $_POST['level'];
$id_jabatan=$_POST['id_jabatan'];
$id_unitPengelola=$_POST['id_unitPengelola'];
$password = md5($_POST['password']);
$c_password = md5($_POST['c_password']);
if($password != $c_password)
{

print "<script>alert('Konfirmasi password harus sama dengan password !');
javascript:history.go(-1);</script>";
exit;
}
if((!empty($nama_lengkap)) && (!empty($username)) && (!empty($password)))
{
$query = mysqli_query("INSERT INTO admin (nama_lengkap,username,id_jabatan,password,level,id_unitPengelola)
values ('$nama_lengkap','$username','$id_jabatan','$password','$level','$id_unitPengelola');");
 echo "
        <script>
          alert('Registrasi Berhasil!'); 
          window.location = '../../media.php?hal=admin'
        </script>";

}

else
{
 echo "
        <script>
          alert('Maaf, tidak boleh ada field yang kosong'); 
          window.location = '../../media.php?hal=admin'
        </script>";
}
  }

 elseif ($act=='update'){

  $r=mysqli_fetch_array(mysqli_query("SELECT * FROM admin where id_admin   = '$_POST[id]'"));
  $pass_lama=md5($_POST["pass_lama"]);
  $pass_baru=md5($_POST["pass_baru"]);
  if (empty($_POST["pass_baru"]) OR empty($_POST["pass_ulangi"])){

 mysqli_query("UPDATE admin SET   nama_lengkap  = '$_POST[nama_lengkap]', username = '$_POST[username]', level = '$_POST[level]', id_jabatan= '$_POST[id_jabatan]', id_unitPengelola= '$_POST[id_unitPengelola]'  WHERE id_admin   = '$_POST[id]'");

  echo "
    <script>
      alert('berhasil .'); 
      window.location = '../../media.php?hal=admin'
    </script>";
  } else{ 
    // Apabila password lama cocok dengan password admin di database
   
      if ($_POST["pass_baru"]==$_POST["pass_ulangi"]){
        mysqli_query("UPDATE admin SET password = '$pass_baru',nama_lengkap  = '$_POST[nama_lengkap]', username = '$_POST[username]', level = '$_POST[level]', id_jabatan= '$_POST[id_jabatan]', id_unitPengelola= '$_POST[id_unitPengelola]'   WHERE id_admin  = '$_POST[id]'");
        echo "
          <script>
            alert('Update Password Berhasil'); 
            window.location = '../../media.php?hal=admin'
          </script>";
      } else{
      echo "
        <script>
          alert('Password baru yang anda masukkan tidak sama'); 
          window.location = '../../media.php?hal=admin'
        </script>";
      }
   
  }




}}

?>
