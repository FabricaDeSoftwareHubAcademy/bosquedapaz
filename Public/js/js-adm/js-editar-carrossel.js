// ler img1
function readImage() {
    if (this.files && this.files[0]) {
        var file = new FileReader();
        file.onload = function (e) {
            document.getElementById("img1").src = e.target.result;
        };
        file.readAsDataURL(this.files[0]);
    }
}
// ler img2
function readImage2() {
    if (this.files && this.files[0]) {
        var file = new FileReader();
        file.onload = function (e) {
            document.getElementById("img2").src = e.target.result;
        };
        file.readAsDataURL(this.files[0]);
    }
}
// ler img3
function readImage3() {
    if (this.files && this.files[0]) {
        var file = new FileReader();
        file.onload = function (e) {
            document.getElementById("img3").src = e.target.result;
        };
        file.readAsDataURL(this.files[0]);
    }
}

// troca pela img selecionada

let inputImg1 = document.getElementById("imagens-input")

inputImg1.addEventListener("change", readImage, false);

let inputImg2 = document.getElementById("imagens-input2")
inputImg2.addEventListener("change", readImage2, false);

let inputImg3 = document.getElementById("imagens-input3")
inputImg3.addEventListener("change", readImage3, false);



btnEditar = document.getElementById('btn-salvar');


btnEditar.addEventListener('click', async function (event) {
    event.preventDefault()

    openModalAtualizar()
    document.getElementById('close-modal-confirmar').addEventListener('click', closeModalConfirmar)
    document.getElementById('btn-modal-cancelar').addEventListener('click', closeModalConfirmar)

    // quando clicar no btn salvar envia para o banco
    document.getElementById('btn-modal-salvar').addEventListener('click', async () => {
        closeModalAtualizar()

        let allInputs = document.getElementsByClassName('input')
    
        // caso não seja feito nenhum upload cai nesse if que chama o modal erro
        if(allInputs[0].files.length == 0 && allInputs[1].files.length == 0 && allInputs[2].files.length == 0){
            document.getElementById('erro-title').innerText = 'Por favor envie alguma imagem'
            document.getElementById('erro-text').innerText = 'Nâo é possivel atualizar o carrossel, nenhuma imagem enviada'
            openModalError()
    
            document.getElementById('close-modal-erro').addEventListener('click', closeModalError)
        }

        // caso evie algoma imagem cai no else
        else {
            let inputs = document.querySelectorAll('[type=file]')
            let erro = ''
            inputs.forEach(element => {
                if(element.files.length != 0){
                    var tamanho = (element.files[0].size / 1024) / 1024
                    if (tamanho > 5){
                        erro  += ` ${element.files[0].name} é muito grande. Por favor envie uma imagem menor.`
                    }
                }
            });
    
            // caso de erro em uma imagem entra no if
            if (erro.length > 0){
                document.getElementById('erro-title').innerText = 'Erro, imagem fora do padrão'
                document.getElementById('erro-text').innerText = erro
                openModalError()
    
                document.getElementById('close-modal-erro').addEventListener('click', closeModalError)
            }
            // caso nao tenha nenhum erro faz o fecth
            else {
                let formCarrossel = document.getElementById('form-carrossel')
        
                const formData = new FormData(formCarrossel);
        
                let dados_php = await fetch("../../../actions/action-carrossel.php", {
                    method: "POST",
                    body: formData
                });
        
                let response = await dados_php.json();
        
                if(response.erro == 0){
                    openModalSucesso()
                    document.getElementById('close-modal-sucesso').addEventListener('click', closeModalSucesso)
                    document.getElementById('msm-sucesso').innerHTML = 'Edição realizada com sucesso'
                    document.getElementById('close-modal-erro').addEventListener('click', closeModalError)
                }
        
                else if(response.erro != 0){
                    openModalError()
                    document.getElementById('close-modal-erro').addEventListener('click', closeModalError)
                }
            }
    
    
        }
    })






})

async function getImage() {
    let imagens = await fetch("../../../actions/action-carrossel.php")

    let resposta = await imagens.json()

    var img1 = document.getElementById('img1');
    var img2 = document.getElementById('img2');
    var img3 = document.getElementById('img3');

    if (resposta.imagens[0].posicao == 1){
        img1.src = `../../${resposta.imagens[0].caminho}`
    }
    if (resposta.imagens[1].posicao == 2){
        img2.src = `../../${resposta.imagens[1].caminho}`
    }
    if (resposta.imagens[2].posicao == 3){
        img3.src = `../../${resposta.imagens[2].caminho}`
    }
}

getImage()
