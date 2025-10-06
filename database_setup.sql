-- CLIMAXA - Script de Base de Datos
-- Este archivo crea la base de datos y tabla para el sistema CLIMAXA

-- Crear base de datos si no existe
CREATE DATABASE IF NOT EXISTS climaxa 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;

-- Usar la base de datos
USE climaxa;

-- Crear tabla de usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) UNIQUE NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insertar usuario de prueba
INSERT IGNORE INTO usuarios (nombre, correo, contrasena) 
VALUES (
    'Emanuel', 
    'ejemplo@gmail.com', 
    '$2y$10$hLGK8Dd6EpG7j0MZDC3BWezBQDrfbqPwOyZ1/zPwb.jRo94hPQUCu'
);

-- Mensaje de confirmación
SELECT 'Base de datos CLIMAXA configurada correctamente' AS Mensaje;