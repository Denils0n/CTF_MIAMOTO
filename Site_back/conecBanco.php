<?php

    $hostname = 'localhost';
    $bancodedados = 'miamoto_ponto';
    $usuario = 'aluno';
    $senha = '@lunoifp3';

    $mysql = new mysqli($hostname, $usuario, $senha, $bancodedados);

    if ($mysql->connect_errno) {
        echo "falha ao conectar: (" . $mysql->connect_errno. ")" . $mysql->connect_errno;
    }



?>