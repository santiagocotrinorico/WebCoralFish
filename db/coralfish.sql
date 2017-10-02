-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-05-2017 a las 02:16:43
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `coralfish`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `usuario` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`usuario`, `password`) VALUES
('coralfish', '39a795f32308c1aedc5007b94849803e');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carriles`
--

CREATE TABLE IF NOT EXISTS `carriles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_carriles` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `carriles`
--

INSERT INTO `carriles` (`id`, `num_carriles`) VALUES
(1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(6, '6 años'),
(7, '7 años'),
(8, '8 años'),
(9, '9 años'),
(10, '10 años'),
(11, '11 años'),
(12, '12 años'),
(13, '13 años'),
(14, '14 años'),
(15, '15 años'),
(16, '16 años'),
(17, '17 & 18 años'),
(19, '19 & OVER ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_com`
--

CREATE TABLE IF NOT EXISTS `categoria_com` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` int(11) NOT NULL,
  `identificacion` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clubs`
--

CREATE TABLE IF NOT EXISTS `clubs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `club` varchar(80) NOT NULL,
  `abreviatura` varchar(7) NOT NULL,
  `liga` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Volcado de datos para la tabla `clubs`
--

INSERT INTO `clubs` (`id`, `club`, `abreviatura`, `liga`, `usuario`, `password`) VALUES
(1, 'ACADEMIA ATLÁNTICO', 'ACAA', 4, 'academia.atlantico', '066f15de2224a54fa9000133942e8d40'),
(2, 'ACUARIOS TOLIMA', 'ACUT', 30, 'acuarios.tolima', '7aa285ff990cfad13752e2d035bd4e56'),
(3, 'ACUARIOS YOPAL', 'ACUY', 10, 'acuarios.yopal', 'acuy123'),
(4, 'ALAQUA', 'ALAQ', 21, 'alaqua', 'alaq123'),
(5, 'ENDURANCE TEAM', 'END', 5, 'endurance.team', 'end123'),
(6, 'ASTROS', 'ASTV', 31, 'astros.valle', 'astv123'),
(7, 'BUHOS', 'BUHO', 5, 'buhos', 'buho123'),
(8, 'CALAMARES ANTIOQUIA', 'CALA', 2, 'calamares.antioquia', 'cala123'),
(9, 'CARIBES ACUÁTICOS', 'CARA', 21, 'caribes.acuaticos', 'cara123'),
(10, 'CLUB MILITAR', 'CMIL', 5, 'club.militar', 'cmil123'),
(11, 'COLDEMETA', 'COLD', 21, 'coldemeta', 'cold123'),
(12, 'COLSUBSIDIO', 'COLS', 5, 'colsubsidio', 'cols123'),
(13, 'COMPENSAR', 'COMP', 5, 'compensar', 'comp123'),
(14, 'CONGENTE', 'CONM', 21, 'congente', 'conm123'),
(15, 'CORAL FISH', 'CRFM', 21, 'coral.fish', 'alnasaor'),
(16, 'CORPORACIÓN CLUB META', 'CCME', 21, 'club.meta', 'ccme123'),
(17, 'CORPORACIÓN CLUB VILLAVICENCIO', 'CCVI', 21, 'club.villavicencio', 'ccvi123'),
(18, 'CRPV', 'CRPV', 31, 'crpv', 'crpv123'),
(19, 'DELFINES DEL LLANO', 'DELL', 21, 'delfines.llano', 'dell123'),
(20, 'DELFINES DEL VALLE', 'DELV', 21, 'delfines.valle', 'delv123'),
(21, 'DIBRANQUIUS', 'DIBR', 15, 'dibranquis', 'dibr123'),
(22, 'DUHUEI', 'DUHU', 7, 'duhuei', 'duhu123'),
(23, 'ESCUELA MILITAR', 'ESMI', 5, 'escuela.militar', 'esmi123'),
(24, 'ESCUELA NAVAL DE CADETES', 'ENAP', 5, 'escuela.naval', 'enap123'),
(25, 'ESCUELA POLICÍA GENERAL SANTANDER ', 'ECSA', 5, 'escuela.policia', 'ecsa123'),
(26, 'ESTRELLAS ANTIOQUIA', 'ESTR', 2, 'estrellas.antioquia', 'estr123'),
(27, 'ESTRELLAS DEL META', 'ELLM', 21, 'estrellas.meta', 'ellm123'),
(28, 'FENIX BOGOTÁ', 'FENB', 5, 'fenix.bogota', 'fenb123'),
(29, 'FLAMINGOS META', 'FLMM', 21, 'flamingos.meta', 'flmm123'),
(30, 'FLAMINGOS RISARALDA', 'FLAM', 26, 'flamingos.risaralda', 'flam123'),
(31, 'H2O ANTIOQUIA', 'H2OA', 2, 'h2o.antioquia', 'h2oa123'),
(32, 'HURACANES ANTIOQUIA', 'HURA', 2, 'huracanes.antioquia', 'hura123'),
(33, 'HURACANES DEL META', 'HURM', 21, 'huracanes.meta', 'hurm123'),
(34, 'KRONOS', 'KRON', 5, 'kronos.bogota', 'kron123'),
(35, 'LA FONTANA', 'FONT', 21, 'fontana', 'font123'),
(36, 'NAUTILUS BOGOTÁ', 'NAUT', 5, 'nautilus.bogota', 'naut123'),
(37, 'NAVEGANTES VALLE', 'NAVV', 31, 'navegantes.valle', 'navv123'),
(38, 'NEPTUNO BOYACÁ', 'NPTB', 7, 'neptuno.boyaca', 'nptb123'),
(39, 'NUTRIAS META', 'NUTM', 21, 'nutrias.meta', 'nutm123'),
(40, 'ORCAS CAUCA', 'ORCU', 11, 'orcas.cauca', 'orcu123'),
(41, 'PERFORMANCE ACACÍAS', 'PERF', 21, 'performance.acacias', 'perf123'),
(42, 'POSEIDÓN VALLE', 'POSV', 31, 'poseidon.valle', 'posv123'),
(43, 'RINCON DE CAJICA', 'RIN', 5, 'rincon.cajica', 'rin123'),
(44, 'SHARK SANTANDER', 'SHAR', 28, 'shark.santander', 'shar123'),
(45, 'TIBURONES TOLIMA', 'TIBT', 30, 'tiburones.tolima', 'tibt123'),
(46, 'VELAS RESTREPO', 'VELM', 21, 'velas.meta', 'velm123'),
(47, 'VITAL ENERGY META', 'VITM', 21, 'vital.energy', 'vitm123'),
(48, 'PIRANAS META', 'PIRM', 21, 'piranas.meta', 'pirm123'),
(49, 'LIGA DEL META', 'LIGM', 21, 'liga.meta', 'ligm123'),
(51, 'GURAMI CLUB ', 'GURB', 5, 'gurami.bogota', 'gurb123'),
(52, 'CORAL FISH', 'CRFM', 21, 'coral.fish', '4c25b6b738023ccf45e3e996ad6a2efb');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competencia`
--

