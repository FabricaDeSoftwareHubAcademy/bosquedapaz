document.getElementById("salvar-btn").addEventListener("click", function () {

    const confirmacao = confirm("Você tem certeza que deseja salvar?");

    if (confirmacao) {

        // Ação ao confirmar

        alert("Salvamento confirmado!");

    } else {

        // Ação ao cancelar

        alert("Salvamento cancelado.");

    }

});

 