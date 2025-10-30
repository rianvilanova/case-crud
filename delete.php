<?php
global $conn;
include('config/database.php');
include('utils/functions.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Método não permitido.");
}

if (!isset($_POST['id'])) {
    die("ID não informado.");
}

$id = $_POST['id'];

if (deletarNoticia($conn, $id)) {
    header("Location: index.php");
    exit;
} else {
    echo "Erro ao excluir notícia.";
}
?>
