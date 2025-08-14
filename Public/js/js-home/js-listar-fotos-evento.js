document.addEventListener('DOMContentLoaded', async () => {
    const container = document.querySelector('.container_galeria');

    // Função para pegar o parâmetro da URL
    function getParametroURL(nome) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(nome);
    }

    const idEvento = getParametroURL('id_evento');

    if (!idEvento) {
        container.innerHTML = '<p>ID do evento não informado.</p>';
        return;
    }

    try {
        const response = await fetch(`../../../actions/action-listar-fotos-evento.php?id_evento=${idEvento}`);
        const data = await response.json();
        
        console.log("🔍 Retorno da API:", data); // <-- aqui, data e não dados
        
        if (data.status === 'success' && Array.isArray(data.dados) && data.dados.length > 0) {
            container.innerHTML = ''; // limpa qualquer conteúdo inicial
        
            data.dados.forEach(foto => {
                const caminhoFoto = `../../../Public/${foto.caminho_foto_evento}`;
                console.log("📷 Caminho da foto:", caminhoFoto);
            
                const item = document.createElement('div');
                item.classList.add('item-galeria');
            
                item.innerHTML = `
                    <img src="${caminhoFoto}" alt="Foto do evento">
                `;
            
                item.querySelector('img').addEventListener('click', () => {
                    document.getElementById('img-dialog-view').src = caminhoFoto;
                    document.getElementById('dialog-img').showModal();
                });
            
                container.appendChild(item);
            
                setTimeout(() => {
                  item.classList.add('reveal');
                }, 50);
            });
        
        } else {
            container.innerHTML = '<p>Nenhuma foto encontrada para este evento.</p>';
        }

    } catch (error) {
        console.error('Erro ao carregar fotos do evento:', error);
        container.innerHTML = '<p>Erro ao carregar fotos.</p>';
    }
});

// Função para fechar modal (mantém compatível com seu HTML)
function fecharDialog() {
    document.getElementById('dialog-img').close();
}