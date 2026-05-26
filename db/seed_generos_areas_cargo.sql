-- Script: seed_generos_areas_cargo.sql
-- Crea e inserta valores base para tablas generos, areas y cargo

-- Tabla generos
CREATE TABLE IF NOT EXISTS generos (
  id_generos INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO generos (nombre) VALUES
('Masculino'),
('Femenino'),
('Otro')
ON DUPLICATE KEY UPDATE nombre=VALUES(nombre);

-- Tabla areas
CREATE TABLE IF NOT EXISTS areas (
  id_areas INT AUTO_INCREMENT PRIMARY KEY,
  nombre_area VARCHAR(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO areas (nombre_area) VALUES
('Producción'),
('Administrativa'),
('Logística'),
('Mantenimiento'),
('Salud y Seguridad en el Trabajo')
ON DUPLICATE KEY UPDATE nombre_area=VALUES(nombre_area);

-- Tabla cargo
CREATE TABLE IF NOT EXISTS cargo (
  id_cargo INT AUTO_INCREMENT PRIMARY KEY,
  nombre_cargo VARCHAR(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO cargo (nombre_cargo) VALUES
('Operario de Planta'),
('Supervisor de Turno'),
('Jefe de Área'),
('Auxiliar Administrativo'),
('Técnico de Mantenimiento')
ON DUPLICATE KEY UPDATE nombre_cargo=VALUES(nombre_cargo);
