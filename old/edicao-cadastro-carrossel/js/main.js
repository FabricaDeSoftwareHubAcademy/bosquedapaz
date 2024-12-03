function menuShow() {
    let menuMobile = document.querySelector('.menu-adm .nav-bar');
    if (menuMobile.classList.contains('open')) {
        menuMobile.classList.remove('open')
    } else {
        menuMobile.classList.add('open')
    }
}
