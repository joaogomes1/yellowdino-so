<?php

if (!isset($_POST["post_id"]) || !isset($_POST["comentario"])) {
    if (isset($_POST["post_id"])) {
        header("Location: post" . $_POST["post_id"] . ".html");
    } else {
        header("Location: index.html")
    }
}

$post_id    = $_POST["post_id"];
$comentario = $_POST["comentario"];

if (empty($comentario) || empty($post_id)) {
    die("Algo deu errado, tente novamente.");
}

require("db.php");
$query = "INSERT INTO COMMENT (comment, FK_id_art) VALUES (\"$comentario\", $post_id);";
$insert = mysqli_query($conn, $query);
if (!$insert) {
    die("Ocorreu um erro ao enviar o comentário! Tente novamente.");
}
header("Location: post" . $post_id . ".html");

?>