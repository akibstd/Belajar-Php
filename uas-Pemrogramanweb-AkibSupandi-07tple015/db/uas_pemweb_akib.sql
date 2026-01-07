-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 07, 2026 at 03:32 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_pemweb_akib`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_produk` varchar(10) NOT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `stok` int DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `reorder` int DEFAULT NULL,
  `harga` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_produk`, `nama_produk`, `stok`, `satuan`, `reorder`, `harga`) VALUES
('BR01R4', 'Beras 2kg', 140, 'Box', 123, 28000);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `no_transaksi` varchar(10) NOT NULL,
  `tgl_pembayaran` date DEFAULT NULL,
  `nama_pembeli` varchar(100) DEFAULT NULL,
  `alamat` text,
  `total_pembayaran` int DEFAULT '0',
  `status_bayar` enum('BELUM LUNAS','LUNAS') DEFAULT 'BELUM LUNAS',
  `status_pesanan` enum('PROSES','DIKIRIM') DEFAULT 'PROSES'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`no_transaksi`, `tgl_pembayaran`, `nama_pembeli`, `alamat`, `total_pembayaran`, `status_bayar`, `status_pesanan`) VALUES
('INV-001', '2026-01-07', 'laura 123', 'bandung ciwidey', 0, 'LUNAS', 'DIKIRIM');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `no_transaksi` varchar(10) NOT NULL,
  `tgl_pemesanan` date DEFAULT NULL,
  `nama_pembeli` varchar(100) DEFAULT NULL,
  `alamat` text,
  `total_pembayaran` int DEFAULT '0',
  `status_bayar` enum('BELUM LUNAS','LUNAS') DEFAULT 'BELUM LUNAS',
  `status_pesanan` enum('PROSES','DIKIRIM') DEFAULT 'PROSES'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_produk`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`no_transaksi`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`no_transaksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
