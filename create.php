<?php
global $conn;
include("config/database.php");
include("utils/functions.php");
include("utils/validation.php");

$erros = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $erros = validate($_POST);

    if (empty($erros)) {
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
            $erros[] = "Erro ao adicionar notícia.";
        }
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

<?php
if (!empty($erros)) {
    echo '<div class="erros">';
    foreach ($erros as $erro) {
        echo "<p style='color:red;'>$erro</p>";
    }
    echo '</div>';
}
?>

<form method="POST" action="create.php" onsubmit="return validarFormulario()">
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" id="titulo" required>

    <label for="subtitulo">Subtítulo:</label>
    <input type="text" name="subtitulo" id="subtitulo">

    <label for="conteudo">Conteúdo:</label>
    <textarea name="conteudo" id="conteudo" rows="5" required></textarea>

    <label for="autor">Autor:</label>
    <input type="text" name="autor" id="autor" required>

    <label for="categoria">Categoria:</label>
    <input type="text" name="categoria" id="categoria">

    <label for="tipo">Tipo:</label>
    <select name="tipo" id="tipo" required>
        <option value="noticia">Notícia</option>
        <option value="analise">Análise</option>
        <option value="opiniao">Opinião</option>
        <option value="humor">Humor</option>
        <option value="cronica">Crônica</option>
        <option value="checagem de fato">Checagem de Fato</option>
    </select><br><br>

    <button type="submit">Salvar</button>
    <a href="index.php" class="btn-voltar">Voltar</a>
</form>

<script src="assets/js/validation.js"></script>
</body>
</html>
