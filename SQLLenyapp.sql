-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para lenappc1_lenyapp
CREATE DATABASE IF NOT EXISTS `lenappc1_lenyapp` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `lenappc1_lenyapp`;

-- Volcando estructura para tabla lenappc1_lenyapp.calificacion
CREATE TABLE IF NOT EXISTS `calificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proveedor` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_calificacion_Proveedor1_idx` (`id_proveedor`),
  KEY `fk_calificacion_Cliente1_idx` (`id_usuario`),
  CONSTRAINT `fk_calificacion_Proveedor1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_calificacion_Usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lenappc1_lenyapp.calificacion: ~1 rows (aproximadamente)
DELETE FROM `calificacion`;
/*!40000 ALTER TABLE `calificacion` DISABLE KEYS */;
INSERT INTO `calificacion` (`id`, `id_proveedor`, `id_usuario`) VALUES
	(25, 8, 54);
/*!40000 ALTER TABLE `calificacion` ENABLE KEYS */;

-- Volcando estructura para tabla lenappc1_lenyapp.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `fono` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `rut` varchar(45) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Cliente_Usuario1_idx` (`id_usuario`),
  CONSTRAINT `fk_Cliente_Usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lenappc1_lenyapp.cliente: ~3 rows (aproximadamente)
DELETE FROM `cliente`;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`id`, `nombre`, `fono`, `apellido`, `direccion`, `rut`, `id_usuario`) VALUES
	(11, 'Tomas', '966248543', 'Alvarez', 'German Hube 1249', '19861683-4', 54),
	(12, 'Enrich', '963258741', 'Asencio', 'Av. Francia 1562', '19536908-9', 55),
	(13, 'Yoan', '923', 'Salom', 'Rene soriano 2382', '12824923-0', 61);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Volcando estructura para tabla lenappc1_lenyapp.detalle_producto
CREATE TABLE IF NOT EXISTS `detalle_producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `precio_unitario` int(11) NOT NULL,
  `venta_minima` int(11) NOT NULL,
  `medida` varchar(45) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `tipo_producto_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Detalle_producto_Proveedor1_idx` (`id_proveedor`),
  KEY `fk_Detalle_producto_tipo_producto1` (`tipo_producto_id`),
  CONSTRAINT `fk_Detalle_producto_Proveedor1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Detalle_producto_tipo_producto1` FOREIGN KEY (`tipo_producto_id`) REFERENCES `tipo_producto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lenappc1_lenyapp.detalle_producto: ~13 rows (aproximadamente)
DELETE FROM `detalle_producto`;
/*!40000 ALTER TABLE `detalle_producto` DISABLE KEYS */;
INSERT INTO `detalle_producto` (`id`, `precio_unitario`, `venta_minima`, `medida`, `id_proveedor`, `tipo_producto_id`) VALUES
	(50, 36000, 1, 'Metro', 8, 1),
	(51, 36000, 2, 'Metro', 8, 2),
	(52, 40000, 1, 'Metro', 8, 3),
	(53, 16000, 1, '1/2 Metro', 8, 4),
	(54, 8000, 2, '1/4 Metro', 8, 5),
	(55, 38000, 1, 'Metro', 9, 3),
	(56, 34000, 1, 'Metro', 9, 5),
	(57, 16000, 1, '1/2 Metro', 9, 4),
	(58, 34000, 1, 'Metro', 10, 2),
	(59, 18000, 2, '1/2 Metro', 10, 3),
	(60, 34000, 1, 'Metro', 11, 3),
	(61, 19000, 2, '1/2 Metro', 11, 2),
	(62, 40000, 1, 'Metro', 12, 4);
/*!40000 ALTER TABLE `detalle_producto` ENABLE KEYS */;

