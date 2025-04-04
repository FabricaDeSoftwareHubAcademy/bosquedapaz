<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Bosque da Paz</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../Public/css/css-home/style-lista-expositor.css">
    <link rel="stylesheet" href="../../../Public/css/css-modais/perfil-expositor.css">

    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>

    <?php include "../../../Public/assets/home/menu-home.html"; ?>

    <main class="content-principal">
        <h1 class="title-all-expo">expositores</h1>
        <div class="select-area">
            <select name="selecao-categoria" id="select-cat" class="select-cat">
                <option value="inicio" class="opcoes-cat">Todas as Categorias</option>
                <option value="artesanato" class="opcoes-cat">Artesanato</option>
                <option value="antiguidade" class="opcoes-cat">Antiguidade</option>
                <option value="colecionismo" class="opcoes-cat">Colecionismo</option>
            </select>
            <div class="vir-aqui" id="artesanato"></div>
            <div class="procurar">
                <h3 class="title-pes">Pesquisar por expositor:</h3>
                <div class="pesquisa-expo"> <!-- area de pesquisa -->
                    <input class="input-pes" type="text" placeholder="Pesquisar por...">
                </div>
            </div>
        </div>
        <div class="area-all-cards" id="inicio">
            <section class="secao-expo" id="artesanato">
                <div class="content-title-sec">
                    <h2 class="title-sec">Artesanato</h2>
                </div>
                <div class="cards-perfis">
                    <div class="card-per-expo">
                        <div class="head-card">
                            <img src="../../../Public/imgs/img-home/akj-prime.png" alt="" class="img-perfil-expo">
                        </div>
                        <div class="body-card">
                            <h3 class="nome-expo">retalhos e chicas</h3>
                            <div class="detalhes-expo">
                                <p class="para-cate">
                                    Categoria:
                                    <span class="span-cate">
                                        Artesanato
                                    </span>
                                </p>
                                <p class="para-color">
                                    Rua:
                                    <span class="span-color color-laranja">
                                        Laranja
                                    </span>
                                </p>
                            </div>
                            <button class="btn-ver-info open-modal" data-modal="m-per-expo">Ver Mais</button>
                        </div>
                    </div>
                    <div class="card-per-expo">
                        <div class="head-card">
                            <img src="../../../Public/imgs/img-home/decorart.png" alt="" class="img-perfil-expo">
                        </div>
                        <div class="body-card">
                            <h3 class="nome-expo">retalhos e chicas</h3>
                            <div class="detalhes-expo">
                                <p class="para-cate">
                                    Categoria:
                                    <span class="span-cate">
                                        Artesanato
                                    </span>
                                </p>
                                <p class="para-color">
                                    Rua:
                                    <span class="span-color color-roxo">
                                        Roxa
                                    </span>
                                </p>
                            </div>
                            <button class="btn-ver-info open-modal" data-modal="m-per-expo">Ver Mais</button>
                        </div>
                    </div>
                    <div class="card-per-expo">
                        <div class="head-card">
                            <img src="../../../Public/imgs/img-home/cake-pet.png" alt="" class="img-perfil-expo">
                        </div>
                        <div class="body-card">
                        <h3 class="nome-expo">retalhos e chicas</h3>
                            <div class="detalhes-expo">
                                <p class="para-cate">
                                    Categoria:
                                    <span class="span-cate">
                                        Artesanato
                                    </span>
                                </p>
                                <p class="para-color">
                                    Rua:
                                    <span class="span-color color-verde">
                                        Verde
                                    </span>
                                </p>
                            </div>
                            <button class="btn-ver-info open-modal" data-modal="m-per-expo">Ver Mais</button>
                        </div>
                    </div>
                    <div class="card-per-expo">
                        <div class="head-card">
                            <img src="../../../Public/imgs/img-home/retalhos-e-chica.png" alt="" class="img-perfil-expo">
                        </div>
                        <div class="body-card">
                        <h3 class="nome-expo">retalhos e chicas</h3>
                            <div class="detalhes-expo">
                                <p class="para-cate">
                                    Categoria:
                                    <span class="span-cate">
                                        Artesanato
                                    </span>
                                </p>
                                <p class="para-color">
                                    Rua:
                                    <span class="span-color color-amarela">
                                        Amarelo
                                    </span>
                                </p>
                            </div>
                            <button class="btn-ver-info open-modal" data-modal="m-per-expo">Ver Mais</button>
                        </div>
                    </div>
                </div>
                <div class="cards-perfis">
                    <div class="card-per-expo">
                        <div class="head-card">
                            <img src="../../../Public/imgs/img-home/akj-prime.png" alt="" class="img-perfil-expo">
                        </div>
                        <div class="body-card">
                            <h3 class="nome-expo">retalhos e chicas</h3>
                            <div class="detalhes-expo">
                                <p class="para-cate">
                                    Categoria:
                                    <span class="span-cate">
                                        Artesanato
                                    </span>
                                </p>
                                <p class="para-color">
                                    Rua:
                                    <span class="span-color color-laranja">
                                        Laranja
                                    </span>
                                </p>
                            </div>
                            <button class="btn-ver-info open-modal" data-modal="m-per-expo">Ver Mais</button>
                        </div>
                    </div>
                    <div class="card-per-expo">
                        <div class="head-card">
                            <img src="../../../Public/imgs/img-home/decorart.png" alt="" class="img-perfil-expo">
                        </div>
                        <div class="body-card">
                            <h3 class="nome-expo">retalhos e chicas</h3>
                            <div class="detalhes-expo">
                                <p class="para-cate">
                                    Categoria:
                                    <span class="span-cate">
                                        Artesanato
                                    </span>
                                </p>
                                <p class="para-color">
                                    Rua:
                                    <span class="span-color color-roxo">
                                        Roxa
                                    </span>
                                </p>
                            </div>
                            <button class="btn-ver-info open-modal" data-modal="m-per-expo">Ver Mais</button>
                        </div>
                    </div>
                    <div class="card-per-expo">
                        <div class="head-card">
                            <img src="../../../Public/imgs/img-home/cake-pet.png" alt="" class="img-perfil-expo">
                        </div>
                        <div class="body-card">
                        <h3 class="nome-expo">retalhos e chicas</h3>
                            <div class="detalhes-expo">
                                <p class="para-cate">
                                    Categoria:
                                    <span class="span-cate">
                                        Artesanato
                                    </span>
                                </p>
                                <p class="para-color">
                                    Rua:
                                    <span class="span-color color-verde">
                                        Verde
                                    </span>
                                </p>
                            </div>
                            <button class="btn-ver-info open-modal" data-modal="m-per-expo">Ver Mais</button>
                        </div>
                    </div>
                    <div class="card-per-expo">
                        <div class="head-card">
                            <img src="../../../Public/imgs/img-home/retalhos-e-chica.png" alt="" class="img-perfil-expo">
                        </div>
                        <div class="body-card">
                        <h3 class="nome-expo">retalhos e chicas</h3>
                            <div class="detalhes-expo">
                                <p class="para-cate">
                                    Categoria:
                                    <span class="span-cate">
                                        Artesanato
                                    </span>
                                </p>
                                <p class="para-color">
                                    Rua:
                                    <span class="span-color color-amarela">
                                        Amarelo
                                    </span>
                                </p>
                            </div>
                            <button class="btn-ver-info open-modal" data-modal="m-per-expo">Ver Mais</button>
                        </div>
                    </div>
                </div>
            </section>
            <div class="vir-aqui" id="antiguidade"></div>
            <section class="secao-expo">
                <div class="content-title-sec">
                    <h2 class="title-sec">Antiguidade</h2>
                </div>
                <div class="cards-perfis">
                    <div class="card-per-expo">
                        <div class="head-card">
                            <img src="../../../Public/imgs/img-home/akj-prime.png" alt="" class="img-perfil-expo">
                        </div>
                        <div class="body-card">
                            <h3 class="nome-expo">retalhos e chicas</h3>
                            <div class="detalhes-expo">
                                <p class="para-cate">
                                    Categoria:
                                    <span class="span-cate">
                                        Artesanato
                                    </span>
                                </p>
                                <p class="para-color">
                                    Rua:
                                    <span class="span-color color-laranja">
                                        Laranja
                                    </span>
                                </p>
                            </div>
                            <button class="btn-ver-info open-modal" data-modal="m-per-expo">Ver Mais</button>
                        </div>
                    </div>
                    <div class="card-per-expo">
                        <div class="head-card">
                            <img src="../../../Public/imgs/img-home/decorart.png" alt="" class="img-perfil-expo">
                        </div>
                        <div class="body-card">
                            <h3 class="nome-expo">retalhos e chicas</h3>
                            <div class="detalhes-expo">
                                <p class="para-cate">
                                    Categoria:
                                    <span class="span-cate">
                                        Artesanato
                                    </span>
                                </p>
                                <p class="para-color">
                                    Rua:
                                    <span class="span-color color-roxo">
                                        Roxa
                                    </span>
                                </p>
                            </div>
                            <button class="btn-ver-info open-modal" data-modal="m-per-expo">Ver Mais</button>
                        </div>
                    </div>
                    <div class="card-per-expo">
                        <div class="head-card">
                            <img src="../../../Public/imgs/img-home/cake-pet.png" alt="" class="img-perfil-expo">
                        </div>
                        <div class="body-card">
                        <h3 class="nome-expo">retalhos e chicas</h3>
                            <div class="detalhes-expo">
                                <p class="para-cate">
                                    Categoria:
                                    <span class="span-cate">
                                        Artesanato
                                    </span>
                                </p>
                                <p class="para-color">
                                    Rua:
                                    <span class="span-color color-verde">
                                        Verde
                                    </span>
                                </p>
                            </div>
                            <button class="btn-ver-info open-modal" data-modal="m-per-expo">Ver Mais</button>
                        </div>
                    </div>
                    <div class="card-per-expo">
                        <div class="head-card">
                            <img src="../../../Public/imgs/img-home/retalhos-e-chica.png" alt="" class="img-perfil-expo">
                        </div>
                        <div class="body-card">
                        <h3 class="nome-expo">retalhos e chicas</h3>
                            <div class="detalhes-expo">
                                <p class="para-cate">
                                    Categoria:
                                    <span class="span-cate">
                                        Artesanato
                                    </span>
                                </p>
                                <p class="para-color">
                                    Rua:
                                    <span class="span-color color-amarela">
                                        Amarelo
                                    </span>
                                </p>
                            </div>
                            <button class="btn-ver-info open-modal" data-modal="m-per-expo">Ver Mais</button>
                        </div>
                    </div>
                </div>
                <div class="cards-perfis">
                    <div class="card-per-expo">
                        <div class="head-card">
                            <img src="../../../Public/imgs/img-home/akj-prime.png" alt="" class="img-perfil-expo">
                        </div>
                        <div class="body-card">
                            <h3 class="nome-expo">retalhos e chicas</h3>
                            <div class="detalhes-expo">
                                <p class="para-cate">
                                    Categoria:
                                    <span class="span-cate">
                                        Artesanato
                                    </span>
                                </p>
                                <p class="para-color">
                                    Rua:
                                    <span class="span-color color-laranja">
                                        Laranja
                                    </span>
                                </p>
                            </div>
                            <button class="btn-ver-info open-modal" data-modal="m-per-expo">Ver Mais</button>
                        </div>
                    </div>
                    <div class="card-per-expo">
                        <div class="head-card">
                            <img src="../../../Public/imgs/img-home/decorart.png" alt="" class="img-perfil-expo">
                        </div>
                        <div class="body-card">
                            <h3 class="nome-expo">retalhos e chicas</h3>
                            <div class="detalhes-expo">
                                <p class="para-cate">
                                    Categoria:
                                    <span class="span-cate">
                                        Artesanato
                                    </span>
                                </p>
                                <p class="para-color">
                                    Rua:
                                    <span class="span-color color-roxo">
                                        Roxa
                                    </span>
                                </p>
                            </div>
                            <button class="btn-ver-info open-modal" data-modal="m-per-expo">Ver Mais</button>
                        </div>
                    </div>
                    <div class="card-per-expo">
                        <div class="head-card">
                            <img src="../../../Public/imgs/img-home/cake-pet.png" alt="" class="img-perfil-expo">
                        </div>
                        <div class="body-card">
                        <h3 class="nome-expo">retalhos e chicas</h3>
                            <div class="detalhes-expo">
                                <p class="para-cate">
                                    Categoria:
                                    <span class="span-cate">
                                        Artesanato
                                    </span>
                                </p>
                                <p class="para-color">
                                    Rua:
                                    <span class="span-color color-verde">
                                        Verde
                                    </span>
                                </p>
                            </div>
                            <button class="btn-ver-info open-modal" data-modal="m-per-expo">Ver Mais</button>
                        </div>
                    </div>
                    <div class="card-per-expo">
                        <div class="head-card">
                            <img src="../../../Public/imgs/img-home/retalhos-e-chica.png" alt="" class="img-perfil-expo">
                        </div>
                        <div class="body-card">
                        <h3 class="nome-expo">retalhos e chicas</h3>
                            <div class="detalhes-expo">
                                <p class="para-cate">
                                    Categoria:
                                    <span class="span-cate">
                                        Artesanato
                                    </span>
                                </p>
                                <p class="para-color">
                                    Rua:
                                    <span class="span-color color-amarela">
                                        Amarelo
                                    </span>
                                </p>
                            </div>
                            <button class="btn-ver-info open-modal" data-modal="m-per-expo">Ver Mais</button>
                        </div>
                    </div>
                </div>
            </section>
            <div class="vir-aqui" id="colecionismo"></div>
            <section class="secao-expo" id="colecionismo">
                <div class="content-title-sec">
                    <h2 class="title-sec">Colecionismo</h2>
                </div>
                <div class="cards-perfis">
                    <div class="card-per-expo">
                        <div class="head-card">
                            <img src="../../../Public/imgs/img-home/akj-prime.png" alt="" class="img-perfil-expo">
                        </div>
                        <div class="body-card">
                            <h3 class="nome-expo">retalhos e chicas</h3>
                            <div class="detalhes-expo">
                                <p class="para-cate">
                                    Categoria:
                                    <span class="span-cate">
                                        Artesanato
                                    </span>
                                </p>
                                <p class="para-color">
                                    Rua:
                                    <span class="span-color color-laranja">
                                        Laranja
                                    </span>
                                </p>
                            </div>
                            <button class="btn-ver-info open-modal" data-modal="m-per-expo">Ver Mais</button>
                        </div>
                    </div>
                    <div class="card-per-expo">
                        <div class="head-card">
                            <img src="../../../Public/imgs/img-home/decorart.png" alt="" class="img-perfil-expo">
                        </div>
                        <div class="body-card">
                            <h3 class="nome-expo">retalhos e chicas</h3>
                            <div class="detalhes-expo">
                                <p class="para-cate">
                                    Categoria:
                                    <span class="span-cate">
                                        Artesanato
                                    </span>
                                </p>
                                <p class="para-color">
                                    Rua:
                                    <span class="span-color color-roxo">
                                        Roxa
                                    </span>
                                </p>
                            </div>
                            <button class="btn-ver-info open-modal" data-modal="m-per-expo">Ver Mais</button>
                        </div>
                    </div>
                    <div class="card-per-expo">
                        <div class="head-card">
                            <img src="../../../Public/imgs/img-home/cake-pet.png" alt="" class="img-perfil-expo">
                        </div>
                        <div class="body-card">
                        <h3 class="nome-expo">retalhos e chicas</h3>
                            <div class="detalhes-expo">
                                <p class="para-cate">
                                    Categoria:
                                    <span class="span-cate">
                                        Artesanato
                                    </span>
                                </p>
                                <p class="para-color">
                                    Rua:
                                    <span class="span-color color-verde">
                                        Verde
                                    </span>
                                </p>
                            </div>
                            <button class="btn-ver-info open-modal" data-modal="m-per-expo">Ver Mais</button>
                        </div>
                    </div>
                    <div class="card-per-expo">
                        <div class="head-card">
                            <img src="../../../Public/imgs/img-home/retalhos-e-chica.png" alt="" class="img-perfil-expo">
                        </div>
                        <div class="body-card">
                        <h3 class="nome-expo">retalhos e chicas</h3>
                            <div class="detalhes-expo">
                                <p class="para-cate">
                                    Categoria:
                                    <span class="span-cate">
                                        Artesanato
                                    </span>
                                </p>
                                <p class="para-color">
                                    Rua:
                                    <span class="span-color color-amarela">
                                        Amarelo
                                    </span>
                                </p>
                            </div>
                            <button class="btn-ver-info open-modal" data-modal="m-per-expo">Ver Mais</button>
                        </div>
                    </div>
                </div>
                <div class="cards-perfis">
                    <div class="card-per-expo">
                        <div class="head-card">
                            <img src="../../../Public/imgs/img-home/akj-prime.png" alt="" class="img-perfil-expo">
                        </div>
                        <div class="body-card">
                            <h3 class="nome-expo">retalhos e chicas</h3>
                            <div class="detalhes-expo">
                                <p class="para-cate">
                                    Categoria:
                                    <span class="span-cate">
                                        Artesanato
                                    </span>
                                </p>
                                <p class="para-color">
                                    Rua:
                                    <span class="span-color color-laranja">
                                        Laranja
                                    </span>
                                </p>
                            </div>
                            <button class="btn-ver-info open-modal" data-modal="m-per-expo">Ver Mais</button>
                        </div>
                    </div>
                    <div class="card-per-expo">
                        <div class="head-card">
                            <img src="../../../Public/imgs/img-home/decorart.png" alt="" class="img-perfil-expo">
                        </div>
                        <div class="body-card">
                            <h3 class="nome-expo">retalhos e chicas</h3>
                            <div class="detalhes-expo">
                                <p class="para-cate">
                                    Categoria:
                                    <span class="span-cate">
                                        Artesanato
                                    </span>
                                </p>
                                <p class="para-color">
                                    Rua:
                                    <span class="span-color color-roxo">
                                        Roxa
                                    </span>
                                </p>
                            </div>
                            <button class="btn-ver-info open-modal" data-modal="m-per-expo">Ver Mais</button>
                        </div>
                    </div>
                    <div class="card-per-expo">
                        <div class="head-card">
                            <img src="../../../Public/imgs/img-home/cake-pet.png" alt="" class="img-perfil-expo">
                        </div>
                        <div class="body-card">
                        <h3 class="nome-expo">retalhos e chicas</h3>
                            <div class="detalhes-expo">
                                <p class="para-cate">
                                    Categoria:
                                    <span class="span-cate">
                                        Artesanato
                                    </span>
                                </p>
                                <p class="para-color">
                                    Rua:
                                    <span class="span-color color-verde">
                                        Verde
                                    </span>
                                </p>
                            </div>
                            <button class="btn-ver-info open-modal" data-modal="m-per-expo">Ver Mais</button>
                        </div>
                    </div>
                    <div class="card-per-expo">
                        <div class="head-card">
                            <img src="../../../Public/imgs/img-home/retalhos-e-chica.png" alt="" class="img-perfil-expo">
                        </div>
                        <div class="body-card">
                        <h3 class="nome-expo">retalhos e chicas</h3>
                            <div class="detalhes-expo">
                                <p class="para-cate">
                                    Categoria:
                                    <span class="span-cate">
                                        Artesanato
                                    </span>
                                </p>
                                <p class="para-color">
                                    Rua:
                                    <span class="span-color color-amarela">
                                        Amarelo
                                    </span>
                                </p>
                            </div>
                            <button class="btn-ver-info open-modal" data-modal="m-per-expo">Ver Mais</button>
                        </div>
                    </div>
                </div>
                <dialog class="m-per-expo" id="m-per-expo">
                    <?php  include '../../../Public/assets/home/perfil-expositor.html' ?>
                </dialog>
            </section>
        </div>
    </main>


    <script src="../../../Public/js/js-modais/js-abrir-modal.js"></script>
    <script src="../../../Public/js/js-home/escolher-categoria.js"></script>
    <script src="../../../Public/js/js-home/main.js"></script>
    <script>
        var selection = document.getElementById("select-cat");
        var variavel = "";
        var url = window.location.href;
        selection.onchange = function() {
            section = this.value;
            console.log(section);
            let irPara = url + "#" + section;
            window.location.assign(irPara);
        }
    </script>

    <?php include "../../../Public/assets/home/rodape.html"; ?>
</body>

</html>