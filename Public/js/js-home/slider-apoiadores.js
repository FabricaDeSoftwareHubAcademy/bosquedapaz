document.addEventListener("DOMContentLoaded", async function () {
    const track = document.getElementById('carrosselTrack');

    try {
        const response = await fetch('../../../actions/action-listar-parceiros.php');
        if (!response.ok) throw new Error(`Erro na resposta: ${response.status}`);
        const parceiros = await response.json();

        if (parceiros.length === 0) {
            track.innerHTML = "<p>Nenhum parceiro encontrado.</p>";
            return;
        }

        track.innerHTML = '';

        parceiros.forEach(parceiro => {
            const div = document.createElement('div');
            div.classList.add('div-logo-parceiro');

            const img = document.createElement('img');
            img.src = parceiro.logo; 
            img.alt = `Logo ${parceiro.nome_parceiro}`;

            div.appendChild(img);
            track.appendChild(div);
        });

        track.innerHTML += track.innerHTML;

    } catch (error) {
        console.error("Erro ao carregar parceiros:", error);
        track.innerHTML = "<p>Erro ao carregar parceiros.</p>";
    }
});
