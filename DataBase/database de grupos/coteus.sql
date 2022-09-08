-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-09-2022 a las 02:18:31
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

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
  `id_chores` int(2) NOT NULL,
  `id_groups` int(2) NOT NULL,
  `id_files` int(2) NOT NULL,
  `id_calculator` int(2) NOT NULL,
  `id_enterprise` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `employees_t`
--

INSERT INTO `employees_t` (`id_user`, `name`, `surname`, `nameuser`, `password`, `email`, `telephono`, `cuil`, `id_chores`, `id_groups`, `id_files`, `id_calculator`, `id_enterprise`) VALUES
(31, 'a', 'a', 'a', 'a', 'a@a', '', 0, 0, 0, 0, 0, 0),
(56, 'b', 'b', 'b', '$2y$10$25icbrgKgganqTPfsyIe7eDbKfqn0Bv3NcLXlq4f0lDeSt4E4EoaC', 'b@b', '0123456789', 0, 0, 0, 0, 0, 0),
(57, 'jesus', 'zerda', 'jesus9898', '$2y$10$gQU3jC8hdimDFbMcBFTXq.KUORY5AjDM82d7uYvmVo0ieu1PLTH7C', 'jesus@jesus.com', '0123456789', 0, 0, 0, 0, 0, 0),
(58, 't', 't', 't', '$2y$10$TGHdQt4J/GYUpPg8y6BEn.jussDzSEcEf3ga7bkWK1Al7yAcgH5fm', 't@t.com', '123456789', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enterprise_t`
--

CREATE TABLE `enterprise_t` (
  `id_enterprise` int(2) NOT NULL,
  `name` varchar(30) NOT NULL,
  `cuit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `id_files` int(2) NOT NULL,
  `id_chores` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `groups_t`
--

INSERT INTO `groups_t` (`id_groups`, `admin`, `name`, `fecha`, `id_files`, `id_chores`) VALUES
(1, 58, 'w', '2022-09-08 02:13:28', 0, 0);

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
  ADD PRIMARY KEY (`id_user`);

--
-- Indices de la tabla `enterprise_t`
--
ALTER TABLE `enterprise_t`
  ADD PRIMARY KEY (`id_enterprise`);

--
-- Indices de la tabla `files_t`
--
ALTER TABLE `files_t`
  ADD PRIMARY KEY (`id_files`);

--
-- Indices de la tabla `groups_t`
--
ALTER TABLE `groups_t`
  ADD PRIMARY KEY (`id_groups`),
  ADD UNIQUE KEY `admin` (`admin`);

--
-- Indices de la tabla `regisgroup_t`
--
ALTER TABLE `regisgroup_t`
  ADD PRIMARY KEY (`id_regis`),
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD UNIQUE KEY `id_group` (`id_groups`);

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
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `enterprise_t`
--
ALTER TABLE `enterprise_t`
  MODIFY `id_enterprise` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `files_t`
--
ALTER TABLE `files_t`
  MODIFY `id_files` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `groups_t`
--
ALTER TABLE `groups_t`
  MODIFY `id_groups` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `regisgroup_t`
--
ALTER TABLE `regisgroup_t`
  MODIFY `id_regis` int(11) NOT NULL AUTO_INCREMENT;

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
