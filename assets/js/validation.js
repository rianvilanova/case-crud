function validarFormulario() {
    const titulo = document.getElementById("titulo").value.trim();
    const conteudo = document.getElementById("conteudo").value.trim();
    const autor = document.getElementById("autor").value.trim();

    if (titulo.length < 5) {
        alert("O título deve ter pelo menos 5 caracteres.");
        return false;
    }
    if (conteudo.length < 10) {
        alert("O conteúdo deve ter pelo menos 10 caracteres.");
        return false;
    }
    if (autor === "") {
        alert("O campo autor é obrigatório.");
        return false;
    }
    return true;
}
