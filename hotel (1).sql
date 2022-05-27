-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2022 at 05:28 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_kamar`
--

CREATE TABLE `fasilitas_kamar` (
  `id_fasilitas_kamar` int(15) NOT NULL,
  `id_tipe_kamar` int(11) NOT NULL,
  `nama_fasilitas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas_kamar`
--

INSERT INTO `fasilitas_kamar` (`id_fasilitas_kamar`, `id_tipe_kamar`, `nama_fasilitas`) VALUES
(23, 1, '    Televisi'),
(24, 1, '    AC'),
(28, 2, '    AC\r\n'),
(29, 2, '    Televisi'),
(30, 2, '    Kamar Mandi+Perlengkapan Mandi'),
(31, 2, '    Kopi+Teh'),
(34, 3, '    AC\r\n'),
(35, 3, '    Televisi'),
(36, 1, '    Kamar Mandi+Perlengkapan Mandi'),
(37, 3, '    pembuatan teh dan kopi'),
(38, 3, '    Kulkas'),
(39, 3, '    Kamar Mandi+Perlengkapan Mandi'),
(40, 4, '    AC'),
(41, 4, '    Televisi'),
(42, 4, '    Kamar Mandi+Perlengkapan Mandi'),
(43, 4, '    Pembuatan Kopi dan Teh'),
(44, 4, '    Kulkas'),
(45, 4, '    Meja Kerja+Santai'),
(46, 5, 'Fasilitas teh/kopi '),
(48, 5, '    Meja Kerja'),
(50, 5, '    Kamar rias'),
(51, 5, '    Dapur lengkap'),
(52, 5, '    Ruang makan'),
(53, 5, '    AC'),
(54, 5, '    Televisi'),
(55, 5, '    Kamar Mandi+Perlengkapan Mandi'),
(56, 6, '    AC'),
(57, 6, '    Brankas'),
(58, 6, '    Televisi'),
(59, 6, '    Kamar Mandi+Perlengkapan Mandi'),
(60, 6, '    Dapur Lengkap'),
(61, 6, '    Kamar tidur dan ruang tamu pisah'),
(62, 6, '    Ruang Makan'),
(63, 6, '    Kamar Rias'),
(64, 6, '    Fasilitas teh+kopi'),
(65, 6, '    Balcon');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_umum`
--

CREATE TABLE `fasilitas_umum` (
  `id_fasilitas_umum` int(15) NOT NULL,
  `nama_fasilitas_umum` varchar(50) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `deskripsi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas_umum`
--

INSERT INTO `fasilitas_umum` (`id_fasilitas_umum`, `nama_fasilitas_umum`, `foto`, `deskripsi`) VALUES
(19, 'Fitness Center', 'fasilitashotelgym_1.jpg', 'Kegiatan olahraga di hotel bukan hanya berenang, tetapi Anda dapat menggunakan alat-alat kebugaran yang disediakan di fitness center.Selain bersantai, Anda juga dapat memelihara kesehatan. Apalagi jika Anda sedang dalam perjalanan bisnis yang jadwalnya padat.Fasilitas olahraga yang disediakan hotel tidak sampai di situ. Bahkan, hotel menyediakan pelatih olahraga khusus, ada pula yang menyediakan kelas olahraga setiap pagi atau sore.'),
(20, 'Kolam Renang', 'fasilitashotelkolamrenang.jpg', 'Kolam renang merupakan fasilitas hotel yang sangat favorit. Selain itu nyaman, bersih dan jernih. Cocok untuk santai, berolahraga, menyegarkan tubuh dan pikiran ketika sedang bosan di kamar hotel, maka royal hotel mahar menyediakan fasilitas ini.'),
(21, 'Restoran', 'fasilitashotelrestaurant_1.jpg', 'Restoran di dalam hotel merupakan salah satu fasilitas yang sering diburu, oleh tamu hotel dan sudah terpercaya kualitasnya.\r\n\r\nJenis makanan yang beragam, dapat makan sepuasnya, serta pelayanan yang memuaskan di royal hotel mahar.'),
(22, 'Tempat Parkir', 'fasilitashotelparkiran.jpg', 'Tempat parkir di hotel ini sangat aman dan ketat penjagannya sehingga tidak perlu khawatir ada kendaraan hilang, serta kualitas parkiran yang terjaga kebersihannya serta rapih.'),
(23, 'Free Wifi', 'freewifi.jpg', 'Penghuni hotel akan diberikan fasilitas internet gratis.\r\n\r\nInternet yang berkecepatan tinggi ini biasanya digunakan untuk mengurus pekerjaan atau hanya digunakan untuk hiburan.\r\n\r\nKarena internet yang diberikan tidak ada batasnya, Anda dapat memanfaatkannya untuk mengunduh aplikasi atau file tanpa harus khawatir dengan batas kuota.'),
(24, 'SPA', 'SPA.jpg', 'SPA merupakan salah satu bentuk perawatan tubuh yang terdiri dari berbagai jenis dan tahap perawatan. Tak hanya untuk kecantikan, spa juga dapat membantu relaksasi tubuh sehingga kebugaran tubuh meningkat. Tujuannya untuk menyegarkan kembali pikiran, tubuh dan jiwa.');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(15) NOT NULL,
  `nomor_kamar` varchar(15) NOT NULL,
  `tipe_kamar` int(11) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `akhir_booking` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `nomor_kamar`, `tipe_kamar`, `deskripsi`, `foto`, `akhir_booking`) VALUES
