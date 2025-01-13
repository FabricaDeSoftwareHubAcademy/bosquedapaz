<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seção de Edição</title>
  <link rel="stylesheet" href="../../css/css-adm/style-edicao-dados.css">
</head>
<body>
  
<?php include "../../assets/adm/menu-adm.html"?>

  <div class="box-container">

    <div class="container-image">
      <img src="../../imgs/img-edicao-dados/imagemEdicao.svg" alt="" class="imagem">
    </div>

    <div class="container-content">
      <h1 class="container-title">Área de Edição de Informações.</h1>
      <form class="container-formulario">
        <input type="text" name="visitantes" id="visitantes" class="inputGroup visitantes" placeholder="Total de Visitantes">
        <input type="text" name="expositores" id="expositores" class="inputGroup expositores" placeholder="Total de Expositores">
        <input type="text" name="artistas" id="artistas" class="inputGroup artistas" placeholder="Total de Artistas">
        <input type="text" name="paises" id="paises" class="inputGroup paises" placeholder="Total de Paises">
        <div class="container-botoes">
          <button class="botao enviar">Enviar</button>
          <button class="botao voltar">Voltar</button>
        </div>
      </form>
    </div>
  </div>

  <!-- <div class="area-figuras">
    <img src="../../imgs/img-edicao-dados/visitantes.svg" alt="" class="decoracao1">
    <img src="../../imgs/img-edicao-dados/expositores.svg" alt="" class="decoracao2">
    <img src="../../imgs/img-edicao-dados/artistas.svg" alt="" class="decoracao3">
    <img src="../../imgs/img-edicao-dados/paisesVisitantes.svg" alt="" class="decoracao4">
  </div> -->

  <script src="../js/main.js"></script>
</body>
</html>