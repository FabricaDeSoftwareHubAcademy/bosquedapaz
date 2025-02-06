const input = document.querySelector("#file2");//#file é o id da classe input do tipo file

input.addEventListener("change", function(e) {
    
    const tgt = e.target || window.event.srcElement;

    const files = tgt.files;

    const fr = new FileReader();

    fr.onload = function(){

        document.querySelector("#preview-image2").src = fr.result;

    }

    fr.readAsDataURL(files[0]);

});