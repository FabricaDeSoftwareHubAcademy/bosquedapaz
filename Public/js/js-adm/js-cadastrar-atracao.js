

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('form-atracao');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(form);

        // Pegando parâmetros da URL
        const params = new URLSearchParams(window.location.search);
        const id_evento = params.get('id_evento');

        if (!id_evento) {
            alert("Evento não identificado corretamente.");
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
                window.location.href = `gerenciar-atracao.php?id_evento=${id_evento}`;
            } else {
                alert(data.mensagem || "Erro ao cadastrar atração.");
            }

        } catch (error) {
            console.error('Erro ao cadastrar atração:', error);
            alert("Erro inesperado ao cadastrar atração.");
        }
    });
});