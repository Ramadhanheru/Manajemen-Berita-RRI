-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2021 at 04:41 PM
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
-- Table structure for table `draft_siaran`
--

CREATE TABLE `draft_siaran` (
  `id` int(11) NOT NULL,
  `id_warta_berita` int(11) NOT NULL,
  `frame` varchar(12) NOT NULL,
  `durasi` varchar(12) NOT NULL,
  `pembaca_berita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(17, 7, 'Warta Berita Daerah', '2021-07-13', 'laporan_berita_roky7.docx', 'WhatsApp_Audio_2021-07-13_at_07.52.301.mpeg', '<p>Pasca perpanjangan penyekatan masuk palembang</p>\r\n\r\n<p>hingga hari ini kondisi kendaraan AKAP/AKDP terminal Alang Alang lebar turun hingga 0%</p>', 2),
(18, 7, 'Warta Berita Daerah', '2021-07-13', 'laporan_berita_daerah_roky1.docx', 'WhatsApp_Audio_2021-07-13_at_07.52.301.mp3', '<p>Kabupaten Empat Lawang belum menerima vaksin astrazaneca untuk TNI Polri</p>', 2),
(19, 7, 'Warta Berita Olahraga', '2021-07-13', 'Teks_berita_roky1.docx', 'WhatsApp_Audio_2021-07-13_at_07.52.30_(1)1.mpeg', '<p>Tuan Rumah&nbsp; STQH tingkat Provinsi Sumatera-Selatan Ke XXVI di OKU Timur dengan peserta kafilah&nbsp; dari 17 kabupaten kota.</p>', 2),
(26, 9, 'Warta Berita Olahraga', '2021-07-13', 'berita_olahraga_amin3.docx', '', '<p>Sempati diisukan ditunda, Porprov ke-XIII Sumsel di Oku Raya dipastikan digelar November 2021</p>', 2),
(27, 9, 'Warta Berita Daerah', '2021-07-13', 'Teks_Berita_daerah_amin.docx', '', '<p>Rencana Sekolah Tatap Muka Juli di Palembang DibatalkanRencana Sekolah Tatap Muka Juli di Palembang Dibatalkan</p>', 2),
(28, 9, 'Warta Berita Olahraga', '2021-08-04', 'berita2_amin.docx', '', '<p>Anggaran Sangat Minim, KONI Sumsel Pangkas Setengah Lebih Personel Kontingen PON Papua</p>', 2),
(29, 9, 'Warta Berita Olahraga', '2021-08-04', 'berita2_amin2.docx', '', '<p>Cabang Olahraga Dayung Sumsel Target Pertahankan Raihan Medali pada PON Papua</p>', 2),
(30, 7, 'Warta Berita Daerah', '2021-08-04', 'berita2_roky.docx', '', '<p>Peringatan HUT Pramuka Ke - 60th Dilaksanakan Dilapangan Dengan Prokes KetatPeringatan HUT Pramuka Ke - 60th Dilaksanakan Dilapangan Dengan Prokes Ketat</p>', 2),
(31, 7, 'Warta Berita Daerah', '2021-08-04', 'berita2_rokyy.docx', '', '<p>Gubernur Sumsel Ikuti Zikir dan Doa Kebangsaan 76 Tahun Indonesia Merdeka</p>', 2),
(32, 7, 'Warta Berita Daerah', '2021-08-04', 'berita2_rokyyy.docx', '', '<p>Update Covid-19 di Sumsel 4 Agustus: Kasus Positif Bertambah 695<br />\r\n<br />\r\n&nbsp;</p>', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `nip` varchar(60) NOT NULL,
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
(1, 'admin', '$2y$10$LcsCBfyyGSN5ODawH4vgHO6CK796ahMt2ptDTY5sdaQi6lw7bN1I2', 'Dian Robaidah Purnamasari', '12', 'jl.admin', 'Editor', '01010101', 'admin@mail', 'WhatsApp_Image_2021-07-17_at_11_45_26.jpeg', 1),
(2, 'criyem', '$2y$10$G3PXL0MfcVBiQfHo50wDkOwfPu8fF7qdyyHEET7Ywxszwg7dYfK86', 'criyem', '020198023161', 'jl. swadaya no.2179', 'Programa 1', '088269665022', 'criyem@gmail.com', 'WhatsApp_Image_2021-07-17_at_11_17_17.jpeg', 3),
(3, 'yuli', '$2y$10$aCCNKPLQBtiZ01hhHHR3duCioY.JFgEAkBbyyQkK9ZCCm61litk0y', 'Dwi Yuliarnita.SP.M.Si', '020198023178', 'Jl. MP. Mangkunegara No.1122', 'Ketua Redaksi', '082145541232', 'yuliarnitadwi@gmail.com', 'WhatsApp_Image_2021-07-17_at_19_52_01.jpeg', 4),
(7, 'roky', '$2y$10$AavpAWXzvPWbGwxSbpwoIuL5IN0yv8tHedEnylvKeNDpSLe5io7K2', 'Roky Pratama', '020198023156', 'komp. kencana damai jl.asuka II', 'Reporter', '082215068055', 'Rokypratama@gmail.com', 'WhatsApp_Image_2021-07-17_at_11_45_08.jpeg', 2),
(8, 'rian', '$2y$10$GjIcPDTgwW84hfJ2XN3QROVmWtnzUhU.OkhxyeQZhiZdEvFmeddYO', 'Rian Apridhani', '020198023164', 'Perum Barcelona II Blok C1', 'Editor', '081277778012', 'ryanthefoilisto@gmail.com', 'WhatsApp_Image_2021-07-17_at_11_45_261.jpeg', 1),
(9, 'amin', '$2y$10$bJfRR1bPknrcrM6bWlCQTu0ruKutddWn91mxSgvc.Rah8JntnU/HO', 'Muhammad Amin', '020198023165', 'Perum Griya Asri, Gandus Palembang', 'Reporter', '082180187318', 'muhammadamin90@gmail.com', 'WhatsApp_Image_2021-07-17_at_19_52_02.jpeg', 2);

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
  `frame` varchar(25) NOT NULL,
  `durasi` varchar(25) NOT NULL,
  `pembaca_berita` varchar(60) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warta_berita`
--

INSERT INTO `warta_berita` (`id_warta_berita`, `id_laporan_berita`, `desk_editor`, `hari`, `tanggal`, `pukul`, `frame`, `durasi`, `pembaca_berita`, `status`) VALUES
(10, 17, 'Dian Robaidah Purnamasari', 'Rabu', '2021-07-28', '16:00:00', 'langsung', '12 menit', 'criyem', 1),
(11, 18, 'Dian Robaidah Purnamasari', 'Rabu', '2021-07-28', '16:00:00', 'langsung', '12 menit', 'criyem', 1),
(13, 19, 'Dian Robaidah Purnamasari', 'Rabu', '2021-07-28', '17:00:00', 'langsung', '15 menit', 'criyem', 1),
(17, 26, 'Dian Robaidah Purnamasari', 'Rabu', '2021-07-28', '17:00:00', 'langsung', '15 menit', 'criyem', 1),
(18, 27, 'Dian Robaidah Purnamasari', 'Rabu', '2021-07-28', '16:00:00', 'langsung', '12 menit', 'criyem', 1),
(19, 30, 'Dian Robaidah Purnamasari', 'Kamis', '2021-08-05', '16:00:00', 'langsung', '10 menit', 'criyem', 1),
(20, 31, 'Dian Robaidah Purnamasari', 'Kamis', '2021-08-05', '16:00:00', 'langsung', '10 menit', 'criyem', 1),
(21, 32, 'Dian Robaidah Purnamasari', 'Kamis', '2021-08-05', '16:00:00', 'langsung', '10 menit', 'criyem', 1),
(22, 28, 'Dian Robaidah Purnamasari', 'Kamis', '2021-08-05', '17:00:00', 'langsung', '10 menit', 'criyem', 1),
(23, 29, 'Dian Robaidah Purnamasari', 'Kamis', '2021-08-05', '17:00:00', 'langsung', '10 menit', 'criyem', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `draft_siaran`
--
ALTER TABLE `draft_siaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_warta_berita` (`id_warta_berita`),
  ADD KEY `pembaca_berita` (`pembaca_berita`);

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
-- AUTO_INCREMENT for table `draft_siaran`
--
ALTER TABLE `draft_siaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `laporan_berita`
--
ALTER TABLE `laporan_berita`
  MODIFY `id_laporan_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `warta_berita`
--
ALTER TABLE `warta_berita`
  MODIFY `id_warta_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `draft_siaran`
--
ALTER TABLE `draft_siaran`
  ADD CONSTRAINT `draft_siaran_ibfk_1` FOREIGN KEY (`id_warta_berita`) REFERENCES `warta_berita` (`id_warta_berita`),
  ADD CONSTRAINT `draft_siaran_ibfk_2` FOREIGN KEY (`pembaca_berita`) REFERENCES `users` (`id_user`);

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
