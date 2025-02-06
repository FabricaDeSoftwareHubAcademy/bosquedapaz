const input = document.querySelector("#file");//#file é o id da classe input do tipo file

input.addEventListener("change", function(e) {
    
    const tgt = e.target || window.event.srcElement;

    const files = tgt.files;

    const fr = new FileReader();

    fr.onload = function(){

        document.querySelector("#preview-image").src = fr.result;

    }

    fr.readAsDataURL(files[0]);

});