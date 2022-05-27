-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2016 at 12:35 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `kodebarang` char(10) NOT NULL,
  `namabarang` varchar(30) NOT NULL,
  `stok` char(10) NOT NULL,
  `tglupdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kodebarang`, `namabarang`, `stok`, `tglupdate`) VALUES
('KB01', 'Soklin', '200', '2016-12-21'),
('KB02', 'Rinso', '200', '2016-12-10'),
('KB03', 'Softek', '290', '2016-12-17');

-- --------------------------------------------------------

--
-- Table structure for table `jenislondri`
--

CREATE TABLE IF NOT EXISTS `jenislondri` (
  `idjenislondri` char(10) NOT NULL,
  `namajenislondri` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenislondri`
--

INSERT INTO `jenislondri` (`idjenislondri`, `namajenislondri`) VALUES
('jl01', 'Kiloan'),
('jl03', 'Khusus');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `idk` int(11) NOT NULL,
  `nik` char(25) NOT NULL,
  `namak` varchar(30) NOT NULL,
  `alamatk` text NOT NULL,
  `hpk` char(15) NOT NULL,
  `jk` char(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`idk`, `nik`, `namak`, `alamatk`, `hpk`, `jk`) VALUES
(9, '14150770001', 'Aay Susilawat', 'Jauh', '02293000311', 'Perempuan'),
(10, '14150770002', 'Slamet Riyadi', 'Empang Sari', '02293000310', 'Laki-laki');

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE IF NOT EXISTS `konsumen` (
  `kodekonsumen` char(10) NOT NULL,
  `namakonsumen` varchar(30) NOT NULL,
  `almtkonsumen` text NOT NULL,
  `hpkonsumen` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`kodekonsumen`, `namakonsumen`, `almtkonsumen`, `hpkonsumen`) VALUES
('P0001', 'Ajat Sudrajat', 'Jauh', '02293000310'),
('P0002', 'Jatnika', 'Kutai', '08179187676'),
('P0003', 'uuu', 'kk', '02293000310'),
('P0004', 'Sukma Wijaya', 'Jln. Cihampelas No.12', '089688896248'),
('P0005', 'Ijah Mea', 'Citepus', '085722798116'),
('P0006', 'Ehab', 'Empang', '02293000310'),
('P0007', 'jj', 'nn', '089765'),
('P0008', '', '', ''),
('P0009', '', '', ''),
('P0010', 'Kkoko', 'Jauh', '02293000310');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `namauser` varchar(30) NOT NULL,
  `level` char(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `namauser`, `level`) VALUES
(1, 'real', 'good', 'real good', '1'),
(5, 'aay123', 'aay123', 'Aay Susilawat', '2'),
(6, 'imetzz12', 'imetzz12', 'Slamet Riyadi', '2');

-- --------------------------------------------------------

--
-- Table structure for table `pemakaianbarang`
--

CREATE TABLE IF NOT EXISTS `pemakaianbarang` (
  `kodepengeluaran` int(11) NOT NULL,
  `kodebarang` char(15) NOT NULL,
  `jumlah` char(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemakaianbarang`
--

INSERT INTO `pemakaianbarang` (`kodepengeluaran`, `kodebarang`, `jumlah`) VALUES
(1, 'KB02', '10'),
(2, 'KB01', '5'),
(3, 'KB03', '10');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
  `nopembelian` char(10) NOT NULL,
  `idsupplier` char(10) NOT NULL,
  `namabarang` varchar(30) NOT NULL,
  `tglpembelian` date NOT NULL,
  `totalpembelian` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`nopembelian`, `idsupplier`, `namabarang`, `tglpembelian`, `totalpembelian`) VALUES
('001', 'S01', 'Soklin', '2016-12-21', '100000'),
('002', 'S02', 'Rinso', '2016-12-10', '250000'),
('003', 'S03', 'Softek', '2016-12-17', '300000');

-- --------------------------------------------------------

--
-- Table structure for table `rincianbeli`
--

