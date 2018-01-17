-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2017 at 07:18 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `i_fashion`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `kategori` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `stok_retur` int(11) DEFAULT NULL,
  `stok_minimum` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `keterangan_produk` text NOT NULL,
  `harga_beli` float(25,0) NOT NULL,
  `harga` float(25,0) NOT NULL,
  `warna` int(11) NOT NULL,
  `ukuran` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama_barang`, `kategori`, `stok`, `stok_retur`, `stok_minimum`, `gambar`, `keterangan_produk`, `harga_beli`, `harga`, `warna`, `ukuran`, `status`) VALUES
(1, 'B0001', 'T-Shirt V Neck', 5, 50, 8, 5, 'B0001.jpg', '-', 25000, 50000, 5, 1, 1),
(2, 'B0002', 'Hoodie Black Razor', 1, 77, 4, 5, 'B0002.jpg', '-', 25000, 125000, 2, 2, 1),
(3, 'B0003', 'T-Shirt Flannel Riot', 1, 80, 2, 5, 'B0002.jpg', '-', 25000, 75000, 3, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE IF NOT EXISTS `detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_barang` varchar(25) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `petugas_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `tanggal`, `kode_barang`, `transaksi_id`, `jumlah`, `petugas_id`) VALUES
(101, '2017-09-01', '1', 116, 5, 1),
(102, '2017-09-01', '2', 116, 5, 1),
(103, '2017-09-01', '3', 116, 5, 1),
(104, '2017-09-01', '3', 117, 3, 1),
(105, '2017-09-01', '2', 117, 3, 1),
(106, '2017-09-01', '1', 117, 3, 1),
(107, '2017-09-01', '2', 118, 2, 1),
(108, '2017-09-01', '1', 119, 2, 1),
(109, '2017-09-01', '1', 120, 3, 1),
(110, '2017-09-01', '2', 120, 4, 1),
(111, '2017-09-01', '2', 121, 6, 1),
(112, '2017-09-01', '3', 121, 8, 1),
(113, '2017-09-01', '1', 122, 3, 1),
(114, '2017-09-01', '1', 122, 2, 1),
(115, '2017-09-01', '3', 122, 2, 1),
(116, '2017-09-01', '1', 123, 5, 2),
(117, '2017-09-01', '2', 123, 3, 2),
(118, '2017-09-01', '3', 123, 2, 2),
(119, '2017-09-01', '2', 124, 3, 2),
(120, '2017-09-01', '3', 124, 2, 2),
(121, '2017-09-01', '2', 126, 2, 2),
(122, '2017-09-01', '3', 126, 2, 2),
(123, '2017-09-01', '2', 127, 2, 2),
(124, '2017-09-01', '3', 127, 2, 2),
(125, '2017-09-01', '1', 128, 2, 2),
(126, '2017-09-01', '3', 128, 2, 2),
(127, '2017-09-01', '2', 129, 2, 1),
(128, '2017-09-01', '1', 130, 3, 1),
(129, '2017-09-01', '3', 130, 3, 1),
(130, '2017-09-01', '2', 131, 3, 1),
(131, '2017-09-01', '3', 131, 3, 1),
(132, '2017-09-01', '1', 132, 5, 1),
(133, '2017-09-01', '3', 132, 2, 1),
(134, '2017-09-01', '1', 133, 3, 1),
(135, '2017-09-01', '2', 133, 2, 1),
(136, '2017-09-01', '1', 134, 7, 1),
(137, '2017-09-01', '3', 134, 4, 1),
(138, '2017-09-01', '1', 135, 5, 1),
(139, '2017-09-01', '3', 135, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Jacket '),
(2, 'Celana'),
(3, 'Dompet'),
(4, 'Sweater'),
(5, 'T Shirt'),
(6, 'Kemeja'),
(7, 'Polo Shirt');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` int(255) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `kontak` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `tanggal`, `nama`, `alamat`, `kontak`, `email`, `status`) VALUES
(1, '2017-08-28', 'Non Member', '-', '-', '-', 1),
(2, '2017-08-28', 'Budi', 'Surabaya', '081254555698', 'budi@gmail.com', 1),
(3, '2017-08-28', 'Toni', 'Medan', '0852465485521', 'toni@gmail.com', 1),
(4, '2017-08-28', 'Andita', 'Bandung', '087215426548', 'andita@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE IF NOT EXISTS `petugas` (
  `kode_petugas` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`kode_petugas`, `username`, `password`, `email`, `level`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '1'),
(2, 'kasir', 'admin', 'reza@gmail.com', '3');

-- --------------------------------------------------------

--
-- Table structure for table `retur_transaksi`
--

CREATE TABLE IF NOT EXISTS `retur_transaksi` (
  `id_retur_transaksi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_barang` varchar(25) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `detail_transaksi_id` int(11) NOT NULL,
  `type` varchar(25) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `petugas_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retur_transaksi`
--

INSERT INTO `retur_transaksi` (`id_retur_transaksi`, `tanggal`, `kode_barang`, `transaksi_id`, `detail_transaksi_id`, `type`, `jumlah`, `status`, `petugas_id`) VALUES
(10, '2017-09-01', '3', 116, 103, 'Barang Rusak', 1, 2, 1),
(11, '2017-09-01', '3', 117, 104, 'Barang Rusak', 1, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `id_supplier` int(255) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `kontak` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `tanggal`, `nama`, `alamat`, `kontak`, `email`, `status`) VALUES
(1, '2017-08-28', 'PT. Mahameru', 'Bandung', '087215426548', 'andita@gmail.com', 1),
(2, '2017-08-28', 'PT. Trisco Apparel', 'Surabaya', '081254555698', 'budi@gmail.com', 1),
(3, '2017-08-28', 'PT. Indo Textile', 'Medan', '0852465485521', 'toni@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_transaksi` varchar(25) NOT NULL,
  `jenis_transaksi` varchar(25) NOT NULL,
  `petugas_id` int(11) NOT NULL,
  `petugas_by` varchar(15) NOT NULL,
  `pelanggan_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `status` varchar(25) NOT NULL,
  `total` float(11,0) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tanggal`, `kode_transaksi`, `jenis_transaksi`, `petugas_id`, `petugas_by`, `pelanggan_id`, `supplier_id`, `status`, `total`) VALUES
