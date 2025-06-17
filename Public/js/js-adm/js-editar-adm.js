document.addEventListener("DOMContentLoaded", async () => {
    try{
        const response = await fetch("../../../actions/action-colaborador.php?perfil=meu");
        const result = await response.json();

        console.log("Dados carregados:", result);

        if (result.success === false) {
            alert(result.message);
            return;
        }

        if (result.data && result.data.length > 0) {
            const adm = result.data[0];

            document.getElementById("id").value = adm.id_colaborador;
            document.getElementById("nome").value = adm.nome;
            document.getElementById("telefone").value = adm.tel;
            document.getElementById("email").value = adm.email;
            document.getElementById("cargo").value = adm.cargo;

            if (adm.foto_perfil) {
                document.getElementById("previewFoto").src = "../../../" + adm.foto_perfil;

                const fotoMenu = document.getElementById("fotoMenu");
                if (fotoMenu) {
                    fotoMenu.src = "../../../" + adm.foto_perfil;
                }
            }
        } else {
            alert("Nenhum dado encontrado para o seu perfil.");
        }
    } catch (error) {
        console.error("Erro ao buscar perfil:", error);
        alert("Falha ao carregar os dados.");
    }
});

function previewImagem() {
    const input = document.getElementById("uploadFoto");
    const preview = document.getElementById("previewFoto");

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;

            // Se quiser atualizar ao vivo no menu também:
            const fotoMenu = document.getElementById("fotoMenu");
            if (fotoMenu) {
                fotoMenu.src = e.target.result;
            }
        };

        reader.readAsDataURL(input.files[0]);
    }
}


const formulario = document.getElementById("formulario");

formulario.addEventListener("submit", async (e) => {
    e.preventDefault();

    const formData = new FormData(formulario);
    formData.append("atualizar", "true");

    try {
        const response = await fetch("../../../actions/action-colaborador.php", {
            method: "POST",
            body: formData,
        });

        const data = await response.json();
        console.log("Resposta do servidor:", data);

        if (data.success) {
            alert("Edição realizada com sucesso!");
            
            const novaFoto = document.getElementById("previewFoto").src;
            const fotoMenu = document.getElementById("fotoMenu");

            if (fotoMenu) {
                fotoMenu.src = novaFoto;
            }
        } else {
            alert("Erro: " + data.message);
        }
    } catch (error) {
        console.error("Erro na requisição:", error);
        alert("Ocorreu um erro ao tentar editar. Verifique o console.");
    }
});
