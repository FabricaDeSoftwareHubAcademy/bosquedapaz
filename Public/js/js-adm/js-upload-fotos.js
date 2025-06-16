document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('form-upload-fotos');
    const inputFotos = document.getElementById('fotos');
    const preview = document.getElementById('preview-galeria');

    // 🎨 Preview das imagens selecionadas
    inputFotos.addEventListener('change', () => {
        preview.innerHTML = '';
        const arquivos = inputFotos.files;

        if (arquivos.length === 0) {
            preview.innerHTML = '<p>Nenhuma foto selecionada.</p>';
            return;
        }

        Array.from(arquivos).forEach(arquivo => {
            const reader = new FileReader();
            reader.onload = e => {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.alt = 'Preview';
                img.style.width = '150px';
                img.style.margin = '5px';
                img.style.borderRadius = '8px';
                img.style.boxShadow = '0 0 5px rgba(0,0,0,0.3)';
                preview.appendChild(img);
            };
            reader.readAsDataURL(arquivo);
        });
    });

    // 🚀 Envio assíncrono
    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(form);
        const idEvento = formData.get('id_evento');

        try {
            const response = await fetch('../../../actions/action-upload-fotos.php', {
                method: 'POST',
                body: formData
            });

            const texto = await response.text();
            console.log('Resposta bruta:', texto);
            const data = JSON.parse(texto);

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
    });
});