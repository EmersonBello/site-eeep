CREATE DATABASE formulario;

USE formulario;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    curso ENUM('administracao', 'agronegocio', 'desenvolvimento', 'enfermagem', 'logistica') NOT NULL,
    identificacao_racial ENUM('branco', 'negro', 'pardo', 'indigena', 'outro') NOT NULL,
    evento ENUM('miss_eeep', 'desfile_consciencia_negra') NOT NULL
);
