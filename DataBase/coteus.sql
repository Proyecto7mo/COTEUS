-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2022 a las 23:21:52
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `coteus`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calculators_t`
--

CREATE TABLE `calculators_t` (
  `id_calculator` int(11) NOT NULL,
  `name_function` varchar(20) NOT NULL,
  `formula_function` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `calculators_t`
--

INSERT INTO `calculators_t` (`id_calculator`, `name_function`, `formula_function`) VALUES
(1, 'Ley de Ohmn', 'z=a+b');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chores_t`
--

CREATE TABLE `chores_t` (
  `id_choresl` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `assignment` varchar(20) NOT NULL,
  `duration` datetime NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `id_predecessor` int(11) DEFAULT NULL,
  `id_group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `chores_t`
--

INSERT INTO `chores_t` (`id_choresl`, `title`, `assignment`, `duration`, `startdate`, `enddate`, `id_predecessor`, `id_group`) VALUES
(1, 'a', 'aa', '2000-01-01 16:25:06', '2004-01-09', '2004-01-10', NULL, 50),
(2, 'b', 'bb', '2004-01-01 00:00:00', '2004-01-01', '2004-01-01', 1, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employees_t`
--

CREATE TABLE `employees_t` (
  `id_employee` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` int(10) DEFAULT NULL,
  `cuil` int(11) DEFAULT NULL,
  `id_calculator` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `employees_t`
--

INSERT INTO `employees_t` (`id_employee`, `name`, `surname`, `username`, `password`, `email`, `telephone`, `cuil`, `id_calculator`) VALUES
(56, 'b', 'b', 'Cristian', '$2y$10$25icbrgKgganqTPfsyIe7eDbKfqn0Bv3NcLXlq4f0lDeSt4E4EoaC', 'b@b', 123556789, 35126, 1),
(57, 'jesus', 'zerda', 'jesus9898', '$2y$10$gQU3jC8hdimDFbMcBFTXq.KUORY5AjDM82d7uYvmVo0ieu1PLTH7C', 'jesus@jesus.com', 23456789, 452, NULL),
(58, 't', 't', 'Jeremias', '$2y$10$TGHdQt4J/GYUpPg8y6BEn.jussDzSEcEf3ga7bkWK1Al7yAcgH5fm', 't@t.com', 12345678, 4563, NULL),
(59, 'pincky', 'carisimo', 'pincky', '$2y$10$RiqJqK05OtqUSlS81xA4/OIdTdgSv805LoKzd2zcXSzW81M/Btky.', 'pinccky@gmail.com', 321654987, 453, NULL),
(60, 'Gaby', 'Morel', 'gaby0101', '$2y$10$3WxHPOYIpOadXgT6HACZguJKMvKw3B455S09M0YvYPvaqdqcGVhnS', 'gab@gmail.com', 1132266763, 4522, NULL),
(72, 'Axel', 'Ortiz', 'axel0101', '$2y$10$y1fnR6Q38W63sNarDjA46.rlWrelFTWAI9LCEVufDqPesd0QnwxcK', 'axel@mail.com', 113266763, 752, NULL),
(75, 'pincky', 'carisimo', 'dgb', '$2y$10$fl61xwMBMpmSgTsOBGs49efVnB8l4XZu0OBYcLqKNnJZDfW.CrpUq', 'pincckydb@gmail.com', 4567, 789, NULL),
(78, 'Alex', 'robert', 'xXalexxX', '$2y$10$uW2fTDFv7y6qgPcOk19nnOEFE/JxusbOrl1dZYpL4XlMXcJ.5Y1Ci', 'alex@abc.com', 123654, 785, NULL),
(79, 'Dainel', 'Beltrami', 'xXdanielXx', '$2y$10$9OPjMugsp37yxnw4SgehA.0LwgPoCUYDCc7LQ3aEMybqXTKMGvxxS', 'danie@gmail.com', 1132266768, 10, NULL),
(80, 'Carlos', 'Acuña', 'carlos0101', '$2y$10$RDFVbrCNerfNMs02QlOp..0eXxkPNeDYLBL/LiR54GmomZTUNedhu', 'carlos@gmail.com', 11326565, 2, NULL),
(81, 'paez', 'paez', 'paez0101', '$2y$10$TbFT.YJJv5Vul74zVA99buLvD6ZXzNCvZp29XVKw5tvBN1gwuwrSu', 'paez@gmail.com', 1231321, 1, NULL),
(87, 'admin', 'admin', 'Jesús', '$2y$10$3fdK6iuvMDsXN3Oo1y3Ikup9Pc7SLJ6HXVUcG2tnu/o3Uy0WXV.bq', 'admin@mail.com', 1234567, 20, NULL),
(93, 'y', 'y', 'Tobias', '$2y$10$salv1mZo8O4azNi3AbiVU.UNireaYXdR8Was4PooAHEL/q9Ao4ccS', 'y@y', 6, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files_encapsulation_t`
--

CREATE TABLE `files_encapsulation_t` (
  `id_file` int(11) NOT NULL,
  `id_employee` int(11) DEFAULT NULL,
  `id_group` int(11) DEFAULT NULL
) ;

--
-- Volcado de datos para la tabla `files_encapsulation_t`
--

INSERT INTO `files_encapsulation_t` (`id_file`, `id_employee`, `id_group`) VALUES
(2, NULL, 31),
(1, 87, 31),
(1, 87, 50),
(7, 87, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files_t`
--

CREATE TABLE `files_t` (
  `id_file` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `lastmodification` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `files_t`
--

INSERT INTO `files_t` (`id_file`, `name`, `lastmodification`) VALUES
(1, '1.txt', '2022-10-21 21:03:03'),
(2, '2.txt', '2022-10-21 21:03:36'),
(7, '3.txt', '2022-11-04 18:41:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups_t`
--

CREATE TABLE `groups_t` (
  `id_group` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` text DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `key` int(5) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `groups_t`
--

INSERT INTO `groups_t` (`id_group`, `name`, `description`, `date_created`, `key`, `id_admin`) VALUES
(31, 'b', '', '2022-09-11 03:28:35', 10, 58),
(32, 'grupo1', '', '2022-09-11 03:40:47', 20, 59),
(33, 'grupo2', '', '2022-09-11 03:41:09', 6, 59),
(34, 'jere', '', '2022-09-23 01:24:51', 9, 57),
(36, 'p', '', '2022-09-23 04:42:58', 67, 58),
(38, 'Grupo Lorem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', '2022-10-11 04:01:18', 65579, 93),
(42, 'Grupo de ejemplo', 'Este es un grupo de ejemplo', '2022-10-11 04:08:34', 5402, 93),
(50, 'COTEUS', 'coteu es una genialidad!', '2022-10-21 08:53:37', 48578, 57);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `members_t`
--

CREATE TABLE `members_t` (
  `id_employee` int(11) NOT NULL,
  `id_groups` int(11) NOT NULL,
  `rol` char(1) NOT NULL,
  `date_joined` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `members_t`
--

INSERT INTO `members_t` (`id_employee`, `id_groups`, `rol`, `date_joined`) VALUES
(57, 50, 'A', '2022-10-21 08:53:37'),
(93, 38, 'A', '2022-10-11 04:01:18'),
(93, 42, 'A', '2022-10-11 04:08:34');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calculators_t`
--
ALTER TABLE `calculators_t`
  ADD PRIMARY KEY (`id_calculator`);

--
-- Indices de la tabla `chores_t`
--
ALTER TABLE `chores_t`
  ADD PRIMARY KEY (`id_choresl`),
  ADD KEY `id_groups` (`id_group`) USING BTREE,
  ADD KEY `rl_chores_chores` (`id_predecessor`);

--
-- Indices de la tabla `employees_t`
--
ALTER TABLE `employees_t`
  ADD PRIMARY KEY (`id_employee`),
  ADD UNIQUE KEY `nameuser` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cuil` (`cuil`) USING BTREE,
  ADD UNIQUE KEY `telephono` (`telephone`) USING BTREE,
  ADD UNIQUE KEY `id_calculator` (`id_calculator`);

--
-- Indices de la tabla `files_encapsulation_t`
--
ALTER TABLE `files_encapsulation_t`
  ADD KEY `id_file` (`id_file`),
  ADD KEY `id_employee` (`id_employee`),
  ADD KEY `id_group` (`id_group`);

--
-- Indices de la tabla `files_t`
--
ALTER TABLE `files_t`
  ADD PRIMARY KEY (`id_file`);

--
-- Indices de la tabla `groups_t`
--
ALTER TABLE `groups_t`
  ADD PRIMARY KEY (`id_group`),
  ADD KEY `rl_groups_employees` (`id_admin`);

--
-- Indices de la tabla `members_t`
--
ALTER TABLE `members_t`
  ADD PRIMARY KEY (`id_employee`,`id_groups`) USING BTREE,
  ADD KEY `id_employee` (`id_employee`),
  ADD KEY `id_group` (`id_groups`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calculators_t`
--
ALTER TABLE `calculators_t`
  MODIFY `id_calculator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `chores_t`
--
ALTER TABLE `chores_t`
  MODIFY `id_choresl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de la tabla `employees_t`
--
ALTER TABLE `employees_t`
  MODIFY `id_employee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT de la tabla `files_t`
--
ALTER TABLE `files_t`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `groups_t`
--
ALTER TABLE `groups_t`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `chores_t`
--
ALTER TABLE `chores_t`
  ADD CONSTRAINT `rl_chores_chores` FOREIGN KEY (`id_predecessor`) REFERENCES `chores_t` (`id_choresl`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rl_chores_groups` FOREIGN KEY (`id_group`) REFERENCES `groups_t` (`id_group`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `employees_t`
--
ALTER TABLE `employees_t`
  ADD CONSTRAINT `rl_employees_calculators` FOREIGN KEY (`id_calculator`) REFERENCES `calculators_t` (`id_calculator`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `files_encapsulation_t`
--
ALTER TABLE `files_encapsulation_t`
  ADD CONSTRAINT `files_encapsulation_t_ibfk_1` FOREIGN KEY (`id_file`) REFERENCES `files_t` (`id_file`),
  ADD CONSTRAINT `files_encapsulation_t_ibfk_2` FOREIGN KEY (`id_employee`) REFERENCES `employees_t` (`id_employee`),
  ADD CONSTRAINT `files_encapsulation_t_ibfk_3` FOREIGN KEY (`id_group`) REFERENCES `groups_t` (`id_group`);

--
-- Filtros para la tabla `groups_t`
--
ALTER TABLE `groups_t`
  ADD CONSTRAINT `rl_groups_employees` FOREIGN KEY (`id_admin`) REFERENCES `employees_t` (`id_employee`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `members_t`
--
ALTER TABLE `members_t`
  ADD CONSTRAINT `rl_members_employees` FOREIGN KEY (`id_employee`) REFERENCES `employees_t` (`id_employee`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rl_members_groups` FOREIGN KEY (`id_groups`) REFERENCES `groups_t` (`id_group`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
