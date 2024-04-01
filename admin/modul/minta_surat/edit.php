<?php
    include "../../../config/koneksi.php";

  include "../../../config/fungsi_thumb.php";
    $id = $_POST['id_permintaan'];
    $lokasi_file = $_FILES['fupload']['tmp_name'];
  $balasan_admin  = $_FILES['fupload']['name'];
    $acak           = rand(1,99);
  $nama_file_unik = $acak.$balasan_admin;
   UploadMintasurat($nama_file_unik);
    $sql = mysqlI_query($konek,"UPDATE permintaan SET balasan_admin= '$nama_file_unik' WHERE id_permintaan=$id");
    if ($sql) {
        //jika  berhasil tampil ini
        echo"
  <script>alert('Data Berhasil Dikirim'); window.location = '../../media.php?hal=minta-surat'</script>";
 
             
    } else {
        // jika gagal tampil ini
        echo "Gagal Melakukan Perubahan: ";
    }
?>