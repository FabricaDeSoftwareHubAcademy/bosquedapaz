document.addEventListener("click", (event) => {
  if (event.target.classList.contains("status")) {
    event.target.classList.toggle("active");
    event.target.classList.toggle("inactive");
    event.target.textContent = event.target.classList.contains("active") ? "Ativo" : "Inativo";
  }
});

// function mostrarMenu() {
//   let menuMobile = document.querySelector('.menu-adm .nav-bar');
//   if (menuMobile.classList.contains('open')) {
//     menuMobile.classList.remove('open')
//   } 
//   else {
//     menuMobile.classList.add('open')
//   }
// }