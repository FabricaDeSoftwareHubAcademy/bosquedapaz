function chamaModal(){
    form_expositor.classList.remove("oculta")
    form_categoria.classList.add("chama")
}
 
let form_expositor = document.querySelector("form_expositor")
let bot_cadastrar = document.getElementById("id_cadastrar")

bot_cadastrar.addEventListener('click',function(){

    chamaModal()

    let bot_cadastrar_expositor = document.getElementById("id_cadastrar")

    bot_cadastrar_expositor.addEventListener('click',async function(event){
        event.preventDefault()
        const new_form = document.getElementById("form_expositor")

        const formData = new FormData(new_form)

        let dados_php = await fetch('./actions/cadastrar_categoria.php',{
            method:'POST',
            body:formData
        })

        let reponse = await dados_php.json()
        console.log(response)
        if(response.status == "ok"){
            alert("cadastrado com sucesso")
            fechaModal()
        } 
    
    })

})