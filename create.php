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
    <title>Nova notícia | Jornal OPOVO</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<h1>Criar nova notícia</h1>

<form method="POST" action="create.php" onsubmit="return validarFormulario()">
    <label>Título:</label>
    <input type="text" name="titulo" id="titulo" required>

    <label>Subtítulo:</label>
    <input type="text" name="subtitulo">

    <label>Conteúdo:</label>
    <textarea name="conteudo" id="conteudo" rows="5" required></textarea>

    <label>Autor:</label>
    <input type="text" name="autor" id="autor" required>

    <label>Categoria:</label>
    <input type="text" name="categoria">

    <label>Tipo:</label>
    <select name="tipo" required>
        <option value="noticia">Notícia</option>
        <option value="analise">Análise</option>
        <option value="opiniao">Opinião</option>
        <option value="humor">Humor</option>
        <option value="cronica">Crônica</option>
        <option value="checagem de fato">Checagem de Fato</option>
    </select>

    <button type="submit">Salvar</button>
    <a href="index.php"><button type="button">Voltar</button></a>
</form>
<script src="assets/js/validation.js"></script>
</body>
</html>