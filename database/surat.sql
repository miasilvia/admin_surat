-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 04, 2018 at 11:40 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(5) NOT NULL AUTO_INCREMENT,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `username` varchar(20) NOT NULL,
  `id_jabatan` int(12) NOT NULL,
  `level` varchar(20) NOT NULL,
  `id_unitPengelola` int(3) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `password`, `nama_lengkap`, `username`, `id_jabatan`, `level`, `id_unitPengelola`) VALUES
(1, '21232f297a57a5a743894a0e4a801fc3', 'April', 'admin', 1, 'Admin', 0),
(2, 'b860b7e4f9a38cfd714d9865570f9722', 'Casiman Sukardi, ST.', 'Direktur', 2, 'direktur', 0),
(3, 'b860b7e4f9a38cfd714d9865570f9722', 'wadir 1', 'wadir1', 3, 'Unit Kerja', 0),
(4, 'b860b7e4f9a38cfd714d9865570f9722', 'wadir 2', 'wadir2', 4, 'Unit Kerja', 0),
(5, 'b860b7e4f9a38cfd714d9865570f9722', 'wadir 3', 'wadir3', 11, 'Unit Kerja', 1),
(6, 'b860b7e4f9a38cfd714d9865570f9722', 'A. Sumarudin', 'kajur_ti', 6, 'Unit Kerja', 10),
(7, 'b860b7e4f9a38cfd714d9865570f9722', 'ka subbag umum', 'kasub_umum', 9, 'Unit Kerja', 2);

-- --------------------------------------------------------

--
-- Table structure for table `arsip_suratmasuk`
--

