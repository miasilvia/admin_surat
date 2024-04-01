<?php
include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb.php";

$act = $_GET["act"];

// Hapus banner
// Hapus 
if ($act == 'hapus') {
  $data = mysqli_fetch_array(mysqli_query($konek, "SELECT nama_file FROM arsip_suratmasuk WHERE id_surat='$_GET[id]'"));
  if ($data['nama_file'] != '') {
    mysqli_query($konek, "DELETE FROM arsip_suratmasuk WHERE id_surat='$_GET[id]'");
    unlink("../../../file_arsipsuratmasuk/$_GET[namafile]");
  } else {
    mysqli_query($konek, "DELETE FROM arsip_suratmasuk WHERE id_surat='$_GET[id]'");
  }
  header('location:../../media.php?hal=arsip-suratmasuk');


  mysqli_query($konek, "DELETE FROM arsip_suratmasuk WHERE id_surat='$_GET[id]'");
  echo "
  <script>alert('Data Berhasil Dihapus'); window.location = '../../media.php?hal=arsip-suratmasuk'</script>";
}

// Input 
elseif ($act == 'input') {
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $acak           = rand(1, 99);
  $nama_file_unik = $acak . $nama_file;
  if (!empty($lokasi_file)) {
    UploadArsipsurat($nama_file_unik);
    $tgl_posting = date('Y-m-d');

    mysqli_query($konek, "INSERT INTO  arsip_suratmasuk(pengelola,tgl_terima, tgl_surat, tgl_posting, asal_surat, nomor_surat, perihal,nama_file) 
                            VALUES( '$_POST[pengelola]','$_POST[tgl_terima]', '$_POST[tgl_surat]', '$tgl_posting','$_POST[asal_surat]', '$_POST[nomor_surat]', '$_POST[perihal]','$nama_file_unik')");
  } else {
    $tgl_posting = date('Y-m-d');
    mysqli_query($konek, "INSERT INTO arsip_suratmasuk(pengelola,tgl_terima, tgl_surat, tgl_posting, asal_surat, nomor_surat, perihal) 
                            VALUES( '$_POST[pengelola]','$_POST[tgl_terima]', '$_POST[tgl_surat]','$tgl_posting', '$_POST[asal_surat]', '$_POST[nomor_surat]', '$_POST[perihal]')");
  }
  echo "
  <script>alert('Data Berhasil Ditambahkan'); window.location = '../../media.php?hal=arsip-suratmasuk'</script>";
}

// Update 
elseif ($act == 'update') {
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $acak           = rand(1, 99);
  $nama_file_unik = $acak . $nama_file;

  $tgl_posting = date('Y-m-d');

  if (empty($lokasi_file)) {
    mysqli_query($konek, "UPDATE arsip_suratmasuk SET   pengelola='$_POST[pengelola]',asal_surat  = '$_POST[asal_surat]', tgl_surat = '$_POST[tgl_surat]', tgl_terima= '$_POST[tgl_terima]', nomor_surat= '$_POST[nomor_surat]', perihal= '$_POST[perihal]', tgl_posting='$tgl_posting'
                             WHERE id_surat   = '$_POST[id]'");
  } else {
    UploadArsipsurat($nama_file_unik);

    mysqli_query($konek, "UPDATE arsip_suratmasuk SET pengelola='$_POST[pengelola]',asal_surat  = '$_POST[asal_surat]', tgl_surat = '$_POST[tgl_surat]', tgl_terima= '$_POST[tgl_terima]', nomor_surat= '$_POST[nomor_surat]', perihal= '$_POST[perihal]', tgl_posting='$tgl_posting', nama_file= '$nama_file_unik'
                             WHERE id_surat   = '$_POST[id]'");
  }
  header('location:../../media.php?hal=arsip-suratmasuk');
}
