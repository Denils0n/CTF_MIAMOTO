<?php 
    

    



?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peças - Meu Site</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="mdl-demo mdl-base">

<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
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

  <main class="mdl-layout__content">
    <div class="mdl-layout__tab-panel is-active" id="overview">
      <!-- Conteúdo principal aqui -->
      <section class="section--center mdl-grid mdl-grid--no-spacing">
        <h2 class="mdl-cell mdl-cell--12-col">Produtos em Destaque</h2>
        <!-- Lista de produtos em destaque -->
        <?php 
            include("conecBanco.php");
    
            $id = $_GET['id'];
        
            $consulta = "SELECT * FROM Pecas WHERE id = $id";
        
            $resultado = mysqli_query($mysql, $consulta);
        
            // Verifica se há registros retornados
            if (mysqli_num_rows($resultado) > 0) {
                // Exibe os dados
                while ($linha = mysqli_fetch_assoc($resultado)) {
                    echo("<div class='produto'>");
                    echo("<h3>" . $linha['nome'] . " </h3>");
                    echo "<img src='" . $linha['imagem'] . "' alt='" . $linha['nome'] . "' style='width: 200px; height: auto; margin: 0 auto;'>";
                    echo("<p>" . $linha['descricao'] . "</p>");
                    echo("<a href='" . $linha['ficha'] . "'class='mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect'>Ficha tecnica</a>");
                    
                    echo("</div>");
                    
                    // Adicione aqui os outros campos que deseja exibir
                }
            } else {
                echo "Nenhuma peça encontrada.";
            }
            echo("<div class='produto'>");
        
        
        
        ?>
        
        <!-- Adicione mais produtos conforme necessário -->
      </section>
    </div>
  </main>
  <footer>
      <p>&copy; 2025 Meu Site</p>
  </footer>
</div>


</body>
</html>
