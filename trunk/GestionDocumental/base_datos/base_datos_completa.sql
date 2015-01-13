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
  `afpIdAfp` INT(11) NOT NULL AUTO_INCREMENT,
  `afpEstado` VARCHAR(10) DEFAULT NULL,
  `afpFechaCreacion` DATE DEFAULT NULL,
  `afpFechaModificacion` DATE DEFAULT NULL,
  `afpNombre` VARCHAR(100) DEFAULT NULL,
  `afpUsuarioCreacion` VARCHAR(100) DEFAULT NULL,
  `afpUsuarioModificacion` VARCHAR(100) DEFAULT NULL,
  `activo` VARCHAR(1) DEFAULT NULL,
  KEY `afpIdAfp` (`afpIdAfp`)
) ENGINE=MYISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `afp` */

INSERT  INTO `afp`(`afpIdAfp`,`afpEstado`,`afpFechaCreacion`,`afpFechaModificacion`,`afpNombre`,`afpUsuarioCreacion`,`afpUsuarioModificacion`,`activo`) VALUES (1,'activo',NULL,NULL,'CUPRUM',NULL,NULL,'S'),(2,'activo',NULL,NULL,'Habitat',NULL,NULL,'S');

/*Table structure for table `ccat` */

DROP TABLE IF EXISTS `ccat`;

CREATE TABLE `ccat` (
  `ccatIdAfiliado` INT(11) DEFAULT NULL,
  `ccatEstado` VARCHAR(10) DEFAULT NULL,
  `ccatFechaCreacion` DATE DEFAULT NULL,
  `ccatFechaModificacion` DATE DEFAULT NULL,
  `ccatNombre` VARCHAR(100) DEFAULT NULL,
  `ccatUsuarioCreacion` VARCHAR(100) DEFAULT NULL,
  `ccatUsuarioModificacion` VARCHAR(100) DEFAULT NULL,
  `activo` VARCHAR(1) DEFAULT NULL
) ENGINE=MYISAM DEFAULT CHARSET=utf8;

/*Data for the table `ccat` */

/*Table structure for table `constructora` */

DROP TABLE IF EXISTS `constructora`;

CREATE TABLE `constructora` (
  `consIdConstructora` INT(11) NOT NULL AUTO_INCREMENT,
  `consEmail` VARCHAR(100) DEFAULT NULL,
  `consEstado` VARCHAR(10) DEFAULT NULL,
  `consFechaCreacion` DATE DEFAULT NULL,
  `consFechaModificacion` DATE DEFAULT NULL,
  `consNombreFantasia` VARCHAR(100) DEFAULT NULL,
  `consRazonSocial` VARCHAR(100) DEFAULT NULL,
  `consRut` VARCHAR(100) DEFAULT NULL,
  `consTelefono` VARCHAR(100) DEFAULT NULL,
  `consTelefono2` VARCHAR(100) DEFAULT NULL,
  `consTelefono3` VARCHAR(100) DEFAULT NULL,
  `consUsuarioCreacion` VARCHAR(100) DEFAULT NULL,
  `consUsuarioModificacion` VARCHAR(100) DEFAULT NULL,
  `dirIdDireccion` INT(11) DEFAULT NULL,
  `rplIdRepLegal` INT(11) DEFAULT NULL,
  `activo` VARCHAR(1) DEFAULT NULL,
  KEY `consIdConstructora` (`consIdConstructora`)
) ENGINE=MYISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `constructora` */

INSERT  INTO `constructora`(`consIdConstructora`,`consEmail`,`consEstado`,`consFechaCreacion`,`consFechaModificacion`,`consNombreFantasia`,`consRazonSocial`,`consRut`,`consTelefono`,`consTelefono2`,`consTelefono3`,`consUsuarioCreacion`,`consUsuarioModificacion`,`dirIdDireccion`,`rplIdRepLegal`,`activo`) VALUES (1,'la@lala.com','Habilitada','2014-10-15',NULL,'Empresa 1','Empresa 1','123456789','22226676','44444',NULL,NULL,NULL,NULL,1,'S'),(2,'lala@la.cl',NULL,NULL,NULL,'Empresa 2','Empresa 2','1212121','222333','333333','444',NULL,NULL,NULL,NULL,'S'),(4,'la@lala.com',NULL,NULL,NULL,'Empresa 3','Empresa 3','2222222','22222','44444','55555',NULL,NULL,NULL,NULL,'S');

/*Table structure for table `contratista` */

DROP TABLE IF EXISTS `contratista`;

