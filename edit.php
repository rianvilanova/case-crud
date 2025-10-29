<?php
global $conn;
include("config/database.php");
include("utils/functions.php");

if (!isset($_GET['id'])) {
    die("ID não informado.");
}

$id = $_GET['id'];
$noticia = buscarNoticiaPorId($conn, $id);

if (!$noticia) {
    die("Notícia não encontrada.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
        echo "Erro ao atualizar notícia.";
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
<form method="POST">
    <label>Título:</label><br>
    <input type="text" name="titulo" value="<?= htmlspecialchars($noticia['titulo']) ?>" required><br><br>

    <label>Subtítulo:</label><br>
    <input type="text" name="subtitulo" value="<?= htmlspecialchars($noticia['subtitulo']) ?>"><br><br>

    <label>Conteúdo:</label><br>
    <textarea name="conteudo" rows="5" required><?= htmlspecialchars($noticia['conteudo']) ?></textarea><br><br>

    <label>Autor:</label><br>
    <input type="text" name="autor" value="<?= htmlspecialchars($noticia['autor']) ?>" required><br><br>

    <label>Categoria:</label><br>
    <input type="text" name="categoria" value="<?= htmlspecialchars($noticia['categoria']) ?>"><br><br>

    <label>Tipo:</label><br>
    <select name="tipo" required>
        <?php
        $tipos = ['noticia', 'analise', 'opiniao', 'humor', 'cronica', 'checagem de fato'];
        foreach ($tipos as $t) {
            $sel = ($noticia['tipo'] === $t) ? 'selected' : '';
            echo "<option value='$t' $sel>" . ucfirst($t) . "</option>";
        }
        ?>
    </select><br><br>

    <button type="submit">Atualizar</button>
    <a href="index.php">Voltar</a>
</form>
</body>
</html>