-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 20, 2024 at 04:42 AM
-- Server version: 8.0.38
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appweb_caba2024_diario_digital`
--

-- --------------------------------------------------------

--
-- Table structure for table `autenticacion`
--

CREATE TABLE `autenticacion` (
  `id_autenticacion` int NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `contrasenia` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `autenticacion`
--

INSERT INTO `autenticacion` (`id_autenticacion`, `email`, `contrasenia`) VALUES
(11, 'admin@admin.com', 0x1f194824d68af976f5fb1e2ad7224073),
(27, 'franperiodista@diariodigital.com', 0xcb66fafc8218f6a3b84d5ff3287fe443),
(28, 'ana.garcia@diariodigital.com', 0x0785b503ce8e4d9ef46aed0804335e03),
(29, 'carlos.perez@diariodigital.com', 0x84f2a58e58df44b53d058c0f814a30b3),
(30, 'maria.lopez@diariodigital.com', 0x61066a162d040e41a4ba6b41ee46bf1e);

-- --------------------------------------------------------

--
-- Table structure for table `lector`
--

CREATE TABLE `lector` (
  `Id_lector` int NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `dni` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `celular` int NOT NULL,
  `autenticacion_id` int NOT NULL,
  `suscripcion_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nota_periodistica`
--

CREATE TABLE `nota_periodistica` (
  `id_nota_periodistica` int NOT NULL,
  `titulo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `contenido` MEDIUMTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_creacion` date NOT NULL,
  `periodista_id` int NOT NULL,
  `seccion_id` int NOT NULL,
  `imagen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `nota_periodistica`
--

