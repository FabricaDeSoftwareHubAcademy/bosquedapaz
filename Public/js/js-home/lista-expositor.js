async function carregarExpositores() {
    try {
        const response = await fetch("http://localhost/AulaPHPDev33/bosquedapaz/actions/action-home.php");
        const data = await response.json();

        const container = document.getElementById("expositores-container");

        data.forEach(expo => {
            const card = document.createElement("div");
            card.classList.add("content-card-expo");
            card.innerHTML = `
                <div class="card-per-expo">
                    <div class="head-card">
                        <img src="${expo.imagem1}" alt="Imagem do expositor" class="img-perfil-expo">
                    </div>
                    <div class="body-card">
                        <h3 class="nome-expo">${expo.nome_marca}</h3>
                        <div class="detalhes-expo">
                            <p class="para-cate">Categoria: <span class="span-cate">${expo.categoria}</span></p>
                            <p class="para-color">Rua: <span class="span-color ${expo.cor_rua.toLowerCase()}">${expo.cor_rua}</span>
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
