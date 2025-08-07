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
                        <img src="../../../Public/uploads/uploads-ADM/${img_perfil}" alt="" class="img-perfil">
                        <div class="content-acoes${i}" id="content-opcoes-menu${i}">
                            <a href="../Adm/" class="link_login">
                                <i class="bi bi-arrow-return-right"></i>Voltar
                            </a>
                            <button class="link_login link_logout" id="logout">
                                <i class="bi bi-box-arrow-left icon-login"></i>Sair
                            </button>
                        </div>
                        `
                    }else {
                        element.innerHTML = `
                        <img src="../../../Public/uploads/uploads-ADM/${img_perfil}" alt="" class="img-perfil">
                        <div class="content-acoes${i}" id="content-opcoes-menu${i}">
                            <a href="../Expositor/" class="link_login">
                                <i class="bi bi-arrow-return-right"></i>Voltar
                            </a>
                            <button class="link_login link_logout" id="logout">
                                <i class="bi bi-box-arrow-left icon-login"></i>Sair
                            </button>
                        </div>
                        `
                    }
                    i++
                });

                /////////////  abrir menu 
                let opcao1 = document.querySelector('.content-acoes2')
                let opcao2 = document.querySelector('.content-acoes1')
                let menu1 = document.querySelectorAll('.informacoes_login')[1]
                let menu2 = document.querySelectorAll('.informacoes_login')[0]

                menu1.addEventListener('click', () => {
                    if(opcao1.classList.contains('open-menu-login')){
                        opcao1.classList.remove('open-menu-login')
                    }else{
                        opcao1.classList.add('open-menu-login')
                    }
                })

                menu2.addEventListener('click', () => {
                    if(opcao2.classList.contains('open-menu-login')){
                        opcao2.classList.remove('open-menu-login')
                    }else{
                        opcao2.classList.add('open-menu-login')
                    }
                })
                menu1.addEventListener('mouseleave', () => {
                    opcao1.addEventListener('mouseleave', () => {
                        setTimeout(() => {
                            opcao1.classList.remove('open-menu-login')

                        }, 1000)

                    })
                })

                ////////// fazer logout

                let logout = document.querySelectorAll('#logout')
                
                logout[0].addEventListener('click', async () => {
                    const response = await fetch('../../../actions/action-login.php?logout=true');
                    document.location.reload()
                })
                logout[1].addEventListener('click', async () => {
                    const response = await fetch('../../../actions/action-login.php?logout=true');
                    console.log(response)
                    document.location.reload()
                })
            }
        }
    } catch (error) {       
    }
}
document.addEventListener('DOMContentLoaded', menu)

// abre o menu da home
var sandwich = document.getElementById('sandwich')
var navMenu = document.getElementById('nav-list')
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

