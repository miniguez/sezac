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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Beneficiarios`
--

LOCK TABLES `Beneficiarios` WRITE;
/*!40000 ALTER TABLE `Beneficiarios` DISABLE KEYS */;
INSERT INTO `Beneficiarios` VALUES (1,'Beneficiario1','test1','','IIGM7788','','',1,14),(2,'Beneficiario2','test1','','IIGM7788','','',1,14),(3,'Beneficiario 3','test3','','GHTGM7788','','',NULL,14),(4,'Beneficiario 4','test4','','THTGM7788er','','',NULL,14);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Encargados`
--

LOCK TABLES `Encargados` WRITE;
/*!40000 ALTER TABLE `Encargados` DISABLE KEYS */;
INSERT INTO `Encargados` VALUES (1,'Encargado 1','Uno',NULL,'234561',NULL,8),(2,'Encargado 2','Dos',NULL,'344566',NULL,9);
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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Estados`
--

LOCK TABLES `Estados` WRITE;
/*!40000 ALTER TABLE `Estados` DISABLE KEYS */;
INSERT INTO `Estados` VALUES (32,'Zacatecas');
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
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Municipios`
--

LOCK TABLES `Municipios` WRITE;
/*!40000 ALTER TABLE `Municipios` DISABLE KEYS */;
INSERT INTO `Municipios` VALUES (14,'Guadalupe',32),(56,'Zacatecas',32);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Organizaciones`
--

LOCK TABLES `Organizaciones` WRITE;
/*!40000 ALTER TABLE `Organizaciones` DISABLE KEYS */;
INSERT INTO `Organizaciones` VALUES (1,'Organizacion1'),(2,'Organizacion2');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Programas`
--

LOCK TABLES `Programas` WRITE;
/*!40000 ALTER TABLE `Programas` DISABLE KEYS */;
INSERT INTO `Programas` VALUES (5,'Programa prueba 1',NULL,7,2),(6,'Programa prueba 2','6_requisito.pdf',7,2);
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
  `fecha` date NOT NULL,
  `fechaFin` date DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ProgramasBeneficiarios`
--

LOCK TABLES `ProgramasBeneficiarios` WRITE;
/*!40000 ALTER TABLE `ProgramasBeneficiarios` DISABLE KEYS */;
INSERT INTO `ProgramasBeneficiarios` VALUES (7,'Organizacion','EnProceso','2015-06-10','2015-06-10',5,1,NULL);
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
  `idEncargado` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_UnidadesResponsables_Encargados1_idx` (`idEncargado`),
  CONSTRAINT `fk_UnidadesResponsables_Encargados1` FOREIGN KEY (`idEncargado`) REFERENCES `Encargados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UnidadesResponsables`
--

LOCK TABLES `UnidadesResponsables` WRITE;
/*!40000 ALTER TABLE `UnidadesResponsables` DISABLE KEYS */;
INSERT INTO `UnidadesResponsables` VALUES (7,'Prueba 1',1),(8,'Prueba 2',2);
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
  `idBeneficiario` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Usuarios_Beneficiarios1_idx` (`idBeneficiario`),
  CONSTRAINT `fk_Usuarios_Beneficiarios1` FOREIGN KEY (`idBeneficiario`) REFERENCES `Beneficiarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usuarios`
--

LOCK TABLES `Usuarios` WRITE;
/*!40000 ALTER TABLE `Usuarios` DISABLE KEYS */;
INSERT INTO `Usuarios` VALUES (1,'admin','$2y$10$CeBrlugStS79WRdYVEj8GOU9Joky65YKSAb.9a4p9fPJOhLb5WkDW','Administrador','Administrador',NULL),(2,'encargado','$2y$10$CeBrlugStS79WRdYVEj8GOU9Joky65YKSAb.9a4p9fPJOhLb5WkDW','Encargado','Encargado',NULL),(3,'beneficiario','$2y$10$CeBrlugStS79WRdYVEj8GOU9Joky65YKSAb.9a4p9fPJOhLb5WkDW','Beneficiario','Beneficiario',2);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Vetados`
--

LOCK TABLES `Vetados` WRITE;
/*!40000 ALTER TABLE `Vetados` DISABLE KEYS */;
/*!40000 ALTER TABLE `Vetados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'sezac'
--
/*!50003 DROP FUNCTION IF EXISTS `isVetado` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `isVetado`(idBeneficiario int) RETURNS int(11)
BEGIN
    DECLARE res INT;
    SET res = 0;
	select Beneficiarios.id into res from 
	Beneficiarios
	left join Organizaciones on Beneficiarios.idOrganizacion = Organizaciones.id
	left join ProgramasBeneficiarios on (ProgramasBeneficiarios.idBeneficiario = Beneficiarios.id or 
	ProgramasBeneficiarios.idOrganizacion = Organizaciones.id)
	where Beneficiarios.id = idBeneficiario and ProgramasBeneficiarios.estatus = "NoConcluyo";
RETURN res;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-06-10 12:51:38
