<?php
include "../../../config/koneksi.php";

$id = $_POST['id'];
$isi_disposisi = $_POST['isi_disposisi'];
$tgl_isi = date('Y-m-d');
$sql = mysqli_query($konek, "UPDATE disposisi SET isi_disposisi = '$isi_disposisi', tgl_isi='$tgl_isi' WHERE id=$id");
if ($sql) {
    //jika  berhasil tampil ini
    echo "<input TYPE='button' VALUE='Back' onClick='history.go(-1);'>";
} else {
    // jika gagal tampil ini
    echo "Gagal Melakukan Perubahan: ";
}