INSERT INTO `nota_periodistica` (`id_nota_periodistica`, `titulo`, `contenido`, `fecha_creacion`, `periodista_id`, `seccion_id`, `imagen`) VALUES
(2, 'La tierna foto del reencuentro de Enzo Fernández con sus hijos tras separarse de Valentina Cervantes', 'El futbolista del Chelsea arribó al país para los encuentros por fecha FIFA con la selección argentina y compartió una imagen junto a Olivia y Benjamín.\r\nEnzo Fernández arribó al país de cara a los encuentros que disputará con la selección argentina correspondientes a la fecha FIFA frente a Paraguay, este jueves desde las 20:30 en el estadio Defensores del Chaco en Asunción, y ante Perú, el próximo martes 19 de noviembre a partir de las 21:30 en La Bombonera, el estadio de Boca Juniors. Los campeones del mundo lideran la tabla de posiciones con 22 puntos, seguidos por equipos como Colombia, Uruguay, Brasil, entre otros. En este contexto, el mediocampista del Chelsea de 23 años se manifestó por primera vez en sus redes sociales, luego de la separación de su pareja Valentina Cervantes tras siete años de relación. El ex jugador de River Plate compartió una tierna foto en blanco y negro junto a sus dos pequeños hijos, los tres recostados en el sillón y abrazados. El anuncio de la separación llegó en un momento complicado para Enzo Fernández, quien perdió su puesto en el Chelsea y enfrenta críticas de los hinchas, especialmente después de que el club inglés pagara 120 millones de euros por su pase desde el Benfica en enero de 2023. A pesar de ello, el jugador mostró su amor por sus hijos, Olivia de 4 años y Benjamín de 1, a través de una publicación en su cuenta de Instagram (@enzojfernandez), donde compartió una foto con ellos acompañada de varios corazones rojos. El futbolista comunicó a su esposa su deseo de “tener la vida que no tuvo”, ya que comenzó su relación con Valentina Cervantes a los 17 años y siente que se perdió de muchas experiencias propias de esa edad. Esta decisión dejó a Cervantes “muy triste”, según informó la periodista deportiva Julieta Argenta en el programa LAM de América TV. Mientras tanto, la ex pareja de Enzo regresó a Buenos Aires con sus hijos tras la separación y compartió un comunicado, expresando que siempre “van a ser familia”. Además, instó a no “crear guerras donde no las hay”.', '2024-11-13', 7, 9, NULL),
(3, 'Se viene el Martín Fierro de la Moda 2024: quiénes serán los conductores y el listado completo de nominados', 'La tercera edición de la ceremonia organizada por APTRA se realizará el 6 de diciembre y contará con el glamour y la presencia de grandes figuras de la industria fashionista.\r\nDe a poco la gran noche de la moda en televisión va cobrando forma. Los conductores dieron a conocer la lista oficial de nominados para los Martín Fierro de la Moda 2024. La fiesta, que se celebrará el 6 de diciembre y se podrá ver en la pantalla de Telefe, premiará diseñadores, fotógrafos, modelos, influencers y también tendrá en cuenta el estilo mostrado en las redes sociales.', '2024-11-13', 7, 9, NULL),
(5, 'La Justicia rechazó el pedido de libertad de Sergio Urribarri y el ex gobernador de Entre Ríos seguirá preso', 'El ex gobernador de Entre Ríos, Sergio Urribarri, continuará en prisión, luego de la condena que recibió por delitos de corrupción, incluyendo peculado y enriquecimiento ilícito. Así lo decidió la jueza de garantías del Poder Judicial entrerriano, Carola Bacaluzzo, luego de evaluar un habeas corpus presentado por la defensa del dirigente. La jueza determinó este miércoles 20 de noviembre, que el recurso era improcedente. “El habeas corpus no autoriza a sustituir una decisión de los jueces naturales”, argumentó. Luego dijo que la defensa del ex gobernador tiene otras vías para discutir el fallo condenatorio. “Pueden recurrir a la Sala Penal del Superior Tribunal de Justicia. Se puede instar a que los pasos procesales sean expeditivos. Un procedimiento abreviado”, sostuvo. La sentencia contra Urribarri también incluyó la inhabilitación perpetua para ejercer cargos públicos. La Cámara de Casación Penal de Paraná ordenó su detención este martes, luego de que la condena sea confirmada en distintas instancias. Por ese motivo, el ex gobernador fue alojado en Unidad Penal N°1 de Paraná. Inmediatamente, el abogado defensor de Urribarri, Leopoldo Cappa, solicitó la liberación de su representado a través de la presentación de un recurso de habeas corpus. “Entiendo que esta urgencia y motivación de las defensas en orden a resguardar el derecho a la libertad, podrá ser canalizado por las vías ordinarias. Considero que no existe un ataque ilegal que torne procedente la acción de habeas corpus. El habeas corpus incoado debe ser rechazado”, concluyó la jueza de garantías al expedirse sobre el planteo, durante la audiencia realizada esta tarde.
La decisión de la Cámara de Casación se conoció a través de un extenso documento de 74 páginas, en el cual se revocó un fallo anterior que había impuesto medidas restrictivas menos severas. Urribarri fue detenido en su residencia en Concordia y trasladado a un establecimiento del servicio penitenciario de Paraná. Junto a él, también fue detenido su cuñado, Juan Pablo Aguilera, quien enfrentará la misma pena.
', '2024-11-02', 8, 6, NULL),
(6, 'El futuro de la energía renovable', 'El auge de las energías renovables es una tendencia imparable. Analizamos su futuro en la matriz energética mundial.', '2024-11-01', 9, 8, NULL),
(7, 'Impacto de la tecnología en la educación', 'En este artículo se discuten las nuevas herramientas tecnológicas que están transformando la educación en el siglo XXI.', '2024-11-02', 9, 8, NULL),
(8, 'El cambio climático y sus efectos', 'El cambio climático continúa siendo una amenaza. En este artículo se profundiza en sus efectos y las medidas que se están tomando a nivel mundial.', '2024-11-01', 10, 10, NULL),
(9, 'Los avances en medicina moderna', 'Descubre los avances más recientes en la medicina moderna, que están revolucionando el tratamiento de enfermedades.', '2024-11-02', 10, 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `periodista`
--

CREATE TABLE `periodista` (
  `id_periodista` int NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `dni` int NOT NULL,
  `autenticacion_id` int NOT NULL,
  `seccion_id` int DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `periodista`
--

INSERT INTO `periodista` (`id_periodista`, `nombre`, `apellido`, `dni`, `autenticacion_id`, `seccion_id`, `activo`) VALUES
(4, 'Admin', 'Admin', 12345678, 11, NULL, 0),
(7, 'Franco', 'Seccaspina', 2147483647, 27, 10, 1),
(8, 'Ana', 'García', 12345678, 28, 6, 0),
(9, 'Carlos', 'Pérez', 23456789, 29, 8, 0),
(10, 'María', 'López', 34567890, 30, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `seccion`
--

CREATE TABLE `seccion` (
  `id_seccion` int NOT NULL,
  `nombre_seccion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `dia_publicacion` date NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `seccion`
--

INSERT INTO `seccion` (`id_seccion`, `nombre_seccion`, `dia_publicacion`, `activo`) VALUES
(6, 'Política', '2024-11-06', 0),
(7, 'Economía', '2024-11-06', 0),
(8, 'Deportes', '2024-11-06', 0),
(9, 'Dominical', '2024-11-06', 1),
(10, 'Cultura', '2024-11-06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `suscripcion`
--

CREATE TABLE `suscripcion` (
  `id_suscripcion` int NOT NULL,
  `tipo_suscripcion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `suscripcion`
--

INSERT INTO `suscripcion` (`id_suscripcion`, `tipo_suscripcion`) VALUES
(1, 'Iliminatado'),
(2, 'Dominical');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autenticacion`
--
ALTER TABLE `autenticacion`
  ADD PRIMARY KEY (`id_autenticacion`);

--
-- Indexes for table `lector`
--
ALTER TABLE `lector`
  ADD PRIMARY KEY (`Id_lector`),
  ADD KEY `autentifiacion_id` (`autenticacion_id`),
  ADD KEY `suscripcion_id` (`suscripcion_id`);

--
-- Indexes for table `nota_periodistica`
--
ALTER TABLE `nota_periodistica`
  ADD PRIMARY KEY (`id_nota_periodistica`),
  ADD KEY `periodista_id` (`periodista_id`),
  ADD KEY `seccion_id` (`seccion_id`);

--
-- Indexes for table `periodista`
--
ALTER TABLE `periodista`
  ADD PRIMARY KEY (`id_periodista`),
  ADD KEY `autenticacion_id` (`autenticacion_id`),
  ADD KEY `seccion_id` (`seccion_id`);

--
-- Indexes for table `seccion`
--
ALTER TABLE `seccion`
  ADD PRIMARY KEY (`id_seccion`);

--
-- Indexes for table `suscripcion`
--
ALTER TABLE `suscripcion`
  ADD PRIMARY KEY (`id_suscripcion`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autenticacion`
--
ALTER TABLE `autenticacion`
  MODIFY `id_autenticacion` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `lector`
--
ALTER TABLE `lector`
  MODIFY `Id_lector` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `nota_periodistica`
--
ALTER TABLE `nota_periodistica`
  MODIFY `id_nota_periodistica` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `periodista`
--
ALTER TABLE `periodista`
  MODIFY `id_periodista` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `seccion`
--
ALTER TABLE `seccion`
  MODIFY `id_seccion` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `suscripcion`
--
ALTER TABLE `suscripcion`
  MODIFY `id_suscripcion` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lector`
--
ALTER TABLE `lector`
  ADD CONSTRAINT `lector_ibfk_1` FOREIGN KEY (`autenticacion_id`) REFERENCES `autenticacion` (`id_autenticacion`),
  ADD CONSTRAINT `lector_ibfk_2` FOREIGN KEY (`suscripcion_id`) REFERENCES `suscripcion` (`id_suscripcion`);

--
-- Constraints for table `nota_periodistica`
--
ALTER TABLE `nota_periodistica`
  ADD CONSTRAINT `nota_periodistica_ibfk_1` FOREIGN KEY (`periodista_id`) REFERENCES `periodista` (`id_periodista`),
  ADD CONSTRAINT `nota_periodistica_ibfk_2` FOREIGN KEY (`seccion_id`) REFERENCES `seccion` (`id_seccion`);

--
-- Constraints for table `periodista`
--
ALTER TABLE `periodista`
  ADD CONSTRAINT `periodista_ibfk_1` FOREIGN KEY (`autenticacion_id`) REFERENCES `autenticacion` (`id_autenticacion`),
  ADD CONSTRAINT `periodista_ibfk_2` FOREIGN KEY (`seccion_id`) REFERENCES `seccion` (`id_seccion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
