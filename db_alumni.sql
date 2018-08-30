-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2018 at 05:21 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_alumni`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`username`, `password`) VALUES
('admin', 'VUV0Wg==');

-- --------------------------------------------------------

--
-- Table structure for table `tb_alumni`
--

CREATE TABLE `tb_alumni` (
  `no_identitas` varchar(20) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` int(11) NOT NULL,
  `jk` char(1) NOT NULL,
  `jurusan` varchar(10) NOT NULL,
  `angkatan` int(4) NOT NULL,
  `th_lulus` int(4) NOT NULL,
  `alamat_skrg` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `nm_perusahaan` varchar(100) NOT NULL,
  `alamat_perusahaan` varchar(200) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `kata_sandi` varchar(50) NOT NULL,
  `foto_profil` varchar(50) NOT NULL,
  `konfirm` char(1) NOT NULL DEFAULT 'N' COMMENT 'Y=sudah, N=blm'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_alumni`
--

INSERT INTO `tb_alumni` (`no_identitas`, `nim`, `nama`, `tempat_lahir`, `tgl_lahir`, `jk`, `jurusan`, `angkatan`, `th_lulus`, `alamat_skrg`, `status`, `telp`, `nm_perusahaan`, `alamat_perusahaan`, `pekerjaan`, `email`, `kata_sandi`, `foto_profil`, `konfirm`) VALUES
('11107787', '11107787', 'Raziq Almer', 'Jakarta', 974394000, 'L', 'AKT', 2013, 2017, 'johar', 'Single', '0855554212121', 'detik', 'Jakarta', 'magang', 'yayandzakir@gmail.com', 'VUV0WlZIUjVWWFU9', '11107787_1535073821.png', 'Y'),
('11110777777', '974', 'ABDUL MUBAROK', 'Rawi', 904064400, 'L', 'AKT', 2013, 2016, 'Rawi', 'Lajang', '085890061111', 'JIC', 'Menteng', 'it', 'd@d.d', 'U1ZWVQ==', '974_1511533585.png', 'Y'),
('234', '234', 'Nura AoC', '-', 0, 'L', 'MGT', 2017, 2017, '-', '-', '', '', '', '-', 'nura.project02@gmail.com', 'TlZGV1drdEw=', '', 'N'),
('3175090812120003', '111102587', 'Budiatro', 'Jakarta', 745261200, 'L', 'AKT', 2010, 2016, 'Jakarta', 'Single', '', '', '', 'Karyawan Swasta', 'yayan.dzakir@gmail.com', 'VUV0WlZIUjVWWFU9', '', 'Y'),
('31750988110002', '110771177', 'Yayan Kurniawan', 'Jakarta', 590864400, 'L', 'MGT', 2007, 2014, 'Jakarta', 'Menikah', '', '', '', 'Karyawan Swasta', 'krezzbjoo@gmail.com', 'VUV0WlZIUjVWWFU9', '', 'Y'),
('321', '321', 'SAYA', '-', 0, 'L', 'MGT', 2017, 2017, '-', '-', '', '', '', '-', 'aoc.think@gmail.com', 'V2xObFVFdFo=', '', 'Y'),
('837', '837', 'AHMAD RISWANTO', 'Lampung Selatan', 912963600, 'L', 'AKT', 2013, 2016, 'Lampung Selatan', 'Lajang', '08555555555', 'Pakan ', 'Jakarta', 'Keuangan', 'b@b.b', 'ZFZsVg==', '837_1512136940.JPG', 'Y'),
('915', '915', 'AGUS JULIANTO', 'Waringin Harjo', 867949200, 'L', 'MGT', 2013, 2016, 'Waringin Harjo', 'Lajang', '', '', '', '-', 'a@a.a', 'U1ZCMA==', '915_1512136820.jpg', 'Y'),
('955', '955', 'ANA SEPTIANA SARI', 'Bandar Agung', 897930000, 'P', 'AKT', 2013, 2016, 'Bandar Agung', 'Lajang', '', '', '', '-', 'c@c.c', 'U1hSMA==', '955_1512302200.jpg', 'Y');

--
-- Triggers `tb_alumni`
--
DELIMITER $$
CREATE TRIGGER `hapus_alumni` BEFORE DELETE ON `tb_alumni` FOR EACH ROW BEGIN
DELETE FROM tb_komentar WHERE no_identitas=old.no_identitas;
DELETE FROM tb_pesan WHERE no_identitas=old.no_identitas;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_info_umum`
--

