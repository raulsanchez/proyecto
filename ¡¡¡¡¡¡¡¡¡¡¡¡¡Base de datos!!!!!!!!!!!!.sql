-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-02-2013 a las 02:49:22
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyecto`
--
CREATE DATABASE `proyecto` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `proyecto`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `adm_Rut` varchar(10) NOT NULL,
  `adm_Nombre` varchar(30) DEFAULT NULL,
  `adm_Apellido_Pat` varchar(20) DEFAULT NULL,
  `adm_Apellido_Mat` varchar(20) DEFAULT NULL,
  `adm_Fecha_Nac` date DEFAULT NULL,
  `adm_Telefono` int(11) DEFAULT NULL,
  `adm_Sexo` tinyint(1) DEFAULT NULL,
  `adm_Clave` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`adm_Rut`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`adm_Rut`, `adm_Nombre`, `adm_Apellido_Pat`, `adm_Apellido_Mat`, `adm_Fecha_Nac`, `adm_Telefono`, `adm_Sexo`, `adm_Clave`) VALUES
('1', 'Administrador', 'Apa Administrador', 'Ama Administrador', '1990-09-10', 112233, 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disponibilidad_turno`
--

CREATE TABLE IF NOT EXISTS `disponibilidad_turno` (
  `dt_id` int(11) NOT NULL AUTO_INCREMENT,
  `dt_fecha` date NOT NULL,
  `dt_hora` tinyint(4) DEFAULT NULL,
  `dt_cupo` int(11) DEFAULT NULL,
  PRIMARY KEY (`dt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `disponibilidad_turno`
--

INSERT INTO `disponibilidad_turno` (`dt_id`, `dt_fecha`, `dt_hora`, `dt_cupo`) VALUES
(1, '2012-12-12', 1, 5),
(2, '2012-12-12', 2, 7),
(3, '2012-12-12', 3, 8),
(4, '2012-12-12', 4, 12),
(5, '2012-12-14', 4, 12),
(6, '2012-12-14', 1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE IF NOT EXISTS `mensaje` (
  `co_id_mensaje` int(11) NOT NULL AUTO_INCREMENT,
  `co_mensaje` text,
  `co_asunto` varchar(200) DEFAULT NULL,
  `co_timesmap` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`co_id_mensaje`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`co_id_mensaje`, `co_mensaje`, `co_asunto`, `co_timesmap`) VALUES
(1, 'Mensaje de prueba', 'Asunto del mensaje', '0000-00-00 00:00:00'),
(2, 'Mensaje de prueba', 'Asunto del mensaje', '0000-00-00 00:00:00'),
(3, 'prueba', 'hola', '2012-12-11 09:45:30'),
(4, 'prueba', 'hola', '2012-12-11 09:46:04'),
(5, 'prueba', 'hola', '2012-12-11 09:46:07'),
(6, 'prueba', 'hola', '2012-12-11 09:46:11'),
(7, 'prueba', 'hola', '2012-12-11 09:47:28'),
(8, '', '', '2012-12-11 09:47:40'),
(9, 'asdasd', 'hola', '2012-12-11 09:47:50'),
(10, 'sadasd', 'hola', '2012-12-11 09:48:19'),
(11, 'sadasd', 'hola', '2012-12-11 09:49:02'),
(12, 'sadasd', 'hola', '2012-12-11 09:50:24'),
(13, 'sadasd', 'hola', '2012-12-11 09:50:37'),
(14, 'sadasd', 'hola', '2012-12-11 09:52:04'),
(15, 'sadasd', 'hola', '2012-12-11 09:52:19'),
(16, 'sadasd', 'hola', '2012-12-11 09:53:21'),
(17, 'sadasd', 'hola', '2012-12-11 09:53:57'),
(18, 'sadasd', 'hola', '2012-12-11 09:55:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje_usuario`
--

CREATE TABLE IF NOT EXISTS `mensaje_usuario` (
  `mu_id` int(11) NOT NULL AUTO_INCREMENT,
  `mu_id_msj` int(11) DEFAULT NULL,
  `mu_Rut_Us` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`mu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `mensaje_usuario`
--

INSERT INTO `mensaje_usuario` (`mu_id`, `mu_id_msj`, `mu_Rut_Us`) VALUES
(1, 18, '1'),
(2, 18, '16564612-6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suspencion`
--

CREATE TABLE IF NOT EXISTS `suspencion` (
  `su_id_Suspencion` int(11) NOT NULL,
  `su_id_Turno` int(11) DEFAULT NULL,
  `su_Rut_Us` varchar(10) DEFAULT NULL,
  `su_Desde` date DEFAULT NULL,
  `su_Hasta` date DEFAULT NULL,
  PRIMARY KEY (`su_id_Suspencion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `suspencion`
--

INSERT INTO `suspencion` (`su_id_Suspencion`, `su_id_Turno`, `su_Rut_Us`, `su_Desde`, `su_Hasta`) VALUES
(0, NULL, '1212', '2012-12-10', '2012-12-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE IF NOT EXISTS `turno` (
  `tu_id_Turno` int(11) NOT NULL AUTO_INCREMENT,
  `tu_Rut_Us` varchar(10) DEFAULT NULL,
  `tu_Hora` tinyint(4) DEFAULT NULL,
  `tu_Fecha` date NOT NULL,
  `tu_Asistencia` tinyint(1) DEFAULT NULL,
  `tu_timesmap` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Turnocol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`tu_id_Turno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `turno`
--

INSERT INTO `turno` (`tu_id_Turno`, `tu_Rut_Us`, `tu_Hora`, `tu_Fecha`, `tu_Asistencia`, `tu_timesmap`, `Turnocol`) VALUES
(1, '16564612-6', 1, '2012-12-12', NULL, '0000-00-00 00:00:00', NULL),
(2, '16564612-6', 3, '2012-12-12', NULL, '2012-12-11 06:51:30', NULL),
(3, '16564612-6', 1, '2012-12-14', NULL, '0000-00-00 00:00:00', NULL),
(4, '16564612-6', 3, '2012-12-14', NULL, '0000-00-00 00:00:00', NULL),
(5, '16564612-6', 1, '2012-12-12', NULL, '2012-12-13 06:32:38', NULL),
(6, '16564612-6', 3, '2012-12-12', NULL, '2012-12-13 06:32:47', NULL),
(7, '16564612-6', 0, '2012-12-12', NULL, '2012-12-13 06:32:54', NULL),
(8, '16564612-6', 1, '2012-12-12', NULL, '2012-12-13 06:33:18', NULL),
(9, '16564612-6', 1, '2012-12-12', NULL, '2012-12-13 06:33:31', NULL),
(10, '16564612-6', 1, '2012-12-12', NULL, '2012-12-13 06:33:36', NULL),
(11, '16564612-6', 1, '2012-12-12', NULL, '2012-12-13 06:34:31', NULL),
(12, '16564612-6', 1, '2012-12-14', NULL, '2012-12-13 06:34:45', NULL),
(13, '16564612-6', 1, '2012-12-14', NULL, '2012-12-13 06:34:55', NULL),
(14, '1', 1, '2012-12-14', NULL, '2012-12-13 06:36:20', NULL),
(15, '1', 1, '2012-12-14', NULL, '2012-12-13 06:36:27', NULL),
(16, '1', 1, '2012-12-14', NULL, '2012-12-13 06:36:56', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `us_Rut` varchar(10) NOT NULL,
  `us_Nombre` varchar(30) DEFAULT NULL,
  `us_Apellido_Pat` varchar(20) DEFAULT NULL,
  `us_Apellido_Mat` varchar(20) DEFAULT NULL,
  `us_Fecha_Nac` date DEFAULT NULL,
  `us_Telefono` int(11) DEFAULT NULL,
  `us_Direccion` text,
  `us_Sexo` tinyint(1) DEFAULT NULL,
  `us_Tipo` tinyint(1) DEFAULT NULL,
  `us_Clave` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`us_Rut`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`us_Rut`, `us_Nombre`, `us_Apellido_Pat`, `us_Apellido_Mat`, `us_Fecha_Nac`, `us_Telefono`, `us_Direccion`, `us_Sexo`, `us_Tipo`, `us_Clave`) VALUES
('1', 'aslkdj', 'lkajhsals', ' kjasdhfl', '2012-12-13', 123123, 'isabel rodas', 1, 0, '2'),
('1212', 'nombre', 'apaterno', 'amaterno', '1990-05-18', 21412, 'dsafsdfa', 0, 1, '1'),
('16564612-6', 'marko ', 'vivar', 'toledo', '1987-10-14', 81734592, 'isabel rodas # 286 las animas', 0, 0, '19871014'),
('2', '2', '2', '2', '0000-00-00', 2, '2', 0, 0, '2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
