<?php
global $conn;
include("config/database.php");
include("utils/functions.php");
include("utils/validation.php");

if (!isset($_GET['id'])) {
    die("ID não informado.");
}

$id = $_GET['id'];
$noticia = buscarNoticiaPorId($conn, $id);

if (!$noticia) {
    die("Notícia não encontrada.");
}

// Processa formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $erros = validate($_POST);

    if (!empty($erros)) {
        foreach ($erros as $erro) {
            echo "<p style='color:red;'>$erro</p>";
        }
    } else {
        $titulo     = $_POST['titulo'];
        $subtitulo  = $_POST['subtitulo'];
        $conteudo   = $_POST['conteudo'];
        $autor      = $_POST['autor'];
        $categoria  = $_POST['categoria'];
        $tipo       = $_POST['tipo'];

        if (atualizarNoticia($conn, $id, $titulo, $subtitulo, $conteudo, $autor, $categoria, $tipo)) {
            header("Location: index.php");
            exit;
        } else {
            echo "<p style='color:red;'>Erro ao atualizar notícia.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar notícia | Jornal OPOVO</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<h1>Editar notícia</h1>
<form method="POST" action="edit.php?id=<?= $id ?>" onsubmit="return validarFormulario()">
    <label for="titulo">Título:</label><br>
    <input type="text" name="titulo" id="titulo" value="<?= htmlspecialchars($noticia['titulo']) ?>" required><br><br>

    <label for="subtitulo">Subtítulo:</label><br>
    <input type="text" name="subtitulo" id="subtitulo" value="<?= htmlspecialchars($noticia['subtitulo']) ?>"><br><br>

    <label for="conteudo">Conteúdo:</label><br>
    <textarea name="conteudo" id="conteudo" rows="5" required><?= htmlspecialchars($noticia['conteudo']) ?></textarea><br><br>

    <label for="autor">Autor:</label><br>
    <input type="text" name="autor" id="autor" value="<?= htmlspecialchars($noticia['autor']) ?>" required><br><br>

    <label for="categoria">Categoria:</label><br>
    <input type="text" name="categoria" id="categoria" value="<?= htmlspecialchars($noticia['categoria']) ?>"><br><br>

    <label for="tipo">Tipo:</label><br>
    <select name="tipo" id="tipo" required>
        <?php
        $tipos = ['noticia', 'analise', 'opiniao', 'humor', 'cronica', 'checagem de fato'];
        foreach ($tipos as $t) {
            $sel = ($noticia['tipo'] === $t) ? 'selected' : '';
            echo "<option value='$t' $sel>" . ucfirst($t) . "</option>";
        }
        ?>
    </select><br><br>

    <button type="submit">Atualizar</button>
    <a href="index.php" class="btn-create">Voltar</a>
</form>

<script src="assets/js/validation.js"></script>
</body>
</html>
