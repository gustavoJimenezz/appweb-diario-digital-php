-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2024 a las 20:48:31
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `appweb_caba2024_diario_digital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autenticacion`
--

CREATE TABLE `autenticacion` (
  `id_autenticacion` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contrasenia` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `autenticacion`
--

INSERT INTO `autenticacion` (`id_autenticacion`, `email`, `contrasenia`) VALUES
(11, 'admin@admin.com', 0x1f194824d68af976f5fb1e2ad7224073),
(27, 'franperiodista@diariodigital.com', 0xcb66fafc8218f6a3b84d5ff3287fe443),
(28, 'ana.garcia@diariodigital.com', 0x0785b503ce8e4d9ef46aed0804335e03),
(29, 'carlos.perez@diariodigital.com', 0x84f2a58e58df44b53d058c0f814a30b3),
(30, 'maria.lopez@diariodigital.com', 0x61066a162d040e41a4ba6b41ee46bf1e),
(31, 'lucasperiodista1@gmail.comdiariodigital.com', 0xbd8ee2aefa135dec977bc0d886f24cc9),
(32, 'lucaslector1@diariodigital.comdiariodigital.com', 0xbd8ee2aefa135dec977bc0d886f24cc9),
(33, 'francoperiodista@diariodigital.com', 0xbd8ee2aefa135dec977bc0d886f24cc9),
(34, 'lucaselmalditoperiodista@diariodigital.com', 0xbd8ee2aefa135dec977bc0d886f24cc9),
(35, 'lufrancolu@gmail.com', 0xbd8ee2aefa135dec977bc0d886f24cc9),
(36, 'periodistapt@gmail.com', 0xbd8ee2aefa135dec977bc0d886f24cc9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lector`
--

CREATE TABLE `lector` (
  `Id_lector` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `celular` int(11) NOT NULL,
  `autenticacion_id` int(11) NOT NULL,
  `suscripcion_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `lector`
--

INSERT INTO `lector` (`Id_lector`, `nombre`, `apellido`, `dni`, `celular`, `autenticacion_id`, `suscripcion_id`) VALUES
(16, 'Lucas', 'lector', '45689330', 1165830511, 35, 1),
(17, 'lucas', 'periodistapt', '323123', 1165830511, 36, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_periodistica`
--

CREATE TABLE `nota_periodistica` (
  `id_nota_periodistica` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `contenido` mediumtext NOT NULL,
  `fecha_creacion` date NOT NULL,
  `periodista_id` int(11) NOT NULL,
  `seccion_id` int(11) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `nota_periodistica`
--

INSERT INTO `nota_periodistica` (`id_nota_periodistica`, `titulo`, `contenido`, `fecha_creacion`, `periodista_id`, `seccion_id`, `imagen`) VALUES
(2, 'La tierna foto del reencuentro de Enzo Fernández con sus hijos tras separarse de Valentina Cervantes', 'La tierna foto del reencuentro de Enzo Fernández con sus hijos tras separarse de Valentina Cervantes\', \'El futbolista del Chelsea arribó al país para los encuentros por fecha FIFA con la selección argentina y compartió una imagen junto a Olivia y Benjamín.\\r\\nEnzo Fernández arribó al país de cara a los encuentros que disputará con la selección argentina correspondientes a la fecha FIFA frente a Paraguay, este jueves desde las 20:30 en el estadio Defensores del Chaco en Asunción, y ante Perú, el próximo martes 19 de noviembre a partir de las 21:30 en La Bombonera, el estadio de Boca Juniors. Los campeones del mundo lideran la tabla de posiciones con 22 puntos, seguidos por equipos como Colombia, Uruguay, Brasil, entre otros. En este contexto, el mediocampista del Chelsea de 23 años se manifestó por primera vez en sus redes sociales, luego de la separación de su pareja Valentina Cervantes tras siete años de relación. El ex jugador de River Plate compartió una tierna foto en blanco y negro junto a sus dos pequeños hijos, los tres recostados en el sillón y abrazados. El anuncio de la separación llegó en un momento complicado para Enzo Fernández, quien perdió su puesto en el Chelsea y enfrenta críticas de los hinchas, especialmente después de que el club inglés pagara 120 millones de euros por su pase desde el Benfica en enero de 2023. A pesar de ello, el jugador mostró su amor por sus hijos, Olivia de 4 años y Benjamín de 1, a través de una publicación en su cuenta de Instagram (@enzojfernandez), donde compartió una foto con ellos acompañada de varios corazones rojos. El futbolista comunicó a su esposa su deseo de “tener la vida que no tuvo”, ya que comenzó su relación con Valentina Cervantes a los 17 años y siente que se perdió de muchas experiencias propias de esa edad. Esta decisión dejó a Cervantes “muy triste”, según informó la periodista deportiva Julieta Argenta en el programa LAM de América TV. Mientras tanto, la ex pareja de Enzo regresó a Buenos Aires con sus hijos tras la separación y compartió un comunicado, expresando que siempre “van a ser familia”. Además, instó a no “crear guerras donde no las hay”.', '2024-11-13', 7, 8, 'img/DSWJZ34UPFCXBFFEMZEQGM7X74.jpg'),
(3, 'Se viene el Martín Fierro de la Moda 2024: quiénes serán los conductores y el listado completo de nominados', 'La tercera edición de la ceremonia organizada por APTRA se realizará el 6 de diciembre y contará con el glamour y la presencia de grandes figuras de la industria fashionista.\r\nDe a poco la gran noche de la moda en televisión va cobrando forma. Los conductores dieron a conocer la lista oficial de nominados para los Martín Fierro de la Moda 2024. La fiesta, que se celebrará el 6 de diciembre y se podrá ver en la pantalla de Telefe, premiará diseñadores, fotógrafos, modelos, influencers y también tendrá en cuenta el estilo mostrado en las redes sociales.', '2024-11-13', 7, 9, 'img/673e32c2954ca.jpg'),
(5, 'La Justicia rechazó el pedido de libertad de Sergio Urribarri y el ex gobernador de Entre Ríos seguirá preso', 'El ex gobernador de Entre Ríos, Sergio Urribarri, continuará en prisión, luego de la condena que recibió por delitos de corrupción, incluyendo peculado y enriquecimiento ilícito. Así lo decidió la jueza de garantías del Poder Judicial entrerriano, Carola Bacaluzzo, luego de evaluar un habeas corpus presentado por la defensa del dirigente. La jueza determinó este miércoles 20 de noviembre, que el recurso era improcedente. “El habeas corpus no autoriza a sustituir una decisión de los jueces naturales”, argumentó. Luego dijo que la defensa del ex gobernador tiene otras vías para discutir el fallo condenatorio. “Pueden recurrir a la Sala Penal del Superior Tribunal de Justicia. Se puede instar a que los pasos procesales sean expeditivos. Un procedimiento abreviado”, sostuvo. La sentencia contra Urribarri también incluyó la inhabilitación perpetua para ejercer cargos públicos. La Cámara de Casación Penal de Paraná ordenó su detención este martes, luego de que la condena sea confirmada en distintas instancias. Por ese motivo, el ex gobernador fue alojado en Unidad Penal N°1 de Paraná. Inmediatamente, el abogado defensor de Urribarri, Leopoldo Cappa, solicitó la liberación de su representado a través de la presentación de un recurso de habeas corpus. “Entiendo que esta urgencia y motivación de las defensas en orden a resguardar el derecho a la libertad, podrá ser canalizado por las vías ordinarias. Considero que no existe un ataque ilegal que torne procedente la acción de habeas corpus. El habeas corpus incoado debe ser rechazado”, concluyó la jueza de garantías al expedirse sobre el planteo, durante la audiencia realizada esta tarde.\r\nLa decisión de la Cámara de Casación se conoció a través de un extenso documento de 74 páginas, en el cual se revocó un fallo anterior que había impuesto medidas restrictivas menos severas. Urribarri fue detenido en su residencia en Concordia y trasladado a un establecimiento del servicio penitenciario de Paraná. Junto a él, también fue detenido su cuñado, Juan Pablo Aguilera, quien enfrentará la misma pena.\r\n', '2024-11-02', 8, 6, 'img/673e32a60079a.jpg'),
(6, 'La fortuna que ha amasado Rafa Nadal durante sus 23 años de carrera, según Forbes\r\n', 'El tenista español se sitúa como uno de los tenistas con mayor fortuna, por detrás de Roger Federer pero a la altura de Djokovic.\r\n\r\nLlegó el momento que nadie quería presenciar, que todos querían posponer: el adiós de Rafa Nadal. La leyenda del tenis español y mundial, el rey de la tierra batida, ha puesto punto y final a su carrera tras una corta aventura en la Copa Davis. El equipo español no fue capaz de vencer a Países Bajos para seguir avanzando en el torneo. El resultado final fue de 1-2, tras perder un partido en individuales y otro en dobles, pero la fiesta no había acabado, le tenían reservada una gran despedida. Además, tras 23 años de carrera, el de Manacor ha amasado una gran fortuna, según Forbes.\r\nEn el ámbito deportivo, Nadal ha sobresalido notablemente, logrando 22 títulos individuales de Grand Slams, una hazaña que durante mucho tiempo representó un récord masculino sin precedentes hasta que fue superado por Novak Djokovic. En cuanto a ganancias, Nadal ha acumulado 134,9 millones de dólares en premios en efectivo, posicionándose como el segundo en la historia del ATP Tour, detrás de Djokovic. Sin embargo, estas representan solo una parte de sus ingresos totales.', '2024-11-01', 9, 8, 'img/673dd9dfd62d4.jpg'),
(7, 'Medallistas olímpicos encabezan lista de ganadores del Premio Nacional del deporte', 'Premio Nacional del Deporte 2024 reconoce a medallistas como Prisca Awitti y Marco Verde, además de campeones paralímpicos y destacados en arbitraje y entrenamiento en México.\r\nMéxico, 31 oct (EFE).- Los medallistas olímpicos Prisca Awitti, de judo, Marco Verde, de boxeo, y Osmar Olvera y Juan Celaya, en saltos, encabezan la lista de los ganadores del Premio Nacional del Deporte en México en 2024.La Comisión Nacional del Deporte anunció a los finalistas de la categoría de no profesionales.Awitti ganó la medalla de plata en la división de los 63 kilogramos; Verde también se colgó la plata en el peso ligero, en tanto que Olvera fue bronce en el trampolín de tres metros y plata junto a Celaya en los saltos sincronizados de esa prueba.En el deporte paralímpico fueron elegidos los campeones de París 2024 Juan Cervantes, en los 100 metros planos, división T-54, y Gloria Zarza, monarca en impulsión de la bala en la categoría F-54.', '2024-11-02', 9, 8, 'img/673dda7f4fef6.jpg'),
(8, '“¿Qué te pasa, bobo?”: el áspero ida y vuelta de Messi con Zambrano que hizo recordar a su legendario choque en el Mundial', 'El capitán de Argentina dibujó la asistencia para Lautaro Martínez en el gol que resolvió el partido ante Perú por Eliminatorias. Y mantuvo un tenso cruce en un duelo en el que abundaron las fricciones.La selección argentina cerró el 2024 con una sonrisa: venció 1-0 a Perú con gol de Lautaro Martínez y mantuvo la cima en la tabla de posiciones de las Eliminatorias sudamericanas (25 puntos) y la vanguardia en el Ranking FIFA, que no cede desde que conquistó el Mundial de Qatar. Para Lionel Messi, capitán de la Albiceleste, también fue el último partido del año, dado que el Inter Miami quedó eliminado de la MLS -además renunció el DT Gerardo Martino-. El delantero, de 37 años, hizo su aporte para el triunfo: regaló la asistencia para el tanto del Toro. Y, además de sus habituales pinceladas, protagonizó un áspero cruce ante Carlos Zambrano.Ante un rival que se cerró incluso en desventaja, y que no obsequió espacios en ningún momento, los roces y el juego cortado se hicieron constantes en el desarrollo. Un panorama que no favorece a la Pulga. Por eso le costó al campeón del mundo frente al colista de la clasificación a la cita de 2026. Recién logró quebrar a su adversario a los diez minutos del segundo tiempo, luego de una incursión por izquierda de Julián Álvarez, quien tocó para Messi. El punta se filtró en el área entre tres hombres, que procuraron no tocarlo para no cometerle penal, y envió un centro para la pirueta de Martínez, quien derrumbó la resistencia incaica.Una de las estrategias desplegadas por Perú fue la falta táctica para cortar los ataques cuando empezaban a fluir. Y el ex Barcelona y PSG resultó una de las víctimas. Y reaccionó ante Zambrano. El ex defensor de Boca lo movió con el cuerpo cuando se disponía a patear y lo tiró al césped. El astro rosarino se puso de pie y lo increpó. Y le salió una frase que hizo célebre en Qatar, aunque reversionada. “¿Qué te pasa bobo?”, le reclamó; un dardo similar al que le dedicó al neerlandés Wuout Weghorst en el choque por los cuartos de final de la Copa del Mundo, que se resolvió en los penales.El del atacante no fue el único choque en el cotejo. En el primer tiempo, saltaron las chispas en una disputa contra el lateral entre Rodrigo de Paul y Luis Advíncula. “Dejá de hacerte el vivo”, lo aguijoneó el argentino.', '2024-11-01', 10, 10, 'img/673ddb04c0f4c.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodista`
--

CREATE TABLE `periodista` (
  `id_periodista` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `dni` int(11) NOT NULL,
  `autenticacion_id` int(11) NOT NULL,
  `seccion_id` int(11) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `periodista`
--

INSERT INTO `periodista` (`id_periodista`, `nombre`, `apellido`, `dni`, `autenticacion_id`, `seccion_id`, `activo`) VALUES
(4, 'Admin', 'Admin', 12345678, 11, NULL, 0),
(7, 'Franco', 'Seccaspina', 2147483647, 27, 10, 0),
(8, 'Ana', 'García', 12345678, 28, 6, 0),
(9, 'Carlos', 'Pérez', 23456789, 29, 8, 0),
(10, 'María', 'López', 34567890, 30, 10, 0),
(11, 'Lucas', 'Periodista', 45689330, 31, 9, 0),
(12, 'Lucas', 'Aguirre', 45689330, 32, 9, 1),
(13, 'franco', 'periodista', 45689330, 33, 10, 1),
(14, 'lucas', 'periodista', 45689330, 34, 11, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE `seccion` (
  `id_seccion` int(11) NOT NULL,
  `nombre_seccion` varchar(100) NOT NULL,
  `dia_publicacion` date NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`id_seccion`, `nombre_seccion`, `dia_publicacion`, `activo`) VALUES
(6, 'Política', '2024-11-06', 1),
(7, 'Economía', '2024-11-06', 1),
(8, 'Deportes', '2024-11-06', 1),
(9, 'Dominical', '2024-11-06', 1),
(10, 'Cultura', '2024-11-06', 1),
(11, 'Ciencia', '2024-11-06', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscripcion`
--

CREATE TABLE `suscripcion` (
  `id_suscripcion` int(11) NOT NULL,
  `tipo_suscripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `suscripcion`
--

INSERT INTO `suscripcion` (`id_suscripcion`, `tipo_suscripcion`) VALUES
(1, 'Iliminatado'),
(2, 'Dominical');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autenticacion`
--
ALTER TABLE `autenticacion`
  ADD PRIMARY KEY (`id_autenticacion`);

--
-- Indices de la tabla `lector`
--
ALTER TABLE `lector`
  ADD PRIMARY KEY (`Id_lector`),
  ADD KEY `autentifiacion_id` (`autenticacion_id`),
  ADD KEY `suscripcion_id` (`suscripcion_id`);

--
-- Indices de la tabla `nota_periodistica`
--
ALTER TABLE `nota_periodistica`
  ADD PRIMARY KEY (`id_nota_periodistica`),
  ADD KEY `periodista_id` (`periodista_id`),
  ADD KEY `seccion_id` (`seccion_id`);

--
-- Indices de la tabla `periodista`
--
ALTER TABLE `periodista`
  ADD PRIMARY KEY (`id_periodista`),
  ADD KEY `autenticacion_id` (`autenticacion_id`),
  ADD KEY `seccion_id` (`seccion_id`);

--
-- Indices de la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD PRIMARY KEY (`id_seccion`);

--
-- Indices de la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  ADD PRIMARY KEY (`id_suscripcion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autenticacion`
--
ALTER TABLE `autenticacion`
  MODIFY `id_autenticacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `lector`
--
ALTER TABLE `lector`
  MODIFY `Id_lector` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `nota_periodistica`
--
ALTER TABLE `nota_periodistica`
  MODIFY `id_nota_periodistica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `periodista`
--
ALTER TABLE `periodista`
  MODIFY `id_periodista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
  MODIFY `id_seccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  MODIFY `id_suscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `lector`
--
ALTER TABLE `lector`
  ADD CONSTRAINT `lector_ibfk_1` FOREIGN KEY (`autenticacion_id`) REFERENCES `autenticacion` (`id_autenticacion`),
  ADD CONSTRAINT `lector_ibfk_2` FOREIGN KEY (`suscripcion_id`) REFERENCES `suscripcion` (`id_suscripcion`);

--
-- Filtros para la tabla `nota_periodistica`
--
ALTER TABLE `nota_periodistica`
  ADD CONSTRAINT `nota_periodistica_ibfk_1` FOREIGN KEY (`periodista_id`) REFERENCES `periodista` (`id_periodista`),
  ADD CONSTRAINT `nota_periodistica_ibfk_2` FOREIGN KEY (`seccion_id`) REFERENCES `seccion` (`id_seccion`);

--
-- Filtros para la tabla `periodista`
--
ALTER TABLE `periodista`
  ADD CONSTRAINT `periodista_ibfk_1` FOREIGN KEY (`autenticacion_id`) REFERENCES `autenticacion` (`id_autenticacion`),
  ADD CONSTRAINT `periodista_ibfk_2` FOREIGN KEY (`seccion_id`) REFERENCES `seccion` (`id_seccion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
