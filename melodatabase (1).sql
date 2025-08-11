-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-08-2025 a las 17:30:52
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
-- Base de datos: `melodatabase`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` varchar(10) NOT NULL,
  `tipo_categoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `tipo_categoria`) VALUES
('CAT001', 'Aseo personal'),
('CAT002', 'Aseo industrial'),
('CAT003', 'Aseo para el hogar'),
('CAT004', 'Otros'),
('CAT005', 'Aseo multiusos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `cli_numero_pedidos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `id_usuario`, `cli_numero_pedidos`) VALUES
(1, 3, 5),
(2, 5, 3),
(3, 8, 7),
(4, 2, 2),
(5, 7, 4),
(6, 10, 6),
(7, 1, 1),
(8, 6, 8),
(9, 9, 3),
(10, 4, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobante`
--

CREATE TABLE `comprobante` (
  `id_comprobante` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comprobante`
--

INSERT INTO `comprobante` (`id_comprobante`, `id_pedido`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `id_detalle_pedido` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_producto` varchar(10) NOT NULL,
  `det_precio_unitario` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id_inventario` int(11) NOT NULL,
  `id_producto` varchar(10) NOT NULL,
  `id_ventas` int(11) NOT NULL,
  `inv_ventas` int(11) NOT NULL,
  `inv_disponibilidad` int(11) NOT NULL,
  `inv_cantidad_entrada` int(11) NOT NULL,
  `inv_cantidad_salida` int(11) NOT NULL,
  `inv_cantidad_devueltas` int(11) NOT NULL,
  `fecha_ingreso` datetime DEFAULT current_timestamp(),
  `fecha_salida` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_inventario`, `id_producto`, `id_ventas`, `inv_ventas`, `inv_disponibilidad`, `inv_cantidad_entrada`, `inv_cantidad_salida`, `inv_cantidad_devueltas`, `fecha_ingreso`, `fecha_salida`) VALUES
(22, 'PROD007', 1, 0, 0, 0, 0, 0, '2025-07-31 11:04:37', NULL),
(27, 'PROD002', 1, 0, 0, 0, 0, 0, '2025-07-31 11:04:37', NULL),
(28, 'PROD009', 1, 0, 0, 0, 0, 0, '2025-07-31 11:04:37', NULL),
(30, 'PROD001', 1, 0, 0, 0, 0, 0, '2025-07-31 11:04:37', NULL),
(31, 'PROD005', 1, 0, 0, 0, 0, 0, '2025-07-31 11:04:37', NULL),
(32, 'PROD008', 1, 0, 0, 0, 0, 0, '2025-07-31 11:04:37', NULL),
(33, 'PROD010', 1, 0, 0, 0, 0, 0, '2025-07-31 11:04:37', NULL),
(36, 'PROD006', 1, 0, 0, 0, 0, 0, '2025-07-31 11:04:37', NULL),
(37, 'PROD011', 1, 0, 0, 0, 0, 0, '2025-07-31 11:04:37', NULL),
(38, 'PROD012', 1, 0, 0, 0, 0, 0, '2025-07-31 11:04:37', NULL),
(39, 'PROD003', 1, 0, 0, 0, 0, 0, '2025-07-31 11:04:37', NULL),
(50, 'PROD004', 1, 0, 0, 0, 0, 0, '2025-08-01 10:27:54', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_pago`
--

CREATE TABLE `metodo_pago` (
  `id_metodo_de_pago` int(11) NOT NULL,
  `met_tipo_de_pago` varchar(50) NOT NULL,
  `met_numero_tarjeta` bigint(20) NOT NULL,
  `met_cvv` int(3) NOT NULL,
  `met_titular_tarjeta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `metodo_pago`
--

INSERT INTO `metodo_pago` (`id_metodo_de_pago`, `met_tipo_de_pago`, `met_numero_tarjeta`, `met_cvv`, `met_titular_tarjeta`) VALUES
(1, 'Crédito', 1234567890123456, 123, 'Juan Pérez'),
(2, 'Débito', 2345678901234567, 234, 'María Gómez'),
(3, 'Crédito', 3456789012345678, 345, 'Carlos López'),
(4, 'Débito', 4567890123456789, 456, 'Ana Martínez'),
(5, 'Crédito', 5678901234567890, 567, 'Pedro Sánchez'),
(6, 'Débito', 6789012345678901, 678, 'Laura Díaz'),
(7, 'Crédito', 7890123456789012, 789, 'Sofía Ruiz'),
(8, 'Débito', 8901234567890123, 890, 'Luis Torres'),
(9, 'Crédito', 9012345678901234, 901, 'Elena Vargas'),
(10, 'Débito', 1234567890123456, 123, 'Diego Castro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `id_movimiento` int(11) NOT NULL,
  `id_producto` varchar(10) NOT NULL,
  `tipo_movimiento` enum('entrada','salida') NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_movimiento` datetime NOT NULL,
  `detalle` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`id_movimiento`, `id_producto`, `tipo_movimiento`, `cantidad`, `fecha_movimiento`, `detalle`) VALUES
(37, 'PROD001', 'entrada', 25, '2025-08-01 11:21:17', 'Se agregó el producto \'hola\' con cantidad: 25'),
(38, 'PROD001', 'salida', 25, '2025-08-01 11:22:53', 'Eliminación de producto: hola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_metodo_de_pago` int(11) NOT NULL,
  `ped_fecha_compra` date NOT NULL,
  `ped_cantidad_de_unidades` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `id_metodo_de_pago`, `ped_fecha_compra`, `ped_cantidad_de_unidades`, `id_usuario`, `id_producto`) VALUES
(1, 1, '2025-06-01', 10, 1, 'PROD001'),
(2, 2, '2025-06-02', 5, 1, 'PROD002'),
(3, 3, '2025-06-03', 8, 3, 'PROD003'),
(4, 4, '2025-06-04', 12, 1, 'PROD004'),
(5, 5, '2025-06-05', 3, 1, 'PROD005'),
(6, 6, '2025-06-06', 15, 1, 'PROD006'),
(7, 7, '2025-06-07', 7, 1, 'PROD007'),
(8, 8, '2025-06-08', 9, 9, 'PROD008'),
(9, 9, '2025-06-09', 6, 1, 'PROD001'),
(10, 10, '2025-06-10', 4, 10, 'PROD002'),
(11, 1, '2025-08-04', 1, 10, 'PROD002'),
(12, 1, '2025-08-04', 1, 10, 'PROD007'),
(13, 1, '2025-08-04', 1, 10, 'PROD006'),
(14, 1, '2025-08-08', 1, 10, 'PROD003'),
(15, 1, '2025-08-08', 1, 10, 'PROD005'),
(16, 1, '2025-08-08', 1, 10, 'PROD001'),
(17, 1, '2025-08-07', 1, 10, 'PROD002'),
(18, 1, '2025-08-07', 1, 10, 'PROD003'),
(19, 1, '2025-08-07', 3, 10, 'PROD002'),
(20, 1, '2025-08-07', 1, 10, 'PROD002'),
(21, 1, '2025-08-07', 1, 10, 'PROD002'),
(22, 1, '2025-08-08', 1, 10, 'PROD002');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_personas` int(11) NOT NULL,
  `reg_nombre` varchar(50) NOT NULL,
  `reg_correo` varchar(50) NOT NULL,
  `reg_contrasena` varchar(255) NOT NULL,
  `reg_direccion` varchar(50) NOT NULL,
  `reg_ciudad` varchar(50) NOT NULL,
  `reg_tipo` varchar(50) NOT NULL,
  `reg_telefono` bigint(10) NOT NULL,
  `reg_nombre_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_personas`, `reg_nombre`, `reg_correo`, `reg_contrasena`, `reg_direccion`, `reg_ciudad`, `reg_tipo`, `reg_telefono`, `reg_nombre_usuario`) VALUES
(27, 'Esteban Mora Aguila', 'estebaalejandromoraavila@gmail.com', '$2y$10$JULpkEDBiNB7hOJHe8MGF.s9JMqm2VDqRuGqBAaaE9C3fVeW6N9a6', 'calle 1 # 1 - 1', 'medellin', '', 3333333333, 'soy.esteban'),
(28, 'estebitan', 'ommora@estudiantes.areandina.edu.co', '$2y$10$N6f6lq71JFnjumqpFR0cueI7mYQQBcK2AsK6EUaNZw6vmBdaF1Jcm', 'calle 1 # 1 - 1', 'bogota', '', 3106872597, 'estebitan'),
(29, 'Esteban Mora', 'alejandromora0405@gmail.com', '$2y$10$n9FOnbCinkbNgevgUEEphep4Bl1WAvGPfajeqoRYqhWDdq5pp9Zba', 'calle 1 # 1 - 1', 'medellin', '', 3333333333, 'alejo11'),
(30, 'Alejandro Mora', 'alejandrom@gmail.com', '$2y$10$vD.yLlCB91WxcjV6ceFFyOexPbMfUt4fHupHzsMbS2ACG7SnDqWh6', 'calle 1 # 1 - 4', 'bogota', '', 3106872597, 'Alejandro09'),
(31, 'Andres Lozano Vasquez', 'andy@gmail.com', '$2y$10$COwiu.CAeG6dOGicb/Kp5OrNwLvc0dFk0BQCnFiInh4S8FbyuFoYS', 'calle 1 # 1 - 5', 'bogota', '', 3215879654, 'Andy123'),
(32, 'Emanuel Gazmey Santiago', 'rhlm@gmail.com', '$2y$10$7blnqAIZ5STFuMQxX8Ko8OzwPTwP97HNnWlCIyE/SVRkoeIYbxq4G', 'calle 1 # 1 - 7', 'bogota', '', 3106872599, 'Annuel AA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` varchar(10) NOT NULL,
  `id_categoria` varchar(10) NOT NULL,
  `pro_descripcion` varchar(100) NOT NULL,
  `pro_nombre` varchar(40) NOT NULL,
  `pro_valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `id_categoria`, `pro_descripcion`, `pro_nombre`, `pro_valor`) VALUES
('PROD001', 'CAT003', 'Blanqueador potente que elimina manchas difíciles y deja tu ropa más blanca y fresca. Ideal para el ', 'Blanqueador', 8000),
('PROD002', 'CAT002', 'Disuelve la grasa al instante. Perfecto para cocina y superficies.', 'Desengrasante', 7500),
('PROD003', 'CAT005', 'Perfecto para lavar platos y limpiar varias superficies.', 'Multiusos', 6200),
('PROD004', 'CAT001', 'Cuida tus manos mientras las deja suaves y limpias.', 'Jabones', 6000),
('PROD005', 'CAT003', 'Elimina grasa y suciedad dejando tus platos brillantes.', 'LavaLoza', 8000),
('PROD006', 'CAT004', 'Limpia, desinfecta y elimina malos olores de forma natural.', 'Vinagre', 7500),
('PROD007', 'CAT001', 'Limpieza suave que protege y cuida tu piel.', 'Jabon Para Manos', 6200),
('PROD008', 'CAT003', 'Deja tus ventanas y espejos brillantes y sin marcas.', 'Limpia Vidrios', 6000),
('PROD009', 'CAT002', 'Disuelve grasa, pintura y suciedad difícil al instante.', 'Varsol', 8000),
('PROD010', 'CAT003', 'Deja tu ropa más suave, fresca y con rico aroma', 'Suavizante de Ropa', 7500),
('PROD011', 'CAT004', 'Protege y da acabado brillante a tus superficies.', 'Sellante', 6200),
('PROD012', 'CAT004', 'Aporta fragancia fresca y duradera a tu hogar.', 'Escencias', 6000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `tipo_rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `tipo_rol`) VALUES
(1, 'Administrador'),
(3, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_personas` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `usu_nombre_usuario` varchar(50) NOT NULL,
  `usu_contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_personas`, `id_rol`, `usu_nombre_usuario`, `usu_contrasena`) VALUES
(1, 27, 1, 'juanp_admin', '$2y$10$QjztMvj749Dw8Zkb8cUS2u6zYCc1sgmR8228Doi5T/yw1uuVCtcxe'),
(2, 28, 1, 'mariag_vend', '$2y$10$95RxXWS19aTELPD/.NPQFOJu6p2X4esNwU8Il5Gi4Yj'),
(3, 29, 3, 'carlosl_cli', '$2y$10$SVSFPvWHMk4PMkNx20NLwOXCWILX3cX1E6KVXahiam6'),
(4, 30, 1, 'anam_vend', '$2y$10$.JoY5JdkAh06awDP0kqkoeJ7QMJqOXijiJ9pCd1/DWz'),
(5, 31, 3, 'pedros_cli', '$2y$10$1LXvm4eQcd6g/8hvLRuZf.NUrwPob1gDLtTMeT3Khsi'),
(6, 32, 1, 'laurad_admin', '$2y$10$kfLP/e5l6AYyzh4m4/F30eo6dU38f1o9KFNzgEOCVDQ'),
(7, 27, 3, 'soy.esteban', '$2y$10$JULpkEDBiNB7hOJHe8MGF.s9JMqm2VDqRuGqBAaaE9C3fVeW6N9a6'),
(8, 28, 3, 'estebitan', '$2y$10$N6f6lq71JFnjumqpFR0cueI7mYQQBcK2AsK6EUaNZw6vmBdaF1Jcm'),
(9, 29, 3, 'alejo11', '$2y$10$n9FOnbCinkbNgevgUEEphep4Bl1WAvGPfajeqoRYqhWDdq5pp9Zba'),
(10, 30, 3, 'Alejandro09', '$2y$10$vD.yLlCB91WxcjV6ceFFyOexPbMfUt4fHupHzsMbS2ACG7SnDqWh6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_ventas` int(11) NOT NULL,
  `ven_factura` varchar(30) NOT NULL,
  `ven_cantidad` int(11) NOT NULL,
  `ven_fecha_venta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_ventas`, `ven_factura`, `ven_cantidad`, `ven_fecha_venta`) VALUES
(1, 'FACT-001', 50, '2025-06-01'),
(2, 'FACT-002', 30, '2025-06-02'),
(3, 'FACT-003', 25, '2025-06-03'),
(4, 'FACT-004', 40, '2025-06-04'),
(5, 'FACT-005', 15, '2025-06-05'),
(6, 'FACT-006', 60, '2025-06-06'),
(7, 'FACT-007', 20, '2025-06-07'),
(8, 'FACT-008', 35, '2025-06-08'),
(9, 'FACT-009', 45, '2025-06-09'),
(10, 'FACT-010', 10, '2025-06-10');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_clientes_activos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_clientes_activos` (
`id_cliente` int(11)
,`nombre_cliente` varchar(50)
,`reg_correo` varchar(50)
,`reg_ciudad` varchar(50)
,`usu_nombre_usuario` varchar(50)
,`cli_numero_pedidos` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_clientes_detallado`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_clientes_detallado` (
`id_cliente` int(11)
,`nombre` varchar(50)
,`correo` varchar(50)
,`ciudad` varchar(50)
,`usuario` varchar(50)
,`numero_pedidos` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_inventario_actual`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_inventario_actual` (
`id_inventario` int(11)
,`pro_nombre` varchar(40)
,`categoria` varchar(30)
,`inv_cantidad_entrada` int(11)
,`inv_cantidad_salida` int(11)
,`inv_cantidad_devueltas` int(11)
,`inv_disponibilidad` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_inventario_resumen`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_inventario_resumen` (
`id_inventario` int(11)
,`producto` varchar(40)
,`categoria` varchar(30)
,`cantidad_entrada` int(11)
,`cantidad_salida` int(11)
,`cantidad_devueltas` int(11)
,`disponible` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_pedidos_con_metodo_pago`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_pedidos_con_metodo_pago` (
`id_pedido` int(11)
,`fecha` date
,`cantidad_unidades` int(11)
,`metodo_pago` varchar(50)
,`titular` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_reporte_ventas`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_reporte_ventas` (
`id_producto` varchar(10)
,`pro_nombre` varchar(40)
,`categoria` varchar(30)
,`precio_unitario` float
,`total_recaudado` double
,`total_unidades_vendidas` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_usuarios_y_roles`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_usuarios_y_roles` (
`id_usuario` int(11)
,`nombre` varchar(50)
,`correo` varchar(50)
,`usuario` varchar(50)
,`rol` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_clientes_activos`
--
DROP TABLE IF EXISTS `vista_clientes_activos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_clientes_activos`  AS SELECT `cl`.`id_cliente` AS `id_cliente`, `pe`.`reg_nombre` AS `nombre_cliente`, `pe`.`reg_correo` AS `reg_correo`, `pe`.`reg_ciudad` AS `reg_ciudad`, `us`.`usu_nombre_usuario` AS `usu_nombre_usuario`, `cl`.`cli_numero_pedidos` AS `cli_numero_pedidos` FROM ((`cliente` `cl` join `usuario` `us` on(`cl`.`id_usuario` = `us`.`id_usuario`)) join `personas` `pe` on(`us`.`id_personas` = `pe`.`id_personas`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_clientes_detallado`
--
DROP TABLE IF EXISTS `vista_clientes_detallado`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_clientes_detallado`  AS SELECT `cl`.`id_cliente` AS `id_cliente`, `pe`.`reg_nombre` AS `nombre`, `pe`.`reg_correo` AS `correo`, `pe`.`reg_ciudad` AS `ciudad`, `us`.`usu_nombre_usuario` AS `usuario`, `cl`.`cli_numero_pedidos` AS `numero_pedidos` FROM ((`cliente` `cl` join `usuario` `us` on(`cl`.`id_usuario` = `us`.`id_usuario`)) join `personas` `pe` on(`us`.`id_personas` = `pe`.`id_personas`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_inventario_actual`
--
DROP TABLE IF EXISTS `vista_inventario_actual`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_inventario_actual`  AS SELECT `i`.`id_inventario` AS `id_inventario`, `p`.`pro_nombre` AS `pro_nombre`, `c`.`tipo_categoria` AS `categoria`, `i`.`inv_cantidad_entrada` AS `inv_cantidad_entrada`, `i`.`inv_cantidad_salida` AS `inv_cantidad_salida`, `i`.`inv_cantidad_devueltas` AS `inv_cantidad_devueltas`, `i`.`inv_disponibilidad` AS `inv_disponibilidad` FROM ((`inventario` `i` join `producto` `p` on(`i`.`id_producto` = `p`.`id_producto`)) join `categoria` `c` on(`p`.`id_categoria` = `c`.`id_categoria`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_inventario_resumen`
--
DROP TABLE IF EXISTS `vista_inventario_resumen`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_inventario_resumen`  AS SELECT `i`.`id_inventario` AS `id_inventario`, `p`.`pro_nombre` AS `producto`, `c`.`tipo_categoria` AS `categoria`, `i`.`inv_cantidad_entrada` AS `cantidad_entrada`, `i`.`inv_cantidad_salida` AS `cantidad_salida`, `i`.`inv_cantidad_devueltas` AS `cantidad_devueltas`, `i`.`inv_disponibilidad` AS `disponible` FROM ((`inventario` `i` join `producto` `p` on(`i`.`id_producto` = `p`.`id_producto`)) join `categoria` `c` on(`p`.`id_categoria` = `c`.`id_categoria`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_pedidos_con_metodo_pago`
--
DROP TABLE IF EXISTS `vista_pedidos_con_metodo_pago`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_pedidos_con_metodo_pago`  AS SELECT `ped`.`id_pedido` AS `id_pedido`, `ped`.`ped_fecha_compra` AS `fecha`, `ped`.`ped_cantidad_de_unidades` AS `cantidad_unidades`, `mp`.`met_tipo_de_pago` AS `metodo_pago`, `mp`.`met_titular_tarjeta` AS `titular` FROM (`pedido` `ped` join `metodo_pago` `mp` on(`ped`.`id_metodo_de_pago` = `mp`.`id_metodo_de_pago`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_reporte_ventas`
--
DROP TABLE IF EXISTS `vista_reporte_ventas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_reporte_ventas`  AS SELECT `p`.`id_producto` AS `id_producto`, `p`.`pro_nombre` AS `pro_nombre`, `c`.`tipo_categoria` AS `categoria`, `p`.`pro_valor` AS `precio_unitario`, ifnull(sum(`dp`.`det_precio_unitario`),0) AS `total_recaudado`, count(`dp`.`id_detalle_pedido`) AS `total_unidades_vendidas` FROM ((`producto` `p` join `categoria` `c` on(`p`.`id_categoria` = `c`.`id_categoria`)) left join `detalle_pedido` `dp` on(`p`.`id_producto` = `dp`.`id_producto`)) GROUP BY `p`.`id_producto`, `p`.`pro_nombre`, `c`.`tipo_categoria`, `p`.`pro_valor` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_usuarios_y_roles`
--
DROP TABLE IF EXISTS `vista_usuarios_y_roles`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_usuarios_y_roles`  AS SELECT `u`.`id_usuario` AS `id_usuario`, `p`.`reg_nombre` AS `nombre`, `p`.`reg_correo` AS `correo`, `u`.`usu_nombre_usuario` AS `usuario`, `r`.`tipo_rol` AS `rol` FROM ((`usuario` `u` join `personas` `p` on(`u`.`id_personas` = `p`.`id_personas`)) join `rol` `r` on(`u`.`id_rol` = `r`.`id_rol`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `comprobante`
--
ALTER TABLE `comprobante`
  ADD PRIMARY KEY (`id_comprobante`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`id_detalle_pedido`),
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_inventario`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_ventas` (`id_ventas`);

--
-- Indices de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  ADD PRIMARY KEY (`id_metodo_de_pago`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`id_movimiento`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_metodo_de_pago` (`id_metodo_de_pago`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_personas`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_personas` (`id_personas`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_ventas`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `comprobante`
--
ALTER TABLE `comprobante`
  MODIFY `id_comprobante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `id_detalle_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id_inventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  MODIFY `id_metodo_de_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `id_movimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_personas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_ventas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_usuario_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comprobante`
--
ALTER TABLE `comprobante`
  ADD CONSTRAINT `comprobante_pedido_fk` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `detalle_pedido_pedido_fk` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_pedido_producto_fk` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_producto_fk` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventario_ventas_fk` FOREIGN KEY (`id_ventas`) REFERENCES `ventas` (`id_ventas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD CONSTRAINT `movimientos_producto_fk` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_metodo_pago_fk` FOREIGN KEY (`id_metodo_de_pago`) REFERENCES `metodo_pago` (`id_metodo_de_pago`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedido_producto_fk` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedido_usuario_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_categoria_fk` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_personas_fk` FOREIGN KEY (`id_personas`) REFERENCES `personas` (`id_personas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_rol_fk` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
