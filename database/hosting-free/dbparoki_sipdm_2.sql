-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2023 at 02:24 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbparoki_sipdm_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `dana_mandiri`
--

CREATE TABLE `dana_mandiri` (
  `id_dana` int(11) NOT NULL,
  `id_umat` int(11) NOT NULL,
  `bulan` varchar(35) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `id_stasi` int(11) NOT NULL,
  `id_lingkungan` int(11) NOT NULL,
  `dana_wajib` varchar(50) NOT NULL,
  `dana_sukarela` varchar(50) NOT NULL,
  `tgl_pembayaran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lingkungan`
--

CREATE TABLE `lingkungan` (
  `id_lingkungan` int(11) NOT NULL,
  `nama_lingkungan` varchar(50) NOT NULL,
  `id_stasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lingkungan`
--

INSERT INTO `lingkungan` (`id_lingkungan`, `nama_lingkungan`, `id_stasi`) VALUES
(1, 'Santa Agnes', 1),
(2, 'Santa Anna', 1),
(3, 'Santa Clara', 1),
(4, 'Santa Elisabeth', 1),
(5, 'Santa Katarina', 1),
(6, 'Santa Maria Magiore', 1),
(7, 'Santa Maria Tak Bernoda', 1),
(8, 'Santo Agustinus', 1),
(9, 'Santo Andreas', 1),
(10, 'Santo Antonius Padua', 1),
(11, 'Santo Bonaventura', 1),
(12, 'Santo Carolus Borromeus', 1),
(13, 'Santo Felisitas', 1),
(14, 'Santo Ignatius Loyola', 1),
(15, 'Santo Lukas', 1),
(16, 'Santo Markus', 1),
(17, 'Santo Maximilianus Kolbe', 1),
(18, 'Santo Padre Pio', 1),
(19, 'Santo Paskalis Boylon', 1),
(20, 'Santo Paulus', 1),
(21, 'Santo Petrus', 1),
(22, 'Santo Thomas', 1),
(23, 'Santo Vincensius Ferreris', 1),
(24, 'Santo Yohanes', 1),
(25, 'Santa Agnes', 2),
(26, 'Santa Anna', 2),
(27, 'Santa Klara', 2),
(28, 'Santa Maria', 2),
(29, 'Santo Antonius', 2),
(30, 'Santo Bonaventura', 2),
(31, 'Santo Don Bosco', 2),
(32, 'Santo Gabriel', 2),
(33, 'Santo Mikael', 2),
(34, 'Santo Paulus', 2),
(35, 'Santo Thomas', 2),
(36, 'Santo Vincensius', 2),
(37, 'Santo Yohanes Paulus II', 2),
(38, 'Santo Yohanes Pembaptis', 2),
(39, 'Santo Yoseph', 2),
(40, 'Agustinus', 3),
(41, 'Santa Anna', 3),
(42, 'Santa Elisabeth', 3),
(43, 'Santa Maria', 3),
(44, 'Santa Martha', 3),
(45, 'Santa Monika', 3),
(46, 'Santa Theresia', 3),
(47, 'Santo Antonius', 3),
(48, 'Santo Bonaventura', 3),
(49, 'Santo Fransiskus Xaverius', 3),
(50, 'Santo Josep', 3),
(51, 'Santo Karolus', 3),
(52, 'Santo Maximilianus Kolbe', 3),
(53, 'Santo Padre Pio', 3),
(54, 'Santo Paulus', 3),
(55, 'Santo Petrus', 3),
(56, 'Santo Pius', 3),
(57, 'Santo Thomas', 3),
(58, 'Santa Agata', 4),
(59, 'Santa Elisabeth', 4),
(60, 'Santa Maria', 4),
(61, 'Santo Thomas Aquinas', 4),
(62, 'Santo Yohanes', 4),
(63, 'Santo Yosef', 4),
(64, 'Santa Clara', 5),
(65, 'Santa Elisabeth', 5),
(66, 'Santa Lusia', 5),
(67, 'Santa Maria', 5),
(68, 'Santa Regina', 5),
(69, 'Santa Sesilia', 5),
(70, 'Santa Skolastika', 5),
(71, 'Santo Adrianus', 5),
(72, 'Santo Andreas', 5),
(73, 'Santo Antonius Padua', 5),
(74, 'Santo Benediktus', 5),
(75, 'Santo Fransiskus', 5),
(76, 'Santo Ignatius', 5),
(77, 'Santo Mikael', 5),
(78, 'Santo Paulus', 5),
(79, 'Santo Petrus', 5),
(80, 'Santo Rafael', 5),
(81, 'Santo Sebastianus', 5),
(82, 'Santo Thomas', 5),
(83, 'Santo Xaverius', 5),
(84, 'Santo Yohanes', 5),
(85, 'Santo Yoseph', 5),
(86, 'Santa Fransiska Xaveria Cabrini', 6),
(87, 'Santa Teresia Dari Avila', 6),
(88, 'Santo Antonius Padua', 6),
(89, 'Santo Bonaventura', 6),
(90, 'Santo Felix dari Nola', 6),
(91, 'Santo Fransiskus Xaverius', 6);

-- --------------------------------------------------------

--
-- Table structure for table `pastor`
--

CREATE TABLE `pastor` (
  `id_pastor` int(2) NOT NULL,
  `nama_pastor` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pastor`
--

INSERT INTO `pastor` (`id_pastor`, `nama_pastor`, `foto`, `keterangan`) VALUES
(1, 'Pastor Hendri Imanuel', 'p1.png', 'Pastor ini bertugas dari tahun 2019-2022'),
(2, 'Pastor B', 'p1.png', 'Pastor ini bertugas dari tahun 2009-2010'),
(3, 'Pastor C', 'p1.png', 'Pastor ini bertugas dari tahun 2010-2011');

-- --------------------------------------------------------

--
-- Table structure for table `stasi`
--

CREATE TABLE `stasi` (
  `id_stasi` int(11) NOT NULL,
  `nama_stasi` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stasi`
--

INSERT INTO `stasi` (`id_stasi`, `nama_stasi`) VALUES
(1, 'Stasi St. Fransiskus Pasar VI'),
(2, 'Stasi St. Petrus Simpang Kwala'),
(3, 'Stasi St. Laurensius Simpang Selayang'),
(5, 'Stasi Santo Paulus Pasar Baru'),
(6, 'Stasi Santa Theresia Perumnas'),
(7, 'Stasi Santo Yoseph Gedung Johor');

-- --------------------------------------------------------

--
-- Table structure for table `umat`
--

CREATE TABLE `umat` (
  `id_umat` int(11) NOT NULL,
  `no_kk` varchar(50) NOT NULL,
  `nama_kepala_kk` varchar(200) NOT NULL,
  `id_lingkungan` int(11) NOT NULL,
  `id_stasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `umat`
--

INSERT INTO `umat` (`id_umat`, `no_kk`, `nama_kepala_kk`, `id_lingkungan`, `id_stasi`) VALUES
(1, 'K000300005', 'Rukianni Br Bangun', 1, 1),
(2, 'K000300030', 'Danta Sitepu DRS.MM', 1, 1),
(3, 'K000300049', 'Petrus Malem Sembiring Keloko', 1, 1),
(4, 'K000337616', 'Jasman Sitepu', 2, 1),
(5, 'K000337621', 'Njayam Tarigan, Drs', 2, 1),
(6, 'K000337624', 'Kasmen Limbong Ir', 2, 1),
(7, 'K000286426', 'Albertus Tua Simanullang', 3, 1),
(8, 'K000286471', 'Peris Maha', 3, 1),
(9, 'K000286524', 'Jadi Surbakti', 3, 1),
(10, 'K000290968', 'Abibon Nainggolan', 25, 2),
(11, 'K000291058', 'Harun br Sembiring', 25, 2),
(12, 'K000335134', 'Natalis Sitanggang', 28, 2),
(13, 'K000335149', 'Sudiranto Sembiring', 28, 2),
(14, 'K000272398', 'Arifin Siregar', 29, 2),
(15, 'K000272418', 'Makjaiden Marbun', 29, 2),
(16, 'K000207705', 'Srihati Ningsih Br. Sembiring', 42, 3),
(17, 'K000207706', 'Gindu Nainggolan', 42, 3),
(18, 'K000254917', 'Hendra Irawan Purba', 46, 3),
(19, 'K000254940', 'Immanuel Pinem', 46, 3),
(20, 'K000334615', 'Danial Sembiring', 47, 3),
(21, 'K000334644', 'Paten Br Sembiring', 47, 3),
(22, 'K000207482', 'Andika Togan Raya Karo-Karo, ST', 61, 4),
(23, 'K000207483', 'Effendi Ginting', 61, 4),
(24, 'K000329331', 'Felix Selamat Ginting', 62, 4),
(25, 'K000329394', 'Lijon Tarigan', 62, 4),
(26, 'K000330938', 'Ramang Tarigan', 63, 4),
(27, 'K000331008', 'Bukti Sembiring', 63, 4),
(28, 'K000270686', 'Nikco Santro Ginting', 66, 5),
(29, 'K000270697', 'Kristina Lusiana Br Sianipar', 66, 5),
(30, 'K000285322', 'Luat P. Samosir', 67, 5),
(31, 'K000286345', 'Marulak Haloman Simamora', 67, 5),
(32, 'K000340183', 'Lasman Martunas S Tampubolon', 68, 5),
(33, 'K000340186', 'Bonardo Hasitongan Siregar', 68, 5),
(34, 'K000207649', 'Morry Paulus Nainggolan', 70, 5),
(35, 'K000207650', 'Jaya Prima Sitepu', 70, 5),
(36, 'K000251775', 'Ukur Kami Surbakti', 87, 6),
(37, 'K000251884', 'Gerardus Gemuruh Tarigan', 87, 6),
(38, 'K000292129', 'Adrianti Tarigan', 90, 6),
(39, 'K000292148', 'Rasman Pinem', 90, 6),
(40, 'K000257479', 'Roy Stepanus Ginting', 91, 6),
(41, 'K000257499', 'Fernando Simalango', 91, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `hak_akses`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 1),
(2, 'dpp', '0637dc96378e1f37fd5605faa0f9e2d1', 2),
(3, 'pastor', 'c0d941e34a00b363f8216656d314526e', 3),
(4, 'stasi_st_fransiskus_psr_vi', 'e71a17fac71d372e652735ce82cd0270', 4),
(5, 'stasi_st_petrus', '20279646d9f7607a032a23ba49423b8a', 4),
(6, 'stasi_laurensius', '0e5c0546ed63eb75aeb293e70b571e85', 4),
(7, 'stasi_st_paulus', '4742741886a87b5f5da984164b0a5545', 4),
(8, 'stasi_st_theresia', '2b4f8286eb76dfd82af0de3be00da5b0', 4),
(9, 'stasi_st_yoseph', 'dbf20197aa0b9e2a7df2e51a1e51405d', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dana_mandiri`
--
ALTER TABLE `dana_mandiri`
  ADD PRIMARY KEY (`id_dana`);

--
-- Indexes for table `lingkungan`
--
ALTER TABLE `lingkungan`
  ADD PRIMARY KEY (`id_lingkungan`);

--
-- Indexes for table `pastor`
--
ALTER TABLE `pastor`
  ADD PRIMARY KEY (`id_pastor`);

--
-- Indexes for table `stasi`
--
ALTER TABLE `stasi`
  ADD PRIMARY KEY (`id_stasi`);

--
-- Indexes for table `umat`
--
ALTER TABLE `umat`
  ADD PRIMARY KEY (`id_umat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dana_mandiri`
--
ALTER TABLE `dana_mandiri`
  MODIFY `id_dana` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lingkungan`
--
ALTER TABLE `lingkungan`
  MODIFY `id_lingkungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `pastor`
--
ALTER TABLE `pastor`
  MODIFY `id_pastor` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stasi`
--
ALTER TABLE `stasi`
  MODIFY `id_stasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `umat`
--
ALTER TABLE `umat`
  MODIFY `id_umat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
