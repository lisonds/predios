-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: localhost    Database: dbpredios
-- ------------------------------------------------------
-- Server version	9.0.1

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
-- Table structure for table `altura_terreno`
--

DROP TABLE IF EXISTS `altura_terreno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `altura_terreno` (
  `id_terreno` int NOT NULL AUTO_INCREMENT,
  `altura_terreno` varchar(60) NOT NULL,
  `grupo_tierras_idgrupo_tierras` int NOT NULL,
  PRIMARY KEY (`id_terreno`),
  KEY `fk_altura_terreno_grupo_tierras_idx` (`grupo_tierras_idgrupo_tierras`),
  CONSTRAINT `fk_altura_terreno_grupo_tierras` FOREIGN KEY (`grupo_tierras_idgrupo_tierras`) REFERENCES `grupo_tierras` (`idgrupo_tierras`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `altura_terreno`
--

LOCK TABLES `altura_terreno` WRITE;
/*!40000 ALTER TABLE `altura_terreno` DISABLE KEYS */;
INSERT INTO `altura_terreno` VALUES (102,'2001 m.s.n.m - 3000 m.s.n.m',43),(103,'500 m.s.n.m - 2000 m.s.n.m',44),(104,'2001 m.s.n.m - 3000 m.s.n.m',44),(105,'3001 m.s.n.m - 4000 m.s.n.m',44),(106,'4001 m.s.n.m a más',44),(107,'500 m.s.n.m - 2000 m.s.n.m',45),(108,'2001 m.s.n.m - 3000 m.s.n.m',45),(109,'3001 m.s.n.m - 4000 m.s.n.m',45),(110,'4001 m.s.n.m a más',45),(111,'500 m.s.n.m - 2000 m.s.n.m',46),(112,'2001 m.s.n.m - 3000 m.s.n.m',46),(113,'3001 m.s.n.m - 4000 m.s.n.m',46),(114,'4001 m.s.n.m a más',46),(115,'500 m.s.n.m - 2000 m.s.n.m',47),(116,'2001 m.s.n.m - 3000 m.s.n.m',47),(117,'3001 m.s.n.m - 4000 m.s.n.m',47),(118,'4001 m.s.n.m a más',47);
/*!40000 ALTER TABLE `altura_terreno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anio_registro`
--

DROP TABLE IF EXISTS `anio_registro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anio_registro` (
  `idanio_registro` int NOT NULL AUTO_INCREMENT,
  `anio` varchar(4) NOT NULL,
  `select_ruralurbano` tinyint NOT NULL,
  `predios_idpredios` int NOT NULL,
  PRIMARY KEY (`idanio_registro`),
  KEY `fk_anio_registro_predios1_idx` (`predios_idpredios`),
  CONSTRAINT `fk_anio_registro_predios1` FOREIGN KEY (`predios_idpredios`) REFERENCES `predios` (`idpredios`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anio_registro`
--

