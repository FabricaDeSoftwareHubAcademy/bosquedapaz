document.getElementById("arquivo").addEventListener("change", function() {
    let fileName = this.files.length > 0 ? this.files[0].name : "Selecionar Arquivo em PDF";
    document.getElementById("file-text").textContent = fileName;
});