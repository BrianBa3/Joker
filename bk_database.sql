-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para supportix
CREATE DATABASE IF NOT EXISTS `supportix` /*!40100 DEFAULT CHARACTER SET latin1 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `supportix`;

-- Volcando estructura para tabla supportix.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla supportix.category: ~3 rows (aproximadamente)
INSERT INTO `category` (`id`, `name`) VALUES
	(1, 'Soporte Tecnico'),
	(2, 'Sistemas'),
	(3, 'Mantenimiento');

-- Volcando estructura para tabla supportix.kind
CREATE TABLE IF NOT EXISTS `kind` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla supportix.kind: ~4 rows (aproximadamente)
INSERT INTO `kind` (`id`, `name`) VALUES
	(1, 'Ticket'),
	(2, 'Bug'),
	(3, 'Sugerencia'),
	(4, 'Caracteristica');

-- Volcando estructura para tabla supportix.priority
CREATE TABLE IF NOT EXISTS `priority` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla supportix.priority: ~3 rows (aproximadamente)
INSERT INTO `priority` (`id`, `name`) VALUES
	(1, 'Alta'),
	(2, 'Media'),
	(3, 'Baja');

-- Volcando estructura para tabla supportix.project
CREATE TABLE IF NOT EXISTS `project` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla supportix.project: ~3 rows (aproximadamente)
INSERT INTO `project` (`id`, `name`, `description`) VALUES
	(1, 'eNetAlmacen', NULL),
	(2, 'eNetCompras', NULL),
	(3, 'eNetClientes', NULL);

-- Volcando estructura para tabla supportix.pro_archivos
CREATE TABLE IF NOT EXISTS `pro_archivos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `archivo_binario` blob NOT NULL,
  `archivo_nombre` varchar(255) NOT NULL DEFAULT '',
  `archivo_peso` varchar(15) NOT NULL DEFAULT '',
  `archivo_tipo` varchar(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla supportix.pro_archivos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla supportix.pro_categoria
CREATE TABLE IF NOT EXISTS `pro_categoria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla supportix.pro_categoria: ~3 rows (aproximadamente)
INSERT INTO `pro_categoria` (`id`, `nombre`) VALUES
	(1, 'Sistemas'),
	(2, 'Soporte '),
	(3, 'Mantenimiento');

-- Volcando estructura para tabla supportix.pro_estatus
CREATE TABLE IF NOT EXISTS `pro_estatus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla supportix.pro_estatus: ~0 rows (aproximadamente)
INSERT INTO `pro_estatus` (`id`, `nombre`) VALUES
	(1, 'Por Iniciar'),
	(2, 'En Desarrollo'),
	(3, 'Completado'),
	(4, 'Pausado'),
	(5, 'Detenedo');

-- Volcando estructura para tabla supportix.pro_fases
CREATE TABLE IF NOT EXISTS `pro_fases` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Fase` varchar(45) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `fase_padre` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla supportix.pro_fases: ~3 rows (aproximadamente)
INSERT INTO `pro_fases` (`id`, `Fase`, `descripcion`, `fase_padre`) VALUES
	(1, '1. Análisis y Diseño', 'Primera fase, antes de empezar a codificar, se analiza la situación, lo que se desea obtener, se realiza investigación y reuniones donde posteriormente se entregan propuesta.', NULL),
	(2, '2. Desarrollo y Pruebas', 'Se realiza el desarrollo completo del sistema, se revisa y se realizan pruebas en ambientes cerrados.', NULL),
	(3, '3. Implementación y Capacitación', 'Se lanza a ambiente de producción, se  realizan las capacitaciones pertinentes y se le asigna tiempo de mantenimiento.', NULL);

-- Volcando estructura para tabla supportix.pro_modulo
CREATE TABLE IF NOT EXISTS `pro_modulo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `descripcion` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla supportix.pro_modulo: ~0 rows (aproximadamente)
INSERT INTO `pro_modulo` (`id`, `nombre`, `descripcion`) VALUES
	(1, 'eNetActivosFijos', NULL),
	(2, 'eNetAlmacen', NULL),
	(3, 'eNetClientes', NULL),
	(4, 'eNetCompras', NULL),
	(5, 'eNetContabilidad', NULL),
	(6, 'eNetControlRH', NULL),
	(7, 'eNetGobernador', NULL),
	(8, 'eNetPuntoVenta', NULL),
	(9, 'eNetReportesAdmon', NULL),
	(10, 'eNetSistemas', NULL),
	(11, 'eNetTaller', NULL),
	(12, 'eNetTesoreria', NULL),
	(13, 'eNetVentas', NULL),
	(14, 'Nuevo', NULL);

-- Volcando estructura para tabla supportix.pro_prioridad
CREATE TABLE IF NOT EXISTS `pro_prioridad` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla supportix.pro_prioridad: ~0 rows (aproximadamente)
INSERT INTO `pro_prioridad` (`id`, `nombre`) VALUES
	(1, 'Alta'),
	(2, 'Media'),
	(3, 'Baja');

-- Volcando estructura para tabla supportix.pro_proyectos
CREATE TABLE IF NOT EXISTS `pro_proyectos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) DEFAULT NULL,
  `description` text,
  `FechaCreacion` datetime DEFAULT NULL,
  `FechaFinalizacion` datetime DEFAULT NULL,
  `tipo_id` int NOT NULL,
  `usuario_id` int NOT NULL,
  `asignado_id` int DEFAULT NULL,
  `modulo_id` int DEFAULT NULL,
  `categoria_id` int DEFAULT NULL,
  `prioridad_id` int NOT NULL DEFAULT '1',
  `estatus_id` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `prioridad_id` (`prioridad_id`),
  KEY `estatus_id` (`estatus_id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `tipo_id` (`tipo_id`),
  KEY `categoria_id` (`categoria_id`),
  KEY `modulo_id` (`modulo_id`),
  CONSTRAINT `proyectos_ibfk_1` FOREIGN KEY (`prioridad_id`) REFERENCES `pro_prioridad` (`id`),
  CONSTRAINT `proyectos_ibfk_2` FOREIGN KEY (`estatus_id`) REFERENCES `pro_estatus` (`id`),
  CONSTRAINT `proyectos_ibfk_3` FOREIGN KEY (`usuario_id`) REFERENCES `user` (`id`),
  CONSTRAINT `proyectos_ibfk_4` FOREIGN KEY (`tipo_id`) REFERENCES `pro_tipo` (`id`),
  CONSTRAINT `proyectos_ibfk_5` FOREIGN KEY (`categoria_id`) REFERENCES `pro_categoria` (`id`),
  CONSTRAINT `proyectos_ibfk_6` FOREIGN KEY (`modulo_id`) REFERENCES `pro_modulo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla supportix.pro_proyectos: ~2 rows (aproximadamente)
INSERT INTO `pro_proyectos` (`id`, `titulo`, `description`, `FechaCreacion`, `FechaFinalizacion`, `tipo_id`, `usuario_id`, `asignado_id`, `modulo_id`, `categoria_id`, `prioridad_id`, `estatus_id`) VALUES
	(28, 'Incidencias y Proyectos', 'Se desarrolla plataforma web para el seguimiento de incidencias y proyectos', '2022-12-05 00:00:00', '2022-12-23 00:00:00', 5, 2, 2, 14, 1, 1, 2),
	(29, 'BDP\'s', 'Desarrollo de nuevas pantallas de bdp\'s', '2022-12-05 00:00:00', '2022-12-31 00:00:00', 5, 2, 3, 2, 1, 1, 2);

-- Volcando estructura para tabla supportix.pro_tareas
CREATE TABLE IF NOT EXISTS `pro_tareas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_proyecto` int NOT NULL,
  `Fase` int DEFAULT NULL,
  `Tarea` int DEFAULT NULL,
  `FechaInicio` datetime DEFAULT NULL,
  `FechaFin` datetime DEFAULT NULL,
  `usuario_id` int DEFAULT NULL,
  `prioridad_id` int DEFAULT '1',
  `estatus_id` int DEFAULT '1',
  `entregable` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prioridad_id` (`prioridad_id`),
  KEY `estatus_id` (`estatus_id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `id_proyecto` (`id_proyecto`),
  CONSTRAINT `proyectos_ibfl_1` FOREIGN KEY (`prioridad_id`) REFERENCES `pro_prioridad` (`id`),
  CONSTRAINT `proyectos_ibfl_2` FOREIGN KEY (`estatus_id`) REFERENCES `pro_estatus` (`id`),
  CONSTRAINT `proyectos_ibfl_3` FOREIGN KEY (`id_proyecto`) REFERENCES `pro_proyectos` (`id`),
  CONSTRAINT `proyectos_ibfl_4` FOREIGN KEY (`usuario_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla supportix.pro_tareas: ~0 rows (aproximadamente)

-- Volcando estructura para tabla supportix.pro_tareasxfase
CREATE TABLE IF NOT EXISTS `pro_tareasxfase` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tarea` varchar(45) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `tipo_entregable` varchar(100) DEFAULT NULL,
  `id_fase` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla supportix.pro_tareasxfase: ~8 rows (aproximadamente)
INSERT INTO `pro_tareasxfase` (`id`, `tarea`, `descripcion`, `tipo_entregable`, `id_fase`) VALUES
	(1, 'Reuniones', NULL, 'Minuta', 1),
	(2, 'Propuesta', NULL, 'Propuesta, Contrato', 1),
	(3, 'Desarrollo', NULL, 'Programa', 2),
	(4, 'Pruebas', NULL, 'Resultados', 2),
	(5, 'Documentación', NULL, 'Word', 2),
	(6, 'Implementación', NULL, 'Resultados', 3),
	(7, 'Capacitación', NULL, 'Resumen', 3),
	(8, 'Mantenimiento', NULL, 'Tickets', 3);

-- Volcando estructura para tabla supportix.pro_tipo
CREATE TABLE IF NOT EXISTS `pro_tipo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla supportix.pro_tipo: ~0 rows (aproximadamente)
INSERT INTO `pro_tipo` (`id`, `nombre`) VALUES
	(1, 'Ticket'),
	(2, 'Bug'),
	(3, 'Sugerencia'),
	(4, 'Caracteristica'),
	(5, 'Nuevo Desarrollo');

-- Volcando estructura para tabla supportix.status
CREATE TABLE IF NOT EXISTS `status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla supportix.status: ~0 rows (aproximadamente)
INSERT INTO `status` (`id`, `name`) VALUES
	(1, 'Pendiente'),
	(2, 'En Desarrollo'),
	(3, 'Terminado'),
	(4, 'Cancelado'),
	(5, 'Detenido');

-- Volcando estructura para tabla supportix.test
CREATE TABLE IF NOT EXISTS `test` (
  `id` int NOT NULL AUTO_INCREMENT,
  `campo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla supportix.test: ~0 rows (aproximadamente)
INSERT INTO `test` (`id`, `campo`) VALUES
	(1, 'tes');

-- Volcando estructura para tabla supportix.ticket
CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `description` text,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `kind_id` int NOT NULL,
  `user_id` int NOT NULL,
  `asigned_id` int DEFAULT NULL,
  `project_id` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `priority_id` int NOT NULL DEFAULT '1',
  `status_id` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `priority_id` (`priority_id`),
  KEY `status_id` (`status_id`),
  KEY `user_id` (`user_id`),
  KEY `kind_id` (`kind_id`),
  KEY `category_id` (`category_id`),
  KEY `project_id` (`project_id`),
  CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`priority_id`) REFERENCES `priority` (`id`),
  CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `ticket_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `ticket_ibfk_4` FOREIGN KEY (`kind_id`) REFERENCES `kind` (`id`),
  CONSTRAINT `ticket_ibfk_5` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `ticket_ibfk_6` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla supportix.ticket: ~2 rows (aproximadamente)
INSERT INTO `ticket` (`id`, `title`, `description`, `updated_at`, `created_at`, `kind_id`, `user_id`, `asigned_id`, `project_id`, `category_id`, `priority_id`, `status_id`) VALUES
	(17, '10', '555555', NULL, '2022-12-12 13:56:28', 2, 2, NULL, 1, 2, 2, 4);

-- Volcando estructura para tabla supportix.ticketnombre
CREATE TABLE IF NOT EXISTS `ticketnombre` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(200) DEFAULT NULL,
  `Id_Usuario` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla supportix.ticketnombre: ~5 rows (aproximadamente)
INSERT INTO `ticketnombre` (`id`, `Descripcion`, `Id_Usuario`) VALUES
	(1, '--OTRO--', 0),
	(2, 'Se cierra el programa', 0),
	(3, 'No puedo inciar sesion', 0),
	(8, 'Prueba de nuevo ticket', 4),
	(10, 'Test de nuevo nombre de ticket', 2);

-- Volcando estructura para tabla supportix.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `kind` int NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla supportix.user: ~0 rows (aproximadamente)
INSERT INTO `user` (`id`, `username`, `name`, `lastname`, `email`, `password`, `is_active`, `kind`, `created_at`) VALUES
	(2, 'admin', 'admin', 'admin', 'admin@eimportacion.com', 'admin', 1, 1, '2022-11-08 12:50:26'),
	(3, 'test', 'test', 'test', 'test@eimportacion.com', NULL, 1, 2, '2022-11-08 13:47:26'),
	(4, 'test2', 'test2', 'test2', 'test2@eimportacion.com', NULL, 1, 2, '2022-11-12 18:30:27');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
