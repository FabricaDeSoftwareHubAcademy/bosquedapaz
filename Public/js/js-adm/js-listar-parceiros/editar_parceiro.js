document.addEventListener("DOMContentLoaded", () => {
    const urlParams = new URLSearchParams(window.location.search);
    const idParceiro = urlParams.get("id");

    if (!idParceiro) {
        alert("ID do parceiro não encontrado.");
        return;
    }

    fetch(`../../../actions/action-buscar-parceiro.php?id=${idParceiro}`)
        .then(response => response.json())
        .then(data => {
            if (data.erro) {
                alert(data.erro);
                return;
            }

            document.getElementById("nome_parceiro").value = data.nome_parceiro || '';
            document.getElementById("telefone").value = data.telefone || '';
            document.getElementById("email").value = data.email || '';
            document.getElementById("cpf_cnpj").value = data.cpf_cnpj || '';
            document.getElementById("nome_contato").value = data.nome_contato || '';
            document.getElementById("tipo").value = data.tipo || '';
            document.getElementById("cep").value = data.cep || '';
            document.getElementById("complemento").value = data.complemento || '';
            document.getElementById("num_residencia").value = data.num_residencia || '';
            document.getElementById("logradouro").value = data.logradouro || '';
            document.getElementById("estado").value = data.estado || '';
            document.getElementById("bairro").value = data.bairro || '';
            document.getElementById("cidade").value = data.cidade || '';
        })
        .catch(error => {
            console.error("Erro ao carregar os dados do parceiro:", error);
            alert("Erro ao carregar os dados do parceiro.");
        });

    document.getElementById("btn-salvar").addEventListener("click", function (e) {
        e.preventDefault();

        if (!idParceiro) {
            alert("ID do parceiro não encontrado.");
            return;
        }

        const formData = new FormData();
        formData.append("salvar", true);
        formData.append("nome_parceiro", document.getElementById("nome_parceiro").value);
        formData.append("telefone", document.getElementById("telefone").value);

        const logoInput = document.getElementById("logo");
        if (logoInput.files.length > 0) {
            formData.append("logo", logoInput.files[0]);
        }

        formData.append("email", document.getElementById("email").value);
        formData.append("cpf_cnpj", document.getElementById("cpf_cnpj").value);
        formData.append("nome_contato", document.getElementById("nome_contato").value);
        formData.append("tipo", document.getElementById("tipo").value);
        formData.append("cep", document.getElementById("cep").value);
        formData.append("complemento", document.getElementById("complemento").value);
        formData.append("num_residencia", document.getElementById("num_residencia").value);
        formData.append("logradouro", document.getElementById("logradouro").value);
        formData.append("estado", document.getElementById("estado").value);
        formData.append("bairro", document.getElementById("bairro").value);

        fetch(`../../../actions/action-editar-parceiro.php?id=${idParceiro}`, {
            method: "POST",
            body: formData
        })
            .then(response => response.json())
            .then(result => {
                if (result.sucesso) {
                    alert(result.sucesso);
                    window.location.href = "../../../app/Views/Adm/listar-parceiros.php";
                } else {
                    alert(result.erro || "Erro ao atualizar o parceiro.");
                }
            })
            .catch(error => {
                console.error("Erro ao atualizar parceiro:", error);
                alert("Erro ao enviar os dados.");
            });
    });
});
