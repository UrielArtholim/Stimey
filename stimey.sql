-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 06-05-2018 a las 12:10:17
-- Versión del servidor: 5.7.21
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `stimey`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directorio`
--

DROP TABLE IF EXISTS `directorio`;
CREATE TABLE IF NOT EXISTS `directorio` (
  `dirKey` int(11) NOT NULL AUTO_INCREMENT,
  `dirValue` int(11) NOT NULL,
  `dirGroup` int(11) NOT NULL,
  PRIMARY KEY (`dirKey`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `directorio`
--

INSERT INTO `directorio` (`dirKey`, `dirValue`, `dirGroup`) VALUES
(1, 1, 1),
(2, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `g1`
--

DROP TABLE IF EXISTS `g1`;
CREATE TABLE IF NOT EXISTS `g1` (
  `dataID` int(11) NOT NULL AUTO_INCREMENT,
  `dataName` varchar(20) NOT NULL,
  `dataDesc` text NOT NULL,
  `dataValue` int(11) NOT NULL,
  PRIMARY KEY (`dataID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

DROP TABLE IF EXISTS `grupos`;
CREATE TABLE IF NOT EXISTS `grupos` (
  `grupoID` int(11) NOT NULL AUTO_INCREMENT,
  `grupoName` varchar(11) NOT NULL,
  PRIMARY KEY (`grupoID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`grupoID`, `grupoName`) VALUES
(1, 'G1'),
(2, 'G2'),
(3, 'G3'),
(4, 'G4'),
(5, 'G5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `G1` int(11) NOT NULL,
  `G2` int(11) NOT NULL,
  `G3` int(11) NOT NULL,
  `G4` int(11) NOT NULL,
  `G5` int(11) NOT NULL,
  `lastEntry` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Usuarios de la bd';

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `G1`, `G2`, `G3`, `G4`, `G5`, `lastEntry`) VALUES
(1, 'prueba', 'prueba', 0, 0, 0, 0, 0, '2018-05-06 13:56:16'),
(3, 'uriel', 'uriel', 2, 2, 2, 2, 2, '2018-05-06 14:07:24');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
