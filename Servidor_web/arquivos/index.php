<?php
$diretorio = __DIR__;
$arquivos = array_diff(scandir($diretorio), ['.', '..', 'index.php']);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Arquivos enviados</title>
  <style>
    body { font-family: Arial, sans-serif; padding: 20px; }
    h1 { color: #333; }
    ul { list-style: none; padding: 0; }
    li { margin: 8px 0; }
    a { text-decoration: none; color: #007bff; }
    a:hover { text-decoration: underline; }
  </style>
</head>
<body>
  <h1>📁 Arquivos enviados</h1>
  <ul>
    <?php foreach ($arquivos as $arquivo): ?>
      <li><a href="<?= htmlspecialchars($arquivo) ?>" target="_blank"><?= htmlspecialchars($arquivo) ?></a></li>
    <?php endforeach; ?>
  </ul>
</body>
</html>
