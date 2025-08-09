
CREATE USER 'admin'@'localhost' IDENTIFIED BY 'admin123';
GRANT ALL PRIVILEGES ON *.* TO 'admin'@'localhost';

CREATE DATABASE producao;

USE producao;

CREATE TABLE IF NOT EXISTS Usuario (

    id INT AUTO_INCREMENT PRIMARY KEY,
    
    nome VARCHAR(25) NOT NULL,
    
    senha VARCHAR(255) NOT NULL 
);

CREATE TABLE IF NOT EXISTS ficha (
    
    id INT AUTO_INCREMENT PRIMARY KEY,
    
    camnho VARCHAR(255) NOT NULL,
);

INSERT INTO ficha (camnho) VALUES ('/Ficha/fTecnico.png');



-- quero que crie mais bancos de dados tabelas
CREATE TABLE IF NOT EXISTS Produto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL
);

CREATE TABLE IF NOT EXISTS Pedido (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    produto_id INT NOT NULL,
    quantidade INT NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES Usuario(id),
    FOREIGN KEY (produto_id) REFERENCES Produto(id)
);

CREATE TABLE IF NOT EXISTS Pecas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    imagem VARCHAR(255) NOT NULL,
    ficha VARCHAR(255) NOT NULL
);

-- adiciona o usuario admin
INSERT INTO Usuario (nome, senha) VALUES ('admin', '0192023a7bbd73250516f069df18b500');
-- mais usuarios com nomes reais e senhas hash de senha
INSERT INTO Usuario (nome, senha) VALUES ('João', 'senha123');
INSERT INTO Usuario (nome, senha) VALUES ('Maria', 'senha456');
INSERT INTO Usuario (nome, senha) VALUES ('José', 'senha789');
INSERT INTO Usuario (nome, senha) VALUES ('Ana', 'senha321');
INSERT INTO Usuario (nome, senha) VALUES ('Carlos', 'senha654');

-- de dados falsos pra essas tabelas
INSERT INTO Produto (nome, preco) VALUES ('Produto 1', 10.00);
INSERT INTO Produto (nome, preco) VALUES ('Produto 2', 20.00);
INSERT INTO Produto (nome, preco) VALUES ('Produto 3', 30.00);

INSERT INTO Pedido (usuario_id, produto_id, quantidade) VALUES (1, 1, 2);
INSERT INTO Pedido (usuario_id, produto_id, quantidade) VALUES (1, 2, 1);
INSERT INTO Pedido (usuario_id, produto_id, quantidade) VALUES (2, 1, 1);

-- mais volume
INSERT INTO Pedido (usuario_id, produto_id, quantidade) VALUES (2, 2, 2);
INSERT INTO Pedido (usuario_id, produto_id, quantidade) VALUES (2, 3, 1);

-- dados na tabela pecas

INSERT INTO Pecas (nome, descricao, imagem, ficha) VALUES
('Bateria de Moto', 'Bateria de alta capacidade para partida confiável em qualquer situação.', 'imgs/P1.jpg', 'ficha/teste.txt'),
('Vela', 'Vela de ignição de alta performance para motos.', 'imgs/P2.jpg', 'ficha/teste.txt'),
('Pneu', 'Pneu de alta performance para motos, garantindo segurança e aderência em todas as condições.', 'imgs/P3.jpg', 'ficha/teste.txt');
