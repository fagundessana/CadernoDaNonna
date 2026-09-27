document.querySelector("form").addEventListener("submit", function(evento) {
    const nome = document.querySelector('input[name="nome"]').value;
    if (nome.trim() === "") {
        evento.preventDefault();
        alert("Por favor, preencha o nome da receita.");
    }
});
