    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.style.display = "block";

        var nomeCategoria = document.getElementById('nome').value;
        document.getElementById('output-text').textContent = nomeCategoria;
    };

    document.getElementById('openModal').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('modalCadastro').style.display = 'block';
    });

    document.querySelector('.close').addEventListener('click', function() {
        fecharModal();
    });

    window.addEventListener('click', function(event) {
        var modal = document.getElementById('modalCadastro');
        if (event.target === modal) {
            fecharModal();
        }
    });

    function fecharModal() {
        document.getElementById('modalCadastro').style.display = 'none';
    }

    document.getElementById('openModal').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('modalCadastro').style.display = 'flex';
    });

    document.querySelector('.close').addEventListener('click', function() {
        document.getElementById('modalCadastro').style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        let modal = document.getElementById('modalCadastro');
        let modalContent = document.querySelector('.modal-content');
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });

    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById('modalCadastro').style.display = 'none';
    });

    document.addEventListener("DOMContentLoaded", function () {
        const openButtons = document.querySelectorAll(".open-modal");
        const modal = document.getElementById("modalCadastro");

        openButtons.forEach(button => {
            button.addEventListener("click", function (event) {
                event.preventDefault();
                modal.style.display = "block";
            });
        });
    });
