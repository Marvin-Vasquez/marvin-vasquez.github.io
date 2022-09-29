-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-09-2022 a las 13:02:54
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
-- Base de datos: `bdd_itc_reports`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `nombreCurso` varchar(65) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id`, `nombreCurso`) VALUES
(101, 'Idioma Materno'),
(102, 'Matemática'),
(103, 'Ciencias Sociales y Formación Ciudadana'),
(104, 'Ciencias Naturales'),
(105, 'Idioma Extranjero Inglés'),
(106, 'Artes Industriales'),
(107, 'Educación para el Hogar'),
(108, 'Educación Física'),
(109, 'Formación Musical'),
(110, 'Artes Plásticas'),
(111, 'Programación Básica'),
(112, 'Danza y Expresión Corporal'),
(113, 'Contabilidad'),
(114, 'Tecnologías de la Información y Comunicación'),
(115, 'Teatro'),
(117, 'Banda Escolar'),
(118, 'Emprendimiento'),
(120, 'Programa de Lectura Progrentis'),
(121, 'Robótica'),
(122, 'Laboratorio De Ciencias Naturales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `carnet` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombreEncargado` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `correoEncargado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `idNivel` int(11) NOT NULL,
  `idSeccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`carnet`, `nombre`, `apellido`, `nombreEncargado`, `correoEncargado`, `idNivel`, `idSeccion`) VALUES
