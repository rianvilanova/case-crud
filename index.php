<?php
include("config/database.php");
include("utils/functions.php");

$noticias = listarNoticias($conn);
?>

<!DOCTYPE html>
<html lang = "pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Notícias | Jornal OPOVO</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<h1>Notícias</h1>
<div style="margin-bottom: 15px;">
    <a href="create.php" class="btn-create">+ Criar nova notícia</a>
</div>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Subtítulo</th>
        <th>Autor</th>
        <th>Categoria</th>
        <th>Tipo</th>
        <th>Data</th>
        <th>Conteúdo</th>
        <th>Ações</th>
    </tr>
    </thead>
    <tbody>
    <?php if ($noticias && $noticias->num_rows > 0): ?>
        <?php while ($n = $noticias->fetch_assoc()): ?>
            <tr>
                <td><?= $n['id'] ?></td>
                <td><?= htmlspecialchars($n['titulo']) ?></td>
                <td><?= htmlspecialchars($n['subtitulo']) ?></td>
                <td><?= htmlspecialchars($n['autor']) ?></td>
                <td><?= htmlspecialchars($n['categoria']) ?></td>
                <td><?= htmlspecialchars($n['tipo']) ?></td>
                <td><?= date('d/m/Y H:i', strtotime($n['data_publicacao'])) ?></td>
                <td><?= htmlspecialchars(substr($n['conteudo'], 0, 100)) ?>...</td>
                <td>
                    <a href="edit.php?id=<?= $n['id'] ?>">Editar</a> |
                    <a href="delete.php?id=<?= $n['id'] ?>" onclick="return confirm('Excluir esta notícia?')">Excluir</a>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="9">Nenhuma notícia encontrada.</td></tr>
    <?php endif; ?>
    </tbody>
</table>
</body>
</html>