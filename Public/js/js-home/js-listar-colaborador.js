document.addEventListener("DOMContentLoaded", async () => {
    const container = document.getElementById("colaboradoras-container");

    try {
        const response = await fetch("../../../actions/action-listar-colaborador.php");
        const json = await response.json();

        console.log(json);

        if (Array.isArray(json.data)) {
            json.data.forEach(colab => {
                const card = document.createElement("div");

                // nome da classe para o container (fixa ou pode ser personalizada)
                card.classList.add("image-text-" + colab.nome.toLowerCase().split(" ")[0]);

                card.innerHTML = `
                    <img class="fotos" src="${colab.imagem}" alt="${colab.nome}">
                    <p class="${colab.nome.toLowerCase().split(" ")[0]} dark">${colab.nome}</p>
                    <span class="profission dark">${colab.cargo}</span>
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
