<?php
//CETAK DATA KECAMATAN
error_reporting(0);

if (isset($_POST['cetak2'])) {
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
	$file->getProperties()->setTitle("Agenda Surat Masuk");
	$file->getProperties()->setSubject("Inheritance Penduduk");
	$file->getProperties()->setDescription("Data Inheritance Penduduk");
	$file->getProperties()->setKeywords("Penduduk Kecamatan");
	$file->getProperties()->setCategory("Penduduk");
	/*end - BLOCK PROPERTIES FILE EXCEL*/

	/*start - BLOCK SETUP SHEET*/
	$file->createSheet(NULL, 0);

	$sheet = $file->getActiveSheet(0);

	//memberikan title pada sheet
	$sheet->setTitle("Agenda Surat Masuk");
	/*end - BLOCK SETUP SHEET*/

	/*start - BLOCK HEADER*/
	$sheet->setCellValue("A1", "AGENDA SURAT MASUK DIREKSI"); // Set kolom A1 dengan tulisan "DATA SISWA"
	$sheet->mergeCells("A1:H1"); // Set Merge Cell pada kolom A1 sampai F1
	$sheet->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
	$sheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // rata tengah
	$sheet->setCellValue("A2", "POLITEKNIK NEGERI INDRAMAYU"); // Set kolom A1 dengan tulisan "DATA SISWA"
	$sheet->mergeCells("A2:H2"); // Set Merge Cell pada kolom A1 sampai F1
	$sheet->getStyle('A2')->getFont()->setBold(TRUE); // Set bold kolom A1
	//$sheet->getStyle('A1:A2')->getFont()->setName('Times new roman'); // Set font style 
	$sheet->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // rata tengah

	$sheet->setCellValue("A4", "NO AGENDA")
		->setCellValue("B4", "TANGGAL TERIMA")
		->setCellValue("C4", "ASAL SURAT")
		->setCellValue("D4", "NOMOR SURAT")
		->setCellValue("E4", "TANGGAL SURAT")
		->setCellValue("F4", "PERIHAL")
		->setCellValue("G4", "PENGELOLA")
		->setCellValue("H4", "NO AGENDA");
	$sheet->getStyle('A4:H4')->getFont()->setBold(TRUE); // Set bold kolom A1

	/*end - BLOCK HEADER*/

	/*start - BLOCK UNTUK BORDER*/
	$thick = array();
	$thick['borders'] = array();
	$thick['borders']['allborders'] = array();
	$thick['borders']['allborders']['style'] = PHPExcel_Style_Border::BORDER_THIN;
	$sheet->getStyle('A4:H4')->applyFromArray($thick);

	/* start - BLOCK MEMASUKAN DATABASE*/
	//ganti dengan database anda
	include '../../../config/koneksi.php';

	$Dari = $_POST['Dari'];
	$Sampai = $_POST['Sampai'];
	$tampil = "SELECT * from surat_masuk WHERE (tgl_terima BETWEEN '$Dari' AND '$Sampai');";
	$sql = mysqli_query($konek, $tampil);


	$nomor = 4;
	while ($row = mysqli_fetch_array($sql)) {
		$tgl_surat = $row["tgl_surat"];
		$tgl_terima = $row["tgl_terima"];
		$format_tglsurat = date('d F Y', strtotime($tgl_surat));
		$format_tglterima = date('d F Y', strtotime($tgl_terima));
		$kode2 = $row['no_agenda'];

		if ($kode2 < 10) {
			$kode = '000' . $kode2;
		} elseif ($kode2 > 9 && $kode2 <= 99) {
			$kode = '00' . $kode2;
		} else {
			$kode = '0' . $kode2;
		}
		$nomor++;
		$sheet->setCellValue("A" . $nomor, $row["no_agenda"])
			->setCellValue("B" . $nomor, $format_tglterima)
			->setCellValue("C" . $nomor, $row["asal_surat"])
			->setCellValue("D" . $nomor, $row["nomor_surat"])
			->setCellValue("E" . $nomor, $format_tglsurat)
			->setCellValue("F" . $nomor, $row["perihal"])
			->setCellValue("G" . $nomor, $row["pengelola"])
			->setCellValue("H" . $nomor, $kode);


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
		$sheet->getStyle('H' . $nomor)->applyFromArray($thin);

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
	$sheet->getColumnDimension("H")->setAutoSize(true);
	/*end - BLOG AUTOSIZE*/

	/* start - BLOCK MEMBUAT LINK DOWNLOAD*/
	header('Content-Type: application/vnd.ms-excel');
	//namanya adalah keluarga.xls
	header('Content-Disposition: attachment;filename="Agenda Surat Masuk.xls"');
	header('Cache-Control: max-age=0');
	$writer = PHPExcel_IOFactory::createWriter($file, 'Excel5');
	$writer->save('php://output');
	/* start - BLOCK MEMBUAT LINK DOWNLOAD*/
	//CETAK DATA PENDUDUK
	/*end yaaa endddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd*/


	//CETAK DATA JENIS KELAMIN
} else if (isset($_POST['cetak3'])) {
	require_once "../../excel/classes/PHPExcel.php";
	/*start - BLOCK PROPERTIES FILE EXCEL*/
	$file = new PHPExcel();
	$file->getProperties()->setTitle("Data Jenis Kelamin");
	$file->getProperties()->setSubject("Inheritance Jenis Kelamin");
	$file->getProperties()->setDescription("Data Inheritance Jenis Kelamin");
	$file->getProperties()->setKeywords("Jenis Kelamin Kecamatan");
	$file->getProperties()->setCategory("Jenis Kelamin");
	/*end - BLOCK PROPERTIES FILE EXCEL*/

	/*start - BLOCK SETUP SHEET*/
	$file->createSheet(NULL, 0);
	$file->setActiveSheetIndex(0);
	$sheet = $file->getActiveSheet(0);
	//memberikan title pada sheet
	$sheet->setTitle("Arsip Surat Masuk");
	/*end - BLOCK SETUP SHEET*/

	$sheet->setCellValue("A1", "ARSIP SURAT MASUK DIREKSI"); // Set kolom A1 dengan tulisan "DATA SISWA"
	$sheet->mergeCells("A1:G1"); // Set Merge Cell pada kolom A1 sampai F1
	$sheet->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
	$sheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // rata tengah
	$sheet->setCellValue("A2", "POLITEKNIK NEGERI INDRAMAYU"); // Set kolom A1 dengan tulisan "DATA SISWA"
	$sheet->mergeCells("A2:G2"); // Set Merge Cell pada kolom A1 sampai F1
	$sheet->getStyle('A2')->getFont()->setBold(TRUE); // Set bold kolom A1
	//$sheet->getStyle('A1:A2')->getFont()->setName('Times new roman'); // Set font style 
	$sheet->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // rata tengah

	/*start - BLOCK HEADER*/
	$sheet->setCellValue("A4", "NO AGENDA")
		->setCellValue("B4", "TANGGAL TERIMA")
		->setCellValue("C4", "ASAL SURAT")
		->setCellValue("D4", "NOMOR SURAT")
		->setCellValue("E4", "TANGGAL SURAT")
		->setCellValue("F4", "PERIHAL")
		->setCellValue("G4", "PENGELOLA");

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
	$tampil = "select * from arsip_suratmasuk WHERE (tgl_terima BETWEEN '$Dari' AND '$Sampai');";
	$sql = mysqli_query($konek, $tampil);


	$nomor = 4;
	while ($row = mysqli_fetch_array($sql)) {
		$no++;
		$tgl_surat = $row["tgl_surat"];
		$tgl_terima = $row["tgl_terima"];
		$format_tglsurat = date('d F Y', strtotime($tgl_surat));
		$format_tglterima = date('d F Y', strtotime($tgl_terima));

		$nomor++;
		$sheet->setCellValue("A" . $nomor, $no)
			->setCellValue("B" . $nomor, $format_tglterima)
			->setCellValue("C" . $nomor, $row["asal_surat"])
			->setCellValue("D" . $nomor, $row["nomor_surat"])
			->setCellValue("E" . $nomor, $format_tglsurat)
			->setCellValue("F" . $nomor, $row["perihal"])
			->setCellValue("G" . $nomor, $row["pengelola"]);

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
	header('Content-Disposition: attachment;filename="Arsip Surat Masuk.xls"');
	header('Cache-Control: max-age=0');
	$writer = PHPExcel_IOFactory::createWriter($file, 'Excel5');
	$writer->save('php://output');
	/* start - BLOCK MEMBUAT LINK DOWNLOAD*/
	// CETAK DATA RUMAH TANGGA
} else if (isset($_POST['cetak4'])) {
	require_once "../../excel/classes/PHPExcel.php";
	/*start - BLOCK PROPERTIES FILE EXCEL*/
	$file = new PHPExcel();
	$file->getProperties()->setTitle("Data Jenis Kelamin");
	$file->getProperties()->setSubject("Inheritance Jenis Kelamin");
	$file->getProperties()->setDescription("Data Inheritance Jenis Kelamin");
	$file->getProperties()->setKeywords("Jenis Kelamin Kecamatan");
	$file->getProperties()->setCategory("Jenis Kelamin");
	/*end - BLOCK PROPERTIES FILE EXCEL*/

	/*start - BLOCK SETUP SHEET*/
	$file->createSheet(NULL, 0);
	$file->setActiveSheetIndex(0);
	$sheet = $file->getActiveSheet(0);
	//memberikan title pada sheet
	$sheet->setTitle("Arsip Surat Masuk");
	/*end - BLOCK SETUP SHEET*/

	$sheet->setCellValue("A1", "ARSIP DISPOSISI SURAT MASUK"); // Set kolom A1 dengan tulisan "DATA SISWA"
	$sheet->mergeCells("A1:G1"); // Set Merge Cell pada kolom A1 sampai F1
	$sheet->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
	$sheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // rata tengah
	$sheet->setCellValue("A2", "POLITEKNIK NEGERI INDRAMAYU"); // Set kolom A1 dengan tulisan "DATA SISWA"
	$sheet->mergeCells("A2:G2"); // Set Merge Cell pada kolom A1 sampai F1
	$sheet->getStyle('A2')->getFont()->setBold(TRUE); // Set bold kolom A1
	//$sheet->getStyle('A1:A2')->getFont()->setName('Times new roman'); // Set font style 
	$sheet->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // rata tengah

	/*start - BLOCK HEADER*/
	$sheet->setCellValue("A4", "NO AGENDA")
		->setCellValue("B4", "TANGGAL TERIMA")
		->setCellValue("C4", "ASAL SURAT")
		->setCellValue("D4", "NOMOR SURAT")
		->setCellValue("E4", "TANGGAL SURAT")
		->setCellValue("F4", "PERIHAL")
		->setCellValue("G4", "PENGELOLA");

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

	$tampil = " SELECT * FROM disposisi inner join surat_masuk on disposisi.id_surat=surat_masuk.id_surat WHERE tgl_terima BETWEEN '$Dari' AND '$Sampai' and disposisi.id_surat NOT IN (SELECT id_surat FROM disposisi WHERE isi_disposisi = '' GROUP BY id_surat) GROUP BY disposisi.id_surat";

	$sql = mysqli_query($konek, $tampil);


	$nomor = 4;
	while ($row = mysqli_fetch_array($sql)) {
		$tgl_surat = $row["tgl_surat"];
		$tgl_terima = $row["tgl_terima"];
		$format_tglsurat = date('d F Y', strtotime($tgl_surat));
		$format_tglterima = date('d F Y', strtotime($tgl_terima));

		$nomor++;
		$sheet->setCellValue("A" . $nomor, $row["no_agenda"])
			->setCellValue("B" . $nomor, $format_tglterima)
			->setCellValue("C" . $nomor, $row["asal_surat"])
			->setCellValue("D" . $nomor, $row["nomor_surat"])
			->setCellValue("E" . $nomor, $format_tglsurat)
			->setCellValue("F" . $nomor, $row["perihal"])
			->setCellValue("G" . $nomor, $row["pengelola"]);

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
	header('Content-Disposition: attachment;filename="Arsip Disposisi Surat Masuk.xls"');
	header('Cache-Control: max-age=0');
	$writer = PHPExcel_IOFactory::createWriter($file, 'Excel5');
	$writer->save('php://output');
	/* start - BLOCK MEMBUAT LINK DOWNLOAD*/
	// CETAK DATA GOLONGAN USIA
}
