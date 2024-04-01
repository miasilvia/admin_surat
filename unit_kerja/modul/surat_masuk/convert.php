<?php
// menyertakan autoloader

require_once '../../dompdf/dompdf_config.inc.php';
include '../../../config/koneksi.php';


$detaill = mysql_query("SELECT * FROM surat_masuk WHERE id_surat='".$_GET['id']."'");
    $rr    = mysql_fetch_array($detaill);
 $detail = mysql_query("SELECT * FROM surat_masuk, disposisi WHERE disposisi.id_surat=surat_masuk.id_surat AND disposisi.id_surat='$_GET[id]'");
    $r    = mysql_fetch_array($detail);

$kode2=$rr['no_agenda'];

if($kode2<10){
  $kode='000'.$kode2;
}elseif($kode2 > 9 && $kode2 <=99){
  $kode='00'.$kode2;
}else{
  $kode='0'.$kode2;
}

$tgl_terima=$rr['tgl_terima'];
$tgl_surat=$rr['tgl_surat'];
$nomor_surat=$rr['nomor_surat'];
$asal_surat=$rr['asal_surat'];
$perihal=$rr['perihal'];
$sifat_surat=$r['sifat_surat'];

$format = date('d F Y', strtotime($tgl_terima));
$format2 = date('d F Y', strtotime($tgl_surat ));

$html = 
'<html>   
<head>
<link rel="stylesheet" href="style.css">
</head>
<body><pre>'.
'<center><img  src="../header.png"></center>'.

'<font size="2" face="times new roman" >'.
'<table width="550px"  class="table1">
<tr> 
<td> Nomor Agenda : '.'  '. $kode. '</td>'. 
'<td> Tanggal Terima :'.'  '. $format. '</td>'. 

'</tr>'.
'<tr> '.
'<td> Tanggal Surat   :'.'  '. $format2. ' </td>'. 
'<td> Nomor Surat      :'.'  '. $nomor_surat. '</td>'.
'</tr>'.

'<tr > '.

'<td colspan="2"> Asal Surat         :'.'  '. $asal_surat. '</td>'.

'</tr>'.
'<tr > '.

'<td colspan="2"> Perihal              :'.'  '. $perihal.'</td>'.

'</tr>'.
'<tr > '.

'<td colspan="2"> Sifat Surat        :'.'  '. $sifat_surat.' </td>'.

'</tr>'.
'<tr> '.
'<th>DITERUSKAN KEPADA </th>'. 
'<th>ISI DISPOSISI</th>'.
'</tr>';

$detail2 = mysql_query("SELECT * FROM surat_masuk, disposisi WHERE disposisi.id_surat=surat_masuk.id_surat AND disposisi.id_surat='$_GET[id]'");
while($r2 = mysql_fetch_array($detail2)){ 
                         $admin=mysql_query("SELECT * FROM admin WHERE id_admin='$r2[id_admin]'");
                        $p4=mysql_fetch_array($admin);
                        $nama_lengkap=$p4['nama_lengkap'];
                        $isi_disposisi=$r2['isi_disposisi'];
                        $tgl_isi=$r2['tgl_isi'];

$html .= 

'<tr>'. 



'<td>'.$nama_lengkap.' </td>'. 
'<td>'.$isi_disposisi.'</td>'.
'</tr>';
}

'</table>'.
'</font>'.



'</body></html>';
// mengacu ke namespace DOMPDF


// menggunakan class dompdf

$dompdf = new Dompdf();


$dompdf->load_Html($html);

// (Opsional) Mengatur ukuran kertas dan orientasi kertas


// Menjadikan HTML sebagai PDF
$dompdf->render();

// Output akan menghasilkan PDF (1 = download dan 0 = preview)
$dompdf->stream("Data.pdf",array("Attachment"=>0));
$dompdf->clear();
?>