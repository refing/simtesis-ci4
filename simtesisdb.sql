-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2021 at 09:18 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simtesisdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `berkasyudisium`
--

CREATE TABLE `berkasyudisium` (
  `user_id` int(5) NOT NULL,
  `pasfoto` varchar(255) DEFAULT 'pasfoto.jpg',
  `toefl` varchar(255) DEFAULT 'toefl.jpg',
  `transkrip` varchar(255) DEFAULT 'transkrip.jpg',
  `bebasbimbing` varchar(255) DEFAULT 'bebasbimbing.jpg',
  `ijazah` varchar(255) DEFAULT 'ijazah.jpg',
  `formwisuda` varchar(255) DEFAULT 'formwisuda.jpg',
  `bebaslab` varchar(255) DEFAULT 'bebaslab.jpg',
  `bebasperpus` varchar(255) DEFAULT 'bebasperpus',
  `bebasrbsi` varchar(255) DEFAULT 'bebasrbsi',
  `revisitesis` varchar(255) DEFAULT 'revisitesis',
  `accjurnal` varchar(255) DEFAULT 'accjurnal',
  `sertifseminar` varchar(255) DEFAULT 'sertifseminar',
  `fcseminar` varchar(255) DEFAULT 'fcseminar',
  `datawisuda` varchar(255) DEFAULT 'datawisuda'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `daftarpengajuan`
--

CREATE TABLE `daftarpengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nama_mahasiswa` varchar(100) DEFAULT '',
  `nrp` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT '',
  `judul_tesis` varchar(255) DEFAULT NULL,
  `form_bimbingan1` varchar(255) DEFAULT NULL,
  `form_bimbingan2` varchar(255) DEFAULT NULL,
  `form_persetujuan` varchar(255) DEFAULT NULL,
  `berita_acara` varchar(255) DEFAULT NULL,
  `laporan_tesis` varchar(255) DEFAULT NULL,
  `form_revisi` varchar(255) DEFAULT NULL,
  `laporan_final` varchar(255) DEFAULT NULL,
  `form_nilai_akhir` varchar(255) DEFAULT NULL,
  `form_ket_ikut_sidang` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0 COMMENT '0 = Draft',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `daftarpengajuan`
--

INSERT INTO `daftarpengajuan` (`id_pengajuan`, `user_id`, `nama_mahasiswa`, `nrp`, `email`, `judul_tesis`, `form_bimbingan1`, `form_bimbingan2`, `form_persetujuan`, `berita_acara`, `laporan_tesis`, `form_revisi`, `laporan_final`, `form_nilai_akhir`, `form_ket_ikut_sidang`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'Mahasiswa 01', '1111111111', 'mahasiswa01@example.com', 'SYNTHESIS AND CHARACTERIZATION OF SULFONATED ZIRCONIUM PHOSPHATE/PERFLUOROSULFONATED COMPOSITE MEMBRANE FOR FUEL CELL APPLICATIONS', 'Form_Bimbingan_I.pdf', 'Form_Bimbingan_II.pdf', 'Form_Persetujuan.pdf', 'Berita_Acara.pdf', 'Laporan_Tesis.pdf', 'Form_Revisi.pdf', 'Laporan_Final_Tesis.pdf', 'Form_Penilaian_Akhir.pdf', 'Form_Keterangan_Ikut_Sidang.pdf', 9, '2021-07-03 21:35:21', '2021-07-03 21:54:18'),
(2, 4, 'Mahasiswa 02', '2222222222', 'mahasiswa02@example.com', 'IMPLEMENTASI LEAN THINKING DALAM PENINGKATAN KUALITAS PELAYANAN GANGGUAN SPEEDY DI PT. TELEKOMUNIKASI INDONESIA, Tbk. (TELKOM) DIVISI REGIONAL-V', 'Form_Bimbingan_I1.pdf', 'Form_Bimbingan_II1.pdf', 'Form_Persetujuan1.pdf', 'Berita_Acara1.pdf', 'Laporan_Tesis1.pdf', NULL, NULL, NULL, NULL, 2, '2021-07-03 21:37:47', '2021-07-03 21:43:01'),
(3, 5, 'Mahasiswa 03', '3333333333', 'mahasiswa03@example.com', 'PERAMBAN YANG ADAPTIF TERHADAP KETERSEDIAAN BANDWIDTH DAN SUMBER DAYA UNTUK JAMINAN KUALITAS LAYANAN BERBASIS PROTOKOL HTTP PADA LINGKUNGAN BERGERAK', 'Form_Bimbingan_I2.pdf', 'Form_Bimbingan_II2.pdf', 'Form_Persetujuan2.pdf', 'Berita_Acara2.pdf', 'Laporan_Tesis2.pdf', 'Form_Revisi1.pdf', 'Laporan_Final_Tesis1.pdf', 'Form_Penilaian_Akhir1.pdf', 'Form_Keterangan_Ikut_Sidang1.pdf', 9, '2021-07-03 21:38:45', '2021-07-03 22:12:07'),
(4, 6, 'Mahasiswa 04', '4444444444', 'mahasiswa04@example.com', 'STUDI SEDIMENTASI PADA JETTY REJOSO DENGAN MENGGUNAKAN MODEL NUMERIK', 'Form_Bimbingan_I3.pdf', 'Form_Bimbingan_II3.pdf', 'Form_Persetujuan3.pdf', 'Berita_Acara3.pdf', 'Laporan_Tesis3.pdf', 'Form_Revisi2.pdf', 'Laporan_Final_Tesis2.pdf', 'Form_Penilaian_Akhir2.pdf', 'Form_Keterangan_Ikut_Sidang2.pdf', 6, '2021-07-03 21:41:03', '2021-07-03 22:33:46'),
(5, 7, 'Mahasiswa 05', '5555555555', 'mahasiswa05@example.com', 'EVALUASI DAMPAK ALGA PADA ISOLATOR POLIMER', 'Form_Bimbingan_I4.pdf', 'Form_Bimbingan_II4.pdf', 'Form_Persetujuan4.pdf', 'Berita_Acara4.pdf', 'Laporan_Tesis4.pdf', NULL, NULL, NULL, NULL, 4, '2021-07-03 21:42:29', '2021-07-03 21:51:43'),
(6, 8, 'Mahasiswa 06', '6666666666', 'mahasiswa06@example.com', 'STRATEGI MEMINIMALKAN LOAD SHEDDING MENGGUNAKAN METODE SENSITIVITAS UNTUK MENCEGAH VOLTAGE COLLAPSE PADA SISTEM KELISTRIKAN JAWA-BALI 500 KV', 'Form_Bimbingan_I6.pdf', 'Form_Bimbingan_II6.pdf', 'Form_Persetujuan6.pdf', 'Berita_Acara6.pdf', 'Laporan_Tesis6.pdf', NULL, NULL, NULL, NULL, 3, '2021-07-03 21:45:01', '2021-07-03 21:52:22'),
(7, 9, 'Mahasiswa 07', '7777777777', 'mahasiswa07@example.com', 'DESAIN SMART METER UNTUK MEMANTAU DAN IDENTIFIKASI PEMAKAIAN ENERGI LISTRIK PADA SEKTOR RUMAH TANGGA MENGGUNAKAN BACKPROPAGATION NEURAL NETWORK', 'Form_Bimbingan_I7.pdf', 'Form_Bimbingan_II7.pdf', 'Form_Persetujuan7.pdf', 'Berita_Acara7.pdf', 'Laporan_Tesis7.pdf', NULL, NULL, NULL, NULL, 2, '2021-07-03 21:46:08', '2021-07-03 21:46:44'),
(8, 10, 'Mahasiswa 08', '8888888888', 'mahasiswa08@example.com', 'KARAKTERISASI NILAI EIGEN, VEKTOR EIGEN, DAN EIGENMODE DARI MATRIKS TAK TEREDUKSI DAN TEREDUKSI DALAM ALJABAR MAX-PLUS', 'Form_Bimbingan_I9.pdf', 'Form_Bimbingan_II9.pdf', 'Form_Persetujuan9.pdf', 'Berita_Acara9.pdf', 'Laporan_Tesis9.pdf', NULL, NULL, NULL, NULL, 1, '2021-07-03 21:47:48', '2021-07-03 21:47:52'),
(9, 11, 'Mahasiswa 09', '9999999999', 'mahasiswa09@example.com', 'ESTIMASI PELUANG TUBRUKAN KAPAL DENGAN METODE MINIMUM DISTANCE TO COLLISION (MDTC), STUDI KASUS : ALUR PELAYARAN BARAT SURABAYA', 'Form_Bimbingan_I10.pdf', 'Form_Bimbingan_II10.pdf', 'Form_Persetujuan10.pdf', 'Berita_Acara10.pdf', 'Laporan_Tesis10.pdf', NULL, NULL, NULL, NULL, 1, '2021-07-03 21:48:37', '2021-07-03 21:48:40'),
(10, 12, 'Mahasiswa 10', '1010101010', 'mahasiswa10@example.com', 'PENGARUH FAKTOR-FAKTOR KOMPETENSI SUMBER DAYA MANUSIA TERHADAP KINERJA PEGAWAI DALAM IMPLEMENTASI SISTEM e-PROCUREMENT (STUDI KASUS PADA KEMENTERIAN PEKERJAAN UMUM)', 'Form_Bimbingan_I11.pdf', 'Form_Bimbingan_II11.pdf', 'Form_Persetujuan11.pdf', 'Berita_Acara11.pdf', 'Laporan_Tesis11.pdf', NULL, NULL, NULL, NULL, 3, '2021-07-03 21:49:30', '2021-07-03 21:49:50');

-- --------------------------------------------------------

--
-- Table structure for table `daftarpengajuandosen`
--

CREATE TABLE `daftarpengajuandosen` (
  `id_pengajuan_dosen` int(11) NOT NULL,
  `id_pengajuan` int(11) DEFAULT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `kategori_dosen` enum('dosen_penguji_3','dosen_penguji_2','dosen_penguji_1','dosen_pembimbing_2','dosen_pembimbing_1') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `daftarpengajuandosen`
--

INSERT INTO `daftarpengajuandosen` (`id_pengajuan_dosen`, `id_pengajuan`, `id_dosen`, `kategori_dosen`, `created_at`, `updated_at`) VALUES
(6, 2, 2, 'dosen_pembimbing_1', '2021-07-03 21:37:47', NULL),
(7, 2, 3, 'dosen_pembimbing_2', '2021-07-03 21:37:47', NULL),
(8, 2, 4, 'dosen_penguji_1', '2021-07-03 21:37:47', NULL),
(9, 2, 5, 'dosen_penguji_2', '2021-07-03 21:37:47', NULL),
(10, 2, 6, 'dosen_penguji_3', '2021-07-03 21:37:47', NULL),
(21, 5, 4, 'dosen_pembimbing_1', '2021-07-03 21:42:29', NULL),
(22, 5, 5, 'dosen_pembimbing_2', '2021-07-03 21:42:29', NULL),
(23, 5, 6, 'dosen_penguji_1', '2021-07-03 21:42:29', NULL),
(24, 5, 7, 'dosen_penguji_2', '2021-07-03 21:42:29', NULL),
(25, 5, 8, 'dosen_penguji_3', '2021-07-03 21:42:29', NULL),
(26, 6, 8, 'dosen_pembimbing_1', '2021-07-03 21:45:01', NULL),
(27, 6, 8, 'dosen_pembimbing_2', '2021-07-03 21:45:01', NULL),
(28, 6, 8, 'dosen_penguji_1', '2021-07-03 21:45:01', NULL),
(29, 6, 8, 'dosen_penguji_2', '2021-07-03 21:45:01', NULL),
(30, 6, 8, 'dosen_penguji_3', '2021-07-03 21:45:01', NULL),
(31, 7, 7, 'dosen_pembimbing_1', '2021-07-03 21:46:08', NULL),
(32, 7, 8, 'dosen_pembimbing_2', '2021-07-03 21:46:08', NULL),
(33, 7, 2, 'dosen_penguji_1', '2021-07-03 21:46:08', NULL),
(34, 7, 3, 'dosen_penguji_2', '2021-07-03 21:46:08', NULL),
(35, 7, 4, 'dosen_penguji_3', '2021-07-03 21:46:08', NULL),
(36, 8, 8, 'dosen_pembimbing_1', '2021-07-03 21:47:48', NULL),
(37, 8, 8, 'dosen_pembimbing_2', '2021-07-03 21:47:48', NULL),
(38, 8, 8, 'dosen_penguji_1', '2021-07-03 21:47:48', NULL),
(39, 8, 8, 'dosen_penguji_2', '2021-07-03 21:47:48', NULL),
(40, 8, 8, 'dosen_penguji_3', '2021-07-03 21:47:48', NULL),
(41, 9, 6, 'dosen_pembimbing_1', '2021-07-03 21:48:37', NULL),
(42, 9, 7, 'dosen_pembimbing_2', '2021-07-03 21:48:37', NULL),
(43, 9, 8, 'dosen_penguji_1', '2021-07-03 21:48:37', NULL),
(44, 9, 2, 'dosen_penguji_2', '2021-07-03 21:48:37', NULL),
(45, 9, 4, 'dosen_penguji_3', '2021-07-03 21:48:37', NULL),
(46, 10, 2, 'dosen_pembimbing_1', '2021-07-03 21:49:30', NULL),
(47, 10, 7, 'dosen_pembimbing_2', '2021-07-03 21:49:30', NULL),
(48, 10, 1, 'dosen_penguji_1', '2021-07-03 21:49:30', NULL),
(49, 10, 3, 'dosen_penguji_2', '2021-07-03 21:49:30', NULL),
(50, 10, 5, 'dosen_penguji_3', '2021-07-03 21:49:30', NULL),
(101, 1, 6, 'dosen_pembimbing_1', '2021-07-03 22:10:39', NULL),
(102, 1, 7, 'dosen_pembimbing_2', '2021-07-03 22:10:39', NULL),
(103, 1, 8, 'dosen_penguji_1', '2021-07-03 22:10:39', NULL),
(104, 1, 1, 'dosen_penguji_2', '2021-07-03 22:10:39', NULL),
(105, 1, 2, 'dosen_penguji_3', '2021-07-03 22:10:39', NULL),
(106, 3, 6, 'dosen_pembimbing_1', '2021-07-03 22:11:13', NULL),
(107, 3, 7, 'dosen_pembimbing_2', '2021-07-03 22:11:13', NULL),
(108, 3, 8, 'dosen_penguji_1', '2021-07-03 22:11:13', NULL),
(109, 3, 1, 'dosen_penguji_2', '2021-07-03 22:11:13', NULL),
(110, 3, 2, 'dosen_penguji_3', '2021-07-03 22:11:13', NULL),
(111, 4, 3, 'dosen_pembimbing_1', '2021-07-03 22:33:43', NULL),
(112, 4, 4, 'dosen_pembimbing_2', '2021-07-03 22:33:43', NULL),
(113, 4, 5, 'dosen_penguji_1', '2021-07-03 22:33:43', NULL),
(114, 4, 6, 'dosen_penguji_2', '2021-07-03 22:33:43', NULL),
(115, 4, 7, 'dosen_penguji_3', '2021-07-03 22:33:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nama_dosen` varchar(255) DEFAULT NULL,
  `nip_dosen` int(11) DEFAULT NULL,
  `tipe_dosen` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nama_dosen`, `nip_dosen`, `tipe_dosen`, `created_at`, `updated_at`) VALUES
(1, 'Dosen A', 111111, NULL, '2021-07-02 14:00:37', '2021-07-03 17:34:55'),
(2, 'Dosen B', 222222, NULL, '2021-07-02 14:01:19', '2021-07-02 14:55:23'),
(3, 'Dosen C', 333333, NULL, '2021-07-02 14:02:04', NULL),
(4, 'Dosen D', 444444, NULL, '2021-07-02 14:02:11', '2021-07-02 14:55:29'),
(5, 'Dosen E', 555555, NULL, '2021-07-02 14:02:20', NULL),
(6, 'Dosen F', 666666, NULL, '2021-07-02 14:02:33', NULL),
(7, 'Dosen G', 777777, NULL, '2021-07-02 14:02:54', NULL),
(8, 'Dosen H', 888888, NULL, '2021-07-02 14:03:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jadwalthesis`
--

CREATE TABLE `jadwalthesis` (
  `id_jadwal` int(11) NOT NULL,
  `jadwal_sidang` date DEFAULT NULL,
  `jam_sidang` time DEFAULT NULL,
  `id_pengajuan` int(11) DEFAULT NULL,
  `id_ruangan` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jadwalthesis`
--

INSERT INTO `jadwalthesis` (`id_jadwal`, `jadwal_sidang`, `jam_sidang`, `id_pengajuan`, `id_ruangan`, `created_at`, `updated_at`) VALUES
(1, '2021-07-09', '09:00:00', 1, 1, '2021-07-03 21:51:04', NULL),
(2, '2021-07-09', '01:00:00', 3, 1, '2021-07-03 21:51:21', NULL),
(3, '2021-07-12', '09:00:00', 5, 2, '2021-07-03 21:51:43', NULL),
(4, '2021-07-12', '01:00:00', 4, 2, '2021-07-03 21:51:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nilaithesis`
--

CREATE TABLE `nilaithesis` (
  `id_nilai` int(11) NOT NULL,
  `id_pengajuan` int(11) DEFAULT NULL,
  `nilai` double DEFAULT NULL,
  `status_finalthesis` enum('TIDAK LULUS','LULUS') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nilaithesis`
--

INSERT INTO `nilaithesis` (`id_nilai`, `id_pengajuan`, `nilai`, `status_finalthesis`, `created_at`, `updated_at`) VALUES
(1, 1, 85.6, 'LULUS', '2021-07-03 21:54:18', NULL),
(2, 3, 58.4, 'TIDAK LULUS', '2021-07-03 22:12:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `kode_ruangan` varchar(10) DEFAULT NULL,
  `nama_ruangan` varchar(255) DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `kode_ruangan`, `nama_ruangan`, `created_at`, `updated_at`) VALUES
(1, 'R001', 'Ruang 001', '2021-07-02 15:10:22', '2021-07-02 15:10:06'),
(2, 'R002', 'Ruang 002', '2021-07-02 15:10:22', NULL),
(3, 'R003', 'Ruang 003', '2021-07-02 15:10:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','mahasiswa') NOT NULL DEFAULT 'mahasiswa',
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `nrp` varchar(10) NOT NULL,
  `judul` text NOT NULL,
  `dosbing1` varchar(100) NOT NULL,
  `dosbing2` varchar(100) DEFAULT NULL,
  `semprodone` tinyint(1) DEFAULT NULL,
  `sidangdone` tinyint(1) DEFAULT NULL,
  `daftarsempro` tinyint(1) DEFAULT NULL,
  `daftarsidang` tinyint(1) DEFAULT NULL,
  `daftaryudisium` tinyint(1) DEFAULT NULL,
  `nilaisempro` varchar(2) DEFAULT NULL,
  `nilaisidang` varchar(2) DEFAULT NULL,
  `statusyudisium` enum('LULUS','TIDAK LULUS','Belum Tersedia','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `nama`, `password`, `role`, `last_login`, `created_at`, `nrp`, `judul`, `dosbing1`, `dosbing2`, `semprodone`, `sidangdone`, `daftarsempro`, `daftarsidang`, `daftaryudisium`, `nilaisempro`, `nilaisidang`, `statusyudisium`) VALUES
(1, 'admin', 'admin', '$2y$10$tonZkQrnGnp9n38rWeMTieLPNxtDfvy4Z/35Q4rlFObsm/xFnSae.', 'admin', '2021-07-04 06:11:46', '0000-00-00 00:00:00', '', '', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '6026202099@mahasiswa.integra.its.ac.id', 'Muhammad Ahmad Mamad', '$2y$10$z2sNw1JYWCcQ1g3Uu5nZLODzTwNGJroSf4pCn9.9vrlCmCNAi1smi', 'mahasiswa', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'mahasiswa01@example.com', 'Mahasiswa 01', '$2y$10$tbxqVOd4u77f2GbSufWDYufZ4D.TIIFYPc05lR5Jq0qwrZjL99ah2', 'mahasiswa', '2021-07-04 06:10:25', '2021-06-21 12:26:40', '6026202099', 'Rancang Bangun Aplikas Sistem Informasi Manajemen Tesis di Pascasarjana Sistem Informasi ITS', 'Dr. Ir. Aris Tjahyanto, M.Kom', 'Dr. Rarasmaya Indraswari, S.Kom.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TIDAK LULUS'),
(4, 'mahasiswa02@example.com', 'Mahasiswa 02', '$2y$10$tbxqVOd4u77f2GbSufWDYufZ4D.TIIFYPc05lR5Jq0qwrZjL99ah2', 'mahasiswa', '2021-07-03 19:36:53', '2021-07-03 19:30:45', '2222222222', 'IMPLEMENTASI LEAN THINKING DALAM PENINGKATAN KUALITAS PELAYANAN GANGGUAN SPEEDY DI PT. TELEKOMUNIKASI INDONESIA, Tbk. (TELKOM) DIVISI REGIONAL-V', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LULUS'),
(5, 'mahasiswa03@example.com', 'Mahasiswa 03', '$2y$10$tbxqVOd4u77f2GbSufWDYufZ4D.TIIFYPc05lR5Jq0qwrZjL99ah2', 'mahasiswa', '2021-07-03 20:02:01', '2021-07-03 19:30:59', '3333333333', 'PERAMBAN YANG ADAPTIF TERHADAP KETERSEDIAAN BANDWIDTH DAN SUMBER DAYA UNTUK JAMINAN KUALITAS LAYANAN BERBASIS PROTOKOL HTTP PADA LINGKUNGAN BERGERAK', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LULUS'),
(6, 'mahasiswa04@example.com', 'Mahasiswa 04', '$2y$10$tbxqVOd4u77f2GbSufWDYufZ4D.TIIFYPc05lR5Jq0qwrZjL99ah2', 'mahasiswa', '2021-07-03 20:33:14', '2021-07-03 19:31:19', '4444444444', 'STUDI SEDIMENTASI PADA JETTY REJOSO DENGAN MENGGUNAKAN MODEL NUMERIK', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LULUS'),
(7, 'mahasiswa05@example.com', 'Mahasiswa 05', '$2y$10$tbxqVOd4u77f2GbSufWDYufZ4D.TIIFYPc05lR5Jq0qwrZjL99ah2', 'mahasiswa', '2021-07-03 19:41:35', '2021-07-03 19:31:30', '5555555555', 'EVALUASI DAMPAK ALGA PADA ISOLATOR POLIMER', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LULUS'),
(8, 'mahasiswa06@example.com', 'Mahasiswa 06', '$2y$10$tbxqVOd4u77f2GbSufWDYufZ4D.TIIFYPc05lR5Jq0qwrZjL99ah2', 'mahasiswa', '2021-07-03 19:44:01', '2021-07-03 19:31:47', '6666666666', 'STRATEGI MEMINIMALKAN LOAD SHEDDING MENGGUNAKAN METODE SENSITIVITAS UNTUK MENCEGAH VOLTAGE COLLAPSE PADA SISTEM KELISTRIKAN JAWA-BALI 500 KV', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LULUS'),
(9, 'mahasiswa07@example.com', 'Mahasiswa 07', '$2y$10$tbxqVOd4u77f2GbSufWDYufZ4D.TIIFYPc05lR5Jq0qwrZjL99ah2', 'mahasiswa', '2021-07-03 19:45:33', '2021-07-03 19:32:12', '7777777777', 'DESAIN SMART METER UNTUK MEMANTAU DAN IDENTIFIKASI PEMAKAIAN ENERGI LISTRIK PADA SEKTOR RUMAH TANGGA MENGGUNAKAN BACKPROPAGATION NEURAL NETWORK', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Belum Tersedia'),
(10, 'mahasiswa08@example.com', 'Mahasiswa 08', '$2y$10$tbxqVOd4u77f2GbSufWDYufZ4D.TIIFYPc05lR5Jq0qwrZjL99ah2', 'mahasiswa', '2021-07-03 19:47:01', '2021-07-03 19:32:22', '8888888888', 'KARAKTERISASI NILAI EIGEN, VEKTOR EIGEN, DAN EIGENMODE DARI MATRIKS TAK TEREDUKSI DAN TEREDUKSI DALAM ALJABAR MAX-PLUS', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LULUS'),
(11, 'mahasiswa09@example.com', 'Mahasiswa 09', '$2y$10$tbxqVOd4u77f2GbSufWDYufZ4D.TIIFYPc05lR5Jq0qwrZjL99ah2', 'mahasiswa', '2021-07-03 19:48:03', '2021-07-03 19:33:19', '9999999999', 'ESTIMASI PELUANG TUBRUKAN KAPAL DENGAN METODE MINIMUM DISTANCE TO COLLISION (MDTC), STUDI KASUS : ALUR PELAYARAN BARAT SURABAYA', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LULUS'),
(12, 'mahasiswa10@example.com', 'Mahasiswa 10', '$2y$10$tbxqVOd4u77f2GbSufWDYufZ4D.TIIFYPc05lR5Jq0qwrZjL99ah2', 'mahasiswa', '2021-07-03 19:58:42', '2021-07-03 19:33:30', '1010101010', 'PENGARUH FAKTOR-FAKTOR KOMPETENSI SUMBER DAYA MANUSIA TERHADAP KINERJA PEGAWAI DALAM IMPLEMENTASI SISTEM e-PROCUREMENT (STUDI KASUS PADA KEMENTERIAN PEKERJAAN UMUM)', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LULUS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berkasyudisium`
--
ALTER TABLE `berkasyudisium`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `daftarpengajuan`
--
ALTER TABLE `daftarpengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `daftarpengajuandosen`
--
ALTER TABLE `daftarpengajuandosen`
  ADD PRIMARY KEY (`id_pengajuan_dosen`),
  ADD KEY `fk_id_pengajuan` (`id_pengajuan`),
  ADD KEY `fk_id_dosen` (`id_dosen`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `jadwalthesis`
--
ALTER TABLE `jadwalthesis`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `nilaithesis`
--
ALTER TABLE `nilaithesis`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftarpengajuan`
--
ALTER TABLE `daftarpengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `daftarpengajuandosen`
--
ALTER TABLE `daftarpengajuandosen`
  MODIFY `id_pengajuan_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jadwalthesis`
--
ALTER TABLE `jadwalthesis`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nilaithesis`
--
ALTER TABLE `nilaithesis`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berkasyudisium`
--
ALTER TABLE `berkasyudisium`
  ADD CONSTRAINT `berkasyudisium_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
