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
            element.src = '../../../' + text.data.img_perfil;
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
let contentOpcoesMenu = document.getElementById('content-opcoes-menu')
let contentOpcoesMenu1 = document.getElementById('content-opcoes-menu1')

loginImg.forEach(element => {
    
    element.addEventListener('click', () => {
        if (contentOpcoesMenu.classList.contains('open-opcoes-menu')) {
            contentOpcoesMenu.classList.remove('open-opcoes-menu')
        } else {
            contentOpcoesMenu.classList.add('open-opcoes-menu')
        }
        if (contentOpcoesMenu1.classList.contains('open-opcoes-menu1')) {
            contentOpcoesMenu1.classList.remove('open-opcoes-menu1')
        } else {
            contentOpcoesMenu1.classList.add('open-opcoes-menu1')
        }
    })
});

let logout = document.querySelectorAll('#logout')

logout[0].addEventListener('click', async () => {
    const response = await fetch('../../../Public/logout.php?logout=true');
    document.location.reload()
})
logout[1].addEventListener('click', async () => {
    const response = await fetch('../../../Public/logout.php?logout=true');
    document.location.reload()
})

let issoMesmo = document.getElementById('conteiner-opcoes')
issoMesmo.addEventListener('mouseleave', () => {
    contentOpcoesMenu.addEventListener('mouseover', () => {
        contentOpcoesMenu.classList.add('open-opcoes-menu')
    })
    contentOpcoesMenu.classList.remove('open-opcoes-menu')    
})