-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2021 at 11:56 AM
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
  `text_laporan` text NOT NULL,
  `file_laporan` text NOT NULL,
  `ringkasan_laporan` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan_berita`
--

INSERT INTO `laporan_berita` (`id_laporan_berita`, `id_user`, `berita`, `tanggal`, `text_laporan`, `file_laporan`, `ringkasan_laporan`, `status`) VALUES
(13, 7, 'Warta Olahraga', '2021-07-07', 'hol3-manajemen-layout-dikonversi.docx', '', '<p>jajajajjajajajaja</p>\r\n\r\n<p>jajajajjajajjajjajaaaaaa</p>', 2),
(14, 7, 'Warta Olahraga', '2021-07-09', 'hol5-activity-dan-intent-dikonversi3.docx', 'Background_Music_For_Cooking_VideosSilent_Partner3.mp3', '<h1>judul</h1>\r\n\r\n<p>iisii</p>', 1);

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
(1, 'admin', '$2y$10$LcsCBfyyGSN5ODawH4vgHO6CK796ahMt2ptDTY5sdaQi6lw7bN1I2', 'admin', 12, 'jl.admin', 'Editor', '01010101', 'admin@mail', 'user.png', 1),
(2, 'pro1', '$2y$10$bAoZlcwaWoAFoPwY6cSLsuMXE5dXJYNCRIHUovyUWCNka9Y5nNC5i', 'programa 1', 111111111, 'aaaaaaaaaaaaa', 'Programa 1', '1111111111111', 'pro1@mail.com', 'user.png', 3),
(7, 'heru', '$2y$10$eMq/3vynKtxuxLaKMRi//u0OSJXvNmojmES97G8aPKA2twXNRfBBO', 'heruu', 71717, 'hahha', 'Reporter', '3131', 'fafa@mail.com', 'amperabridge.jpg', 2),
(8, 'gagag', '$2y$10$.J2K6G1ral/kDteXN6fK2.nwLupe69WByoQvixXwqPd7Dw7go3Jhe', 'gagagagagg', 132424, 'GGAA', 'Editor', '3441414', 'fafa@mail1111', 'amperabridge3.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `warta_berita`
--

CREATE TABLE `warta_berita` (
  `id_warta_berita` int(11) NOT NULL,
  `id_laporan_berita` int(11) NOT NULL,
  `desk_editor` varchar(60) NOT NULL,
  `hari` varchar(12) NOT NULL,
  `tanggal` date NOT NULL,
  `pukul` time NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warta_berita`
--

INSERT INTO `warta_berita` (`id_warta_berita`, `id_laporan_berita`, `desk_editor`, `hari`, `tanggal`, `pukul`, `status`) VALUES
(3, 13, 'gagagagagg', 'Selasa', '2021-07-07', '16:00:00', 0),
(4, 13, 'admin', 'Selasa', '2021-07-07', '16:00:00', 1),
(5, 13, 'admin', 'Selasa', '2021-07-07', '16:00:00', 1),
(6, 14, 'admin', 'Rabu', '2021-07-14', '16:00:00', 1);

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
  MODIFY `id_laporan_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `warta_berita`
--
ALTER TABLE `warta_berita`
  MODIFY `id_warta_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
