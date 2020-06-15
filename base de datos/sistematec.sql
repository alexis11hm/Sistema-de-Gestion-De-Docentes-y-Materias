-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2020 a las 17:29:17
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistematec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `id` int(11) NOT NULL,
  `unidad` int(1) NOT NULL,
  `documento` varchar(30) NOT NULL,
  `docentemateria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `abreviatura` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id`, `nombre`, `abreviatura`) VALUES
(3, 'Academia de Ciencias Basicas', 'CBA'),
(15, 'Sistemas y Computación', 'SIS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentemateria`
--

CREATE TABLE `docentemateria` (
  `id` int(11) NOT NULL,
  `materia` int(11) NOT NULL,
  `puestodepartamento` int(11) NOT NULL,
  `anio` int(4) NOT NULL,
  `semestre` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `docentemateria`
--

INSERT INTO `docentemateria` (`id`, `materia`, `puestodepartamento`, `anio`, `semestre`) VALUES
(6, 5, 13, 2020, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id`, `nombre`) VALUES
(3, 'Cálculo Integral'),
(4, 'Cálculo vectorial'),
(5, 'Programación Web');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `nombre` varchar(30) NOT NULL,
  `paterno` varchar(30) NOT NULL,
  `materno` varchar(30) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `rfc` varchar(30) NOT NULL,
  `curp` varchar(30) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `correo` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `tipo` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id`, `titulo`, `nombre`, `paterno`, `materno`, `sexo`, `rfc`, `curp`, `foto`, `correo`, `password`, `tipo`) VALUES
(1, 'Ingeniero en Sistemas Computacionales', 'Alexis', 'Hernandez', 'Mondragon', 'Hombre', 'HEMA981206YU6', 'HETA981106HMDRL07', 'fotos/foto.jpg', 'alexis11hm@gmail.com', '12345678', 2),
(2, 'Ingeniera En Sistemas Computacionales', 'Dulce Caroll', 'Peñaloza ', 'Tello', 'Hombre', 'PETC131292TR3', 'PETEDC123456HMNRJL', 'fotos/foto4.png', 'caroll@gmail.com', '12345678', 2),
(3, 'Ingeniero En Sistemas Computacionales', 'Erik Salvador', 'Padilla', 'Gonzalez', 'Hombre', 'PAGS123456HM2', 'PAGS123456HMNRLP07', 'fotos/foto3.jpg', 'erikgonzna@gmail.com', '12345678', 2),
(5, 'Ing. Sistemas Computacionales', 'Jose', 'Cicero', 'Barraza', 'Hombre', '312321', 'sfadsfasfs', 'fotos/images.jpg', 'pa@pa.com', '12345678', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puesto`
--

CREATE TABLE `puesto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `puesto`
--

INSERT INTO `puesto` (`id`, `nombre`) VALUES
(1, 'Docente'),
(2, 'Jefe'),
(4, 'Auxiliar'),
(9, 'Intendente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puestodepartamento`
--

CREATE TABLE `puestodepartamento` (
  `id` int(11) NOT NULL,
  `personal` int(11) NOT NULL,
  `departamento` int(11) NOT NULL,
  `puesto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `puestodepartamento`
--

INSERT INTO `puestodepartamento` (`id`, `personal`, `departamento`, `puesto`) VALUES
(10, 1, 3, 1),
(11, 1, 3, 4),
(12, 3, 15, 2),
(13, 2, 15, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `docentemateria`
--
ALTER TABLE `docentemateria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `puesto`
--
ALTER TABLE `puesto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `puestodepartamento`
--
ALTER TABLE `puestodepartamento`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `docentemateria`
--
ALTER TABLE `docentemateria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `puesto`
--
ALTER TABLE `puesto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `puestodepartamento`
--
ALTER TABLE `puestodepartamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
