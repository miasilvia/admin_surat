<?php
    include "../../../config/koneksi.php";

  
    $id = $_POST['id'];
    $isi_disposisi = $_POST['isi_disposisi'];
    $tgl_isi=date('Y-m-d');
 $sql1 = mysql_query("SELECT * FROM disposisi WHERE id = $id");
     $result = mysql_fetch_array($sql1);

    $sql = mysql_query("UPDATE disposisi SET isi_disposisi = '$isi_disposisi', tgl_isi='$tgl_isi' WHERE id=$id");

    if ($sql) {
        //jika  berhasil tampil ini
       header("location:../../media.php?unit=data-suratmasuk&aksi=detail&id=$result[id_surat]");
        
    } else {
        // jika gagal tampil ini
        echo "Gagal Melakukan Perubahan: ";
    }



   
?>