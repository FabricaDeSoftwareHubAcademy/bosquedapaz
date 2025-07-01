document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('form-artista');
    const btnSalvarForm = document.getElementById('btn-salvar');
    const modalConfirmar = document.getElementById('modal-confirmar');
    const modalLoading = document.getElementById('modal-loading');
    const modalSucesso = document.getElementById('modal-sucesso');

    const btnConfirmarSalvar = document.getElementById('btn-modal-salvar');
    const btnCancelar = document.getElementById('btn-modal-cancelar');
    const btnFechar = document.getElementById('close-modal-confirmar');
    const btnFecharSucesso = document.getElementById('close-modal-sucesso');

    btnSalvarForm.addEventListener('click', function (e) {
        e.preventDefault();
        modalConfirmar.showModal();
    });

    btnConfirmarSalvar.addEventListener('click', function () {
        modalConfirmar.close();
        modalLoading.showModal();

        const formData = new FormData(form);

        fetch('../../../actions/cadastrar-artista.php', {
            method: 'POST',
            body: formData
        })
        .then(resp => resp.json())
        .then(res => {
            modalLoading.close();

            if (res.status === 'success') {
                modalSucesso.showModal();
                form.reset(); // limpa o formulário
            } else {
                alert("Erro ao cadastrar: " + res.message);
            }
        })
        .catch(error => {
            modalLoading.close();
            console.error("Erro:", error);
            alert("Erro inesperado ao cadastrar.");
        });
    });

    btnCancelar.addEventListener('click', () => modalConfirmar.close());
    btnFechar.addEventListener('click', () => modalConfirmar.close());
    btnFecharSucesso.addEventListener('click', () => modalSucesso.close());
});
