document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("form-artista");
    const btnSalvar = document.getElementById("btn-salvar");
    const modalSucesso = document.getElementById("modal-sucesso");
    const modalErro = document.getElementById("modal-error");

    btnSalvar.addEventListener("click", async (e) => {
        e.preventDefault();

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
