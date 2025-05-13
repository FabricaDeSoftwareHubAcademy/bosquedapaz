<?php

// caminho das imgs padrao
$imagens = [
    'img1' => '../../../Public/imgs/uploads-carrosel/img-carrossel-1.jpg',
    'img2' => '../../../Public/imgs/uploads-carrosel/img-carrossel-2.jpg',
    'img3' => '../../../Public/imgs/uploads-carrosel/img-carrossel-3.jpg',
];

$img1 = $imagens['img1'];
$img2 = $imagens['img2'];
$img3 = $imagens['img3'];


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
