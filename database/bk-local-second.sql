/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.11-MariaDB : Database - sissalud
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `barrios` */

DROP TABLE IF EXISTS `barrios`;

CREATE TABLE `barrios` (
  `codigo_ba` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre_ba` varchar(255) DEFAULT NULL,
  `codsector_fk` bigint(20) NOT NULL,
  `estado_ba` varchar(3) NOT NULL DEFAULT 'on',
  PRIMARY KEY (`codigo_ba`),
  KEY `codsector_fk` (`codsector_fk`),
  CONSTRAINT `barrios_ibfk_1` FOREIGN KEY (`codsector_fk`) REFERENCES `sectores` (`codigo_sec`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4;

/*Data for the table `barrios` */

insert  into `barrios`(`codigo_ba`,`nombre_ba`,`codsector_fk`,`estado_ba`) values (1,'DDD',1,'on'),(2,'ALTOS DE CUPINOXXX',3,'off'),(3,'ALTOS DE RISOTA',1,'on'),(4,'RISOTA',1,'on'),(5,'ANCLA',1,'on'),(6,'ROSITA',1,'on'),(7,'URBATERMINAL\r\n',1,'on'),(8,'CENTRO 1',1,'on'),(9,'CENTRO 2\r\n',1,'on'),(10,'MUELLE \r\n',1,'on'),(11,'EL CARMEN\r\n',1,'on'),(12,'LOMA FRESCA\r\n',1,'on'),(13,'MARGARITAS\r\n',1,'on'),(14,'COLINAS DE SOL\r\n',1,'on'),(15,'VILLA ROSALES\r\n',1,'on'),(16,'VILLA ROSARIO\r\n',1,'on'),(17,'BRISAS DE PUERTO\r\n',1,'on'),(18,'UNION PARAISO\r\n',1,'on'),(19,'LOS GIRASOLES\r\n',1,'on'),(20,'PUNTA BRAVA\r\n',1,'on'),(21,'VILLA ENCANTO\r\n',1,'on'),(22,'NORTE 1\r\n',1,'on'),(23,'NORTE 2\r\n',1,'on'),(24,'SILENCIO 1\r\n',1,'on'),(25,'SILENCIO 2\r\n',1,'on'),(26,'LAS AMERICAS\r\n',1,'on'),(27,'SAN CARLOS\r\n',1,'on'),(28,'BELLO MAR\r\n',1,'on'),(29,'EL CORSO\r\n',1,'on'),(30,'COSTA AZUL\r\n',1,'on'),(31,'MIRAMAR\r\n',1,'on'),(32,'PRADOMAR\r\n',1,'on'),(33,'ALTOS DE PRADOMAR\r\n',1,'on'),(34,'MAR AZUL\r\n',1,'on'),(35,'SAN LORENZO\r\n',2,'on'),(36,'TAMARINDO\r\n',2,'on'),(37,'SOL Y MAR 1\r\n',2,'on'),(38,'SOL Y MAR 2\r\n',2,'on'),(39,'SALGARITO\r\n',2,'on'),(40,'SABANILLA\r\n',2,'on'),(41,'MONTECARMELO\r\n',2,'on'),(42,'Y DE LOS CHINOS\r\n',2,'on'),(43,'PUNTA ROCA\r\n',2,'on'),(46,'VILLA CAMPESTRE',3,'on'),(47,'COUNTRY CLUB VILLA\r\n',3,'on'),(49,'XXX',3,'on'),(50,'XXX',3,'on'),(51,'XX',2,'on');

/*Table structure for table `casos` */

DROP TABLE IF EXISTS `casos`;

CREATE TABLE `casos` (
  `codigo_caso` bigint(20) NOT NULL AUTO_INCREMENT,
  `direccion` varchar(255) NOT NULL,
  `ubicacion_gps` varchar(255) NOT NULL,
  `codeventoepide_fk` bigint(20) NOT NULL,
  `codmorbilidad_fk` bigint(20) NOT NULL DEFAULT 1,
  `estrato_economico` varchar(255) NOT NULL,
  `nucleo_familiar` varchar(255) NOT NULL,
  `servicios_publicos` varchar(255) NOT NULL,
  `codbarrio_fk` bigint(20) NOT NULL,
  `realizaprueba` varchar(2) NOT NULL DEFAULT 'no',
  `fechaprueba` date DEFAULT NULL,
  `resultadoprueba` varchar(255) DEFAULT NULL,
  `pruebapsr` varchar(2) NOT NULL DEFAULT 'no',
  `resultadopruebapsr` varchar(255) DEFAULT NULL,
  `fecha_act` datetime NOT NULL,
  `fecha_ingreso` datetime NOT NULL,
  `estado_caso` varchar(255) NOT NULL,
  PRIMARY KEY (`codigo_caso`),
  KEY `codeventoepide_fk` (`codeventoepide_fk`),
  KEY `codbarrio_fk` (`codbarrio_fk`),
  CONSTRAINT `casos_ibfk_1` FOREIGN KEY (`codeventoepide_fk`) REFERENCES `eventos_epidemiologicos` (`codigo_ee`),
  CONSTRAINT `casos_ibfk_2` FOREIGN KEY (`codbarrio_fk`) REFERENCES `barrios` (`codigo_ba`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

/*Data for the table `casos` */

insert  into `casos`(`codigo_caso`,`direccion`,`ubicacion_gps`,`codeventoepide_fk`,`codmorbilidad_fk`,`estrato_economico`,`nucleo_familiar`,`servicios_publicos`,`codbarrio_fk`,`realizaprueba`,`fechaprueba`,`resultadoprueba`,`pruebapsr`,`resultadopruebapsr`,`fecha_act`,`fecha_ingreso`,`estado_caso`) values (9,'Cl. 2 ##18 B-6, Puerto Colombia, Atlántico, Colombia','11.003282993563927,-74.94945272114491',155,1,'4','1','AG,LU,GA,TE,TV,IN',33,'no',NULL,'N.A','no',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00','cerrado'),(11,'Via a Sabanilla, Puerto Colombia, Atlántico, Colombia','11.021209862237699,-74.90351384377898',215,2,'1','3','AG,LU,GA',40,'no',NULL,'N.A','no',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00','cerrado'),(12,'Cra. 26 #9-20, Eduardo Santos, Puerto Colombia, Atlántico, Colombia','11.022087594636767,-74.87042360458877',549,1,'3','3','AG,LU,GA,TV',47,'no',NULL,'N.A','no',NULL,'0000-00-00 00:00:00','2020-06-16 11:21:47','cerrado'),(16,'Cl. 7 #10-26, Puerto Colombia, Atlántico, Colombia','10.989748521191173,-74.95294526317167',155,2,'2','3','AG,LU,GA,TE,TV,IN',8,'no',NULL,'N.A','no',NULL,'0000-00-00 00:00:00','2020-06-16 11:32:06','cerrado'),(17,'Calle 8 #10b, Puerto Colombia, Atlántico, Colombia','10.9881123,-74.9543332',300,1,'5','1','LU,GA,TE',49,'no',NULL,'N.A','no',NULL,'0000-00-00 00:00:00','2020-07-02 00:56:25','cerrado'),(18,'CARRIZAL, BARRANQUILLA, ATLÁNTICO, COLOMBIA','10.9439768,-74.8053829',115,2,'1','3','AG,LU,GA,AL',38,'no',NULL,'N.A','no',NULL,'2020-07-23 00:13:43','2020-07-20 21:33:17','cerrado'),(19,'PORTAL DEL PRADO CENTRO COMERCIAL, CALLE 53, BARRANQUILLA, ATLÁNTICO, COLOMBIA','10.9896674,-74.7885928',155,1,'1','2','AG,LU,GA',41,'si','2020-07-23','Probale','si','Probale','2020-07-23 13:07:47','2020-07-23 12:49:06','abierto'),(20,'sodexo, Carrera 53, Barranquilla, Atlántico, Colombia','11.0069208,-74.8145771',215,2,'2','3','LU',3,'no',NULL,NULL,'no',NULL,'0000-00-00 00:00:00','2020-07-23 12:51:14','abierto');

/*Table structure for table `eps` */

DROP TABLE IF EXISTS `eps`;

CREATE TABLE `eps` (
  `codigo_eps` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre_eps` varchar(255) NOT NULL,
  `estado_eps` varchar(3) NOT NULL DEFAULT 'on',
  PRIMARY KEY (`codigo_eps`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

/*Data for the table `eps` */

insert  into `eps`(`codigo_eps`,`nombre_eps`,`estado_eps`) values (1,'Compensar EPS','on'),(2,'Salud Colmena EPS','on'),(3,'Salud Total EPS','on'),(4,'Famisanar EPS','on'),(5,'Coomeva EPS','on'),(6,'Sanitas EPS','on'),(7,'Saludcoop EPS','on'),(8,'Cruz Blanca','on'),(9,'Seguro Social  ISS','on'),(10,'Cafesalud','on'),(11,'Humanavivir','on'),(12,'Susalud','on'),(13,'Cajanal','on'),(14,'Caprecom','on'),(15,'Sisben','on'),(16,'Salud Vida','on'),(17,'Avanzar Médico','on'),(18,'ISS','on'),(19,'Café Salud','on'),(20,'CoSalud','on'),(21,'Comparta','on'),(22,'Dirección General De Sanidad Militar','on'),(23,'Ministerio de Defensa - Policía Nacional','on'),(24,'Sura','on'),(25,'Nueva EPS','on'),(26,'Ccccc','on');

/*Table structure for table `eventos_epidemiologicos` */

DROP TABLE IF EXISTS `eventos_epidemiologicos`;

CREATE TABLE `eventos_epidemiologicos` (
  `codigo_ee` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre_ee` varchar(255) DEFAULT NULL,
  `nivel_alerta` int(11) DEFAULT NULL,
  `estado_ee` varchar(3) NOT NULL DEFAULT 'on',
  PRIMARY KEY (`codigo_ee`)
) ENGINE=InnoDB AUTO_INCREMENT=815 DEFAULT CHARSET=utf8mb4;

/*Data for the table `eventos_epidemiologicos` */

insert  into `eventos_epidemiologicos`(`codigo_ee`,`nombre_ee`,`nivel_alerta`,`estado_ee`) values (113,'DESNUTRICIÓN AGUDA EN MENORES DE 5 AÑOS',1,'on'),(115,'CANCER EN MENORES DE 18 AÑOS\r\n',1,'on'),(155,'CANCER DE LA MAMA Y CUELLO UTERINO\r\n',1,'on'),(205,'CHAGAS',3,'on'),(210,'DENGUE',3,'on'),(215,'DEFECTOS CONGENITOS\r\n',1,'on'),(300,'AGRESIONES POR ANIMALES POTENCIALMENTE TRASMISORES DE RABIA\r\n',1,'on'),(330,'HEPATITIS A',1,'on'),(345,'(ESI- IRAG) INFECCION RESPIRATORIA AGUDA\r\n',1,'on'),(355,'ENFERMEDAD TRASMITIDA POR ALIMENTO O AGUA (ETA)\r\n',1,'on'),(356,'INTENTO DE SUICIDIO\r\n',1,'on'),(455,'LEPTOSPIROSIS',1,'on'),(549,'MORBILIDAD MATERNA EXTERNA',1,'on'),(560,'MORTALIDAD PERINATAL Y NEONATAL TARDÍA\r\n',1,'on'),(813,'TUBERCULOSIS',1,'on'),(814,'DDSSD',3,'on');

/*Table structure for table `familiar` */

DROP TABLE IF EXISTS `familiar`;

CREATE TABLE `familiar` (
  `codigo_fa` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `nacionalidad` varchar(255) NOT NULL,
  `tipo_identificacion` varchar(10) NOT NULL,
  `num_identificacion` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `fecha_ingreso` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL,
  PRIMARY KEY (`codigo_fa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `familiar` */

/*Table structure for table `ficha_censo` */

DROP TABLE IF EXISTS `ficha_censo`;

CREATE TABLE `ficha_censo` (
  `codigo_fc` bigint(20) NOT NULL AUTO_INCREMENT,
  `tipo_identificacion` varchar(255) DEFAULT NULL,
  `num_identificacion` varchar(255) DEFAULT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `ubicacion_gps` varchar(255) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `lugar_nacimiento` varchar(255) DEFAULT NULL,
  `nacionalidad` varchar(255) DEFAULT NULL,
  `pais_origen` varchar(255) DEFAULT NULL,
  `permiso_ep` varchar(255) DEFAULT NULL,
  `fecha_ingreso_pais` date DEFAULT NULL,
  `certif_migracion` varchar(255) DEFAULT NULL,
  `codeventoepide_fk` bigint(20) DEFAULT NULL,
  `cantidad_eventos` int(11) DEFAULT NULL,
  `codeps_fk` bigint(20) DEFAULT NULL,
  `estrato_economico` int(11) DEFAULT NULL,
  `nucleo_familiar` varchar(255) DEFAULT NULL,
  `servicios_publicos` varchar(255) DEFAULT NULL,
  `codsector_fk` bigint(20) DEFAULT NULL,
  `codbarrio_fk` bigint(20) DEFAULT NULL,
  `codregimen_fk` bigint(20) DEFAULT NULL,
  `codtipopoblacion_fk` bigint(20) DEFAULT NULL,
  `fecha_ingreso` datetime DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `estado_ficha` varchar(3) DEFAULT 'on',
  PRIMARY KEY (`codigo_fc`),
  KEY `codeventoepide_fk` (`codeventoepide_fk`),
  KEY `codeps_fk` (`codeps_fk`),
  KEY `codsector_fk` (`codsector_fk`),
  KEY `codbarrio_fk` (`codbarrio_fk`),
  KEY `codregimen_fk` (`codregimen_fk`),
  KEY `codtipopoblacion_fk` (`codtipopoblacion_fk`),
  CONSTRAINT `ficha_censo_ibfk_1` FOREIGN KEY (`codeventoepide_fk`) REFERENCES `eventos_epidemiologicos` (`codigo_ee`),
  CONSTRAINT `ficha_censo_ibfk_2` FOREIGN KEY (`codeps_fk`) REFERENCES `eps` (`codigo_eps`),
  CONSTRAINT `ficha_censo_ibfk_3` FOREIGN KEY (`codsector_fk`) REFERENCES `sectores` (`codigo_sec`),
  CONSTRAINT `ficha_censo_ibfk_4` FOREIGN KEY (`codbarrio_fk`) REFERENCES `barrios` (`codigo_ba`),
  CONSTRAINT `ficha_censo_ibfk_5` FOREIGN KEY (`codregimen_fk`) REFERENCES `regimenes` (`codigo_rg`),
  CONSTRAINT `ficha_censo_ibfk_6` FOREIGN KEY (`codtipopoblacion_fk`) REFERENCES `tipo_poblacion` (`codigo_tp`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ficha_censo` */

insert  into `ficha_censo`(`codigo_fc`,`tipo_identificacion`,`num_identificacion`,`nombres`,`apellidos`,`telefono`,`direccion`,`ubicacion_gps`,`fecha_nacimiento`,`lugar_nacimiento`,`nacionalidad`,`pais_origen`,`permiso_ep`,`fecha_ingreso_pais`,`certif_migracion`,`codeventoepide_fk`,`cantidad_eventos`,`codeps_fk`,`estrato_economico`,`nucleo_familiar`,`servicios_publicos`,`codsector_fk`,`codbarrio_fk`,`codregimen_fk`,`codtipopoblacion_fk`,`fecha_ingreso`,`fecha_act`,`estado_ficha`) values (1,NULL,'23233232',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'on'),(2,'E','1045123123','sfs','sffsdfsdsf','323232','323232','12123,12121','2020-06-01','asfsafs','CO',NULL,NULL,NULL,NULL,210,2,12,6,'3','3',NULL,47,1,7,'0000-00-00 00:00:00',NULL,'on'),(4,'C','96886868768',',jbkjbkjb','hbjhbjhbjhb','87857657','87857657',',','2020-06-08','jbkhjbkjbkjb','EX','arg','1','2020-05-01','1',345,2,13,4,'3','3',NULL,39,3,7,'0000-00-00 00:00:00',NULL,'on'),(5,'T','67675656','.njnkjnkjnkjnk','jnjnkjn','87686876','87686876',',','2020-06-08','kujbkhjkh','EX','hbjhbj','0','2020-06-08','0',115,1,21,5,'3','3',NULL,2,3,7,'0000-00-00 00:00:00',NULL,'on'),(6,'E','7887788787','jnknk',',j,jn','7565576','7565576',',','2020-06-01','kjbkjb','CO',NULL,NULL,NULL,NULL,155,5,10,3,'2','2',NULL,2,3,6,'0000-00-00 00:00:00',NULL,'on'),(7,'E','87788787',',n,mn,mn,','jnkjnkjnkjn','9999','9999','10.9711,-74.7837','2020-06-02','nkjnkjn','EX','sdcsdcsd','1','2020-06-08','1',345,2,17,3,'3','3',NULL,2,3,1,'0000-00-00 00:00:00',NULL,'on'),(8,'C','88787897','kjbkj','kjkjnkn','878686','878686','10.9711,-74.7837','2019-05-07','kjkjkjbkb','CO',NULL,NULL,NULL,NULL,345,1,17,1,'1','1',NULL,2,2,7,'0000-00-00 00:00:00',NULL,'on'),(9,'C','3323232','ffff','lklkmlkmlmk','9987879','9987879','10.9711,-74.7837','2019-05-07','kjbkjkjb','CO',NULL,NULL,NULL,NULL,330,1,19,1,'1','1',NULL,2,2,1,'2020-06-11 15:23:22',NULL,'on'),(10,'I','32233223','ljnjnk','kjnkjnk','9879879','9879879','10.9711,-74.7837','2017-04-09','klmlkm','CO',NULL,NULL,NULL,NULL,205,2,17,1,'1','1',NULL,2,3,1,'2020-06-11 15:23:16',NULL,'on');

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `codigo_menu` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre_menu` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL DEFAULT '#',
  `imagen` varchar(255) NOT NULL,
  `target` varchar(255) NOT NULL DEFAULT '_self',
  `codsuperior` bigint(20) NOT NULL DEFAULT 0,
  `nivel` int(11) NOT NULL,
  `orden` int(11) NOT NULL,
  `estado` varchar(3) NOT NULL DEFAULT 'on',
  PRIMARY KEY (`codigo_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

/*Data for the table `menu` */

insert  into `menu`(`codigo_menu`,`nombre_menu`,`link`,`imagen`,`target`,`codsuperior`,`nivel`,`orden`,`estado`) values (1,'Dashboard','graficas.php','ti-dashboard','_self',0,1,1,'on'),(2,'Configuraciones','#','ti-settings','_self',0,1,2,'on'),(3,'Gestionar menú','gestionarmenu.php','ti-settings','_self',2,2,1,'on'),(4,'Asignar menú > perfiles','asignarmenuperfiles.php','ti-settings','_self',2,2,2,'on'),(5,'Gestionar perfiles','gestionarperfiles.php','ti-settings','_self',2,2,3,'on'),(6,'Gestionar roles','gestionarroles.php','ti-settings','_self',2,2,4,'on'),(7,'Casos','#','ti-folder','_self',0,1,3,'on'),(8,'Censo','censo.php','ti-folder','_self',7,2,1,'on'),(9,'Nuevo','nuevocaso.php','ti-folder','_self',7,2,2,'on'),(10,'Listado','listado.php','ti-folder','_self',7,2,3,'on'),(11,'Mapa de impacto','mapaimpacto.php','ti-folder','_self',7,2,4,'on'),(12,'Gestión de datos','#','ti-save','_self',0,1,4,'on'),(13,'Eventos','eventos.php','ti-save','_self',12,2,1,'on'),(14,'Síntomas','sintomas.php','ti-save','_self',12,2,1,'on'),(15,'Eps','eps.php','ti-save','_self',12,2,2,'on'),(16,'Sectores','sectores.php','ti-save','_self',12,2,3,'on'),(17,'Barrios','barrios.php','ti-save','_self',12,2,4,'on'),(18,'Morbilidades','morbilidades.php','ti-save','_self',12,2,5,'on');

/*Table structure for table `morbilidades` */

DROP TABLE IF EXISTS `morbilidades`;

CREATE TABLE `morbilidades` (
  `codigo_mor` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre_mor` varchar(255) NOT NULL,
  `estado_mor` varchar(3) NOT NULL DEFAULT 'on',
  PRIMARY KEY (`codigo_mor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `morbilidades` */

insert  into `morbilidades`(`codigo_mor`,`nombre_mor`,`estado_mor`) values (1,'NINGUNA','on'),(2,'DIABETES','on');

/*Table structure for table `observaciones_casos` */

DROP TABLE IF EXISTS `observaciones_casos`;

CREATE TABLE `observaciones_casos` (
  `codigo_obc` bigint(20) NOT NULL AUTO_INCREMENT,
  `codcaso_fk` bigint(20) DEFAULT NULL,
  `codusuario_fk` bigint(20) NOT NULL,
  `descripcion_obc` text DEFAULT NULL,
  `fecha_obc` datetime DEFAULT NULL,
  `estado_obc` varchar(3) DEFAULT 'on',
  PRIMARY KEY (`codigo_obc`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `observaciones_casos` */

insert  into `observaciones_casos`(`codigo_obc`,`codcaso_fk`,`codusuario_fk`,`descripcion_obc`,`fecha_obc`,`estado_obc`) values (1,18,1,'HOLIWI','2020-07-20 21:33:17','on'),(2,18,1,'ASSAFFFF','2020-07-20 22:33:56','on'),(3,18,1,'ASSAFFFF','2020-07-20 22:34:15','on'),(4,18,1,'HOLAAAAAAAAAA','2020-07-20 22:34:43','on'),(5,18,1,'COMO VANNNNNNNNNN????????','2020-07-20 22:36:06','on'),(6,NULL,1,'DALE, DALE','2020-07-22 22:23:58','on'),(7,NULL,1,'ADSDDS','2020-07-22 22:26:55','on'),(8,18,1,'SDFFFFFFFF','2020-07-22 22:28:49','on'),(9,19,1,'SDNKFJNSDLFKSDJFNSDF','2020-07-23 12:49:07','on'),(10,20,1,'ESTAN SON LAS OBSERVACIONES','2020-07-23 12:51:14','on');

/*Table structure for table `perfiles` */

DROP TABLE IF EXISTS `perfiles`;

CREATE TABLE `perfiles` (
  `codigo_perfil` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre_perfil` varchar(255) DEFAULT NULL,
  `codrol_fk` bigint(20) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado_perfil` varchar(3) DEFAULT 'on',
  PRIMARY KEY (`codigo_perfil`),
  KEY `codrol_fk` (`codrol_fk`),
  CONSTRAINT `perfiles_ibfk_1` FOREIGN KEY (`codrol_fk`) REFERENCES `roles` (`codigo_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `perfiles` */

insert  into `perfiles`(`codigo_perfil`,`nombre_perfil`,`codrol_fk`,`descripcion`,`estado_perfil`) values (1,'Perfil de desarrollo',1,'El desarrollador del programa por ende tiene acceso a todo el programa','on'),(2,'Encuestador',2,'Personas que realizan los formularios','on');

/*Table structure for table `personas` */

DROP TABLE IF EXISTS `personas`;

CREATE TABLE `personas` (
  `codigo_per` bigint(20) NOT NULL AUTO_INCREMENT,
  `codcaso_fk` bigint(20) DEFAULT NULL,
  `tipo_identificacion` varchar(255) DEFAULT NULL,
  `num_identificacion` varchar(255) DEFAULT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `edad` bigint(20) DEFAULT NULL,
  `lugar_nacimiento` varchar(255) DEFAULT NULL,
  `nacionalidad` varchar(255) DEFAULT NULL,
  `pais_origen` varchar(255) DEFAULT NULL,
  `fecha_ingreso_pais` date DEFAULT NULL,
  `cert_migracion` varchar(255) DEFAULT NULL,
  `pep` varchar(255) DEFAULT NULL,
  `codeps_fk` bigint(20) DEFAULT NULL,
  `codregimen_fk` bigint(20) DEFAULT NULL,
  `codtipopoblacion_fk` bigint(20) DEFAULT NULL,
  `fecha_ingreso` datetime DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  PRIMARY KEY (`codigo_per`),
  KEY `codcaso_fk` (`codcaso_fk`),
  KEY `codeps_fk` (`codeps_fk`),
  KEY `codregimen_fk` (`codregimen_fk`),
  KEY `codtipopoblacion_fk` (`codtipopoblacion_fk`),
  CONSTRAINT `personas_ibfk_1` FOREIGN KEY (`codcaso_fk`) REFERENCES `casos` (`codigo_caso`),
  CONSTRAINT `personas_ibfk_2` FOREIGN KEY (`codeps_fk`) REFERENCES `eps` (`codigo_eps`),
  CONSTRAINT `personas_ibfk_3` FOREIGN KEY (`codregimen_fk`) REFERENCES `regimenes` (`codigo_rg`),
  CONSTRAINT `personas_ibfk_4` FOREIGN KEY (`codtipopoblacion_fk`) REFERENCES `tipo_poblacion` (`codigo_tp`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `personas` */

insert  into `personas`(`codigo_per`,`codcaso_fk`,`tipo_identificacion`,`num_identificacion`,`nombres`,`apellidos`,`telefono`,`fecha_nacimiento`,`edad`,`lugar_nacimiento`,`nacionalidad`,`pais_origen`,`fecha_ingreso_pais`,`cert_migracion`,`pep`,`codeps_fk`,`codregimen_fk`,`codtipopoblacion_fk`,`fecha_ingreso`,`fecha_act`) values (2,9,'C','22392873','manuel','rodriguez','3002349829','1996-05-08',NULL,'puerto colombia','CO',NULL,NULL,NULL,NULL,20,2,7,'0000-00-00 00:00:00',NULL),(4,11,'E','100239923','María alejandra','orozco rios','312124212','2002-09-30',NULL,'barranquilla','CO',NULL,NULL,NULL,NULL,10,2,7,'0000-00-00 00:00:00',NULL),(5,12,'C','99230203','Angela','Lopez','30012990120','1990-03-12',NULL,'caracas','EX','venezuela','2018-10-12','0','0',15,1,4,'0000-00-00 00:00:00',NULL),(6,16,'E','1001200123','VALERIA','PEñA','3001293240','2003-04-14',NULL,'BARRANQUILLA','CO',NULL,NULL,NULL,NULL,10,2,7,'2020-06-16 11:32:06',NULL),(7,17,'E','32323','SDDSSD','SDFSD','2323523','2003-04-30',NULL,'SDFDS','CO',NULL,NULL,NULL,NULL,19,1,4,'2020-07-02 00:56:25',NULL),(8,18,'E','32233234444444444444','FFSDDSDFDSFSDFSDF','JKKJNKJ','98989','2004-04-17',16,'JNKJNKJN','CO',NULL,NULL,NULL,NULL,19,2,1,'2020-07-20 21:33:17','2020-07-23 00:08:17'),(9,19,'E','101001001','SDFDSF','SDFSDF','124124124','2004-05-05',16,'BARRANQUILLA','CO',NULL,NULL,NULL,NULL,14,3,1,'2020-07-23 12:49:07','2020-07-23 13:07:47'),(10,20,'E','78686','JHBJHB','KJKJKNJ','9887987','2002-04-19',18,'KJNKJNKJ','CO',NULL,NULL,NULL,NULL,19,2,1,'2020-07-23 12:51:14',NULL);

/*Table structure for table `regimenes` */

DROP TABLE IF EXISTS `regimenes`;

CREATE TABLE `regimenes` (
  `codigo_rg` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre_rg` varchar(255) NOT NULL,
  `estado_rg` varchar(3) NOT NULL DEFAULT 'on',
  PRIMARY KEY (`codigo_rg`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `regimenes` */

insert  into `regimenes`(`codigo_rg`,`nombre_rg`,`estado_rg`) values (1,'SUBSIDIADO\r\n','on'),(2,'CONTRIBUTIVO\r\n','on'),(3,'ESPECIAL\r\n','on');

/*Table structure for table `reportar_sintomas` */

DROP TABLE IF EXISTS `reportar_sintomas`;

CREATE TABLE `reportar_sintomas` (
  `codigo_rs` bigint(20) NOT NULL AUTO_INCREMENT,
  `codfamiliar_rs` bigint(20) DEFAULT NULL,
  `codfichasenso_fk` bigint(20) DEFAULT NULL,
  `observaciones_rs` text DEFAULT NULL,
  `fecha_ingreso_rs` datetime DEFAULT NULL,
  `fecha_actualizacion_rs` datetime DEFAULT NULL,
  `codusuario_fk` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`codigo_rs`),
  KEY `codfamiliar_rs` (`codfamiliar_rs`),
  KEY `codfichasenso_fk` (`codfichasenso_fk`),
  KEY `codusuario_fk` (`codusuario_fk`),
  CONSTRAINT `reportar_sintomas_ibfk_1` FOREIGN KEY (`codfamiliar_rs`) REFERENCES `familiar` (`codigo_fa`),
  CONSTRAINT `reportar_sintomas_ibfk_2` FOREIGN KEY (`codfichasenso_fk`) REFERENCES `ficha_censo` (`codigo_fc`),
  CONSTRAINT `reportar_sintomas_ibfk_3` FOREIGN KEY (`codusuario_fk`) REFERENCES `usuarios` (`codigo_usu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `reportar_sintomas` */

/*Table structure for table `reporte_sintomas` */

DROP TABLE IF EXISTS `reporte_sintomas`;

CREATE TABLE `reporte_sintomas` (
  `codigo_rs` bigint(20) NOT NULL AUTO_INCREMENT,
  `codpersona_fk` bigint(20) NOT NULL,
  `codsintoma_fk` bigint(20) NOT NULL,
  PRIMARY KEY (`codigo_rs`),
  KEY `codpersona_fk` (`codpersona_fk`),
  KEY `codsintoma_fk` (`codsintoma_fk`),
  CONSTRAINT `reporte_sintomas_ibfk_1` FOREIGN KEY (`codpersona_fk`) REFERENCES `personas` (`codigo_per`),
  CONSTRAINT `reporte_sintomas_ibfk_2` FOREIGN KEY (`codsintoma_fk`) REFERENCES `sintomas` (`codigo_sin`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;

/*Data for the table `reporte_sintomas` */

insert  into `reporte_sintomas`(`codigo_rs`,`codpersona_fk`,`codsintoma_fk`) values (4,2,4),(5,2,3),(6,2,9),(9,4,13),(10,5,8),(11,5,10),(12,5,5),(13,5,4),(14,5,3),(15,5,9),(16,6,4),(17,6,6),(18,6,7),(19,6,9),(20,7,4),(21,7,5),(22,7,6),(28,8,5),(31,10,1),(32,10,2),(33,10,3),(37,9,6);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `codigo_rol` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(255) DEFAULT NULL,
  `menus` varchar(255) DEFAULT NULL,
  `estado_rol` varchar(3) DEFAULT 'on',
  PRIMARY KEY (`codigo_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `roles` */

insert  into `roles`(`codigo_rol`,`nombre_rol`,`menus`,`estado_rol`) values (1,'Developer','1,3,4,5,6,9,10,11,13,14,15,16,17,18','on'),(2,'Encuestador','9,10,11','on'),(3,'xx',NULL,'on');

/*Table structure for table `sectores` */

DROP TABLE IF EXISTS `sectores`;

CREATE TABLE `sectores` (
  `codigo_sec` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre_sec` varchar(255) NOT NULL,
  `estado_sec` varchar(3) NOT NULL DEFAULT 'on',
  PRIMARY KEY (`codigo_sec`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `sectores` */

insert  into `sectores`(`codigo_sec`,`nombre_sec`,`estado_sec`) values (1,'CABECERA MUNICIPAL\r\n','on'),(2,'CORREGIMIENTOS','on'),(3,'FUERA DE LA CABECERA MUNICIPAL XX','on'),(4,'DDSDSSD','on');

/*Table structure for table `sintomas` */

DROP TABLE IF EXISTS `sintomas`;

CREATE TABLE `sintomas` (
  `codigo_sin` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre_sin` varchar(255) NOT NULL,
  `estado_sin` varchar(3) NOT NULL DEFAULT 'on',
  PRIMARY KEY (`codigo_sin`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

/*Data for the table `sintomas` */

insert  into `sintomas`(`codigo_sin`,`nombre_sin`,`estado_sin`) values (1,'Fiebre alta de mas de 3 días','on'),(2,'Tos seca','on'),(3,'Dolor de garganta\r\n','on'),(4,'Dolor de cabeza\r\n','on'),(5,'Dificultad respiratoria/ sensacion de falta de aire','on'),(6,'Dolor o presion en el pecho\r\n','on'),(7,'Incapacidad para hablar o moverse\r\n','on'),(8,'Cansancio/ fatiga\r\n','on'),(9,'Dolor en articulaciones\r\n','on'),(10,'Diarrea\r\n','on'),(11,'Perdida del sentido del olfato o el gusto\r\n','on'),(12,'Erupciones cutaneas o perdida del color en los dedos de manos o pies \r\n','on'),(13,'Ninguno','on'),(14,'Xx','off');

/*Table structure for table `sintomas_familiar` */

DROP TABLE IF EXISTS `sintomas_familiar`;

CREATE TABLE `sintomas_familiar` (
  `codigo_sf` bigint(20) NOT NULL AUTO_INCREMENT,
  `codresim_fk` bigint(20) NOT NULL,
  `codsintoma_fk` bigint(20) NOT NULL,
  PRIMARY KEY (`codigo_sf`),
  KEY `codsintoma_fk` (`codsintoma_fk`),
  CONSTRAINT `sintomas_familiar_ibfk_1` FOREIGN KEY (`codsintoma_fk`) REFERENCES `sintomas` (`codigo_sin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `sintomas_familiar` */

/*Table structure for table `tipo_poblacion` */

DROP TABLE IF EXISTS `tipo_poblacion`;

CREATE TABLE `tipo_poblacion` (
  `codigo_tp` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre_tp` varchar(255) NOT NULL,
  `estado_tp` varchar(3) NOT NULL DEFAULT 'on',
  PRIMARY KEY (`codigo_tp`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tipo_poblacion` */

insert  into `tipo_poblacion`(`codigo_tp`,`nombre_tp`,`estado_tp`) values (1,'AFRODESCENDIENTE\r\n','on'),(2,'GITANO O ROOM','on'),(3,'LGTBI','on'),(4,'DESPLAZADO\r\n','on'),(5,'ETNIAS\r\n','on'),(6,'DISCAPACITADO','on'),(7,'NINGUNA\r\n','on');

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `codigo_usu` bigint(20) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `codperfil_fk` bigint(20) NOT NULL,
  `nombre_usu` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'avatar.png',
  `estado` varchar(3) NOT NULL DEFAULT 'on',
  PRIMARY KEY (`codigo_usu`),
  KEY `codperfil_fk` (`codperfil_fk`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`codperfil_fk`) REFERENCES `perfiles` (`codigo_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `usuarios` */

insert  into `usuarios`(`codigo_usu`,`usuario`,`password`,`codperfil_fk`,`nombre_usu`,`foto`,`estado`) values (1,'wparedes','7110eda4d09e062aa5e4a390b0a572ac0d2c0220',1,'Wilber Paredes','avatar.jpg','on'),(3,'amaury','7110eda4d09e062aa5e4a390b0a572ac0d2c0220',1,'Andrés Maury','avatar.jpg','on');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
