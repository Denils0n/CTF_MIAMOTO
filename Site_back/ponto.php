<?php

// Verifica se os parâmetros foram passados via GET
if (isset($_GET['id_user']) && isset($_GET['hora_entrada']) && isset($_GET['hora_saida'])) {
    // Obtém os valores dos parâmetros
    $id_user = $_GET['id_user'];
    $hora_entrada = $_GET['hora_entrada'];
    $hora_saida = $_GET['hora_saida'];

    // Insira seu código para inserir os dados no banco de dados aqui

    // Exemplo de como exibir os valores recuperados
    echo "ID do Usuário: " . $id_user . "<br>";
    echo "Hora de Entrada: " . $hora_entrada . "<br>";
    echo "Hora de Saída: " . $hora_saida . "<br>";
} else {
    echo "Parâmetros incompletos!";
}
?>
