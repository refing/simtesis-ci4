-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2021 at 03:47 PM
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
  `dosbing2` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `nama`, `password`, `role`, `last_login`, `created_at`, `nrp`, `judul`, `dosbing1`, `dosbing2`) VALUES
(1, 'admin', 'admin', '$2y$10$tonZkQrnGnp9n38rWeMTieLPNxtDfvy4Z/35Q4rlFObsm/xFnSae.', 'admin', '2021-06-21 14:26:57', '0000-00-00 00:00:00', '', '', '0', NULL),
(2, '6026202099@mahasiswa.integra.its.ac.id', 'Muhammad Ahmad Mamad', '$2y$10$z2sNw1JYWCcQ1g3Uu5nZLODzTwNGJroSf4pCn9.9vrlCmCNAi1smi', 'mahasiswa', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0', NULL),
(7, 'mahasiswa', 'mahasiswa', '$2y$10$tbxqVOd4u77f2GbSufWDYufZ4D.TIIFYPc05lR5Jq0qwrZjL99ah2', 'mahasiswa', '2021-06-27 08:26:38', '2021-06-21 12:26:40', '6026202099', 'Rancang Bangun Aplikas Sistem Informasi Manajemen Tesis di Pascasarjana Sistem Informasi ITS', 'Dr. Ir. Aris Tjahyanto, M.Kom', 'Dr. Rarasmaya Indraswari, S.Kom.');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
