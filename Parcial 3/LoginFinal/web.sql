-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 26-05-2021 a las 18:31:22
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `web` se necesita crear 
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE IF NOT EXISTS `alumnos` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Edad` int(3) NOT NULL,
  `Especialidad` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `Nombre`, `Edad`, `Especialidad`) VALUES
(2, 'Coty', 21, 'Electrica'),
(4, 'Cristina', 20, 'Mecatronica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `nombre_usuario` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nombre_completo` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre_usuario`, `password`, `nombre_completo`) VALUES
('Lizandro', 'coty', 'Lizandro Valdez Gutierrez'),
('Leon', '123', 'Leonardo Valdez Gutierrez'),
('Osto', '0sto', 'Sergio Osvaldo Osto Rojas'),
('Charly', 'car1os', 'Carlos Eugenio Lopez Coto'),
('Villegas', 'Vi11egas', 'Jesus Villegas Ruiz'),
('Cami', 'c4mila', 'Camila Gutierrez Hurtado'),
('Eddy', 'edd1', 'Eduardo Valdez Gutierrez'),
('gera', '123', 'Gerardo');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
