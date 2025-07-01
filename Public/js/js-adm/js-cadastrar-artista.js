document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('form-artista');
    const btnSalvarForm = document.getElementById('btn-salvar'); // botão "Salvar" do formulário
    const modalConfirmar = document.getElementById('modal-confirmar');
    const btnConfirmarSalvar = document.getElementById('btn-modal-salvar'); // botão "Salvar" do modal
    const btnCancelar = document.getElementById('btn-modal-cancelar');
    const btnFechar = document.getElementById('close-modal-confirmar');

    // Quando clicar no botão Salvar do formulário, mostra o modal
    btnSalvarForm.addEventListener('click', function (e) {
        e.preventDefault(); // impede envio do form
        modalConfirmar.showModal();
    });

    // Quando confirmar no modal
    btnConfirmarSalvar.addEventListener('click', function () {
        const formData = new FormData(form);

        console.log("📋 Dados do formulário:");
        for (const [campo, valor] of formData.entries()) {
            console.log(`${campo}: ${valor}`); // <-- crase corrigida
        }

        // Envia os dados para o backend
        fetch('../../../actions/cadastrar-artista.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(res => {
            if (res.status === 'success') {
                alert("Artista cadastrado com sucesso!");
                form.reset(); // limpa o formulário
            } else {
                alert(" Erro ao cadastrar: " + res.message);
            }
        })
        .catch(error => {
            alert("Erro ao enviar dados.");
            console.error(error);
        });

        modalConfirmar.close();
    });

    // Cancelar ou fechar o modal
    btnCancelar.addEventListener('click', () => modalConfirmar.close());
    btnFechar.addEventListener('click', () => modalConfirmar.close());
});
