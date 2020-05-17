-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Mar 2020 pada 18.24
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siak_old1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `msrev`
--

CREATE TABLE `msrev` (
  `ID` int(11) NOT NULL,
  `NAMA_REV` varchar(30) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `KETERANGAN` text DEFAULT NULL,
  `GOLONGAN` int(11) DEFAULT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 0,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `msrev`
--

INSERT INTO `msrev` (`ID`, `NAMA_REV`, `STATUS`, `KETERANGAN`, `GOLONGAN`, `isDeleted`, `createdAt`, `updateAt`) VALUES
(1, 'Laki-Laki', 1, '1', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Perempuan', 1, '2', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Aktif', 3, 'T', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Tidak Aktif', 3, 'F', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Islam', 4, '1', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Kristen Katolik', 4, '2', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Kristen ', 4, '3', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Hindu', 4, '4', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Budha', 4, '5', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Lulus', 5, '1', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Tidak Lulus', 5, '2', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Keluar', 5, '3', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Aktif', 5, '4', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Sudah Diambil', 6, '1', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Belum Diambil', 6, '2', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Aktiva', 7, '1', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Pasiva', 7, '2', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Pendapatan', 7, '3', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Biaya', 7, '4', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Header', 8, '1', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Detail', 8, '2', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Debit', 9, 'D', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'Kredit', 9, 'K', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, '1', 10, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, '2', 10, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, '3', 10, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, '4', 10, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, '5', 10, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, '6', 10, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, '7', 10, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, '8', 10, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, '9', 10, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, '10', 10, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, '11', 10, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `msrev`
--
ALTER TABLE `msrev`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
