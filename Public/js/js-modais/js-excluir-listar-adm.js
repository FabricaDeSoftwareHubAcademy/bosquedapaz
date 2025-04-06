document.querySelectorAll('.open-modal').forEach(button => {
    button.addEventListener('click', function () {
        const colaboradorId = this.getAttribute('data-id'); // Pega o ID do colaborador
        document.getElementById('id_colaborador').value = colaboradorId; // Coloca o ID no campo oculto
        document.getElementById('modal-deleta').showModal(); // Abre o modal
    });
  });