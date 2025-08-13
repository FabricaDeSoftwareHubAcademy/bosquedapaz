document.addEventListener('DOMContentLoaded', async () => {
    try {
        const res = await fetch('../../../actions/action-listar-ultimo-evento-finalizado.php');
        const json = await res.json();

        if (json.status === 'success') {
            const evento = json.evento;

            const imgPrincipal = document.querySelector('.img_ultimo_event');
            const imgPequena = document.querySelector('.img_ultimo_evento_pequena');
            const caminhoBanner = `../../../Public/${evento.banner_evento}`;

            if (imgPrincipal) imgPrincipal.src = caminhoBanner;
            if (imgPequena) imgPequena.src = caminhoBanner;
            
        } else {
            console.warn('Nenhum evento finalizado encontrado');
        }
    } catch (error) {
        console.error('Erro ao buscar último evento finalizado:', error);
    }
});