-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 15-10-2022 a las 16:38:48
-- Versión del servidor: 10.8.2-MariaDB-1:10.8.2+maria~focal
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liburua`
--

CREATE TABLE `liburua` (
  `IZENBURUA` varchar(50) NOT NULL,
  `IDAZLEA` varchar(30) NOT NULL,
  `ARGITALPENDATA` date NOT NULL,
  `ORRIALDEKOP` int(11) DEFAULT NULL,
  `ARGITALETXEA` varchar(30) DEFAULT NULL,
  `ISBN` bigint(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `liburua`
--

INSERT INTO `liburua` (`IZENBURUA`, `IDAZLEA`, `ARGITALPENDATA`, `ORRIALDEKOP`, `ARGITALETXEA`, `ISBN`) VALUES
('Teoria King Kong', 'Virginie Despentes', '2007-10-03', 160, 'Le livre de Poche', 9782253122111),
('Memorias de una salvaje', 'Bebi Fernandez', '2021-09-29', 464, 'Planeta', 9788408194453),
('Ser mujer negra en España', 'Desiree Bela-Lobelade', '2018-09-20', 184, 'Plan B', 9788417001650),
('La buena suerte', 'Rosa Montero', '2020-08-27', 328, 'Alfaguara', 9788420439457),
('Las madres (la novia gitana 4)', 'Carmen Mola', '2022-09-27', 464, 'Alfaguara', 9788420456027),
('El peligro de estar cuerda', 'Rosa Montero', '2022-03-30', 360, 'Seix Barral', 9788432240645),
('El todo', 'Dave Eggers', '2022-05-19', 528, 'Literatura Random House', 9788439711650),
('Teoria King Kong', 'Virginie Despentes', '2018-01-25', 176, 'Random House', 9788439733850),
('Una educacion', 'Tara Westover', '2020-10-08', 472, 'Debolsillo', 9788466347846),
('Izaroko altxorra', 'Iñaki Friera', '2022-01-11', 156, 'SM', 9788483258804),
('Diario de un skin', 'Antonio Salas', '2006-02-07', 544, 'Temas de hoy', 9788484602507),
('El palestino', 'Antonio Salas', '2011-06-03', 960, 'Temas de hoy', 9788484604686),
('Los mil nombres de la libertad', 'Maria Reig', '2022-09-15', 880, 'SUMA', 9788491294054),
('Teoria King Kong', 'Virginie Despentes', '2020-08-13', 176, 'Faber and Laber Ltd.', 9788494782916);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `DNI` varchar(10) NOT NULL,
  `Izen_Abizenak` text NOT NULL,
  `Telefonoa` int(9) NOT NULL,
  `Jaiotze_Data` date NOT NULL,
  `Email` text NOT NULL,
  `Pasahitza` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `DNI`, `Izen_Abizenak`, `Telefonoa`, `Jaiotze_Data`, `Email`, `Pasahitza`) VALUES
(1, '00000023-T', 'mikel', 123456789, '2002-03-05', 'mikel@gmail.com', '1234'),
(2, '00000024-R', 'Proba erabiltzailea', 987654321, '2020-01-07', 'proba@proba.es', 'qwerty'),
(3, '00000025-W', 'aitor', 987654321, '2006-07-04', 'aitor@gmail.com', '5678'),
(4, '33333333-A', 'Pepe', 676666623, '2022-10-11', 'perro@gmail.com', '1357'),
(5, '37242837-H', 'Proba', 654654654, '2012-01-01', 'proba2@proba.com', 'hola1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `liburua`
--
ALTER TABLE `liburua`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `DNI` (`DNI`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD UNIQUE KEY `Email` (`Email`) USING HASH;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
