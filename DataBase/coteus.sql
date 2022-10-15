-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 23-09-2022 a las 20:36:04
-- Versión del servidor: 8.0.17
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Estructura de tabla para la tabla `calculator_t`
--

CREATE TABLE `calculator_t` (
  `id_calculator` int(2) NOT NULL,
  `name_function` varchar(50) NOT NULL,
  `formula_function` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chores_t`
--

CREATE TABLE `chores_t` (
  `id_chores` int(2) NOT NULL,
  `title` varchar(80) NOT NULL,
  `assignment` varchar(20) NOT NULL,
  `duracion` datetime NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `predecessor` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employees_t`
--

CREATE TABLE `employees_t` (
  `id_user` int(2) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `nameuser` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephono` varchar(30) NOT NULL,
  `cuil` int(11) NOT NULL,
  `id_groups` int(2) NOT NULL,
  `id_calculator` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `employees_t`
--

INSERT INTO `employees_t` (`id_user`, `name`, `surname`, `nameuser`, `password`, `email`, `telephono`, `cuil`, `id_groups`, `id_calculator`) VALUES
(31, 'a', 'a', 'a', 'a', 'a@a', '', 654, 0, 0),
(56, 'b', 'b', 'b', '$2y$10$25icbrgKgganqTPfsyIe7eDbKfqn0Bv3NcLXlq4f0lDeSt4E4EoaC', 'b@b', '0123556789', 35126, 0, 0),
(57, 'jesus', 'zerda', 'jesus9898', '$2y$10$gQU3jC8hdimDFbMcBFTXq.KUORY5AjDM82d7uYvmVo0ieu1PLTH7C', 'jesus@jesus.com', '0123456789', 452, 0, 0),
(58, 't', 't', 't', '$2y$10$TGHdQt4J/GYUpPg8y6BEn.jussDzSEcEf3ga7bkWK1Al7yAcgH5fm', 't@t.com', '123456789', 4563, 0, 0),
(59, 'pincky', 'carisimo', 'pincky_0', '$2y$10$RiqJqK05OtqUSlS81xA4/OIdTdgSv805LoKzd2zcXSzW81M/Btky.', 'pinccky@gmail.com', '0321654987', 453, 0, 0),
(60, 'Gaby', 'Morel', 'gaby0101', '$2y$10$3WxHPOYIpOadXgT6HACZguJKMvKw3B455S09M0YvYPvaqdqcGVhnS', 'gab@gmail.com', '1132266763', 4522, 0, 0),
(72, 'Axel', 'Ortiz', 'axel0101', '$2y$10$y1fnR6Q38W63sNarDjA46.rlWrelFTWAI9LCEVufDqPesd0QnwxcK', 'axel@mail.com', '113266763', 752, 0, 0),
(75, 'pincky', 'carisimo', 'dgb', '$2y$10$fl61xwMBMpmSgTsOBGs49efVnB8l4XZu0OBYcLqKNnJZDfW.CrpUq', 'pincckydb@gmail.com', '4567', 789, 0, 0),
(78, 'Alex', 'robert', 'xXalexxX', '$2y$10$uW2fTDFv7y6qgPcOk19nnOEFE/JxusbOrl1dZYpL4XlMXcJ.5Y1Ci', 'alex@abc.com', '123654', 785, 0, 0),
(79, 'Dainel', 'Beltrami', 'xXdanielXx', '$2y$10$9OPjMugsp37yxnw4SgehA.0LwgPoCUYDCc7LQ3aEMybqXTKMGvxxS', 'danie@gmail.com', '1132266768', 10, 0, 0),
(80, 'Carlos', 'Acuña', 'carlos0101', '$2y$10$RDFVbrCNerfNMs02QlOp..0eXxkPNeDYLBL/LiR54GmomZTUNedhu', 'carlos@gmail.com', '11326565', 2, 0, 0),
(81, 'paez', 'paez', 'paez0101', '$2y$10$TbFT.YJJv5Vul74zVA99buLvD6ZXzNCvZp29XVKw5tvBN1gwuwrSu', 'paez@gmail.com', '1231321', 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enterprise_t`
--

CREATE TABLE `enterprise_t` (
  `id_enterprise` int(2) NOT NULL,
  `name` varchar(30) NOT NULL,
  `cuit` int(11) NOT NULL,
  `id_employee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `enterprise_t`
--

INSERT INTO `enterprise_t` (`id_enterprise`, `name`, `cuit`, `id_employee`) VALUES
(1, 'IMSA', 2147483647, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files_t`
--

CREATE TABLE `files_t` (
  `id_files` int(2) NOT NULL,
  `name` varchar(40) NOT NULL,
  `path` varchar(50) NOT NULL,
  `owner` varchar(20) NOT NULL,
  `lastModification` datetime NOT NULL,
  `state` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups_t`
--

CREATE TABLE `groups_t` (
  `id_groups` int(2) NOT NULL,
  `admin` int(2) NOT NULL,
  `name` varchar(20) NOT NULL,
  `fecha` datetime NOT NULL,
  `clave` varchar(256) NOT NULL,
  `id_files` int(2) NOT NULL,
  `id_chores` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `groups_t`
--

INSERT INTO `groups_t` (`id_groups`, `admin`, `name`, `fecha`, `clave`, `id_files`, `id_chores`) VALUES
(30, 58, 'a', '2022-09-11 03:28:31', '', 0, 0),
(31, 58, 'b', '2022-09-11 03:28:35', '', 0, 0),
(32, 59, 'grupo1', '2022-09-11 03:40:47', '', 0, 0),
(33, 59, 'grupo2', '2022-09-11 03:41:09', '', 0, 0),
(34, 57, 'jere', '2022-09-23 01:24:51', '', 0, 0),
(36, 58, 'p', '2022-09-23 04:42:58', '$2y$10$oxugfpYyxmQDb431bSQ6lO2LnacFEPodwzS1S9odJF47.MvSAO0KC', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regisgroup_t`
--

CREATE TABLE `regisgroup_t` (
  `id_regis` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_groups` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `regisgroup_t`
--

INSERT INTO `regisgroup_t` (`id_regis`, `id_user`, `id_groups`, `fecha`) VALUES
(8, 58, 30, '2022-09-11 03:28:31'),
(9, 58, 31, '2022-09-11 03:28:35'),
(10, 59, 32, '2022-09-11 03:40:47'),
(11, 59, 33, '2022-09-11 03:41:09'),
(12, 57, 34, '2022-09-23 01:24:51'),
(14, 58, 36, '2022-09-23 04:42:58');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calculator_t`
--
ALTER TABLE `calculator_t`
  ADD PRIMARY KEY (`id_calculator`);

--
-- Indices de la tabla `chores_t`
--
ALTER TABLE `chores_t`
  ADD PRIMARY KEY (`id_chores`);

--
-- Indices de la tabla `employees_t`
--
ALTER TABLE `employees_t`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `nameuser` (`nameuser`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `telephono` (`telephono`),
  ADD UNIQUE KEY `cuil` (`cuil`);

--
-- Indices de la tabla `enterprise_t`
--
ALTER TABLE `enterprise_t`
  ADD PRIMARY KEY (`id_enterprise`),
  ADD UNIQUE KEY `id_employee` (`id_employee`);

--
-- Indices de la tabla `files_t`
--
ALTER TABLE `files_t`
  ADD PRIMARY KEY (`id_files`);

--
-- Indices de la tabla `groups_t`
--
ALTER TABLE `groups_t`
  ADD PRIMARY KEY (`id_groups`);

--
-- Indices de la tabla `regisgroup_t`
--
ALTER TABLE `regisgroup_t`
  ADD PRIMARY KEY (`id_regis`),
  ADD UNIQUE KEY `id_group` (`id_groups`),
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calculator_t`
--
ALTER TABLE `calculator_t`
  MODIFY `id_calculator` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `chores_t`
--
ALTER TABLE `chores_t`
  MODIFY `id_chores` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `employees_t`
--
ALTER TABLE `employees_t`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `enterprise_t`
--
ALTER TABLE `enterprise_t`
  MODIFY `id_enterprise` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `files_t`
--
ALTER TABLE `files_t`
  MODIFY `id_files` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `groups_t`
--
ALTER TABLE `groups_t`
  MODIFY `id_groups` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `regisgroup_t`
--
ALTER TABLE `regisgroup_t`
  MODIFY `id_regis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `regisgroup_t`
--
ALTER TABLE `regisgroup_t`
  ADD CONSTRAINT `regisgroup_t_ibfk_1` FOREIGN KEY (`id_groups`) REFERENCES `groups_t` (`id_groups`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `regisgroup_t_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `employees_t` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;