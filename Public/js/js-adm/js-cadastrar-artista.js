document.addEventListener('DOMContentLoaded', function() {
    const linguagemArtistica = document.getElementById('linguagem_artistica');
    const estiloMusicaContainer = document.getElementById('estilo_musica_container');
    
    estiloMusicaContainer.style.display = 'none';
    


    const modalConfirmar = document.getElementById('modal-confirmar');
    const btnSalvar = document.getElementById('btn-salvar');
    const btnCancelar = document.getElementById('btn-modal-cancelar');
    const btnModalSalvar = document.getElementById('btn-modal-salvar');
    const closeModalConfirmar = document.getElementById('close-modal-confirmar');
    const overlay = document.getElementById('overlay');
    const formArtista = document.getElementById('form-artista');

    btnSalvar.addEventListener('click', function(e) {
        e.preventDefault();
        
        let isValid = true;
        const requiredFields = ['nome', 'nome_artistico', 'email', 'whatsapp', 'linguagem_artistica', 'publico_alvo', 'tempo_apresentacao', 'valor_cache'];
        
        requiredFields.forEach(field => {
            const input = document.getElementById(field);
            if (!input.value) {
                isValid = false;
                input.classList.add('error');
            } else {
                input.classList.remove('error');
            }
        });

        if (linguagemArtistica.value === 'musica' && !document.getElementById('estilo_musica').value) {
            isValid = false;
            document.getElementById('estilo_musica').classList.add('error');
        } else {
            document.getElementById('estilo_musica').classList.remove('error');
        }

        if (!isValid) {
            alert('Por favor, preencha todos os campos obrigatórios.');
            return;
        }

        modalConfirmar.showModal();
        overlay.style.display = 'block';
    });

    function fecharModalConfirmar() {
        modalConfirmar.close();
        overlay.style.display = 'none';
    }

    btnCancelar.addEventListener('click', fecharModalConfirmar);
    closeModalConfirmar.addEventListener('click', fecharModalConfirmar);

    btnModalSalvar.addEventListener('click', async function() {
        fecharModalConfirmar();
        
        try {
            const formData = new FormData(formArtista);
            
            const response = await fetch('../../../actions/cadastrar_artista.php', {
                method: 'POST',
                body: formData
            });

            const data = await response.json();

            if (data.status === 200) {
                const modalSucesso = document.getElementById('modal_sucesso');
                modalSucesso.classList.remove('oculta');
                modalSucesso.classList.add('show_modal');
                overlay.style.display = 'block';

                setTimeout(() => {
                    window.location.href = data.redirect || 'lista_artistas.php';
                }, 3000);
            } else {
                const modalError = document.getElementById('modal_error');
                const errorMsg = document.getElementById('error-msg');
                
                errorMsg.textContent = data.msg || 'Erro ao cadastrar artista. Por favor, tente novamente.';
                modalError.classList.remove('oculta');
                modalError.classList.add('show_modal');
                overlay.style.display = 'block';
            }
        } catch (error) {
            console.error('Erro:', error);
            const modalError = document.getElementById('modal_error');
            const errorMsg = document.getElementById('error-msg');
            
            errorMsg.textContent = 'Erro ao conectar com o servidor. Por favor, tente novamente.';
            modalError.classList.remove('oculta');
            modalError.classList.add('show_modal');
            overlay.style.display = 'block';
        }
    });

    const fecharModais = document.querySelectorAll('.fechar-modal');
    fecharModais.forEach(btn => {
        btn.addEventListener('click', function() {
            const modal = this.closest('.modal');
            modal.classList.remove('show_modal');
            modal.classList.add('oculta');
            overlay.style.display = 'none';
        });
    });

    const whatsappInput = document.getElementById('whats');
    whatsappInput.addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
});