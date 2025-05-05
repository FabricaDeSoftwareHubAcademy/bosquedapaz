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
<section class="carrossel" id="carrossel">
    <div class="conteiner-slider">
        <div class="slider-all">
            <div class="slider-swap">
                <div class="swap" id="arrow-left">
                    <i class="bi bi-arrow-left arrow"></i>
                </div>
                <div class="swap" id="arrow-right">
                    <i class="bi bi-arrow-right arrow"></i>
                </div>
            </div>
            <div class="slider">
                <div class="slider-content" id="slider-content">
                    <img src="<?php echo $img1; ?>" class="carrosel" alt="imagem carrossel 1">
                </div>
                <div class="slider-content" id="slider-content">
                    <img src="<?php echo $img2; ?>" class="carrosel" alt="imagem carrossel 2">
                </div>
                <div class="slider-content" id="slider-content">
                    <img src="<?php echo $img3; ?>" class="carrosel" alt="imagem carrossel 3">
                </div>
            </div>
        </div>
    </div>
    <div class="slider-balls">
        <div class="ball" id="ball"></div>
        <div class="ball" id="ball"></div>
        <div class="ball" id="ball"></div>
    </div>
</section>
