<?php 
    include("conexao.php");

    // NÃO sanitiza o input — vulnerável
    $id = $_GET['id'];
    // echo "<h1>Ficha Técnica da Peça com ID: $id</h1>";

    // Concatenação direta — vulnerável
    $consulta = "SELECT * FROM Pecas WHERE id = $id";
    // echo "<p>Consulta SQL: $consulta</p>";
    // Executa a query
    $resultado = mysqli_query($db_connection, $consulta);
    // echo "<p>Resultado da Consulta: " . mysqli_num_rows($resultado) . " linha(s) encontrada(s).</p>";

    if (mysqli_num_rows($resultado) > 0) {
        while ($linha = mysqli_fetch_assoc($resultado)) {
            echo "<div class='produto'>";
            echo "<h2>" . $linha['nome'] . "</h2>";
            // colocar a imagem
            echo "<img src='../" . $linha['imagem'] . "' alt='" . $linha['nome'] . "'>";
            echo "<p>ID: " . $linha['id'] . "</p>";
            echo "<p>Caminho: " . $linha['ficha'] . "</p>";

            echo "</div>";
        }
    } else {
        echo "Nenhuma peça encontrada.";
    }
?>
