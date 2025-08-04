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
opcoes_menu1.addEventListener('click', () => {
    document.getElementById('content-opcoes-menu').style.setProperty('height', '100px')
})