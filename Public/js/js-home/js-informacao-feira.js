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
                    <button class="btn_visitantes" id="enviarVisitantes">Enviar</button>
                `
            }


            let btn_visitantes = document.getElementById('enviarVisitantes')

            btn_visitantes.addEventListener('click', async () => {
                openModalAtualizar()
                document.getElementById('close-modal-confirmar').addEventListener('click', closeModalConfirmar)
                document.getElementById('btn-modal-cancelar').addEventListener('click', closeModalConfirmar)

                document.getElementById('btn-modal-salvar').addEventListener('click', async () => {
                    closeModalAtualizar()
                    const formData = new FormData()
                    formData.append('num_visitantes', document.getElementById('num_visitantes').value)
                    formData.append('tolkenCsrf', document.getElementById('tolkenCsrf').value)

                    let response = await fetch('../../../actions/action-dados-feira.php', {
                        method: 'POST',
                        body: formData
                    })
                    if(response.ok){
                        openModalSucesso()
                        document.getElementById('msm-sucesso').innerHTML = 'Número de visitantes atualizado com sucesso'
                        document.getElementById('close-modal-sucesso').addEventListener('click', () => {
                            closeModalSucesso()
                            window.location.reload()
                        })
                    }else {
                        let resposta = await response.json()
                        document.getElementById('erro-title').innerText = resposta.menssage
                        document.getElementById('erro-text').style.display = 'none'
                        openModalError()
            
                        document.getElementById('close-modal-erro').addEventListener('click', closeModalError)
                    }
                })
            })

        }
    
    } catch (error) {        
    }
}

trocarDados()


async function getDadosFeira() {
    try {
        let response = await fetch('../../../actions/action-dados-feira.php')
        if (response.ok) {
            let dados = await response.json()
            numVisitante.dataset.target = dados[0][0].qtd_visitantes
            numExpositor.dataset.target = dados[0][0].qtd_expositores
            numArtista.dataset.target = dados[0][0].qtd_artistas
        }
    } catch (error) {
        
    }
}

getDadosFeira()





////////////////////////////////////////////////////////////////
// soma numeros nas informacoes
document.addEventListener("DOMContentLoaded", () => setTimeout( n = () => {
    const ncs = document.querySelectorAll('.ncs');
    const speed = 200;

    ncs.forEach(counter => {
        const updateCount = () => {
            const target = +counter.getAttribute('data-target');
            const currentCount = +counter.innerText;
            const increment = target / speed;

            if (currentCount < target) {
                counter.innerText = Math.ceil(currentCount + increment);
                setTimeout(updateCount, 10);
            } else {
                counter.innerText = target;
            }
        };

        var elements = document.querySelector('#inc');
        elements.addEventListener('mousehover', updateCount());
    });
}, 1700))
