-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Okt 2019 pada 12.57
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

--
-- Dumping data untuk tabel `detail_faktur`
--

INSERT INTO `detail_faktur` (`no`, `no_faktur`, `diskon`, `dpp`, `hargaSatuan`, `hargaTotal`, `jumlahBarang`, `nama`, `ppn`, `ppnbm`, `tarifPpnbm`) VALUES
(1, '0001918164552', '1325104', '1584016', '72728', '2909120', 40, 'ONDANSETRON 8 mg/ 4 ml INJ @ 10 BRN', '158401', '0', '0'),
(2, '0001918301199', '3312760', '3960040', '72728', '7272800', 100, 'ONDANSETRON 8 mg/ 4 ml INJ @ 10 BRN', '396004', '0', '0'),
(3, '0001918330907', '68472', '363528', '14400', '432000', 30, 'OMEPRAZOLE 20 MG KAPSUL 30S FAH', '36352', '0', '0'),
(4, '0001918285354', '1770', '175230', '88500', '177000', 2, 'CURCUMA FCT BLISTER', '17523', '0', '0'),
(5, '0001918285354', '103550', '846450', '475000', '950000', 2, 'VASCON INJEKSI 4 ML', '84646', '0', '0'),
(6, '0001918285354', '3375', '334125', '67500', '337500', 5, 'MYCO-Z OINTMENT 10 GR', '33412', '0', '0'),
(7, '0001918285354', '2475', '245025', '49500', '247500', 5, 'KENALOG IN ORABASE 5 GR', '24502', '0', '0'),
(8, '0001918184347', '1604250', '2895750', '150000', '4500000', 30, 'PIOGLITAZONE 30 MG TABLET 30S', '289575', '0', '0'),
(9, '0001918293322', '0', '5045455', '100909', '5045455', 50, 'Adalat Oros 30 mg 30S - E', '504545', '0', '0'),
(10, '0001918154588', '534750', '965250', '150000', '1500000', 10, 'PIOGLITAZONE 30 MG TABLET 30S', '96525', '0', '0'),
(11, '0001918483837', '912000', '1588000', '50000', '2500000', 50, 'ONDANSETRON 4 MG/ 2 ML INJ @ 10 BRN', '158800', '0', '0');

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

--
-- Dumping data untuk tabel `header_faktur`
--

INSERT INTO `header_faktur` (`no_faktur`, `fm`, `kdjstrx`, `fg_pengganti`, `masa_pajak`, `tahun_pajak`, `tgl_faktur`, `npwp`, `nama_pbf`, `alamat_lengkap`, `dpp`, `ppn`, `ppnbm`, `is_creditable`, `diskon`, `harga_jual`, `nama`, `npwp_rs`, `alamat`, `tgl`, `exported`, `inserted_at`) VALUES
('0001918154588', 'FM', '01', '0', '1', '2019', '31/01/2019', '029985207007000', 'PT PARIT PADANG GLOBAL', 'JL.RAWA SUMUR II KAV.BB NO.3 , JAKARTA TIMUR', '965250', '96525', '0', '1', '534750', '1500000', 'YAYASAN ROCHMAN ROCHIM', '747192540603000', 'DSN SAIMBANG NO.227 RT.010 RW.003KEBONAGUNG. SUKODONO', '2019-01-31', 1, '2019-10-06'),
('0001918164552', 'FM', '01', '0', '2', '2019', '01/02/2019', '029985207007000', 'PT PARIT PADANG GLOBAL', 'JL.RAWA SUMUR II KAV.BB NO.3 , JAKARTA TIMUR', '1584016', '158401', '0', '1', '1325104', '2909120', 'YAYASAN ROCHMAN ROCHIM', '747192540603000', 'DSN SAIMBANG NO.227 RT.010 RW.003KEBONAGUNG. SUKODONO', '2019-02-01', 1, '2019-10-03'),
('0001918184347', 'FM', '01', '0', '2', '2019', '08/02/2019', '029985207007000', 'PT PARIT PADANG GLOBAL', 'JL.RAWA SUMUR II KAV.BB NO.3 , JAKARTA TIMUR', '2895750', '289575', '0', '1', '1604250', '4500000', 'YAYASAN ROCHMAN ROCHIM', '747192540603000', 'DSN SAIMBANG NO.227 RT.010 RW.003KEBONAGUNG. SUKODONO', '2019-02-08', 1, '2019-10-03'),
('0001918285354', 'FM', '01', '0', '3', '2019', '04/03/2019', '029985207007000', 'PT PARIT PADANG GLOBAL', 'JL.RAWA SUMUR II KAV.BB NO.3 , JAKARTA TIMUR', '1600830', '160083', '0', '1', '111170', '1712000', 'YAYASAN ROCHMAN ROCHIM', '747192540603000', 'DSN SAIMBANG NO.227 RT.010 RW.003KEBONAGUNG. SUKODONO', '2019-03-04', 1, '2019-10-03'),
('0001918293322', 'FM', '01', '0', '3', '2019', '05/03/2019', '029985207007000', 'PT PARIT PADANG GLOBAL', 'JL.RAWA SUMUR II KAV.BB NO.3 , JAKARTA TIMUR', '5045455', '504545', '0', '1', '0', '5045455', 'YAYASAN ROCHMAN ROCHIM', '747192540603000', 'DSN SAIMBANG NO.227 RT.010 RW.003KEBONAGUNG. SUKODONO', '2019-03-05', 1, '2019-10-06'),
('0001918301199', 'FM', '01', '0', '3', '2019', '08/03/2019', '029985207007000', 'PT PARIT PADANG GLOBAL', 'JL.RAWA SUMUR II KAV.BB NO.3 , JAKARTA TIMUR', '3960040', '396004', '0', '1', '3312760', '7272800', 'YAYASAN ROCHMAN ROCHIM', '747192540603000', 'DSN SAIMBANG NO.227 RT.010 RW.003KEBONAGUNG. SUKODONO', '2019-03-08', 1, '2019-10-03'),
('0001918330907', 'FM', '01', '0', '3', '2019', '15/03/2019', '029985207007000', 'PT PARIT PADANG GLOBAL', 'JL.RAWA SUMUR II KAV.BB NO.3 , JAKARTA TIMUR', '363528', '36352', '0', '1', '68472', '432000', 'YAYASAN ROCHMAN ROCHIM', '747192540603000', 'DSN SAIMBANG NO.227 RT.010 RW.003KEBONAGUNG. SUKODONO', '2019-03-15', 1, '2019-10-03'),
('0001918483837', 'FM', '01', '0', '4', '2019', '23/04/2019', '029985207007000', 'PT PARIT PADANG GLOBAL', 'JL.RAWA SUMUR II KAV.BB NO.3 , JAKARTA TIMUR', '1588000', '158800', '0', '1', '912000', '2500000', 'YAYASAN ROCHMAN ROCHIM', '747192540603000', 'DSN SAIMBANG NO.227 RT.010 RW.003KEBONAGUNG. SUKODONO', '2019-04-23', 1, '2019-10-06');

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
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
