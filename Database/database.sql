-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: srer
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `avistamiento`
--

DROP TABLE IF EXISTS `avistamiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `avistamiento` (
  `IdAvistamiento` int NOT NULL AUTO_INCREMENT,
  `Persona_IdPersona` int NOT NULL,
  `Especie_IdEspecie` int DEFAULT NULL,
  `Region_IdRegion` int NOT NULL,
  `DescripcionAvistamiento` varchar(200) NOT NULL,
  `FechaAvistamiento` datetime NOT NULL,
  `FotoAvistamiento` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IdAvistamiento`),
  KEY `fk_Avistamiento_Region1_idx` (`Region_IdRegion`),
  KEY `fk_Avistamiento_Persona1_idx` (`Persona_IdPersona`),
  KEY `fk_Avistamiento_Especie1_idx` (`Especie_IdEspecie`),
  CONSTRAINT `fk_Avistamiento_Especie1` FOREIGN KEY (`Especie_IdEspecie`) REFERENCES `especie` (`IdEspecie`),
  CONSTRAINT `fk_Avistamiento_Persona1` FOREIGN KEY (`Persona_IdPersona`) REFERENCES `persona` (`IdPersona`),
  CONSTRAINT `fk_Avistamiento_Region1` FOREIGN KEY (`Region_IdRegion`) REFERENCES `region` (`IdRegion`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avistamiento`
--

LOCK TABLES `avistamiento` WRITE;
/*!40000 ALTER TABLE `avistamiento` DISABLE KEYS */;
INSERT INTO `avistamiento` VALUES (3,11,5,1,'Muy chistoso','2000-05-05 09:08:00',''),(4,13,24,1,'Curada','2000-05-05 09:08:01',''),(8,13,NULL,1,'Lo vi muy cariñoso','2000-05-05 09:08:00','images/cascabel_tropical.jpeg'),(10,13,NULL,1,'Segunda','2000-05-05 09:08:00','images/alicoche.jpg'),(11,13,NULL,1,'No sé que es esto ayuda','2000-05-05 09:08:00','images/alicoche.jpg'),(12,13,NULL,3,'Hola hay bayas','2022-06-07 14:17:09','images/bayas.jpg'),(13,58,24,2,'Una flor como con bayas raras','2022-06-07 15:29:58','images/alicoche.jpg'),(17,9,5,1,'una especie extraña','2022-06-07 16:00:34','images/bejori.jpeg'),(18,47,7,1,'Este es el avistamiento del Dani','2022-06-07 16:09:53','images/bayas.jpg'),(19,11,5,1,'Vista entre un gran cúmulo de arbustos. Eran aproximadamente 3 plantas pequeñas, solo una de ellas contaba con fruto.','2019-05-05 09:08:00','images/bayas_limonada.jpg'),(20,9,7,1,'Se visualizó fugazmente a un pinzón mexicano hembra entre un grupo de arboledas.','2012-12-13 04:30:28','images/v_pinzon.jpg'),(21,21,24,1,'Visualizada aproximadamente a 5 metros de distancia, aproximadamente de 1 metro de longitud. Se encontraba atenta a nosotros,','2015-05-26 16:48:26','images/v_cascabel.jpg'),(22,32,25,1,'Se encontró una gran cantidad de esta especie cerca de El Porvenir.','2014-07-08 12:30:50','images/v_alicoche.jpg'),(23,34,26,3,'Estaban 2 especímenes rodeando lo que creemos que era un grillo muerto, del cual se estaban alimentando','2017-09-07 06:15:11','images/v_bejori.jpg'),(24,44,48,2,'Visualizadas en una zona un poco desertica entre la carretera de Sonoyta-Caborca','2018-10-29 10:10:10','images/v_quiote.jpg'),(25,46,49,1,'Se encontró un pequeño cumulo de esta especie cerca de San Felipe.','2011-11-11 11:11:11','images/v_brikelia.jpg'),(27,51,30,1,'Se visualizó un pequeño topo ciego a las afueras de Valle de la Trinidad. Se mostraba tranquilo y curioso con nuestra presencia.','2022-04-03 15:18:20','images/v_topociego.jpg'),(28,58,35,2,'Se visualizó fugazmente en la carretera a las afueras de Cd Guadalupe Victoria, se encontraba cazando.','2008-06-20 16:45:50','images/v_correcaminos.jpg'),(29,61,36,3,'Visualizado en la noche, se encontraba cerca de una comunidad a las afueras de la Cd. de Oaxaca de Juárez','2014-02-14 23:20:45','images/v_cacomixtle.jpg'),(30,64,37,2,'Se visualizaron 2 ejemplares a las afueras de la localidad de Huatabampo, Sonora.','2013-02-20 03:23:30','images/v_lagarto_escorpion.jpg'),(31,65,38,3,'Se visualizaron algunos ejemplares en canales controlados de Xochimilco.','2001-01-02 08:15:00','images/v_ajolote.jpg'),(32,67,39,1,'Con mucha suerte, se visualizaron 2 ejemplares por algún lugar en el Golfo de California','2010-06-05 19:18:56','images/v_vaquitamarina.jpg'),(33,73,59,2,'Se visualizó en busca de comida en un parque en la Cd. de Guadalajara','2017-02-23 18:18:56','images/v_gorrion.jpg'),(34,7,41,2,'Visualizado en un bosque(de no mucha densidad) cerca del centro de México','2012-12-12 20:30:10','images/v_teporingo.jpg'),(35,10,42,2,'Visualizadas en el vivero donde se cultiva esta especie, cerca de la ciudad de Mazatlan, Sinaloa.','2020-12-13 16:20:35','images/v_nochebuena.jpg'),(36,13,43,2,'Visualizadas en el vivero donde se cultiva esta especie, cerca de la ciudad de Puebla, Puebla.','2005-10-17 03:48:30','images/v_cempasuchil.jpg'),(37,15,44,2,'Se visualizó en una arboleda de una casa cerca de la ciudad de Tamaulipas','2021-06-07 16:15:40','images/v_mochuelo.jpg'),(38,16,45,1,'Se visualizó un pequeño ejemplar el cual se mostró algo interesado en nosotros cuando nos observó, se dejó acercar. Después de un tiempo observandonos se retiró tranquilamente.','2014-06-13 05:07:50','images/v_mofeta.jpg'),(39,18,46,3,'Se visualizó un cultivo de dalias en una casa particular en la ciudad de Chilpancingo, Guerrero.','2012-05-23 22:22:22','images/v_dalia.jpg'),(40,20,47,3,'Se visualizó un pequeño cultivo de orquídeas pelícano cerca de la ciudad de Durango.','2018-06-30 23:55:45','images/v_orquideap.jpg'),(42,12,62,2,'No sabíamos que era, pensamos que era un gato o un perro pequeño abandonado, pero creo que era un coyote bebé.','2015-09-25 14:26:34','images/av_zorrita.jpg'),(43,7,54,3,'A mi hija le pareció bonita una flor que vimos mientras tomabamos un descanso en nuestro viaje, recuerdo haberla visto en alguna página de especies endémicas.','2010-07-12 07:35:12','images/av_flormono.jpg'),(45,15,47,1,'La vi en tal lugar está bonita','2022-06-08 09:04:01','images/'),(46,76,35,2,'lo ví era real','2022-06-08 09:27:48','images/'),(47,77,48,3,'lo mire cerca de mi ransho','2022-06-08 10:14:05','images/ejemplo (3).jpg'),(50,15,48,2,'avistamientooo','2022-06-08 11:19:18','images/ejemplo (38).jpg'),(51,15,48,3,'holam','2022-06-08 11:20:22','images/');
/*!40000 ALTER TABLE `avistamiento` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`%`*/ /*!50003 TRIGGER `avistamiento_BEFORE_DELETE` BEFORE DELETE ON `avistamiento` FOR EACH ROW BEGIN
	delete from colaboracion where Avistamiento_IdAvistamiento = old.IdAvistamiento;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `carrera`
--

DROP TABLE IF EXISTS `carrera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carrera` (
  `IdCarrera` int NOT NULL AUTO_INCREMENT,
  `Carrera` varchar(50) NOT NULL,
  `Facultad_IdFacultad` int NOT NULL,
  PRIMARY KEY (`IdCarrera`),
  KEY `fk_Carreras_Facultad1_idx` (`Facultad_IdFacultad`),
  CONSTRAINT `fk_Carreras_Facultad1` FOREIGN KEY (`Facultad_IdFacultad`) REFERENCES `facultad` (`IdFacultad`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrera`
--

LOCK TABLES `carrera` WRITE;
/*!40000 ALTER TABLE `carrera` DISABLE KEYS */;
INSERT INTO `carrera` VALUES (1,'Ingeniería en Computación',1),(2,'Ingeniería en Electrónica',1),(3,'Arquitectura',1),(4,'Ingeniería Industrial',3),(5,'Ingeniería Electromecánica',3),(6,'Ingeniería de Software',4),(7,'Ingeniería en Energías Electrónicas',4);
/*!40000 ALTER TABLE `carrera` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clase`
--

DROP TABLE IF EXISTS `clase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clase` (
  `IdClase` int NOT NULL AUTO_INCREMENT,
  `Clase` varchar(70) NOT NULL,
  `Division_IdDivision` int NOT NULL,
  PRIMARY KEY (`IdClase`),
  KEY `fk_Clase_Division1_idx` (`Division_IdDivision`),
  CONSTRAINT `fk_Clase_Division1` FOREIGN KEY (`Division_IdDivision`) REFERENCES `division` (`IdDivision`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clase`
--

LOCK TABLES `clase` WRITE;
/*!40000 ALTER TABLE `clase` DISABLE KEYS */;
INSERT INTO `clase` VALUES (1,'Mamíferos',1),(2,'Aves',1),(3,'Reptiles',1),(4,'Malacostráceos',2),(5,'Chlorodendrophyceae',4),(6,'Magnoliopsida',5),(7,'Anfibio',2),(8,'Actinopterygii',7);
/*!40000 ALTER TABLE `clase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colaboracion`
--

DROP TABLE IF EXISTS `colaboracion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `colaboracion` (
  `IdColaboracion` int NOT NULL AUTO_INCREMENT,
  `FechaColaboracion` datetime NOT NULL,
  `DescripcionColaboracion` varchar(100) NOT NULL,
  `Persona_IdPersona` int NOT NULL,
  `Especie_IdEspecie` int DEFAULT NULL,
  `Avistamiento_IdAvistamiento` int DEFAULT NULL,
  PRIMARY KEY (`IdColaboracion`),
  KEY `fk_Colaboracion_Persona1_idx` (`Persona_IdPersona`),
  KEY `fk_Colaboracion_Especie1_idx` (`Especie_IdEspecie`),
  KEY `fk_Colaboracion_Avistamiento1_idx` (`Avistamiento_IdAvistamiento`),
  CONSTRAINT `fk_Colaboracion_Avistamiento1` FOREIGN KEY (`Avistamiento_IdAvistamiento`) REFERENCES `avistamiento` (`IdAvistamiento`),
  CONSTRAINT `fk_Colaboracion_Especie1` FOREIGN KEY (`Especie_IdEspecie`) REFERENCES `especie` (`IdEspecie`),
  CONSTRAINT `fk_Colaboracion_Persona1` FOREIGN KEY (`Persona_IdPersona`) REFERENCES `persona` (`IdPersona`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colaboracion`
--

LOCK TABLES `colaboracion` WRITE;
/*!40000 ALTER TABLE `colaboracion` DISABLE KEYS */;
INSERT INTO `colaboracion` VALUES (1,'2022-06-06 19:50:22','Se modificó la descripcion ',11,5,NULL),(3,'2022-05-06 19:50:22','Otra descripción',11,NULL,3),(5,'2022-03-15 07:23:00','Se agregó el nombre común de la especie.',15,42,NULL),(6,'2022-01-31 08:02:00','Se corrigió la fecha del avistamiento',15,NULL,25),(7,'2022-04-26 07:07:00','Se corrigió la región del avistamiento.',16,54,NULL),(8,'2022-06-06 19:50:22','Se agregó una fotografía a la descripción',9,NULL,22),(9,'2021-12-15 14:45:30','Se corrigió información sobre la región donde fue visualizado el espécimen',11,NULL,4),(11,'2020-11-10 19:50:22','Se tomó una mejor fotografía para el registro del avistamiento',32,48,NULL),(13,'2022-06-06 19:50:22','Se agregó una imagen del avistamiento. Estaba ahí.',23,NULL,13),(16,'2022-06-01 09:20:12','Formó parte del grupo de personas que hicieron el avistamiento de la especie.',69,59,NULL),(17,'2022-03-15 07:23:00','Se agregó el nombre común de la especie.',15,NULL,19),(18,'2022-02-13 12:32:00','Formó parte del grupo de personas que hicieron el avistamiento.',7,43,NULL),(19,'2021-12-20 18:32:00','Se agregó más información en la descripción del registro de la especie.',46,NULL,22),(21,'2022-01-31 08:02:00','Se corrigió la fecha del avistamiento',15,48,NULL),(22,'2022-04-26 07:07:00','Se corrigió la región del avistamiento.',16,NULL,27);
/*!40000 ALTER TABLE `colaboracion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colonia`
--

DROP TABLE IF EXISTS `colonia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `colonia` (
  `IdColonia` int NOT NULL AUTO_INCREMENT,
  `NombreColonia` varchar(50) NOT NULL,
  `CodigoPostal` varchar(5) NOT NULL,
  `Municipio_IdMunicipio` int NOT NULL,
  PRIMARY KEY (`IdColonia`),
  KEY `fk_Colonia_Municipio1_idx` (`Municipio_IdMunicipio`),
  CONSTRAINT `fk_Colonia_Municipio1` FOREIGN KEY (`Municipio_IdMunicipio`) REFERENCES `municipio` (`IdMunicipio`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colonia`
--

LOCK TABLES `colonia` WRITE;
/*!40000 ALTER TABLE `colonia` DISABLE KEYS */;
INSERT INTO `colonia` VALUES (1,'Valle Dorado','22785',1),(2,'Chapultepec','22950',1);
/*!40000 ALTER TABLE `colonia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `direccion`
--

DROP TABLE IF EXISTS `direccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `direccion` (
  `IdDireccion` int NOT NULL AUTO_INCREMENT,
  `Calle` varchar(50) NOT NULL,
  `NumExterior` int NOT NULL,
  `NumInterior` int DEFAULT NULL,
  `Colonia_IdColonia` int NOT NULL,
  PRIMARY KEY (`IdDireccion`),
  KEY `fk_Direccion_Colonia_idx` (`Colonia_IdColonia`),
  CONSTRAINT `fk_Direccion_Colonia` FOREIGN KEY (`Colonia_IdColonia`) REFERENCES `colonia` (`IdColonia`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direccion`
--

LOCK TABLES `direccion` WRITE;
/*!40000 ALTER TABLE `direccion` DISABLE KEYS */;
INSERT INTO `direccion` VALUES (1,'Rio Colorado',2,15,1),(2,'San Ignacio',1,13,2),(3,'San Bernardo',14,1,2);
/*!40000 ALTER TABLE `direccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `division`
--

DROP TABLE IF EXISTS `division`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `division` (
  `IdDivision` int NOT NULL AUTO_INCREMENT,
  `Division` varchar(70) NOT NULL,
  `Reino_IdReino` int NOT NULL,
  PRIMARY KEY (`IdDivision`),
  KEY `fk_Division_Reino1_idx` (`Reino_IdReino`),
  CONSTRAINT `fk_Division_Reino1` FOREIGN KEY (`Reino_IdReino`) REFERENCES `reino` (`IdReino`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `division`
--

LOCK TABLES `division` WRITE;
/*!40000 ALTER TABLE `division` DISABLE KEYS */;
INSERT INTO `division` VALUES (1,'Cordados',1),(2,'Artropodos',1),(3,'Briofitas',2),(4,'Clorófitas',2),(5,'Magnoliophyta',2),(6,'Perciformes',1),(7,'Chordata',1);
/*!40000 ALTER TABLE `division` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entidadfederativa`
--

DROP TABLE IF EXISTS `entidadfederativa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `entidadfederativa` (
  `IdEF` int NOT NULL AUTO_INCREMENT,
  `NombreEF` varchar(50) NOT NULL,
  `Pais_IdPais` int NOT NULL,
  PRIMARY KEY (`IdEF`),
  KEY `fk_EntidadFederativa_Pais1_idx` (`Pais_IdPais`),
  CONSTRAINT `fk_EntidadFederativa_Pais1` FOREIGN KEY (`Pais_IdPais`) REFERENCES `pais` (`IdPais`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entidadfederativa`
--

LOCK TABLES `entidadfederativa` WRITE;
/*!40000 ALTER TABLE `entidadfederativa` DISABLE KEYS */;
INSERT INTO `entidadfederativa` VALUES (1,'Baja California',1);
/*!40000 ALTER TABLE `entidadfederativa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especie`
--

DROP TABLE IF EXISTS `especie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `especie` (
  `IdEspecie` int NOT NULL AUTO_INCREMENT,
  `NombreCientifico` varchar(70) NOT NULL,
  `NombreComun` varchar(70) DEFAULT NULL,
  `Descripcion` varchar(500) NOT NULL,
  `FotoEspecie` varchar(100) NOT NULL,
  `Region_IdRegion` int NOT NULL,
  `Clase_IdClase` int NOT NULL,
  PRIMARY KEY (`IdEspecie`),
  KEY `fk_Especies_Region1_idx` (`Region_IdRegion`),
  KEY `fk_Especie_Clase1_idx` (`Clase_IdClase`),
  CONSTRAINT `fk_Especie_Clase1` FOREIGN KEY (`Clase_IdClase`) REFERENCES `clase` (`IdClase`),
  CONSTRAINT `fk_Especies_Region1` FOREIGN KEY (`Region_IdRegion`) REFERENCES `region` (`IdRegion`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especie`
--

LOCK TABLES `especie` WRITE;
/*!40000 ALTER TABLE `especie` DISABLE KEYS */;
INSERT INTO `especie` VALUES (5,'Rhus integrifolia','planta de bayas de limonada','Las hojas son dentadas con una apariencia de cera por encima y por debajo de un tono más pálido. Las flores, que aparecen entre febrero y mayo, son pequeñas, estrechamente agrupadas, y pueden ser bisexuales.','images/bayas.jpg',1,5),(7,'Haemorhous mexicanus','Pinzón Mexicano','Mide alrededor de 12 cm. Es de color pardo, con el vientre rayado. Los machos se caracterizan por tener el pecho, la frente, la raya supraocular y la rabadilla color rojo, en tonalidades que varían desde el rojo brillante hasta casi naranja. Las hembras son parecidas a las hembras del gorrión doméstico.','images/pinzon.jpg',1,1),(24,'Crotalus durissus','víbora de cascabel','Se reconoce como una de las víboras más largas y\r\nvenenosas de Norteamérica, siendo capaz de alcanzar los 2,5 metros y\r\n4,5 kilogramos de peso. Suelen tener un cuerpo delgado, compacto, con\r\nuna cabeza plana que se distingue a la perfección de su cuello','images/cascabel_tropical.jpeg',1,3),(25,'chinocereus maritimus','Alicoche de Ensenada','Crece profusamente ramificado y forma agrupaciones de un máximo de 300 unidades y depósitos que son de hasta 40 centímetros de altura, con un diámetro de 2 metros. El tallo de color verde oscuro, los brotes cilíndricos de 5 a 30 centímetros de largo y con un diámetro de 3 a 7 centímetros.','images/alicoche.jpg',1,4),(26,'Sceloporus occidentalis','Bejori de Cerca Occidental','Son de color marrón a negro (el marrón puede ser arena o verdoso) y tienen rayas negras en la espalda, pero su característica más distintiva es su vientre azul brillante.','images/bejori.jpeg',3,3),(30,'Talpa caeca','Topo ciego','Carnívoro. Se dice que es ciego, realmente cuenta con una visión reducida, por lo que ven el movimiento y la luz, pero no distinguen formas','images/topociego.jpg',1,1),(35,'Geococcyx californianus','Correcaminos','Es una especie de ave cuculiforme de la familia Cuculidae. Tiene una velocidad máxima de 42 km/h, y puede medir entre los 50 y los 65 cm de longitud, mientras pesa hasta los 300 g. Su alimentación se basa en pequeños reptiles, como es el caso de las lagartijas y las serpientes jóvenes. Pone de 2 a 6 huevos','images/correcaminos.jpg',2,2),(36,'Bassariscus astutus','Cacomixtle','Se trata de un mamífero omnívoro de la familia Procyonidae, que en la etapa adulta es capaz de medir los 35 cm de longitud, y llegar a pesar más de 1 kg. Es de complexión delgada, posee patas cortas y orejas alargadas.','images/cacomixtle.jpg',3,1),(37,'Heloderma horridum','Lagarto escorpión','Cuentan con una cabeza ancha y aplanada, su cola es enorme y larga, mientras que sus patas son cortas y robustas. También se le aprecian anchas de colores amarillas y marrones','images/lagarto_escorpion.jpg',2,3),(38,'Ambystoma mexicanum','Ajolote Mexicano','Destaca por su capacidad de regeneración celular y su complejo sistema respiratorio que le permite estar dentro y fuera del agua, lo que llevó a las culturas antiguas a considerarlo como un ser que desafiaba la muerte.','images/ajolote.jpg',3,7),(39,'Phocoena sinus','Vaquita marina','Habita solamente en el Golfo de California y está considerado también en peligro crítico de extinción (PC) en las listas de especies en categoría de riesgo.','images/vaquinamarina.jpg',1,1),(40,'Totoaba macdonaldi','Totoaba','Es también conocida como corvina blanca, roncadores o tambor, por su capacidad de producir sonidos con su vejiga natatoria. Pez muy longevo, puede vivir de 25 a 50 años, alcanzar 2 metros de longitud y pesar más de 100 kilogramos.','images/totoaba.jpg',1,1),(41,'Romerolagus diazi','Teporingo','Sobrevive en las laderas de los volcanes del Valle de México con una población que se estima en siete mil ejemplares, debido a la fragmentación de su hábitat por el crecimiento de la mancha urbana y los cultivos extensivos.','images/teporingo.jpg',2,1),(42,'Euphorbia pulcherrima','Flor de Nochebuena','Fue domesticada con fines medicinales por los pueblos originarios de México y que trascendió para el resto del mundo como flor emblemática de la Navidad.','images/flornochebuena.jpg',2,6),(43,'Tagetes erecta','Flor de Cempasúchil','Por la creencia de que atrapa los rayos del sol, los pueblos originarios la utilizaban para iluminar el camino de los difuntos y angelitos que regresaban al mundo para visitar a los vivos en las “fiestas de muertos”.','images/cempasuchil.jpg',2,6),(44,'Glaucidium sanchezi','Mochuelo tamaulipeco','Se distribuye en una pequeña zona, en los bosques que están entre Tamaulipas y Tamazunchale. Es un búho que solo mide 13 centímetros y pesa alrededor de 60 gramos. La especie se alimenta de otros animales más pequeños, como roedores y lagartijas. Presenta un plumaje castaño con algunas zonas más oscuras.','images/mochuelo.jpg',2,2),(45,'Spilogale pygmaea','Mofeta moteada pigmea','Habita las zonas boscosas que rodean la costa pacífica mexicana. Es un animal nocturno que se alimenta de bayas, insectos, frutas, pájaros pequeños y lagartijas. La especie se caracteriza por presentar un pelaje negro con franjas blancas encima de los ojos, la espalda y los costados.','images/mofeta_pigmea.jpg',1,1),(46,'Dahlia coccinea','Dalia','Es muy valorada desde tiempos prehispánicos por los diversos y vivos colores de sus 43 variedades, 35 de las cuales son endémicas de México. Adicional a su beldad, reúne atributos medicinales, culinarios y nutricionales.','images/dalia.jpg',3,6),(47,'Cypripedium irapeanum','Orquídea Pelícano','Esta flor se distingue no sólo por su color y majestuosa forma, sino también por lo sutil de su presencia, ya que es extremadamente difícil de cultivar porque depende de un hongo simbiótico que le brinda los nutrientes necesarios.','images/orquidea_p.jpg',3,6),(48,'Agave shawii var. sebastiana','Quiote de cedros','Esta planta suculenta, forma una roseta grande y fácilmente distinguible. Cada roseta produce un quiote que florece sólo una vez en su vida, lo que se conoce como monocárpico. Las rosetas pueden crecer por décadas antes de florecer.','images/quiote.png',1,6),(49,'Brickellia microphylla var. microphylla','Brikelia de hoja pequeña','Esta es una planta perenne muy rara, alcanza el medio metro de altura (30–70 cm) y tiene flores amarillas pálidas.','images/brikelia.png',2,6),(50,'Deinandra streetsii','Deinandra','Esta planta anual, considerada rara. Se le puede encontrar en las tres islas y puede llegar a ser muy abundante en años lluviosos. Al parecer no está afectada por disturbios antropogénicos y usualmente co-ocurre con malva pacifica.','images/deinandra.png',1,6),(51,'Malacothrix foliosa ssp. foliosa','Diente de león frondoso del desierto','Planta anual endémica, tiene 19 brácteas o menos (hojas por debajo de los pétalos de la flor). Sus flores llegan a tener de 3–7 mm de ancho','images/dienteleon.jpg',3,6),(52,'Senecio cedrosensis','Hierba de cedros','Este pequeño arbusto tiene una base leñosa y se considera una especie rara. Fácilmente distinguible por tener hojas divididas (pinadas) con lóbulos cortos y hojas marcadamente dentadas.','images/hierba.jpg',2,6),(53,'Dudleya candida','Siempreviva','La siempreviva de Coronado se puede distinguir por su amplia roseta, no cilíndrica, con hojas blanquecinas y un tubo floral con pétalos fusionados por más de 1 / 3 de su longitud.','images/siempreviva.jpg',3,6),(54,'Diplacus stellatus','Arbusto flor-mono','Se distingue fácilmente por sus flores amarillo-naranja y los ecosistemas más secos en los que se encuentra.','images/arbustoflor.jpg',3,6),(55,'Elgaria cedrosensis','Lagartija largarto','Es conocido como lagartija lagarto por su fuerte mordida y por ser depredador de otras lagartijas y crías de roedores. Se identifica por su cuerpo con cola larga y porque al correr, su movimiento se asemeja al de una serpiente.','images/lagartijalagarto.jpg',3,1),(56,'Anniella geronimensis','Lagartija sin patas','Como su nombre lo indica, esta lagartija carece de patas lo cual hace que se asemeje a una culebrita, pero se diferencia de éstas porque posee párpados. Es una especie fosorial y secretiva, es decir, que vive bajo tierra, asociada a las raíces de plantas donde se alimenta de pequeños insectos, lo cual la hace difícil de observar.','images/lagartijasinpatas.jpg',3,1),(57,'Lampropeltis herrerae','Serpiente rey','Es fácil distinguirla por su coloración de bandas negras y blancas y se encuentra principalmente en las zonas rocosas. Debido a su belleza y endemismo, sus poblaciones han sido afectadas por el tráfico ilegal de especies para el comercio de mascotas.','images/serpienterey.jpg',1,1),(58,'Pituophis insulanus','Ratonera','Esta culebra endémica, supera el metro de longitud. Es muy llamativa, con marcas negras que contrastan sobre su cuerpo amarillo a rojizo. Es un fuerte y agresivo depredador de roedores, a los que mata por constricción.','images/topera.jpg',2,1),(59,'Melospiza melodia graminea','Gorrión cantor','El gorrión cantor es una pequeña ave de pico corto y grueso y se identifica por su coloración atigrada de líneas café','images/gorrion.jpg',2,2),(60,'Thryomanes bewickii cerroensis','Chivirín cola oscura','Es fácil reconocerlo por su pico largo, delgado y curvo, y por una línea blanca que tiene sobre los ojos, asemejando cejas. Es común observarlos con la cola levantada, saltando de forma hiperactiva de rama en rama entre los arbustos.','images/chivirin.jpg',1,2),(61,'Peromyscus eremicus cedrosensis','Ratón de cactus','Tiene una cola larga con poco pelo, vientre blanco y orejas grandes. El ratón de cactus es una especie que se encuentra bajo la categoría de riesgo Amenazada, en la norma mexicana.','images/ratoncactus.jpg',3,1),(62,'Vulpes macrotis','Zorrita del desierto','Se alimenta de pequeños animales y posee costumbres nocturnas de caza. Se diferencia de la zorra negra por ser más pequeña, y se distingue también del correcaminos por tener orejas más grandes.','images/zorrita.jpg',2,1),(65,'mofetastica','zorrillo bonito','fdgfhgjkdghfjk','images/ejemplo (34).jpg',3,4);
/*!40000 ALTER TABLE `especie` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`%`*/ /*!50003 TRIGGER `especie_BEFORE_DELETE` BEFORE DELETE ON `especie` FOR EACH ROW BEGIN
	delete from avistamiento where Especie_IdEspecie = old.IdEspecie;
    delete from colaboracion where Especie_IdEspecie = old.IdEspecie;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `estudiante`
--

DROP TABLE IF EXISTS `estudiante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estudiante` (
  `IdEstudiante` int NOT NULL AUTO_INCREMENT,
  `Persona_IdPersona` int NOT NULL,
  `Semestre` tinyint NOT NULL,
  `YearIngreso` smallint NOT NULL,
  `Carrera_IdCarrera` int NOT NULL,
  PRIMARY KEY (`IdEstudiante`),
  UNIQUE KEY `Matricula_UNIQUE` (`IdEstudiante`),
  KEY `fk_Estudiante_Persona1_idx` (`Persona_IdPersona`),
  KEY `fk_Estudiante_Carrera1_idx` (`Carrera_IdCarrera`),
  CONSTRAINT `fk_Estudiante_Carrera1` FOREIGN KEY (`Carrera_IdCarrera`) REFERENCES `carrera` (`IdCarrera`),
  CONSTRAINT `fk_Estudiante_Persona1` FOREIGN KEY (`Persona_IdPersona`) REFERENCES `persona` (`IdPersona`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiante`
--

LOCK TABLES `estudiante` WRITE;
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
INSERT INTO `estudiante` VALUES (4,7,6,2019,3),(5,9,4,2012,2),(6,10,2,2015,1),(9,46,7,2008,1),(11,51,6,2019,2),(14,65,1,1900,5),(15,66,2,2015,5),(17,76,6,2018,5);
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `estudiante_AFTER_DELETE` AFTER DELETE ON `estudiante` FOR EACH ROW BEGIN
DELETE FROM persona
	WHERE IdPersona = old.Persona_IdPersona;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `facultad`
--

DROP TABLE IF EXISTS `facultad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facultad` (
  `IdFacultad` int NOT NULL AUTO_INCREMENT,
  `Facultad` varchar(150) NOT NULL,
  `Universidad_IdUniversidad` int NOT NULL,
  PRIMARY KEY (`IdFacultad`),
  KEY `fk_Facultad_Universidades1_idx` (`Universidad_IdUniversidad`),
  CONSTRAINT `fk_Facultad_Universidades1` FOREIGN KEY (`Universidad_IdUniversidad`) REFERENCES `universidad` (`IdUniversidad`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facultad`
--

LOCK TABLES `facultad` WRITE;
/*!40000 ALTER TABLE `facultad` DISABLE KEYS */;
INSERT INTO `facultad` VALUES (1,'Facultad de Ingeniería, Arquitectura y Diseño',1),(2,'Facultad de Artes',1),(3,'Facultad de Ingeniería',2),(4,'Facultad de Ingeniería',3);
/*!40000 ALTER TABLE `facultad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genero`
--

DROP TABLE IF EXISTS `genero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `genero` (
  `IdGenero` int NOT NULL AUTO_INCREMENT,
  `Genero` varchar(20) NOT NULL,
  PRIMARY KEY (`IdGenero`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genero`
--

LOCK TABLES `genero` WRITE;
/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
INSERT INTO `genero` VALUES (1,'Hombre'),(2,'Mujer');
/*!40000 ALTER TABLE `genero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `investigador`
--

DROP TABLE IF EXISTS `investigador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `investigador` (
  `IdInvestigador` int NOT NULL AUTO_INCREMENT,
  `Persona_IdPersona` int NOT NULL,
  `CedulaProfesional` varchar(10) NOT NULL,
  `YearEgreso` smallint NOT NULL,
  `Carrera_IdCarrera` int NOT NULL,
  PRIMARY KEY (`IdInvestigador`),
  KEY `fk_Investigador_Persona1_idx` (`Persona_IdPersona`),
  KEY `fk_Investigador_Carrera1_idx` (`Carrera_IdCarrera`),
  CONSTRAINT `fk_Investigador_Carrera1` FOREIGN KEY (`Carrera_IdCarrera`) REFERENCES `carrera` (`IdCarrera`),
  CONSTRAINT `fk_Investigador_Persona1` FOREIGN KEY (`Persona_IdPersona`) REFERENCES `persona` (`IdPersona`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `investigador`
--

LOCK TABLES `investigador` WRITE;
/*!40000 ALTER TABLE `investigador` DISABLE KEYS */;
INSERT INTO `investigador` VALUES (2,11,'4048892',2011,1),(3,44,'153246532',1985,1),(7,67,'84512548',2006,6),(8,69,'74125474',1995,7),(11,77,'78956634',2014,1);
/*!40000 ALTER TABLE `investigador` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `investigador_AFTER_DELETE` AFTER DELETE ON `investigador` FOR EACH ROW BEGIN
DELETE FROM persona
	WHERE IdPersona = old.Persona_IdPersona;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `municipio`
--

DROP TABLE IF EXISTS `municipio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `municipio` (
  `IdMunicipio` int NOT NULL AUTO_INCREMENT,
  `NombreMunicipio` varchar(50) NOT NULL,
  `EntidadFederativa_IdEF` int NOT NULL,
  PRIMARY KEY (`IdMunicipio`),
  KEY `fk_Municipio_EntidadFederativa1_idx` (`EntidadFederativa_IdEF`),
  CONSTRAINT `fk_Municipio_EntidadFederativa1` FOREIGN KEY (`EntidadFederativa_IdEF`) REFERENCES `entidadfederativa` (`IdEF`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipio`
--

LOCK TABLES `municipio` WRITE;
/*!40000 ALTER TABLE `municipio` DISABLE KEYS */;
INSERT INTO `municipio` VALUES (1,'Ensenada',1),(2,'Tijuana',1);
/*!40000 ALTER TABLE `municipio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pais`
--

DROP TABLE IF EXISTS `pais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pais` (
  `IdPais` int NOT NULL AUTO_INCREMENT,
  `NombrePais` varchar(50) NOT NULL,
  PRIMARY KEY (`IdPais`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pais`
--

LOCK TABLES `pais` WRITE;
/*!40000 ALTER TABLE `pais` DISABLE KEYS */;
INSERT INTO `pais` VALUES (1,'México');
/*!40000 ALTER TABLE `pais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `persona` (
  `IdPersona` int NOT NULL AUTO_INCREMENT,
  `NombrePersona` varchar(45) NOT NULL,
  `APaterno` varchar(30) NOT NULL,
  `AMaterno` varchar(30) DEFAULT NULL,
  `Usuario` varchar(15) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `TelefonoPersona` varchar(10) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `Genero_IdGenero` int NOT NULL,
  `TipoUsuario_IdTipoUsuario` int NOT NULL,
  PRIMARY KEY (`IdPersona`),
  UNIQUE KEY `Usuario_UNIQUE` (`Usuario`),
  UNIQUE KEY `Telefono_Persona_UNIQUE` (`TelefonoPersona`),
  KEY `fk_Persona_TipoGenero1_idx` (`Genero_IdGenero`),
  KEY `fk_Persona_TipoUsuario1_idx` (`TipoUsuario_IdTipoUsuario`),
  CONSTRAINT `fk_Persona_TipoGenero1` FOREIGN KEY (`Genero_IdGenero`) REFERENCES `genero` (`IdGenero`),
  CONSTRAINT `fk_Persona_TipoUsuario1` FOREIGN KEY (`TipoUsuario_IdTipoUsuario`) REFERENCES `tipousuario` (`IdTipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (7,'Maria','González','Ochoa','juana','123','6462214578','1999-05-21',2,1),(9,'Cristina Linelle','López','Corral','cris','123','6462134664','2001-07-08',2,3),(10,'Pedro','Fernandez','','pedro','123','6461547848','1975-09-07',1,1),(11,'Patricia','López','','pati','123','6461548877','2001-08-05',2,2),(12,'Arturo','López','Pérez','arturo','123','6461214487','1950-05-04',1,1),(13,'María','Portoroso','Morales','maria','123','6461548787','2004-12-04',2,1),(15,'Guadalupe','Baya','Azul','lupe','123','6461548789','2001-03-15',2,1),(16,'Linelle','Corral','López','crispis','321','6464646464','2003-12-14',2,1),(18,'Luis','Ochoa','','luis2','123','6461654545','2002-11-11',1,1),(20,'diego','valenzuela','','diego','123','6461234545','2000-02-02',1,1),(21,'Daniel','Rodriguez','','dani54321','123','6461548999','2006-02-22',1,1),(23,'Daniel','Rodriguez','','dani5432','123','6461548998','2006-02-24',1,1),(24,'Daniel','Rodriguez','','dani543','456','6461548988','2006-02-24',1,1),(25,'Daniel','Rodriguez','','dani54','1234','6461548888','2006-02-24',1,1),(26,'Daniel','Rodriguez','','dani9','123','6561548888','2007-02-24',1,1),(27,'Daniel','Rodriguez','','dani543219','456','5461548999','2006-02-24',1,1),(28,'Daniel','Rodriguez','','bani543219','789','5451548999','2006-02-24',1,1),(31,'Daniel','Rodriguez','','loba','123','7845121212','2006-02-24',1,1),(32,'Irais','Rodriguez','','irais','789','7851123459','2007-02-24',2,1),(34,'Luz','Ochoa','','ochoa','789','8154795125','6541-05-04',1,1),(36,'Luz','Ochoa','','ochoas','646854','8154795124','6541-05-04',1,1),(37,'Luz','Ochoa','','ochoasa','kml','8154795121','6541-05-04',1,1),(44,'Diego','Valenzuela','','dieguito','456','2548795123','1999-02-21',1,2),(46,'Valentina','Fernandez','Gutierrez','vale','789','6467418529','2002-05-04',2,1),(47,'Daniel','Antonio','Martinez','dani','123','6161237248','2001-10-28',1,3),(48,'oscar','ochoa','','oscarin321','123','6487945185','2000-02-02',1,1),(51,'Cristina','Aparicio','','apa','123','6847845154','2000-02-02',2,1),(52,'Cristina','Morales','','apas','123','6247845154','2000-02-02',2,1),(53,'Patricia','Aviña','','paty','123','1514648796','1998-05-28',2,1),(58,'Kevin','Becerra','Santamaria','kevin','123','6461540021','2000-08-08',1,3),(61,'Miguel','Casas','Hechas','condor','987','7874512458','2004-05-05',1,1),(64,'Lupita','Correa','Atada','lupis','chopis','7898541045','2003-07-08',2,1),(65,'Miguel','Castro','Castro','miguelcastro','castro','1594874826','2000-12-04',1,1),(66,'Kevin','Lopez','Lopez','k','123','1234512648','1999-12-27',1,1),(67,'Daniela','Rodriguez','Rodriguez','danielita','123','9999999995','2002-08-05',2,2),(68,'Daniela','Rodriguez','Rodriguez','daniela1','123','1234561231','1999-12-31',1,1),(69,'Daniela','Rodriguez','Rodriguez','daniela12','132','1234561238','1999-12-31',2,2),(73,'Luisa','perez','perez','luilui','123','6412168546','1993-06-15',2,1),(76,'daniboy','antonio','','dan777','123','6161234657','2022-02-24',1,1),(77,'irma','amaya','patron','iamaya','123','6466462233','1995-06-17',2,2);
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`%`*/ /*!50003 TRIGGER `persona_BEFORE_DELETE` BEFORE DELETE ON `persona` FOR EACH ROW BEGIN
	delete from avistamiento where Persona_IdPersona = old.IdPersona;
    delete from colaboracion where Persona_IdPersona = old.IdPersona;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `region`
--

DROP TABLE IF EXISTS `region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `region` (
  `IdRegion` int NOT NULL AUTO_INCREMENT,
  `Region` varchar(50) NOT NULL,
  `EntidadFederativa_IdEF` int NOT NULL,
  PRIMARY KEY (`IdRegion`),
  KEY `fk_Region_EntidadFederativa1_idx` (`EntidadFederativa_IdEF`),
  CONSTRAINT `fk_Region_EntidadFederativa1` FOREIGN KEY (`EntidadFederativa_IdEF`) REFERENCES `entidadfederativa` (`IdEF`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `region`
--

LOCK TABLES `region` WRITE;
/*!40000 ALTER TABLE `region` DISABLE KEYS */;
INSERT INTO `region` VALUES (1,'Pacífico Norte',1),(2,'Pacífico Sur',1),(3,'Pacífico Central',1);
/*!40000 ALTER TABLE `region` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reino`
--

DROP TABLE IF EXISTS `reino`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reino` (
  `IdReino` int NOT NULL AUTO_INCREMENT,
  `Reino` varchar(10) NOT NULL,
  PRIMARY KEY (`IdReino`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reino`
--

LOCK TABLES `reino` WRITE;
/*!40000 ALTER TABLE `reino` DISABLE KEYS */;
INSERT INTO `reino` VALUES (1,'Animal'),(2,'Vegetal');
/*!40000 ALTER TABLE `reino` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipousuario`
--

DROP TABLE IF EXISTS `tipousuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipousuario` (
  `IdTipoUsuario` int NOT NULL AUTO_INCREMENT,
  `TipoUsuario` varchar(30) NOT NULL,
  PRIMARY KEY (`IdTipoUsuario`),
  UNIQUE KEY `TipoUsuario_UNIQUE` (`TipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipousuario`
--

LOCK TABLES `tipousuario` WRITE;
/*!40000 ALTER TABLE `tipousuario` DISABLE KEYS */;
INSERT INTO `tipousuario` VALUES (3,'administrador'),(2,'colaborador'),(1,'usuario común');
/*!40000 ALTER TABLE `tipousuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `universidad`
--

DROP TABLE IF EXISTS `universidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `universidad` (
  `IdUniversidad` int NOT NULL AUTO_INCREMENT,
  `Universidad` varchar(150) NOT NULL,
  `Direccion_IdDireccion` int NOT NULL,
  PRIMARY KEY (`IdUniversidad`),
  UNIQUE KEY `Nombre_Universidad_UNIQUE` (`Universidad`),
  KEY `fk_Universidades_Direccion1_idx` (`Direccion_IdDireccion`),
  CONSTRAINT `fk_Universidades_Direccion1` FOREIGN KEY (`Direccion_IdDireccion`) REFERENCES `direccion` (`IdDireccion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `universidad`
--

LOCK TABLES `universidad` WRITE;
/*!40000 ALTER TABLE `universidad` DISABLE KEYS */;
INSERT INTO `universidad` VALUES (1,'Universidad Autónoma de Baja California',1),(2,'Instituto Tecnológico de ensenada',2),(3,'Centro de Enseñanza Técnica y Superior',3);
/*!40000 ALTER TABLE `universidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'srer'
--

--
-- Dumping routines for database 'srer'
--
/*!50003 DROP PROCEDURE IF EXISTS `insertaEstudiante` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertaEstudiante`(p_nombre varchar(45), p_apaterno varchar(30), p_amaterno varchar(30), p_usuario varchar(15), p_password varchar(15), p_telefono varchar(10), p_nacimiento date, p_genero int, p_tipousuario int, p_semestre tinyint, p_ingreso smallint, p_carrera int)
BEGIN
    INSERT INTO persona VALUES(0, p_nombre, p_apaterno, p_amaterno, p_usuario, p_password, p_telefono, p_nacimiento, p_genero, p_tipousuario);
    INSERT INTO estudiante VALUES(0, LAST_INSERT_ID(), p_semestre, p_ingreso, p_carrera);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insertaInvestigador` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertaInvestigador`(p_nombre varchar(45), p_apaterno varchar(30), p_amaterno varchar(30), p_usuario varchar(15), p_password varchar(15), p_telefono varchar(10), p_nacimiento date, p_genero int, p_tipousuario int, p_cedula varchar(10), p_egreso smallint, p_carrera int)
BEGIN
    INSERT INTO persona VALUES(0, p_nombre, p_apaterno, p_amaterno, p_usuario, p_password, p_telefono, p_nacimiento, p_genero, p_tipousuario);
    INSERT INTO investigador VALUES(0, LAST_INSERT_ID(), p_cedula, p_egreso, p_carrera);	
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

-- Dump completed on 2023-05-24 19:51:37
