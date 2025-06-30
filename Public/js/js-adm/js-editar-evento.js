document.addEventListener('DOMContentLoaded', async () => {
    const descricaoInput = document.getElementById('descricaodoevento');
    const contador = document.getElementById('contador-caracteres');

    const atualizarContador = () => {
        const restante = 500 - descricaoInput.value.length;
        contador.textContent = `${restante} caracteres restantes`;
        console.log(`Digitado: ${descricaoInput.value.length} caracteres`);
    };

    descricaoInput.addEventListener('input', atualizarContador);

    setTimeout(() => {
        atualizarContador();
    }, 100);


    const params = new URLSearchParams(window.location.search);
    const id = params.get('id');

    if (!id) {
        alert('ID do evento não fornecido.');
        return;
    }

    const form = document.getElementById('form-editar-evento');

    try {
        const response = await fetch(`../../../actions/action-buscar-evento.php?id=${id}`);
        const data = await response.json();

        if (data.status === 'success') {
            const evento = data.evento;

            document.getElementById('id_evento').value = evento.id_evento;
            document.getElementById('nomedoevento').value = evento.nome_evento;
            document.getElementById('subtitulo').value = evento.subtitulo_evento;
            document.getElementById('descricaodoevento').value = evento.descricao_evento;
            document.getElementById('dataevento').value = evento.data_evento;
            document.getElementById('hora_inicio').value = evento.hora_inicio;
            document.getElementById('hora_fim').value = evento.hora_fim;
            document.getElementById('endereco').value = evento.endereco_evento;
            document.getElementById('status').value = evento.status;

            const banner = document.getElementById('preview-image');
            if(evento.banner_evento){
                banner.src = `../../../Public/${evento.banner_evento}`;
                banner.alt = evento.nome_evento ?? 'Imagem do evento';
            }
        } else {
            alert('Evento não encontrado.');
        }

        
        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            const formData = new FormData(form);

            try {
                const response = await fetch('../../../Actions/action-editar-evento.php', {
                    method: 'POST',
                    body: formData
                });

                const text = await response.text();
                console.log('Resposta bruta do servidor:', text);

                const data = JSON.parse(text);

                if (data.status === 'success') {
                    alert(data.mensagem);
                    window.location.href = 'gerenciar-eventos.php';
                } else {
                    alert('Erro ao atualizar evento: ' + data.mensagem);
                }

            } catch (error) {
                console.error('Erro no envio do formulário:', error);
            }
        });

    } catch (error) {
        console.error('Erro ao buscar evento:', error);
        alert('Erro ao buscar evento.');
    }
});