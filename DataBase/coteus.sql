-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-09-2022 a las 21:44:26
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
(30, 58, 'a', '2022-09-11 03:28:31', 0, 0),
(31, 58, 'b', '2022-09-11 03:28:35', 0, 0),
(32, 59, 'grupo1', '2022-09-11 03:40:47', 0, 0),
(33, 59, 'grupo2', '2022-09-11 03:41:09', 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `groups_t`
--
ALTER TABLE `groups_t`
  ADD PRIMARY KEY (`id_groups`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `groups_t`
--
ALTER TABLE `groups_t`
  MODIFY `id_groups` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
