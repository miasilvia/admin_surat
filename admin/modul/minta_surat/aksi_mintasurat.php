<?php
include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb.php";

$act = $_GET['act'];
// Hapus 
if ($act == 'hapus') {
  mysqli_query($konek, "DELETE FROM permintaan WHERE id_permintaan='$_GET[id]'");
  header('location:../../media.php?hal=permintaan');
}

// Input 
elseif ($act == 'input') {
  mysqli_query($konek, "INSERT INTO nomor_surat(tgl_minta,tgl_surat,no_urut, pengajuan,id_perihal,tahun) 
                            VALUES('$_POST[tgl_minta]','$_POST[tgl_surat]', '$_POST[no_urut]', '$_POST[pengajuan]','$_POST[id_perihal]', '$_POST[tahun]')");
  echo "
  <script>alert('Data Berhasil diinputkan'); window.location = '../../media.php?hal=permintaan&aksi=detail&id=$_POST[id]'</script>";
} elseif ($act == 'input2') {

  mysqli_query($konek, "INSERT INTO buat_suratdinas(id_permintaan,nomor_surat, lampiran,  hal, tgl_surat,kota, penerima,tempat_penerima,jabatan_ttd,nama_ttd,nomor_induk,isi_surat) 
                            VALUES('$_POST[id_permintaan]','$_POST[nomor_surat]','$_POST[lampiran]', '$_POST[hal]', '$_POST[tgl_surat]','$_POST[kota]', '$_POST[penerima]', '$_POST[tempat_penerima]', '$_POST[jabatan_ttd]' ,'$_POST[nama_ttd]','$_POST[nomor_induk]','$_POST[isi_surat]')");
  echo "
  <script>alert('Data Berhasil diinputkan'); window.location = '../../media.php?hal=permintaan&aksi=detail&id=$_POST[id_permintaan]'</script>";
} elseif ($act == 'update') {

  mysqli_query($konek, "UPDATE permintaan SET balasan_admin='$_POST[balasan_admin]' WHERE id_permintaan = '$_POST[id]'");
  echo "
  <script>alert('Data Berhasil diinputkan'); window.location = '../../media.php?hal=permintaan&aksi=detail&id=$_POST[id]'</script>";
} elseif ($act == 'update2') {
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $balasan_admin  = $_FILES['fupload']['name'];
  $acak           = rand(1, 99);
  $nama_file_unik = $acak . $balasan_admin;
  UploadMintasurat($nama_file_unik);
  mysqli_query($konek, "UPDATE permintaan SET balasan_admin='$nama_file_unik'  WHERE id_permintaan = '$_POST[id]'");
  echo "
  <script>alert('Data Berhasil diinputkan'); window.location = '../../media.php?hal=permintaan&aksi=detail&id=$_POST[id]'</script>";
} else if ($act == 'unhead') {
  $id     = $_GET['id'];
  $delete   = mysqli_query($konek, "Update permintaan Set status_arsip='belum' Where id_permintaan='$id'");
  header('location:../../media.php?hal=permintaan&aksi=arsip');
} else if ($act == 'head') {
  $id     = $_GET['id'];
  $delete   = mysqli_query($konek, "Update permintaan Set status_arsip='sudah' Where id_permintaan='$id'");
  echo "
  <script>alert('Data Berhasil diinputkan'); window.location = '../../media.php?hal=permintaan&aksi=arsip'</script>";
}
