async function menu() {
    try {
        const response = await fetch('../../../actions/action-login.php?perfil=true', {
            method: 'GET',
            credentials: 'include'
        });

        if(response.ok){
            const text = await response.json();
    
            
            let login = document.querySelectorAll('.informacoes_login');
            
            let img_perfil = text.login.img_perfil == null ? "../../../Public/assets/MOCA.png" : text.login.img_perfil
            
            
            if(text.login){
                let i = 1
                
                login.forEach(element => {
                    if (text.login.perfil == 1){
                        element.innerHTML = `
                        <img src="${img_perfil}" alt="" class="img-perfil">
                        <div class="content-acoes${i}" id="content-opcoes-menu${i}">
                            <a href="../app/Views/Adm/" class="link_login">
                                <i class="bi bi-arrow-return-right"></i>Voltar
                            </a>
                            <a href="" class="link_login">
                                <i class="bi bi-box-arrow-left icon-login" id="logout"></i>Sair
                            </a>
                        </div>
                        `
                        let opcao_menu1 = document.querySelectorAll('#content-opcoes-menu2')
                        let opcao_menu2 = document.querySelectorAll('#content-opcoes-menu1')
                        let menus_login = document.querySelectorAll('#login')
                        menus_login.forEach(menu => {
                            menu.addEventListener('click', () => {
                                if(opcao_menu1.classList.contains('open-menu-login')){
                                    opcao_menu1.classList.remove('open-menu-login')
                                }else (
                                    opcao_menu1.classList.add('open-menu-login')
                                )
                                if(opcao_menu2.classList.contains('open-menu-login')){
                                    opcao_menu2.classList.remove('open-menu-login')
                                }else (
                                    opcao_menu2.classList.add('open-menu-login')
                                )
                            })
                        });
                    }else {
                        element.innerHTML = `
                        <img src="${img_perfil}" alt="" class="img-perfil">
                        <div class="content-acoes${i}" id="content-opcoes-menu${i}">
                            <a href="../app/Views/Expositor/" class="link_login">
                                <i class="bi bi-arrow-return-right"></i>Voltar
                            </a>
                            <a href="" class="link_login">
                                <i class="bi bi-box-arrow-left icon-login" id="logout"></i>Sair
                            </a>
                        </div>
                        `
                    }
                    i++
                });
            }
        }
    } catch (error) {       
    }
}
document.addEventListener('DOMContentLoaded', menu)

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
