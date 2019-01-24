-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-01-2019 a las 01:36:58
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `personas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
`id` int(11) NOT NULL,
  `prepaga_id` int(11) DEFAULT NULL,
  `puesto_id` int(11) DEFAULT NULL,
  `Nro_legajo` int(11) NOT NULL,
  `Nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Fecha_nacimiento` date NOT NULL,
  `Edad` int(11) NOT NULL,
  `Tipo_doc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Nro_doc` int(11) NOT NULL,
  `Cuil` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Num_celular` int(11) NOT NULL,
  `Mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Fecha_ingreso` date NOT NULL,
  `Fecha_fin` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `prepaga_id`, `puesto_id`, `Nro_legajo`, `Nombre`, `Fecha_nacimiento`, `Edad`, `Tipo_doc`, `Nro_doc`, `Cuil`, `Num_celular`, `Mail`, `Fecha_ingreso`, `Fecha_fin`) VALUES
(1, 1, 1, 12, 'asdasd', '2018-01-01', 12, '0', 321313, '123213', 123213, 'aaa@asas.com', '2018-01-01', '2018-01-01'),
(3, 1, 1, 34, 'dsad', '2018-01-01', 12, '0', 23213123, '21312321', 1232131, 'adsdda@sdfdsfsd.com', '2018-01-01', '2018-01-01'),
(5, 2, 1, 1223, 'sadasd', '2018-01-01', 12, '0', 11111, '1111111', 3424, 'dsd@asdas.com', '2018-01-01', '2018-01-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prepaga`
--

CREATE TABLE IF NOT EXISTS `prepaga` (
`codigo` int(11) NOT NULL,
  `Descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `prepaga`
--

INSERT INTO `prepaga` (`codigo`, `Descripcion`) VALUES
(1, 'aaa'),
(2, 'nnnn');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puesto`
--

CREATE TABLE IF NOT EXISTS `puesto` (
`codigo` int(11) NOT NULL,
  `Descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `puesto`
--

INSERT INTO `puesto` (`codigo`, `Descripcion`) VALUES
(1, 'fggfgf'),
(2, 'fgfgf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacaciones`
--

CREATE TABLE IF NOT EXISTS `vacaciones` (
`id` int(11) NOT NULL,
  `persona_id` int(11) DEFAULT NULL,
  `periodo` int(11) NOT NULL,
  `dias_periodo` int(11) NOT NULL,
  `dias_restantes` int(11) NOT NULL,
  `con_goce` int(11) DEFAULT NULL,
  `sin_goce` int(11) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `vacaciones`
--

INSERT INTO `vacaciones` (`id`, `persona_id`, `periodo`, `dias_periodo`, `dias_restantes`, `con_goce`, `sin_goce`, `fecha_inicio`, `fecha_fin`) VALUES
(3, 1, 2010, 10, 8, 10, NULL, '2010-01-04', '2010-01-12'),
(6, 1, 2003, 12, 10, NULL, NULL, NULL, NULL),
(8, 1, 2004, 12, 10, NULL, NULL, NULL, NULL),
(9, 1, 2005, 12, 10, NULL, NULL, NULL, NULL),
(10, 1, 2006, 15, 5, 10, 20, '2006-01-01', '2006-01-02');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_51E5B69BE2E5392A` (`Nro_legajo`), ADD UNIQUE KEY `UNIQ_51E5B69B3EBEA68E` (`Nro_doc`), ADD UNIQUE KEY `UNIQ_51E5B69BAE47FE9` (`Cuil`), ADD KEY `IDX_51E5B69B4DD583AF` (`prepaga_id`), ADD KEY `IDX_51E5B69B5035E9DA` (`puesto_id`);

--
-- Indices de la tabla `prepaga`
--
ALTER TABLE `prepaga`
 ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `puesto`
--
ALTER TABLE `puesto`
 ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `vacaciones`
--
ALTER TABLE `vacaciones`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `periodo` (`periodo`), ADD KEY `IDX_CAA83E94F5F88DB9` (`persona_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `prepaga`
--
ALTER TABLE `prepaga`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `puesto`
--
ALTER TABLE `puesto`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `vacaciones`
--
ALTER TABLE `vacaciones`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
ADD CONSTRAINT `FK_51E5B69B4DD583AF` FOREIGN KEY (`prepaga_id`) REFERENCES `prepaga` (`codigo`),
ADD CONSTRAINT `FK_51E5B69B5035E9DA` FOREIGN KEY (`puesto_id`) REFERENCES `puesto` (`codigo`);

--
-- Filtros para la tabla `vacaciones`
--
ALTER TABLE `vacaciones`
ADD CONSTRAINT `FK_CAA83E94F5F88DB9` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
