-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-09-2022 a las 02:16:15
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
-- Base de datos: `pruebagrupo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calculator_t`
--

CREATE TABLE `calculator_t` (
  `id_calculator` int(2) NOT NULL,
  `name_function` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `formula_function` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chores_t`
--

CREATE TABLE `chores_t` (
  `id_chores` int(2) NOT NULL,
  `title` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `assignment` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
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
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nameuser` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` char(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
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

INSERT INTO `employees_t` (`id_user`, `name`, `surname`, `nameuser`, `password`, `email`, `cuil`, `id_chores`, `id_groups`, `id_files`, `id_calculator`, `id_enterprise`) VALUES
(22, 'Jeremias', 'Cuello', 'jeremias0901', '$2y$10$F0OWwBY0bimlIo2.e5GV3up', 'cuellojeremiasnatanael@gmail.com', 0, 0, 0, 0, 0, 0),
(29, 'elias', 'gomez', 'elias0101', 'a', 'elias@gmail.com', 0, 0, 0, 0, 0, 0),
(30, 'bilu', 'cuello', 'bilu2309', '1', 'bilu@gmail.com', 0, 0, 0, 0, 0, 0),
(31, 'a', 'a', 'a', 'a', 'a@a', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enterprise_t`
--

CREATE TABLE `enterprise_t` (
  `id_enterprise` int(2) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cuit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files_t`
--

CREATE TABLE `files_t` (
  `id_files` int(2) NOT NULL,
  `name` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `owner` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lastModification` datetime NOT NULL,
  `state` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups_t`
--

CREATE TABLE `groups_t` (
  `id_groups` int(2) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admin` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_files` int(2) DEFAULT NULL,
  `id_chores` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `groups_t`
--

INSERT INTO `groups_t` (`id_groups`, `name`, `admin`, `id_files`, `id_chores`) VALUES
(1, 'A', 'pepe', 5, 5),
(2, 'B', 'jere', 5, 5),
(21, 'tt', 'pp', 4, 4);

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
(1, 22, 1, '2022-08-28 23:58:34'),
(2, 29, 2, '2022-08-28 23:58:34');

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
  ADD PRIMARY KEY (`id_groups`);

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
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
  MODIFY `id_groups` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `regisgroup_t`
--
ALTER TABLE `regisgroup_t`
  MODIFY `id_regis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
