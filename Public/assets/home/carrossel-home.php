<?php

require_once('../Controller/Carrossel.php');

$car = new Carrossel();

$carrossel = $car->buscar_id(3);


// caminho das imgs padrao
$imagens = [
    'img1' => '../../../Public/imgs/uploads-carrosel/img-carrossel-1.jpg',
    'img2' => '../../../Public/imgs/uploads-carrosel/img-carrossel-2.jpg',
    'img3' => '../../../Public/imgs/uploads-carrosel/img-carrossel-3.jpg',
];

// verifica se aconsulta no db esta vazia
if(!empty($carrossel)){
    //no caso de nao esta vem para aqui
    $img1 = $carrossel->img1;
    $img2 = $carrossel->img2;
    $img3 = $carrossel->img3;

    // ifs para saber se esta faltando uma img 
    if(empty($carrossel->img1)){
        $img1 = $imagens['img1'];
    }
    if(empty($carrossel->img2)){
        $img2 = $imagens['img2'];
    }
    if(empty($carrossel->img3)){
        $img3 = $imagens['img3'];
    }
}
//no caso de estar vazio, vem para cá e carrega imgs padrao
else{
    $img1 = $imagens['img1'];
    $img2 = $imagens['img2'];
    $img3 = $imagens['img3'];
}


?>

<!-- inicio carrosel -->
<section class="carossel" id="carrossel">
    
</section>

<!-- <div class="fundo">
        <div class="conteiner-slider">
            <div class="slider-all">
                <div class="slider-swap">
                    <div class="swap" id="arrow-left"><i class="fa-solid fa-arrow-left arrow-swap"></i></div>
                    <div class="swap" id="arrow-right"><i class="fa-solid fa-arrow-right arrow-swap"></i></div>
                </div>
                <div class="slider-item slider-item1" id="slider-item1">
                </div>
                <div class="slider-item slider-item2" id="slider-item2">
                </div>
                <div class="slider-item slider-item3" id="slider-item3">
                </div>
            </div>
            <div class="slider-balls">
                <input type="radio" name="btn-radio" id="radio1" hidden>
                <input type="radio" name="btn-radio" id="radio2" hidden>
                <input type="radio" name="btn-radio" id="radio3" hidden>

                <div class="ball ball1"></div>
                <div class="ball ball2"></div>
                <div class="ball ball3"></div>
            </div>
        </div> -->
