-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2019 at 12:10 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pt mitra integrasi digital`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photos` varchar(255) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `username`, `email`, `password`, `name`, `photos`) VALUES
(4, 'zolaaw', 'zola@gmail.com', '$2y$10$oJrxIGuIXYSNWFovUe.D5u5wezWs0T2IqKBNdlAtN98lI1WrfNI5.', 'Manzola Caniago', 'default.png'),
(6, 'davide', 'david@mail.com', '$2y$10$VRb6tr.rdF.0ma8ughAVmOArHRXGr.zXlHuTi5oA8YhqogY53GLZC', 'David', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pembelian` int(200) NOT NULL,
  `nama_pembeli` varchar(255) NOT NULL,
  `no_handphone` varchar(233) NOT NULL,
  `jumlah_pembelian` varchar(233) NOT NULL,
  `jenis_pembelian` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pembelian`, `nama_pembeli`, `no_handphone`, `jumlah_pembelian`, `jenis_pembelian`) VALUES
(9, 'Manzola Caniago', '0858-6565-5000', '10', 'Product Nine'),
(10, 'Bill Gates', '0812-0098-6456', '1', 'Product Five'),
(11, 'Steve Jobs', '0899-0876-8976', '30', 'Product Three'),
(12, 'Mark Zuckerberg', '0112-9583-7493', '50', 'Product One'),
(13, 'Zola', '0856-0595-5890', '5', 'Product Seven');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_barang` int(10) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `harga_barang` varchar(20) NOT NULL,
  `stock_barang` varchar(50) NOT NULL,
  `status` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_barang`, `nama_barang`, `harga_barang`, `stock_barang`, `status`) VALUES
(1, 'Product One', 'Rp. 10.000.000.00', '100', 0),
(2, 'Product Two', 'Rp. 7.000.000.00', '80', 0),
(3, 'Product Three', 'Rp. 5.000.000.00', '50', 0),
(4, 'Product Four', 'Rp. 1.000.000.00', '30', 0),
(5, 'Product Five', 'Rp. 500.000.00', '15', 0),
(6, 'Product Six', 'Rp. 200.000', '10', 0),
(7, 'Product Seven', 'Rp. 250.000', '20', 0),
(8, 'Product Eight', 'Rp. 1.500.000', '300', 0),
(9, 'Product Nine', 'Rp. 20.000', '500', 0),
(10, 'Product Ten', 'Rp. 30.000', '255', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photos` varchar(255) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `name`, `photos`) VALUES
(10, 'manzola13', 'manzolacaniago13@gmail.com', '$2y$10$0LLA2Zqo2TYg3w05RI41ju7I1ibsz4Cd1NrVR5qfD0dR.8vE1B/9i', 'Manzola Caniago', 'default.png'),
(11, 'bambang13', 'bambang@gmail.com', '$2y$10$.D5iCJmsHyrq.HO5PVqss.ytFTi5G77CoofRfr5dp5AkTR73b0ao2', 'Bambang', 'default.png'),
(12, 'admin', 'admin@mail.com', '$2y$10$VPwVeKsPIxuilD91dnkl4.WB.Kikf5h9of22cGseTGw1JD2BFuKmy', 'Administrator', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pembelian` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
