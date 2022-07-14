-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Okt 2019 pada 07.09
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `efaktur`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_faktur`
--

CREATE TABLE `detail_faktur` (
  `no` int(11) NOT NULL,
  `no_faktur` varchar(100) NOT NULL,
  `diskon` varchar(200) NOT NULL,
  `dpp` varchar(200) NOT NULL,
  `hargaSatuan` varchar(200) NOT NULL,
  `hargaTotal` varchar(200) NOT NULL,
  `jumlahBarang` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `ppn` varchar(200) NOT NULL,
  `ppnbm` varchar(200) NOT NULL,
  `tarifPpnbm` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `header_faktur`
--

CREATE TABLE `header_faktur` (
  `no_faktur` varchar(200) NOT NULL,
  `fm` varchar(5) NOT NULL,
  `kdjstrx` varchar(2) NOT NULL,
  `fg_pengganti` varchar(3) NOT NULL,
  `masa_pajak` varchar(3) NOT NULL,
  `tahun_pajak` varchar(4) NOT NULL,
  `tgl_faktur` varchar(20) NOT NULL,
  `npwp` varchar(200) NOT NULL,
  `nama_pbf` varchar(200) NOT NULL,
  `alamat_lengkap` varchar(200) NOT NULL,
  `dpp` varchar(100) NOT NULL,
  `ppn` varchar(100) NOT NULL,
  `ppnbm` varchar(100) NOT NULL,
  `is_creditable` varchar(2) NOT NULL,
  `diskon` varchar(100) NOT NULL,
  `harga_jual` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `npwp_rs` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tgl` date NOT NULL,
  `exported` int(11) NOT NULL,
  `inserted_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `no` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`no`, `user`, `pass`) VALUES
(1, 'test', '098f6bcd4621d373cade4e832627b4f6');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_faktur`
--
ALTER TABLE `detail_faktur`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `header_faktur`
--
ALTER TABLE `header_faktur`
  ADD PRIMARY KEY (`no_faktur`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_faktur`
--
ALTER TABLE `detail_faktur`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
