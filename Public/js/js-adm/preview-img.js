const input = document.querySelector("#file");
input.addEventListener("change", function (e) {
    const file = e.target.files[0];
    const fr = new FileReader();
    fr.onload = () => {
        document.querySelector("#preview-image").src = fr.result;
    };
    if (file) fr.readAsDataURL(file);
});