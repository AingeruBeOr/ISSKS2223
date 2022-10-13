-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Oct 13, 2022 at 06:59 AM
-- Server version: 10.8.2-MariaDB-1:10.8.2+maria~focal
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `liburua`
--

CREATE TABLE `liburua` (
  `IZENBURUA` varchar(50) NOT NULL,
  `IDAZLEA` varchar(30) NOT NULL,
  `ARGITALPENDATA` date NOT NULL,
  `ORRIALDEKOP` int(11) DEFAULT NULL,
  `ARGITALETXEA` varchar(30) DEFAULT NULL,
  `ISBN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `liburua`
--

INSERT INTO `liburua` (`IZENBURUA`, `IDAZLEA`, `ARGITALPENDATA`, `ORRIALDEKOP`, `ARGITALETXEA`, `ISBN`) VALUES
('Diario de un skin', 'Antonio Salas', '2006-02-07', 544, 'Temas de hoy', '1'),
('Teoria King Kong', 'Virginie Despentes', '2007-10-03', 160, 'Le livre de Poche', '10'),
('Teoria King Kong', 'Virginie Despentes', '2018-01-25', 176, 'Random House', '11'),
('Teoria King Kong', 'Virginie Despentes', '2020-08-13', 176, 'Faber and Laber Ltd.', '12'),
('Una educacion', 'Tara Westover', '2020-10-08', 472, 'Debolsillo', '13'),
('El palestino', 'Antonio Salas', '2011-06-03', 960, 'Temas de hoy', '2'),
('El peligro de estar cuerda', 'Rosa Montero', '2022-03-30', 360, 'Seix Barral', '3'),
('El todo', 'Dave Eggers', '2022-05-19', 528, 'Literatura Random House', '4'),
('La buena suerte', 'Rosa Montero', '2020-08-27', 328, 'Alfaguara', '5'),
('Las madres (la novia gitana 4)', 'Carmen Mola', '2022-09-27', 464, 'Alfaguara', '6'),
('Los mil nombres de la libertad', 'Maria Reig', '2022-09-15', 880, 'SUMA', '7'),
('Memorias de una salvaje', 'Bebi Fernandez', '2021-09-29', 464, 'Planeta', '8'),
('Izaroko altxorra', 'Iñaki Friera', '2022-01-11', 156, 'SM', '89'),
('Ser mujer negra en Espana', 'Desiree Bela-Lobelade', '2018-09-20', 184, 'Plan B', '9');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `DNI` varchar(10) NOT NULL,
  `Izen_Abizenak` text NOT NULL,
  `Telefonoa` int(9) NOT NULL,
  `Jaiotze_Data` date NOT NULL,
  `Email` text NOT NULL,
  `Pasahitza` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`DNI`, `Izen_Abizenak`, `Telefonoa`, `Jaiotze_Data`, `Email`, `Pasahitza`) VALUES
('1', 'mikel', 0, '0000-00-00', 'mikel@gmail.com', '1234'),
('11111111-H', 'Proba erabiltzailea', 987654321, '2020-01-07', 'proba@proba.es', 'qwerty'),
('2', 'aitor', 0, '0000-00-00', 'aitor@gmail.com', '5678'),
('33333333-A', 'Pepe', 676666623, '2022-10-11', 'perro@gmail.com', '1357'),
('37242837-H', 'Proba', 654654654, '2012-01-01', 'proba2@proba.com', 'hola1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `liburua`
--
ALTER TABLE `liburua`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`DNI`),
  ADD UNIQUE KEY `Email` (`Email`) USING HASH;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
