create database miamoto;
use miamoto;

CREATE TABLE Pecas (
    
    id INT AUTO_INCREMENT PRIMARY KEY,
    
    nome VARCHAR(255) NOT NULL,
    
    descricao TEXT,
    
    imagem VARCHAR(255),

    ficha VARCHAR(255)

);

CREATE TABLE Users (

    id INT AUTO_INCREMENT PRIMARY KEY,
    
    usuario VARCHAR(25) NOT NULL,
    
    senha VARCHAR(32) NOT NULL,
    
    cargo VARCHAR(255) NOT NULL
);

INSERT INTO Pecas (nome, descricao, imagem, ficha) VALUES 
('Motor de Moto', 'Motor potente para motocicletas de alta performance.', 'imagens/motor_moto.jpg', 'ficha/teste.txt'),
('Pneu Traseiro', 'Pneu resistente para uso em motos off-road.', 'imagens/pneu_traseiro.jpg', 'ficha/teste.txt'),
('Freio a Disco', 'Sistema de freio a disco dianteiro para motos esportivas.', 'imagens/freio_disco.jpg', 'ficha/teste.txt'),
('Corrente de Transmissão', 'Corrente de transmissão durável e confiável para motos.', 'imagens/corrente_transmissao.jpg', 'ficha/teste.txt'),
('Bateria de Moto', 'Bateria de alta capacidade para partida confiável em qualquer situação.', 'imagens/bateria_moto.jpg', 'ficha/teste.txt');

INSERT INTO Users (usuario, senha, cargo) VALUES
('joaosilva', 'senha123', 'Gerente de Vendas'),
('mariaoliveira', 'senha456', 'Engenheira de Produto'),
('lucassantos', 'senha789', 'Especialista em Marketing'),
('anacosta', 'senhaabc', 'Desenvolvedora de Novas Tecnologias'),
('mariasilva', 'senha321', 'Analista de Qualidade'),
('pedroalmeida', 'senha654', 'Designer Industrial'),
('lucasrodrigues', 'senha987', 'Analista de Marketing Digital'),
('enzon', 'enzoomaiordarede', 'tecnico de rede');

