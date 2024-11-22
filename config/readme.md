tablas utilizas en el proyuecto  

CREATE DATABASE IF NOT EXISTS PruebaTegnica;
use PruebaTegnica;
CREATE TABLE  Usuario (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL,
        apellido VARCHAR(100) NOT NULL,
        fecha_nacimiento DATE NOT NULL,
        dni INT NOT NULL,
        email VARCHAR(255) UNIQUE NOT NULL,
        celular VARCHAR(12),
        pais VARCHAR(255) NOT NULL
    );
CREATE TABLE  cv_Postulante (
        id INT AUTO_INCREMENT PRIMARY KEY,
        id_usuario INT NOT NULL,
        nombre_archivo VARCHAR(255) NOT NULL,
        FOREIGN KEY (id_usuario) REFERENCES Usuario(id) ON DELETE CASCADE
    );