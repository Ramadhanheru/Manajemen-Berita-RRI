-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2021 at 11:52 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manajemen_berita`
--

-- --------------------------------------------------------

--
-- Table structure for table `laporan_berita`
--

CREATE TABLE `laporan_berita` (
  `id_laporan_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `berita` varchar(60) NOT NULL,
  `tanggal` date NOT NULL,
  `file_laporan` text NOT NULL,
  `ringkasan_laporan` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `nip` int(60) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `jabatan` varchar(60) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(80) NOT NULL,
  `foto` varchar(80) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nama`, `nip`, `alamat`, `jabatan`, `no_hp`, `email`, `foto`, `role`) VALUES
(1, 'admin', '$2y$10$LcsCBfyyGSN5ODawH4vgHO6CK796ahMt2ptDTY5sdaQi6lw7bN1I2', 'admin', 12, 'jl.admin', 'Editor', '01010101', 'admin@mail', 'user.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `warta_berita`
--

CREATE TABLE `warta_berita` (
  `id_warta_berita` int(11) NOT NULL,
  `id_laporan_berita` int(11) NOT NULL,
  `hari` varchar(12) NOT NULL,
  `tanggal` date NOT NULL,
  `pukul` time NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laporan_berita`
--
ALTER TABLE `laporan_berita`
  ADD PRIMARY KEY (`id_laporan_berita`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `warta_berita`
--
ALTER TABLE `warta_berita`
  ADD PRIMARY KEY (`id_warta_berita`),
  ADD KEY `id_laporan_berita` (`id_laporan_berita`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laporan_berita`
--
ALTER TABLE `laporan_berita`
  MODIFY `id_laporan_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `warta_berita`
--
ALTER TABLE `warta_berita`
  MODIFY `id_warta_berita` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `laporan_berita`
--
ALTER TABLE `laporan_berita`
  ADD CONSTRAINT `laporan_berita_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `warta_berita`
--
ALTER TABLE `warta_berita`
  ADD CONSTRAINT `warta_berita_ibfk_2` FOREIGN KEY (`id_laporan_berita`) REFERENCES `laporan_berita` (`id_laporan_berita`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
