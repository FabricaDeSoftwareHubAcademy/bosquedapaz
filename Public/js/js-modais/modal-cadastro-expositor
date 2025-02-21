// Abrir modal ao clicar no botão "Salvar"
document.getElementById('salvar-btn').addEventListener('click', function() {
    document.getElementById('modal').style.display = 'flex';
});

// Fechar modal ao clicar no botão de fechar (x)
document.querySelector('.close').addEventListener('click', function() {
    document.getElementById('modal').style.display = 'none';
});

// Fechar modal ao clicar fora da área do modal
window.addEventListener('click', function(event) {
    if (event.target === document.getElementById('modal')) {
        document.getElementById('modal').style.display = 'none';
    }
});

// Ações para os botões do modal
document.querySelector('.btn-confirmar').addEventListener('click', function() {
    alert('Alterações salvas com sucesso!');
    document.getElementById('modal').style.display = 'none';
});

document.querySelector('.btn-cancelar-modal').addEventListener('click', function() {
    document.getElementById('modal').style.display = 'none';
});