-- Volcando estructura para tabla lenappc1_lenyapp.favorito
CREATE TABLE IF NOT EXISTS `favorito` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proveedor` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_favoritos_Proveedor1_idx` (`id_proveedor`),
  KEY `fk_favoritos_Cliente1_idx` (`id_usuario`),
  CONSTRAINT `fk_favoritos_Proveedor1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_favoritos_Usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lenappc1_lenyapp.favorito: ~1 rows (aproximadamente)
DELETE FROM `favorito`;
/*!40000 ALTER TABLE `favorito` DISABLE KEYS */;
INSERT INTO `favorito` (`id`, `id_proveedor`, `id_usuario`) VALUES
	(3, 8, 54);
/*!40000 ALTER TABLE `favorito` ENABLE KEYS */;

-- Volcando estructura para tabla lenappc1_lenyapp.historial_envio
CREATE TABLE IF NOT EXISTS `historial_envio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_detalle_producto` int(11) NOT NULL,
  `hora` time NOT NULL,
  `estado` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `pagado` tinyint(4) NOT NULL,
  `tipo_compra_id` int(11) NOT NULL,
  `fecha_envio` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Historial_envios_Cliente1` (`id_cliente`),
  KEY `fk_Historial_envios_Detalle_producto1` (`id_detalle_producto`),
  KEY `fk_Historial_envios_tipo_compra1` (`tipo_compra_id`),
  CONSTRAINT `fk_Historial_envios_Cliente1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`),
  CONSTRAINT `fk_Historial_envios_Detalle_producto1` FOREIGN KEY (`id_detalle_producto`) REFERENCES `detalle_producto` (`id`),
  CONSTRAINT `fk_Historial_envios_tipo_compra1` FOREIGN KEY (`tipo_compra_id`) REFERENCES `tipo_compra` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lenappc1_lenyapp.historial_envio: ~8 rows (aproximadamente)
DELETE FROM `historial_envio`;
/*!40000 ALTER TABLE `historial_envio` DISABLE KEYS */;
INSERT INTO `historial_envio` (`id`, `fecha`, `id_cliente`, `id_detalle_producto`, `hora`, `estado`, `cantidad`, `pagado`, `tipo_compra_id`, `fecha_envio`) VALUES
	(53, '2019-12-22', 11, 50, '18:46:57', 1, 2, 1, 1, '2019-12-22'),
	(54, '2019-12-22', 11, 50, '17:12:01', 2, 1, 2, 3, '1753-01-01'),
	(55, '2019-12-22', 11, 50, '19:32:56', 1, 2, 1, 1, '2019-12-22'),
	(56, '2019-12-22', 11, 54, '19:37:05', 1, 2, 1, 2, '2019-12-22'),
	(57, '2019-12-22', 11, 53, '19:40:11', 1, 3, 1, 2, '2019-12-23'),
	(58, '2019-12-23', 11, 50, '08:01:17', 3, 2, 2, 3, '1753-01-01'),
	(59, '2019-12-23', 11, 50, '10:03:09', 3, 1, 2, 3, '1753-01-01'),
	(60, '2019-12-23', 13, 56, '10:27:11', 3, 5, 2, 3, '1753-01-01');
/*!40000 ALTER TABLE `historial_envio` ENABLE KEYS */;

-- Volcando estructura para tabla lenappc1_lenyapp.img_producto
CREATE TABLE IF NOT EXISTS `img_producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(10) NOT NULL,
  `id_detalle_producto` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_detalle_producto` (`id_detalle_producto`),
  CONSTRAINT `img_producto_ibfk_1` FOREIGN KEY (`id_detalle_producto`) REFERENCES `detalle_producto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lenappc1_lenyapp.img_producto: ~23 rows (aproximadamente)
DELETE FROM `img_producto`;
/*!40000 ALTER TABLE `img_producto` DISABLE KEYS */;
INSERT INTO `img_producto` (`id`, `nombre`, `id_detalle_producto`) VALUES
	(43, 'f27516b894', 50),
	(45, '59fb3c904b', 51),
	(46, '2b8d548564', 52),
	(47, '242cd5210b', 52),
	(48, '765e83283b', 53),
	(50, 'ba0deb523a', 54),
	(51, 'f4f201b563', 54),
	(52, 'd6e977f30b', 55),
	(53, 'b05a737b6b', 55),
	(54, 'ec074b0e33', 56),
	(55, '3428ffb834', 56),
	(56, 'e68a5ee620', 57),
	(57, 'c281a06136', 57),
	(58, 'fff6a3e9a1', 58),
	(59, '3205f006a7', 58),
	(60, '35c24d5f9d', 59),
	(61, '15d1542424', 59),
	(62, '545d1c5338', 60),
	(63, '7a60516cef', 60),
	(64, 'ad42c09970', 61),
	(65, 'ff3fc8fc9a', 61),
	(66, 'd258ee7378', 62),
	(67, 'c2ffbfe768', 62);
/*!40000 ALTER TABLE `img_producto` ENABLE KEYS */;

-- Volcando estructura para tabla lenappc1_lenyapp.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(150) NOT NULL,
  `token` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lenappc1_lenyapp.password_resets: ~1 rows (aproximadamente)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
	('callo_callo@hotmail.com', '$2y$10$1fiKHpAs9X5rMGjQWIY7S.jWt99BaIhcFsKuL12yKnBHttYx2IqTS', '2019-05-08 15:08:24');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla lenappc1_lenyapp.proveedor
CREATE TABLE IF NOT EXISTS `proveedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `nombre_empresa` varchar(45) DEFAULT NULL,
  `rut` varchar(12) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `calificacion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Proveedor_Usuario1_idx` (`id_usuario`),
  CONSTRAINT `fk_Proveedor_Usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lenappc1_lenyapp.proveedor: ~5 rows (aproximadamente)
DELETE FROM `proveedor`;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` (`id`, `nombre`, `apellido`, `nombre_empresa`, `rut`, `direccion`, `calificacion`, `id_usuario`) VALUES
	(8, 'Jose', 'Araneda', 'Empresa Araneda', '9340797-0', '18 de septiembre 121', 1, 56),
	(9, 'Juan', 'Perez', 'Galpon los ulmos', '15017598-4', 'Anibal pinto 2124', 0, 57),
	(10, 'Rene', 'Gonzalez', 'Venta de lenya Osorno', '10329077-5', 'Isabel riquelme 1874', 0, 58),
	(11, 'Hector', 'Oyarzun', 'Picaduria Osorno', '12595885-0', 'Rene schneider 2020', 0, 59),
	(12, 'Andreas', 'Auersperg', 'Compra y venta de lenya', '11561667-6', 'Manuel baquedano 501', 0, 60);
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;

