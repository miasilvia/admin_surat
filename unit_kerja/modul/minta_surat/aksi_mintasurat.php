<?php
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";

$act=$_GET[act];


// Hapus 
if ($act=='hapus'){
mysql_query("DELETE FROM permintaan WHERE id_permintaan='$_GET[id]'");
   echo"<script>alert('Data Berhasil Dihapus'); window.location = '../../media.php?unit=minta-surat'</script>";
}

// Input 
elseif ($act=='input'){
    $tgl_minta=date('Y-m-d');
     mysql_query("INSERT INTO permintaan(id_admin,jenis_permintaan, id_perihal,  hal, tgl_surat,jenis_surat, isi_surat,penerima,nama_ttd,kota,jabatan_ttd,nomor_induk,lampiran,tempat_penerima,tgl_minta) 
                            VALUES('$_POST[id_admin]','$_POST[jenis_permintaan]','$_POST[id_perihal]', '$_POST[hal]', '$_POST[tgl_surat]','$_POST[jenis_surat]', '$_POST[isi_surat]',  '$_POST[penerima]', '$_POST[nama_ttd]', '$_POST[kota]', '$_POST[jabatan_ttd]', '$_POST[nomor_induk]', '$_POST[lampiran]', '$_POST[tempat_penerima]','$tgl_minta')");
        echo"<script>alert('Data Berhasil Ditambahkan'); window.location = '../../media.php?unit=minta-surat'</script>";
  }
elseif ($act=='update'){
$tgl_minta=date('Y-m-d');
  mysql_query("UPDATE permintaan SET tgl_minta='$tgl_minta',nomor_surat = '$_POST[nomor_surat]', lampiran='$_POST[lampiran]',hal='$_POST[hal]',tgl_surat='$_POST[tgl_surat]',kota='$_POST[kota]',penerima='$_POST[penerima]', tempat_penerima='$_POST[tempat_penerima]',jabatan_ttd='$_POST[jabatan_ttd]', nama_ttd='$_POST[nama_ttd]',nomor_induk= '$_POST[nomor_induk]',isi_surat='$_POST[isi_surat]' WHERE id_buatsurat = '$_POST[id]'");
  header('location:../../media.php?hal=buat-suratdinas');
}


?>