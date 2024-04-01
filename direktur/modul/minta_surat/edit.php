<?php
include "../../../config/koneksi.php";

include "../../../config/fungsi_thumb.php";
$id = $_POST['id_permintaan'];
$lokasi_file = $_FILES['fupload']['tmp_name'];
$file_finish  = $_FILES['fupload']['name'];
$acak           = rand(1, 99);
$nama_file_unik = $acak . $file_finish;
UploadSuratkeluar($nama_file_unik);
$sql = mysqli_query($konek, "UPDATE permintaan SET file_finish= '$nama_file_unik' WHERE id_permintaan=$id");
if ($sql) {
  //jika  berhasil tampil ini
  header("location:../../media.php?dir=minta-surat");
} else {
  // jika gagal tampil ini
  echo "Gagal Melakukan Perubahan: ";
}
