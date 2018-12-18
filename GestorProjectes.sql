-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 18-12-2018 a las 13:56:44
-- Versión del servidor: 5.7.24-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `GestorProjectes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especificaciones`
--

CREATE TABLE `especificaciones` (
  `id_especificacion` int(11) NOT NULL,
  `id_projecte` int(11) NOT NULL,
  `nombre_especificacion` varchar(255) NOT NULL,
  `dificultad` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `tiempo` time NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `acabado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `especificaciones`
--

INSERT INTO `especificaciones` (`id_especificacion`, `id_projecte`, `nombre_especificacion`, `dificultad`, `descripcion`, `tiempo`, `id_usuario`, `acabado`) VALUES
(1, 1, 'Esp1', 'Media', 'prueba', '02:00:00', 1, 0),
(2, 1, 'Espe2', 'Facil', 'Adios', '03:00:00', 1, 0),
(3, 1, 'Espe3', 'Facil', 'Adios', '03:00:00', 1, 1),
(4, 2, 'Espe1', 'Facil', 'Crear botón', '01:00:00', 1, 0),
(5, 2, 'Espe2', 'Dificil', 'Prueba', '05:08:00', 2, 0),
(6, 1, 'Espe3', 'Difícil', 'Hola', '03:00:00', 1, 0),
(7, 2, 'Espr3', 'Media', 'Hola', '02:08:10', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id_grupo` int(11) NOT NULL,
  `nombre_grupo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id_grupo`, `nombre_grupo`) VALUES
(1, 'grupo1'),
(2, 'grupo2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projectes`
--

CREATE TABLE `projectes` (
  `id_projecte` int(11) NOT NULL,
  `nombre_projecte` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `scrum_master` varchar(255) NOT NULL,
  `product_owner` varchar(255) NOT NULL,
  `id_grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `projectes`
--

INSERT INTO `projectes` (`id_projecte`, `nombre_projecte`, `descripcion`, `scrum_master`, `product_owner`, `id_grupo`) VALUES
(1, 'QuienEsQuien', 'Juego de quien es quien', 'marc', 'miguel', 1),
(2, 'GestorProjectes', 'Aplicacion de gestor de projectes', 'marc', 'miguel', 1),
(3, 'BuscaMinas', 'Juego del busca minas', 'carlos', 'marcos', 2),
(4, 'SopaLetras', 'Juego del sopa de letras', 'carlos', 'marcos', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sprint`
--

CREATE TABLE `sprint` (
  `id_sprint` int(11) NOT NULL,
  `nombre_sprint` varchar(255) NOT NULL,
  `id_especificacion` int(11) NOT NULL,
  `id_projecte` int(11) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_final` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sprint`
--

INSERT INTO `sprint` (`id_sprint`, `nombre_sprint`, `id_especificacion`, `id_projecte`, `fecha_inicio`, `fecha_final`) VALUES
(1, 'Sprint1', 1, 1, '2018-12-09', '2018-12-16'),
(4, 'Sprint2', 2, 1, '2018-12-17', '2018-12-24'),
(5, 'Sprint3', 3, 1, '2018-12-31', '2019-01-07'),
(6, 'Sprint1', 1, 2, '2018-12-03', '2018-12-10'),
(7, 'Sprint2', 4, 2, '2018-12-10', '2018-12-24'),
(8, 'Sprint3', 3, 2, '2018-12-24', '2018-12-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `password` varchar(512) NOT NULL,
  `rol` varchar(5) NOT NULL,
  `grupo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `correo`, `usuario`, `password`, `rol`, `grupo`) VALUES
(1, 'marc', 'alvarez', 'marcalvarezru8@gmail.com', 'marcalvarez', '36752aed6f2a4650f2f88a2822e3b8ef97b5404ff62813d11be0314dca76c5da37d0b0bf6de272472b274013e1bc98970a9564065435f3baa190f3284b266a64', 'SM', NULL),
(2, 'miguel', 'arteaga', 'marteagavalle@gmail.com', 'miguelarteaga', '69d02a6c3c9ea7ff711e454020a16a81f7ee438cd3334e0f9be3eb0338df2dff58a231963c681e736143eeb6c1d3280d5f053d9892ff33ff09d95cf8294c556f', 'PO', NULL),
(3, 'khalid', 'alouan', 'kalit.alouan668@gmail.com', 'khalidalouan', 'e7a978e62e94186506e8a0ed9b6bedbc4c938c50a4ef73998afdedc5c7154345647a71037fde883fcac9ade1a4e15d9a495a56641a382f39393889f26a2d0470', 'DE', 1),
(4, 'lucas', 'alvarez', 'lucasalv@gmail.com', 'lucasalvarez', 'a02e6f9f4b63c9f00232d1d478d5fb1ec7431a444f91fad58f3c7678a0113eac0dd10d8830be48c34a27f654319e026e47542dc1d5a603177aa641b882dac1f9', 'DE', NULL),
(5, 'carlos', 'ruiz', 'carlosruiz@gmail.com', 'carlosruiz', '1ca6cc129624a0f7abd0a55f443a9f31d040dc502c4f1abe5b78e7659f4fd82e1532ea3ba5c17bc4624b2ef5d2ce7cb17b53ff53b8b53bf8ab085d2387f4704a', 'SM', NULL),
(6, 'marcos', 'arteaga', 'marcosarteaga@gmail.com', 'marcosarteaga', 'a0a8418422f08bf0a9ebf039028fa228129c7b6a7db6bc22bffe2068638869bf73cf1ac337fa0748a4c0cc6aeb6d10322b3ee39d067497968258635349cfbf0c', 'PO', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `especificaciones`
--
ALTER TABLE `especificaciones`
  ADD PRIMARY KEY (`id_especificacion`),
  ADD KEY `fk_idprojectes` (`id_projecte`),
  ADD KEY `fk_id_usuario_esp` (`id_usuario`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indices de la tabla `projectes`
--
ALTER TABLE `projectes`
  ADD PRIMARY KEY (`id_projecte`),
  ADD KEY `fk_projectes` (`id_grupo`);

--
-- Indices de la tabla `sprint`
--
ALTER TABLE `sprint`
  ADD PRIMARY KEY (`id_sprint`),
  ADD KEY `fk_id_esp_sprint` (`id_especificacion`),
  ADD KEY `fk_id_projecte_sprint` (`id_projecte`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `fk_usuarios` (`grupo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `especificaciones`
--
ALTER TABLE `especificaciones`
  MODIFY `id_especificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `projectes`
--
ALTER TABLE `projectes`
  MODIFY `id_projecte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `sprint`
--
ALTER TABLE `sprint`
  MODIFY `id_sprint` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `especificaciones`
--
ALTER TABLE `especificaciones`
  ADD CONSTRAINT `fk_id_usuario_esp` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `fk_idprojectes` FOREIGN KEY (`id_projecte`) REFERENCES `projectes` (`id_projecte`);

--
-- Filtros para la tabla `projectes`
--
ALTER TABLE `projectes`
  ADD CONSTRAINT `fk_projectes` FOREIGN KEY (`id_grupo`) REFERENCES `grupos` (`id_grupo`);

--
-- Filtros para la tabla `sprint`
--
ALTER TABLE `sprint`
  ADD CONSTRAINT `fk_id_esp_sprint` FOREIGN KEY (`id_especificacion`) REFERENCES `especificaciones` (`id_especificacion`),
  ADD CONSTRAINT `fk_id_projecte_sprint` FOREIGN KEY (`id_projecte`) REFERENCES `especificaciones` (`id_projecte`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios` FOREIGN KEY (`grupo`) REFERENCES `grupos` (`id_grupo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
