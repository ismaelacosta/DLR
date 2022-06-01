-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2022 a las 07:03:01
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dlr`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` int(11) NOT NULL,
  `id_usuario` int(4) NOT NULL,
  `id_producto` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejemplo`
--

CREATE TABLE `ejemplo` (
  `numero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion_venta`
--

CREATE TABLE `informacion_venta` (
  `id_informacion_venta` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_producto` int(4) NOT NULL,
  `status` varchar(20) NOT NULL,
  `cantidad_venta` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `url_imagen` varchar(255) NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `informacion_venta`
--

INSERT INTO `informacion_venta` (`id_informacion_venta`, `id_venta`, `id_producto`, `status`, `cantidad_venta`, `nombre`, `url_imagen`, `precio`) VALUES
(1, 4, 5, 'pendiente', 1, 'Pelon pelo rico', 'https://cdn.shopify.com/s/files/1/0706/6309/products/719886510878_3_489x.jpg?v=1563808309', 45),
(2, 4, 4, 'pendiente', 1, 'chicles', 'https://dulcesdelarosa.com.mx/assets/imagenes/productos/dlr-chicle-2cuatropastillas60.png', 10),
(3, 5, 4, 'pendiente', 3, 'chicles', 'https://dulcesdelarosa.com.mx/assets/imagenes/productos/dlr-chicle-2cuatropastillas60.png', 10),
(4, 5, 5, 'pendiente', 3, 'Pelon pelo rico', 'https://cdn.shopify.com/s/files/1/0706/6309/products/719886510878_3_489x.jpg?v=1563808309', 45),
(5, 5, 6, 'pendiente', 3, 'Pulparindo', 'https://www.chedraui.com.mx/medias/725226000206-00-CH1200Wx1200H?context=bWFzdGVyfHJvb3R8MjM0MjAxfGltYWdlL2pwZWd8aGE0L2hkMi8xMDI2OTUyMjI2NDA5NC5qcGd8NjUzOWJhZDY5MjcxYjk0MmNmOWRkNDliNjI5Y2EwNGUyYjdlMDM1Y2Y1YmI4Y2NjZWQ2MDMyMGQ3NTc1NWNjNg', 100),
(6, 6, 3, 'pendiente', 2, 'sabritas', 'https://www.chedraui.com.mx/medias/7501011115613-00-CH1200Wx1200H?context=bWFzdGVyfHJvb3R8NzEyOTF8aW1hZ2UvanBlZ3xoNjIvaDhmLzEwODIzNzQ2NzQ4NDQ2LmpwZ3w1Y2UwZTQ1Yzk1NWY4NDFmYjM0YjhhZGY1OGJkMTcyODc5NmE1ZmYwMTlhNDBlOTdkMmJkMDY5YmI4YWI2YjYx', 30),
(7, 6, 4, 'pendiente', 2, 'chicles', 'https://dulcesdelarosa.com.mx/assets/imagenes/productos/dlr-chicle-2cuatropastillas60.png', 10),
(8, 6, 5, 'pendiente', 2, 'Pelon pelo rico', 'https://cdn.shopify.com/s/files/1/0706/6309/products/719886510878_3_489x.jpg?v=1563808309', 45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(4) NOT NULL,
  `nombre_producto` varchar(50) DEFAULT NULL,
  `contenido_piezas` int(3) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `existencias` int(4) DEFAULT NULL,
  `url_imagen` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre_producto`, `contenido_piezas`, `marca`, `precio`, `existencias`, `url_imagen`, `descripcion`) VALUES
(3, 'sabritas', 1, 'Sabritas', 30, 19, 'https://www.chedraui.com.mx/medias/7501011115613-00-CH1200Wx1200H?context=bWFzdGVyfHJvb3R8NzEyOTF8aW1hZ2UvanBlZ3xoNjIvaDhmLzEwODIzNzQ2NzQ4NDQ2LmpwZ3w1Y2UwZTQ1Yzk1NWY4NDFmYjM0YjhhZGY1OGJkMTcyODc5NmE1ZmYwMTlhNDBlOTdkMmJkMDY5YmI4YWI2YjYx', 'A que no puedes comer solo una'),
(4, 'chicles', 4, 'de la rosa', 10, 488, 'https://dulcesdelarosa.com.mx/assets/imagenes/productos/dlr-chicle-2cuatropastillas60.png', 'chicles de cuadrito'),
(5, 'Pelon pelo rico', 18, 'Ricolino', 45, 37, 'https://cdn.shopify.com/s/files/1/0706/6309/products/719886510878_3_489x.jpg?v=1563808309', 'Dulce enchilado sabor tamarindo'),
(6, 'Pulparindo', 20, 'De la rosa', 100, 487, 'https://www.chedraui.com.mx/medias/725226000206-00-CH1200Wx1200H?context=bWFzdGVyfHJvb3R8MjM0MjAxfGltYWdlL2pwZWd8aGE0L2hkMi8xMDI2OTUyMjI2NDA5NC5qcGd8NjUzOWJhZDY5MjcxYjk0MmNmOWRkNDliNjI5Y2EwNGUyYjdlMDM1Y2Y1YmI4Y2NjZWQ2MDMyMGQ3NTc1NWNjNg', 'Dulce de tamarindo salado y enchilado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(4) NOT NULL,
  `tipo_usuario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `tipo_usuario`) VALUES
