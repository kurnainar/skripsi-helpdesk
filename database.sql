-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.30-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for tugas-akhir
CREATE DATABASE IF NOT EXISTS `tugas-akhir` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `tugas-akhir`;

-- Dumping structure for table tugas-akhir.ada
CREATE TABLE IF NOT EXISTS `ada` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDPegawai` varchar(4) DEFAULT NULL COMMENT 'Format: P999',
  `IDProyek` varchar(9) DEFAULT NULL COMMENT 'Format: PRYYMM999',
  `Jabatan` varchar(1) DEFAULT NULL COMMENT 'Format: 1=staff, 2=Project Manager, 3=Supervisor, 4=General Manager',
  `PeriodeMulai` date DEFAULT NULL,
  `PeriodeSelesai` date DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDPegawai` (`IDPegawai`),
  KEY `IDProyek` (`IDProyek`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table tugas-akhir.ada: ~2 rows (approximately)
DELETE FROM `ada`;
/*!40000 ALTER TABLE `ada` DISABLE KEYS */;
INSERT INTO `ada` (`ID`, `IDPegawai`, `IDProyek`, `Jabatan`, `PeriodeMulai`, `PeriodeSelesai`) VALUES
	(1, 'P001', 'PR1801001', '1', '2018-01-15', '2018-01-31'),
	(2, 'P002', 'PR1801001', '1', '2018-01-15', '2018-01-31');
/*!40000 ALTER TABLE `ada` ENABLE KEYS */;

-- Dumping structure for table tugas-akhir.divisi
CREATE TABLE IF NOT EXISTS `divisi` (
  `IDDivisi` varchar(4) NOT NULL COMMENT 'Format: D999',
  `NamaDivisi` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`IDDivisi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tugas-akhir.divisi: ~6 rows (approximately)
DELETE FROM `divisi`;
/*!40000 ALTER TABLE `divisi` DISABLE KEYS */;
INSERT INTO `divisi` (`IDDivisi`, `NamaDivisi`) VALUES
	('D001', 'IT Programmer'),
	('D002', 'IT Support'),
	('D003', 'Telko'),
	('D004', 'General Affair'),
	('D005', 'Satpam'),
	('D006', 'Security');
/*!40000 ALTER TABLE `divisi` ENABLE KEYS */;

-- Dumping structure for table tugas-akhir.eskalasi
CREATE TABLE IF NOT EXISTS `eskalasi` (
  `IDEskalasi` varchar(4) NOT NULL COMMENT 'Format: E999',
  `TglEskalasi` datetime DEFAULT NULL,
  `Keterangan` varchar(300) DEFAULT NULL,
  `IDDivisi` varchar(4) DEFAULT NULL,
  `IDPegawai` varchar(4) DEFAULT NULL,
  `IDKeluhan` varchar(9) DEFAULT NULL COMMENT 'Format: KLYYMM999',
  PRIMARY KEY (`IDEskalasi`),
  KEY `IDPegawai` (`IDPegawai`),
  KEY `IDDivisi` (`IDDivisi`),
  KEY `IDKeluhan` (`IDKeluhan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tugas-akhir.eskalasi: ~0 rows (approximately)
DELETE FROM `eskalasi`;
/*!40000 ALTER TABLE `eskalasi` DISABLE KEYS */;
INSERT INTO `eskalasi` (`IDEskalasi`, `TglEskalasi`, `Keterangan`, `IDDivisi`, `IDPegawai`, `IDKeluhan`) VALUES
	('E001', '2018-01-08 03:37:37', 'Salah nentuin divisi dan pegawai', 'D004', 'P004', 'KL1801003');
/*!40000 ALTER TABLE `eskalasi` ENABLE KEYS */;

-- Dumping structure for table tugas-akhir.keluhan
CREATE TABLE IF NOT EXISTS `keluhan` (
  `IDKeluhan` varchar(9) NOT NULL COMMENT 'Format: KLYYMM999',
  `TglKeluhan` datetime DEFAULT NULL,
  `Deskripsi` varchar(500) DEFAULT NULL,
  `StatusKeluhan` varchar(1) DEFAULT NULL COMMENT 'Format: 1=eskalasi, 2=dalam proses, 3=selesai',
  `JenisKeluhan` varchar(1) DEFAULT NULL COMMENT 'Format: 1=IT Operasional; 2=Sistem Bermasalah; 3=Umum;',
  `TglKonfirmasi` date DEFAULT NULL,
  `IDDivisi` varchar(4) DEFAULT NULL COMMENT 'Format: D999',
  `IDTM` varchar(4) DEFAULT NULL COMMENT 'Format: T999',
  `IDPegawai` varchar(4) DEFAULT NULL COMMENT 'Format: P999',
  `IDKlien` varchar(9) DEFAULT NULL COMMENT 'Format: PRYYMM999',
  PRIMARY KEY (`IDKeluhan`),
  KEY `IDDivisi` (`IDDivisi`),
  KEY `IDTM` (`IDTM`),
  KEY `IDPegawai` (`IDPegawai`),
  KEY `IDKlien` (`IDKlien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tugas-akhir.keluhan: ~3 rows (approximately)
DELETE FROM `keluhan`;
/*!40000 ALTER TABLE `keluhan` DISABLE KEYS */;
INSERT INTO `keluhan` (`IDKeluhan`, `TglKeluhan`, `Deskripsi`, `StatusKeluhan`, `JenisKeluhan`, `TglKonfirmasi`, `IDDivisi`, `IDTM`, `IDPegawai`, `IDKlien`) VALUES
	('KL1801001', '2018-01-05 03:33:55', 'Servernya lemot', '3', '1', '2018-01-10', 'D002', 'T002', 'P002', 'K001'),
	('KL1801002', '2018-01-08 03:36:25', 'Rumus report ada yang salah', '3', '1', '2018-01-13', 'D001', 'T003', 'P001', 'K001'),
	('KL1801003', '2018-01-08 03:37:04', 'headset rusak', '3', '3', '2018-01-24', 'D002', 'T002', 'P002', 'K001');
/*!40000 ALTER TABLE `keluhan` ENABLE KEYS */;

-- Dumping structure for table tugas-akhir.klien
CREATE TABLE IF NOT EXISTS `klien` (
  `IDKlien` varchar(4) NOT NULL COMMENT 'Format: K999',
  `NamaKlien` varchar(50) DEFAULT NULL,
  `Alamat` varchar(150) DEFAULT NULL,
  `NoTelp` varchar(13) DEFAULT NULL,
  `IDProyek` varchar(9) DEFAULT NULL COMMENT 'Format: PRYYMM999',
  PRIMARY KEY (`IDKlien`),
  KEY `IDProyek` (`IDProyek`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tugas-akhir.klien: ~2 rows (approximately)
DELETE FROM `klien`;
/*!40000 ALTER TABLE `klien` DISABLE KEYS */;
INSERT INTO `klien` (`IDKlien`, `NamaKlien`, `Alamat`, `NoTelp`, `IDProyek`) VALUES
	('K001', 'Hudly', 'Pamulang', '092834234', 'PR1801001'),
	('K002', 'Anang', 'Pondok Aren', '09339333', NULL);
/*!40000 ALTER TABLE `klien` ENABLE KEYS */;

-- Dumping structure for table tugas-akhir.pegawai
CREATE TABLE IF NOT EXISTS `pegawai` (
  `IDPegawai` varchar(4) NOT NULL COMMENT 'Format: P999',
  `NamaPegawai` varchar(50) DEFAULT NULL,
  `TempatLahir` varchar(30) DEFAULT NULL,
  `TanggalLahir` date DEFAULT NULL,
  `NoTelp` varchar(13) DEFAULT NULL,
  `IDDivisi` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`IDPegawai`),
  KEY `IDDivisi` (`IDDivisi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tugas-akhir.pegawai: ~4 rows (approximately)
DELETE FROM `pegawai`;
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
INSERT INTO `pegawai` (`IDPegawai`, `NamaPegawai`, `TempatLahir`, `TanggalLahir`, `NoTelp`, `IDDivisi`) VALUES
	('P001', 'Kurnain Arsyi Ramadhan', 'Tangerang', '2010-01-01', '09876', 'D001'),
	('P002', 'Fajar', 'Jakarta', '2018-01-01', '097644', 'D002'),
	('P003', 'Apit', 'Jakarta', '2018-01-02', '0869860860', 'D003'),
	('P004', 'Mahadi', 'Jakarta', '2018-01-03', '098077907', 'D004');
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;

-- Dumping structure for table tugas-akhir.proyek
CREATE TABLE IF NOT EXISTS `proyek` (
  `IDProyek` varchar(9) NOT NULL COMMENT 'Format: PRYYMM999',
  `NamaProyek` varchar(50) DEFAULT NULL,
  `LokasiProyek` varchar(150) DEFAULT NULL,
  `TglMulaiProyek` date DEFAULT NULL,
  `NoTelp` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`IDProyek`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tugas-akhir.proyek: ~0 rows (approximately)
DELETE FROM `proyek`;
/*!40000 ALTER TABLE `proyek` DISABLE KEYS */;
INSERT INTO `proyek` (`IDProyek`, `NamaProyek`, `LokasiProyek`, `TglMulaiProyek`, `NoTelp`) VALUES
	('PR1801001', 'BNI Life', 'Gd Smesco Lt 7 - 8', '2018-01-15', '23423424');
/*!40000 ALTER TABLE `proyek` ENABLE KEYS */;

-- Dumping structure for table tugas-akhir.solusi
CREATE TABLE IF NOT EXISTS `solusi` (
  `IDSolusi` varchar(4) NOT NULL COMMENT 'Format: S999',
  `Deskripsi` varchar(500) DEFAULT NULL,
  `TglSolusi` date DEFAULT NULL,
  `StatusKonfirmasi` varchar(1) DEFAULT NULL COMMENT 'Format: 1=Sudah Diinformasikan Kepada Klien',
  `IDKeluhan` varchar(9) NOT NULL COMMENT 'Format: KLYYMM999',
  PRIMARY KEY (`IDSolusi`,`IDKeluhan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tugas-akhir.solusi: ~3 rows (approximately)
DELETE FROM `solusi`;
/*!40000 ALTER TABLE `solusi` DISABLE KEYS */;
INSERT INTO `solusi` (`IDSolusi`, `Deskripsi`, `TglSolusi`, `StatusKonfirmasi`, `IDKeluhan`) VALUES
	('S001', 'Wes kelar', '2018-01-06', '1', 'KL1801001'),
	('S002', 'udah dikerjain', '2018-01-13', '1', 'KL1801002'),
	('S003', 'asdadadsa', '2018-01-24', '1', 'KL1801003');
/*!40000 ALTER TABLE `solusi` ENABLE KEYS */;

-- Dumping structure for table tugas-akhir.tingkatmasalah
CREATE TABLE IF NOT EXISTS `tingkatmasalah` (
  `IDTM` varchar(4) NOT NULL COMMENT 'Format: T999',
  `NamaTM` varchar(8) DEFAULT NULL,
  `LamaPengerjaan` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`IDTM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tugas-akhir.tingkatmasalah: ~3 rows (approximately)
DELETE FROM `tingkatmasalah`;
/*!40000 ALTER TABLE `tingkatmasalah` DISABLE KEYS */;
INSERT INTO `tingkatmasalah` (`IDTM`, `NamaTM`, `LamaPengerjaan`) VALUES
	('T001', 'Standar', '2'),
	('T002', 'Sedang', '3'),
	('T003', 'Tinggi', '4');
/*!40000 ALTER TABLE `tingkatmasalah` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
