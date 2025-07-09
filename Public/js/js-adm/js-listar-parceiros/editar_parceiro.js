document.addEventListener("DOMContentLoaded", function () {
    const urlParams = new URLSearchParams(window.location.search);
    const idParceiro = urlParams.get("id");

    if (idParceiro) {
        fetch(`../../../actions/action-editar-parceiro.php?id=${idParceiro}`)
            .then(res => res.json())
            .then(data => {
                if (data.erro) {
                    alert(data.erro);
                    return;
                }
                document.getElementById("nome_parceiro").value = data.nome_parceiro || '';
                document.getElementById("telefone").value = data.telefone || '';
                document.getElementById("num_residencia").value = data.num_residencia || '';
                document.getElementById("cidade").value = data.cidade || '';
                document.getElementById("email").value = data.email || '';
                document.getElementById("cpf_cnpj").value = data.cpf_cnpj || '';
                document.getElementById("cep").value = data.cep || '';
                document.getElementById("complemento").value = data.complemento || '';
                document.getElementById("estado").value = data.estado || '';
                document.getElementById("nome_contato").value = data.nome_contato || '';
                document.getElementById("tipo").value = data.tipo || '';
                document.getElementById("logradouro").value = data.logradouro || '';
                document.getElementById("bairro").value = data.bairro || '';
                // A logo não é preenchida automaticamente por segurança
            })
            .catch(err => {
                console.error("Erro ao buscar parceiro:", err);
                alert("Erro ao carregar dados do parceiro.");
            });
    } else {
        alert("ID do parceiro não foi fornecido na URL.");
    }
});