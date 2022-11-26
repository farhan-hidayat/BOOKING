-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2017 at 03:51 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_vigor`
--

-- --------------------------------------------------------

--
-- Table structure for table `tboking`
--

CREATE TABLE `tboking` (
  `kdBoking` bigint(20) NOT NULL,
  `noInvoice` varchar(20) NOT NULL,
  `tglInvoice` date NOT NULL,
  `usernameBoking` varchar(100) NOT NULL,
  `an` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `totalBayar` double NOT NULL,
  `statusBayar` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tboking`
--

INSERT INTO `tboking` (`kdBoking`, `noInvoice`, `tglInvoice`, `usernameBoking`, `an`, `alamat`, `email`, `kontak`, `totalBayar`, `statusBayar`) VALUES
(10, 'INV-000001', '2017-03-14', 'Boogye32', 'Budi Hermawan', 'Jl.M.Yamin Gg.Usaha Baru', 'mail.budihermawan@gmail.com', '0821008911', 100000, 'B'),
(11, 'INV-000002', '2017-03-15', 'admin', 'Budi Hermawan', 'jl', 'mail.budihermawan@gmail.com', '0821008911', 100000, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `tboking_temp`
--

CREATE TABLE `tboking_temp` (
  `kdBokingTemp` bigint(20) NOT NULL,
  `kdJadwal` int(5) NOT NULL,
  `nomorLapangan` int(5) NOT NULL,
  `tglBokingTemp` date NOT NULL,
  `jamBokingTemp` varchar(20) NOT NULL,
  `hargaTemp` double NOT NULL,
  `subTotalTemp` double NOT NULL,
  `idSession` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `thalamanstatis`
--

CREATE TABLE `thalamanstatis` (
  `kdHalaman` int(1) NOT NULL,
  `profil` longtext NOT NULL,
  `caraBoking` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tjadwal`
--

CREATE TABLE `tjadwal` (
  `kdJadwal` bigint(20) NOT NULL,
  `tglJadwal` date NOT NULL,
  `kdLapangan` int(5) NOT NULL,
  `kdJam` int(5) NOT NULL,
  `harga` double NOT NULL,
  `statusBoking` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tjadwal`
--

INSERT INTO `tjadwal` (`kdJadwal`, `tglJadwal`, `kdLapangan`, `kdJam`, `harga`, `statusBoking`) VALUES
(7, '2017-03-13', 1, 1, 100000, 'B'),
(8, '2017-03-13', 1, 2, 100000, 'R'),
(9, '2017-03-13', 1, 3, 100000, 'R'),
(10, '2017-03-13', 1, 4, 100000, 'R'),
(11, '2017-03-15', 1, 1, 100000, 'B'),
(12, '2017-03-16', 1, 1, 100000, 'B'),
(13, '2017-03-16', 1, 2, 100000, 'R');

-- --------------------------------------------------------

--
-- Table structure for table `tjam`
--

CREATE TABLE `tjam` (
  `kdJam` int(5) NOT NULL,
  `jam` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tjam`
--

INSERT INTO `tjam` (`kdJam`, `jam`) VALUES
(1, '08:00'),
(2, '09:00'),
(3, '10:00'),
(4, '11:00'),
(5, '12:00'),
(6, '13:00'),
(7, '14:00'),
(8, '15:00'),
(9, '16:00'),
(10, '17:00'),
(11, '18:00'),
(12, '19:00'),
(13, '20:00'),
(14, '21:00'),
(15, '22:00'),
(16, '23:00'),
(17, '24:00');

-- --------------------------------------------------------

--
-- Table structure for table `tlapangan`
--

CREATE TABLE `tlapangan` (
  `kdLapangan` int(5) NOT NULL,
  `noLapangan` int(5) NOT NULL,
  `gambarLapangan` varchar(1000) NOT NULL,
  `deskripsi` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tlapangan`
--

INSERT INTO `tlapangan` (`kdLapangan`, `noLapangan`, `gambarLapangan`, `deskripsi`) VALUES
(1, 1, '757a91448d779d6a42052f8235338fa4lapangan futsal.jpg', 'Lapangan Footsal Sintesis\r\nTes Konten Tes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes Konten');

-- --------------------------------------------------------

--
-- Table structure for table `tmember`
--

CREATE TABLE `tmember` (
  `kdMember` bigint(20) NOT NULL,
  `usermember` varchar(100) NOT NULL,
  `passmember` varchar(100) NOT NULL,
  `nmLengkap` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `emailMember` varchar(100) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `fotoMember` varchar(1000) NOT NULL,
  `aktif` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmember`
--

INSERT INTO `tmember` (`kdMember`, `usermember`, `passmember`, `nmLengkap`, `alamat`, `emailMember`, `kontak`, `fotoMember`, `aktif`) VALUES
(2, 'Boogye32', 'bab4323aa802419218e4f7ff43cc4ba9', 'Budi Hermawan', 'Jl.kebakir', 'mail.budihermawan@gmail.com', '0821008911', 'e2cea35294e2c56ea8ebfa2aaad4acb7profile_user.jpg', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tpengguna`
--

CREATE TABLE `tpengguna` (
  `kdPengguna` bigint(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nmPengguna` varchar(100) NOT NULL,
  `emailPengguna` varchar(100) NOT NULL,
  `alamatPengguna` varchar(100) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `aktif` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tpengguna`
--

INSERT INTO `tpengguna` (`kdPengguna`, `username`, `password`, `nmPengguna`, `emailPengguna`, `alamatPengguna`, `kontak`, `aktif`) VALUES
(1, 'admin', 'd41d8cd98f00b204e9800998ecf8427e', 'administrator', 'mail.administaror@gmail.com', 'Jl.M.Yamin Gg.Usaha Baru', '082188991010', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `trincian_boking`
--

CREATE TABLE `trincian_boking` (
  `kdRincianBoking` bigint(20) NOT NULL,
  `kdBoking` int(5) NOT NULL,
  `noLapangan` int(5) NOT NULL,
  `kdJadwal` int(5) NOT NULL,
  `hargaBoking` double NOT NULL,
  `jamBoking` varchar(15) NOT NULL,
  `tglBoking` varchar(15) NOT NULL,
  `subTotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trincian_boking`
--

INSERT INTO `trincian_boking` (`kdRincianBoking`, `kdBoking`, `noLapangan`, `kdJadwal`, `hargaBoking`, `jamBoking`, `tglBoking`, `subTotal`) VALUES
(10, 10, 1, 11, 100000, '08:00', '2017-03-15', 100000),
(11, 11, 1, 12, 100000, '08:00', '2017-03-16', 100000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tboking`
--
ALTER TABLE `tboking`
  ADD PRIMARY KEY (`kdBoking`);

--
-- Indexes for table `tboking_temp`
--
ALTER TABLE `tboking_temp`
  ADD PRIMARY KEY (`kdBokingTemp`);

--
-- Indexes for table `thalamanstatis`
--
ALTER TABLE `thalamanstatis`
  ADD PRIMARY KEY (`kdHalaman`);

--
-- Indexes for table `tjadwal`
--
ALTER TABLE `tjadwal`
  ADD PRIMARY KEY (`kdJadwal`);

--
-- Indexes for table `tjam`
--
ALTER TABLE `tjam`
  ADD PRIMARY KEY (`kdJam`);

--
-- Indexes for table `tlapangan`
--
ALTER TABLE `tlapangan`
  ADD PRIMARY KEY (`kdLapangan`);

--
-- Indexes for table `tmember`
--
ALTER TABLE `tmember`
  ADD PRIMARY KEY (`kdMember`);

--
-- Indexes for table `tpengguna`
--
ALTER TABLE `tpengguna`
  ADD PRIMARY KEY (`kdPengguna`);

--
-- Indexes for table `trincian_boking`
--
ALTER TABLE `trincian_boking`
  ADD PRIMARY KEY (`kdRincianBoking`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tboking`
--
ALTER TABLE `tboking`
  MODIFY `kdBoking` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tboking_temp`
--
ALTER TABLE `tboking_temp`
  MODIFY `kdBokingTemp` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `thalamanstatis`
--
ALTER TABLE `thalamanstatis`
  MODIFY `kdHalaman` int(1) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tjadwal`
--
ALTER TABLE `tjadwal`
  MODIFY `kdJadwal` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tjam`
--
ALTER TABLE `tjam`
  MODIFY `kdJam` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tlapangan`
--
ALTER TABLE `tlapangan`
  MODIFY `kdLapangan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tmember`
--
ALTER TABLE `tmember`
  MODIFY `kdMember` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tpengguna`
--
ALTER TABLE `tpengguna`
  MODIFY `kdPengguna` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `trincian_boking`
--
ALTER TABLE `trincian_boking`
  MODIFY `kdRincianBoking` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
