-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Feb 2023 pada 03.21
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stokbarang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id` int(11) NOT NULL,
  `kodebarang` int(5) NOT NULL,
  `namabarang` varchar(99) NOT NULL,
  `jumlah` varchar(99) NOT NULL,
  `lokasi` varchar(99) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`id`, `kodebarang`, `namabarang`, `jumlah`, `lokasi`, `tanggal`) VALUES
(8, 1001, 'Beras', '500', 'Rak 1', '2023-01-05'),
(9, 1002, 'Gula', '800', 'Rak 2', '2023-01-12'),
(11, 1003, 'Garam', '500', 'Rak 3', '2023-01-12'),
(12, 1004, 'Minyak Goreng', '100', 'Rak 4', '2023-01-12'),
(13, 1002, 'Gula', '100', 'Rak 2', '2023-01-12'),
(15, 1005, 'Telur', '450', 'Rak 5', '2023-01-13'),
(16, 1006, 'Mi Instan', '2200', 'Rak 6', '2023-01-29'),
(17, 1006, 'Mi Instan', '800', 'Rak 6', '2023-02-03');

--
-- Trigger `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `delete` AFTER DELETE ON `barang_keluar` FOR EACH ROW BEGIN
	UPDATE stokbarang set stok = stok + OLD.jumlah
    WHERE kodebarang = OLD.kodebarang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `t_keluar` AFTER INSERT ON `barang_keluar` FOR EACH ROW BEGIN
	UPDATE stokbarang SET stok = stok - NEW.jumlah
    WHERE kodebarang = NEW.kodebarang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_stok_keluar` AFTER UPDATE ON `barang_keluar` FOR EACH ROW BEGIN
  UPDATE stokbarang
  SET stok = stok - NEW.jumlah + OLD.jumlah
  WHERE kodebarang = NEW.kodebarang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id` int(11) NOT NULL,
  `kodebarang` int(5) NOT NULL,
  `namabarang` varchar(99) NOT NULL,
  `jumlah` varchar(99) NOT NULL,
  `lokasi` varchar(99) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id`, `kodebarang`, `namabarang`, `jumlah`, `lokasi`, `tanggal`) VALUES
(7, 1002, 'Gula', '500', 'Rak 2', '2023-01-05'),
(11, 1001, 'Beras', '1000', 'Rak 1', '2023-01-10'),
(15, 1001, 'Beras', '800', 'Rak 1', '2023-01-19'),
(16, 1003, 'Garam', '1000', 'Rak 3', '2023-01-12'),
(17, 1004, 'Minyak Goreng', '500', 'Rak 4', '2023-01-12'),
(18, 1001, 'Beras', '500', 'Rak 1', '2023-01-12'),
(19, 1005, 'Telur', '1000', 'Rak 5', '2023-01-12'),
(24, 1006, 'Mi Instan', '1500', 'Rak 6', '2023-02-02');

--
-- Trigger `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `delete_masuk` AFTER DELETE ON `barang_masuk` FOR EACH ROW BEGIN
	UPDATE stokbarang SET stok = stok - OLD.jumlah
    WHERE kodebarang = OLD.kodebarang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `t_masuk` AFTER INSERT ON `barang_masuk` FOR EACH ROW BEGIN
	UPDATE stokbarang SET stok = stok + NEW.jumlah
    WHERE kodebarang = NEW.kodebarang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_stok_masuk` AFTER UPDATE ON `barang_masuk` FOR EACH ROW BEGIN
  UPDATE stokbarang
  SET stok = stok + NEW.jumlah - OLD.jumlah
  WHERE kodebarang = NEW.kodebarang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('123456', '123456'),
('admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stokbarang`
--

CREATE TABLE `stokbarang` (
  `id` int(11) NOT NULL,
  `kodebarang` int(5) NOT NULL,
  `namabarang` varchar(99) NOT NULL,
  `stok` varchar(99) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `lokasi` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `stokbarang`
--

INSERT INTO `stokbarang` (`id`, `kodebarang`, `namabarang`, `stok`, `satuan`, `lokasi`) VALUES
(1, 1001, 'Beras', '1300', 'Kilogram', 'Rak 1'),
(2, 1002, 'Gula', '100', 'Kilogram', 'Rak 2'),
(3, 1003, 'Garam', '500', 'Kilogram', 'Rak 3'),
(4, 1004, 'Minyak Goreng', '200', 'Liter', 'Rak 4'),
(5, 1005, 'Telur', '550', 'Kilogram', 'Rak 5'),
(6, 1006, 'Mi Instan', '700', 'Pcs', 'Rak 6');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `stokbarang`
--
ALTER TABLE `stokbarang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `stokbarang`
--
ALTER TABLE `stokbarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
