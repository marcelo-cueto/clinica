-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 02-08-2021 a las 00:52:00
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

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
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `destacar` tinyint NOT NULL,
  `profesional_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `profesional_id` (`profesional_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cargos_titulos`
--

INSERT INTO `cargos_titulos` (`id`, `nombre`, `destacar`, `profesional_id`) VALUES
(5, 'Director Médico y Co-fundador de Centro de Rehabilitación Libertador', 0, 1),
(6, 'Egresado de la UBA. Postgrados en Kessler Institute, New Jersey y Rehabilitation Institute of Chicag', 0, 1),
(7, 'Jefe de Residentes en Medicina Médica Interna de CEMIC', 0, 1),
(8, 'Fellow en Neurorehabilitación University of Maryland, Baltimore', 0, 1),
(9, 'Director Médico del Centro de Rehabilitación FLENI, Sede Escobar, desde el 2001 al 2020', 0, 1),
(10, 'Secretario Ejecutivo de International Brain Injury Association (IBIA)', 0, 1),
(11, 'Egresado de la UBA', 0, 2),
(12, 'Adjunto del Servicio de Kinesiología del Hospital Francés del Centro Neurológico Dr. Alfredo Thomson', 0, 2),
(13, 'Kinesiólogo del equipo de neurocirugía a cargo del Dr. Prof. Juan Carlos Christensen en IADT', 0, 2),
(14, 'Jefe de Kinesiología Respiratoria y Rehabilitación del Instituto Cardiovascular Buenos Aires', 0, 2),
(15, 'Fundador del servicio de Kinesiología y Rehabilitación en FLENI, Sede Belgrano', 0, 2),
(16, 'Jefe de Servicio de Kinesiología y Terapia ocupacional en FLENI, Sede de Escobar', 0, 2),
(18, 'Médico Egresado de la Universidad de Buenos Aires', 0, 3),
(19, 'Especialista en Neuroortopedia, Deformidades Espinales y Ortopedia Infantil', 0, 3),
(20, 'Médico Egresado de la Universidad de Buenos Aires', 0, 4),
(21, 'Especialista en Neuroortopedia, Ortopedia y Traumatología Infantil y Adultos', 0, 4),
(22, 'Médico Egresado de la Universidad de Buenos Aires', 0, 5),
(23, 'Especialista en Urología', 0, 5),
(24, 'Consultor de la Sociedad Argentina de Urología', 0, 5),
(25, 'Miembro de la International Continence Society ICS, International Neuro Urology Society-INUS y de la \r\n Asociación Latinoamericana de Piso Pelviano', 0, 5),
(26, 'Licenciada en Fonoaudióloga egresada de la Universidad de Buenos Aires', 0, 6),
(27, 'Especialización en Neuropsicología Clínica del Paciente Adulto', 0, 6),
(28, 'Licenciada en Kinesiología y fisiatría egresada de la Universidad de Buenos Aires', 0, 7),
(29, 'Licenciado en Kinesiología y fisiatría egresado de la Universidad Favaloro', 0, 8),
(30, 'Certificaciones internacionales en Vestibular Rehabilitation (University of Pittsburgh and Emory University School of Medicine) y Método McKenzie de diagnóstico y terapia mecánica (Mckenzie Mechanical Diagnosis and Therapy)', 0, 8),
(31, 'Licenciada en Terapia Ocupacional egresada de la Universidad Nacional de San Martín', 0, 9),
(32, 'Secretaria', 0, 10),
(33, 'Licenciada en Psicología', 0, 11),
(34, 'Licenciada en Kinesiología y fisiatría', 0, 12);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `consultores`
--

INSERT INTO `consultores` (`id`, `nombre`, `img_logo`) VALUES
(1, 'Ministerio de Salud', 'min_salud.png'),
(2, 'Centro de Rehabilitacion Integra, San Luis, Argentina', 'integra.png'),
(3, 'Centro Brisas del Plata, Colonia, Uruguay', 'brisas_del_plata.png'),
(4, 'Cerenif, Asunción, Paraguay', 'cerenif.png'),
(5, 'Neurocet, Rio Cuarto, Cordoba, Argentina', 'neurocet.png'),
(6, 'Hospital Leon Morra, Cordoba, Argentina', 'morra.png'),
(7, 'CRIA, Buenos Aires, Argentina', 'cria.png'),
(8, 'Rehab Technology Center, Lujan, Buenos Aires', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `nombre`, `funcionalidad`, `descripcion`, `foto`) VALUES
(1, 'Smart Equitest', 'Herramienta de seguimiento y control de tratamientos', 'Se utiliza para trastornos de equilibrio ya que permite medir la capacidad del SNC (Sistema Nervioso Central) y obtiene información que permite ajustar los ejercicios para cada paciente. También es recomendable para tratar el desorden vestibular.', 'equipo1.jpg'),
(2, 'Tecnología Xcite', 'Rehabilitación intensiva de la marcha', 'Altamente recomendada para la debilidad de los miembros superiores por enfermedades como ACV (Accidente Cerebro Vascular) y rehabilitación intensiva de la marcha ya que es un equipo de Electroterapia farádica FES (estimulación eléctrica funcional) controlado por una computadora para realizar actividades programadas. Puede usarse en miembros superiores o inferiores uni o bilateralmente ya que cuenta con 12 canales de salida.', 'equipo2.jpg'),
(3, 'Motemed VIVA 2', '-', 'La bicicleta servoasistida, a la que se suma electroterapia FES (estimulación eléctrica funcional), está controlada por una computadora permitiendo a un paciente sin actividad motora de MMII pedalear asistido o resistido por el equipo para lograr movilidad y fuerza si su condición neurológica lo permite. Se puede utilizar tanto en miembros superiores como inferiores', 'equipo3.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

DROP TABLE IF EXISTS `especialidades`;
CREATE TABLE IF NOT EXISTS `especialidades` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id`, `nombre`) VALUES
(1, 'Kinesiología'),
(2, 'Clínica médica'),
(3, 'Traumatología'),
(4, 'Psicología'),
(5, 'Ortopedia'),
(6, 'Urología'),
(7, 'Fonoaudiología');

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
  KEY `especialidad_id_profesional_id` (`profesional_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `especialidades_profesionales`
--

INSERT INTO `especialidades_profesionales` (`id`, `especialidad_id`, `profesional_id`) VALUES
(1, 1, 2),
(2, 3, 4),
(3, 5, 4),
(8, 6, 5),
(10, 7, 6),
(11, 1, 7),
(13, 1, 8),
(17, 4, 11),
(18, 1, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesionales`
--

DROP TABLE IF EXISTS `profesionales`;
CREATE TABLE IF NOT EXISTS `profesionales` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `dni` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `grado_academico` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `director` tinyint NOT NULL DEFAULT '0',
  `foto` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `profesionales`
--

INSERT INTO `profesionales` (`id`, `nombres`, `apellidos`, `dni`, `grado_academico`, `director`, `foto`) VALUES
(1, 'Lisandro', 'Olmos', '', 'Dr.', 1, '1627685239.jpg'),
(2, 'Oscar Luis', 'Alzúa', '', 'Klgo.', 1, '1627685475.jpg'),
(3, 'Eduardo', 'Segal', '', 'Dr.', 0, NULL),
(4, 'Eduardo', 'Samara', '', 'Dr.', 0, NULL),
(5, 'Gustavo', 'Garrido', '', 'Dr.', 0, NULL),
(6, 'María Higinia', 'Guidoni', '', '', 0, NULL),
(7, 'Cecilia', 'Taddei Hraste', '', '', 0, NULL),
(8, 'Diego Alejandro', 'Passuni', '', '', 0, NULL),
(9, 'María Fernanda', 'Raposeiras', '', 'Lic.', 0, NULL),
(10, 'Nelida', 'Sisi', '', '', 0, NULL),
(11, 'Marina', 'Alzúa', '', 'Lic.', 0, '1627687681.jpeg'),
(12, 'Vania', 'Libedinsky', '', 'Lic.', 0, '1627687743.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamientos`
--

DROP TABLE IF EXISTS `tratamientos`;
CREATE TABLE IF NOT EXISTS `tratamientos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `programas` tinyint NOT NULL DEFAULT '0',
  `foto` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tratamientos`
--

INSERT INTO `tratamientos` (`id`, `nombre`, `descripcion`, `programas`, `foto`) VALUES
(1, 'Evaluación y entrenamiento tecnológico aplicado a la Neurorehabilitación', 'El aporte de la tecnología aplicada a la rehabilitación es fundamental para que las personas logren mejorar su calidad de vida y reinsertarse socialmente.', 0, 'trat1.jpg'),
(2, 'Laboratorio de rehabilitación de trastornos del equilibrio, balance y riesgo de caídas como disfunciones vestibulares', 'Este método permite diagnósticos que escapan a la simple observación visual y facilita la cuantificación de la alteración.', 0, 'trat2.jpg'),
(3, 'Rehabilitación de la marcha con reducción parcial del peso corporal', 'El objetivo es reeducar la marcha del paciente en una situación segura donde no hay probabilidad de caídas y traumatismos. La técnica consiste en colocar al paciente dentro de un arnés regulable en altura graduando el peso que debe soportar con sus miembros inferiores y por debajo de él se ubica una cinta de caminar.', 0, 'trat3.jpg');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cargos_titulos`
--
ALTER TABLE `cargos_titulos`
  ADD CONSTRAINT `profesional_id` FOREIGN KEY (`profesional_id`) REFERENCES `profesionales` (`id`);

--
-- Filtros para la tabla `especialidades_profesionales`
--
ALTER TABLE `especialidades_profesionales`
  ADD CONSTRAINT `especialidad_id_profesional_id` FOREIGN KEY (`profesional_id`) REFERENCES `profesionales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `especialidades_profesionales_ibfk_1` FOREIGN KEY (`profesional_id`) REFERENCES `profesionales` (`id`),
  ADD CONSTRAINT `especialidades_profesionales_ibfk_2` FOREIGN KEY (`especialidad_id`) REFERENCES `especialidades` (`id`),
  ADD CONSTRAINT `profesional_id_especialidad_id` FOREIGN KEY (`profesional_id`) REFERENCES `profesionales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
