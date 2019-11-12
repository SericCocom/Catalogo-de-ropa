/*
Navicat MySQL Data Transfer

Source Server         : Wamp
Source Server Version : 50721
Source Host           : 127.0.0.1:3306
Source Database       : tienda

Target Server Type    : MYSQL
Target Server Version : 50721
File Encoding         : 65001

Date: 2019-11-12 12:48:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for albums
-- ----------------------------
DROP TABLE IF EXISTS `albums`;
CREATE TABLE `albums` (
  `id_album` varchar(10) NOT NULL,
  `album` varchar(50) DEFAULT NULL,
  `fecha_publica` datetime DEFAULT NULL,
  `publicado` varchar(2) DEFAULT 'NO',
  `cancelado` varchar(2) DEFAULT 'NO',
  `fecha_despub` date DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_album`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for categorias
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `categoria` varchar(30) DEFAULT NULL,
  KEY `categoria` (`categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for clientes
-- ----------------------------
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `curp` varchar(18) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellidop` varchar(60) NOT NULL,
  `apellidom` varchar(60) DEFAULT NULL,
  `telefono` varchar(10) NOT NULL,
  `direccion` varchar(120) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `autorizado` varchar(2) DEFAULT 'NO',
  PRIMARY KEY (`curp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for comentarios
-- ----------------------------
DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE `comentarios` (
  `id_usuario` varchar(18) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `comentario` varchar(2) DEFAULT 'YO',
  `prenda` varchar(20) DEFAULT NULL,
  `entregado` varchar(2) DEFAULT 'NO',
  `cancelado` varchar(2) DEFAULT 'NO',
  `preparado` varchar(2) DEFAULT 'NO',
  `cla` tinyint(4) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`cla`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for empresa
-- ----------------------------
DROP TABLE IF EXISTS `empresa`;
CREATE TABLE `empresa` (
  `rfc` varchar(20) DEFAULT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `direccion` varchar(60) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for productos
-- ----------------------------
DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `clave` varchar(20) NOT NULL,
  `talla` varchar(10) DEFAULT NULL,
  `precioventa` float(5,0) DEFAULT NULL,
  `preciocompra` float(3,0) DEFAULT NULL,
  `categoria` varchar(10) DEFAULT NULL,
  `photo` varchar(60) DEFAULT NULL,
  `id_album` varchar(10) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `vendido` varchar(2) DEFAULT 'NO',
  PRIMARY KEY (`clave`),
  KEY `categoria` (`categoria`),
  CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`categoria`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `curp` varchar(18) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `contrase` varchar(10) DEFAULT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `apellidop` varchar(30) DEFAULT NULL,
  `apellidom` varchar(30) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `direccion` varchar(80) DEFAULT NULL,
  `correo` varchar(60) DEFAULT NULL,
  `activo` varchar(2) DEFAULT 'SI',
  `rol` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`usuario`,`curp`),
  KEY `apellidom` (`apellidom`),
  KEY `rol` (`rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
