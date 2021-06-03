-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: localhost    Database: absen
-- ------------------------------------------------------
-- Server version	8.0.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `absensi`
--

DROP TABLE IF EXISTS `absensi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `absensi` (
  `id` int NOT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `durasi` int DEFAULT NULL,
  `pertemuan_id` int NOT NULL,
  `krs_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_absensi_pertemuan1_idx` (`pertemuan_id`),
  KEY `fk_absensi_krs1_idx` (`krs_id`),
  CONSTRAINT `fk_absensi_krs1` FOREIGN KEY (`krs_id`) REFERENCES `krs` (`id`),
  CONSTRAINT `fk_absensi_pertemuan1` FOREIGN KEY (`pertemuan_id`) REFERENCES `pertemuan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `absensi`
--

LOCK TABLES `absensi` WRITE;
/*!40000 ALTER TABLE `absensi` DISABLE KEYS */;
/*!40000 ALTER TABLE `absensi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kelas`
--

DROP TABLE IF EXISTS `kelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kelas` (
  `id` int NOT NULL,
  `kode_kelas` varchar(50) NOT NULL,
  `kode_makul` varchar(50) NOT NULL,
  `nama_makul` varchar(50) NOT NULL,
  `tahun` int NOT NULL,
  `semester` int NOT NULL,
  `sks` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelas`
--

LOCK TABLES `kelas` WRITE;
/*!40000 ALTER TABLE `kelas` DISABLE KEYS */;
INSERT INTO `kelas` VALUES (1,'TSI202A','TSI202','Analisa Perancangan SI',2021,2,4),(2,'TSI206A','TSI206','Pemograman Website',2021,2,3),(3,'TSI204A','TSI204','Perancangan Basis Data',2021,2,3),(4,'TSI412A','TSI412','E-Goverment',2021,1,3),(5,'TIK407B','TIK407','Perencanaan Strategi SI',2018,2,3),(6,'TSI102A','TSI102','Struktur Data dan Algoritma',2021,2,2),(7,'TSI408B','TSI408','Big Data',2019,2,3),(8,'TSI306A','TSI306','Business Intelligence',2021,2,2),(9,'TSI306B','TSI306','Business Intelligence',2021,2,2),(10,'TSI206B','TSI206','Pemograman Web',2021,2,3);
/*!40000 ALTER TABLE `kelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `krs`
--

DROP TABLE IF EXISTS `krs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `krs` (
  `id` int NOT NULL,
  `kelas_id` int NOT NULL,
  `mahasiswa_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_krs_kelas_idx` (`kelas_id`),
  KEY `fk_krs_mahasiswa1_idx` (`mahasiswa_id`),
  CONSTRAINT `fk_krs_kelas` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  CONSTRAINT `fk_krs_mahasiswa1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `krs`
--

LOCK TABLES `krs` WRITE;
/*!40000 ALTER TABLE `krs` DISABLE KEYS */;
/*!40000 ALTER TABLE `krs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mahasiswa`
--

DROP TABLE IF EXISTS `mahasiswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mahasiswa` (
  `id` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nim` varchar(18) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tipe` int NOT NULL,
  `password` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mahasiswa`
--

LOCK TABLES `mahasiswa` WRITE;
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
INSERT INTO `mahasiswa` VALUES (1,'dadidu','0987654321','dadidu@gmail.com',1,1234),(3,'Marwan Aziz','1711521004','marwanaziz@gmail.com',2,12321),(4,'Wahyu Febrian P','1711521008','wahyukhan@gmail.com',2,1234567),(5,'Nova Noviana','1711521001','Novanoviana@gmail.com',2,1234),(6,'Erick Okta','1711521002','Erickokta@gmail.com',2,12345),(7,'Ananda Mardhatillah','1711521016','Ananda@gmail.com',2,12321),(8,'M. Nur Faiz P','1711522002','faiz@gmail.com',2,12345),(9,'Halim Wardhana','1711523010','Halim@gmail.com',2,12321),(10,'Ilham Akbar','1711522003','ilham@gmail.com',2,12321),(11,'M. Hasbillah','1711523004','hasbi@gmail.com',2,12321),(12,'Dio Harvandy','1711522004','dio@gmail.com',2,12345),(13,'Prima Prasetyo','1711523005','prima@gmail.com',2,12321),(14,'Fikri Rizaldi','1711522016','fikrizaldi@gmail.com',2,123);
/*!40000 ALTER TABLE `mahasiswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pertemuan`
--

DROP TABLE IF EXISTS `pertemuan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pertemuan` (
  `id` int NOT NULL,
  `pertemuan_ke` int NOT NULL,
  `tanggal` date NOT NULL,
  `kelas_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pertemuan_kelas1_idx` (`kelas_id`),
  CONSTRAINT `fk_pertemuan_kelas1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pertemuan`
--

LOCK TABLES `pertemuan` WRITE;
/*!40000 ALTER TABLE `pertemuan` DISABLE KEYS */;
/*!40000 ALTER TABLE `pertemuan` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-03  2:12:22
