-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: GestorProjectes
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.16.04.1

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
-- Table structure for table `especificaciones`
--

USE GestorProjectes;

DROP TABLE IF EXISTS `especificaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `especificaciones` (
  `id_especificacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_projecte` int(11) NOT NULL,
  `nombre_especificacion` varchar(255) NOT NULL,
  `dificultad` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `tiempo` time NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_sprint` int(11) NOT NULL,
  PRIMARY KEY (`id_especificacion`),
  KEY `fk_idprojectes` (`id_projecte`),
  KEY `fk_id_usuario_esp` (`id_usuario`),
  KEY `fk_id_sprint_esp` (`id_sprint`),
  CONSTRAINT `fk_id_sprint_esp` FOREIGN KEY (`id_sprint`) REFERENCES `sprint` (`id_sprint`),
  CONSTRAINT `fk_id_usuario_esp` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `fk_idprojectes` FOREIGN KEY (`id_projecte`) REFERENCES `projectes` (`id_projecte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especificaciones`
--

LOCK TABLES `especificaciones` WRITE;
/*!40000 ALTER TABLE `especificaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `especificaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupos`
--

DROP TABLE IF EXISTS `grupos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupos` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_grupo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupos`
--

LOCK TABLES `grupos` WRITE;
/*!40000 ALTER TABLE `grupos` DISABLE KEYS */;
INSERT INTO `grupos` VALUES (1,'grupo1'),(2,'grupo2');
/*!40000 ALTER TABLE `grupos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projectes`
--

DROP TABLE IF EXISTS `projectes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projectes` (
  `id_projecte` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_projecte` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `scrum_master` varchar(255) NOT NULL,
  `product_owner` varchar(255) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  PRIMARY KEY (`id_projecte`),
  KEY `fk_projectes` (`id_grupo`),
  CONSTRAINT `fk_projectes` FOREIGN KEY (`id_grupo`) REFERENCES `grupos` (`id_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projectes`
--

LOCK TABLES `projectes` WRITE;
/*!40000 ALTER TABLE `projectes` DISABLE KEYS */;
INSERT INTO `projectes` VALUES (1,'QuienEsQuien','Juego de quien es quien','marc','miguel',1),(2,'GestorProjectes','Aplicacion de gestor de projectes','marc','miguel',1),(3,'BuscaMinas','Juego del busca minas','carlos','marcos',2),(4,'SopaLetras','Juego del sopa de letras','carlos','marcos',2);
/*!40000 ALTER TABLE `projectes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sprint`
--

DROP TABLE IF EXISTS `sprint`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sprint` (
  `id_sprint` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_sprint` varchar(255) NOT NULL,
  `id_especificacion` int(11) NOT NULL,
  `tiempo` time NOT NULL,
  `id_projecte` int(11) NOT NULL,
  PRIMARY KEY (`id_sprint`),
  KEY `fk_id_esp_sprint` (`id_especificacion`),
  KEY `fk_id_projecte_sprint` (`id_projecte`),
  CONSTRAINT `fk_id_esp_sprint` FOREIGN KEY (`id_especificacion`) REFERENCES `especificaciones` (`id_especificacion`),
  CONSTRAINT `fk_id_projecte_sprint` FOREIGN KEY (`id_projecte`) REFERENCES `especificaciones` (`id_projecte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sprint`
--

LOCK TABLES `sprint` WRITE;
/*!40000 ALTER TABLE `sprint` DISABLE KEYS */;
/*!40000 ALTER TABLE `sprint` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `password` varchar(512) NOT NULL,
  `rol` varchar(5) NOT NULL,
  `grupo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `correo` (`correo`),
  UNIQUE KEY `usuario` (`usuario`),
  KEY `fk_usuarios` (`grupo`),
  CONSTRAINT `fk_usuarios` FOREIGN KEY (`grupo`) REFERENCES `grupos` (`id_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'marc','alvarez','marcalvarezru8@gmail.com','marcalvarez','36752aed6f2a4650f2f88a2822e3b8ef97b5404ff62813d11be0314dca76c5da37d0b0bf6de272472b274013e1bc98970a9564065435f3baa190f3284b266a64','SM',NULL),(2,'miguel','arteaga','marteagavalle@gmail.com','miguelarteaga','69d02a6c3c9ea7ff711e454020a16a81f7ee438cd3334e0f9be3eb0338df2dff58a231963c681e736143eeb6c1d3280d5f053d9892ff33ff09d95cf8294c556f','PO',NULL),(3,'khalid','alouan','kalit.alouan668@gmail.com','khalidalouan','e7a978e62e94186506e8a0ed9b6bedbc4c938c50a4ef73998afdedc5c7154345647a71037fde883fcac9ade1a4e15d9a495a56641a382f39393889f26a2d0470','DE',1),(4,'lucas','alvarez','lucasalv@gmail.com','lucasalvarez','a02e6f9f4b63c9f00232d1d478d5fb1ec7431a444f91fad58f3c7678a0113eac0dd10d8830be48c34a27f654319e026e47542dc1d5a603177aa641b882dac1f9','DE',2),(5,'carlos','ruiz','carlosruiz@gmail.com','carlosruiz','1ca6cc129624a0f7abd0a55f443a9f31d040dc502c4f1abe5b78e7659f4fd82e1532ea3ba5c17bc4624b2ef5d2ce7cb17b53ff53b8b53bf8ab085d2387f4704a','SM',NULL),(6,'marcos','arteaga','marcosarteaga@gmail.com','marcosarteaga','a0a8418422f08bf0a9ebf039028fa228129c7b6a7db6bc22bffe2068638869bf73cf1ac337fa0748a4c0cc6aeb6d10322b3ee39d067497968258635349cfbf0c','PO',NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-10 11:42:18
