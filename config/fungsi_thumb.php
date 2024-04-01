<?php
function UploadImage($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../foto_produk/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli  
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi medium 233 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = 233;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  if ($_FILES["fupload"]["type"]=="image/jpeg" ){
    imagejpeg($im,$vdir_upload . "medium_" . $fupload_name);
    }
  elseif ($_FILES["fupload"]["type"]=="image/png" ){
    imagepng($im,$vdir_upload . "medium_" . $fupload_name);
    }
  elseif ($_FILES["fupload"]["type"]=="image/gif" ){
    imagegif($im,$vdir_upload . "medium_" . $fupload_name);
    }
  elseif($_FILES["fupload"]["type"]=="image/wbmp" ){
    imagewbmp($im,$vdir_upload . "medium_" . $fupload_name);
    }

  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = 110;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  if ($_FILES["fupload"]["type"]=="image/jpeg" ){
    imagejpeg($im,$vdir_upload . "small_" . $fupload_name);
    }
  elseif ($_FILES["fupload"]["type"]=="image/png" ){
    imagepng($im,$vdir_upload . "small_" . $fupload_name);
    }
  elseif ($_FILES["fupload"]["type"]=="image/gif" ){
    imagegif($im,$vdir_upload . "small_" . $fupload_name);
    }
  elseif($_FILES["fupload"]["type"]=="image/wbmp" ){
    imagewbmp($im,$vdir_upload . "small_" . $fupload_name);
    }
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}


function UploadHeader($fupload_name){
  //direktori Header
  $vdir_upload = "../../../img/ph/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}

function UploadDownload($fupload_name){
  //direktori banner
  $vdir_upload = "../../../foto_download/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}
function UploadSuratmasuk($fupload_name){
  //direktori banner
  $vdir_upload = "../../../file_suratmasuk/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}
function UploadSuratKeputusan($fupload_name){
  //direktori banner
  $vdir_upload = "../../../file_suratKeputusan/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}
function UploadArsipsurat($fupload_name){
  //direktori banner
  $vdir_upload = "../../../file_arsipsuratmasuk/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}
function UploadSuratkeluar($fupload_name){
  //direktori banner
  $vdir_upload = "../../../file_suratkeluar/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}
function UploadMintasurat($fupload_name){
  //direktori banner
  $vdir_upload = "../../../file_permintaan/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}

function UploadBackground($fupload_name){
  //direktori banner
  $vdir_upload = "../../../foto_background/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}

function UploadFile($fupload_name){
  //direktori file
  $vdir_upload = "../../../files/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}






?>
