-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Mar 2020 pada 18.22
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
-- Struktur dari tabel `jurnal`
--

CREATE TABLE `jurnal` (
  `no_jurnal` int(11) NOT NULL,
  `kode_jurnal` varchar(15) DEFAULT NULL,
  `nama_jurnal` varchar(75) DEFAULT NULL,
  `JR` varchar(1) DEFAULT NULL,
  `type` varchar(1) DEFAULT NULL,
  `kurs` varchar(5) DEFAULT NULL,
  `rek_konsol` varchar(50) DEFAULT NULL,
  `UserId` varchar(50) DEFAULT NULL,
  `TglInput` datetime DEFAULT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 0,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurnal`
--

INSERT INTO `jurnal` (`no_jurnal`, `kode_jurnal`, `nama_jurnal`, `JR`, `type`, `kurs`, `rek_konsol`, `UserId`, `TglInput`, `isDeleted`, `createdAt`, `updatedAt`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-03-02 17:00:00', '0000-00-00 00:00:00'),
(2, '1001', 'Kas Kecil', '1', '2', NULL, NULL, '5140005', '2019-08-19 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '3001', 'Pendapatan SPP', '3', '2', NULL, NULL, '5140005', '2019-08-22 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '3002', 'Pendapatan Seragam', '3', '2', NULL, NULL, '5140005', '2019-08-22 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '3003', 'Pendapatan Gedung', '3', '2', NULL, NULL, '5140005', '2019-08-22 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '3004', 'Pendapatan Kegiatan', '3', '2', NULL, NULL, '5140005', '2019-08-22 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '3005', 'Pendapatan Modul', '3', '2', NULL, NULL, '5140005', '2019-08-22 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '3006', 'Pendapatan Buku Paket', '3', '2', NULL, NULL, '5140005', '2019-08-22 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '3007', 'Pendapatan Formulir', '3', '2', NULL, NULL, '5140005', '2019-08-22 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '3008', 'Pendapatan Kegiatan Akhir Tahun', '3', '2', NULL, NULL, '5140005', '2019-08-22 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, '4001', 'Pengeluaran Material Sekolah', '4', '2', NULL, NULL, '5140005', '2019-09-10 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, '1000', 'KAS & BANK', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, '1000.03', 'Kas Belum Disetor', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, '1000.04', 'Bank', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, '1000.041', 'BSM - YBS', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, '1000.042', 'BRI KC - YBS', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, '1000.043', 'BRI KC', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, '1000.044', 'BRI KCP Kalimalang', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, '10011', 'Deposito', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, '1100', 'PIUTANG', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, '1100.01', 'Piutang Siswa', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, '1100.02', 'Piutang Karyawan/Guru', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, '110302', 'Account Receivable IDR', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, '110402', 'Advance Purchase IDR', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, '1200', 'PERSEDIAAN', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, '1200.01', 'Persediaan Perpustakaan', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, '1200.02', 'Persediaan Umum', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, '1300', 'Perlengkapan', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, '1400', 'Sewa Gedung Dibayar Dimuka', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, '1500', 'Asuransi Dibayar Dimuka', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, '1600', 'PPn Masukan', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, '1700', 'AKTIVA TETAP', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, '1700.01', 'Tanah', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, '1700.02', 'Gedung', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, '1700.03', 'Kendaraan', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, '1700.04', 'Peralatan', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, '1700.041', 'Peralatan Laboratorium', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, '1700.042', 'Peralatan Kelas', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, '1700.043', 'Peralatan Kantor', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, '1700.044', 'Peralatan Perpustakaan', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, '1700.045', 'Peralatan ICT', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, '1700.046', 'Peralatan RT/Umum', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, '1710', 'Akumulasi Depresiasi Fixed As', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, '1710.01', 'Akumulasi Penyusutan Gedung', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, '1710.02', 'Akumulasi Penyusutan Kendaraan', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, '1710.03', 'Akumulasi Penyusutan Peralat', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, '1710.031', 'Akumulasi Penyusutan Inventaris', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, '1710.032', 'Akumulasi Penyusutan Peralatan', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, '1720', 'AKTIVA LAINNYA', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, '1720.02', 'Cadangan Dana Pensiun', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, '1720.03', 'Aktiva Tetap Rusak', '1', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, '2000', 'Hutang', '2', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, '2000.01', 'Hutang Bank', '2', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, '2000.02', 'Uang Muka Penjualan', '2', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, '2100', 'PPn Keluaran', '2', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, '210102', 'Account Payable IDR', '2', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, '210202', 'Advance Sales IDR', '2', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, '2200', 'BON SEMENTARA', '2', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, '2300', 'Hutang Kendaraan', '2', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, '3000', 'KEKAYAAN BERSIH', '2', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, '3000.01', 'Kekayaan Bersih - Tidak Terikat', '2', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, '3000.02', 'Kekayaan Bersih - Terikat Tempo', '2', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, '3000.03', 'Kekayaan Bersih - Terikat Perma', '2', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, '310001', 'Opening Balance Equity', '2', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, '3200.02', 'Deviden', '2', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, '320001', 'RETAINED EARNING', '2', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, '4000', 'PENDAPATAN', '3', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, '410104', 'Sales Term Discount IDR', '3', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, '5000', 'COGS', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, '6000', 'BIAYA OPERASIONAL', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, '6100', 'BIAYA PENDIDIKAN & PENGAJ', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, '6100.01', 'Biaya Honor Guru', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, '6100.05', 'Biaya Ujian (UTS/UAS)', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, '6100.06', 'Biaya Promosi', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, '6100.07', 'Biaya Pengembangan Kurikulum', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, '6100.08', 'Biaya Pembinaan Kesiswaan', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, '6100.09', 'Biaya Persiapan Akreditasi', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, '6100.11', 'Biaya Seminar/Workshop', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, '6100.12', 'Biaya Penyusunan Bahan Ajar', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, '6100.13', 'Biaya Perlengkapan Akademik', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, '6100.14', 'Biaya Rapat Kerja', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, '6100.15', 'Biaya Implementasi SPMI', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, '6100.16', 'Biaya Pemeliharaan Inventaris', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, '6100.17', 'Biaya Pemeliharaan ICT', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, '6100.18', 'Biaya Peneliharaan Lab/Kelas', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, '6199', 'Biaya Akademik Lain', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, '6400', 'BIAYA UMUM', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, '6401.01', 'Biaya Gaji Karyawan Umum', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, '6401.02', 'Biaya Lembur Karyawan Umum', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, '6401.03', 'Biaya Makan/Minum', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, '6401.04', 'Biaya Jaminan Hari Tua (JHT)', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, '6401.05', 'Biaya Perjalanan Dinas', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, '6401.06', 'Biaya Pakaian Dinas', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, '6401.07', 'Biaya Asuransi Kesehatan (Askes)', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, '6401.08', 'Biaya Bingkisan Lebaran & Bukb', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, '6401.09', 'Biaya Tamu Rapat', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, '6401.1', 'Biaya Listrik (PLN)', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, '6401.11', 'Biaya Retribusi Kebersihan', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, '6401.12', 'Biaya Instalasi', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, '6401.13', 'Biaya Pengobatan', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, '6401.14', 'Biaya Pembinaan Rohani', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, '6401.15', 'Biaya Pengembangan SDM', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, '6401.16', 'Biaya Telepon/Internet', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, '6401.17', 'Biaya Bahan Bakar', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, '6401.18', 'Biaya Pesangon', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, '6401.19', 'Biaya PPH Pasal 21', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, '6401.2', 'Biaya PBB', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, '6401.21', 'Biaya Asuransi', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, '6401.22', 'Biaya Pemeliharaan Gedung', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, '6401.23', 'Biaya Pemeliharaan Kendaraan', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, '6401.24', 'Biaya Pemeliharaan Emplasemen', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, '6401.25', 'Biaya Perlengkapan RT/Umum', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, '6401.99', 'Biaya Umum/RT Lain', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, '6500', 'Biaya Penyusutan & Amortisas', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, '6500.01', 'Biaya Penyusutan Gedung', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, '6500.02', 'Biaya Penyusutan Kendaraan', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, '6500.03', 'Biaya Penyusutan Peralatan', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, '6500.031', 'Biaya Penyusutan Inventaris kantor', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, '6500.032', 'Biaya Penyusutan Inventaris Kelas', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, '6500.033', 'Biaya Penyusutan Inventaris Lab', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, '6500.034', 'Biaya Penyusutan Inventaris ICT', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, '6500.035', 'Biaya Penyusutan Inventaris Perpustakaan', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, '6500.036', 'Biaya Penyusutan Peralatan RT', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, '6600', 'Biaya Yang Ditangguhkan', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, '6203.11', 'Biaya Sewa Gedung', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, '6203.12', 'Biaya Umum & Adm Lainnya', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, '7100', 'PENDAPATAN DILUAR USAHA', '3', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, '7100.01', 'Pendapatan Bunga/Bagi Hasil', '3', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, '7100.02', 'Pendapatan Sewa Sarana', '3', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, '7100.03', 'Penjualan Inventory / Perlengkapan', '3', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, '7100.99', 'Pendapatan Lain-Lain', '3', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, '7200', 'BIAYA DILUAR USAHA', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, '7200.01', 'Biaya Pajak Atas Bunga', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, '7200.02', 'Biaya Adm Bank & Buku Cek/Giro', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, '7200.03', 'Biaya Fasilitas (Over Head Cost)', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, '7200.04', 'Biaya Cadangan Investasi', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, '7200.99', 'Beban Lain-Lain', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, '8100', 'Gain/Loss Dispossal F.A', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, '910002', 'Realize Gain or Loss IDR', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, '910003', 'Unrealize Gain or Loss IDR', '4', '2', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, '1000', 'Kas', '1', '1', NULL, NULL, '5140005', '2019-08-19 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, '999', 'TEST', '1', '2', NULL, NULL, NULL, NULL, 0, '2020-03-02 17:00:00', '0000-00-00 00:00:00'),
(153, 'TEST 2', 'TT', '1', '2', NULL, NULL, NULL, NULL, 0, '2020-03-02 17:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`no_jurnal`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `no_jurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