(116, '2017-09-01', 'M/201709/0000', 'Barang Masuk', 1, 'admin', 0, 2, 'Verifikasi', 1235000),
(117, '2017-09-01', 'P/201709/0000', 'Barang Keluar', 2, 'admin', 3, 0, 'Verifikasi', 741000),
(118, '2017-09-01', 'M/201709/0001', 'Barang Masuk', 1, 'admin', 0, 2, 'Verifikasi', 248000),
(119, '2017-09-01', 'P/201709/0001', 'Barang Keluar', 2, 'admin', 3, 0, 'Verifikasi', 98000),
(120, '2017-09-01', 'R/201709/0000', 'Barang Retur', 1, 'admin', 2, 2, 'Verifikasi', 643000),
(121, '2017-09-01', 'M/201709/0002', 'Barang Masuk', 1, 'admin', 0, 3, 'Verifikasi', 1336000),
(122, '2017-09-01', 'P/201709/0002', 'Barang Keluar', 2, 'admin', 4, 0, 'Verifikasi', 393000),
(123, '2017-09-01', 'P/201709/0003', 'Barang Keluar', 2, 'reza', 1, 0, 'Verifikasi', 775000),
(124, '2017-09-01', 'P/201709/0004', 'Barang Keluar', 2, 'reza', 3, 0, 'Verifikasi', 520000),
(125, '2017-09-01', 'M/201709/0003', 'Barang Masuk', 2, 'kasir', 0, 1, 'Verifikasi', 0),
(126, '2017-09-01', 'P/201709/0005', 'Barang Keluar', 2, 'kasir', 4, 0, 'Verifikasi', 396000),
(127, '2017-09-01', 'P/201709/0006', 'Barang Keluar', 2, 'kasir', 3, 0, 'Verifikasi', 396000),
(128, '2017-09-01', 'P/201709/0007', 'Barang Keluar', 2, 'kasir', 3, 0, 'Verifikasi', 246000),
(129, '2017-09-01', 'M/201709/0004', 'Barang Masuk', 1, 'admin', 0, 2, 'Verifikasi', 248000),
(130, '2017-09-01', 'P/201709/0008', 'Barang Keluar', 1, 'admin', 3, 0, 'Verifikasi', 369000),
(131, '2017-09-01', 'P/201709/0009', 'Barang Keluar', 1, 'admin', 3, 0, 'Verifikasi', 594000),
(132, '2017-09-01', 'M/201709/0005', 'Barang Masuk', 1, 'admin', 0, 2, 'Verifikasi', 393000),
(133, '2017-09-01', 'P/201709/0010', 'Barang Keluar', 1, 'admin', 1, 0, 'Verifikasi', 400000),
(134, '2017-09-01', 'P/201709/0011', 'Barang Keluar', 1, 'admin', 2, 0, 'Verifikasi', 639000),
(135, '2017-09-01', 'R/201709/0001', 'Barang Retur', 1, 'admin', 2, 2, 'Verifikasi', 393000);

-- --------------------------------------------------------

--
-- Table structure for table `ukuran`
--

CREATE TABLE IF NOT EXISTS `ukuran` (
  `id_ukuran` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ukuran`
--

INSERT INTO `ukuran` (`id_ukuran`, `nama`, `status`) VALUES
(1, 'S', 1),
(2, 'M', 1),
(3, 'L', 1),
(4, 'XL', 1),
(5, 'XXL', 1),
(6, 'XXXL', 1);

-- --------------------------------------------------------

--
-- Table structure for table `warna`
--

CREATE TABLE IF NOT EXISTS `warna` (
  `id_warna` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warna`
--

INSERT INTO `warna` (`id_warna`, `nama`, `status`) VALUES
(1, 'Merah', 1),
(2, 'Kuning', 1),
(3, 'Hijau', 1),
(4, 'Biru', 1),
(5, 'Ungu', 1),
(6, 'Pink', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `kategori` (`kategori`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`kode_petugas`);

--
-- Indexes for table `retur_transaksi`
--
ALTER TABLE `retur_transaksi`
  ADD PRIMARY KEY (`id_retur_transaksi`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- Indexes for table `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`id_warna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=140;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `kode_petugas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `retur_transaksi`
--
ALTER TABLE `retur_transaksi`
  MODIFY `id_retur_transaksi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=136;
--
-- AUTO_INCREMENT for table `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `id_ukuran` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `warna`
--
ALTER TABLE `warna`
  MODIFY `id_warna` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `kategori` (`id_kategori`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
