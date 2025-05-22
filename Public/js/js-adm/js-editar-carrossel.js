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
    
    const formData = new FormData(formCarrossel.target);

    // var img1 = new Object()
    // var img2 = new Object()
    // var img3 = new Object()

    if(formCarrossel[0].files.length == 1){
        var dados_img1 = formCarrossel[0].files;
        
        for (const chave in dados_img1) {
            img1[chave] = dados_img1[chave]
          }
        img1["possicao"] = 1
        // console.log(dados_img1)
    }
    
    // if(formCarrossel[1].files.length == 1){
    //     var dados_img2 = formCarrossel[0].files[0];
        
    //     for (const chave in dados_img2) {
    //         img2[chave] = dados_img2[chave]
    //     }
    //     img2["possicao"] = 2
    //     formData.append("files[]", img2)
    // }
    
    // if(formCarrossel[2].files.length == 1){
    //     var dados_img3 = formCarrossel[0].files[0];
        
    //     for (const chave in dados_img3) {
    //         img3[chave] = dados_img3[chave]
    //     }
    //     img3["possicao"] = 3
    //     formData.append("files[]", img3)
    // }



    for(var i = 0; i < formCarrossel.length; i++){
        var file = formCarrossel[i].files
        for(var y = 0; y < file.length; y++){
            // img1.append("files[]", file[y])
            formData.append("files[]", file[y])
        }
        formData.append('num', i)
    }


    let dados_php = await fetch("../../../actions/carrossel.php",{
        method:"POST",
        body:formData
    });

    let response = await dados_php.json();

    // console.log(img1)
    console.log(response)
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
