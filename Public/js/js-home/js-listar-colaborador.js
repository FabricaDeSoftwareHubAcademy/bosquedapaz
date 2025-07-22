document.addEventListener("DOMContentLoaded", async () => {
    const container = document.getElementById("colaboradoras-container");

    try {
        const response = await fetch("../../../actions/action-listar-colaborador.php");
        const json = await response.json();

        if (Array.isArray(json.data)) {
            json.data.forEach(colab => {
                const card = document.createElement("div");
                card.classList.add("image-text-colaborador");

                card.innerHTML = `
                    <img class="fotos" src="../../../Public/imgs/img-colaboradores/${colab.imagem}" alt="${colab.nome}">
                    <p class="nome">${colab.nome}</p>
                    <span class="profission">${colab.cargo}</span>
                `;

                container.appendChild(card);
            });
        } else {
            container.innerHTML = "<p>Não foi possível carregar os colaboradores.</p>";
        }
    } catch (error) {
        container.innerHTML = "<p>Erro ao carregar colaboradores.</p>";
    }
});
