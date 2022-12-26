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

-- membuang struktur untuk table surat.data-surat
CREATE TABLE IF NOT EXISTS `data-surat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_surat` varchar(50) NOT NULL,
  `pengirim` varchar(50) DEFAULT NULL,
  `penerima` varchar(50) DEFAULT NULL,
  `perihal` varchar(50) DEFAULT NULL,
  `file` varchar(120) DEFAULT NULL,
  `ket` varchar(120) DEFAULT NULL,
  `kategori_surat` varchar(100) DEFAULT NULL,
  `tipe_surat` enum('masuk','keluar') DEFAULT NULL,
  `divisi` varchar(50) DEFAULT NULL,
  `tanggal_surat` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel surat.data-surat: ~4 rows (lebih kurang)
/*!40000 ALTER TABLE `data-surat` DISABLE KEYS */;
REPLACE INTO `data-surat` (`id`, `nomor_surat`, `pengirim`, `penerima`, `perihal`, `file`, `ket`, `kategori_surat`, `tipe_surat`, `divisi`, `tanggal_surat`) VALUES
	(21, '1', 'Andi', 'Budi', 'Kenaikan Gaji', 'location-pin.png', 'Minta Kenaikan Gaji', 'surat pribadi', 'masuk', 'personalia', '2022-12-26'),
	(22, '2', 'Budi', 'Kaka Budi', 'Cuti', 'adidas.png', 'Respon Cuti Kaka Budi', 'surat kerja', 'keluar', 'teknik', '2022-12-26');
/*!40000 ALTER TABLE `data-surat` ENABLE KEYS */;

-- membuang struktur untuk table surat.user
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

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
