/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.24-MariaDB : Database - db_olshop
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_olshop` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_olshop`;

/*Table structure for table `tbl_barang` */

DROP TABLE IF EXISTS `tbl_barang`;

CREATE TABLE `tbl_barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(255) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `berat` int(11) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `deskripsi` mediumtext DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_barang` */

insert  into `tbl_barang`(`id_barang`,`nama_barang`,`id_kategori`,`berat`,`harga`,`deskripsi`,`gambar`) values 
(1,'Meja Belajar',2,5000,2000000,'Meja Belajar Pink Putih','meja1.jpeg'),
(2,'Meja Makan ',2,7000,4000000,'Waktu makan merupakan saat yang tepat untuk berkumpul bersama keluarga. Agar momen tersebut terasa lebih istimewa, gunakan furniture ruang makan yang berkualitas. Set Meja Makan hadir dengan desain minimalis yang cocok dipadukan dengan berbagai tema ruang makan. Set ini terdiri dari 1 meja makan dan 4 kursi makan terbuat dari material berkualitas dengan rangka kokoh.','meja2.png'),
(3,'Meja Rias',2,3000,800000,'Meja rias','Meja_rias.jpeg'),
(4,'Meja Ruang Tamu',2,5000,1800000,'Meja tamu adalah meja yang biasa untuk menerima atau menjamu tamu dengan teh, kopi dan coockies. Meja ini juga menjadi pemanis utama dalam sebuah ruangan, karena banyak desain yang anda dapat miliki dan banyak toko furniture yang menjual meja jenis ini. Meja tamu berukuran lebih kecil dari coffee table walaupun sama-sama diperuntukan untuk meletakkan kopi atau teh. Ukuran coffee table sangat beragam dan bervariasi, dan banyak pilihan yang dapat di sesuaikan dengan ukuran ruangan dan sofa. ','meja3.jpeg'),
(7,'Kitchen Set ',4,15000,20000000,'Kitchen set merupakan solusi untuk  yang memiliki area dapur yang berukuran minimalis di rumah atau apartemen. Kitchen set tidak hanya dibuat untuk area penyimpanan perkakas dapur, tetapi juga untuk memasak dan mencuci piring. ','kitchenset1.jpeg'),
(8,'Tempat Tidur ',5,10000,5800000,'Tempat tidur dengan desain terbaru','tempat_tidur.png'),
(11,'Lampu Hias',9,2000,400000,'Benda lain yang bisa ditempatkan di meja adalah lampu hias. Meja di ruang tamu, meja di ruang keluarga, merupakan tempat yang ideal untuk meletakkan benda ini. Lampu hias meja identik dengan bentuknya yang eksotis, minimalis, dan memancarkan kesan elegan.','Clear_Crystal_Tiered_Chandelier_Lighting_Modern_Luxury_8_Light_Pendant_Lamp.jpeg'),
(12,'Lemari Pakaian',3,10000,3100000,'Dengan menggunakan lemari seperti ini akan lebih memudahkan kamu untuk mencari pakaian ataupun dress yang ingin  digunakan.  Dengan fungsinya yang fleksibel membuat lemari ini sangat diminati, dan semakin mewah gaya lemari akan membuat lemari seperti ini memiliki harga yang cukup mahal dipasaran.','lemari.jpeg'),
(13,'Lampu Belajar',9,600,25000,'Lampu baca meja minimalis LED ramah lingkungan dengan 12 LED menyediakan berbagai macam kecerahan. Lampu memiliki 3 tingkat kecerahan (untuk membaca, bersantai dan tidur), yang akan memberikan perlindungan penuh pada mata Anda dalam kondisi cahaya yang berbeda. Penggunaan yang sangat tahan lama, lampu ini dapat ditenagai oleh baterai isi ulang atau kabel USB. Tabung memutar bebas 360 derajat dapat ditekuk untuk mengarahkan cahaya ke tempat yang Anda inginkan.','lampuB1.jpg');

/*Table structure for table `tbl_gambar` */

DROP TABLE IF EXISTS `tbl_gambar`;

