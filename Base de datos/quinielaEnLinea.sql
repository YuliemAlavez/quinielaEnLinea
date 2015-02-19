-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-02-2015 a las 12:48:05
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `quinielaEnLinea`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `game`
--

CREATE TABLE IF NOT EXISTS `game` (
`idGame` int(11) NOT NULL,
  `localTeam` int(11) NOT NULL,
  `visitingTeam` int(11) NOT NULL,
  `scoreLocalTeam` int(11) NOT NULL DEFAULT '0',
  `scoreVisitingTeam` int(11) NOT NULL DEFAULT '0',
  `gameAt` datetime NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `season` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `game`
--

INSERT INTO `game` (`idGame`, `localTeam`, `visitingTeam`, `scoreLocalTeam`, `scoreVisitingTeam`, `gameAt`, `createdAt`, `updatedAt`, `season`) VALUES
(1, 9, 7, 0, 0, '2015-01-23 19:30:00', '2015-01-28 00:00:00', '2015-01-28 00:00:00', 1),
(2, 18, 4, 0, 0, '2015-01-23 20:30:00', '2015-01-28 00:00:00', '2015-01-28 00:00:00', 1),
(3, 14, 10, 4, 1, '2015-01-23 21:30:00', '2015-01-28 00:00:00', '2015-01-28 00:00:00', 1),
(4, 1, 12, 0, 0, '2015-01-24 17:00:00', '2015-01-28 00:00:00', '2015-01-28 00:00:00', 1),
(5, 16, 3, 1, 2, '2015-01-24 19:00:00', '2015-01-28 00:00:00', '2015-01-28 00:00:00', 1),
(6, 11, 13, 2, 1, '2015-01-24 20:00:00', '2015-01-28 00:00:00', '2015-01-28 00:00:00', 1),
(7, 6, 2, 3, 1, '2015-01-24 21:00:00', '2015-01-28 00:00:00', '2015-01-28 00:00:00', 1),
(8, 17, 15, 3, 2, '2015-01-25 12:00:00', '2015-01-28 00:00:00', '2015-01-28 00:00:00', 1),
(9, 8, 5, 1, 1, '2015-01-25 17:00:00', '2015-01-28 00:00:00', '2015-01-28 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prediction`
--

CREATE TABLE IF NOT EXISTS `prediction` (
`idPrediction` int(11) NOT NULL,
  `game` int(11) NOT NULL,
  `scoreLocalTeam` int(11) NOT NULL DEFAULT '0',
  `scoreVisitingTeam` int(11) NOT NULL DEFAULT '0',
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `predictionAt` datetime NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `prediction`
--

INSERT INTO `prediction` (`idPrediction`, `game`, `scoreLocalTeam`, `scoreVisitingTeam`, `createdAt`, `updatedAt`, `predictionAt`, `user`) VALUES
(1, 1, 1, 1, '2015-01-23 15:00:00', '2015-01-23 15:00:00', '2015-01-23 15:00:00', 1),
(2, 2, 0, 1, '2015-01-23 15:00:00', '2015-01-23 15:00:00', '2015-01-23 15:00:00', 1),
(3, 3, 2, 0, '2015-01-23 15:00:00', '2015-01-23 15:00:00', '2015-01-23 15:00:00', 1),
(4, 4, 1, 1, '2015-01-23 15:00:00', '2015-01-23 15:00:00', '2015-01-23 15:00:00', 1),
(5, 5, 1, 1, '2015-01-23 15:00:00', '2015-01-23 15:00:00', '2015-01-23 15:00:00', 1),
(6, 6, 1, 0, '2015-01-23 15:00:00', '2015-01-23 15:00:00', '2015-01-23 15:00:00', 1),
(7, 7, 0, 1, '2015-01-23 15:00:00', '2015-01-23 15:00:00', '2015-01-23 15:00:00', 1),
(8, 8, 1, 1, '2015-01-23 15:00:00', '2015-01-23 15:00:00', '2015-01-23 15:00:00', 1),
(9, 9, 2, 1, '2015-01-23 15:00:00', '2015-01-23 15:00:00', '2015-01-23 15:00:00', 1),
(11, 2, 1, 1, '2014-01-01 00:00:00', '2015-01-01 00:00:00', '2016-01-01 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `result`
--

CREATE TABLE IF NOT EXISTS `result` (
`idResult` int(11) NOT NULL,
  `prediction` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT '0',
  `extrapoints` int(11) NOT NULL DEFAULT '0',
  `totalPoints` int(11) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `season`
--

CREATE TABLE IF NOT EXISTS `season` (
`idSeason` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `seasonAtBegin` datetime NOT NULL,
  `seasonAtEnd` datetime NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `season`
--

INSERT INTO `season` (`idSeason`, `name`, `seasonAtBegin`, `seasonAtEnd`, `createdAt`, `updatedAt`) VALUES
(1, 'J-01', '2015-01-09 18:00:00', '2015-01-11 23:59:59', '2015-01-28 00:00:00', '2015-01-28 00:00:00'),
(2, 'J-02', '2015-01-16 18:00:00', '2015-01-18 23:59:59', '2015-01-28 00:00:00', '2015-01-28 00:00:00'),
(3, 'J-03', '2015-01-23 18:00:00', '2015-01-25 23:59:59', '2015-01-28 00:00:00', '2015-01-28 00:00:00'),
(4, 'J-04', '2015-01-30 18:00:00', '2015-02-01 23:59:59', '2015-01-28 00:00:00', '2015-01-28 00:00:00'),
(5, 'J-05', '2015-02-06 18:00:00', '2015-02-08 23:59:59', '2015-01-28 00:00:00', '2015-01-28 00:00:00'),
(6, 'J-06', '2015-02-13 18:00:00', '2015-02-15 23:59:59', '2015-01-28 00:00:00', '2015-01-28 00:00:00'),
(7, 'J-07', '2015-02-20 18:00:00', '2015-02-22 23:59:59', '2015-01-28 00:00:00', '2015-01-28 00:00:00'),
(8, 'J-08', '2015-02-27 18:00:00', '2015-03-01 23:59:59', '2015-01-28 00:00:00', '2015-01-28 00:00:00'),
(9, 'J-09', '2015-03-06 18:00:00', '2015-03-08 23:59:59', '2015-01-28 00:00:00', '2015-01-28 00:00:00'),
(10, 'J-10', '2015-03-13 18:00:00', '2015-03-15 23:59:59', '2015-01-28 00:00:00', '2015-01-28 00:00:00'),
(11, 'J-11', '2015-03-20 18:00:00', '2015-03-22 23:59:59', '2015-01-28 00:00:00', '2015-01-28 00:00:00'),
(12, 'J-12', '2015-03-03 18:00:00', '2015-03-05 23:59:59', '2015-01-28 00:00:00', '2015-01-28 00:00:00'),
(13, 'J-13', '2015-03-10 18:00:00', '2015-03-12 23:59:59', '2015-01-28 00:00:00', '2015-01-28 00:00:00'),
(14, 'J-14', '2015-03-10 18:00:00', '2015-03-12 23:59:59', '2015-01-28 00:00:00', '2015-01-28 00:00:00'),
(15, 'J-15', '2015-03-24 18:00:00', '2015-03-26 23:59:59', '2015-01-28 00:00:00', '2015-01-28 00:00:00'),
(16, 'J-16', '2015-05-01 18:00:00', '2015-05-03 23:59:59', '2015-01-28 00:00:00', '2015-01-28 00:00:00'),
(17, 'J-17', '2015-05-08 18:00:00', '2015-05-10 23:59:59', '2015-01-28 00:00:00', '2015-01-28 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team`
--

CREATE TABLE IF NOT EXISTS `team` (
`idTeam` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `team`
--

INSERT INTO `team` (`idTeam`, `name`, `image`, `updatedAt`, `createdAt`) VALUES
(1, 'América', NULL, '2015-01-28 00:00:00', '2015-01-28 00:00:00'),
(2, 'Atlas', NULL, '2015-01-28 00:00:00', '2015-01-28 00:00:00'),
(3, 'Club Tijuana', NULL, '2015-01-28 00:00:00', '2015-01-28 00:00:00'),
(4, 'Cruz Azul', NULL, '2015-01-28 00:00:00', '2015-01-28 00:00:00'),
(5, 'Guadalajara', NULL, '2015-01-28 00:00:00', '2015-01-28 00:00:00'),
(6, 'Jaguares', NULL, '2015-01-28 00:00:00', '2015-01-28 00:00:00'),
(7, 'León', NULL, '2015-01-28 00:00:00', '2015-01-28 00:00:00'),
(8, 'Leones Negros', NULL, '2015-01-28 00:00:00', '2015-01-28 00:00:00'),
(9, 'Monarcas Morelia', NULL, '2015-01-28 00:00:00', '2015-01-28 00:00:00'),
(10, 'Monterrey', NULL, '2015-01-28 00:00:00', '2015-01-28 00:00:00'),
(11, 'Pachuca', NULL, '2015-01-28 00:00:00', '2015-01-28 00:00:00'),
(12, 'Puebla', NULL, '2015-01-28 00:00:00', '2015-01-28 00:00:00'),
(13, 'Queretaro', NULL, '2015-01-28 00:00:00', '2015-01-28 00:00:00'),
(14, 'Santos Laguna', NULL, '2015-01-28 00:00:00', '2015-01-28 00:00:00'),
(15, 'Toluca', NULL, '2015-01-28 00:00:00', '2015-01-28 00:00:00'),
(16, 'UANL', NULL, '2015-01-28 00:00:00', '2015-01-28 00:00:00'),
(17, 'UNAM', NULL, '2015-01-28 00:00:00', '2015-01-28 00:00:00'),
(18, 'Veracruz', NULL, '2015-01-28 00:00:00', '2015-01-28 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`idUser` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`idUser`, `name`, `lastname`, `user`, `password`, `createdAt`, `updatedAt`) VALUES
(1, 'Yuliem', 'Alavez', 'YuliemAlavez', 'CETcetCET123', '2015-01-28 00:00:00', '2015-01-28 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `game`
--
ALTER TABLE `game`
 ADD PRIMARY KEY (`idGame`), ADD KEY `fk_Game_Team_idx` (`localTeam`), ADD KEY `fk_Game_Team1_idx` (`visitingTeam`), ADD KEY `fk_Game_Season1_idx` (`season`);

--
-- Indices de la tabla `prediction`
--
ALTER TABLE `prediction`
 ADD PRIMARY KEY (`idPrediction`), ADD KEY `fk_Prediction_Game1_idx` (`game`), ADD KEY `fk_Prediction_User1_idx` (`user`);

--
-- Indices de la tabla `result`
--
ALTER TABLE `result`
 ADD PRIMARY KEY (`idResult`), ADD KEY `fk_Result_Prediction1_idx` (`prediction`);

--
-- Indices de la tabla `season`
--
ALTER TABLE `season`
 ADD PRIMARY KEY (`idSeason`);

--
-- Indices de la tabla `team`
--
ALTER TABLE `team`
 ADD PRIMARY KEY (`idTeam`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `game`
--
ALTER TABLE `game`
MODIFY `idGame` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `prediction`
--
ALTER TABLE `prediction`
MODIFY `idPrediction` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `result`
--
ALTER TABLE `result`
MODIFY `idResult` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `season`
--
ALTER TABLE `season`
MODIFY `idSeason` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `team`
--
ALTER TABLE `team`
MODIFY `idTeam` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `game`
--
ALTER TABLE `game`
ADD CONSTRAINT `fk_Game_Season1` FOREIGN KEY (`season`) REFERENCES `season` (`idSeason`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Game_Team` FOREIGN KEY (`localTeam`) REFERENCES `team` (`idTeam`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Game_Team1` FOREIGN KEY (`visitingTeam`) REFERENCES `team` (`idTeam`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `prediction`
--
ALTER TABLE `prediction`
ADD CONSTRAINT `fk_Prediction_Game1` FOREIGN KEY (`game`) REFERENCES `game` (`idGame`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Prediction_User1` FOREIGN KEY (`user`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `result`
--
ALTER TABLE `result`
ADD CONSTRAINT `fk_Result_Prediction1` FOREIGN KEY (`prediction`) REFERENCES `prediction` (`idPrediction`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
