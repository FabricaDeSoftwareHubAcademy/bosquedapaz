document.getElementById("perfilEdit-form-id").addEventListener("submit", async function (e){
    e.preventDefault();

    const FormData = new FormData(this);

    if (this.dataset.editarId) {
        FormData.set("id", this.dataset.editarId);
        try {
            const sult = await fetch("../../../actions/action-editar-expositor.php", {
                method: "POST",
                body: FormData
            });

            const dados = await sult.json();
        } catch (error) {
            console.error(error);
        }
    } else {
        try {
            const sult = await fetch("../../../", {
                method: "POST",
                body: FormData
            });

            const dados = await sult.json();
            console.log(dados);
        } catch (error) {
            console.error(error);
        }
    }
});