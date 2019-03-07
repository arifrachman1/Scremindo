-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2018 at 12:21 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_scremindo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `kode_admin` tinyint(5) NOT NULL,
  `nama` char(30) NOT NULL,
  `tempat_lahir` char(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis _kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `no_telepon` char(13) NOT NULL,
  `alamat` text NOT NULL,
  `email` char(50) NOT NULL,
  `password` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `kode_barang` tinyint(5) NOT NULL,
  `nama_barang` char(30) NOT NULL,
  `stok` int(4) NOT NULL,
  `harga` int(10) NOT NULL,
  `tgl_pembuatan` date NOT NULL,
  `tgl_kadaluarsa` date NOT NULL,
  `foto_barang` char(10) NOT NULL,
  `detail_barang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`kode_barang`, `nama_barang`, `stok`, `harga`, `tgl_pembuatan`, `tgl_kadaluarsa`, `foto_barang`, `detail_barang`) VALUES
(1, 'Es sawi', 20, 5000, '2018-11-22', '2018-12-22', '1.jpg', 'Sehat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id_customer` int(11) NOT NULL,
  `nama` char(30) COLLATE armscii8_bin NOT NULL,
  `tempat_lahir` char(15) COLLATE armscii8_bin NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan','','') COLLATE armscii8_bin NOT NULL,
  `no_telepon` char(13) COLLATE armscii8_bin NOT NULL,
  `alamat` tinytext COLLATE armscii8_bin NOT NULL,
  `email` varchar(30) COLLATE armscii8_bin NOT NULL,
  `password` varchar(255) COLLATE armscii8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id_customer`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `no_telepon`, `alamat`, `email`, `password`) VALUES
(1, 'Muhammad Arief Rachman Muttaqi', 'Jember', '1999-05-13', 'Laki-laki', '082334035530', 'Jember', 'mariefrachmanm@gmail.com', '123'),
(2, 'Muhammad Arief Rachman Muttaqi', 'Jember', '2016-02-03', 'Laki-laki', '082334035530', 'Jember', 'arief@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detailtransaksi`
--

CREATE TABLE `tbl_detailtransaksi` (
  `no_faktur` tinyint(5) NOT NULL,
  `kode_barang` tinyint(5) NOT NULL,
  `jumlah_barang` int(5) NOT NULL,
  `sub_totalharga` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `kode_transaksi` tinyint(5) NOT NULL,
  `no_faktur` tinyint(5) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `kode_admin` tinyint(5) NOT NULL,
  `jumlah_barang` int(5) NOT NULL,
  `harga_total` int(20) NOT NULL,
  `tanggal` date NOT NULL,
  `proses_bayar` enum('transfer','bayar di tempat') NOT NULL,
  `keterangan` enum('lunas','belum lunas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`kode_admin`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `tbl_detailtransaksi`
--
ALTER TABLE `tbl_detailtransaksi`
  ADD PRIMARY KEY (`no_faktur`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`kode_transaksi`),
  ADD KEY `no_faktur` (`no_faktur`),
  ADD KEY `NIK` (`id_customer`),
  ADD KEY `kode_admin` (`kode_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `kode_admin` tinyint(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `kode_barang` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_detailtransaksi`
--
ALTER TABLE `tbl_detailtransaksi`
  MODIFY `no_faktur` tinyint(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `kode_transaksi` tinyint(5) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_detailtransaksi`
--
ALTER TABLE `tbl_detailtransaksi`
  ADD CONSTRAINT `tbl_detailtransaksi_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `tbl_barang` (`kode_barang`);

--
-- Constraints for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD CONSTRAINT `tbl_transaksi_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `tbl_customer` (`id_customer`),
  ADD CONSTRAINT `tbl_transaksi_ibfk_2` FOREIGN KEY (`kode_admin`) REFERENCES `tbl_admin` (`kode_admin`),
  ADD CONSTRAINT `tbl_transaksi_ibfk_3` FOREIGN KEY (`no_faktur`) REFERENCES `tbl_detailtransaksi` (`no_faktur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