CREATE TABLE IF NOT EXISTS `rincianbeli` (
  `norinci` int(11) NOT NULL,
  `nopembelian` char(15) NOT NULL,
  `jumlah` char(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rincianbeli`
--

INSERT INTO `rincianbeli` (`norinci`, `nopembelian`, `jumlah`) VALUES
(4, '001', '100'),
(5, '002', '250'),
(6, '003', '300');

-- --------------------------------------------------------

--
-- Table structure for table `rinciantransaksi`
--

CREATE TABLE IF NOT EXISTS `rinciantransaksi` (
  `idrincian` int(11) NOT NULL,
  `notransaksi` char(10) NOT NULL,
  `jumlahrincian` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rinciantransaksi`
--

INSERT INTO `rinciantransaksi` (`idrincian`, `notransaksi`, `jumlahrincian`) VALUES
(23, 'NT01', 2),
(24, 'NT02', 9),
(25, 'NT03', 1),
(26, 'NT04', 2),
(27, 'NT05', 1),
(28, 'NT06', 2),
(29, 'NT07', 3),
(30, 'NT08', 0),
(31, 'NT09', 0),
(32, 'NT10', 2);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `idsupplier` char(10) NOT NULL,
  `namasupplier` varchar(30) NOT NULL,
  `alamatsupplier` text NOT NULL,
  `telpsupplier` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`idsupplier`, `namasupplier`, `alamatsupplier`, `telpsupplier`) VALUES
('S01', 'PT Cinta Abadi', 'Jauh', '02293000310'),
('S02', 'PT Teu Gaduh Artos', 'Jl.Keputihan No.1', '02179187676'),
('S03', 'PT Inti', 'jauh', '02293000310');

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE IF NOT EXISTS `tarif` (
  `idjenispakaian` int(10) NOT NULL,
  `idjenislondri` char(10) NOT NULL,
  `namapakaian` varchar(30) NOT NULL,
  `tarif` char(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`idjenispakaian`, `idjenislondri`, `namapakaian`, `tarif`) VALUES
(5, 'jl01', 'Regular (Per Kg)', '10000'),
(9, 'jl01', 'Kebaya Hajatan (Per Paket)', '40000'),
(10, 'jl01', 'Hanya Setrika (Per Kg)', '5000'),
(11, 'jl01', 'Dry Cleaning (Per Kg)', '8000');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `notransaksi` char(15) NOT NULL,
  `kodekonsumen` char(10) NOT NULL,
  `namapakaian` varchar(30) NOT NULL,
  `tgltransaksi` date NOT NULL,
  `tglambil` date NOT NULL,
  `diskon` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`notransaksi`, `kodekonsumen`, `namapakaian`, `tgltransaksi`, `tglambil`, `diskon`) VALUES
('NT01', 'P0001', 'Hanya Setrika (Per Kg)', '2016-12-16', '2016-12-17', '1'),
('NT02', 'P0002', 'Regular (Per Kg)', '2016-12-16', '2016-12-19', '1'),
('NT03', 'P0003', 'Hanya Setrika (Per Kg)', '2016-12-17', '2016-12-24', '1'),
('NT04', 'P0004', 'Dry Cleaning (Per Kg)', '2016-12-17', '2016-12-18', '1'),
('NT05', 'P0005', 'Kebaya Hajatan (Per Paket)', '2016-12-17', '2016-12-18', '1'),
('NT06', 'P0006', 'Dry Cleaning (Per Kg)', '2016-12-17', '2016-12-18', '1'),
('NT07', 'P0007', 'Regular (Per Kg)', '2016-12-07', '2016-12-15', '1'),
('NT08', 'P0008', '', '0000-00-00', '0000-00-00', '1'),
('NT09', 'P0009', '', '0000-00-00', '0000-00-00', '1'),
('NT10', 'P0010', 'Regular (Per Kg)', '2016-12-22', '2016-12-24', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kodebarang`);

--
-- Indexes for table `jenislondri`
--
ALTER TABLE `jenislondri`
  ADD PRIMARY KEY (`idjenislondri`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`idk`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`kodekonsumen`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemakaianbarang`
--
ALTER TABLE `pemakaianbarang`
  ADD PRIMARY KEY (`kodepengeluaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`nopembelian`);

--
-- Indexes for table `rincianbeli`
--
ALTER TABLE `rincianbeli`
  ADD PRIMARY KEY (`norinci`);

--
-- Indexes for table `rinciantransaksi`
--
ALTER TABLE `rinciantransaksi`
  ADD PRIMARY KEY (`idrincian`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`idsupplier`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`idjenispakaian`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`notransaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `idk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pemakaianbarang`
--
ALTER TABLE `pemakaianbarang`
  MODIFY `kodepengeluaran` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rincianbeli`
--
ALTER TABLE `rincianbeli`
  MODIFY `norinci` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `rinciantransaksi`
--
ALTER TABLE `rinciantransaksi`
  MODIFY `idrincian` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `idjenispakaian` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
