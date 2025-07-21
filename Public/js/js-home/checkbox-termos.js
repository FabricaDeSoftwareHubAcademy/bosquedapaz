document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('.form-aceitar-edital');
    const checkbox = document.getElementById('aceito');
    const modal = document.getElementById('modal-erro');
    const btnFechar = document.querySelector('.fechar-modal');
  
    form.addEventListener('submit', (e) => {
      if (!checkbox.checked) {
        e.preventDefault(); // impede envio do form
        modal.style.display = 'flex'; // mostra modal
      }
    });
  
    btnFechar.addEventListener('click', () => {
      modal.style.display = 'none'; // esconde modal
    });
  });
  