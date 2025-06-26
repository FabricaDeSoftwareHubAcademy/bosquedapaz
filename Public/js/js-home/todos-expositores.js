


aaaa += `
                <div class="sobre_card">
                    <div class="content-card-expo" id="card">
                        <div class="card-per-expo">
                            <div class="head-card">
                                <img src="<!--${element.img_perfil}-->" alt="" class="img-perfil-expo">
                            </div>
                            <div class="body-card">
                                <h3 class="nome-expo">${element.nome_marca}</h3>
                                <div class="detalhes-expo">
                                    <p class="para-cate">
                                        Categoria:
                                        <span class="span-cate">
                                            ${element.descricao}
                                        </span>
                                    </p>
                                    <p class="para-color">
                                        Rua:
                                        <span class="span-color" style="background-color: ${element.cor_rua};">
                                        </span>
                                    </p>
                                </div>
                                <button class="btn-ver-info" data-modal="m-per-expo" id="saiba-mais" onClick="chamarModalExpositor(${element.id_expositor})">Ver Mais</button>
                            </div>
                        </div>
                    </div>
                </div>
                `