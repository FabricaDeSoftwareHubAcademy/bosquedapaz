document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('form-upload-fotos');
    const inputFotos = document.getElementById('fotos');
    const preview = document.getElementById('preview-galeria');
    const contadorFotos = document.createElement('p');
    const maxFotos = 20;

    let arquivosSelecionados = [];

    // Adiciona contador na tela
    contadorFotos.id = 'contador-fotos';
    contadorFotos.style.fontWeight = 'bold';
    preview.before(contadorFotos);
    atualizarContador();

    function atualizarContador() {
        const restantes = maxFotos - arquivosSelecionados.length;
        contadorFotos.textContent = `Você pode adicionar até ${restantes} foto(s).`;
    }

    function adicionarPreview(arquivo, index) {
        const reader = new FileReader();
        reader.onload = (e) => {
            const div = document.createElement('div');
            div.classList.add('preview-box');
            div.style.position = 'relative';
            div.style.display = 'inline-block';

            const img = document.createElement('img');
            img.src = e.target.result;
            img.alt = 'Preview';
            Object.assign(img.style, {
                width: '150px',
                margin: '5px',
                borderRadius: '8px',
                boxShadow: '0 0 5px rgba(0,0,0,0.3)'
            });

            const btnRemover = document.createElement('button');
            btnRemover.textContent = '×';
            Object.assign(btnRemover.style, {
                position: 'absolute',
                top: '0',
                right: '5px',
                background: '#e74c3c',
                color: 'white',
                border: 'none',
                borderRadius: '50%',
                width: '25px',
                height: '25px',
                cursor: 'pointer',
                fontWeight: 'bold',
                boxShadow: '0 0 3px rgba(0,0,0,0.5)'
            });

            btnRemover.addEventListener('click', () => {
                arquivosSelecionados.splice(index, 1);
                renderizarGaleria();
            });

            div.appendChild(img);
            div.appendChild(btnRemover);
            preview.appendChild(div);
        };
        reader.readAsDataURL(arquivo);
    }

    function renderizarGaleria() {
        preview.innerHTML = '';
        arquivosSelecionados.forEach((arquivo, index) => adicionarPreview(arquivo, index));
        atualizarContador();
    }

    function atualizarPreview() {
        const novosArquivos = Array.from(inputFotos.files);

        if ((arquivosSelecionados.length + novosArquivos.length) > maxFotos) {
            alert(`Limite de ${maxFotos} fotos atingido.`);
            inputFotos.value = '';
            return;
        }

        arquivosSelecionados = arquivosSelecionados.concat(novosArquivos);
        renderizarGaleria();

        inputFotos.value = '';
    }

    async function enviarFotos() {
        if (arquivosSelecionados.length === 0) {
            alert('Nenhuma foto selecionada!');
            return;
        }

        const formData = new FormData();
        const idEvento = document.getElementById('id_evento').value;
        formData.append('id_evento', idEvento);

        arquivosSelecionados.forEach((arquivo) => {
            formData.append('fotos[]', arquivo);
        });

        try {
            const response = await fetch('../../../actions/action-upload-fotos.php', {
                method: 'POST',
                body: formData
            });

            const texto = await response.text();
            console.log('Resposta bruta:', texto);

            let data;
            try {
                data = JSON.parse(texto);
            } catch (jsonError) {
                console.error('Erro ao converter JSON:', jsonError);
                alert(`Erro ao interpretar resposta do servidor:\n${texto}`);
                return;
            }

            if (data.status === 'success') {
                alert(data.mensagem);
                arquivosSelecionados = []; // Limpa array
                renderizarGaleria();       // Limpa preview
                window.location.href = `./gerenciar-eventos.php`;
            } else {
                alert('Erro: ' + data.mensagem);
            }

        } catch (error) {
            console.error('Erro no upload:', error);
            alert('Erro no envio das fotos.');
        }
    }

    inputFotos.addEventListener('change', atualizarPreview);
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        enviarFotos();
    });
});