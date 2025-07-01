document.addEventListener("DOMContentLoaded", () => {
    
    const botaoBuscar = document.querySelector(".botao-procurar");

    botaoBuscar.addEventListener("click", (e) => {
        e.preventDefault();

        const nome = document.querySelector("input[name='pesquisar-nome']").value.trim();

        if (nome === "") {
            alert("Digite um nome para buscar.");
            return;
        }

        fetch("../../../actions/action-procurar-expositor-boleto.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ "pesquisar-nome" : nome })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === "ok") {
                
                document.getElementById("nome-exp").value = data.expositor.nome;
                document.getElementById("cnpj-cpf").value = data.expositor.cpf;


                const inputsHidden = document.querySelectorAll("input[name='id-expositor']");
                inputsHidden.forEach(input => {
                    input.value = data.expositor.id;
                });

            } else {
                alert(data.mensagem);
            }
        })
        .catch(erro => {
            console.error("Erro na requisição:", erro);
            alert("Erro ao buscar expositor.");
        });
    });

});
