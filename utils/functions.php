<?php
function listarNoticias($conn)
{
    $sql = "SELECT * FROM noticias ORDER BY id DESC";
    $result = $conn->query($sql);
    return $result;
}

function adicionarNoticia($conn, $titulo, $subtitulo, $conteudo, $autor, $categoria, $tipo) {
    $stmt = $conn->prepare("INSERT INTO noticias (titulo, subtitulo, conteudo, autor, categoria, tipo) VALUES (?, ?, ?, ?, ?, ?)"); // Data é atribúida automaticamente pelo banco, nao precisa ser passado aqui
    $stmt->bind_param("ssssss", $titulo, $subtitulo, $conteudo, $autor, $categoria, $tipo);
    return $stmt->execute();
}
function buscarNoticiaPorId($conn, $id) { // Para auxiliar na funcao de deletar e numa possivel feature de pesquisa por ID
    $stmt = $conn->prepare("SELECT * FROM noticias WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function atualizarNoticia($conn, $id, $titulo, $subtitulo, $conteudo, $autor, $categoria, $tipo) {
    $stmt = $conn->prepare("UPDATE noticias SET titulo=?, subtitulo=?, conteudo=?, autor=?, categoria=?, tipo=? WHERE id=?");
    $stmt->bind_param("ssssssi", $titulo, $subtitulo, $conteudo, $autor, $categoria, $tipo, $id);
    return $stmt->execute();
}

function deletarNoticia($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM noticias WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}   
?>