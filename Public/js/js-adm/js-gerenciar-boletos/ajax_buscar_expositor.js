document.addEventListener("DOMContentLoaded", () => {
    
    const botaoBuscar = document.querySelector(".bola-cb");

    botaoBuscar.addEventListener("click", (e) => {
        e.preventDefault(); // Impede o envio tradicional do formulário

        const nome = document.querySelector("input[name='nome']").value.trim();

        if (nome === "") {
            alert("Digite um nome para buscar.");
            return;
        }

        fetch("../../../actions/actions-boletos/action-buscar-expositor.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ nome })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === "ok") {
                
                // Preenche os campos
                document.getElementById("nome-exp").value = data.expositor.nome;
                document.getElementById("cpf-cb").value = data.expositor.cpf;

                // Se quiser colocar o ID em campos hidden:
                const inputsHidden = document.querySelectorAll("input[name='id_expositor']");
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
