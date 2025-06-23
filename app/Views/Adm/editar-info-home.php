<?php require_once __DIR__ . '/../../../app/helpers/auth.php';?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adm - Bosque da Paz</title>
  <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico" >
</head>

<body>

  <main class="dados-feira">
    <div class="box">
      <form class="formDados" id="formularioDados" enctype='multipart/form-data'>
        <h1 class="title">Dados Da Feira</h1>

        <div class="content-input">
          <label class="title-input">visitantes</label>
          <input type="number" name="qtd_visitantes" id="visitantes">
        </div>

        <div class="content-input">
          <label class="title-input">expositores</label>
          <input type="number" name="qtd_expositores" id="expositores">
        </div>

        <div class="content-input">
          <label class="title-input">artistas</label>
          <input type="number" name="qtd_artistas" id="artistas">
        </div>

        <div class="content-btn">
          <button type="reset" class="btn" id="cancelar">cancelar</button>
          <button type="submit" class="btn" id="editar">salvar</button>
        </div>
      </form>
    </div>
  </main>

  <script src="../../../Public/js/js-adm/dados-feira.js"></script>
</body>

</html>