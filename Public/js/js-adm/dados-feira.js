let form = document.getElementById('formularioDados')

form.addEventListener('submit', async function (e) {
    e.preventDefault()

    try {
        const formData = new FormData(form);

        let dados_php = await fetch("../../../actions/dados-feira.php", {
            method: "POST",
            body: formData
        });

        let response = await dados_php.json();
        
    } catch (error) {
        alert('erro no servidor')
    }
    
})