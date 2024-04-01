<?php
include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb.php";

$act=$_GET[act];

// Hapus banner
// Hapus 
if ($act=='hapus2'){
$id = $_POST['id'];
 $sql1 = mysql_query("SELECT * FROM disposisi WHERE id = '$_GET[id]'");
     $result = mysql_fetch_array($sql1);
  mysql_query("DELETE  FROM  disposisi where id='$_GET[id]'");

  header("location:../../media.php?hal=data-suratmasuk&aksi=detail&id=$result[id_surat]");
}
// Input 
elseif ($act=='input2'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
    $acak           = rand(1,99);
    $nama_file_unik = $acak.$nama_file;

    UploadSuratKeputusan($nama_file_unik);
    $tgl_posting=date('Y-m-d');
    mysql_query("INSERT INTO  surat_keputusan(id_surat,nama_file) 
                            VALUES('$_POST[id]','$nama_file_unik')");
    header("location:../../media.php?unit=data-suratmasuk&aksi=detail2&id=$_POST[id]");
}
elseif ($act=='update2'){
  $tgl_isi=date('Y-m-d');
  mysql_query("UPDATE disposisi SET  isi_disposisi  = '$_POST[isi_disposisi]', tgl_isi='$tgl_isi'
                             WHERE id_disposisi   = '$_POST[id]'");
  
  
  header('location:../../media.php?unit=data-suratmasuk');

 }
 elseif ($act=='input_sk'){
  $tgl_isi=date('Y-m-d');
  mysql_query("UPDATE surat_keputusan SET  isi_disposisi  = '$_POST[isi_disposisi]', tgl_isi='$tgl_isi'
                             WHERE id_disposisi   = '$_POST[id]'");
  header('location:../../media.php?unit=data-suratmasuk&aksi=pengelola');
}
 elseif ($act=='update_st'){
  $tgl_isi=date('Y-m-d');
  mysql_query("UPDATE surat_keputusan SET  status_terima  = '$_POST[status_terima]'
                             WHERE id_surat   = '$_POST[id]'");
  
  
  header('location:../../media.php?unit=data-suratmasuk&aksi=pengelola');

 }
?>
