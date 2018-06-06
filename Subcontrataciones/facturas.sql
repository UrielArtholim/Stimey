-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-05-2018 a las 17:09:49
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: 'facturas'
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'usuario'
--

DROP DATABASE IF EXISTS Facturas;
CREATE DATABASE Facturas CHARACTER SET utf8;
USE Facturas;

--
-- Estructura de tabla para la tabla 'factura'
--

CREATE TABLE IF NOT EXISTS Factura (
  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  id_usuario int NOT NULL,
  identificacion varchar(256) NOT NULL,
  descripcion varchar(512) NOT NULL,
  nombre_emisor varchar(128) NOT NULL,
  NIF_emisor varchar(128) NOT NULL,
  denom_social_emisor varchar(128) NOT NULL,
  usuario varchar(128) NOT NULL,
  domicilio varchar(256) NOT NULL,
  fecha_emision date NOT NULL,
  fecha_pago date NOT NULL,
  importe float NOT NULL,
  impuesto float NOT NULL,
  importe_impuesto float NOT NULL,
  esta_verificada boolean,
  comentario varchar(512),
  FOREIGN KEY (id_usuario) REFERENCES Usuario(id)
);

CREATE TABLE IF NOT EXISTS Archivo (
  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  id_factura int NOT NULL,
  ruta varchar(256) NOT NULL,
  FOREIGN KEY (id_factura) REFERENCES Factura(id)
);

CREATE TABLE IF NOT EXISTS Test (
  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  id_factura int NOT NULL,
  id_test varchar(128) NOT NULL,
  esta_verificado boolean,
  comentario varchar(512),
  FOREIGN KEY (id_factura) REFERENCES Factura(id)
);

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla 'factura'
--

INSERT INTO Factura (id_usuario, identificacion, descripcion, nombre_emisor, NIF_emisor, denom_social_emisor,
                     usuario, domicilio, fecha_emision, fecha_pago, importe, impuesto, importe_impuesto,
                     esta_verificada, comentario) VALUES
(1, 'H100', 'Coche Rojo, Coche Azul', 'Corte Inglés', '123456789C', 'Compra-Venta', 'Pepito', 'Calle Falsa', '2016-05-11', '2016-05-21', '12.3', '5', '13', false, 'Ta to mal'),
(1, 'XP234', 'Moto Roja, Moto Verde', 'Hipercor', '987654321D', 'Timazos', 'Menganito', 'Plaza Buaf', '2017-06-02', '2017-06-03', '10', '5', '10.5', true, 'Naisu'),
(2, '10-567', 'Barco', 'Chino de la Esquina', '336699771R', 'Basura', 'Ying Yang', 'Callejón Random', '2018-01-08', '2018-01-10', '100', '10', '125', null, '');


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
