
-- Bikin user baru
GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, FILE, INDEX, ALTER, CREATE TEMPORARY TABLES, EXECUTE, CREATE VIEW, SHOW VIEW, CREATE ROUTINE, ALTER ROUTINE, EVENT, TRIGGER ON *.* TO 'tugas2ppl'@'localhost' IDENTIFIED BY PASSWORD '*53E75DC754D0B216496EA1D2D5EFF2EB0F622379';
CREATE DATABASE `tugas_2_ppl`;
USE `tugas_2_ppl`;

-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 06, 2015 at 06:20 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tugas_2_ppl`
--

-- --------------------------------------------------------

--
-- Table structure for table `angkutan`
--

CREATE TABLE IF NOT EXISTS `angkutan` (
`id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_kendaraan` int(11) NOT NULL,
  `izin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE IF NOT EXISTS `dokumen` (
`id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `izin_id` int(11) NOT NULL,
  `template_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id`, `nama`, `url`, `izin_id`, `template_id`, `status`) VALUES
(1, 'Fotocopy Surat Izin Tempat Usaha (SITU)', '', 1, 3, 1),
(2, 'Fotocopy KTP Pemohon', '', 1, 4, 1),
(3, 'Fotokopi NPWP', '', 1, 5, 1),
(4, 'Surat Permohonan Izin Usaha Angkutan', '', 1, 6, 1),
(5, 'Surat Izin Usaha Perdagangan', '', 1, 7, 1),
(6, 'Foto Garasi/Tempat Penyimpanan Kendaraan', '', 1, 8, 1),
(7, 'Fotocopy SK Izin Trayek', '', 1, 9, 1),
(8, 'Surat Pernyataan Tidak Melakukan Pengeteman dengan', '', 1, 10, 1),
(9, 'Surat Pernyataan tidak keberatan dari tetangga.', '', 1, 13, 1),
(10, 'Fotocopy Surat Izin Tempat Usaha (SITU)', '', 8, 3, 1),
(11, 'Fotocopy KTP Pemohon', '', 8, 4, 1),
(12, 'Fotokopi NPWP', '', 8, 5, 1),
(13, 'Surat Permohonan Izin Usaha Angkutan', '', 8, 6, 1),
(14, 'Surat Izin Usaha Perdagangan', '', 8, 7, 1),
(15, 'Foto Garasi/Tempat Penyimpanan Kendaraan', '', 8, 8, 1),
(16, 'Fotocopy SK Izin Trayek', '', 8, 9, 1),
(17, 'Surat Pernyataan Tidak Melakukan Pengeteman dengan', '', 8, 10, 1),
(18, 'Surat Pernyataan tidak keberatan dari tetangga.', '', 8, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `izin`
--

CREATE TABLE IF NOT EXISTS `izin` (
`id` int(11) NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `deskripsi` text,
  `status_pembayaran` tinyint(1) NOT NULL DEFAULT '0',
  `pengguna_id` int(11) NOT NULL,
  `jenisizin_id` int(11) NOT NULL,
  `biaya` int(11) DEFAULT NULL,
  `updated_by_pengguna` tinyint(4) NOT NULL DEFAULT '0',
  `updated_by_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `izin`
--

INSERT INTO `izin` (`id`, `tanggal_pengajuan`, `deskripsi`, `status_pembayaran`, `pengguna_id`, `jenisizin_id`, `biaya`, `updated_by_pengguna`, `updated_by_admin`) VALUES
(1, '2015-04-05', NULL, 0, 2, 5, NULL, 0, 0),
(2, '2015-04-05', NULL, 0, 2, 5, NULL, 0, 0),
(3, '2015-04-05', NULL, 0, 2, 5, NULL, 0, 0),
(4, '2015-04-05', NULL, 0, 2, 5, NULL, 0, 0),
(5, '2015-04-05', NULL, 0, 2, 5, NULL, 1, 0),
(6, '2015-04-05', NULL, 0, 2, 5, NULL, 0, 0),
(7, '2015-04-05', NULL, 0, 2, 5, NULL, 0, 0),
(8, '2015-04-05', 'Persiapkan diri anda', 0, 2, 5, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jenisizin`
--

CREATE TABLE IF NOT EXISTS `jenisizin` (
`id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenisizin`
--

INSERT INTO `jenisizin` (`id`, `nama`) VALUES
(5, 'Izin Usaha Angkutan Umum'),
(6, 'Izin Usaha Taksi');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
`id` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `password`, `nama`, `alamat`, `no_ktp`, `email`, `is_admin`) VALUES
(1, 'admin', 'Administrator', 'Admin', '1234567891110001', 'admin@gmail.com', 1),
(2, 'kevin', 'Kevin Yudi', 'kevin', '3471070102030002', 'kevin@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
`id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `keterangan` text
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `nama`, `keterangan`) VALUES
(7, 'Melengkapi dokumen', 'Pemohon izin diwajibkan melengkapi dokumen-dokumen yang dibutuhkan'),
(8, 'Pemeriksaan lapangan', 'Kami akan melakukan pemeriksaan terkait kendaraan dan kondisi lapangan.'),
(9, 'Izin ditolak', 'Izin anda bermasalah. Anda tidak memenuhi persyaratan'),
(10, 'Penyerahan SKRD', 'Mohon serahkan bukti pembayaran SKRD dengan biaya sesuai ketetapan yang dicantumkan'),
(11, 'Izin diterima', 'Izin sudah diterbitkan. Silakan mengambil izin di kantor.'),
(12, 'Pengajuan izin dibatalkan', 'Izin ini dibatalkan oleh pemohon');

-- --------------------------------------------------------

--
-- Table structure for table `status_izin`
--

CREATE TABLE IF NOT EXISTS `status_izin` (
  `izin_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `timestamp` datetime NOT NULL,
`id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_izin`
--

INSERT INTO `status_izin` (`izin_id`, `status_id`, `timestamp`, `id`) VALUES
(8, 7, '2015-04-05 00:00:00', 1),
(8, 7, '2015-04-05 01:00:00', 2),
(8, 8, '2015-04-05 02:00:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE IF NOT EXISTS `template` (
`id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `url` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `nama`, `url`) VALUES
(3, 'Fotocopy Surat Izin Tempat Usaha (SITU)', NULL),
(4, 'Fotocopy KTP Pemohon', NULL),
(5, 'Fotokopi NPWP', NULL),
(6, 'Surat Permohonan Izin Usaha Angkutan', NULL),
(7, 'Surat Izin Usaha Perdagangan', NULL),
(8, 'Foto Garasi/Tempat Penyimpanan Kendaraan', NULL),
(9, 'Fotocopy SK Izin Trayek', NULL),
(10, 'Surat Pernyataan Tidak Melakukan Pengeteman dengan Materai Rp6000', NULL),
(11, 'Fotocopy Buku Uji', NULL),
(12, 'Fotocopy STNK', NULL),
(13, 'Surat Pernyataan tidak keberatan dari tetangga.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `template_izin`
--

CREATE TABLE IF NOT EXISTS `template_izin` (
  `jenisizin_id` int(11) NOT NULL,
  `template_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `template_izin`
--

INSERT INTO `template_izin` (`jenisizin_id`, `template_id`) VALUES
(5, 3),
(5, 4),
(5, 5),
(5, 6),
(5, 7),
(5, 8),
(5, 9),
(5, 10),
(5, 13);

-- --------------------------------------------------------

--
-- Table structure for table `terminal`
--

CREATE TABLE IF NOT EXISTS `terminal` (
`id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terminal`
--

INSERT INTO `terminal` (`id`, `nama`, `alamat`) VALUES
(1, 'Kalapa', 'Jalan Pungkur'),
(2, 'Dago', 'Jalan Juanda'),
(3, 'Sadang Serang', 'Jalan Sadang Serang\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `terminal_angkutan`
--

CREATE TABLE IF NOT EXISTS `terminal_angkutan` (
  `angkutan_id` int(11) NOT NULL,
  `terminal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angkutan`
--
ALTER TABLE `angkutan`
 ADD PRIMARY KEY (`id`), ADD KEY `izinangkutan` (`izin_id`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
 ADD PRIMARY KEY (`id`), ADD KEY `dokumenizin` (`izin_id`), ADD KEY `template_id` (`template_id`);

--
-- Indexes for table `izin`
--
ALTER TABLE `izin`
 ADD PRIMARY KEY (`id`), ADD KEY `izinpengguna` (`pengguna_id`), ADD KEY `izinjenisizin` (`jenisizin_id`);

--
-- Indexes for table `jenisizin`
--
ALTER TABLE `jenisizin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_izin`
--
ALTER TABLE `status_izin`
 ADD PRIMARY KEY (`izin_id`,`status_id`,`id`), ADD UNIQUE KEY `id` (`id`), ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template_izin`
--
ALTER TABLE `template_izin`
 ADD PRIMARY KEY (`jenisizin_id`,`template_id`), ADD KEY `template_id` (`template_id`);

--
-- Indexes for table `terminal`
--
ALTER TABLE `terminal`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terminal_angkutan`
--
ALTER TABLE `terminal_angkutan`
 ADD PRIMARY KEY (`angkutan_id`,`terminal_id`), ADD KEY `terminal_id` (`terminal_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `angkutan`
--
ALTER TABLE `angkutan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `izin`
--
ALTER TABLE `izin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `jenisizin`
--
ALTER TABLE `jenisizin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `status_izin`
--
ALTER TABLE `status_izin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `terminal`
--
ALTER TABLE `terminal`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `angkutan`
--
ALTER TABLE `angkutan`
ADD CONSTRAINT `angkutan_ibfk_1` FOREIGN KEY (`izin_id`) REFERENCES `izin` (`id`);

--
-- Constraints for table `dokumen`
--
ALTER TABLE `dokumen`
ADD CONSTRAINT `dokumen_ibfk_1` FOREIGN KEY (`izin_id`) REFERENCES `izin` (`id`),
ADD CONSTRAINT `dokumen_ibfk_2` FOREIGN KEY (`template_id`) REFERENCES `template` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `izin`
--
ALTER TABLE `izin`
ADD CONSTRAINT `izin_ibfk_2` FOREIGN KEY (`jenisizin_id`) REFERENCES `jenisizin` (`id`),
ADD CONSTRAINT `izin_ibfk_3` FOREIGN KEY (`pengguna_id`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `status_izin`
--
ALTER TABLE `status_izin`
ADD CONSTRAINT `status_izin_ibfk_1` FOREIGN KEY (`izin_id`) REFERENCES `izin` (`id`),
ADD CONSTRAINT `status_izin_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Constraints for table `template_izin`
--
ALTER TABLE `template_izin`
ADD CONSTRAINT `template_izin_ibfk_1` FOREIGN KEY (`jenisizin_id`) REFERENCES `jenisizin` (`id`),
ADD CONSTRAINT `template_izin_ibfk_2` FOREIGN KEY (`template_id`) REFERENCES `template` (`id`);

--
-- Constraints for table `terminal_angkutan`
--
ALTER TABLE `terminal_angkutan`
ADD CONSTRAINT `terminal_angkutan_ibfk_1` FOREIGN KEY (`angkutan_id`) REFERENCES `angkutan` (`id`),
ADD CONSTRAINT `terminal_angkutan_ibfk_2` FOREIGN KEY (`terminal_id`) REFERENCES `terminal` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
