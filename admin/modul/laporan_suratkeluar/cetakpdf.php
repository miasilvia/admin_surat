<?php
error_reporting(0);

require('../../laporan/fpdf.php');
require('../../../config/koneksi.php');
$pdf = new FPDF('L', 'mm', 'legal');
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 5, 'LAPORAN SURAT KELUAR', '0', '1', 'C', false);
$pdf->Cell(0, 5, 'POLITEKNIK NEGERI INDRAMAYU', '0', '1', 'C', false);
$pdf->SetFont('Arial', 'i', 8);
$pdf->Cell(0, 5, 'Alamat: ', '0', '1', 'C', false);
$pdf->Cell(0, 5, 'www.polindra.ac.id', '0', '1', 'C', false);
$pdf->Ln(3);
$pdf->Cell(320, 0.6, '', '0', '1', 'C', true);
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 10);

$pdf->Cell(22, 8, 'No Agenda', 1, 0, 'C');
$pdf->Cell(30, 8, 'Tanggal', 1, 0, 'C');
$pdf->Cell(70, 8, 'Ditujukan', 1, 0, 'C');
$pdf->Cell(60, 8, 'Nomor Surat', 1, 0, 'C');
$pdf->Cell(30, 8, 'Tanggal Surat', 1, 0, 'C');
$pdf->Cell(80, 8, 'Perihal', 1, 0, 'C');
$pdf->Cell(28, 8, 'Unit Pengelola', 1, 0, 'C');
$pdf->Ln(0);

$Dari = $_POST['Dari'];
$Sampai = $_POST['Sampai'];
$tampil = "select * from surat_keluar sk join unit_pengelola up on sk.id_unitPengelola=up.id_unitPengelola  WHERE (tgl_minta BETWEEN '$Dari' AND '$Sampai');";
$sql = mysqli_query($konek, $tampil);

while ($data = mysqli_fetch_array($sql)) {
	$no++;
	$kode2 = $data['no_urut'];
	if ($kode2 < 10) {
		$kode = '000' . $kode2;
	} elseif ($kode2 > 9 && $kode2 <= 99) {
		$kode = '00' . $kode2;
	} else {
		$kode = '00' . $kode2;
	}
	$nomor_surat = $kode . '/'  . $data['pengajuan'] . '/' . $data['kode_perihal'] . '/' . $data['tahun'];
	$pdf->Ln(8);
	$pdf->SetFont('Arial', '', 10);

	$pdf->Cell(22, 8, $no, 1, 0, 'C');
	$pdf->Cell(30, 8, $data['tgl_posting'], 1, 0, 'C');
	$pdf->Cell(70, 8, $data['ditujukan'], 1, 0, 'C');
	$pdf->Cell(60, 8, $nomor_surat, 1, 0, 'C');
	$pdf->Cell(30, 8, $data['tgl_surat'], 1, 0, 'C');
	$pdf->Cell(80, 8, $data['perihal'], 1, 0, 'C');
	$pdf->Cell(28, 8, $data['unit_pengelola'], 1, 0, 'C');
}
$pdf->Output();
