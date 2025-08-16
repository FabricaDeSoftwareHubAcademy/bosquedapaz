document.addEventListener('DOMContentLoaded', async () => {
    try {


        const res = await fetch('../../../actions/action-utilidade-mais-proxima.php');
        const json = await res.json();

        if (json.status_utilidade === 'success') {
            const utilidade = json.utilidade;

            const imgPrincipal = document.getElementById('img_prox_utility');
            const imgPequena = document.querySelector('.img_prox_utility_pequena');

            
            const caminhoImg = `../../${utilidade.imagem}`;


            if (imgPrincipal) imgPrincipal.src = caminhoImg;
            if (imgPequena) imgPequena.src = caminhoImg;

        } else {
            console.warn('Utilidade mais recente não encontrada');
        }
    } catch (error) {
        console.error('Erro ao buscar a utilidade publica:', error);
    }

    function formatarDataBR(data) {
        const [ano, mes, dia] = data.split('-');
        return `${dia}/${mes}/${ano}`;
    }
});