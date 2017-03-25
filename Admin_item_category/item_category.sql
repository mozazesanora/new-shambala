-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 25 Mar 2017 pada 19.36
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
-- Struktur dari tabel `item_category`
--

CREATE TABLE `item_category` (
  `id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `item_category`
--

INSERT INTO `item_category` (`id`, `parent`, `name`, `created_at`, `updated_at`, `deleted_at`, `user_id`) VALUES
(1, 0, 'Computer', '2017-03-19 12:38:23', NULL, NULL, 737),
(2, 1, 'Keyboard', '2017-03-19 12:43:15', '2017-03-19 12:44:32', '2017-03-19 12:44:42', 737),
(3, 1, 'Mouse', '2017-03-19 13:47:41', NULL, NULL, 737),
(4, 3, 'Mo', '2017-03-19 16:19:51', NULL, '2017-03-20 07:43:11', 737),
(5, 1, 'CPU', '2017-03-20 07:43:24', NULL, NULL, 737),
(6, 5, 'Processor', '2017-03-20 07:43:50', NULL, NULL, 737),
(7, 0, 'Buku', '2017-03-20 09:46:12', NULL, NULL, 737),
(8, 0, 'Room', '2017-03-20 11:01:57', NULL, NULL, 737),
(9, 1, 'Mouse', '2017-03-20 11:03:07', NULL, '2017-03-20 11:03:21', 737),
(10, 8, 'Meja', '2017-03-20 11:06:42', NULL, NULL, 737);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item_category`
--
ALTER TABLE `item_category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item_category`
--
ALTER TABLE `item_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
