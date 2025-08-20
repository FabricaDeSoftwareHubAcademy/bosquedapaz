document.addEventListener('DOMContentLoaded', async () => {
    const container = document.querySelector('.container_cards');
    const tokenElem = document.getElementById('tolkenCsrf');
    const tokenCsrf = tokenElem ? tokenElem.value : null;

    if (!tokenCsrf) {
        console.error('Token CSRF não definido!');
    }

    try {
        // Busca as edições passadas do backend
        const response = await fetch('../../../actions/action-listar-edicoes-passadas.php');
        const data = await response.json();

        if (data.status !== 'success' || !Array.isArray(data.dados) || data.dados.length === 0) {
            container.innerHTML = '<p>Nenhuma edição passada encontrada.</p>';
            return;
        }

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
                            <div class="text"><p>${evento.descricao_evento}</p></div>
                        </div>

                        <!-- Formulário oculto -->
                            <form action="../../../actions/action-salvar-evento.php" method="POST" class="form-galeria" data-id-evento="${evento.id_evento}">
                                <input type="hidden" name="id_evento" value="${evento.id_evento}">
                                <button type="submit" name="botao-continuar" class="meu-botao">Saiba Mais</button>
                            </form>

                        <div class="linha-decorativa-1"></div>
                        <div class="container__decorativo">
                            <div class="linha-decorativa-2"></div>
                        </div>
                    </div>
                </div>
            `;

            container.appendChild(card);
        });

        // Adiciona listener de envio para todos os formulários
        document.querySelectorAll('.form-galeria').forEach(form => {
            form.addEventListener('submit', async (e) => {
                e.preventDefault();

                const idEvento = form.dataset.idEvento; // pega do atributo data-id-evento

                const formData = new FormData();
                formData.append('id_evento', idEvento);

                // Token CSRF
                const tokenElem = document.getElementById('tolkenCsrf') || document.querySelector('input[name="tolkenCsrf"]');
                if (tokenElem) formData.append('tolkenCsrf', tokenElem.value);

                // Botão
                formData.append('botao-continuar', '1');

                try {
                    const response = await fetch(form.action, {
                        method: 'POST',
                        body: formData
                    });

                    const data = await response.json();

                    if (data.status === 'success') {
                        window.location.href = 'galeria-de-imagens.php';
                    } else {
                        alert('Erro ao salvar evento na sessão: ' + data.mensagem);
                    }

                } catch (error) {
                    console.error('Erro ao salvar evento na sessão:', error);
                }
            });
        });

    } catch (error) {
        console.error('Erro ao carregar edições passadas:', error);
        container.innerHTML = '<p>Erro ao carregar as edições passadas.</p>';
    }
});