CREATE TABLE IF NOT EXISTS `arsip_suratmasuk` (
  `id_surat` int(10) NOT NULL AUTO_INCREMENT,
  `tgl_terima` date NOT NULL,
  `asal_surat` varchar(100) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `tgl_surat` date NOT NULL,
  `perihal` varchar(300) NOT NULL,
  `id_unitPengelola` int(12) NOT NULL,
  `nama_file` varchar(200) NOT NULL,
  `tgl_posting` date NOT NULL,
  PRIMARY KEY (`id_surat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `arsip_suratmasuk`
--

INSERT INTO `arsip_suratmasuk` (`id_surat`, `tgl_terima`, `asal_surat`, `nomor_surat`, `tgl_surat`, `perihal`, `id_unitPengelola`, `nama_file`, `tgl_posting`) VALUES
(1, '2018-01-17', 'Sesjen Kemenristekdikti', '2016/A2/SE/2018', '2018-01-04', 'Surat Edaran Tentang Tindak Lanjut Usul Pensiun ', 2, '18Surat Undangan MASTER.docx', '2018-08-25'),
(2, '2018-01-17', 'Sesjen Kemenristekdikti', '2026/A2/SE/2018', '2018-01-04', 'Surat Edaran Tentang  Usul Pemberhentian PNS', 2, '9Surat Undangan MASTER.docx', '2018-08-25'),
(3, '2018-01-17', 'Menteri Riset, Teknologi Pendidikan Tinggi', '451/M/KPT/2017', '2017-12-21', 'SK Pejabat Perbendaharaan Pada Polindra ', 2, '11undangan buka bersama.docx', '2018-08-25'),
(4, '2018-03-05', 'HMM Polindra', '061/HMM_POLINDRA/III/2018', '2018-03-01', 'Perizinan Kegiatan  Mahasiswa Mesin Jawa Barat', 3, '58undangan sosialisasi skp.docx', '2018-08-25');

-- --------------------------------------------------------

--
-- Table structure for table `buat_suratdinas`
--

CREATE TABLE IF NOT EXISTS `buat_suratdinas` (
  `id_buatsurat` int(12) NOT NULL AUTO_INCREMENT,
  `nomor_surat` varchar(50) NOT NULL,
  `lampiran` varchar(50) NOT NULL,
  `hal` varchar(50) NOT NULL,
  `tgl_surat` date NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `jabatan_ttd` varchar(50) NOT NULL,
  `nama_ttd` varchar(50) NOT NULL,
  `isi_surat` text NOT NULL,
  `tempat_penerima` varchar(150) NOT NULL,
  `nomor_induk` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `id_permintaan` int(5) NOT NULL,
  `tembusan` text NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  PRIMARY KEY (`id_buatsurat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `buat_suratdinas`
--

INSERT INTO `buat_suratdinas` (`id_buatsurat`, `nomor_surat`, `lampiran`, `hal`, `tgl_surat`, `penerima`, `jabatan_ttd`, `nama_ttd`, `isi_surat`, `tempat_penerima`, `nomor_induk`, `kota`, `id_permintaan`, `tembusan`, `jenis_surat`) VALUES
(39, '0001/PL42/MI/2018', '1 (satu) Lembar', 'Permohonan Pelatihan Teknisi AC', '2018-08-27', 'Direktur Politeknik Negeri Cilacap', 'Direktur Politeknik Negeri Indramayu', 'Casiman Sukardi, S.T., M.T', '<p>Dengan Hormat,</p>\r\n<p>Menindaklanjuti surat Saudara nomor 462/PL43/LL/2016 tanggal 12 Mei 2016 perihal permohonan pelatihan Teknisi AC, dengan ini kami mengajukan penawaran biaya</p>', 'Jawa Tengah', 'NIP 196301011992011001', 'Indramayu', 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE IF NOT EXISTS `disposisi` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `id_surat` int(12) NOT NULL,
  `sifat_surat` enum('rahasia','penting','segera','biasa') NOT NULL,
  `id_admin` int(3) NOT NULL,
  `tgl_dibuat` date NOT NULL,
  `isi_disposisi` text NOT NULL,
  `tgl_isi` date NOT NULL,
  `id_unitPengelola` int(3) NOT NULL,
  `notif` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `disposisi`
--

INSERT INTO `disposisi` (`id`, `id_surat`, `sifat_surat`, `id_admin`, `tgl_dibuat`, `isi_disposisi`, `tgl_isi`, `id_unitPengelola`, `notif`) VALUES
(29, 18, 'penting', 3, '2018-08-23', 'Lanjutkan', '2018-08-23', 2, 0),
(30, 18, 'penting', 7, '2018-08-23', 'Lanjutkan', '2018-08-23', 2, 0),
(31, 19, 'penting', 4, '2018-08-24', 'lanjjutkan', '2018-08-24', 3, 0),
(32, 19, 'penting', 6, '2018-08-24', 'lanjutkan', '2018-08-24', 3, 0),
(33, 20, 'segera', 5, '2018-08-24', '', '0000-00-00', 2, 0),
(34, 20, 'segera', 7, '2018-08-24', '', '0000-00-00', 2, 0),
(35, 21, 'penting', 4, '2018-08-24', '', '0000-00-00', 1, 0),
(36, 21, 'penting', 7, '2018-08-24', '', '0000-00-00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `id_jabatan` int(12) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(200) NOT NULL,
  `level` int(2) NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `level`) VALUES
(1, 'Admin', 1),
(2, 'Direktur', 1),
(3, 'Wakil Direktur I', 2),
(4, 'Wakil Direktur II', 2),
(5, 'Kabag umum dan akademik', 3),
(6, 'Ketua jurusan Tek Informatika', 3),
(7, 'Ketua jurusan Tek mesin', 3),
(8, 'Ketua jurusan Tek Pendingin', 3),
(9, 'Ka Subbag Umum', 4),
(10, 'Ka Subbag Keuangan', 4),
(11, 'Wakil Direktur III', 3);

-- --------------------------------------------------------

--
-- Table structure for table `kode_perihal`
--

CREATE TABLE IF NOT EXISTS `kode_perihal` (
  `id_perihal` int(12) NOT NULL AUTO_INCREMENT,
  `nama_perihal` varchar(200) NOT NULL,
  `kode_perihal` varchar(5) NOT NULL,
  PRIMARY KEY (`id_perihal`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `kode_perihal`
--

INSERT INTO `kode_perihal` (`id_perihal`, `nama_perihal`, `kode_perihal`) VALUES
(1, 'Akreditasi', 'AK'),
(2, 'Beasiswa', 'BW'),
(3, 'Dokumentasi', 'DO'),
(4, 'Dosen dan Tenaga Kependidikan', 'DK'),
(5, 'Evaluasi Pendidikan', 'EP'),
(6, 'Hubungan Masyarakat', 'HM'),
(7, 'Hukum', 'HK'),
(8, 'Inovasi', 'IN'),
(9, 'Kalibrasi', 'KI'),
(10, 'Kelembagaan', 'KL'),
(11, 'Kemahasiswaan', 'KM'),
(12, 'Kepegawaian', 'KP'),
(13, 'Kerja Sama', 'KS'),
(14, 'Kerumahtanggaan', 'RT'),
(15, 'Ketatausahaan', 'TU'),
(16, 'Keuangan', 'KU'),
(17, 'Kurikulum', 'KR'),
(18, 'Media Informasi', 'MI'),
(19, 'Media Kreatif', 'MK'),
(20, 'Organisasi dan Tata Laksana', 'OT'),
(21, 'Pendidikan dan Pelatihan', 'DL'),
(22, 'Penelitian dan Pengembangan', 'PP'),
(23, 'Pengabdian Kepada Masyarakat', 'PM'),
(24, 'Pengawasan', 'PW'),
(25, 'Pengembangan', 'PG'),
(26, 'Penyetaraan Ijazah Luar Negeri', 'IL'),
(27, 'Perencanaan', 'PR'),
(28, 'Perizinan', 'PI'),
(29, 'Perlengkapan', 'PL'),
(30, 'Perpustakaan', 'PK'),
(31, 'Publikasi Ilmiah', 'PB'),
(32, 'Sarana Pendidikan', 'SP'),
(33, 'Sertifikasi', 'SR'),
(34, 'Surat Edaran', 'SE'),
(35, 'Surat Kuasa', 'SK'),
(36, 'Teknologi Informasi', 'TI'),
(37, 'Penjaminan Mutu', 'PJ'),
(38, 'Lain-lain', 'LL');

-- --------------------------------------------------------

--
-- Table structure for table `nomor_surat`
--

CREATE TABLE IF NOT EXISTS `nomor_surat` (
  `id_nomor` int(12) NOT NULL AUTO_INCREMENT,
  `tgl_minta` date NOT NULL,
  `tgl_surat` date NOT NULL,
  `no_urut` int(4) NOT NULL,
  `pengajuan` varchar(50) NOT NULL,
  `id_perihal` int(12) NOT NULL,
  `tahun` year(4) NOT NULL,
  `perihal` varchar(500) NOT NULL,
  PRIMARY KEY (`id_nomor`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `nomor_surat`
--

INSERT INTO `nomor_surat` (`id_nomor`, `tgl_minta`, `tgl_surat`, `no_urut`, `pengajuan`, `id_perihal`, `tahun`, `perihal`) VALUES
(1, '2018-08-23', '2018-08-27', 1, 'PL42', 18, 2018, 'Evaluasi Kegiatan Kemahasiswaan Tahun 2017'),
(2, '2018-08-24', '2018-08-24', 2, 'PL42', 12, 2018, 'Perjalanan Dinas Ke Jakarta'),
(3, '2017-12-27', '2018-01-01', 3, 'PL42', 2, 2018, 'Surat Pernyataan Menampung Dana Pendidikan Bidikmisi'),
(4, '2018-06-15', '2018-08-09', 4, 'PL42', 16, 2018, 'Surat Pengantar Perjanjian Kinerja Polindra '),
(5, '2018-08-23', '2018-08-25', 5, 'PL42', 11, 2018, 'Surat Keterangan Aktif Kuliah T. Mesin'),
(6, '2018-08-24', '2018-08-27', 6, 'PL42', 2, 2018, ''),
(7, '2018-08-27', '2018-08-28', 7, 'PL42', 1, 2018, '');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan`
--

CREATE TABLE IF NOT EXISTS `permintaan` (
  `id_permintaan` int(5) NOT NULL AUTO_INCREMENT,
  `id_admin` int(5) NOT NULL,
  `id_perihal` int(5) NOT NULL,
  `hal` varchar(150) NOT NULL,
  `tgl_surat` date NOT NULL,
  `jenis_surat` varchar(100) NOT NULL,
  `isi_surat` text NOT NULL,
  `tgl_minta` date NOT NULL,
  `penerima` varchar(200) NOT NULL,
  `nama_ttd` varchar(100) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `jabatan_ttd` varchar(50) NOT NULL,
  `nomor_induk` varchar(50) NOT NULL,
  `lampiran` varchar(50) NOT NULL,
  `tempat_penerima` varchar(100) NOT NULL,
  `jenis_permintaan` enum('buat surat','minta nomor') NOT NULL,
  `balasan_admin` varchar(200) NOT NULL,
  `notif` int(1) NOT NULL,
  `file_finish` varchar(80) NOT NULL,
  `status_arsip` enum('belum','sudah') NOT NULL,
  PRIMARY KEY (`id_permintaan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `permintaan`
--

INSERT INTO `permintaan` (`id_permintaan`, `id_admin`, `id_perihal`, `hal`, `tgl_surat`, `jenis_surat`, `isi_surat`, `tgl_minta`, `penerima`, `nama_ttd`, `kota`, `jabatan_ttd`, `nomor_induk`, `lampiran`, `tempat_penerima`, `jenis_permintaan`, `balasan_admin`, `notif`, `file_finish`, `status_arsip`) VALUES
(1, 2, 18, '', '2018-08-27', '', '<p>Dengan Hormat,</p>\r\n<p>Menindaklanjuti surat Saudara nomor 462/PL43/LL/2016 tanggal 12 Mei 2016 perihal permohonan pelatihan Teknisi AC, dengan ini kami mengajukan penawaran biaya</p>', '2018-08-23', 'Direktur Politeknik Negeri Cilacap', 'Direktur Politeknik Negeri Indramayu', '', '', 'NIP 196301011992011001', '1 (satu) Lembar', 'Jawa Tengah', 'buat surat', '481.pdf', 1, '251.pdf', 'sudah'),
(2, 2, 2, 'perihal', '2018-08-27', '', '', '2018-08-24', '', '', '', '', '', '', '', 'minta nomor', '0006/PL42/BW/2018', 1, '', 'belum'),
(3, 7, 1, 'hh', '2018-08-28', '', '', '2018-08-27', '', '', '', '', '', '', '', 'minta nomor', '0007/PL42/AK/2018', 1, '', 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE IF NOT EXISTS `surat_keluar` (
  `id_nomor` int(12) NOT NULL AUTO_INCREMENT,
  `tgl_minta` date NOT NULL,
  `tgl_surat` date NOT NULL,
  `no_urut` int(4) NOT NULL,
  `pengajuan` varchar(50) NOT NULL,
  `id_perihal` int(12) NOT NULL,
  `tahun` year(4) NOT NULL,
  `perihal` varchar(500) NOT NULL,
  `nama_file` varchar(200) NOT NULL,
  `tgl_posting` date NOT NULL,
  `id_unitPengelola` int(12) NOT NULL,
  `ditujukan` varchar(200) NOT NULL,
  PRIMARY KEY (`id_nomor`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_nomor`, `tgl_minta`, `tgl_surat`, `no_urut`, `pengajuan`, `id_perihal`, `tahun`, `perihal`, `nama_file`, `tgl_posting`, `id_unitPengelola`, `ditujukan`) VALUES
(1, '2018-08-23', '2018-08-27', 1, 'PL42', 18, 2018, 'Evaluasi Kegiatan Kemahasiswaan Tahun 2017', '481.pdf', '2018-08-25', 8, 'Sumarudin'),
(2, '2018-08-24', '2018-08-24', 2, 'PL42', 12, 2018, 'Perjalanan Dinas Ke Jakarta', '61.pdf', '2018-08-24', 1, 'Isni Somimah'),
(3, '2017-12-27', '2018-01-01', 3, 'PL42', 2, 2018, 'Surat Pernyataan Menampung Dana Pendidikan Bidikmisi', '33Surat Dinas Agus Sifa.docx', '2018-08-24', 3, 'Mohammad Yani'),
(4, '2018-06-15', '2018-08-09', 4, 'PL42', 16, 2018, 'Surat Pengantar Perjanjian Kinerja Polindra ', '22~$rat Dinas Dudi Abdurachman.docx', '2018-08-25', 1, 'Sesjen Kemenristekdikti '),
(5, '2018-08-23', '2018-08-25', 5, 'PL42', 11, 2018, 'Surat Keterangan Aktif Kuliah T. Mesin', '51undangan sosialisasi skp.docx', '2018-08-24', 8, 'Ilham Maulana Arfah');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keputusan`
--

CREATE TABLE IF NOT EXISTS `surat_keputusan` (
  `id_skeputusan` int(5) NOT NULL AUTO_INCREMENT,
  `id_surat` int(5) NOT NULL,
  `nama_file` varchar(50) NOT NULL,
  `status_terima` enum('B','ST','SL') NOT NULL,
  PRIMARY KEY (`id_skeputusan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `surat_keputusan`
--

INSERT INTO `surat_keputusan` (`id_skeputusan`, `id_surat`, `nama_file`, `status_terima`) VALUES
(13, 18, '8software-localization-plan2.pdf', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE IF NOT EXISTS `surat_masuk` (
  `id_surat` int(12) NOT NULL AUTO_INCREMENT,
  `no_agenda` int(12) NOT NULL,
  `tgl_terima` date NOT NULL,
  `tgl_surat` date NOT NULL,
  `asal_surat` varchar(100) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `perihal` varchar(300) NOT NULL,
  `pengelola` varchar(200) NOT NULL,
  `nama_file` varchar(300) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `notif` int(1) NOT NULL,
  PRIMARY KEY (`id_surat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_surat`, `no_agenda`, `tgl_terima`, `tgl_surat`, `asal_surat`, `nomor_surat`, `perihal`, `pengelola`, `nama_file`, `tgl_posting`, `notif`) VALUES
(18, 1, '2018-08-23', '2018-08-21', 'Kepala SMA Negeri 4 Kota Cirebon', '1-UNIVDAY-2018', 'Undangan University Day 2018', 'April', '26moU traind.docx', '2018-08-23', 1),
(19, 2, '2018-08-24', '2018-08-27', 'Universitas Kristen Satya Wacana', '01/Eks.L/Pan-FIT COMPETITION 2018', 'Undangan FIT Competition 2018', 'April', '78Surat Undangan MASTER.docx', '2018-08-24', 1),
(20, 3, '2018-08-24', '2018-08-24', 'Ketua Jurusan Teknik Informatikaa', '001/PL42.01/LL/2018', 'Pengajuan Biaya UTS Ganjil (Semester 5)', 'April', '40undangan sosialisasi skp.docx', '2018-08-25', 1),
(21, 4, '2018-08-24', '2018-08-23', 'Kepala Biro Keuangan Dan Umum', '15/A3.2/TU/2018', 'Undangan Rekonsiliasi SAK Dan SIMAK BM', 'April', '45undangan sosialisasi skp.docx', '2018-08-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `unit_pengelola`
--

CREATE TABLE IF NOT EXISTS `unit_pengelola` (
  `id_unitPengelola` int(12) NOT NULL AUTO_INCREMENT,
  `unit_pengelola` varchar(200) NOT NULL,
  PRIMARY KEY (`id_unitPengelola`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `unit_pengelola`
--

INSERT INTO `unit_pengelola` (`id_unitPengelola`, `unit_pengelola`) VALUES
(1, 'keuangan'),
(2, 'Subbag Umum'),
(3, 'Kemahasiswaan'),
(4, 'PIU-PEDP'),
(5, 'P3M'),
(6, 'SPI'),
(7, 'CDC'),
(8, 'Akademik'),
(9, 'T. Pendingin Dan Tata Udara'),
(10, 'T. Informatika'),
(12, 'T. Mesin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
