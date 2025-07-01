let modal = document.getElementById("modal-confirmar");
let btnModalSalvar = document.getElementById("btn-modal-salvar");
let btnModalCancelar = document.getElementById("btn-modal-cancelar");
let btnFecharModal = document.getElementById("close-modal-confirmar");

let modalErro = document.getElementById("modal-error");
let btnFecharErro = document.getElementById("close-modal-erro");

let formulario = document.getElementById("form-artista");

formulario.addEventListener('submit', function(event) {
    event.preventDefault(); 
    modal.showModal();     
});

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
            modal.close(); 
        } else {
            modal.close();  
            modalErro.showModal(); 
        }

    } catch (error) {
        modal.close();       
        modalErro.showModal(); 
    }
});

btnModalCancelar.addEventListener('click', function() {
    modal.close();
});

btnFecharModal.addEventListener('click', function() {
    modal.close();
});

 btnFecharErro.addEventListener('click', function() {
    modalErro.close();
});
