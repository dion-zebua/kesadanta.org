-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql200.byetcluster.com
-- Generation Time: Sep 09, 2022 at 10:07 PM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_32439731_kesadanta_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'Dion', '$2y$10$KxusEl.gEkY1oYDyRpcgNOlcCwCAsYzTNts/Nz2QXGHZaERNwE96K');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(5) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `kel` varchar(50) NOT NULL,
  `kec` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `tanggal` varchar(35) NOT NULL,
  `tema` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `deskripsi` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `kel`, `kec`, `kota`, `tanggal`, `tema`, `gambar`, `deskripsi`) VALUES
(2, 'Pembuatan Company Profile PT. Mencari Jati Diri Bandung Lautan Api', 'Jatijajar', 'Rawasari Selatan', 'Jakarta Pusat', 'Thursday, 25 August 2022', 'Berita', '6306ef6de6188^contoh.png', 'Open Jasa pembuatan Website Perusahaan, Personal, Toko Online, UMKM, Sekolah, Input Data dan lain-lain. \r\nWhatsapp 0882-1453-5126.'),
(3, 'Kegiatan Pembelajaran Hybrid SMK FORNUS Depok', 'Sukatani', 'Tapos', 'Depok', 'Thursday, 25 August 2022', 'Kegiatan', '6306efe25c754^contoh.png', 'Anak anak sangat antusias belajar hybrid.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
