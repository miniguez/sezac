-- MySQL dump 10.15  Distrib 10.0.16-MariaDB, for osx10.10 (x86_64)
--
-- Host: localhost    Database: sezac
-- ------------------------------------------------------
-- Server version	10.0.16-MariaDB

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
-- Table structure for table `AniosFiscales`
--

DROP TABLE IF EXISTS `AniosFiscales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AniosFiscales` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AniosFiscales`
--

LOCK TABLES `AniosFiscales` WRITE;
/*!40000 ALTER TABLE `AniosFiscales` DISABLE KEYS */;
INSERT INTO `AniosFiscales` VALUES (2,'2015');
/*!40000 ALTER TABLE `AniosFiscales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Beneficiarios`
--

DROP TABLE IF EXISTS `Beneficiarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Beneficiarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) NOT NULL,
  `apellidoPaterno` varchar(80) NOT NULL,
  `apellidoMaterno` varchar(80) DEFAULT NULL,
  `rfc` varchar(45) NOT NULL,
  `direccion` varchar(180) DEFAULT NULL,
  `telefono` varchar(18) DEFAULT NULL,
  `idOrganizacion` int(10) unsigned DEFAULT NULL,
  `idMunicipio` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Beneficiarios_Organizaciones1_idx` (`idOrganizacion`),
  KEY `fk_Beneficiarios_Municipios1_idx` (`idMunicipio`),
  CONSTRAINT `fk_Beneficiarios_Municipios1` FOREIGN KEY (`idMunicipio`) REFERENCES `Municipios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Beneficiarios_Organizaciones1` FOREIGN KEY (`idOrganizacion`) REFERENCES `Organizaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Beneficiarios`
--

LOCK TABLES `Beneficiarios` WRITE;
/*!40000 ALTER TABLE `Beneficiarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `Beneficiarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Dependencias`
--

DROP TABLE IF EXISTS `Dependencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Dependencias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(180) NOT NULL,
  `abreviatura` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Dependencias`
--

