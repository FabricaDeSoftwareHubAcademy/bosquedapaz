// ler img1
function readImage() {
    if (this.files && this.files[0]) {
        var file = new FileReader();
        file.onload = function(e) {
            document.getElementById("img1").src = e.target.result;
        };       
        file.readAsDataURL(this.files[0]);
    }
}
// ler img2
function readImage2() {
    if (this.files && this.files[0]) {
        var file = new FileReader();
        file.onload = function(e) {
            document.getElementById("img2").src = e.target.result;
        };       
        file.readAsDataURL(this.files[0]);
    }
}
// ler img3
function readImage3() {
    if (this.files && this.files[0]) {
        var file = new FileReader();
        file.onload = function(e) {
            document.getElementById("img3").src = e.target.result;
        };       
        file.readAsDataURL(this.files[0]);
    }
}

let img1 = document.getElementById("imagens-input")

img1.addEventListener("change", readImage, false);

let img2 = document.getElementById("imagens-input2")
img2.addEventListener("change", readImage2, false);

let img3 = document.getElementById("imagens-input3")
img3.addEventListener("change", readImage3, false);


$btnEditar = document.getElementById('editar');
// console.log($formCarrossel);

$btnEditar.addEventListener('click', async function (event){
    event.preventDefault()

    let formCarrossel = document.querySelectorAll('[type=file]');
    
    const formData = new FormData();
    
    for(var i = 0; i < formCarrossel.length; i++){
        var file = formCarrossel[i].files
        for(var y = 0; y < file.length; y++){
            formData.append("files[]", file[y])
        }
    }

    let dados_php = await fetch("../../../actions/carrossel.php",{
        method:"POST",
        body:formData
    });

    let response = await dados_php.json();

})

async function getImage(){
    let imagens = await fetch("../../../actions/carrossel.php?id=1")

    let resposta = await imagens.json()

    // img1.src = resposta[0]['img1'];

    console.log(resposta)
}

getImage()
