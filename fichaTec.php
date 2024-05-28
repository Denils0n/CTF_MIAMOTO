<?php 
    

    



?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produtos em Destaque - Empresa XYZ</title>
  <!-- Inclua os arquivos CSS do Material Design Lite -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/material-design-lite@1.3.0/material.min.css">
  <!-- Inclua os arquivos JavaScript do Material Design Lite -->
  <script src="https://cdn.jsdelivr.net/npm/material-design-lite@1.3.0/material.min.js"></script>
  <!-- Inclua o arquivo CSS personalizado -->
  <link rel="stylesheet" href="style.css">
</head>
<body class="mdl-demo mdl-base">

<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Título do site -->
      <span class="mdl-layout-title">Empresa XYZ - Produtos em Destaque</span>
      <!-- Adicione navegação aqui -->
      <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="index.php">Início</a>
        <a class="mdl-navigation__link" href="pecas.php">Peças</a>
        <a class="mdl-navigation__link" href="sobre.html">Sobre Nós</a>
        <a class="mdl-navigation__link" href="contatos.html">Contato</a>
      </nav>
      <!-- Botão de alternância para modo escuro -->
      <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="dark-mode-switch">
        <input type="checkbox" id="dark-mode-switch" class="mdl-switch__input" onchange="toggleDarkMode()">
        <span class="mdl-switch__label">Modo Escuro</span>
      </label>
    </div>
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
  <a href=""></a>

  <footer class="mdl-mini-footer">
    <!-- Rodapé aqui -->
    <div class="mdl-mini-footer__left-section">
      <div class="mdl-logo">Empresa XYZ - Produtos em Destaque</div>
      <ul class="mdl-mini-footer__link-list">
        <li><a href="index.php">Início</a></li>
        <li><a href="pecas.php">Peças</a></li>
        <li><a href="sobre.html">Sobre Nós</a></li>
        <li><a href="contatos.html">Contato</a></li>
      </ul>
    </div>
  </footer>
</div>

<script>
  function toggleDarkMode() {
    const body = document.body;
    body.classList.toggle('dark-mode');
  }
</script>

</body>
</html>
