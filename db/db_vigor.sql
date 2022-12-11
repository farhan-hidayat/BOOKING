-- Adminer 4.8.1 MySQL 8.0.30 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `tmember`;
CREATE TABLE `tmember` (
  `kdMember` bigint NOT NULL AUTO_INCREMENT,
  `usermember` varchar(100) NOT NULL,
  `passmember` varchar(100) NOT NULL,
  `nmLengkap` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `emailMember` varchar(100) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `aktif` char(1) NOT NULL,
  PRIMARY KEY (`kdMember`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tpengguna`;
CREATE TABLE `tpengguna` (
  `kdPengguna` bigint NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nmPengguna` varchar(100) NOT NULL,
  `emailPengguna` varchar(100) NOT NULL,
  `alamatPengguna` varchar(100) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `aktif` char(1) NOT NULL,
  PRIMARY KEY (`kdPengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `trincian_boking` (`kdRincianBoking`, `kdBoking`, `noLapangan`, `kdJadwal`, `hargaBoking`, `jamBoking`, `tglBoking`, `subTotal`) VALUES
(10,	10,	1,	11,	100000,	'08:00',	'2017-03-15',	100000),
(11,	11,	1,	12,	100000,	'08:00',	'2017-03-16',	100000),
(12,	12,	1,	7,	100000,	'08:00',	'2022-11-30',	100000),
(13,	13,	1,	14,	1000,	'20:00',	'2022-11-30',	1000),
(14,	14,	1,	15,	1111,	'23:00',	'2022-11-30',	1111),
(15,	15,	1,	8,	100000,	'09:00',	'2022-12-13',	100000),
(16,	16,	1,	16,	10000,	'09:00',	'2022-12-08',	10000),
(17,	17,	1,	17,	20000,	'13:00',	'2022-12-08',	20000),
(18,	18,	1,	18,	30000,	'22:00',	'2022-12-08',	30000),
(20,	22,	1,	21,	10000,	'12:00',	'2022-12-20',	10000);

-- 2022-12-11 15:59:28
