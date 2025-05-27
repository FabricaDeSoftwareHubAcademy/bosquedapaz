document.addEventListener("DOMContentLoaded", () => {
    const formCadastro = document.getElementById("formCadastro");

    formCadastro.addEventListener("submit", async (e) => {
        e.defaultPrevented();

        const formData = new FormData(formCadastro);
        formData.append("action", "cadastrar");

        try{
            const response = await fetch("../../../actions/cadastro-listagem-adm.php", {
                method: "POST",
                body: formData,
            });

            const result = await response.json();

            if (result.success){
                alert("Colaborador cadastrado com sucesso!");
                formCadastro.reset();
            } else{
                alert("Erro ao cadastrar: " + result.message);
            }

        } catch (error){
            console.error("Erro ao cadastrar:", error);
            alert("Erro na requisição");
        }
    });
});