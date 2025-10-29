<?php
// Validacao de dados no back-end para reforcar seguranca e evitar furos no front-end.
function validate(array $dados): array
{
    $mensagens = [];

    // Verifica título
    $titulo = trim($dados['titulo'] ?? '');
    if (strlen($titulo) < 5) {
        $mensagens[] = "O título precisa ter pelo menos 5 caracteres.";
    }

    // Verifica subtítulo (opcional)
    $subtitulo = trim($dados['subtitulo'] ?? '');
    if (!empty($subtitulo) && strlen($subtitulo) < 3) {
        $mensagens[] = "O subtítulo deve ter no mínimo 3 caracteres.";
    }

    // Verifica conteúdo
    $conteudo = trim($dados['conteudo'] ?? '');
    if (strlen($conteudo) < 10) {
        $mensagens[] = "O conteúdo deve ter no mínimo 10 caracteres.";
    }

    // Verifica autor
    $autor = trim($dados['autor'] ?? '');
    if (empty($autor)) {
        $mensagens[] = "O campo autor é obrigatório.";
    }

    // Verifica tipo
    $tipo = trim($dados['tipo'] ?? '');
    $tiposPermitidos = ['noticia','analise','opiniao','humor','cronica','checagem de fato'];
    if (!in_array($tipo, $tiposPermitidos)) {
        $mensagens[] = "O tipo informado é inválido.";
    }

    return $mensagens;
}
