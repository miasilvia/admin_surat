<?php
include "../../../config/koneksi.php";

include "../../../config/fungsi_thumb.php";

$act = $_GET["act"];


// Hapus 
if ($act == 'hapus') {
  mysqli_query($konek, "DELETE FROM permintaan WHERE id_permintaan='$_GET[id]'");
  header('location:../../media.php?dir=minta-surat');
}

// Input 
elseif ($act == 'input') {
  $tgl_minta = date('Y-m-d');
  mysqli_query($konek, "INSERT INTO permintaan(id_admin,jenis_permintaan, id_perihal,  hal, tgl_surat,jenis_surat, isi_surat,penerima,nama_ttd,kota,jabatan_ttd,nomor_induk,lampiran,tempat_penerima,tgl_minta) 
                            VALUES('$_POST[id_admin]','$_POST[jenis_permintaan]','$_POST[id_perihal]', '$_POST[hal]', '$_POST[tgl_surat]','$_POST[jenis_surat]', '$_POST[isi_surat]',  '$_POST[penerima]', '$_POST[nama_ttd]', '$_POST[kota]', '$_POST[jabatan_ttd]', '$_POST[nomor_induk]', '$_POST[lampiran]', '$_POST[tempat_penerima]','$tgl_minta')");
  header('location:../../media.php?dir=minta-surat');
} elseif ($act == 'update') {
  $tgl_minta = date('Y-m-d');
  mysqli_query($konek, "UPDATE permintaan SET tgl_minta='$tgl_minta',nomor_surat = '$_POST[nomor_surat]', lampiran='$_POST[lampiran]',hal='$_POST[hal]',tgl_surat='$_POST[tgl_surat]',kota='$_POST[kota]',penerima='$_POST[penerima]', tempat_penerima='$_POST[tempat_penerima]',jabatan_ttd='$_POST[jabatan_ttd]', nama_ttd='$_POST[nama_ttd]',nomor_induk= '$_POST[nomor_induk]',isi_surat='$_POST[isi_surat]' WHERE id_buatsurat = '$_POST[id]'");
  header('location:../../media.php?hal=buat-suratdinas');
} elseif ($act == 'duplikat') {

  mysqli_query($konek, "INSERT INTO buat_suratdinas(nomor_surat, lampiran,  hal, tgl_surat,kota, penerima,tempat_penerima,jabatan_ttd,nama_ttd,nomor_induk,isi_surat) 
                            VALUES('$_POST[nomor_surat]','$_POST[lampiran]', '$_POST[hal]', '$_POST[tgl_surat]','$_POST[kota]', '$_POST[penerima]', '$_POST[tempat_penerima]', '$_POST[jabatan_ttd]' ,'$_POST[nama_ttd]','$_POST[nomor_induk]','$_POST[isi_surat]')");

  header('location:../../media.php?hal=buat-suratdinas');
}
