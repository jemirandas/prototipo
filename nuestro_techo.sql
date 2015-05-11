-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-04-2015 a las 04:41:57
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `nuestro_techo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `cedula` bigint(25) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `user` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` varchar(25) NOT NULL,
  `sucursal` varchar(20) NOT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`cedula`, `nombre`, `user`, `password`, `email`, `direccion`, `telefono`, `sucursal`) VALUES
(345, 'Andrea', 'andrea', '$2a$08$HztBYlkbS36osK8cVRMB8.3', 'andrea@nuestrotecho.com', 'djddsklksd', '3456', 'Bogotá'),
(1037, 'Sergio Andrés', 'checho', '$2a$08$G4b9I2RnCsRz/Cq5IcigdOa', 'checho@nuestrotecho.com', 'avenida las vegas', '222', 'Medellín'),
(1036765, 'Jonathan García Escudero', 'jogarciaes', '$2a$08$2XlEGK2IWi3/x0uu1XkVZur', 'jogarciaes@nuestrotecho.com', 'avenida la 33 con San Juan', '344 56 77', 'Medellín');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE IF NOT EXISTS `sucursal` (
  `ID` int(11) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `ciudad` varchar(20) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`ID`, `direccion`, `ciudad`, `telefono`) VALUES
(1, 'crr 83 N° 57 20', 'Medellín', '356 77 99'),
(2, 'cll 67 C nro 45-34', 'Bogotá', '567 89 00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `cedula` bigint(20) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `user` varchar(20) NOT NULL,
  `password` varchar(72) NOT NULL,
  `type` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  PRIMARY KEY (`cedula`),
  UNIQUE KEY `user` (`user`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`cedula`, `nombre`, `user`, `password`, `type`, `email`, `direccion`, `telefono`) VALUES
(1, 'Admin', 'admin', '$2a$08$JXN.kcP2K0nkK2Ke0QrXZOgcYd75O74JvXaJKdwKq8LMAMYuNTB8W', 'administrador', 'zzzexample@example.com', 'avenida siempre viva', '234 56 77'),
(2, 'Jorge', 'jorge', '$2a$08$tt9Nr5DyMUdyWMbD2M0/k.MYUie3TYekrvbtPNQH1cuvMyTjhOxv.', 'user', 'zzzexample2@example.com', 'cll 33', '314 893 33 80'),
(5, 'Jonathan', 'rey', '$2a$08$HVkI1nTxJLiOwIXK5khFjOJFGcbfH7s533GJoQgeoqNaauAo23hw2', 'administrador', 'rey@example.com', 'cll 77A nro 52B 31', '277 37 88');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
