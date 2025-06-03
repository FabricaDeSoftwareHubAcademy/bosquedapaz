async function buscarColaboradores(){
    const termo = document.getElementById('busca').value;

    const res = await fetch('../../../actions/action-colaborador.php' + encodeURIComponent(termo));
    const colaboradores = await res.json();

    const tbody = document.querySelector('#tabela-colaboradores tbody');
    tbody.innerHTML = '';

    colaboradores.forEach(colab => {
        const tr = document.createElement('tr');
        tr.
    });
}