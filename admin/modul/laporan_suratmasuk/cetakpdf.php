<?php
error_reporting(0);

require('../../laporan/fpdf.php');
require('../../../config/koneksi.php');
$pdf = new FPDF('L', 'mm', 'legal');
$pdf->AddPage();

if (isset($_POST['cetak2'])) {
	$pdf->SetFont('Arial', 'B', 14);
	$pdf->Cell(0, 5, 'LAPORAN AGENDA SURAT MASUK REDAKSI', '0', '1', 'C', false);
	$pdf->Cell(0, 5, 'POLITEKNIK NEGERI INDRAMAYU', '0', '1', 'C', false);
	$pdf->SetFont('Arial', 'i', 8);
	$pdf->Cell(0, 5, 'www.polindra.ac.id', '0', '1', 'C', false);
	$pdf->Ln(3);
	$pdf->Cell(320, 0.6, '', '0', '1', 'C', true);
	$pdf->Ln(5);

	$pdf->SetFont('Arial', 'B', 10);

	$pdf->Cell(22, 8, 'No Agenda', 1, 0, 'C');
	$pdf->Cell(30, 8, 'Tanggal Terima', 1, 0, 'C');
	$pdf->Cell(30, 8, 'Tanggal Surat', 1, 0, 'C');
	$pdf->Cell(70, 8, 'Asal Surat', 1, 0, 'C');
	$pdf->Cell(72, 8, 'Nomor Surat', 1, 0, 'C');
	$pdf->Cell(77, 8, 'Perihal', 1, 0, 'C');
	$pdf->Cell(22, 8, 'Pengelola', 1, 0, 'C');
	$pdf->Ln(0);

	$Dari = $_POST['Dari'];
	$Sampai = $_POST['Sampai'];
	$tampil = "select * from surat_masuk WHERE (tgl_terima BETWEEN '$Dari' AND '$Sampai');";
	$sql = mysqli_query($konek, $tampil);

	while ($data = mysqli_fetch_array($sql)) {
		$pdf->Ln(8);
		$pdf->SetFont('Arial', '', 10);

		$pdf->Cell(22, 8, $data['no_agenda'], 1, 0, 'C');
		$pdf->Cell(30, 8, $data['tgl_terima'], 1, 0, 'C');
		$pdf->Cell(30, 8, $data['tgl_surat'], 1, 0, 'C');
		$pdf->Cell(70, 8, $data['asal_surat'], 1, 0, 'C');
		$pdf->Cell(72, 8, $data['nomor_surat'], 1, 0, 'C');
		$pdf->Cell(77, 8, $data['perihal'], 1, 0, 'C');
		$pdf->Cell(22, 8, $data['pengelola'], 1, 0, 'C');
	}
	$pdf->Output();
} elseif (isset($_POST['cetak3'])) {
	$pdf->SetFont('Arial', 'B', 14);
	$pdf->Cell(0, 5, 'LAPORAN ARSIP SURAT MASUK', '0', '1', 'C', false);
	$pdf->Cell(0, 5, 'POLITEKNIK NEGERI INDRAMAYU', '0', '1', 'C', false);
	$pdf->SetFont('Arial', 'i', 8);

	$pdf->Cell(0, 5, 'www.polindra.ac.id', '0', '1', 'C', false);
	$pdf->Ln(3);
	$pdf->Cell(330, 0.6, '', '0', '1', 'C', true);
	$pdf->Ln(5);

	$pdf->SetFont('Arial', 'B', 10);

	$pdf->Cell(20, 8, 'No Agenda', 1, 0, 'C');
	$pdf->Cell(28, 8, 'Tanggal Terima', 1, 0, 'C');
	$pdf->Cell(28, 8, 'Tanggal Surat', 1, 0, 'C');
	$pdf->Cell(70, 8, 'Asal Surat', 1, 0, 'C');
	$pdf->Cell(63, 8, 'Nomor Surat', 1, 0, 'C');
	$pdf->Cell(92, 8, 'Perihal', 1, 0, 'C');
	$pdf->Cell(30, 8, 'Unit Pengelola', 1, 0, 'C');
	$pdf->Ln(0);

	$Dari = $_POST['Dari'];
	$Sampai = $_POST['Sampai'];
	$tampil = "select * from arsip_suratmasuk  ars JOIN unit_pengelola up ON ars.id_unitPengelola=up.id_unitPengelola WHERE (tgl_terima BETWEEN '$Dari' AND '$Sampai');";
	$sql = mysqli_query($konek, $tampil);

	while ($data = mysqli_fetch_array($sql)) {
		$no++;

		$pdf->Ln(8);
		$pdf->SetFont('Arial', '', 10);
		$pdf->Cell(20, 8, $no, 1, 0, 'C');
		$pdf->Cell(28, 8, $data['tgl_terima'], 1, 0, 'C');
		$pdf->Cell(28, 8, $data['tgl_surat'], 1, 0, 'C');
		$pdf->Cell(70, 8, $data['asal_surat'], 1, 0, 'C');
		$pdf->Cell(63, 8, $data['nomor_surat'], 1, 0, 'C');
		$pdf->Cell(92, 8, $data['perihal'], 1, 0, 'C');
		$pdf->Cell(30, 8, $data['unit_pengelola'], 1, 0, 'C');
	}
	$pdf->Output();
} elseif (isset($_POST['cetak4'])) {
	$pdf->SetFont('Arial', 'B', 14);
	$pdf->Cell(0, 5, 'LAPORAN ARSIP DISPOSISI SURAT MASUK', '0', '1', 'C', false);
	$pdf->Cell(0, 5, 'POLITEKNIK NEGERI INDRAMAYU', '0', '1', 'C', false);
	$pdf->SetFont('Arial', 'i', 8);
	$pdf->Cell(0, 5, 'www.polindra.ac.id', '0', '1', 'C', false);
	$pdf->Ln(3);
	$pdf->Cell(330, 0.6, '', '0', '1', 'C', true);
	$pdf->Ln(5);


	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(20, 8, 'No Agenda', 1, 0, 'C');
	$pdf->Cell(28, 8, 'Tanggal Terima', 1, 0, 'C');
	$pdf->Cell(28, 8, 'Tanggal Surat', 1, 0, 'C');
	$pdf->Cell(70, 8, 'Asal Surat', 1, 0, 'C');
	$pdf->Cell(63, 8, 'Nomor Surat', 1, 0, 'C');
	$pdf->Cell(92, 8, 'Perihal', 1, 0, 'C');
	$pdf->Cell(30, 8, 'Unit Pengelola', 1, 0, 'C');
	$pdf->Ln(0);

	$Dari = $_POST['Dari'];
	$Sampai = $_POST['Sampai'];
	$tampil = "select * from  disposisi dis join surat_masuk sm on dis.id_surat=sm.id_surat JOIN unit_pengelola up on dis.id_unitPengelola=up.id_unitPengelola WHERE tgl_terima BETWEEN '$Dari' AND '$Sampai' and dis.id_surat NOT IN (SELECT id_surat FROM disposisi WHERE isi_disposisi = '' GROUP BY id_surat) GROUP BY dis.id_surat";
	$sql = mysqli_query($konek, $tampil);
	while ($data = mysqli_fetch_array($sql)) {
		$no++;
		$pdf->Ln(8);
		$pdf->SetFont('Arial', '', 10);
		$pdf->Cell(20, 8, $no, 1, 0, 'C');
		$pdf->Cell(28, 8, $data['tgl_terima'], 1, 0, 'C');
		$pdf->Cell(28, 8, $data['tgl_surat'], 1, 0, 'C');
		$pdf->Cell(70, 8, $data['asal_surat'], 1, 0, 'C');
		$pdf->Cell(63, 8, $data['nomor_surat'], 1, 0, 'C');
		$pdf->Cell(92, 8, $data['perihal'], 1, 0, 'C');
		$pdf->Cell(30, 8, $data['unit_pengelola'], 1, 0, 'C');
	}
	$pdf->Output();
}
