let nomeEmpresa = document.getElementById('nomeEmpresa')
let nome = document.getElementById('nome')
let email = document.getElementById('email')
let whats = document.getElementById('whats')
let cpf = document.getElementById('cpf')
let cidade = document.getElementById('cidade')
let exposicao = document.getElementById('exposicao')
let energia = document.getElementById('energia')
let voltagem = document.getElementById('voltagem')
let categoria = document.getElementById('categoria')
let intagram = document.getElementById('intagram')

let emailExpositor = ''

async function getCategoria(){ 
    try {
        let dados_php = await fetch(`../../../actions/action-listar-categoria.php`);
    
        let response = await dados_php.json()
        
        response.dados.forEach(element => {
            categoria.innerHTML += `
            <option value="${element.id_categoria}">${element.descricao}</option>
            ` 
        });


    } catch (error) {
    }
    
}

getCategoria();


///////// SELECIONANDO O EXPOSITOR PELO ID QUE VEIO DA URL \\\\\\\\\\\  
function getIdExpositor(){
    try {
        let url = new URL(window.location.href)
        let idExpositor = url.searchParams.get('expositor')
        if(idExpositor == null || idExpositor == ''){
            openModalError()
            document.getElementById('erro-title').innerText = 'Para válidar um Expositor é necessário escolher um antes'
            document.getElementById('erro-text').innerText = 'Você será redirecionado para lista de espera, certifique-se de selecionar um expositor.'
            document.getElementById('close-modal-erro').addEventListener('click', () => {
                window.location.replace('./lista-de-espera.php')
            })
        }
        else {
            return idExpositor
        }
    } catch (error) {
        openModalError()
        document.getElementById('erro-title').innerText = 'Para válidar um Expositor é necessário escolher um antes'
        document.getElementById('erro-text').innerText = 'Você será redirecionado para lista de espera, certifique-se de selecionar um expositor.'
        document.getElementById('close-modal-erro').addEventListener('click', () => {
            window.location.replace('./lista-de-espera.php')
        })
    }
}
async function getExpositor(){ 
    try {
        let dados_php = await fetch(`../../../actions/actions-expositor.php?id=${getIdExpositor()}`);
    
        let response = await dados_php.json()
        nomeEmpresa.innerText = response.expositor.nome_marca
        nome.value = response.expositor.nome
        email.value = response.expositor.email
        whats.value = maskNumTelefone(response.expositor.telefone)
        cpf.value = mascaraCpf(response.expositor.cpf)
        intagram.href = response.expositor.link_instagram
        intagram.innerText = response.expositor.link_instagram
        exposicao.value = response.expositor.tipo
        energia.value = response.expositor.energia
        voltagem.value = response.expositor.voltagem
        cidade.value = response.expositor.cidade
        categoria.value = response.expositor.id_categoria

        emailExpositor = response.expositor.email

        let areaFotos = document.getElementById('areaFotos')

        areaFotos.innerHTML = `
            <div class="area-produtos">
                <img class="produtos-imagens produto-imagem1" src="../../${response.expositor.imagens[0].caminho}" alt="">
                <img class="produtos-imagens produto-imagem2" src="../../${response.expositor.imagens[1].caminho}" alt="">
                <img class="produtos-imagens produto-imagem3" src="../../${response.expositor.imagens[2].caminho}" alt="">
            </div>
            <div class="area-produtos">
                <img class="produtos-imagens produto-imagem1" src="../../${response.expositor.imagens[3].caminho}" alt="">
                <img class="produtos-imagens produto-imagem2" src="../../${response.expositor.imagens[4].caminho}" alt="">
                <img class="produtos-imagens produto-imagem3" src="../../${response.expositor.imagens[5].caminho}" alt="">
            </div>
        `

    } catch (error) {
        openModalError()
        document.getElementById('erro-title').innerText = 'Ocorreu um erro ao carregar os dados do expositor'
        document.getElementById('erro-text').innerText = 'Você será redirecionado para lista de espera, certifique-se de selecionar um expositor.'
        document.getElementById('close-modal-erro').addEventListener('click', () => {
            window.location.replace('./lista-de-espera.php')
        })
    }
    
}

getExpositor()

