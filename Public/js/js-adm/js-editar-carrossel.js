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

let inputImg1 = document.getElementById("imagens-input")

inputImg1.addEventListener("change", readImage, false);

let inputImg2 = document.getElementById("imagens-input2")
inputImg2.addEventListener("change", readImage2, false);

let inputImg3 = document.getElementById("imagens-input3")
inputImg3.addEventListener("change", readImage3, false);


$btnEditar = document.getElementById('editar');
// console.log($formCarrossel);

$btnEditar.addEventListener('click', async function (event){
    event.preventDefault()

    let formCarrossel = document.querySelectorAll('[type=file]');
    
    const formData = new FormData();

    if(formCarrossel[0].files.length == 1){
        var dados_img1 = formCarrossel[0].files;
        var array_img1 = new Object();
        for(var i = 0; i < dados_img1.length; i++){
            console.log(dados_img1[i], "oi")
        }
    }

    for(var i = 0; i < formCarrossel.length; i++){
        var file = formCarrossel[i].files
        console.log(file)
        for(var y = 0; y < file.length; y++){
            formData.append("files[]", file[y])
        }
    }

    console.log(formData)

    let dados_php = await fetch("../../../actions/carrossel.php",{
        method:"POST",
        body:formData
    });

    let response = await dados_php.json();

})

async function getImage(){
    let imagens = await fetch("../../../actions/carrossel.php?id=1")

    let resposta = await imagens.json()

    var img1 = document.getElementById('img1');
    var img2 = document.getElementById('img2');
    var img3 = document.getElementById('img3');

    img1.src = `../../${resposta[0]['img1']}`;
    img2.src = `../../${resposta[0]['img2']}`;
    img3.src = `../../${resposta[0]['img3']}`;
}

getImage()
