<?php
include_once('../../helpers/csrf.php');
$tolken = getTolkenCsrf();
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bosque da Paz</title>
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-cadastrar-expositor.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
</head>

<body onload="getCategorias()">
    <?php include "../../../Public/include/menu-adm.html" ?>


    <main class="principal">

        <div class="box">
            <div class="title">
                <h1 class="title-text">CADASTRO DE EXPOSITOR</h1>
            </div>

            <form id="fomulario_cad_expositor" class="fomulario_cad_expositor" method="POST">

                <input type="hidden" name="aceitou_termos" value="Sim">

                <div class="contenier_inputs">
                    <div class="content_inputs">
                        <div class="content_input">
                            <label class="label_input">Nome Completo:</label>
                            <input type="text" class="input_dados" name="nome" id="nome" placeholder="Digite seu nome completo" required>
                        </div>
                        
                        <div class="content_input">
                            <label class="label_input">CPF:</label>
                            <input type="text" class="input_dados" name="cpf" id="cpf" placeholder="Digite seu CPF" required>
                        </div>

                        
                        <div class="content_input">
                            <label class="label_input">E-mail:</label>
                            <input type="text" class="input_dados" name="email" id="email" placeholder="Digite seu e-mail" required>
                        </div>
                        
                        <div class="content_input">
                            <label class="label_input">Whatsapp:</label>
                            <input type="tel" class="input_dados" name="whats" id="whats" placeholder="Número de whatsapp" required>
                        </div>
                        
                    </div>

                    <div class="content_inputs">

                        <div class="content_input">
                            <label class="label_input">Marca:</label>
                            <input type="text" class="input_dados" name="marca" id="marca" placeholder="Digite a marca " required>
                        </div>
                        
                        <div class="content_input">
                            <label class="label_input">Usuário do instagram:</label>
                            <input type="text" class="input_dados" name="link_instagram" id="link_instagram" placeholder="Usuário do instagram" required>
                        </div>
                        
                        <div class="content_input">
                            <label for="optionInput3" class="label_input">Categorias</label>
                            <select name="id_categoria" class="input_dados" id="categorias"  required>
                                <!-- OPTIONS GERADOS PELO JS -->
                            </select>
                        </div>

                        <div class="content_input">
                            <label class="label_input">Qual Cidade Reside:</label>
                            <select name="cidade" class="input_dados" id="cidade" required>
                                <option value="">Selecione</option>
                                <option value="Campo Grande">Campo Grande</option>
                                <option value="Dourados">Dourados</option>
                                <option value="Três Lagoas">Três Lagoas</option>
                                <option value="Corumbá">Corumbá</option>
                                <option value="Ponta Porã">Ponta Porã</option>
                                <option value="Naviraí">Naviraí</option>
                                <option value="Sidrolândia">Sidrolândia</option>
                                <option value="Nova Andradina">Nova Andradina</option>
                                <option value="Aquidauana">Aquidauana</option>
                                <option value="Maracaju">Maracaju</option>
                                <option value="Paranaíba">Paranaíba</option>
                                <option value="Rio Brilhante">Rio Brilhante</option>
                                <option value="Chapadão do Sul">Chapadão do Sul</option>
                                <option value="Coxim">Coxim</option>
                                <option value="Amambai">Amambai</option>
                            </select>
                        </div>

                    </div>

                    <div class="content_inputs">
                        <div id="tipo_expo" class="content_input">
                            <label id="expo_label" class="label_input" for="tipo-expo">Tipo de exposição:</label>
                            <select name="tipo" class="input_dados" id="tipo_expo">
                                <option value="">Selecione</option>
                                <option value="trailer">Trailer</option>
                                <option value="food-truck">Food truck</option>
                                <option value="barraca">Barraca</option>
                            </select>
                        </div>

                        <div class="content_input">
                            <label id="energia_label" class="label_input" for="energia">Precisa de energia?</label>
                            <select name="energia" id="energia" class="input_dados">
                                <option value="nao">Não</option>
                                <option value="sim">Sim</option>
                            </select>
                        </div>

                        <div class="content_input">
                            <label id="volt_label" class="label_input" for="equipamentos">Voltagens dos equipamentos</label>
                            <select name="voltagem" id="voltagem" class="input_dados">
                                <option value="">selecione</option>
                                <option value="110v">110v</option>
                                <option value="220v">220v</option>
                            </select>
                        </div>

                        <div class="div_alinhamento">
                        </div>

                    </div>

                </div>

                <?php echo $tolken; ?>

                <h2 class="title">Selecione 6 fotos do seu produto para análise:</h2>

                <div class="conteiner_fotos">
                    <div class="content_img">
                        <label class="area_input_foto">
                            <input type="file" class="input_img" name="img1" accept="image/jpeg, image/png, image/jpg">
                            <i class="bi bi-upload icon-uploads"></i>
                            <img src="" id="img1" class="img_produto">
                        </label>
                    </div>
                    <div class="content_img">
                        <label class="area_input_foto">
                            <input type="file" class="input_img" name="img2" accept="image/jpeg, image/png, image/jpg">
                            <i class="bi bi-upload icon-uploads"></i>
                            <img src="" id="img2" class="img_produto">
                        </label>
                    </div>
                    <div class="content_img">
                        <label class="area_input_foto">
                            <input type="file" class="input_img" name="img3" accept="image/jpeg, image/png, image/jpg">
                            <i class="bi bi-upload icon-uploads"></i>
                            <img src="" id="img3" class="img_produto">
                        </label>
                    </div>
                    <div class="content_img">
                        <label class="area_input_foto">
                            <input type="file" class="input_img" name="img4" accept="image/jpeg, image/png, image/jpg">
                            <i class="bi bi-upload icon-uploads"></i>
                            <img src="" id="img4" class="img_produto">
                        </label>
                    </div>
                    <div class="content_img">
                        <label class="area_input_foto">
                            <input type="file" class="input_img" name="img5" accept="image/jpeg, image/png, image/jpg">
                            <i class="bi bi-upload icon-uploads"></i>
                            <img src="" id="img5" class="img_produto">
                        </label>
                    </div>
                    <div class="content_img">
                        <label class="area_input_foto">
                            <input type="file" class="input_img" name="img6" accept="image/jpeg, image/png, image/jpg">
                            <i class="bi bi-upload icon-uploads"></i>
                            <img src="" id="img6" class="img_produto">
                        </label>
                    </div>
                </div>


                <?php include '../../../Public/include/Butons-forms.html'; ?>

            </form>

            <?php include "../../../Public/include/modais/modal-confirmar.html"; ?>
            <?php include "../../../Public/include/modais/modal-sucesso.html"; ?>
            <?php include "../../../Public/include/modais/modal-error.html"; ?>

        </div>
        <div class="bolas_fundo">
    
            <img src="../../../Public/assets/img-bolas/bola-verde1.png" alt="Bola Fundo 1" class="bola-verde1">
            <img src="../../../Public/assets/img-bolas/bola-verde2.png" alt="Bola Fundo 2" class="bola-verde2">
        </div>
    </main>


    <script src="../../../Public/js/js-adm/js-cadastrar-expositor.js" defer></script>
    <script src="../../../Public/js/js-adm/varifica_login_adm.js"></script>
    <script src="../../../Public/js/js-menu/js-menu.js"></script>

</body>

</html>