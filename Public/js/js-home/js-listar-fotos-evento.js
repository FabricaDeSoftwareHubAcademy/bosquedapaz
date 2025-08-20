document.addEventListener('DOMContentLoaded', async () => {
    const container = document.querySelector('.container_galeria');
    const titulo = document.getElementById('titulo');

    // Função para renderizar as fotos
    function renderizarFotos(fotos) {
        container.innerHTML = ''; // limpa conteúdo inicial

        fotos.forEach(foto => {
            const caminhoFoto = `../../../Public/${foto.caminho_foto_evento}`;
            const item = document.createElement('div');
            item.classList.add('item-galeria');

            item.innerHTML = `<img src="${caminhoFoto}" alt="Foto do evento">`;

            // Abrir modal ao clicar na imagem
            item.querySelector('img').addEventListener('click', () => {
                document.getElementById('img-dialog-view').src = caminhoFoto;
                document.getElementById('dialog-img').showModal();
            });

            container.appendChild(item);

            // Efeito reveal
            setTimeout(() => item.classList.add('reveal'), 50);
        });
    }

    try {
        // 1️⃣ Pegar ID e nome do evento do backend (sessionStorage / action-obter-evento.php)
        const respEvento = await fetch('../../../actions/action-obter-evento.php');
        const dataEvento = await respEvento.json();

        if (dataEvento.status !== 'success') throw new Error(dataEvento.mensagem);

        const idEvento = dataEvento.id_evento;
        const nomeEvento = dataEvento.nome_evento;

        // Atualiza o título da página
        if (titulo) titulo.textContent = nomeEvento;

        // 2️⃣ Buscar fotos do evento via POST
        const respFotos = await fetch('../../../actions/action-listar-fotos-evento.php', {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ id_evento: idEvento })
        });

        const dataFotos = await respFotos.json();

        if (dataFotos.status === 'success' && Array.isArray(dataFotos.dados) && dataFotos.dados.length > 0) {
            renderizarFotos(dataFotos.dados);
        } else {
            container.innerHTML = '<p>Nenhuma foto encontrada para este evento.</p>';
        }

    } catch (error) {
        console.error('Erro ao carregar fotos do evento:', error);
        container.innerHTML = '<p>Erro ao carregar fotos.</p>';
    }
});

// Função para fechar modal
function fecharDialog() {
    document.getElementById('dialog-img').close();
}