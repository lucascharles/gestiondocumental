-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 25-05-2014 a las 10:32:25
-- Versión del servidor: 5.0.45
-- Versión de PHP: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `seguridadip`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `si_alertas`
-- 

CREATE TABLE `si_alertas` (
  `id` int(11) NOT NULL auto_increment,
  `descripcion` varchar(300) NOT NULL,
  `id_dispositivo` int(11) NOT NULL,
  `id_tipo_alerta` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `estado` char(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `si_configuracion_dispositivo`
-- 

CREATE TABLE `si_configuracion_dispositivo` (
  `id` int(11) NOT NULL auto_increment,
  `id_dispositivo` int(11) default NULL,
  `ubicacion` varchar(50) default NULL,
  `posicion_relativa` varchar(50) default NULL,
  `altura` varchar(50) default NULL,
  `id_tipo_alerta` int(11) NOT NULL,
  `id_modo_camara` int(11) NOT NULL,
  `sensibilidad` int(11) NOT NULL,
  `estado` varchar(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `si_dispositivo`
-- 

CREATE TABLE `si_dispositivo` (
  `id` int(11) NOT NULL auto_increment,
  `descripcion` varchar(300) NOT NULL,
  `direccion_ip` varchar(300) default NULL,
  `id_tipo_dispositivo` int(11) default NULL,
  `id_estado_dispositivo` int(11) NOT NULL,
  `marca` varchar(50) default NULL,
  `modelo` varchar(50) default NULL,
  `nro_serie` varchar(50) default NULL,
  `estado` varchar(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `si_dispositivo_seccion`
-- 

CREATE TABLE `si_dispositivo_seccion` (
  `id_dispositivo` int(11) NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `coordx` int(11) NOT NULL,
  `coordy` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `si_estado_dispositivo`
-- 

CREATE TABLE `si_estado_dispositivo` (
  `id` int(11) NOT NULL auto_increment,
  `descripcion` varchar(300) NOT NULL,
  `estado` char(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `si_layout`
-- 

CREATE TABLE `si_layout` (
  `id` int(11) NOT NULL auto_increment,
  `descripcion` varchar(300) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `estado` char(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `si_mailnews`
-- 

CREATE TABLE `si_mailnews` (
  `id` int(11) NOT NULL auto_increment,
  `email` varchar(300) NOT NULL,
  `activo` char(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `si_modo_camara`
-- 

CREATE TABLE `si_modo_camara` (
  `id` int(11) NOT NULL auto_increment,
  `descripcion` varchar(300) NOT NULL,
  `estado` char(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `si_modulo`
-- 

CREATE TABLE `si_modulo` (
  `id` int(11) NOT NULL auto_increment,
  `descripcion` varchar(100) character set latin1 collate latin1_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `si_panel_control`
-- 

CREATE TABLE `si_panel_control` (
  `id` int(11) NOT NULL auto_increment,
  `ventana` varchar(50) NOT NULL,
  `cuadrante` varchar(50) NOT NULL,
  `contenido` varchar(500) NOT NULL,
  `tipo_carga` varchar(20) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `si_parametros_dispositivo`
-- 

CREATE TABLE `si_parametros_dispositivo` (
  `id_parametro` int(11) NOT NULL auto_increment,
  `id_dispositivo` int(11) default NULL,
  `id_tipo_alerta1` int(11) default NULL,
  `id_tipo_alerta2` int(11) default NULL,
  `id_tipo_alerta3` int(11) default NULL,
  `id_tipo_alerta4` int(11) default NULL,
  `alimentacion` varchar(50) default NULL,
  `vida_util` varchar(50) default NULL,
  `alcance` varchar(50) default NULL,
  `estado` varchar(1) NOT NULL,
  PRIMARY KEY  (`id_parametro`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `si_rol`
-- 

CREATE TABLE `si_rol` (
  `id` int(11) NOT NULL auto_increment,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `si_rol_permiso`
-- 

CREATE TABLE `si_rol_permiso` (
  `id` int(11) NOT NULL auto_increment,
  `id_rol` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `alta` int(11) NOT NULL,
  `baja` int(11) NOT NULL,
  `modificacion` int(11) NOT NULL,
  `vista` int(11) NOT NULL,
  `extra` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `si_seccion_layout`
-- 

CREATE TABLE `si_seccion_layout` (
  `id` int(11) NOT NULL auto_increment,
  `descripcion` varchar(300) NOT NULL,
  `id_layout` int(11) NOT NULL,
  `coordx` int(11) NOT NULL,
  `coordy` int(11) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `estado` char(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `si_tipo_alertas`
-- 

CREATE TABLE `si_tipo_alertas` (
  `id` int(11) NOT NULL auto_increment,
  `descripcion` varchar(50) default NULL,
  `difusion` varchar(50) default NULL,
  `estado` varchar(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `si_tipo_dispositivo`
-- 

CREATE TABLE `si_tipo_dispositivo` (
  `id` int(11) NOT NULL auto_increment,
  `descripcion` varchar(50) default NULL,
  `estado` varchar(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `si_usuarios`
-- 

CREATE TABLE `si_usuarios` (
  `id` int(11) NOT NULL auto_increment,
  `id_usuario` varchar(50) default NULL,
  `clave` varchar(50) default NULL,
  `nom_usuario` varchar(50) default NULL,
  `ape_usuario` varchar(50) default NULL,
  `activo` char(1) default NULL,
  `fec_alta` datetime default NULL,
  KEY `ix_Usuarios_autoinc` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `si_usuario_layout`
-- 

CREATE TABLE `si_usuario_layout` (
  `id_layout` int(11) NOT NULL,
  `id_usuario` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `si_usuario_rol`
-- 

CREATE TABLE `si_usuario_rol` (
  `id` int(11) NOT NULL auto_increment,
  `id_usuario` varchar(20) NOT NULL,
  `id_rol` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;
