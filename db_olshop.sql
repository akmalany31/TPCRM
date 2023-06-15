-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 10:24 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

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
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `berat` int(11) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `deskripsi` mediumtext DEFAULT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `id_kategori`, `berat`, `harga`, `deskripsi`, `gambar`) VALUES
(1, 'Meja Belajar', 2, 5000, 2000000, 'Meja Belajar Pink Putih', 'meja1.jpeg'),
(2, 'Meja Makan ', 2, 7000, 4000000, 'Waktu makan merupakan saat yang tepat untuk berkumpul bersama keluarga. Agar momen tersebut terasa lebih istimewa, gunakan furniture ruang makan yang berkualitas. Set Meja Makan hadir dengan desain minimalis yang cocok dipadukan dengan berbagai tema ruang makan. Set ini terdiri dari 1 meja makan dan 4 kursi makan terbuat dari material berkualitas dengan rangka kokoh.', 'meja2.png'),
(3, 'Meja Rias', 2, 3000, 800000, 'Meja rias', 'Meja_rias.jpeg'),
(4, 'Meja Ruang Tamu', 2, 5000, 1800000, 'Meja tamu adalah meja yang biasa untuk menerima atau menjamu tamu dengan teh, kopi dan coockies. Meja ini juga menjadi pemanis utama dalam sebuah ruangan, karena banyak desain yang anda dapat miliki dan banyak toko furniture yang menjual meja jenis ini. Meja tamu berukuran lebih kecil dari coffee table walaupun sama-sama diperuntukan untuk meletakkan kopi atau teh. Ukuran coffee table sangat beragam dan bervariasi, dan banyak pilihan yang dapat di sesuaikan dengan ukuran ruangan dan sofa. ', 'meja3.jpeg'),
(7, 'Kitchen Set ', 4, 15000, 20000000, 'Kitchen set merupakan solusi untuk  yang memiliki area dapur yang berukuran minimalis di rumah atau apartemen. Kitchen set tidak hanya dibuat untuk area penyimpanan perkakas dapur, tetapi juga untuk memasak dan mencuci piring. ', 'kitchenset1.jpeg'),
(8, 'Tempat Tidur ', 5, 10000, 5800000, 'Tempat tidur dengan desain terbaru', 'tempat_tidur.png'),
(11, 'Lampu Hias', 9, 2000, 400000, 'Benda lain yang bisa ditempatkan di meja adalah lampu hias. Meja di ruang tamu, meja di ruang keluarga, merupakan tempat yang ideal untuk meletakkan benda ini. Lampu hias meja identik dengan bentuknya yang eksotis, minimalis, dan memancarkan kesan elegan.', 'Clear_Crystal_Tiered_Chandelier_Lighting_Modern_Luxury_8_Light_Pendant_Lamp.jpeg'),
(12, 'Lemari Pakaian', 3, 10000, 3100000, 'Dengan menggunakan lemari seperti ini akan lebih memudahkan kamu untuk mencari pakaian ataupun dress yang ingin  digunakan.  Dengan fungsinya yang fleksibel membuat lemari ini sangat diminati, dan semakin mewah gaya lemari akan membuat lemari seperti ini memiliki harga yang cukup mahal dipasaran.', 'lemari.jpeg'),
(13, 'Lampu Belajar', 9, 600, 25000, 'Lampu baca meja minimalis LED ramah lingkungan dengan 12 LED menyediakan berbagai macam kecerahan. Lampu memiliki 3 tingkat kecerahan (untuk membaca, bersantai dan tidur), yang akan memberikan perlindungan penuh pada mata Anda dalam kondisi cahaya yang berbeda. Penggunaan yang sangat tahan lama, lampu ini dapat ditenagai oleh baterai isi ulang atau kabel USB. Tabung memutar bebas 360 derajat dapat ditekuk untuk mengarahkan cahaya ke tempat yang Anda inginkan.', 'lampuB1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gambar`
--

CREATE TABLE `tbl_gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gambar`
--

INSERT INTO `tbl_gambar` (`id_gambar`, `id_barang`, `ket`, `gambar`) VALUES
(17, 2, 'Gambar (2)', 'e7d36e15295587c30e875e6d2a93ab16.jpg'),
(18, 2, 'Gambar (3)', 'ed0353a715720ea1b070f1e4c08b7860.jpg'),
(19, 13, 'LampuB (2)', '577722d364cf5656c122c0673060caaf.jpg'),
(20, 13, 'LampuB (3)', '0bed228328a5e200033c0d6212d7e754.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Kursi'),
(2, 'Meja'),
(3, 'Lemari'),
(4, 'Kitchen Set'),
(5, 'Tempat Tidur'),
(9, 'Lampu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email`, `password`) VALUES
(1, 'Sahaja', 'sahaja@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` int(1) NOT NULL,
  `nama_toko` varchar(255) DEFAULT NULL,
  `lokasi` int(11) DEFAULT NULL,
  `alamat_toko` text DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `nama_toko`, `lokasi`, `alamat_toko`, `no_telp`) VALUES
(1, 'Toko Sahaja', 23, 'Jl. Lebak Gede No.56 Kota Bandung', '0222535545');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(25) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `level_user` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `password`, `level_user`) VALUES
(1, 'Kevin', 'admin1', '123', 1),
(2, 'Adi', 'admin2', '456', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tbl_gambar`
--
ALTER TABLE `tbl_gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_gambar`
--
ALTER TABLE `tbl_gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
