-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 03-08-2024 a las 19:20:01
-- Versión del servidor: 8.3.0
-- Versión de PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sin-tapujos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

DROP TABLE IF EXISTS `preguntas`;
CREATE TABLE IF NOT EXISTS `preguntas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pregunta` text COLLATE utf8mb4_general_ci NOT NULL,
  `opcion1` text COLLATE utf8mb4_general_ci NOT NULL,
  `opcion2` text COLLATE utf8mb4_general_ci NOT NULL,
  `opcion3` text COLLATE utf8mb4_general_ci NOT NULL,
  `opcion4` text COLLATE utf8mb4_general_ci NOT NULL,
  `respuesta_correcta` int NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `pregunta`, `opcion1`, `opcion2`, `opcion3`, `opcion4`, `respuesta_correcta`, `imagen`) VALUES
(36, '2. ¿Cuál de los siguientes métodos anticonceptivos consiste en la esterilización quirúrgica permanente?', '   a) Vasectomía ', '   b) Píldora del día después', '   c) Inyección anticonceptiva', '   d) Anillo vaginal', 1, 'sin_imagen.jpg'),
(37, '3. ¿Cuál de los siguientes métodos anticonceptivos es más efectivo para prevenir enfermedades de transmisión sexual (ETS)?', 'a) DIU', '   b) Píldora anticonceptiva', '   c) Condón masculino ', '   d) Implante subdérmico', 3, 'sin_imagen.jpg'),
(40, 'fdfdsf', 'ree', 'dff', 'hh', 'bb', 2, 'sin_imagen.jpg'),
(41, 'fdsf', 'rr', 'bbb', 'mm', 'lll', 4, 'sin_imagen.jpg'),
(42, 'sdsvnb', 'aa', 'bb', 'cc', 'dd', 2, 'sin_imagen.jpg'),
(44, 'ghghghgh', 'ffff', 'eeee', 'llll', 'aaaaa', 2, 'sin_imagen.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

DROP TABLE IF EXISTS `resultados`;
CREATE TABLE IF NOT EXISTS `resultados` (
  `id` int NOT NULL AUTO_INCREMENT,
  `identificacion` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `preguntas_respondidas` int NOT NULL,
  `preguntas_correctas` int NOT NULL,
  `tiempo_empleado` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `identificacion` (`identificacion`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `resultados`
--

INSERT INTO `resultados` (`id`, `identificacion`, `nombre`, `apellido`, `preguntas_respondidas`, `preguntas_correctas`, `tiempo_empleado`, `fecha`) VALUES
(1, '2222', 'lina', 'Hernández ', 6, 6, '0:23', '2024-08-03'),
(2, '3333', 'luisa', 'martinez', 6, 5, '0:36', '2024-08-03'),
(3, '3333', 'luisa', 'martinez', 6, 6, '0:41', '2024-08-03'),
(4, '2222', 'lina', 'Hernández ', 6, 2, '0:41', '2024-08-03'),
(5, '3333', 'luisa', 'martinez', 6, 3, '0:23', '2024-08-03'),
(6, '4444', 'jorge', 'suarez', 5, 0, '0:12', '2024-08-03'),
(7, '7777', 'sandra', 'quiroz', 5, 4, '0:20', '2024-08-03'),
(8, '6666', 'juan', 'perez', 5, 4, '0:29', '2024-08-03'),
(9, '2222', 'lina', 'Hernández ', 6, 3, '0:19', '2024-08-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `identificacion` int NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `apellido` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `usuario` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contraseña` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `veces_iniciado_sesion` int DEFAULT '0',
  `veces_realizado_pruebas` int DEFAULT '0',
  `puntajes` text COLLATE utf8mb4_general_ci,
  `user_level` enum('profesor','estudiante') COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`identificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`identificacion`, `nombre`, `apellido`, `email`, `usuario`, `contraseña`, `veces_iniciado_sesion`, `veces_realizado_pruebas`, `puntajes`, `user_level`) VALUES
(1111, 'Silene', 'Gonzalez Quiroz', 'silenegonzalezquiroz@gmail.com', 'sileneg', '$2y$10$VV1p2F2/lrugccCfBtiJv.hTQPlEJYoFsRH2tpG3LkKfVFYzroAtW', 0, 0, NULL, 'profesor'),
(2222, 'lina', 'Hernández ', 'hernandez.lina@gmail.com', 'linam', '$2y$10$FP5P89EV7v.26zVH03lraenxdJ6UrixNL9.bScJA.Pw55qygjgJzq', 0, 0, NULL, 'estudiante'),
(3333, 'luisa', 'martinez', 'luisa@gmail.com', 'luisam', '$2y$10$upyYh/Q9/IWvhUOJ3PdtzOlWhCafaY0j0y8fcTjZmX.CBBkcXa67m', 0, 0, NULL, 'estudiante'),
(4444, 'jorge', 'suarez', 'jorge@gmail.com', 'jorges', '$2y$10$P..AYKVMuLkGbVpzpO/QluxImHXI9X8KDFtOIAlJyBmiuUjAfe7Oy', 0, 0, NULL, 'estudiante'),
(5555, 'juana', 'fuentes', 'juana@gmail.com', 'jua', '$2y$10$LFWD7IftlEbDrOyZslBik.F.5uF.y4MEqpexPrcFWOQ8CYlooLoyW', 0, 0, NULL, 'estudiante'),
(6666, 'juan', 'perez', 'juan@gmail.com', 'juanp', '$2y$10$iRXiDppyrereV8ZtAQ3K5eV1lM04n59.MskFrI0lapWOd/hnC8TAy', 0, 0, NULL, 'estudiante'),
(7777, 'sandra', 'quiroz', 'sandra@gmail.com', 'sandraq', '$2y$10$sdDbyrXqgx5yr8XKawGR2.Tj7QIDLNC6.EHD7kjGhEe.pm8qBJOua', 0, 0, NULL, 'estudiante');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
