import os
import subprocess

from dotenv import load_dotenv

load_dotenv()

fake = Faker()

def run_command(command):
    process = subprocess.run(command, shell=True, stdout=subprocess.PIPE, stderr=subprocess.PIPE, text=True)
    if process.returncode != 0:
        print(f"Command {command} failed with code {process.returncode}")
        exit(1)
    return process.stdout.strip()

# Variaveis de verificacao

APAGAR_USUARIOS = os.getenv("APAGAR_USUARIOS")
CRIAR_USUARIOS = os.getenv("CRIAR_USUARIOS")
SUID = os.getenv("SUID")
WRITE = os.getenv("WRITE")
CRONTABS= os.getenv("CRONTABS")
SERVICOS= os.getenv("SERVICOS")
BACKDOORS= os.getenv("BACKDOORS")

#configurando usuarios

def apagar_usuarios():
    USUARIOS = run_command("ls /home").split("\n")
    
    if USUARIOS == [""]:
        return
    for i in range(len(USUARIOS)):
        run_command("userdel -r " + USUARIOS[i])

def criar_usuarios():
    US_ADMIN= os.getenv("US_ADMIN")
    US_ADMIN_PASS= os.getenv("US_ADMIN_PASS")
    US_ADICIONAIS_STR= os.getenv("US_ADICIONAIS")
    US_ADICIONAIS = US_ADICIONAIS_STR.split(",")
    US_ADICIONAIS_PASS_STR= os.getenv("US_ADICIONAIS_PASS")
    US_ADICIONAIS_PASS = US_ADICIONAIS_PASS_STR.split(",")


    run_command("useradd " + US_ADMIN + " -m -p " + US_ADMIN_PASS)
    for i in range(len(US_ADICIONAIS)):
        senha = run_command("openssl passwd -6 " + US_ADICIONAIS_PASS[i])
        run_command("useradd " + US_ADICIONAIS[i] + " -m -p " + senha.strip())

if APAGAR_USUARIOS == "TRUE":
    apagar_usuarios()

if CRIAR_USUARIOS == "TRUE":
    criar_usuarios()


#configurando permissoes de SUID

if SUID == "TRUE":

    SUID_VIM= os.getenv("SUID_VIM")
    SUID_PHP= os.getenv("SUID_PHP") 
    SUID_PYTHON= os.getenv("SUID_PYTHON")
    SUID_OUTROS_STR= os.getenv("SUID_OUTROS")
    SUID_OUTROS = SUID_OUTROS_STR.split(",")

    run_command(f"sudo chmod u+s {SUID_VIM}")
    run_command(f"sudo chmod u+s {SUID_PHP}")
    run_command(f"sudo chmod u+s {SUID_PYTHON}")
    for i in range(len(SUID_OUTROS)):
        run_command(f"sudo chmod u+s {SUID_OUTROS[i]}")

#configurando permissoes de escrita

if WRITE == "TRUE":
    WR_PASSWD= os.getenv("WR_PASSWD")
    WR_SHADOW= os.getenv("WR_SHADOW")
    WR_SUDORES= os.getenv("WR_SUDORES")
    WR_OUTROS_STR= os.getenv("WR_OUTROS")
    WR_OUTROS = WR_OUTROS_STR.split(",")

    run_command(f"sudo chmod +w {WR_PASSWD}")
    run_command(f"sudo chmod +w {WR_SHADOW}")
    run_command(f"sudo chmod +w {WR_SUDORES}")
    for i in range(len(WR_OUTROS)):
        run_command(f"sudo chmod +w {WR_OUTROS[i]}")

#configurando crontabs

if CRONTABS == "TRUE":
    CR_ARQUIVO_STR= os.getenv("CR_ARQUIVO")
    CR_ARQUIVO = CR_ARQUIVO_STR.split(",")
    CR_PERMISSAO= os.getenv("CR_PERMISSAO")
    CR_OUTROS_STR= os.getenv("CR_OUTROS")
    CR_OUTROS = CR_OUTROS_STR.split(",")

    for i in range(len(CR_ARQUIVO)):
        run_command(f"sudo chmod {CR_PERMISSAO} {CR_ARQUIVO[i]}")
        run_command(f"sudo echo '* * * * * /bin/bash {CR_ARQUIVO[i]} | crontab -b")
    
    for i in range(len(CR_OUTROS)):
        run_command(f"sudo chmod {CR_PERMISSAO} {CR_OUTROS[i]}")




#configurando servicos


if SERVICOS == "TRUE":

    SERVICO= os.getenv("SERVICO")
    run_command(f"sudo systemctl stop {SERVICO}")
    run_command(f"sudo systemctl disable {SERVICO}")

#configurando backdoors

if BACKDOORS == "TRUE":

    BA_PORTA= os.getenv("BA_PORTA")
    BA_USUARIO= os.getenv("BA_USUARIO")

