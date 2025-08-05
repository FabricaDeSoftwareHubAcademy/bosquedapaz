async function menu() {
    try {
        const response = await fetch('../../../actions/action-login.php?perfil=true', {
            method: 'GET',
            credentials: 'include'
        });

        if(response.ok){
            const text = await response.json();
    
            
            let login = document.querySelectorAll('.conteiner-login');

            let img_perfil = text.login.img_perfil == null ? "../../../Public/assets/MOCA.png" : text.login.img_perfil
            

            if(text.login){
                
                login.forEach(element => {
                    if (text.login.perfil == 1){
                        element.innerHTML = `
                        <img src="${img_perfil}" alt="" class="img-perfil">
                        <div class="content-acoes2" id="content-opcoes-menu2">
                            <a href="../app/Views/Adm/" class="link_login">
                                <i class="bi bi-arrow-return-right"></i>Voltar
                            </a>
                            <a href="" class="link_login">
                                <i class="bi bi-box-arrow-left icon-login" id="logout"></i>Sair
                            </a>
                        </div>
                        `
                    }else {
                        element.innerHTML = `
                        <img src="${img_perfil}" alt="" class="img-perfil">
                        <div class="content-acoes2" id="content-opcoes-menu2">
                            <a href="../app/Views/Expositor/" class="link_login">
                                <i class="bi bi-arrow-return-right"></i>Voltar
                            </a>
                            <a href="" class="link_login">
                                <i class="bi bi-box-arrow-left icon-login" id="logout"></i>Sair
                            </a>
                        </div>
                        `
                    }
                });
            }
        }
    } catch (error) {       
    }
}

menu();

// abre o menu da home
const sandwich = document.getElementById('sandwich')
const navMenu = document.getElementById('nav-list')
sandwich.addEventListener('click', function(){
    if (navMenu.classList.contains('open')) {
        navMenu.classList.remove('open')
        sandwich.classList.remove('bi-x')
        sandwich.classList.add('bi-list')
    } else {
        navMenu.classList.add('open')
        sandwich.classList.remove('bi-list')
        sandwich.classList.add('bi-x')
    }
})

let opcoes_menu1 = document.getElementById('login1')

let opcoes_1 = document.getElementById('content-opcoes-menu')
opcoes_menu1.addEventListener('click', () => {
    if(opcoes_1.classList.contains('open-menu-login')){
        opcoes_1.classList.remove('open-menu-login')
    }else{
        opcoes_1.classList.add('open-menu-login')
    }
})
let opcoes_menu2 = document.getElementById('login2')

let opcoes_2 = document.getElementById('content-opcoes-menu2')
opcoes_menu2.addEventListener('click', () => {
    if(opcoes_2.classList.contains('open-menu-login')){
        opcoes_2.classList.remove('open-menu-login')
    }else{
        opcoes_2.classList.add('open-menu-login')
    }
})