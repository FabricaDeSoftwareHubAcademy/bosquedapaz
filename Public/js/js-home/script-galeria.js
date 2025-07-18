// Aparecer a imagem ao Scrollar: 
const items = document.querySelectorAll('.item-galeria');

const revealOnScroll = () => {
const triggerBottom = window.innerHeight * 0.9;

items.forEach(item => {
  const itemTop = item.getBoundingClientRect().top;

  if (itemTop < triggerBottom) {
  item.classList.add('reveal');
  }
});
};

window.addEventListener('scroll', revealOnScroll);
window.addEventListener('load', revealOnScroll);
// ----------------------------<>--------------------------------
// ----------------------------<>--------------------------------

// MODAL: 
const dialog = document.getElementById("dialog-img");
const imgView = document.getElementById("img-dialog-view");

// Abre o dialog com a imagem clicada
document.querySelectorAll(".item-galeria img").forEach(img => {
  img.addEventListener("click", () => {
    imgView.src = img.src;
    dialog.showModal();
    document.body.style.overflow = "hidden"; 
  });
});

// Fecha o dialog pelo botão
function fecharDialog() {
  dialog.close();
  imgView.src = ""; 
  document.body.style.overflow = ""; 

  setTimeout(() => {
    imgView.src = "";
  }, 150);
}


dialog.addEventListener("click", e => {
  if (e.target === dialog) {
    fecharDialog();
  }
});

// Matheus Manja
