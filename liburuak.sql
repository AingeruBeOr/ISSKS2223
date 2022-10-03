-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-10-2022 a las 11:52:08
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `liburuak`
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
  `ARGITALETXEA` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `liburua`
--

INSERT INTO `liburua` (`IZENBURUA`, `IDAZLEA`, `ARGITALPENDATA`, `ORRIALDEKOP`, `ARGITALETXEA`) VALUES
('Diario de un skin', 'Antonio Salas', '2006-02-07', 544, 'Temas de hoy'),
('El palestino', 'Antonio Salas', '2011-06-03', 960, 'Temas de hoy'),
('El peligro de estar cuerda', 'Rosa Montero', '2022-03-30', 360, 'Seix Barral'),
('El todo', 'Dave Eggers', '2022-05-19', 528, 'Literatura Random House'),
('La buena suerte', 'Rosa Montero', '2020-08-27', 328, 'Alfaguara'),
('Las madres (la novia gitana 4)', 'Carmen Mola', '2022-09-27', 464, 'Alfaguara'),
('Los mil nombres de la libertad', 'Maria Reig', '2022-09-15', 880, 'SUMA'),
('Memorias de una salvaje', 'Bebi Fernandez', '2021-09-29', 464, 'Planeta'),
('Ser mujer negra en Espana', 'Desiree Bela-Lobelade', '2018-09-20', 184, 'Plan B'),
('Teoria King Kong', 'Virginie Despentes', '2007-10-03', 160, 'Le livre de Poche'),
('Teoria King Kong', 'Virginie Despentes', '2018-01-25', 176, 'Random House'),
('Teoria King Kong', 'Virginie Despentes', '2020-08-13', 176, 'Faber and Laber Ltd.'),
('Una educacion', 'Tara Westover', '2020-10-08', 472, 'Debolsillo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `liburua`
--
ALTER TABLE `liburua`
  ADD PRIMARY KEY (`IZENBURUA`,`IDAZLEA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
