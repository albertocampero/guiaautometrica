-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 31-01-2017 a las 21:12:38
-- Versión del servidor: 5.6.34
-- Versión de PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vrumm_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ga_brands`
--

CREATE TABLE `ga_brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ga_log`
--

CREATE TABLE `ga_log` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `data` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ga_log_types`
--

CREATE TABLE `ga_log_types` (
  `id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ga_log_types`
--

INSERT INTO `ga_log_types` (`id`, `description`) VALUES
(1, 'login'),
(2, 'insert brand'),
(3, 'update brand'),
(4, 'delete brand'),
(5, 'insert model'),
(6, 'update model'),
(7, 'delete model'),
(8, 'insert record'),
(9, 'update record'),
(10, 'delete record');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ga_models`
--

CREATE TABLE `ga_models` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `id_brand` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ga_status`
--

CREATE TABLE `ga_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ga_status`
--

INSERT INTO `ga_status` (`id`, `name`) VALUES
(0, 'Inactivo'),
(1, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ga_users`
--

CREATE TABLE `ga_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ga_versions`
--

CREATE TABLE `ga_versions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `id_brand` int(11) DEFAULT NULL,
  `id_model` int(11) DEFAULT NULL,
  `sale_price` float DEFAULT NULL,
  `purchase_price` float DEFAULT NULL,
  `description` text,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ga_brands`
--
ALTER TABLE `ga_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ga_log`
--
ALTER TABLE `ga_log`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ga_log_types`
--
ALTER TABLE `ga_log_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ga_models`
--
ALTER TABLE `ga_models`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ga_status`
--
ALTER TABLE `ga_status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ga_users`
--
ALTER TABLE `ga_users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ga_versions`
--
ALTER TABLE `ga_versions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ga_brands`
--
ALTER TABLE `ga_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ga_log`
--
ALTER TABLE `ga_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ga_log_types`
--
ALTER TABLE `ga_log_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ga_models`
--
ALTER TABLE `ga_models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ga_status`
--
ALTER TABLE `ga_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ga_users`
--
ALTER TABLE `ga_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ga_versions`
--
ALTER TABLE `ga_versions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
