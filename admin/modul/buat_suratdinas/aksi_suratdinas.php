<?php
include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb.php";

$act = $_GET['act'];


// Hapus 
if ($act == 'hapus') {

  mysqli_query($konek, "DELETE FROM buat_suratdinas WHERE id_buatsurat='$_GET[id]'");
  echo "
  <script>alert('Data Berhasil dihapus'); window.location = '../../media.php?hal=buat-suratdinas'</script>";
} elseif ($act == 'hapus2') {

  mysqli_query($konek, "DELETE FROM buat_suratdinas WHERE id_buatsurat='$_GET[id]'");
  echo "
  <script>alert('Data Berhasil dihapus'); window.location = '../../media.php?hal=buat-suratdinas&aksi=tampilTugas'</script>";
}
// Input 
elseif ($act == 'input') {
  mysqli_query($konek, "INSERT INTO buat_suratdinas(jenis_surat,nomor_surat, lampiran,  hal, tgl_surat,kota, penerima,tempat_penerima,jabatan_ttd,nama_ttd,nomor_induk,isi_surat,tembusan) 
                            VALUES('$_POST[jenis_surat]','$_POST[nomor_surat]','$_POST[lampiran]', '$_POST[hal]', '$_POST[tgl_surat]','$_POST[kota]', '$_POST[penerima]', '$_POST[tempat_penerima]', '$_POST[jabatan_ttd]' ,'$_POST[nama_ttd]','$_POST[nomor_induk]','$_POST[isi_surat]','$_POST[tembusan]')");
  echo "
  <script>alert('Data Berhasil ditambahkan'); window.location = '../../media.php?hal=buat-suratdinas'</script>";
} elseif ($act == 'inputTugas') {
  mysqli_query($konek, "INSERT INTO buat_suratdinas(jenis_surat,nomor_surat, tgl_surat, jabatan_ttd,nama_ttd,nomor_induk,isi_surat,tembusan) 
                            VALUES('$_POST[jenis_surat]','$_POST[nomor_surat]', '$_POST[tgl_surat]', '$_POST[jabatan_ttd]' ,'$_POST[nama_ttd]','$_POST[nomor_induk]','$_POST[isi_surat]','$_POST[tembusan]')");
  echo "
  <script>alert('Data Berhasil ditambahkan'); window.location = '../../media.php?hal=buat-suratdinas&aksi=tampilTugas'</script>";
} elseif ($act == 'update') {
  mysqli_query($konek, "UPDATE buat_suratdinas SET jenis_surat = '$_POST[jenis_surat]',nomor_surat = '$_POST[nomor_surat]', lampiran='$_POST[lampiran]',hal='$_POST[hal]',tgl_surat='$_POST[tgl_surat]',kota='$_POST[kota]',penerima='$_POST[penerima]', tempat_penerima='$_POST[tempat_penerima]',jabatan_ttd='$_POST[jabatan_ttd]', nama_ttd='$_POST[nama_ttd]',nomor_induk= '$_POST[nomor_induk]',isi_surat='$_POST[isi_surat]',tembusan='$_POST[tembusan]' WHERE id_buatsurat = '$_POST[id]'");
  echo "
  <script>alert('Data Berhasil diedit'); window.location = '../../media.php?hal=buat-suratdinas'</script>";
} elseif ($act == 'updateST') {
  mysqli_query($konek, "UPDATE buat_suratdinas SET jenis_surat = '$_POST[jenis_surat]', nomor_surat = '$_POST[nomor_surat]',tgl_surat='$_POST[tgl_surat]',jabatan_ttd='$_POST[jabatan_ttd]', nama_ttd='$_POST[nama_ttd]',nomor_induk= '$_POST[nomor_induk]',isi_surat='$_POST[isi_surat]',tembusan='$_POST[tembusan]' WHERE id_buatsurat = '$_POST[id]'");
  echo "
  <script>alert('Data Berhasil diedit'); window.location = '../../media.php?hal=buat-suratdinas&aksi=tampilTugas'</script>";
} elseif ($act == 'duplikat') {
  mysqli_query($konek, "INSERT INTO buat_suratdinas(jenis_surat,nomor_surat, lampiran,  hal, tgl_surat,kota, penerima,tempat_penerima,jabatan_ttd,nama_ttd,nomor_induk,isi_surat,tembusan) 
                            VALUES('$_POST[jenis_surat]','$_POST[nomor_surat]','$_POST[lampiran]', '$_POST[hal]', '$_POST[tgl_surat]','$_POST[kota]', '$_POST[penerima]', '$_POST[tempat_penerima]', '$_POST[jabatan_ttd]' ,'$_POST[nama_ttd]','$_POST[nomor_induk]','$_POST[isi_surat]','$_POST[tembusan]')");
  echo "
  <script>alert('Data Berhasil diduplikat'); window.location = '../../media.php?hal=buat-suratdinas'</script>";
} elseif ($act == 'duplikat2') {
  mysqli_query($konek, "INSERT INTO buat_suratdinas(jenis_surat,nomor_surat,  tgl_surat,jabatan_ttd,nama_ttd,nomor_induk,isi_surat,tembusan) 
                            VALUES('$_POST[jenis_surat]','$_POST[nomor_surat]','$_POST[tgl_surat]', '$_POST[jabatan_ttd]' ,'$_POST[nama_ttd]','$_POST[nomor_induk]','$_POST[isi_surat]','$_POST[tembusan]')");
  echo "
  <script>alert('Data Berhasil diduplikat'); window.location = '../../media.php?hal=buat-suratdinas&aksi=tampilTugas'</script>";
}
