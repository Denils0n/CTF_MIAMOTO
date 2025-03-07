import os
import subprocess
import hashlib


from dotenv import load_dotenv
from faker import Faker

load_dotenv()
fake = Faker()
md5 = hashlib.md5()

# Load environment variables
DB_CONNECTION= os.getenv("DB_CONNECTION")
DB_HOST= os.getenv("DB_HOST")
DB_PORT= os.getenv("DB_PORT")
DB_DATABASE= os.getenv("DB_DATABASE")
DB_USERNAME= os.getenv("DB_USERNAME")
DB_PASSWORD= os.getenv("DB_PASSWORD")
DB_ARQUIVO= os.getenv("DB_ARQUIVO")

# TABALEA USUARIO

TB_QUANTIDADE= os.getenv("TB_QUANTIDADE")
TB_USERNAME_STR= os.getenv("TB_USERNAME")
TB_USERNAME = TB_USERNAME_STR.split(",")
TB_PASSWORD_STR= os.getenv("TB_PASSWORD")
TB_PASSWORD = TB_PASSWORD_STR.split(",")

# CRIOPGRAFIA DE SENHA

CP_TIPO= os.getenv("CP_TIPO")
CP_SALT= os.getenv("CP_SALT")

# Arquivo ponto cap 

CAP_ARQUIVO= os.getenv("CAP_ARQUIVO")



def run_command(command):
    process = subprocess.run(command, shell=True, stdout=subprocess.PIPE, stderr=subprocess.PIPE, text=True)
    if process.returncode != 0:
        print(f"Command {command} failed with code {process.returncode}")
        exit(1)
    return process.stdout.strip()

#fazendo instalacao do apache2, mysql e php
run_command('sudo apt update -y ')
run_command('sudo apache2 -v /dev/null 2>&1 || sudo apt install apache2 -y')
run_command('sudo mysql -V /dev/null 2>&1 || sudo apt install mysql-server -y')
run_command('sudo php -v /dev/null 2>&1 || sudo apt install php -y')
run_command('sudo apt install php-mysql -y')

#criando o banco de dados

run_command(f"mysql -u {DB_USERNAME} -p{DB_PASSWORD} -e 'CREATE DATABASE IF NOT EXISTS {DB_DATABASE}'")

#criando tabelas e inserindo dados
run_command(f"mysql -u {DB_USERNAME} -p{DB_PASSWORD} {DB_DATABASE} < {DB_ARQUIVO}")

#criando o arquivo de conexao

with open('conexao.php', 'w') as f:
    f.write(f"""
<?php
    $db_host = "{DB_HOST}";
    $db_user = "{DB_USERNAME}";
    $db_pass = "{DB_PASSWORD}";
    $db_name = "{DB_DATABASE}";
    $db_connection = new mysqli($db_host, $db_user, $db_pass, $db_name);
    if ($db_connection->connect_error) {{
        die("Connection failed: " . $db_connection->connect_error);
    }}
?>
    """) 

#POPULANDO TABLEA USUARIO


def criar_hash(senha):
    
    if CP_TIPO == 'sha256':
        command = f"openssl passwd -6 -salt {CP_SALT} {senha}"
        return run_command(command)
    
    md5.update(senha.encode('utf-8'))
    return md5.hexdigest()
    
    
for i in range(int(TB_QUANTIDADE)):
    if i < len(TB_USERNAME) and i < len(TB_PASSWORD):
        senha = criar_hash(TB_PASSWORD[i])
        run_command(f"mysql -u {DB_USERNAME} -p{DB_PASSWORD} {DB_DATABASE} -e 'INSERT INTO Usuario (nome, senha) VALUES (\"{TB_USERNAME[i]}\", \"{senha}\")'")
    else:
        nome = fake.first_name()
        senha = fake.password(length=8, special_chars=False, digits=True, upper_case=False, lower_case=False)
        senha = criar_hash(senha)  
        run_command(f"mysql -u {DB_USERNAME} -p{DB_PASSWORD} {DB_DATABASE} -e 'INSERT INTO Usuario (nome, senha) VALUES (\"{nome}\", \"{senha}\")'")



#Copiando aruivo cap

run_command(f"sudo cp {CAP_ARQUIVO} .")
run_command(f"echo 'Disallow:/{CAP_ARQUIVO}' >> robots.txt")
run_command('sudo chown -R www-data:www-data /var/www/html/')

#copiando arquivos para o diretorio do apache

run_command ('sudo rm -drf /var/www/html/*')

run_command ('sudo cp -r * /var/www/html/')

run_command('sudo rm /var/www/html/config.py')

run_command('sudo chown -R www-data:www-data /var/www/html/')

run_command('sudo systemctl restart apache2')













