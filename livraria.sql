-- MySQL dump 10.13  Distrib 5.7.43, for osx10.18 (x86_64)
--
-- Host: localhost    Database: Livraria
-- ------------------------------------------------------
-- Server version	5.7.43

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Assunto`
--

DROP TABLE IF EXISTS `Assunto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Assunto` (
  `CodAs` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Descricao` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`CodAs`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Assunto`
--

LOCK TABLES `Assunto` WRITE;
/*!40000 ALTER TABLE `Assunto` DISABLE KEYS */;
INSERT INTO `Assunto` VALUES (1,'Romance'),(3,'Drama');
/*!40000 ALTER TABLE `Assunto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Autor`
--

DROP TABLE IF EXISTS `Autor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Autor` (
  `CodAu` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nome` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`CodAu`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Autor`
--

LOCK TABLES `Autor` WRITE;
/*!40000 ALTER TABLE `Autor` DISABLE KEYS */;
INSERT INTO `Autor` VALUES (3,'Glenda'),(4,'Nina'),(18,'Dimitri'),(19,'teste'),(20,'654fdsfsdf');
/*!40000 ALTER TABLE `Autor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Livro`
--

DROP TABLE IF EXISTS `Livro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Livro` (
  `Codl` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Editora` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Edicao` int(11) NOT NULL,
  `AnoPublicacao` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Valor` decimal(8,2) NOT NULL,
  PRIMARY KEY (`Codl`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Livro`
--

LOCK TABLES `Livro` WRITE;
/*!40000 ALTER TABLE `Livro` DISABLE KEYS */;
INSERT INTO `Livro` VALUES (1,'O Pequeno Príncipe','Abril',2,'2023',100.00);
/*!40000 ALTER TABLE `Livro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Livro_Assunto`
--

DROP TABLE IF EXISTS `Livro_Assunto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Livro_Assunto` (
  `Livro_Codl` int(10) unsigned NOT NULL,
  `Assunto_CodAs` int(10) unsigned NOT NULL,
  KEY `livro_assunto_livro_codl_foreign` (`Livro_Codl`),
  KEY `livro_assunto_assunto_codas_foreign` (`Assunto_CodAs`),
  CONSTRAINT `livro_assunto_assunto_codas_foreign` FOREIGN KEY (`Assunto_CodAs`) REFERENCES `Assunto` (`CodAs`),
  CONSTRAINT `livro_assunto_livro_codl_foreign` FOREIGN KEY (`Livro_Codl`) REFERENCES `Livro` (`Codl`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Livro_Assunto`
--

LOCK TABLES `Livro_Assunto` WRITE;
/*!40000 ALTER TABLE `Livro_Assunto` DISABLE KEYS */;
INSERT INTO `Livro_Assunto` VALUES (1,1),(1,3);
/*!40000 ALTER TABLE `Livro_Assunto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Livro_Autor`
--

DROP TABLE IF EXISTS `Livro_Autor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Livro_Autor` (
  `Livro_Codl` int(10) unsigned NOT NULL,
  `Autor_CodAu` int(10) unsigned NOT NULL,
  KEY `livro_autor_livro_codl_foreign` (`Livro_Codl`),
  KEY `livro_autor_autor_codau_foreign` (`Autor_CodAu`),
  CONSTRAINT `livro_autor_autor_codau_foreign` FOREIGN KEY (`Autor_CodAu`) REFERENCES `Autor` (`CodAu`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `livro_autor_livro_codl_foreign` FOREIGN KEY (`Livro_Codl`) REFERENCES `Livro` (`Codl`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Livro_Autor`
--

LOCK TABLES `Livro_Autor` WRITE;
/*!40000 ALTER TABLE `Livro_Autor` DISABLE KEYS */;
INSERT INTO `Livro_Autor` VALUES (1,3),(1,4);
/*!40000 ALTER TABLE `Livro_Autor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_12_28_011751_create__assunto_table',1),(6,'2023_12_28_011757_create__autor_table',1),(7,'2023_12_28_011801_create__livro_table',1),(8,'2023_12_28_011807_create__livro__assunto_table',1),(9,'2023_12_28_011821_create__livro__autor_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-29  2:00:38
