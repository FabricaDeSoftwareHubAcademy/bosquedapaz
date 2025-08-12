document.addEventListener("DOMContentLoaded", function () {
    const btnBuscar = document.getElementById("lupa");
    const campoBusca = document.getElementById("pesquisar-nome");

    if (!btnBuscar || !campoBusca) {
        console.warn("Campo de busca ou botão de busca não encontrado.");
        return;
    }

    btnBuscar.addEventListener("click", function () {
        const nomePesquisado = campoBusca.value.trim();

        if (nomePesquisado === "") {
            alert("Digite um nome para pesquisar.");
            return;
        }

        fetch("../../../app/Http/Controllers/boletos/ControllerBuscarExpositor.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ "pesquisar-nome": nomePesquisado })
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.status === "ok" && data.expositor) {
                    if (typeof window.preencherDadosExpositor === "function") {
                        window.preencherDadosExpositor(data.expositor);
                    }
                } else {
                    alert(data.mensagem || "Expositor não encontrado.");
                }
            })
            .catch((error) => {
                console.error("Erro ao buscar expositor:", error);
                alert("Erro ao buscar expositor.");
            });
    });
});
