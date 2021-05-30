CREATE DATABASE ValdezGu;
USE ValdezGu;
CREATE TABLE  `usuarios` (
  `nombre_usuario` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nombre_completo` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


CREATE TABLE `alumnos` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Edad` int(3) NOT NULL,
  `Especialidad` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=5;
