-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2020 at 08:04 AM
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
(7, 29, 9, '1', 'Hotel Madani', '1', 1000000, 'Gedung A', 'Draft', '7c341fdca3b412c2dd90ba3a91678cd1-10.jpg', '2020-04-08 07:24:03', '2020-05-17 05:10:57'),
(16, 29, 9, 'dsd', 'Hotel Aston ', 'dsd', 1000000, 'Gedung C', 'Publish', 'dekorasi-pernikahan-bandung-murah-dan-bagus-1.jpg', '2020-05-16 17:20:34', '2020-05-17 05:11:18'),
(18, 29, 16, '2', 'Avanza', '2', 1000000, 'Tahun 2015', 'Publish', 'avanza-silver1.jpg', '2020-05-17 07:12:08', '2020-05-17 05:16:14');

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

--
-- Dumping data for table `tbl_foto`
--

INSERT INTO `tbl_foto` (`id_foto`, `id_pegawai`, `id_fasilitas`, `judul_foto`, `foto`, `tanggal_update`) VALUES
(1, 29, 7, 'ddd', 'Screenshot_(11).png', '2020-04-08 06:37:53');

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
(1, 'Di Hotel Malomba', '1.png', '2020-04-07 11:49:00', '2020-04-07 09:49:00'),
(3, 'Di Hotel Manana', '3.png', '2020-04-07 11:50:34', '2020-04-07 09:50:34'),
(4, 'Di Hotel Minasa', '15.png', '2020-04-07 11:52:28', '2020-04-07 09:52:28'),
(5, 'ddd', '14.png', '2020-04-07 11:54:16', '2020-04-07 09:54:16'),
(6, 'Depan', '12.png', '2020-04-07 11:54:26', '2020-04-07 09:54:26'),
(7, '1', '11.png', '2020-04-07 11:54:36', '2020-04-07 09:54:36'),
(8, 'ddddddddd', '6.png', '2020-04-07 11:54:47', '2020-04-07 09:54:47'),
(9, 'ccccccc', '5.png', '2020-04-07 11:55:00', '2020-04-07 09:55:00'),
(10, 'ddd', '7.png', '2020-04-07 11:55:10', '2020-04-07 09:55:10'),
(11, 'ccccccc', '8.png', '2020-04-07 11:55:23', '2020-04-07 09:55:23'),
(12, 'Depan', 'Screenshot_(12).png', '2020-04-07 11:55:31', '2020-04-07 09:55:31'),
(13, 'Depan', 'Screenshot_(14).png', '2020-04-07 11:55:40', '2020-04-07 09:55:40'),
(14, 'Belakang', 'Screenshot_(10).png', '2020-04-07 11:55:49', '2020-04-07 09:55:49'),
(15, 'ddddddddd', 'Screenshot_(26).png', '2020-04-07 11:55:58', '2020-04-07 09:55:58'),
(16, 'Depan', 'Screenshot_(4).png', '2020-04-07 11:56:23', '2020-04-07 09:56:23'),
(17, 'ddddddddd', 'Screenshot_(6).png', '2020-04-07 11:56:32', '2020-04-07 09:56:32'),
(18, 'Depan', 'Screenshot_(4)1.png', '2020-04-07 11:56:42', '2020-04-07 09:56:42'),
(19, '1', 'Screenshot_(13).png', '2020-04-07 11:57:47', '2020-04-07 09:57:46'),
(20, 'ddddddddd', 'Screenshot_(7).png', '2020-04-07 11:57:55', '2020-04-07 09:57:55'),
(21, 'ddddddddd', '4.png', '2020-04-07 11:58:18', '2020-04-07 09:58:18'),
(22, 'Depan', 'Screenshot_(10)1.png', '2020-04-07 11:58:34', '2020-04-07 09:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_header_transaksi`
--

CREATE TABLE `tbl_header_transaksi` (
  `id_header_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_acara` varchar(255) NOT NULL,
  `tanggal_selesai_acara` varchar(255) NOT NULL,
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
  `tanggal_bayar` varchar(255) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(9, 'dekorasi', 'Dekorasi', 2, '2020-01-18 18:46:24'),
(10, 'honeymoon', 'Honeymoon', 3, '2020-01-18 18:46:35'),
(11, 'makanan', 'Makanan', 4, '2020-01-18 18:46:44'),
(12, 'salon', 'Salon', 5, '2020-01-18 18:44:37'),
(13, 'busana', 'Busana', 6, '2020-01-18 18:44:45'),
(14, 'bunga', 'Bunga', 7, '2020-01-18 18:44:53'),
(15, 'kue-pengantin', 'Kue Pengantin', 8, '2020-01-18 18:45:01'),
(16, 'kendaraan', 'Kendaraan', 9, '2020-01-18 18:45:18'),
(18, 'kartu-undangan', 'Kartu Undangan', 11, '2020-01-18 18:45:38'),
(19, 'souvenir', 'Souvenir', 12, '2020-01-18 18:45:47'),
(20, 'entertaiment', 'Entertaiment', 13, '2020-01-18 18:45:55'),
(21, 'pendukung-acara', 'Pendukung Acara', 14, '2020-01-18 18:46:06'),
(25, 'gedung', 'Gedung', 1, '2020-04-08 05:25:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_komentar`
--

CREATE TABLE `tbl_komentar` (
  `id_komentar` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `email` varchar(225) NOT NULL,
  `komentar` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_komentar`
--

INSERT INTO `tbl_komentar` (`id_komentar`, `nama`, `email`, `komentar`) VALUES
(15, 'Saripudin Ambara', 'saripudinambara@gmail.com', 'sangat membantu'),
(16, 'Abi Rezardi', 'abirezardi@gmail.com', 'membantu sekali'),
(17, 'Alfandi ', 'alfandi@gmail.com', 'Mohon untuk di proses');

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
  `icon_administrator` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_konfigurasi`
--

INSERT INTO `tbl_konfigurasi` (`id_konfigurasi`, `nama_web`, `tag_line`, `email`, `link_website`, `no_telp`, `alamat`, `google_maps`, `facebook`, `instagram`, `twitter`, `keyword`, `deskripsi`, `logo`, `icon`, `icon_administrator`, `tanggal_update`) VALUES
(1, 'GOLDEN CARE', 'Make Good Preweding', 'goldencare@gmail.com', 'goldencare.com', '0819370371051', 'Jln.Medain Mataram, Lombok, NTB', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3317.4322305215937!2d116.10266288519284!3d-8.5850356556437!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcdc09df2b0eda1%3A0xf72a931b27e2c30b!2sGOLDEN%20CARE%20SALON%20%26%20WO!5e0!3m2!1sid!2sid!4v1584370635238!5m2!1sid!2sid', '@fb_GoldenCare', '@ig_GoldenCare', '@twitter_GoldenCare', 'wedding, Pernikahan', 'wedding organizer', 'Artboard_1.png', 'Artboard_1.png', '', '2020-05-17 04:40:40');

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
(30, 'I ketut jayadi', 'Operator', 'd0e687b079fb70f2208d1f8d2c75d64d74925496', '221212121211', 'Bali \r\n\r\n', 'Operator', '2020-05-17 04:53:40');

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
(3, 'Pending', 'Abi Rezardi', 'abirezardi@gmail.com', 'f35be6b71e94a23005e798f30799c4020bd2fdd0', '081937037100', 'Lotim', '2020-05-17 06:56:29', '2020-05-17 04:56:29'),
(4, 'Pending', 'Saripudin Ambara', 'saripudinambara@gmail.com', '990565651cd7ee7fad1ea27455fc486fce85d81b', '081937137260', 'Loteng', '2020-05-17 06:59:34', '2020-05-17 04:59:34');

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
-- Indexes for dumped tables
--

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
  ADD KEY `id_fasilitas` (`id_fasilitas`);

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
-- Indexes for table `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  ADD PRIMARY KEY (`id_komentar`);

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
-- AUTO_INCREMENT for table `tbl_fasilitas`
--
ALTER TABLE `tbl_fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_foto`
--
ALTER TABLE `tbl_foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_galleri`
--
ALTER TABLE `tbl_galleri`
  MODIFY `id_galleri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_header_transaksi`
--
ALTER TABLE `tbl_header_transaksi`
  MODIFY `id_header_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_fasilitas`
--
ALTER TABLE `tbl_fasilitas`
  ADD CONSTRAINT `tbl_fasilitas_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id_kategori`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_foto`
--
ALTER TABLE `tbl_foto`
  ADD CONSTRAINT `tbl_foto_ibfk_1` FOREIGN KEY (`id_fasilitas`) REFERENCES `tbl_fasilitas` (`id_fasilitas`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
