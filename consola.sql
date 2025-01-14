-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-01-2025 a las 14:02:26
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `consolasnintendo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consola`
--

CREATE TABLE `consola` (
  `ID` int(6) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `año` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consola`
--

INSERT INTO `consola` (`ID`, `nombre`, `descripcion`, `año`) VALUES
(1, 'NES', 'La primera consola de Nintendo, 8 BITS bien aburridos', 1983),
(2, 'SNES', 'La SUPER nintendo, con juegazos de kirby', 1990),
(3, 'Nintendo 64', 'Puedes jugar al Mario 64 y poco más, tampoco es para tanto.', 1996),
(4, 'GameCube', 'La CONSOLA CUBO DE NINTENDO', 2001),
(5, 'Wii', 'Una vez lancé el mando de la wii volando porque no le puse la correa.', 2006),
(6, 'Wii U', 'Soy la unica persona que conozco que disfrutó de tener una WII U.', 2012),
(7, 'Switch', 'Sus joycon se rompen con solo mirarlos, pero al menos tiene el zelda', 2017),
(8, 'GameBoy', 'Pilas y brillo de pantalla no incluidos ;)', 1989),
(9, 'GameBoy Color', 'Pilas no incluidas, pero color si.', 1998),
(10, 'GameBoy Advance', 'Ahora si es una portatil decente.', 2001),
(11, 'GameBoy Micro', 'No cabe en mi mano, ni en ninguna', 2005),
(12, 'Nintendo DS', 'Sin tarjeta R4 te pierdes lo más divertido.', 2004),
(13, 'Nintendo 3DS', 'Sin la FREESHOP te pierdes lo más divertido.', 2011),
(14, 'Nintendo Alarmo', 'Es un despertador sin juegos.', 2024),
(15, 'Swich 2', 'Es todo un misterio.', 2025);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consola`
--
ALTER TABLE `consola`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
