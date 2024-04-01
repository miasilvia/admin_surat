<?php

include("../config/koneksi.php ");
$act = $_GET['act'];

//download surat keluar
if ($act == 'surat-keluar') {

  $direktori   = "../file_suratkeluar/";
  $id          = $_GET['id'];
  $paid        = mysqli_fetch_array(mysqli_query($konek, "SELECT * From surat_keluar Where id_nomor='$id'"));
  $filename   = $paid['nama_file'];
  if (file_exists($direktori . $filename)) {
    $file_extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    switch ($file_extension) {
      case "pdf":
        $ctype = "application/pdf";
        break;
      case "exe":
        $ctype = "application/octet-stream";
        break;
      case "zip":
        $ctype = "application/zip";
        break;
      case "rar":
        $ctype = "application/rar";
        break;
      case "doc":
        $ctype = "application/msword";
        break;
      case "xls":
        $ctype = "application/vnd.ms-excel";
        break;
      case "ppt":
        $ctype = "application/vnd.ms-powerpoint";
        break;
      case "gif":
        $ctype = "image/gif";
        break;
      case "png":
        $ctype = "image/png";
        break;
      case "jpeg":
      case "jpg":
        $ctype = "image/jpg";
        break;
      default:
        $ctype = "application/octet-stream";
    }
    if ($file_extension == 'php') {
      echo "<h1>Access forbidden!</h1>";
      exit();
    } else {
      header("Content-Type: octet/stream");
      header("Pragma: private");
      header("Expires: 0");
      header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
      header("Cache-Control: private", false);
      header("Content-Type: $ctype");
      header("Content-Disposition: attachment; filename=\"" . basename($filename) . "\";");
      header("Content-Transfer-Encoding: binary");
      header("Content-Length: " . filesize($direktori . $filename));
      readfile("$direktori$filename");
      exit();
    }
  } else {
    echo "<h1>Access forbidden!</h1>";
    exit();
  }
}
//download permintaan--
elseif ($act == 'minta-surat') {
  $direktori  = "../file_suratkeluar/";
  $id         = $_GET['id'];
  $paid       = mysqli_fetch_array(mysqli_query($konek, "SELECT * From permintaan Where id_permintaan='$id'"));
  $filename   = $paid['file_finish'];
  if (file_exists($direktori . $filename)) {
    $file_extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    switch ($file_extension) {
      case "pdf":
        $ctype = "application/pdf";
        break;
      case "exe":
        $ctype = "application/octet-stream";
        break;
      case "zip":
        $ctype = "application/zip";
        break;
      case "rar":
        $ctype = "application/rar";
        break;
      case "doc":
        $ctype = "application/msword";
        break;
      case "xls":
        $ctype = "application/vnd.ms-excel";
        break;
      case "ppt":
        $ctype = "application/vnd.ms-powerpoint";
        break;
      case "gif":
        $ctype = "image/gif";
        break;
      case "png":
        $ctype = "image/png";
        break;
      case "jpeg":
      case "jpg":
        $ctype = "image/jpg";
        break;
      default:
        $ctype = "application/octet-stream";
    }
    if ($file_extension == 'php') {
      echo "<h1>Access forbidden!</h1>";
      exit();
    } else {
      header("Content-Type: octet/stream");
      header("Pragma: private");
      header("Expires: 0");
      header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
      header("Cache-Control: private", false);
      header("Content-Type: $ctype");
      header("Content-Disposition: attachment; filename=\"" . basename($filename) . "\";");
      header("Content-Transfer-Encoding: binary");
      header("Content-Length: " . filesize($direktori . $filename));
      readfile("$direktori$filename");
      exit();
    }
  } else {
    echo "<h1>Access forbidden!</h1>";
    exit();
  }
} elseif ($act == 'surat-keputusan') {
  $direktori  = "../file_suratKeputusan/";
  $id         = $_GET['id'];
  $paid       = mysqli_fetch_array(mysqli_query($konek, "Select * From surat_keputusan Where id_surat='$id'"));
  $filename   = $paid['nama_file'];
  if (file_exists($direktori . $filename)) {
    $file_extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    switch ($file_extension) {
      case "pdf":
        $ctype = "application/pdf";
        break;
      case "exe":
        $ctype = "application/octet-stream";
        break;
      case "zip":
        $ctype = "application/zip";
        break;
      case "rar":
        $ctype = "application/rar";
        break;
      case "doc":
        $ctype = "application/msword";
        break;
      case "xls":
        $ctype = "application/vnd.ms-excel";
        break;
      case "ppt":
        $ctype = "application/vnd.ms-powerpoint";
        break;
      case "gif":
        $ctype = "image/gif";
        break;
      case "png":
        $ctype = "image/png";
        break;
      case "jpeg":
      case "jpg":
        $ctype = "image/jpg";
        break;
      default:
        $ctype = "application/octet-stream";
    }
    if ($file_extension == 'php') {
      echo "<h1>Access forbidden!</h1>";
      exit();
    } else {
      header("Content-Type: octet/stream");
      header("Pragma: private");
      header("Expires: 0");
      header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
      header("Cache-Control: private", false);
      header("Content-Type: $ctype");
      header("Content-Disposition: attachment; filename=\"" . basename($filename) . "\";");
      header("Content-Transfer-Encoding: binary");
      header("Content-Length: " . filesize($direktori . $filename));
      readfile("$direktori$filename");
      exit();
    }
  } else {
    echo "<h1>Access forbidden!</h1>";
    exit();
  }
}
//download surat masuk arsip
elseif ($act == 'arsip-suratmasuk') {
  $direktori  = "../file_arsipsuratmasuk/";
  $id         = $_GET['id'];
  $paid       = mysqli_fetch_array(mysqli_query($konek, "SELECT * From arsip_suratmasuk Where id_surat='$id'"));
  $filename   = $paid['nama_file'];
  if (file_exists($direktori . $filename)) {
    $file_extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    switch ($file_extension) {
      case "pdf":
        $ctype = "application/pdf";
        break;
      case "exe":
        $ctype = "application/octet-stream";
        break;
      case "zip":
        $ctype = "application/zip";
        break;
      case "rar":
        $ctype = "application/rar";
        break;
      case "doc":
        $ctype = "application/msword";
        break;
      case "xls":
        $ctype = "application/vnd.ms-excel";
        break;
      case "ppt":
        $ctype = "application/vnd.ms-powerpoint";
        break;
      case "gif":
        $ctype = "image/gif";
        break;
      case "png":
        $ctype = "image/png";
        break;
      case "jpeg":
      case "jpg":
        $ctype = "image/jpg";
        break;
      default:
        $ctype = "application/octet-stream";
    }
    if ($file_extension == 'php') {
      echo "<h1>Access forbidden!</h1>";
      exit();
    } else {
      header("Content-Type: octet/stream");
      header("Pragma: private");
      header("Expires: 0");
      header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
      header("Cache-Control: private", false);
      header("Content-Type: $ctype");
      header("Content-Disposition: attachment; filename=\"" . basename($filename) . "\";");
      header("Content-Transfer-Encoding: binary");
      header("Content-Length: " . filesize($direktori . $filename));
      readfile("$direktori$filename");
      exit();
    }
  } else {
    echo "<h1>Access forbidden!</h1>";
    exit();
  }
}

