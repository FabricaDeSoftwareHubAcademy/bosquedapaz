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

    const selected = document.querySelector(".select-selected");
    const selectedText = document.getElementById("selectedText");
    const selectedColor = document.getElementById("selectedColor");
    const items = document.querySelector(".select-items");

    selected.addEventListener("click", () => {
        items.style.display = items.style.display === "block" ? "none" : "block";
    });

    document.querySelectorAll(".select-items div").forEach(item => {
        item.addEventListener("click", function () {
            selectedText.textContent = this.textContent.trim();
            selectedColor.style.backgroundColor = this.dataset.value;
            items.style.display = "none";
        });
    });

    document.addEventListener("click", (event) => {
        if (!event.target.closest(".custom-select")) {
            items.style.display = "none";
        }
    });

    document.addEventListener("DOMContentLoaded", function () {
        const openModalButtons = document.querySelectorAll(".open-modal");
        const closeModalButtons = document.querySelectorAll(".close-modal");
        
        openModalButtons.forEach(button => {
            button.addEventListener("click", function (event) {
                event.stopPropagation();
                const modalId = this.getAttribute("data-modal");
                const modal = document.getElementById(modalId);
                if (modal) {
                    modal.showModal();
                }
            });
        });
    
        closeModalButtons.forEach(button => {
            button.addEventListener("click", function (event) {
                event.stopPropagation();
                const modalId = this.getAttribute("data-modal");
                const modal = document.getElementById(modalId);
                if (modal) {
                    modal.close();
                }
            });
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("custom-modal");
  const cancelBtn = document.getElementById("custom-cancel");
  const confirmBtn = document.getElementById("custom-confirm");
  const openButtons = document.querySelectorAll(".open-custom-modal");

  openButtons.forEach(button => {
      button.addEventListener("click", () => {
          modal.style.display = "flex";
      });
  });

  function closeModal() {
      modal.style.display = "none";
  }

  cancelBtn.addEventListener("click", closeModal);
  confirmBtn.addEventListener("click", () => {
      alert("Ação confirmada!");
      closeModal();
  });

  modal.addEventListener("click", (e) => {
      if (e.target === modal) {
          closeModal();
      }
  });
});
    

let bot_categoria = document.querySelector('.btn-cad');
let form_categoria = document.querySelector('#form_categoria');
let botao_cadastrar = document.querySelector('#btn_cadastrar_cat');

bot_categoria.addEventListener('click', function () {
    chamaModal();
});

botao_cadastrar.addEventListener('click', async function (event) {
    event.preventDefault();

    const new_form = document.getElementById("form_categoria");

    const formData = new FormData(new_form);

    let dados_php = await fetch('./actions/cadastrar_categoria.php', {
        method: 'POST',
        body: formData
    });

    let response = await dados_php.json();

    console.log(response);

    if(response.status == "OK"){
        alert("Cadastrado com sucesso");
        fechaModal();
    } else {
        alert("Erro ao cadastrar!");
    }
});

const cores = document.querySelectorAll('.select-items div[data-value]');

cores.forEach(div => {
    div.addEventListener('click', function() {
        const corSelecionada = this.getAttribute('data-value');
        document.getElementById('selectedColor').style.backgroundColor = corSelecionada;
        document.getElementById('corInput').value = corSelecionada;
    });
});