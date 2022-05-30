<?php

    // caso tentem acessar o arquivo diretamente
    if ($_SERVER["REQUEST_URI"] == "db.php") {
        header("Location: index.html");
    }

    $servidor = "127.0.0.1";    // endereço do banco de dados
    $usuario = "root";          // usuário do banco de dados
    $senha = "toor";            // senha do banco de dados
    $meudb="yellowdino_db";     // nome do banco de dados

    // Create connection
    $conn = mysqli_connect($servidor, $usuario, $senha, $meudb);

    // Check connection
    if (!$conn) {
        die("Não foi possível conectar ao banco de dados: " . mysqli_connect_error());
    } 
?>
