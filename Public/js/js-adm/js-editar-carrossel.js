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

//excuta a função na troca de status do input
document.getElementById("imagens-input").addEventListener("change", readImage, false);

document.getElementById("imagens-input2").addEventListener("change", readImage2, false);

document.getElementById("imagens-input3").addEventListener("change", readImage3, false);
