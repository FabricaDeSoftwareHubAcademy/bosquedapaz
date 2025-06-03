document.addEventListener('DOMContentLoaded', async () => {
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
            document.getElementById('descricao').value = evento.descricao;
            document.getElementById('dataevento').value = evento.data_evento;
            document.getElementById('status').value = evento.status;

            const banner = document.getElementById('preview-banner');
            banner.src = `../../../Public/uploads/${evento.banner}`;
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