-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 25-05-2018 a las 20:42:54
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `contratos`
--
CREATE DATABASE IF NOT EXISTS `contratos` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `contratos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alertas`
--

CREATE TABLE `alertas` (
  `idAlerta` int(11) NOT NULL,
  `idTrabajador` int(11) NOT NULL,
  `alerta` text NOT NULL,
  `fechaAuditoria` date NOT NULL,
  `numAlertas` int(11) NOT NULL,
  `alertaTratada` tinyint(1) NOT NULL DEFAULT '0',
  `comentario` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alertas`
--

INSERT INTO `alertas` (`idAlerta`, `idTrabajador`, `alerta`, `fechaAuditoria`, `numAlertas`, `alertaTratada`, `comentario`) VALUES
(13, 1, ' Error en la base.<br> Error en las contingencias comunes al trabajador.<br> Error en las contingencias comunes a la empresa.<br> Error en el desempleo del trabajador.<br> Error en el desempleo de la empresa.<br> Error en I. Profesional del trabajador.<br> Error en I. Profesional de la empresa.<br> Error en AT y EP de la empresa.<br> Error en el FOGASA de la empresa.<br> Error en la fuerza mayor trabajador.<br> Error en la fuerza mayor de la empresa.<br> Error en la fuerza mayor trabajador.<br> Error en Estructurales y no Estructurales del trabajador.<br> Error en la Estructurales y no Estructurales de la empresa.<br> Error en el sueldo mensual.<br> Error en la categorÃ­a PDI.<br> Error en la cuota de contingencias comunes.<br> Error en la cuota de desempleo.<br> Error en la cuota de formaciÃ³n profesional.<br> Error en la cuota de desempleo.<br> Error en el pago mensual.<br>', '2018-05-22', 21, 1, 'asdfasdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Cotizacion_INSS`
--

CREATE TABLE `Cotizacion_INSS` (
  `idCotizacion_INSS` int(11) NOT NULL,
  `Grupo` int(11) DEFAULT NULL,
  `CNAE` int(11) DEFAULT NULL,
  `Num_Patronal` int(11) DEFAULT NULL,
  `Num_AfiliacionINSS` int(11) DEFAULT NULL,
  `Prorrata_extras` float DEFAULT NULL,
  `Base_RESS` float DEFAULT NULL,
  `Base_Aportacion` float DEFAULT NULL,
  `base` float NOT NULL,
  `AT_CC_Porcentaje` float DEFAULT NULL,
  `AE_CC_Porcentaje` float DEFAULT NULL,
  `AT_Desempleo_Porcentaje` float DEFAULT NULL,
  `AE_Desempleo_Porcentaje` float DEFAULT NULL,
  `AT_IProfesional_Porcentaje` float DEFAULT NULL,
  `AE_IProfesional_Porcentaje` float DEFAULT NULL,
  `AE_ATEP_Porcentaje_Porcentaje` float DEFAULT NULL,
  `AE_FOGASA_Porcentaje` float DEFAULT NULL,
  `AT_HorasExtras` float DEFAULT NULL,
  `AE_HorasExtras` float DEFAULT NULL,
  `AT_FuerzaMayor_Porcentaje` float DEFAULT NULL,
  `AE_FuerzaMayor_Porcentaje` float DEFAULT NULL,
  `AT_EyNE_Porcentaje` float DEFAULT NULL,
  `AE_EyNE_Porcentaje` float DEFAULT NULL,
  `AT_IRPF` int(11) DEFAULT NULL,
  `AE_IRPF_Porcentaje` varchar(45) DEFAULT NULL,
  `Datos_Personales_ID` int(11) NOT NULL,
  `Datos_Personales_ID1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Cotizacion_INSS`
--

INSERT INTO `Cotizacion_INSS` (`idCotizacion_INSS`, `Grupo`, `CNAE`, `Num_Patronal`, `Num_AfiliacionINSS`, `Prorrata_extras`, `Base_RESS`, `Base_Aportacion`, `base`, `AT_CC_Porcentaje`, `AE_CC_Porcentaje`, `AT_Desempleo_Porcentaje`, `AE_Desempleo_Porcentaje`, `AT_IProfesional_Porcentaje`, `AE_IProfesional_Porcentaje`, `AE_ATEP_Porcentaje_Porcentaje`, `AE_FOGASA_Porcentaje`, `AT_HorasExtras`, `AE_HorasExtras`, `AT_FuerzaMayor_Porcentaje`, `AE_FuerzaMayor_Porcentaje`, `AT_EyNE_Porcentaje`, `AE_EyNE_Porcentaje`, `AT_IRPF`, `AE_IRPF_Porcentaje`, `Datos_Personales_ID`, `Datos_Personales_ID1`) VALUES
(1, 87, 687, 6, 86, 76, 8, 67, 1000, 86, 87, 68, 68, 76, 8, 76, 8, 68, 76, 87, 7, 68, 76, 86, '87', 1, 1),
(2, 989, 8989, 89, 89, 8, 0, 98, 0, 9, 8, 8, 89, 98, 98, 8, 89, 0, 0, 9, 898, 89, 98, 9, '0.0', 2, 2),
(3, 56, 56, 56, 56, 56, 56, 5, 0, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 5, 5, 5, 5, 5, '0.0', 3, 3),
(4, 1, 1, 1, 1, 131.2, 0, 1035.42, 0, 4.5, 1.34, 4.23, 4.31, 2.42, 2.42, 3.1, 2.1, 0, 0, 0, 0, 0, 0, 132, '0.0', 4, 4),
(5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.0', 5, 5),
(6, 324, 34, 24, 24324, 234, 234, 0, 0, 3, 3, 3, 3, 3, 3, 3, 3, 0, 0, 3, 3, 3, 3, 3, '0.0', 6, 6),
(7, 98, 98, 98, 98, 98, 98, 12355, 0, 98, 98, 98, 98, 8, 8, 8, 98, 0, 0, 8, 98, 8, 98, 8, '0.0', 7, 7),
(8, 4, 4, 4, 4, 4, 4, 1000, 0, 20, 232, 23, 23, 23, 23, 323, 322, 0, 0, 23, 32, 23, 32, 0, '0.0', 8, 8),
(9, 0, 3, 3, 3, 3, 3, 332, 0, 33, 3, 3, 3, 3, 3, 0, 23, 0, 0, 0, 0, 0, 0, 0, '0.0', 9, 9),
(10, 8, 8, 8, 8, 8, 88, 8, 0, 8, 8, 8, 8, 8, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.0', 10, 10),
(11, 9, 9, 9, 9, 9, 9, 9, 0, 9, 9, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.0', 11, 11),
(12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.0', 12, 12),
(13, 7, 7, 7, 7, 7, 7, 7, 0, 7, 7, 7, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.0', 13, 13),
(14, 876, 5, 765, 765, 87, 765, 76, 0, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.0', 14, 14),
(15, 567, 8678, 967, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.0', 15, 15),
(16, 2, 345, 234, 0, 234, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.0', 16, 16),
(17, 4, 54, 5, 4, 54, 4, 54, 0, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.0', 17, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Datos_Bancarios`
--

CREATE TABLE `Datos_Bancarios` (
  `ID_DatosBancarios` int(11) NOT NULL,
  `Datos_Personales_ID` int(11) NOT NULL,
  `Banco` varchar(45) DEFAULT NULL,
  `IBAN` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Datos_Bancarios`
--

INSERT INTO `Datos_Bancarios` (`ID_DatosBancarios`, `Datos_Personales_ID`, `Banco`, `IBAN`) VALUES
(1, 1, 'BBVA', 'ES12345'),
(2, 2, 'BBVA', '124676'),
(3, 3, 'SABADELL', 'ES896768'),
(4, 4, 'BBVA', 'ES986966'),
(5, 5, '', ''),
(6, 6, 'jsdpofj', '234'),
(7, 7, '98', '98'),
(8, 8, '4', '4'),
(9, 9, '3', '3'),
(10, 10, '8', '8'),
(11, 11, '09', '09'),
(12, 12, '87', '87'),
(13, 13, '', '7'),
(14, 14, '658', '75'),
(15, 15, '567', '4567'),
(16, 16, '34', '1234'),
(17, 17, '5', '45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Datos_Personales`
--

CREATE TABLE `Datos_Personales` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `primerApellido` varchar(45) DEFAULT NULL,
  `segundoApellido` varchar(45) DEFAULT NULL,
  `NIF` varchar(45) DEFAULT NULL,
  `CCE` varchar(45) DEFAULT NULL,
  `Centro_destino` varchar(45) DEFAULT NULL,
  `F_Ingreso` datetime DEFAULT NULL,
  `Total_Dias` int(11) DEFAULT NULL,
  `Numero_Matricula` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Datos_Personales`
--

INSERT INTO `Datos_Personales` (`ID`, `Nombre`, `primerApellido`, `segundoApellido`, `NIF`, `CCE`, `Centro_destino`, `F_Ingreso`, `Total_Dias`, `Numero_Matricula`) VALUES
(1, 'ADRIÃN', 'HURTADO', 'GARCIA', '32078296N', '23', '23', NULL, 20, 1234),
(2, 'Jose Miguel', 'Pardo', 'Sanchez', '98iou', '23', '9678', NULL, 23, 9878),
(3, 'MIRIAM', 'SANCHEZ', 'ORTIZ', '3287688K', '231', '312', NULL, 12, 312),
(4, 'Jose Miguel', 'Pardo', 'SÃ¡nchez', '1234567A', '23', '13', NULL, 10, 12345),
(5, '', '', '', '', '', '', NULL, 0, 0),
(6, 'asdf', 'pjf', 'fwd', '2342', '4', '43', '2018-05-18 00:00:00', 3, 34),
(7, 'poiu', 'pou', 'pou', 'pou', '876', '98', '2017-03-24 00:00:00', 986, 867),
(8, '4', '4', '4', '4', '4', '4', '2018-05-18 00:00:00', 4, 4),
(9, 'o', 'jo', 'joj', 'oj', '3', '3', '2018-05-23 00:00:00', 3, 3),
(10, 'm', 'm', 'm', 'm', '8', '8', '2018-05-24 00:00:00', 8, 8),
(11, '09', '09', '09', '09', '09', '09', '2018-05-24 00:00:00', 9, 9),
(12, 'bnb', 'bn', 'bn', 'b', '78', '87', '2018-05-25 00:00:00', 78, 78),
(13, '7', '7', '7', '7', '7', '7', '2018-07-07 00:00:00', 7, 7),
(14, '56765', '765', '7', '587', '5', '87587658587', '2018-06-05 00:00:00', 5876, 675),
(15, '34567', '34567', '34567', '4567', '4567', '74567', '2018-04-30 00:00:00', 4567, 456),
(16, '98', '98', '97', '1234', '234', '12', '2018-12-12 00:00:00', 0, 234),
(17, '454', '54', '5', '45', '5', '54', '2018-05-04 00:00:00', 4, 44234);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pago_Mensual`
--

CREATE TABLE `Pago_Mensual` (
  `idPago_Mensual` int(11) NOT NULL,
  `Sueldo` float DEFAULT NULL,
  `CategoriaPDI` float DEFAULT NULL,
  `Descuento_CCC` float DEFAULT NULL,
  `Descuento_CDesempleo` float DEFAULT NULL,
  `Descuento_CFP` float DEFAULT NULL,
  `Descuento_IRPF` float DEFAULT NULL,
  `Pago_Mensualcol` float DEFAULT NULL,
  `Cotizacion_INSS_idCotizacion_INSS` int(11) NOT NULL,
  `Cotizacion_INSS_Datos_Personales_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Pago_Mensual`
--

INSERT INTO `Pago_Mensual` (`idPago_Mensual`, `Sueldo`, `CategoriaPDI`, `Descuento_CCC`, `Descuento_CDesempleo`, `Descuento_CFP`, `Descuento_IRPF`, `Pago_Mensualcol`, `Cotizacion_INSS_idCotizacion_INSS`, `Cotizacion_INSS_Datos_Personales_ID`) VALUES
(1, 676.23, 234.234, 23.42, 42.22, 3, 3, 838.824, 3, 3),
(2, 987.67, 108.8, 53.02, 42.55, 24.12, 32.43, 944.35, 1, 1),
(3, 1035, 145.34, 53.23, 32.43, 32.64, 54.234, 1007.81, 4, 4),
(4, 0, 0, 0, 0, 0, 0, 0, 5, 5),
(5, 234, 23423, 2342, 234, 3423, 4243, 13415, 6, 6),
(6, 98, 9, 98, 8, 98, 98, -195, 7, 7),
(7, 0, 0, 0, 0, 0, 0, 0, 8, 8),
(8, 23, 23, 23, 23, 23, 23, -46, 9, 9),
(9, 0, 0, 0, 0, 0, 0, 0, 10, 10),
(10, 0, 0, 0, 0, 0, 0, 0, 11, 11),
(11, 0, 0, 0, 0, 0, 0, 0, 12, 12),
(12, 0, 0, 0, 0, 0, 0, 0, 13, 13),
(13, 0, 0, 0, 0, 0, 0, 0, 14, 14),
(14, 0, 0, 0, 0, 0, 0, 0, 15, 15),
(15, 0, 0, 0, 0, 0, 0, 0, 16, 16),
(16, 0, 0, 0, 0, 0, 0, 0, 17, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `ultimoAcceso` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `usuario`, `password`, `ultimoAcceso`) VALUES
(1, 'Jefe', 'Jefe', '2018-05-25 20:26:45'),
(2, 'Supervisor', 'Supervisor', '2018-05-23 23:43:07'),
(3, 'Ejecutor', 'Ejecutor', '2018-05-22 19:41:02');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alertas`
--
ALTER TABLE `alertas`
  ADD PRIMARY KEY (`idAlerta`);

--
-- Indices de la tabla `Cotizacion_INSS`
--
ALTER TABLE `Cotizacion_INSS`
  ADD PRIMARY KEY (`idCotizacion_INSS`,`Datos_Personales_ID`,`Datos_Personales_ID1`),
  ADD KEY `fk_Cotizacion_INSS_Datos_Personales1_idx` (`Datos_Personales_ID1`);

--
-- Indices de la tabla `Datos_Bancarios`
--
ALTER TABLE `Datos_Bancarios`
  ADD PRIMARY KEY (`ID_DatosBancarios`,`Datos_Personales_ID`),
  ADD KEY `fk_Datos_Bancarios_Datos_Personales_idx` (`Datos_Personales_ID`);

--
-- Indices de la tabla `Datos_Personales`
--
ALTER TABLE `Datos_Personales`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `Pago_Mensual`
--
ALTER TABLE `Pago_Mensual`
  ADD PRIMARY KEY (`idPago_Mensual`,`Cotizacion_INSS_idCotizacion_INSS`,`Cotizacion_INSS_Datos_Personales_ID`),
  ADD KEY `fk_Pago_Mensual_Cotizacion_INSS1_idx` (`Cotizacion_INSS_idCotizacion_INSS`,`Cotizacion_INSS_Datos_Personales_ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alertas`
--
ALTER TABLE `alertas`
  MODIFY `idAlerta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `Cotizacion_INSS`
--
ALTER TABLE `Cotizacion_INSS`
  MODIFY `idCotizacion_INSS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `Datos_Bancarios`
--
ALTER TABLE `Datos_Bancarios`
  MODIFY `ID_DatosBancarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `Datos_Personales`
--
ALTER TABLE `Datos_Personales`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `Pago_Mensual`
--
ALTER TABLE `Pago_Mensual`
  MODIFY `idPago_Mensual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Cotizacion_INSS`
--
ALTER TABLE `Cotizacion_INSS`
  ADD CONSTRAINT `fk_Cotizacion_INSS_Datos_Personales1` FOREIGN KEY (`Datos_Personales_ID1`) REFERENCES `Datos_Personales` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Datos_Bancarios`
--
ALTER TABLE `Datos_Bancarios`
  ADD CONSTRAINT `fk_Datos Bancarios_Datos_Personales` FOREIGN KEY (`Datos_Personales_ID`) REFERENCES `Datos_Personales` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Pago_Mensual`
--
ALTER TABLE `Pago_Mensual`
  ADD CONSTRAINT `fk_Pago_Mensual_Cotizacion_INSS1` FOREIGN KEY (`Cotizacion_INSS_idCotizacion_INSS`,`Cotizacion_INSS_Datos_Personales_ID`) REFERENCES `Cotizacion_INSS` (`idCotizacion_INSS`, `Datos_Personales_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;


--
-- Metadatos
--
USE `phpmyadmin`;

--
-- Metadatos para la tabla alertas
--

--
-- Volcado de datos para la tabla `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'contratos', 'alertas', '{\"CREATE_TIME\":\"2018-05-21 11:24:18\",\"sorted_col\":\"`alertaTratada`  DESC\"}', '2018-05-22 17:55:32');

--
-- Metadatos para la tabla Cotizacion_INSS
--

--
-- Metadatos para la tabla Datos_Bancarios
--

--
-- Metadatos para la tabla Datos_Personales
--

--
-- Metadatos para la tabla Pago_Mensual
--

--
-- Metadatos para la tabla usuarios
--

--
-- Metadatos para la base de datos contratos
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
