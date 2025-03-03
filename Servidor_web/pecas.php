<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peças - Meu Site</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Início</a></li>
                <li><a href="pecas.php">Peças</a></li>
                <li><a href="sobre.php">Sobre Nós</a></li>
                <li><a href="contato.php">Contato</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Peças</h1>
        <p>Lista de peças disponíveis.</p>
        <?php

          include("conexao.php");

          // Consulta SQL para obter as peças
          $consulta = "SELECT * FROM Pecas";

          // Executa a consulta
          //testar conexão 
            if ($db_connection->connect_error) {
                die("Connection failed: " . $db_connection->connect_error);
            }

          $resultado = mysqli_query($db_connection, $consulta);

          // Loop para exibir as peças
          while ($linha = mysqli_fetch_assoc($resultado)) {
            echo "<div class='mdl-cell mdl-cell--4-col'>";
            echo "<div class='demo-card-wide mdl-card mdl-shadow--2dp'>";
            echo "<div class='mdl-card__title'>";
            echo "<h2 class='mdl-card__title-text'>" . $linha['nome'] . "</h2>";
            echo "</div>";
            echo "<div class='mdl-card__supporting-text'>";
            echo "<img src='" . $linha['imagem'] . "' alt='" . $linha['nome'] . "' style='width: 200px; height: auto; margin: 0 auto;'>";
            echo "<p>" . $linha['descricao'] . "</p>";
            echo "</div>";
            echo "<div class='mdl-card__actions'>";
            echo "<a href='fichaTec.php?id=". $linha['id']."'class='mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect'>Ver Detalhes</a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }

        // Fecha a conexão
        
        ?>
    </main>
    <footer>
        <p>&copy; 2025 Meu Site</p>
    </footer>
</body>
</html>
