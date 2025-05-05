<?php

$src_imgs = [
    0 => '../../../Public/imgs/img-home/akj-prime.png',
    1 => '../../../Public/imgs/img-home/decorart.png',
    2 => '../../../Public/imgs/img-home/cake-pet.png',
    3 => '../../../Public/imgs/img-home/retalhos-e-chica.png',
    4 => '../../../Public/imgs/img-home/akj-prime.png',
    5 => '../../../Public/imgs/img-home/decorart.png',
    6 => '../../../Public/imgs/img-home/cake-pet.png',
    7 => '../../../Public/imgs/img-home/retalhos-e-chica.png',
];

$colors = [
    0 => 'amarela',
    1 => 'verde',
    2 => 'roxo',
    3 => 'laranja',
    4 => 'amarela',
    5 => 'verde',
    6 => 'roxo',
    7 => 'laranja',
];

$cards = '';

for($i = 0; $i < 8; $i++):
    $card = '
    <div class="content-card-expo">
        <div class="card-per-expo">
            <div class="head-card">
                <img src="'. $src_imgs[$i]. '" alt="" class="img-perfil-expo">
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
                        <span class="span-color '. $colors[$i]. '">
                            '. $colors[$i].'
                        </span>
                    </p>
                </div>
                <button class="btn-ver-info open-modal" data-modal="m-per-expo">Ver Mais</button>
            </div>
        </div>
    </div>
    ';

    $cards .= $card;
endfor;

?>

<section class="expositor" id="expositor">
        <div class="bar-title-expositor">
            <div class="conteiner-title-expo">
                <div class="line-before"></div>
                <h2 class="all-titles title-expositor">nossos expositores</h2>
                <div class="line-after"></div>
            </div>
            <p class="para-title-expo all-para">Veja como são nossos expositores e venha explorar, apoiar e compartilhar uma experiência inesquecível conosco!</p>
            <div class="content-seja-expositor">
                <button class="btn-seja-expositor" id="btn-seja-expositor">
                    <a href="" class="all-links link-seja-exposior">seja um expositor</a>
                </button>
            </div>
        </div>
        <div class="listar-expositor">
            <div class="content-listar-expositor">
            
                <?php
                    echo $cards;
                ?>

            </div>

            <?php  include '../../../Public/assets/home/perfil-expositor.html' ?>

            <div class="content-seja-expositor content-mais-expositor">
                <button class="btn-seja-expositor btn-mais-expositor" id="btn-seja-expositor">
                    <a href="" class="all-links link-seja-exposior">ver outros expositoresr</a>
                </button>
            </div>
        </div>
    </section>

<!-- fim seja expositor -->