CREATE TABLE `tbl_gambar` (
  `id_gambar` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) NOT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  PRIMARY KEY (`id_gambar`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_gambar` */

insert  into `tbl_gambar`(`id_gambar`,`id_barang`,`ket`,`gambar`) values 
(17,2,'Gambar (2)','e7d36e15295587c30e875e6d2a93ab16.jpg'),
(18,2,'Gambar (3)','ed0353a715720ea1b070f1e4c08b7860.jpg'),
(19,13,'LampuB (2)','577722d364cf5656c122c0673060caaf.jpg'),
(20,13,'LampuB (3)','0bed228328a5e200033c0d6212d7e754.jpg');

/*Table structure for table `tbl_kategori` */

DROP TABLE IF EXISTS `tbl_kategori`;

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_kategori` */

insert  into `tbl_kategori`(`id_kategori`,`nama_kategori`) values 
(1,'Kursi'),
(2,'Meja'),
(3,'Lemari'),
(4,'Kitchen Set'),
(5,'Tempat Tidur'),
(9,'Lampu');

/*Table structure for table `tbl_pelanggan` */

DROP TABLE IF EXISTS `tbl_pelanggan`;

CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `foto` text NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_pelanggan` */

insert  into `tbl_pelanggan`(`id_pelanggan`,`nama_pelanggan`,`email`,`password`,`foto`) values 
(1,'Sahaja','sahaja@gmail.com','123',''),
(2,'sukro','sukro@gmail.com','123','');

/*Table structure for table `tbl_rekening` */

DROP TABLE IF EXISTS `tbl_rekening`;

CREATE TABLE `tbl_rekening` (
  `id_rekening` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bank` varchar(25) DEFAULT NULL,
  `no_rek` varchar(25) DEFAULT NULL,
  `atas_nama` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_rekening`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_rekening` */

insert  into `tbl_rekening`(`id_rekening`,`nama_bank`,`no_rek`,`atas_nama`) values 
(1,'BNI','08294283','Sukro'),
(2,'BRI','87897665','Sukro');

/*Table structure for table `tbl_rinci_transaksi` */

DROP TABLE IF EXISTS `tbl_rinci_transaksi`;

CREATE TABLE `tbl_rinci_transaksi` (
  `id_rinci` int(11) NOT NULL AUTO_INCREMENT,
  `no_order` varchar(25) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_rinci`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_rinci_transaksi` */

insert  into `tbl_rinci_transaksi`(`id_rinci`,`no_order`,`id_barang`,`qty`) values 
(3,'202306305OVKCRNI',12,2),
(4,'202306305OVKCRNI',13,1),
(5,'202306305OVKCRNI',11,1),
(6,'20230630YMUSPDXI',12,2),
(7,'20230630YMUSPDXI',13,1),
(8,'20230630YMUSPDXI',11,1),
(9,'20230630DXYNUHT3',13,1),
(10,'20230630DXYNUHT3',12,1),
(11,'20230630JRH7OTZB',13,2);

/*Table structure for table `tbl_setting` */

DROP TABLE IF EXISTS `tbl_setting`;

CREATE TABLE `tbl_setting` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `nama_toko` varchar(255) DEFAULT NULL,
  `lokasi` int(11) DEFAULT NULL,
  `alamat_toko` text DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_setting` */

insert  into `tbl_setting`(`id`,`nama_toko`,`lokasi`,`alamat_toko`,`no_telp`) values 
(1,'Toko Sahaja',23,'Jl. Lebak Gede No.56 Kota Bandung','0222535545');

/*Table structure for table `tbl_transaksi` */

DROP TABLE IF EXISTS `tbl_transaksi`;

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int(11) DEFAULT NULL,
  `no_order` varchar(255) NOT NULL,
  `tgl_order` date DEFAULT NULL,
  `nama_penerima` varchar(25) DEFAULT NULL,
  `hp_penerima` varchar(15) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `kota` varchar(25) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kode_pos` varchar(8) DEFAULT NULL,
  `expedisi` varchar(255) DEFAULT NULL,
  `paket` varchar(255) DEFAULT NULL,
  `estimasi` varchar(255) DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `total_bayar` varchar(25) DEFAULT NULL,
  `status_bayar` int(1) DEFAULT NULL,
  `bukti_bayar` text DEFAULT NULL,
  `atas_nama` varchar(25) DEFAULT NULL,
  `nama_bank` varchar(25) DEFAULT NULL,
  `no_rek` varchar(25) DEFAULT NULL,
  `status_order` int(1) DEFAULT NULL,
  `no_resi` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_transaksi` */

insert  into `tbl_transaksi`(`id_transaksi`,`id_pelanggan`,`no_order`,`tgl_order`,`nama_penerima`,`hp_penerima`,`provinsi`,`kota`,`alamat`,`kode_pos`,`expedisi`,`paket`,`estimasi`,`ongkir`,`berat`,`grand_total`,`total_bayar`,`status_bayar`,`bukti_bayar`,`atas_nama`,`nama_bank`,`no_rek`,`status_order`,`no_resi`) values 
(5,1,'202306305OVKCRNI','2023-06-30','Sukro','08121981881',' Banten',' Lebak','dwadad','40132','jne','REG','2-3 Hari',437000,22600,6625000,'7.062.000',1,'daginggiling.jpg','Hani','bri','4232342352',3,'JKT4121131314'),
(6,1,'20230630YMUSPDXI','2023-06-30','Sukro','08121981881',' DKI Jakarta',' Jakarta Pusat','dawdawda','40132','tiki','REG','2 Hari',230000,22600,6625000,'6.855.000',0,NULL,NULL,NULL,NULL,0,NULL),
(7,1,'20230630DXYNUHT3','2023-06-30','Sukro3','08121981881',' Bangka Belitung',' Belitung Timur','wdaawdadaw13131','40132','jne','OKE','3-6 Hari',462000,10600,3125000,'3.587.000',1,'cumi.jpg','Hani','BNI','4232342352',3,'JKT424242'),
(8,2,'20230630JRH7OTZB','2023-06-30','Sukro56','08121981881',' Bali',' Bangli','dqqdqdqdwq','40132','jne','OKE','3-6 Hari',25000,1200,50000,'75.000',0,NULL,NULL,NULL,NULL,0,NULL);

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(25) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `level_user` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id_user`,`nama_user`,`username`,`password`,`level_user`) values 
(1,'Kevin','admin1','123',1),
(2,'Adi','admin2','456',2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
