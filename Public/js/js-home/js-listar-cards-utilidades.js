document.addEventListener("DOMContentLoaded", async () => {
    const container = document.querySelector(".conteiner__cards");

    try {
        const resposta = await fetch("../../../actions/listar-utilidades.php");
        const utilidades = await resposta.json();

        container.innerHTML = "";

        utilidades.forEach((item, index) => {
            const card = document.createElement("div");
            card.classList.add("card");

            card.innerHTML = `
                <div class="por-cima-card">
                    <div class="parte-superior">
                        <img class="img-ult" src="${item.imagem || '../../../Public/assets/img-placeholder.png'}" alt="${item.titulo || 'Sem título'}">
                    </div>
                    <div class="parte-inferior">
                        <h1 class="nome-card">${item.titulo || 'Sem título'}</h1>
                        <button class="meu-botao open-modal" data-modal="modal-${index}">Saiba Mais</button>
                        <div class="linha-decorativa-1"></div>
                        <div class="container__decorativo">
                            <div class="linha-decorativa-2"></div>
                        </div>
                    </div>
                </div>

                <dialog id="modal-${index}" class="custom-modal">
                    <div class="modal-wrapper">
                        <button class="btn-fechar close-modal" data-modal="modal-${index}">
                            <i class="bi bi-x-circle"></i>
                        </button>
                        <img src="../../../Public/assets/img-decoracao-ult1.png" class="modal-decor decor-top-left">
                        <img src="../../../Public/assets/img-decoracao-ult2.png" class="modal-decor decor-bottom-right">

                        <div class="modal-content">
                            <div class="modal-left">
                                <img src="${item.imagem || '../../../Public/assets/img-placeholder.png'}" alt="Imagem do Evento">
                            </div>
                            <div class="modal-right">
                                <div class="modal-text-content">
                                    <h2>${item.titulo || 'Sem título'}</h2>
                                    <p>${item.descricao || 'Sem descrição disponível.'}</p>
                                    <p><strong>Data Início:</strong> ${item.data_inicio}</p>
                                    <p><strong>Data Fim:</strong> ${item.data_fim}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </dialog>
            `;

            container.appendChild(card);

            // Modal
            const openModalBtn = card.querySelector(".open-modal");
            const modal = card.querySelector(`#modal-${index}`);
            const closeModalBtn = card.querySelector(".close-modal");

            openModalBtn.addEventListener("click", () => modal.showModal());
            closeModalBtn.addEventListener("click", () => modal.close());
        });

    } catch (error) {
        console.error("Erro ao carregar utilidades:", error);
        container.innerHTML = "<p>Erro ao carregar os dados. Tente novamente mais tarde.</p>";
    }
});
