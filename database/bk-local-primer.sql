/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.11-MariaDB : Database - inmue054_dbsissalud
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

USE `inmue054_dbsissalud`;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `menu` */

insert  into `menu`(`codigo_menu`,`nombre_menu`,`link`,`imagen`,`target`,`codsuperior`,`nivel`,`orden`,`estado`) values (1,'Dashboard','graficas.php','ti-dashboard','_self',0,1,1,'on'),(2,'Configuraciones','#','ti-settings','_self',0,1,2,'on'),(3,'Gestionar menú','gestionarmenu.php','ti-settings','_self',2,2,1,'on'),(4,'Asignar menú > perfiles','asignarmenuperfiles.php','ti-settings','_self',2,2,2,'on'),(5,'Gestionar perfiles','gestionarperfiles.php','ti-settings','_self',2,2,3,'on'),(6,'Gestionar roles','gestionarroles.php','ti-settings','_self',2,2,4,'on');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `perfiles` */

insert  into `perfiles`(`codigo_perfil`,`nombre_perfil`,`codrol_fk`,`descripcion`,`estado_perfil`) values (1,'Perfil de desarrollo',1,'El desarrollador del programa por ende tiene acceso a todo el programa','on');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `codigo_rol` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(255) DEFAULT NULL,
  `menus` varchar(255) DEFAULT NULL,
  `estado_rol` varchar(3) DEFAULT 'on',
  PRIMARY KEY (`codigo_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `roles` */

insert  into `roles`(`codigo_rol`,`nombre_rol`,`menus`,`estado_rol`) values (1,'Developer','1,3,4,5,6','on');

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
