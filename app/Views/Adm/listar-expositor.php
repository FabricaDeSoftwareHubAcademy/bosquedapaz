<?php require_once __DIR__ . '/../../../app/helpers/auth.php';?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adm - Bosque da Paz</title>
  <script src="../../../Public/js/js-adm/status-colaborador.js" defer></script>
  <script src="../../../Public/js/js-modais/js-abrir-modal.js" defer></script>
  <link rel="stylesheet" href="../../../Public/css/css-adm/style-listar-expositor.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

  <?php include "../../../Public/include/menu-adm.html" ?>

  <!-- <script src="../js/main.js"></script> -->

        <main class="principal">
            <div class="box">
                <h2>LISTAR EXPOSITOR</h2>
                <div class="container">
                    <div class="search-bar">
                      <label for="status">Procurar</label>
                      <input type="text" id="buscar_expositor" placeholder="Buque o expositor aqui" />
                    </div>
                    <div class="table-container">
                      <table class="collaborators-table">
                        <thead>
                          <tr>
                            <th class="usuario-col">Usuário</th>
                            <th>Nome</th>
                            <th class="email-col-th">E-mail</th>
                            <th class="fone-col">Telefone</th>
                            <th class="barraca-col">N. Barraca</th>
                            <th>Status</th>
                            <th>Editar</th>
                          </tr>
                        </thead>
                        <tbody id="tbody">
                        
                        </tbody>
                      </table>
                    </div>  
            <div class="btns">
                <a href="./Area-Adm.php" class="voltar">
                <img src="../../../Public/assets/icons/voltar.png" alt="Botão de voltar" class="btn-voltar">
                </a>
            </div>  
            </div>
            
        </main>

                
  </main>
  <div class="bolas-fundo">
        <img class="bola-verde1" src="../../../Public/assets/img-bolas/bola-azul1.png" alt="">
        <img class="bola-verde2" src="../../../Public/assets/img-bolas/bola-azul2.png" alt="">
        <img class="bola-rosa" src="../../../Public/assets/img-bolas/bola-azul.png" alt="">
      </div>

    <?php include "../../../Public/include/modais/modal-confirmar.html"; ?>
    <?php include "../../../Public/include/modais/modal-sucesso.html"; ?>
    <?php include "../../../Public/include/modais/modal-error.html"; ?>
  
  <script src="../../../Public/js/js-menu/js-menu.js"></script>
  <script src="../../../Public/js/js-adm/js-listar-expositor.js"></script>

</body>

</html>