document.addEventListener('DOMContentLoaded', async () => {
    const carouselTrack = document.querySelector('.carousel-track');
    const infoContainer = document.querySelector('.container__informacao .div__info');
    const cardsContainer = document.querySelector('.area__cards');

    let eventos = [];
    let currentSlideIndex = 0;

    try {
        const res = await fetch('../../../actions/action-listar-eventos-ativos.php');
        const json = await res.json();

        if (json.status === 'success') {
            eventos = json.dados;
            console.log("Eventos:", eventos);
            montarCarrossel(eventos);
            atualizarDescricaoEEspacos(eventos[0]);
        } else {
            throw new Error('Erro ao buscar eventos');
        }
    } catch (error) {
        console.error('Erro:', error);
    }

    function montarCarrossel(eventos) {
        carouselTrack.innerHTML = '';

        eventos.forEach((evento, index) => {
            const item = document.createElement('div');
            item.className = 'carousel-item';
            item.style.backgroundImage = `url('../../../Public/${evento.banner_evento}')`;
            item.dataset.index = index;

            item.innerHTML = `
                <div class="overlay">
                    <div class="overlay-content">
                        <div class="text-left">
                            <h2>${sanitize(evento.nome_evento)}</h2>
                            <h3>${sanitize(evento.subtitulo_evento)}</h3>
                            <p><i class="bi bi-calendar-event"></i> Data: ${formatarDataBR(evento.data_evento)}</p>
                            <p><i class="bi bi-clock"></i> Horário: ${evento.hora_inicio} às ${evento.hora_fim}</p>
                            <p><i class="bi bi-geo-alt"></i> ${sanitize(evento.endereco_evento)}</p>
                        </div>
                        <div class="banner-right">
                            <img src="../../../Public/${evento.banner_evento}" />
                        </div>
                    </div>
                </div>
            `;

            carouselTrack.appendChild(item);
        });

        ativarNavegacao();
    }

    function ativarNavegacao() {
        const prevBtn = document.querySelector('.nav.prev');
        const nextBtn = document.querySelector('.nav.next');
        const items = document.querySelectorAll('.carousel-item');

        showSlide(currentSlideIndex);

        nextBtn.addEventListener('click', () => {
            currentSlideIndex = (currentSlideIndex + 1) % eventos.length;
            showSlide(currentSlideIndex);
        });

        prevBtn.addEventListener('click', () => {
            currentSlideIndex = (currentSlideIndex - 1 + eventos.length) % eventos.length;
            showSlide(currentSlideIndex);
        });
    }

    function showSlide(index) {
        const items = document.querySelectorAll('.carousel-item');

        items.forEach((item, i) => {
            item.classList.remove('active', 'prev', 'next', 'hidden');

            if (i === index) {
                item.classList.add('active');
            } else if (i === index - 1 || (index === 0 && i === items.length - 1)) {
                item.classList.add('prev');
            } else if (i === index + 1 || (index === items.length - 1 && i === 0)) {
                item.classList.add('next');
            } else {
                item.classList.add('hidden');
            }
        });

        atualizarDescricaoEEspacos(eventos[index]);
    }

    async function atualizarDescricaoEEspacos(evento) {
        infoContainer.innerHTML = `<p>${sanitize(evento.descricao_evento)}</p>`;

        try {
            const atracoesRes = await fetch(`../../../actions/action-listar-atracoes-por-evento.php?id_evento=${evento.id_evento}`);
            const atracoesJson = await atracoesRes.json();

            if (atracoesJson.status === 'success') {
                const atracoes = atracoesJson.dados;
                cardsContainer.innerHTML = '';

                atracoes.forEach(atracao => {
                    const card = document.createElement('div');
                    card.className = 'card';
                    card.innerHTML = `
                        <div class="card__image">
                            <img src="../../../Public/${atracao.banner_atracao}" alt="Banner Atração" />
                            <div class="selo">Atração</div>
                        </div>
                        <div class="card__content">
                            <h2>${sanitize(atracao.nome_atracao)}</h2>
                            <h4>${sanitize(atracao.descricao_atracao)}</h4>
                            <div class="data">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#a67c52" viewBox="0 0 24 24" width="20" height="20">
                                    <path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 14H5V9h14v9zM7 11h5v5H7z"/>
                                </svg>
                                <span>${formatarDataBR(evento.data_evento)}</span>
                            </div>
                        </div>
                    `;
                    cardsContainer.appendChild(card);
                });
            } else {
                cardsContainer.innerHTML = '<p>Nenhuma atração encontrada.</p>';
            }
        } catch (error) {
            console.error('Erro ao buscar atrações:', error);
        }
    }

    function formatarDataBR(dataISO) {
        if (!dataISO) return '';
        const [ano, mes, dia] = dataISO.split('-');
        return `${dia}/${mes}/${ano}`;
    }

    function sanitize(str) {
        const div = document.createElement('div');
        div.textContent = str;
        return div.innerHTML;
    }
});