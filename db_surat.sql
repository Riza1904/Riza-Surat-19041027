-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 5.7.33 - MySQL Community Server (GPL)
-- OS Server:                    Win64
-- HeidiSQL Versi:               11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- membuang struktur untuk table surat.divisi
DROP TABLE IF EXISTS `divisi`;
CREATE TABLE IF NOT EXISTS `divisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `divisi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel surat.divisi: ~1 rows (lebih kurang)
/*!40000 ALTER TABLE `divisi` DISABLE KEYS */;
REPLACE INTO `divisi` (`id`, `divisi`) VALUES
	(1, 'Teknik'),
	(8, 'Personalia'),
	(9, 'Umum');
/*!40000 ALTER TABLE `divisi` ENABLE KEYS */;

-- membuang struktur untuk table surat.kategori_surat
DROP TABLE IF EXISTS `kategori_surat`;
CREATE TABLE IF NOT EXISTS `kategori_surat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_surat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel surat.kategori_surat: ~6 rows (lebih kurang)
/*!40000 ALTER TABLE `kategori_surat` DISABLE KEYS */;
REPLACE INTO `kategori_surat` (`id`, `kategori_surat`) VALUES
	(1, 'Surat Tugas'),
	(2, 'Surat Perintah'),
	(3, 'Surat Pribadi'),
	(4, 'Surat Kuasa'),
	(5, 'Surat Mutasi'),
	(6, 'Surat Umum');
/*!40000 ALTER TABLE `kategori_surat` ENABLE KEYS */;

-- membuang struktur untuk table surat.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel surat.user: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`id`, `username`, `password`) VALUES
	(1, 'admin', 'admin');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- membuang struktur untuk table surat.data-surat
DROP TABLE IF EXISTS `data-surat`;
CREATE TABLE IF NOT EXISTS `data-surat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_surat` varchar(50) NOT NULL,
  `pengirim` varchar(50) DEFAULT NULL,
  `penerima` varchar(50) DEFAULT NULL,
  `perihal` varchar(50) DEFAULT NULL,
  `divisi_id` int(11) DEFAULT NULL,
  `file` varchar(120) DEFAULT NULL,
  `ket` varchar(120) DEFAULT NULL,
  `kategori_surat` varchar(120) DEFAULT NULL,
  `tipe_surat` enum('masuk','keluar') DEFAULT NULL,
  `tanggal_surat` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `divisi_id` (`divisi_id`),
  CONSTRAINT `FK_data-surat_divisi` FOREIGN KEY (`divisi_id`) REFERENCES `divisi` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel surat.data-surat: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `data-surat` DISABLE KEYS */;
/*!40000 ALTER TABLE `data-surat` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
