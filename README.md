# CTF_MIAMOTO

## Objetivo
Capturar todos os arquivos secretos. Cada servidor possui um arquivo secreto que deve ser encontrado e decifrado.

---

## Cenário
Uma empresa de venda de peças para motos está desenvolvendo um novo motor movido a CO2, que promete revolucionar o mercado. Competidores, sem acesso às informações, contratam hackers para roubar os dados. O desafio é proteger os servidores da empresa e, ao mesmo tempo, tentar capturar os arquivos secretos dos servidores adversários.

---

## Regras
1. Defenda seu ambiente.
2. Não é permitido mudar o arquivo secreto de lugar.
3. Não é permitido inviabilizar os serviços necessários para o funcionamento da empresa.

---

## Estrutura do Desafio

### Primeiro Momento: Defesa do Ambiente
- Analisar a infraestrutura e criar defesas.
- Planejar estratégias de proteção.
- Tempo limite para implementação.

### Segundo Momento: Ataque aos Ambientes Adversários
- Atacar os ambientes das outras equipes para capturar os arquivos secretos.

### Terceiro Momento: Avaliação do Ambiente
- Avaliadores (Pr. Ramon e Monitor Denilson) verificam se as regras foram seguidas.
- Avaliam o progresso das equipes em ataques e defesas.

### Quarto Momento: Contabilização e Divulgação dos Pontos
- Analisar os dados coletados e somar os pontos.
- Divulgar a pontuação final.

---

## Infraestrutura
### Servidores e Serviços
- **Servidor Web**: PHP, SQL
- **Servidor Local**: SSH, Telnet, Rotina de cópia de projeto
- **Servidor de Arquivo**: FTP, Rotina de backups

### Vulnerabilidades
#### Servidor Web
- PHP: WebShell, SQL Injection, Usuário e senha fracos, Shell reverso
- SQL: Arquivo de configuração exposto
- Repositório: Dados sensíveis expostos

#### Servidor Local
- SSH: Senhas fracas, sem uso de chaves privadas
- Telnet: Aceita qualquer conexão
- Rotina: Executada como root com permissão 777
- Permissões: Python3.10, PHP e Vim com SUID
- Backdoors: Indícios de invasões anteriores

#### Servidor de Arquivo
- Rotina: Backup desprotegido em `/tmp`, executado como root com permissão 777
- FTP: Permite usuários anônimos

---

## Arquivos Secretos
Cada servidor possui um arquivo secreto com uma frase criptografada. A frase pertence a um livro famoso e deve ser decifrada para identificar o autor e o livro.

### Exemplo
- **Servidor Web**
  - Local: `/script/arquivo1.txt`
  - Conteúdo Criptografado: `Ook! Ook! Ook?`
  - Algoritmo de Criptografia: Ook!
  - Texto Plano: "A natureza é a arte de Deus"
  - Livro: *A Divina Comédia*
  - Autor: Dante Alighieri

---

## Ferramentas Necessárias
- 3 Máquinas Virtuais Linux
- Servidores configurados com os serviços descritos
- Algoritmos de criptografia simples para os arquivos secretos


