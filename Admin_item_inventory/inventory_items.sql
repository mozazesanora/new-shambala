-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 01 Apr 2017 pada 16.27
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ilab2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventory_items`
--

CREATE TABLE `inventory_items` (
  `id` int(11) NOT NULL,
  `parent` int(11) DEFAULT '0',
  `category_item` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `serial_number` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `entry_date` date DEFAULT NULL,
  `can_be_rent` int(11) NOT NULL DEFAULT '0',
  `availability` tinyint(1) NOT NULL DEFAULT '0',
  `status` varchar(255) NOT NULL,
  `location` varchar(256) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `inventory_items`
--

INSERT INTO `inventory_items` (`id`, `parent`, `category_item`, `name`, `serial_number`, `description`, `entry_date`, `can_be_rent`, `availability`, `status`, `location`, `created_at`, `updated_at`, `deleted_at`, `user_id`) VALUES
(23, 0, 1, '601', '1/2005/2', 'Lab. Rekayasa Perangkata Lunak', '2017-04-01', 1, 1, 'Normal', 'GKB 3 Kampus 3 UMM', '2017-04-01 15:43:05', '2017-04-01 16:25:56', NULL, 737),
(24, 0, 1, '602', '1/2005/3', 'Lab. Jaringan Komputer', '2017-04-01', 1, 1, 'Normal', 'GKB 3 Kampus 3 UMM', '2017-04-01 15:58:25', '2017-04-01 16:26:11', NULL, 737),
(25, 0, 1, '603', '1/2005/1', 'Lab. Sistem Informasi', '2017-04-01', 1, 1, 'Normal', 'GKB 3 Kampus 3 UMM', '2017-04-01 16:02:23', NULL, NULL, 737),
(26, 0, 1, '600', '1/2017-04-03/1', '', '2017-04-03', 1, 1, 'Normal', 'GKB', '2017-04-01 16:11:45', NULL, '2017-04-01 16:16:50', 737),
(27, 0, 1, '500', '1/2017/1', '', '2017-04-01', 1, 1, 'Normal', 'Malang', '2017-04-01 16:15:36', NULL, '2017-04-01 16:16:45', 737);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory_items`
--
ALTER TABLE `inventory_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `serial_number` (`serial_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory_items`
--
ALTER TABLE `inventory_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
