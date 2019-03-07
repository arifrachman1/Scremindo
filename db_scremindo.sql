-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2018 at 09:33 AM
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
  `foto_admin` varchar(100) NOT NULL,
  `tempat_lahir` char(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(12) NOT NULL,
  `no_telepon` char(13) NOT NULL,
  `alamat` text NOT NULL,
  `email` char(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`kode_admin`, `nama`, `foto_admin`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `no_telepon`, `alamat`, `email`, `password`) VALUES
(15, 'romi', '5c0d04bf78359.jpg', 'jember ijij', '2018-12-07', 'asd', '08999999999', 'jember', 'romi05091998@gmail.com', '12345'),
(16, 'qwe', '5c0d537946954.jpg', 'Lumajang', '2018-12-19', 'qweqwe', 'qweqwe123123', 'Lumajang', 'qwerty', '123'),
(17, 'romi', '5c0d54365c82c.jpg', 'jember ijij', '2018-12-24', 'qweqwe', '08191191819', 'Lumajang', 'admin1', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_artikel`
--

CREATE TABLE `tbl_artikel` (
  `kode_artikel` int(11) NOT NULL,
  `judul_artikel` varchar(150) NOT NULL,
  `isi_artikel` text NOT NULL,
  `gambar_artikel` varchar(100) NOT NULL,
  `tanggal_artikel` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_artikel`
--

INSERT INTO `tbl_artikel` (`kode_artikel`, `judul_artikel`, `isi_artikel`, `gambar_artikel`, `tanggal_artikel`) VALUES
(32, 'Dampak Buruk Junk Food Untuk Kesehatan Tubuh', 'Seringkali kita makan makanan junkfood yang kenyataannya merupakan makanan yang belum tentu sehat bagi tubuh. Junkfood merupakan makanan yang mengandung kalori yang besar sehingga menyebabkan timbunan lemak. Hal ini menyebabkan seseorang menjadi mudah terkena penyakit seperti stroke dan serangan jantung.', '5c17175f2073c.jpg', '2018-12-13'),
(33, 'Manfaat Sayur Bagi Kesehatan', 'Sayur merupakan salah satu dari makanan sehat yang baik bagi tubuh kita. Sayur merupakan komponen 4 sehat 5 sempurna. Kandungan gizi sayur sangat baik bagi kesehatan tubuh karena mengandung beberapa vitamin dan mineral kompleks. Selain itu, sayur mengandung antioksidan untuk memperkuat sistem imun tubuh agar tidak mudah sakit.', '5c171d7442c28.jpg', '2018-12-20');

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
(1, 'Muhammad Arief Rachman Muttaqi', 'Jember', '1999-05-13', 'Laki-laki', '082334035530', 'Jember', 'mariefrachmanm@gmail.com', '111'),
(2, 'Muhammad Arief Rachman Muttaqi', 'Jember', '2016-02-03', 'Laki-laki', '082334035530', 'Jember', 'arief@gmail.com', '111'),
(3, 'romi', 'lumajang', '2018-12-03', 'Laki-laki', 'asd', 'kakakak', 'romi@yahoo.co.id', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detailtransaksi`
--

CREATE TABLE `tbl_detailtransaksi` (
  `kode_detailtransaksi` tinyint(5) NOT NULL,
  `kode_transaksi` tinyint(5) NOT NULL,
  `kode_produk` tinyint(5) NOT NULL,
  `jumlah_produk` tinyint(5) NOT NULL,
  `subtotal_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detailtransaksi`
--

INSERT INTO `tbl_detailtransaksi` (`kode_detailtransaksi`, `kode_transaksi`, `kode_produk`, `jumlah_produk`, `subtotal_harga`) VALUES
(51, 63, 23, 2, 10000),
(52, 64, 23, 99, 495000),
(53, 64, 23, 20, 100000),
(54, 64, 22, 4, 20000),
(55, 64, 23, 127, 5000000),
(56, 64, 23, 127, 5000000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `kode_produk` tinyint(5) NOT NULL,
  `nama_produk` char(30) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `stok` int(4) NOT NULL,
  `harga` int(11) NOT NULL,
  `tgl_pembuatan` date NOT NULL,
  `tgl_kadaluarsa` date NOT NULL,
  `detail_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`kode_produk`, `nama_produk`, `foto_produk`, `stok`, `harga`, `tgl_pembuatan`, `tgl_kadaluarsa`, `detail_produk`) VALUES
(22, 'Es krim sawi', '5c132c93abece.jpg', 22, 5000, '2018-12-14', '2018-12-28', 'Merupakan produk pertama '),
(23, 'Es krim labu', '5c165fe3e8a46.jpg', -2000, 5000, '2018-12-16', '2019-01-31', 'Terbuat dari susu dan labu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `kode_transaksi` tinyint(5) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `total_jumlah_produk` tinyint(5) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `metode_pembayaran` char(20) NOT NULL,
  `foto_bukti_pembayaran` varchar(255) NOT NULL,
  `keterangan` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`kode_transaksi`, `id_customer`, `tanggal`, `total_jumlah_produk`, `total_harga`, `metode_pembayaran`, `foto_bukti_pembayaran`, `keterangan`) VALUES
(63, 1, '2018-12-16', NULL, NULL, 'cash on delivery', '', 'Lunas'),
(64, 1, '2018-12-17', NULL, NULL, 'cash on delivery', '', 'Belum Lunas'),
(66, 1, '2018-12-17', NULL, NULL, 'transfer via bank', '5c16f18941650.png', 'Lunas'),
(67, 1, '2018-12-17', NULL, NULL, 'cash on delivery', '', NULL),
(68, 1, '2018-12-17', NULL, NULL, 'cash on delivery', '', NULL),
(70, 1, '2018-12-17', NULL, NULL, 'transfer via bank', '5c173aacc8248.png', 'Lunas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`kode_admin`);

--
-- Indexes for table `tbl_artikel`
--
ALTER TABLE `tbl_artikel`
  ADD PRIMARY KEY (`kode_artikel`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `tbl_detailtransaksi`
--
ALTER TABLE `tbl_detailtransaksi`
  ADD PRIMARY KEY (`kode_detailtransaksi`),
  ADD KEY `kode_produk` (`kode_produk`),
  ADD KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`kode_produk`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`kode_transaksi`),
  ADD KEY `NIK` (`id_customer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `kode_admin` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_artikel`
--
ALTER TABLE `tbl_artikel`
  MODIFY `kode_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_detailtransaksi`
--
ALTER TABLE `tbl_detailtransaksi`
  MODIFY `kode_detailtransaksi` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `kode_produk` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `kode_transaksi` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_detailtransaksi`
--
ALTER TABLE `tbl_detailtransaksi`
  ADD CONSTRAINT `tbl_detailtransaksi_ibfk_1` FOREIGN KEY (`kode_produk`) REFERENCES `tbl_produk` (`kode_produk`),
  ADD CONSTRAINT `tbl_detailtransaksi_ibfk_2` FOREIGN KEY (`kode_transaksi`) REFERENCES `tbl_transaksi` (`kode_transaksi`);

--
-- Constraints for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD CONSTRAINT `tbl_transaksi_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `tbl_customer` (`id_customer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
