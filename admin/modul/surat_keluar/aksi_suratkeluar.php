<?php
include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb.php";

$act = $_GET["act"];


// Hapus 
if ($act == 'hapus') {


  mysqli_query($konek, "DELETE  FROM  surat_keluar where id_nomor='$_GET[id]'");
  echo "
  <script>alert('Data Berhasil dihapus'); window.location = '../../media.php?hal=data-suratkeluar'</script>";
}

// Input 
elseif ($act == 'input') {


  mysqli_query($konek, "INSERT INTO nomor_surat(tgl_minta, tgl_surat,  no_urut, pengajuan, id_perihal,tahun,perihal) 
                            VALUES('$_POST[tgl_minta]','$_POST[tgl_surat]', '$_POST[no_urut]', '$_POST[pengajuan]', '$_POST[id_perihal]', '$_POST[tahun]' ,'$_POST[perihal]')");
  echo "
  <script>alert('Data Berhasil diinputkan'); window.location = '../../media.php?hal=nomor-surat'</script>";
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

  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $acak           = rand(1, 99);
  $nama_file_unik = $acak . $nama_file;
  if (!empty($lokasi_file)) {
    UploadSuratkeluar($nama_file_unik);
    $tgl_posting = date('Y-m-d');



    mysqli_query($konek, "UPDATE  surat_keluar a JOIN nomor_surat b ON a.id_nomor=b.id_nomor SET  a.tgl_minta  = '$_POST[tgl_minta]',b.tgl_minta  = '$_POST[tgl_minta]', a.tgl_surat = '$_POST[tgl_surat]', b.tgl_surat = '$_POST[tgl_surat]', a.no_urut= '$_POST[no_urut]', b.no_urut= '$_POST[no_urut]', a.pengajuan= '$_POST[pengajuan]', b.pengajuan= '$_POST[pengajuan]', a.id_perihal= '$_POST[id_perihal]', b.id_perihal= '$_POST[id_perihal]', a.tahun='$_POST[tahun]',
      b.tahun='$_POST[tahun]', a.perihal='$_POST[perihal]', b.perihal='$_POST[perihal]',  a.nama_file='$nama_file_unik', a.tgl_posting='$tgl_posting', a.ditujukan='$_POST[ditujukan]', a.id_unitPengelola='$_POST[id_unitPengelola]'
                             WHERE a.id_nomor   = '$_POST[id]'");
  } else {
    $tgl_posting = date('Y-m-d');
    mysqli_query($konek, "UPDATE   surat_keluar a JOIN nomor_surat b ON a.id_nomor=b.id_nomor SET  a.tgl_minta  = '$_POST[tgl_minta]',b.tgl_minta  = '$_POST[tgl_minta]', a.tgl_surat = '$_POST[tgl_surat]', b.tgl_surat = '$_POST[tgl_surat]', a.no_urut= '$_POST[no_urut]', b.no_urut= '$_POST[no_urut]', a.pengajuan= '$_POST[pengajuan]', b.pengajuan= '$_POST[pengajuan]', a.id_perihal= '$_POST[id_perihal]', b.id_perihal= '$_POST[id_perihal]', a.tahun='$_POST[tahun]',
      b.tahun='$_POST[tahun]', a.perihal='$_POST[perihal]', b.perihal='$_POST[perihal]', a.tgl_posting='$tgl_posting', a.ditujukan='$_POST[ditujukan]', id_unitPengelola='$_POST[id_unitPengelola]'
                             WHERE a.id_nomor   = '$_POST[id]'");
  }
  echo "
  <script>alert('Data Berhasil diedit'); window.location = '../../media.php?hal=data-suratkeluar'</script>";
}