CREATE TABLE `contratista` (
  `ctrIdContratista` INT(11) NOT NULL AUTO_INCREMENT,
  `ccatIdAfiliado` INT(11) DEFAULT NULL,
  `ctrEmail` VARCHAR(100) DEFAULT NULL,
  `ctrEmailExpertoMutualidad` VARCHAR(100) DEFAULT NULL,
  `ctrEstado` VARCHAR(100) DEFAULT NULL,
  `ctrFechaCreacion` DATE DEFAULT NULL,
  `ctrFechaModificacion` DATE DEFAULT NULL,
  `ctrFonoExpertoMutualidad` VARCHAR(100) DEFAULT NULL,
  `ctrIdAfiliadoMutualidad` INT(11) DEFAULT NULL,
  `ctrIdServicioContratado` INT(11) DEFAULT NULL,
  `ctrIngresoFaena` DATE DEFAULT NULL,
  `ctrNombreExpertoMutualidad` VARCHAR(100) DEFAULT NULL,
  `ctrNombreFantasia` VARCHAR(100) DEFAULT NULL,
  `ctrNroActividadCab` VARCHAR(100) DEFAULT NULL,
  `ctrNroActividadDet` VARCHAR(100) DEFAULT NULL,
  `ctrRazonSocial` VARCHAR(100) DEFAULT NULL,
  `ctrRut` VARCHAR(100) DEFAULT NULL,
  `ctrTasaCotizacionActual` INT(11) DEFAULT NULL,
  `ctrTasaCotizacionTotal` INT(11) DEFAULT NULL,
  `ctrTasaGenerica` INT(11) DEFAULT NULL,
  `ctrTelefono` VARCHAR(100) DEFAULT NULL,
  `ctrTelefono2` VARCHAR(100) DEFAULT NULL,
  `ctrTelefono3` VARCHAR(100) DEFAULT NULL,
  `ctrUsuarioCreacion` VARCHAR(100) DEFAULT NULL,
  `ctrUsuarioModificacion` VARCHAR(100) DEFAULT NULL,
  `dirIdDirecion` INT(11) DEFAULT NULL,
  `mutIdMutualidad` INT(11) DEFAULT NULL,
  `rplIdRepLegal` INT(11) DEFAULT NULL,
  `tjor_idTipoJornada` INT(11) DEFAULT NULL,
  `consIdConstructora` INT(11) DEFAULT NULL,
  `activo` VARCHAR(1) DEFAULT NULL,
  KEY `ctrIdContratista` (`ctrIdContratista`)
) ENGINE=MYISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `contratista` */