-- Volcando estructura para tabla lenappc1_lenyapp.reparto
CREATE TABLE IF NOT EXISTS `reparto` (
  `id_historial_envio` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `lat` varchar(50) DEFAULT NULL,
  `long` varchar(50) DEFAULT NULL,
  KEY `fk_historial_envio_has_repartidor_repartidor1_idx` (`id_proveedor`),
  KEY `fk_historial_envio_has_repartidor_historial_envio1_idx` (`id_historial_envio`),
  CONSTRAINT `fk_historial_envio_has_repartidor_repartidor1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_historial_envio_has_repartidos_historial_envio1` FOREIGN KEY (`id_historial_envio`) REFERENCES `historial_envio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lenappc1_lenyapp.reparto: ~4 rows (aproximadamente)
DELETE FROM `reparto`;
/*!40000 ALTER TABLE `reparto` DISABLE KEYS */;
INSERT INTO `reparto` (`id_historial_envio`, `id_proveedor`, `lat`, `long`) VALUES
	(53, 8, '-40.5702283', '-73.1290567'),
	(55, 8, '-40.5705482', '-73.1285445'),
	(56, 8, '-40.5702283', '-73.1290567'),
	(57, 8, '-40.5702283', '-73.1290567');
/*!40000 ALTER TABLE `reparto` ENABLE KEYS */;

-- Volcando estructura para tabla lenappc1_lenyapp.reportes
CREATE TABLE IF NOT EXISTS `reportes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reportes_usuario1_idx` (`id_usuario`),
  CONSTRAINT `fk_reportes_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lenappc1_lenyapp.reportes: ~2 rows (aproximadamente)
DELETE FROM `reportes`;
/*!40000 ALTER TABLE `reportes` DISABLE KEYS */;
INSERT INTO `reportes` (`id`, `titulo`, `descripcion`, `id_usuario`) VALUES
	(9, 'lena mojada', 'Don JosÃ© me vendiÃ³ leÃ±a mojada en la ultima compra del dÃ­a 22', 54),
	(10, 'problemas con vendedor', 'El vendedor no entrego el pedido a la hora', 54);
/*!40000 ALTER TABLE `reportes` ENABLE KEYS */;

-- Volcando estructura para tabla lenappc1_lenyapp.rol
CREATE TABLE IF NOT EXISTS `rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lenappc1_lenyapp.rol: ~3 rows (aproximadamente)
DELETE FROM `rol`;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` (`id`, `nombre`) VALUES
	(1, 'ADMINISTRADOR'),
	(2, 'CLIENTE'),
	(3, 'PROVEEDOR');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;

-- Volcando estructura para tabla lenappc1_lenyapp.tipo_compra
CREATE TABLE IF NOT EXISTS `tipo_compra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lenappc1_lenyapp.tipo_compra: ~3 rows (aproximadamente)
DELETE FROM `tipo_compra`;
/*!40000 ALTER TABLE `tipo_compra` DISABLE KEYS */;
INSERT INTO `tipo_compra` (`id`, `nombre`) VALUES
	(1, 'Khipu'),
	(2, 'Efectivo'),
	(3, 'No seleccionado');
/*!40000 ALTER TABLE `tipo_compra` ENABLE KEYS */;

-- Volcando estructura para tabla lenappc1_lenyapp.tipo_producto
CREATE TABLE IF NOT EXISTS `tipo_producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lenappc1_lenyapp.tipo_producto: ~5 rows (aproximadamente)
DELETE FROM `tipo_producto`;
/*!40000 ALTER TABLE `tipo_producto` DISABLE KEYS */;
INSERT INTO `tipo_producto` (`id`, `nombre`) VALUES
	(1, 'Hualle'),
	(2, 'Alamo'),
	(3, 'Nativo'),
	(4, 'Pino'),
	(5, 'Eucalipto');
/*!40000 ALTER TABLE `tipo_producto` ENABLE KEYS */;

-- Volcando estructura para tabla lenappc1_lenyapp.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) NOT NULL,
  `contrasenya` varchar(150) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Usuario_Rol1_idx` (`id_rol`),
  CONSTRAINT `fk_Usuario_Rol1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lenappc1_lenyapp.usuario: ~9 rows (aproximadamente)
