<?php
include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb.php";

$act = $_GET["act"];

// Hapus banner
// Hapus 
$act == 'disposisi';
$tgl_dibuat = date('Y-m-d');
$id_unitPengelola = $_POST['id_unitPengelola'];
$admin = $_POST['admin'];
foreach ($admin as $value) {
  mysqli_query($konek, "INSERT INTO disposisi(id_surat,
        sifat_surat,id_admin,tgl_dibuat,id_unitPengelola) 
        VALUES('$_POST[id]', '$_POST[sifat_surat]','$value[admin]','$tgl_dibuat',$id_unitPengelola)");
}

header('location:../../media.php?dir=data-suratmasuk');
