-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2021 at 08:17 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parkir`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_area`
--

CREATE TABLE `tbl_area` (
  `id_area` int(11) NOT NULL,
  `nama` varchar(11) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `terpakai` int(11) DEFAULT NULL,
  `kosong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_area`
--

INSERT INTO `tbl_area` (`id_area`, `nama`, `kapasitas`, `terpakai`, `kosong`) VALUES
(2, 'area-1', 10, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log`
--

CREATE TABLE `tbl_log` (
  `id_parkir` int(11) NOT NULL,
  `plat` varchar(12) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_masuk` time NOT NULL,
  `waktu_keluar` time DEFAULT NULL,
  `durasi` time DEFAULT NULL,
  `id_area` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parkir`
--

CREATE TABLE `tbl_parkir` (
  `id_parkir` int(11) NOT NULL,
  `plat` varchar(12) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_masuk` time NOT NULL,
  `waktu_keluar` time DEFAULT NULL,
  `id_area` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_parkir`
--

INSERT INTO `tbl_parkir` (`id_parkir`, `plat`, `tanggal`, `waktu_masuk`, `waktu_keluar`, `id_area`) VALUES
(41, 'AB3521DD', '2021-06-27', '12:52:32', '00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `status`) VALUES
(11, 'admin', '$2y$10$Q6VYsdQfR6vutBaNoYF0aOe1PUWH6r0S0Ss99pgdo.0b1N9zXv5bS', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_area`
--
ALTER TABLE `tbl_area`
  ADD PRIMARY KEY (`id_area`);

--
-- Indexes for table `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD UNIQUE KEY `plat` (`plat`),
  ADD KEY `id_area` (`id_area`);

--
-- Indexes for table `tbl_parkir`
--
ALTER TABLE `tbl_parkir`
  ADD PRIMARY KEY (`id_parkir`),
  ADD UNIQUE KEY `plat` (`plat`),
  ADD KEY `id_area` (`id_area`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_area`
--
ALTER TABLE `tbl_area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_parkir`
--
ALTER TABLE `tbl_parkir`
  MODIFY `id_parkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_parkir`
--
ALTER TABLE `tbl_parkir`
  ADD CONSTRAINT `tbl_parkir_ibfk_1` FOREIGN KEY (`id_area`) REFERENCES `tbl_area` (`id_area`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
