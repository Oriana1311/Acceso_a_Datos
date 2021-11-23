-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2021 a las 19:44:55
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdamorosos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contrasenna` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `email`, `contrasenna`) VALUES
(1, '', '', '', ''),
(2, '', '', '', ''),
(3, '', '', '', ''),
(4, '', '', '', ''),
(5, '', '', '', ''),
(6, '', '', '', ''),
(7, '', '', '', ''),
(8, '', '', '', ''),
(9, '', '', '', ''),
(10, '', '', '', ''),
(11, '', '', '', ''),
(14, 'Oriana', 'ori', 'ihsh@jdjd', 'fghjk'),
(15, 'dfsg', 'zxcb', 'cxvb@dfg', 'dfhdfgh'),
(19, 'Oriana', 'ori', 'cxvb@dfg', 'pok'),
(20, 'Oriana', 'zxcb', 'dfgh@ghj', 'dfghj'),
(21, 'dfsg', 'fgh', 'fgh@ghjk', 'erty'),
(22, 'ghjkl', 'bnm,.', 'fgh@ghjk', 'fghjkl'),
(23, 'Oriana', 'zxcb', 'dfgh@ghj', 'fghjk'),
(24, 'dfsg', 'zxcb', 'cxvb@dfg', 'dfghjk'),
(25, 'Oriana', 'zxcb', 'cxvb@dfg', 'dfghjk'),
(26, 'Oriana', 'zxcb', 'orianagdelgado@gmail.com', 'ij'),
(27, 'Oriana', 'ori', 'orianagdelgado@gmail.com', 'cvb'),
(28, 'Oriana', 'ori', 'ori@orri', 'dfghjk'),
(29, 'Oriana', 'ori', 'ori@orri', 'dfghjk'),
(30, 'srght', 'orifuffgh', 'dfgh@ghj', '1'),
(31, 'ghihj', 'hugch', 'ori@orri', '1'),
(32, 'srght', 'qwsddf', 'cxvb@dfg', '1'),
(33, 'dfsg', 'lkjh', 'orianagdelgado@gmail.com', '1'),
(34, 'srght', 'lkjhgfd', 'orianagdelgado@gmail.com', '1'),
(35, 'dfsg', 'nbvcx', 'orianagdelgado@gmail.com', '1'),
(36, 'ori2', 'ori2', 'orianagildelgado@gmail.com', '2'),
(37, 'ori3', 'ori3', 'orianagdelgado@gmail.com', '3'),
(38, 'ori4', 'ori4', 'orianagildelgado@gmail.com', '4'),
(39, 'ori5', 'ori5', 'orianagdelgado@gmail.com', '5'),
(40, '55', '55', 'orianagildelgado@gmail.com', '55'),
(41, '66', '66', 'orianagdelgado@gmail.com', '66');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
