/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.24-MariaDB : Database - dbtokoku
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbtokoku` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `dbtokoku`;

/*Table structure for table `jenis_produk` */

DROP TABLE IF EXISTS `jenis_produk`;

CREATE TABLE `jenis_produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `jenis_produk` */

insert  into `jenis_produk`(`id`,`nama`) values 
(1,'elektronik'),
(2,'furniture'),
(3,'makanan'),
(4,'minuman'),
(5,'komputer');

/*Table structure for table `kartu` */

DROP TABLE IF EXISTS `kartu`;

CREATE TABLE `kartu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(6) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `diskon` double DEFAULT NULL,
  `iuran` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode_UNIQUE` (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `kartu` */

insert  into `kartu`(`id`,`kode`,`nama`,`diskon`,`iuran`) values 
(1,'GOLD','Gold Utama',0.05,100000),
(2,'PLAT','Platinum Jaya',0.1,150000),
(3,'SLV','Silver',0.025,50000),
(4,'NO','Non Member',0,0);

/*Table structure for table `member` */

DROP TABLE IF EXISTS `member`;

CREATE TABLE `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('admin','manager','staff') NOT NULL,
  `foto` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `member` */

insert  into `member`(`id`,`fullname`,`username`,`password`,`role`,`foto`) values 
(1,'Admin','admin','67771da7cef164702710b6803ea0b0','admin','admin.jpg'),
(2,'Siti','siti','b48d66e55c41b0abb8c540b518f2e2','manager','manager.jpg'),
(3,'Staff','staff','6a91eb6ae9cc8e3a67d32b286c56c3','staff','staff.jpg'),
(5,'Admin1','admin1','967a9f8fa757dfb5fdda6e5e08579869fb9b2ae3','admin',NULL),
(6,'Manager','manager','54dd75eddaa72e610b060ae82548b2430a4dfbdc','manager',NULL),
(7,'Staff1','staff1','ae186d20e1a1b46737a98ef69fc0896ba7cca385','staff',NULL);

/*Table structure for table `pelanggan` */

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `jk` char(1) DEFAULT NULL,
  `tmp_lahir` varchar(30) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `kartu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pelanggan_kartu1_idx` (`kartu_id`),
  KEY `idx_nama_pelanggan` (`nama`),
  KEY `idx_tgllahir_pelanggan` (`tgl_lahir`),
  CONSTRAINT `fk_pelanggan_kartu1` FOREIGN KEY (`kartu_id`) REFERENCES `kartu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pelanggan` */

insert  into `pelanggan`(`id`,`kode`,`nama`,`jk`,`tmp_lahir`,`tgl_lahir`,`email`,`kartu_id`) values 
(1,'C001','Agung Sedayu','L','Solo','2010-01-01','sedayu@gmail.com',1),
(2,'C002','Pandan Wangi','P','Yogyakarta','1950-01-01','wangi@gmail.com',2),
(3,'C003','Sekar Mirah','P','Kediri','1983-02-20','mirah@yahoo.com',1),
(4,'C004','Swandaru Geni','L','Kediri','1981-01-04','swandaru@yahoo.com',4),
(5,'C005','Pradabashu','L','Pati','1985-04-02','prada85@gmail.com',2),
(6,'C006','Gayatri Dwi','P','Jakarta','1987-11-28','gaya87@gmail.com',1),
(7,'C007','Dewi Gyat','P','Jakarta','1988-12-01','giyat@gmail.com',1),
(8,'C008','Andre Haru','L','Surabaya','1990-07-15','andre.haru@gmail.com',4),
(9,'C009','Ahmad Hasan','L','Surabaya','1992-10-15','ahasan@gmail.com',4),
(10,'C010','Cassanndra','P','Belfast','1990-11-20','casa90@gmail.com',1);

/*Table structure for table `pembayaran` */

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nokuitansi` varchar(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `ke` int(11) DEFAULT NULL,
  `pesanan_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nokuitansi_UNIQUE` (`nokuitansi`),
  KEY `fk_pembayaran_pesanan1_idx` (`pesanan_id`),
  CONSTRAINT `fk_pembayaran_pesanan1` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pembayaran` */

/*Table structure for table `pembelian` */

DROP TABLE IF EXISTS `pembelian`;

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(45) DEFAULT NULL,
  `nomor` varchar(10) DEFAULT NULL,
  `produk_id` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nomor_UNIQUE` (`nomor`),
  KEY `produk_id` (`produk_id`),
  KEY `vendor_id` (`vendor_id`),
  CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`),
  CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pembelian` */

insert  into `pembelian`(`id`,`tanggal`,`nomor`,`produk_id`,`jumlah`,`harga`,`vendor_id`) values 
(1,'2019-10-10','P001',1,2,3500000,1),
(2,'2019-11-20','P002',2,5,5500000,2),
(3,'2019-12-12','P003',2,5,5400000,1),
(4,'2020-01-20','P004',7,200,1800,3),
(5,'2020-01-20','P005',5,100,2300,3);

/*Table structure for table `pesanan` */

DROP TABLE IF EXISTS `pesanan`;

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `total` double DEFAULT NULL,
  `pelanggan_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pesanan_customer_idx` (`pelanggan_id`),
  CONSTRAINT `fk_pesanan_customer` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pesanan` */

insert  into `pesanan`(`id`,`tanggal`,`total`,`pelanggan_id`) values 
(1,'2015-11-04',9720000,1),
(2,'2015-11-04',17500,3),
(3,'2015-11-04',0,6),
(4,'2015-11-04',0,7),
(5,'2015-11-04',0,10),
(6,'2015-11-04',0,2),
(7,'2015-11-04',0,5),
(8,'2015-11-04',0,4),
(9,'2015-11-04',0,8),
(10,'2015-11-04',0,9),
(11,'0000-00-00',200000,1);

/*Table structure for table `pesanan_items` */

DROP TABLE IF EXISTS `pesanan_items`;

CREATE TABLE `pesanan_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produk_id` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pesanan_items_pesanan1_idx` (`pesanan_id`),
  KEY `fk_pesanan_items_produk1_idx` (`produk_id`),
  CONSTRAINT `fk_pesanan_items_pesanan1` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pesanan_items_produk1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pesanan_items` */

insert  into `pesanan_items`(`id`,`produk_id`,`pesanan_id`,`qty`,`harga`) values 
(1,1,1,1,5040000),
(2,3,1,1,4680000),
(3,5,2,5,3500),
(6,5,3,10,3500),
(7,1,3,1,5040000),
(9,5,5,10,3500),
(10,5,6,20,3500);

/*Table structure for table `produk` */

DROP TABLE IF EXISTS `produk`;

CREATE TABLE `produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `harga_beli` double DEFAULT NULL,
  `harga_jual` double DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `min_stok` int(11) DEFAULT NULL,
  `jenis_produk_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode_UNIQUE` (`kode`),
  KEY `fk_produk_jenis_produk1_idx` (`jenis_produk_id`),
  CONSTRAINT `fk_produk_jenis_produk1` FOREIGN KEY (`jenis_produk_id`) REFERENCES `jenis_produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `produk` */

insert  into `produk`(`id`,`kode`,`nama`,`harga_beli`,`harga_jual`,`stok`,`min_stok`,`jenis_produk_id`) values 
(1,'TV01','Televisi 21 inch',3500000,5040000,10,6,1),
(2,'TV02','Televisi 40 inch',5500000,7440000,4,2,1),
(3,'K001','Kulkas 2 pintu',3500000,4680000,6,2,1),
(4,'M001','Meja Makan',500000,600000,4,3,2),
(5,'TK01','Teh Kotak',3000,3500,6,10,4),
(6,'PC01','PC Desktop HP',7000000,9600000,9,2,5),
(7,'TB01','Teh Botol',2000,2500,53,10,4),
(8,'AC01','Notebook Acer',8000000,10800000,7,2,5),
(13,'LP01','Laptop Dell',1200000,1500000,5,3,5);

/*Table structure for table `vendor` */

DROP TABLE IF EXISTS `vendor`;

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor` varchar(4) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `kota` varchar(30) DEFAULT NULL,
  `kontak` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nomor` (`nomor`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `vendor` */

insert  into `vendor`(`id`,`nomor`,`nama`,`kota`,`kontak`) values 
(1,'V001','PT Guna Samudra','Surabaya','Ali Nurdin'),
(2,'V002','PT Pondok C9','Depok','Putri Ramadhani'),
(3,'V003','CV Jaya Raya Semesta','Jakarta','Dwi Rahayu'),
(4,'V004','PT Lekulo X','Kebumen','Mbambang G'),
(5,'V005','PT IT Prima','Jakarta','David W');

/*Table structure for table `detail_produk_vw` */

DROP TABLE IF EXISTS `detail_produk_vw`;

/*!50001 DROP VIEW IF EXISTS `detail_produk_vw` */;
/*!50001 DROP TABLE IF EXISTS `detail_produk_vw` */;

/*!50001 CREATE TABLE  `detail_produk_vw`(
 `id` int(11) ,
 `kode` varchar(10) ,
 `nama` varchar(45) ,
 `harga_beli` double ,
 `harga_jual` double ,
 `stok` int(11) ,
 `min_stok` int(11) ,
 `jenis_produk_id` int(11) ,
 `jenis` varchar(45) 
)*/;

/*Table structure for table `tampil_produk` */

DROP TABLE IF EXISTS `tampil_produk`;

/*!50001 DROP VIEW IF EXISTS `tampil_produk` */;
/*!50001 DROP TABLE IF EXISTS `tampil_produk` */;

/*!50001 CREATE TABLE  `tampil_produk`(
 `nama` varchar(45) 
)*/;

/*View structure for view detail_produk_vw */

/*!50001 DROP TABLE IF EXISTS `detail_produk_vw` */;
/*!50001 DROP VIEW IF EXISTS `detail_produk_vw` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_produk_vw` AS select `p`.`id` AS `id`,`p`.`kode` AS `kode`,`p`.`nama` AS `nama`,`p`.`harga_beli` AS `harga_beli`,`p`.`harga_jual` AS `harga_jual`,`p`.`stok` AS `stok`,`p`.`min_stok` AS `min_stok`,`p`.`jenis_produk_id` AS `jenis_produk_id`,`j`.`nama` AS `jenis` from (`jenis_produk` `j` join `produk` `p` on(`p`.`jenis_produk_id` = `j`.`id`)) */;

/*View structure for view tampil_produk */

/*!50001 DROP TABLE IF EXISTS `tampil_produk` */;
/*!50001 DROP VIEW IF EXISTS `tampil_produk` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tampil_produk` AS select `produk`.`nama` AS `nama` from `produk` */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
