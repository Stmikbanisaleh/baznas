-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Mar 2020 pada 19.08
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
-- Database: `siak`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpengawas`
--

CREATE TABLE `tbpengawas` (
  `id_pengawas` int(11) NOT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` longtext DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `KodeSek` int(11) NOT NULL,
  `isdeleted` int(11) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbpengawas`
--

INSERT INTO `tbpengawas` (`id_pengawas`, `nip`, `nama`, `jabatan`, `username`, `password`, `level`, `status`, `gambar`, `KodeSek`, `isdeleted`, `createdAt`, `updatedAt`) VALUES
(1, '123456789', 'Kresno Murti Prabowo, S. Kom.', 'Operator', 'admin@gemanurani-bks.sch.id', 'f1d179b6047f3dbb42915130d48f2b54de433872c67eac532771cc9ea9e76454a657f819ad350328d12fbe4d9df9447eb04a55a976a9051566e2c96f41f7c928', 'admin', 1, 'IMG-20161129-WA0007.jpg', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '111221', 'keuangan2', 'keuangan2', 'keuangan@gemanurani-bks.sch.id', 'imam', 'user', 1, NULL, 0, 0, '2020-03-08 08:54:29', '0000-00-00 00:00:00'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', 0, 1, '2020-02-12 12:53:07', '0000-00-00 00:00:00'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', 0, 1, '2020-02-12 12:53:57', '0000-00-00 00:00:00'),
(5, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', 0, 1, '2020-02-12 12:55:01', '0000-00-00 00:00:00'),
(6, '31337', 'imam satrianta', 'ass', NULL, NULL, 'admin', 1, '81839b5621c648bb44f0eae5bc4bbfb3.png', 0, 0, '2020-02-12 13:00:08', '0000-00-00 00:00:00'),
(7, '31337', 'imam satrianta3', 'Administrator', 'priyanto@lab.futuready.com', 'eaccb8ea6090a40a98aa28c071810371', 'admin', 1, 'ea43081832c4b27e73e6ef8ad156f524.png', 0, 0, '2020-02-12 13:06:38', '2020-03-04 18:03:28'),
(5140002, '15091997', 'Dia', 'dia', 'dia@gmail.com', '465b1f70b50166b6d05397fca8d600b0', 'AKUNTING', NULL, '', 1, 0, '2020-03-09 00:00:00', '2020-03-09 00:00:00'),
(5140003, NULL, NULL, NULL, NULL, 'edbd881f1ee2f76ba0bd70fd184f87711be991a0401fd07ccd4b199665f00761afc91731d8d8ba6cbb188b2ed5bfb465b9f3d30231eb0430b9f90fe91d136648', 'OPERATOR', NULL, '', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5140004, NULL, NULL, NULL, NULL, 'edbd881f1ee2f76ba0bd70fd184f87711be991a0401fd07ccd4b199665f00761afc91731d8d8ba6cbb188b2ed5bfb465b9f3d30231eb0430b9f90fe91d136648', 'KASIR', NULL, 'b3de17d28a1781c60082763b3164c49b.png', 1, 0, '2020-03-07 00:00:00', '2020-03-07 10:39:26'),
(5140006, NULL, NULL, NULL, NULL, '2f7892d784a4bd28b01dbb7870a9006feb3d1d7a58afaacaefd712fd81d6e808a27f651b9d11cbf9757b93cca2039eb37212dd7c016e1b61190dfbfa4955290d', 'KOPERASI', NULL, '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5140007, NULL, NULL, NULL, NULL, '2f7892d784a4bd28b01dbb7870a9006feb3d1d7a58afaacaefd712fd81d6e808a27f651b9d11cbf9757b93cca2039eb37212dd7c016e1b61190dfbfa4955290d', 'KASIR', NULL, '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5140008, NULL, NULL, NULL, NULL, 'a6552a555215fb34486fb6f4f3df846e94386986d269949c8ad75d6f4aaff08c5e9ee94f2868c0a3b86ab43aeadc07396324bd331d887e8fa06643a361c66abe', 'OPERATOR', 0, '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5140009, NULL, NULL, NULL, NULL, '7096d5df93a56fbaa605d530ba2954525d0265819599128b6f01182a44ae5b5919f20cf6ff96ef609402af762449d2f526393ddaa1d0d0bde31cbc3aa5458660', 'KASIR', NULL, '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5140010, NULL, NULL, NULL, NULL, '4fbb6fdb86db1163e1bfe5d4e5f95e01fcaadf5da85ca497d72d6f4aa4595d70201f1897cd4e5ad9c9944a1e9685acdf10f79398cf63f0f100e929d12ef18ab2', 'OPERATOR', NULL, '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5140011, NULL, NULL, NULL, NULL, '3443407585ba64edc82926b05d5655d952d7ba0036c0c79b64f174a3dd0a951488ab862184dbb01dbc3f7643475c79bb6dc7f402c1ea7609913c6039eb1971de', 'AKUNTING', NULL, '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5140012, NULL, NULL, NULL, NULL, 'b78708745cd34a3cc0533b1fdeeaa2f1070ceb129933119ec9e1ebb5f76a9e93d981e63f9ffad387a3a85e4ea70549a95dce876b29570a6b629ac84e9c871f90', 'KASIR', NULL, '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5140013, NULL, NULL, NULL, NULL, '9220088549119e5dc96b6a83b1555a763c705506f0f3fa1870f74fef3762bebde06fff984459143266023e082c24ba504adc30e4154481048479de54eb76a710', 'OPERATOR', NULL, '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbpengawas`
--
ALTER TABLE `tbpengawas`
  ADD PRIMARY KEY (`id_pengawas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbpengawas`
--
ALTER TABLE `tbpengawas`
  MODIFY `id_pengawas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5140019;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
