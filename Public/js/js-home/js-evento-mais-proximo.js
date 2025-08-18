 document.addEventListener('DOMContentLoaded', async () => {
    try {
        const res = await fetch('../../../actions/action-evento-mais-proximo.php');
        const json = await res.json();

        if (json.status === 'success') {
            const evento = json.evento;

            
            const imgPrincipal = document.querySelector('.img_prox_event');
            const imgPequena = document.querySelector('.img_prox_event_pequena');

            const caminhoBanner = `../../../Public/${evento.banner_evento}`;
            if (imgPrincipal) imgPrincipal.src = caminhoBanner;
            if (imgPequena) imgPequena.src = caminhoBanner;


        } else {
            console.warn('Evento mais próximo não encontrado');
        }
    } catch (error) {
        console.error('Erro ao buscar evento mais próximo:', error);
    }

    function formatarDataBR(data) {
        const [ano, mes, dia] = data.split('-');
        return `${dia}/${mes}/${ano}`;
    }
});