async function aprovarExpostor() {
    openModalConfirmar()
    document.getElementById('confirmar-title').innerText = 'Deseja aprovar o expositor?'
    document.getElementById('msm-confimar').innerText = 'Clique em salvar para aprovar o expositor'
    document.getElementById('close-modal-confirmar').addEventListener('click', closeModalConfirmar)
    document.getElementById('btn-modal-cancelar').addEventListener('click', closeModalConfirmar)

    document.getElementById('btn-modal-salvar').addEventListener('click', async () => {
        closeModalAtualizar()


        document.getElementById('BarracaRua').showModal()
        document.getElementById('btn-BarracaRua-cancelar').addEventListener('click', () => {
            document.getElementById('BarracaRua').close()
        })

        document.getElementById('btn-BarracaRua-salvar').addEventListener('click', async () => {
            if(document.getElementById('numBarraca').value == '') {
                openModalError()
                document.getElementById('erro-title').innerHTML =  'Preencha todos os campos'
                document.getElementById('erro-text').style.display = 'none'
                document.getElementById('close-modal-erro').addEventListener('click', closeModalError)
            }else{

                openModalLoading()
                document.getElementById('content-close').style.display = 'none'
                document.getElementById('msm-modal').innerText = 'Espere um instante o expositor está sendo válidado'
        
        
                const formData = new FormData()
                formData.append('email', emailExpositor)
                formData.append('aprovado', 1)
                formData.append('num_barraca', document.getElementById('numBarraca').value)
                formData.append('cor_rua', document.getElementById('corRua').value)
                formData.append('categoria', categoria.value)
                formData.append('tolkenCsrf', document.getElementById('tolkenCsrf'))
        
            
                let aprovar = await fetch('../../../actions/action-validar-expositor.php', {
                    method: 'POST',
                    body: formData
                })
            
                let response = await aprovar.json()
        
                closeModalLoading()
        
                
                if(response.status == 200){
                        openModalSucesso()
                        document.getElementById('msm-sucesso').innerHTML = 'O expositor foi aprovado'
        
                        document.getElementById('close-modal-sucesso').addEventListener('click', () => {
                            closeModalSucesso
                            window.location.replace('./lista-de-espera.php')
                        })
                        
                    }
            
                else if(response.status != 200){
                        openModalError()
                        document.getElementById('erro-title').innerHTML = response.msg
                        document.getElementById('erro-text').style.display = 'none'
                        document.getElementById('close-modal-erro').addEventListener('click', closeModalError)
                }
            }
        })

    })

}

// actions/action-validar-expositor.php

document.getElementById('botao_validar').addEventListener('click', aprovarExpostor)

async function recusarExpositor() {
    openModalConfirmar()
    document.getElementById('confirmar-title').innerText = 'Deseja recusar o expositor?'
    document.getElementById('msm-confimar').innerText = 'Clique em salvar para recusar o expositor'
    document.getElementById('close-modal-confirmar').addEventListener('click', closeModalConfirmar)
    document.getElementById('btn-modal-cancelar').addEventListener('click', closeModalConfirmar)

    document.getElementById('btn-modal-salvar').addEventListener('click', async () => {
        closeModalAtualizar()

        document.getElementById('recusarExpositor').showModal()
        document.getElementById('btn-recusar-cancelar').addEventListener('click', () => {
            document.getElementById('recusarExpositor').close()
        })

        document.getElementById('btn-recusar-salvar').addEventListener('click', async () => {
            document.getElementById('recusarExpositor').close()
            if(document.getElementById('MotivoRecusa').value.length < 20){
                openModalError()
                document.getElementById('erro-text').innerText = 'Digite um texto miníno de 20 caracteres.'
                document.getElementById('erro-title').innerText = 'Mensagem inválida'
                document.getElementById('close-modal-erro').addEventListener('click', closeModalError)
            }else{
                openModalLoading()
                document.getElementById('content-close').style.display = 'none'
                document.getElementById('msm-modal').innerText = 'Espere um instante o expositor está sendo recusado'
    
                const formData = new FormData()
                formData.append('email', emailExpositor)
                formData.append('recusado', 1)
                formData.append('mensagem', document.getElementById('MotivoRecusa').value)
                formData.append('tolkenCsrf', document.getElementById('tolkenCsrf').value)
        
                
                let aprovar = await fetch('../../../actions/action-validar-expositor.php', {
                    method: 'POST',
                    body: formData
                })
                
                let response = await aprovar.json()
                
                closeModalLoading()
                
                if(response.status == 200){
                        openModalSucesso()
                        document.getElementById('msm-sucesso').innerHTML = 'O expositor foi recusado'
        
                        document.getElementById('close-modal-sucesso').addEventListener('click', () => {
                            closeModalSucesso
                            window.location.replace('./lista-de-espera.php')
                        })
                        
                    }
            
                else if(response.status != 200){
                        openModalError()
                        document.getElementById('erro-title').innerHTML = response.msg
                        document.getElementById('erro-text').style.display = 'none'
                        document.getElementById('close-modal-erro').addEventListener('click', closeModalError)
                }
            }

        })

    })
}



document.getElementById('botao_recusar').addEventListener('click', recusarExpositor)


function maskNumTelefone(num) {
    let valor = num;
    valor = valor.replace(/\D/g, '');
    valor = valor.substring(0, 11);
    if (valor.length > 0) {
        valor = '(' + valor;
    }
    if (valor.length > 3) {
        valor = valor.slice(0, 3) + ') ' + valor.slice(3);
    }
    if (valor.length > 10) {
        valor = valor.slice(0, 10) + '-' + valor.slice(10);
    }
    
    return valor;
}

function mascaraCpf(text){
    let v = text.replace(/\D/g, '').substring(0, 12);
    let cpf = ''
    if (v.length <= 11) {
        if (v.length > 9)
            cpf = `${v.substring(0, 3)}.${v.substring(3, 6)}.${v.substring(6, 9)}-${v.substring(9, 11)}`;
        else if (v.length > 6)
            cpf = `${v.substring(0, 3)}.${v.substring(3, 6)}.${v.substring(6)}`;
        else if (v.length > 3)
            cpf = `${v.substring(0, 3)}.${v.substring(3)}`;
        else
            cpf = v;
        return cpf;
    }else{
        return cpf;
    }
}