-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.4.3 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para bdalumno
CREATE DATABASE IF NOT EXISTS `bdalumno` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bdalumno`;

-- Volcando estructura para tabla bdalumno.tcliente
CREATE TABLE IF NOT EXISTS `tcliente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dni` char(8) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `celular` char(9) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bdalumno.tcliente: ~3 rows (aproximadamente)
INSERT INTO `tcliente` (`id`, `dni`, `apellidos`, `nombres`, `email`, `celular`, `direccion`) VALUES
	(1, '47510087', 'BAZAN HUAMAN', 'JOSE LENIN', 'lenin393.jlbh@gmail.com', '927321492', 'Jr. Serafin Filomeno N° 585'),
	(3, '71234567', 'Perez Garcia', 'Juan Carlos', 'juan.perez@email.com', '987654321', 'Av. Principal 123'),
	(4, '35574957', 'Perez Garcia', 'Juan Carlos', 'juan.perez@email.com', '987654321', 'Av. Principal 123');

-- Volcando estructura para tabla bdalumno.tcurso
CREATE TABLE IF NOT EXISTS `tcurso` (
  `id` int NOT NULL AUTO_INCREMENT,
  `CodCur` int NOT NULL,
  `NomCur` varchar(50) NOT NULL,
  `Ciclo` varchar(4) NOT NULL,
  `NumCre` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bdalumno.tcurso: ~1 rows (aproximadamente)
INSERT INTO `tcurso` (`id`, `CodCur`, `NomCur`, `Ciclo`, `NumCre`) VALUES
	(2, 102, 'Ingeniería de Software', 'VI', 5);

-- Volcando estructura para tabla bdalumno.tsancion
CREATE TABLE IF NOT EXISTS `tsancion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `numSancion` varchar(20) NOT NULL,
  `codTrab` varchar(10) NOT NULL,
  `tipoSancion` varchar(30) NOT NULL,
  `fechaSancion` date NOT NULL,
  `dias` int NOT NULL,
  `motivo` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `codTrab` (`codTrab`),
  CONSTRAINT `tsancion_ibfk_1` FOREIGN KEY (`codTrab`) REFERENCES `ttrabajador` (`codTrab`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bdalumno.tsancion: ~1 rows (aproximadamente)
INSERT INTO `tsancion` (`id`, `numSancion`, `codTrab`, `tipoSancion`, `fechaSancion`, `dias`, `motivo`) VALUES
	(2, 'SAN-4043', 'TR002', 'Amonestación', '2026-10-27', 1, 'Uso indebido de dispositivos móviles personales durante el horario de atención a clientes.');

-- Volcando estructura para tabla bdalumno.ttrabajador
CREATE TABLE IF NOT EXISTS `ttrabajador` (
  `codTrab` varchar(10) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `fechaIngreso` date NOT NULL,
  PRIMARY KEY (`codTrab`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bdalumno.ttrabajador: ~2 rows (aproximadamente)
INSERT INTO `ttrabajador` (`codTrab`, `apellidos`, `nombres`, `cargo`, `area`, `fechaIngreso`) VALUES
	('TR001', 'Quispe Mamani', 'Carlos Alberto', 'Analista de Creditos', 'Finanzas', '2022-03-15'),
	('TR002', 'Torres Rios', 'Ana Maria', 'Asistente Operativo', 'RRHH', '2021-08-01');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
