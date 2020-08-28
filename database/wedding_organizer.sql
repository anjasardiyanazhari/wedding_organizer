-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2020 at 03:41 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wedding_organizer`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id_contact` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `email` varchar(225) NOT NULL,
  `message` varchar(225) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id_contact`, `nama`, `email`, `message`, `tanggal_update`) VALUES
(15, 'Saripudin Ambara', 'saripudinambara@gmail.com', 'sangat membantu', '2020-06-24 23:54:44'),
(16, 'Abi Rezardi', 'abirezardi@gmail.com', 'membantu sekali', '2020-06-24 23:54:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fasilitas`
--

CREATE TABLE `tbl_fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode_fasilitas` varchar(255) NOT NULL,
  `nama_fasilitas` varchar(225) NOT NULL,
  `slug_fasilitas` varchar(255) NOT NULL,
  `harga` int(225) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `status_fasilitas` varchar(255) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fasilitas`
--

INSERT INTO `tbl_fasilitas` (`id_fasilitas`, `id_pegawai`, `id_kategori`, `kode_fasilitas`, `nama_fasilitas`, `slug_fasilitas`, `harga`, `deskripsi`, `status_fasilitas`, `foto`, `tanggal_post`, `tanggal_update`) VALUES
(72, 29, 26, '1001', 'Paket Hemat A', '1001', 5000000, 'Paket Rumahan A', 'Publish', 'Rumahan_A.jpg', '2020-07-06 06:47:56', '2020-07-06 04:47:56'),
(73, 29, 26, '1002', 'Paket Hemat B', '1002', 10000000, 'Paket Rumahan', 'Publish', 'Rumahan_B.jpg', '2020-07-06 06:50:00', '2020-07-06 04:50:00'),
(74, 29, 26, '1003', 'Paket Hemat B', '1003', 13000000, 'Paket Rumahan', 'Publish', 'Rumahan_C.jpg', '2020-07-06 07:33:00', '2020-07-06 05:33:00'),
(75, 29, 26, '1004', 'Paket Specta', '1004', 14000000, 'Paket Rumahan', 'Publish', 'Paket_Specta.jpg', '2020-07-08 08:53:49', '2020-07-08 06:53:49'),
(76, 29, 26, '1005', 'Paket Pavorit', '1005', 25000000, 'Paket Rumahan', 'Publish', 'Paket_Pavorit.jpg', '2020-07-08 08:55:52', '2020-07-08 06:55:52'),
(77, 29, 26, '1006', 'Paket Recomended', '1006', 38000000, 'Paket Rumahan', 'Publish', 'Paket_Recomended.jpg', '2020-07-08 08:57:26', '2020-07-08 06:57:26'),
(78, 29, 26, '1007', 'Paket Populer', '1007', 50000000, 'Paket Rumahan', 'Publish', 'Paket_Populer.jpg', '2020-07-08 08:58:12', '2020-07-08 06:58:12'),
(79, 29, 27, '10001', 'Paket Special Populer', '10001', 59000000, 'Paket Gedung', 'Publish', 'Special.jpg', '2020-07-08 09:03:51', '2020-07-08 07:18:56'),
(80, 29, 27, '10002', 'Paket Royal Wedding', '10002', 78000000, 'Paket Gedung', 'Publish', 'Royal_Wedding.jpg', '2020-07-08 09:09:15', '2020-07-08 07:09:15'),
(81, 29, 27, '10003', 'Paket Special', '10003', 44000000, 'Paket Gedung', 'Publish', 'Special1.jpg', '2020-07-08 09:20:46', '2020-07-08 07:20:46'),
(82, 29, 27, '10004', 'Paket Gedung Hemat A', '10004', 13000000, 'Paket Gedung', 'Publish', 'Gedung_Hemat_A.jpg', '2020-07-08 09:22:28', '2020-07-08 07:22:28'),
(83, 29, 27, '10005', 'Paket Gedung Hemat B', '10005', 14500000, 'Paket Gedung', 'Publish', 'Gedung_Hemat_B.jpg', '2020-07-08 09:24:51', '2020-07-08 07:24:51'),
(84, 29, 27, '10006', 'Paket Gedung Hemat C', '10006', 17000000, 'Paket Gedung', 'Publish', 'Gedung_Hemat_C.jpg', '2020-07-08 09:27:00', '2020-07-08 07:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_foto`
--

