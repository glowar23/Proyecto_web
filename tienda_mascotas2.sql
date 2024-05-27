-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-05-2024 a las 00:59:30
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
-- Base de datos: `tienda_mascotas2`
--
CREATE DATABASE IF NOT EXISTS `tienda_mascotas2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tienda_mascotas2`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nombre`, `status`, `parent_id`) VALUES
(1, 'Gatos', 1, 0),
(2, 'Perros', 1, 0),
(3, 'Pajaros', 1, 0),
(4, 'Pescados', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_transaccion`
--

CREATE TABLE `detalles_transaccion` (
  `productos_idproductos` int(11) NOT NULL,
  `transaccion_idtransaccion` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `descuento` double DEFAULT 0,
  `precio` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `detalles_transaccion`
--

INSERT INTO `detalles_transaccion` (`productos_idproductos`, `transaccion_idtransaccion`, `cantidad`, `descuento`, `precio`) VALUES
(1, 3, 1, 0, 699),
(2, 1, 1, 0, 650),
(4, 2, 1, 0, 750);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilio`
--

CREATE TABLE `domicilio` (
  `idDomicilio` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `calle` varchar(45) DEFAULT NULL,
  `colonia` varchar(45) DEFAULT NULL,
  `codigo_postal` varchar(45) DEFAULT NULL,
  `numero_exterior` int(11) DEFAULT NULL,
  `numero_interior` int(11) DEFAULT NULL,
  `referencia` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `domicilio`
--

INSERT INTO `domicilio` (`idDomicilio`, `usuarios_id`, `calle`, `colonia`, `codigo_postal`, `numero_exterior`, `numero_interior`, `referencia`) VALUES
(1, 8, 'del valle', 'sisi', 'sisi', 109, 20, 'una casota'),
(11, 8, 'Michoacán', 'LAZARO CARDENA', '58570', 75, 0, 'una casota'),
(12, 8, 'Pruebita street', 'Nuevo', '2222', 20, 0, 'tonaiiiiiig we are younngggg'),
(13, 5, 'Calle del admin', 'Centro', '58000', 1, 0, 'Casa del admin apoco no'),
(14, 4, 'asfdasfsa', 'fsadfas', '234234', 23, 0, 'fsdfasfda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `idimagenes` int(11) NOT NULL,
  `ruta` text NOT NULL,
  `productos_idproductos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`idimagenes`, `ruta`, `productos_idproductos`) VALUES
