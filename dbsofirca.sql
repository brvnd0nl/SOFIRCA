-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.38-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para dbsofirca
CREATE DATABASE IF NOT EXISTS `dbsofirca` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci */;
USE `dbsofirca`;

-- Volcando estructura para tabla dbsofirca.ambientes
CREATE TABLE IF NOT EXISTS `ambientes` (
  `Ab_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Ab_Nombre` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Ab_Ubicacion` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Ab_SsCodConvenio` int(11) NOT NULL,
  PRIMARY KEY (`Ab_Id`),
  KEY `Ab_SsCodConvenio` (`Ab_SsCodConvenio`),
  CONSTRAINT `ambientes_ibfk_1` FOREIGN KEY (`Ab_SsCodConvenio`) REFERENCES `banco_ies` (`Bc_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla dbsofirca.ambientes: ~0 rows (aproximadamente)
DELETE FROM `ambientes`;
/*!40000 ALTER TABLE `ambientes` DISABLE KEYS */;
INSERT INTO `ambientes` (`Ab_Id`, `Ab_Nombre`, `Ab_Ubicacion`, `Ab_SsCodConvenio`) VALUES
	(1, 'Ambiente ADSI', 'Calle 80', 1);
/*!40000 ALTER TABLE `ambientes` ENABLE KEYS */;

-- Volcando estructura para tabla dbsofirca.aprendices
CREATE TABLE IF NOT EXISTS `aprendices` (
  `Ap_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Ap_FId` int(11) NOT NULL,
  `Ap_TipoDocumento` varchar(2) COLLATE utf8_spanish2_ci NOT NULL,
  `Ap_NumeroDocumento` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Ap_Nombres` text COLLATE utf8_spanish2_ci NOT NULL,
  `Ap_Apellidos` int(50) NOT NULL,
  `Ap_Telefono` varchar(11) COLLATE utf8_spanish2_ci NOT NULL,
  `Ap_Correo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`Ap_Id`),
  KEY `Ap_FId` (`Ap_FId`),
  CONSTRAINT `aprendices_ibfk_1` FOREIGN KEY (`Ap_FId`) REFERENCES `fichas` (`F_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla dbsofirca.aprendices: ~0 rows (aproximadamente)
DELETE FROM `aprendices`;
/*!40000 ALTER TABLE `aprendices` DISABLE KEYS */;
/*!40000 ALTER TABLE `aprendices` ENABLE KEYS */;

-- Volcando estructura para tabla dbsofirca.archivosadjuntos
CREATE TABLE IF NOT EXISTS `archivosadjuntos` (
  `Ad_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Ad_NombreAdjunto` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `Ad_RutaArchivo` varchar(80) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`Ad_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla dbsofirca.archivosadjuntos: ~7 rows (aproximadamente)
DELETE FROM `archivosadjuntos`;
/*!40000 ALTER TABLE `archivosadjuntos` DISABLE KEYS */;
INSERT INTO `archivosadjuntos` (`Ad_Id`, `Ad_NombreAdjunto`, `Ad_RutaArchivo`) VALUES
	(1, 'IF6108_1 (1)', '../files/IF6108_1 (1).PDF'),
	(2, '9207001469412CC1143468062C', '../files/9207001469412CC1143468062C.pdf'),
	(3, 'THE PERFECT CITY TOWN.', '../files/THE PERFECT CITY TOWN..doc'),
	(4, '', '../files/.'),
	(5, '', '../files/.'),
	(6, 'constancia_TituladaPresencial', '../files/constancia_TituladaPresencial.pdf'),
	(7, 'constancia_TituladaPresencial', '../files/constancia_TituladaPresencial.pdf');
/*!40000 ALTER TABLE `archivosadjuntos` ENABLE KEYS */;

-- Volcando estructura para tabla dbsofirca.banco_ies
CREATE TABLE IF NOT EXISTS `banco_ies` (
  `Bc_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Bc_NombreInstitucion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `BC_Direccion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Bc_NombreCoordinador` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Bc_Telefono` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `Bc_Correo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`Bc_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla dbsofirca.banco_ies: ~2 rows (aproximadamente)
DELETE FROM `banco_ies`;
/*!40000 ALTER TABLE `banco_ies` DISABLE KEYS */;
INSERT INTO `banco_ies` (`Bc_Id`, `Bc_NombreInstitucion`, `BC_Direccion`, `Bc_NombreCoordinador`, `Bc_Telefono`, `Bc_Correo`) VALUES
	(1, 'Itsa', 'Calle 18 # 39-100 Soledad', 'Miguel Salazar', '3192220385', 'msalazarn@itsa.edu.co'),
	(2, 'Corporacion Educativa Formar', 'Carrera 43 # 68-63 Barranquilla', 'Julieth Becerra', '1321323232', 'diracademica@ceformar.edu.co');
/*!40000 ALTER TABLE `banco_ies` ENABLE KEYS */;

-- Volcando estructura para tabla dbsofirca.carga_academica
CREATE TABLE IF NOT EXISTS `carga_academica` (
  `Ca_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Ca_FechaInicio` date NOT NULL,
  `Ca_FechaFin` date NOT NULL,
  `Ca_HoraInicio` int(11) NOT NULL,
  `Ca_HoraFin` int(11) NOT NULL,
  `Ca_Lunes` int(1) NOT NULL,
  `Ca_Martes` int(1) NOT NULL,
  `Ca_Miercoles` int(1) NOT NULL,
  `Ca_Jueves` int(1) NOT NULL,
  `Ca_Viernes` int(1) NOT NULL,
  `Ca_Sabado` int(1) NOT NULL,
  `Ca_Domingo` int(1) NOT NULL,
  `Ca_FId` int(11) NOT NULL,
  `Ca_CpId` int(11) NOT NULL,
  `Ca_AbId` int(11) NOT NULL,
  `Ca_InId` int(11) NOT NULL,
  `Ca_PaId` int(11) NOT NULL,
  `Ca_SsCodConvenio` int(11) NOT NULL,
  PRIMARY KEY (`Ca_Id`),
  KEY `Ca_FId` (`Ca_FId`),
  KEY `Ca_CpId` (`Ca_CpId`),
  KEY `Ca_AbId` (`Ca_AbId`),
  KEY `Ca_InId` (`Ca_InId`),
  KEY `Ca_PaId` (`Ca_PaId`),
  KEY `Cn_SsCodConvenio` (`Ca_SsCodConvenio`),
  CONSTRAINT `carga_academica_ibfk_1` FOREIGN KEY (`Ca_CpId`) REFERENCES `competencia_programa` (`Cp_Id`),
  CONSTRAINT `carga_academica_ibfk_2` FOREIGN KEY (`Ca_FId`) REFERENCES `fichas` (`F_Id`),
  CONSTRAINT `carga_academica_ibfk_3` FOREIGN KEY (`Ca_AbId`) REFERENCES `ambientes` (`Ab_Id`),
  CONSTRAINT `carga_academica_ibfk_4` FOREIGN KEY (`Ca_InId`) REFERENCES `contrato_instructor` (`Cn_CodInstructor`),
  CONSTRAINT `carga_academica_ibfk_5` FOREIGN KEY (`Ca_PaId`) REFERENCES `periodoacademico` (`Pa_Id`),
  CONSTRAINT `carga_academica_ibfk_6` FOREIGN KEY (`Ca_SsCodConvenio`) REFERENCES `banco_ies` (`Bc_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla dbsofirca.carga_academica: ~1 rows (aproximadamente)
DELETE FROM `carga_academica`;
/*!40000 ALTER TABLE `carga_academica` DISABLE KEYS */;
/*!40000 ALTER TABLE `carga_academica` ENABLE KEYS */;

-- Volcando estructura para tabla dbsofirca.centro_formacion
CREATE TABLE IF NOT EXISTS `centro_formacion` (
  `Cf_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Cf_Nombre` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Cf_Direccion` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`Cf_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla dbsofirca.centro_formacion: ~4 rows (aproximadamente)
DELETE FROM `centro_formacion`;
/*!40000 ALTER TABLE `centro_formacion` DISABLE KEYS */;
INSERT INTO `centro_formacion` (`Cf_Id`, `Cf_Nombre`, `Cf_Direccion`) VALUES
	(1, 'Colombo Aleman', ''),
	(2, 'Industrial de Aviacion', ''),
	(3, 'Comercio y Servicios', ''),
	(4, 'Cedagro', '');
/*!40000 ALTER TABLE `centro_formacion` ENABLE KEYS */;

-- Volcando estructura para tabla dbsofirca.competencia_programa
CREATE TABLE IF NOT EXISTS `competencia_programa` (
  `Cp_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Cp_PgId` int(11) NOT NULL,
  `Cp_NombreC` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Cp_IntensidadH` int(4) NOT NULL,
  PRIMARY KEY (`Cp_Id`),
  KEY `Cp_PgId` (`Cp_PgId`),
  CONSTRAINT `competencia_programa_ibfk_1` FOREIGN KEY (`Cp_PgId`) REFERENCES `programas` (`Pg_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla dbsofirca.competencia_programa: ~0 rows (aproximadamente)
DELETE FROM `competencia_programa`;
/*!40000 ALTER TABLE `competencia_programa` DISABLE KEYS */;
INSERT INTO `competencia_programa` (`Cp_Id`, `Cp_PgId`, `Cp_NombreC`, `Cp_IntensidadH`) VALUES
	(1, 1, 'Prueba Competencia', 110);
/*!40000 ALTER TABLE `competencia_programa` ENABLE KEYS */;

-- Volcando estructura para tabla dbsofirca.contrato_instructor
CREATE TABLE IF NOT EXISTS `contrato_instructor` (
  `Cn_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Cn_NumContrato` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `Cn_CodInstructor` int(11) NOT NULL,
  `Cn_FechaInicio` date NOT NULL,
  `Cn_FechaFin` date NOT NULL,
  `Cn_EstadoContrato` varchar(1) COLLATE utf8_spanish2_ci NOT NULL,
  `Cn_CfId` int(11) NOT NULL,
  `Cn_SsCodConvenio` int(11) NOT NULL,
  PRIMARY KEY (`Cn_Id`,`Cn_NumContrato`),
  KEY `Cn_CodInstructor` (`Cn_CodInstructor`),
  KEY `Cn_CfId` (`Cn_CfId`),
  KEY `Cn_SsCodConvenio` (`Cn_SsCodConvenio`),
  CONSTRAINT `contrato_instructor_ibfk_1` FOREIGN KEY (`Cn_CodInstructor`) REFERENCES `instructor` (`In_Id`),
  CONSTRAINT `contrato_instructor_ibfk_2` FOREIGN KEY (`Cn_CfId`) REFERENCES `centro_formacion` (`Cf_Id`),
  CONSTRAINT `contrato_instructor_ibfk_3` FOREIGN KEY (`Cn_SsCodConvenio`) REFERENCES `banco_ies` (`Bc_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla dbsofirca.contrato_instructor: ~0 rows (aproximadamente)
DELETE FROM `contrato_instructor`;
/*!40000 ALTER TABLE `contrato_instructor` DISABLE KEYS */;
INSERT INTO `contrato_instructor` (`Cn_Id`, `Cn_NumContrato`, `Cn_CodInstructor`, `Cn_FechaInicio`, `Cn_FechaFin`, `Cn_EstadoContrato`, `Cn_CfId`, `Cn_SsCodConvenio`) VALUES
	(1, '1234', 1, '2019-11-09', '2019-11-30', '1', 1, 1);
/*!40000 ALTER TABLE `contrato_instructor` ENABLE KEYS */;

-- Volcando estructura para tabla dbsofirca.convenios
CREATE TABLE IF NOT EXISTS `convenios` (
  `Cv_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Cv_IdInstitucion` int(11) NOT NULL,
  `Cv_ConvenioMarco` int(11) NOT NULL,
  `Cv_ConvenioDerivado` int(11) NOT NULL,
  `Cv_EstadoConvenio` varchar(1) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`Cv_Id`),
  KEY `Cv_IdInstitucion` (`Cv_IdInstitucion`),
  CONSTRAINT `convenios_ibfk_1` FOREIGN KEY (`Cv_IdInstitucion`) REFERENCES `banco_ies` (`Bc_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla dbsofirca.convenios: ~2 rows (aproximadamente)
DELETE FROM `convenios`;
/*!40000 ALTER TABLE `convenios` DISABLE KEYS */;
INSERT INTO `convenios` (`Cv_Id`, `Cv_IdInstitucion`, `Cv_ConvenioMarco`, `Cv_ConvenioDerivado`, `Cv_EstadoConvenio`) VALUES
	(1, 1, 450, 1, '1'),
	(2, 2, 420, 1, '1');
/*!40000 ALTER TABLE `convenios` ENABLE KEYS */;

-- Volcando estructura para tabla dbsofirca.detalle_informe
CREATE TABLE IF NOT EXISTS `detalle_informe` (
  `Di_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Di_CvIdInstitucion` int(11) NOT NULL,
  `Di_IfId` int(11) NOT NULL,
  `Di_Anio` varchar(4) COLLATE utf8_spanish2_ci NOT NULL,
  `Di_Mes` varchar(2) COLLATE utf8_spanish2_ci NOT NULL,
  `Di_CodAdjunto` int(11) NOT NULL,
  PRIMARY KEY (`Di_Id`),
  KEY `Di_CvIdInstitucion` (`Di_CvIdInstitucion`),
  KEY `Di_IfId` (`Di_IfId`),
  KEY `Di_CodAdjunto` (`Di_CodAdjunto`),
  CONSTRAINT `detalle_informe_ibfk_2` FOREIGN KEY (`Di_IfId`) REFERENCES `informes` (`If_Id`),
  CONSTRAINT `detalle_informe_ibfk_3` FOREIGN KEY (`Di_CodAdjunto`) REFERENCES `archivosadjuntos` (`Ad_Id`),
  CONSTRAINT `detalle_informe_ibfk_4` FOREIGN KEY (`Di_CvIdInstitucion`) REFERENCES `banco_ies` (`Bc_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla dbsofirca.detalle_informe: ~0 rows (aproximadamente)
DELETE FROM `detalle_informe`;
/*!40000 ALTER TABLE `detalle_informe` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_informe` ENABLE KEYS */;

-- Volcando estructura para tabla dbsofirca.fichas
CREATE TABLE IF NOT EXISTS `fichas` (
  `F_Id` int(11) NOT NULL,
  `F_CvId` int(11) NOT NULL,
  `F_PgId` int(11) NOT NULL,
  `F_FechaInicio` date NOT NULL,
  `F_FechaFin` date NOT NULL,
  PRIMARY KEY (`F_Id`),
  KEY `F_CvId` (`F_CvId`),
  KEY `F_PgId` (`F_PgId`),
  CONSTRAINT `fichas_ibfk_1` FOREIGN KEY (`F_CvId`) REFERENCES `convenios` (`Cv_Id`),
  CONSTRAINT `fichas_ibfk_2` FOREIGN KEY (`F_PgId`) REFERENCES `programas` (`Pg_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla dbsofirca.fichas: ~0 rows (aproximadamente)
DELETE FROM `fichas`;
/*!40000 ALTER TABLE `fichas` DISABLE KEYS */;
INSERT INTO `fichas` (`F_Id`, `F_CvId`, `F_PgId`, `F_FechaInicio`, `F_FechaFin`) VALUES
	(1322762, 1, 1, '2019-11-01', '2019-11-16');
/*!40000 ALTER TABLE `fichas` ENABLE KEYS */;

-- Volcando estructura para procedimiento dbsofirca.GetOrderAmount
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetOrderAmount`()
BEGIN
    SELECT 
        SUM(quantityOrdered * priceEach) 
    FROM orderDetails;
END//
DELIMITER ;

-- Volcando estructura para tabla dbsofirca.informes
CREATE TABLE IF NOT EXISTS `informes` (
  `If_Id` int(11) NOT NULL AUTO_INCREMENT,
  `If_Nombre` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `If_Responsable` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`If_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla dbsofirca.informes: ~5 rows (aproximadamente)
DELETE FROM `informes`;
/*!40000 ALTER TABLE `informes` DISABLE KEYS */;
INSERT INTO `informes` (`If_Id`, `If_Nombre`, `If_Responsable`) VALUES
	(1, 'Cualitativo', ''),
	(2, 'Financiero', ''),
	(3, 'Inasistencia', ''),
	(4, 'Novedades', ''),
	(5, 'Actas', '');
/*!40000 ALTER TABLE `informes` ENABLE KEYS */;

-- Volcando estructura para tabla dbsofirca.instructor
CREATE TABLE IF NOT EXISTS `instructor` (
  `In_Id` int(11) NOT NULL AUTO_INCREMENT,
  `In_TipoDocumento` varchar(2) COLLATE utf8_spanish2_ci NOT NULL,
  `In_NumeroDocumento` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `In_Nombres` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `In_Apellidos` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `In_Telefono` varchar(11) COLLATE utf8_spanish2_ci NOT NULL,
  `In_EstudiosPregrado` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `In_NombreUniverdidad` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `In_FechaGrado` date NOT NULL,
  `In_CodAdjunto` int(11) NOT NULL,
  `In_SsCodConvenio` int(11) NOT NULL,
  PRIMARY KEY (`In_Id`),
  KEY `In_SsCodConvenio` (`In_SsCodConvenio`),
  KEY `In_CodAdjunto` (`In_CodAdjunto`),
  CONSTRAINT `instructor_ibfk_2` FOREIGN KEY (`In_CodAdjunto`) REFERENCES `archivosadjuntos` (`Ad_Id`),
  CONSTRAINT `instructor_ibfk_3` FOREIGN KEY (`In_SsCodConvenio`) REFERENCES `banco_ies` (`Bc_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla dbsofirca.instructor: ~4 rows (aproximadamente)
DELETE FROM `instructor`;
/*!40000 ALTER TABLE `instructor` DISABLE KEYS */;
INSERT INTO `instructor` (`In_Id`, `In_TipoDocumento`, `In_NumeroDocumento`, `In_Nombres`, `In_Apellidos`, `In_Telefono`, `In_EstudiosPregrado`, `In_NombreUniverdidad`, `In_FechaGrado`, `In_CodAdjunto`, `In_SsCodConvenio`) VALUES
	(1, 'CC', '12345678', 'JUAN DIEGO', 'SANDOVAL', '300300300', 'ADSI-23', 'SENA', '2019-11-11', 2, 1),
	(2, 'CC', '1143468062', 'PABLO', 'GONZALEZ', '300300300', 'NO TIENE', 'CUC', '2019-11-01', 4, 1),
	(3, 'CC', '1143468062', 'PABLO', 'GONZALEZ', '300300300', 'NO TIENE', 'CUC', '2019-11-01', 6, 1),
	(4, 'CC', '1143468062', 'PABLO', 'GONZALEZ', '300300300', 'NO TIENE', 'CUC', '2019-11-11', 7, 1);
/*!40000 ALTER TABLE `instructor` ENABLE KEYS */;

-- Volcando estructura para tabla dbsofirca.periodoacademico
CREATE TABLE IF NOT EXISTS `periodoacademico` (
  `Pa_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pa_Nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Pa_FechaInicio` date NOT NULL,
  `Pa_FechaFin` date NOT NULL,
  `Pa_Anio` int(4) NOT NULL,
  `Pa_Estado` int(1) NOT NULL,
  PRIMARY KEY (`Pa_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla dbsofirca.periodoacademico: ~5 rows (aproximadamente)
DELETE FROM `periodoacademico`;
/*!40000 ALTER TABLE `periodoacademico` DISABLE KEYS */;
INSERT INTO `periodoacademico` (`Pa_Id`, `Pa_Nombre`, `Pa_FechaInicio`, `Pa_FechaFin`, `Pa_Anio`, `Pa_Estado`) VALUES
	(1, '2 TRIMESTRE', '2019-10-07', '2019-12-13', 2019, 1),
	(2, '4 TRIMESTRE', '2019-11-23', '2019-11-23', 2019, 0),
	(3, '3 TRIMESTRE', '2019-11-25', '2019-11-25', 2019, 1),
	(5, '1 TRIMESTRE', '2019-11-01', '2019-11-15', 2020, 0),
	(7, '4 TRIMESTRE', '2019-11-20', '2019-11-20', 2021, 0);
/*!40000 ALTER TABLE `periodoacademico` ENABLE KEYS */;

-- Volcando estructura para tabla dbsofirca.programas
CREATE TABLE IF NOT EXISTS `programas` (
  `Pg_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pg_Nombre` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Pg_CfId` int(11) NOT NULL,
  `Pg_CodAdjunto` int(11) NOT NULL,
  PRIMARY KEY (`Pg_Id`),
  KEY `Pg_CfId` (`Pg_CfId`),
  KEY `Pg_CodAdjunto` (`Pg_CodAdjunto`),
  CONSTRAINT `programas_ibfk_1` FOREIGN KEY (`Pg_CfId`) REFERENCES `centro_formacion` (`Cf_Id`),
  CONSTRAINT `programas_ibfk_2` FOREIGN KEY (`Pg_CodAdjunto`) REFERENCES `archivosadjuntos` (`Ad_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla dbsofirca.programas: ~2 rows (aproximadamente)
DELETE FROM `programas`;
/*!40000 ALTER TABLE `programas` DISABLE KEYS */;
INSERT INTO `programas` (`Pg_Id`, `Pg_Nombre`, `Pg_CfId`, `Pg_CodAdjunto`) VALUES
	(1, 'ADSI', 1, 2),
	(2, 'Contabilidad y Finanzas', 3, 3);
/*!40000 ALTER TABLE `programas` ENABLE KEYS */;

-- Volcando estructura para tabla dbsofirca.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `Us_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Us_Nombre` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Us_Pass` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Us_NSeguridad` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Us_CvIdInstitucion` int(11) DEFAULT NULL,
  PRIMARY KEY (`Us_Id`),
  KEY `Us_CvIdInstitucion` (`Us_CvIdInstitucion`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`Us_CvIdInstitucion`) REFERENCES `banco_ies` (`Bc_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=1143468063 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla dbsofirca.usuarios: ~3 rows (aproximadamente)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`Us_Id`, `Us_Nombre`, `Us_Pass`, `Us_NSeguridad`, `Us_CvIdInstitucion`) VALUES
	(1, 'usuario', '1234', '3', 1),
	(123456789, 'Usuario', '8080', '2', NULL),
	(1143468062, 'Administrador', '2020', '1', NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
