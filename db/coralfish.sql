-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-04-2018 a las 04:25:29
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `coralfish`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
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

CREATE TABLE `carriles` (
  `id` int(11) NOT NULL,
  `num_carriles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carriles`
--

INSERT INTO `carriles` (`id`, `num_carriles`) VALUES
(1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(20) NOT NULL
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
(17, '17 años'),
(18, '18 años'),
(19, '19 & OVER ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_com`
--

CREATE TABLE `categoria_com` (
  `id` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `identificacion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clubs`
--

CREATE TABLE `clubs` (
  `id` int(11) NOT NULL,
  `club` varchar(80) NOT NULL,
  `abreviatura` varchar(7) NOT NULL,
  `liga` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(10, 'CLUB MILITAR', 'CMIL', 5, 'club.militar', 'cmil123'),
(12, 'COLSUBSIDIO', 'COLS', 5, 'colsubsidio', 'cols123'),
(13, 'COMPENSAR', 'COMP', 5, 'compensar', 'comp123'),
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
(28, 'FENIX BOGOTÁ', 'FENB', 5, 'fenix.bogota', 'fenb123'),
(29, 'FLAMINGOS META', 'FLMM', 21, 'flamingos.meta', 'flmm123'),
(30, 'FLAMINGOS RISARALDA', 'FLAM', 26, 'flamingos.risaralda', 'flam123'),
(31, 'H2O ANTIOQUIA', 'H2OA', 2, 'h2o.antioquia', 'h2oa123'),
(32, 'HURACANES ANTIOQUIA', 'HURA', 2, 'huracanes.antioquia', 'hura123'),
(34, 'KRONOS', 'KRON', 5, 'kronos.bogota', 'kron123'),
(35, 'LA FONTANA', 'FONT', 21, 'fontana', 'font123'),
(36, 'NAUTILUS BOGOTÁ', 'NAUT', 5, 'nautilus.bogota', 'naut123'),
(37, 'NAVEGANTES VALLE', 'NAVV', 31, 'navegantes.valle', 'navv123'),
(38, 'NEPTUNO BOYACÁ', 'NPTB', 7, 'neptuno.boyaca', 'nptb123'),
(39, 'NUTRIAS META', 'NUTM', 21, 'nutrias.meta', 'nutm123'),
(40, 'ORCAS CAUCA', 'ORCU', 11, 'orcas.cauca', 'orcu123'),
(42, 'POSEIDÓN VALLE', 'POSV', 31, 'poseidon.valle', 'posv123'),
(43, 'RINCON DE CAJICA', 'RIN', 5, 'rincon.cajica', 'rin123'),
(44, 'SHARK SANTANDER', 'SHAR', 28, 'shark.santander', 'shar123'),
(45, 'TIBURONES TOLIMA', 'TIBT', 30, 'tiburones.tolima', 'tibt123'),
(46, 'VELAS RESTREPO', 'VELM', 21, 'velas.meta', 'velm123'),
(47, 'VITAL ENERGY META', 'VITM', 21, 'vital.energy', 'vitm123'),
(48, 'PIRANAS META', 'PIRM', 21, 'piranas.meta', 'pirm123'),
(51, 'GURAMI CLUB ', 'GURB', 5, 'gurami.bogota', 'gurb123'),
(52, 'CORAL FISH', 'CRFM', 21, 'coral.fish', '4c25b6b738023ccf45e3e996ad6a2efb'),
(53, 'CARIBES ACUÃTICOS', 'CARA', 21, 'caribes.acuaticos', 'fbf81790b8ac216731ad29f14a72e3c1'),
(54, 'OCUMARE', 'OCUM', 10, 'ocumare', '8a941be60cc54cdb051b34b8a945ab85'),
(55, 'CONGENTE', 'CONM', 21, 'congente', '7ced35fd588484836cce9f99f3e3a1d9'),
(56, 'DANIUS', 'DANI', 10, 'danius', '8fc828b696ba1cd92eab8d0a6ffb17d6'),
(57, 'COFREM', 'COFR', 21, 'cofrem', 'b7ec91b9b4800b21c067ed4c0e3798ab'),
(58, 'ESTRELLAS DEL LLANO', 'ELLM', 21, 'estrellas.meta', 'c6c1ccb00e2252bc5381c2e7cebc1698'),
(59, 'DELFINES CUBARRAL', 'DELC', 21, 'delfines.cubarral', '0dcf7c686487bf89acba7c4f493ca89e'),
(60, 'HURACANES DEL META', 'HURM', 21, 'huracanes.meta', '8f15a069e712e04f610a8ee04fcfb944'),
(61, 'LIGA DEL META', 'LIGM', 21, 'liga.meta', 'ac7b890e04bbf54517b850d2a74b18b5'),
(62, 'PERFORMANCE', 'PERF', 21, 'performance.acacias', '4224b148424ec6d593ace3c35c6f1d4b'),
(63, 'ACADEMIA LUIGY', 'ACAL', 21, 'academia.luigy', '1851803edf507ec06ebc883612e9b199'),
(64, 'EL BOSQUE', 'BOSQ', 21, 'bosque', 'dd0f2edd3fc751bad2b56e01fc3922e1'),
(65, 'COLDEMETA', 'COLD', 21, 'coldemeta', '901a80996bb8b4bada7e9df9838fb67c'),
(66, 'CORPOCADEM', 'CORP', 15, 'corpocadem', 'e7d24602acf67197aff621f8cb0dce16'),
(67, 'AGUAS ABIERTAS DE PTO GAITAN', 'AAPG', 21, 'aguas.abiertas', 'e9e3e678325f1fa12b0352be90f7561e'),
(68, 'NUTRIAS', 'NUTR', 21, 'nutrias', 'f945a7acb3fe109f424cc9466c7d257e'),
(69, 'MILLONARIOS', 'MILLOS', 5, 'millonarios', '8630224d5c14116be363b8cc30c56c2e');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competencia`
--

CREATE TABLE `competencia` (
  `id` int(11) NOT NULL,
  `club` int(11) NOT NULL,
  `competidor` varchar(10) NOT NULL,
  `prueba` int(11) NOT NULL,
  `tiempo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competidor`
--

CREATE TABLE `competidor` (
  `identificacion` varchar(10) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(80) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `fecha_nacimineto` date NOT NULL,
  `genero` char(1) NOT NULL,
  `nombre_contacto` varchar(100) DEFAULT NULL,
  `telefono_contacto` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `competidor`
--

INSERT INTO `competidor` (`identificacion`, `nombres`, `apellidos`, `email`, `telefono`, `fecha_nacimineto`, `genero`, `nombre_contacto`, `telefono_contacto`) VALUES
('0100a', 'Frank', 'Torres', '', '', '2004-01-01', 'm', '', ''),
('111111', 'Sara Luna', 'Lizcano', '', '', '2010-01-01', 'f', '', ''),
('1111110', 'David S.', 'Cubides', '', '', '2010-01-01', 'm', '', ''),
('1111112', 'Andres F.', 'Cubides', '', '', '2009-01-01', 'm', '', ''),
('111112', 'Carolina', 'Gonzalez', '', '', '2010-01-01', 'f', '', ''),
('111113', 'Tomas ', 'Lizcano', '', '', '2006-01-01', 'm', '', ''),
('111114', 'Daniel S.', 'Pulido', '', '', '2005-01-01', 'm', '', ''),
('111116', 'Johan D.', 'Buitrago', '', '', '2009-01-01', 'm', '', ''),
('111117', 'Julian', 'MuÃ±oz', '', '', '2009-01-01', 'm', '', ''),
('111118', 'Camilo', 'Castro', '', '', '2008-01-01', 'm', '', ''),
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
('93258', 'Marlon', 'Aguilar', '', '', '2004-01-01', 'm', '', ''),
('941544989', 'Lenny', 'Legros', 'ashlee.lindgren@gmail.com', '877-736-8032', '2010-08-06', 'm', '', ''),
('959701890', 'Serenity', 'Flatley', 'jacynthe16@turcotte.com', '1-800-779-1696', '1983-05-27', 'f', '', ''),
('983187359', 'Alysa', 'Carroll', 'destinee.armstrong@durgan.com', '855.826.3413', '2001-06-11', 'f', '', ''),
('98765432', 'Roger', 'CastaÃ±eda', '', '', '2000-01-01', 'm', '', ''),
('9898989898', 'Sofia', 'Leiva', '', '', '2007-01-01', 'f', '', ''),
('a0002', 'Wilsi ', 'Cadena', '', '', '2010-01-01', 'm', '', ''),
('aapg0001', 'Cristian', 'Prada', '', '', '2004-01-01', 'm', '', ''),
('aapg0002', 'Juan Diego', 'Tovar', '', '', '2009-01-01', 'm', '', ''),
('aapg0003', 'David ', 'Villalobos', '', '', '2010-01-01', 'm', '', ''),
('aapg0005', 'Juan C.', 'Obando', '', '', '2008-01-01', 'm', '', ''),
('aapg0006', 'Yustin', 'Escalante', '', '', '2004-01-01', 'm', '', ''),
('acal0001', 'Fernando', 'Garcia', '', '', '2000-01-01', 'm', '', ''),
('acal0002', 'Omar', 'Alvarado', '', '', '2004-01-01', 'm', '', ''),
('acal0003', 'Jose', 'Noriega', '', '', '2000-01-01', 'm', '', ''),
('ag1234', 'Cristian', 'Hernandez', '', '', '2004-01-01', 'm', '', ''),
('ap22222', 'Davison', 'Aguilar', '', '', '2004-01-01', 'm', '', ''),
('bosq0', 'Juan Jose', 'Esteban', '', '', '2008-01-01', 'm', '', ''),
('bosq0000', 'Sara', 'Angarita', '', '', '2006-01-01', 'f', '', ''),
('bosq0001', 'Maria Jose', 'Perea', '', '', '2004-01-01', 'f', '', ''),
('bosq0002', 'Manuel', 'Mojica', '', '', '2010-01-01', 'm', '', ''),
('bosq0003', 'Kevin', 'CastaÃ±eda', '', '', '2009-01-01', 'm', '', ''),
('bosq0004', 'Felipe', 'Franco', '', '', '2008-01-01', 'm', '', ''),
('bosq0005', 'Nicolle', 'Hernandez', '', '', '2009-01-01', 'f', '', ''),
('bosq0006', 'Jorge', 'Mojica', '', '', '2008-01-01', 'm', '', ''),
('bosq0007', 'Santiago', 'Camargo', '', '', '2008-01-01', 'm', '', ''),
('bosq0008', 'Yoel', 'Useche', '', '', '2006-01-01', 'm', '', ''),
('cara000', 'Sergio', 'Munevar', '', '', '2000-01-01', 'm', '', ''),
('cara0001', 'Juan Diego', 'Botello', '', '', '2008-01-01', 'm', '', ''),
('cara1112', 'Emilio', 'Del Real', '', '', '2010-01-01', 'm', '', ''),
('cara1113', 'Jaime ', 'Ruiz Melo', '', '', '2006-01-01', 'm', '', ''),
('cara1114', 'Tatiana', 'Acosta', '', '', '2006-01-01', 'f', '', ''),
('cara1115', 'Frank', 'Solano', '', '', '2006-01-01', 'm', '', ''),
('cara1116', 'Andres', 'Del Real', '', '', '2006-01-01', 'm', '', ''),
('cara1117', 'Sofia', 'Castro', '', '', '2006-01-01', 'f', '', ''),
('cara1118', 'Nicolas', 'Chivata', '', '', '2006-01-01', 'm', '', ''),
('cara1119', 'Juan F.', 'Santamaria', '', '', '2004-01-01', 'm', '', ''),
('cara1120', 'Isabella', 'Moreno', '', '', '2004-01-01', 'f', '', ''),
('cara1121', 'Dayra', 'Sanchez', '', '', '2007-01-01', 'f', '', ''),
('cara1122', 'Sebastia', 'Valencia', '', '', '2000-01-01', 'm', '', ''),
('cara1123', 'Mitchell', 'Restrepo', '', '', '2000-01-01', 'f', '', ''),
('cara1124', 'Ronald', 'Reina', '', '', '2000-01-01', 'm', '', ''),
('cara1125', 'Juan Pablo', 'Romero', '', '', '2009-01-01', 'm', '', ''),
('cara1126', 'Maria Camila', 'Ojeda', '', '', '2000-01-01', 'f', '', ''),
('cara1127', 'Juan S.', 'Rodriguez', '', '', '2007-01-01', 'm', '', ''),
('cara1128', 'Ariane Krissell', 'Bello', '', '', '2008-01-01', 'f', '', ''),
('cara1129', 'Carlos', 'Beltran', '', '', '2008-01-01', 'm', '', ''),
('cara1130', 'Maria Jose', 'Moreno', '', '', '2008-01-01', 'f', '', ''),
('cara1131', 'Juan Jose', 'Tapias', '', '', '2007-01-01', 'm', '', ''),
('cara1132', 'Ximena', 'Ortiz', '', '', '2000-01-01', 'f', '', ''),
('cofr1111', 'Diego', 'Grimaldo', '', '', '2009-01-01', 'm', '', ''),
('cofr1112', 'Maria Jose', 'Lopez', '', '', '2004-01-01', 'f', '', ''),
('cofr1113', 'Karol', 'Bohorquez', '', '', '2000-01-01', 'f', '', ''),
('cofr1114', 'Dugley', 'Clavijo', '', '', '2000-01-01', 'm', '', ''),
('cofr1115', 'Martin', 'Cespedes', '', '', '2004-01-01', 'm', '', ''),
('cofr1116', 'Jeison', 'Romero', '', '', '2000-01-01', 'm', '', ''),
('cofr1117', 'Angel', 'Guzman', '', '', '2007-01-01', 'm', '', ''),
('cofr1118', 'Juan David', 'Lopez', '', '', '2007-01-01', 'm', '', ''),
('cold0001', 'Valentina', 'Rubio', '', '', '2000-01-01', 'f', '', ''),
('cold0002', 'Juan', 'Paez', '', '', '2004-01-01', 'm', '', ''),
('cold0003', 'James', 'Flores', '', '', '2004-01-01', 'm', '', ''),
('cold0004', 'Gonzalo', 'Naranjo', '', '', '2004-01-01', 'm', '', ''),
('cold0005', 'Mabel', 'Gomez', '', '', '2000-01-01', 'f', '', ''),
('conm111111', 'Sebastian', 'Roldan', '', '', '2010-01-01', 'm', '', ''),
('conm111112', 'Julian', 'Guerrero', '', '', '2006-01-01', 'm', '', ''),
('conm111113', 'Sebastian', 'Giraldo', '', '', '2008-01-01', 'm', '', ''),
('conm111114', 'Miguel', 'Torres', '', '', '2000-01-01', 'm', '', ''),
('conm111115', 'Diego', 'Caceres', '', '', '2000-01-01', 'm', '', ''),
('conm111117', 'Jose', 'Sarmiento', '', '', '2006-01-01', 'm', '', ''),
('conm111119', 'Maria Ximena', 'Pardo', '', '', '2004-01-01', 'f', '', ''),
('conm121212', 'Nicolas', 'Perez', '', '', '2000-01-01', 'm', '', ''),
('conm121213', 'Erick', 'Vargas', '', '', '2007-01-01', 'm', '', ''),
('conm121214', 'cualquier', 'nombre', '', '', '2011-01-01', 'm', '', ''),
('conm121215', 'otra', 'otrico', '', '', '2010-01-01', 'f', '', ''),
('corp0001', 'Katia', 'Manrique', '', '', '2010-01-01', 'f', '', ''),
('corp0003', 'Stefanie', 'Cardona', '', '', '2010-01-01', 'f', '', ''),
('corp0004', 'Roger', 'Hincapie', '', '', '2009-09-02', 'm', '', ''),
('corp0005', 'Nicolas', 'Diaz', '', '', '2009-01-01', 'm', '', ''),
('corp0006', 'Felipe', 'Mora', '', '', '2010-01-01', 'm', '', ''),
('crfm1119', 'David', 'Bogota', '', '', '2008-01-01', 'm', '', ''),
('dani111111', 'Diego', 'Lemus', '', '', '2008-01-01', 'm', '', ''),
('dani111112', 'Santiago', 'Castillo', '', '', '2006-01-01', 'm', '', ''),
('dani111113', 'Mariana', 'Lemus', '', '', '2006-01-01', 'f', '', ''),
('dani111114', 'Holman', 'Avila', '', '', '2006-01-01', 'm', '', ''),
('dani111115', 'Fredy S.', 'Torres', '', '', '2006-01-01', 'm', '', ''),
('dani111116', 'Anderson', 'Toro', '', '', '2002-01-01', 'm', '', ''),
('dani111117', 'Socrates', 'Torres', '', '', '2000-01-01', 'm', '', ''),
('dani111118', 'Juan David', 'Cepeda', '', '', '2003-01-01', 'm', '', ''),
('dani111119', 'Danna', 'Jara Silva', '', '', '2006-01-01', 'f', '', ''),
('dani111120', 'Sergio D.', 'Cardenas', '', '', '2000-01-01', 'm', '', ''),
('delc1111', 'Nicolas', 'Lozano', '', '', '2000-01-01', 'm', '', ''),
('delc1112', 'Javier', 'Lopez', '', '', '2004-01-01', 'm', '', ''),
('delc1113', 'Andres ', 'Garzon', '', '', '2008-01-01', 'm', '', ''),
('ellm1111', 'Maria Paula', 'PiÃ±eros', '', '', '2000-01-01', 'f', '', ''),
('ellm1112', 'Johan', 'Paez', '', '', '2008-01-01', 'm', '', ''),
('ellm1113', 'Sofia', 'Ruiz', '', '', '2006-01-01', 'f', '', ''),
('ellm1114', 'Valeria ', 'Vanoy', '', '', '2010-01-01', 'f', '', ''),
('ellm1115', 'Manuel', 'Hernandez', '', '', '2009-01-01', 'm', '', ''),
('ellm1116', 'Harol', 'Vega', '', '', '2000-01-01', 'm', '', ''),
('ellm1117', 'Caterin', 'Jimenez', '', '', '2000-01-01', 'f', '', ''),
('ellm1118', 'Samuel', 'Montoya', '', '', '2009-01-01', 'm', '', ''),
('ligm0001', 'David', 'Zamora', '', '', '2009-01-01', 'm', '', ''),
('ligm0002', 'Wilson', 'Luna', '', '', '2009-01-01', 'm', '', ''),
('ligm0003', 'Diana', 'Tique', '', '', '2009-01-01', 'f', '', ''),
('ligm0004', 'Felipe', 'Navarro', '', '', '2010-01-01', 'm', '', ''),
('ligm0005', 'Maria Jose', 'Montero', '', '', '2009-01-01', 'f', '', ''),
('ligm0006', 'Nicolas', 'Villanueva', '', '', '2008-01-01', 'm', '', ''),
('ligm0007', 'Andres', 'Rosado', '', '', '2004-01-01', 'm', '', ''),
('ligm0008', 'Pablo ', 'Casallas', '', '', '2007-01-01', 'm', '', ''),
('ligm0009', 'Loriethe', 'Barcenas', '', '', '2004-01-01', 'f', '', ''),
('ligm0010', 'Camilo', 'Gutierrez', '', '', '2010-01-01', 'm', '', ''),
('ligm0011', 'Alejandra', 'Monroy', '', '', '2007-01-01', 'f', '', ''),
('ligm0012', 'Nicoll', 'Saenz', '', '', '2007-01-01', 'f', '', ''),
('ligm0013', 'Juan Jose', 'Bernal', '', '', '2008-01-01', 'm', '', ''),
('ligm0014', 'Jeimer', 'Daza', '', '', '2008-01-01', 'm', '', ''),
('ligm1111', 'Cristian', 'Valencia', '', '', '2000-01-01', 'm', '', ''),
('ligm1112', 'Julian', 'Hernandez', '', '', '2004-01-01', 'm', '', ''),
('ligm1113', 'Santiago', 'Gutierrez', '', '', '2009-01-01', 'm', '', ''),
('ligm1114', 'Andres', 'Molano', '', '', '2007-01-01', 'm', '', ''),
('ligm2221', 'Samuel', 'Gonzalez', '', '', '2008-01-01', 'm', '', ''),
('ligm2222', 'Oscar', 'Reinoso', '', '', '2007-01-01', 'm', '', ''),
('ligm2223', 'Santiago', 'Peralta', '', '', '2004-01-01', 'm', '', ''),
('ligm2224', 'Valentina', 'Diaz', '', '', '2007-01-01', 'f', '', ''),
('millo000', 'Gerarda', 'Bedoya', '', '', '2010-01-01', 'f', '', ''),
('millo001', 'Proculo', 'Rico', '', '', '2008-01-01', 'm', '', ''),
('millo002', 'Andrea', 'Solorzano', '', '', '2010-01-01', 'f', '', ''),
('millo003', 'Suso', 'Jerigna', '', '', '2009-01-01', 'm', '', ''),
('millo004', 'Alerta', 'Rojas', '', '', '2010-01-01', 'm', '', ''),
('nutr0001', 'Manuela', 'Prieto', '', '', '2008-01-01', 'f', '', ''),
('nutr0002', 'Alex', 'Castellanos', '', '', '2008-01-01', 'm', '', ''),
('nutr0003', 'Darwin', 'Aveiga', '', '', '2004-01-01', 'm', '', ''),
('nutr0004', 'Adrian', 'Arias', '', '', '2010-01-01', 'm', '', ''),
('nutr0005', 'Santiago', 'Mondragon', '', '', '2007-01-01', 'm', '', ''),
('nutr0006', 'Laura S.', 'Mondragon', '', '', '2007-01-01', 'f', '', ''),
('nutr1003', 'Angelica', 'Parra', '', '', '2008-01-01', 'f', '', ''),
('ocu1110', 'Nicolas', 'Cuevas', '', '', '2003-01-01', 'm', '', ''),
('ocu1111', 'Mariana', 'Sanchez', '', '', '2008-01-01', 'f', '', ''),
('ocu111111', 'Sirley', 'Mantilla', '', '', '2003-01-01', 'f', '', ''),
('ocu111112', 'Maicol', 'Bustos Martinez', '', '', '2007-01-01', 'm', '', ''),
('ocu111113', 'Yineth', 'Medina Orduz', '', '', '2010-01-01', 'f', '', ''),
('ocu111114', 'Gabriela ', 'Pulido', '', '', '2009-01-01', 'f', '', ''),
('ocu111115', 'Bairon', 'Navarro Rojas', '', '', '2003-01-01', 'm', '', ''),
('ocu111116', 'Paula', 'Gonzalez', '', '', '2008-01-01', 'f', '', ''),
('ocu111117', 'Andres', 'Medina Orduz', '', '', '2008-01-01', 'm', '', ''),
('ocu111118', 'Kevin', 'Cepeda', '', '', '2009-01-01', 'm', '', ''),
('ocu1113', 'Samuel', 'Palacios', '', '', '2009-01-01', 'm', '', ''),
('ocu1114', 'David', 'Cardenas', '', '', '2008-01-01', 'm', '', ''),
('ocu1115', 'David', 'Moreno', '', '', '2000-01-01', 'm', '', ''),
('ocu1116', 'Miguel A.', 'Sanabria', '', '', '2004-03-20', 'm', '', ''),
('ocu1117', 'Juan Gerardo', 'Martinez', '', '', '2009-01-01', 'm', '', ''),
('ocu1118', 'Brayam', 'Barrera', '', '', '2008-01-01', 'm', '', ''),
('perf0000', 'Catalina', 'Castro', '', '', '2004-01-02', 'f', '', ''),
('perf0001', 'Luis E.', 'Leal', '', '', '2010-01-01', 'm', '', ''),
('perf0002', 'Maria A.', 'Gomez', '', '', '2009-01-01', 'f', '', ''),
('perf0003', 'Diego A.', 'Gomez', '', '', '2008-01-01', 'm', '', ''),
('perf0004', 'Juan Julian', 'Lopez', '', '', '2008-01-01', 'm', '', ''),
('q0004', 'Maikol', 'Barrera', '', '', '2007-01-01', 'm', '', ''),
('q0008', 'Edwar', 'Camacho', '', '', '2004-01-01', 'm', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_pagos`
--

CREATE TABLE `historial_pagos` (
  `id` int(11) NOT NULL,
  `id_usuario` varchar(10) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha` date NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `jornadas` (
  `id` int(11) NOT NULL,
  `jornada` varchar(30) NOT NULL
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

CREATE TABLE `jornadas_pruebas` (
  `id` int(11) NOT NULL,
  `jornada` int(11) NOT NULL,
  `prueba` int(11) NOT NULL,
  `genero` char(1) NOT NULL,
  `categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jornadas_pruebas`
--

INSERT INTO `jornadas_pruebas` (`id`, `jornada`, `prueba`, `genero`, `categoria`) VALUES
(149, 1, 1, 'f', 1),
(150, 1, 1, 'm', 1),
(151, 1, 1, 'f', 2),
(152, 1, 1, 'm', 2),
(153, 1, 2, 'f', 1),
(154, 1, 2, 'm', 1),
(155, 1, 2, 'f', 2),
(156, 1, 2, 'm', 2),
(157, 1, 3, 'f', 1),
(158, 1, 3, 'm', 1),
(159, 1, 3, 'f', 2),
(160, 1, 3, 'm', 2),
(161, 1, 4, 'f', 1),
(162, 1, 4, 'm', 1),
(163, 1, 4, 'f', 2),
(164, 1, 4, 'm', 2),
(165, 2, 5, 'f', 3),
(166, 2, 5, 'm', 3),
(167, 2, 4, 'f', 4),
(168, 2, 4, 'm', 4),
(169, 2, 7, 'f', 5),
(170, 2, 7, 'm', 5),
(171, 2, 8, 'f', 6),
(172, 2, 8, 'm', 6),
(173, 2, 8, 'f', 7),
(174, 2, 8, 'm', 7),
(175, 2, 8, 'f', 8),
(176, 2, 8, 'm', 8),
(177, 2, 8, 'f', 9),
(178, 2, 8, 'm', 9),
(179, 2, 8, 'f', 10),
(180, 2, 8, 'm', 10),
(181, 2, 9, 'f', 3),
(182, 2, 9, 'm', 3),
(183, 2, 9, 'f', 4),
(184, 2, 9, 'm', 4),
(185, 2, 10, 'f', 5),
(186, 2, 10, 'm', 5),
(187, 2, 10, 'f', 6),
(188, 2, 10, 'm', 6),
(189, 2, 10, 'f', 7),
(190, 2, 10, 'm', 7),
(191, 2, 10, 'f', 8),
(192, 2, 10, 'm', 8),
(193, 2, 10, 'f', 9),
(194, 2, 10, 'm', 9),
(195, 2, 10, 'f', 10),
(196, 2, 10, 'm', 10),
(197, 2, 11, 'f', 3),
(198, 2, 11, 'm', 3),
(199, 2, 12, 'f', 4),
(200, 2, 12, 'm', 4),
(201, 2, 12, 'f', 5),
(202, 2, 12, 'm', 5),
(203, 2, 12, 'f', 6),
(204, 2, 12, 'm', 6),
(205, 2, 12, 'f', 7),
(206, 2, 12, 'm', 7),
(207, 2, 12, 'f', 8),
(208, 2, 12, 'm', 8),
(209, 2, 12, 'f', 9),
(210, 2, 12, 'm', 9),
(211, 2, 12, 'f', 10),
(212, 2, 12, 'm', 10),
(213, 2, 13, 'f', 11),
(214, 2, 14, 'f', 12),
(215, 3, 15, 'f', 3),
(216, 3, 15, 'm', 3),
(217, 3, 10, 'f', 4),
(218, 3, 10, 'm', 4),
(219, 3, 17, 'f', 5),
(220, 3, 17, 'm', 5),
(221, 3, 18, 'f', 6),
(222, 3, 18, 'm', 6),
(223, 3, 18, 'f', 7),
(224, 3, 18, 'm', 7),
(225, 3, 18, 'f', 8),
(226, 3, 18, 'm', 8),
(227, 3, 18, 'f', 9),
(228, 3, 18, 'm', 9),
(229, 3, 18, 'f', 10),
(230, 3, 18, 'm', 10),
(231, 3, 4, 'f', 3),
(232, 3, 4, 'm', 3),
(233, 3, 19, 'f', 4),
(234, 3, 19, 'm', 4),
(235, 3, 19, 'f', 5),
(236, 3, 19, 'm', 5),
(237, 3, 19, 'f', 6),
(238, 3, 19, 'm', 6),
(239, 3, 19, 'f', 7),
(240, 3, 19, 'm', 7),
(241, 3, 19, 'f', 8),
(242, 3, 19, 'm', 8),
(243, 3, 19, 'f', 9),
(244, 3, 19, 'm', 9),
(245, 3, 19, 'f', 10),
(246, 3, 19, 'm', 10),
(247, 3, 20, 'f', 3),
(248, 3, 20, 'm', 3),
(249, 3, 21, 'f', 4),
(250, 3, 21, 'm', 4),
(251, 3, 22, 'f', 5),
(252, 3, 22, 'm', 5),
(253, 3, 22, 'f', 6),
(254, 3, 22, 'm', 6),
(255, 3, 22, 'f', 7),
(256, 3, 22, 'm', 7),
(257, 3, 22, 'f', 8),
(258, 3, 22, 'm', 8),
(259, 3, 22, 'f', 9),
(260, 3, 22, 'm', 9),
(261, 3, 22, 'f', 10),
(262, 3, 22, 'm', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ligas`
--

CREATE TABLE `ligas` (
  `id` int(11) NOT NULL,
  `liga` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `nombre_categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nombre_categoria`
--

INSERT INTO `nombre_categoria` (`id`, `nombre`) VALUES
(1, '5 y 6 años menores'),
(2, '7 años menores'),
(3, '8 años menores'),
(4, '9 años menores'),
(5, '10 años menores'),
(6, 'Infantil A'),
(7, 'Infantil B'),
(8, 'Juvenil A'),
(9, 'Juvenil B'),
(10, 'Mayores'),
(11, '(M) Infantiles'),
(12, '(M) Juveniles y Mayores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `id_usuario` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `pruebas` (
  `id` int(11) NOT NULL,
  `prueba` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pruebas`
--

INSERT INTO `pruebas` (`id`, `prueba`) VALUES
(1, '12.5m Patada Libre'),
(2, '12.5m Patada Espalda'),
(3, '12.5m Libre/Free'),
(4, '25m Libre/Free'),
(5, '25m Patada Libre'),
(6, '25m Libre/Free'),
(7, '100m C.I./Medley'),
(8, '200m C.I./Medley'),
(9, '25m Pecho/Breast'),
(10, '50m Pecho/ Breast'),
(11, '25m Patada Espalda'),
(12, '50m Espalda/Back'),
(13, '4x25m Libre/Free'),
(14, '4x50m Libre/Free'),
(15, '25m Espalda/Back'),
(16, '50m Pecho/Breast'),
(17, '100m Libre/Free'),
(18, '400m Libre/Free'),
(19, '50m Libre/Free'),
(20, '25m Patada Mariposa'),
(21, '25m Mariposa/Fly'),
(22, '50m Mariposa/Fly');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE `resultados` (
  `id` int(11) NOT NULL,
  `id_jornada_prueba` int(11) NOT NULL,
  `id_competidor` varchar(10) NOT NULL,
  `tiempo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `union_categorias`
--

CREATE TABLE `union_categorias` (
  `id` int(11) NOT NULL,
  `id_nombre` int(11) NOT NULL,
  `categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `union_categorias`
--

INSERT INTO `union_categorias` (`id`, `id_nombre`, `categoria`) VALUES
(1, 1, 5),
(2, 1, 6),
(3, 2, 7),
(4, 3, 8),
(5, 4, 9),
(6, 5, 10),
(7, 6, 11),
(8, 7, 12),
(9, 7, 13),
(10, 8, 14),
(11, 8, 15),
(12, 9, 16),
(13, 9, 17),
(14, 9, 18),
(15, 10, 19),
(16, 11, 11),
(17, 11, 12),
(18, 11, 13),
(19, 12, 14),
(20, 12, 15),
(21, 12, 16),
(22, 12, 17),
(23, 12, 18),
(24, 12, 19);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carriles`
--
ALTER TABLE `carriles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria_com`
--
ALTER TABLE `categoria_com`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `competencia`
--
ALTER TABLE `competencia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `competidor`
--
ALTER TABLE `competidor`
  ADD PRIMARY KEY (`identificacion`);

--
-- Indices de la tabla `historial_pagos`
--
ALTER TABLE `historial_pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jornadas`
--
ALTER TABLE `jornadas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jornadas_pruebas`
--
ALTER TABLE `jornadas_pruebas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ligas`
--
ALTER TABLE `ligas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nombre_categoria`
--
ALTER TABLE `nombre_categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pruebas`
--
ALTER TABLE `pruebas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `union_categorias`
--
ALTER TABLE `union_categorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forane_union_nombre` (`id_nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carriles`
--
ALTER TABLE `carriles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `categoria_com`
--
ALTER TABLE `categoria_com`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT de la tabla `competencia`
--
ALTER TABLE `competencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `historial_pagos`
--
ALTER TABLE `historial_pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `jornadas_pruebas`
--
ALTER TABLE `jornadas_pruebas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;
--
-- AUTO_INCREMENT de la tabla `ligas`
--
ALTER TABLE `ligas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de la tabla `nombre_categoria`
--
ALTER TABLE `nombre_categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `resultados`
--
ALTER TABLE `resultados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `union_categorias`
--
ALTER TABLE `union_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `union_categorias`
--
ALTER TABLE `union_categorias`
  ADD CONSTRAINT `forane_union_nombre` FOREIGN KEY (`id_nombre`) REFERENCES `nombre_categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
