#!/bin/bash
echo "Installing Apache2, PHP and MySQL"

sudo apt update

sudo apt install -y apache2

sudo apt install -y php

sudo apt install -y php-mysql

sudo apt install -y mysql-client

sudo apt install -y mysql-server

echo "Installation complete"

# Solicitar usuário e senha
read -p "Digite o usuário do MySQL: " USUARIO
read -sp "Digite a senha do MySQL: " SENHA
echo

# Defina as variáveis do banco de dados e caminho do arquivo
BANCO_DE_DADOS="miamoto"
CAMINHO_ARQUIVO="./banco/banco.sql"

# Crie o banco de dados (se ainda não existir)
mysql -u $USUARIO -p$SENHA -e "CREATE DATABASE IF NOT EXISTS $BANCO_DE_DADOS;"

# Importe o arquivo SQL para o banco de dados
mysql -u $USUARIO -p$SENHA $BANCO_DE_DADOS < $CAMINHO_ARQUIVO

echo "Importação concluída com sucesso!"

echo "Copiando arquivos para o servidor"

sudo rm -drf /var/www/html/*

sudo cp -r * /var/www/html/

sudo rm -drf /var/www/html/Config_Fase2*
sudo rm -r /var/www/html/install.sh

sudo chown -R www-data:www-data /var/www/html/



echo "Arquivos copiados com sucesso!"







