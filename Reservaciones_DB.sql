/*
CREATE DATABASE IF NOT EXISTS gestion_reservaciones;
USE gestion_reservaciones;

CREATE TABLE tabla_reservaciones(
idUsuario INT AUTO_INCREMENT PRIMARY KEY,
nombre_cliente VARCHAR(20) NOT NULL,
fecha DATETIME NOT NULL,
num_personas INT NOT NULL,
clave VARCHAR(32) NOT NULL
);
/*