-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jun 2023 pada 20.32
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_olshop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `deskripsi` mediumtext DEFAULT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `id_kategori`, `harga`, `deskripsi`, `gambar`) VALUES
(1, 'Meja Belajar', 2, 1500000, 'Meja Belajar Pink Putih', 'meja1.jpeg'),
(2, 'Meja Makan ', 2, 25000000, 'Waktu makan merupakan saat yang tepat untuk berkumpul bersama keluarga. Agar momen tersebut terasa lebih istimewa, gunakan furniture ruang makan yang berkualitas. Set Meja Makan hadir dengan desain minimalis yang cocok dipadukan dengan berbagai tema ruang makan. Set ini terdiri dari 1 meja makan dan 4 kursi makan terbuat dari material berkualitas dengan rangka kokoh.', 'meja2.png'),
(3, 'Meja Rias', 2, 67000000, 'Meja rias', 'Meja_rias.jpeg'),
(4, 'Meja Ruang Tamu', 2, 185000000, 'Meja tamu adalah meja yang biasa untuk menerima atau menjamu tamu dengan teh, kopi dan coockies. Meja ini juga menjadi pemanis utama dalam sebuah ruangan, karena banyak desain yang anda dapat miliki dan banyak toko furniture yang menjual meja jenis ini. Meja tamu berukuran lebih kecil dari coffee table walaupun sama-sama diperuntukan untuk meletakkan kopi atau teh. Ukuran coffee table sangat beragam dan bervariasi, dan banyak pilihan yang dapat di sesuaikan dengan ukuran ruangan dan sofa. ', 'meja3.jpeg'),
(7, 'Kitchen Set ', 4, 235000000, 'Kitchen set merupakan solusi untuk  yang memiliki area dapur yang berukuran minimalis di rumah atau apartemen. Kitchen set tidak hanya dibuat untuk area penyimpanan perkakas dapur, tetapi juga untuk memasak dan mencuci piring. ', 'kitchenset1.jpeg'),
(8, 'Tempat Tidur ', 5, 5800000, 'Tempat tidur dengan desain terbaru', 'tempat_tidur.png'),
(11, 'Lampu Hias', 9, 54000000, 'Benda lain yang bisa ditempatkan di meja adalah lampu hias. Meja di ruang tamu, meja di ruang keluarga, merupakan tempat yang ideal untuk meletakkan benda ini. Lampu hias meja identik dengan bentuknya yang eksotis, minimalis, dan memancarkan kesan elegan.', 'Clear_Crystal_Tiered_Chandelier_Lighting_Modern_Luxury_8_Light_Pendant_Lamp.jpeg'),
(12, 'Lemari Pakaian', 3, 3100000, 'Dengan menggunakan lemari seperti ini akan lebih memudahkan kamu untuk mencari pakaian ataupun dress yang ingin  digunakan.  Dengan fungsinya yang fleksibel membuat lemari ini sangat diminati, dan semakin mewah gaya lemari akan membuat lemari seperti ini memiliki harga yang cukup mahal dipasaran.', 'lemari.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gambar`
--

CREATE TABLE `tbl_gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_gambar`
--

INSERT INTO `tbl_gambar` (`id_gambar`, `id_barang`, `ket`, `gambar`) VALUES
(1, 2, 'Gambar 1', 'gambar (1).jpeg'),
(2, 2, 'Gambar 1', 'gambar (1).png'),
(3, 2, 'Gambar 1', 'gambar (2).jpeg'),
(4, 2, 'Gambar 1', 'gambar (3).jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Kursi'),
(2, 'Meja'),
(3, 'Lemari'),
(4, 'Kitchen Set'),
(5, 'Tempat Tidur'),
(9, 'Lampu Hias');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(25) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `level_user` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `password`, `level_user`) VALUES
(1, 'Kevin', 'admin1', '123', 1),
(2, 'Adi', 'admin2', '456', 2),
(6, 'Soraya', 'soraya12', 'soraya13', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tbl_gambar`
--
ALTER TABLE `tbl_gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_gambar`
--
ALTER TABLE `tbl_gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
