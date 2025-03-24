<?php

require_once('../Models/Carrossel.php');

$car = new Carrossel();

$carrossel = $car->buscar_id(2);

$img1 = $carrossel->img1;
$img2 = $carrossel->img2;
$img3 = $carrossel->img3;


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrossel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .slider-item1 {
            background-image: url(<?php echo "'". $img1. "'"; ?>);
        }
        .slider-item2 {
            background-image: url(<?php echo "'". $img2. "'"; ?>);
        }
        .slider-item3 {
            background-image: url(<?php echo "'". $img3. "'"; ?>);
        }
    </style>
</head>
<body>
    <!-- inicio carrosel -->
    <section class="carossel">
        <div class="fundo"> <!-- fundo da imagem -->
            <div class="conteiner-slider">
                <div class="slider-all">
                    <div class="slider-swap">
                        <div class="swap" id="arrow-left"><i class="fa-solid fa-arrow-left arrow-swap"></i></div>
                        <div class="swap" id="arrow-right"><i class="fa-solid fa-arrow-right arrow-swap"></i></div>
                    </div>
                    <div class="slider-item slider-item1" id="slider-item1">
                        <!-- <div style="width: 100%; height: 100%; background-color: aqua;"></div> -->
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
            </div>
    </section>
