document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('form-atracao');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(form);
        const id_evento = new URLSearchParams(window.location.search).get('id_evento');

        if (!id_evento) {
            alert("Evento não identificado.");
            return;
        }

        formData.append('id_evento', id_evento);

        try {
            const response = await fetch('../../../actions/action-cadastrar-atracao.php', {
                method: 'POST',
                body: formData
            });

            const data = await response.json();

            if (data.status === 'sucesso') {
                alert(data.mensagem);
                window.location.href = `gerenciar-atracao.php?id_evento=${id_evento}&nome_evento=${encodeURIComponent(formData.get('nome_evento'))}`;
            } else {
                alert(data.mensagem);
            }

        } catch (error) {
            console.error('Erro ao cadastrar atração:', error);
            alert("Erro ao cadastrar atração.");
        }
    });
});