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
  `afpEstado` varchar(10) DEFAULT NULL,
  `afpFechaCreacion` date DEFAULT NULL,
  `afpFechaModificacion` date DEFAULT NULL,
  `afpNombre` varchar(100) DEFAULT NULL,
  `afpUsuarioCreacion` varchar(100) DEFAULT NULL,
  `afpUsuarioModificacion` varchar(100) DEFAULT NULL,
  `activo` varchar(1) DEFAULT NULL,
  KEY `afpIdAfp` (`afpIdAfp`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `afp` */

insert  into `afp`(`afpIdAfp`,`afpEstado`,`afpFechaCreacion`,`afpFechaModificacion`,`afpNombre`,`afpUsuarioCreacion`,`afpUsuarioModificacion`,`activo`) values (1,'activo',NULL,NULL,'CUPRUM',NULL,NULL,'S'),(2,'activo',NULL,NULL,'Habitat',NULL,NULL,'S');

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
  KEY `consIdConstructora` (`consIdConstructora`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `constructora` */

insert  into `constructora`(`consIdConstructora`,`consEmail`,`consEstado`,`consFechaCreacion`,`consFechaModificacion`,`consNombreFantasia`,`consRazonSocial`,`consRut`,`consTelefono`,`consTelefono2`,`consTelefono3`,`consUsuarioCreacion`,`consUsuarioModificacion`,`dirIdDireccion`,`rplIdRepLegal`,`activo`) values (1,'lucas.charles@mail.cl','Habilitada','2014-10-15',NULL,'La constructora','Constructora Ltda','123456789','22226676',NULL,NULL,NULL,NULL,NULL,1,'S'),(2,'lala@la.cl',NULL,NULL,NULL,'Const 007','La constructora SA','1212121','222333','333333','444',NULL,NULL,NULL,NULL,'S');

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
  `activo` varchar(1) DEFAULT NULL,
  KEY `ctrIdContratista` (`ctrIdContratista`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `contratista` */

insert  into `contratista`(`ctrIdContratista`,`ccatIdAfiliado`,`ctrEmail`,`ctrEmailExpertoMutualidad`,`ctrEstado`,`ctrFechaCreacion`,`ctrFechaModificacion`,`ctrFonoExpertoMutualidad`,`ctrIdAfiliadoMutualidad`,`ctrIdServicioContratado`,`ctrIngresoFaena`,`ctrNombreExpertoMutualidad`,`ctrNombreFantasia`,`ctrNroActividadCab`,`ctrNroActividadDet`,`ctrRazonSocial`,`ctrRut`,`ctrTasaCotizacionActual`,`ctrTasaCotizacionTotal`,`ctrTasaGenerica`,`ctrTelefono`,`ctrTelefono2`,`ctrTelefono3`,`ctrUsuarioCreacion`,`ctrUsuarioModificacion`,`dirIdDirecion`,`mutIdMutualidad`,`rplIdRepLegal`,`tjor_idTipoJornada`,`activo`) values (1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Contratista 1',NULL,NULL,'Razon Social','22222',NULL,NULL,NULL,'5465464645',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'S'),(4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Contratista 4',NULL,NULL,'Contratista 1','22821450-3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'S'),(5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Contratista 5',NULL,NULL,'Contratista 2 Ltda.','23456789-0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'S');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;

/*Data for the table `documentos` */

insert  into `documentos`(`id`,`doctFechaSubida`,`doctFechaPertenece`,`doctNombreArchivo`,`doctNombreEncrip`,`NombreOriginal`,`id_documentotrabajador`,`id_estado_documento`) values (43,'2014-11-26','2014-11-26','liquidacion_enero','46f5b113b7709faf5c4d2382e97fd57c_20141126104549.pdf','228214302.pdf',43,2),(44,'2014-11-26','2014-11-26','liquidacion_febrero','46f5b113b7709faf5c4d2382e97fd57c_20141126105233.pdf','228214302.pdf',43,2),(45,'2014-11-26','2014-11-26','liquidacion_febrero','46f5b113b7709faf5c4d2382e97fd57c_20141126105648.pdf','228214302.pdf',43,2),(46,'2014-11-26','2014-11-26','afp_enero','46f5b113b7709faf5c4d2382e97fd57c_20141126110725.pdf','228214302.pdf',46,2),(51,'2014-11-28','2014-11-28','contrato','46f5b113b7709faf5c4d2382e97fd57c_20141128115236.pdf','228214302.pdf',47,2),(88,'2014-12-12','2014-12-12','pago 2','46f5b113b7709faf5c4d2382e97fd57c_20141212103752.pdf','228214302.pdf',82,2),(89,'2014-12-12','2014-12-12','pago 2','46f5b113b7709faf5c4d2382e97fd57c_20141212150902.pdf','228214302.pdf',82,2),(90,'2014-12-15','2014-12-15','','46f5b113b7709faf5c4d2382e97fd57c_20141215155230.pdf','228214302.pdf',89,2),(91,'2014-12-15','2014-12-15','','46f5b113b7709faf5c4d2382e97fd57c_20141215170142.pdf','228214302.pdf',100,2),(92,'2014-12-27','2014-12-27','','46f5b113b7709faf5c4d2382e97fd57c_20141227215954.pdf','228214302.pdf',101,2),(93,'2015-01-02','2015-01-02','','46f5b113b7709faf5c4d2382e97fd57c_20150102105158.pdf','228214302.pdf',102,2),(94,'2015-01-02','2015-01-02','','46f5b113b7709faf5c4d2382e97fd57c_20150102150143.pdf','228214302.pdf',103,2),(95,'2015-01-02','2015-01-02','','46f5b113b7709faf5c4d2382e97fd57c_20150102155411.pdf','228214302.pdf',104,2),(96,'2015-01-02','2015-01-02','Marzo','46f5b113b7709faf5c4d2382e97fd57c_20150102232319.pdf','228214302.pdf',102,2),(97,'2015-01-02','2015-01-02','registro_conocimiento','46f5b113b7709faf5c4d2382e97fd57c_20150102232359.pdf','228214302.pdf',106,2);

/*Table structure for table `documentotrabajador` */

DROP TABLE IF EXISTS `documentotrabajador`;

CREATE TABLE `documentotrabajador` (
  `doctIdDocumento` int(11) NOT NULL AUTO_INCREMENT,
  `id_estado_documento` int(11) DEFAULT NULL,
  `doctIdTrabajador` int(11) DEFAULT NULL,
  `id_contratista` int(11) NOT NULL,
  `id_faena` int(11) NOT NULL,
  `tpdIdTipoDocumento` int(11) DEFAULT NULL,
  `id_sub_tipodocumento` int(11) NOT NULL,
  PRIMARY KEY (`doctIdDocumento`)
) ENGINE=MyISAM AUTO_INCREMENT=107 DEFAULT CHARSET=utf8;

/*Data for the table `documentotrabajador` */

insert  into `documentotrabajador`(`doctIdDocumento`,`id_estado_documento`,`doctIdTrabajador`,`id_contratista`,`id_faena`,`tpdIdTipoDocumento`,`id_sub_tipodocumento`) values (103,2,24,1,1,1,20),(102,2,24,1,1,3,28),(101,2,24,1,1,1,19),(100,2,24,1,1,3,35),(73,1,24,1,1,1,19),(74,1,24,1,1,1,20),(75,1,24,1,1,1,21),(76,1,24,1,1,1,22),(77,1,24,1,1,1,23),(106,2,24,1,1,1,24),(79,1,24,1,1,2,25),(80,1,24,1,1,2,26),(81,1,24,1,1,2,27),(105,2,24,1,1,3,28),(83,1,24,1,1,3,29),(84,1,24,1,1,3,30),(85,1,24,1,1,3,31),(86,1,24,1,1,3,32),(87,1,24,1,1,3,33),(88,1,24,1,1,3,34),(89,4,24,1,1,3,35),(90,1,24,1,1,4,36),(91,1,24,1,1,4,37),(92,1,24,1,1,4,38),(93,1,24,1,1,4,39),(94,1,24,1,1,5,40),(104,2,24,1,1,5,41),(96,1,24,1,1,5,42),(97,1,24,1,1,5,43),(98,1,24,1,1,2,28),(99,1,24,1,1,2,28);

/*Table structure for table `estado_documento` */

DROP TABLE IF EXISTS `estado_documento`;

CREATE TABLE `estado_documento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(300) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `estado_documento` */

insert  into `estado_documento`(`id`,`descripcion`) values (1,'Sin subir'),(2,'Subido sin revisar'),(3,'Rechazado'),(4,'Aprobado');

/*Table structure for table `estadodocumentos` */

DROP TABLE IF EXISTS `estadodocumentos`;

CREATE TABLE `estadodocumentos` (
  `idEstadoDocumento` int(11) NOT NULL AUTO_INCREMENT,
  `estadoDocumento` varchar(50) DEFAULT NULL,
  KEY `idEstadoDocumento` (`idEstadoDocumento`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `estadodocumentos` */

insert  into `estadodocumentos`(`idEstadoDocumento`,`estadoDocumento`) values (1,'Sin Subir'),(2,'Subido Sin Revisar'),(3,'Rechazado'),(4,'Aprobado');

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

insert  into `faena`(`faeIdFaenas`,`consIdConstructora`,`dirIdDireccion`,`faeEstado`,`faeFechaCreacion`,`faeFechaInicio`,`faeFechaTermino`,`faeIdFaenaPadre`,`faeNombre`,`faeResponsable`,`faeTelefono`,`activo`) values (1,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,'faena 1','responsable','22222','S'),(2,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,'faena 2','qqweqw','2323','S'),(3,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,'faena 3','res','22','S');

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

insert  into `faenasxcontratista`(`id`,`fxcIdContratistaPadre`,`id_faena`,`fxcEstado`,`bloqueada`) values (1,1,1,NULL,0),(2,1,2,NULL,0),(3,4,2,NULL,0),(4,5,1,NULL,0);

/*Table structure for table `isapre` */

DROP TABLE IF EXISTS `isapre`;

CREATE TABLE `isapre` (
  `isaIdIsapre` int(11) DEFAULT NULL,
  `isaEstado` varchar(10) DEFAULT NULL,
  `isaFechaCreacion` date DEFAULT NULL,
  `isaFechaModificacion` date DEFAULT NULL,
  `isaIsapre` varchar(100) DEFAULT NULL,
  `isaUsuarioCreacion` varchar(100) DEFAULT NULL,
  `isaUsuarioModificacion` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `isapre` */

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
  `mensual` varchar(1) DEFAULT NULL,
  `anual` varchar(1) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `activo` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

/*Data for the table `sub_tipodocumento` */

insert  into `sub_tipodocumento`(`id`,`orden`,`id_tipodocumento`,`descripcion`,`mensual`,`anual`,`cantidad`,`activo`) values (19,1,1,'Contrato y Anexo de renovacion','','S',NULL,'S'),(20,2,1,'Carta de Aviso','','S',NULL,'S'),(21,3,1,'Finiquito','','S',NULL,'S'),(22,4,1,'Plan de emergencia','','S',NULL,NULL),(23,5,1,'Comite Paritario Higiene y Seguridad',NULL,'S',NULL,NULL),(24,6,1,'Registro de Conocimiento de Trabajadores',NULL,NULL,NULL,NULL),(25,7,2,'Ingreso de informacion de trabajadores',NULL,NULL,NULL,NULL),(26,8,2,'Contrataciones',NULL,NULL,NULL,NULL),(27,9,2,'Desvinculaciones',NULL,NULL,NULL,NULL),(28,10,3,'Ingreso de Liquidacion',NULL,NULL,NULL,'S'),(29,11,3,'Copia Libro de Remuneraciones',NULL,NULL,NULL,'S'),(30,12,3,'Libro Asistencias',NULL,NULL,NULL,NULL),(31,13,3,'Pacto Horas Extraordinarias',NULL,NULL,NULL,NULL),(32,14,3,'Licencia',NULL,NULL,NULL,'S'),(33,15,3,'Descuentos realizados',NULL,NULL,NULL,NULL),(34,16,3,'Autorizacion Firmada',NULL,NULL,NULL,NULL),(35,17,3,'Acreditacion de pago',NULL,NULL,NULL,NULL),(36,18,4,'Formulario F30',NULL,NULL,NULL,NULL),(37,19,4,'Formulario F30-1',NULL,NULL,NULL,NULL),(38,20,4,'Notificacion de Contratista',NULL,NULL,NULL,NULL),(39,21,4,'Formulario F43',NULL,NULL,NULL,NULL),(40,22,5,'Distintas AFP',NULL,NULL,NULL,NULL),(41,23,5,'Distintas ISAPRES / FONASA',NULL,NULL,NULL,NULL),(42,24,5,'Distintas Cajas de Compensacion',NULL,NULL,NULL,NULL),(43,25,5,'Mutualidades',NULL,NULL,NULL,NULL);

/*Table structure for table `tipodocumento` */

DROP TABLE IF EXISTS `tipodocumento`;

CREATE TABLE `tipodocumento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(300) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `tpdEstado` varchar(10) DEFAULT NULL,
  `tpdModuloPertenece` varchar(100) DEFAULT NULL,
  `tpd_nombreTipoDoc` varchar(100) DEFAULT NULL,
  `activo` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `tipodocumento` */

insert  into `tipodocumento`(`id`,`descripcion`,`tpdEstado`,`tpdModuloPertenece`,`tpd_nombreTipoDoc`,`activo`) values (1,'Inf. & Coord. Emp.',NULL,NULL,NULL,'S'),(2,'Antecedentes Laborales',NULL,NULL,NULL,NULL),(3,'Remuneraciones',NULL,NULL,NULL,'S'),(4,'Certif. Contratista',NULL,NULL,NULL,NULL),(5,'Pago Prev.',NULL,NULL,NULL,NULL);

/*Table structure for table `trabajador` */

DROP TABLE IF EXISTS `trabajador`;

CREATE TABLE `trabajador` (
  `trbIdTrabajador` int(11) NOT NULL AUTO_INCREMENT,
  `afpIdAfp` int(11) DEFAULT NULL,
  `comIdComuna` int(11) DEFAULT NULL,
  `ctrIdContratista` int(11) DEFAULT NULL,
  `dirIdDireccion` int(11) DEFAULT NULL,
  `isaIdIsapre` int(11) DEFAULT NULL,
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
  `trbEstado` varchar(100) DEFAULT NULL,
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
  `activo` char(1) DEFAULT NULL,
  KEY `trbIdTrabajador` (`trbIdTrabajador`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

/*Data for the table `trabajador` */

insert  into `trabajador`(`trbIdTrabajador`,`afpIdAfp`,`comIdComuna`,`ctrIdContratista`,`dirIdDireccion`,`isaIdIsapre`,`nacIdNacionalidad`,`tgrlIdCargoContractual`,`tgrlIdOficioCab`,`tgrlIdOficioDet`,`tgrlIdTipoContrato`,`tjorIdTipoJornada`,`trbAfectoArt22`,`trbAntiguedadMeses`,`trbApMaterno`,`trbApPaterno`,`trbCeco`,`trbDireccion`,`trbEstado`,`trbFechaContrato`,`trbFechaCreacion`,`trbFechaModificacion`,`trbFechaNac`,`trbHorasSemanales`,`trbIngresoObraFecha`,`trbNombre`,`trbPensionado`,`trbPerteneceSindicato`,`trbRut`,`trbRutJefe`,`trbSeguroCesantia`,`trbSexo`,`trbTelefono`,`trbTitulo`,`trbUsuarioCreacion`,`trbUsuarioModificacion`,`trbVisa`,`activo`) values (24,NULL,0,1,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'trabajador 2','trabajador 2',NULL,NULL,NULL,'2014-06-25',NULL,NULL,'0000-00-00',NULL,NULL,'trabajador 2',NULL,NULL,'228214302',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'S');

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

insert  into `trabajadorxfaena`(`id`,`txf_id_trabajador`,`txf_id_faena`,`txfEstado`) values (1,24,1,NULL);

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
  KEY `ix_Usuarios_autoinc` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id`,`id_usuario`,`clave`,`nom_usuario`,`ape_usuario`,`activo`,`fec_alta`,`tipo_usuario`,`id_empresa`) values (1,'admin','admin','nombre administrador','apellido administrador','S','2012-11-27 00:00:00','',0),(3,'nuevo','nuevo','nombre nuevo','apellido nuevo','S','2014-02-16 00:00:00','E',1);

/* Function  structure for function  `determina_estado` */

/*!50003 DROP FUNCTION IF EXISTS `determina_estado` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `determina_estado`(p_TipoDoc int, p_SubTipodoc int,p_Faena int,p_Contratista int, p_IdTrabajador int) RETURNS int(11)
BEGIN
	DECLARE estado int;
	DECLARE	x1 int;
	declare cant_doc int;
	declare meses int;
	
	SELECT MIN(d.id_estado_documento) 
	into estado
	FROM documentotrabajador d 
	WHERE d.tpdIdTipoDocumento = p_TipoDoc
        AND d.id_sub_tipodocumento = p_SubTipodoc
        AND d.id_faena = p_Faena 
        AND d.id_contratista = p_Contratista 
        AND d.doctIdTrabajador = p_IdTrabajador 
        AND d.id_estado_documento <> 1;
        
        if(estado is null) then
		set x1 = 1;
	else		
		SELECT count(d.doctIdDocumento) 
		INTO cant_doc
		FROM documentotrabajador d 
		WHERE d.tpdIdTipoDocumento = p_TipoDoc
		AND d.id_sub_tipodocumento = p_SubTipodoc
		AND d.id_faena = p_Faena 
		AND d.id_contratista = p_Contratista 
		AND d.doctIdTrabajador = p_IdTrabajador 
		AND d.id_estado_documento <> 1;
	
		select ROUND(DATEDIFF(CURDATE(), t.trbFechaContrato) / 30)
		into meses
		from trabajador t
		where t.trbIdTrabajador = p_IdTrabajador;
		
		if(cant_doc < meses) then 
			SET x1 = 2;	
		else
			set x1 = estado;
		end if;
	end if;
       
	RETURN x1;
    END */$$
DELIMITER ;

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
