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

