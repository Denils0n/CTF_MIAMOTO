CREATE DATABASE Ponto;

USE Ponto;

CREATE TABLE USER (

    id INT AUTO_INCREMENT PRIMARY KEY,

    NOME VARCHAR(255)

);


CREATE TABLE HORARIOS (

    id INT AUTO_INCREMENT PRIMARY KEY,

    id_user INT,

    HORA_ENTRADA DATETIME,

    HORA_SAIDA DATETIME,

    FOREIGN KEY (id_user) REFERENCES USER(id)

);

-- Inserir dados falsos na tabela USER
INSERT INTO USER (NOME) VALUES
('joaosilva'),
('mariaoliveira'),
('lucassantos'),
('anacosta'),
('mariasilva'),
('pedroalmeida'),
('lucasrodrigues'),
('enzon');

-- Inserir dados falsos na tabela HORARIOS
INSERT INTO HORARIOS (id_user, HORA_ENTRADA, HORA_SAIDA) VALUES
(1, '2024-04-07 08:00:00', '2024-04-07 17:00:00'),  
(3, '2024-04-08 08:15:00', '2024-04-08 17:15:00'),
(4, '2024-04-09 08:30:00', '2024-04-09 17:30:00'),
(4, '2024-04-10 08:45:00', '2024-04-10 17:45:00'),
(3, '2024-04-11 09:00:00', '2024-04-11 18:00:00'),
(2, '2024-04-12 09:15:00', '2024-04-12 18:15:00'),
(1, '2024-04-13 09:30:00', '2024-04-13 18:30:00'),
(4, '2024-04-14 09:45:00', '2024-04-14 18:45:00'),
(2, '2024-04-07 08:15:00', '2024-04-07 17:15:00'),  
(5, '2024-04-08 08:30:00', '2024-04-08 17:30:00'),
(6, '2024-04-09 08:45:00', '2024-04-09 17:45:00'),
(6, '2024-04-10 09:00:00', '2024-04-10 18:00:00'),
(7, '2024-04-11 09:15:00', '2024-04-11 18:15:00'),
(8, '2024-04-12 09:30:00', '2024-04-12 18:30:00'),
(7, '2024-04-13 09:45:00', '2024-04-13 18:45:00'),
(8, '2024-04-14 10:00:00', '2024-04-14 19:00:00');
-- Adicione mais entradas e saídas para outros usuários aqui...
