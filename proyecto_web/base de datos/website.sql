-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-04-2024 a las 02:45:32
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `website`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_configuraciones`
--

CREATE TABLE `tbl_configuraciones` (
  `id` int(11) NOT NULL,
  `nombre_configuracion` varchar(255) NOT NULL,
  `valor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_configuraciones`
--

INSERT INTO `tbl_configuraciones` (`id`, `nombre_configuracion`, `valor`) VALUES
(1, 'bienvenida_principal', 'bienvanid@ a tu espacio'),
(2, 'bienvenida_secundaria', 'un gusto tenerte con nosotros'),
(3, 'boton_principal', 'empezar'),
(4, 'link_boton_principal', '#servicios'),
(5, 'titulo_servicios', 'servicios'),
(6, 'descripcion_servicios', 'Lorem ipsum dolor sit amet consectetur. prueba'),
(7, 'titulo_portafolio', 'portafolio'),
(8, 'descripcion_portafolio', 'Lorem ipsum dolor sit amet consectetur. prueba'),
(9, 'titulo_about', 'about'),
(10, 'titulo_equipo', 'equipo'),
(11, 'descripcion_about', 'Lorem ipsum dolor sit amet consectetur. prueba'),
(12, 'descripcion_equipo', 'Lorem ipsum dolor sit amet consectetur. prueba'),
(13, 'ultima_opcion__about', 'Be Part Of Our Story! '),
(14, 'titulo_contactanos', 'Contact Us'),
(15, 'descripcion_contactanos', 'Lorem ipsum dolor sit amet consectetur. prueba'),
(16, 'link_x', 'x.com'),
(17, 'link_facebook', 'facebook.com'),
(18, 'link_linkedin', 'linkedin.com'),
(19, 'sub_descripcion_equipo', 'Lorem ipsum dolor sit amet consectetur. prueba de equipo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_entrada`
--

CREATE TABLE `tbl_entrada` (
  `id` int(11) NOT NULL,
  `fecha` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_entrada`
--

INSERT INTO `tbl_entrada` (`id`, `fecha`, `titulo`, `descripcion`, `imagen`) VALUES
(1, '2024-04-10', 'pepito2.0', 'testt de datos mysql2.0', '1712681924_3.jpg'),
(2, '2024-04-09', 'Our Humble Beginnings', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!', '4.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_equipo`
--

CREATE TABLE `tbl_equipo` (
  `id` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `nombre_completo` varchar(255) NOT NULL,
  `puesto` varchar(255) NOT NULL,
  `x` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_equipo`
--

INSERT INTO `tbl_equipo` (`id`, `imagen`, `nombre_completo`, `puesto`, `x`, `facebook`, `linkedin`) VALUES
(1, '1712699927_1.jpg', 'Parveen Anand', 'Lead Designer', 'xxxx', 'xxxxx', 'xxxxx'),
(2, '1712697837_2.jpg', 'Diana Petersen', 'Lead Marketer', 'xxxx', 'xxxxx', 'xxxxx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_portafolio`
--

CREATE TABLE `tbl_portafolio` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `subtitulo` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `cliente` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_portafolio`
--

INSERT INTO `tbl_portafolio` (`id`, `titulo`, `subtitulo`, `imagen`, `descripcion`, `cliente`, `categoria`, `url`) VALUES
(13, 'Titulo Threads', 'Lorem ipsum dolor sit amet consectetur.', '1712277029_1.jpg', 'Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum', 'Threads', ' Illustration', 'www.programing.comm'),
(14, 'titulo Explore', 'Lorem ipsum dolor sit amet consectetur.', '1712277281_2.jpg', 'Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum', 'Explore', 'Graphic Design', 'www.programing.comm'),
(15, 'titulo Finish', 'Lorem ipsum dolor sit amet consectetur.', '1712277331_3.jpg', 'Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum', 'Finish ', 'Identity', 'www.programing.comm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_servicios`
--

CREATE TABLE `tbl_servicios` (
  `id` int(11) NOT NULL,
  `icono` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_servicios`
--

INSERT INTO `tbl_servicios` (`id`, `icono`, `titulo`, `descripcion`) VALUES
(1, '   fa-shopping-cart   ', '   shopping-cart   ', '     un flor de color amarillo '),
(2, 'fa-laptop', 'mantenimiento', 'a todas las laptops'),
(3, 'fa-lock', 'seguridad', 'seguridad de extremo a extremo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id`, `usuario`, `password`, `correo`) VALUES
(1, 'userroot', '1234', 'user@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_configuraciones`
--
ALTER TABLE `tbl_configuraciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_entrada`
--
ALTER TABLE `tbl_entrada`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_equipo`
--
ALTER TABLE `tbl_equipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_portafolio`
--
ALTER TABLE `tbl_portafolio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_servicios`
--
ALTER TABLE `tbl_servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_configuraciones`
--
ALTER TABLE `tbl_configuraciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tbl_entrada`
--
ALTER TABLE `tbl_entrada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_equipo`
--
ALTER TABLE `tbl_equipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_portafolio`
--
ALTER TABLE `tbl_portafolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tbl_servicios`
--
ALTER TABLE `tbl_servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
