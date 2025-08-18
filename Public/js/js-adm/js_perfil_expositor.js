let logo_img = document.getElementById('logo_expositor')
let content_imgs = document.getElementById('content_imgs')
let nome_marca = document.getElementById('nome_marca')
let descricao = document.getElementById('descricao')
let categoria = document.getElementById('categoria')
let num_rua = document.getElementById('num_rua')
let cor_rua = document.getElementById('cor_rua')
let insta = document.getElementById('insta')
let whatsapp = document.getElementById('whatsapp')
let facebook = document.getElementById('facebook')
let email = document.getElementById('email')

let area_cor_rua = document.getElementById('area_cor_rua')

function padraoCorRua(text){
    let novoText = ''
    text.split('_').forEach(str => {
        novoText += ' '+str
    });
    return novoText
}


document.addEventListener('DOMContentLoaded', async () => {
    try {
        const id_expositor = localStorage.getItem('id_expositor')

        if(id_expositor == null || id_expositor == ''){
            openModalError()
            document.getElementById('erro-title').innerText = 'Perfil não encontrado'
            document.getElementById('erro-text').innerText = 'Por favor tente em outro momento'
            document.getElementById('close-modal-erro').addEventListener('click', () => {
                closeModalError
                window.location.replace('./')
            })
        }

        let response = await fetch(`../../../actions/actions-expositor.php?idHome=${id_expositor}`)

        let expositor = await response.json()

        if(expositor.status == 200){
            logo_img.innerHTML = `<img src="${expositor.expositor.img_perfil}" alt="Logo atual do expositor">`
            content_imgs.innerHTML = ''
            expositor.expositor.imagens.forEach(img => {
                content_imgs.innerHTML += `
                <label for="produto1" class="label__img__prod">
                    <img src="../../${img.caminho}" alt="Produto 1">
                </label>
                `
            });

            nome_marca.innerText = expositor.expositor.nome_marca
            descricao.value = expositor.expositor.descricao_exp
            categoria.innerText = expositor.expositor.descricao
            num_rua.innerText = expositor.expositor.num_barraca
            cor_rua.innerText = padraoCorRua(expositor.expositor.cor_rua)
            area_cor_rua.classList.add(expositor.expositor.cor_rua)
            insta.value = expositor.expositor.link_instagram
            whatsapp.value = expositor.expositor.whats
            facebook.value = expositor.expositor.link_facebook
            email.value = expositor.expositor.email
        }else{
            openModalError()
            document.getElementById('erro-title').innerText = 'Perfil não encontrado'
            document.getElementById('erro-text').innerText = 'Por favor tente em outro momento'
            document.getElementById('close-modal-erro').addEventListener('click', () => {
                closeModalError
                window.location.replace('./')
            })
        }
    } catch (error) {
        
    }
})