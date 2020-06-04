-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2020 at 05:01 AM
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
  `message` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id_contact`, `nama`, `email`, `message`) VALUES
(15, 'Saripudin Ambara', 'saripudinambara@gmail.com', 'sangat membantu'),
(16, 'Abi Rezardi', 'abirezardi@gmail.com', 'membantu sekali'),
(23, 'Anjas Ardiyan Azhari', 'anjas@gmail.com', 'a'),
(24, 'Anjas Ardiyan Azhari', 'anjas@gmail.com', 'anjas'),
(25, 'Abi Rezardi', 'abirezardi@gmail.com', 'abi'),
(26, 'Abi Rezardi', 'abirezardi@gmail.com', 'tes');

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
(18, 29, 16, '2', 'Avanza', '2', 1000000, 'Tahun 2015', 'Publish', 'avanza-silver1.jpg', '2020-05-17 07:12:08', '2020-05-17 05:16:14'),
(19, 29, 9, '122', 'Hotel Aston ', '122', 1000000, 'a', 'Publish', 'f99206e9bf244876ea191a33a3010ca8.jpg', '2020-05-18 07:17:30', '2020-05-18 05:17:56'),
(20, 29, 9, '22s', 'Hotel Manjawa', '22s', 2, 'sd', 'Publish', 'paket-dekorasi-modern-di-bandung-11.jpg', '2020-05-18 07:18:32', '2020-05-18 05:18:32'),
(21, 29, 9, '1241', 'Hotel Madani', '1241', 3, '3', 'Publish', 'paket-dekorasi-wedding-harga-murah-di-bandung-13.jpg', '2020-05-18 07:18:56', '2020-05-18 05:18:56'),
(22, 29, 9, '341', 'Hotel Aston ', '341', 343, '343', 'Publish', 'dekorasi-pernikahan-mewah-dan-murah-di-bandung-2.jpg', '2020-05-18 07:19:34', '2020-05-18 05:19:34'),
(23, 29, 9, '22424', 'Hotel Aston ', '22424', 24, '24', 'Publish', 'paket-dekorasi-wedding-murah-bandung-3.jpg', '2020-05-18 07:20:00', '2020-05-18 05:20:00'),
(24, 29, 9, 'afdafe', 'Hotel Manjawa', 'afdafe', 45, 'rr3', 'Publish', 'paket-dekorasi-rustic-murah-di-bandung-9.jpg', '2020-05-18 07:20:29', '2020-05-18 05:20:29'),
(25, 29, 9, '243242', 'Hotel Madani', '243242', 24234, '2432', 'Publish', 'kif_7242.jpg', '2020-05-18 07:20:47', '2020-05-18 05:20:47'),
(26, 29, 9, '23235', 'Hotel Manjawa', '23235', 24324, '24234', 'Publish', '389f9138102545f066184e52adbeba6e.jpg', '2020-05-18 07:21:24', '2020-05-18 05:21:24'),
(27, 29, 9, '3424', 'Hotel Manjawa', '3424', 2434, '243', 'Publish', 'maxresdefault.jpg', '2020-05-18 07:21:52', '2020-05-18 05:21:52'),
(28, 29, 9, 'aaaqe', 'Hotel Aston ', 'aaaqe', 343, '434', 'Publish', 'dekorasi_pernikahan_q.jpg', '2020-05-18 07:22:17', '2020-05-18 05:22:17'),
(29, 29, 9, 'gsg', 'Hotel Manjawa', 'gsg', 2432, 'sds', 'Publish', 'Kado_istimewa_PTIK.jpg', '2020-05-18 07:23:26', '2020-05-18 05:23:26'),
(30, 29, 9, 'gfhd', 'Hotel Manjawa', 'gfhd', 55, '55', 'Publish', 'dekor5.jpg', '2020-05-18 07:23:43', '2020-05-18 05:23:43'),
(31, 29, 9, 'wgsdg', 'Hotel Manjawa', 'wgsdg', 454, '454', 'Publish', '16554_404017746381433_1820383201_n.jpg', '2020-05-18 07:24:04', '2020-05-18 05:24:04'),
(32, 29, 9, '45qr', 'Hotel Manjawa', '45qr', 454, '454', 'Publish', 'PF_decoration_zqsghc.jpg', '2020-05-18 07:24:24', '2020-05-18 05:24:24'),
(33, 29, 9, '45qrbgff', 'Hotel Manjawa', '45qrbgff', 454, '454', 'Publish', 'PF_decoration_zqsghc1.jpg', '2020-05-18 07:24:44', '2020-05-18 05:24:44'),
(34, 29, 16, 'Daihatsu-Ayla', 'Daihatsu-Ayla', 'daihatsu-ayla', 500000, 'Daihatsu-Ayla', 'Publish', '2017-Daihatsu-Ayla-5.jpg', '2020-05-18 07:28:28', '2020-05-23 15:38:05'),
(35, 29, 16, 'brio', 'brio', 'brio', 500000, 'brio', 'Publish', '2019-honda-brio-unveiled-main.jpg', '2020-05-18 07:30:20', '2020-05-23 15:37:06'),
(36, 29, 16, 'mitsubishi xpander cross', 'mitsubishi xpander cross', 'mitsubishi-xpander-cross', 1000000, 'mitsubishi xpander cross', 'Publish', '2020-mitsubishi-xpander-cross.jpg', '2020-05-18 07:35:46', '2020-05-23 15:36:39'),
(37, 29, 16, 'sigra_daihatsu sigra ', 'sigra_daihatsu sigra ', 'sigra_daihatsu-sigra', 1000000, 'sigra_daihatsu sigra ', 'Publish', 'sigra_daihatsu_sigra_2020_.jpg', '2020-05-18 07:36:53', '2020-05-23 15:36:06'),
(38, 29, 16, 'toyota alphard', 'toyota alphard', 'toyota-alphard', 1500000, 'toyota alphard', 'Publish', 'toyota_alphard.png', '2020-05-18 07:41:26', '2020-05-23 15:41:04'),
(39, 29, 16, 'Daihatsu Terios', 'Daihatsu Terios', 'daihatsu-terios', 1000000, 'Daihatsu Terios', 'Publish', 'Daihatsu_Terios.png', '2020-05-18 07:42:16', '2020-05-23 15:40:47'),
(40, 29, 9, 'suzuki Ertiga', 'suzuki Ertiga', 'suzuki-ertiga', 1000000, 'suzuki Ertiga', 'Publish', 'suzukiertiga-prod-var.png', '2020-05-18 07:44:58', '2020-05-23 15:40:29'),
(41, 29, 16, 'Honda CR-V', 'Honda CR-V', 'honda-cr-v', 500000, 'Honda CR-V', 'Publish', 'Honda_CR-V.png', '2020-05-18 07:46:39', '2020-05-23 15:40:07'),
(42, 29, 16, 'Mitsubishi Pajero Sport', 'Mitsubishi Pajero Sport', 'mitsubishi-pajero-sport', 1000000, 'Mitsubishi Pajero Sport', 'Publish', 'Mitsubishi_Pajero_Sport.png', '2020-05-18 07:47:54', '2020-05-23 15:39:47'),
(43, 29, 16, 'Grand_New_Xenia', 'Grand_New_Xenia', 'grand_new_xenia', 1000000, 'Grand_New_Xenia', 'Publish', 'Grand_New_Xenia.png', '2020-05-18 07:49:12', '2020-05-23 15:39:22'),
(44, 29, 16, 'Honda-Jazz', 'Honda-Jazz', 'honda-jazz', 500000, 'Honda-Jazz', 'Publish', 'Honda-Jazz.png', '2020-05-18 07:51:07', '2020-05-23 15:38:56'),
(45, 29, 11, 'a', 'a', 'a', 1, '1', 'Publish', 'shutterstock_575961700.jpg', '2020-05-18 08:02:40', '2020-05-18 06:02:40'),
(46, 29, 11, 'b', 'b', 'b', 1, '1', 'Publish', 'buffet.jpg', '2020-05-18 08:02:57', '2020-05-18 06:02:57'),
(47, 29, 11, 'c', 'c', 'c', 1, '1', 'Publish', 'catering.jpg', '2020-05-18 08:03:40', '2020-05-18 06:03:40'),
(48, 29, 11, 'd', 'd', 'd', 1, '1', 'Publish', 'maxresdefault1.jpg', '2020-05-18 08:05:20', '2020-05-18 06:05:20'),
(49, 29, 11, 'e', 'e', 'e', 1, '1', 'Publish', 'WeddingFoodTrends-Stonefire-Catering-1.jpg', '2020-05-18 08:05:46', '2020-05-18 06:05:46'),
(50, 29, 11, 'f', 'f', 'f', 1, '1', 'Publish', 'photodune-10667334-catering-food-at-a-wedding-party-m.jpg', '2020-05-18 08:06:13', '2020-05-18 06:06:13'),
(51, 29, 11, 'g', 'g', 'g', 1, '1', 'Publish', 'catering-01.jpg', '2020-05-18 08:07:21', '2020-05-18 06:07:21'),
(52, 29, 11, 'h', 'h', 'h', 1, '1', 'Publish', 'wedding-caterers-in-Gurgaon.jpg', '2020-05-18 08:08:21', '2020-05-18 06:08:21'),
(53, 29, 11, 'i', 'i', 'i', 1, '1', 'Publish', 'catering-12-1-600x480.jpg', '2020-05-18 08:08:53', '2020-05-18 06:08:53'),
(54, 29, 11, 'j', 'j', 'j', 1, '1', 'Publish', '008.jpg', '2020-05-18 08:09:19', '2020-05-18 06:09:19'),
(55, 29, 11, 'k', 'k', 'k', 1, '1', 'Publish', 'bn02.jpg', '2020-05-18 08:10:02', '2020-05-18 06:10:02'),
(56, 29, 19, 'ba', 'a', 'ba', 1, 'a', 'Publish', '626-2.jpg', '2020-05-18 08:20:59', '2020-05-18 06:20:59'),
(57, 29, 19, 'affwe', 'b', 'affwe', 33, 'av', 'Publish', '624-1_(1).jpg', '2020-05-18 08:21:23', '2020-05-18 06:21:23'),
(58, 29, 19, 'avea', 'wve', 'avea', 2323, 'ea', 'Publish', '666-1.jpg', '2020-05-18 08:21:43', '2020-05-18 06:21:43'),
(59, 29, 19, 'afdas', 'ffafe', 'afdas', 3, '3', 'Publish', '408-1.jpg', '2020-05-18 08:22:05', '2020-05-18 06:22:05'),
(60, 29, 19, 'afas', 'afdsa', 'afas', 22, '22', 'Publish', '416-1.jpg', '2020-05-18 08:22:32', '2020-05-18 06:22:32'),
(61, 29, 19, 'AD', 'ad', 'ad', 11, '11111', 'Publish', '376-1.jpg', '2020-05-18 08:22:49', '2020-05-18 06:22:49'),
(62, 29, 19, 'EFA', 'AFE', 'efa', 3423, '232', 'Publish', '373-1.jpg', '2020-05-18 08:23:18', '2020-05-18 06:23:18'),
(63, 29, 19, 'AFE', 'AFE', 'afe', 33, '33', 'Publish', '264-1.jpg', '2020-05-18 08:23:32', '2020-05-18 06:23:32'),
(64, 29, 19, 'AFEAE', 'AFE', 'afeae', 343, '343', 'Publish', '471-1.jpg', '2020-05-18 08:23:53', '2020-05-18 06:23:53'),
(65, 29, 19, 'AFEAFE', 'FASF', 'afeafe', 423, 'RRRS', 'Publish', '624-1.jpg', '2020-05-18 08:24:41', '2020-05-18 06:24:41'),
(66, 29, 19, 'AAFASFE', 'AAF4', 'aafasfe', 444, 'AFE', 'Publish', '626-1.jpg', '2020-05-18 08:25:02', '2020-05-18 06:25:02'),
(67, 29, 19, 'AFACERCCC', 'AFEA', 'afacerccc', 34, 'AFFA', 'Publish', '291-2.jpg', '2020-05-18 08:25:26', '2020-05-18 06:25:42'),
(68, 29, 19, 'AFEAF', 'AFASF', 'afeaf', 333, 'VDSVSD', 'Publish', '122-1.jpg', '2020-05-18 08:26:00', '2020-05-18 06:26:00'),
(70, 29, 13, 'afeafeav', 'afea', 'afeafeav', 22, '22', 'Publish', '792af00ab3058f499832526111ce0781.jpg', '2020-05-18 08:29:41', '2020-05-18 06:29:41'),
(71, 29, 18, '1sfef', 'Hotel Madani', '1sfef', 323, '2323', 'Publish', 'undangan-pernikahan-1100x675.jpg', '2020-05-18 08:37:08', '2020-05-18 06:37:08'),
(72, 29, 18, 'aeffasvevva', 'afea', 'aeffasvevva', 3333333, '333333', 'Publish', 'hipwee-undangan_pernikahan_vintage.jpg', '2020-05-18 08:38:26', '2020-05-18 06:38:26'),
(73, 29, 18, 'aefaf', 'fase', 'aefaf', 3333333, '3333333', 'Publish', 'undangan-klasik.jpg', '2020-05-18 08:38:51', '2020-05-18 06:38:51'),
(74, 29, 18, 'sccscs', 'csccc', 'sccscs', 2147483647, '2222222tttt', 'Publish', 'und9.jpg', '2020-05-18 08:42:15', '2020-05-18 06:42:15'),
(75, 29, 14, 'aaa', 'aaa', 'aaa', 111, 'aaa', 'Publish', '1.png', '2020-05-22 09:00:15', '2020-05-22 07:25:49'),
(76, 29, 19, '12323232323', 'Hotel Madani', '12323232323', 23232, '3232', 'Publish', '21.png', '2020-05-23 17:28:22', '2020-05-23 15:28:22'),
(77, 29, 9, 'sgsgs', 'Hotel Manjawa', 'sgsgs', 4545, '4545', 'Publish', '3.png', '2020-05-23 17:28:59', '2020-05-23 15:28:59'),
(78, 29, 9, 'wtwtwtwt', 'Hotel Manjawa', 'wtwtwtwt', 4545, '4545', 'Publish', '4.png', '2020-05-23 17:29:25', '2020-05-23 15:29:25');

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
(4, 29, 75, 'ddd', '2.png', '2020-05-22 07:35:48');

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
(1, 'New', 'gallery-2.jpg', '2020-04-07 11:49:00', '2020-05-23 15:56:13'),
(3, 'New', 'gallery-3.jpg', '2020-04-07 11:50:34', '2020-05-23 15:56:19'),
(4, 'New', 'gallery-6.jpg', '2020-04-07 11:52:28', '2020-05-23 15:56:25'),
(5, 'New', 'gallery-7.jpg', '2020-04-07 11:54:16', '2020-05-23 15:56:43'),
(6, 'New', 'gallery-8.jpg', '2020-04-07 11:54:26', '2020-05-23 15:56:56'),
(7, 'New', 'place-2.jpg', '2020-04-07 11:54:36', '2020-05-23 15:57:04'),
(8, 'New', 'place-3.jpg', '2020-04-07 11:54:47', '2020-05-23 15:57:17'),
(9, 'Di Hotel ', 'gallery-1.jpg', '2020-04-07 11:55:00', '2020-05-23 07:54:01'),
(10, 'New', 'about.jpg', '2020-04-07 11:55:10', '2020-05-23 15:57:23'),
(12, 'New', 'foto_pre_wedding_indoor_elegant_3.jpg', '2020-04-07 11:55:31', '2020-05-23 15:57:29'),
(23, 'New', 'foto-prewedding-di-solo-studio-foto-pre-wedding-di-solo-jasa-foto-pre-wedding-di-solo-tempat-foto-005.jpg', '2020-05-18 05:34:36', '2020-05-23 15:57:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_header_transaksi`
--