LOCK TABLES `anio_registro` WRITE;
/*!40000 ALTER TABLE `anio_registro` DISABLE KEYS */;
INSERT INTO `anio_registro` VALUES (1,'2025',1,16),(2,'2023',1,16),(3,'2023',1,17),(4,'2024',1,17),(5,'2025',1,17),(6,'2022',1,17),(7,'2025',1,18);
/*!40000 ALTER TABLE `anio_registro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anual_construccion`
--

DROP TABLE IF EXISTS `anual_construccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anual_construccion` (
  `idanual_construccion` int NOT NULL AUTO_INCREMENT,
  `anio_construccion` varchar(4) NOT NULL,
  PRIMARY KEY (`idanual_construccion`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anual_construccion`
--

LOCK TABLES `anual_construccion` WRITE;
/*!40000 ALTER TABLE `anual_construccion` DISABLE KEYS */;
INSERT INTO `anual_construccion` VALUES (3,'2025'),(4,'2024');
/*!40000 ALTER TABLE `anual_construccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calidad_agrologica`
--

DROP TABLE IF EXISTS `calidad_agrologica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `calidad_agrologica` (
  `idcalidad_agrologica` int NOT NULL AUTO_INCREMENT,
  `alta` varchar(45) DEFAULT NULL,
  `media` varchar(45) DEFAULT NULL,
  `baja` varchar(45) DEFAULT NULL,
  `altura_terreno_id_terreno` int NOT NULL,
  PRIMARY KEY (`idcalidad_agrologica`),
  KEY `fk_calidad_agrologica_altura_terreno_idx` (`altura_terreno_id_terreno`),
  CONSTRAINT `fk_calidad_agrologica_altura_terreno` FOREIGN KEY (`altura_terreno_id_terreno`) REFERENCES `altura_terreno` (`id_terreno`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calidad_agrologica`
--

LOCK TABLES `calidad_agrologica` WRITE;
/*!40000 ALTER TABLE `calidad_agrologica` DISABLE KEYS */;
INSERT INTO `calidad_agrologica` VALUES (102,'5489.36','5632.45','76895.25',102),(103,'28649','24352','17189',103),(104,'22919','19481','13752',104),(105,'17189','14611','10314',105),(106,'11460','9741','6876',106),(107,'7162','6088','4297',107),(108,'5730','4870','3438',108),(109,'4297','3653','2578',109),(110,'2865','2435','1719',110),(111,'0.0','0.0','0.0',111),(112,'2865','2435','1719',112),(113,'2292','1948','1375',113),(114,'1719','1461','1031',114),(115,'1705','0.0','0.0',115),(116,'0.0','0.0','0.0',116),(117,'0.0','0.0','0.0',117),(118,'0.0','0.0','0.0',118);
/*!40000 ALTER TABLE `calidad_agrologica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clasificacion`
--

DROP TABLE IF EXISTS `clasificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clasificacion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `clasificacion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clasificacion`
--

LOCK TABLES `clasificacion` WRITE;
/*!40000 ALTER TABLE `clasificacion` DISABLE KEYS */;
INSERT INTO `clasificacion` VALUES (6,'Casa Habitacion'),(7,'Tienda, Depositos');
/*!40000 ALTER TABLE `clasificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `construccion`
--

DROP TABLE IF EXISTS `construccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `construccion` (
  `idconstruccion` int NOT NULL AUTO_INCREMENT,
  `clasificacion` varchar(45) DEFAULT NULL,
  `material` varchar(45) DEFAULT NULL,
  `conservacion` varchar(45) DEFAULT NULL,
  `tipo_uso` varchar(45) DEFAULT NULL,
  `rural_idrural` int DEFAULT NULL,
  `urbano_idurbano` int DEFAULT NULL,
  PRIMARY KEY (`idconstruccion`),
  KEY `fk_construccion_rural_idx` (`rural_idrural`),
  KEY `fk_construccion_urbano1_idx` (`urbano_idurbano`),
  CONSTRAINT `fk_construccion_rural` FOREIGN KEY (`rural_idrural`) REFERENCES `rural` (`idrural`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_construccion_urbano1` FOREIGN KEY (`urbano_idurbano`) REFERENCES `urbano` (`idurbano`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `construccion`
--

LOCK TABLES `construccion` WRITE;
/*!40000 ALTER TABLE `construccion` DISABLE KEYS */;
INSERT INTO `construccion` VALUES (7,'Casa Habitacion','Ladrillo','Regular','Unifamiliar',10,NULL),(10,'Casa Habitacion','Ladrillo','Bueno','Unifamiliar',13,NULL),(11,'Casa Habitacion','Ladrillo','Bueno','Unifamiliar',14,NULL),(12,'Casa Habitacion','Ladrillo','Bueno','Unifamiliar',15,NULL),(13,'Casa Habitacion','Adobe (Quincha, Madera)','Muy Bueno','Unifamiliar',16,NULL),(14,'Casa Habitacion','Adobe (Quincha, Madera)','Regular','Unifamiliar',17,NULL),(15,'Casa Habitacion','Concreto','Muy Bueno','Manofactura',18,NULL);
/*!40000 ALTER TABLE `construccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dato_anual`
--

DROP TABLE IF EXISTS `dato_anual`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dato_anual` (
  `iddato_anual` int NOT NULL AUTO_INCREMENT,
  `año_registro` varchar(4) NOT NULL,
  PRIMARY KEY (`iddato_anual`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dato_anual`
--

LOCK TABLES `dato_anual` WRITE;
/*!40000 ALTER TABLE `dato_anual` DISABLE KEYS */;
INSERT INTO `dato_anual` VALUES (16,'2020'),(17,'2025');
/*!40000 ALTER TABLE `dato_anual` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `depreciacion`
--

DROP TABLE IF EXISTS `depreciacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `depreciacion` (
  `idDepreciacion` int NOT NULL AUTO_INCREMENT,
  `aniomin` varchar(3) DEFAULT NULL,
  `aniomax` varchar(3) DEFAULT NULL,
  `material` varchar(45) DEFAULT NULL,
  `muyBueno` varchar(3) DEFAULT NULL,
  `bueno` varchar(3) DEFAULT NULL,
  `regular` varchar(3) DEFAULT NULL,
  `malo` varchar(3) DEFAULT NULL,
  `clasificacion_id` int NOT NULL,
  PRIMARY KEY (`idDepreciacion`),
  KEY `fk_depreciacion_clasificacion_idx` (`clasificacion_id`),
  CONSTRAINT `fk_depreciacion_clasificacion` FOREIGN KEY (`clasificacion_id`) REFERENCES `clasificacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=371 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `depreciacion`
--

LOCK TABLES `depreciacion` WRITE;
/*!40000 ALTER TABLE `depreciacion` DISABLE KEYS */;
INSERT INTO `depreciacion` VALUES (339,'1','5','Concreto','0.0','5','10','55',6),(340,'1','5','Ladrillo','5','15','30','65',6),(341,'1','5','Adobe','5','15','30','65',6),(342,'6','10','Concreto','0.0','5','10','55',6),(343,'6','10','Ladrillo','3','11','23','63',6),(344,'6','10','Adobe','10','20','35','70',6),(345,'11','15','Concreto','3','8','13','58',6),(346,'11','15','Ladrillo','15','25','40','75',6),(347,'11','15','Adobe','15','25','40','75',6),(348,'16','20','Concreto','6','11','16','61',6),(349,'16','20','Ladrillo','9','17','29','69',6),(350,'16','20','Adobe','20','30','45','80',6),(351,'21','25','Concreto','9','14','19','64',6),(352,'21','25','Ladrillo','12','20','32','72',6),(353,'21','25','Adobe','25','35','50','85',6),(354,'26','30','Concreto','12','17','22','67',6),(355,'26','30','Ladrillo','15','23','53','75',6),(356,'26','30','Adobe','30','40','55','90',6),(357,'31','35','Concreto','15','20','25','70',6),(358,'31','35','Ladrillo','18','26','38','78',6),(359,'31','35','Adobe','35','45','60','95',6),(360,'36','40','Concreto','18','23','28','73',6),(361,'36','40','Ladrillo','21','29','41','81',6),(362,'36','40','Adobe','40','50','65','95',6),(363,'41','45','Concreto','21','26','31','76',6),(364,'41','45','Ladrillo','24','32','44','84',6),(365,'41','45','Adobe','45','55','70','95',6),(366,'46','50','Concreto','29','34','39','84',6),(367,'46','50','Ladrillo','40','48','60','95',6),(368,'46','50','Adobe','57','67','82','98',6),(369,'1','5','Concreto','10','2','7','8',7),(370,'1','5','Ladrillo','10','2','7','8',7);
/*!40000 ALTER TABLE `depreciacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `edificacion`
--

DROP TABLE IF EXISTS `edificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `edificacion` (
  `idedificacion` int NOT NULL AUTO_INCREMENT,
  `bloque` varchar(3) DEFAULT NULL,
  `piso` varchar(2) DEFAULT NULL,
  `antiguedad` varchar(4) DEFAULT NULL,
  `Muro_columna` varchar(1) DEFAULT NULL,
  `techo` varchar(1) DEFAULT NULL,
  `pisos` varchar(1) DEFAULT NULL,
  `puerta_ventana` varchar(1) DEFAULT NULL,
  `revistimiento` varchar(1) DEFAULT NULL,
  `banio` varchar(1) DEFAULT NULL,
  `instalaciones_electricas` varchar(1) DEFAULT NULL,
  `areaconstruida` varchar(10) DEFAULT NULL,
  `construccion_idconstruccion` int DEFAULT NULL,
  PRIMARY KEY (`idedificacion`),
  KEY `fk_edificacion_construccion_idx` (`construccion_idconstruccion`),
  CONSTRAINT `fk_edificacion_construccion` FOREIGN KEY (`construccion_idconstruccion`) REFERENCES `construccion` (`idconstruccion`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `edificacion`
--

LOCK TABLES `edificacion` WRITE;
/*!40000 ALTER TABLE `edificacion` DISABLE KEYS */;
INSERT INTO `edificacion` VALUES (14,'1','1','2020','D','H','F','E','D','E','D','50',10),(15,'1','2','2024','D','D','E','E','F','C','D','50',10),(16,'1','1','2020','D','H','F','E','D','E','D','50',11),(17,'1','2','2024','D','D','E','E','F','C','D','50',11),(18,'1','1','2020','D','H','F','E','D','E','D','50',12),(19,'1','2','2024','D','D','E','E','F','C','D','50',12),(20,'1','1','2025','A','A','A','A','A','A','A','',13),(21,'1','1','2025','A','A','A','A','A','A','A','',13),(22,'1','1','2000','E','D','G','F','E','E','E','50',14),(23,'1','1','2010','D','E','D','D','C','C','C','100',15),(24,'1','2','2012','A','E','F','F','D','D','E','80',15);
/*!40000 ALTER TABLE `edificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupo_tierras`
--

DROP TABLE IF EXISTS `grupo_tierras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grupo_tierras` (
  `idgrupo_tierras` int NOT NULL AUTO_INCREMENT,
  `tierras` varchar(60) DEFAULT NULL,
  `dato_anual_iddato_anual` int NOT NULL,
  PRIMARY KEY (`idgrupo_tierras`),
  KEY `fk_grupo_tierras_dato_anual_idx` (`dato_anual_iddato_anual`),
  CONSTRAINT `fk_grupo_tierras_dato_anual` FOREIGN KEY (`dato_anual_iddato_anual`) REFERENCES `dato_anual` (`iddato_anual`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo_tierras`
--

LOCK TABLES `grupo_tierras` WRITE;
/*!40000 ALTER TABLE `grupo_tierras` DISABLE KEYS */;
INSERT INTO `grupo_tierras` VALUES (43,'permanente',16),(44,'Tierras aptas para cultivo limpio',17),(45,'Tierras aptas para cultivo permanente',17),(46,'Tierras aptas para pastos',17),(47,'Tierras eriazas',17);
/*!40000 ALTER TABLE `grupo_tierras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `impusitiva_tributaria`
--

DROP TABLE IF EXISTS `impusitiva_tributaria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `impusitiva_tributaria` (
  `idImpusitiva_Tributaria` int NOT NULL AUTO_INCREMENT,
  `anio` varchar(4) DEFAULT NULL,
  `UIT` varchar(6) DEFAULT NULL,
  `base_legal` varchar(60) DEFAULT NULL,
  `Observaciones` double DEFAULT NULL,
  PRIMARY KEY (`idImpusitiva_Tributaria`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `impusitiva_tributaria`
--

LOCK TABLES `impusitiva_tributaria` WRITE;
/*!40000 ALTER TABLE `impusitiva_tributaria` DISABLE KEYS */;
INSERT INTO `impusitiva_tributaria` VALUES (15,'2020','4950','l50',29.7),(17,'2021','4400','D.S N° 392-2020-EF',26.4),(18,'2022','4600','D.S. N° 398-2021-EF',27.6),(19,'2023','4950','D.S. N° 309-2022-EF',29.7),(20,'2025','5350','D.S. N° 260-2024-EF',32.1),(21,'2024','5150','D.S. Nº 309-2023-EF',30.9);
/*!40000 ALTER TABLE `impusitiva_tributaria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indentificador`
--

DROP TABLE IF EXISTS `indentificador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `indentificador` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indentificador`
--

LOCK TABLES `indentificador` WRITE;
/*!40000 ALTER TABLE `indentificador` DISABLE KEYS */;
INSERT INTO `indentificador` VALUES (22,'000001'),(23,'000002'),(24,'000003');
/*!40000 ALTER TABLE `indentificador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `predios`
--

DROP TABLE IF EXISTS `predios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `predios` (
  `idpredios` int NOT NULL AUTO_INCREMENT,
  `denominado` varchar(60) NOT NULL,
  `sector` varchar(60) DEFAULT NULL,
  `distrito` varchar(45) NOT NULL,
  `provincia` varchar(45) NOT NULL,
  `departamento` varchar(45) NOT NULL,
  `cod_predial` varchar(45) DEFAULT NULL,
  `cod_catastral` varchar(45) DEFAULT NULL,
  `indentificador_id` int NOT NULL,
  PRIMARY KEY (`idpredios`),
  KEY `fk_predios_indentificador_idx` (`indentificador_id`),
  CONSTRAINT `fk_predios_indentificador` FOREIGN KEY (`indentificador_id`) REFERENCES `indentificador` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `predios`
--

LOCK TABLES `predios` WRITE;
/*!40000 ALTER TABLE `predios` DISABLE KEYS */;
INSERT INTO `predios` VALUES (16,'Av. Los Angeles N° 125','Anansayocc','Quinua','Huamanga','Ayacucho','5698652','54_56645642_25',22),(17,'Chuchiqa','Ccalla','Huascahuara','Huamanga','Ayacucho','5698652','54_56645642_25',23),(18,'CheqoPunku','Lorensayocc','San Juan','Huamanga','Ayacucho','5689463','54_56645642_25',24);
/*!40000 ALTER TABLE `predios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `propietarios`
--

DROP TABLE IF EXISTS `propietarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `propietarios` (
  `idpropietarios` int NOT NULL AUTO_INCREMENT,
  `nombre_completo` varchar(45) NOT NULL,
  `dni` varchar(12) NOT NULL,
  `razon_social` varchar(20) NOT NULL,
  `tipo` varchar(18) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `distrito` varchar(45) DEFAULT NULL,
  `provincia` varchar(45) DEFAULT NULL,
  `departamento` varchar(45) DEFAULT NULL,
  `indentificador_id` int NOT NULL,
  PRIMARY KEY (`idpropietarios`),
  KEY `fk_propietarios_indentificador_idx` (`indentificador_id`),
  CONSTRAINT `fk_propietarios_indentificador` FOREIGN KEY (`indentificador_id`) REFERENCES `indentificador` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propietarios`
--

LOCK TABLES `propietarios` WRITE;
/*!40000 ALTER TABLE `propietarios` DISABLE KEYS */;
INSERT INTO `propietarios` VALUES (12,'TULIO LISON ORE ICHACCAYA','70421319','Persona_natural','Propietario','Av. Los Angeles','Quinua','Huamanga','Ayacucho',22),(13,'NERY LUZ DE LA CRUZ AYME','71946323','Persona_natural','Conyugue','Av. Los Angeles','Quinua','Huamanga','Ayacucho',22),(14,'JHON QUISPE JERI','70421320','Persona_natural','Propietario','Av. Los Angeles','Huascahuara','Huamanga','Ayacucho',23),(15,'MARY MARIBI QUISPE AGUILAR','70421318','Persona_natural','Conyugue','Av. Los Angeles','Huascahuara','Huamanga','Ayacucho',23),(16,'LEADY MABEL JORGE GONZALES','70431319','Persona_natural','Copropietario','Jr. Condorcanqui N° 356 ','San Juan','Huamanga','Ayacucho',22),(17,'EDITH YESELIN PARIONA GARCIA','70421330','Persona_natural','Propietario','Jr. Sallally','Quinua','Huamanga','Ayacucho',24);
/*!40000 ALTER TABLE `propietarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rural`
--

DROP TABLE IF EXISTS `rural`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rural` (
  `idrural` int NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) NOT NULL,
  `uso` varchar(45) NOT NULL,
  `tierras_aptas` varchar(45) NOT NULL,
  `altitud` varchar(50) NOT NULL,
  `calidad_agrologica` varchar(10) NOT NULL,
  `total_hectareas` varchar(45) NOT NULL,
  `existe_construccion` tinyint NOT NULL,
  `anio_registro_idanio_registro` int NOT NULL,
  PRIMARY KEY (`idrural`),
  KEY `fk_rural_anio_registro1_idx` (`anio_registro_idanio_registro`),
  CONSTRAINT `fk_rural_anio_registro1` FOREIGN KEY (`anio_registro_idanio_registro`) REFERENCES `anio_registro` (`idanio_registro`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rural`
--

LOCK TABLES `rural` WRITE;
/*!40000 ALTER TABLE `rural` DISABLE KEYS */;
INSERT INTO `rural` VALUES (8,'LOTE','AGRÍCOLA','CULTIVO EN LIMPIO','2001 m.s.n.m - 3000 m.s.n.m','MEDIA','10.2',0,1),(10,'LOTE','AGRÍCOLA','CULTIVO EN LIMPIO','2001 m.s.n.m - 3000 m.s.n.m','ALTA','10.5',0,2),(13,'PARCELA','AGRÍCOLA','CULTIVO EN LIMPIO','2001 m.s.n.m - 3000 m.s.n.m','MEDIA','0.58',1,3),(14,'PARCELA','AGRÍCOLA','CULTIVO EN LIMPIO','2001 m.s.n.m - 3000 m.s.n.m','MEDIA','0.58',1,4),(15,'PARCELA','AGRÍCOLA','CULTIVO EN LIMPIO','2001 m.s.n.m - 3000 m.s.n.m','MEDIA','0.58',1,5),(16,'LOTE','GANADERÍA','CULTIVO PERMANENTE','2001 m.s.n.m - 3000 m.s.n.m','MEDIA','10.2',1,6),(17,'LOTE','AGRÍCOLA','CULTIVO PERMANENTE','2001 m.s.n.m - 3000 m.s.n.m','MEDIA','0.20',1,7),(18,'LOTE','AGRÍCOLA','CULTIVO EN LIMPIO','500 m.s.n.m - 2000 m.s.n.m','ALTA','10.50',1,1);
/*!40000 ALTER TABLE `rural` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_usuario`
--

DROP TABLE IF EXISTS `tb_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_usuario` (
  `idtb_usuario` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) NOT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtb_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_usuario`
--

LOCK TABLES `tb_usuario` WRITE;
/*!40000 ALTER TABLE `tb_usuario` DISABLE KEYS */;
INSERT INTO `tb_usuario` VALUES (39,'70421319','tulio.ore.27@gmail.com','admin','admin');
/*!40000 ALTER TABLE `tb_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `terreno`
--

DROP TABLE IF EXISTS `terreno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `terreno` (
  `idterreno` int NOT NULL AUTO_INCREMENT,
  `fecha_aquisicion` varchar(45) DEFAULT NULL,
  `area` varchar(45) DEFAULT NULL,
  `valarAranceles` varchar(45) DEFAULT NULL,
  `urbano_idurbano` int NOT NULL,
  PRIMARY KEY (`idterreno`),
  KEY `fk_terreno_urbano_idx` (`urbano_idurbano`),
  CONSTRAINT `fk_terreno_urbano` FOREIGN KEY (`urbano_idurbano`) REFERENCES `urbano` (`idurbano`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `terreno`
--

LOCK TABLES `terreno` WRITE;
/*!40000 ALTER TABLE `terreno` DISABLE KEYS */;
/*!40000 ALTER TABLE `terreno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `urbano`
--

DROP TABLE IF EXISTS `urbano`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `urbano` (
  `idurbano` int NOT NULL AUTO_INCREMENT,
  `estado` varchar(20) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `uso` varchar(45) DEFAULT NULL,
  `ubicacion_respecto` varchar(45) DEFAULT NULL,
  `existe_construccion` double DEFAULT NULL,
  `anio_registro_idanio_registro` int NOT NULL,
  PRIMARY KEY (`idurbano`),
  KEY `fk_urbano_anio_registro1_idx` (`anio_registro_idanio_registro`),
  CONSTRAINT `fk_urbano_anio_registro1` FOREIGN KEY (`anio_registro_idanio_registro`) REFERENCES `anio_registro` (`idanio_registro`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `urbano`
--

LOCK TABLES `urbano` WRITE;
/*!40000 ALTER TABLE `urbano` DISABLE KEYS */;
/*!40000 ALTER TABLE `urbano` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `valores_edificacion`
--

DROP TABLE IF EXISTS `valores_edificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `valores_edificacion` (
  `idvalores_edificacion` int NOT NULL AUTO_INCREMENT,
  `categoria` varchar(1) DEFAULT NULL,
  `muro_columna` varchar(7) DEFAULT NULL,
  `techos` varchar(7) DEFAULT NULL,
  `pisos` varchar(7) DEFAULT NULL,
  `puertas_ventanas` varchar(7) DEFAULT NULL,
  `revistimiento` varchar(7) DEFAULT NULL,
  `banios` varchar(7) DEFAULT NULL,
  `instalaciones` varchar(7) DEFAULT NULL,
  `anual_construccion_idanual_construccion` int NOT NULL,
  PRIMARY KEY (`idvalores_edificacion`),
  KEY `fk_valores_edificacion_anual_construccion_idx` (`anual_construccion_idanual_construccion`),
  CONSTRAINT `fk_valores_edificacion_anual_construccion` FOREIGN KEY (`anual_construccion_idanual_construccion`) REFERENCES `anual_construccion` (`idanual_construccion`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `valores_edificacion`
--

LOCK TABLES `valores_edificacion` WRITE;
/*!40000 ALTER TABLE `valores_edificacion` DISABLE KEYS */;
INSERT INTO `valores_edificacion` VALUES (19,'B','425.30','255.55','219.93','249.67','284.35','90.20','264.65',3),(21,'A','123','4','8','35','38','43','54',4),(22,'B','1','2','3','4','5','8','7',4),(23,'A','714.87','371.71','263.75','282.14','356.03','126.27','449.96',3),(24,'C','308.57','178.83','142.31','182.16','235.35','58.89','196.93',3),(25,'D','285.01','135.34','116.69','106.84','180.02','36.03','111.58',3),(26,'E','223.74','55.58','96.50','81.62','149.77','17.66','62.10',3),(27,'F','139.52','44.40','78.82','63.12','89.30','15.02','40.36',3),(28,'G','82.20','0.0','58.95','37.19','66.34','10.32','23.78',3),(29,'H','0.0','0.0','31.85','18.59','26.54','0.0','0.0',3),(30,'I','0.0','0.0','7.0','0.0','0.0','0.0','0.0',3);
/*!40000 ALTER TABLE `valores_edificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'dbpredios'
--
/*!50003 DROP PROCEDURE IF EXISTS `agregarArancelarioEdificacion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `agregarArancelarioEdificacion`(
    IN p_anio_construccion VARCHAR(4),
    IN p_categoria VARCHAR(1),
    IN p_muro_columna VARCHAR(7),
    IN p_techos VARCHAR(7),
    IN p_pisos VARCHAR(7),
    IN p_puerta_ventana VARCHAR(7),
    IN p_revistimiento VARCHAR(7),
    IN p_banios VARCHAR(7),
    IN p_instalaciones VARCHAR(7)
)
BEGIN
    DECLARE v_idanual_construccion INT DEFAULT 0;
    DECLARE v_idvalores_edificacion INT DEFAULT 0;
    DECLARE v_estado INT DEFAULT 0; -- 1 = insertado, 2 = actualizado

    -- Buscar año
    SELECT idanual_construccion INTO v_idanual_construccion
    FROM anual_construccion
    WHERE anio_construccion = p_anio_construccion
    LIMIT 1;

    -- Insertar año si no existe
    IF v_idanual_construccion IS NULL OR v_idanual_construccion = 0 THEN
        INSERT INTO anual_construccion (anio_construccion)
        VALUES (p_anio_construccion);
        SET v_idanual_construccion = LAST_INSERT_ID();
    END IF;

    -- Verificar si ya existe registro con esa categoría y año
    SELECT idvalores_edificacion INTO v_idvalores_edificacion
    FROM valores_edificacion
    WHERE categoria = p_categoria
      AND anual_construccion_idanual_construccion = v_idanual_construccion
    LIMIT 1;

    -- Si existe, actualizar
    IF v_idvalores_edificacion IS NOT NULL AND v_idvalores_edificacion > 0 THEN
        UPDATE valores_edificacion
        SET
            muro_columna = p_muro_columna,
            techos = p_techos,
            pisos = p_pisos,
            puertas_ventanas = p_puerta_ventana,
            revistimiento = p_revistimiento,
            banios = p_banios,
            instalaciones = p_instalaciones
        WHERE idvalores_edificacion = v_idvalores_edificacion;
        SET v_estado = 2;
    ELSE
        -- Si no existe, insertar nuevo
        INSERT INTO valores_edificacion (
            categoria,
            muro_columna,
            techos,
            pisos,
            puertas_ventanas,
            revistimiento,
            banios,
            instalaciones,
            anual_construccion_idanual_construccion
        ) VALUES (
            p_categoria,
            p_muro_columna,
            p_techos,
            p_pisos,
            p_puerta_ventana,
            p_revistimiento,
            p_banios,
            p_instalaciones,
            v_idanual_construccion
        );
        SET v_estado = 1;
    END IF;

    -- Retornar solo el estado (1 = insertado, 2 = actualizado)
    SELECT v_estado AS estado_operacion;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `agregarArancelarioRustico` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `agregarArancelarioRustico`(
    IN anioArancelarioR VARCHAR(10),
    IN altitud VARCHAR(60),
    IN GrupoTierra VARCHAR(60),
    IN ValorAlta VARCHAR(45),
    IN ValorMedia VARCHAR(45),
    IN ValorBaja VARCHAR(45)
)
BEGIN
    DECLARE id_anio INT DEFAULT NULL;
    DECLARE id_grupo INT DEFAULT NULL;
    DECLARE id_altura INT DEFAULT NULL;
    DECLARE id_calidad INT DEFAULT NULL;

    -- 1. Verificar si existe el año
    SELECT iddato_anual INTO id_anio
    FROM dato_anual
    WHERE año_registro = anioArancelarioR
    LIMIT 1;

    IF id_anio IS NULL THEN
        INSERT INTO dato_anual (año_registro) VALUES (anioArancelarioR);
        SET id_anio = LAST_INSERT_ID();
    END IF;

    -- 2. Verificar si existe el grupo de tierras
    SELECT idgrupo_tierras INTO id_grupo
    FROM grupo_tierras
    WHERE tierras = GrupoTierra AND dato_anual_iddato_anual = id_anio
    LIMIT 1;

    IF id_grupo IS NULL THEN
        INSERT INTO grupo_tierras (tierras, dato_anual_iddato_anual)
        VALUES (GrupoTierra, id_anio);
        SET id_grupo = LAST_INSERT_ID();
    END IF;

    -- 3. Verificar si existe la altitud
    SELECT id_terreno INTO id_altura
    FROM altura_terreno
    WHERE altura_terreno = altitud AND grupo_tierras_idgrupo_tierras = id_grupo
    LIMIT 1;

    IF id_altura IS NULL THEN
        INSERT INTO altura_terreno (altura_terreno, grupo_tierras_idgrupo_tierras)
        VALUES (altitud, id_grupo);
        SET id_altura = LAST_INSERT_ID();

        -- Insertar calidad agrológica
        INSERT INTO calidad_agrologica (alta, media, baja, altura_terreno_id_terreno)
        VALUES (ValorAlta, ValorMedia, ValorBaja, id_altura);

        SELECT 1 AS resultado; -- nuevo ingreso
    ELSE
        -- 4. Verificar si ya existe la calidad agrológica para esa altitud
        SELECT idcalidad_agrologica INTO id_calidad
        FROM calidad_agrologica
        WHERE altura_terreno_id_terreno = id_altura
        LIMIT 1;

        IF id_calidad IS NULL THEN
            INSERT INTO calidad_agrologica (alta, media, baja, altura_terreno_id_terreno)
            VALUES (ValorAlta, ValorMedia, ValorBaja, id_altura);
            SELECT 1 AS resultado; -- nuevo ingreso
        ELSE
            UPDATE calidad_agrologica
            SET alta = ValorAlta, media = ValorMedia, baja = ValorBaja
            WHERE idcalidad_agrologica = id_calidad;
            SELECT 0 AS resultado; -- actualización
        END IF;
    END IF;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `agregarBaseImpusitiva` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `agregarBaseImpusitiva`(
    IN p_anio VARCHAR(4),
    IN p_UIT VARCHAR(6),
    IN p_baseLegal VARCHAR(60),
    IN p_observaciones DOUBLE
)
BEGIN
    DECLARE v_existente INT;

    -- Buscar si ya existe un registro con ese año
    SELECT COUNT(*) INTO v_existente
    FROM impusitiva_tributaria
    WHERE anio = p_anio;

    IF v_existente > 0 THEN
        -- Ya existe el año, no insertar
        SELECT 0 AS resultado;
    ELSE
        -- No existe el año, insertar
        BEGIN
            DECLARE EXIT HANDLER FOR SQLEXCEPTION 
            BEGIN
                SELECT 0 AS resultado;
            END;

            INSERT INTO impusitiva_tributaria (
                anio, UIT, base_Legal, Observaciones
            )
            VALUES (
                p_anio, p_UIT, p_baseLegal, p_observaciones
            );

            SELECT 1 AS resultado;
        END;
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `agregarDepreciacion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `agregarDepreciacion`(
    IN p_clasificacion VARCHAR(255),
    IN p_aniomin VARCHAR(3),
    IN p_aniomax VARCHAR(3),
    IN p_material VARCHAR(255),
    IN p_muyBueno VARCHAR(3),
    IN p_bueno VARCHAR(3),
    IN p_regular VARCHAR(3),
    IN p_malo VARCHAR(3)
)
BEGIN
    DECLARE v_clasificacion_id INT;
    DECLARE v_idDepreciacion INT;
    DECLARE v_resultado INT DEFAULT 0;

    -- Buscar la clasificación
    SELECT id INTO v_clasificacion_id
    FROM clasificacion
    WHERE clasificacion = p_clasificacion
    LIMIT 1;

    -- Si no existe, insertarla
    IF v_clasificacion_id IS NULL THEN
        INSERT INTO clasificacion (clasificacion) VALUES (p_clasificacion);
        SET v_clasificacion_id = LAST_INSERT_ID();
    END IF;

    -- Buscar si ya existe el registro en depreciacion
    SELECT idDepreciacion INTO v_idDepreciacion
    FROM depreciacion
    WHERE clasificacion_id = v_clasificacion_id
      AND aniomax = p_aniomax
      AND material = p_material
    LIMIT 1;

    -- Si existe, actualizar
    IF v_idDepreciacion IS NOT NULL THEN
        UPDATE depreciacion
        SET aniomin = p_aniomin,
            muyBueno = p_muyBueno,
            bueno = p_bueno,
            regular = p_regular,
            malo = p_malo
        WHERE idDepreciacion = v_idDepreciacion;

        SET v_resultado = 0; -- actualizado
    ELSE
        -- Si no existe, insertar
        INSERT INTO depreciacion (
            aniomin, aniomax, material, muyBueno, bueno, regular, malo, clasificacion_id
        )
        VALUES (
            p_aniomin, p_aniomax, p_material,
            p_muyBueno, p_bueno, p_regular, p_malo,
            v_clasificacion_id
        );

        SET v_resultado = 1; -- insertado
    END IF;

    -- Retornar resultado como un SELECT
    SELECT v_resultado AS resultado;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `agregarPredio` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `agregarPredio`(
    IN p_codigo VARCHAR(50),
    IN p_denominado VARCHAR(100),
    IN p_sector VARCHAR(100),
    IN p_distrito VARCHAR(100),
    IN p_provincia VARCHAR(100),
    IN p_departamento VARCHAR(100),
    IN p_cod_predial VARCHAR(50),
    IN p_cod_catastral VARCHAR(50),
    OUT p_idpredios INT
)
BEGIN
    DECLARE v_indentificador_id INT;

    -- Buscar el ID correspondiente al código
    SELECT id INTO v_indentificador_id
    FROM indentificador
    WHERE codigo = p_codigo
    LIMIT 1;

    -- Insertar en la tabla predios
    INSERT INTO predios (
        denominado,
        sector,
        distrito,
        provincia,
        departamento,
        cod_predial,
        cod_catastral,
        indentificador_id
    ) VALUES (
        p_denominado,
        p_sector,
        p_distrito,
        p_provincia,
        p_departamento,
        p_cod_predial,
        p_cod_catastral,
        v_indentificador_id
    );

    -- Retornar el id generado
    SET p_idpredios = LAST_INSERT_ID();
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `agregarRuralUrbanoSinConstruccion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `agregarRuralUrbanoSinConstruccion`(
    IN p_anio VARCHAR(4),
    IN p_select_ruralurbano TINYINT,
    IN p_predios_idpredios INT,
    IN p_tipo VARCHAR(45),
    IN p_uso VARCHAR(45),
    IN p_tierras_aptas VARCHAR(45),
    IN p_altitud VARCHAR(50),
    IN p_calidad_agrologica VARCHAR(10),
    IN p_total_hectareas VARCHAR(45),
    IN p_existe_construccion TINYINT
)
BEGIN
    DECLARE v_idanio_registro INT DEFAULT 0;
    DECLARE v_idrural INT DEFAULT 0;

    -- Buscar idanio_registro
    SELECT idanio_registro INTO v_idanio_registro
    FROM anio_registro
    WHERE anio = p_anio
      AND select_ruralurbano = p_select_ruralurbano
      AND predios_idpredios = p_predios_idpredios
    LIMIT 1;

    -- Si no existe, insertar en anio_registro
    IF v_idanio_registro IS NULL OR v_idanio_registro = 0 THEN
        INSERT INTO anio_registro (anio, select_ruralurbano, predios_idpredios)
        VALUES (p_anio, p_select_ruralurbano, p_predios_idpredios);

        SET v_idanio_registro = LAST_INSERT_ID();
    END IF;

    -- Verificar si ya existe en rural
    SELECT idrural INTO v_idrural
    FROM rural
    WHERE anio_registro_idanio_registro = v_idanio_registro
    LIMIT 1;

    -- Si existe, actualizar
    IF v_idrural IS NOT NULL AND v_idrural > 0 THEN
        UPDATE rural
        SET tipo = p_tipo,
            uso = p_uso,
            tierras_aptas = p_tierras_aptas,
            altitud = p_altitud,
            calidad_agrologica = p_calidad_agrologica,
            total_hectareas = p_total_hectareas,
            existe_construccion = p_existe_construccion
        WHERE idrural = v_idrural;

        SELECT 2 AS estado_operacion; -- Actualización
    ELSE
        -- Si no existe, insertar en rural
        INSERT INTO rural (
            tipo,
            uso,
            tierras_aptas,
            altitud,
            calidad_agrologica,
            total_hectareas,
            existe_construccion,
            anio_registro_idanio_registro
        ) VALUES (
            p_tipo,
            p_uso,
            p_tierras_aptas,
            p_altitud,
            p_calidad_agrologica,
            p_total_hectareas,
            p_existe_construccion,
            v_idanio_registro
        );

        SELECT 1 AS estado_operacion; -- Inserción
    END IF;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Dato_suma_categoria_edificacion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Dato_suma_categoria_edificacion`(
    IN p_anio VARCHAR(10),
    IN p_muro_columna CHAR(1),
    IN p_techo CHAR(1),
    IN p_pisos CHAR(1),
    IN p_puerta_ventana CHAR(1),
    IN p_revistimiento CHAR(1),
    IN p_banio CHAR(1),
    IN p_instalaciones_electricas CHAR(1)
)
BEGIN
    DECLARE v_idanual_construccion INT;
    DECLARE v_total DECIMAL(10,2) DEFAULT 0;
    DECLARE v_temp DECIMAL(10,2);

    -- Obtener el ID del año de construcción
    SELECT idanual_construccion 
    INTO v_idanual_construccion
    FROM anual_construccion
    WHERE anio_construccion = p_anio
    LIMIT 1;

    -- Sumar muro_columna
    SELECT CAST(muro_columna AS DECIMAL(10,2)) 
    INTO v_temp
    FROM valores_edificacion
    WHERE anual_construccion_idanual_construccion = v_idanual_construccion
      AND categoria = p_muro_columna
    LIMIT 1;
    SET v_total = v_total + IFNULL(v_temp, 0);

    -- Sumar techos
    SELECT CAST(techos AS DECIMAL(10,2)) 
    INTO v_temp
    FROM valores_edificacion
    WHERE anual_construccion_idanual_construccion = v_idanual_construccion
      AND categoria = p_techo
    LIMIT 1;
    SET v_total = v_total + IFNULL(v_temp, 0);

    -- Sumar pisos
    SELECT CAST(pisos AS DECIMAL(10,2)) 
    INTO v_temp
    FROM valores_edificacion
    WHERE anual_construccion_idanual_construccion = v_idanual_construccion
      AND categoria = p_pisos
    LIMIT 1;
    SET v_total = v_total + IFNULL(v_temp, 0);

    -- Sumar puertas_ventanas
    SELECT CAST(puertas_ventanas AS DECIMAL(10,2)) 
    INTO v_temp
    FROM valores_edificacion
    WHERE anual_construccion_idanual_construccion = v_idanual_construccion
      AND categoria = p_puerta_ventana
    LIMIT 1;
    SET v_total = v_total + IFNULL(v_temp, 0);

    -- Sumar revistimiento
    SELECT CAST(revistimiento AS DECIMAL(10,2)) 
    INTO v_temp
    FROM valores_edificacion
    WHERE anual_construccion_idanual_construccion = v_idanual_construccion
      AND categoria = p_revistimiento
    LIMIT 1;
    SET v_total = v_total + IFNULL(v_temp, 0);

    -- Sumar banios
    SELECT CAST(banios AS DECIMAL(10,2)) 
    INTO v_temp
    FROM valores_edificacion
    WHERE anual_construccion_idanual_construccion = v_idanual_construccion
      AND categoria = p_banio
    LIMIT 1;
    SET v_total = v_total + IFNULL(v_temp, 0);

    -- Sumar instalaciones
    SELECT CAST(instalaciones AS DECIMAL(10,2)) 
    INTO v_temp
    FROM valores_edificacion
    WHERE anual_construccion_idanual_construccion = v_idanual_construccion
      AND categoria = p_instalaciones_electricas
    LIMIT 1;
    SET v_total = v_total + IFNULL(v_temp, 0);

    -- Retornar resultado
    SELECT v_total AS suma_total;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `eliminarPropietario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarPropietario`(IN p_idpropietarios INT)
BEGIN
    -- Verificar si el propietario existe
    IF NOT EXISTS (SELECT 1 FROM propietarios WHERE idpropietarios = p_idpropietarios) THEN
        SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Error: Propietario no encontrado.';
    END IF;

    -- Eliminar el propietario
    DELETE FROM propietarios
    WHERE idpropietarios = p_idpropietarios;

    -- Confirmar éxito
    SELECT 'Propietario eliminado correctamente' AS mensaje;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insertPredio` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertPredio`(
    IN p_codigo VARCHAR(50),
    IN p_contribuyente VARCHAR(100),
    IN p_razon_social VARCHAR(100),
    IN p_dni VARCHAR(20),
    IN p_nombre VARCHAR(50),
    IN p_apellido_p VARCHAR(50),
    IN p_apellido_m VARCHAR(50),
    IN p_direccion VARCHAR(150),
    IN p_distrito VARCHAR(50),
    IN p_provincia VARCHAR(50),
    IN p_departamento VARCHAR(50)
)
BEGIN
    DECLARE v_id_codigo INT;

    -- Insertar en la tabla 'indentificador' y obtener el ID generado
    INSERT INTO indentificador (codigo) VALUES (p_codigo);
    SET v_id_codigo = LAST_INSERT_ID();

    -- Insertar en la tabla 'propietarios' usando el ID obtenido
    INSERT INTO propietarios (nombre_completo, dni, razon_social, tipo, direccion, distrito, provincia, departamento, indentificador_id)
    VALUES (p_contribuyente, p_dni, p_razon_social, 'Natural', p_direccion, p_distrito, p_provincia, p_departamento, v_id_codigo);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insertPropietario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertPropietario`(
    IN p_codigo VARCHAR(50),
    IN p_contribuyente VARCHAR(100),
    IN p_razon_social VARCHAR(100),
    IN p_dni VARCHAR(20),
    IN p_nombre VARCHAR(100),
    IN p_apellido_p VARCHAR(100),
    IN p_apellido_m VARCHAR(100),
    IN p_direccion VARCHAR(255),
    IN p_distrito VARCHAR(100),
    IN p_provincia VARCHAR(100),
    IN p_departamento VARCHAR(100)
)
BEGIN
    DECLARE id_indentificador INT;
    DECLARE id_propietario INT;

    -- Buscar si ya existe el código
    SELECT id INTO id_indentificador
    FROM indentificador
    WHERE codigo = p_codigo
    LIMIT 1;

    -- Si no existe, lo insertamos
    IF id_indentificador IS NULL THEN
        INSERT INTO indentificador (codigo) VALUES (p_codigo);
        SET id_indentificador = LAST_INSERT_ID();
    END IF;

    -- Insertar el propietario con el id_indentificador
    INSERT INTO propietarios (
        indentificador_id, nombre_completo, dni, razon_social, tipo,
        direccion, distrito, provincia, departamento
    )
    VALUES (
        id_indentificador,
        CONCAT(p_nombre, ' ', p_apellido_p, ' ', p_apellido_m),
        p_dni, p_razon_social, p_contribuyente,
        p_direccion, p_distrito, p_provincia, p_departamento
    );

    SET id_propietario = LAST_INSERT_ID();

    -- Retornar ambos IDs
    SELECT  id_propietario AS id_propietario;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `INSERT_DATOS_RURAL_CONSTRUCCION` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_DATOS_RURAL_CONSTRUCCION`(
    IN p_anio VARCHAR(4),
    IN p_select_ruralurbano TINYINT,
    IN p_idpredio INT,
    
    IN p_tipo VARCHAR(45),
    IN p_uso VARCHAR(45),
    IN p_tierras_aptas VARCHAR(45),
    IN p_altitud VARCHAR(50),
    IN p_calidad_agrologica VARCHAR(10),
    IN p_total_hectareas VARCHAR(45),
    IN p_existe_construccion TINYINT,
    
    IN p_clasificacion VARCHAR(45),
    IN p_material VARCHAR(45),
    IN p_conservacion VARCHAR(45),
    IN p_tipo_uso VARCHAR(45),

    IN p_edificaciones JSON
)
BEGIN
    DECLARE v_id_anio INT DEFAULT NULL;
    DECLARE v_id_rural INT DEFAULT NULL;
    DECLARE v_id_construccion INT DEFAULT NULL;
    DECLARE v_estado INT DEFAULT 3;

    -- 1. Buscar si ya existe el año registrado para ese predio
    SELECT idanio_registro INTO v_id_anio
    FROM anio_registro
    WHERE anio = p_anio AND select_ruralurbano = p_select_ruralurbano AND predios_idpredios = p_idpredio
    LIMIT 1;

    -- 2. Insertar si no existe
    IF v_id_anio IS NULL THEN
        INSERT INTO anio_registro (anio, select_ruralurbano, predios_idpredios)
        VALUES (p_anio, p_select_ruralurbano, p_idpredio);
        SET v_id_anio = LAST_INSERT_ID();
        SET v_estado = 1;
    ELSE
        SET v_estado = 2;
    END IF;

    -- 3. Insertar en rural
    INSERT INTO rural (
        tipo, uso, tierras_aptas, altitud, calidad_agrologica,
        total_hectareas, existe_construccion, anio_registro_idanio_registro
    ) VALUES (
        p_tipo, p_uso, p_tierras_aptas, p_altitud, p_calidad_agrologica,
        p_total_hectareas, p_existe_construccion, v_id_anio
    );

    SET v_id_rural = LAST_INSERT_ID();

    -- Verificar inserción en rural
    IF v_id_rural IS NULL THEN
        SET v_estado = 3;
    END IF;

    -- 4. Si existe construcción, insertar en construcción y edificaciones
    IF p_existe_construccion = 1 THEN

        -- Insertar construcción
        INSERT INTO construccion (
            clasificacion, material, conservacion, tipo_uso, rural_idrural
        ) VALUES (
            p_clasificacion, p_material, p_conservacion, p_tipo_uso, v_id_rural
        );

        SET v_id_construccion = LAST_INSERT_ID();

        -- Si construcción no fue insertada, estado = 3
        IF v_id_construccion IS NULL THEN
            SET v_estado = 3;
        END IF;

        -- Bucle de edificación
        BEGIN
            DECLARE i INT DEFAULT 0;
            DECLARE total_edificaciones INT;

            SET total_edificaciones = JSON_LENGTH(p_edificaciones);

            WHILE i < total_edificaciones DO
                INSERT INTO edificacion (
                    bloque, piso, antiguedad, Muro_columna, techo,
                    pisos, puerta_ventana, revistimiento, banio,
                    instalaciones_electricas, areaconstruida, construccion_idconstruccion
                )
                VALUES (
                    JSON_UNQUOTE(JSON_EXTRACT(p_edificaciones, CONCAT('$[', i, '].bloque'))),
                    JSON_UNQUOTE(JSON_EXTRACT(p_edificaciones, CONCAT('$[', i, '].piso'))),
                    JSON_UNQUOTE(JSON_EXTRACT(p_edificaciones, CONCAT('$[', i, '].anioConstruccion'))),
                    JSON_UNQUOTE(JSON_EXTRACT(p_edificaciones, CONCAT('$[', i, '].muro'))),
                    JSON_UNQUOTE(JSON_EXTRACT(p_edificaciones, CONCAT('$[', i, '].techo'))),
                    JSON_UNQUOTE(JSON_EXTRACT(p_edificaciones, CONCAT('$[', i, '].pisos'))),
                    JSON_UNQUOTE(JSON_EXTRACT(p_edificaciones, CONCAT('$[', i, '].puertaVentana'))),
                    JSON_UNQUOTE(JSON_EXTRACT(p_edificaciones, CONCAT('$[', i, '].revestimiento'))),
                    JSON_UNQUOTE(JSON_EXTRACT(p_edificaciones, CONCAT('$[', i, '].bano'))),
                    JSON_UNQUOTE(JSON_EXTRACT(p_edificaciones, CONCAT('$[', i, '].instalacionesElectricas'))),
                    JSON_UNQUOTE(JSON_EXTRACT(p_edificaciones, CONCAT('$[', i, '].areaConstruida'))),
                    v_id_construccion
                );
                SET i = i + 1;
            END WHILE;
        END;
    END IF;

    -- Retornar estado final
    SELECT v_estado AS estado_final;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ObtenerArancelarioPorAnio` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerArancelarioPorAnio`(IN anio_input INT)
BEGIN
    SELECT 
        ve.categoria,
        ve.muro_columna,
        ve.techos,
        ve.pisos,
        ve.puertas_ventanas,
        ve.revistimiento,
        ve.banios,
        ve.instalaciones
    FROM 
        valores_edificacion ve
    INNER JOIN 
        anual_construccion ac ON ve.anual_construccion_idanual_construccion = ac.idanual_construccion
    WHERE 
        ac.anio_construccion = anio_input
    ORDER BY 
        ve.categoria ASC;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `obtenerArancelarioRusticoPorAnio` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `obtenerArancelarioRusticoPorAnio`(
    IN anio INT,
    IN grupoTierra VARCHAR(100)
)
BEGIN
  SELECT 
    da.año_registro AS anio,
    gt.tierras AS grupo_tierra,
    at.altura_terreno AS altitud,
    ca.alta,
    ca.media,
    ca.baja
  FROM dato_anual da
  INNER JOIN grupo_tierras gt ON gt.dato_anual_iddato_anual = da.iddato_anual
  INNER JOIN altura_terreno at ON at.grupo_tierras_idgrupo_tierras = gt.idgrupo_tierras
  INNER JOIN calidad_agrologica ca ON ca.altura_terreno_id_terreno = at.id_terreno
  WHERE da.año_registro = anio
    AND gt.tierras = grupoTierra;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ObtenerDataDepreciacionPorClasificacion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerDataDepreciacionPorClasificacion`(
    IN nombreClasificacion VARCHAR(100)
)
BEGIN
    SELECT d.*
    FROM depreciacion d
    INNER JOIN clasificacion c ON d.clasificacion_id = c.id
    WHERE c.clasificacion = nombreClasificacion;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ObtenerPropietariosPorCodigo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerPropietariosPorCodigo`(IN codigo_buscar VARCHAR(50))
BEGIN
    DECLARE identificador_id INT;

    -- Buscar el ID del identificador según el código ingresado
    SELECT id INTO identificador_id 
    FROM indentificador 
    WHERE codigo = codigo_buscar 
    LIMIT 1;

    -- Retornar la lista de propietarios asociados al identificador encontrado
    SELECT * 
    FROM propietarios 
    WHERE indentificador_id = identificador_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `obtener_data_Impusitiva` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `obtener_data_Impusitiva`()
BEGIN
    SELECT 
        idImpusitiva_Tributaria,
        anio,
        UIT,
        base_Legal,
        Observaciones
    FROM 
        impusitiva_tributaria
    ORDER BY 
        anio DESC;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `obtener_data_Por_anios` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `obtener_data_Por_anios`(IN anioBuscar VARCHAR(4))
BEGIN
    SELECT 
        gt.tierras,
        at.altura_terreno,
        ca.alta,
        ca.media,
        ca.baja
    FROM dato_anual            AS da
    JOIN grupo_tierras         AS gt ON gt.dato_anual_iddato_anual     = da.iddato_anual
    JOIN altura_terreno        AS at ON at.grupo_tierras_idgrupo_tierras = gt.idgrupo_tierras
    JOIN calidad_agrologica    AS ca ON ca.altura_terreno_id_terreno  = at.id_terreno
    WHERE CAST(da.año_registro AS CHAR) = anioBuscar
    ORDER BY gt.tierras , at.altura_terreno;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `obtener_edificacionporidConstruccion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `obtener_edificacionporidConstruccion`(IN idConstruccion INT)
BEGIN
    SELECT 
        e.idedificacion,
        e.bloque,
        e.piso,
        e.antiguedad,
        e.Muro_columna,
        e.techo,
        e.pisos,
        e.puerta_ventana,
        e.revistimiento,
        e.banio,
        e.instalaciones_electricas,
        e.areaconstruida,
        e.construccion_idconstruccion
    FROM edificacion e
    WHERE e.construccion_idconstruccion = idConstruccion;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `obtener_lista_anios` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `obtener_lista_anios`()
BEGIN
    SELECT año_registro 
    FROM dato_anual
    ORDER BY año_registro DESC;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `obtener_lista_anios_impusitiva` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `obtener_lista_anios_impusitiva`()
BEGIN
    SELECT anio
    FROM impusitiva_tributaria
    ORDER BY anio DESC;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `obtener_predios_por_codigo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `obtener_predios_por_codigo`(
    IN p_codigo VARCHAR(10) -- Parámetro de entrada para el código
)
BEGIN
    -- Realizar la consulta con INNER JOIN
   SELECT 
        p.idpredios,
        p.denominado,
        p.sector,
        p.distrito,
        p.provincia,
        p.departamento,
        p.cod_predial,
        p.cod_catastral
    FROM indentificador i
    INNER JOIN predios p ON i.id = p.indentificador_id
    WHERE i.codigo LIKE p_codigo;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `obtener_RuralUrbano_por_anio` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `obtener_RuralUrbano_por_anio`(IN idAnio INT)
BEGIN
    DECLARE tipoRegistro TINYINT;
    DECLARE existeConstruccion TINYINT;

    -- Obtener tipo de registro (1 = rural)
    SELECT select_ruralurbano INTO tipoRegistro
    FROM anio_registro
    WHERE idanio_registro = idAnio;

    IF tipoRegistro = 1 THEN
        -- Verificar si hay construcción en el registro rural
        SELECT existe_construccion INTO existeConstruccion
        FROM rural
        WHERE anio_registro_idanio_registro = idAnio
        LIMIT 1;

        IF existeConstruccion = 1 THEN
            -- Retornar datos de rural y construccion en un solo SELECT con JOIN
            SELECT
                r.idrural,
                r.tipo,
                r.uso,
                r.tierras_aptas,
                r.altitud,
                r.calidad_agrologica,
                r.total_hectareas,
                r.existe_construccion,
                r.anio_registro_idanio_registro,
                c.idconstruccion,
                c.clasificacion,
                c.material,
                c.conservacion,
                c.tipo_uso,
                c.rural_idrural,
                c.urbano_idurbano
            FROM rural r
            LEFT JOIN construccion c ON c.rural_idrural = r.idrural
            WHERE r.anio_registro_idanio_registro = idAnio;
        ELSE
            -- Solo retornar datos de rural
            SELECT
                r.idrural,
                r.tipo,
                r.uso,
                r.tierras_aptas,
                r.altitud,
                r.calidad_agrologica,
                r.total_hectareas,
                r.existe_construccion,
                r.anio_registro_idanio_registro
            FROM rural r
            WHERE r.anio_registro_idanio_registro = idAnio;
        END IF;
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_eliminar_predio` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminar_predio`(
    IN p_id INT -- ID del predio que se desea eliminar
)
BEGIN
    DECLARE v_resultado INT; -- Variable local para almacenar el resultado

    -- Intentar eliminar el registro
    DELETE FROM `predios`
    WHERE `idpredios` = p_id;

    -- Verificar si se eliminó algún registro
    IF ROW_COUNT() > 0 THEN
        -- Si se eliminó, guardar el ID eliminado
        SET v_resultado = p_id;
    ELSE
        -- Si no se encontró el registro, guardar 0
        SET v_resultado = 0;
    END IF;

    -- Retornar el resultado
    SELECT v_resultado AS id_eliminado;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_eliminar_usuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminar_usuario`(
    IN p_id INT -- ID del usuario que se desea eliminar
)
BEGIN
    DECLARE v_resultado INT; -- Variable local para almacenar el resultado

    -- Intentar eliminar el registro
    DELETE FROM tb_usuario
    WHERE idtb_usuario = p_id;

    -- Verificar si se eliminó algún registro
    IF ROW_COUNT() > 0 THEN
        -- Si se eliminó, guardar el ID eliminado
        SET v_resultado = p_id;
    ELSE
        -- Si no se encontró el registro, guardar 0
        SET v_resultado = 0;
    END IF;

    -- Retornar el resultado
    SELECT v_resultado AS id_eliminado;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_loging` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_loging`(
    IN p_usuario VARCHAR(50),     -- Usuario ingresado
    IN p_password VARCHAR(255)   -- Contraseña ingresada
)
BEGIN
    DECLARE v_id_usuario INT;  -- Variable para almacenar el ID del usuario
    
    -- Buscar el ID del usuario que coincida con las credenciales
    SELECT idtb_usuario
    INTO v_id_usuario
    FROM tb_usuario
    WHERE usuario = p_usuario AND password = p_password
    LIMIT 1;
    
    -- Retornar el ID del usuario si existe o 0 si no existe
    IF v_id_usuario IS NOT NULL THEN
        SELECT v_id_usuario AS id_usuario;
    ELSE
        SELECT 0 AS id_usuario;
    END IF;
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

-- Dump completed on 2025-06-23  0:07:28
