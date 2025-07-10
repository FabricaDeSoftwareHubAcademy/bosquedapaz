let nomeEmpresa = document.getElementById('nomeEmpresa')
let logoEmpresa = document.getElementById('logoEmpresa')
let nome = document.getElementById('nome')
let email = document.getElementById('email')
let whats = document.getElementById('whats')
let produto = document.getElementById('produto')
let cidade = document.getElementById('cidade')
let modalidade = document.getElementById('modalidade')
let exposicao = document.getElementById('exposicao')
let energia = document.getElementById('energia')
let voltagem = document.getElementById('voltagem')
let endereco = document.getElementById('endereco')
let categoria = document.getElementById('categoria')
let intagram = document.getElementById('intagram')


///////// SELECIONANDO O EXPOSITOR PELO ID QUE VEIO DA URL \\\\\\\\\\\  
async function getExpositor(){ 
    try {
        let url = new URL(window.location.href)
        let idExpositor = url.searchParams.get('expositor')
        if(idExpositor == null || idExpositor == ''){
            openModalError()
            document.getElementById('erro-title').innerText = 'Para válidar um Expositor é necessário escolher um antes'
            document.getElementById('erro-text').innerText = 'Você será redirecionado para lista de espera, certifique-se de selecionar um expositor.'
            document.getElementById('close-modal-erro').addEventListener('click', () => {
    
                window.location.replace('http://localhost/bosquedapaz/app/Views/Adm/lista-de-espera.php')
            })
        }
        let dados_php = await fetch(`../../../actions/actions-expositor.php?id=${idExpositor}`);
    
        let response = await dados_php.json()

        console.log(response.expositor[0])

        nomeEmpresa.innerText = response.expositor[0].nome_marca
        logoEmpresa.src = '../../' + response.expositor[0].img_perfil
        nome.value = response.expositor[0].nome
        email.value = response.expositor[0].email
        whats.value = response.expositor[0].telefone
        produto.value = response.expositor[0].produto
        modalidade.value = response.expositor[0].modalidade
        intagram.href = response.expositor[0].link_instagram
        intagram.innerText = response.expositor[0].link_instagram
        exposicao.value = response.expositor[0].tipo
        energia.value = response.expositor[0].energia
        voltagem.value = response.expositor[0].voltagem
        endereco.value = 'nao tem'
        cidade.value = 'nao tem'
        categoria.value = response.expositor[0].descricao

    } catch (error) {
        openModalError()
        document.getElementById('erro-title').innerText = 'Ocorreu um erro ao carregar os dados do expositor'
        document.getElementById('erro-text').innerText = 'Você será redirecionado para lista de espera, certifique-se de selecionar um expositor.'
        document.getElementById('close-modal-erro').addEventListener('click', () => {
            window.location.replace('http://localhost/bosquedapaz/app/Views/Adm/lista-de-espera.php')
        })
    }
    
}

getExpositor()