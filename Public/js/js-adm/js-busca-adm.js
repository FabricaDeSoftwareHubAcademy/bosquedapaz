 document.addEventListener('DOMContentLoaded', function () {
        const inputBusca = document.getElementById('busca');
        const tbody = document.getElementById('tbody-colaboradores');
        const formBusca = document.getElementById('formBusca');

        async function buscarColaboradores(termo) {
            const formData = new FormData();
            formData.append('palavra', termo);

            try {
                const resposta = await fetch('../../../actions/action-colaborador.php', {
                    method: 'POST',
                    body: formData
                });

                if (!resposta.ok) throw new Error('Erro na requisição.');

                const html = await resposta.text();
                tbody.innerHTML = html;
            } catch (erro) {
                console.error('Erro ao buscar colaboradores:', erro);
                tbody.innerHTML = '<tr><td colspan="6">Erro ao buscar dados.</td></tr>';
            }
        }

        // Buscar inicialmente para mostrar todos os colaboradores
        buscarColaboradores('');

        // Buscar ao digitar
        inputBusca.addEventListener('input', () => {
            const termo = inputBusca.value.trim();
            buscarColaboradores(termo);
        });

        // Prevenir submit do form (caso clique no botão)
        formBusca.addEventListener('submit', (e) => {
            e.preventDefault();
            buscarColaboradores(inputBusca.value.trim());
        });
    });