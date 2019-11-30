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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla dbsofirca.ambientes: ~3 rows (aproximadamente)
DELETE FROM `ambientes`;
/*!40000 ALTER TABLE `ambientes` DISABLE KEYS */;
INSERT INTO `ambientes` (`Ab_Id`, `Ab_Nombre`, `Ab_Ubicacion`, `Ab_SsCodConvenio`) VALUES
	(1, 'Ambiente ADSI', 'Calle 80', 1),
	(2, 'Ambiente S-305', 'SEDE 2', 1),
	(3, 'Ambiente S-306', 'SEDE 3', 1);
/*!40000 ALTER TABLE `ambientes` ENABLE KEYS */;

-- Volcando estructura para tabla dbsofirca.aprendices
CREATE TABLE IF NOT EXISTS `aprendices` (
  `Ap_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Ap_FId` int(11) NOT NULL,
  `Ap_TipoDocumento` varchar(2) COLLATE utf8_spanish2_ci NOT NULL,
  `Ap_NumeroDocumento` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Ap_Nombres` varchar(50) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '',
  `Ap_Apellidos` varchar(50) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '',
  `Ap_Telefono` varchar(11) COLLATE utf8_spanish2_ci NOT NULL,
  `Ap_Correo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`Ap_Id`),
  KEY `Ap_FId` (`Ap_FId`),
  CONSTRAINT `aprendices_ibfk_1` FOREIGN KEY (`Ap_FId`) REFERENCES `fichas` (`F_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=611 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla dbsofirca.aprendices: ~610 rows (aproximadamente)
DELETE FROM `aprendices`;
/*!40000 ALTER TABLE `aprendices` DISABLE KEYS */;
INSERT INTO `aprendices` (`Ap_Id`, `Ap_FId`, `Ap_TipoDocumento`, `Ap_NumeroDocumento`, `Ap_Nombres`, `Ap_Apellidos`, `Ap_Telefono`, `Ap_Correo`) VALUES
	(1, 1864645, 'CC', '1001997815', 'JOVANIS JESUS', 'OLIVO OLIVERA', '3013066728', 'geovanyolivo@outlook.com'),
	(2, 1864645, 'CC', '1001999669', 'JOISER DE JESUS', 'ARGUELLES SANCHEZ', '3016571299', 'Zone4twenty@gmail.com'),
	(3, 1864645, 'CC', '1007910892', 'GERALDINE PAOLA', 'VARGAS GALLARDO', '3124737701', 'Vargasgeraldinepaola@gmail.com'),
	(4, 1864645, 'CC', '1041850236', 'KAREN PATRICIA', 'GIL FERNANDEZ', '3042420309', 'Isa1076@hotmail.com'),
	(5, 1864645, 'CC', '1042252099', 'DAYANA ISABEL', 'DE LOS REYES TORRES', '3003356652', 'marleth2013@hotmail.com'),
	(6, 1864645, 'CC', '1044434984', 'ANDRES FELIPE', 'GOMEZ SANCHEZ', '3186995250', 'Andres19991912@outlook.com'),
	(7, 1864645, 'CC', '1045705355', 'DEISY PAOLA', 'DIAZ MERCADO', '3016557922', 'diazmercadodeisypaola@gmail.com'),
	(8, 1864645, 'CC', '1101874366', 'ANGEL DE JESUS', 'PAJARO JULIO', '3113121733', 'angelpajaro19@hotmail.com'),
	(9, 1864645, 'CC', '1129497960', 'LEIDY JOHANA', 'JIMENEZ CARO', '3008379071', 'leidyjimenezcaro@gmail.com'),
	(10, 1864645, 'CC', '1140894506', 'MATEO ANDRES', 'ALVAREZ ABELLO', '3006232220', 'matteoalvarez@hotmail.com'),
	(11, 1864645, 'CC', '1140902193', 'JOHN ARMANDO', 'GRANDETT RUEDA', '3046256376', 'alelin7794@gmail.com'),
	(12, 1864645, 'CC', '1143461355', 'SEBASTIAN DE JESUS', 'PADILLA VILLARREAL', '3182657558', 'Sebbaspadv03@gmail.com'),
	(13, 1864645, 'CC', '1193437517', 'FRANCISCO ANTONIO', 'REYES VEGA', '3138157', 'ReyesVega1406@hotmail.com'),
	(14, 1864645, 'TI', '1001872282', 'DAIRYS MARIA', 'FLOREZ RICAURTE', '3002869452', 'dairysflorez552@gmail.com'),
	(15, 1864645, 'TI', '1001875667', 'JOSE MARIO', 'AVILA RODRIGUEZ', '', 'josemarioavilarodriguez26@gmail.com'),
	(16, 1864645, 'TI', '1001879928', 'DINA LUZ', 'DIAZ BARROSO', '3013731343', 'dinadiaz21@hotmail.com'),
	(17, 1864645, 'TI', '1001887116', 'LEYDIS CAROLINA', 'RADA POLO', '', 'LEIDYS0422@GMAIL.COM'),
	(18, 1864645, 'TI', '1002011866', 'CRISTIAN ANDRES', 'MOLINA DE LA HOZ', '3145910582', 'camolinad@misena.edu.com'),
	(19, 1864645, 'TI', '1002027421', 'MARIA ELENA', 'RANGEL JULIO', '3002389086', 'mariahelenarangeljulio@gmail.com'),
	(20, 1864645, 'TI', '1002027933', 'JUAN DAVID', 'MORAN AGUDELO', '3046113073', 'eliagudelo2013@hotmail.com'),
	(21, 1864645, 'TI', '1002031073', 'KEWIN ALBERTO', 'GOMEZ CABRERA', '3004838440', 'kewingomez02@gmail.com'),
	(22, 1864645, 'TI', '1002154775', 'TOBIAS JOSE', 'MU?OZ MADRID', '3017383408', 'eliagudelo2013@hotmail.com'),
	(23, 1864645, 'TI', '1002209942', 'DIEGO ANDRES', 'DOMINGUEZ RODRIGUEZ', '3001212122', 'dominguezdiegojr@gmail.com'),
	(24, 1864645, 'TI', '1002210962', 'CARLOS JUNIOR', 'CASTRO DE LA CRUZ', '3004386335', 'cjunior-05@hotmail.com'),
	(25, 1864645, 'TI', '1002234387', 'BRENDA HAYLEEN', 'CANTILLO GOMEZ', '3005942999', 'cantillogomezb@gmail.com'),
	(26, 1864645, 'TI', '1002307167', 'SHERINNA DEL CARMEN', 'CUENTAS VEGA', '3127433155', 'scuentas_2002@outlook.es'),
	(27, 1864645, 'TI', '1002496170', 'YEISON DE JESUS', 'CARCAMO MORALES', '3007862446', 'ycm871@gmail.com'),
	(28, 1864645, 'TI', '1007920726', 'CAMILO ANDRES', 'GOES HERNANDEZ', '', 'goezcamilo16@gmail.com'),
	(29, 1864645, 'TI', '1007963883', 'KAYLA SAYURIS', 'PADILLA ROMERO', '3194225057', 'padillakeyla016@gmail.com'),
	(30, 1864645, 'TI', '1044620890', 'ELIAN JOSE', 'BERMUDEZ VILLA', '3014518018', 'elian10bermudez@gmail.com'),
	(31, 1864645, 'TI', '1047036299', 'JOSE ALEJANDRO', 'BARRAZA CABRERA', '3004045226', 'josebarraza1213@hotmail.com'),
	(32, 1864645, 'TI', '1193523988', 'MARIANA ANDREA', 'MAESTRE GUTIERREZ', '3013725510', 'marianamaestre31@gmail.com'),
	(33, 1864648, 'CC', '1001823194', 'ROGER ANIER', 'CASTILLO OSORIO', '3007586732', 'Roger.castillo1027@hotmail.com'),
	(34, 1864648, 'CC', '1001876988', 'ELOY DAVID', 'RAMIREZ DIAZ', '3002015419', 'ramirezeloy504@gmail.com'),
	(35, 1864648, 'CC', '1001912781', 'ALVARO DANIEL', 'VENERA MARTINEZ', '3002272389', 'alvaro_13daniel@hotmail.com'),
	(36, 1864648, 'CC', '1002012836', 'ELYMEY PAOLA', 'PEREZ GUTIERREZ', '3004519090', 'leccyjohanna@hotmail.com'),
	(37, 1864648, 'CC', '1002022508', 'MICHAEL SNAYDER', 'MEZA ARROYO', '3145550299', 'maicol0525@outlook.es'),
	(38, 1864648, 'CC', '1002489898', 'EDER JOSE', 'GUERRA ARRIETA', '3012564011', 'ederg823@gmail.com'),
	(39, 1864648, 'CC', '1004348986', 'RIVALDO', 'CASTRO PINTO', '3003193925', 'rivalditho27@gmail.com'),
	(40, 1864648, 'CC', '1007117334', 'ALEXANDRA PAOLA', 'DE LA HOZ SANCHEZ', '3042125710', 'alexadelahoz16@gmail.com'),
	(41, 1864648, 'CC', '1007122327', 'SERGIO', 'RODRIGUEZ ESCORCIA', '3002330444', 'sergiorodriguez0828@gmail.com'),
	(42, 1864648, 'CC', '1043116538', 'MARINEY', 'CONTRERAS BOHORQUEZ', '3002132543', 'Marineycontreras13@gmail.com'),
	(43, 1864648, 'CC', '1047236872', 'MULLER ADAILTON', 'GUTIERREZ CIFUENTES', '3016815009', 'miuler-s-t@hotmail.com'),
	(44, 1864648, 'CC', '1048323396', 'JOCELLI ESTHER', 'VILLARREAL RODRIGUEZ', '3046445517', 'jocelliv077@gmail.com'),
	(45, 1864648, 'CC', '1067884409', 'STEFANY JOHANNA', 'DIAZ ROQUEMES', '', 'ginger201034@hotmail.com'),
	(46, 1864648, 'CC', '1143458509', 'ROBERTO JUNIOR', 'OLMOS RETAMOZO', '3017312658', 'robertojuniorolmos@hotmail.com'),
	(47, 1864648, 'CC', '1193235659', 'ANDRES FELIPE', 'GAMARRA ROBLES', '3046777670', 'gamarraroblesandres@gmail.com'),
	(48, 1864648, 'CC', '1193548201', 'DIANIS MAYIRIS', 'CASTRO DE LA CRUZ', '3005056935', 'dianiscastrodelacruz@gmail.com'),
	(49, 1864648, 'CC', '1193550946', 'CAMILO ANDRES', 'HIDALGO REYES', '3137136438', 'Camihidalgo@gmail.com'),
	(50, 1864648, 'CC', '22742801', 'BETY LUZ', 'BARRAGAN VERGARA', '', 'bettyluz1983@gmail.com'),
	(51, 1864648, 'TI', '1001822765', 'JUAN DAVID', 'RAMOS MARTINEZ', '3146326313', 'juanramos.01@outlook.com'),
	(52, 1864648, 'TI', '1001856800', 'OSMAN JUNIOR', 'SALAZAR SANTIAGO', '3003670380', 'osmansalazar1008@gmail.com'),
	(53, 1864648, 'TI', '1001882841', 'YOGETH LINETH', 'NAVIA RUIZ', '3012711187', 'yogethnavia2001@gmail.com'),
	(54, 1864648, 'TI', '1002013639', 'JORDAN ESTEBAN', 'PEREZ GUTIERREZ', '3007579848', 'leccyjohanna@hotmail.com'),
	(55, 1864648, 'TI', '1002072481', 'JESUS DAVID', 'GONZALES TORREGOZA', '3012068056', 'tatagonzalez1994@gmail.com'),
	(56, 1864648, 'TI', '1002236758', 'DINA LUZ', 'DURAN MU?OZ', '3013214320', 'dinaduran2000@gmail.com'),
	(57, 1864648, 'TI', '1004321857', 'NAYELIS MILENA', 'SERRANO SALCEDO', '3002203838', 'nayelismilena2001@gmail.com'),
	(58, 1864648, 'TI', '1004487544', 'ALBEIRO JOSE', 'TORRES JIMENEZ', '3009874562', 'albeirotorresj2000@gmail.com'),
	(59, 1864648, 'TI', '1007118577', 'SHARON STEFANNY', 'ARIZA MARQUEZ', '3004251477', 'Sharonarizamarquez2001@gmail.com'),
	(60, 1864648, 'TI', '1007123138', 'ARIEL JOSE', 'SIADO ORTEGA', '3117179234', 'siadoa002@gmail.com'),
	(61, 1864648, 'TI', '1007278662', 'LORENA ENITH', 'CHACON MENDOZA', '3004179686', 'loresnith.18@gmail.com'),
	(62, 1864648, 'TI', '1007963867', 'CARLOS ANDRES', 'MEDINA MENDOZA', '3014337115', 'medinacarlosandres35@gmail.com'),
	(63, 1864648, 'TI', '1043119402', 'SHIRLY JOHANNA', 'BELE?O BOOM', '3135527951', 'sinai12369@gmail.com'),
	(64, 1864648, 'TI', '1129496306', 'JESUS DAVID', 'OSORIO HOYOS', '3128370361', 'Jesusosoriohoyos13@gmail.com'),
	(65, 1864648, 'TI', '1192802752', 'EDILBERTO', 'BALZA JIMENEZ', '3017669596', 'edilbertobalza95@gmail.com'),
	(66, 1864649, 'CC', '1001817904', 'VALENTINA', 'JIMENEZ TOVAR', '3217457571', 'tinajimeneztovar@gmail.com'),
	(67, 1864649, 'CC', '1001820874', 'ELIAS DAVID', 'CHARRIS RAMOS', '3016268350', 'eliascharris@yahoo.es'),
	(68, 1864649, 'CC', '1001872906', 'YANINA MILAGROS', 'BARCELO BOVEA', '3002904157', 'ymbarcelob@gmail.com'),
	(69, 1864649, 'CC', '1001878906', 'JEISIY PAOLA', 'RIVERA POLO', '3006135074', 'jeisirivera21@gmail.com'),
	(70, 1864649, 'CC', '1001911842', 'ALDEMAR ENRIQUE', 'DE LA CRUZ JIMENEZ', '', 'jimenezalde25@gmail.com'),
	(71, 1864649, 'CC', '1002490254', 'YINETH PAOLA', 'VEGA DURAN', '3205619593', 'yinethvegaduran05@gmail.com'),
	(72, 1864649, 'CC', '1003591413', 'ANGELICA MARCELA', 'POLO REYES', '3007470683', 'Angelik.1128@hotmail.com'),
	(73, 1864649, 'CC', '1007117140', 'GELLEN GEOVANA', 'GUTIERREZ VILLAMIL', '3017130502', 'gellengeovana07@gmail.com'),
	(74, 1864649, 'CC', '1007368239', 'ANGELA ISABEL', 'VILLAR VIZCAINO', '36360949', 'garciasheila293@gmail.com'),
	(75, 1864649, 'CC', '1042355971', 'MICHELL', 'OSORIO CANTILLO', '3046210392', 'michell.oc4@gmail.com'),
	(76, 1864649, 'CC', '1042428267', 'DANIELA PATRICIA', 'VARGAS PALMA', '3016096781', 'danielapatyvargas89@gmail.com'),
	(77, 1864649, 'CC', '1042438163', 'DAVID JOELL', 'BORJAS JIMENEZ', '3046666486', 'dborjapilla@gmail.com'),
	(78, 1864649, 'CC', '1045752448', 'ROSALBA DEL CARMEN', 'PEREZ REYES', '3117039234', 'rossyreyes18@hotmail.com'),
	(79, 1864649, 'CC', '1048064933', 'MARIA JOSE', 'VIZCAINO SOLANO', '3004829842', 'grouplaboralrydsas@outlook.es'),
	(80, 1864649, 'CC', '1055333583', 'DENYLSON', 'MU?OZ ALTAMAR', '3015250194', 'dmunozaltamar@gmail.com'),
	(81, 1864649, 'CC', '1079659596', 'GISELL LORENA', 'MEJIA ORTEGA', '3006182353', 'gisell0513@hotmail.com'),
	(82, 1864649, 'CC', '1090452855', 'MARIA LAURA', 'NAVAS ZU?IGA', '', 'mlaura_navas@hotmail.com'),
	(83, 1864649, 'CC', '1127582191', 'LAUDY DEL CARMEN', 'BARACSNEGRAS ORTIZ', '3216318634', 'laudith1213@hotmail.com'),
	(84, 1864649, 'CC', '1129543114', 'KARINA ISABEL', 'ORDO?EZ OSORIO', '3016875488', 'karinaosorio4@gmail.com'),
	(85, 1864649, 'CC', '1140863421', 'KEVIN ALBERTO', 'MONTERROSA ALBOR', '3006792229', 'kmonterrosa0929@gmail.com'),
	(86, 1864649, 'CC', '1143158124', 'MARIO ANDRES', 'MESINO GOMEZ', '3006679080', 'keila-yohana@hotmail.com'),
	(87, 1864649, 'CC', '1143260044', 'GREISSY LORENA', 'MOLINA BOLA?O', '3016133078', 'greissy-9@hotmail.com'),
	(88, 1864649, 'CC', '1143452707', 'KEVIN ANTONIO', 'BELE?O MU?OZ', '3002172048', 'kevinbeleno28@gmail.com'),
	(89, 1864649, 'CC', '1143466713', 'DEYANIRA', 'GUERRERO BLANCO', '57300628069', 'lologuebla@gmail.com'),
	(90, 1864649, 'CC', '1234093082', 'LIZETH PAOLA', 'CABALLERO ALVAREZ', '3158724444', 'lizethcaballeroo@gmail.com'),
	(91, 1864649, 'CC', '1234094958', 'JULISSA NOELY', 'BOLA?O CASSIANI', '3008881274', 'julissanoely2004@outlook.com'),
	(92, 1864649, 'CC', '8486287', 'HANS ENRIQUE', 'VARGAS COLINA', '3004170630', 'hanchy08343@gmail.com'),
	(93, 1864649, 'TI', '1001821086', 'JULIAN EDUARDO', 'BOLA?O MIELES', '3007947779', 'julianbmieles@gmail.com'),
	(94, 1864649, 'TI', '1001855778', 'JESUS DANIEL', 'RUIZ OROZCO', '3003211090', 'jesusdanielruizorozco5@gmail.com'),
	(95, 1864649, 'TI', '1001884478', 'DILAN JOSEP', 'CABRERA ESCORCIA', '3005352346', 'dilancabrera607@gmail.com'),
	(96, 1864649, 'TI', '1002158787', 'MARIA ALICIA', 'FONTALVO CABARCAS', '3014457645', 'mariafon801@gmail.com'),
	(97, 1864649, 'TI', '1002208356', 'CAMILA ANDREA', 'GUTIERREZ VEGA', '3002198846', 'camigutierrezvega13@gmail.com'),
	(98, 1864649, 'TI', '1002208362', 'SHEILA MICHELLE', 'GARCIA DE LEON', '3005874563', 'Garciasheila293@gmail.com'),
	(99, 1864649, 'TI', '1002234210', 'HERNANDO', 'BERMUDEZ CHARRIS', '3006548500', 'hernandodavibermudez@gmail.com'),
	(100, 1864652, 'CC', '1001884206', 'ALEXANDER DAVID', 'DIAZ VILLA', '3014678796', 'alexanderdaviddiazvilla@hotmail.com'),
	(101, 1864652, 'CC', '1002022362', 'BRIGIT YORELIS', 'VILLA MEDINA', '', 'brillith1992yorelis@hotmail.com'),
	(102, 1864652, 'CC', '1002423502', 'ELSA', 'MEJIA HOYOS', '3043268041', 'elsamejia1108@hotmail.com'),
	(103, 1864652, 'CC', '1002439848', 'OLGA MARIA', 'MONTA?O MARIN', '3145259430', 'olgamaria_1999@hotmail.com'),
	(104, 1864652, 'CC', '1002497233', 'STEFANY', 'BALDOVINO RAMIREZ', '3005459342', 'stefys.baldovino@gmail.com'),
	(105, 1864652, 'CC', '1007052755', 'YOJANA PAOLA', 'RAMOS GUTIERREZ', '3046096040', 'yohanapaolaramos@hotmail.com'),
	(106, 1864652, 'CC', '1042450103', 'NERIS YOHANNA', 'LINAN CASTILLO', '', 'nerys-21@hotmail.com'),
	(107, 1864652, 'CC', '1045697911', 'SILVANA PAOLA', 'CAMPO GUZMAN', '', 'silvanacampoguzman05@gmail.com'),
	(108, 1864652, 'CC', '1045717492', 'LUISA FERNANDA', 'TORRES PION', '', 'luisafer2720@gmail.com'),
	(109, 1864652, 'CC', '1047215648', 'KATY MILENA', 'RIVERA RUIZ', '', 'milenariv21@live.com'),
	(110, 1864652, 'CC', '1047338830', 'YOLIMA ROSA', 'MURIEL DOMINGUEZ', '3005741158', 'yoliros20@hotmail.com'),
	(111, 1864652, 'CC', '1048207973', 'SANDRA MARCELA', 'LLANOS GOMEZ', '', 'Sandrallanosgomez@hotmail.com'),
	(112, 1864652, 'CC', '1052053438', 'RITA INES', 'SORACA MARMOL', '', 'Ritasoracamarmol@gmail.com'),
	(113, 1864652, 'CC', '1067950736', 'HABYD MOISES', 'SABAGH MADY', '3013353125', 'sabaghmady@gmail.com'),
	(114, 1864652, 'CC', '1070982952', 'ANDRES MAURICIO', 'PEREIRA MALDONADO', '3024582351', 'andupte@gmail.com'),
	(115, 1864652, 'CC', '1079886705', 'MARIA JOSE', 'SANTANA SANTANA', '3015897956', 'majosasa08@hotmail.com'),
	(116, 1864652, 'CC', '1082064006', 'HERNAN YESID', 'ALMANZA GUZMAN', '3015083225', 'hernanalmanza05@gmail.com'),
	(117, 1864652, 'CC', '1085103570', 'ALEXANDER', 'VILLARRUEL DIAZ', '3012340637', 'alexantonio258@hotmail.com'),
	(118, 1864652, 'CC', '1129512745', 'MILER AUGUSTO', 'BERRIO RESTREPO', '3024131930', 'millerberrio0@gmail.com'),
	(119, 1864652, 'CC', '1140865145', 'DEIMER ALBERTO', 'MEJIA CASTILLO', '3170357', 'deymejiacastillo@hotmail.com'),
	(120, 1864652, 'CC', '1140884387', 'LUIS ENRIQUE', 'BALLESTAS GONZALEZ', '3193483197', 'luisballestas27@gmail.com'),
	(121, 1864652, 'CC', '1143167621', 'CARLOS DANIEL', 'VEGA FONTALVO', '3017771097', 'vefoca1208@gmail.com'),
	(122, 1864652, 'CC', '1143168202', 'JESUS DAVID', 'MOLINA ARIZA', '3106108959', 'Jesusdmolina26@gmail.com'),
	(123, 1864652, 'CC', '1143236136', 'KATHERINE ISABEL', 'SANCHEZ MARTINEZ', '3006374746', 'karol_0422@live.com'),
	(124, 1864652, 'CC', '1143424685', 'ANDY LUIS', 'GUTIERREZ PUGLIESE', '', 'andyluis1225@outlook.com'),
	(125, 1864652, 'CC', '22548061', 'IBETH DIRLEY', 'REINA RODRIGUEZ', '3226988915', 'lindapaolapallaresreina@hotmail.com'),
	(126, 1864652, 'CC', '72346749', 'ELKIN FERNANDO', 'OSPINO CADENA', '3005333920', 'eospino85@gmail.com'),
	(127, 1864652, 'TI', '1001885965', 'DAYANA PAOLA', 'RUIZ NEGRETE', '3003216619', 'vefoca1208@gmail.com'),
	(128, 1864652, 'TI', '1001940235', 'JESUS DAVID', 'MENDOZA GONZALEZ', '3145595094', 'nahya0413@gmail.com'),
	(129, 1864652, 'TI', '1001941788', 'NICOLLE ANDREA', 'BALSA MEZA', '3217322623', 'nicollebalsa@hotmail.com'),
	(130, 1864652, 'TI', '1002035987', 'ZINNIA CAROLINA', 'PAJARO TORRES', '3205904398', 'carolinatorrez0313@gmail.com'),
	(131, 1864652, 'TI', '1007890125', 'JOSELYNN', 'ARRIETA CANCINO', '3003216619', 'joselynnca951@gmail.com'),
	(132, 1864652, 'TI', '1193211017', 'WILBERTO JUNIOR', 'SALAS ARAGON', '3017247176', 'salaswilberto03@gmail.com'),
	(133, 1864673, 'CC', '1001341474', 'CINDY YOLANDA', 'SARMIENTO AVILA', '3116959652', 'ciindyaviila13@gmail.com'),
	(134, 1864673, 'CC', '1001851707', 'ANGEL', 'CRUZ GUEVARA', '3006056908', 'USERROAT1993@GMAIL.COM'),
	(135, 1864673, 'CC', '1001941091', 'FERNANDO RAFAEL', 'UBARNE CARO', '3864186', 'ubarnesfernando@hotmail.com'),
	(136, 1864673, 'CC', '1002153837', 'ROSA MARIA', 'MAESTRE VEGA', '', 'rosamaria21199@gmail.com'),
	(137, 1864673, 'CC', '1042449184', 'BENITO JOSE', 'SOTO FLOREZ', '3126643192', 'bj_1295@hotmail.com'),
	(138, 1864673, 'CC', '1042452443', 'KEVIN ANTONIO', 'IBARRA PACHECO', '3022464586', 'Kevinantonio2411@gmail.com'),
	(139, 1864673, 'CC', '1042460024', 'KELVIS DE JESUS', 'JIMENEZ ARAGON', '3217171584', 'kelvisjimenez640@gmail.com'),
	(140, 1864673, 'CC', '1043667574', 'ANGIE KATHERINE', 'ROBLES VASQUEZ', '3133343685', 'angieroblesvasquez@gmail.com'),
	(141, 1864673, 'CC', '1045756827', 'JOSE ANDRES', 'AVENDA?O SARABIA', '', 'josesara1997@gmail.com'),
	(142, 1864673, 'CC', '1047361734', 'LEIDER JOSE', 'CABALLERO MU?OZ', '3007193365', 'leidercaballero23@gmail.com'),
	(143, 1864673, 'CC', '1079886246', 'KARINA ISABEL', 'OBESO PAEZ', '', 'obeso.karina@hotmail.com'),
	(144, 1864673, 'CC', '1129500585', 'LISETH YOHANA', 'CARDENAS QUESADA', '3012679360', 'lcardenasquesadas@gmail.com'),
	(145, 1864673, 'CC', '1140877215', 'DIESEL JAVIER', 'GUTIERREZ BENAVIDES', '', 'diesel2395@gmail.com'),
	(146, 1864673, 'CC', '1140883492', 'MELET ANTONIO', 'CONSUEGRA HERRERA', '3014548884', 'melet.consuegra@gmail.com'),
	(147, 1864673, 'CC', '1143248702', 'ROSA ANGELICA', 'DIAZ DIAZ', '', 'erickgenesisamr@gmail.com'),
	(148, 1864673, 'CC', '1143465638', 'ANDRES FELIPE', 'DE ALBA CUETO', '3005423954', 'andresdealba98@outlook.com'),
	(149, 1864673, 'CC', '1234891966', 'LISBETH PAOLA', 'BOVEA ESPINOSA', '', 'lisbethbovea74@gmail.com'),
	(150, 1864673, 'CC', '1235247880', 'SILVANA MARIA', 'CALLE VILLA', '3108303456', 'silviaa1984@hotmail.com'),
	(151, 1864673, 'CC', '44157430', 'SILVANA PATRICIA', 'QUINTERO GARCIA', '30128580669', 'squin0921@hotmail.com'),
	(152, 1864673, 'CC', '8486039', 'RICARDO ENRIQUE', 'CALLEJAS REYES', '3046780345', 'callejasricardo350@gmail.com'),
	(153, 1864673, 'TI', '1001825195', 'ANGELA SARAY', 'SANTIAGO PACHECO', '3003860372', 'amifopa22@gmail.com'),
	(154, 1864673, 'TI', '1001873395', 'NALLELYS DE JESUS', 'VELASQUEZ GONZALEZ', '3017377354', 'nahianalle0914@gmail.com'),
	(155, 1864673, 'TI', '1001873577', 'ANGIE PAOLA', 'ALTAMAR VILLARREAL', '3046282850', 'angiealtamar02@gmail.com'),
	(156, 1864673, 'TI', '1001875005', 'FELIX ANTONIO', 'CONTRERAS CRUZ', '', 'fecontre97@gmail.com'),
	(157, 1864673, 'TI', '1001878644', 'DAMARIS MERCEDES', 'CERA TAPIA', '', 'damariscera64@hotmail.com'),
	(158, 1864673, 'TI', '1002000283', 'ANGEL DAVID', 'QUIROGA PAJARO', '3002855291', 'andaquipa79@gmail.com'),
	(159, 1864673, 'TI', '1002031591', 'BRAYAN SAID', 'DE LA CRUZ ARANGO', '3024146368', 'brayansaid26@outlook.com'),
	(160, 1864673, 'TI', '1002070767', 'DIANELIS DEL CARMEN', 'MARTINEZ HURTADO', '3164515726', 'omarmartinezparras106@gmail.com'),
	(161, 1864673, 'TI', '1002071865', 'MAYERLIS JUDITH', 'BARRERA HERNANDEZ', '3224008070', 'barrermaye@gmail.com'),
	(162, 1864673, 'TI', '1002159158', 'DIEGO ARMANDO', 'GONZALEZ ALVAREZ', '3042467116', 'dg128061@gmail.com'),
	(163, 1864673, 'TI', '1007962210', 'VALENTINA MARIA', 'MARTINEZ SARMIENTO', '3034595171', 'vms0917@gmail.com'),
	(164, 1864673, 'TI', '1042852929', 'ANDREA CECILIA', 'VALDES SERRANO', '3004410204', 'andreacvs29@gmail.com'),
	(165, 1864673, 'TI', '1043664760', 'CAMILO ANDRES', 'MARTINEZ REYES', '3005300243', 'martinezreyescamiloandres3@gmail.com'),
	(166, 1864688, 'CC', '1001779965', 'JESUS GABRIEL', 'NARVAEZ FLOREZ', '3215854835', 'lcoli56@hotmail.com'),
	(167, 1864688, 'CC', '1001886877', 'EUSEBIO FRANCISCO', 'TELLEZ TAPIA', '3105266902', 'juniortellezt@gmail.com'),
	(168, 1864688, 'CC', '1001911431', 'MIRLEIDIS JUDITH', 'ALTAMAR FAILLACE', '3184066115', 'madeleidis25@hotmail.com'),
	(169, 1864688, 'CC', '1001939018', 'EVA MARIA', 'PALOMINO NARVAEZ', '3226406961', 'Palomine808@gmail.com'),
	(170, 1864688, 'CC', '1001993628', 'DAYANA MELISA', 'RIVALDO SALAS', '3114008552', 'slasmeli56@gmail.com'),
	(171, 1864688, 'CC', '1001995115', 'ALEXANDER WILLIAM', 'VALDES GONZALEZ', '3005959214', 'av04263111644@gmail.com'),
	(172, 1864688, 'CC', '1003058819', 'ENNA LUZ', 'ALDANA OJEDA', '3006204352', 'ennaluz23@gmail.com'),
	(173, 1864688, 'CC', '1010123681', 'LUIS ANGEL', 'VANEGAS OZUNA', '3106810368', 'vanegasozunal@gmail.com'),
	(174, 1864688, 'CC', '1042452773', 'ANGELO IVAN', 'PACHECO HERRERA', '', 'saamsinho.1996@gmail.com'),
	(175, 1864688, 'CC', '1043436833', 'ANDRES FELIPE', 'MERCADO GARCIA', '', 'mercadoandres334@gmail.com'),
	(176, 1864688, 'CC', '1140856516', 'JESUS ALBERTO', 'MOLA DE LA TORRE', '3029147', 'jealmoto01@outlook.com'),
	(177, 1864688, 'CC', '1143150961', 'ALDAIR DE JESUS', 'PULIDO MALDONADO', '3005498184', 'aldair-rg4l@hotmail.com'),
	(178, 1864688, 'CC', '1143169583', 'RONALD RAFAEL', 'GARCES MU?OZ', '3017102473', 'ronaldgarces2107@gmail.com'),
	(179, 1864688, 'CC', '1143270084', 'ALEJANDRO JOSE', 'GOEZ HERNANDEZ', '3008322793', 'alejandrojosegoezhernandez@gmail.com'),
	(180, 1864688, 'CC', '1143445425', 'MARITZA ISABEL', 'DAUTT MORALES', '3005389716', 'dmary-529@hotmail.com'),
	(181, 1864688, 'CC', '1192925760', 'YELITH PAOLA', 'SANTOS RUMBO', '3022620693', 'yelithsantos18@hotmail.com'),
	(182, 1864688, 'CC', '1234089181', 'JONATHAN STIVEN', 'LOPEZ CAMACHO', '3013811417', 'jjolsarz@gmail.com'),
	(183, 1864688, 'CC', '1234891368', 'LIS STEPHANY', 'BORJA RAMIREZ', '3023926051', 'lizstefanyb@gmail.com'),
	(184, 1864688, 'CC', '22518857', 'TANYA BETHSABE', 'SANCHEZ BUELVAS', '', 'tanyasanchezb@gmail.com'),
	(185, 1864688, 'CC', '30898121', 'MILAGRO ESTHER', 'BELTRAN OSPINO', '', 'milagros302019@outlook.com'),
	(186, 1864688, 'CC', '32607642', 'MARIA EUGENIA', 'RANGEL BOSSIO', '', 'bossomariarangel@gmail.com'),
	(187, 1864688, 'TI', '1001877187', 'DAYANA CAROLINA', 'MU?OZ ALVARADO', '3205049835', 'dayanam.2022@gmail.com'),
	(188, 1864688, 'TI', '1001911413', 'SAMIR JESUS', 'BANQUET BARRIOS', '3008935061', 'samirbanquet11@gmail.com'),
	(189, 1864688, 'TI', '1001940150', 'JESUS DAVID', 'TROCHA GUTIERREZ', '', 'jesustrocha84@gmail.com'),
	(190, 1864688, 'TI', '1001942540', 'JENNIFER DEL CARMEN', 'GALLARDO PADILLA', '3024262698', 'jennifergallardo953@gmail.com'),
	(191, 1864688, 'TI', '1001996580', 'DEIMER SEBASTIAN', 'NAVARRO MORALES', '3002595591', 'Deimernavarro1238@gmail.com'),
	(192, 1864688, 'TI', '1001999841', 'JOSTYN ALBERTO', 'CABRERA GALE', '', 'josjostyn05@gmail.com'),
	(193, 1864688, 'TI', '1002030287', 'SHEIDYS ALEXANDRA', 'DURAN BLANCO', '3045706195', 'sheidys.19@hotmail.com'),
	(194, 1864688, 'TI', '1002094750', 'ARACELLY SOFIA', 'TORREGROZA RUIZ', '3006199327', 'sofiaruiz2503@gmail.com'),
	(195, 1864694, 'CC', '1001877660', 'RUTH ESTHER', 'HERNANDEZ CALDERON', '3022435034', 'ruthernandezcalderon@gmail.com'),
	(196, 1864694, 'CC', '1002161743', 'KEVIN', 'REALES NOGUERA', '3042004752', 'reales974@gmail.com'),
	(197, 1864694, 'CC', '1002233289', 'FREYDE SEBASTIAN', 'SERGE BAUZA', '3001234567', 'pumarejoarticulacion@gmail.com'),
	(198, 1864694, 'CC', '1010086248', 'TATIANA YULIETH', 'DE LA CRUZ CASTRO', '3116030909', 'tatiiz1214@hotmail.com'),
	(199, 1864694, 'CC', '1042441827', 'ADA LUZ', 'GALAN CERVANTES', '', 'adaluzgalancervantes@gmail.com'),
	(200, 1864694, 'CC', '1042443954', 'STEFANNY PAOLA', 'SEGURA CELIN', '3135732529', 'stefannypaolaseguracelin@gmail.com'),
	(201, 1864694, 'CC', '1042452617', 'KATTY MILENA', 'GUTIERREZ SEGURA', '3006805750', 'kattygutierrez1996@hotmail.com'),
	(202, 1864694, 'CC', '1044426743', 'EDWIN JOSE', 'LUNA GALVIS', '', 'edwinlunagalvis123@hotmail.com'),
	(203, 1864694, 'CC', '1044433953', 'HAVID ANDRES', 'URQUIJO DIAZ', '3012237233', 'hvd.uqj@gmail.com'),
	(204, 1864694, 'CC', '1045681533', 'SANDRA MARCELA', 'BELTRAN JIMENEZ', '', 'sandrabeltran845@gmail.com'),
	(205, 1864694, 'CC', '1129504364', 'ANDREA CAROLINA', 'SALAS RIVERA', '3006180655', 'andreasalasrivera6@gmail.com'),
	(206, 1864694, 'CC', '1140857909', 'JAIME ABRAHAM', 'VARGAS O?ORO', '', 'jvo_93@hotmail.com'),
	(207, 1864694, 'CC', '1143258801', 'KEVIS', 'GUTIERREZ CASTRO', '3126094572', 'kevin04castro@hotmail.com'),
	(208, 1864694, 'CC', '1143460135', 'CRISTOPHER JESUS', 'ATENCIA VENEGAS', '3106141499', 'atenciavenegas@gmail.com'),
	(209, 1864694, 'CC', '1151450055', 'DOADIS VICTORIA', 'VISBAL CASTRO', '3145789078', 'josake2715@hotmail.com'),
	(210, 1864694, 'CC', '1193377315', 'RONALD DAVID', 'PINTO DIAZ', '3007260923', 'davidpintodiaz81@gmail.com'),
	(211, 1864694, 'CC', '1234088607', 'THALIA SELENA', 'SUAREZ DE HOYOS', '3045335179', 'alejandraamador332@gmail.com'),
	(212, 1864694, 'CC', '1234888914', 'LUZ VANY', 'ZABALETA SEGURA', '3002271695', 'luzvani2018@hotmail.com'),
	(213, 1864694, 'CC', '16934641', 'VICTOR HUGO', 'MAFLA QUINTERO', '', 'vhmaflacali@gmail.com'),
	(214, 1864694, 'CC', '32891086', 'ISIS OSIRIS', 'DIAZ TOLEDO', '3142153454', 'Osirisdiaztoledo@gmail.com'),
	(215, 1864694, 'CC', '33355001', 'MARIA ISABEL', 'ANAYA GUERRERO', '', 'mariaisabelanayaguerrero@outlook.es'),
	(216, 1864694, 'TI', '1001881113', 'MAYERLIS DEL CARMEN', 'GALAN MEJIA', '3002845702', 'galanm126@gmail.com'),
	(217, 1864694, 'TI', '1002028580', 'VALENTINA', 'RODRIGUEZ LARA', '3008909966', 'valentinarodriguezlara29@gmail.com'),
	(218, 1864694, 'TI', '1002235160', 'WALDIR JOSE', 'CHARRIS ALVAREZ', '3008212019', 'charriswaldir2001@gmail.com'),
	(219, 1864694, 'TI', '1006572054', 'YAIR CALEB', 'OVIEDO ROLONG', '', 'yairc2200@gmail.com'),
	(220, 1864694, 'TI', '1007963890', 'KENEILYS', 'HERRERA MARTINEZ', '3145141412', 'herrerakeneilys@gmail.com'),
	(221, 1864694, 'TI', '1043140595', 'ANGIE MARCELA', 'SALAS MENDEZ', '3045293436', 'angiesalas05@hotmail.com'),
	(222, 1864694, 'TI', '1193411260', 'ENYORLIS PATRICIA', 'MORENO FLOREZ', '3004898135', 'morenoenyorlis@gmail.com'),
	(223, 1864694, 'TI', '98062067276', 'MARIA JOSE', 'MENDOZA SUAREZ', '', 'mariajosemendozasuarez3@gmail.com'),
	(224, 1864698, 'CC', '1001942006', 'SELENA MARIA', 'CANTILLO VELASQUEZ', '3043846290', 'selenamariacantillo@hotmail.com'),
	(225, 1864698, 'CC', '1001945264', 'RICHARD DE JESUS', 'VILLALOBOS AGUIRRE', '3022811162', 'richaraguirre4080@gmail.com'),
	(226, 1864698, 'CC', '1002153410', 'JAVIER ANDRES', 'GOMEZ MONTENEGRO', '3205111783', 'javieragomezmgro@outlook.com'),
	(227, 1864698, 'CC', '1002234218', 'ZHARICK ALEJANDRA', 'BOLA?O BULA', '', 'zharickbula@gmail.com'),
	(228, 1864698, 'CC', '1002409626', 'YAIDRIS DEL CARMEN', 'JIMENEZ MARTINEZ', '3046232958', 'Yaii1903jimenez@gmail.com'),
	(229, 1864698, 'CC', '1005581717', 'LEDER ADOLFO', 'ACOSTA BERMEJO', '3024683198', 'acostaleder95@gmail.com'),
	(230, 1864698, 'CC', '1010137262', 'ERIKA PAOLA', 'PORRAS GUTIERREZ', '3004375327', 'erikadmzls@gmail.com'),
	(231, 1864698, 'CC', '1010146049', 'BRENDA MARIA', 'ALVAREZ GOMEZ', '', 'gomezbrenda904@gmail.com'),
	(232, 1864698, 'CC', '1014267666', 'GERALDINE ANDREA', 'PEREIRA MALDONADO', '3022604220', 'geraldinepereira945@gmail.com'),
	(233, 1864698, 'CC', '1043131701', 'JAN CARLOS', 'ALVARADO GARCIA', '3004113062', 'JAN.ALVARADOGARCIA@GMAIL.COM'),
	(234, 1864698, 'CC', '1045736297', 'MARIA EUGENIA', 'RODRIGUEZ JIMENEZ', '', 'rodriguez-jimenez@outlook.es'),
	(235, 1864698, 'CC', '1046272073', 'CRISTIAN ELIAS', 'SANZ RUIZ', '3003007779', 'gekian-17@hotmail.com'),
	(236, 1864698, 'CC', '1047055856', 'MARIA JOSE', 'RIVERA BARCELO', '3022964255', 'mariajoseriverabarcelo10@hotmail.com'),
	(237, 1864698, 'CC', '1140875617', 'SILVIA ROSA', 'POLO MENDOZA', '3008510045', 'silviapolo95@hotmail.com'),
	(238, 1864698, 'CC', '1140878769', 'ZEILY PAOLA', 'PEREZ POLO', '3045538508', 'keily_perez05@hotmail.com'),
	(239, 1864698, 'CC', '1143138130', 'NASTENKA PATRICIA', 'MARTINEZ CARVAJAL', '3178070145', 'gennaro.dasama@hotmail.com'),
	(240, 1864698, 'CC', '1143237939', 'KARLA SOFIA', 'VERA SALAS', '3004029290', 'sofia120826@gmail.com'),
	(241, 1864698, 'CC', '1143264257', 'LILIBETH', 'BLANCO SANJUAN', '3006220492', 'lilibeth_lapupi@hotmail.com'),
	(242, 1864698, 'CC', '1233507291', 'KARINA PAOLA', 'BOLIVAR SANTIAGO', '3007717252', 'Karinasantiagobolivar@gmail.com'),
	(243, 1864698, 'CC', '1234892460', 'CARLOS ARTURO', 'CARCAMO RAMIREZ', '3013688038', 'carcamo12-carlos@hotmail.com'),
	(244, 1864698, 'CC', '55228529', 'YINA ALBERTINA', 'PEREZ RODELO', '3990697', 'marlon_luquez26@hotmail.com'),
	(245, 1864698, 'CC', '1140908224', 'CARLOS ANDRES', 'PATI?O JIMENEZ', '3002706527', 'Jimenezcarlos1030@gmail.com'),
	(246, 1864698, 'TI', '1001778560', 'GERALDINE VANESSA', 'ARRIETA MONTES', '3008552295', 'geraldinarrieta09@outlook.com'),
	(247, 1864698, 'TI', '1001996665', 'ZULEIMYS', 'FIGUEROA PEREZ', '3016887932', 'zfigueroa2411@gmail.com'),
	(248, 1864698, 'TI', '1002030224', 'DANIELA LUCIA', 'VASQUEZ VIZCAINO', '3012555339', 'danielavasquez571@gmail.com'),
	(249, 1864698, 'TI', '1002035237', 'CARLOS ANDRE', 'ROMO ARDILA', '3218096844', 'Carlosromoardila@gmail.com'),
	(250, 1864698, 'TI', '1002132410', 'VICTOR HUGO', 'YEPES BUELVAS', '', 'victorhyepes26@gmail.com'),
	(251, 1864698, 'TI', '1003197080', 'GISELA PAOLA', 'DE HORTA DE LA VEGA', '3122610134', 'gisepa12@hotmail.com'),
	(252, 1864698, 'TI', '1004092367', 'DILANIA', 'MATIU ESCALANTE', '3017778692', 'dilaniaunimag@gmail.com'),
	(253, 1864698, 'TI', '1007278210', 'NATALIA CAROLINA', 'SILVERA SANCHEZ', '3046481972', 'natysilvera02@gmail.com'),
	(254, 1864698, 'TI', '1043124804', 'ADRIANA CRISTINA', 'RAMIREZ BERRIO', '3024241075', 'adrianaramirezberrio@hotmail.com'),
	(255, 1864698, 'TI', '1052068415', 'STEISIS MARIA', 'TEHERAN BENITEZ', '3106816886', 'esteisy.la.mejor@hotmail.com'),
	(256, 1864699, 'CC', '1001779347', 'LIZLEYDY', 'HENRY HERNANDEZ', '3016132007', 'lizhenrryhernandez@gmail.com'),
	(257, 1864699, 'CC', '1002209383', 'BETSY LILIANA', 'OTALORA AHUMADA', '', 'betziinarvaez01@gmail.com'),
	(258, 1864699, 'CC', '1002212923', 'LUZ MARIA', 'CONRADO ACOSTA', '3003231028', 'lusiconrado@gmail.com'),
	(259, 1864699, 'CC', '1045715931', 'ANA CECILIA', 'CARLEO NAVARRO', '', 'anitabiologistheart.2014@gmail.com'),
	(260, 1864699, 'CC', '1046346290', 'LUIS ENRIQUE', 'IRIARTE ESCORCIA', '3017704267', 'luisiriarte297@gmail.com'),
	(261, 1864699, 'CC', '1046402570', 'CANDELARIA', 'POLANCO ACU?A', '3006058007', 'cpolancoacua0@gmail.com'),
	(262, 1864699, 'CC', '1046404201', 'KEILA DEL CARMEN', 'MONTA?A ROJAS', '3467318', 'keilamontanarojas2@hotmail.com'),
	(263, 1864699, 'CC', '1046405045', 'DANELIS', 'ZU?IGA BARRIOS', '3207588867', 'danelis767@gmail.com'),
	(264, 1864699, 'CC', '1048320760', 'LORAINE PAOLA', 'VEGA RAMOS', '3008712624', 'LOPAVERA15@HOTMAIL.COM'),
	(265, 1864699, 'CC', '1064793688', 'DAYANA PAOLA', 'SANTOS LEMUS', '3135555490', 'daya-16092013@hotmail.com'),
	(266, 1864699, 'CC', '1073987775', 'KAREN LORENA', 'TURIZO GARCES', '', 'karenlorenaturizogarces.02@gmail.com'),
	(267, 1864699, 'CC', '1085182550', 'MARIBEL', 'FLORIAN RIVAS', '3226192602', 'mariflorian2002@gmail.com'),
	(268, 1864699, 'CC', '1102831001', 'ROSA BEATRIZ', 'VERGARA CARRASCAL', '3015730251', 'rousvergara24@gmail.com'),
	(269, 1864699, 'CC', '1130265529', 'BETSY LILIANA', 'ALVAREZ CABRERA', '', 'betsy-1000@outlook.com'),
	(270, 1864699, 'CC', '1140900223', 'ROMARIO JUNIOR', 'YEPES MEDINA', '3043584936', 'randy29infinito@gmail.com'),
	(271, 1864699, 'CC', '1143165561', 'WENDY VANESSA', 'MAYORAL CESPEDES', '3015541720', 'wendymayoral17@gmail.com'),
	(272, 1864699, 'CC', '1143268557', 'YEIFRID ALEXANDRA', 'PEREZ VERGARA', '3145858464', 'YEIFRID04@GMAIL.COM'),
	(273, 1864699, 'CC', '1143440931', 'LISETH PAOLA', 'JIMENEZ HERNANDEZ', '3014867721', 'lucero_199218@hotmail.com'),
	(274, 1864699, 'CC', '1143449970', 'MARIANA JUDITH', 'PADILLA CABALLERO', '3043416340', 'marianajudithpadillacaballero@gmail.com'),
	(275, 1864699, 'CC', '22705559', 'GINNA MILENA', 'BENAVIDES GAVIRIA', '', 'gimegaamor615@gmail.com'),
	(276, 1864699, 'CC', '55243196', 'SHIRLEY MILENA', 'REYES HERRIQUEZ', '3013580423', 'sarid2186@gmail.com'),
	(277, 1864699, 'TI', '1001854174', 'DANETH CECILIA', 'ARAUJO DE LA HOZ', '3016054491', 'danetharaujo2@gmail.com'),
	(278, 1864699, 'TI', '1001947640', 'NICOLLE', 'TOVAR VARELA', '3014650843', 'nicolletovar04@gmail.com'),
	(279, 1864699, 'TI', '1002000263', 'LUISA CAMILA', 'ULLOA NINO', '', 'luisacaulloa@gmail.com'),
	(280, 1864699, 'TI', '1002233985', 'LORAINE', 'CANTILLO GOMEZ', '3223202719', 'cantillogomezb@gmail.com'),
	(281, 1864699, 'TI', '1007173252', 'MARIOLIS ESTEPHANI', 'GIRALDO NIETO', '', 'Mariolisgiraldo2@gmail.com'),
	(282, 1864699, 'TI', '1129494461', 'STEFANIA JOHANA', 'TORRES ARAUJO', '3052282356', 'St3005159149@hotmail.com'),
	(283, 1864700, 'CC', '1001831661', 'AMALFI', 'PUELLO PATERNINA', '', 'puellopaterninaamalfi@gmail.com'),
	(284, 1864700, 'CC', '1001831662', 'DAYANA MARIA', 'PUELLO PATERNINA', '', 'damaria912@hotmail.com'),
	(285, 1864700, 'CC', '1001919976', 'CAROLINA STEFANY', 'MESINO SEGRERA', '3012059327', 'carolinastefanymesinosegrera@gmail.com'),
	(286, 1864700, 'CC', '1042444505', 'WENDY JAZMEIDI', 'VILLANUEVA PEREZ', '3016279065', 'wendyvp2019@hotmail.com'),
	(287, 1864700, 'CC', '1042447926', 'YEISON JESUS', 'PACHECO HERRERA', '', 'yeison.pacheco.h@gmail.com'),
	(288, 1864700, 'CC', '1043131325', 'BAUDILIA ROSA', 'HERNANDEZ MONTES', '3162215157', 'baudiliarosahernandez92@gmail.com'),
	(289, 1864700, 'CC', '1044428470', 'YOLEYDIS PATRICIA', 'DUNCAN ECHEVERRIA', '3022377037', 'yoleidis001@hotmail.com'),
	(290, 1864700, 'CC', '1045710387', 'MARIANA MARIA', 'NIETO GONZALEZ', '3016517777', 'mayagonzalez24@hotmail.com'),
	(291, 1864700, 'CC', '1048206992', 'MARYURIS', 'ROJAS TRUJILLO', '3009876543', 'maryurisrojas4@gmail.com'),
	(292, 1864700, 'CC', '1048213138', 'LAURA VANESA', 'TILANO ALMANZA', '3006726623', 'moreliavanet05@gmail.com'),
	(293, 1864700, 'CC', '1050549189', 'ARACELI', 'SANJUAN SERENO', '3004740778', 'karol1danone@gmail.com'),
	(294, 1864700, 'CC', '1073610296', 'ANGIE CATHERINE', 'RAMIREZ MANOSALVA', '3013568405', 'angikatheramimano12345@hotmail.com'),
	(295, 1864700, 'CC', '1127580049', 'SANDRA JOSEFINA', 'NIETO GONZALEZ', '3002195626', 'snietog16@gmail.com'),
	(296, 1864700, 'CC', '1140879102', 'LORAINE ANDREA', 'VARGAS JIMENEZ', '3116703853', 'lore95lachiki@hotmail.com'),
	(297, 1864700, 'CC', '1143130217', 'YERALDIN', 'ALMANZA TRUJILLO', '', 'geraldinalmanza_1991@hotmail.com'),
	(298, 1864700, 'CC', '1143158862', 'DANNY GABRIEL', 'ARRIETA BRAVO', '3002207571', 'daniejhg@gmail.com'),
	(299, 1864700, 'CC', '1143242504', 'ESTHER IRIS', 'BONILLA VARILLA', '3123714247', 'estheririsbonilla@gmail.com'),
	(300, 1864700, 'CC', '1143446817', 'GEOVANNY RAFAEL', 'ARGOTE MARTINEZ', '', 'martinez2424@outlook.es'),
	(301, 1864700, 'CC', '1143459803', 'LAURA VANESSA', 'MEJIA VASQUEZ', '3043952370', 'lauvane05@hotmail.com'),
	(302, 1864700, 'CC', '1143464193', 'VALERIA DEL PILAR', 'MORALES ESQUIAQUI', '3017455542', 'juankmoralesmarquez@gmail.com'),
	(303, 1864700, 'CC', '1235038083', 'BREYNYS PAOLA', 'VEGAS HERNANDEZ', '3007337438', 'mayohernandez204@gmail.com'),
	(304, 1864700, 'CC', '22737989', 'LUZ MERY', 'TOVAR CASTILLO', '3042114690', 'lumetoca041981@gmail.com'),
	(305, 1864700, 'TI', '1001779276', 'GABRIELA', 'RANGEL MOLINA', '3013971519', 'Gabrielaranmolina@gmail.com'),
	(306, 1864700, 'TI', '1001823464', 'MAYERLIS ISABEL', 'ARROYO BERRIO', '3043494059', 'salomeisabell@gmail.com'),
	(307, 1864700, 'TI', '1001881547', 'KAYLIN MILAGRO', 'VILLANUEVA PEREZ', '3004228983', 'kmvillanueva@misena.edu.co'),
	(308, 1864700, 'TI', '1002157797', 'JHON ANDER', 'OLIVEROS VARILLA', '3168874212', 'jhonanderoliveros@gmail.com'),
	(309, 1864700, 'TI', '1002210344', 'ALEJANDRA MARCELA', 'BARRAGAN AGUDELO', '3008539292', 'Marcelab.a@hotmail.com'),
	(310, 1864700, 'TI', '1007173162', 'CARLOS ARTURO', 'ORTIZ GONZALEZ', '3045426313', 'c-a-r-l-o-s26@hotmail.com'),
	(311, 1864700, 'TI', '1044637555', 'MERY LAURA', 'CARRILLO SALAS', '3007176231', 'merycarrillo03@outlook.es'),
	(312, 1864702, 'CC', '1001778056', 'YULIETH SILENA', 'OCHOA GARCIA', '3012042260', 'heryma2010@hotmail.com'),
	(313, 1864702, 'CC', '1001881174', 'GUSTAVO JUNIOR', 'LORA DEL AGUILA', '3015681218', 'GUSTAVOLORADELAGUILA20@GMAIL.COM'),
	(314, 1864702, 'CC', '1001937956', 'NESTOR', 'ARAGON PAJARO', '3002174217', 'nestoraragon62@gmail.com'),
	(315, 1864702, 'CC', '1002155698', 'CINDY MILENA', 'KUNCE BRICE?O', '3017847731', 'cindykunc@hotmail.com'),
	(316, 1864702, 'CC', '1042258858', 'HOLLYS YIRLEYS', 'ROCHA ATENCIO', '3005617880', 'CORAIMA20111@HOTMAIL.ES'),
	(317, 1864702, 'CC', '1045672219', 'ROSIRIS', 'LOPEZ MORALES', '', 'rosy_lopezmorales@hotmail.com'),
	(318, 1864702, 'CC', '1045753283', 'NESTOR JOSE', 'PUERTA LOPEZ', '3046617521', 'nestorpuerta98@hotmail.com'),
	(319, 1864702, 'CC', '1048221090', 'ANGEL MANUEL', 'MOLINA AVILA', '3024239624', 'molinaangelmanuel@gmail.com'),
	(320, 1864702, 'CC', '1048316498', 'VANESSA AMPARO', 'MARRIAGA PEREZ', '3017763911', 'vanessamarriagaperez@outlook.com'),
	(321, 1864702, 'CC', '1051656585', 'YUNARIS', 'DAVILA MORALES', '', 'yeneris20@hotmail.com'),
	(322, 1864702, 'CC', '1079657175', 'OSCAR JUNIOR', 'ANAYA SANJUAN', '3023078833', 'jr_anaya20@hotmail.com'),
	(323, 1864702, 'CC', '1081785080', 'CRISTINA EUGENIA', 'MARTINEZ RAMIREZ', '3013733107', 'dolmaram@hotmail.com'),
	(324, 1864702, 'CC', '1129487699', 'ADRIAN JOSEPH', 'DE LA ASUNCION PEREZ', '', 'adrianjoseph181115@gmail.com'),
	(325, 1864702, 'CC', '1129503292', 'DORIS PATRICIA', 'LOPEZ PEDROZO', '3175308', 'dorislopezpd@hotmail.com'),
	(326, 1864702, 'CC', '1140837576', 'KATERINE ISABEL', 'BERMEJO ROSARIO', '3004680676', 'katerk_2005@hotmail.com'),
	(327, 1864702, 'CC', '1143163841', 'JUAN JOSE', 'AMELL VALENCIA', '3801003', 'jv468582@gmail.com'),
	(328, 1864702, 'CC', '1143168829', 'LAURA VANESSA', 'PE?A ZAMBRANO', '3023068823', 'lauvanepz@hotmail.com'),
	(329, 1864702, 'CC', '1143250942', 'WENDY JULIETH', 'MEDINA IBA?EZ', '', 'ubaldomolina1213@hotmail.com'),
	(330, 1864702, 'CC', '1143252186', 'SHIRLEY', 'RAMIREZ GAVIRIA', '3017458362', 'shirleyrg@hotmail.es'),
	(331, 1864702, 'CC', '1143403370', 'GABRIELA VICTORIA', 'MADERO PESTANA', '3002855120', 'Gabymaderoarrazola@gmail.com'),
	(332, 1864702, 'CC', '1193104099', 'WENDY VANESSA', 'ESCOBAR ALTAMIRANDA', '', 'vannesaescobar2019@hotmail.com'),
	(333, 1864702, 'CC', '1193502139', 'ESTEFANIA', 'ORTEGA FERRER', '', 'estefaniaortegaferrer@gmail.com'),
	(334, 1864702, 'CC', '43147001', 'ROSELY', 'ROBLEDO ROMA?A', '', 'rosirisrobledo2019@gmail.com'),
	(335, 1864702, 'CC', '9149353', 'LARRY ALFREDO', 'TOLOSA CANTILLO', '3015051488', 'larrytolosa22@gmail.com'),
	(336, 1864702, 'TI', '1001853601', 'ANAYELIS', 'ZU?IGA PEREZ', '3003961776', 'edioverzb@hotmail.com'),
	(337, 1864702, 'TI', '1001915333', 'KLEIDYS DANIS', 'MU?OZ OROZCO', '3002547942', 'kleidys20@gmail.com'),
	(338, 1864702, 'TI', '1001943583', 'MARIBEL MARIA', 'CARRILLO CELIN', '3145410947', 'maribelmaria07@gmail.com'),
	(339, 1864702, 'TI', '1002028870', 'HAIDER YESID', 'CORONADO PEREZ', '3107078053', 'jaidercoronado26@gmail.com'),
	(340, 1864702, 'TI', '1002094148', 'YERALDIN PAOLA', 'BARRIOS COBO', '3008287415', 'gerabarrios24@gmail.com'),
	(341, 1864702, 'TI', '1002158119', 'CARLOS ANDRES', 'LLANOS CASTRO', '3003362706', 'carlosllanos286@gmail.com'),
	(342, 1864702, 'TI', '1005387868', 'ANGIE MARCELA', 'RODRIGUEZ CONTRERAS', '3008361632', 'anmaroco19@gmail.com'),
	(343, 1864702, 'TI', '1007803299', 'ESTEBAN DAVID', 'CAMA?O OCHOA', '3014792349', 'davidcdpj@hotmail.com'),
	(344, 1864702, 'TI', '1193574770', 'MAYERLIS', 'CORONELL PEREZ', '3022321831', 'mayerliscoronellp@gmail.com'),
	(345, 1864703, 'CC', '1001398048', 'MARISOL', 'GRACIANO ORREGO', '3218137781', 'marigraciano7@gmail.com'),
	(346, 1864703, 'CC', '1001871450', 'ALEXANDRIK', 'TELLEZ PADILLA', '3183371547', 'alexandriktellezpadilla@gmail.com'),
	(347, 1864703, 'CC', '1001933240', 'MARIA ISABEL', 'CASTRO ORDO?EZ', '', 'mariaisabellcastro15@gmail.com'),
	(348, 1864703, 'CC', '1002011638', 'JHON JAIRO', 'AREVALO DE LA HOZ', '3003008850', 'jhonarevalo315@gmail.com'),
	(349, 1864703, 'CC', '1002228914', 'MILETH', 'ESTRADA PEDRAZA', '3023027991', 'milethyohana14@gmail.com'),
	(350, 1864703, 'CC', '1007332971', 'WENDY PATRICIA', 'DE LA HOZ VILLALBA', '3148642326', 'MARIANOYJEINER@HOTMAIL.COM'),
	(351, 1864703, 'CC', '1010055580', 'SERGIO ANTONIO', 'RIVERA GARCIA', '3003004314', 'rivera0220.srg@gmail.com'),
	(352, 1864703, 'CC', '1042448569', 'ROIMER ANDRES', 'MONTA?O PUA', '', 'roimerandres10@gmail.com'),
	(353, 1864703, 'CC', '1043678574', 'ERIKA PATRICIA', 'SUAREZ SALCEDO', '3002289538', 'suarezsalcedoerika@gmail.com'),
	(354, 1864703, 'CC', '1045761233', 'KAROLL JULIETH', 'VASQUEZ NAVARRO', '3023089626', 'vkaroll850@gmail.com'),
	(355, 1864703, 'CC', '1048329710', 'SHIRLY MARGARITA', 'CARBAL BENAVIDES', '3215647178', 'shirlycarbalb@gmail.com'),
	(356, 1864703, 'CC', '1065129620', 'MARIANELA', 'CARRASCAL CARVAJAL', '3004774984', 'marianellablancocarrascal@gmail.com'),
	(357, 1864703, 'CC', '1140866028', 'WENDY JOHANA', 'ARAGON PADILLA', '3024091143', 'aragopadilla23@gmail.com'),
	(358, 1864703, 'CC', '1140891705', 'OSNAIDER ARLEIS', 'DIAZ ARIAS', '3107414230', 'osnaider_diaz@outlook.com'),
	(359, 1864703, 'CC', '1140901204', 'SARAY ESTHER', 'PORRAS GONZALEZ', '3004298402', 'sarayporras1@gmail.com'),
	(360, 1864703, 'CC', '1143265601', 'MARYORIS', 'PADILLA AVILA', '3042064625', 'maryuris1606@gmail.com'),
	(361, 1864703, 'CC', '1143270439', 'CAROLINA GLENDY', 'MEZA BARRIOS', '3045655218', 'glendymeza@hotmail.com'),
	(362, 1864703, 'CC', '1143462467', 'SHIRLEY INEZ', 'OSORIO MARTELO', '3013201378', 'ShirleyOM98@gmail.com'),
	(363, 1864703, 'CC', '1143468625', 'MAILYN ANDREA', 'PEREZ MADARIAGA', '3135599433', 'mailynperez07@gmail.com'),
	(364, 1864703, 'CC', '1192784824', 'JUAN SEBASTIAN', 'ACEVEDO SALGADO', '3008161286', 'juanseacevedo27@hotmail.com'),
	(365, 1864703, 'CC', '1193522350', 'JOSE', 'GARCIA ALVAREZ', '3015460867', 'garjose234@gmail.com'),
	(366, 1864703, 'TI', '1002096245', 'MARISOL', 'CABARCAS VALDES', '3113819518', 'Marisolcaba27@gmail.com'),
	(367, 1864703, 'TI', '1002491210', 'YILIANYS', 'CASTA?EDA CARCAMO', '', 'yilianys2002@gmail.com'),
	(368, 1864703, 'TI', '1004904252', 'KEYLA FABIOLA', 'RUBIO CONTRERAS', '3227919833', 'Wendy02@outlook.cl'),
	(369, 1864703, 'TI', '1005387471', 'VANESSA', 'TORRES CONTRERAS', '3014714654', 'vanessatorrescontreras776@gmail.com'),
	(370, 1864703, 'TI', '1007118569', 'LAURA VANESSA', 'POLO PEREZ', '3006614601', 'laura06polo@gmail.com'),
	(371, 1864703, 'TI', '1007132430', 'YUSEIBIS LILIANA', 'CARRANZA CABRERA', '3046840589', 'yudancing2013@hotmail.com'),
	(372, 1864707, 'CC', '1002023715', 'ANA CAROLINA', 'ORTIZ RUIZ', '3017856743', 'anaortiz291211@gmail.com'),
	(373, 1864707, 'CC', '1002035832', 'ANGELLY PAOLA', 'CHARRIS CHARRY', '3024313065', 'ricardo258097@gmail.com'),
	(374, 1864707, 'CC', '1002162433', 'YURLEN KATHERINE', 'BERRIO PINEDO', '3017675038', 'yurlenberrio08@gmail.com'),
	(375, 1864707, 'CC', '1007429287', 'YULI PAOLA', 'PARRA CASTRO', '3005646734', 'yuyiparra97@gmail.com'),
	(376, 1864707, 'CC', '1042464015', 'CINTHIA LORENA', 'MIRANDA MONTERO', '3046582305', 'cinthia.lorena1210@gmail.com'),
	(377, 1864707, 'CC', '1043449709', 'ALEXANDRA', 'VALENCIA MORENO', '3014154582', 'alexandravm107@hotmail.com'),
	(378, 1864707, 'CC', '1045675719', 'MILEIDYS VANESSA', 'ACOSTA PE?A', '', 'acostaadriana2806@gmail.com'),
	(379, 1864707, 'CC', '1047229808', 'STEPHANIE', 'NI?O DE LA HOZ', '3086509', 'stephaniecaro1531@hotmail.com'),
	(380, 1864707, 'CC', '1129541801', 'LUCIANO JUNIOR', 'JIMENEZ GALVIS', '', 'luciano.jimenez.galvis@gmail.com'),
	(381, 1864707, 'CC', '1140820382', 'JHONATAN', 'LESAMA CAMPO', '3310037', 'jhonlesama@hotmail.com'),
	(382, 1864707, 'CC', '1143147882', 'LILIBETH', 'GUARDO ROSO', '3117667877', 'lilibethg-17@hotmail.com'),
	(383, 1864707, 'CC', '1143166622', 'YULIETH ANDREA', 'CAMPO PARRA', '3145914093', 'yulieth.andrea21@gmail.com'),
	(384, 1864707, 'CC', '1143262330', 'ANRDE LUZ', 'ULLOA NI?O', '3045337141', 'andreaulloa0409@gmail.com'),
	(385, 1864707, 'CC', '1143267297', 'MARIA ELENA', 'PINEDA TORRES', '3135751851', 'mariaelenapinedatorres08@gmail.com'),
	(386, 1864707, 'CC', '1143468858', 'CELENI ANDREA', 'BULA GARCIA', '3008902584', 'celenibula@gmail.com'),
	(387, 1864707, 'CC', '1193122615', 'LIAN JOSE', 'PEREZ JIMENEZ', '3012752676', 'lianperez98@hotmail.com'),
	(388, 1864707, 'CC', '22734823', 'KAREN', 'PELUFFO RAMIREZ', '3162353164', 'kpeluffo@hotmail.com'),
	(389, 1864707, 'CC', '32720973', 'CARMEN ELENA', 'CORONADO GALVIZ', '3114307222', 'Ccoronado116@gmail.com'),
	(390, 1864707, 'CC', '32734011', 'ROCIO DE JESUS', 'CAMPO MOLA', '', 'rociocmola4@gmail.com'),
	(391, 1864707, 'CC', '32782987', 'HEIDY MARIA', 'PALENCIA ESCORCIA', '3004343956', 'hepaes04@hotmail.com'),
	(392, 1864707, 'CC', '32894106', 'YUDIS MARIA', 'VILLALBA DE LA ESPRIELLA', '', 'yudysvillalbae@gmail.com'),
	(393, 1864707, 'CC', '34948095', 'HEIDY LUZ', 'ARROYO MADERA', '', 'arroyomaderaheidy@gmail.com'),
	(394, 1864707, 'CC', '72206837', 'MAURICIO', 'SIERRA MERCADO', '3135238446', 'mauricioangelsierra@gmail.com'),
	(395, 1864707, 'CC', '8780070', 'EDER', 'GARCIA TERAN', '', 'ederinpec@gmail.com'),
	(396, 1864707, 'CC', '8799914', 'RODOLFO ANTONIO', 'CASTILLA TRUJILLO', '3003003005', 'LARAPE84@GMAIL.COM'),
	(397, 1864707, 'CC', '8799983', 'DAYSON ENRIQUE', 'MENDOZA PE?ATES', '3800244', 'mendozadayson@gmail.com'),
	(398, 1864707, 'TI', '1001892647', 'JOHANA ANDREA', 'ALVAREZ ZAPATA', '3003205057', 'malejavides16@outlook.com'),
	(399, 1864707, 'TI', '1001934942', 'CARMEN BEATRIZ', 'MU?OZ GUERRERO', '3012462263', 'carmenbeatrisguerrero@gmail.com'),
	(400, 1864707, 'TI', '1002235240', 'YULEISY MARGARITA', 'PETRO BARRIOS', '3046601258', 'yuleisypetro@hotmail.com'),
	(401, 1864707, 'TI', '1101457934', 'TANIA MAITE', 'BAENA MORENO', '3008736754', 'dbornacheraguzman@gmail.com'),
	(402, 1864709, 'CC', '1001780197', 'GABRIEL ELIAS', 'VIZCAINO PINTO', '3046821053', 'gabovizcaino3009@outlook.com'),
	(403, 1864709, 'CC', '1001823635', 'PAULA', 'ANDREA DEFORT MORALES', '3006526438', 'pauladn1118@hotmail.com'),
	(404, 1864709, 'CC', '1001940768', 'JHON BRANDO', 'VERGEL ORTEGA', '', 'jhonbrand22@gmail.com'),
	(405, 1864709, 'CC', '1002128109', 'LEONARDO', 'DIAZGRANADOS MARTINEZ', '', 'leodiazgranados.d.m@hotmail.com'),
	(406, 1864709, 'CC', '1002293742', 'ELOY ANDRES', 'ROMERO ESCORCIA', '', 'eloyare02@gmail.com'),
	(407, 1864709, 'CC', '1019035003', 'JAINER JOSE', 'VERGARA SUAREZ', '', 'jainer88@hotmail.com'),
	(408, 1864709, 'CC', '1026300435', 'MIGUEL ANTONIO', 'DURAN JIMENEZ', '3209473581', 'miguelduranjimenez@gmail.com'),
	(409, 1864709, 'CC', '1042442235', 'KAREN PAOLA', 'GARIZABALO GONZALEZ', '3126035157', 'karengarizabalo2192@gmail.com'),
	(410, 1864709, 'CC', '1042449713', 'KELLY JOANNA', 'VARGAS LIDUE?A', '', 'kejovaly@gmail.com'),
	(411, 1864709, 'CC', '1042463650', 'JEFERSON', 'JIMENEZ VARELA', '3022886180', 'jefersonjimenezvarela@gmail.com'),
	(412, 1864709, 'CC', '1044211954', 'YULIS PAOLA', 'RODELO PAJARO', '3016054934', 'yulispaola@hotmail.com'),
	(413, 1864709, 'CC', '1044426476', 'MARIANGELICA', 'ESCOLAR GUERRA', '3173737183', 'escolarmariangelica@gmail.com'),
	(414, 1864709, 'CC', '1045752524', 'WENDY PAOLA', 'MOLINA TORRES', '3017379383', 'wepamoto@gmail.com'),
	(415, 1864709, 'CC', '1048282910', 'YARITZA ESTHER', 'SALCEDO PACHECO', '3008388636', 'yaritsalcedo@gmail.com'),
	(416, 1864709, 'CC', '1104867394', 'YULIS TERESA', 'ORTEGA MENDEZ', '3127672078', 'maidelyn1217@hotmail.com'),
	(417, 1864709, 'CC', '1127598014', 'GINNA MARCELA', 'PERALTA MELENDEZ', '3007497393', 'ginaperalta37@gmail.com'),
	(418, 1864709, 'CC', '1129535648', 'GENIVER', 'PAREJA TAMARA', '', 'geniverpareja@gmail.com'),
	(419, 1864709, 'CC', '1129543677', 'LUIS ENRIQUE', 'PACHECO AVILA', '', 'lepacheco1826@gmail.com'),
	(420, 1864709, 'CC', '1129582177', 'GUSTAVO ADOLFO', 'PEDROZA SANTIAGO', '', 'pedrozag1@hotmail.com'),
	(421, 1864709, 'CC', '1140883515', 'MELISSA MARGARITA', 'MOLINA MOLINA', '3022173467', 'melissamargarita@hotmail.com'),
	(422, 1864709, 'CC', '1140905262', 'SEBASTIAN JOSE', 'GONZALEZ OROZCO', '3186104305', 'sandrav_orozco@hotmail.com'),
	(423, 1864709, 'CC', '1143114317', 'MARIA VANESA', 'MARTINEZ BLANCO', '', 'vanesamartinez_0530@hotmail.com'),
	(424, 1864709, 'CC', '1143128894', 'STEPHANY DEL CARMEN', 'PERCY MACHACON', '', 'stephanypercy@hotmail.com'),
	(425, 1864709, 'CC', '1143131190', 'KEILA ROSA', 'ALVAREZ RUIZ', '3017236230', 'integrespaka@hotmail.com'),
	(426, 1864709, 'CC', '1143137163', 'TATIANA JUDITH', 'MENDOZA ACEVEDO', '3004130110', 'lachiicagemiiniis3192@hotmail.com'),
	(427, 1864709, 'CC', '1143138235', 'ADRIANA MELISSA', 'JIMENEZ GUERRA', '', 'adriana17_jimenez@hotmail.com'),
	(428, 1864709, 'CC', '1143158115', 'NATHALI GEOVANNA', 'ANGULO SIERRA', '3017717256', 'johanasie@hotmail.es'),
	(429, 1864709, 'CC', '1143265831', 'ANDREA PAOLA', 'GUTIERREZ DE LA ROSA', '3007612870', 'andreagutrrz@gmail.com'),
	(430, 1864709, 'CC', '1234091139', 'JENNIFER JOHANA', 'MOLINA MOLINA', '', 'jenifermolinaaa@hotmail.com'),
	(431, 1864709, 'CC', '22648609', 'NORLI PATRICIA', 'CASTRO DE LA CRUZ', '3012783035', 'nergoy@hotmail.com'),
	(432, 1864709, 'CC', '32827302', 'INGRID', 'ROA PADILLA', '', 'madreideal01@hotmail.com'),
	(433, 1864709, 'CC', '55225325', 'ANGELICA YINA', 'BARRETO OSPINO', '3005424646', 'ELECTRA_2225@HOTMAIL.COM'),
	(434, 1864709, 'TI', '1193106013', 'RONALDO REYNEL', 'RAMIREZ RIOS', '3147909285', 'ronaldo-reinel@hotmail.com'),
	(435, 1864710, 'CC', '1001851250', 'JHOSER ENRIQUE', 'GUERRA JIMENEZ', '3012592424', 'guerrajhoser@gmail.com'),
	(436, 1864710, 'CC', '1001945016', 'LESNY MAGALIS', 'JESSURUN BARRAZA', '3008959368', 'lesjessurumb@gmail.com'),
	(437, 1864710, 'CC', '1001993364', 'YALINETH KARINA', 'NU?EZ RUIZ', '3015151075', 'Yalika12@outlook.com'),
	(438, 1864710, 'CC', '1004499466', 'KAREN DAYANA', 'MU?OZ BANDERA', '', 'karenmunoz088@gmail.com'),
	(439, 1864710, 'CC', '1007133121', 'MARGARITA ROSA', 'POLANCO ALVARINO', '3006589630', 'margorpa@gmail.com'),
	(440, 1864710, 'CC', '1010074948', 'ROYMAN ENDERSON', 'ORELLANO MERCADO', '', 'royorellano1996@hotmail.com'),
	(441, 1864710, 'CC', '1042431208', 'EYLEEN MARCELA', 'NIEBLES JIMENEZ', '3748561', 'alondritaarias@hotmail.com'),
	(442, 1864710, 'CC', '1042439470', 'LEYVIS BEATRIZ', 'JARABA CANDANOZA', '3249360', 'leyvis-leandsi@hotmail.com'),
	(443, 1864710, 'CC', '1042446306', 'ANA DEL CARMEN', 'CARBONO MIRANDA', '', 'ANA_DEL-CARMEN@HOTMAIL.COM'),
	(444, 1864710, 'CC', '1043191790', 'EILYN ORIANA', 'MERCADO AULAR', '3116378255', 'eilyn.j22@gmail.com'),
	(445, 1864710, 'CC', '1043848441', 'BERTA PATRICIA', 'VALENCIA VALENCIA', '3146425093', 'Bervalen10@gmail.com'),
	(446, 1864710, 'CC', '1045688398', 'KATERIN YULIET', 'PALLARES ARROYO', '3215238686', 'kateyuliet1989@gmail.com'),
	(447, 1864710, 'CC', '1045703277', 'KELLY JOHANA', 'HERRERA CAMPO', '3721863', 'herreracampokelly@hotmail.com'),
	(448, 1864710, 'CC', '1045704563', 'LEIDY DAYANA', 'SAAVEDRA CHAVEZ', '', 'leidydayanasaavedra@outlook.es'),
	(449, 1864710, 'CC', '1047233240', 'BRANDO DE JESUS', 'PEREZ ALTAMAR', '3005293718', 'branpa23@gmail.com'),
	(450, 1864710, 'CC', '1047233740', 'LAUDIS PATRICIA', 'BARRANCO RIVERA', '3014799654', 'laudisking@gmail.com'),
	(451, 1864710, 'CC', '1047348352', 'KAREN CECILIA', 'BONETT ANGULO', '3014707536', 'karena124@hotmail.com'),
	(452, 1864710, 'CC', '1048285010', 'SIXTA PAOLA', 'DE AVILA MOZO', '3013147653', 'paodavimoz@gmail.com'),
	(453, 1864710, 'CC', '1048324787', 'MARIA ANGELICA', 'VALETH VENERA', '3012652181', 'mary_valeth@hotmail.com'),
	(454, 1864710, 'CC', '1140896073', 'GISELLA ANDREA', 'DE LA HOZ MONTES', '3013650962', 'Gdelahoz98106@hotmail.com'),
	(455, 1864710, 'CC', '1143169958', 'SHEILA PAOLA', 'VILLAFA?E ', '3014056771', 'sheilavilla05@gmail.com'),
	(456, 1864710, 'CC', '1143441023', 'DAYANA ESTHER', 'GRANADOS MORRON', '3007127979', 'sharold_1031@hotmail.com'),
	(457, 1864710, 'CC', '1143454027', 'HERNAN ENRIQUE', 'HERRERA TRUJILLO', '', 'hernantrujillohernan1995@hotmail.com'),
	(458, 1864710, 'TI', '1001941950', 'BRAYAN STEVEN', 'AHUMADA RODRIGUEZ', '3005249685', 'brayanstevenahumada@gmail.com'),
	(459, 1864710, 'TI', '1002024507', 'CAMILA MARCELA', 'RUIZ SARMIENTO', '3043906985', 'melidc1301@gmail.com'),
	(460, 1864710, 'TI', '1002153083', 'NICOLL CAROLINA', 'CUELLAR CARBONO', '3003912291', 'nicollcuellar4@gmail.com'),
	(461, 1864710, 'TI', '1002154558', 'ANGELA PATRICIA', 'CABRERA GONALEZ', '3003033919', 'cabreragonzales02@gmail.com'),
	(462, 1864710, 'TI', '1002212419', 'DANIELA ALEJANDRA', 'MERI?O VILLARREAL', '3006355355', 'danielamerinovillarreal@gmail.com'),
	(463, 1864710, 'TI', '1002235419', 'ANDREA PAOLA', 'PEREZ SOTO', '3216921198', 'perezsoto2111@gmail.com'),
	(464, 1864710, 'TI', '1007218757', 'MARYURYS YUREISY', 'CANTILLO PEREZ', '', 'mcantillo75@misena.edu.co'),
	(465, 1864712, 'CC', '1001912820', 'ESTEFANY ESTHER', 'MENDOZA DE LA HOZ', '3007857425', 'Darwincaro999@gmail.com'),
	(466, 1864712, 'CC', '1002030513', 'NATALIA', 'MENDOZA MEJIA', '3002921740', 'nataliamendozam1003@gmail.com'),
	(467, 1864712, 'CC', '1002128070', 'SARAY MICHELLE', 'BERMUDEZ GOMEZ', '3126361089', 'saraybeemudezgomez@gmail.com'),
	(468, 1864712, 'CC', '1002154338', 'JHOIBER JOSE', 'BARCINILLA UTRIA', '', 'jhoiberbarcinilla@gmail.com'),
	(469, 1864712, 'CC', '1004121298', 'CAROLINA MARIA', 'POLO CARRILLO', '3042011555', 'carolinapolocarrillo@gmail.com'),
	(470, 1864712, 'CC', '1007182606', 'CARMEN LIGIA', 'PEREZ REYES', '3168089461', 'perligia48@gmail.com'),
	(471, 1864712, 'CC', '1045740627', 'LAURA ANDREA', 'CARVAL DE LA CRUZ', '3017959266', 'lauracarval11@gmail.com'),
	(472, 1864712, 'CC', '1048072714', 'YANDI RAFAEL', 'POLO BONILLA', '3008338662', 'yejota48@gmail.com'),
	(473, 1864712, 'CC', '1048323847', 'JESUS DAVID', 'SINING MARTINEZ', '3005921229', 'siningmartinezjesu@hotmail.com'),
	(474, 1864712, 'CC', '1140868038', 'YAJAIRA VANESSA', 'FLORIAN WEZ', '3135875154', 'vanewez2226@gmail.com'),
	(475, 1864712, 'CC', '1143122546', 'GLADYS CECILIA', 'OROZCO OROZCO', '', 'glasa1911@gmail.com'),
	(476, 1864712, 'CC', '1143139453', 'DALIA ROSA', 'ROJAS ROJAS', '3136812121', 'Daliarojas121@gmail.com'),
	(477, 1864712, 'CC', '1143246772', 'DIRIS CANDELARIA', 'BENITEZ FERNANDEZ', '3024341092', 'lapequis_15@hotmail.com'),
	(478, 1864712, 'CC', '1143249306', 'LINDA LUCIA', 'MENDOZA MEJIA', '', 'LINDAMENDOZA2712@GMAIL.COM'),
	(479, 1864712, 'CC', '1143258373', 'PAULA ANDREA', 'CABRERA MUEGUES', '3023902694', 'muegues_paulina@outlook.com'),
	(480, 1864712, 'CC', '1143453342', 'OLARIS ANDREA', 'NIETO VASQUEZ', '3007132073', 'olaris27@hotmail.com'),
	(481, 1864712, 'TI', '1001187786', 'DIANA PAOLA', 'ROJAS MEJIA', '3017016843', 'dpaola2002@hotmail.com'),
	(482, 1864712, 'TI', '1001879573', 'SHARON SARAY', 'MIRANDA REYES', '3017358874', 'sharonreyes1927@gmail.com'),
	(483, 1864712, 'TI', '1001881325', 'LORENA SOFIA', 'MIRANDA MACEAS', '3003656871', 'lorenasofi03@gmail.com'),
	(484, 1864712, 'TI', '1001942151', 'AILYN PAOLA', 'BARRERA LOPEZ', '3145452760', 'ailyn_bl1804@hotmail.com'),
	(485, 1864712, 'TI', '1002027399', 'SHEYLA ANDREA', 'MIRANDA BOTERO', '3017640274', 'Sheyla.miranda.botero@gmail.com'),
	(486, 1864712, 'TI', '1002034159', 'GINA PAOLA', 'CANO LEAL', '3017288028', 'ginacanoleal231@gmail.com'),
	(487, 1864712, 'TI', '1002134057', 'DANIELA MARCELLA', 'YANES CARMONA', '3006286199', 'danimaryc01@gmail.com'),
	(488, 1864712, 'TI', '1002210611', 'BREINER ANDRES', 'MIRANDA PERALTA', '3106940121', '28breinermiranda@gmail.com'),
	(489, 1864712, 'TI', '1005418833', 'MARIA CAROLINA', 'REYES TOVAR', '3015514220', 'mr492687@gmail.com'),
	(490, 1864712, 'TI', '1005646688', 'YARELIS PATRICIA', 'TAPIA RUIZ', '3006876236', 'yarelistapia.04@gmail.com'),
	(491, 1864712, 'TI', '1007920744', 'ALDAIR ANDRES', 'SERRANO GALVAN', '', 'aldairserranogrado11b@gmail.com'),
	(492, 1864712, 'TI', '1047040741', 'CAMILO ANDRES', 'NI?O VILLEGAS', '3192387650', 'Camilovillegas123123@gmail.com'),
	(493, 1864712, 'TI', '1130294527', 'FARID CAMILO', 'HEILBRON CARRILLO', '3135022238', 'puertosena@gmail.com'),
	(494, 1864712, 'TI', '1193127053', 'JOHAN JESUS', 'MERLANO OJEDA', '3022772615', 'johanmerlano3@gmail.com'),
	(495, 1864721, 'CC', '1001856181', 'JOHANYS', 'VIDAL DIAZ', '3004803278', 'Johanisvanessav@gmail.com'),
	(496, 1864721, 'CC', '1001881210', 'NORAIMIS PAOLA', 'MEZA BRIAND', '3126895372', 'noraimism1@gmail.com'),
	(497, 1864721, 'CC', '1001914864', 'ANDREA CAROLINA', 'RACINI OCHOA', '3132120792', 'andrea.racini09@gmail.com'),
	(498, 1864721, 'CC', '1002128396', 'ALIX ANDREA', 'CARRASCAL VILLALBA', '3012163706', 'alixandrea.ac@gmail.com'),
	(499, 1864721, 'CC', '1002412451', 'YULIANY PAOLA', 'PADILLA FERNANDEZ', '3013203149', 'yulianypadilla@hotmail.com'),
	(500, 1864721, 'CC', '1007117658', 'DUBAN JOSE', 'CA?ATE RODRIGUEZ', '3126183228', 'djcanate8@misena.edu.co'),
	(501, 1864721, 'CC', '1010081063', 'CESAR JUNIOR', 'BALLESTEROS ALVARADO', '', 'cesarjuniorballestero@gmail.com'),
	(502, 1864721, 'CC', '1045744381', 'BLEIDYS MARIA', 'AGUAS RAMOS', '3024448977', 'bleydisa27@gmail.com'),
	(503, 1864721, 'CC', '1143162857', 'KARIN PAOLA', 'ALVEAR LOPEZ', '3017928840', 'karinalvear@hotmail.com'),
	(504, 1864721, 'CC', '1143170298', 'DANIELA DALLY', 'PEDROZA ROVIRA', '3024065254', 'danielaprovira@gmail.com'),
	(505, 1864721, 'CC', '1143238640', 'NOREIMA YERALDIS', 'CHARRIS MOZO', '3007780008', 'noyechamo@hotmail.com'),
	(506, 1864721, 'CC', '1143241704', 'KAREN MARGARITA', 'PI?A PAEZ', '3008252464', 'KPINA10297@GMAIL.COM'),
	(507, 1864721, 'CC', '1143267215', 'LIANIS ANDREA', 'CARAZO CUADRADO', '3153487168', 'lianiscarazo23@Gmail.com'),
	(508, 1864721, 'CC', '1193416656', 'ALDEIR JESUS', 'OROZCO JEROMITO', '3045704334', 'aldeirorozco2000@hotmail.com'),
	(509, 1864721, 'CC', '1194964069', 'ELAINE ISABEL', 'PADILLA RODRIGUEZ', '3003820480', 'eirodriguez.1412@gmail.com'),
	(510, 1864721, 'CC', '1234095036', 'WENDY JOLANYS', 'DE LOS REYES PATERNINA', '3006938290', 'wenreyes99@gmail.com'),
	(511, 1864721, 'CC', '22592428', 'CIELO CONCEPCION', 'PACHECO ECHEVERRIA', '3116677413', 'cieloconcepcionpacheco@gmail.com'),
	(512, 1864721, 'TI', '1001824619', 'BRENDA MARCELA', 'BARCELO VARGAS', '', 'brendabarcelo22@gmail.com'),
	(513, 1864721, 'TI', '1002029005', 'YURLEY PAOLA', 'ASENCIO TORRES', '3003000000', 'yurleyasencio@hotmail.com'),
	(514, 1864721, 'TI', '1002162783', 'JOSE FELIX', 'MARRUGO RODRIGUEZ', '3012643488', 'josemarrugo06@hotmail.com'),
	(515, 1864721, 'TI', '1002211173', 'SHADIA MARGARITA', 'GARCIA DE LEON', '3005386372', 'shadiaknowles@gmail.com'),
	(516, 1864721, 'TI', '1007910588', 'DAYANA PAOLA', 'CONEO OJITO', '3042421442', 'dayanapaolaconeo@gmail.com'),
	(517, 1864721, 'TI', '1010152798', 'THAYMY LEE', 'MERCADO MONTOYA', '3015994152', 'rodolfomanuel10@hotmail.com'),
	(518, 1864721, 'TI', '1043127453', 'ETILVIA ROSA', 'VIDES MEZA', '3007882921', 'Etivides@hotmail.com'),
	(519, 1864721, 'TI', '1192768180', 'MARCO JESUS', 'CASTRO TORRES', '', 'marco201223jesus@gmail.com'),
	(520, 1864721, 'TI', '1192796351', 'FELIX ANDRES', 'FONTALVO VIZCAINO', '3003915053', 'felixfontalvo7@gmail.com'),
	(521, 1864721, 'TI', '1193236122', 'YANIS MARIA', 'LOVERA TORRENTE', '3128660622', 'yanis.torrente@gmail.com'),
	(522, 1864723, 'CC', '1042429659', 'MARIA ISABEL', 'GARCIA LLANOS', '3194970104', 'marygar184@gmail.com'),
	(523, 1864723, 'CC', '1042455345', 'CARLOS AUGUSTO', 'NORIEGA SAUMETT', '3015676355', 'carlosnoriegasaumett@gmail.com'),
	(524, 1864723, 'CC', '1043121036', 'MELISSA ANDREA', 'OROZCO ESCORCIA', '3043732183', 'meloorozco3@gmail.com'),
	(525, 1864723, 'CC', '1045752880', 'STEFANNY PAOLA', 'RAMOS LUGO', '3017660215', 'paolastefanny1998@gmail.com'),
	(526, 1864723, 'CC', '1048324565', 'OMAR DE JESUS', 'GUTIERREZ BELTRAN', '3002805594', 'gutierreznapo@hotmail.com'),
	(527, 1864723, 'CC', '1048325656', 'MADELEINE', 'CARRACEDO PEREZ', '3006324091', 'luisescobar9118@gmail.com'),
	(528, 1864723, 'CC', '1065908881', 'KAREN SANDRITH', 'CASELLES ROMAN', '', 'karensandriith@gmail.com'),
	(529, 1864723, 'CC', '1129504836', 'NACIRA DE LOS ANGELES', 'ROMERO SIMON', '3043935476', 'nromero201916@gmail.com'),
	(530, 1864723, 'CC', '1143150989', 'VALERI MANUELA', 'RIZO SARAVIA', '3145055097', 'VALERI2804@GMAIL.COM'),
	(531, 1864723, 'CC', '1143165935', 'PAULA ANDREA', 'SANTOS ARGUELLO', '3003791408', 'andreasantosarguello@gmail.com'),
	(532, 1864723, 'CC', '1143463629', 'LEDYS ANDREA', 'SANCHEZ MEZA', '3016315750', 'Bettsymeza20@gmail.com'),
	(533, 1864723, 'CC', '1193043321', 'YICETH PAOLA', 'RAMIREZ ALGARIN', '3008031396', 'yiseth13pao@outlook.com'),
	(534, 1864723, 'CC', '1193479250', 'LUZ ANAIS', 'BARRERA IGLESIAS', '3122902956', 'luzysharon29@gmail.com'),
	(535, 1864723, 'CC', '22735073', 'GINA ISABEL', 'POLO POLO', '3017524855', 'olop_olop@hotmail.com'),
	(536, 1864723, 'TI', '1001779145', 'ALBERTO MARIO', 'MARTINEZ BOTERO', '3043812411', 'albertomariomartinezbotero@gmail.com'),
	(537, 1864723, 'TI', '1001822397', 'FLOR MARIA', 'RAMIREZ GAVIRIA', '3002896179', 'flormariagaviria@gmail.com'),
	(538, 1864723, 'TI', '1001853687', 'ANGIE MARCELA', 'MIRANDA PEREZ', '3205495633', 'mirandaperezangiemarcela@gmail.com'),
	(539, 1864723, 'TI', '1001856977', 'JULIANNA PAOLA', 'BLANCO CORTINA', '', 'yulimi1008@gmail.com'),
	(540, 1864723, 'TI', '1001879841', 'NASHALY SHARLOTTE', 'MENDOZA QUINTERO', '3145820202', 'nl1969494@gmail.com'),
	(541, 1864723, 'TI', '1001888005', 'SANDY PAOLA', 'SALAS POTES', '3158570394', 'sandysalasp19@gmail.com'),
	(542, 1864723, 'TI', '1001965718', 'ARELIS MARIA', 'SARABIA SANCHEZ', '', 'sarabiaarelis@gmail.com'),
	(543, 1864723, 'TI', '1003097768', 'KATERINE', 'ESCOBAR CABRERA', '3017290986', 'kateescobarcabrera@gmail.com'),
	(544, 1864723, 'TI', '1004298533', 'LILIBETH', 'DE LA ROSA DONADO', '3002427912', 'Lilibethdelarosa@hotmail.com'),
	(545, 1864723, 'TI', '1007173565', 'ELVIRA ROSA', 'IGLESIAS PEREZ', '3042038612', 'claudiamperez712@gmail.com'),
	(546, 1864723, 'TI', '1043151397', 'STEPHANY MARCELA', 'REYES BRI ?EZ', '3003932327', 'kexlystephany@gmail.com'),
	(547, 1864723, 'TI', '1047047181', 'ANTONY DE JESUS', 'MERCADO BARRIOS', '3005662754', 'ant5dic@gmail.com'),
	(548, 1864723, 'TI', '1047357278', 'ASTRID CAROLINA', 'COLMENARES GARCES', '3006685269', 'astridcolmenaresgarcesnb@gmail.com'),
	(549, 1864723, 'TI', '1048271539', 'SARAY SHIRLEY', 'MOJICA MEZA', '3006521108', 'saraymojica0329@outlook.es'),
	(550, 1864723, 'TI', '99050108160', 'ISRAEL JAFET', 'OSORIO MARTINEZ', '3046825697', 'albainez78@outlook.com'),
	(551, 1867146, 'CC', '1002023699', 'ANDREW JESUS', 'PAJARO DOMINGUEZ', '3015187172', 'andrewpajarod@gmail.com'),
	(552, 1867146, 'CC', '1002035199', 'JEFFRY ALFREDO', 'REALES SABALZA', '3017319121', 'realesjeffry@gmail.com'),
	(553, 1867146, 'CC', '1007613669', 'ANGIE CAROLINA', 'LOPEZ ARRIETA', '3005575872', 'anguie1810@gmail.com'),
	(554, 1867146, 'CC', '1007975251', 'OLGA LUCILA', 'MONTERROZA URRUTIA', '3024264655', 'monterrozaolga600@gmail.com'),
	(555, 1867146, 'CC', '1043125025', 'SANTIAGO', 'RODRIGUEZ ESPINOSA', '3046765668', 'santi231952@gmail.com'),
	(556, 1867146, 'CC', '1045739662', 'LUIS EDUARDO', 'BARBOZA PADILLA', '3012679212', 'luisbarbozapadilla@gmail.com'),
	(557, 1867146, 'CC', '1045756046', 'JOSE LUIS', 'RUIZ SANDOVAL', '3006464840', 'joselrs519@gmail.com'),
	(558, 1867146, 'CC', '1102576264', 'BELKIN MARCELA', 'DE HOYOS MERCADO', '3147020476', 'belkindehoyos@gmail.com'),
	(559, 1867146, 'CC', '1128124834', 'EDUARDO LUIS', 'ROSADO CARO', '', 'eduardoluisroca2211@gmail.com'),
	(560, 1867146, 'CC', '1143148100', 'BRAYAN JOSE', 'JIMENEZ ZU?IGA', '3022544902', 'bryan1610z@gmail.com'),
	(561, 1867146, 'CC', '1143148705', 'JOSE DAVID', 'MESINO AFANADOR', '3043816093', 'JOSEMESINOA@GMAIL.COM'),
	(562, 1867146, 'CC', '1192786556', 'TONY ALBERTO', 'PEINADO GONZALEZ', '3014098871', 'tonype25@outlook.com'),
	(563, 1867146, 'CC', '1193136059', 'KEVIN JOSE', 'DE LA ROSA HURTADO', '', 'kevin_jose09@hotmail.com'),
	(564, 1867146, 'CC', '1232588858', 'BREYNNER ANDRES', 'ALCENDRA VACCA', '', 'breynner_21071997@hotmail.com'),
	(565, 1867146, 'TI', '1001782366', 'LUIS EDUARDO', 'RANGEL BELTRAN', '3022828731', 'luis10032019@outlook.com'),
	(566, 1867146, 'TI', '1001825448', 'ALEXANDER', 'SOLER PE?A', '3002216514', 'soleralex48@gmail.com'),
	(567, 1867146, 'TI', '1001851569', 'DAVID JOSE', 'VALENCIA NU?EZ', '3045285564', 'davisitovale@gmail.com'),
	(568, 1867146, 'TI', '1001942312', 'JANNER ORLANDO', 'GONZALEZ PAREDES', '3043843593', 'jannergonpa.10@gmail.com'),
	(569, 1867146, 'TI', '1001998265', 'WILLINTON', 'DE LA CRUZ DIAZ ', '3012953771', 'willy26cruz@hotmail.com'),
	(570, 1867146, 'TI', '1002132775', 'JOAQUIN LEONARDO', 'PLATA GARCIA', '3184931463', 'jplata1901@gmail.com'),
	(571, 1867146, 'TI', '1002159161', 'ALAN JAIME', 'ARIZA RODRIGUEZ', '', 'alanariza002@gmail.com'),
	(572, 1867146, 'TI', '1002209692', 'ANDRES FELIPE', 'HOYER MEZA', '3186125164', 'mirandapipe720@gmail.com'),
	(573, 1867146, 'TI', '1002210354', 'CLEYNER DAVID', 'PEREZ FIGUEROA', '3107460080', 'cdpf2002@gmail.com'),
	(574, 1867146, 'TI', '1003561530', 'MARCELA MARIA', 'MORALES MONTES', '3128654331', 'Mmarcelamorales2705@gmail.com'),
	(575, 1867146, 'TI', '1004353779', 'ANDRES DAVID', 'BALLESTAS BACA', '3007515061', 'andres123davidballestas@gmail.com'),
	(576, 1867146, 'TI', '1007608203', 'DANIEL JOSE', 'ALVAREZ BLANCO', '3145158245', 'danielalbla08@hotmail.com'),
	(577, 1867146, 'TI', '1007801145', 'MOISES DAVID', 'SALCEDO QUI?ONEZ', '3006839592', 'moysalcedo0202@gmail.com'),
	(578, 1867146, 'TI', '1007892680', 'JAVIER RICARDO', 'MARTINEZ GRANADOS', '3022473316', 'javiermartinez20001@gmail.com'),
	(579, 1867146, 'TI', '1007961389', 'XAVIER MANUEL', 'GUADA?O CAMARGO', '3042064485', 'xavimanuel12@gmail.com'),
	(580, 1867146, 'TI', '1044390335', 'DANNA GAGRIELA', 'COMAS AREVALO', '3008614469', 'danacomas222@gmail.com'),
	(581, 1867146, 'TI', '1047034843', 'BARBOSA', 'MENDOZA CARLOS GILBERTO', '3005719700', 'barbozamendozacarlos70@gmail.com'),
	(582, 1867165, 'CC', '1001823255', 'BRENDA LUZ', 'OSPINO TORRES', '3046718953', 'LOSPINOTORRE@GMAIL.COM'),
	(583, 1867165, 'CC', '1002025930', 'EDWAR ANDRES', 'CEPEDA WILCHES', '3135582542', 'edwardcepeda6@gmail.com'),
	(584, 1867165, 'CC', '1002128026', 'CARLOS DANILO', 'RUBIO HERNANDEZ', '3006010448', 'carlosrubio5220@gmail.com'),
	(585, 1867165, 'CC', '1002234229', 'GERALDINE LISETH', 'GONZALEZ FUNES', '3014075420', 'geraldinegonzalezf1997@gmail.com'),
	(586, 1867165, 'CC', '1007349266', 'ENRIQUE JUNIOR', 'HERNANDEZ OTERO', '3008204755', 'enrique.hernandez.ejho@gmail.com'),
	(587, 1867165, 'CC', '1007827401', 'YULIS', 'CARDENAS ORTEGA', '3006489089', 'yuliscardenas386@gmail.com'),
	(588, 1867165, 'CC', '1042457719', 'EDGAR ENRIQUE', 'RODRIGUEZ MOLINA', '', 'enredgarmolina@gmail.com'),
	(589, 1867165, 'CC', '1045723602', 'CAROLINA STEFANY', 'GRANADOS SOLANO', '', 'carolsmile61@hotmail.com'),
	(590, 1867165, 'CC', '1045751664', 'ANDRES ESTIVIN', 'PACHECO SARABIA', '3017830653', 'andrespacheco640@gmail.com'),
	(591, 1867165, 'CC', '1048323974', 'ROBINSON', 'RODRIGUEZ TOSCANO', '3002953881', 'robin170218@outlook.com'),
	(592, 1867165, 'CC', '1048328640', 'JAIDET MANUEL', 'RODRIGUEZ GUTIERREZ', '', 'jaidetrodriguez1998@hotmail.com'),
	(593, 1867165, 'CC', '1052943262', 'ADAIRIS', 'DITA PRADO', '3009785432', 'idita5034@gmail.com'),
	(594, 1867165, 'CC', '1128166190', 'MARTIN DAVID', 'TAMARA SANTANA', '3203205248', 'martintamarasantana@gmail.com'),
	(595, 1867165, 'CC', '1129578222', 'BLAKE ANTHONY', 'JIMENEZ ACU?A', '', 'tonezbi12@outlook.com'),
	(596, 1867165, 'CC', '1140858247', 'JOSE LUIS', 'ROMERO BAQUERO', '3104103162', 'josecompuwed@hotmail.com'),
	(597, 1867165, 'CC', '1140898266', 'ALEJANDRA PATRICIA', 'TATIS REALES', '3003131501', 'tatisa1998@hotmail.com'),
	(598, 1867165, 'CC', '1143267261', 'LIDIS CAROLINA', 'LOPEZ OSPINO', '3005139691', 'lidislopezospino@gmail.com'),
	(599, 1867165, 'CC', '1143267818', 'JAIME DAVID', 'AVENDA?O SARABIA', '3015309406', 'davidsarabia166@gmail.com'),
	(600, 1867165, 'CC', '1192770272', 'ALDAIR JESUS', 'OSPINO BORJA', '3004752588', 'aldairospino2000@gmail.com'),
	(601, 1867165, 'CC', '1234092099', 'NAREN DE JESUS', 'DE LA RANS PACHECO', '3008398824', 'narenpuf@gmail.com'),
	(602, 1867165, 'CC', '72194774', 'MARLON ENRIQUE', 'LUQUEZ IGLESIA', '', '@'),
	(603, 1867165, 'TI', '1001869375', 'JHONNIER OSWALDO', 'ORTEGA MERCADO', '3218063420', 'ortegajhonnier132012@gmail.com'),
	(604, 1867165, 'TI', '1002034772', 'CRISTIAN DAVID', 'MEDRANO VALLE', '3023644642', 'crismedrano22@hotmail.com'),
	(605, 1867165, 'TI', '1002158362', 'SEBASTIAN', 'DE LA HOZ PONTON', '3103649942', 'sdelahozp1@gmail.com'),
	(606, 1867165, 'TI', '1002302997', 'ALDAIR DE JESUS', 'ADIE CRUZ', '3145348615', 'aldairadie2000@gmail.com'),
	(607, 1867165, 'TI', '1003378792', 'HUMBERTO', 'TORRES DURAN', '3003603313', 'torres.humberto.anjosu@gmail.com'),
	(608, 1867165, 'TI', '1007855628', 'ISAI ENRIQUE', 'ORJUELA POLO', '3172195456', 'maisa.viery@hotmail.com'),
	(609, 1867165, 'TI', '1010101716', 'ANGIE PAOLA', 'PUCHE HERNANDEZ', '3003314349', 'ah050403@gmail.com'),
	(610, 1867165, 'TI', '1129526892', 'YOSNEIDER', 'ORTIZ GAMBOA', '3054769985', 'yosneortiz2004@gmail.com');
/*!40000 ALTER TABLE `aprendices` ENABLE KEYS */;

-- Volcando estructura para tabla dbsofirca.archivosadjuntos
CREATE TABLE IF NOT EXISTS `archivosadjuntos` (
  `Ad_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Ad_NombreAdjunto` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `Ad_RutaArchivo` varchar(80) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`Ad_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla dbsofirca.archivosadjuntos: ~12 rows (aproximadamente)
DELETE FROM `archivosadjuntos`;
/*!40000 ALTER TABLE `archivosadjuntos` DISABLE KEYS */;
INSERT INTO `archivosadjuntos` (`Ad_Id`, `Ad_NombreAdjunto`, `Ad_RutaArchivo`) VALUES
	(1, 'IF6108_1 (1)', '../files/IF6108_1 (1).PDF'),
	(2, '9207001469412CC1143468062C', '../files/9207001469412CC1143468062C.pdf'),
	(3, 'THE PERFECT CITY TOWN.', '../files/THE PERFECT CITY TOWN..doc'),
	(4, '', '../files/.'),
	(5, '', '../files/.'),
	(6, 'constancia_TituladaPresencial', '../files/constancia_TituladaPresencial.pdf'),
	(7, 'constancia_TituladaPresencial', '../files/constancia_TituladaPresencial.pdf'),
	(8, 'Informe Programa de FormaciÃ³n Titulada.pdfCONTABILIZACIÃ“N DE OPERACIONES COMERCIALES Y FINANCIERAS', '../files/Informe Programa de FormaciÃ³n Titulada.pdfCONTABILIZACIÃ“N DE OPERACIO'),
	(9, 'Informe Programa de FormaciÃ³n Titulada.pdfCONTABILIZACIÃ“N DE OPERACIONES COMERCIALES Y FINANCIERAS', '../files/Informe Programa de FormaciÃ³n Titulada.pdfCONTABILIZACIÃ“N DE OPERACIO'),
	(10, 'Ejercicios_PREEVIDENCIA_JAVA_2019', '../files/Ejercicios_PREEVIDENCIA_JAVA_2019.pdf'),
	(11, 'Ejercicios_PREEVIDENCIA_JAVA_2019', '../files/Ejercicios_PREEVIDENCIA_JAVA_2019.pdf'),
	(12, 'manifest', '../files/manifest.mf'),
	(13, 'manifest', '../files/manifest.mf');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla dbsofirca.banco_ies: ~5 rows (aproximadamente)
DELETE FROM `banco_ies`;
/*!40000 ALTER TABLE `banco_ies` DISABLE KEYS */;
INSERT INTO `banco_ies` (`Bc_Id`, `Bc_NombreInstitucion`, `BC_Direccion`, `Bc_NombreCoordinador`, `Bc_Telefono`, `Bc_Correo`) VALUES
	(1, 'ITSA', 'CLL 18 # 38 100 SOLEDAD', 'Miguel Salazar', '3192220385', 'msalazarn@itsa.edu.co'),
	(2, 'CORPORACION FORMAR', 'Carrera 43 # 68-63 Barranquilla', 'Julieth Becerra', '1321323232', 'diracademica@ceformar.edu.co'),
	(3, 'CORPORACION EMPRESARIAL SALAMANCA', 'CRA 50 # 79 - 155', 'ADRIANA MARTINEZ', '300300300', 'ADRIANA@GMAIL.COM'),
	(4, 'CORPORACION AMERICANA', 'CRA 43 # 72 - ESQUINA', 'SANDRA GAMARRA', '300300330', 'SANDRA@GMAIL.COM'),
	(5, 'UNIVERSIDAD AUTONOMA DEL CARIBE', 'CRA 49C # 90 - 84', 'FREDDY FONTALVO', '3002002004', 'FREDDY@HOTMAIL.COM');
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

-- Volcando datos para la tabla dbsofirca.carga_academica: ~0 rows (aproximadamente)
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
	(1, 'COLOMBO ALEMAN', 'BQLLA'),
	(2, 'INDUSTRIAL Y DE AVIACION', 'BQLLA'),
	(3, 'COMERCIO Y SERVICIOS', 'BQLLA'),
	(4, 'CEDAGRO', 'BQLLA');
/*!40000 ALTER TABLE `centro_formacion` ENABLE KEYS */;

-- Volcando estructura para tabla dbsofirca.competencia_programa
CREATE TABLE IF NOT EXISTS `competencia_programa` (
  `Cp_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Cp_PgId` int(11) NOT NULL,
  `Cp_NombreC` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Cp_IntensidadH` int(4) NOT NULL,
  PRIMARY KEY (`Cp_Id`),
  KEY `Cp_PgId` (`Cp_PgId`),
  CONSTRAINT `competencia_programa_ibfk_1` FOREIGN KEY (`Cp_PgId`) REFERENCES `programas` (`Pg_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla dbsofirca.competencia_programa: ~60 rows (aproximadamente)
DELETE FROM `competencia_programa`;
/*!40000 ALTER TABLE `competencia_programa` DISABLE KEYS */;
INSERT INTO `competencia_programa` (`Cp_Id`, `Cp_PgId`, `Cp_NombreC`, `Cp_IntensidadH`) VALUES
	(2, 5, 'INVENTARIAR LOS MATERIALES, EQUIPOS Y ELEMENTOS, TENIENDO EN CUENTA LAS\nPOLÍTICAS DE LA ORGANIZACIÓ', 140),
	(3, 5, 'CONTABILIZAR OPERACIONES DE ACUERDO CON LAS NORMAS VIGENTES Y LAS POLÍTICAS\nORGANIZACIONALES.', 740),
	(4, 5, 'PROMOVER LA INTERACCION IDONEA CONSIGO MISMO, CON LOS DEMAS Y CON LA\nNATURALEZA EN LOS CONTEXTOS LA', 160),
	(5, 5, 'COMPRENDER TEXTOS EN INGLÉS EN FORMA ESCRITA Y AUDITIVA', 160),
	(6, 5, 'RESULTADOS DE APRENDIZAJE', 160),
	(7, 6, 'REALIZAR MANTENIMIENTO PREVENTIVO Y PREDICTIVO QUE PROLONGUE EL\nFUNCIONAMIENTO DE LOS EQUIPOS DE CO', 310),
	(8, 6, 'IMPLEMENTAR LA ESTRUCTURA DE LA RED DE ACUERDO CON UN DISEÑO PREESTABLECIDO\nA PARTIR DE NORMAS TÉCN', 310),
	(9, 6, 'APLICAR HERRAMIENTAS OFIMÁTICAS, REDES SOCIALES Y COLABORATIVAS DE ACUERDO\nCON EL PROYECTO A DESARR', 220),
	(10, 6, 'PROMOVER LA INTERACCION IDONEA CONSIGO MISMO, CON LOS DEMAS Y CON LA\nNATURALEZA EN LOS CONTEXTOS LA', 160),
	(11, 6, 'COMPRENDER TEXTOS EN INGLÉS EN FORMA ESCRITA Y AUDITIVA', 160),
	(12, 6, 'RESULTADOS DE APRENDIZAJE', 880),
	(13, 8, 'DAR ASESORÍA COMERCIAL Y FINANCIERA QUE CONDUZCA A LA SATISFACCIÓN\nDE LAS EXPECTATIVAS Y NECESIDADE', 200),
	(14, 8, 'FIDELIZAR AL CLIENTE INCREMENTADO LOS VÃNCULOS COMERCIALES Y LOGRANDO LA RENTABILIDAD DEL NEGOCIO', 120),
	(15, 8, 'PROCESAR DEPÃ“SITOS, PAGOS Y RETIROS EN MONEDA LEGAL Y EXTRANJERA DE ACUERDO A LAS NORMAS LEGALES E', 150),
	(16, 8, 'VINCULAR AL CLIENTE DE ACUERDO CON LAS NORMAS INTERNAS Y EXTERNAS ESTABLECIDAS', 150),
	(17, 8, 'APLICAR TECNOLOGÃAS DE LA INFORMACIÃ“N TENIENDO EN CUENTA LAS NECESIDADES DE LA UNIDAD ADMINISTRAT', 80),
	(18, 8, 'PROMOVER LA INTERACCION IDONEA CONSIGO MISMO, CON LOS DEMAS Y CON LA NATURALEZA EN LOS CONTEXTOS LAB', 160),
	(19, 8, 'COMPRENDER TEXTOS EN INGLÃ‰S EN FORMA ESCRITA Y AUDITIVA', 180),
	(20, 8, 'RESULTADOS DE APRENDIZAJE ETAPA PRACTICA', 880),
	(21, 9, 'PRODUCIR LOS DOCUMENTOS QUE SE ORIGINEN DE LAS FUNCIONES ADMINISTRATIVAS, SIGUIENDO LA NORMA TÃ‰CNI', 280),
	(22, 9, 'ORGANIZAR EVENTOS QUE PROMUEVAN LAS RELACIONES EMPRESARIALES, TENIENDO EN CUENTA EL OBJETO SOCIAL D', 120),
	(23, 9, 'ORGANIZAR LA DOCUMENTACIÃ“N TENIENDO EN CUENTA LAS NORMAS LEGALES Y DE LA ORGANIZACIÃ“N', 120),
	(24, 9, 'FACILITAR EL SERVICIO A LOS CLIENTES INTERNOS Y EXTERNOS DE ACUERDO CON LAS POLÃTICAS DE LA ORGANI', 120),
	(25, 9, 'PROCESAR LA INFORMACIÃ“N DE ACUERDO CON LAS NECESIDADES DE LA ORGANIZACIÃ“N', 120),
	(26, 9, 'APOYAR EL SISTEMA DE INFORMACIÃ“N CONTABLE EN CONCORDANCIA CON LA NORMATIVIDAD.', 120),
	(27, 9, 'PROMOVER LA INTERACCION IDONEA CONSIGO MISMO, CON LOS DEMAS Y CON LA NATURALEZA EN LOS CONTEXTOS LA', 160),
	(28, 9, 'COMPRENDER TEXTOS EN INGLÃ‰S EN FORMA ESCRITA Y AUDITIVA', 180),
	(29, 9, 'RESULTADOS DE APRENDIZAJE ETAPA PRACTICA', 880),
	(30, 11, 'PRODUCIR LOS DOCUMENTOS QUE SE ORIGINEN DE LAS FUNCIONES ADMINISTRATIVAS,SIGUIENDO LA NORMA TÃ‰CNICA', 300),
	(31, 11, 'FACILITAR EL SERVICIO A LOS CLIENTES INTERNOS Y EXTERNOS DE ACUERDO CON LASPOLÃTICAS DE LA ORGANIZA', 120),
	(32, 11, 'TRAMITAR LOS DOCUMENTOS DE ARCHIVO DE ACUERDO CON LA NORMATIVIDAD VIGENTE YCON LA POLÃTICA INSTITUC', 80),
	(33, 11, 'ORGANIZAR ARCHIVOS DE GESTIÃ“N DE ACUERDO CON NORMATIVIDAD VIGENTE YPOLÃTICAS INSTITUCIONALES', 400),
	(34, 11, 'PROMOVER LA INTERACCION IDONEA CONSIGO MISMO, CON LOS DEMAS Y CON LANATURALEZA EN LOS CONTEXTOS LABO', 160),
	(35, 11, 'COMPRENDER TEXTOS EN INGLÃ‰S EN FORMA ESCRITA Y AUDITIVA', 160),
	(36, 11, 'RESULTADOS DE APRENDIZAJE ETAPA PRACTICA', 880),
	(37, 12, 'EFECTUAR LOS RECIBOS Y DESPACHOS DE LOS OBJETOS SEGÃšN REQUISICIONES Y DOCUMENTOS QUE SOPORTAN LA A', 100),
	(38, 12, 'PREPARA LA CARGA DE ACUERDO CON SU NATURALEZA MEDIO DE TRANSPORTE', 120),
	(39, 12, 'REALIZAR EL CARGUE Y DESCARGUE DE LOS OBJETOS SEGÃšN NORMAS Y TÃ‰CNICAS ESTABLECIDAS POR LA ORGANIZ', 100),
	(40, 12, 'MANEJAR LOS EQUIPOS Y MEDIOS DE TRANSPORTE SEGÃšN NORMAS', 100),
	(41, 12, 'PROCESAR LA INFORMACIÃ“N DE ACUERDO A LAS REQUISICIONES Y PARÃMETROS ESTABLECIDOS POR LA EMPRESA.', 140),
	(42, 12, 'MOVILIZAR LA CARGA SEGÃšN PLAN DE RUTAS, NORMAS DE CONTROL, SEGURIDAD Y LA PROMESA DE SERVICIO.', 100),
	(43, 12, 'ALMACENAR LOS OBJETOS APLICANDO LAS TÃ‰CNICAS Y NORMAS DE SEGURIDAD E HIGIENE ESTABLECIDAS.', 120),
	(44, 12, 'PROMOVER LA INTERACCION IDONEA CONSIGO MISMO, CON LOS DEMAS Y CON LA NATURALEZA EN LOS CONTEXTOS LA', 160),
	(45, 12, 'COMPRENDER TEXTOS EN INGLÃ‰S EN FORMA ESCRITA Y AUDITIVA', 180),
	(46, 12, 'RESULTADOS DE APRENDIZAJE ETAPA PRACTICA', 880),
	(47, 13, 'PROCESAR LA INFORMACIÃ“N RECOLECTADA DE ACUERDO CON LOS MANUALES DE MANEJOS DE INFORMACIÃ“N.', 80),
	(48, 13, 'REALIZAR PROCESOS BÃSICOS PARA LA PRESTACIÃ“N DEL SERVICIO. (EQUIVALE A LA NORMA NTS 001 DEL MINCO', 140),
	(49, 13, 'ATENDER USUARIOS DE ACUERDO A POLÃTICAS DE SERVICIO. (EQUIVALE A LA NORMA NTS 002 DEL MINCOMERCIO,', 180),
	(50, 13, 'ORGANIZAR EVENTOS DE ACUERDO AL PORTAFOLIO DE SERVICIOS Y AL ESTUDIO DE MERCADO.', 240),
	(51, 13, 'PROMOVER LA INTERACCION IDONEA CONSIGO MISMO, CON LOS DEMAS Y CON LA NATURALEZA EN LOS CONTEXTOS LA', 160),
	(52, 13, 'COMPRENDER TEXTOS EN INGLÃ‰S EN FORMA ESCRITA Y AUDITIVA', 180),
	(53, 13, 'RESULTADOS DE APRENDIZAJE ETAPA PRACTICA', 880),
	(54, 14, 'PROYECTAR EL MERCADO DE ACUERDO CON EL TIPO DE PRODUCTO O SERVICIO Y CARACTERÃSTICAS DE LOS CONSUM', 140),
	(55, 14, 'PREPARAR LA EXHIBICIÃ“N DE PRODUCTOS Y SERVICIOS TENIENDO EN CUENTA SUS CARACTERÃSTICAS Y EL ESTIL', 140),
	(56, 14, 'PLANEAR ACTIVIDADES DE MERCADEO QUE RESPONDAN A LAS NECESIDADES Y EXPECTATIVAS DE LOS CLIENTES Y A', 200),
	(57, 14, 'NEGOCIAR PRODUCTOS Y SERVICIOS SEGÃšN CONDICIONES DEL MERCADO Y POLÃTICAS DE LA EMPRESA.', 180),
	(58, 14, 'IDENTIFICAR LOS COMPORTAMIENTOS DEL MERCADO SEGÃšN RESULTADOS DE LA INVESTIGACIÃ“N Y TENDENCIAS DEL', 100),
	(59, 14, 'PROMOVER LA INTERACCION IDONEA CONSIGO MISMO, CON LOS DEMAS Y CON LA NATURALEZA EN LOS CONTEXTOS LA', 160),
	(60, 14, 'COMPRENDER TEXTOS EN INGLÃ‰S EN FORMA ESCRITA Y AUDITIVA', 180),
	(61, 14, 'RESULTADOS DE APRENDIZAJE ETAPA PRACTICA', 880);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla dbsofirca.contrato_instructor: ~0 rows (aproximadamente)
DELETE FROM `contrato_instructor`;
/*!40000 ALTER TABLE `contrato_instructor` DISABLE KEYS */;
INSERT INTO `contrato_instructor` (`Cn_Id`, `Cn_NumContrato`, `Cn_CodInstructor`, `Cn_FechaInicio`, `Cn_FechaFin`, `Cn_EstadoContrato`, `Cn_CfId`, `Cn_SsCodConvenio`) VALUES
	(1, '1234', 1, '2019-11-09', '2019-11-30', '1', 1, 1),
	(2, '001-2019', 5, '2019-11-29', '2019-11-30', '1', 1, 1);
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla dbsofirca.convenios: ~5 rows (aproximadamente)
DELETE FROM `convenios`;
/*!40000 ALTER TABLE `convenios` DISABLE KEYS */;
INSERT INTO `convenios` (`Cv_Id`, `Cv_IdInstitucion`, `Cv_ConvenioMarco`, `Cv_ConvenioDerivado`, `Cv_EstadoConvenio`) VALUES
	(3, 2, 113, 4, '1'),
	(4, 1, 128, 6, '1'),
	(5, 4, 402, 2, '0'),
	(6, 5, 3, 310, '1'),
	(7, 3, 316, 2, '1');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla dbsofirca.detalle_informe: ~2 rows (aproximadamente)
DELETE FROM `detalle_informe`;
/*!40000 ALTER TABLE `detalle_informe` DISABLE KEYS */;
INSERT INTO `detalle_informe` (`Di_Id`, `Di_CvIdInstitucion`, `Di_IfId`, `Di_Anio`, `Di_Mes`, `Di_CodAdjunto`) VALUES
	(1, 3, 1, '2019', '12', 11),
	(2, 3, 1, '2019', '10', 12);
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

-- Volcando datos para la tabla dbsofirca.fichas: ~20 rows (aproximadamente)
DELETE FROM `fichas`;
/*!40000 ALTER TABLE `fichas` DISABLE KEYS */;
INSERT INTO `fichas` (`F_Id`, `F_CvId`, `F_PgId`, `F_FechaInicio`, `F_FechaFin`) VALUES
	(1864645, 3, 5, '2019-03-28', '2020-03-28'),
	(1864648, 4, 5, '2019-03-28', '2020-03-28'),
	(1864649, 3, 8, '2019-03-28', '2020-03-28'),
	(1864652, 5, 5, '2019-03-28', '2020-03-28'),
	(1864673, 7, 12, '2019-03-28', '2020-03-28'),
	(1864688, 3, 13, '2019-03-28', '2020-03-28'),
	(1864694, 5, 14, '2019-03-28', '2020-03-28'),
	(1864698, 5, 9, '2019-03-28', '2020-03-28'),
	(1864699, 7, 11, '2020-03-28', '2020-03-28'),
	(1864700, 4, 14, '2019-03-28', '2020-03-28'),
	(1864702, 6, 9, '2019-03-28', '2020-03-28'),
	(1864703, 5, 11, '2019-03-28', '2020-03-28'),
	(1864707, 4, 11, '2019-03-28', '2020-03-28'),
	(1864709, 4, 9, '2019-03-28', '2020-03-28'),
	(1864710, 6, 9, '2019-03-28', '2020-03-28'),
	(1864712, 3, 9, '2019-03-28', '2020-03-28'),
	(1864721, 7, 11, '2019-03-28', '2020-03-28'),
	(1864723, 6, 9, '2019-03-28', '2020-03-28'),
	(1867146, 6, 6, '2019-03-28', '2020-03-28'),
	(1867165, 6, 6, '2019-03-28', '2020-03-28');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla dbsofirca.instructor: ~4 rows (aproximadamente)
DELETE FROM `instructor`;
/*!40000 ALTER TABLE `instructor` DISABLE KEYS */;
INSERT INTO `instructor` (`In_Id`, `In_TipoDocumento`, `In_NumeroDocumento`, `In_Nombres`, `In_Apellidos`, `In_Telefono`, `In_EstudiosPregrado`, `In_NombreUniverdidad`, `In_FechaGrado`, `In_CodAdjunto`, `In_SsCodConvenio`) VALUES
	(1, 'CC', '12345678', 'JUAN DIEGO', 'SANDOVAL', '300300300', 'ADSI-23', 'SENA', '2019-11-11', 2, 1),
	(2, 'CC', '1143468062', 'PABLO', 'GONZALEZ', '300300300', 'NO TIENE', 'CUC', '2019-11-01', 4, 1),
	(3, 'CC', '1143468062', 'PABLO', 'GONZALEZ', '300300300', 'NO TIENE', 'CUC', '2019-11-01', 6, 1),
	(4, 'CC', '1143468062', 'PABLO', 'GONZALEZ', '300300300', 'NO TIENE', 'CUC', '2019-11-11', 7, 1),
	(5, 'CC', '1047361882', 'Leonardo', 'Arape', '303003030', 'tecnologo en ADSI', 'SENA', '2019-11-29', 13, 1);
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
	(2, '4 TRIMESTRE', '2019-11-23', '2019-11-23', 2019, 1),
	(3, '3 TRIMESTRE', '2019-11-25', '2019-11-25', 2019, 1),
	(5, '1 TRIMESTRE', '2019-11-01', '2019-11-15', 2020, 0),
	(7, '4 TRIMESTRE', '2019-11-20', '2019-11-20', 2021, 0);
/*!40000 ALTER TABLE `periodoacademico` ENABLE KEYS */;

-- Volcando estructura para tabla dbsofirca.programas
CREATE TABLE IF NOT EXISTS `programas` (
  `Pg_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pg_Nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Pg_CfId` int(11) NOT NULL,
  `Pg_CodAdjunto` int(11) NOT NULL,
  PRIMARY KEY (`Pg_Id`),
  KEY `Pg_CfId` (`Pg_CfId`),
  KEY `Pg_CodAdjunto` (`Pg_CodAdjunto`),
  CONSTRAINT `programas_ibfk_1` FOREIGN KEY (`Pg_CfId`) REFERENCES `centro_formacion` (`Cf_Id`),
  CONSTRAINT `programas_ibfk_2` FOREIGN KEY (`Pg_CodAdjunto`) REFERENCES `archivosadjuntos` (`Ad_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla dbsofirca.programas: ~8 rows (aproximadamente)
DELETE FROM `programas`;
/*!40000 ALTER TABLE `programas` DISABLE KEYS */;
INSERT INTO `programas` (`Pg_Id`, `Pg_Nombre`, `Pg_CfId`, `Pg_CodAdjunto`) VALUES
	(5, 'CONTABILIZACIÓN DE OPERACIONES COMERCIALES Y FINANCIERAS', 3, 9),
	(6, 'SISTEMAS', 1, 9),
	(8, 'ASESORIA COMERCIAL Y OPERACIONES DE ENTIDADES FINANCIERAS', 3, 9),
	(9, 'ASISTENCIA ADMINISTRATIVA', 3, 9),
	(11, 'ASISTENCIA EN ORGANIZACIÓN DE ARCHIVOS', 3, 9),
	(12, 'DESARROLLO DE OPERACIONES LOGÍSTICA EN LA CADENA DE ABASTECIMIENTO', 3, 9),
	(13, 'OPERACIÓN DE EVENTOS', 3, 9),
	(14, 'VENTA DE PRODUCTOS Y SERVICIOS', 3, 9),
	(15, 'ANALISIS Y DESARROLLO DE SISTEMAS DE INFORMACION', 1, 10);
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
) ENGINE=InnoDB AUTO_INCREMENT=1143468072 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla dbsofirca.usuarios: ~9 rows (aproximadamente)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`Us_Id`, `Us_Nombre`, `Us_Pass`, `Us_NSeguridad`, `Us_CvIdInstitucion`) VALUES
	(1, 'usuario', '1234', '3', 1),
	(123456789, 'Usuario', '8080', '2', NULL),
	(1143468062, 'Administrador', '2020', '1', NULL),
	(1143468066, '1047', '1234', '3', 2),
	(1143468067, '1047', '1234', '1', NULL),
	(1143468068, '1047', '1234', '1', NULL),
	(1143468069, '1047', '1234', '2', NULL),
	(1143468070, '1047', '1234', '3', 5),
	(1143468071, '1047', '1234', '1', NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
