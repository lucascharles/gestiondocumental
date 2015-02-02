/*
SQLyog Ultimate v9.63 
MySQL - 5.5.40-0ubuntu0.12.04.1 : Database - gestion_documental
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `afp` */

DROP TABLE IF EXISTS `afp`;

CREATE TABLE `afp` (
  `afpIdAfp` int(11) NOT NULL AUTO_INCREMENT,
  `afpNombre` varchar(100) DEFAULT NULL,
  `activo` varchar(1) DEFAULT NULL,
  KEY `afpIdAfp` (`afpIdAfp`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `afp` */

insert  into `afp`(`afpIdAfp`,`afpNombre`,`activo`) values (1,'CUPRUM','S'),(2,'Habitat','S');

/*Table structure for table `cargo_contractual` */

DROP TABLE IF EXISTS `cargo_contractual`;

CREATE TABLE `cargo_contractual` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `cargo_contractual` */

insert  into `cargo_contractual`(`id`,`descripcion`) values (1,'JEFE ELECTRICIDAD'),(2,'JEFE PLOMERIA');

/*Table structure for table `ccat` */

DROP TABLE IF EXISTS `ccat`;

CREATE TABLE `ccat` (
  `ccatIdAfiliado` int(11) DEFAULT NULL,
  `ccatEstado` varchar(10) DEFAULT NULL,
  `ccatFechaCreacion` date DEFAULT NULL,
  `ccatFechaModificacion` date DEFAULT NULL,
  `ccatNombre` varchar(100) DEFAULT NULL,
  `ccatUsuarioCreacion` varchar(100) DEFAULT NULL,
  `ccatUsuarioModificacion` varchar(100) DEFAULT NULL,
  `activo` varchar(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `ccat` */

/*Table structure for table `ciudades` */

DROP TABLE IF EXISTS `ciudades`;

CREATE TABLE `ciudades` (
  `idCiudad` int(11) NOT NULL AUTO_INCREMENT,
  `ciudad` varchar(100) DEFAULT NULL,
  `idRegion` int(11) DEFAULT NULL,
  `activo` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`idCiudad`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `ciudades` */

insert  into `ciudades`(`idCiudad`,`ciudad`,`idRegion`,`activo`) values (1,'Santiago',4,'S');

/*Table structure for table `comunas` */

DROP TABLE IF EXISTS `comunas`;

CREATE TABLE `comunas` (
  `idComuna` int(11) NOT NULL AUTO_INCREMENT,
  `comuna` varchar(100) DEFAULT NULL,
  `idCiudad` int(11) DEFAULT NULL,
  `activo` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`idComuna`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `comunas` */

insert  into `comunas`(`idComuna`,`comuna`,`idCiudad`,`activo`) values (1,'Santiago',1,'S');

/*Table structure for table `constructora` */

DROP TABLE IF EXISTS `constructora`;

CREATE TABLE `constructora` (
  `consIdConstructora` int(11) NOT NULL AUTO_INCREMENT,
  `consEmail` varchar(100) DEFAULT NULL,
  `consEstado` varchar(10) DEFAULT NULL,
  `consFechaCreacion` date DEFAULT NULL,
  `consFechaModificacion` date DEFAULT NULL,
  `consNombreFantasia` varchar(100) DEFAULT NULL,
  `consRazonSocial` varchar(100) DEFAULT NULL,
  `consRut` varchar(100) DEFAULT NULL,
  `consTelefono` varchar(100) DEFAULT NULL,
  `consTelefono2` varchar(100) DEFAULT NULL,
  `consTelefono3` varchar(100) DEFAULT NULL,
  `consUsuarioCreacion` varchar(100) DEFAULT NULL,
  `consUsuarioModificacion` varchar(100) DEFAULT NULL,
  `dirIdDireccion` int(11) DEFAULT NULL,
  `rplIdRepLegal` int(11) DEFAULT NULL,
  `activo` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`consIdConstructora`),
  KEY `consIdConstructora` (`consIdConstructora`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `constructora` */

insert  into `constructora`(`consIdConstructora`,`consEmail`,`consEstado`,`consFechaCreacion`,`consFechaModificacion`,`consNombreFantasia`,`consRazonSocial`,`consRut`,`consTelefono`,`consTelefono2`,`consTelefono3`,`consUsuarioCreacion`,`consUsuarioModificacion`,`dirIdDireccion`,`rplIdRepLegal`,`activo`) values (6,'carolinaveliz@salesland.net',NULL,NULL,NULL,'Salesland S.A','SALESLAND CHILE SPA','78234567-2','222333','222222','333333',NULL,NULL,NULL,NULL,'S'),(7,'aaaaaaaaasss',NULL,NULL,NULL,'aaaaaaaaaaaaa','wwwwwwwwww','22222222','22222',NULL,'9999',NULL,NULL,NULL,NULL,'S');

/*Table structure for table `contratista` */

DROP TABLE IF EXISTS `contratista`;

CREATE TABLE `contratista` (
  `ctrIdContratista` int(11) NOT NULL AUTO_INCREMENT,
  `ccatIdAfiliado` int(11) DEFAULT NULL,
  `ctrEmail` varchar(100) DEFAULT NULL,
  `ctrEmailExpertoMutualidad` varchar(100) DEFAULT NULL,
  `ctrEstado` varchar(100) DEFAULT NULL,
  `ctrFechaCreacion` date DEFAULT NULL,
  `ctrFechaModificacion` date DEFAULT NULL,
  `ctrFonoExpertoMutualidad` varchar(100) DEFAULT NULL,
  `ctrIdAfiliadoMutualidad` int(11) DEFAULT NULL,
  `ctrIdServicioContratado` int(11) DEFAULT NULL,
  `ctrIngresoFaena` date DEFAULT NULL,
  `ctrNombreExpertoMutualidad` varchar(100) DEFAULT NULL,
  `ctrNombreFantasia` varchar(100) DEFAULT NULL,
  `ctrNroActividadCab` varchar(100) DEFAULT NULL,
  `ctrNroActividadDet` varchar(100) DEFAULT NULL,
  `ctrRazonSocial` varchar(100) DEFAULT NULL,
  `ctrRut` varchar(100) DEFAULT NULL,
  `ctrTasaCotizacionActual` int(11) DEFAULT NULL,
  `ctrTasaCotizacionTotal` int(11) DEFAULT NULL,
  `ctrTasaGenerica` int(11) DEFAULT NULL,
  `ctrTelefono` varchar(100) DEFAULT NULL,
  `ctrTelefono2` varchar(100) DEFAULT NULL,
  `ctrTelefono3` varchar(100) DEFAULT NULL,
  `ctrUsuarioCreacion` varchar(100) DEFAULT NULL,
  `ctrUsuarioModificacion` varchar(100) DEFAULT NULL,
  `dirIdDirecion` int(11) DEFAULT NULL,
  `mutIdMutualidad` int(11) DEFAULT NULL,
  `rplIdRepLegal` int(11) DEFAULT NULL,
  `tjor_idTipoJornada` int(11) DEFAULT NULL,
  `consIdConstructora` int(11) DEFAULT NULL,
  `ctrDireccion` varchar(100) DEFAULT NULL,
  `activo` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`ctrIdContratista`),
  KEY `ctrIdContratista` (`ctrIdContratista`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `contratista` */

insert  into `contratista`(`ctrIdContratista`,`ccatIdAfiliado`,`ctrEmail`,`ctrEmailExpertoMutualidad`,`ctrEstado`,`ctrFechaCreacion`,`ctrFechaModificacion`,`ctrFonoExpertoMutualidad`,`ctrIdAfiliadoMutualidad`,`ctrIdServicioContratado`,`ctrIngresoFaena`,`ctrNombreExpertoMutualidad`,`ctrNombreFantasia`,`ctrNroActividadCab`,`ctrNroActividadDet`,`ctrRazonSocial`,`ctrRut`,`ctrTasaCotizacionActual`,`ctrTasaCotizacionTotal`,`ctrTasaGenerica`,`ctrTelefono`,`ctrTelefono2`,`ctrTelefono3`,`ctrUsuarioCreacion`,`ctrUsuarioModificacion`,`dirIdDirecion`,`mutIdMutualidad`,`rplIdRepLegal`,`tjor_idTipoJornada`,`consIdConstructora`,`ctrDireccion`,`activo`) values (9,NULL,'email1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Encargado 1','Irarrazaval',NULL,NULL,'Irarrazaval',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,'Direccion 1','S'),(10,NULL,'email2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Encargado 2','Irarrazaval 2',NULL,NULL,'Irarrazaval 2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,'Direccion 2','S'),(11,NULL,'correo de la agencia prueba 1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'encargado de la agencia prueba 1',NULL,NULL,NULL,'Agencia prueba 1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,'Direccion de la agencia prueba 1','N'),(12,NULL,'zzzzz',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'zzzzz',NULL,NULL,NULL,'zzzzz',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7,'zzzzz','N');

/*Table structure for table `direccion` */

DROP TABLE IF EXISTS `direccion`;

CREATE TABLE `direccion` (
  `dirIdDireccion` int(11) DEFAULT NULL,
  `ciuIdCiudad` int(11) DEFAULT NULL,
  `comIdComuna` int(11) DEFAULT NULL,
  `dirCalle` varchar(100) DEFAULT NULL,
  `dirDptov` varchar(100) DEFAULT NULL,
  `dirEstado` varchar(100) DEFAULT NULL,
  `dirFechaCreacion` date DEFAULT NULL,
  `dirFechaModificacion` date DEFAULT NULL,
  `dirNumero` varchar(100) DEFAULT NULL,
  `dirObservacion` varchar(100) DEFAULT NULL,
  `dirPiso` varchar(100) DEFAULT NULL,
  `dirUsuarioCreacion` varchar(100) DEFAULT NULL,
  `dirUsuarioModificacion` varchar(100) DEFAULT NULL,
  `paisId` int(11) DEFAULT NULL,
  `regIdRegion` int(11) DEFAULT NULL,
  `activo` varchar(1) DEFAULT NULL,
  `id_contratista` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `direccion` */

insert  into `direccion`(`dirIdDireccion`,`ciuIdCiudad`,`comIdComuna`,`dirCalle`,`dirDptov`,`dirEstado`,`dirFechaCreacion`,`dirFechaModificacion`,`dirNumero`,`dirObservacion`,`dirPiso`,`dirUsuarioCreacion`,`dirUsuarioModificacion`,`paisId`,`regIdRegion`,`activo`,`id_contratista`) values (1,0,1,'Monjitas','14','Santiago',NULL,NULL,'45654',NULL,'4',NULL,NULL,NULL,NULL,'S',1);

/*Table structure for table `documentos` */

DROP TABLE IF EXISTS `documentos`;

CREATE TABLE `documentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctFechaSubida` date DEFAULT NULL,
  `doctFechaPertenece` date DEFAULT NULL,
  `doctNombreArchivo` varchar(100) DEFAULT NULL,
  `doctNombreEncrip` varchar(100) DEFAULT NULL,
  `NombreOriginal` varchar(100) NOT NULL,
  `id_documentotrabajador` int(11) NOT NULL,
  `id_estado_documento` int(11) NOT NULL,
  `nota` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=106 DEFAULT CHARSET=utf8;

/*Data for the table `documentos` */

insert  into `documentos`(`id`,`doctFechaSubida`,`doctFechaPertenece`,`doctNombreArchivo`,`doctNombreEncrip`,`NombreOriginal`,`id_documentotrabajador`,`id_estado_documento`,`nota`) values (98,'2015-01-18','2015-01-18','enero','c4d3d0a16744783b8f6769d1ce1c405e_20150118214050.png','20141004.png',0,2,''),(99,'2015-01-18','2015-01-18','enero','9fa92848c1867c63b602768c361a688f_20150118214212.gif','l1.gif',0,2,''),(100,'2015-01-18','2015-01-18','enero','9fa92848c1867c63b602768c361a688f_20150118214308.gif','l1.gif',124,4,' revisar '),(101,'2015-01-18','2015-01-18','febrero','9fa92848c1867c63b602768c361a688f_20150118214400.gif','l1.gif',124,4,' mas notas del documento'),(102,'2015-01-19','2015-01-19','Contrato','2146199dca3a31db7177722420122d85_20150119151314.pdf','CONT FLORES.pdf',186,4,''),(103,'2015-01-19','2015-01-19','Diciembre','db30a9df35eff95b0a84a8363ee2691a_20150119151610.pdf','LIQ FLORES.pdf',187,4,''),(104,'2015-01-19','2015-01-19','enero','9fa92848c1867c63b602768c361a688f_20150119203707.gif','l1.gif',188,2,''),(105,'2015-01-20','2015-01-20','prueba','9fa92848c1867c63b602768c361a688f_20150120135905.gif','l1.gif',189,2,'');

/*Table structure for table `documentotrabajador` */

DROP TABLE IF EXISTS `documentotrabajador`;

CREATE TABLE `documentotrabajador` (
  `doctIdDocumento` int(11) NOT NULL AUTO_INCREMENT,
  `id_estado_documento` int(11) DEFAULT NULL,
  `doctIdTrabajador` int(11) DEFAULT NULL,
  `id_contratista` int(11) NOT NULL,
  `id_faena` int(11) DEFAULT NULL,
  `tpdIdTipoDocumento` int(11) DEFAULT NULL,
  `id_sub_tipodocumento` int(11) NOT NULL,
  PRIMARY KEY (`doctIdDocumento`)
) ENGINE=MyISAM AUTO_INCREMENT=190 DEFAULT CHARSET=utf8;

/*Data for the table `documentotrabajador` */

insert  into `documentotrabajador`(`doctIdDocumento`,`id_estado_documento`,`doctIdTrabajador`,`id_contratista`,`id_faena`,`tpdIdTipoDocumento`,`id_sub_tipodocumento`) values (189,2,33,10,NULL,1,19),(115,1,33,10,NULL,1,20),(116,1,33,10,NULL,1,21),(124,4,33,10,NULL,3,28),(118,1,33,10,NULL,3,29),(119,1,33,10,NULL,3,32),(120,1,33,10,NULL,5,40),(121,1,33,10,NULL,5,41),(122,1,33,10,NULL,5,42),(123,1,33,10,NULL,5,43),(125,2,33,10,NULL,3,28),(126,1,34,10,NULL,1,19),(127,1,34,10,NULL,1,20),(128,1,34,10,NULL,1,21),(129,1,34,10,NULL,3,28),(130,1,34,10,NULL,3,29),(131,1,34,10,NULL,3,32),(132,1,34,10,NULL,5,40),(133,1,34,10,NULL,5,41),(134,1,34,10,NULL,5,42),(135,1,34,10,NULL,5,43),(136,1,35,10,NULL,1,19),(137,1,35,10,NULL,1,20),(138,1,35,10,NULL,1,21),(139,1,35,10,NULL,3,28),(140,1,35,10,NULL,3,29),(141,1,35,10,NULL,3,32),(142,1,35,10,NULL,5,40),(143,1,35,10,NULL,5,41),(144,1,35,10,NULL,5,42),(145,1,35,10,NULL,5,43),(146,1,36,10,NULL,1,19),(147,1,36,10,NULL,1,20),(148,1,36,10,NULL,1,21),(149,1,36,10,NULL,3,28),(150,1,36,10,NULL,3,29),(151,1,36,10,NULL,3,32),(152,1,36,10,NULL,5,40),(153,1,36,10,NULL,5,41),(154,1,36,10,NULL,5,42),(155,1,36,10,NULL,5,43),(186,4,37,9,NULL,1,19),(157,1,37,9,NULL,1,20),(158,1,37,9,NULL,1,21),(187,4,37,9,NULL,3,28),(160,1,37,9,NULL,3,29),(161,1,37,9,NULL,3,32),(162,1,37,9,NULL,5,40),(163,1,37,9,NULL,5,41),(164,1,37,9,NULL,5,42),(165,1,37,9,NULL,5,43),(166,1,38,10,NULL,1,19),(167,1,38,10,NULL,1,20),(168,1,38,10,NULL,1,21),(169,1,38,10,NULL,3,28),(170,1,38,10,NULL,3,29),(171,1,38,10,NULL,3,32),(172,1,38,10,NULL,5,40),(173,1,38,10,NULL,5,41),(174,1,38,10,NULL,5,42),(175,1,38,10,NULL,5,43),(176,1,39,10,NULL,1,19),(177,1,39,10,NULL,1,20),(178,1,39,10,NULL,1,21),(179,1,39,10,NULL,3,28),(180,1,39,10,NULL,3,29),(181,1,39,10,NULL,3,32),(182,1,39,10,NULL,5,40),(183,1,39,10,NULL,5,41),(184,1,39,10,NULL,5,42),(185,1,39,10,NULL,5,43),(188,2,39,9,NULL,3,28);

/*Table structure for table `estado_documento` */

DROP TABLE IF EXISTS `estado_documento`;

CREATE TABLE `estado_documento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(300) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `estado_documento` */

insert  into `estado_documento`(`id`,`descripcion`) values (1,'Sin subir'),(2,'Subido sin revisar'),(3,'Rechazado'),(4,'Aprobado'),(5,'Opcional');

/*Table structure for table `estadodocumentos` */

DROP TABLE IF EXISTS `estadodocumentos`;

CREATE TABLE `estadodocumentos` (
  `idEstadoDocumento` int(11) NOT NULL AUTO_INCREMENT,
  `estadoDocumento` varchar(50) DEFAULT NULL,
  KEY `idEstadoDocumento` (`idEstadoDocumento`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `estadodocumentos` */

insert  into `estadodocumentos`(`idEstadoDocumento`,`estadoDocumento`) values (1,'Sin Subir'),(2,'Subido Sin Revisar'),(3,'Rechazado'),(4,'Aprobado'),(5,'Opcional');

/*Table structure for table `faena` */

DROP TABLE IF EXISTS `faena`;

CREATE TABLE `faena` (
  `faeIdFaenas` int(11) NOT NULL AUTO_INCREMENT,
  `consIdConstructora` int(11) DEFAULT NULL,
  `dirIdDireccion` int(11) DEFAULT NULL,
  `faeEstado` varchar(100) DEFAULT NULL,
  `faeFechaCreacion` date DEFAULT NULL,
  `faeFechaInicio` date DEFAULT NULL,
  `faeFechaTermino` date DEFAULT NULL,
  `faeIdFaenaPadre` int(11) DEFAULT NULL,
  `faeNombre` varchar(100) DEFAULT NULL,
  `faeResponsable` varchar(100) DEFAULT NULL,
  `faeTelefono` varchar(100) DEFAULT NULL,
  `activo` varchar(1) DEFAULT NULL,
  KEY `faeIdFaenas` (`faeIdFaenas`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `faena` */

/*Table structure for table `faenasxcontratista` */

DROP TABLE IF EXISTS `faenasxcontratista`;

CREATE TABLE `faenasxcontratista` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fxcIdContratistaPadre` int(11) DEFAULT NULL,
  `id_faena` int(11) NOT NULL,
  `fxcEstado` varchar(10) DEFAULT NULL,
  `bloqueada` int(11) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `faenasxcontratista` */

/*Table structure for table `isapre` */

DROP TABLE IF EXISTS `isapre`;

CREATE TABLE `isapre` (
  `isaIdIsapre` int(11) NOT NULL AUTO_INCREMENT,
  `isaIsapre` varchar(100) DEFAULT NULL,
  `activo` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`isaIdIsapre`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `isapre` */

insert  into `isapre`(`isaIdIsapre`,`isaIsapre`,`activo`) values (1,'CRUANCA','S'),(2,'CONSALUD','S');

/*Table structure for table `isapre_pacto` */

DROP TABLE IF EXISTS `isapre_pacto`;

CREATE TABLE `isapre_pacto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(300) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `isapre_pacto` */

insert  into `isapre_pacto`(`id`,`descripcion`) values (1,'UF'),(2,'PESOS'),(3,'USD');

/*Table structure for table `mailnews` */

DROP TABLE IF EXISTS `mailnews`;

CREATE TABLE `mailnews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(300) NOT NULL,
  `activo` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `mailnews` */

/*Table structure for table `mutual` */

DROP TABLE IF EXISTS `mutual`;

CREATE TABLE `mutual` (
  `mutIdMutualidad` int(11) DEFAULT NULL,
  `mutEstado` varchar(10) DEFAULT NULL,
  `mutFechaCreacion` date DEFAULT NULL,
  `mutFechaModificacion` date DEFAULT NULL,
  `mutNombre` varchar(100) DEFAULT NULL,
  `mutUsuarioCreacion` varchar(100) DEFAULT NULL,
  `mutUsuarioModifiacion` varchar(100) DEFAULT NULL,
  `activo` varchar(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `mutual` */

/*Table structure for table `perfil` */

DROP TABLE IF EXISTS `perfil`;

CREATE TABLE `perfil` (
  `perfIdPerfil` int(11) DEFAULT NULL,
  `perfDescripcion` varchar(100) DEFAULT NULL,
  `perfFechaCreacion` date DEFAULT NULL,
  `perfFechaModificacion` date DEFAULT NULL,
  `perfNombrePerfil` varchar(100) DEFAULT NULL,
  `perfUsuarioCreacion` varchar(100) DEFAULT NULL,
  `perfUsuarioModificacion` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `perfil` */

/*Table structure for table `regiones` */

DROP TABLE IF EXISTS `regiones`;

CREATE TABLE `regiones` (
  `idRegion` int(11) NOT NULL AUTO_INCREMENT,
  `region` varchar(100) NOT NULL,
  `activo` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`idRegion`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `regiones` */

insert  into `regiones`(`idRegion`,`region`,`activo`) values (1,'1 Region','S'),(2,'2 Region','S'),(3,'3 Region','S'),(4,'Region Metropolitana','S');

/*Table structure for table `representantelegal` */

DROP TABLE IF EXISTS `representantelegal`;

CREATE TABLE `representantelegal` (
  `rplIdRepLegal` int(11) DEFAULT NULL,
  `dirIdDireccion` int(11) DEFAULT NULL,
  `rplApellidoMaterno` varchar(100) DEFAULT NULL,
  `rplApellidoPaterno` varchar(100) DEFAULT NULL,
  `rplEmail` varchar(100) DEFAULT NULL,
  `rplEstado` varchar(100) DEFAULT NULL,
  `rplFechaCreacion` date DEFAULT NULL,
  `rplFechaModificacion` date DEFAULT NULL,
  `rplNombre` varchar(100) DEFAULT NULL,
  `rplRut` varchar(100) DEFAULT NULL,
  `rplTelefono` varchar(100) DEFAULT NULL,
  `rplUsuarioCreacion` varchar(100) DEFAULT NULL,
  `rplUsuarioModifcacion` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `representantelegal` */

/*Table structure for table `si_usuario_rol` */

DROP TABLE IF EXISTS `si_usuario_rol`;

CREATE TABLE `si_usuario_rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` varchar(20) NOT NULL,
  `id_rol` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `si_usuario_rol` */

insert  into `si_usuario_rol`(`id`,`id_usuario`,`id_rol`) values (1,'admin',1),(2,'nuevo',1);

/*Table structure for table `sub_tipodocumento` */

DROP TABLE IF EXISTS `sub_tipodocumento`;

CREATE TABLE `sub_tipodocumento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orden` int(11) DEFAULT NULL,
  `id_tipodocumento` int(11) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `opcional` varchar(1) DEFAULT NULL,
  `activo` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

/*Data for the table `sub_tipodocumento` */

insert  into `sub_tipodocumento`(`id`,`orden`,`id_tipodocumento`,`descripcion`,`opcional`,`activo`) values (19,1,1,'Contrato y Anexo de renovacion','','S'),(20,2,1,'Carta de Aviso','S','S'),(21,3,1,'Finiquito','S','S'),(22,4,1,'Plan de emergencia','',NULL),(23,5,1,'Comite Paritario Higiene y Seguridad',NULL,NULL),(24,6,1,'Registro de Conocimiento de Trabajadores',NULL,NULL),(25,7,2,'Ingreso de informacion de trabajadores',NULL,NULL),(26,8,2,'Contrataciones',NULL,NULL),(27,9,2,'Desvinculaciones',NULL,NULL),(28,10,3,'Ingreso de Liquidacion',NULL,'S'),(29,11,3,'Copia Libro de Remuneraciones',NULL,'S'),(30,12,3,'Libro Asistencias',NULL,NULL),(31,13,3,'Pacto Horas Extraordinarias',NULL,NULL),(32,14,3,'Licencia',NULL,'S'),(33,15,3,'Descuentos realizados',NULL,NULL),(34,16,3,'Autorizacion Firmada',NULL,NULL),(35,17,3,'Acreditacion de pago',NULL,NULL),(36,18,4,'Formulario F30',NULL,NULL),(37,19,4,'Formulario F30-1',NULL,NULL),(38,20,4,'Notificacion de Contratista',NULL,NULL),(39,21,4,'Formulario F43',NULL,NULL),(40,22,5,'AFP',NULL,'S'),(41,23,5,'Isapre / Fonasa',NULL,'S'),(42,24,5,'CCAF',NULL,'S'),(43,25,5,'Mutual',NULL,'S'),(44,26,6,'ODI 1',NULL,'S'),(45,27,6,'ODI 2',NULL,'S'),(46,28,7,'RIOHS 1',NULL,'S'),(47,29,7,'RIOHS 2',NULL,'S');

/*Table structure for table `supervisores` */

DROP TABLE IF EXISTS `supervisores`;

CREATE TABLE `supervisores` (
  `idSupervisor` int(11) NOT NULL AUTO_INCREMENT,
  `supNombre` varchar(100) DEFAULT NULL,
  `supRUT` varchar(20) DEFAULT NULL,
  `activo` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`idSupervisor`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `supervisores` */

insert  into `supervisores`(`idSupervisor`,`supNombre`,`supRUT`,`activo`) values (1,'Cecilia Ortiz',NULL,'S'),(2,'Cecilia Vergara',NULL,'S'),(3,'Javier Artero',NULL,'S'),(4,'Ivan Lazcano',NULL,'S');

/*Table structure for table `tipodocumento` */

DROP TABLE IF EXISTS `tipodocumento`;

CREATE TABLE `tipodocumento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(300) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `tpdEstado` varchar(10) DEFAULT NULL,
  `tpdModuloPertenece` varchar(100) DEFAULT NULL,
  `tpd_nombreTipoDoc` varchar(100) DEFAULT NULL,
  `prevencion` varchar(1) DEFAULT NULL,
  `activo` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `tipodocumento` */

insert  into `tipodocumento`(`id`,`descripcion`,`tpdEstado`,`tpdModuloPertenece`,`tpd_nombreTipoDoc`,`prevencion`,`activo`) values (1,'Inf. & Coord. Emp.',NULL,NULL,NULL,NULL,'S'),(2,'Antecedentes Laborales',NULL,NULL,NULL,NULL,NULL),(3,'Remuneraciones',NULL,NULL,NULL,NULL,'S'),(4,'Certif. Contratista',NULL,NULL,NULL,NULL,NULL),(5,'Planilla de Pagos',NULL,NULL,NULL,NULL,'S'),(6,'ODI',NULL,NULL,NULL,'S','S'),(7,'RIOHS',NULL,NULL,NULL,'S','S');

/*Table structure for table `trabajador` */

DROP TABLE IF EXISTS `trabajador`;

CREATE TABLE `trabajador` (
  `trbIdTrabajador` int(11) NOT NULL AUTO_INCREMENT,
  `afpIdAfp` int(11) DEFAULT NULL,
  `comIdComuna` int(11) DEFAULT NULL,
  `ctrIdContratista` int(11) DEFAULT NULL,
  `dirIdDireccion` int(11) DEFAULT NULL,
  `trbPactoIsapre` varchar(100) DEFAULT NULL,
  `isaIdIsapre` int(11) DEFAULT NULL,
  `nacionalidad` varchar(100) DEFAULT NULL,
  `nacIdNacionalidad` int(11) DEFAULT NULL,
  `tgrlIdCargoContractual` int(11) DEFAULT NULL,
  `tgrlIdOficioCab` int(11) DEFAULT NULL,
  `tgrlIdOficioDet` int(11) DEFAULT NULL,
  `tgrlIdTipoContrato` int(11) DEFAULT NULL,
  `tjorIdTipoJornada` int(11) DEFAULT NULL,
  `trbAfectoArt22` varchar(100) DEFAULT NULL,
  `trbAntiguedadMeses` int(11) DEFAULT NULL,
  `trbApMaterno` varchar(100) DEFAULT NULL,
  `trbApPaterno` varchar(100) DEFAULT NULL,
  `trbCeco` varchar(100) DEFAULT NULL,
  `trbDireccion` varchar(100) DEFAULT NULL,
  `idRegion` int(11) DEFAULT NULL,
  `idCiudad` int(11) DEFAULT NULL,
  `idComuna` int(11) DEFAULT NULL,
  `trbEstado` varchar(100) DEFAULT NULL,
  `trbFechaDesvinculado` date DEFAULT NULL,
  `trbFechaContrato` date DEFAULT NULL,
  `trbFechaCreacion` date DEFAULT NULL,
  `trbFechaModificacion` date DEFAULT NULL,
  `trbFechaNac` date DEFAULT NULL,
  `trbHorasSemanales` int(11) DEFAULT NULL,
  `trbIngresoObraFecha` date DEFAULT NULL,
  `trbNombre` varchar(100) DEFAULT NULL,
  `trbPensionado` varchar(100) DEFAULT NULL,
  `trbPerteneceSindicato` varchar(100) DEFAULT NULL,
  `trbRut` varchar(100) DEFAULT NULL,
  `trbRutJefe` varchar(100) DEFAULT NULL,
  `trbSeguroCesantia` varchar(100) DEFAULT NULL,
  `trbSexo` varchar(100) DEFAULT NULL,
  `trbTelefono` varchar(100) DEFAULT NULL,
  `trbTitulo` varchar(100) DEFAULT NULL,
  `trbUsuarioCreacion` varchar(100) DEFAULT NULL,
  `trbUsuarioModificacion` varchar(100) DEFAULT NULL,
  `trbVisa` varchar(100) DEFAULT NULL,
  `idSupervisor` int(11) DEFAULT NULL,
  `activo` char(1) DEFAULT NULL,
  KEY `trbIdTrabajador` (`trbIdTrabajador`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

/*Data for the table `trabajador` */

insert  into `trabajador`(`trbIdTrabajador`,`afpIdAfp`,`comIdComuna`,`ctrIdContratista`,`dirIdDireccion`,`trbPactoIsapre`,`isaIdIsapre`,`nacionalidad`,`nacIdNacionalidad`,`tgrlIdCargoContractual`,`tgrlIdOficioCab`,`tgrlIdOficioDet`,`tgrlIdTipoContrato`,`tjorIdTipoJornada`,`trbAfectoArt22`,`trbAntiguedadMeses`,`trbApMaterno`,`trbApPaterno`,`trbCeco`,`trbDireccion`,`idRegion`,`idCiudad`,`idComuna`,`trbEstado`,`trbFechaDesvinculado`,`trbFechaContrato`,`trbFechaCreacion`,`trbFechaModificacion`,`trbFechaNac`,`trbHorasSemanales`,`trbIngresoObraFecha`,`trbNombre`,`trbPensionado`,`trbPerteneceSindicato`,`trbRut`,`trbRutJefe`,`trbSeguroCesantia`,`trbSexo`,`trbTelefono`,`trbTitulo`,`trbUsuarioCreacion`,`trbUsuarioModificacion`,`trbVisa`,`idSupervisor`,`activo`) values (33,1,NULL,9,NULL,'2',2,'argentina',NULL,1,NULL,NULL,NULL,NULL,'1',NULL,'materno 1','paterno 1',NULL,'direccion 1',NULL,NULL,NULL,NULL,NULL,'2010-01-23',NULL,NULL,'0000-00-00',NULL,NULL,'nombre 1','1',NULL,'228214302',NULL,'1','1','22222',NULL,NULL,NULL,NULL,1,'S'),(34,2,NULL,10,NULL,'1',2,'chilena',NULL,1,NULL,NULL,NULL,NULL,'2',NULL,'VELIZ','LOPEZ',NULL,'filipo 4411',NULL,NULL,NULL,NULL,NULL,'1989-03-06',NULL,NULL,'0000-00-00',NULL,NULL,'CAROLINA','Habitat',NULL,'17029678-8',NULL,'Habitat','2','61217976',NULL,NULL,NULL,NULL,1,'S'),(35,2,NULL,10,NULL,'1',2,'CHILENO',NULL,1,NULL,NULL,NULL,NULL,'1',NULL,'CARREÑO ','GONZALEZ',NULL,'leonora la torre #1201',NULL,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,'0000-00-00',NULL,NULL,'ALEX ROBERTO ','Habitat',NULL,'7680734-5',NULL,'Habitat','1','91730371',NULL,NULL,NULL,NULL,2,'S'),(36,2,NULL,10,NULL,'2',2,'CHILENO',NULL,1,NULL,NULL,NULL,NULL,'1',NULL,'ABELLO','JARA',NULL,'LAS ALMERIAS #1142 VILLA MONSEÑOR LARRAIN',NULL,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,'0000-00-00',NULL,NULL,'DAMILTON WALDEMAR ','Habitat',NULL,'8842759-9',NULL,'Habitat','1','94511503',NULL,NULL,NULL,NULL,2,'S'),(37,2,NULL,10,NULL,'1',2,'CHILENO',NULL,1,NULL,NULL,NULL,NULL,'1',NULL,'FLORES','RUIZ',NULL,'PUERTO VARAS 158',NULL,NULL,NULL,NULL,NULL,'2014-09-01',NULL,NULL,'0000-00-00',NULL,NULL,'MIGUEL DANILO','Habitat',NULL,'14792452-6',NULL,'Habitat','1','87342295',NULL,NULL,NULL,NULL,2,'S'),(38,1,NULL,10,NULL,'1',2,'CHILENA',NULL,1,NULL,NULL,NULL,NULL,'1',NULL,'BAQUEDANO','VILLA',NULL,'PARROCO ALFONSO ALVARADO #2831',NULL,NULL,NULL,NULL,NULL,'2013-07-01',NULL,NULL,'0000-00-00',NULL,NULL,'SOLANGE DEL CARMEN ','CUPRUM',NULL,'18241529-4',NULL,'CUPRUM','2',NULL,NULL,NULL,NULL,NULL,2,'S'),(39,2,NULL,10,NULL,'1',2,'CHILENO',NULL,1,NULL,NULL,NULL,NULL,'1',NULL,'CAMPOS','CUEVAS',NULL,'PEDRO TORRES #460 DEPTO 204-B',NULL,NULL,NULL,NULL,NULL,'2013-07-01',NULL,NULL,'0000-00-00',NULL,NULL,'VICTOR MANUEL ','1',NULL,'11.794.449-2',NULL,'1','1','96340729',NULL,NULL,NULL,NULL,NULL,'S');

/*Table structure for table `trabajadorxfaena` */

DROP TABLE IF EXISTS `trabajadorxfaena`;

CREATE TABLE `trabajadorxfaena` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `txf_id_trabajador` int(11) DEFAULT NULL,
  `txf_id_faena` int(11) DEFAULT NULL,
  `txfEstado` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `trabajadorxfaena` */

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `usrIdUsuario` int(11) DEFAULT NULL,
  `usrApellido` varchar(100) DEFAULT NULL,
  `usrEmail` varchar(100) DEFAULT NULL,
  `usrFechaCreacion` date DEFAULT NULL,
  `usrFechaModificacion` date DEFAULT NULL,
  `usrLogin` varchar(100) DEFAULT NULL,
  `usrNombre` varchar(100) DEFAULT NULL,
  `usrPassword` varchar(100) DEFAULT NULL,
  `usrRut` varchar(100) DEFAULT NULL,
  `usrUsuarioCreacion` varchar(100) DEFAULT NULL,
  `usrUsuarioModificacion` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `usuario` */

/*Table structure for table `usuarioperfil` */

DROP TABLE IF EXISTS `usuarioperfil`;

CREATE TABLE `usuarioperfil` (
  `usrIdUsuario` int(11) DEFAULT NULL,
  `perfIdPerfil` int(11) DEFAULT NULL,
  `usrpIdRelacion` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `usuarioperfil` */

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` varchar(50) DEFAULT NULL,
  `clave` varchar(50) DEFAULT NULL,
  `nom_usuario` varchar(50) DEFAULT NULL,
  `ape_usuario` varchar(50) DEFAULT NULL,
  `activo` char(1) DEFAULT NULL,
  `fec_alta` datetime DEFAULT NULL,
  `tipo_usuario` char(1) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_agencia` int(11) DEFAULT NULL,
  KEY `ix_Usuarios_autoinc` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id`,`id_usuario`,`clave`,`nom_usuario`,`ape_usuario`,`activo`,`fec_alta`,`tipo_usuario`,`id_empresa`,`id_agencia`) values (1,'admin','admin','nombre administrador','apellido administrador','S','2012-11-27 00:00:00','',0,NULL),(3,'nuevo','nuevo','nombre nuevo','apellido nuevo','S','2014-02-16 00:00:00','E',6,10);

/*Table structure for table `estado_documentos_t1` */

DROP TABLE IF EXISTS `estado_documentos_t1`;

/*!50001 DROP VIEW IF EXISTS `estado_documentos_t1` */;
/*!50001 DROP TABLE IF EXISTS `estado_documentos_t1` */;

/*!50001 CREATE TABLE  `estado_documentos_t1`(
 `ctrIdContratista` int(11) ,
 `ctrRazonSocial` varchar(100) ,
 `ctrRut` varchar(100) ,
 `ctrNombreFantasia` varchar(100) ,
 `estado` int(11) 
)*/;

/*Table structure for table `estado_documentos_t2` */

DROP TABLE IF EXISTS `estado_documentos_t2`;

/*!50001 DROP VIEW IF EXISTS `estado_documentos_t2` */;
/*!50001 DROP TABLE IF EXISTS `estado_documentos_t2` */;

/*!50001 CREATE TABLE  `estado_documentos_t2`(
 `ctrIdContratista` int(11) ,
 `ctrRazonSocial` varchar(100) ,
 `ctrRut` varchar(100) ,
 `ctrNombreFantasia` varchar(100) ,
 `estado` int(11) 
)*/;

/*Table structure for table `estado_documentos_t3` */

DROP TABLE IF EXISTS `estado_documentos_t3`;

/*!50001 DROP VIEW IF EXISTS `estado_documentos_t3` */;
/*!50001 DROP TABLE IF EXISTS `estado_documentos_t3` */;

/*!50001 CREATE TABLE  `estado_documentos_t3`(
 `ctrIdContratista` int(11) ,
 `ctrRazonSocial` varchar(100) ,
 `ctrRut` varchar(100) ,
 `ctrNombreFantasia` varchar(100) ,
 `estado` int(11) 
)*/;

/*Table structure for table `estado_documentos_t4` */

DROP TABLE IF EXISTS `estado_documentos_t4`;

/*!50001 DROP VIEW IF EXISTS `estado_documentos_t4` */;
/*!50001 DROP TABLE IF EXISTS `estado_documentos_t4` */;

/*!50001 CREATE TABLE  `estado_documentos_t4`(
 `ctrIdContratista` int(11) ,
 `ctrRazonSocial` varchar(100) ,
 `ctrRut` varchar(100) ,
 `ctrNombreFantasia` varchar(100) ,
 `estado` int(11) 
)*/;

/*View structure for view estado_documentos_t1 */

/*!50001 DROP TABLE IF EXISTS `estado_documentos_t1` */;
/*!50001 DROP VIEW IF EXISTS `estado_documentos_t1` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `estado_documentos_t1` AS (select `c`.`ctrIdContratista` AS `ctrIdContratista`,`c`.`ctrRazonSocial` AS `ctrRazonSocial`,`c`.`ctrRut` AS `ctrRut`,`c`.`ctrNombreFantasia` AS `ctrNombreFantasia`,min(`dt`.`id_estado_documento`) AS `estado` from ((`contratista` `c` left join `documentotrabajador` `dt` on((`c`.`ctrIdContratista` = `dt`.`id_contratista`))) join `documentos` `d`) where ((`dt`.`doctIdDocumento` = `d`.`id_documentotrabajador`) and (`dt`.`tpdIdTipoDocumento` = 1) and (`c`.`activo` = 'S')) group by `c`.`ctrIdContratista`,`c`.`ctrRazonSocial`,`c`.`ctrRut`,`c`.`ctrNombreFantasia`) */;

/*View structure for view estado_documentos_t2 */

/*!50001 DROP TABLE IF EXISTS `estado_documentos_t2` */;
/*!50001 DROP VIEW IF EXISTS `estado_documentos_t2` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `estado_documentos_t2` AS (select `c`.`ctrIdContratista` AS `ctrIdContratista`,`c`.`ctrRazonSocial` AS `ctrRazonSocial`,`c`.`ctrRut` AS `ctrRut`,`c`.`ctrNombreFantasia` AS `ctrNombreFantasia`,min(`dt`.`id_estado_documento`) AS `estado` from ((`contratista` `c` left join `documentotrabajador` `dt` on((`c`.`ctrIdContratista` = `dt`.`id_contratista`))) join `documentos` `d`) where ((`dt`.`doctIdDocumento` = `d`.`id_documentotrabajador`) and (`dt`.`tpdIdTipoDocumento` = 2) and (`c`.`activo` = 'S')) group by `c`.`ctrIdContratista`,`c`.`ctrRazonSocial`,`c`.`ctrRut`,`c`.`ctrNombreFantasia`) */;

/*View structure for view estado_documentos_t3 */

/*!50001 DROP TABLE IF EXISTS `estado_documentos_t3` */;
/*!50001 DROP VIEW IF EXISTS `estado_documentos_t3` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `estado_documentos_t3` AS (select `c`.`ctrIdContratista` AS `ctrIdContratista`,`c`.`ctrRazonSocial` AS `ctrRazonSocial`,`c`.`ctrRut` AS `ctrRut`,`c`.`ctrNombreFantasia` AS `ctrNombreFantasia`,min(`dt`.`id_estado_documento`) AS `estado` from ((`contratista` `c` left join `documentotrabajador` `dt` on((`c`.`ctrIdContratista` = `dt`.`id_contratista`))) join `documentos` `d`) where ((`dt`.`doctIdDocumento` = `d`.`id_documentotrabajador`) and (`dt`.`tpdIdTipoDocumento` = 3) and (`c`.`activo` = 'S')) group by `c`.`ctrIdContratista`,`c`.`ctrRazonSocial`,`c`.`ctrRut`,`c`.`ctrNombreFantasia`) */;

/*View structure for view estado_documentos_t4 */

/*!50001 DROP TABLE IF EXISTS `estado_documentos_t4` */;
/*!50001 DROP VIEW IF EXISTS `estado_documentos_t4` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `estado_documentos_t4` AS (select `c`.`ctrIdContratista` AS `ctrIdContratista`,`c`.`ctrRazonSocial` AS `ctrRazonSocial`,`c`.`ctrRut` AS `ctrRut`,`c`.`ctrNombreFantasia` AS `ctrNombreFantasia`,min(`dt`.`id_estado_documento`) AS `estado` from ((`contratista` `c` left join `documentotrabajador` `dt` on((`c`.`ctrIdContratista` = `dt`.`id_contratista`))) join `documentos` `d`) where ((`dt`.`doctIdDocumento` = `d`.`id_documentotrabajador`) and (`dt`.`tpdIdTipoDocumento` = 4) and (`c`.`activo` = 'S')) group by `c`.`ctrIdContratista`,`c`.`ctrRazonSocial`,`c`.`ctrRut`,`c`.`ctrNombreFantasia`) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
