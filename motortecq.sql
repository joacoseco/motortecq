-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.13-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para motortecq
CREATE DATABASE IF NOT EXISTS `motortecq` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `motortecq`;

-- Volcando estructura para tabla motortecq.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `rut` varchar(10) NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `apellidoPaterno` varchar(35) NOT NULL,
  `apellidoMaterno` varchar(35) NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tipoCliente` varchar(20) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `permiso` int(11) NOT NULL,
  PRIMARY KEY (`rut`),
  KEY `FK_cliente_permiso` (`permiso`),
  CONSTRAINT `FK_cliente_permiso` FOREIGN KEY (`permiso`) REFERENCES `permiso` (`idPermiso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla motortecq.cliente: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Volcando estructura para tabla motortecq.clientevehiculo
CREATE TABLE IF NOT EXISTS `clientevehiculo` (
  `rut` varchar(10) NOT NULL,
  `patente` varchar(20) NOT NULL,
  PRIMARY KEY (`patente`,`rut`),
  KEY `FK_clientevehiculo_cliente` (`rut`),
  CONSTRAINT `FK_clientevehiculo_cliente` FOREIGN KEY (`rut`) REFERENCES `cliente` (`rut`),
  CONSTRAINT `FK_clientevehiculo_vehiculo` FOREIGN KEY (`patente`) REFERENCES `vehiculo` (`patente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla motortecq.clientevehiculo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `clientevehiculo` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientevehiculo` ENABLE KEYS */;

-- Volcando estructura para tabla motortecq.disponibilidad
CREATE TABLE IF NOT EXISTS `disponibilidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `color` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla motortecq.disponibilidad: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `disponibilidad` DISABLE KEYS */;
INSERT INTO `disponibilidad` (`id`, `title`, `start`, `end`, `color`) VALUES
	(1, 'probando', '2020-06-25 12:30:24', '2020-06-25 13:30:34', '#FF5733'),
	(2, 'VERDE', '2020-06-27 01:27:49', '2020-06-26 02:28:02', '#33F0FF');
/*!40000 ALTER TABLE `disponibilidad` ENABLE KEYS */;

-- Volcando estructura para tabla motortecq.historial
CREATE TABLE IF NOT EXISTS `historial` (
  `patente` varchar(20) NOT NULL,
  `fechaRecibo` date NOT NULL,
  `fechaEntrega` date NOT NULL,
  `descripcionTrabajo` varchar(250) NOT NULL,
  `precio` int(11) NOT NULL,
  `trabajador` varchar(10) NOT NULL,
  PRIMARY KEY (`patente`,`fechaRecibo`),
  KEY `FK_historial_trabajador` (`trabajador`),
  CONSTRAINT `FK_historial_trabajador` FOREIGN KEY (`trabajador`) REFERENCES `trabajador` (`rut`),
  CONSTRAINT `FK_historial_vehiculo` FOREIGN KEY (`patente`) REFERENCES `vehiculo` (`patente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla motortecq.historial: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `historial` DISABLE KEYS */;
/*!40000 ALTER TABLE `historial` ENABLE KEYS */;

-- Volcando estructura para tabla motortecq.permiso
CREATE TABLE IF NOT EXISTS `permiso` (
  `idPermiso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`idPermiso`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla motortecq.permiso: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `permiso` DISABLE KEYS */;
INSERT INTO `permiso` (`idPermiso`, `nombre`) VALUES
	(1, 'administrador'),
	(2, 'cliente'),
	(3, 'mecánico');
/*!40000 ALTER TABLE `permiso` ENABLE KEYS */;

-- Volcando estructura para tabla motortecq.reserva
CREATE TABLE IF NOT EXISTS `reserva` (
  `idDisponiblidad` int(11) NOT NULL,
  `rutCliente` varchar(10) NOT NULL,
  `tipoServicio` int(11) NOT NULL,
  `motivo` varchar(250) NOT NULL,
  `estado` varchar(20) NOT NULL,
  PRIMARY KEY (`rutCliente`,`idDisponiblidad`),
  KEY `FK_reserva_disponibilidad` (`idDisponiblidad`),
  CONSTRAINT `FK_reserva_cliente` FOREIGN KEY (`rutCliente`) REFERENCES `cliente` (`rut`),
  CONSTRAINT `FK_reserva_disponibilidad` FOREIGN KEY (`idDisponiblidad`) REFERENCES `disponibilidad` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla motortecq.reserva: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;

-- Volcando estructura para tabla motortecq.tiposervicio
CREATE TABLE IF NOT EXISTS `tiposervicio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla motortecq.tiposervicio: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tiposervicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `tiposervicio` ENABLE KEYS */;

-- Volcando estructura para tabla motortecq.trabajador
CREATE TABLE IF NOT EXISTS `trabajador` (
  `rut` varchar(10) NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `apellidoPaterno` varchar(35) NOT NULL,
  `apellidoMaterno` varchar(35) NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cargo` varchar(35) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `permiso` int(11) NOT NULL,
  PRIMARY KEY (`rut`),
  KEY `FK_trabajador_permiso` (`permiso`),
  CONSTRAINT `FK_trabajador_permiso` FOREIGN KEY (`permiso`) REFERENCES `permiso` (`idPermiso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla motortecq.trabajador: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `trabajador` DISABLE KEYS */;
INSERT INTO `trabajador` (`rut`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `telefono`, `email`, `cargo`, `clave`, `permiso`) VALUES
	('19', 'test', 'test', 'test', 123, 'a@a.com', 'Administrador', '1', 1);
/*!40000 ALTER TABLE `trabajador` ENABLE KEYS */;

-- Volcando estructura para tabla motortecq.vehiculo
CREATE TABLE IF NOT EXISTS `vehiculo` (
  `patente` varchar(20) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `año` year(4) NOT NULL,
  PRIMARY KEY (`patente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla motortecq.vehiculo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `vehiculo` DISABLE KEYS */;
/*!40000 ALTER TABLE `vehiculo` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
