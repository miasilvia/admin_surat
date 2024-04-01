<?php
include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb.php";
$act = $_GET['act'];
// Hapus banner
// Hapus 
if ($act == 'hapus') {
  $data = mysqli_fetch_array(mysqli_query($konek, "SELECT nama_file FROM surat_masuk WHERE id_surat='$_GET[id]'"));
  if ($data['nama_file'] != '') {
    mysqli_query($konek, "DELETE  a.*, b.* FROM surat_masuk a JOIN disposisi b ON a.id_surat=b.id_surat WHERE a.id_surat='$_GET[id]'");
    mysqli_query($konek, "DELETE FROM surat_masuk  WHERE id_surat='$_GET[id]'");
    unlink("../../../file_suratmasuk/$_GET[namafile]");
  } else {
    mysqli_query($konek, "DELETE  a.*, b.* FROM surat_masuk a JOIN disposisi b ON a.id_surat=b.id_surat WHERE a.id_surat='$_GET[id]'");
    mysqli_query($konek, "DELETE FROM surat_masuk  WHERE id_surat='$_GET[id]'");
  }
  echo "<script>alert('Data Berhasil Dihapus'); window.location = '../../media.php?hal=data-suratmasuk'</script>";
  mysqli_query($konek, "DELETE  a.*, b.* FROM surat_masuk a JOIN disposisi b ON a.id_surat=b.id_surat WHERE a.id_surat='$_GET[id]'");
  echo "<script>alert('Data Berhasil dihapus'); window.location = '../../media.php?hal=data-suratmasuk'</script>";
} elseif ($act == 'hapus2') {
  $id = $_POST['id'];
  $sql1 = mysqli_query($konek, "SELECT * FROM disposisi WHERE id = '$_GET[id]'");
  $result = mysqli_fetch_array($sql1);
  mysqli_query($konek, "DELETE  FROM  disposisi where id='$_GET[id]'");
  echo "
  <script>alert('Data Berhasil Ditambahkan :)'); window.location = '../../media.php?hal=data-suratmasuk&aksi=detail&id=$result[id_surat]'</script>";
}
// Input 
elseif ($act == 'input') {
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $acak           = rand(1, 99);
  $nama_file_unik = $acak . $nama_file;
  if (!empty($lokasi_file)) {
    UploadSuratmasuk($nama_file_unik);
    $tgl_posting = date('Y-m-d');
    mysqli_query($konek, "INSERT INTO  surat_masuk(pengelola,no_agenda,
                              tgl_terima, tgl_surat, tgl_posting, asal_surat, nomor_surat, perihal,nama_file) 
                              VALUES('$_POST[pengelola]','$_POST[no_agenda]', '$_POST[tgl_terima]', '$_POST[tgl_surat]', '$tgl_posting','$_POST[asal_surat]', '$_POST[nomor_surat]', '$_POST[perihal]','$nama_file_unik')");
  } else {
    $tgl_posting = date('Y-m-d');
    mysqli_query($konek, "INSERT INTO surat_masuk(pengelola,no_agenda,
                                    tgl_terima, tgl_surat, tgl_posting, asal_surat, nomor_surat, perihal) 
                            VALUES('$_POST[pengelola]','$_POST[no_agenda]', '$_POST[tgl_terima]', '$_POST[tgl_surat]','$tgl_posting', '$_POST[asal_surat]', '$_POST[nomor_surat]', '$_POST[perihal]')");
  }
  echo "
  <script>alert('Data Berhasil Ditambahkan'); window.location = '../../media.php?hal=data-suratmasuk'</script>";
}
// Update 
elseif ($act == 'update') {
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $acak           = rand(1, 99);
  $nama_file_unik = $acak . $nama_file;
  $tgl_posting = date('Y-m-d');
  if (empty($lokasi_file)) {
    mysqli_query($konek, "UPDATE surat_masuk SET  pengelola='$_POST[pengelola]',no_agenda='$_POST[no_agenda]', asal_surat  = '$_POST[asal_surat]', tgl_surat = '$_POST[tgl_surat]', tgl_terima= '$_POST[tgl_terima]', nomor_surat= '$_POST[nomor_surat]', perihal= '$_POST[perihal]', tgl_posting='$tgl_posting'
                             WHERE id_surat   = '$_POST[id]'");
  } else {
    UploadSuratmasuk($nama_file_unik);
    mysqli_query($konek, "UPDATE surat_masuk SET   pengelola='$_POST[pengelola]',no_agenda='$_POST[no_agenda]',asal_surat  = '$_POST[asal_surat]', tgl_surat = '$_POST[tgl_surat]', tgl_terima= '$_POST[tgl_terima]', nomor_surat= '$_POST[nomor_surat]', perihal= '$_POST[perihal]', tgl_posting='$tgl_posting', nama_file= '$nama_file_unik'  WHERE id_surat   = '$_POST[id]'");
  }
  echo "
  <script>alert('Data Berhasil Diedit'); window.location = '../../media.php?hal=data-suratmasuk'</script>";
}
//disposisi
elseif ($act == 'disposisi') {
  $tgl_dibuat = date('Y-m-d');
  $id_unitPengelola = $_POST['id_unitPengelola'];
  $admin = $_POST['admin'];
  foreach ($admin as $value) {
    mysqli_query($konek, "INSERT INTO disposisi(id_surat,sifat_surat,id_admin,tgl_dibuat,id_unitPengelola) 
        VALUES('$_POST[id]', '$_POST[sifat_surat]','$value[admin]','$tgl_dibuat','$id_unitPengelola')");
  }
  echo "
  <script>alert('Data Berhasil Ditambahkan'); window.location = '../../media.php?hal=data-suratmasuk'</script>";
} elseif ($act == 'update2') {
  $tgl_isi = date('Y-m-d');
  mysqli_query($konek, "UPDATE disposisi SET  isi_disposisi  = '$_POST[isi_disposisi]', tgl_isi='$tgl_isi'
                             WHERE id_disposisi   = '$_POST[id]'");
  echo "
  <script>alert('Data Berhasil Ditambahkan'); window.location = '../../media.php?hal=data-suratmasuk'</script>";
}
