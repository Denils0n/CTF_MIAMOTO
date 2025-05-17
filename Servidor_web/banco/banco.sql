

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



