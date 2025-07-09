async function carregarExpositores() {
    try {
        const response = await fetch("../../../actions/actions-expositor.php?rand=0");
        const data = await response.json();
        console.log(data)

        const container = document.getElementById("expositores-container");

        data.expositor.forEach(expo => {
            const card = document.createElement("div");
            card.classList.add("content-card-expo");
            card.innerHTML = `
                <div class="card-per-expo">
                    <div class="head-card">
                        <img src="../../${expo.imagem1}" alt="Imagem do expositor" class="img-perfil-expo">
                    </div>
                    <div class="body-card">
                        <h3 class="nome-expo">${expo.nome_marca}</h3>
                        <div class="detalhes-expo">
                            <p class="para-cate">Categoria: <span class="span-cate">${expo.descricao}</span></p>
                            <p class="para-color">Rua: <span class="span-color "></span>
</p>
                        </div>
                        <button class="btn-ver-info open-modal" data-modal="m-per-expo">Ver Mais</button>
                    </div>
                </div>
            `;
            container.appendChild(card);
        });

    } catch (error) {
        console.error("Erro ao carregar expositores:", error);
    }
}

// Executa a função assim que o script for carregado
carregarExpositores();