//download surat masuk
elseif ($act == 'surat-masuk') {
  $direktori  = "../file_suratmasuk/";
  $id         = $_GET['id'];
  $paid       = mysqli_fetch_array(mysqli_query($konek, "SELECT * From surat_masuk Where id_surat='$id'"));
  $filename   = $paid['nama_file'];
  if (file_exists($direktori . $filename)) {
    $file_extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    switch ($file_extension) {
      case "pdf":
        $ctype = "application/pdf";
        break;
      case "exe":
        $ctype = "application/octet-stream";
        break;
      case "zip":
        $ctype = "application/zip";
        break;
      case "rar":
        $ctype = "application/rar";
        break;
      case "doc":
        $ctype = "application/msword";
        break;
      case "xls":
        $ctype = "application/vnd.ms-excel";
        break;
      case "ppt":
        $ctype = "application/vnd.ms-powerpoint";
        break;
      case "gif":
        $ctype = "image/gif";
        break;
      case "png":
        $ctype = "image/png";
        break;
      case "jpeg":
      case "jpg":
        $ctype = "image/jpg";
        break;
      default:
        $ctype = "application/octet-stream";
    }
    if ($file_extension == 'php') {
      echo "<h1>Access forbidden!</h1>";
      exit();
    } else {
      header("Content-Type: octet/stream");
      header("Pragma: private");
      header("Expires: 0");
      header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
      header("Cache-Control: private", false);
      header("Content-Type: $ctype");
      header("Content-Disposition: attachment; filename=\"" . basename($filename) . "\";");
      header("Content-Transfer-Encoding: binary");
      header("Content-Length: " . filesize($direktori . $filename));
      readfile("$direktori$filename");
      exit();
    }
  } else {
    echo "<h1>Access forbidden!</h1>";
    exit();
  }
}