(1, 'alimento_ave.jpeg', 5),
(3, 'felix_croquetas.jpg', 1),
(4, 'hueso_perro.jpg', 3),
(5, 'pedigree.jpg', 2),
(6, 'rascador_gato.jpeg', 4),
(7, 'pro_a6f06235d51f41a94515fe0271f7576b.jpg', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE `mascotas` (
  `idmascota` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `tipo_animal` varchar(45) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `mascotas`
--

INSERT INTO `mascotas` (`idmascota`, `usuarios_id`, `nombre`, `tipo_animal`, `fecha_nacimiento`) VALUES
(1, 8, NULL, 'cat', NULL),
(2, 8, 'fasdf', 'cat', NULL),
(3, 8, 'Romino', 'dog', NULL),
(4, 8, 'Leo', 'fish', NULL),
(5, 8, 'panfilo', 'dog', NULL),
(6, 4, 'Rodolfo', 'bird', NULL),
(10, 4, 'Musa la enterna', 'cat', NULL),
(11, 4, 'Mario', 'bird', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `idmodulo` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`idmodulo`, `titulo`, `descripcion`, `status`) VALUES
(1, 'Dashboard', 'Dashboard', 1),
(2, 'Usuarios', 'Usuarios del sistema', 1),
(3, 'Clientes', 'Clientes de tienda', 1),
(4, 'Productos', 'Todos los productos', 1),
(5, 'Pedidos', 'Pedidos', 1),
(6, 'Caterogías', 'Caterogías Productos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `idpermiso` bigint(20) NOT NULL,
  `idRol` int(11) NOT NULL,
  `moduloid` int(11) NOT NULL,
  `r` int(11) NOT NULL DEFAULT 0,
  `w` int(11) NOT NULL DEFAULT 0,
  `u` int(11) NOT NULL DEFAULT 0,
  `d` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`idpermiso`, `idRol`, `moduloid`, `r`, `w`, `u`, `d`) VALUES
(49, 7, 1, 0, 0, 0, 0),
(50, 7, 2, 0, 0, 0, 0),
(51, 7, 3, 0, 0, 0, 0),
(52, 7, 4, 1, 1, 1, 1),
(53, 7, 5, 0, 0, 0, 0),
(54, 7, 6, 0, 0, 0, 0),
(55, 6, 1, 0, 0, 0, 0),
(56, 6, 2, 0, 0, 0, 0),
(57, 6, 3, 1, 0, 0, 0),
(58, 6, 4, 1, 0, 0, 1),
(59, 6, 5, 0, 0, 0, 0),
(60, 6, 6, 0, 0, 0, 0),
(157, 4, 1, 0, 0, 0, 0),
(158, 4, 2, 0, 0, 0, 0),
(159, 4, 3, 0, 0, 0, 0),
(160, 4, 4, 1, 0, 0, 0),
(161, 4, 5, 1, 1, 1, 0),
(162, 4, 6, 1, 0, 0, 0),
(210, 11, 1, 0, 0, 0, 0),
(211, 11, 2, 0, 0, 0, 0),
(212, 11, 3, 0, 0, 0, 0),
(213, 11, 4, 1, 1, 1, 1),
(214, 11, 5, 0, 0, 0, 0),
(215, 11, 6, 0, 0, 0, 0),
(216, 5, 1, 0, 0, 0, 0),
(217, 5, 2, 0, 0, 0, 0),
(218, 5, 3, 1, 1, 0, 0),
(219, 5, 4, 0, 0, 0, 0),
(220, 5, 5, 1, 0, 1, 0),
(221, 5, 6, 0, 0, 0, 0),
(312, 3, 1, 1, 1, 1, 1),
(313, 3, 2, 1, 1, 1, 1),
(314, 3, 3, 1, 1, 1, 1),
(315, 3, 4, 1, 1, 1, 1),
(316, 3, 5, 1, 1, 1, 1),
(317, 3, 6, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idproductos` int(11) NOT NULL,
  `nombre_producto` varchar(45) NOT NULL,
  `Descripcion` text DEFAULT '<p></p>',
  `precio` double DEFAULT NULL,
  `SKU` varchar(45) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `ruta` varchar(255) NOT NULL,
  `proveedores_idproveedores` int(11) DEFAULT NULL,
  `categoria_idcategoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproductos`, `nombre_producto`, `Descripcion`, `precio`, `SKU`, `stock`, `status`, `ruta`, `proveedores_idproveedores`, `categoria_idcategoria`) VALUES
(1, 'Croquetas Felix', ' ', 699, 'ABCDASDR14', 23, 1, '', NULL, 1),
(2, 'Croquetas Pedigree', '<p>Comida para perro</p>', 150, 'ABHDASDR14', 20, 1, 'croquetas-pedigree', NULL, 2),
(3, 'Hueso para perro', ' ', 99, 'BBCDASDR14', 20, 1, '', NULL, 2),
(4, 'Rascador para gato', '<p>fsdfsdaf</p>', 750, 'ABCDAHDR14', 200, 1, 'rascador-para-gato', NULL, 1),
(5, 'Alimento para Ave Prestige', ' ', 150, 'A2CDASDR14', 200, 1, '', NULL, 3),
(6, 'Cepillo para gato', ' ', 150, 'ABVDSG12', 100, 1, '', NULL, 1),
(8, 'sobresito para perro', '<p>Es comida para perro&nbsp;</p> <ol> <li>Muy rica&nbsp;</li> <li>Si, yo lo compruebo</li> </ol>', 30, 'DHASLKf323', 100, 1, 'sobresito-para-perro', NULL, 2),
(9, 'Jaula', '<p>No se</p>', 400, 'FHFSLLf321', 5, 1, 'jaula', NULL, 3),
(10, 'Tronco artificial', '<p>Tampoco se</p>', 150, 'DHFSLKf321', 5, 1, 'tronco-artificial', NULL, 3),
(11, 'Pecera', '', 200, 'FHFSLLf422', 100, 1, 'pecera', NULL, 4),
(12, 'Alimento para pez', '', 50, 'AHFSLKf323', 89, 1, 'alimento-para-pez', NULL, 4),
(13, 'Coral artificial', '<p>Es como pasto pero para peces</p>', 150, 'DHFBLKf323', 66, 1, 'coral-artificial', NULL, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `idproveedores` int(11) NOT NULL,
  `nombre_proveedor` varchar(45) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `nombreRol` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombreRol`, `descripcion`, `status`) VALUES
(3, 'Admin', 'Libre de modifiar todo el sistema', 1),
(4, 'Cliente', 'Cliente en general', 1),
(5, 'Supervisor', 'Supervisa a los empleados', 1),
(6, 'Adminrante', 'admira', 0),
(7, 'Taquero', 'hace tacos', 0),
(8, 'Ejemplo 6', 'fsafwsdfa', 0),
(9, 'Ejemplo 6', 'sdfasfd', 0),
(10, 'Ejemplo 6', 'gsdfgsdf', 0),
(11, 'Taquero', 'Hace tacos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas`
--

CREATE TABLE `tarjetas` (
  `id_tarjeta` int(11) NOT NULL,
  `titular` varchar(45) NOT NULL,
  `no_tarjeta` varchar(20) NOT NULL,
  `expiracion` varchar(15) NOT NULL COMMENT 'fecha de expiración de la tarjeta',
  `cvv` int(11) NOT NULL,
  `id_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tarjetas`
--

INSERT INTO `tarjetas` (`id_tarjeta`, `titular`, `no_tarjeta`, `expiracion`, `cvv`, `id_usuarios`) VALUES
(1, 'omar', '12361521', '05/2020', 123, 8),
(2, 'Omar Garcia Lara', '1234-1234-1235-1234', '05/2020', 40, 8),
(3, 'ALANA LA RANA', '2020-0202-2323-2323', '05/2023', 40, 8),
(4, 'Admin de la Tienda', '1234 1234 1234 1234', '02/2032', 40, 5),
(5, 'fasdsdf', '1234 1234 1233 1231', '1231215', 40, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaccion`
--

CREATE TABLE `transaccion` (
  `idtransaccion` int(11) NOT NULL,
  `fecha_hora` datetime DEFAULT current_timestamp(),
  `total` double DEFAULT NULL,
  `usuarios_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Esperando Pago',
  `id_tarjeta` int(11) DEFAULT NULL,
  `id_domicilio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `transaccion`
--

INSERT INTO `transaccion` (`idtransaccion`, `fecha_hora`, `total`, `usuarios_id`, `status`, `id_tarjeta`, `id_domicilio`) VALUES
(1, '2024-05-10 18:51:33', 650, 4, 'Esperando Pago', 5, 14),
(2, '2024-05-11 12:14:28', 750, 8, 'Esperando Pago', 3, 12),
(3, '2024-05-27 11:18:13', 699, 4, 'Esperando Pago', 5, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `password` varchar(256) NOT NULL,
  `tipo_usuario` varchar(45) NOT NULL DEFAULT 'Cliente',
  `email` varchar(45) NOT NULL,
  `idRol` int(11) NOT NULL DEFAULT 4,
  `last_login` datetime DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `tipo_usuario`, `email`, `idRol`, `last_login`, `status`) VALUES
(1, 'Administrador', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'Cliente', 'admin0@gmail.com', 3, '2024-05-27 16:46:29', 1),
(4, 'Edgar Josué', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'Cliente', 'nose@gmail.com', 4, '2024-05-27 11:50:36', 1),
(5, 'Admin', 'admin1234', 'Admin', 'admin@gmail.com', 3, '2024-05-03 18:58:54', 1),
(7, 'Horacio', '1234', 'Cliente', 'horacio0@gmial.com', 4, '2024-04-10 15:22:06', 0),
(8, 'Aaa', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'Cliente', 'omar@gmail.com', 4, '2024-05-11 13:59:24', 1),
(9, 'Horacion', '2452142efe30f19350b3a64e7259aa603c755851b1cd3', 'Cliente', 'nose23@gmail.com', 5, '2024-05-04 11:31:16', 0),
(10, 'Mauricio', 'd348358535401c8b29c17d192bb93cd6d76fae5cca2be', 'Cliente', 'nose2333@gmail.com', 11, '2024-05-04 11:32:53', 0),
(11, 'José', '42c4c03f580715890c43672b2d49deffb899a47dd7dee', 'Cliente', 'eagdgsa@gmail.com', 4, '2024-05-04 11:33:17', 0),
(12, 'Omarcin', 'e9439300ab082b03d8c34de28b637f1e18e3f9ee826f2', 'Cliente', 'ofsadf@gmail.com', 3, '2024-05-04 14:12:45', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `detalles_transaccion`
--
ALTER TABLE `detalles_transaccion`
  ADD PRIMARY KEY (`productos_idproductos`,`transaccion_idtransaccion`),
  ADD KEY `fk_productos_has_transaccion_transaccion1` (`transaccion_idtransaccion`);

--
-- Indices de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD PRIMARY KEY (`idDomicilio`),
  ADD KEY `fk_Domiciolio_usuarios1` (`usuarios_id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`idimagenes`),
  ADD KEY `fk_imagenes_productos1` (`productos_idproductos`);

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`idmascota`),
  ADD KEY `fk_mascotas_usuarios1` (`usuarios_id`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`idmodulo`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idpermiso`),
  ADD KEY `idRol` (`idRol`),
  ADD KEY `moduloid` (`moduloid`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproductos`),
  ADD KEY `fk_productos_proveedores1` (`proveedores_idproveedores`),
  ADD KEY `fk_productos_categoria1` (`categoria_idcategoria`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`idproveedores`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  ADD PRIMARY KEY (`id_tarjeta`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `transaccion`
--
ALTER TABLE `transaccion`
  ADD PRIMARY KEY (`idtransaccion`),
  ADD KEY `fk_transaccion_usuarios1` (`usuarios_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idRol` (`idRol`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  MODIFY `idDomicilio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `idimagenes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `idmascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `idmodulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idpermiso` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=318;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproductos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  MODIFY `id_tarjeta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `transaccion`
--
ALTER TABLE `transaccion`
  MODIFY `idtransaccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalles_transaccion`
--
ALTER TABLE `detalles_transaccion`
  ADD CONSTRAINT `fk_productos_has_transaccion_productos1` FOREIGN KEY (`productos_idproductos`) REFERENCES `productos` (`idproductos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_productos_has_transaccion_transaccion1` FOREIGN KEY (`transaccion_idtransaccion`) REFERENCES `transaccion` (`idtransaccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD CONSTRAINT `fk_Domiciolio_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `fk_imagenes_productos1` FOREIGN KEY (`productos_idproductos`) REFERENCES `productos` (`idproductos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD CONSTRAINT `fk_mascotas_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`),
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`moduloid`) REFERENCES `modulo` (`idmodulo`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_categoria1` FOREIGN KEY (`categoria_idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_productos_proveedores1` FOREIGN KEY (`proveedores_idproveedores`) REFERENCES `proveedores` (`idproveedores`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  ADD CONSTRAINT `tarjetas_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `transaccion`
--
ALTER TABLE `transaccion`
  ADD CONSTRAINT `fk_transaccion_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
