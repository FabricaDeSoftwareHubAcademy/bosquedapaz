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

        const basePath = '/AulaPHPDev33/bosquedapaz/';

        parceiros.forEach(parceiro => {
            const div = document.createElement('div');
            div.classList.add('div-logo-parceiro');

            const img = document.createElement('img');
            // Monta a URL completa a partir do caminho salvo no banco
            img.src = basePath + parceiro.logo;
            img.alt = `Logo ${parceiro.nome_parceiro}`;

            div.appendChild(img);
            track.appendChild(div);
        });

        // Duplica os logos para efeito de carrossel infinito
        track.innerHTML += track.innerHTML;

    } catch (error) {
        console.error("Erro ao carregar parceiros:", error);
        track.innerHTML = "<p>Erro ao carregar parceiros.</p>";
    }
});