LOCK TABLES `Dependencias` WRITE;
/*!40000 ALTER TABLE `Dependencias` DISABLE KEYS */;
INSERT INTO `Dependencias` VALUES (8,'Secretaria de economia','SEZAC'),(9,'Secretaria de finanzas','SEFIN');
/*!40000 ALTER TABLE `Dependencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Encargados`
--

DROP TABLE IF EXISTS `Encargados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Encargados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) NOT NULL,
  `apellidoPaterno` varchar(80) NOT NULL,
  `apellidoMaterno` varchar(80) DEFAULT NULL,
  `numEmpleado` varchar(8) NOT NULL,
  `telefono` varchar(18) DEFAULT NULL,
  `idDependencia` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Encargados_Dependecias1_idx` (`idDependencia`),
  CONSTRAINT `fk_Encargados_Dependecias1` FOREIGN KEY (`idDependencia`) REFERENCES `Dependencias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Encargados`
--

LOCK TABLES `Encargados` WRITE;
/*!40000 ALTER TABLE `Encargados` DISABLE KEYS */;
INSERT INTO `Encargados` VALUES (1,'Encargado 1','Uno',NULL,'234561',NULL,8);
/*!40000 ALTER TABLE `Encargados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Estados`
--

DROP TABLE IF EXISTS `Estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Estados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(65) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Estados`
--

LOCK TABLES `Estados` WRITE;
/*!40000 ALTER TABLE `Estados` DISABLE KEYS */;
/*!40000 ALTER TABLE `Estados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Municipios`
--

DROP TABLE IF EXISTS `Municipios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Municipios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) NOT NULL,
  `idEstado` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Municipios_Estados1_idx` (`idEstado`),
  CONSTRAINT `fk_Municipios_Estados1` FOREIGN KEY (`idEstado`) REFERENCES `Estados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Municipios`
--

LOCK TABLES `Municipios` WRITE;
/*!40000 ALTER TABLE `Municipios` DISABLE KEYS */;
/*!40000 ALTER TABLE `Municipios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Organizaciones`
--

DROP TABLE IF EXISTS `Organizaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Organizaciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(180) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Organizaciones`
--

LOCK TABLES `Organizaciones` WRITE;
/*!40000 ALTER TABLE `Organizaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `Organizaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Programas`
--

DROP TABLE IF EXISTS `Programas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Programas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `archivo` varchar(120) DEFAULT NULL,
  `idUnidadesResponsable` int(10) unsigned NOT NULL,
  `idAniosFiscale` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Programas_UnidadesResponsables1_idx` (`idUnidadesResponsable`),
  KEY `fk_Programas_aniosFiscales1_idx` (`idAniosFiscale`),
  CONSTRAINT `fk_Programas_UnidadesResponsables1` FOREIGN KEY (`idUnidadesResponsable`) REFERENCES `UnidadesResponsables` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Programas_aniosFiscales1` FOREIGN KEY (`idAniosFiscale`) REFERENCES `AniosFiscales` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Programas`
--

LOCK TABLES `Programas` WRITE;
/*!40000 ALTER TABLE `Programas` DISABLE KEYS */;
/*!40000 ALTER TABLE `Programas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ProgramasBeneficiarios`
--

DROP TABLE IF EXISTS `ProgramasBeneficiarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ProgramasBeneficiarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` enum('Beneficiario','Organizacion') NOT NULL DEFAULT 'Beneficiario',
  `estatus` enum('EnProceso','Concluyo','NoConcluyo') DEFAULT NULL,
  `idPrograma` int(10) unsigned NOT NULL,
  `idOrganizacion` int(10) unsigned DEFAULT NULL,
  `idBeneficiario` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ProgramasBeneficiarios_Programas1_idx` (`idPrograma`),
  KEY `fk_ProgramasBeneficiarios_Organizaciones1_idx` (`idOrganizacion`),
  KEY `fk_ProgramasBeneficiarios_Beneficiarios1_idx` (`idBeneficiario`),
  CONSTRAINT `fk_ProgramasBeneficiarios_Beneficiarios1` FOREIGN KEY (`idBeneficiario`) REFERENCES `Beneficiarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ProgramasBeneficiarios_Organizaciones1` FOREIGN KEY (`idOrganizacion`) REFERENCES `Organizaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ProgramasBeneficiarios_Programas1` FOREIGN KEY (`idPrograma`) REFERENCES `Programas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ProgramasBeneficiarios`
--

LOCK TABLES `ProgramasBeneficiarios` WRITE;
/*!40000 ALTER TABLE `ProgramasBeneficiarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `ProgramasBeneficiarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `UnidadesResponsables`
--

DROP TABLE IF EXISTS `UnidadesResponsables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UnidadesResponsables` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `idDependencia` int(10) unsigned NOT NULL,
  `idEncargado` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_UnidadesResponsables_Dependecias_idx` (`idDependencia`),
  KEY `fk_UnidadesResponsables_Encargados1_idx` (`idEncargado`),
  CONSTRAINT `fk_UnidadesResponsables_Dependecias` FOREIGN KEY (`idDependencia`) REFERENCES `Dependencias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_UnidadesResponsables_Encargados1` FOREIGN KEY (`idEncargado`) REFERENCES `Encargados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UnidadesResponsables`
--

LOCK TABLES `UnidadesResponsables` WRITE;
/*!40000 ALTER TABLE `UnidadesResponsables` DISABLE KEYS */;
INSERT INTO `UnidadesResponsables` VALUES (1,'Prueba de unidad 1',8,1);
/*!40000 ALTER TABLE `UnidadesResponsables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Usuarios`
--

DROP TABLE IF EXISTS `Usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `password` varchar(120) NOT NULL,
  `tipo` enum('Administrador','Encargado','Beneficiario') NOT NULL,
  `nombre` varchar(180) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usuarios`
--

LOCK TABLES `Usuarios` WRITE;
/*!40000 ALTER TABLE `Usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `Usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Vetados`
--

DROP TABLE IF EXISTS `Vetados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Vetados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `idProgramasBeneficiario` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Vetados_ProgramasBeneficiarios1_idx` (`idProgramasBeneficiario`),
  CONSTRAINT `fk_Vetados_ProgramasBeneficiarios1` FOREIGN KEY (`idProgramasBeneficiario`) REFERENCES `ProgramasBeneficiarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Vetados`
--

LOCK TABLES `Vetados` WRITE;
/*!40000 ALTER TABLE `Vetados` DISABLE KEYS */;
/*!40000 ALTER TABLE `Vetados` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-06-08  9:21:44
