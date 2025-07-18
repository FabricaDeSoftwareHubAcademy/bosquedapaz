const selectEndereco = document.getElementById('select-endereco');

const carregarEnderecos = async () => {
    try {
        const response = await fetch('../../../actions/action-listar-enderecos-evento.php');
        const data = await response.json();

        if (data.status === 'sucesso') {
            selectEndereco.innerHTML = ''; // Limpa as opções

            data.dados.forEach(endereco => {
                const option = document.createElement('option');
                option.value = endereco.id_endereco_evento;
                option.textContent = `${endereco.nome_local} - ${endereco.cidade_evento}`;
                selectEndereco.appendChild(option);
            });
        } else {
            console.error('Erro ao carregar endereços:', data.mensagem);
        }
    } catch (erro) {
        console.error('Erro de rede ao carregar endereços:', erro);
    }
};

// Chama a função ao carregar a página
document.addEventListener('DOMContentLoaded', carregarEnderecos);