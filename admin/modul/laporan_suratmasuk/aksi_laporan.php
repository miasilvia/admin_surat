<?php
include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb.php";

$act = $_GET["act"];

// Hapus banner
// Hapus 
if ($act == 'hapus') {
  $data = mysqli_fetch_array(mysqli_query($konek, "SELECT nama_file FROM surat_masuk WHERE id_surat='$_GET[id]'"));
  if ($data['nama_file'] != '') {
    mysqli_query($konek, "DELETE FROM surat_masuk WHERE id_surat='$_GET[id]'");
    unlink("../../../file_suratmasuk/$_GET[namafile]");
  } else {
    mysqli_query($konek, "DELETE FROM surat_masuk WHERE id_surat='$_GET[id]'");
  }
  header('location:../../media.php?hal=data-suratmasuk');


  mysqli_query($konek, "DELETE FROM surat_masuk WHERE id_surat='$_GET[id]'");
  header('location:../../media.php?hal=data-suratmasuk');
}

// Input 
elseif ($act == 'input') {
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  if (!empty($lokasi_file)) {
    UploadSuratmasuk($nama_file);
    $tgl_posting = date('Y-m-d');
    mysqli_query($konek, "INSERT INTO  surat_masuk(no_agenda,
                                    tgl_terima, tgl_surat, tgl_posting, asal_surat, nomor_surat, perihal,nama_file) 
                            VALUES('$_POST[no_agenda]', '$_POST[tgl_terima]', '$_POST[tgl_surat]', '$tgl_posting','$_POST[asal_surat]', '$_POST[nomor_surat]', '$_POST[perihal]','$nama_file')");
  } else {
    $tgl_posting = date('Y-m-d');
    mysqli_query($konek, "INSERT INTO surat_masuk(no_agenda,
                                    tgl_terima, tgl_surat, tgl_posting, asal_surat, nomor_surat, perihal) 
                            VALUES('$_POST[no_agenda]', '$_POST[tgl_terima]', '$_POST[tgl_surat]','$tgl_posting', '$_POST[asal_surat]', '$_POST[nomor_surat]', '$_POST[perihal]')");
  }
  header('location:../../media.php?hal=data-suratmasuk');
}

// Update 
elseif ($act == 'update') {
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  $tgl_posting = date('Y-m-d');

  if (empty($lokasi_file)) {
    mysqli_query($konek, "UPDATE surat_masuk SET no_agenda= '$_POST[no_agenda]',  asal_surat  = '$_POST[asal_surat]', tgl_surat = '$_POST[tgl_surat]', tgl_terima= '$_POST[tgl_terima]', nomor_surat= '$_POST[nomor_surat]', perihal= '$_POST[perihal]', tgl_posting='$tgl_posting'
                             WHERE id_surat   = '$_POST[id]'");
  } else {
    UploadSuratmasuk($nama_file);

    mysqli_query($konek, "UPDATE surat_masuk SET no_agenda= '$_POST[no_agenda]',  asal_surat  = '$_POST[asal_surat]', tgl_surat = '$_POST[tgl_surat]', tgl_terima= '$_POST[tgl_terima]', nomor_surat= '$_POST[nomor_surat]', perihal= '$_POST[perihal]', tgl_posting='$tgl_posting', nama_file= '$nama_file'
                             WHERE id_surat   = '$_POST[id]'");
  }
  header('location:../../media.php?hal=data-suratmasuk');
}

//disposisi

elseif ($act == 'disposisi') {
  $tgl_dibuat = date('Y-m-d');

  mysqli_query($konek, "INSERT INTO disposisi(id_surat,
                                    sifat_surat,id_unitKerja,tgl_dibuat) 
                            VALUES('$_POST[id]', '$_POST[sifat_surat]','$_POST[unit_kerja]','$tgl_dibuat')");

  header('location:../../media.php?hal=data-suratmasuk');
}
