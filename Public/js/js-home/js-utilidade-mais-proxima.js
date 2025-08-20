document.addEventListener('DOMContentLoaded', async () => {
    try {
        const res = await fetch('../../../actions/action-utilidade-mais-proxima.php');
        const json = await res.json();

        if (json.status_utilidade === 'success') {
            const utilidade = json.utilidade;

            const imgPrincipal = document.getElementById('img_prox_utility');
            const imagensPequenas = document.querySelectorAll('.img_prox_event_pequena');

            const caminhoImg = `../../${utilidade.imagem}`;

            if (imgPrincipal) imgPrincipal.src = caminhoImg;
            imagensPequenas.forEach(img => img.src = caminhoImg);

        } else {
            console.warn('Utilidade mais recente não encontrada');
        }
    } catch (error) {
        console.error('Erro ao buscar a utilidade publica:', error);
    }
});