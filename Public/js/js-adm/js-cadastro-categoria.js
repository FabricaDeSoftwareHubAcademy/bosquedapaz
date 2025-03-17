var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);

    var nomeCategoria = document.getElementById('nome').value;
    var outputText = document.getElementById('output-text');
    outputText.textContent = nomeCategoria;
  };

  document.getElementById('openModal').addEventListener('click', function(event) {
    event.preventDefault();
    document.getElementById('modalCadastro').style.display = 'block';
});

document.querySelector('.close').addEventListener('click', function() {
    document.getElementById('modalCadastro').style.display = 'none';
});

function fecharModal() {
    document.getElementById('modalCadastro').style.display = 'none';
}

var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.style.display = "block";

    var nomeCategoria = document.getElementById('nome').value;
    document.getElementById('output-text').textContent = nomeCategoria;
};