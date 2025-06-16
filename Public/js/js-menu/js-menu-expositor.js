const headElement  = document.getElementsByTagName('head')[0];
const link  = document.createElement('link');
link.rel  = 'stylesheet';
link.type = 'text/css';
link.href = 'http://localhost/aula-php-dev-33/bosquedapaz/Public/css/css-home/style-menu-expositor.css';
headElement.appendChild(link);
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