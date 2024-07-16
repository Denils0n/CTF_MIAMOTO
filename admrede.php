<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuração de Wi-Fi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        label {
            font-weight: bold;
            color: #555;
        }
        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .info {
            background-color: #f9f9f9;
            padding: 15px;
            margin-top: 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .info p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Verifica se o formulário de login foi enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verifica se o nome de usuário e senha estão corretos (isso pode ser feito de maneira mais segura com um sistema de autenticação real)
            $usuario_correto = "enzon";
            $senha_correta = "iloveyou";

            if ($_POST["usuario"] == $usuario_correto && $_POST["senha"] == $senha_correta) {
                // Se o nome de usuário e senha estiverem corretos, exiba as informações da rede
                exibirInformacoesRede();
            } else {
                // Se o nome de usuário ou senha estiverem incorretos, exiba uma mensagem de erro
                echo '<h1>Erro de Autenticação</h1>';
                echo '<p>O nome de usuário ou senha estão incorretos. Por favor, tente novamente.</p>';
                exibirFormularioLogin();
            }
        } else {
            // Se o formulário de login ainda não foi enviado, exiba o formulário de login
            exibirFormularioLogin();
        }

        // Função para exibir o formulário de login
        function exibirFormularioLogin() {
            echo '
            <h1>Configuração de Wi-Fi</h1>
            <form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">
                <label for="usuario">Usuário:</label><br>
                <input type="text" id="usuario" name="usuario"><br><br>
                <label for="senha">Senha:</label><br>
                <input type="password" id="senha" name="senha"><br><br>
                <input type="submit" value="Entrar">
            </form>
            ';
        }

        // Função para exibir as informações da rede
        function exibirInformacoesRede() {
            echo '
            <h1>Configuração de Wi-Fi</h1>
            <div class="info">
                <p><strong>Nome da Rede:</strong> MinhaRedeWi-Fi</p>
                <p><strong>SSID:</strong> minha_rede_wifi</p>
                <p><strong>Senha:</strong> *********</p>
                <p><strong>Segurança:</strong> WPA2-PSK</p>
                <p><strong>Canal:</strong> 6</p>
                <p><strong>Endereço IP:</strong> 192.168.1.1</p>
                <p><strong>Máscara de Sub-Rede:</strong> 255.255.255.0</p>
                <p><strong>Gateway Padrão:</strong> 192.168.1.254</p>
            </div>
            ';
        }
        ?>
    </div>

<!--para nao esquecer -->
<!-- usuario: enzon-->
<!-- sennha: f25a2fc72690b780b2a14e140ef6a9e0-->
</body>
</html>

