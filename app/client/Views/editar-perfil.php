<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../../Public/css/style-editar-perfil.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
</head>
<body class="perfilEdit-body">
    <?php include "../../../Public/assets/adm/menu-adm.html" ?>

     <div class="perfilEdit-box">
        <h1 class="perfilEdit-title">Editar Perfil</h1>

        <form action="#" >
            <section class="perfilEdit-empresas">
                <div class="perfilEdit-logo">
                    <label for="" class="perfilEdit-logoEmpresa">Logo da empresa: </label>
                    <input type="file" name="foto" id="foto" class="perfilEdit-foto" placeholder="Selecione sua logo" required>
                </div>
                <div class="perfilEdit-name">
                    <label for="" class="perfilEdit-nameEmpresa">Nome da empresa: </label>
                    <input type="text" name="nome" id="nome" class="perfilEdit-nome" placeholder="Digite seu nome" required>
                </div>
            </section>
        </form>
     </div>

    <img class="perfilEdit-superior-esquerda" src="../../../Public/imgs/img-listar-boletos/img-superior-esquerda.svg" alt="">
    <img class="perfilEdit-superior-direita" src="../../../Public/imgs/img-listar-boletos/img-superior-direita.svg" alt="">
    <img class="perfilEdit-inferior" src="../../../Public/imgs/img-listar-boletos/img-inferior-boleto.svg" alt="">
</body>
</html>