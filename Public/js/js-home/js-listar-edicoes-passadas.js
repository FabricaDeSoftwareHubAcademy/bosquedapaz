document.addEventListener('DOMContentLoaded', async () => {
    const container = document.querySelector('.container_cards');

    try {
        const response = await fetch('../../../actions/action-listar-edicoes-passadas.php');
        const data = await response.json();

        if (data.status === 'success' && Array.isArray(data.dados)) {
            container.innerHTML = ''; // limpa os cards de exemplo

            data.dados.forEach(evento => {
                const card = document.createElement('div');
                card.classList.add('card');

                card.innerHTML = `
                    <div class="por-cima-card">
                        <div class="parte-superior">
                            <img class="img-ult" src="../../../Public/${evento.banner_evento}" alt="${evento.nome_evento}">
                        </div>
                        <div class="parte-inferior">
                            <div class="area_text">
                                <div class="titulo"><h3>${evento.nome_evento}</h3></div>
                                <div class="text">
                                    <p>${evento.descricao_evento}</p>
                                </div>
                            </div>
                            <a href="galeria-de-imagens.php?id_evento=${evento.id_evento}" class="meu-botao">Saiba Mais</a>
                            <div class="linha-decorativa-1"></div>
                            <div class="container__decorativo">
                                <div class="linha-decorativa-2"></div>
                            </div>
                        </div>
                    </div>
                `;

                container.appendChild(card);
            });

        } else {
            container.innerHTML = '<p>Nenhuma edição passada encontrada.</p>';
        }

    } catch (error) {
        console.error('Erro ao carregar edições passadas:', error);
        container.innerHTML = '<p>Erro ao carregar as edições passadas.</p>';
    }
});