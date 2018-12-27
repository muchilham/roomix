/*
SQLyog Ultimate v10.42 
MySQL - 5.5.5-10.1.30-MariaDB : Database - roomixdb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Data for the table `paketan` */

/*Data for the table `paketan_detail` */

/*Data for the table `pembayaran` */

insert  into `pembayaran`(`id_pembayaran`,`id_penyewaan`,`waktu_pembayaran`,`bukti_pembayaran`) values (4,'INV000001','2018-06-26 03:59:04','11.JPG');

/*Data for the table `penyewaan` */

insert  into `penyewaan`(`id_penyewaan`,`tipe_penyewaan`,`waktu_pakai`,`waktu_selesai`,`total_harga_sewa`,`waktu_penyewaan`,`status_penyewaan`,`id_user`) values ('INV000001','0','2018-06-01 00:00:00','2018-06-03 00:00:00',9900000,'2018-06-26 03:48:10',1,'ilham'),('INV000002','0','2018-06-22 00:00:00','2018-06-29 00:00:00',34650000,'2018-06-26 04:02:24',1,'ilham');

/*Data for the table `penyewaan_detail_nonpaketan` */

insert  into `penyewaan_detail_nonpaketan`(`id_penyewaan_detail_nonpaketan`,`id_penyewaan`,`id_peralatan`,`id_ruangan`) values (29,'INV000001',0,1),(30,'INV000001',2,0),(31,'INV000001',0,3),(32,'INV000002',0,1),(33,'INV000002',2,0),(34,'INV000002',0,3);

/*Data for the table `penyewaan_detail_paketan` */

/*Data for the table `peralatan` */

/*Data for the table `ruangan` */

insert  into `ruangan`(`id_ruangan`,`nama_ruangan`,`deskripsi_ruangan`,`harga_ruangan`,`satuan_ruangan`,`kapasitas_ruangan`,`status_ruangan`,`gambar_ruangan_1`,`gambar_ruangan_2`) values (1,'Gedung Prisma Ballroom 2','Gedung Prisma Ballroom 2 merupakan gedung yang dikelola oleh tsamara dan gedung ini berkapasitas 100',1000000,'0',1000,1,'11.JPG|21.jpg|31.JPG','41.JPG|51.JPG'),(2,'Gedung Prisma Ballroom 1','Gedung Prisma Ballroom 1 merupakan gedung yang dikelola oleh tsamara dan gedung ini berkapasitas 210',3000000,'0',2100,1,'1.jpg|2.jpg|3.jpg','4.jpg|5.jpg'),(3,'Gedung Prisma Ballroom 3','Gedung Prisma Ballroom 1 merupakan gedung yang dikelola oleh tsamara dan gedung ini berkapasitas 300',500000,'0',300,1,'12.JPG|22.JPG|32.JPG','42.jpg|52.JPG');

/*Data for the table `user` */

insert  into `user`(`id_user`,`password`,`nama_lengkap`,`email`,`no_telp`,`alamat`,`tipe_user`) values ('admin','admin','administrator','admin@gmail.com','081198520045',NULL,1),('asdasda','ilham123','ilham','ilhamkuncung28@gmail.com','081291665400','jakarta',0),('ilham','ilham123','ilham','ilhamkuncung28@gmail.com','081291665400','jakarta',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
