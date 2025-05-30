
document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);
    const idEvento = urlParams.get('id_evento');

    if (idEvento) {
        document.getElementById('id_evento').value = idEvento;
    }
});
