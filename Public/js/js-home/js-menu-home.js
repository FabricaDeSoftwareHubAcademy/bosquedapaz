const headElement1  = document.getElementsByTagName('head')[0];
const linkHome  = document.createElement('link');
linkHome.rel  = 'stylesheet';
linkHome.type = 'text/css';
linkHome.href = '../../../Public/css/css-home/style-menu.css';
headElement1.appendChild(linkHome);

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