INSERT  INTO `contratista`(`ctrIdContratista`,`ccatIdAfiliado`,`ctrEmail`,`ctrEmailExpertoMutualidad`,`ctrEstado`,`ctrFechaCreacion`,`ctrFechaModificacion`,`ctrFonoExpertoMutualidad`,`ctrIdAfiliadoMutualidad`,`ctrIdServicioContratado`,`ctrIngresoFaena`,`ctrNombreExpertoMutualidad`,`ctrNombreFantasia`,`ctrNroActividadCab`,`ctrNroActividadDet`,`ctrRazonSocial`,`ctrRut`,`ctrTasaCotizacionActual`,`ctrTasaCotizacionTotal`,`ctrTasaGenerica`,`ctrTelefono`,`ctrTelefono2`,`ctrTelefono3`,`ctrUsuarioCreacion`,`ctrUsuarioModificacion`,`dirIdDirecion`,`mutIdMutualidad`,`rplIdRepLegal`,`tjor_idTipoJornada`,`consIdConstructora`,`activo`) VALUES (1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Agencia 1',NULL,NULL,'Agencia 1','22222',NULL,NULL,NULL,'5465464645',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'S'),(4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Agencia 2',NULL,NULL,'Agencia 2','22821447',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'S'),(5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Agencia 3',NULL,NULL,'Agencia 3','23456789-0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'S'),(6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Agencia 4',NULL,NULL,'Agencia 4','444444444',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'S');

/*Table structure for table `direccion` */

DROP TABLE IF EXISTS `direccion`;

CREATE TABLE `direccion` (
  `dirIdDireccion` INT(11) DEFAULT NULL,
  `ciuIdCiudad` INT(11) DEFAULT NULL,
  `comIdComuna` INT(11) DEFAULT NULL,
  `dirCalle` VARCHAR(100) DEFAULT NULL,
  `dirDptov` VARCHAR(100) DEFAULT NULL,
  `dirEstado` VARCHAR(100) DEFAULT NULL,
  `dirFechaCreacion` DATE DEFAULT NULL,
  `dirFechaModificacion` DATE DEFAULT NULL,
  `dirNumero` VARCHAR(100) DEFAULT NULL,
  `dirObservacion` VARCHAR(100) DEFAULT NULL,
  `dirPiso` VARCHAR(100) DEFAULT NULL,
  `dirUsuarioCreacion` VARCHAR(100) DEFAULT NULL,
  `dirUsuarioModificacion` VARCHAR(100) DEFAULT NULL,
  `paisId` INT(11) DEFAULT NULL,
  `regIdRegion` INT(11) DEFAULT NULL,
  `activo` VARCHAR(1) DEFAULT NULL,
  `id_contratista` INT(11) NOT NULL
) ENGINE=MYISAM DEFAULT CHARSET=utf8;

/*Data for the table `direccion` */

INSERT  INTO `direccion`(`dirIdDireccion`,`ciuIdCiudad`,`comIdComuna`,`dirCalle`,`dirDptov`,`dirEstado`,`dirFechaCreacion`,`dirFechaModificacion`,`dirNumero`,`dirObservacion`,`dirPiso`,`dirUsuarioCreacion`,`dirUsuarioModificacion`,`paisId`,`regIdRegion`,`activo`,`id_contratista`) VALUES (1,0,1,'Monjitas','14','Santiago',NULL,NULL,'45654',NULL,'4',NULL,NULL,NULL,NULL,'S',1);

/*Table structure for table `documentos` */

DROP TABLE IF EXISTS `documentos`;
CREATE TABLE `documentos` (
  `id` int(11) NOT NULL auto_increment,
  `doctFechaSubida` date default NULL,
  `doctFechaPertenece` date default NULL,
  `doctNombreArchivo` varchar(100) default NULL,
  `doctNombreEncrip` varchar(100) default NULL,
  `NombreOriginal` varchar(100) NOT NULL,
  `id_documentotrabajador` int(11) NOT NULL,
  `id_estado_documento` int(11) NOT NULL,
  `nota` text character set latin1 collate latin1_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=98 ;

-- 
-- Volcar la base de datos para la tabla `documentos`
-- 

INSERT INTO `documentos` VALUES (43, '2014-11-26', '2014-11-26', 'liquidacion_enero', '46f5b113b7709faf5c4d2382e97fd57c_20141126104549.pdf', '228214302.pdf', 43, 2, '');
INSERT INTO `documentos` VALUES (44, '2014-11-26', '2014-11-26', 'liquidacion_febrero', '46f5b113b7709faf5c4d2382e97fd57c_20141126105233.pdf', '228214302.pdf', 43, 2, '');
INSERT INTO `documentos` VALUES (45, '2014-11-26', '2014-11-26', 'liquidacion_febrero', '46f5b113b7709faf5c4d2382e97fd57c_20141126105648.pdf', '228214302.pdf', 43, 2, '');
INSERT INTO `documentos` VALUES (46, '2014-11-26', '2014-11-26', 'afp_enero', '46f5b113b7709faf5c4d2382e97fd57c_20141126110725.pdf', '228214302.pdf', 46, 2, '');
INSERT INTO `documentos` VALUES (51, '2014-11-28', '2014-11-28', 'contrato', '46f5b113b7709faf5c4d2382e97fd57c_20141128115236.pdf', '228214302.pdf', 47, 2, '');
INSERT INTO `documentos` VALUES (88, '2014-12-12', '2014-12-12', 'pago 2', '46f5b113b7709faf5c4d2382e97fd57c_20141212103752.pdf', '228214302.pdf', 82, 2, '');
INSERT INTO `documentos` VALUES (89, '2014-12-12', '2014-12-12', 'pago 2', '46f5b113b7709faf5c4d2382e97fd57c_20141212150902.pdf', '228214302.pdf', 82, 2, '');
INSERT INTO `documentos` VALUES (90, '2014-12-15', '2014-12-15', '', '46f5b113b7709faf5c4d2382e97fd57c_20141215155230.pdf', '228214302.pdf', 89, 2, '');
INSERT INTO `documentos` VALUES (91, '2014-12-15', '2014-12-15', '', '46f5b113b7709faf5c4d2382e97fd57c_20141215170142.pdf', '228214302.pdf', 100, 2, '');
INSERT INTO `documentos` VALUES (92, '2014-12-27', '2014-12-27', '', '46f5b113b7709faf5c4d2382e97fd57c_20141227215954.pdf', '228214302.pdf', 101, 4, ' sin mas que decir sss');
INSERT INTO `documentos` VALUES (93, '2015-01-02', '2015-01-02', '', '46f5b113b7709faf5c4d2382e97fd57c_20150102105158.pdf', '228214302.pdf', 102, 2, ' nono');
INSERT INTO `documentos` VALUES (94, '2015-01-02', '2015-01-02', '', '46f5b113b7709faf5c4d2382e97fd57c_20150102150143.pdf', '228214302.pdf', 103, 2, '');
INSERT INTO `documentos` VALUES (95, '2015-01-02', '2015-01-02', '', '46f5b113b7709faf5c4d2382e97fd57c_20150102155411.pdf', '228214302.pdf', 104, 2, '');
INSERT INTO `documentos` VALUES (96, '2015-01-02', '2015-01-02', 'Marzo', '46f5b113b7709faf5c4d2382e97fd57c_20150102232319.pdf', '228214302.pdf', 102, 2, ' esa');
INSERT INTO `documentos` VALUES (97, '2015-01-02', '2015-01-02', 'registro_conocimiento', '46f5b113b7709faf5c4d2382e97fd57c_20150102232359.pdf', '228214302.pdf', 106, 2, '');

/*Table structure for table `documentotrabajador` */

DROP TABLE IF EXISTS `documentotrabajador`;

CREATE TABLE `documentotrabajador` (
  `doctIdDocumento` INT(11) NOT NULL AUTO_INCREMENT,
  `id_estado_documento` INT(11) DEFAULT NULL,
  `doctIdTrabajador` INT(11) DEFAULT NULL,
  `id_contratista` INT(11) NOT NULL,
  `id_faena` INT(11) NOT NULL,
  `tpdIdTipoDocumento` INT(11) DEFAULT NULL,
  `id_sub_tipodocumento` INT(11) NOT NULL,
  PRIMARY KEY (`doctIdDocumento`)
) ENGINE=MYISAM AUTO_INCREMENT=107 DEFAULT CHARSET=utf8;

/*Data for the table `documentotrabajador` */

INSERT  INTO `documentotrabajador`(`doctIdDocumento`,`id_estado_documento`,`doctIdTrabajador`,`id_contratista`,`id_faena`,`tpdIdTipoDocumento`,`id_sub_tipodocumento`) VALUES (103,2,24,1,1,1,20),(102,2,24,1,1,3,28),(101,2,24,1,1,1,19),(100,2,24,1,1,3,35),(73,1,24,1,1,1,19),(74,1,24,1,1,1,20),(75,1,24,1,1,1,21),(76,1,24,1,1,1,22),(77,1,24,1,1,1,23),(106,2,24,1,1,1,24),(79,1,24,1,1,2,25),(80,1,24,1,1,2,26),(81,1,24,1,1,2,27),(105,2,24,1,1,3,28),(83,1,24,1,1,3,29),(84,1,24,1,1,3,30),(85,1,24,1,1,3,31),(86,1,24,1,1,3,32),(87,1,24,1,1,3,33),(88,1,24,1,1,3,34),(89,4,24,1,1,3,35),(90,1,24,1,1,4,36),(91,1,24,1,1,4,37),(92,1,24,1,1,4,38),(93,1,24,1,1,4,39),(94,1,24,1,1,5,40),(104,2,24,1,1,5,41),(96,1,24,1,1,5,42),(97,1,24,1,1,5,43),(98,1,24,1,1,2,28),(99,1,24,1,1,2,28);

/*Table structure for table `estado_documento` */

DROP TABLE IF EXISTS `estado_documento`;

CREATE TABLE `estado_documento` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(300) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MYISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `estado_documento` */

INSERT  INTO `estado_documento`(`id`,`descripcion`) VALUES (1,'Sin subir'),(2,'Subido sin revisar'),(3,'Rechazado'),(4,'Aprobado');

/*Table structure for table `estadodocumentos` */

DROP TABLE IF EXISTS `estadodocumentos`;

CREATE TABLE `estadodocumentos` (
  `idEstadoDocumento` INT(11) NOT NULL AUTO_INCREMENT,
  `estadoDocumento` VARCHAR(50) DEFAULT NULL,
  KEY `idEstadoDocumento` (`idEstadoDocumento`)
<<<<<<< .mine
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
=======
) ENGINE=INNODB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
>>>>>>> .r182

/*Data for the table `estadodocumentos` */

INSERT  INTO `estadodocumentos`(`idEstadoDocumento`,`estadoDocumento`) VALUES (1,'Sin Subir'),(2,'Subido Sin Revisar'),(3,'Rechazado'),(4,'Aprobado');

/*Table structure for table `faena` */

DROP TABLE IF EXISTS `faena`;

CREATE TABLE `faena` (
  `faeIdFaenas` INT(11) NOT NULL AUTO_INCREMENT,
  `consIdConstructora` INT(11) DEFAULT NULL,
  `dirIdDireccion` INT(11) DEFAULT NULL,
  `faeEstado` VARCHAR(100) DEFAULT NULL,
  `faeFechaCreacion` DATE DEFAULT NULL,
  `faeFechaInicio` DATE DEFAULT NULL,
  `faeFechaTermino` DATE DEFAULT NULL,
  `faeIdFaenaPadre` INT(11) DEFAULT NULL,
  `faeNombre` VARCHAR(100) DEFAULT NULL,
  `faeResponsable` VARCHAR(100) DEFAULT NULL,
  `faeTelefono` VARCHAR(100) DEFAULT NULL,
  `activo` VARCHAR(1) DEFAULT NULL,
  KEY `faeIdFaenas` (`faeIdFaenas`)
) ENGINE=MYISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `faena` */

INSERT  INTO `faena`(`faeIdFaenas`,`consIdConstructora`,`dirIdDireccion`,`faeEstado`,`faeFechaCreacion`,`faeFechaInicio`,`faeFechaTermino`,`faeIdFaenaPadre`,`faeNombre`,`faeResponsable`,`faeTelefono`,`activo`) VALUES (1,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,'faena 1','responsable','22222','S'),(2,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,'faena 2','qqweqw','2323','S'),(3,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,'faena 3','res','22','S');

/*Table structure for table `faenasxcontratista` */

DROP TABLE IF EXISTS `faenasxcontratista`;

CREATE TABLE `faenasxcontratista` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `fxcIdContratistaPadre` INT(11) DEFAULT NULL,
  `id_faena` INT(11) NOT NULL,
  `fxcEstado` VARCHAR(10) DEFAULT NULL,
  `bloqueada` INT(11) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MYISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `faenasxcontratista` */

INSERT  INTO `faenasxcontratista`(`id`,`fxcIdContratistaPadre`,`id_faena`,`fxcEstado`,`bloqueada`) VALUES (1,1,1,NULL,0),(2,1,2,NULL,0),(3,4,2,NULL,0),(4,5,1,NULL,0);

/*Table structure for table `isapre` */

DROP TABLE IF EXISTS `isapre`;

CREATE TABLE `isapre` (
  `isaIdIsapre` INT(11) DEFAULT NULL,
  `isaEstado` VARCHAR(10) DEFAULT NULL,
  `isaFechaCreacion` DATE DEFAULT NULL,
  `isaFechaModificacion` DATE DEFAULT NULL,
  `isaIsapre` VARCHAR(100) DEFAULT NULL,
  `isaUsuarioCreacion` VARCHAR(100) DEFAULT NULL,
  `isaUsuarioModificacion` VARCHAR(100) DEFAULT NULL
) ENGINE=MYISAM DEFAULT CHARSET=utf8;

/*Data for the table `isapre` */

/*Table structure for table `mutual` */

DROP TABLE IF EXISTS `mutual`;

CREATE TABLE `mutual` (
  `mutIdMutualidad` INT(11) DEFAULT NULL,
  `mutEstado` VARCHAR(10) DEFAULT NULL,
  `mutFechaCreacion` DATE DEFAULT NULL,
  `mutFechaModificacion` DATE DEFAULT NULL,
  `mutNombre` VARCHAR(100) DEFAULT NULL,
  `mutUsuarioCreacion` VARCHAR(100) DEFAULT NULL,
  `mutUsuarioModifiacion` VARCHAR(100) DEFAULT NULL,
  `activo` VARCHAR(1) DEFAULT NULL
) ENGINE=MYISAM DEFAULT CHARSET=utf8;

/*Data for the table `mutual` */

/*Table structure for table `perfil` */

DROP TABLE IF EXISTS `perfil`;

CREATE TABLE `perfil` (
  `perfIdPerfil` INT(11) DEFAULT NULL,
  `perfDescripcion` VARCHAR(100) DEFAULT NULL,
  `perfFechaCreacion` DATE DEFAULT NULL,
  `perfFechaModificacion` DATE DEFAULT NULL,
  `perfNombrePerfil` VARCHAR(100) DEFAULT NULL,
  `perfUsuarioCreacion` VARCHAR(100) DEFAULT NULL,
  `perfUsuarioModificacion` VARCHAR(100) DEFAULT NULL
) ENGINE=MYISAM DEFAULT CHARSET=utf8;

/*Data for the table `perfil` */

/*Table structure for table `representantelegal` */

DROP TABLE IF EXISTS `representantelegal`;

CREATE TABLE `representantelegal` (
  `rplIdRepLegal` INT(11) DEFAULT NULL,
  `dirIdDireccion` INT(11) DEFAULT NULL,
  `rplApellidoMaterno` VARCHAR(100) DEFAULT NULL,
  `rplApellidoPaterno` VARCHAR(100) DEFAULT NULL,
  `rplEmail` VARCHAR(100) DEFAULT NULL,
  `rplEstado` VARCHAR(100) DEFAULT NULL,
  `rplFechaCreacion` DATE DEFAULT NULL,
  `rplFechaModificacion` DATE DEFAULT NULL,
  `rplNombre` VARCHAR(100) DEFAULT NULL,
  `rplRut` VARCHAR(100) DEFAULT NULL,
  `rplTelefono` VARCHAR(100) DEFAULT NULL,
  `rplUsuarioCreacion` VARCHAR(100) DEFAULT NULL,
  `rplUsuarioModifcacion` VARCHAR(100) DEFAULT NULL
) ENGINE=MYISAM DEFAULT CHARSET=utf8;

/*Data for the table `representantelegal` */

/*Table structure for table `si_usuario_rol` */

DROP TABLE IF EXISTS `si_usuario_rol`;

CREATE TABLE `si_usuario_rol` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` VARCHAR(20) NOT NULL,
  `id_rol` INT(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MYISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `si_usuario_rol` */

INSERT  INTO `si_usuario_rol`(`id`,`id_usuario`,`id_rol`) VALUES (1,'admin',1),(2,'nuevo',1);

/*Table structure for table `sub_tipodocumento` */

DROP TABLE IF EXISTS `sub_tipodocumento`;

CREATE TABLE `sub_tipodocumento` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `orden` INT(11) DEFAULT NULL,
  `id_tipodocumento` INT(11) NOT NULL,
  `descripcion` VARCHAR(300) NOT NULL,
  `mensual` VARCHAR(1) DEFAULT NULL,
  `anual` VARCHAR(1) DEFAULT NULL,
  `cantidad` INT(11) DEFAULT NULL,
  `activo` VARCHAR(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MYISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

/*Data for the table `sub_tipodocumento` */

INSERT  INTO `sub_tipodocumento`(`id`,`orden`,`id_tipodocumento`,`descripcion`,`mensual`,`anual`,`cantidad`,`activo`) VALUES (19,1,1,'Contrato y Anexo de renovacion','','S',NULL,'S'),(20,2,1,'Carta de Aviso','','S',NULL,'S'),(21,3,1,'Finiquito','','S',NULL,'S'),(22,4,1,'Plan de emergencia','','S',NULL,NULL),(23,5,1,'Comite Paritario Higiene y Seguridad',NULL,'S',NULL,NULL),(24,6,1,'Registro de Conocimiento de Trabajadores',NULL,NULL,NULL,NULL),(25,7,2,'Ingreso de informacion de trabajadores',NULL,NULL,NULL,NULL),(26,8,2,'Contrataciones',NULL,NULL,NULL,NULL),(27,9,2,'Desvinculaciones',NULL,NULL,NULL,NULL),(28,10,3,'Ingreso de Liquidacion',NULL,NULL,NULL,'S'),(29,11,3,'Copia Libro de Remuneraciones',NULL,NULL,NULL,'S'),(30,12,3,'Libro Asistencias',NULL,NULL,NULL,NULL),(31,13,3,'Pacto Horas Extraordinarias',NULL,NULL,NULL,NULL),(32,14,3,'Licencia',NULL,NULL,NULL,'S'),(33,15,3,'Descuentos realizados',NULL,NULL,NULL,NULL),(34,16,3,'Autorizacion Firmada',NULL,NULL,NULL,NULL),(35,17,3,'Acreditacion de pago',NULL,NULL,NULL,NULL),(36,18,4,'Formulario F30',NULL,NULL,NULL,NULL),(37,19,4,'Formulario F30-1',NULL,NULL,NULL,NULL),(38,20,4,'Notificacion de Contratista',NULL,NULL,NULL,NULL),(39,21,4,'Formulario F43',NULL,NULL,NULL,NULL),(40,22,5,'Distintas AFP',NULL,NULL,NULL,NULL),(41,23,5,'Distintas ISAPRES / FONASA',NULL,NULL,NULL,NULL),(42,24,5,'Distintas Cajas de Compensacion',NULL,NULL,NULL,NULL),(43,25,5,'Mutualidades',NULL,NULL,NULL,NULL);

/*Table structure for table `tipodocumento` */

DROP TABLE IF EXISTS `tipodocumento`;

CREATE TABLE `tipodocumento` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(300) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `tpdEstado` VARCHAR(10) DEFAULT NULL,
  `tpdModuloPertenece` VARCHAR(100) DEFAULT NULL,
  `tpd_nombreTipoDoc` VARCHAR(100) DEFAULT NULL,
  `activo` VARCHAR(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MYISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `tipodocumento` */

INSERT  INTO `tipodocumento`(`id`,`descripcion`,`tpdEstado`,`tpdModuloPertenece`,`tpd_nombreTipoDoc`,`activo`) VALUES (1,'Inf. & Coord. Emp.',NULL,NULL,NULL,'S'),(2,'Antecedentes Laborales',NULL,NULL,NULL,NULL),(3,'Remuneraciones',NULL,NULL,NULL,'S'),(4,'Certif. Contratista',NULL,NULL,NULL,NULL),(5,'Pago Prev.',NULL,NULL,NULL,NULL);

/*Table structure for table `trabajador` */

DROP TABLE IF EXISTS `trabajador`;

CREATE TABLE `trabajador` (
  `trbIdTrabajador` INT(11) NOT NULL AUTO_INCREMENT,
  `afpIdAfp` INT(11) DEFAULT NULL,
  `comIdComuna` INT(11) DEFAULT NULL,
  `ctrIdContratista` INT(11) DEFAULT NULL,
  `dirIdDireccion` INT(11) DEFAULT NULL,
  `isaIdIsapre` INT(11) DEFAULT NULL,
  `nacIdNacionalidad` INT(11) DEFAULT NULL,
  `tgrlIdCargoContractual` INT(11) DEFAULT NULL,
  `tgrlIdOficioCab` INT(11) DEFAULT NULL,
  `tgrlIdOficioDet` INT(11) DEFAULT NULL,
  `tgrlIdTipoContrato` INT(11) DEFAULT NULL,
  `tjorIdTipoJornada` INT(11) DEFAULT NULL,
  `trbAfectoArt22` VARCHAR(100) DEFAULT NULL,
  `trbAntiguedadMeses` INT(11) DEFAULT NULL,
  `trbApMaterno` VARCHAR(100) DEFAULT NULL,
  `trbApPaterno` VARCHAR(100) DEFAULT NULL,
  `trbCeco` VARCHAR(100) DEFAULT NULL,
  `trbDireccion` VARCHAR(100) DEFAULT NULL,
  `trbEstado` VARCHAR(100) DEFAULT NULL,
  `trbFechaContrato` DATE DEFAULT NULL,
  `trbFechaCreacion` DATE DEFAULT NULL,
  `trbFechaModificacion` DATE DEFAULT NULL,
  `trbFechaNac` DATE DEFAULT NULL,
  `trbHorasSemanales` INT(11) DEFAULT NULL,
  `trbIngresoObraFecha` DATE DEFAULT NULL,
  `trbNombre` VARCHAR(100) DEFAULT NULL,
  `trbPensionado` VARCHAR(100) DEFAULT NULL,
  `trbPerteneceSindicato` VARCHAR(100) DEFAULT NULL,
  `trbRut` VARCHAR(100) DEFAULT NULL,
  `trbRutJefe` VARCHAR(100) DEFAULT NULL,
  `trbSeguroCesantia` VARCHAR(100) DEFAULT NULL,
  `trbSexo` VARCHAR(100) DEFAULT NULL,
  `trbTelefono` VARCHAR(100) DEFAULT NULL,
  `trbTitulo` VARCHAR(100) DEFAULT NULL,
  `trbUsuarioCreacion` VARCHAR(100) DEFAULT NULL,
  `trbUsuarioModificacion` VARCHAR(100) DEFAULT NULL,
  `trbVisa` VARCHAR(100) DEFAULT NULL,
  `activo` CHAR(1) DEFAULT NULL,
  KEY `trbIdTrabajador` (`trbIdTrabajador`)
) ENGINE=MYISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

/*Data for the table `trabajador` */

INSERT  INTO `trabajador`(`trbIdTrabajador`,`afpIdAfp`,`comIdComuna`,`ctrIdContratista`,`dirIdDireccion`,`isaIdIsapre`,`nacIdNacionalidad`,`tgrlIdCargoContractual`,`tgrlIdOficioCab`,`tgrlIdOficioDet`,`tgrlIdTipoContrato`,`tjorIdTipoJornada`,`trbAfectoArt22`,`trbAntiguedadMeses`,`trbApMaterno`,`trbApPaterno`,`trbCeco`,`trbDireccion`,`trbEstado`,`trbFechaContrato`,`trbFechaCreacion`,`trbFechaModificacion`,`trbFechaNac`,`trbHorasSemanales`,`trbIngresoObraFecha`,`trbNombre`,`trbPensionado`,`trbPerteneceSindicato`,`trbRut`,`trbRutJefe`,`trbSeguroCesantia`,`trbSexo`,`trbTelefono`,`trbTitulo`,`trbUsuarioCreacion`,`trbUsuarioModificacion`,`trbVisa`,`activo`) VALUES (24,NULL,0,1,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'trabajador 2','trabajador 2',NULL,NULL,NULL,'2014-06-25',NULL,NULL,'0000-00-00',NULL,NULL,'trabajador 2',NULL,NULL,'228214302',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'S');

/*Table structure for table `trabajadorxfaena` */

DROP TABLE IF EXISTS `trabajadorxfaena`;

CREATE TABLE `trabajadorxfaena` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `txf_id_trabajador` INT(11) DEFAULT NULL,
  `txf_id_faena` INT(11) DEFAULT NULL,
  `txfEstado` VARCHAR(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MYISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `trabajadorxfaena` */

INSERT  INTO `trabajadorxfaena`(`id`,`txf_id_trabajador`,`txf_id_faena`,`txfEstado`) VALUES (1,24,1,NULL);

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `usrIdUsuario` INT(11) DEFAULT NULL,
  `usrApellido` VARCHAR(100) DEFAULT NULL,
  `usrEmail` VARCHAR(100) DEFAULT NULL,
  `usrFechaCreacion` DATE DEFAULT NULL,
  `usrFechaModificacion` DATE DEFAULT NULL,
  `usrLogin` VARCHAR(100) DEFAULT NULL,
  `usrNombre` VARCHAR(100) DEFAULT NULL,
  `usrPassword` VARCHAR(100) DEFAULT NULL,
  `usrRut` VARCHAR(100) DEFAULT NULL,
  `usrUsuarioCreacion` VARCHAR(100) DEFAULT NULL,
  `usrUsuarioModificacion` VARCHAR(100) DEFAULT NULL
) ENGINE=MYISAM DEFAULT CHARSET=utf8;

/*Data for the table `usuario` */

/*Table structure for table `usuarioperfil` */

DROP TABLE IF EXISTS `usuarioperfil`;

CREATE TABLE `usuarioperfil` (
  `usrIdUsuario` INT(11) DEFAULT NULL,
  `perfIdPerfil` INT(11) DEFAULT NULL,
  `usrpIdRelacion` INT(11) DEFAULT NULL
) ENGINE=MYISAM DEFAULT CHARSET=utf8;

/*Data for the table `usuarioperfil` */

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` VARCHAR(50) DEFAULT NULL,
  `clave` VARCHAR(50) DEFAULT NULL,
  `nom_usuario` VARCHAR(50) DEFAULT NULL,
  `ape_usuario` VARCHAR(50) DEFAULT NULL,
  `activo` CHAR(1) DEFAULT NULL,
  `fec_alta` DATETIME DEFAULT NULL,
  `tipo_usuario` CHAR(1) NOT NULL,
  `id_empresa` INT(11) NOT NULL,
  KEY `ix_Usuarios_autoinc` (`id`)
) ENGINE=MYISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `usuarios` */

INSERT  INTO `usuarios`(`id`,`id_usuario`,`clave`,`nom_usuario`,`ape_usuario`,`activo`,`fec_alta`,`tipo_usuario`,`id_empresa`) VALUES (1,'admin','admin','nombre administrador','apellido administrador','S','2012-11-27 00:00:00','',0),(3,'nuevo','nuevo','nombre nuevo','apellido nuevo','S','2014-02-16 00:00:00','E',1);
