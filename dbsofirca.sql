-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 05-10-2019 a las 19:57:02
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbsofirca`
--
CREATE DATABASE IF NOT EXISTS `dbsofirca` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `dbsofirca`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambientes`
--

DROP TABLE IF EXISTS `ambientes`;
CREATE TABLE IF NOT EXISTS `ambientes` (
  `Ab_Id` int(11) NOT NULL,
  `Ab_Nombre` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Ab_Ubicacion` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Ab_SsCodConvenio` int(11) NOT NULL,
  PRIMARY KEY (`Ab_Id`),
  KEY `Ab_SsCodConvenio` (`Ab_SsCodConvenio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprendices`
--

DROP TABLE IF EXISTS `aprendices`;
CREATE TABLE IF NOT EXISTS `aprendices` (
  `Ap_Id` int(11) NOT NULL,
  `Ap_FId` int(11) NOT NULL,
  `Ap_TipoDocumento` varchar(2) COLLATE utf8_spanish2_ci NOT NULL,
  `Ap_NumeroDocumento` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Ap_Nombres` text COLLATE utf8_spanish2_ci NOT NULL,
  `Ap_Apellidos` int(50) NOT NULL,
  `Ap_Telefono` varchar(11) COLLATE utf8_spanish2_ci NOT NULL,
  `Ap_Correo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`Ap_Id`),
  KEY `Ap_FId` (`Ap_FId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivosadjuntos`
--

DROP TABLE IF EXISTS `archivosadjuntos`;
CREATE TABLE IF NOT EXISTS `archivosadjuntos` (
  `Ad_Id` int(11) NOT NULL,
  `Ad_NombreAdjunto` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Ad_RutaArchivo` varchar(80) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`Ad_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banco_ies`
--

DROP TABLE IF EXISTS `banco_ies`;
CREATE TABLE IF NOT EXISTS `banco_ies` (
  `Bc_Id` int(11) NOT NULL,
  `Bc_NombreInstitucion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `BC_Direccion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Bc_NombreCoordinador` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Bc_Telefono` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `Bc_Correo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`Bc_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `banco_ies`
--

INSERT INTO `banco_ies` (`Bc_Id`, `Bc_NombreInstitucion`, `BC_Direccion`, `Bc_NombreCoordinador`, `Bc_Telefono`, `Bc_Correo`) VALUES
(1, 'Itsa', 'Calle 18 # 39-100 Soledad', 'Miguel Salazar', '3192220385', 'msalazarn@itsa.edu.co'),
(2, 'Corporacion Educativa Formar', 'Carrera 43 # 68-63 Barranquilla', 'Julieth Becerra', '1321323232', 'diracademica@ceformar.edu.co');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carga_academica`
--

DROP TABLE IF EXISTS `carga_academica`;
CREATE TABLE IF NOT EXISTS `carga_academica` (
  `Ca_Id` int(11) NOT NULL,
  `Ca_FechaInicio` date NOT NULL,
  `Ca_FechaFin` date NOT NULL,
  `Ca_HoraInicio` time NOT NULL,
  `Ca_HoraFin` time NOT NULL,
  `Ca_DiasSemana` varchar(14) COLLATE utf8_spanish2_ci NOT NULL,
  `Ca_FId` int(11) NOT NULL,
  `Ca_CpId` int(11) NOT NULL,
  `Ca_AbId` int(11) NOT NULL,
  `Ca_InId` int(11) NOT NULL,
  PRIMARY KEY (`Ca_Id`),
  KEY `Ca_FId` (`Ca_FId`),
  KEY `Ca_CpId` (`Ca_CpId`),
  KEY `Ca_AbId` (`Ca_AbId`),
  KEY `Ca_InId` (`Ca_InId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro_formacion`
--

DROP TABLE IF EXISTS `centro_formacion`;
CREATE TABLE IF NOT EXISTS `centro_formacion` (
  `Cf_Id` int(11) NOT NULL,
  `Cf_Nombre` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Cf_Direccion` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`Cf_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competencia_programa`
--

DROP TABLE IF EXISTS `competencia_programa`;
CREATE TABLE IF NOT EXISTS `competencia_programa` (
  `Cp_Id` int(11) NOT NULL,
  `Cp_PgId` int(11) NOT NULL,
  `Cp_NombreC` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Cp_IntensidadH` int(4) NOT NULL,
  PRIMARY KEY (`Cp_Id`),
  KEY `Cp_PgId` (`Cp_PgId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato_instructor`
--

DROP TABLE IF EXISTS `contrato_instructor`;
CREATE TABLE IF NOT EXISTS `contrato_instructor` (
  `Cn_Id` int(11) NOT NULL,
  `Cn_NumContrato` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `Cn_CodInstructor` int(11) NOT NULL,
  `Cn_FechaInicio` date NOT NULL,
  `Cn_FechaFin` int(11) NOT NULL,
  `Cn_EstadoContrato` varchar(1) COLLATE utf8_spanish2_ci NOT NULL,
  `Cn_CfId` int(11) NOT NULL,
  `Cn_SsCodConvenio` int(11) NOT NULL,
  PRIMARY KEY (`Cn_Id`,`Cn_NumContrato`),
  KEY `Cn_CodInstructor` (`Cn_CodInstructor`),
  KEY `Cn_CfId` (`Cn_CfId`),
  KEY `Cn_SsCodConvenio` (`Cn_SsCodConvenio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenios`
--

DROP TABLE IF EXISTS `convenios`;
CREATE TABLE IF NOT EXISTS `convenios` (
  `Cv_Id` int(11) NOT NULL,
  `Cv_IdInstitucion` int(11) NOT NULL,
  `Cv_ConvenioMarco` int(11) NOT NULL,
  `Cv_ConvenioDerivado` int(11) NOT NULL,
  `Cv_EstadoConvenio` varchar(1) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`Cv_Id`),
  KEY `Cv_IdInstitucion` (`Cv_IdInstitucion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_informe`
--

DROP TABLE IF EXISTS `detalle_informe`;
CREATE TABLE IF NOT EXISTS `detalle_informe` (
  `Di_Id` int(11) NOT NULL,
  `Di_CvIdInstitucion` int(11) NOT NULL,
  `Di_IfId` int(11) NOT NULL,
  `Di_Anio` varchar(4) COLLATE utf8_spanish2_ci NOT NULL,
  `Di_Mes` varchar(2) COLLATE utf8_spanish2_ci NOT NULL,
  `Di_CodAdjunto` int(11) NOT NULL,
  PRIMARY KEY (`Di_Id`),
  KEY `Di_CvIdInstitucion` (`Di_CvIdInstitucion`),
  KEY `Di_IfId` (`Di_IfId`),
  KEY `Di_CodAdjunto` (`Di_CodAdjunto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichas`
--

DROP TABLE IF EXISTS `fichas`;
CREATE TABLE IF NOT EXISTS `fichas` (
  `F_Id` int(11) NOT NULL,
  `F_CvId` int(11) NOT NULL,
  `F_PgId` int(11) NOT NULL,
  `F_FechaInicio` date NOT NULL,
  `F_FechaFin` date NOT NULL,
  PRIMARY KEY (`F_Id`),
  KEY `F_CvId` (`F_CvId`),
  KEY `F_PgId` (`F_PgId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informes`
--

DROP TABLE IF EXISTS `informes`;
CREATE TABLE IF NOT EXISTS `informes` (
  `If_Id` int(11) NOT NULL,
  `If_Nombre` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `If_Responsable` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`If_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `informes`
--

INSERT INTO `informes` (`If_Id`, `If_Nombre`, `If_Responsable`) VALUES
(1, 'Cualitativo', ''),
(2, 'Financiero', ''),
(3, 'Inasistencia', ''),
(4, 'Novedades', ''),
(5, 'Actas', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructor`
--

DROP TABLE IF EXISTS `instructor`;
CREATE TABLE IF NOT EXISTS `instructor` (
  `In_Id` int(11) NOT NULL,
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
  KEY `In_CodAdjunto` (`In_CodAdjunto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

DROP TABLE IF EXISTS `programas`;
CREATE TABLE IF NOT EXISTS `programas` (
  `Pg_Id` int(11) NOT NULL,
  `Pg_Nombre` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Pg_CfId` int(11) NOT NULL,
  `Pg_CodAdjunto` int(11) NOT NULL,
  PRIMARY KEY (`Pg_Id`),
  KEY `Pg_CfId` (`Pg_CfId`),
  KEY `Pg_CodAdjunto` (`Pg_CodAdjunto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `Us_Id` int(11) NOT NULL,
  `Us_Nombre` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Us_Pass` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Us_NSeguridad` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Us_CvIdInstitucion` int(11) DEFAULT NULL,
  PRIMARY KEY (`Us_Id`),
  KEY `Us_CvIdInstitucion` (`Us_CvIdInstitucion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Us_Id`, `Us_Nombre`, `Us_Pass`, `Us_NSeguridad`, `Us_CvIdInstitucion`) VALUES
(1, 'usuario', '1234', '3', NULL),
(123456789, 'Usuario', '8080', '2', NULL),
(1143468062, 'Administrador', '2020', '1', NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ambientes`
--
ALTER TABLE `ambientes`
  ADD CONSTRAINT `ambientes_ibfk_1` FOREIGN KEY (`Ab_SsCodConvenio`) REFERENCES `banco_ies` (`Bc_Id`);

--
-- Filtros para la tabla `aprendices`
--
ALTER TABLE `aprendices`
  ADD CONSTRAINT `aprendices_ibfk_1` FOREIGN KEY (`Ap_FId`) REFERENCES `fichas` (`F_Id`);

--
-- Filtros para la tabla `carga_academica`
--
ALTER TABLE `carga_academica`
  ADD CONSTRAINT `carga_academica_ibfk_1` FOREIGN KEY (`Ca_CpId`) REFERENCES `competencia_programa` (`Cp_Id`),
  ADD CONSTRAINT `carga_academica_ibfk_2` FOREIGN KEY (`Ca_FId`) REFERENCES `fichas` (`F_Id`),
  ADD CONSTRAINT `carga_academica_ibfk_3` FOREIGN KEY (`Ca_AbId`) REFERENCES `ambientes` (`Ab_Id`),
  ADD CONSTRAINT `carga_academica_ibfk_4` FOREIGN KEY (`Ca_InId`) REFERENCES `contrato_instructor` (`Cn_CodInstructor`);

--
-- Filtros para la tabla `competencia_programa`
--
ALTER TABLE `competencia_programa`
  ADD CONSTRAINT `competencia_programa_ibfk_1` FOREIGN KEY (`Cp_PgId`) REFERENCES `programas` (`Pg_Id`);

--
-- Filtros para la tabla `contrato_instructor`
--
ALTER TABLE `contrato_instructor`
  ADD CONSTRAINT `contrato_instructor_ibfk_1` FOREIGN KEY (`Cn_CodInstructor`) REFERENCES `instructor` (`In_Id`),
  ADD CONSTRAINT `contrato_instructor_ibfk_2` FOREIGN KEY (`Cn_CfId`) REFERENCES `centro_formacion` (`Cf_Id`),
  ADD CONSTRAINT `contrato_instructor_ibfk_3` FOREIGN KEY (`Cn_SsCodConvenio`) REFERENCES `banco_ies` (`Bc_Id`);

--
-- Filtros para la tabla `convenios`
--
ALTER TABLE `convenios`
  ADD CONSTRAINT `convenios_ibfk_1` FOREIGN KEY (`Cv_IdInstitucion`) REFERENCES `banco_ies` (`Bc_Id`);

--
-- Filtros para la tabla `detalle_informe`
--
ALTER TABLE `detalle_informe`
  ADD CONSTRAINT `detalle_informe_ibfk_2` FOREIGN KEY (`Di_IfId`) REFERENCES `informes` (`If_Id`),
  ADD CONSTRAINT `detalle_informe_ibfk_3` FOREIGN KEY (`Di_CodAdjunto`) REFERENCES `archivosadjuntos` (`Ad_Id`),
  ADD CONSTRAINT `detalle_informe_ibfk_4` FOREIGN KEY (`Di_CvIdInstitucion`) REFERENCES `banco_ies` (`Bc_Id`);

--
-- Filtros para la tabla `fichas`
--
ALTER TABLE `fichas`
  ADD CONSTRAINT `fichas_ibfk_1` FOREIGN KEY (`F_CvId`) REFERENCES `convenios` (`Cv_Id`),
  ADD CONSTRAINT `fichas_ibfk_2` FOREIGN KEY (`F_PgId`) REFERENCES `programas` (`Pg_Id`);

--
-- Filtros para la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `instructor_ibfk_2` FOREIGN KEY (`In_CodAdjunto`) REFERENCES `archivosadjuntos` (`Ad_Id`),
  ADD CONSTRAINT `instructor_ibfk_3` FOREIGN KEY (`In_SsCodConvenio`) REFERENCES `banco_ies` (`Bc_Id`);

--
-- Filtros para la tabla `programas`
--
ALTER TABLE `programas`
  ADD CONSTRAINT `programas_ibfk_1` FOREIGN KEY (`Pg_CfId`) REFERENCES `centro_formacion` (`Cf_Id`),
  ADD CONSTRAINT `programas_ibfk_2` FOREIGN KEY (`Pg_CodAdjunto`) REFERENCES `archivosadjuntos` (`Ad_Id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`Us_CvIdInstitucion`) REFERENCES `banco_ies` (`Bc_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
