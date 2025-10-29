<?php
global $conn;
include("config/database.php");
include("utils/functions.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo     = $_POST['titulo'];
    $subtitulo  = $_POST['subtitulo'];
    $conteudo   = $_POST['conteudo'];
    $autor      = $_POST['autor'];
    $categoria  = $_POST['categoria'];
    $tipo       = $_POST['tipo'];

    if (adicionarNoticia($conn, $titulo, $subtitulo, $conteudo, $autor, $categoria, $tipo)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Erro ao adicionar notícia.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Nova notícia</title>
</head>
<body>
<h1>Criar nova notícia</h1>
<form method="POST">
    <label>Título:</label><br>
    <input type="text" name="titulo" required><br><br>

    <label>Subtítulo:</label><br>
    <input type="text" name="subtitulo"><br><br>

    <label>Conteúdo:</label><br>
    <textarea name="conteudo" rows="5" required></textarea><br><br>

    <label>Autor:</label><br>
    <input type="text" name="autor" required><br><br>

    <label>Categoria:</label><br>
    <input type="text" name="categoria"><br><br>

    <label>Tipo:</label><br>
    <select name="tipo" required>
        <option value="noticia">Notícia</option>
        <option value="analise">Análise</option>
        <option value="opiniao">Opinião</option>
        <option value="humor">Humor</option>
        <option value="cronica">Crônica</option>
        <option value="checagem de fato">Checagem de Fato</option>
    </select><br><br>

    <button type="submit">Salvar</button>
    <a href="index.php">Voltar</a>
</form>
</body>
</html>