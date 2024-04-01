<?php
include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb.php";

$act = $_GET["act"];


// Hapus 


// Input 
if ($act == 'input') {


  mysqli_query($konek, "INSERT INTO nomor_surat(tgl_minta, tgl_surat,  no_urut, pengajuan, id_perihal,tahun,perihal) 
                            VALUES('$_POST[tgl_minta]','$_POST[tgl_surat]', '$_POST[no_urut]', '$_POST[pengajuan]', '$_POST[id_perihal]', '$_POST[tahun]' ,'$_POST[perihal]')");

  header('location:../../media.php?hal=nomor-surat');
}

//

elseif ($act == 'input2') {

  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $acak           = rand(1, 99);
  $nama_file_unik = $acak . $nama_file;
  if (!empty($lokasi_file)) {
    UploadSuratkeluar($nama_file_unik);
    $tgl_posting = date('Y-m-d');
    mysqli_query($konek, "INSERT INTO surat_keluar(id_nomor,tgl_minta, tgl_surat,  no_urut, pengajuan, id_perihal,tahun,perihal,nama_file,tgl_posting,ditujukan,id_unitPengelola) 
                            VALUES('$_POST[id_nomor]','$_POST[tgl_minta]','$_POST[tgl_surat]', '$_POST[no_urut]', '$_POST[pengajuan]', '$_POST[id_perihal]', '$_POST[tahun]' ,'$_POST[perihal]','$nama_file_unik','$tgl_posting','$_POST[ditujukan]','$_POST[id_unitPengelola]')");
  } else {
    $tgl_posting = date('Y-m-d');
    mysqli_query($konek, "INSERT INTO surat_keluar(id_nomor,tgl_minta, tgl_surat,  no_urut, pengajuan, id_perihal,tahun,perihal,tgl_posting,ditujukan,id_unitPengelola) 
                            VALUES('$_POST[id_nomor]','$_POST[tgl_minta]','$_POST[tgl_surat]', '$_POST[no_urut]', '$_POST[pengajuan]', '$_POST[id_perihal]', '$_POST[tahun]' ,'$_POST[perihal]','$tgl_posting','$_POST[ditujukan]','$_POST[id_unitPengelola]')");
  }
  echo "
  <script>alert('Data Berhasil diinputkan'); window.location = '../../media.php?hal=nomor-surat'</script>";
} elseif ($act == 'update') {
  $tgl_posting = date('Y-m-d');
  mysqli_query($konek, "UPDATE  nomor_surat a JOIN surat_keluar b ON a.id_nomor=b.id_nomor SET  a.tgl_minta  = '$_POST[tgl_minta]',b.tgl_minta  = '$_POST[tgl_minta]', a.tgl_surat = '$_POST[tgl_surat]', b.tgl_surat = '$_POST[tgl_surat]', a.no_urut= '$_POST[no_urut]', b.no_urut= '$_POST[no_urut]', a.pengajuan= '$_POST[pengajuan]', b.pengajuan= '$_POST[pengajuan]', a.id_perihal= '$_POST[id_perihal]', b.id_perihal= '$_POST[id_perihal]', a.tahun='$_POST[tahun]',
      b.tahun='$_POST[tahun]', a.perihal='$_POST[perihal]', b.perihal='$_POST[perihal]' WHERE a.id_nomor   = '$_POST[id]'");

  mysqli_query($konek, "UPDATE  nomor_surat  SET  tgl_minta  = '$_POST[tgl_minta]',  tgl_surat = '$_POST[tgl_surat]', no_urut= '$_POST[no_urut]',  pengajuan= '$_POST[pengajuan]', id_perihal= '$_POST[id_perihal]', tahun='$_POST[tahun]', perihal='$_POST[perihal]' WHERE id_nomor   = '$_POST[id]'");
  echo "
  <script>alert('Data Berhasil diedit'); window.location = '../../media.php?hal=nomor-surat'</script>";
}
