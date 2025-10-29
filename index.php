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
</head>
<body>
<h1>Notícias</h1>
<table border="1" cellpadding="8" cellspacing="0">
    <thead>
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Autor</th>
        <th>Categoria</th>
        <th>Tipo</th>
        <th>Data</th>
    </tr>
    </thead>
    <tbody>
    <?php if ($noticias && $noticias->num_rows > 0): ?>
        <?php while ($n = $noticias->fetch_assoc()): ?>
            <tr>
                <td><?= $n['id'] ?></td>
                <td><?= htmlspecialchars($n['titulo']) ?></td>
                <td><?= htmlspecialchars($n['autor']) ?></td>
                <td><?= htmlspecialchars($n['categoria']) ?></td>
                <td><?= htmlspecialchars($n['tipo']) ?></td>
                <td><?= date('d/m/Y H:i', strtotime($n['data_publicacao'])) ?></td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="6">Nenhuma notícia encontrada.</td></tr>
    <?php endif; ?>
    </tbody>
</table>
</body>
</html>