(45, 'A101', 1, 'Standard Room adalah tipe kamar hotel yang terjangkau harganya di Royal Hotel Mahar, namun kualitas tetap terbaik untuk staycation bareng keluarga, teman, dll.', 'kamarhotel3.jpg', NULL),
(46, 'A102', 2, 'Economy merupakan kamar hotel sangat nyaman untuk bersantai, fasilitas kamar hotel yang telah tersedia yang terbaik.', 'kamarhotel4.jpg', NULL),
(47, 'A103', 3, 'Kamar Hotel Superior adalah kamar hotel sangat nyaman, bersih, dan cocok untuk yang sedang berliburan dengan nuansa mewah dan elegan, terpercaya membuat hati tamu bahagia. Fasilitas kamar hotel yang lengkap dan terbaik', 'kamarhotel1.jpg', NULL),
(48, 'A104', 4, 'Deluxe Room merupakan kamar yang cukup besar dan mewah dari segi interior, serta dilengkapi dengan fasilitas yang sangat memuaskan tamu untuk digunakan ketika menginap di hotel. Nyaman, aman, rapih dan terpercaya kualitasnya.', 'kamarhotel2_2.jpg', NULL),
(49, 'A105', 5, 'Presidential suite adalah tipe kamar hotel yang terbaik, fasilitas terbaik, mulai dari interior, pemandangan kamar, dll sangat terjamin dan terbaik', 'kamarhotel5_1.jpg', NULL),
(50, 'A106', 6, 'Kamar Hotel VVIP merupakan kamar hotel terbaik dan paling mewah di royal hotel mahar, fasilitas mewah dan lengkap, tempat sangat nyaman, kualitas terpercaya.', 'kamarhotel6.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `level` enum('admin','resepsionis') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`) VALUES
(1, 'mahar', '202cb962ac59075b964b07152d234b70', 'Dinda', 'admin'),
(2, 'resepsionis', '202cb962ac59075b964b07152d234b70', 'Dinda', 'resepsionis');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(15) NOT NULL,
  `id_tipe_kamar` int(11) NOT NULL,
  `nik` int(20) NOT NULL,
  `nama_pemesan` varchar(128) NOT NULL,
  `cek-in` date NOT NULL,
  `cek-out` date NOT NULL,
  `jumlah_kamar` int(15) NOT NULL,
  `harga` bigint(15) NOT NULL,
  `total` bigint(15) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `id_tipe_kamar`, `nik`, `nama_pemesan`, `cek-in`, `cek-out`, `jumlah_kamar`, `harga`, `total`, `status`) VALUES
(49, 0, 3201001, 'Warliman Joey', '2022-05-24', '2022-05-26', 1, 1000000, 2000000, 6);

-- --------------------------------------------------------

--
-- Table structure for table `reservasi_kamar`
--

CREATE TABLE `reservasi_kamar` (
  `id_reservasi_kamar` int(11) NOT NULL,
  `id_kamar` int(15) NOT NULL,
  `id_reservasi` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservasi_kamar`
--

INSERT INTO `reservasi_kamar` (`id_reservasi_kamar`, `id_kamar`, `id_reservasi`) VALUES
(47, 45, 49);

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

CREATE TABLE `tamu` (
  `nik` int(20) NOT NULL,
  `nama_tamu` varchar(50) NOT NULL,
  `no_tlp` char(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tipe_kamar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tipe_kamar`
--

CREATE TABLE `tipe_kamar` (
  `id_tipe_kamar` int(11) NOT NULL,
  `tipe_kamar` varchar(128) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipe_kamar`
--

INSERT INTO `tipe_kamar` (`id_tipe_kamar`, `tipe_kamar`, `harga`) VALUES
(1, 'Standard Room', 1000000),
(2, 'Economy', 2000000),
(3, 'Superior', 3000000),
(4, 'Deluxe Room', 4000000),
(5, 'Presidential Suite', 5000000),
(6, 'VVIP', 6000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  ADD PRIMARY KEY (`id_fasilitas_kamar`),
  ADD KEY `id_tipe_kamar` (`id_tipe_kamar`);

--
-- Indexes for table `fasilitas_umum`
--
ALTER TABLE `fasilitas_umum`
  ADD PRIMARY KEY (`id_fasilitas_umum`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `tipe_kamar` (`tipe_kamar`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD KEY `id_tipe_kamar` (`id_tipe_kamar`);

--
-- Indexes for table `reservasi_kamar`
--
ALTER TABLE `reservasi_kamar`
  ADD PRIMARY KEY (`id_reservasi_kamar`),
  ADD KEY `id_kamar` (`id_kamar`),
  ADD KEY `id_reservasi` (`id_reservasi`);

--
-- Indexes for table `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  ADD PRIMARY KEY (`id_tipe_kamar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  MODIFY `id_fasilitas_kamar` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `fasilitas_umum`
--
ALTER TABLE `fasilitas_umum`
  MODIFY `id_fasilitas_umum` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `reservasi_kamar`
--
ALTER TABLE `reservasi_kamar`
  MODIFY `id_reservasi_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  MODIFY `id_tipe_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  ADD CONSTRAINT `fasilitas_kamar_ibfk_1` FOREIGN KEY (`id_tipe_kamar`) REFERENCES `tipe_kamar` (`id_tipe_kamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_ibfk_1` FOREIGN KEY (`tipe_kamar`) REFERENCES `tipe_kamar` (`id_tipe_kamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservasi_kamar`
--
ALTER TABLE `reservasi_kamar`
  ADD CONSTRAINT `reservasi_kamar_ibfk_1` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservasi_kamar_ibfk_2` FOREIGN KEY (`id_reservasi`) REFERENCES `reservasi` (`id_reservasi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
