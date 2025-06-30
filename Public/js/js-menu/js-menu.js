const sandwich = document.getElementById('sandwich')
const navMenu = document.getElementById('nav-bar')
const navList = document.getElementById('nav-list')
sandwich.addEventListener('click', function(){
    if (navMenu.classList.contains('open')) {
        navMenu.classList.remove('open')
        navList.style.display = 'none';
        sandwich.classList.remove('bi-x')
        sandwich.classList.add('bi-list')
    } else {
        navMenu.classList.add('open')
        navList.style.display = 'flex';
        sandwich.classList.remove('bi-list')
        sandwich.classList.add('bi-x')
    }
})


const cadastro = document.getElementById("cadastro");
const financeiro = document.getElementById("financeiro");
const lista = document.getElementById("lista");
const relatorios = document.getElementById("relatorios");

function showSubMenu(item) {
    let sub = item.children[0]
    item.addEventListener('mouseover', () => {
    sub.style.display = 'block';
    })
    
    item.addEventListener('mouseout', () => {
        sub.style.display = 'none';
    })

}
function showSubMenuClick(item) {
    let sub = item.children[0]
    item.addEventListener('click', () => {
        if(sub.style.display != 'block'){
            sub.style.display = 'block';
        }
        else if(sub.style.display != 'none'){
            sub.style.display = 'none';
        }
    })
}


if(document.body.clientWidth > 1400){
    showSubMenu(cadastro)
    showSubMenu(financeiro)
    showSubMenu(lista)
    showSubMenu(relatorios)
}
else if(document.body.clientWidth <= 1400){
    showSubMenuClick(cadastro)
    showSubMenuClick(financeiro)
    showSubMenuClick(lista)
    showSubMenuClick(relatorios)
}

async function menuAdm() {
    try {
        const response = await fetch('../../../actions/action-colaborador.php?meu_perfil=1', {
            method: 'GET',
            credentials: 'include'
        });
        
        const text = await response.json();
        // console.log('Resposta bruta do servidor:', text);

        let imgLogin = document.querySelectorAll('#img-login');

        imgLogin.forEach(element => {
            // element.src = '../../../' + text.data.img_perfil;
            element.src = '../../../Public/assets/MOCA.png';

        });


    } catch (error) {
        let imgLogin = document.querySelectorAll('#img-login');

        imgLogin.forEach(element => {
            element.src = '../../../Public/assets/MOCA.png';
        });

        // console.log(imgLogin);
    }
}

menuAdm();

let loginImg = document.querySelectorAll('#img-login')

loginImg.forEach(element => {
    
    element.addEventListener('click', () => {
        let contentOpcoesMenu = document.getElementById('content-opcoes-menu')
        if (contentOpcoesMenu.classList.contains('open-opcoes-menu')) {
            contentOpcoesMenu.classList.remove('open-opcoes-menu')
        } else {
            contentOpcoesMenu.classList.add('open-opcoes-menu')
        }
        let contentOpcoesMenu1 = document.getElementById('content-opcoes-menu1')
        if (contentOpcoesMenu1.classList.contains('open-opcoes-menu1')) {
            contentOpcoesMenu1.classList.remove('open-opcoes-menu1')
        } else {
            contentOpcoesMenu1.classList.add('open-opcoes-menu1')
        }
    })
});


