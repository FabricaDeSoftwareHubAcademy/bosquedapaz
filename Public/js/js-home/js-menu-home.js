async function menu() {
    try {
        const response = await fetch('../../../actions/action-login.php?perfil=true', {
            method: 'GET',
            credentials: 'include'
        });

        if(response.ok){
            const text = await response.json();
    
            
            let login = document.querySelectorAll('#login');
            console.log(login)

            if(text.login){

                // login.forEach(element => {
                //     if (text.login.img_perfil == null){
                //         element.innerHTML = `

                //         `
                //     }else {
                //         element.innerHTML = `

                //         `
                //     }
                // });
            }
        }
    } catch (error) {       
    }
}

// menu();

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