-- phpMyAdmin SQL Dump
-- version 4.0.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-03-2014 a las 03:00:07
-- Versión del servidor: 5.5.33-MariaDB
-- Versión de PHP: 5.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `SICADA`
--
CREATE DATABASE IF NOT EXISTS `SICADA` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `SICADA`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_docentes`
--

DROP TABLE IF EXISTS `asignacion_docentes`;
CREATE TABLE IF NOT EXISTS `asignacion_docentes` (
  `id_asignacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_docente` int(11) NOT NULL,
  `id_director_carrera` int(11) NOT NULL,
  PRIMARY KEY (`id_asignacion`),
  KEY `fk_asignacion_docentes_Docentes1_idx` (`id_docente`),
  KEY `fk_asignacion_docentes_director_carrera1_idx` (`id_director_carrera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

DROP TABLE IF EXISTS `carreras`;
CREATE TABLE IF NOT EXISTS `carreras` (
  `id_carrera` int(11) NOT NULL AUTO_INCREMENT,
  `clave` varchar(10) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_carrera`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id_carrera`, `clave`, `nombre`) VALUES
(1, 'CDP', 'Carrera de Prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases_impartidas`
--

DROP TABLE IF EXISTS `clases_impartidas`;
CREATE TABLE IF NOT EXISTS `clases_impartidas` (
  `id_imparticion` int(11) NOT NULL AUTO_INCREMENT,
  `id_docente` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `clave_grupo` varchar(10) NOT NULL,
  `id_director_carrera` int(11) NOT NULL,
  `dia` int(11) DEFAULT NULL,
  `numero_bloque` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_imparticion`),
  KEY `fk_clases_impartidas_docentes1_idx` (`id_docente`),
  KEY `fk_clases_impartidas_materias1_idx` (`id_materia`),
  KEY `fk_clases_impartidas_grupos1_idx` (`clave_grupo`),
  KEY `fk_clases_impartidas_director_carrera1_idx` (`id_director_carrera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificaciones`
--

DROP TABLE IF EXISTS `clasificaciones`;
CREATE TABLE IF NOT EXISTS `clasificaciones` (
  `id_clasificacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id_clasificacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `clasificaciones`
--

INSERT INTO `clasificaciones` (`id_clasificacion`, `nombre`) VALUES
(1, 'Técnico Docente A'),
(2, 'Técnico Docente B'),
(3, 'Técnico Docente C'),
(4, 'Profesor Tiempo Completo Asociado A'),
(5, 'Profesor Tiempo Completo Asociado B '),
(6, 'Profesor Tiempo Completo Asociado C'),
(7, 'Profesor Tiempo Completo Titular A '),
(8, 'Profesor Tiempo Completo Titular B '),
(9, 'Profesor Tiempo Completo Titular C'),
(10, 'Profesor por Asignatura'),
(11, 'Profesor por Asignatura Administrativo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `director_carrera`
--

DROP TABLE IF EXISTS `director_carrera`;
CREATE TABLE IF NOT EXISTS `director_carrera` (
  `id_director_carrera` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `estado_alta` tinyint(4) DEFAULT NULL,
  `fecha_alta` date DEFAULT NULL,
  `fecha_baja` date DEFAULT NULL,
  `clave_carrera` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_director_carrera`),
  KEY `fk_director_carrera_carreras1_idx` (`clave_carrera`),
  KEY `fk_director_carrera_usuarios1_idx` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `director_carrera`
--

INSERT INTO `director_carrera` (`id_director_carrera`, `nombre`, `telefono`, `estado_alta`, `fecha_alta`, `fecha_baja`, `clave_carrera`, `id_usuario`) VALUES
(1, 'Elizabeth Navarro', '3331445454', 1, '2014-03-13', NULL, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

DROP TABLE IF EXISTS `docentes`;
CREATE TABLE IF NOT EXISTS `docentes` (
  `id_docente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `id_clasificacion` int(11) DEFAULT NULL,
  `id_nivel_profesional` int(11) DEFAULT NULL,
  `estado_contratacion` varchar(15) DEFAULT NULL,
  `tutor` tinyint(4) DEFAULT NULL,
  `investigador` tinyint(4) DEFAULT NULL,
  `estado_alta` tinyint(4) DEFAULT NULL,
  `fecha_alta` date DEFAULT NULL,
  `fecha_baja` date DEFAULT NULL,
  `id_carrera` int(11) NOT NULL,
  `minutos_ocupados` int(11) DEFAULT NULL,
  `carrera_profesional` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_docente`),
  KEY `fk_docentes_carreras1_idx` (`id_carrera`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id_docente`, `nombre`, `id_clasificacion`, `id_nivel_profesional`, `estado_contratacion`, `tutor`, `investigador`, `estado_alta`, `fecha_alta`, `fecha_baja`, `id_carrera`, `minutos_ocupados`, `carrera_profesional`) VALUES
(1, 'Kevin Perez', 1, 1, 'CONTRATADO', 0, 0, 1, '2014-03-13', NULL, 1, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

DROP TABLE IF EXISTS `grupos`;
CREATE TABLE IF NOT EXISTS `grupos` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `clave` varchar(10) NOT NULL,
  `cuatrimestre` int(11) DEFAULT NULL,
  `clave_carrera` varchar(10) NOT NULL,
  PRIMARY KEY (`id_grupo`),
  KEY `fk_grupos_carreras1_idx` (`clave_carrera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

DROP TABLE IF EXISTS `materias`;
CREATE TABLE IF NOT EXISTS `materias` (
  `id_materia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `cuatrimestre` int(11) DEFAULT NULL,
  `clave_carrera` varchar(10) NOT NULL,
  PRIMARY KEY (`id_materia`),
  KEY `fk_materias_carreras1_idx` (`clave_carrera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_profesional`
--

DROP TABLE IF EXISTS `nivel_profesional`;
CREATE TABLE IF NOT EXISTS `nivel_profesional` (
  `id_nivel_profesional` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id_nivel_profesional`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `nivel_profesional`
--

INSERT INTO `nivel_profesional` (`id_nivel_profesional`, `nombre`) VALUES
(1, 'Licenciatura'),
(2, 'Maestría en proceso'),
(3, 'Maestría'),
(4, 'Doctorado en proceso'),
(5, 'Doctorado'),
(6, 'Post-doctorado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rangos_horarios`
--

DROP TABLE IF EXISTS `rangos_horarios`;
CREATE TABLE IF NOT EXISTS `rangos_horarios` (
  `id_rango` int(11) NOT NULL AUTO_INCREMENT,
  `clave_grupo` varchar(10) NOT NULL,
  `dia` int(11) NOT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_termino` time DEFAULT NULL,
  `receso_inicio` time DEFAULT NULL,
  `receso_duracion` int(11) DEFAULT NULL,
  `duracion_bloque` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_rango`),
  KEY `fk_rangos_horarios_grupos1_idx` (`clave_grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `contrasena` varchar(45) NOT NULL,
  `id_rol` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_usuarios_usuarios_roles1_idx` (`id_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `contrasena`, `id_rol`) VALUES
(1, 'kevin', 'ffb4761cba839470133bee36aeb139f58d7dbaa9', 1),
(2, 'daniel', '3d0f3b9ddcacec30c4008c5e030e6c13a478cb4f', 2),
(3, 'sara', 'dea04453c249149b5fc772d9528fe61afaf7441c', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_roles`
--

DROP TABLE IF EXISTS `usuarios_roles`;
CREATE TABLE IF NOT EXISTS `usuarios_roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuarios_roles`
--

INSERT INTO `usuarios_roles` (`id_rol`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Secretaría Académica'),
(3, 'Director de carrera');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