DELETE FROM `usuario`;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `email`, `contrasenya`, `id_rol`, `activo`, `remember_token`) VALUES
	(53, 'admin@lenyapp.cl', 'fb973c6d632d725b7ec00be7a0e32f3ed3601556', 1, 1, NULL),
	(54, 'tomasalvarezyunginger@hotmail.com', 'fb973c6d632d725b7ec00be7a0e32f3ed3601556', 2, 1, NULL),
	(55, 'callo_callo@hotmail.com', 'fb973c6d632d725b7ec00be7a0e32f3ed3601556', 2, 1, NULL),
	(56, 'jose.araneda@gmail.com', 'fb973c6d632d725b7ec00be7a0e32f3ed3601556', 3, 1, NULL),
	(57, 'juan.perez@gmail.com', 'fb973c6d632d725b7ec00be7a0e32f3ed3601556', 3, 1, NULL),
	(58, 'rene.gonzalez@gmail.com', 'fb973c6d632d725b7ec00be7a0e32f3ed3601556', 3, 1, NULL),
	(59, 'hector.oyarzun@gmail.com', 'fb973c6d632d725b7ec00be7a0e32f3ed3601556', 3, 1, NULL),
	(60, 'andreas.auersperg@gmail.com', 'fb973c6d632d725b7ec00be7a0e32f3ed3601556', 3, 1, NULL),
	(61, 'oscar@inacap.cl', '0e00b6d7083ddb61b479bfd9457d7746267dc377', 2, 1, NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

-- Volcando estructura para tabla lenappc1_lenyapp.visita
CREATE TABLE IF NOT EXISTS `visita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proveedor` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ultimas_visitas_Proveedor1_idx` (`id_proveedor`),
  KEY `fk_ultimas_visitas_Cliente1_idx` (`id_usuario`),
  CONSTRAINT `fk_ultimas_visitas_Proveedor1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ultimas_visitas_Usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lenappc1_lenyapp.visita: ~29 rows (aproximadamente)
DELETE FROM `visita`;
/*!40000 ALTER TABLE `visita` DISABLE KEYS */;
INSERT INTO `visita` (`id`, `id_proveedor`, `id_usuario`) VALUES
	(105, 8, 54),
	(106, 8, 54),
	(107, 8, 54),
	(108, 8, 54),
	(109, 8, 54),
	(110, 8, 54),
	(111, 9, 54),
	(112, 12, 54),
	(113, 12, 54),
	(114, 11, 54),
	(115, 10, 54),
	(116, 12, 54),
	(117, 12, 54),
	(118, 8, 54),
	(119, 8, 54),
	(120, 8, 54),
	(121, 8, 54),
	(122, 8, 55),
	(123, 10, 54),
	(124, 8, 54),
	(125, 8, 54),
	(126, 9, 54),
	(127, 8, 54),
	(128, 8, 54),
	(129, 8, 54),
	(130, 9, 61),
	(131, 9, 61),
	(132, 9, 61),
	(133, 9, 54);
/*!40000 ALTER TABLE `visita` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