(1, 'administrador'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(4) NOT NULL,
  `username` varchar(30) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `calle` varchar(255) NOT NULL,
  `codigo_postal` varchar(15) NOT NULL,
  `colonia` varchar(200) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `id_tipo_usuario` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `username`, `contrasena`, `email`, `calle`, `codigo_postal`, `colonia`, `telefono`, `id_tipo_usuario`) VALUES
(1, 'ismael', '$2y$12$KzaBUQM2jHUtyWr/0BudVuQvMMviktPrD7vUXwZuYFRLnugd4H.XO', 'acostalopezrobertoismael@gmail.com', 'Durazno', '32151', 'Lazaro Cardenas', '6561234567', 2),
(2, 'dulce', '$2y$12$J1LWyhThi1Fg/c9DvWHsveXmZB2iM0JvFe1qzgBEcLeuCoDJ61mju', 'fajdsklfjdk', 'dajfkladsfjkl', '3213', 'fadsfjkkj', '6561234567', 1),
(3, 'rob', '$2y$12$nR986HMd42aumIgJu6le/.wJMYRjjUMKujRLm.1Vh.MnA3IbG1zSC', 'roberto@gmail.com', 'Pi&ntilde;a', '21150', 'Frutas', '6561234567', 2),
(5, 'rafa', '$2y$12$Oyw/wilaQqZR/tuHKLVI7.qmi7keGYqosLV9rGy8mQRJ.SQhMo8vK', 'rafa@gmail.com', 'jirafa', '31210', 'animal', '6567483938', 1),
(6, 'rosa', '$2y$12$Rwme8yK1A1fWggrtG9GejON/offkLKyc.ZTcqzyC3aq49bWif3xZG', 'ksdjfakldsj', 'jfklasdjlkfljaklsd', '3214', 'jkflajdksfjkla', '6561234567', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `id_usuario` int(4) NOT NULL,
  `fecha_venta` date NOT NULL,
  `codigo_transaccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `id_usuario`, `fecha_venta`, `codigo_transaccion`) VALUES
(1, 1, '2022-05-31', '40T81931CD042510N'),
(2, 1, '2022-05-31', '9B606939JH874874F'),
(3, 1, '2022-05-31', '7Y2773274J7024801'),
(4, 1, '2022-05-31', '8TD16678T08640037'),
(5, 1, '2022-05-31', '44D30235JG871913Y'),
(6, 1, '2022-05-31', '1A987563VN1440439');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(4) NOT NULL,
  `id_usuario` int(4) NOT NULL,
  `id_producto` int(4) NOT NULL,
  `cantidad_venta` int(11) NOT NULL,
  `fecha_venta` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `codigo_transaccion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `id_usuario`, `id_producto`, `cantidad_venta`, `fecha_venta`, `status`, `codigo_transaccion`) VALUES
(19, 1, 3, 4, '2022-05-29', 'pendiente', '00K95201LM1680622'),
(20, 1, 4, 4, '2022-05-29', 'pendiente', '00K95201LM1680622'),
(21, 1, 5, 3, '2022-05-29', 'pendiente', '00K95201LM1680622'),
(22, 1, 5, 4, '2022-05-29', 'pendiente', '2J5145955L5649026'),
(23, 1, 6, 7, '2022-05-29', 'pendiente', '2J5145955L5649026');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`);

--
-- Indices de la tabla `informacion_venta`
--
ALTER TABLE `informacion_venta`
  ADD PRIMARY KEY (`id_informacion_venta`),
  ADD KEY `id_venta` (`id_venta`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_tipo_usuario` (`id_tipo_usuario`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `informacion_venta`
--
ALTER TABLE `informacion_venta`
  MODIFY `id_informacion_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `informacion_venta`
--
ALTER TABLE `informacion_venta`
  ADD CONSTRAINT `informacion_venta_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id_venta`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `informacion_venta_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
