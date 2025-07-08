document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('form-upload-fotos');
    const inputFotos = document.getElementById('fotos');
    const preview = document.getElementById('preview-galeria');
    const maxFotos = 20;

    /**
     * Cria uma miniatura da imagem no preview
     * @param {File} arquivo
     */
    const adicionarPreview = (arquivo) => {
        const reader = new FileReader();
        reader.onload = (e) => {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.alt = 'Preview';
            Object.assign(img.style, {
                width: '150px',
                margin: '5px',
                borderRadius: '8px',
                boxShadow: '0 0 5px rgba(0,0,0,0.3)'
            });
            preview.appendChild(img);
        };
        reader.readAsDataURL(arquivo);
    };

    /**
     * Atualiza a galeria com as imagens selecionadas
     */
    const atualizarPreview = () => {
        preview.innerHTML = '';
        const arquivos = inputFotos.files;

        if (!arquivos.length) {
            preview.innerHTML = '<p>Nenhuma foto selecionada.</p>';
            return;
        }

        Array.from(arquivos).forEach(adicionarPreview);
    };

    /**
     * Verifica se o limite de fotos foi ultrapassado
     * @returns {boolean}
     */
    const excedeuLimiteDeFotos = () => {
        const fotosExistentes = document.querySelectorAll('#preview-galeria img').length;
        const fotosSelecionadas = inputFotos.files.length;
        return (fotosExistentes + fotosSelecionadas) > maxFotos;
    };

    /**
     * Envia as fotos via Fetch API
     */
    const enviarFotos = async () => {
        const formData = new FormData();
        const idEvento = document.getElementById('id_evento').value;

        formData.append('id_evento', idEvento);

        const arquivos = inputFotos.files;

        if (!arquivos.length) {
            alert('Nenhuma foto selecionada!');
            return;
        }

        if (excedeuLimiteDeFotos()) {
            alert(`Você só pode cadastrar no máximo ${maxFotos} fotos por evento.`);
            return;
        }

        Array.from(arquivos).forEach((arquivo) => {
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
                window.location.href = `galeria-fotos.php?id_evento=${idEvento}`;
            } else {
                alert('Erro: ' + data.mensagem);
            }
        } catch (error) {
            console.error('Erro no upload:', error);
            alert('Erro no envio das fotos.');
        }
    };

    // Eventos
    inputFotos.addEventListener('change', atualizarPreview);
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        enviarFotos();
    });
});