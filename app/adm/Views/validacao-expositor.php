<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Validação de Expositor</title>
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-validacao-expositor.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
</head>

<body class="body-vexp">
    <?php include "../../../Public/assets/adm/menu-adm.html" ?>
    <div class="index-container-vexp">

        <section class="secao-expositor-vexp">
            <div class="area-logomarca-vexp">
                <h1 class="texto-logomarca-vexp">Logo da Empresa</h1>
                <img src="../../../Public/imgs/img-validacao-expositor/logomarca.png" alt="logomarca" class="logomarca-imagem-vexp">
            </div>
            <div class="area-produtos-vexp">
                <h1 class="texto-produtos-vexp">Produtos</h1>
                <div class="imagens-produtos-vexp">
                    <img src="../../../Public/imgs/img-validacao-expositor/foto-marca-1.jpeg" alt="" class="produto1">
                    <img src="../../../Public/imgs/img-validacao-expositor/foto-marca-2.jpeg" alt="" class="produto2">
                    <img src="../../../Public/imgs/img-validacao-expositor/foto-marca-3.jpeg" alt="" class="produto3">
                    <img src="../../../Public/imgs/img-validacao-expositor/foto-marca-4.jpeg" alt="" class="produto4">
                    <img src="../../../Public/imgs/img-validacao-expositor/foto-marca-5.jpeg" alt="" class="produto5">
                    <img src="../../../Public/imgs/img-validacao-expositor/foto-marca-6.jpeg" alt="" class="produto6">
                </div>
            </div>
        </section>

        <section class="secao-informacoes-vexp">
            <h1 class="texto-informacoes-vexp">Informações do Expositor</h1>
            <form class="formulario-informacoes-vexp">
                <div class="grid-container-vexp">

                    <div class="input-group-vexp">
                        <label for="nome-expositor">Nome</label>
                        <input type="text" name="nome_expositor" id="nome-expositor" placeholder="Mariana Quintana Debortelli" disabled>
                    </div>

                    <div class="input-group-vexp">
                        <label for="nome-marca">Marca</label>
                        <input type="text" name="nome_marca" id="nome-marca" placeholder="Play Artesanato" disabled>
                    </div>

                    <div class="input-group-vexp">
                        <label for="email-expositor">Email</label>
                        <input type="email" name="email_expositor" id="email-expositor" placeholder="mariana@hotmail.com" disabled>
                    </div>

                    <div class="input-group-vexp">
                        <label for="whatsapp-expositor">Tipo</label>
                        <input type="text" name="whatsapp_expositor" id="whatsapp-expositor" placeholder="Barraca" disabled>
                    </div>

                    <div class="input-group-vexp">
                        <label for="categoria-expositor">Whatsapp</label>
                        <input type="text" name="categoria_expositor" id="categoria-expositor" placeholder="67 99956-6551" disabled>
                    </div>

                    <div class="input-group-vexp">
                        <label for="cnpj-expositor">Energia</label>
                        <input type="text" name="cnpj_expositor" id="cnpj-expositor" placeholder="Sim" disabled>
                    </div>

                    <div class="input-group-vexp">
                        <label for="nome-marca">CPF</label>
                        <input type="text" name="nome_marca" id="nome-marca" placeholder="831.591.143-31" disabled>
                    </div>

                    <div class="input-group-vexp">
                        <label for="cnpj-expositor">Voltagem</label>
                        <input type="text" name="cnpj_expositor" id="cnpj-expositor" placeholder="220v" disabled>
                    </div>

                    <div class="input-group-vexp">
                        <label for="nome-marca">Cidade</label>
                        <input type="text" name="nome_marca" id="nome-marca" placeholder="Campo Grande - MS" disabled>
                    </div>

                    <div class="input-group-vexp">
                        <label for="nome-marca">Endereço</label>
                        <input type="text" name="nome_marca" id="nome-marca" placeholder="Afonso Pena N° 1332" disabled>
                    </div>

                    <div class="input-group-vexp">
                        <label for="instagram-expositor">Instagram</label>
                        <div style="position: relative;">
                            <input type="text" name="instagram_expositor" id="instagram-expositor" value="Clique aqui" disabled>
                            <a href="https://instagram.com/playartesanato" target="_blank" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; text-decoration: none; color: black;"></a>
                        </div>
                    </div>

                    <div class="input-group-vexp">
                        <label for="nome-marca">Categoria</label>
                        <input type="text" name="nome_marca" id="nome-marca" placeholder="Artesanato" disabled>
                        <a href="#trocar-categoria-vexp">Alterar categoria</a>
                    </div>
                </div>
            </form>

            <div class="area-botoes-vexp">
                <a href="#modal-recusar-vexp"><button class="botao-recusar-vexp">Recusar</button></a>
                <a href="#modal-validar-vexp"><button class="botao-validar-vexp">Validar</button></a>
            </div>
        </section>
    </div>

    <!-- modal para recusar expositor -->
    <div class="acao-recusar-vexp" id="modal-recusar-vexp">
        <div class="acao-content-recusar-vexp">
            <h1 class="acao-texto-recusar-vexp">Deseja recusar o expositor?</h1>
            <div class="acao-botoes-recusar-vexp">
                <a href=""><button class="botao-cancelar-vexp">Cancelar</button></a>
                <a href="#recusado-sucesso-vexp"><button class="botao-confirmar-vexp">Confirmar</button></a>
            </div>
        </div>
    </div>

    

    <!-- recusado com sucesso -->
    <div class="mensagem-recusar-vexp" id="recusado-sucesso-vexp">
        <div class="mensagem-content-recusar-vexp">
            <h1 class="mensagem-texto-recusar-vexp">Expositor recusado.</h1>
            <a href="#"><button class="botao-confirmar-vexp">Confirmar</button></a>
        </div>
    </div>

    <!-- modal para validar expositor -->
    <div class="acao-validar-vexp" id="modal-validar-vexp">
        <div class="acao-content-validar-vexp">
            <h1 class="acao-texto-validar-vexp">Preencha os dados do novo expositor.</h1>
            <div class="acoes-container-validar-vexp">
                <div class="acao-numeroBarraca-vexp">
                    <label>Número da Barraca</label>
                    <input type="text" name="numero_barraca" id="numero-barraca" placeholder="000">
                </div>
                <div class="acao-corRua-vexp">
                    <label>Cor da Rua</label>
                    <select name="cor_rua" id="cor-rua">
                        <option value="vazio"></option>
                        <option value="amarela">Amarela</option>
                        <option value="laranja">Laranja</option>
                        <option value="roxa">Roxa</option>
                        <option value="verde">Verde</option>
                    </select>
                </div>
            </div>
            <div class="acao-botoes-validar-vexp">
                <a href=""><button class="botao-cancelar-vexp">Cancelar</button></a>
                <a href="#validacao-sucesso-vexp"><button class="botao-confirmar-vexp">Confirmar</button></a>
            </div>
        </div>
    </div>

    <!-- validado com sucesso -->
    <div class="mensagem-validar-vexp" id="validacao-sucesso-vexp">
        <div class="mensagem-content-validar-vexp">
            <h1 class="mensagem-texto-validar-vexp">Expositor validado!</h1>
            <a href="#"><button class="botao-confirmar-vexp">Confirmar</button></a>
        </div>
    </div>

    <!-- modal trocar categoria -->
    <div class="trocar-categoria-vexp" id="trocar-categoria-vexp">
        <div class="trocar-categoria-content-vexp">
            <h1 class="trocar-categoria-texto-vexp">Defina a Categoria</h1>
            <div class="trocar-categoria-acoes-vexp">
                <div class="trocar-categoria-acao-vexp">
                    <label>Categoria</label>
                    <select name="categoria" id="categoria-vexp">
                        <option value="artesanato">Artesanato</option>
                        <option value="antiguidade">Antiguidade</option>
                        <option value="colecionismo">Colecionismo</option>
                        <option value="comestologia">Comestologia</option>
                        <option value="gastronomia">Gastronomia</option>
                        <option value="literatura">Literatura</option>
                        <option value="moda-autoral">Moda Autoral</option>
                        <option value="plantas">Plantas</option>
                        <option value="sustentabilidades">Sustentabilidade</option>
                    </select>
                </div>
            </div>
            <div class="trocar-categoria-botoes-vexp">
                <a href="#"><button class="botao-cancelar-vexp">Cancelar</button></a>
                <a href="#trocar-categoria-sucesso-vexp"><button class="botao-confirmar-vexp">Confirmar</button></a>
            </div>
        </div>
    </div>

    <!-- modal trocar categoria sucesso -->
    <div class="sucesso-trocar-categoria-vexp" id="trocar-categoria-sucesso-vexp">
        <div class="trocar-sucesso-content-vexp">
            <h1 class="trocar-sucesso-texto-vexp">Categoria alterada.</h1>
            <a href="#"><button class="botao-confirmar-vexp">Confirmar</button></a>
        </div>
    </div>

    <div class="decoracoes-vexp">
        <a href="gerenciar-relatorios.php">
            <img src="../../../Public/imgs/img-validacao-expositor/voltar.svg" alt="setaVoltar" class="botao-voltar-vexp">
        </a>
        <img src="../../../Public/imgs/img-validacao-expositor/detalhe1.svg" alt="" class="decoracao1-vexp">
        <img src="../../../Public/imgs/img-validacao-expositor/detalhe2.svg" alt="" class="decoracao2-vexp">
        <img src="../../../Public/imgs/img-validacao-expositor/detalhe3.svg" alt="" class="decoracao3-vexp">
    </div>

    <script src="../../../Public/js/js-menu/js-menu.js"></script>
</body>

</html>