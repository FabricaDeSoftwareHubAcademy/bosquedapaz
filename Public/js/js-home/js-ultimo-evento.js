document.addEventListener('DOMContentLoaded', async () => {
    try {
        const res = await fetch('../../../actions/action-listar-ultimo-evento-finalizado.php');
        const json = await res.json();

        if (json.status === 'success') {
            const evento = json.evento;

            // Suponha que o card tenha esses seletores no HTML:
            const cardImagem = document.querySelector('.edicoes-passadas .card .img-ult');
            const cardTitulo = document.querySelector('.edicoes-passadas .card .titulo h3');
            const cardDescricao = document.querySelector('.edicoes-passadas .card .text p');
            const cardLink = document.querySelector('.edicoes-passadas .card .meu-botao');

            if (cardImagem) cardImagem.src = `../../../Public/${evento.banner_evento}`;
            if (cardTitulo) cardTitulo.textContent = evento.nome_evento;
            if (cardDescricao) cardDescricao.textContent = evento.descricao_evento;
            if (cardLink) cardLink.href = `galeria-de-imagens.php?id_evento=${evento.id_evento}`;
            
        } else {
            console.warn('Nenhum evento finalizado encontrado');
        }
    } catch (error) {
        console.error('Erro ao buscar último evento finalizado:', error);
    }
});