CREATE TABLE `tb_info_umum` (
  `no_info` char(10) NOT NULL,
  `judul_info` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `waktu` int(11) NOT NULL,
  `ket` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_info_umum`
--

INSERT INTO `tb_info_umum` (`no_info`, `judul_info`, `isi`, `waktu`, `ket`) VALUES
('IU17102501', 'Hari Kebangkitan Nasional', 'COba kita tekuni kembali apa yang membuat kita menjadi bahan untuk menjadi bagian dari apa saja yang ingin kita dengarkan dengan seksama. untuk itu jadilah apa yang ingin kmu katakan pada ku.', 1504929215, ''),
('IU17102502', 'Reuni Akbar Angkatan 2010-2015', 'Dalam rangka untuk mengadakan reuni akbar yang akan diselenggarakan pada tanggal 12 Desember 2017, untuk itu diharapkan untuk menghadiri acara tersebut dengan atau tanpa pasangan masing-masing.', 1504999215, ''),
('IU17110601', 'Informasi Umum terbaru', 'Jika masih dalam tahap yang kurang normal, dimohon untuk tetap bersmangat', 1509940773, ''),
('IU17120101', 'Melestarikan Lingkungan Hidup', 'Masih banyak yang ingin kita sampaikan jika ini adalah waktu yang ingin kita rasakan sebagai kenangan yang akan aku pertahankan seandainya kini menjadi keadaan dimana akan ada alasan yang lebih baik dari sekedar bercerita panjang lebar.\r\nUntuk kesekian kali usahakan jangan melakukan hal-hal yang bisa mengakibatkan kurangnya pertunjukan bila akan menjadi kebahagiaan. Sampai saat ini masih ada banyak sekali yang mungkin akan kita ketahui lagi jika ini adalah segalanya.', 1512136378, '');

--
-- Triggers `tb_info_umum`
--
DELIMITER $$
CREATE TRIGGER `hapus_iu` BEFORE DELETE ON `tb_info_umum` FOR EACH ROW DELETE from tb_komentar WHERE no_info=old.no_info
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_karir_center`
--

CREATE TABLE `tb_karir_center` (
  `no_info` char(10) NOT NULL,
  `judul_info` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `waktu` int(11) NOT NULL,
  `ket` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_karir_center`
--

INSERT INTO `tb_karir_center` (`no_info`, `judul_info`, `isi`, `waktu`, `ket`) VALUES
('IK17120101', 'Opokah Iki Jawab Mu', 'Mosok yo kui', 1512131978, '974'),
('IK17120102', 'Info Lowongan Pekerjaan Di PT BLa AAA', 'Bagi Para Alumni yang ingin mendaftarkan diri sebagai ABC silahkan mengirim surat lamaran ke PT BLa AAA.\r\nSemoga suksess', 1512137153, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `nomor` int(11) NOT NULL,
  `no_info` char(10) NOT NULL,
  `no_identitas` varchar(20) NOT NULL,
  `isi` text NOT NULL,
  `waktu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `nomor` int(11) NOT NULL,
  `no_identitas` varchar(20) NOT NULL,
  `pesan` varchar(250) NOT NULL,
  `waktu` int(11) NOT NULL,
  `angkatan` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pesan`
--

INSERT INTO `tb_pesan` (`nomor`, `no_identitas`, `pesan`, `waktu`, `angkatan`) VALUES
(1, '837', 'pesan pertama', 1509971696, 0),
(4, '11110777777', 'gma admin', 1510305729, 0),
(5, 'Admin', 'Dimohon untuk tidak menimbulkan kerusuhan', 1512136912, 0),
(6, '955', 'Siap Minn', 1512301997, 0),
(7, 'Admin', 'Bagus, Selamat menikmati, Salam Alumni', 1512302126, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tb_alumni`
--
ALTER TABLE `tb_alumni`
  ADD PRIMARY KEY (`no_identitas`);

--
-- Indexes for table `tb_info_umum`
--
ALTER TABLE `tb_info_umum`
  ADD PRIMARY KEY (`no_info`);

--
-- Indexes for table `tb_karir_center`
--
ALTER TABLE `tb_karir_center`
  ADD PRIMARY KEY (`no_info`);

--
-- Indexes for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD PRIMARY KEY (`nomor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
