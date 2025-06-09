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



btnEditar = document.getElementById('editar');

let overlay = document.getElementById('overlay')
let closeModal = document.querySelector('.close-modal')
let modalAviso = document.getElementById('modal-aviso');
let mensagem = document.getElementById('mensagem')
let explicacao = document.getElementById('explicacao')


function abrirModal(){
    overlay.style.display = "block"
    modalAviso.showModal();
}

function fecharModal(){
    document.getElementById(closeModal.getAttribute('data-modal')).close()
    overlay.style.display = "none"
    window.location.reload()
}

btnEditar.addEventListener('click', async function (event) {
    event.preventDefault()

    let allInputs = document.getElementsByClassName('input')
    
    if(allInputs[0].files.length == 0 && allInputs[1].files.length == 0 && allInputs[2].files.length == 0){
        abrirModal();

        closeModal.addEventListener('click', fecharModal)
    }
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

        if (erro.length > 0){
            mensagem.innerText = 'A imagem enviada não esta de acordo com os padrões';
            explicacao.innerText = erro
            abrirModal()
            closeModal.addEventListener('click', fecharModal)
        }
        else {
            let formCarrossel = document.getElementById('form-carrossel')
    
            const formData = new FormData(formCarrossel);
    
            let dados_php = await fetch("../../../actions/action-carrossel.php", {
                method: "POST",
                body: formData
            });
    
            let response = await dados_php.json();
    
            if(response.erro == 0){
                mensagem.innerText = response.message
                explicacao.style.display = "none"
                abrirModal()
                closeModal.addEventListener('click', fecharModal)
            }
    
            else if(response.erro != 0){
                mensagem.innerText = response.message
                explicacao.innerText = response.erro
                abrirModal()
                closeModal.addEventListener('click', fecharModal)
            }
        }


    }




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
