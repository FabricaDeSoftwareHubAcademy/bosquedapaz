<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adm - Bosque da Paz</title>
    <script src="../../../Public/js/js-menu/js-menu.js"></script>
    <script src="../../../Public/js/js-adm/js-editar-adm.js"></script>
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-editar-adm.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />   
</head>
<body>
    <?php include "../../../Public/assets/adm/menu-adm.html"?>
    <div class="sandwich-menu" onclick="mostrarMenu()">
            <img src="../../../Public/imgs/Proximos-Eventos-img/menu.png" alt="menu" class="menu">
        </div>

    <main class="principal">
        <div class="box">
            <h2>Editar ADM</h2>

            <div class="foto-container">
                <input type="file" id="uploadFoto" accept="image/*" onchange="previewImagem()">
                <label for="uploadFoto">
                    <img id="previewFoto" src="../../../Public/imgs/img-editar-adm/MOCA.png" alt="Foto do Administrador">
                    <div class="icone-editar">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </div>
                </label>
            </div>

            <div class="form-box">
                <form action="" method="post">
                    <div id="form1">
                        <div class="input-container">
                            <div class="input-row">
                                <div class="input-group">
                                    <label>Nome:</label>
                                    <input type="text" name="nome" id="nome" placeholder="Digite seu nome completo" required>
                                </div>                   
                                <div class="input-group">
                                    <label>Telefone:</label>
                                    <input type="number" name="telefone" id="telefone" placeholder="Digite o seu número de telefone" required>
                                </div>
                            </div>
                        <div class="input-row">
                                <div class="input-group">
                                    <label>E-mail:</label>
                                    <input type="email" name="email" id="email"  placeholder="Digite o seu e-mail" required>
                                </div> 
                            <div class="input-group">
                                <label>Profissão:</label>
                                <input type="text" name="profissao" id="profissao" placeholder="Digite a sua profissão" required>
                            </div>       
                        </div>
                 </div>
            </div>    
            </form> 
        </div>    
            <div class="btns">
                        <a href="listar-adm.php" class="voltar">
                            <img src="../../../Public/imgs/img-editar-adm/btn-voltar.png" alt="Botão de voltar" class="btn-voltar">
                        </a>
                        <div class="btn-cancelar-salvar">
                            <button type="button" class="btn btn-cancelar">
                                <a href="./Area-Adm.php">Cancelar</a>
                            </button>
        
                            <button type="submit" class="btn btn-salvar">
                                <a href="">Salvar</a>
                        </div>
                    </div>        
                      
            
        </div>
    </main>
    <div class="bolas-fundo">
        <img src="../../../Public/imgs/img-editar-adm/Elemento1.FolhaAzul.png" alt="FolhaAzul" class="folhaAzul1-yan">
        <img src="../../../Public/imgs/img-editar-adm/Elemento2.FolhaAzul.png" alt="FolhaAzul2" class="folhaAzul2-yan">
        <img src="../../../Public/imgs/img-editar-adm/Elemento3.ElipseAzul.png" alt="FolhaRosa" class="folhaRosa-yan">
    </div>
</body>
</html>