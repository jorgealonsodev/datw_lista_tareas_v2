DROP DATABASE IF EXISTS lista_tareas ;

CREATE DATABASE lista_tareas;

USE lista_tareas;

-- Creamos  la tabla usuario


CREATE TABLE usuario(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(255) NOT NULL,
    usuario VARCHAR(100) NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    rol VARCHAR(100) DEFAULT 'user' NOT NULL,
    avatar VARCHAR(255) DEFAULT 'avatar.png',
    fecha DATE DEFAULT CURRENT_DATE() NOT NULL
);

CREATE TABLE lista (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    fecha DATE DEFAULT CURRENT_DATE() NOT NULL,
    id_usuario INT NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuario (id)
);

CREATE TABLE tarea (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion VARCHAR(1000),
    fecha DATE DEFAULT CURRENT_DATE() NOT NULL,
    f_vencimiento DATE,
    estado VARCHAR(100) DEFAULT 'por realizar',
    prioridad VARCHAR(100) DEFAULT 'normal',
    id_lista INT NOT NULL,
    FOREIGN KEY (id_lista) REFERENCES lista (id)
);