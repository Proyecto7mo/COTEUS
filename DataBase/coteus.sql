-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-09-2022 a las 19:22:22
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;


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
) ENGINE=InnoDB;

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
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enterprise_t`
--

CREATE TABLE `enterprise_t` (
  `id_enterprise` int(2) NOT NULL,
  `name` varchar(30) NOT NULL,
  `cuit` int(11) NOT NULL
) ENGINE=InnoDB;

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
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups_t`
--

CREATE TABLE `groups_t` (
  `id_groups` int(2) NOT NULL,
  `name` varchar(20) NOT NULL,
  `admin` varchar(20) NOT NULL,
  `id_files` int(2) NOT NULL,
  `id_chores` int(2) NOT NULL
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_t`
--

CREATE TABLE `users_t` (
  `id_user` int(2) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `nameuser` varchar(20) NOT NULL,
  `password` char(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephono` varchar(30) NOT NULL,
  `cuil` int(11) NOT NULL,
  `id_chores` int(2) NOT NULL,
  `id_groups` int(2) NOT NULL,
  `id_files` int(2) NOT NULL,
  `id_calculator` int(2) NOT NULL,
  `id_enterprise` int(2) NOT NULL
) ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `users_t`
--

INSERT INTO `users_t` (`id_user`, `name`, `surname`, `nameuser`, `password`, `email`, `telephono`, `cuil`, `id_chores`, `id_groups`, `id_files`, `id_calculator`, `id_enterprise`) VALUES
(22, 'Jeremias', 'Cuello', 'jeremias0901', '$2y$10$F0OWwBY0bimlIo2.e5GV3up', 'cuellojeremiasnatanael@gmail.com', '', 0, 0, 0, 0, 0, 0),
(29, 'elias', 'gomez', 'elias0101', 'a', 'elias@gmail.com', '', 0, 0, 0, 0, 0, 0),
(30, 'bilu', 'cuello', 'bilu2309', '1', 'bilu@gmail.com', '', 0, 0, 0, 0, 0, 0),
(31, 'a', 'a', 'a', 'a', 'a@a', '', 0, 0, 0, 0, 0, 0),
(32, 'elias0101', 'zerda', 'elias0101', '$2y$10$YAE9ZeMocUBAXb8C28Fff.BHBjWhAuXNkR/mbBkm6ZRXqWWCjMJeS', 'evelynbrisa16@gmail.com', '1132266763', 0, 0, 0, 0, 0, 0),
(33, 'elias0101', 'zerda', 'elias0101', '$2y$10$PnlFfG1A6CDzmP.i8bkLY.WzijTOgy62BbbQ1WgctkKsUpDdvMnz2', 'evelynbrisa16@gmail.com', '1132266763', 0, 0, 0, 0, 0, 0),
(34, 'elias0101', 'zerda', 'elias0101', '$2y$10$AN61PcXr6b.d7hGg.ieH4Obwnqn0Q2o72Joqf8pU0gCMFWm1.FMNC', 'evelynbrisa16@gmail.com', '1132266763', 0, 0, 0, 0, 0, 0);

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
-- Indices de la tabla `users_t`
--
ALTER TABLE `users_t`
  ADD PRIMARY KEY (`id_user`);

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
  MODIFY `id_groups` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users_t`
--
ALTER TABLE `users_t`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
