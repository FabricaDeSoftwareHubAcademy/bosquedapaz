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

        // Fotos do banco
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

            btnRemover.addEventListener('click', async () => {
                const confirma = confirm('Deseja excluir esta foto do evento?');
                if (!confirma) return;

                try {
                    const res = await fetch('../../../actions/action-excluir-foto-evento.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                        body: `id_foto=${foto.id_foto}`
                    });

                    const resultado = await res.json();
                    if (resultado.status === 'success') {
                        fotosExistentes.splice(index, 1);
                        renderizarGaleria();
                    } else {
                        alert('Erro ao excluir: ' + resultado.mensagem);
                    }
                } catch (err) {
                    console.error('Erro ao excluir:', err);
                }
            });

            div.appendChild(img);
            div.appendChild(btnRemover);
            preview.appendChild(div);
        });

        // Fotos novas
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
            alert(`Limite máximo de ${maxFotos} fotos atingido.`);
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
                console.warn('Erro ao buscar fotos:', resultado.mensagem);
            }
        } catch (error) {
            console.error('Erro ao carregar fotos existentes:', error);
        }
    };

    const enviarFotos = async () => {
        if (arquivosSelecionados.length === 0) {
            alert('Nenhuma nova foto para enviar.');
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
            let data;

            try {
                data = JSON.parse(texto);
            } catch (jsonError) {
                alert(`Erro ao interpretar resposta do servidor:\n${texto}`);
                return;
            }

            if (data.status === 'success') {
                alert(data.mensagem);
                arquivosSelecionados = [];
                await carregarFotosExistentes();
            } else {
                alert('Erro: ' + data.mensagem);
            }

        } catch (error) {
            alert('Erro no envio das fotos.');
            console.error('Erro no upload:', error);
        }
    };

    // Eventos
    inputFotos.addEventListener('change', atualizarPreview);
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        enviarFotos();
    });

    carregarFotosExistentes(); // 🧠
});