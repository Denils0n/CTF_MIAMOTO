<?php
$mensagem = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $mensagemTexto = $_POST['message'] ?? '';

    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'arquivos/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileName = time() . '_' . basename($_FILES['file']['name']);
        $targetPath = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['file']['tmp_name'], $targetPath)) {
            $mensagem = "<div class='sucesso'>✅ Arquivo enviado com sucesso!</div>";
        } else {
            $mensagem = "<div class='erro'>❌ Erro ao salvar o arquivo.</div>";
        }
    } else {
        $mensagem = "<div class='erro'>⚠️ Nenhum arquivo enviado ou erro no upload.</div>";
    }
}
?>

<!-- Página HTML com mensagem embutida -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Formulário com Upload</title>
  <style>
    body { font-family: Arial, sans-serif; padding: 20px; }
    .sucesso { background-color: #d4edda; color: #155724; padding: 10px; margin-top: 20px; border-radius: 5px; }
    .erro { background-color: #f8d7da; color: #721c24; padding: 10px; margin-top: 20px; border-radius: 5px; }
  </style>
</head>
<body>
  <?php echo $mensagem; ?>
  <a href="index.html">⬅ Voltar ao formulário</a>
</body>
</html>
