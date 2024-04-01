<?php
//CETAK DATA KECAMATAN
error_reporting(0);

isset($_POST['cetak9']);
/**
 * digunakan untuk generate file excel.
 * 
 * @author 		: Mia Silvia
 * @copyright 	: miasilvia132@gmail.com
 * @license 	: LGPLv2
 * @database 	: - 
 * @since		: 31 Agust 2017
 * @version		: 1.0.0
 * 
 * */
require_once "../../excel/classes/PHPExcel.php";
/*start - BLOCK PROPERTIES FILE EXCEL*/
$file = new PHPExcel();
$file->getProperties()->setTitle("Agenda Surat Keluar");
$file->getProperties()->setSubject("Agenda Surat Keluar");
$file->getProperties()->setDescription("Agenda Surat Keluar");
$file->getProperties()->setKeywords("Agenda Surat Keluar");
$file->getProperties()->setCategory("Agenda Surat Keluar");
/*end - BLOCK PROPERTIES FILE EXCEL*/

/*start - BLOCK SETUP SHEET*/
$file->createSheet(NULL, 0);

$sheet = $file->getActiveSheet(0);

//memberikan title pada sheet
$sheet->setTitle("Agenda Surat Masuk");
/*end - BLOCK SETUP SHEET*/

/*start - BLOCK HEADER*/
$sheet->setCellValue("A1", "LAPORAN SURAT KELUAR"); // Set kolom A1 dengan tulisan "DATA SISWA"
$sheet->mergeCells("A1:G1"); // Set Merge Cell pada kolom A1 sampai F1
$sheet->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
$sheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // rata tengah
$sheet->setCellValue("A2", "POLITEKNIK NEGERI INDRAMAYU"); // Set kolom A1 dengan tulisan "DATA SISWA"
$sheet->mergeCells("A2:G2"); // Set Merge Cell pada kolom A1 sampai F1
$sheet->getStyle('A2')->getFont()->setBold(TRUE); // Set bold kolom A1
//$sheet->getStyle('A1:A2')->getFont()->setName('Times new roman'); // Set font style 
$sheet->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // rata tengah

$sheet->setCellValue("A4", "NO AGENDA")
	->setCellValue("B4", "TANGGAL")
	->setCellValue("C4", "DITUJUKAN KEPADA")
	->setCellValue("D4", "NOMOR SURAT")
	->setCellValue("E4", "TANGGAL SURAT")
	->setCellValue("F4", "PERIHAL")
	->setCellValue("G4", "UNIT PENGELOLA");
$sheet->getStyle('A4:G4')->getFont()->setBold(TRUE); // Set bold kolom A1

/*end - BLOCK HEADER*/

/*start - BLOCK UNTUK BORDER*/
$thick = array();
$thick['borders'] = array();
$thick['borders']['allborders'] = array();
$thick['borders']['allborders']['style'] = PHPExcel_Style_Border::BORDER_THIN;
$sheet->getStyle('A4:G4')->applyFromArray($thick);

/* start - BLOCK MEMASUKAN DATABASE*/
//ganti dengan database anda
include '../../../config/koneksi.php';

$Dari = $_POST['Dari'];
$Sampai = $_POST['Sampai'];

$tampil = "SELECT * from surat_keluar sk join kode_perihal kd on sk.id_perihal=kd.id_perihal JOIN unit_pengelola up on sk.id_unitPengelola=up.id_unitPengelola  WHERE (tgl_posting BETWEEN '$Dari' AND '$Sampai');";
$sql = mysqli_query($konek, $tampil);


$nomor = 4;

while ($row = mysqli_fetch_array($sql)) {
	$no++;
	$tgl_surat = $row["tgl_surat"];
	$tgl_posting = $row["tgl_posting"];
	$format_tglsurat = date('d F Y', strtotime($tgl_surat));
	$format_tglposting = date('d F Y', strtotime($tgl_posting));
	$kode2 = $row['no_urut'];
	if ($kode2 < 10) {
		$kode = '000' . $kode2;
	} elseif ($kode2 > 9 && $kode2 <= 99) {
		$kode = '00' . $kode2;
	} else {
		$kode = '00' . $kode2;
	}
	$nomor_surat = $kode . '/'  . $row['pengajuan'] . '/' . $row['kode_perihal'] . '/' . $row['tahun'];

	$nomor++;
	$sheet->setCellValue("A" . $nomor, $no)
		->setCellValue("B" . $nomor, $format_tglposting)
		->setCellValue("C" . $nomor, $row["ditujukan"])
		->setCellValue("D" . $nomor, $nomor_surat)
		->setCellValue("E" . $nomor, $format_tglsurat)
		->setCellValue("F" . $nomor, $row["perihal"])
		->setCellValue("G" . $nomor, $row["unit_pengelola"]);

	/* end - BLOCK MEMASUKAN DATABASE*/

	$thin = array();
	$thin['borders'] = array();
	$thin['borders']['allborders'] = array();
	$thin['borders']['allborders']['style'] = PHPExcel_Style_Border::BORDER_THIN;
	$sheet->getStyle('A' . $nomor)->applyFromArray($thin);
	$sheet->getStyle('B' . $nomor)->applyFromArray($thin);
	$sheet->getStyle('C' . $nomor)->applyFromArray($thin);
	$sheet->getStyle('D' . $nomor)->applyFromArray($thin);
	$sheet->getStyle('E' . $nomor)->applyFromArray($thin);
	$sheet->getStyle('F' . $nomor)->applyFromArray($thin);
	$sheet->getStyle('G' . $nomor)->applyFromArray($thin);

	/*end - BLOCK UNTUK BORDER databasenya*/
}
/*start - BLOK AUTOSIZE*/
$sheet->getColumnDimension("A")->setAutoSize(true);
$sheet->getColumnDimension("B")->setAutoSize(true);
$sheet->getColumnDimension("C")->setAutoSize(true);
$sheet->getColumnDimension("D")->setAutoSize(true);
$sheet->getColumnDimension("E")->setAutoSize(true);
$sheet->getColumnDimension("F")->setAutoSize(true);
$sheet->getColumnDimension("G")->setAutoSize(true);

/*end - BLOG AUTOSIZE*/

/* start - BLOCK MEMBUAT LINK DOWNLOAD*/
header('Content-Type: application/vnd.ms-excel');
//namanya adalah keluarga.xls
header('Content-Disposition: attachment;filename="Arsip Surat Keluar.xls"');
header('Cache-Control: max-age=0');
$writer = PHPExcel_IOFactory::createWriter($file, 'Excel5');
$writer->save('php://output');
/* start - BLOCK MEMBUAT LINK DOWNLOAD*/
//CETAK DATA PENDUDUK
/*end yaaa endddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd*/


//CETAK DATA JENIS KELAMIN
