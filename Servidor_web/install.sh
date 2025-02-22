#!/bin/bash

# Verificar e instalar Apache2
if apache2 -v > /dev/null 2>&1
then
    echo "Apache2 já está instalado"
else
    echo "Instalando Apache2"
    sudo apt-get install apache2 -y
fi

# Verificar e instalar MySQL
if mysql -V > /dev/null 2>&1
then
    echo "MySQL já está instalado"
else
    echo "Instalando MySQL"
    sudo apt-get install mysql-server -y
fi

# Verificar e instalar PHP
if php -v > /dev/null 2>&1
then
    echo "PHP já está instalado"
else
    echo "Instalando PHP"
    sudo apt-get install php libapache2-mod-php php-mysql -y
fi

# Verificar e instalar Git
if git --version > /dev/null 2>&1
then
    echo "Git já está instalado"
else
    echo "Instalando Git"
    sudo apt-get install git -y
fi

echo "Installation complete"

# Solicitar usuário e senha
read -p "Digite o usuário do MySQL: " USUARIO
read -sp "Digite a senha do MySQL: " SENHA
BANCO_DE_DADOS=miamoto


# Criar usuário no MySQL
sudo mysql <<EOF
CREATE USER '$USUARIO'@'localhost' IDENTIFIED BY '$SENHA';
GRANT ALL PRIVILEGES ON $BANCO_DE_DADOS.* TO '$USUARIO'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;
EOF

echo 


# Defina as variáveis do banco de dados e caminho do arquivo
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







