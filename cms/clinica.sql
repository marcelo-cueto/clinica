-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 21-07-2021 a las 21:40:10
-- Versión del servidor: 8.0.25
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

DROP TABLE IF EXISTS `administradores`;
CREATE TABLE IF NOT EXISTS `administradores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `superadmin` tinyint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `nombres`, `apellidos`, `email`, `clave`, `superadmin`) VALUES
(1, 'Lisandro', 'Olmos', 'admin@mail.com', '1234', 1),
(2, 'Oscar Luis', 'Alzúa', 'admin2@mail.com', '1234', 1),
(3, 'prueba', 'prueba', 'algo@mail.com', '123', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos_titulos`
--

DROP TABLE IF EXISTS `cargos_titulos`;
CREATE TABLE IF NOT EXISTS `cargos_titulos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `destacar` tinyint NOT NULL,
  `profesional_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultores`
--

DROP TABLE IF EXISTS `consultores`;
CREATE TABLE IF NOT EXISTS `consultores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `img_logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `consultores`
--

INSERT INTO `consultores` (`id`, `nombre`, `img_logo`) VALUES
(1, 'Ministerio de Salud, Argentina', 'min_salud.png'),
(2, 'Centro de Rehabilitación Integra, San Luis, Argentina', 'integra.png'),
(4, 'Cerenif, Asunción, Paraguay', 'cerenif.png'),
(5, 'Neurocet, Rio Cuarto, Cordoba, Argentina', 'neurocet.png'),
(6, 'Hospital León Morra, Cordoba, Argentina', 'morra.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

DROP TABLE IF EXISTS `equipos`;
CREATE TABLE IF NOT EXISTS `equipos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `funcionalidad` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `nombre`, `funcionalidad`, `descripcion`, `foto`) VALUES
(21, '4', 'fafa', 'hh', ''),
(17, 'algo', 'algo2', 'ii', ''),
(16, 'algo', 'algo2', 'uu', ''),
(22, '4', 'algo', '', 'integra.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

DROP TABLE IF EXISTS `especialidades`;
CREATE TABLE IF NOT EXISTS `especialidades` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades_profesionales`
--

DROP TABLE IF EXISTS `especialidades_profesionales`;
CREATE TABLE IF NOT EXISTS `especialidades_profesionales` (
  `id` int NOT NULL AUTO_INCREMENT,
  `especialidad_id` int NOT NULL,
  `profesional_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `especialidad_id` (`especialidad_id`),
  KEY `profesional_id` (`profesional_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesionales`
--

DROP TABLE IF EXISTS `profesionales`;
CREATE TABLE IF NOT EXISTS `profesionales` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `dni` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `grado_academico` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `director` tinyint NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `profesionales`
--

INSERT INTO `profesionales` (`id`, `nombres`, `apellidos`, `dni`, `grado_academico`, `director`, `foto`) VALUES
(1, 'Lisandro', 'Olmos', '111', 'Dr.', 1, ''),
(2, 'Oscar Luis', 'Alzúa', '112', 'Klgo.', 1, ''),
(3, 'Eduardo', 'Segal', '1113', 'Dr.', 0, ''),
(4, 'Eduardo', 'Samara', '1114', 'Dr.', 0, ''),
(5, 'Gustavo', 'Garrido', '1115', 'Dr.', 0, ''),
(6, 'María Higinia', 'Guidoni', '1116', '', 0, ''),
(7, 'Cecilia', 'Taddei Hraste', '1117', '', 0, ''),
(8, 'Diego Alejandro', 'Passuni', '1118', '', 0, ''),
(9, 'María Fernanda', 'Raposeiras', '1119', '', 0, ''),
(10, 'Nelida', 'Sisi', '1120', '', 0, ''),
(11, 'Marina', 'Alzúa', '1121', '', 0, ''),
(12, 'Vania', 'Libedinski', '1122', 'Lic', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamientos`
--

DROP TABLE IF EXISTS `tratamientos`;
CREATE TABLE IF NOT EXISTS `tratamientos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
