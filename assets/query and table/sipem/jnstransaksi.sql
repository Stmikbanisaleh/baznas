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
-- Struktur dari tabel `jnstransaksi`
--

CREATE TABLE `jnstransaksi` (
  `id` int(11) NOT NULL,
  `JnsTransaksi` char(3) NOT NULL,
  `NamaTransaksi` char(80) DEFAULT NULL,
  `no_jurnal` int(11) DEFAULT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 0,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jnstransaksi`
--

INSERT INTO `jnstransaksi` (`id`, `JnsTransaksi`, `NamaTransaksi`, `no_jurnal`, `isDeleted`, `createdAt`, `updatedAt`) VALUES
(1, 'BP', 'Biaya Pemeliharaan Kendaraan', 120, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'MT', 'Material Sekolah', 11, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'TE', 'HAHAHA', 1, 1, '2020-03-02 15:55:35', '2020-03-02 17:22:09'),
(4, 'TES', 'TEST AJALAH', 1, 0, '2020-03-02 15:56:15', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jnstransaksi`
--
ALTER TABLE `jnstransaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jnstransaksi`
--
ALTER TABLE `jnstransaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
