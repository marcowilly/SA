CREATE DATABASE sa;
USE sa;

CREATE TABLE endereco (
    id INT AUTO_INCREMENT,
    estado VARCHAR(100) NOT NULL,
    cidade VARCHAR(255) NOT NULL,
    bairro VARCHAR(255) NOT NULL,
    logradouro VARCHAR(100) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    numero VARCHAR(7) NOT NULL,
    complemento VARCHAR(125),
    PRIMARY KEY(id)
);

CREATE TABLE aluno (
    id INT AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    cpf VARCHAR(11) NOT NULL,
    email VARCHAR(255) NOT NULL,
    idEndereco INT NOT NULL,
    PRIMARY KEY(id),
    CONSTRAINT FK_EnderecoAluno FOREIGN KEY (idEndereco) REFERENCES endereco(id)
);

--TRIGGER DELETE ALL DATA ALUNO
DELIMITER $$
    CREATE TRIGGER trigger_delete_aluno
        AFTER DELETE
        ON aluno FOR EACH ROW
    BEGIN
        DELETE FROM endereco WHERE id = old.idEndereco;
    END$$    
DELIMITER ;