<?php
include "../../../config/koneksi.php";


$id = $_POST['id'];
$isi_disposisi = $_POST['isi_disposisi'];
$tgl_isi = date('Y-m-d');
$sql1 = mysqli_query($konek, "SELECT * FROM disposisi WHERE id = $id");
$result = mysqli_fetch_array($sql1);

$sql = mysqli_query($konek, "UPDATE disposisi SET isi_disposisi = '$isi_disposisi', tgl_isi='$tgl_isi' WHERE id=$id");

if ($sql) {
    //jika  berhasil tampil ini
    echo "
  <script>alert('Data Berhasil diinputkan'); window.location = '../../media.php?hal=data-suratmasuk&aksi=detail&id=$result[id_surat]'</script>";
} else {
    // jika gagal tampil ini
    echo "Gagal Melakukan Perubahan: ";
}
