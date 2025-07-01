// Modal de confirmação
let modal = document.getElementById("modal-confirmar");
let btnModalSalvar = document.getElementById("btn-modal-salvar");
let btnModalCancelar = document.getElementById("btn-modal-cancelar");
let btnFecharModal = document.getElementById("close-modal-confirmar");

// Modal de erro
let modalErro = document.getElementById("modal-error");
let btnFecharErro = document.getElementById("close-modal-erro");

// Modal de sucesso
let modalSucesso = document.getElementById("modal-sucesso");
let btnFecharSucesso = document.getElementById("close-modal-sucesso");

// Formulário
let formulario = document.getElementById("form-artista");

// Abrir modal de confirmação ao tentar enviar o formulário
formulario.addEventListener('submit', function(event) {
    event.preventDefault();
    modal.showModal(); // mostra modal de confirmação
});

// Clique em "Salvar" dentro do modal de confirmação
btnModalSalvar.addEventListener('click', async function() {
    let dadosForms = new FormData(formulario);

    try {
        let dados_php = await fetch("../../../actions/cadastrar_artista.php", {
            method: "POST",
            body: dadosForms
        });

        let response = await dados_php.json();

        console.log(response);

        if (response.status === 200) {
            formulario.reset();
            modal.close();             // Fecha modal de confirmação
            modalSucesso.showModal();  // Abre modal de sucesso
        } else {
            modal.close();
            modalErro.showModal();     // Abre modal de erro
        }

    } catch (error) {
        modal.close();
        modalErro.showModal();
    }
});

// Fechar modal de confirmação
btnModalCancelar.addEventListener('click', function() {
    modal.close();
});

btnFecharModal.addEventListener('click', function() {
    modal.close();
});

// Fechar modal de erro
btnFecharErro.addEventListener('click', function() {
    modalErro.close();
});

// Fechar modal de sucesso
btnFecharSucesso.addEventListener('click', function() {
    modalSucesso.close();
});
