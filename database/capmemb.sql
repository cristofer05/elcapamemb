-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-07-2017 a las 04:35:45
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `medisys`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembros`
--

CREATE TABLE `miembros` (
  `codigo` varchar(10) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `fnacimiento` varchar(20) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `localidad` varchar(50) NOT NULL,
  `ocupacion` varchar(50) NOT NULL,
  `correo` varchar(70) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `fexpiracion` varchar(20) NOT NULL,
  `created_user` int(3) NOT NULL,
  `created_full_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_date` varchar(20) NOT NULL,
  `updated_user` int(3) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `miembros`
--

INSERT INTO `miembros` (`codigo`, `nombres`, `apellidos`, `cedula`, `fnacimiento`, `sexo`, `localidad`, `ocupacion`, `correo`, `telefono`, `categoria`, `fexpiracion`, `created_user`, `created_full_date`, `created_date`, `updated_user`, `updated_date`) VALUES
('CAP-000362', 'Juan Carlos', 'Perez Valles', '402-2056454-2', '1991-07-24', 'Masculino', 'Santo Domingo', 'Estudiante', 'juancarlos@gmail.com', '809-123-3211','Standar', '2018-01-26', 1, '2017-07-24 16:43:20', '2018-01-01', 1, '2017-07-26 02:09:06'),
('CAP-000363', 'Jose Luis', 'De jesus', '002-5643254-1', '1990-04-22', 'Masculino', 'Santo Domingo', 'Estudiante', 'jose@gmail.com', '809-143-3151','Standar', '2018-01-26', 1, '2017-07-24 16:43:20', '2017-01-26', 1, '2017-07-26 02:09:06'),
('CAP-000364', 'Maria Rosa', 'Rodriguez Almonte', '001-11434354-1', '1987-01-12', 'Femenino', 'Santo Domingo', 'Estudiante', 'maria@gmail.com', '849-643-2151','Standar', '2018-01-26', 1, '2017-07-24 16:43:20', '2017-01-02', 1, '2017-07-26 02:09:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaccion_medicamentos`
--

CREATE TABLE `transaccion_medicamentos` (
  `codigo_transaccion` varchar(15) NOT NULL,
  `fecha` date NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `numero` int(11) NOT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tipo_transaccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `transaccion_medicamentos`
--

INSERT INTO `transaccion_medicamentos` (`codigo_transaccion`, `fecha`, `codigo`, `numero`, `created_user`, `created_date`, `tipo_transaccion`) VALUES
('TM-2017-0000001', '2017-07-26', 'CAP-000362', 5, 1, '2017-07-26 02:09:06', 'Entrada'),
('TM-2017-0000002', '2017-07-26', 'CAP-000363', 10, 1, '2017-07-26 02:09:28', 'Entrada'),
('TM-2017-0000003', '2017-07-26', 'CAP-000364', 5, 1, '2017-07-26 02:09:36', 'Salida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefono` varchar(13) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `permisos_acceso` enum('Super Admin','Gerente','Almacen') NOT NULL,
  `status` enum('activo','bloqueado') NOT NULL DEFAULT 'activo',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `username`, `name_user`, `password`, `email`, `telefono`, `foto`, `permisos_acceso`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Sistemas Webs', '21232f297a57a5a743894a0e4a801fc3', 'info@sist.com', '7025', 'user-default.png', 'Super Admin', 'activo', '2017-04-01 08:15:15', '2017-07-25 23:35:23'),
(2, 'juan', 'juan', 'a94652aa97c7211ba8954dd15a3cf838', 'juab@juan.com', '12000', NULL, 'Almacen', 'activo', '2017-07-25 22:34:03', '2017-07-25 22:42:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `miembros`
--
ALTER TABLE `miembros`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`);

--
-- Indices de la tabla `transaccion_medicamentos`
--
ALTER TABLE `transaccion_medicamentos`
  ADD PRIMARY KEY (`codigo_transaccion`),
  ADD KEY `id_barang` (`codigo`),
  ADD KEY `created_user` (`created_user`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `level` (`permisos_acceso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `miembros`
--
ALTER TABLE `miembros`
  ADD CONSTRAINT `miembros_ibfk_1` FOREIGN KEY (`created_user`) REFERENCES `usuarios` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `miembros_ibfk_2` FOREIGN KEY (`updated_user`) REFERENCES `usuarios` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `transaccion_medicamentos`
--
ALTER TABLE `transaccion_medicamentos`
  ADD CONSTRAINT `transaccion_medicamentos_ibfk_1` FOREIGN KEY (`codigo`) REFERENCES `miembros` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaccion_medicamentos_ibfk_2` FOREIGN KEY (`created_user`) REFERENCES `usuarios` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