CREATE TABLE `tbl_header_transaksi` (
  `id_header_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
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

--
-- Dumping data for table `tbl_header_transaksi`
--

INSERT INTO `tbl_header_transaksi` (`id_header_transaksi`, `id_pelanggan`, `tanggal_acara`, `tanggal_selesai_acara`, `nama`, `email`, `no_telp`, `alamat`, `kode_transaksi`, `tanggal_checkout`, `jumlah_transaksi`, `status_bayar`, `jumlah_bayar`, `rekening_pembayaran`, `rekening_pelanggan`, `bukti_bayar`, `id_rekening`, `tanggal_bayar`, `nama_bank`, `tanggal_update`) VALUES
(21, 3, '18-06-2020', '19-06-2020', 'Abi Rezardi', 'abirezardi@gmail.com', '081937037100', 'Lotim', '04062020NXLHTAKDYFDSPC1G', '2020-06-04 01:47:08', 4545, 'panding', '', '', '', '', 0, '', '', '2020-06-03 23:47:22');

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
(1, 'GOLDEN CARE', 'Make Good Preweding', 'goldencare@gmail.com', 'goldencare.com', '0819370371051', 'Jln.Medain Mataram, Lombok, NTB', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3317.4322305215937!2d116.10266288519284!3d-8.5850356556437!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcdc09df2b0eda1%3A0xf72a931b27e2c30b!2sGOLDEN%20CARE%20SALON%20%26%20WO!5e0!3m2!1sid!2sid!4v1584370635238!5m2!1sid!2sid', '@fb_GoldenCare', '@ig_GoldenCare', '@twitter_GoldenCare', 'wedding, Pernikahan', 'wedding organizer', 'icon.png', 'icon.png', '', '2020-05-18 05:10:13');

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
(3, 'Pending', 'Abi Rezardi', 'abirezardi@gmail.com', 'f35be6b71e94a23005e798f30799c4020bd2fdd0', '081937037100', 'Lotim', '2020-05-17 06:56:29', '2020-06-03 10:05:31'),
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
(22, 0, 3, '04062020NXLHTAKDYFDSPC1G', '2020-06-04 01:47:08', 78, 4545, 1, 4545, '2020-06-03 23:47:22');

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
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_fasilitas`
--
ALTER TABLE `tbl_fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `tbl_foto`
--
ALTER TABLE `tbl_foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_galleri`
--
ALTER TABLE `tbl_galleri`
  MODIFY `id_galleri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_header_transaksi`
--
ALTER TABLE `tbl_header_transaksi`
  MODIFY `id_header_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
