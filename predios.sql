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
  CONSTRAINT `fk_altura_terreno_grupo_tierras` FOREIGN KEY (`grupo_tierras_idgrupo_tierras`) REFERENCES `grupo_tierras` (`idgrupo_tierras`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `altura_terreno`
--

LOCK TABLES `altura_terreno` WRITE;
/*!40000 ALTER TABLE `altura_terreno` DISABLE KEYS */;
INSERT INTO `altura_terreno` VALUES (1,'500 m.s.n.m - 2000 m.s.n.m',1),(2,'2001 m.s.n.m - 3000 m.s.n.m',1),(3,'3001 m.s.n.m - 4000 m.s.n.m',1),(4,'4000 m.s.n.m a mas',1),(5,'500 m.s.n.m - 2000 m.s.n.m',2),(6,'2001 m.s.n.m - 3000 m.s.n.m',2),(7,'3001 m.s.n.m - 4000 m.s.n.m',2),(8,'4000 m.s.n.m a mas',2),(9,'2001 m.s.n.m - 3000 m.s.n.m',3),(10,'3001 m.s.n.m - 4000 m.s.n.m',3),(11,'4000 m.s.n.m a mas',3),(12,'2001 m.s.n.m - 3000 m.s.n.m',4),(13,'500 m.s.n.m - 2000 m.s.n.m',5),(14,'2001 m.s.n.m - 3000 m.s.n.m',5),(15,'3001 m.s.n.m - 4000 m.s.n.m',5),(16,'4000 m.s.n.m a mas',5),(17,'500 m.s.n.m - 2000 m.s.n.m',6),(18,'2001 m.s.n.m - 3000 m.s.n.m',6),(19,'3001 m.s.n.m - 4000 m.s.n.m',6),(20,'4000 m.s.n.m a mas',6),(21,'2001 m.s.n.m - 3000 m.s.n.m',7),(22,'3001 m.s.n.m - 4000 m.s.n.m',7),(23,'4000 m.s.n.m a mas',7),(24,'2001 m.s.n.m - 3000 m.s.n.m',8),(25,'500 m.s.n.m - 2000 m.s.n.m',9),(26,'2001 m.s.n.m - 3000 m.s.n.m',9),(27,'3001 m.s.n.m - 4000 m.s.n.m',9),(28,'4000 m.s.n.m a mas',9),(29,'500 m.s.n.m - 2000 m.s.n.m',10),(30,'2001 m.s.n.m - 3000 m.s.n.m',10),(31,'3001 m.s.n.m - 4000 m.s.n.m',10),(32,'4000 m.s.n.m a mas',10),(33,'2001 m.s.n.m - 3000 m.s.n.m',11),(34,'3001 m.s.n.m - 4000 m.s.n.m',11),(35,'4000 m.s.n.m a mas',11),(36,'2001 m.s.n.m - 3000 m.s.n.m',12),(37,'500 m.s.n.m - 2000 m.s.n.m',13),(38,'2001 m.s.n.m - 3000 m.s.n.m',13),(39,'3001 m.s.n.m - 4000 m.s.n.m',13),(40,'4000 m.s.n.m a mas',13),(41,'500 m.s.n.m - 2000 m.s.n.m',14),(42,'2001 m.s.n.m - 3000 m.s.n.m',14),(43,'3001 m.s.n.m - 4000 m.s.n.m',14),(44,'4000 m.s.n.m a mas',14),(45,'2001 m.s.n.m - 3000 m.s.n.m',15),(46,'3001 m.s.n.m - 4000 m.s.n.m',15),(47,'4000 m.s.n.m a mas',15),(48,'2001 m.s.n.m - 3000 m.s.n.m',16),(49,'500 m.s.n.m - 2000 m.s.n.m',17),(50,'2001 m.s.n.m - 3000 m.s.n.m',17),(51,'3001 m.s.n.m - 4000 m.s.n.m',17),(52,'4000 m.s.n.m a mas',17),(53,'500 m.s.n.m - 2000 m.s.n.m',18),(54,'2001 m.s.n.m - 3000 m.s.n.m',18),(55,'3001 m.s.n.m - 4000 m.s.n.m',18),(56,'4000 m.s.n.m a mas',18),(57,'2001 m.s.n.m - 3000 m.s.n.m',19),(58,'3001 m.s.n.m - 4000 m.s.n.m',19),(59,'4000 m.s.n.m a mas',19),(60,'2001 m.s.n.m - 3000 m.s.n.m',20),(61,'500 m.s.n.m - 2000 m.s.n.m',21),(62,'2001 m.s.n.m - 3000 m.s.n.m',21),(63,'3001 m.s.n.m - 4000 m.s.n.m',21),(64,'4000 m.s.n.m a mas',21),(65,'500 m.s.n.m - 2000 m.s.n.m',22),(66,'2001 m.s.n.m - 3000 m.s.n.m',22),(67,'3001 m.s.n.m - 4000 m.s.n.m',22),(68,'4000 m.s.n.m a mas',22),(69,'2001 m.s.n.m - 3000 m.s.n.m',23),(70,'3001 m.s.n.m - 4000 m.s.n.m',23),(71,'4000 m.s.n.m a mas',23),(72,'2001 m.s.n.m - 3000 m.s.n.m',24),(73,'500 m.s.n.m - 2000 m.s.n.m',25),(74,'2001 m.s.n.m - 3000 m.s.n.m',25),(75,'3001 m.s.n.m - 4000 m.s.n.m',25),(76,'4000 m.s.n.m a mas',25),(77,'500 m.s.n.m - 2000 m.s.n.m',26),(78,'2001 m.s.n.m - 3000 m.s.n.m',26),(79,'3001 m.s.n.m - 4000 m.s.n.m',26),(80,'4000 m.s.n.m a mas',26),(81,'2001 m.s.n.m - 3000 m.s.n.m',27),(82,'3001 m.s.n.m - 4000 m.s.n.m',27),(83,'4000 m.s.n.m a mas',27),(84,'2001 m.s.n.m - 3000 m.s.n.m',28);
/*!40000 ALTER TABLE `altura_terreno` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anual_construccion`
--

LOCK TABLES `anual_construccion` WRITE;
/*!40000 ALTER TABLE `anual_construccion` DISABLE KEYS */;
INSERT INTO `anual_construccion` VALUES (1,'2023'),(2,'2022');
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
  CONSTRAINT `fk_calidad_agrologica_altura_terreno` FOREIGN KEY (`altura_terreno_id_terreno`) REFERENCES `altura_terreno` (`id_terreno`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calidad_agrologica`
--

LOCK TABLES `calidad_agrologica` WRITE;
/*!40000 ALTER TABLE `calidad_agrologica` DISABLE KEYS */;
INSERT INTO `calidad_agrologica` VALUES (1,'25556.45','21722.98','15333.87',1),(2,'20445.16','17378.38','12267.09',2),(3,'15333.87','13033.79','9200.32',3),(4,'10222.58','8689.19','6133.55',4),(5,'6389.11','5430.74','3833.47',5),(6,'5111.29','4344.6','3066.77',6),(7,'3833.47','3258.45','2300.08',7),(8,'2555.64','2172.3','1533.39',8),(9,'2555.64','2172.3','1533.39',9),(10,'2044.52','1737.84','1226.71',10),(11,'1533.39','1303.38','920.03',11),(12,'1520.61','1520.61','1520.61',12),(13,'24059.92','20450.93','14435.95',13),(14,'19247.93','16360.74','11548.76',14),(15,'14435.95','12270.56','8661.57',15),(16,'9623.97','8180.37','5774.38',16),(17,'6014.98','5112.73','3608.99',17),(18,'4811.98','4090.19','2887.19',18),(19,'3608.99','3067.64','2165.39',19),(20,'2405.99','2045.09','1443.6',20),(21,'2405.99','2045.09','1443.6',21),(22,'1924.79','1636.07','1154.88',22),(23,'1443.6','1227.06','866.16',23),(24,'1431.57','1431.57','1431.57',24),(25,'22825.08','19401.32','13695.05',25),(26,'18260.06','15521.05','10956.04',26),(27,'13695.05','11640.79','8217.03',27),(28,'9130.03','7760.53','5478.02',28),(29,'5706.27','4850.33','3423.76',29),(30,'4565.02','3880.26','2739.01',30),(31,'3423.76','2910.2','2054.26',31),(32,'2282.51','1940.13','1369.5',32),(33,'2282.51','1940.13','1369.5',33),(34,'1826.01','1552.11','1095.6',34),(35,'1369.5','1164.08','821.7',35),(36,'1358.09','1358.09','1358.09',36),(37,'22465.63','19095.79','13479.38',37),(38,'17972.5','15276.63','10783.5',38),(39,'13479.38','11457.47','8087.63',39),(40,'8986.25','7638.31','5391.75',40),(41,'5616.41','4773.95','3369.84',41),(42,'4493.13','3819.16','2695.88',42),(43,'3369.84','2864.37','2021.91',43),(44,'2246.56','1909.58','1347.94',44),(45,'2246.56','1909.58','1347.94',45),(46,'1797.25','1527.66','1078.35',46),(47,'1347.94','1145.75','808.76',47),(48,'1336.71','1336.71','1336.71',48),(49,'21728.53','18428.6','12954.81',49),(50,'17391.62','14783.68','10434.97',50),(51,'13043.72','11089.61','7826.23',51),(52,'8445.41','7391.99','8217.45',52),(53,'5434.88','4610.65','3260.93',53),(54,'4347.91','3695.72','2608.74',54),(55,'3260.93','2771.79','1956.56',55),(56,'2173.95','1847.86','1304.37',56),(57,'2068.46','1758.19','1241.08',57),(58,'1654.77','1406.55','992.86',58),(59,'1241.08','1054.92','744.65',59),(60,'1230.73','1230.73','1230.73',60),(61,'20684.61','17581.92','12410.77',61),(62,'16547.69','14065.53','9928.61',62),(63,'12410.77','10549.15','7446.46',63),(64,'8273.84','7032.77','4964.31',64),(65,'5171.15','4395.48','3102.69',65),(66,'4136.92','3516.38','2482.15',66),(67,'3102.69','2637.29','1861.61',67),(68,'2068.46','1758.19','1241.08',68),(69,'2068.46','1758.19','1241.08',69),(70,'1654.77','1406.55','992.864',70),(71,'1241.08','1054.92','744.65',71),(72,'1230.73','1230.73','1230.73',72),(73,'19777.79','16811.12','11866.68',73),(74,'15822.23','13448.9','9493.34',74),(75,'11866.68','10086.67','7120.01',75),(76,'7911.12','6724.45','4746.67',76),(77,'4944.45','4202.78','2966.67',77),(78,'3955.56','3362.22','2373.34',78),(79,'2966.67','2521.67','1780.0',79),(80,'1977.78','1681.11','1186.67',80),(81,'1977.78','1681.11','1186.67',81),(82,'1582.22','1344.89','949.33',82),(83,'1186.67','1008.67','712.0',83),(84,'1176.78','1176.78','1176.78',84);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clasificacion`
--

LOCK TABLES `clasificacion` WRITE;
/*!40000 ALTER TABLE `clasificacion` DISABLE KEYS */;
INSERT INTO `clasificacion` VALUES (1,'Casa habitacion'),(2,'Tiendas, depositos');
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
  `rural_idrural` int NOT NULL,
  PRIMARY KEY (`idconstruccion`),
  KEY `fk_construccion_rural_idx` (`rural_idrural`),
  CONSTRAINT `fk_construccion_rural` FOREIGN KEY (`rural_idrural`) REFERENCES `rural` (`idrural`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `construccion`
--

LOCK TABLES `construccion` WRITE;
/*!40000 ALTER TABLE `construccion` DISABLE KEYS */;
INSERT INTO `construccion` VALUES (3,'Casa habitacion','Adobe (Quincha, Madera)','Bueno','Unifamiliar',5),(4,'Casa habitacion','Ladrillo','Regular','Multifamiliar',6),(5,'Casa habitacion','Ladrillo','Bueno','Unifamiliar',7);
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dato_anual`
--

LOCK TABLES `dato_anual` WRITE;
/*!40000 ALTER TABLE `dato_anual` DISABLE KEYS */;
INSERT INTO `dato_anual` VALUES (1,'2023'),(2,'2022'),(3,'2021'),(4,'2020'),(5,'2019'),(6,'2018'),(7,'2017');
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
  `antiguedad` varchar(45) DEFAULT NULL,
  `material` varchar(45) DEFAULT NULL,
  `muyBueno` varchar(45) DEFAULT NULL,
  `bueno` varchar(45) DEFAULT NULL,
  `regular` varchar(45) DEFAULT NULL,
  `malo` varchar(45) DEFAULT NULL,
  `clasificacion_id` int NOT NULL,
  PRIMARY KEY (`idDepreciacion`),
  KEY `fk_depreciacion_clasificacion_idx` (`clasificacion_id`),
  CONSTRAINT `fk_depreciacion_clasificacion` FOREIGN KEY (`clasificacion_id`) REFERENCES `clasificacion` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=323 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `depreciacion`
--

LOCK TABLES `depreciacion` WRITE;
/*!40000 ALTER TABLE `depreciacion` DISABLE KEYS */;
INSERT INTO `depreciacion` VALUES (1,'0 - 5','Concreto','0','5','10','55',1),(2,'0 - 5','Ladrillo','0','8','20','60',1),(3,'0 - 5','Adobe (Quincha, Madera)','5','15','30','65',1),(4,'6 - 10','Concreto','0','5','10','55',1),(5,'6 - 10','Ladrillo','3','11','23','63',1),(6,'6 - 10','Adobe (Quincha, Madera)','10','20','35','70',1),(7,'11 - 15','Concreto','3','8','13','58',1),(8,'11 - 15','Ladrillo','6','14','26','66',1),(9,'11 - 15','Adobe (Quincha, Madera)','15','25','40','75',1),(10,'16 - 20','Concreto','6','11','16','61',1),(11,'16 - 20','Ladrillo','9','17','29','69',1),(12,'16 - 20','Adobe (Quincha, Madera)','20','30','45','80',1),(13,'21 - 25','Concreto','9','14','19','64',1),(14,'21 - 25','Ladrillo','12','20','32','72',1),(15,'21 - 25','Adobe (Quincha, Madera)','25','35','50','85',1),(16,'26 - 30','Concreto','12','17','22','67',1),(17,'26 - 30','Ladrillo','15','23','35','75',1),(18,'26 - 30','Adobe (Quincha, Madera)','30','40','55','90',1),(19,'31 - 35','Concreto','15','20','25','70',1),(20,'31 - 35','Ladrillo','18','26','38','78',1),(21,'31 - 35','Adobe (Quincha, Madera)','35','45','60','95',1),(22,'36 - 40','Concreto','18','23','28','73',1),(23,'36 - 40','Ladrillo','21','29','41','81',1),(24,'36 - 40','Adobe (Quincha, Madera)','40','50','65','95',1),(25,'41 - 45','Concreto','21','26','31','76',1),(26,'41 - 45','Ladrillo','24','32','44','84',1),(27,'41 - 45','Adobe (Quincha, Madera)','45','55','70','95',1),(28,'46 - 50','Concreto','24','29','34','79',1),(29,'46 - 50','Ladrillo','27','35','47','87',1),(30,'46 - 50','Adobe (Quincha, Madera)','50','60','75','95',1),(31,'50 - mas','Concreto','27','32','37','82',1),(32,'50 - mas','Ladrillo','30','38','50','90',1),(289,'50 - mas','Adobe (Quincha, Madera)','55','65','80','95',1),(290,'0 - 5','Concreto','0','5','10','55',2),(291,'0 - 5','Ladrillo','0','8','20','60',2),(292,'0 - 5','Adobe (Quincha, Madera)','7','17','32','67',2),(293,'6 - 10','Concreto','2','7','12','57',2),(294,'6 - 10','Ladrillo','4','12','24','64',2),(295,'6 - 10','Adobe (Quincha, Madera)','12','22','37','72',2),(296,'11 - 15','Concreto','5','10','15','60',2),(297,'11 - 15','Ladrillo','8','16','28','68',2),(298,'11 - 15','Adobe (Quincha, Madera)','17','27','42','77',2),(299,'16 - 20','Concreto','8','13','18','63',2),(300,'16 - 20','Ladrillo','12','20','32','72',2),(301,'16 - 20','Adobe (Quincha, Madera)','22','32','47','82',2),(302,'21 - 25','Concreto','11','16','21','66',2),(303,'21 - 25','Ladrillo','16','24','36','76',2),(304,'21 - 25','Adobe (Quincha, Madera)','27','37','52','87',2),(305,'26 - 30','Concreto','14','19','24','69',2),(306,'26 - 30','Ladrillo','20','28','40','80',2),(307,'26 - 30','Adobe (Quincha, Madera)','32','42','57','90',2),(308,'31 - 35','Concreto','17','22','27','72',2),(309,'31 - 35','Ladrillo','24','32','44','84',2),(310,'31 - 35','Adobe (Quincha, Madera)','37','47','62','95',2),(311,'36 - 40','Concreto','20','25','30','75',2),(312,'36 - 40','Ladrillo','28','36','48','88',2),(313,'36 - 40','Adobe (Quincha, Madera)','42','52','67','95',2),(314,'41 - 45','Concreto','23','28','33','78',2),(315,'41 - 45','Ladrillo','32','40','52','95',2),(316,'41 - 45','Adobe (Quincha, Madera)','47','57','72','98',2),(317,'46 - 50','Concreto','26','31','36','81',2),(318,'46 - 50','Ladrillo','36','44','56','95',2),(319,'46 - 50','Adobe (Quincha, Madera)','52','62','77','98',2),(320,'50 - mas','Concreto','29','34','39','84',2),(321,'50 - mas','Ladrillo','40','48','60','95',2),(322,'50 - mas','Adobe (Quincha, Madera)','57','67','82','99',2);
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
  `antiguedad` varchar(3) DEFAULT NULL,
  `Muro_columna` varchar(1) DEFAULT NULL,
  `techo` varchar(1) DEFAULT NULL,
  `pisos` varchar(1) DEFAULT NULL,
  `puerta_ventana` varchar(1) DEFAULT NULL,
  `revistimiento` varchar(1) DEFAULT NULL,
  `banio` varchar(1) DEFAULT NULL,
  `instalaciones_electricas` varchar(1) DEFAULT NULL,
  `areaconstruida` varchar(10) DEFAULT NULL,
  `urbano_idurbano` int DEFAULT NULL,
  `construccion_idconstruccion` int DEFAULT NULL,
  PRIMARY KEY (`idedificacion`),
  KEY `fk_edificacion_urbano_idx` (`urbano_idurbano`),
  KEY `fk_edificacion_construccion_idx` (`construccion_idconstruccion`),
  CONSTRAINT `fk_edificacion_construccion` FOREIGN KEY (`construccion_idconstruccion`) REFERENCES `construccion` (`idconstruccion`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_edificacion_urbano` FOREIGN KEY (`urbano_idurbano`) REFERENCES `urbano` (`idurbano`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `edificacion`
--

LOCK TABLES `edificacion` WRITE;
/*!40000 ALTER TABLE `edificacion` DISABLE KEYS */;
INSERT INTO `edificacion` VALUES (6,'1','1','10','C','D','F','D','C','F','H','100',4,NULL),(7,'1','1','1','G','H','D','F','G','H','F','50',NULL,3),(8,'1','1','50','C','G','B','D','C','H','H','100',NULL,4),(9,'1','1','45','C','G','B','D','C','H','H','100',NULL,4),(10,'1','1','50','C','F','D','C','F','E','E','120',NULL,5),(11,'2','2','45','D','G','H','H','H','G','E','100',NULL,5);
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
  CONSTRAINT `fk_grupo_tierras_dato_anual` FOREIGN KEY (`dato_anual_iddato_anual`) REFERENCES `dato_anual` (`iddato_anual`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo_tierras`
--

LOCK TABLES `grupo_tierras` WRITE;
/*!40000 ALTER TABLE `grupo_tierras` DISABLE KEYS */;
INSERT INTO `grupo_tierras` VALUES (1,'CULTIVO EN LIMPIO',1),(2,'CULTIVO PERMANENTE',1),(3,'PASTOS',1),(4,'TIERRAS ARIAZAS',1),(5,'CULTIVO EN LIMPIO',2),(6,'CULTIVO PERMANENTE',2),(7,'PASTOS',2),(8,'TIERRAS ARIAZAS',2),(9,'CULTIVO EN LIMPIO',3),(10,'CULTIVO PERMANENTE',3),(11,'PASTOS',3),(12,'TIERRAS ARIAZAS',3),(13,'CULTIVO EN LIMPIO',4),(14,'CULTIVO PERMANENTE',4),(15,'PASTOS',4),(16,'TIERRAS ARIAZAS',4),(17,'CULTIVO EN LIMPIO',5),(18,'CULTIVO PERMANENTE',5),(19,'PASTOS',5),(20,'TIERRAS ARIAZAS',5),(21,'CULTIVO EN LIMPIO',6),(22,'CULTIVO PERMANENTE',6),(23,'PASTOS',6),(24,'TIERRAS ARIAZAS',6),(25,'CULTIVO EN LIMPIO',7),(26,'CULTIVO PERMANENTE',7),(27,'PASTOS',7),(28,'TIERRAS ARIAZAS',7);
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `impusitiva_tributaria`
--

LOCK TABLES `impusitiva_tributaria` WRITE;
/*!40000 ALTER TABLE `impusitiva_tributaria` DISABLE KEYS */;
INSERT INTO `impusitiva_tributaria` VALUES (1,'2023','4950','D.S. 309-2022-EF',29.7),(2,'2022','4600','D.S. 398-2021-EF',27.6),(3,'2021','4400','D.S. 392-2020-EF',26.4),(4,'2020','4300','D.S. 380-2019-EF',25.8),(5,'2019','4200','D.S. 298-2018-EF',25.2),(6,'2018','4150','D.S. 380-2017-EF',24.9),(7,'2017','4050','D.S. 353-2016-EF',24.3),(8,'2016','3950','D.S. 397-2015-EF',23.7),(9,'2015','3850','D.S. 374-2014-EF',23.1),(10,'2014','3800','D.S. 304-2013-EF',22.8),(11,'2013','3700','D.S. 264-2012-EF',22.2),(12,'2012','3650','D.S. 2330-2011-EF',21.9),(13,'2011','3600','D.S. 252-2010-EF',21.6),(14,'2010','3600','D.S. 311-2010-EF',21.6);
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indentificador`
--

LOCK TABLES `indentificador` WRITE;
/*!40000 ALTER TABLE `indentificador` DISABLE KEYS */;
INSERT INTO `indentificador` VALUES (1,'000001'),(5,'000002'),(6,'000003'),(7,'000003'),(8,'000003'),(9,'000004'),(10,'000005'),(11,'000005'),(12,'000005'),(13,'000005'),(14,'000005'),(15,'000005'),(16,'000005'),(17,'000005'),(18,'000005'),(19,'000006');
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `predios`
--

LOCK TABLES `predios` WRITE;
/*!40000 ALTER TABLE `predios` DISABLE KEYS */;
INSERT INTO `predios` VALUES (1,'Cheqo Munay','Mansilla','Quinua','Huamanga','Ayacucho','25698653','25635412',1),(2,'Curcuman','Ananzayocc','Huamanguilla','Huamanga','Ayacucho','4568956','45_45689458_45',1),(13,'QORIWILLCA','CCCERA','OCROS','Huamanga','Ayacucho','125489554','78_649856_455',5),(14,'SACHARAQAY','LORENSAYOCC','OCROS','Huamanga','Ayacucho','125489458','78_6488556_455',5);
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propietarios`
--

LOCK TABLES `propietarios` WRITE;
/*!40000 ALTER TABLE `propietarios` DISABLE KEYS */;
INSERT INTO `propietarios` VALUES (1,'ORE ICHACCAYA, Tulio Lison','70421319','Persona Juridica','Propietario','Jr. Libertadores Mz K lote 5 ','Quinua','Huamanga','Ayacucho',1),(2,'QUISPE CALLAÑAUPA VIDAL','73458963','Persona Natural','Propietario','AV MANALLASAQ','Carmen Alto','Huamanga','Ayacucho',1),(4,'QUISPE CALLAÑAUPA VIDAL','70422589','Persona Natural','Propietario','LOS ANGELES','SAN JUAN','HUAMANGA','AYACUCHO',5),(5,'SARA SARMIENTO VARGAS','78965423','Persona Natural','Conyugue ','LOS ANGELES','SAN JUAN ','HUAMANGA','AYACUCHO',5),(6,'NERY LUZ DE LA CRUZ AYME','71946323','Persona_natural','Propietario','Jr. Sallally','Quinua','Huamanga','Ayacucho',8),(7,'SANDRA JACQUELINE FLORES CAVERO','71985463','Persona_natural','Propietario','Jr. Suares','San Juan','Huamanga','Ayacucho',9),(8,'ILDA NILA ICHACCAYA VELARDE','28240364','Persona_natural','Propietario','Los Libertadores S/N','Quinua','Huamanga','Ayacucho',19);
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
  `anio` varchar(4) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `uso` varchar(45) DEFAULT NULL,
  `tierras_aptas` varchar(45) DEFAULT NULL,
  `altitud` varchar(50) DEFAULT NULL,
  `calidad_agrologica` varchar(10) DEFAULT NULL,
  `total_hectareas` varchar(45) DEFAULT NULL,
  `existe_construccion` double DEFAULT NULL,
  `predios_idpredios` int NOT NULL,
  PRIMARY KEY (`idrural`),
  KEY `fk_rural_predios_idx` (`predios_idpredios`),
  CONSTRAINT `fk_rural_predios` FOREIGN KEY (`predios_idpredios`) REFERENCES `predios` (`idpredios`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rural`
--

LOCK TABLES `rural` WRITE;
/*!40000 ALTER TABLE `rural` DISABLE KEYS */;
INSERT INTO `rural` VALUES (4,'2020','Lote-Parcela-Chacra','Agricola','CULTIVO PERMANENTE','3001 m.s.n.m - 4000 m.s.n.m','Media ','2',0,2),(5,'2023','Lote-Parcela-Chacra','Agricola','CULTIVO PERMANENTE','500 m.s.n.m - 2000 m.s.n.m','Alta','2',1,2),(6,'2020','Lote-Parcela-Chacra','Agricola','CULTIVO EN LIMPIO','2001 m.s.n.m - 3000 m.s.n.m','Alta','5',1,13),(7,'2023','Lote-Parcela-Chacra','Agricola','CULTIVO EN LIMPIO','2001 m.s.n.m - 3000 m.s.n.m','Alta','5',1,13);
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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_usuario`
--

LOCK TABLES `tb_usuario` WRITE;
/*!40000 ALTER TABLE `tb_usuario` DISABLE KEYS */;
INSERT INTO `tb_usuario` VALUES (1,'222','comopasolisondsc@gmail.com','Admin','admin');
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
INSERT INTO `terreno` VALUES (4,NULL,'200','50',4);
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
  `anio_registro` varchar(4) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `uso` varchar(45) DEFAULT NULL,
  `ubicacion_respecto` varchar(45) DEFAULT NULL,
  `clasificacion` varchar(45) DEFAULT NULL,
  `material_construccion` varchar(45) DEFAULT NULL,
  `estado_conservacion` varchar(45) DEFAULT NULL,
  `predios_idpredios` int NOT NULL,
  PRIMARY KEY (`idurbano`),
  KEY `fk_urbano_predios_idx` (`predios_idpredios`),
  CONSTRAINT `fk_urbano_predios` FOREIGN KEY (`predios_idpredios`) REFERENCES `predios` (`idpredios`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `urbano`
--

LOCK TABLES `urbano` WRITE;
/*!40000 ALTER TABLE `urbano` DISABLE KEYS */;
INSERT INTO `urbano` VALUES (4,'2023','Terminado','Unifamiliar','Casa Habitacion','Frente a Parque ','Casa habitacion','Ladrillo','Bueno',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `valores_edificacion`
--

LOCK TABLES `valores_edificacion` WRITE;
/*!40000 ALTER TABLE `valores_edificacion` DISABLE KEYS */;
INSERT INTO `valores_edificacion` VALUES (1,'A','651.42','338.72','240.34','257.10','324.44','115.06','410.02',1),(2,'B','387.55','232.87','200.40','227.52','259.12','82.20','241.16',1),(3,'C','281.18','162.96','129.68','166.00','214.46','53.67','179.45',1),(4,'D','259.72','110.32','106.33','97.36','164.04','32.83','101.68',1),(5,'E','203.89','50.65','87.94','74.37','136.47','16.10','56.59',1),(6,'F','127.14','40.46','71.82','57.51','81.38','13.68','36.78',1),(7,'G','74.91','0','53.72','33.89','60.45','9.40','21.67',1),(8,'H','0','0','29.03','16.94','24.18','0','0',1),(9,'I','0','0','6.39','0','0','0','0',1),(10,'A','603.35','313.72','222.60','238.13','300.49','106.57','379.76',2),(11,'B','358.95','215.68','185.61','210.72','240.00','76.13','223.36',2),(12,'C','260.43','150.93','120.11','153.75','198.63','49.70','166.20',2),(13,'D','240.55','102.17','98.49','90.18','151.93','30.41','94.18',2),(14,'E','188.84','46.91','81.45','68.88','126.40','14.91','52.41',2),(15,'F','117.76','37.48','66.52','53.27','75.37','12.67','34.07',2),(16,'G','69.38','0','49.76','31.38','55.99','8.71','20.07',2),(17,'H','0','0','26.88','15.69','22.40','0','0',2),(18,'I','0','0','5.91','0','0','0','0',2);
/*!40000 ALTER TABLE `valores_edificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'dbpredios'
--

--
-- Dumping routines for database 'dbpredios'
--
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
    DECLARE new_id INT;

    -- Insertar en indentificador
    INSERT INTO indentificador (codigo) VALUES (p_codigo);
    SET new_id = LAST_INSERT_ID();

    -- Insertar en propietarios
    INSERT INTO propietarios (indentificador_id, nombre_completo, dni, razon_social, tipo, direccion, distrito, provincia, departamento) 
    VALUES (new_id, CONCAT(p_nombre, ' ', p_apellido_p, ' ', p_apellido_m), p_dni, p_razon_social, p_contribuyente, p_direccion, p_distrito, p_provincia, p_departamento);
    
    -- Retornar el ID del propietario insertado
    SELECT new_id AS id;
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

-- Dump completed on 2025-04-12  9:00:08
