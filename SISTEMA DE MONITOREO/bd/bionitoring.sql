-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2022 a las 06:06:28
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bionitoring`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data`
--

CREATE TABLE `data` (
  `id_data` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `data`
--

INSERT INTO `data` (`id_data`) VALUES
(1),
(2),
(3),
(4),
(5),
(6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispositivo`
--

CREATE TABLE `dispositivo` (
  `id_dispositivo` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `nombreDisp` char(50) NOT NULL,
  `modelo` char(5) NOT NULL,
  `direccion` char(255) NOT NULL,
  `fechaInst` date NOT NULL,
  `empresa` char(60) NOT NULL,
  `latitud` double NOT NULL,
  `longitud` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dispositivo`
--

INSERT INTO `dispositivo` (`id_dispositivo`, `id_user`, `nombreDisp`, `modelo`, `direccion`, `fechaInst`, `empresa`, `latitud`, `longitud`) VALUES
(1, 2, 'BioUrban', '2.0', 'Calle 16-C, No. 1901, Col. Jardines de San Dimas, CP 94570, Cordoba, Ver.', '2015-12-17', 'Biomitech', 18.89138, -96.947614),
(2, 2, 'Biourban', '1.0', 'Prueba', '2022-10-04', 'Prueba', 18.854679, -97.098461);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(1) NOT NULL,
  `nombre` char(50) NOT NULL,
  `rfc` char(12) NOT NULL,
  `direccion` char(100) NOT NULL,
  `telefono` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nombre`, `rfc`, `direccion`, `telefono`) VALUES
(1, 'Biomitech S.A.P.I de C.V.', 'GBI1509118Q2', 'Calle 16-C, No. 1901, Col. Jardines de San Dimas, CP 94570, Cordoba, Ver.', '2225036725');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(10) NOT NULL,
  `nombre` char(70) NOT NULL,
  `usuario` char(20) NOT NULL,
  `password` char(20) NOT NULL,
  `roll` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `nombre`, `usuario`, `password`, `roll`) VALUES
(1, 'Eliel Pérez Ramos', 'elielprz', 'eliel1010', 'Administrador'),
(2, 'Elian Rafael Salmeron Gomez', 'ElianSalmeron', 'elian1010', 'Usuario'),
(3, 'Amayrani Gallardo Aguilar', 'Amy26', 'amayrani0426', 'Administrador'),
(4, 'Paola Lara Bernardo', 'paolalara', 'paola1010', 'Usuario'),
(5, 'Consuelo Lizeth Medina Morales', 'lizmedina', 'medina1010', 'Usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id_data`);

--
-- Indices de la tabla `dispositivo`
--
ALTER TABLE `dispositivo`
  ADD PRIMARY KEY (`id_dispositivo`),
  ADD KEY `FKdispositiv298031` (`id_user`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `data`
--
ALTER TABLE `data`
  MODIFY `id_data` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `dispositivo`
--
ALTER TABLE `dispositivo`
  ADD CONSTRAINT `FKdispositiv298031` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `FKdispositiv549978` FOREIGN KEY (`id_dispositivo`) REFERENCES `data` (`id_data`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
