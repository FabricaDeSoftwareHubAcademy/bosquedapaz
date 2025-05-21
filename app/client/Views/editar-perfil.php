<!DOCTYPE html>
<html lang="pt-br">
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

        <form action="#" class="perfilEdit-form">
            <section class="perfilEdit-empresas">
                <div class="perfilEdit-logo">
                    <label for="foto" class="perfilEdit-logoEmpresa">Logo da empresa: </label>
                    <input type="file" name="foto" id="foto" class="perfilEdit-foto" placeholder="Selecione sua logo" required>
                </div>
                <div class="perfilEdit-name">
                    <label for="nome" class="perfilEdit-nameEmpresa">Nome da empresa: </label>
                    <input type="text" name="nome" id="nome" class="perfilEdit-nome" placeholder="Digite seu nome" required>
                </div>
            </section>
            <section class="perfilEdit-desc">
                <label class="perfilEdit-label-desc" for="descricao" >Sobre a Empresa: </label>
                <textarea name="descricao" id="descricao" cols="200" rows="10" class="perfilEdit-text-desc" placeholder="Digite uma breve descrição sobre sua empresa"></textarea>
            </section>
            <section class="perfilEdit-info">
                <div>
                    <img src="https://img.icons8.com/ios-filled/32/228BE6/instagram-new--v1.png" alt="instagram-new--v1"/>
                    <input type="text" name="informacao" id="informacao" class="perfilEdit-input-info">
                </div>
                <div>
                    <img src="https://img.icons8.com/ios-filled/50/22bc9d/whatsapp--v1.png" alt="whatsapp--v1"/>
                    <input type="text" name="informacao" id="informacao" class="perfilEdit-input-info">
                </div>
                <div>
                    <img src="https://img.icons8.com/ios-glyphs/30/FAB005/facebook-new.png" alt="facebook-new"/>
                    <input type="text" name="informacao" id="informacao" class="perfilEdit-input-info">
                </div>
                <div>
                    <img src="https://img.icons8.com/windows/32/ff3877/secured-letter--v2.png" alt="secured-letter--v2"/>
                    <input type="text" name="informacao" id="informacao" class="perfilEdit-input-info">
                </div>
            </section>
            <section class="perfilEdit-foto-info">
                <label for="" class="perfilEdit-foto-info-label"></label>
                <div class="perfilEdit-load-foto"> <input type="file" name="foto" id="foto" class="perfilEdit-input-foto"> </div>
                <div class="perfilEdit-load-foto"> <input type="file" name="foto" id="foto" class="perfilEdit-input-foto"> </div>
                <div class="perfilEdit-load-foto"> <input type="file" name="foto" id="foto" class="perfilEdit-input-foto"> </div>
                <div class="perfilEdit-load-foto"> <input type="file" name="foto" id="foto" class="perfilEdit-input-foto"> </div>
                <div class="perfilEdit-load-foto"> <input type="file" name="foto" id="foto" class="perfilEdit-input-foto"> </div>
                <div class="perfilEdit-load-foto"> <input type="file" name="foto" id="foto" class="perfilEdit-input-foto"> </div>
            </section>
            <section class="perfilEdit-btn">
                <button>Cancelar</button>
                <button>Salvar</button>
            </section>
        </form>
        <img src="../../../Public/imgs/img-login/arrow-circle-left.svg" alt=""><a href=""></a></img>
     </div>

    <img class="perfilEdit-superior-esquerda" src="../../../Public/imgs/img-listar-boletos/img-superior-esquerda.svg" alt="">
    <img class="perfilEdit-superior-direita" src="../../../Public/imgs/img-listar-boletos/img-superior-direita.svg" alt="">
    <img class="perfilEdit-inferior" src="../../../Public/imgs/img-listar-boletos/img-inferior-boleto.svg" alt="">
</body>
</html>