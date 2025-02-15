
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

('mariasilva', 'd25230d6d94cf861be33a5e922fca98a', 'Analista de Qualidade'),
('pedroalmeida', 'e2ce3ee5d620906fbd2fff9ccf94a363', 'Designer Industrial'),
('lucasrodrigues', 'dbaa7c7dd4519e3e785170fd7d661050', 'Analista de Marketing Digital'),
('enzon', 'f25a2fc72690b780b2a14e140ef6a9e0', 'tecnico de rede');


