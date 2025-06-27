async function carregarDadosADM() {
    try {
        const response = await fetch('../../../actions/action-colaborador.php?meu_perfil=1', {
            method: 'GET',
            credentials: 'include'
        });

        const text = await response.text();
        console.log('Resposta bruta do servidor:', text);

        try {
            const data = JSON.parse(text);

            if (data.success && data.data) {
                const usuario = data.data;

                document.getElementById('id').value = usuario.id_colaborador;
                document.getElementById('nome').value = usuario.nome || '';
                document.getElementById('telefone').value = usuario.telefone || '';
                document.getElementById('email').value = usuario.email || '';
                document.getElementById('cargo').value = usuario.cargo || '';

                if (usuario.img_perfil) {
                    document.getElementById('previewFoto').src = '../../../' + usuario.img_perfil;
                }
                
            } else {
                alert('Erro ao carregar dados do ADM: ' + (data.message || 'Resposta inválida'));
            }
        } catch (err) {
            console.error('Erro ao parsear JSON:', err);
            console.log('Resposta recebida:', text);
            alert('Resposta do servidor não é JSON válido.');
        }
    } catch (error) {
        console.error('Erro no carregamento:', error);
        alert('Erro na requisição dos dados');
    }
}

carregarDadosADM();

function previewImagem() {
    const input = document.getElementById("uploadFoto");
    const preview = document.getElementById("previewFoto");

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]);
    }
}

const formulario = document.getElementById("formulario");

formulario.addEventListener("submit", async (e) => {
    e.preventDefault();


    try {
        const formData = new FormData(formulario);
        formData.append("atualizar", "true");
    
        const response = await fetch("../../../actions/action-colaborador.php", {
            method: "POST",
            body: formData,
        });
    
        const data = await response.json();
        console.log("Resposta do servidor:", data);
    
        if (data.success) {
            alert("Edição realizada com sucesso!");
    
            document.getElementById('nome').value = data.data.nome;
            document.getElementById('telefone').value = data.data.telefone;
            document.getElementById('email').value = data.data.email;
            document.getElementById('cargo').value = data.data.cargo;
    
            if (data.data.img_perfil) {
                document.getElementById("previewFoto").src = '../../../' + data.data.img_perfil;
            }
        } else {
            alert("Erro: " + data.message);
        }
    } catch (error) {
        console.error("Erro na requisição:", error);
        alert("Ocorreu um erro ao tentar editar. Verifique o console.");
    }
});