CREATE TABLE `tbl_foto` (
  `id_foto` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_fasilitas` int(11) NOT NULL,
  `judul_foto` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_galleri`
--

CREATE TABLE `tbl_galleri` (
  `id_galleri` int(11) NOT NULL,
  `judul_foto` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_galleri`
--

INSERT INTO `tbl_galleri` (`id_galleri`, `judul_foto`, `foto`, `tanggal_post`, `tanggal_update`) VALUES
(1, 'New', 'Screenshot_20200805-003445_Instagram.jpg', '2020-04-07 11:49:00', '2020-08-05 00:07:25'),
(3, 'New', 'Screenshot_20200805-002255_Instagram.jpg', '2020-04-07 11:50:34', '2020-08-04 17:23:15'),
(4, 'New', 'Screenshot_20200805-002618_Instagram.jpg', '2020-04-07 11:52:28', '2020-08-05 00:05:07'),
(6, 'New', 'Screenshot_20200805-002810_Instagram.jpg', '2020-04-07 11:54:26', '2020-08-05 00:05:26'),
(8, 'New', 'Screenshot_20200805-003358_Instagram.jpg', '2020-04-07 11:54:47', '2020-08-05 00:07:02'),
(9, 'Di Hotel ', 'Screenshot_20200805-003026_Instagram.jpg', '2020-04-07 11:55:00', '2020-08-05 00:05:45'),
(10, 'New', 'Screenshot_20200805-003131_Instagram.jpg', '2020-04-07 11:55:10', '2020-08-05 00:06:15'),
(12, 'New', 'Screenshot_20200805-003158_Instagram.jpg', '2020-04-07 11:55:31', '2020-08-05 00:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_header_transaksi`
--

CREATE TABLE `tbl_header_transaksi` (
  `id_header_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `tanggal_acara` date NOT NULL,
  `tanggal_selesai_acara` date NOT NULL,
  `tanggal_warna` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(14) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `tanggal_checkout` datetime NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL,
  `status_bayar` varchar(255) NOT NULL,
  `jumlah_bayar` varchar(255) NOT NULL,
  `rekening_pembayaran` varchar(255) NOT NULL,
  `rekening_pelanggan` varchar(255) NOT NULL,
  `bukti_bayar` varchar(255) NOT NULL,
  `id_rekening` int(11) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_header_transaksi`
--

INSERT INTO `tbl_header_transaksi` (`id_header_transaksi`, `id_pelanggan`, `tanggal_acara`, `tanggal_selesai_acara`, `tanggal_warna`, `nama`, `email`, `no_telp`, `alamat`, `kode_transaksi`, `tanggal_checkout`, `jumlah_transaksi`, `status_bayar`, `jumlah_bayar`, `rekening_pembayaran`, `rekening_pelanggan`, `bukti_bayar`, `id_rekening`, `tanggal_bayar`, `nama_bank`, `tanggal_update`) VALUES
(67, 5, '2020-08-20', '2020-08-21', '#FF0000', 'Ahli Madya', 'ahlimadya@gmail.com', '081937037105', 'UBG Mataram', '07082020QKAJYCQ4TGZEKAVP', '2020-08-07 18:49:03', 13000000, 'konfirmasi', '13000000', '123456789', 'Ahlimadya', 'IMG-20200722-WA0005_(2).jpg', 8, '2020-08-10', 'Bank BRI', '2020-08-19 05:40:39'),
(68, 5, '2020-08-14', '2020-08-15', '#0071c5', 'Ahli Madya', 'ahlimadya@gmail.com', '081937037105', 'UBG Mataram', '130820208EOSHLQJM2EK0FCN', '2020-08-13 05:36:58', 50000000, 'lunas', '50000000', '1011011', 'Ahlimadya', 'Untitled.png', 8, '2020-08-10', 'Bank BTN', '2020-08-13 03:48:28'),
(69, 5, '2020-08-28', '2020-08-29', '#0071c5', 'Ahli Madya', 'ahlimadya@gmail.com', '081937037105', 'UBG Mataram', '14082020JAXD4K6ZWFBHTNWY', '2020-08-14 10:06:06', 17000000, 'lunas', '17000000', '1000', 'Ahlimadya', 'Untitled2.png', 8, '2020-08-16', 'Bank BRI', '2020-08-14 08:10:41'),
(70, 5, '2020-08-28', '2020-08-29', '#0071c5', 'Ahli Madya', 'ahlimadya@gmail.com', '081937037105', 'UBG Mataram', '14082020ZCDDQVIJEKLHT6U4', '2020-08-14 10:21:20', 17000000, 'lunas', '17000000', '100000', 'Ahlimadya', 'Untitled3.png', 8, '2020-08-25', 'Bank BRI', '2020-08-14 08:27:55'),
(72, 6, '2020-08-28', '2020-08-29', '#FFD700', 'Anjas Ardiyan Azhari', 'anjas@gmail.com', '081937037105', 'Jln.Medain Mataram, NTB', '14082020OHLGLZEYWWX5AMRS', '2020-08-14 10:31:12', 17000000, 'panding', '', '', '', '', 0, '0000-00-00', '', '2020-08-14 08:31:42'),
(73, 5, '2020-09-22', '2020-09-30', '#0071c5', 'Ahli Madya', 'ahlimadya@gmail.com', '081937037105', 'UBG Mataram', '19082020I2C1VNEUIUA5S9P6', '2020-08-19 07:07:01', 17000000, 'konfirmasi', '1.000.000.000000', '2', 'Ahlimadya', 'IMG-20200722-WA0007_(2).jpg', 1, '2020-08-25', 'Bank Indonesia (BI)', '2020-08-19 05:39:54'),
(74, 5, '2020-09-29', '2020-09-30', '#FF0000', 'Ahli Madya', 'ahlimadya@gmail.com', '081937037105', 'UBG Mataram', '19082020NPL8GHYSYIMKUAC0', '2020-08-19 07:41:18', 17000000, 'konfirmasi', '1.000.000.000.000.000.00', '2', 'Ahlimadya', 'IMG-20200722-WA0005.jpg', 1, '2020-08-31', 'Bank Indonesia (BI)', '2020-08-19 05:45:06'),
(75, 5, '2020-09-30', '2020-09-30', '#FF0000', 'Ahli Madya', 'ahlimadya@gmail.com', '081937037105', 'UBG Mataram', '19082020ULMON5FH4I7PKYLC', '2020-08-19 14:52:10', 31500000, 'konfirmasi', '1.000.000.000000', '2', '2', 'IMG-20200722-WA00051.jpg', 1, '2020-08-25', 'Bank Indonesia (BI)', '2020-08-19 13:25:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `urutan` int(11) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `slug_kategori`, `nama_kategori`, `urutan`, `tanggal_update`) VALUES
(26, 'paket-rumahan', 'Paket Rumahan', 100, '2020-07-06 04:46:39'),
(27, 'paket-gedung', 'Paket Gedung', 1000, '2020-07-08 07:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konfigurasi`
--

CREATE TABLE `tbl_konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `nama_web` varchar(255) NOT NULL,
  `tag_line` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `link_website` varchar(255) DEFAULT NULL,
  `no_telp` varchar(14) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `google_maps` text,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_konfigurasi`
--

INSERT INTO `tbl_konfigurasi` (`id_konfigurasi`, `nama_web`, `tag_line`, `email`, `link_website`, `no_telp`, `alamat`, `google_maps`, `facebook`, `instagram`, `twitter`, `keyword`, `deskripsi`, `logo`, `icon`, `tanggal_update`) VALUES
(1, 'GOLDEN CARE', 'Make Good Preweding', 'goldencare@gmail.com', 'goldencare.com', '0819370371051', 'Jln.Medain Mataram, Lombok, NTB', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3317.4322305215937!2d116.10266288519284!3d-8.5850356556437!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcdc09df2b0eda1%3A0xf72a931b27e2c30b!2sGOLDEN%20CARE%20SALON%20%26%20WO!5e0!3m2!1sid!2sid!4v1584370635238!5m2!1sid!2sid', '@fb_GoldenCare', '@ig_GoldenCare', '@twitter_GoldenCare', 'wedding, Pernikahan', 'wedding organizer', 'icon.png', 'icon1.png', '2020-08-05 00:20:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `no_telp` varchar(14) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `akses_level` varchar(11) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id_pegawai`, `nama`, `username`, `password`, `no_telp`, `alamat`, `akses_level`, `tanggal_update`) VALUES
(29, 'Anjas Ardiyan Azhari', 'Pegawai', '3b9b3a03ca4d44b0fd4e0627c1daa668a47e7c2a', '123456789101', 'Lombok', 'Admin', '2020-05-17 04:54:19'),
(30, 'I ketut', 'Operator', 'd0e687b079fb70f2208d1f8d2c75d64d74925496', '221212121211', 'Bali \r\n\r\n', 'Operator', '2020-08-04 14:25:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `no_telp` varchar(14) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `tanggal_registrasi` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `status`, `nama`, `email`, `password`, `no_telp`, `alamat`, `tanggal_registrasi`, `tanggal_update`) VALUES
(5, 'Pending', 'Ahli Madya', 'ahlimadya@gmail.com', '20652032c9f2a65b3d47c41b36ba67068606acce', '081937037105', 'UBG Mataram', '2020-06-24 09:01:36', '2020-07-07 00:49:54'),
(6, 'Pending', 'Anjas Ardiyan Azhari', 'anjas@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '081937037105', 'Jln.Medain Mataram, NTB', '2020-08-14 10:29:41', '2020-08-14 08:29:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rekening`
--

CREATE TABLE `tbl_rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `nomor_rekening` varchar(225) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `tanggal_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rekening`
--

INSERT INTO `tbl_rekening` (`id_rekening`, `nama_bank`, `nomor_rekening`, `nama_pemilik`, `tanggal_post`) VALUES
(1, 'Bank Mandiri', '12345678910', 'Covid', '2020-05-17 04:32:27'),
(8, 'Bank BTN', '12345678910', 'Virus', '2020-05-17 04:32:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_header_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `kode_transaksi` varchar(225) NOT NULL,
  `tanggal_checkout` datetime NOT NULL,
  `id_fasilitas` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `id_header_transaksi`, `id_pelanggan`, `kode_transaksi`, `tanggal_checkout`, `id_fasilitas`, `harga`, `jumlah`, `total_harga`, `tanggal_update`) VALUES
(49, 0, 5, '07082020QKAJYCQ4TGZEKAVP', '2020-08-07 18:49:03', 82, 13000000, 1, 13000000, '2020-08-07 16:49:21'),
(50, 0, 5, '130820208EOSHLQJM2EK0FCN', '2020-08-13 05:36:58', 78, 50000000, 1, 50000000, '2020-08-13 03:37:31'),
(51, 0, 5, '14082020JAXD4K6ZWFBHTNWY', '2020-08-14 10:06:06', 84, 17000000, 1, 17000000, '2020-08-14 08:06:44'),
(52, 0, 5, '14082020ZCDDQVIJEKLHT6U4', '2020-08-14 10:21:20', 84, 17000000, 1, 17000000, '2020-08-14 08:23:36'),
(53, 0, 6, '14082020OHLGLZEYWWX5AMRS', '2020-08-14 10:31:12', 84, 17000000, 1, 17000000, '2020-08-14 08:31:42'),
(54, 0, 5, '19082020I2C1VNEUIUA5S9P6', '2020-08-19 07:07:01', 84, 17000000, 1, 17000000, '2020-08-19 05:07:13'),
(55, 0, 5, '19082020NPL8GHYSYIMKUAC0', '2020-08-19 07:41:18', 84, 17000000, 1, 17000000, '2020-08-19 05:41:28'),
(56, 0, 5, '19082020ULMON5FH4I7PKYLC', '2020-08-19 14:52:10', 84, 17000000, 1, 17000000, '2020-08-19 12:52:23'),
(57, 0, 5, '19082020ULMON5FH4I7PKYLC', '2020-08-19 14:52:10', 83, 14500000, 1, 14500000, '2020-08-19 12:52:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `tbl_fasilitas`
--
ALTER TABLE `tbl_fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tbl_foto`
--
ALTER TABLE `tbl_foto`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `tbl_foto_ibfk_1` (`id_fasilitas`);

--
-- Indexes for table `tbl_galleri`
--
ALTER TABLE `tbl_galleri`
  ADD PRIMARY KEY (`id_galleri`);

--
-- Indexes for table `tbl_header_transaksi`
--
ALTER TABLE `tbl_header_transaksi`
  ADD PRIMARY KEY (`id_header_transaksi`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_konfigurasi`
--
ALTER TABLE `tbl_konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `kode_transaksi` (`kode_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_fasilitas`
--
ALTER TABLE `tbl_fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `tbl_foto`
--
ALTER TABLE `tbl_foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_galleri`
--
ALTER TABLE `tbl_galleri`
  MODIFY `id_galleri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_header_transaksi`
--
ALTER TABLE `tbl_header_transaksi`
  MODIFY `id_header_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_konfigurasi`
--
ALTER TABLE `tbl_konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_fasilitas`
--
ALTER TABLE `tbl_fasilitas`
  ADD CONSTRAINT `tbl_fasilitas_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id_kategori`);

--
-- Constraints for table `tbl_foto`
--
ALTER TABLE `tbl_foto`
  ADD CONSTRAINT `tbl_foto_ibfk_1` FOREIGN KEY (`id_fasilitas`) REFERENCES `tbl_fasilitas` (`id_fasilitas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
