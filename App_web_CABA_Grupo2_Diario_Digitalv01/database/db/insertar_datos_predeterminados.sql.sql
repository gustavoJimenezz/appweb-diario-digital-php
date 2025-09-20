-- Harcodeo de secciones


-- Insertar datos en la tabla `autenticacion`
INSERT INTO `autenticacion` (`email`, `contrasenia`) VALUES
('ana.garcia@diariodigital.com', AES_ENCRYPT('password123', 'keyword')),
('carlos.perez@diariodigital.com', AES_ENCRYPT('password456', 'keyword')),
('maria.lopez@diariodigital.com', AES_ENCRYPT('password789', 'keyword'));

-- Insertar datos para Ana García (obteniendo id_autenticacion y id_seccion por email y nombre de sección)
INSERT INTO `periodista` (`nombre`, `apellido`, `dni`, `autenticacion_id`, `seccion_id`)
VALUES 
('Ana', 'García', 12345678, 
  (SELECT `id_autenticacion` FROM `autenticacion` WHERE `email` = 'ana.garcia@diariodigital.com' LIMIT 1), 
  (SELECT `id_seccion` FROM `seccion` WHERE `nombre_seccion` = 'Política' LIMIT 1));

-- Insertar datos para Carlos Pérez (obteniendo id_autenticacion y id_seccion por email y nombre de sección)
INSERT INTO `periodista` (`nombre`, `apellido`, `dni`, `autenticacion_id`, `seccion_id`)
VALUES 
('Carlos', 'Pérez', 23456789, 
  (SELECT `id_autenticacion` FROM `autenticacion` WHERE `email` = 'carlos.perez@diariodigital.com' LIMIT 1), 
  (SELECT `id_seccion` FROM `seccion` WHERE `nombre_seccion` = 'Deportes' LIMIT 1));

-- Insertar datos para María López (obteniendo id_autenticacion y id_seccion por email y nombre de sección)
INSERT INTO `periodista` (`nombre`, `apellido`, `dni`, `autenticacion_id`, `seccion_id`)
VALUES 
('María', 'López', 34567890, 
  (SELECT `id_autenticacion` FROM `autenticacion` WHERE `email` = 'maria.lopez@diariodigital.com' LIMIT 1), 
  (SELECT `id_seccion` FROM `seccion` WHERE `nombre_seccion` = 'Cultura' LIMIT 1));

-- Insertar notas para Ana García (obteniendo id_periodista por nombre y apellido)
INSERT INTO `nota_periodistica` (`titulo`, `contenido`, `fecha_creacion`, `periodista_id`, `seccion_id`) VALUES
('La economía en tiempos de crisis', 'En este artículo analizamos cómo la economía ha sido afectada por la crisis actual y sus implicaciones a nivel global.', '2024-11-01', 
  (SELECT `id_periodista` FROM `periodista` WHERE `nombre` = 'Ana' AND `apellido` = 'García' LIMIT 1), 
  (SELECT `id_seccion` FROM `seccion` WHERE `nombre_seccion` = 'Política' LIMIT 1)),

('La política y sus desafíos', 'Un análisis de los principales desafíos políticos que enfrenta el país, incluyendo reformas y políticas públicas.', '2024-11-02', 
  (SELECT `id_periodista` FROM `periodista` WHERE `nombre` = 'Ana' AND `apellido` = 'García' LIMIT 1), 
  (SELECT `id_seccion` FROM `seccion` WHERE `nombre_seccion` = 'Política' LIMIT 1));

-- Insertar notas para Carlos Pérez
INSERT INTO `nota_periodistica` (`titulo`, `contenido`, `fecha_creacion`, `periodista_id`, `seccion_id`) VALUES
('El futuro de la energía renovable', 'El auge de las energías renovables es una tendencia imparable. Analizamos su futuro en la matriz energética mundial.', '2024-11-01', 
  (SELECT `id_periodista` FROM `periodista` WHERE `nombre` = 'Carlos' AND `apellido` = 'Pérez' LIMIT 1), 
  (SELECT `id_seccion` FROM `seccion` WHERE `nombre_seccion` = 'Deportes' LIMIT 1)),

('Impacto de la tecnología en la educación', 'En este artículo se discuten las nuevas herramientas tecnológicas que están transformando la educación en el siglo XXI.', '2024-11-02', 
  (SELECT `id_periodista` FROM `periodista` WHERE `nombre` = 'Carlos' AND `apellido` = 'Pérez' LIMIT 1), 
  (SELECT `id_seccion` FROM `seccion` WHERE `nombre_seccion` = 'Deportes' LIMIT 1));

-- Insertar notas para María López
INSERT INTO `nota_periodistica` (`titulo`, `contenido`, `fecha_creacion`, `periodista_id`, `seccion_id`) VALUES
('El cambio climático y sus efectos', 'El cambio climático continúa siendo una amenaza. En este artículo se profundiza en sus efectos y las medidas que se están tomando a nivel mundial.', '2024-11-01', 
  (SELECT `id_periodista` FROM `periodista` WHERE `nombre` = 'María' AND `apellido` = 'López' LIMIT 1), 
  (SELECT `id_seccion` FROM `seccion` WHERE `nombre_seccion` = 'Cultura' LIMIT 1)),

('Los avances en medicina moderna', 'Descubre los avances más recientes en la medicina moderna, que están revolucionando el tratamiento de enfermedades.', '2024-11-02', 
  (SELECT `id_periodista` FROM `periodista` WHERE `nombre` = 'María' AND `apellido` = 'López' LIMIT 1), 
  (SELECT `id_seccion` FROM `seccion` WHERE `nombre_seccion` = 'Cultura' LIMIT 1));