CREATE TABLE IF NOT EXISTS `competencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `club` int(11) NOT NULL,
  `competidor` varchar(10) NOT NULL,
  `prueba` int(11) NOT NULL,
  `tiempo` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=215 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competidor`
--

CREATE TABLE IF NOT EXISTS `competidor` (
  `identificacion` varchar(10) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(80) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `fecha_nacimineto` date NOT NULL,
  `genero` char(1) NOT NULL,
  `nombre_contacto` varchar(100) DEFAULT NULL,
  `telefono_contacto` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`identificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `competidor`
--

INSERT INTO `competidor` (`identificacion`, `nombres`, `apellidos`, `email`, `telefono`, `fecha_nacimineto`, `genero`, `nombre_contacto`, `telefono_contacto`) VALUES
('242381935', 'Porter', 'Flatley', 'sylvan34@yahoo.com', '(877) 876-4581', '2015-11-01', 'm', '', ''),
('276067035', 'Damaris', 'Schmeler', 'travon.turner@gmail.com', '800-576-3105', '1984-07-17', 'f', '', ''),
('3333', 'ana cleotide', 'falda', '', '', '2005-02-03', 'f', '', ''),
('358272939', 'Alivia', 'Von', 'domingo.dach@pfeffer.org', '800-213-8218', '2004-02-07', 'f', '', ''),
('423327057', 'Emely', 'Lang', 'hubert.rodriguez@botsford.com', '1-800-661-9684', '1997-07-10', 'f', '', ''),
('612616234', 'Janiya', 'Heidenreich', 'reginald.borer@cormier.biz', '855.229.5194', '1996-08-08', 'f', '', ''),
('730434875', 'Edwardo', 'Streich', 'bailey.addison@yahoo.com', '800-428-7322', '1984-09-20', 'm', '', ''),
('819311456', 'Kaylah', 'Rath', 'sadye.keeling@lueilwitz.com', '888.959.0639', '2016-01-04', 'f', '', ''),
('821790215', 'Wayne', 'Runte', 'brenda.greenholt@bergstrom.org', '855.492.5506', '2003-05-12', 'm', '', ''),
('837992873', 'Cierra', 'Wolf', 'maribel.schaden@gmail.com', '(855) 944-3576', '1981-03-14', 'f', '', ''),
('877444707', 'Evangeline', 'Nader', 'cleannon@blick.com', '855.436.1739', '1973-12-10', 'f', '', ''),
('8888', 'ana clastasia', 'camarones prieto', '', '', '2005-02-03', 'f', '', ''),
('904299175', 'Angus', 'OKon', 'jfeest@purdy.com', '1-866-419-7312', '1983-01-02', 'm', '', ''),
('930325080', 'Dorris', 'Thompson', 'zoreilly@beahan.biz', '844-352-2627', '2006-01-30', 'f', '', ''),
('941544989', 'Lenny', 'Legros', 'ashlee.lindgren@gmail.com', '877-736-8032', '2010-08-06', 'm', '', ''),
('959701890', 'Serenity', 'Flatley', 'jacynthe16@turcotte.com', '1-800-779-1696', '1983-05-27', 'f', '', ''),
('983187359', 'Alysa', 'Carroll', 'destinee.armstrong@durgan.com', '855.826.3413', '2001-06-11', 'f', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_pagos`
--

CREATE TABLE IF NOT EXISTS `historial_pagos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` varchar(10) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha` date NOT NULL,
  `valor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `historial_pagos`
--

INSERT INTO `historial_pagos` (`id`, `id_usuario`, `fecha_inicio`, `fecha`, `valor`) VALUES
(4, '112111', '2017-05-19', '2017-05-29', 5000),
(5, '112111', '2017-04-30', '2017-05-10', 2000),
(6, '1', '2017-05-09', '2017-06-12', 2000),
(7, '112111', '2017-05-30', '2017-06-09', 2000),
(8, '112111', '2017-06-10', '2017-06-21', 5000),
(9, '112111', '2017-06-10', '2017-06-20', 3000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornadas`
--

CREATE TABLE IF NOT EXISTS `jornadas` (
  `id` int(11) NOT NULL,
  `jornada` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jornadas`
--

INSERT INTO `jornadas` (`id`, `jornada`) VALUES
(1, 'Jornada 1'),
(2, 'Jornada 2'),
(3, 'Jornada 3'),
(4, 'Jornada 4'),
(5, 'Jornada 5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornadas_pruebas`
--

CREATE TABLE IF NOT EXISTS `jornadas_pruebas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jornada` int(11) NOT NULL,
  `prueba` int(11) NOT NULL,
  `genero` char(1) NOT NULL,
  `categoria` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=124 ;

--
-- Volcado de datos para la tabla `jornadas_pruebas`
--

INSERT INTO `jornadas_pruebas` (`id`, `jornada`, `prueba`, `genero`, `categoria`) VALUES
(61, 1, 1, 'f', 1),
(62, 1, 1, 'm', 1),
(63, 1, 1, 'f', 2),
(64, 1, 1, 'm', 2),
(65, 1, 1, 'm', 3),
(66, 1, 1, 'f', 3),
(67, 1, 2, 'f', 4),
(68, 1, 2, 'm', 4),
(69, 1, 2, 'f', 5),
(70, 1, 2, 'm', 5),
(71, 1, 3, 'f', 1),
(72, 1, 3, 'm', 1),
(73, 1, 3, 'f', 2),
(74, 1, 3, 'm', 2),
(75, 1, 3, 'm', 3),
(76, 1, 3, 'f', 3),
(77, 1, 4, 'f', 4),
(78, 1, 4, 'm', 4),
(79, 1, 4, 'f', 5),
(80, 1, 4, 'm', 5),
(81, 1, 5, 'f', 1),
(82, 1, 5, 'm', 1),
(83, 1, 5, 'f', 2),
(84, 1, 5, 'm', 2),
(85, 1, 5, 'm', 3),
(86, 1, 5, 'f', 3),
(87, 1, 6, 'f', 4),
(88, 1, 6, 'm', 4),
(89, 1, 6, 'f', 5),
(90, 1, 6, 'm', 5),
(91, 1, 7, 'f', 4),
(92, 1, 7, 'f', 5),
(93, 2, 8, 'f', 1),
(94, 2, 8, 'm', 1),
(95, 2, 8, 'f', 2),
(96, 2, 8, 'm', 2),
(97, 2, 8, 'f', 3),
(98, 2, 8, 'm', 3),
(99, 2, 9, 'f', 6),
(100, 2, 9, 'm', 6),
(101, 2, 10, 'f', 1),
(102, 2, 10, 'm', 1),
(103, 2, 10, 'f', 2),
(104, 2, 10, 'm', 2),
(105, 2, 10, 'f', 3),
(106, 2, 10, 'm', 3),
(107, 2, 11, 'f', 4),
(108, 2, 11, 'm', 4),
(109, 2, 11, 'f', 5),
(110, 2, 11, 'm', 5),
(111, 2, 12, 'f', 1),
(112, 2, 12, 'm', 1),
(113, 2, 12, 'f', 2),
(114, 2, 12, 'm', 2),
(115, 2, 12, 'f', 3),
(116, 2, 12, 'm', 3),
(117, 2, 13, 'f', 4),
(118, 2, 13, 'm', 4),
(119, 2, 13, 'f', 5),
(120, 2, 13, 'm', 5),
(121, 2, 14, 'f', 7),
(122, 2, 14, 'f', 4),
(123, 2, 14, 'f', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ligas`
--

CREATE TABLE IF NOT EXISTS `ligas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `liga` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `ligas`
--

INSERT INTO `ligas` (`id`, `liga`) VALUES
(1, 'Amazonas'),
(2, 'Antioquia'),
(3, 'Arauca'),
(4, 'Atlántico'),
(5, 'Bogotá'),
(6, 'Bolívar'),
(7, 'Boyacá'),
(8, 'Caldas'),
(9, 'Caquetá'),
(10, 'Casanare'),
(11, 'Cauca'),
(12, 'Cesar'),
(13, 'Chocó'),
(14, 'Córdoba'),
(15, 'Cundinamarca'),
(16, 'Guainía'),
(17, 'Guaviare'),
(18, 'Huila'),
(19, 'La Guajira'),
(20, 'Magdalena'),
(21, 'Meta'),
(22, 'Nariño'),
(23, 'Norte de Santander'),
(24, 'Putumayo'),
(25, 'Quindío'),
(26, 'Risaralda'),
(27, 'San Andrés y Providencia'),
(28, 'Santander'),
(29, 'Sucre'),
(30, 'Tolima'),
(31, 'Valle'),
(32, 'Vaupés'),
(33, 'Vichada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nombre_categoria`
--

CREATE TABLE IF NOT EXISTS `nombre_categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `nombre_categoria`
--

INSERT INTO `nombre_categoria` (`id`, `nombre`) VALUES
(1, '7 años menores'),
(2, '8 años menores'),
(3, '9 años menores'),
(4, 'Infantiles'),
(5, 'Juveniles y Mayores'),
(6, 'Infantiles, Juveniles y mayores'),
(7, 'Menores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE IF NOT EXISTS `pagos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  `valor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `id_usuario`, `fecha`, `valor`) VALUES
(4, '112111', '2017-06-20', 3000),
(5, '1', '2017-05-12', 2000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebas`
--

CREATE TABLE IF NOT EXISTS `pruebas` (
  `id` int(11) NOT NULL,
  `prueba` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pruebas`
--

INSERT INTO `pruebas` (`id`, `prueba`) VALUES
(1, '25m Patada Libre'),
(2, '100m C.I'),
(3, '25m Patada Mariposa'),
(4, '50m Pecho'),
(5, '25m Patada Espalda'),
(6, '50m Espalda'),
(7, '4x25m C.I'),
(8, '25m Espalda'),
(9, '400m Libre'),
(10, '25m Pecho'),
(11, '50m Libre'),
(12, '25m Libre'),
(13, '50m Mariposa'),
(14, '4x25M Libre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE IF NOT EXISTS `resultados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_jornada_prueba` int(11) NOT NULL,
  `id_competidor` varchar(10) NOT NULL,
  `tiempo` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `union_categorias`
--

CREATE TABLE IF NOT EXISTS `union_categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_nombre` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `forane_union_nombre` (`id_nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `union_categorias`
--

INSERT INTO `union_categorias` (`id`, `id_nombre`, `categoria`) VALUES
(1, 1, 7),
(2, 2, 8),
(3, 3, 9),
(4, 4, 10),
(5, 4, 11),
(6, 4, 12),
(7, 5, 13),
(8, 5, 14),
(9, 5, 15),
(10, 5, 16),
(11, 5, 17),
(12, 5, 18),
(13, 5, 19),
(14, 6, 10),
(15, 6, 11),
(16, 6, 12),
(17, 6, 13),
(18, 6, 14),
(19, 6, 15),
(20, 6, 16),
(21, 6, 17),
(22, 6, 18),
(23, 6, 19),
(24, 7, 7),
(25, 7, 8),
(26, 7, 9);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `union_categorias`
--
ALTER TABLE `union_categorias`
  ADD CONSTRAINT `forane_union_nombre` FOREIGN KEY (`id_nombre`) REFERENCES `nombre_categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
