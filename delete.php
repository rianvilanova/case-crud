<?php
global $conn;
include('config/database.php');
include('utils/functions.php');

if (!isset($_GET['id'])) {
    die("ID não informado.");
}

$id = $_GET['id'];

if (deletarNoticia($conn, $id)) {
    header("Location: index.php");
    exit;
} else {
    echo "Erro ao excluir notícia.";
}
?>
