window.addEventListener('DOMContentLoaded', () => {
    const params = new URLSearchParams(window.location.search);

    document.querySelector('input[name="titulo"]').value = params.get('titulo') || '';
    document.querySelector('textarea[name="descricaodoevento"]').value = params.get('descricao') || '';
    document.querySelector('input[name="data-inicio"]').value = params.get('data_inicio') || '';
    document.querySelector('input[name="data-fim"]').value = params.get('data_fim') || '';
    document.querySelector('input[name="file"]').value = params.get('imagem') || '';

    // Se quiser, guarde o id no formulário
    const form = document.getElementById('form_editar_utilidade');
    if (form && params.get('id')) {
        form.dataset.id = params.get('id');
    }
});

let btn_editar = document.getElementById("edit-icon");

btn_editar.addEventListener('click', async function (event) {

    event.preventDefault();
    let formulario = document.getElementById("form_editar_utilidade");

    let formData = new FormData(formulario);

    console.log(formData);

    let dados_php = await fetch('../../../actions/action-editar-utilidade-publica.php', {
        method: 'POST',
        body: formData
    });

    let response = await dados_php.json();

    if (response.status == 200) {
        console.log(response.msg);
        alert("Editado com sucesso!") /// SUBSTITUIR PELO MODAL mostraModal()
    } else {
        console.log(response.msg);
        alert("Erro ao Editar!") /// SUBSTITUIR PELO MODAL mostraModal()
    }
})