(2014051, 'Martiza Fernanda', 'Vásquez Chávez', 'santiago miguel vásquez castro', 'vas2014051@itc.edu.gt', 1, 2),
(2014188, 'Daniela Elizabeth', 'Arevalo Avila', 'silvia pamela arevalo avila', 'are2014188@itc.edu.gt', 3, 1),
(2015158, 'Karla Gabriela', 'Salazar Solís', 'carlos alberto salazar monzón', 'sal2015158@itc.edu.gt', 1, 2),
(2015229, 'Christopher André', 'Rodríguez Gálvez', 'jacquelin argelia gálvez', 'rod2015229@itc.edu.gt', 3, 1),
(2016191, 'José Eduardo', 'Orantes Borrayo', 'sussan melizza borrayo martinez', 'ora2016191@itc.edu.gt', 3, 1),
(2018109, 'Diego Javier', 'Díaz Gatica', 'josé mariano díaz herrera', 'dia2018109@gmail.com', 3, 1),
(2018138, 'Aarón Estuardo', 'Salvador Collado', 'cindy paola collado ramírez', 'sal2018138@itc.edu.gt', 3, 1),
(2018170, 'Henderick Ibrahim', 'Montecinos Linares', 'lilia lisbeth', 'mon2018170@itc.edu.gt', 3, 1),
(2018192, 'Daniell Jimena', 'López Jolon', 'raquel betzabe jolon morales', 'lop2018192@itc.edu.gt', 3, 1),
(2018198, 'Anthony Gabriel', 'Pérez González', 'mildred dalila gonzález solorzano', 'per2018198@itc.edu.gt', 3, 1),
(2018200, 'María Andrea Saraí', 'Pérez González', 'mildred dalila gonzález solorzano', 'per2018200@itc.edu.gt', 1, 2),
(2018219, 'Dulce María', 'Mazariegos Cetino', 'brenda lisbeth cetino escobar', 'maz2018219@itc.edu.gt', 3, 1),
(2019013, 'Rodrigo Nicolas', 'Boron Hernández', 'nicolas boron', 'bor2019013@itc.edu.gt', 1, 2),
(2019014, 'Alex Andrés', 'De León Pich', 'teresa pich cuxulic', 'del2019014@itc.edu.gt', 3, 1),
(2019017, 'María De Lourdes', 'Mendía Alvarado', 'rita yolanda alvarado paniagua', 'men2019017@itc.edu.gt', 3, 1),
(2019141, 'Sandra Aimar Mishell', 'Matzar Chic', 'santos chic castro', 'mat2019141@itc.edu.gt', 3, 1),
(2019165, 'Martin Santiago', 'Contreras Ramírez', 'felisa del rosario ramírez sánchez', 'con2019165@itc.edu.gt', 3, 1),
(2020004, 'Marcela Abigail', 'Balcarcel Araujo', 'maura viviana araujo ortiz', 'bal2020004@itc.edu.gt', 3, 1),
(2020009, 'Jazmin Alejandra', 'Perez Mendoza', 'amaliga judith mendoza cucul', 'per2020009@itc.edu.gt', 3, 1),
(2020015, 'Leticia María De Los Ángeles', 'López Calderón', 'josé luis lópez', 'lop2020015@itc.edu.gt', 3, 1),
(2020019, 'Diana Salomé', 'Rucun Castañeda', 'laudy judith castañeda marroquin', 'ruc2020019@itc.edu.gt', 3, 1),
(2020039, 'Sofia Alejandra', 'Hernández Xoná', 'marcio dagoberto hernández zepeda', 'her2020039@itc.edu.gt', 3, 1),
(2020052, 'Ethan Andre', 'Ovalle Toledo', 'roger federico ovalle moreno', 'ova2020052@itc.edu.gt', 3, 1),
(2020053, 'Dulce Esperanza', 'Cruz Gudiel', 'sonia paola gudiel sacalxot', 'cru2020053@itc.edu.gt', 3, 1),
(2020102, 'Bridgeth Jimena', 'Gallo Monterroso', 'maría yolanda monterroso blanco', 'gal2020102@itc.edu.gt', 1, 2),
(2020116, 'Diddier Alessandro', 'Contreras Miranda', 'estrella de maría miranda balcárcel', 'con2020116@itc.edu.gt', 3, 1),
(2020125, 'Leandro Josué', 'Pérez Calderón', 'yessica esmeralda calderón valdez', 'per2020125@itc.edu.gt', 3, 1),
(2020133, 'Jonathan Miguel', 'Castro Vásquez', 'manuel rebelión castro ordoñez', 'cas2020133@itc.edu.gt', 3, 1),
(2020181, 'Angel David', 'Barrios Barrios', 'virginia del carmen barrios morales', '2020181@itc.edu.gt', 3, 1),
(2021001, 'Angelinne Keiga Guicela', 'González Guillén', 'flor de maría guillén barrios', 'gon2021001@itc.edu.gt', 3, 1),
(2021006, 'Cristian Rafael', 'Hernández Argueta', 'olga elizabeth argueta', 'her2021006@itc.edu.gt', 1, 2),
(2021008, 'Nathalie Samantha', 'Mendoza Morales', 'estela elizabeth lópez morales de mendoza', 'men2021008@itc.edu.gt', 1, 2),
(2021024, 'Estefany Danai', 'Oliva Mendoza', 'kemly valeska mendoza chon', 'oli2021024@itc.edu.gt', 1, 1),
(2021108, 'Adriana Camila', 'Ochoa Estrada', 'hector eduardo ochoa pacay', 'och2021108@itc.edu.gt', 1, 2),
(2022002, 'Jefferson Geovanny', 'Juárez Ruano', 'eddy geovanny juárez ruano', 'jua2022002@itc.edu.gt', 1, 1),
(2022004, 'Harold Enrique', 'López Serrano', 'lesvia nohemi serrano rueda', 'lop2022004@itc.edu.gt', 1, 2),
(2022026, 'Ana Ximena', 'Hernández Muñoz', 'german eduardo hernández velázquez', 'her2022026@itc.edu.gt', 1, 1),
(2022029, 'Karla Betzabé', 'Osorio Dávila', 'catherine stefany osorio dávila', 'oso2022029@itc.edu.gt', 3, 1),
(2022033, 'Mandy Michelle', 'Ramirez Herrera', 'ana lucia herrera hernández de ramirez', 'ram2022033@itc.edu.gt', 1, 1),
(2022041, 'Victor Antonio', 'Dardon Del Cid', 'ricardo antonio dardon rodríguez', 'dar2022041@itc.edu.gt', 1, 2),
(2022051, 'Kevin Emilio', 'Mateo Albizures', 'ana maría albizures veliz', 'mat2022051@itc.edu.gt', 1, 1),
(2022057, 'Dafne Jimena', 'Ovalle Toledo', 'roger federico ovalle moreno', 'ova2022057@itc.edu.gt', 1, 2),
(2022063, 'Daniel Alejandro', 'Morales Artiga', 'aura mariana venerisi artiga tobar', 'mor2022063@itc.edu.gt', 1, 2),
(2022068, 'David Ricardo', 'Mazariegos Cetino', 'werner estuardo mazariegos solorsano', 'maz2022068@itc.edu.gt', 1, 1),
(2022071, 'Eleazar Jezrael', 'Guzmán De León', 'olga janeth de león juarez', 'guz2022071@itc.edu.gt', 1, 1),
(2022075, 'Jhonatan Alexander', 'Alvizures Pivaral', 'mayra azucena gonzales pivaral', 'alv2022075@itc.edu.gt', 1, 1),
(2022078, 'Diego Sebastian', 'Del Cid Guevara', 'melvin rafael del cid palacios', 'del2022078@itc.edu.gt', 1, 1),
(2022083, 'Brayan Sebastian', 'Rodas Barrios', 'mayra patricia barrios aguilar', 'rod2022083@itc.edu.gt', 1, 1),
(2022100, 'Rodrigo Javier', 'Monroy Aldana', 'sandra gabriela; aldana espino', 'mon2022100@itc.edu.gt', 3, 1),
(2022108, 'Ashley Betzaida', 'Bran Hernández', 'arlin camelia hernández puac de bran', 'bra2022108@itc.edu.gt', 1, 1),
(2022112, 'Santiago Dariel', 'Vides Alvarado', 'cecilia analí alvarado ayala', 'vid2022112@itc.edu.gt', 1, 1),
(2022121, 'Wendy Abigail', 'Monroy Orantes', 'mirna janeth orantes ramirez', '2022121@itc.edu.gt', 1, 1),
(2022125, 'Axel Fernando', 'Franco Martínez', 'dalia azucena martínez martínez', 'fra2022125@itc.edu.gt', 3, 1),
(2022127, 'Marcos Damián', 'Ixquiac Guillén', 'juan carlos ixquiac mejia', 'ixq2022127@itc.edu.gt', 1, 2),
(2022132, 'Santiago Andrés', 'Gómez Castro', 'jeanny betzabe castro godinez', 'gom2022132@itc.edu.gt', 1, 1),
(2022134, 'Diego Alexander', 'Mazariegos Barillas', 'elida barillas argentina de león', 'maz2022134@itc.edu.gt', 1, 2),
(2022136, 'Stephanie Roxana', 'Bal Gonzalez', 'rita yolanda alvarado paniagua', 'men2019017@itc.edu.gt', 3, 1),
(2022141, 'Angi Daniela', 'Olivares Reyna', 'angela isaura reyna diaz', 'oli2022141@itc.edu.gt', 1, 1),
(2022142, 'Rene Alexander', 'Galicia Choc', 'nidia judith choc lópez', 'gal2022142@itc.edu.gt', 1, 1),
(2022144, 'Santiago José David', 'López Jimenez', 'jessica elizabet jimenez morales', 'lop2022144@itc.edu.gt', 1, 1),
(2022154, 'Jean Paolo', 'Castillo De La Cruz', 'hellen iliana de la cruz marroquín', 'cas2022154@itc.edu.gt', 1, 1),
(2022155, 'Marjorie Natalia', 'Beteta Maldonado', 'handy ester maldonado galvez', 'bet2022155@itc.edu.gt', 1, 2),
(2022166, 'Kenneth Alessandro', 'Jiménez Padilla', 'zuemy johana padilla', 'jim2022166@itc.edu.gt', 1, 2),
(2022177, 'Jacqueline Anette', 'López Morales', 'william marcelino lópez velázquez', 'lop2022177@itc.edu.gt', 1, 2),
(2022195, 'José Daniel', 'Guillén Chinol', 'crisanta gabriel matias', 'gui2022195@itc.edu.gt', 3, 1),
(2022205, 'Mateo', 'Toro Montoya', 'monica liliana montoya munera', 'tor2022205@itc.edu.gt', 3, 1),
(2022216, 'Daniela Sofia', 'Álvarez Pineda', 'luz angelica pineda secaida', 'alv2022216@itc.edu.gt', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE `nivel` (
  `id` int(11) NOT NULL,
  `nombreNivel` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`id`, `nombreNivel`) VALUES
(1, '1ro básico'),
(2, '2do básico'),
(3, '3ro básico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `record`
--

CREATE TABLE `record` (
  `id` int(11) NOT NULL,
  `idUnidad` int(11) NOT NULL,
  `carnetEstudiante` int(11) NOT NULL,
  `idGrado` int(11) NOT NULL,
  `idCurso` int(11) NOT NULL,
  `motivoReporte` text COLLATE utf8_spanish_ci NOT NULL,
  `planMejora` text COLLATE utf8_spanish_ci NOT NULL,
  `fechaReporte` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `record`
--

INSERT INTO `record` (`id`, `idUnidad`, `carnetEstudiante`, `idGrado`, `idCurso`, `motivoReporte`, `planMejora`, `fechaReporte`) VALUES
(1, 4, 2020181, 3, 102, 'No realizo examen corto.', '', '2022-09-19'),
(2, 4, 2022216, 1, 102, 'No realizo examen corto.', '', '2022-09-19'),
(3, 4, 2022041, 1, 102, 'No realizo examen corto.', '', '2022-09-19'),
(4, 4, 2020102, 1, 102, 'No realizo examen corto.', '', '2022-09-19'),
(5, 4, 2018109, 3, 109, 'No presento instrumento en clase', '', '2022-09-19'),
(6, 4, 2020116, 3, 109, 'No presento instrumento en clase', '', '2022-09-19'),
(7, 4, 2019013, 1, 113, 'No entrego laboratorio 5', 'tiene hasta el 23 de septiembre para entregarlo', '2022-09-19'),
(8, 4, 2019013, 1, 104, 'No entrego tarea 5', 'debe entregar antes del 26 de septiembre sobre el 75% de la nota', '2022-09-19'),
(9, 4, 2018192, 3, 114, 'No completo el examen testing 2 de Power Point', 'Debe entregar completo por correo electrónico a mas tardar el 25 de septiembre', '2022-09-19'),
(10, 4, 2018109, 3, 114, 'No completo el examen testing 2 de Power Point', 'Debe entregar completo por correo electrónico a mas tardar el 25 de septiembre', '2022-09-19'),
(11, 4, 2018109, 3, 121, 'No entrego laboratorio 3', 'Debe reponer la clase el lunes 25 de septiembre', '2022-09-19'),
(12, 4, 2021001, 3, 101, 'No entregaron actividad de la página 85 del libro.', 'Debe completar la actividad para el 26 de septiembre sobre el 75% de la nota', '2022-09-19'),
(13, 4, 2022205, 3, 101, 'No entregaron actividad de la página 85 del libro.', 'Debe completar la actividad para el 26 de septiembre sobre el 75% de la nota', '2022-09-19'),
(14, 4, 2020133, 3, 101, 'No entrego tarea 6', 'Puede entregar hasta el 23 de septiembre', '2022-09-21'),
(15, 4, 2022195, 3, 101, 'No entrego tarea 6', 'Puede entregar hasta el 23 de septiembre', '2022-09-21'),
(16, 4, 2022136, 3, 101, 'No entrego tarea 6', 'Puede entregar hasta el 23 de septiembre', '2022-09-21'),
(17, 4, 2019014, 3, 101, 'No entrego tarea 6', 'Puede entregar hasta el 23 de septiembre', '2022-09-21'),
(18, 4, 2016191, 3, 101, 'No entrego tarea 6', 'Puede entregar hasta el 23 de septiembre', '2022-09-21'),
(19, 4, 2018200, 1, 113, 'No entregaron tarea 7 de listado de cuentas', 'Puede entregar hasta el 23 de septiembre sobre el 70% de la nota', '2022-09-21'),
(20, 4, 2022063, 1, 113, 'No entregaron tarea 7 de listado de cuentas', 'Puede entregar hasta el 23 de septiembre sobre el 70% de la nota', '2022-09-21'),
(21, 4, 2022166, 1, 113, 'No entregaron tarea 7 de listado de cuentas', 'Puede entregar hasta el 23 de septiembre sobre el 70% de la nota', '2022-09-21'),
(22, 4, 2022075, 1, 114, 'No entregaron captura de pantalla del Testing 2 de Gmetrix', 'Debe entregarlo a mas tardar el 23 de septiembre en aula virtual.', '2022-09-21'),
(23, 4, 2022068, 1, 114, 'No entregaron captura de pantalla del Testing 2 de Gmetrix', 'Debe entregarlo a mas tardar el 23 de septiembre en aula virtual.', '2022-09-21'),
(24, 4, 2022075, 1, 101, 'No presento libro para la actividad en clase', '', '2022-09-21'),
(25, 4, 2018200, 1, 108, 'No entro a clase, no se tuvo ninguna autorización para la ausencia.', '', '2022-09-21'),
(26, 4, 2021008, 1, 104, 'No entregaron tarea 6 sobre la investigación del proceso celular', 'Debe entregar por correo electrónico a mas tardar el 24 de septiembre', '2022-09-21'),
(27, 4, 2022166, 1, 104, 'No entregaron tarea 6 sobre la investigación del proceso celular', 'Debe entregar por correo electrónico a mas tardar el 24 de septiembre', '2022-09-21'),
(28, 4, 2018200, 1, 104, 'No entregaron tarea 6 sobre la investigación del proceso celular', 'Debe entregar por correo electrónico a mas tardar el 24 de septiembre', '2022-09-21'),
(29, 4, 2022075, 1, 102, 'No completaron el examen corto 4', '', '2022-09-21'),
(30, 4, 2022142, 1, 102, 'No completaron el examen corto 4', '', '2022-09-21'),
(31, 4, 2022112, 1, 102, 'No completaron el examen corto 4', '', '2022-09-21'),
(32, 4, 2022033, 1, 102, 'No completaron el examen corto 4', '', '2022-09-21'),
(33, 4, 2022075, 1, 111, 'No entrego laboratorio 5', 'Puede entregar hasta el 23 de septiembre', '2022-09-21'),
(34, 4, 2022142, 1, 111, 'No entrego laboratorio 5', 'Puede entregar hasta el 23 de septiembre', '2022-09-21'),
(35, 4, 2022033, 1, 111, 'No entrego laboratorio 5', 'Puede entregar hasta el 23 de septiembre', '2022-09-21'),
(36, 4, 2022112, 1, 111, 'No entrego laboratorio 5', 'Puede entregar hasta el 23 de septiembre', '2022-09-21'),
(37, 4, 2022142, 1, 111, 'No entrego laboratorio 5', 'Puede entregar hasta el 23 de septiembre', '2022-09-21'),
(39, 4, 2022142, 1, 121, 'No ingreso a la clase', '', '2022-09-21'),
(40, 4, 2022112, 1, 121, 'No ingreso a la clase', '', '2022-09-21'),
(41, 4, 2022075, 1, 121, 'No ingreso a la clase', '', '2022-09-21'),
(43, 4, 2022033, 1, 121, 'No ingreso a la clase', '', '2022-09-21'),
(44, 4, 2022142, 1, 121, 'No ingreso a la clase', '', '2022-09-21'),
(45, 4, 2022177, 1, 121, 'No ingreso a la clase', '', '2022-09-21'),
(46, 4, 2022075, 1, 121, 'Se anulo el examen corto por estar copiando con otro compañero', '', '2022-09-21'),
(47, 4, 2022142, 1, 121, 'Se anulo el examen corto por estar copiando con otro compañero', '', '2022-09-21'),
(48, 4, 2022112, 1, 121, 'Se anulo el examen corto por estar copiando con otro compañero', '', '2022-09-21'),
(49, 4, 2022142, 1, 121, 'Se anulo el examen corto por estar copiando con otro compañero', '', '2022-09-21'),
(51, 4, 2022033, 1, 121, 'Se anulo el examen corto por estar copiando con otro compañero', '', '2022-09-21'),
(52, 4, 2022177, 1, 121, 'Se anulo el examen corto por estar copiando con otro compañero', '', '2022-09-21'),
(53, 4, 2022078, 1, 121, 'Se anulo el examen corto por estar copiando con otro compañero', '', '2022-09-21'),
(54, 4, 2021024, 1, 121, 'Se anulo el examen corto por estar copiando con otro compañero', '', '2022-09-21'),
(55, 4, 2022075, 1, 111, 'No entrego laboratorio 6', 'Debe entregar a mas tardar 23 de septiembre por correo electrónico', '2022-09-21'),
(56, 4, 2022142, 1, 111, 'No entrego laboratorio 6', 'Debe entregar a mas tardar 23 de septiembre por correo electrónico', '2022-09-21'),
(57, 4, 2022112, 1, 111, 'No entrego laboratorio 6', 'Debe entregar a mas tardar 23 de septiembre por correo electrónico', '2022-09-21'),
(59, 4, 2022033, 1, 111, 'No entrego laboratorio 6', 'Debe entregar a mas tardar 23 de septiembre por correo electrónico', '2022-09-21'),
(60, 4, 2022142, 1, 111, 'No entrego laboratorio 6', 'Debe entregar a mas tardar 23 de septiembre por correo electrónico', '2022-09-21'),
(61, 4, 2022177, 1, 111, 'No entrego laboratorio 6', 'Debe entregar a mas tardar 23 de septiembre por correo electrónico', '2022-09-21'),
(62, 4, 2022078, 1, 111, 'No entrego laboratorio 6', 'Debe entregar a mas tardar 23 de septiembre por correo electrónico', '2022-09-21'),
(63, 4, 2021024, 1, 111, 'No entrego laboratorio 6', 'Debe entregar a mas tardar 23 de septiembre por correo electrónico', '2022-09-21'),
(65, 4, 2022075, 1, 114, 'reporte 1', 'puede mejorar', '2022-09-23'),
(66, 4, 2022078, 1, 114, 'reporte 1', 'puede mejorar', '2022-09-23'),
(67, 4, 2022155, 1, 114, 'No completaron laboratorio 6', '', '2022-09-23'),
(68, 4, 2018200, 1, 114, 'No completaron laboratorio 6', '', '2022-09-23'),
(69, 4, 2022155, 1, 114, 'No completaron laboratorio 6', '', '2022-09-23'),
(70, 4, 2018200, 1, 114, 'No completaron laboratorio 6', '', '2022-09-23'),
(71, 4, 2022132, 1, 114, 'Estaba jugando en clase, fue retirado del salón.', '', '2022-09-23'),
(72, 4, 2022033, 1, 109, 'No presentaron instrumento melodica.', '', '2022-09-23'),
(73, 4, 2022132, 1, 109, 'No presentaron instrumento melodica.', '', '2022-09-23'),
(74, 4, 2022075, 1, 109, 'No presentaron instrumento melodica.', '', '2022-09-23'),
(75, 4, 2022154, 1, 121, 'no entro a clase', '', '2022-09-23'),
(76, 4, 2019014, 3, 122, 'No entrego reporte 4', '', '2022-09-23'),
(77, 4, 2019141, 3, 102, 'Entregaron tarea copiada', '', '2022-09-23'),
(78, 4, 2019165, 3, 102, 'Entregaron tarea copiada', '', '2022-09-23'),
(79, 4, 2019014, 3, 113, 'No entrego tarea 8', '', '2022-09-23'),
(80, 4, 2022154, 1, 103, 'estuvo molestando a sus compañeros en clase y no trabajo.', '', '2022-09-23'),
(81, 4, 2022154, 1, 114, 'No ha entregado los dos exámenes testing de Gmetrix, perdió 15 pts de zona.', 'Puede entregar las capturas de pantalla de los resultados a mas tardar el 29 de septiembre.', '2022-09-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportediario`
--

CREATE TABLE `reportediario` (
  `correlativo` int(11) NOT NULL,
  `idGrado` int(11) NOT NULL,
  `idCurso` int(11) NOT NULL,
  `carnet` int(11) NOT NULL,
  `motivoReporte` text COLLATE utf8_spanish_ci NOT NULL,
  `planMejora` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechaReporte` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `reportediario`
--

INSERT INTO `reportediario` (`correlativo`, `idGrado`, `idCurso`, `carnet`, `motivoReporte`, `planMejora`, `fechaReporte`) VALUES
(1, 1, 121, 2022154, 'no entro a clase', '', '2022-09-23'),
(2, 3, 122, 2019014, 'No entrego reporte 4', '', '2022-09-23'),
(3, 3, 102, 2019141, 'Entregaron tarea copiada', 'No aplica', '2022-09-23'),
(4, 3, 102, 2019165, 'Entregaron tarea copiada', '', '2022-09-23'),
(5, 3, 113, 2019014, 'No entrego tarea 8', '', '2022-09-23'),
(6, 1, 103, 2022154, 'estuvo molestando a sus compañeros en clase y no trabajo.', '', '2022-09-23');

--
-- Disparadores `reportediario`
--
DELIMITER $$
CREATE TRIGGER `save_report` BEFORE INSERT ON `reportediario` FOR EACH ROW INSERT INTO record(idUnidad,carnetEstudiante,idGrado,idCurso,motivoReporte,planMejora,fechaReporte) VALUES (4,NEW.carnet,NEW.idGrado,NEW.idCurso,NEW.motivoReporte,NEW.planMejora,NEW.fechaReporte)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(2) NOT NULL,
  `tipo` varchar(15) CHARACTER SET utf8mb4 NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `tipo`, `descripcion`) VALUES
(1, 'Administrador', 'Tiene permisos sobre todos los módulos del sistema'),
(2, 'Docente', 'Puede emitir reportes de estudiantes'),
(3, 'Auxiliar', 'Puede consultar el récord académico de los estudiantes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE `seccion` (
  `id` int(11) NOT NULL,
  `nombreSeccion` varchar(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`id`, `nombreSeccion`) VALUES
(1, 'A'),
(2, 'B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE `unidad` (
  `id` int(11) NOT NULL,
  `nombreUnidad` varchar(8) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`id`, `nombreUnidad`) VALUES
(1, 'Unidad 1'),
(2, 'Unidad 2'),
(3, 'Unidad 3'),
(4, 'Unidad 4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `apellido` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `username` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `correo` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(75) CHARACTER SET utf8mb4 NOT NULL,
  `token` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_rol` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `username`, `correo`, `password`, `token`, `tipo_rol`) VALUES
(1, 'Marvin Alexander', 'Vásquez Crispín', 'mvasquez', 'marvinvasquez@itc.edu.gt', '52ee3ddee37d88e951419fea6737965bb0b191df2be46b04daa16e3a57277aaf', '', 1),
(3, 'Amilcar Josué', 'Arrivillaga Benito', 'aarrivillaga', 'coordinacion.acad@itc.edu.gt', '968c2ae00a4f61b9085c1a1aa09ce2bf1da17c92a6f2eb056b431a706fb024d4', NULL, 1),
(5, 'Cristian Edgardo', 'Monterroso Montenegro', 'cmonterroso', 'cristianmonterroso@itc.edu.gt', '003ef3aa546adf854b326829b62a1e205e1b2a4bb83c8e3c0eaaf791af73f4b1', NULL, 2),
(6, 'Nathaly Elizabeth', 'Batz Sarat', 'nbatz', 'nathalybatz@itc.edu.gt', '6b95552124a91a5516fd24fdf790199bc8f2cc5862bf30623dc90de0d34a89c0', NULL, 2),
(8, 'Dulce María', 'Chinchilla Godoy', 'dchinchilla', 'coordinacion@itc.edu.gt', '0c2187f490d75bd3ec3c282e82f9b3f7edb315e60b26f0a266604623b83d6dd7', NULL, 1),
(10, 'Cristina Janett', 'Sente Ruiz', 'csente', 'cristinasente@itc.edu.gt', '5ab2d0d799e8bf93b569d6d6566a9977db152677cb1a69e92a55a3857e261128', NULL, 2),
(11, 'Eric Eleazar', 'Mendoza Mollineros', 'emendoza', 'ericmendoza@itc.edu.gt', '57cbbc025bd00133a567a072921a0ae6fa4321ff3be43467d8d1ad8e68b5c5fc', NULL, 2),
(12, 'María Isabel', 'Turcios Matias', 'mturcios', 'isabelturcios@itc.edu.gt', 'ee879e296f5a90c7681b10211fedccd4d26b5576b8a7c88a0508edc7f770d855', NULL, 2),
(13, 'Brenda Marilú', 'Méndez Vidal', 'bmendez', 'brendamendez@itc.edu.gt', '186c60d34f5fd074cb2c14e861b61869527fc28dc97d853f80c0f3388c2f2bda', NULL, 2),
(14, 'Etna Paola', 'Del Cid Diaz', 'edelcid', 'etnadelcid@itc.edu.gt', 'da3619976f784c353e8ee2d0f6cf86086a9199c3d1fdeb50621a8ce5d0da0643', NULL, 2),
(15, 'Alejandra Noemí', 'Flores Espinoza De Santa María', 'aflores', 'alejandraflores@itc.edu.gt', 'd20f7b7ef26d1b4e482fbcd1c06df52432a17f5829ba1f2bd883cec4bbd372e5', NULL, 2),
(16, 'Jeannette Melani', 'Moran Quevedo', 'mmoran', 'melanimoran@itc.edu.gt', '1d3989a36c9889edd56d460d3e3392449cb7cdc7611819f2dd936c90964980aa', NULL, 3),
(17, 'Claudia Cayetana', 'Ascuc Ruche', 'cascuc', 'ingles@itc.edu.gt', 'dcc0578a289845cf3e4705545a012b509651757de2222f36dd2dab841569eef9', NULL, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`carnet`),
  ADD KEY `fk_estudiante_nivel` (`idNivel`),
  ADD KEY `fk_estudiante_seccion` (`idSeccion`);

--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_record_unidad` (`idUnidad`),
  ADD KEY `fk_nivel_unidad` (`idGrado`),
  ADD KEY `fk_record_curso` (`idCurso`),
  ADD KEY `fk_record_estudiante` (`carnetEstudiante`);

--
-- Indices de la tabla `reportediario`
--
ALTER TABLE `reportediario`
  ADD PRIMARY KEY (`correlativo`),
  ADD KEY `fk_reporte_grado` (`idGrado`),
  ADD KEY `fk_reporte_curso` (`idCurso`),
  ADD KEY `fk_reporte_estudiante` (`carnet`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alias` (`username`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `nivel`
--
ALTER TABLE `nivel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `record`
--
ALTER TABLE `record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `reportediario`
--
ALTER TABLE `reportediario`
  MODIFY `correlativo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `fk_estudiante_nivel` FOREIGN KEY (`idNivel`) REFERENCES `nivel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_estudiante_seccion` FOREIGN KEY (`idSeccion`) REFERENCES `seccion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `fk_nivel_unidad` FOREIGN KEY (`idGrado`) REFERENCES `nivel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_record_curso` FOREIGN KEY (`idCurso`) REFERENCES `curso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_record_estudiante` FOREIGN KEY (`carnetEstudiante`) REFERENCES `estudiante` (`carnet`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_record_unidad` FOREIGN KEY (`idUnidad`) REFERENCES `unidad` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reportediario`
--
ALTER TABLE `reportediario`
  ADD CONSTRAINT `fk_reporte_curso` FOREIGN KEY (`idCurso`) REFERENCES `curso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reporte_estudiante` FOREIGN KEY (`carnet`) REFERENCES `estudiante` (`carnet`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reporte_grado` FOREIGN KEY (`idGrado`) REFERENCES `nivel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `limpiarReportesDiarios` ON SCHEDULE EVERY '0 1' DAY_HOUR STARTS '2022-09-19 21:50:00' ENDS '2022-10-31 18:21:00' ON COMPLETION PRESERVE ENABLE COMMENT 'Limpiar tabla de reporte diario' DO TRUNCATE reportediario$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
