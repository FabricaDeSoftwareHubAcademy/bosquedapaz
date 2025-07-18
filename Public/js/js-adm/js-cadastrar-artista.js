document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("form-artista");
    const btnSalvar = document.getElementById("btn-salvar");
    const modalSucesso = document.getElementById("modal-sucesso");
    const modalErro = document.getElementById("modal-error");

    btnSalvar.addEventListener("click", async (e) => {
        e.preventDefault();

        // Verificação básica dos campos obrigatórios
        const nome = form.querySelector('[name="nome"]').value.trim();
        const email = form.querySelector('[name="email"]').value.trim();
        const telefone = form.querySelector('[name="whats"]').value.trim();
        const nomeArtistico = form.querySelector('[name="nome_artistico"]').value.trim();
        const linguagemArtistica = form.querySelector('[name="linguagem_artistica"]').value.trim();
        const valorCache = form.querySelector('[name="valor_cache"]').value.trim();
        const publicoAlvo = form.querySelector('[name="publico_alvo"]').value.trim();

        if (!nome || !email || !telefone || !nomeArtistico || !linguagemArtistica || !valorCache || !publicoAlvo) {
            return;
        }

        const formData = new FormData(form);

        try {
            const resposta = await fetch("../../../actions/actions-cadastrar-artista.php", {
                method: "POST",
                body: formData
            });

            const resultado = await resposta.json();
            console.log("Resultado:", resultado);

            if (resultado.status === 200 || resultado.status === "sucesso") {
                form.reset();
                modalSucesso.showModal();
            } else {
                modalErro.showModal();
            }
        } catch (erro) {
            console.error("Erro na requisição:", erro);
            modalErro.showModal();
        }
    });

    const fecharModais = document.querySelectorAll(".fechar-modal-loading");
    fecharModais.forEach(btn => {
        btn.addEventListener("click", () => {
            const modal = btn.closest("dialog");
            if (modal) modal.close();
        });
    });
});
