document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('form-upload-fotos');
    const inputFotos = document.getElementById('fotos');
    const preview = document.getElementById('preview-galeria');
    const contadorFotos = document.createElement('p');
    const maxFotos = 20;

    let arquivosSelecionados = [];
    let fotosExistentes = [];

    contadorFotos.id = 'contador-fotos';
    contadorFotos.style.fontWeight = 'bold';
    preview.before(contadorFotos);

    function atualizarContador() {
        const total = arquivosSelecionados.length + fotosExistentes.length;
        const restantes = maxFotos - total;
        contadorFotos.textContent = `Você pode adicionar até ${restantes} foto(s).`;
    }

    function renderizarGaleria() {
        preview.innerHTML = '';

        // Fotos existentes do banco
        fotosExistentes.forEach((foto, index) => {
            const div = document.createElement('div');
            div.classList.add('preview-box');
            div.style.position = 'relative';
            div.style.display = 'inline-block';

            const img = document.createElement('img');
            img.src = `../../../Public/${foto.caminho_foto_evento}`;
            img.alt = 'Foto cadastrada';
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
                fontWeight: 'bold'
            });

            btnRemover.addEventListener('click', () => {
                document.getElementById('confirmar-title').innerText = 'Excluir foto';
                document.getElementById('msm-confimar').innerText = 'Tem certeza que deseja excluir esta foto do evento?';
                openModalConfirmar();

                document.getElementById('close-modal-confirmar').addEventListener('click', closeModalConfirmar, { once: true });
                document.getElementById('btn-modal-cancelar').addEventListener('click', closeModalConfirmar, { once: true });

                document.getElementById('btn-modal-salvar').addEventListener('click', async () => {
                    closeModalConfirmar();
                    try {
                        const tokenCsrf = document.getElementById('tolkenCsrf').value;
                        const res = await fetch('../../../actions/action-excluir-foto-evento.php', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                            body: `id_foto=${foto.id_foto}&tolkenCsrf=${tokenCsrf}`
                        });

                        const resultado = await res.json();
                        if (resultado.status === 'success') {
                            fotosExistentes.splice(index, 1);
                            renderizarGaleria();
                            document.getElementById('msm-sucesso').innerText = resultado.mensagem || 'Foto excluída com sucesso!';
                            openModalSucesso();
                            document.getElementById('close-modal-sucesso').addEventListener('click', closeModalSucesso, { once: true });
                        } else {
                            document.getElementById('erro-title').innerText = 'Erro ao excluir';
                            document.getElementById('erro-text').innerText = resultado.mensagem || 'Não foi possível excluir a foto.';
                            openModalError();
                            document.getElementById('close-modal-erro').addEventListener('click', closeModalError, { once: true });
                        }
                    } catch (err) {
                        document.getElementById('erro-title').innerText = 'Falha de comunicação';
                        document.getElementById('erro-text').innerText = 'Erro de conexão ao excluir a foto.';
                        openModalError();
                        document.getElementById('close-modal-erro').addEventListener('click', closeModalError, { once: true });
                    }
                }, { once: true });
            });

            div.appendChild(img);
            div.appendChild(btnRemover);
            preview.appendChild(div);
        });

        // Novas fotos selecionadas
        arquivosSelecionados.forEach((arquivo, index) => {
            const reader = new FileReader();
            reader.onload = (e) => {
                const div = document.createElement('div');
                div.classList.add('preview-box');
                div.style.position = 'relative';
                div.style.display = 'inline-block';

                const img = document.createElement('img');
                img.src = e.target.result;
                img.alt = 'Preview nova';
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
                    background: '#e67e22',
                    color: 'white',
                    border: 'none',
                    borderRadius: '50%',
                    width: '25px',
                    height: '25px',
                    cursor: 'pointer',
                    fontWeight: 'bold'
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
        });

        atualizarContador();
    }

    const atualizarPreview = () => {
        const novosArquivos = Array.from(inputFotos.files);
        const total = arquivosSelecionados.length + fotosExistentes.length + novosArquivos.length;

        if (total > maxFotos) {
            document.getElementById('erro-title').innerText = 'Limite de fotos atingido';
            document.getElementById('erro-text').innerText = `Você só pode adicionar no máximo ${maxFotos} fotos no evento.`;
            openModalError();
            document.getElementById('close-modal-erro').addEventListener('click', closeModalError, { once: true });
            inputFotos.value = '';
            return;
        }

        arquivosSelecionados = arquivosSelecionados.concat(novosArquivos);
        renderizarGaleria();
        inputFotos.value = '';
    };

    const carregarFotosExistentes = async () => {
        const idEvento = document.getElementById('id_evento').value;

        try {
            const response = await fetch(`../../../actions/action-listar-fotos-evento.php?id_evento=${idEvento}`);
            const resultado = await response.json();

            if (resultado.status === 'success') {
                fotosExistentes = resultado.dados;
                renderizarGaleria();
            } else {
                document.getElementById('erro-title').innerText = 'Erro ao buscar fotos';
                document.getElementById('erro-text').innerText = resultado.mensagem || 'Não foi possível carregar as fotos do evento.';
                openModalError();
                document.getElementById('close-modal-erro').addEventListener('click', closeModalError, { once: true });
            }
        } catch (error) {
            document.getElementById('erro-title').innerText = 'Falha de comunicação';
            document.getElementById('erro-text').innerText = 'Erro ao carregar fotos existentes.';
            openModalError();
            document.getElementById('close-modal-erro').addEventListener('click', closeModalError, { once: true });
        }
    };

    const enviarFotos = async () => {
    if (arquivosSelecionados.length === 0 && fotosExistentes.length === 0) {
        document.getElementById('erro-title').innerText = 'Nenhuma foto selecionada';
        document.getElementById('erro-text').innerText = 'Selecione ao menos uma foto para enviar.';
        openModalError();
        document.getElementById('close-modal-erro').addEventListener('click', closeModalError, { once: true });
        return;
    }

    if (arquivosSelecionados.length === 0 && fotosExistentes.length > 0) {
        
        document.getElementById('msm-sucesso').innerText = 'Nenhuma nova foto enviada, mas as já existentes foram mantidas.';
        openModalSucesso();
        document.getElementById('close-modal-sucesso').addEventListener('click', closeModalSucesso, { once: true });
        return;
    }

        document.getElementById('confirmar-title').innerText = 'Enviar fotos';
        document.getElementById('msm-confimar').innerText = 'Deseja confirmar o envio destas fotos para o evento?';
        openModalConfirmar();

        document.getElementById('close-modal-confirmar').addEventListener('click', closeModalConfirmar, { once: true });
        document.getElementById('btn-modal-cancelar').addEventListener('click', closeModalConfirmar, { once: true });

        document.getElementById('btn-modal-salvar').addEventListener('click', async () => {
            closeModalConfirmar();

            const formData = new FormData();
            const idEvento = document.getElementById('id_evento').value;
            formData.append('id_evento', idEvento);
            formData.append("tolkenCsrf", document.getElementById("tolkenCsrf").value);

            arquivosSelecionados.forEach((arquivo) => {
                formData.append('fotos[]', arquivo);
            });

            try {
                const response = await fetch('../../../actions/action-upload-fotos.php', {
                    method: 'POST',
                    body: formData
                });

                const data = await response.json();

                if (data.status === 'success') {
                    document.getElementById('msm-sucesso').innerText = data.mensagem || 'Fotos enviadas com sucesso!';
                    openModalSucesso();
                    document.getElementById('close-modal-sucesso').addEventListener('click', closeModalSucesso, { once: true });
                    arquivosSelecionados = [];
                    await carregarFotosExistentes();
                } else {
                    document.getElementById('erro-title').innerText = 'Erro no envio';
                    document.getElementById('erro-text').innerText = data.mensagem || 'Ocorreu um erro ao enviar as fotos.';
                    openModalError();
                    document.getElementById('close-modal-erro').addEventListener('click', closeModalError, { once: true });
                }
            } catch (error) {
                document.getElementById('erro-title').innerText = 'Falha de comunicação';
                document.getElementById('erro-text').innerText = 'Erro no envio das fotos.';
                openModalError();
                document.getElementById('close-modal-erro').addEventListener('click', closeModalError, { once: true });
            }
        }, { once: true });
    };

    // Eventos
    inputFotos.addEventListener('change', atualizarPreview);
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        enviarFotos();
    });

    carregarFotosExistentes();
});