document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('.form-aceitar-edital');
    const checkbox = document.getElementById('termos');
    const modal = document.getElementById('modal-erro');
    const btnFechar = document.querySelector('.fechar-modal');
  
    form.addEventListener('submit', (e) => {
      if (!checkbox.checked) {
        e.preventDefault();
        modal.style.display = 'flex';
      }
    });
  
    btnFechar.addEventListener('click', () => {
      modal.style.display = 'none';
    });
  });
  