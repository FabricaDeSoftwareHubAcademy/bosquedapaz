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

let inputImg1 = document.getElementById("imagens-input")

inputImg1.addEventListener("change", readImage, false);

let inputImg2 = document.getElementById("imagens-input2")
inputImg2.addEventListener("change", readImage2, false);

let inputImg3 = document.getElementById("imagens-input3")
inputImg3.addEventListener("change", readImage3, false);


btnEditar = document.getElementById('editar');
// console.log($formCarrossel);

btnEditar.addEventListener('click', async function (event) {
    event.preventDefault()

    let formCarrossel = document.getElementById('form-carrossel')

    const formData = new FormData(formCarrossel);

    // console.log(formData)

    let dados_php = await fetch("../../../actions/carrossel.php", {
        method: "POST",
        body: formData
    });

    let response = await dados_php.json();

    console.log(response)
})

async function getImage() {
    let imagens = await fetch("../../../actions/carrossel.php")

    let resposta = await imagens.json()

    var img1 = document.getElementById('img1');
    var img2 = document.getElementById('img2');
    var img3 = document.getElementById('img3');
}

getImage()
