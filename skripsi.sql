-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Okt 2022 pada 08.43
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_admin`
--

CREATE TABLE `tabel_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_admin`
--

INSERT INTO `tabel_admin` (`id_admin`, `nama`, `username`, `password`, `created_at`) VALUES
(1, 'simaster', 'simaster', 'simaster', '2022-06-15 09:03:55'),
(4, 'Doni', 'doni', 'doni', '2022-07-30 17:49:35'),
(5, 'Nur Dian', 'dian', 'dian', '2022-08-03 07:21:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_kost`
--

CREATE TABLE `tabel_kost` (
  `id_kost` int(11) NOT NULL,
  `nama_kost` varchar(30) NOT NULL,
  `alamat_kost` text NOT NULL,
  `kategori_kost` varchar(30) NOT NULL,
  `nama_pemilik` varchar(30) NOT NULL,
  `lattitude` varchar(50) NOT NULL,
  `longtitude` varchar(50) NOT NULL,
  `gambar` text NOT NULL,
  `status_kost` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `no_hp` varchar(30) NOT NULL,
  `no_wa` varchar(30) NOT NULL,
  `no_telegram` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_kost`
--

INSERT INTO `tabel_kost` (`id_kost`, `nama_kost`, `alamat_kost`, `kategori_kost`, `nama_pemilik`, `lattitude`, `longtitude`, `gambar`, `status_kost`, `keterangan`, `created_at`, `no_hp`, `no_wa`, `no_telegram`) VALUES
(12, 'M dan R', 'Langenharjo, Kabupaten Kendal, Jawa Tengah, 51314', 'Perempuan', 'Mira', '-6.92012', '110.19342', '01_49_,01_49_,01_49_', 'Tersedia', 'Hanya Menerima Perempuan', '2022-09-06 18:49:32', '', '087834568941', ''),
(13, 'Griya Loka', 'Langenharjo, Kendal, Jawa Tengah, 51314, Indonesia', 'Laki-Laki dan Perempuan', 'Ibu Kos', '-6.91999', '110.19318', '01_54_,01_54_,01_54_', 'Tersedia', 'Menerima Laki - Laki dan Perempuan', '2022-09-06 18:54:48', '', '08971665954', ''),
(14, 'Rumah Kos', 'Langenharjo, Kendal, Jawa Tengah, 51314, Indonesia', 'Perempuan', 'Bu Bambang', '-6.92001', '110.18897', '01_58_,01_58_,01_58_', 'Tersedia', 'Hanya menerima Perempuan', '2022-09-06 18:58:02', '', '+6281390733317', ''),
(15, 'Rumah Kos', 'Bugangin, Kendal, Jawa Tengah, 51314, Indonesia', 'Laki-Laki', 'Ibu Kos', '-6.92058', '110.1891', '02_06_,02_06_,02_06_', 'Tersedia', 'Hanya Menerima Putra', '2022-09-06 19:06:07', '', '+628122649847', ''),
(16, 'Rumah Kos', 'Bugangin, Kendal, Jawa Tengah, 51314, Indonesia', 'Laki-Laki', 'Bu Kos', '-6.92058', '110.18905', '02_11_,02_11_,02_11_', 'Tersedia', 'Hanya Menerima Laki-Laki', '2022-09-06 19:11:28', '0294382491', '+6282138350701', ''),
(17, 'Kos', 'Jalan Raya Batang-Kendal, Purwokerto, Kendal, Jawa Tengah, 51314, Indonesia', 'Laki-Laki dan Perempuan', 'Bu Dhina', '-6.921889882428145', '110.18076155303885', '13_39_,13_39_,13_39_', 'Tersedia', 'Kos area Uniss', '2022-09-20 20:33:26', '', '+6289635032061', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_user`
--

CREATE TABLE `tabel_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `no_wa` varchar(30) NOT NULL,
  `no_telegram` varchar(30) NOT NULL,
  `foto` text NOT NULL,
  `tgl_mendaftar` datetime NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_user`
--

INSERT INTO `tabel_user` (`id_user`, `nama`, `email`, `alamat`, `no_hp`, `no_wa`, `no_telegram`, `foto`, `tgl_mendaftar`, `username`, `password`, `created_at`) VALUES
(1, 'jono', 'khususnuyul96@gmail.com', 'kp. klaseman Rt2 /8', '089635032061', '089635032061', '089635032061', '08g.png', '2022-06-15 11:08:16', 'jono', 'jono', '2022-06-15 04:08:16'),
(2, 'parman', 'parman@gmail.com', 'lklk', '090', '09', '99', '19_15_sxs.png', '2022-07-14 16:25:23', 'parman', 'parman', '2022-08-03 12:15:22'),
(3, 'kkkk', 'kkk@gmail.com', '', '8787878', '878788', '788787', '12Capture3.PNG', '2022-07-15 14:12:46', 'kk', 'kk', '2022-07-15 07:12:46'),
(4, 'Anny Masrohah ', 'anny@gmail.com', 'kp. GadukanRt2 /8', '089635032061', '089635032061', '', '06any.png', '2022-08-08 17:06:14', 'annyMasrohah', 'anny', '2022-08-08 10:15:01'),
(5, 'aaa', 'asu@hsdhdh', 'llkl', 'a', '3', '3', '59Capture.PNG', '2022-08-08 19:59:27', 'a', 'a', '2022-08-08 13:35:53'),
(6, 'rooney', 'empusroyal@gmail.com', 'jhkhkjhj', '9893898938', '987987878', '878787', '58Capture3.PNG', '2022-09-20 19:58:11', 'rooney', 'rooney', '2022-09-20 12:58:11');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tabel_admin`
--
ALTER TABLE `tabel_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tabel_kost`
--
ALTER TABLE `tabel_kost`
  ADD PRIMARY KEY (`id_kost`);

--
-- Indeks untuk tabel `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tabel_admin`
--
ALTER TABLE `tabel_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tabel_kost`
--
ALTER TABLE `tabel_kost`
  MODIFY `id_kost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
