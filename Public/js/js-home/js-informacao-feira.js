let numVisitante = document.getElementById('num-visitante')
let numExpositor = document.getElementById('num-expositor')
let numArtista = document.getElementById('num-artista')

async function trocarDados (){
    try {
        let response = await fetch("../../../actions/action-login.php?perfil=true")
        if(response.ok){
            let resposta = await response.json()
            if(resposta.login.perfil == '1'){
                let content_num_visitantes = document.getElementById('novo_num_visitantes')
                content_num_visitantes.classList.add('novo_num_visitantes')
                document.getElementById('info_num_visitante').innerHTML = `
                <input type="number" name="num_visitantes" class="num_visitantes" id="num_visitantes" placeholder="Troque aqui">
                    <button class="btn_visitantes">Enviar</button>
                `
            }
        }
    
    } catch (error) {        
    }
}

trocarDados()
