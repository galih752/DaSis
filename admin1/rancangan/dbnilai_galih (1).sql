-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2022 at 07:47 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbnilai_galih`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `data_guru`
-- (See below for the actual view)
--
CREATE TABLE `data_guru` (
`nip` varchar(20)
,`nama` varchar(30)
,`jabatan` varchar(40)
,`namamapel` varchar(12)
);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jabatan` varchar(40) NOT NULL,
  `kode` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `nama`, `jabatan`, `kode`) VALUES
('199909112022071001', 'Sudrajat Fadillah', 'Kepala Sekolah', '1'),
('199909112022071002', 'Asep Deni', 'Wakasek', '2'),
('199909112022071003', 'Rustandi Ayi', 'Master', '3'),
('199909112022071004', 'Ayi Rana', 'Master', '4');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `kode` varchar(5) NOT NULL,
  `namamapel` varchar(12) NOT NULL,
  `guru` varchar(20) NOT NULL,
  `Guru_nip` varchar(20) NOT NULL,
  `Nilai_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`kode`, `namamapel`, `guru`, `Guru_nip`, `Nilai_id`) VALUES
('1', 'B. Indonesia', 'Sudrajat Fadillah', '199909112022071001', 1),
('2', 'B. Inggris', 'Asep Deni', '199909112022071002', 2),
('3', 'Matematika', 'Rustandi Ayi', '199909112022071003', 3),
('4', 'Seni Budaya', 'Ayi Rana', '199909112022071004', 4);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(4) NOT NULL,
  `mapel` varchar(7) NOT NULL,
  `nilai1` int(11) NOT NULL,
  `nilai2` int(11) NOT NULL,
  `nilai3` int(11) NOT NULL,
  `SISWA_nisn` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `mapel`, `nilai1`, `nilai2`, `nilai3`, `SISWA_nisn`) VALUES
(1, '', 90, 90, 90, '0057448172'),
(2, 'Matemat', 90, 90, 90, '0055217321'),
(3, 'Matemat', 90, 90, 90, '0059972056'),
(4, 'Matemat', 90, 90, 90, '0063585384'),
(5, 'Matemat', 90, 90, 90, '0065740389'),
(6, 'Matemat', 90, 90, 90, '0067569391');

-- --------------------------------------------------------

--
-- Stand-in structure for view `nilai_siswa`
-- (See below for the actual view)
--
CREATE TABLE `nilai_siswa` (
`nisn` varchar(12)
,`nama` varchar(30)
,`kelas` varchar(7)
,`nilai1` int(11)
,`nilai2` int(11)
,`nilai3` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` varchar(12) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kelas` varchar(7) NOT NULL,
  `tanggallahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nama`, `kelas`, `tanggallahir`) VALUES
('0055217321', 'M. Aby Pahrul', 'XI RPL', '2005-04-17'),
('0057448172', 'RD.Galih Rakasiwi', 'XI RPL', '2005-09-11'),
('0059972056', 'Fadhil Muhammad Irfan', 'XI RPL', '2005-12-14'),
('0063585384', 'Tyar Riswandika', 'XI RPL', '2006-06-28'),
('0065740389', 'Zahra Putri Zaihan', 'XI RPL', '2006-03-11'),
('0067569391', 'Alfath Izha Barikallah', 'XI RPL', '2006-05-12');

-- --------------------------------------------------------

--
-- Structure for view `data_guru`
--
DROP TABLE IF EXISTS `data_guru`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_guru`  AS SELECT `guru`.`nip` AS `nip`, `guru`.`nama` AS `nama`, `guru`.`jabatan` AS `jabatan`, `mapel`.`namamapel` AS `namamapel` FROM (`guru` join `mapel` on(`guru`.`nip` = `mapel`.`Guru_nip`))  ;

-- --------------------------------------------------------

--
-- Structure for view `nilai_siswa`
--
DROP TABLE IF EXISTS `nilai_siswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nilai_siswa`  AS SELECT `siswa`.`nisn` AS `nisn`, `siswa`.`nama` AS `nama`, `siswa`.`kelas` AS `kelas`, `nilai`.`nilai1` AS `nilai1`, `nilai`.`nilai2` AS `nilai2`, `nilai`.`nilai3` AS `nilai3` FROM (`siswa` left join `nilai` on(`siswa`.`nisn` = `nilai`.`SISWA_nisn`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`kode`),
  ADD UNIQUE KEY `Guru_nip` (`Guru_nip`),
  ADD UNIQUE KEY `Nilai_id` (`Nilai_id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `SISWA_nisn` (`SISWA_nisn`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
