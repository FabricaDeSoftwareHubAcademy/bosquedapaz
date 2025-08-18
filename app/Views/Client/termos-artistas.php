<?php session_start();
include_once('../../helpers/csrf.php');
$tolken = getTolkenCsrf();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../Public/css/css-home/style-termos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <title>Bosque da Paz</title>
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
</head>

<body>
    <?php include "../../../Public/include/home/menu-home.html"; ?>

    <main class="content-principal">
        <section class="section-edital">
            <div class="avisos-edital">
                <h1 class="title-edital"><strong>Termos de Condições</strong></h1>
                <p class="text-ler dark">
                    É importante ler os termos de condições abaixo para participar da feira bosque da paz. Nele está descrito todas as obrigações que um artista da feira deve comprir.
                </p>
            </div>
            <div class="regras-container">
                <h1 class="title-intro dark"><strong>A TODOS OS ARTISTAS</strong></h1>
                <p class="lin-term dark"><strong class="cont-lin dark">1.0:</strong> O preenchimento deste formulário não garante a participação no evento, pois será realizada uma curadoria (seleção) dos trabalhos que estejam de acordo com a proposta artística da Feira Bosque da Paz. Entraremos em contato com os selecionados por WhatsApp e forneceremos todas as informações necessárias.</p>
                <p class="lin-term dark"><strong class="cont-lin dark">1.1:</strong> Cada artista é responsável pela sua estrutura e organização do seu espaço de apresentação.</p>
                <p class="lin-term dark"><strong class="cont-lin dark">1.2:</strong> Cada artista é responsável pelo recolhimento do lixo gerado durante sua apresentação.</p>
                <p class="lin-term dark"><strong class="cont-lin dark">1.3:</strong> A organização e localização dos espaços de apresentação será feita de maneira antecipada e comunicada previamente. Será fornecido um mapeamento de localização.</p>
                <p class="lin-term dark"><strong class="cont-lin dark">1.4:</strong> Uso de energia elétrica deverá ser solicitado previamente com comprovação de necessidade técnica.</p>
                <p class="lin-term dark"><strong class="cont-lin dark">1.5:</strong> O espaço para cada apresentação artística será definido pela curadoria conforme as necessidades específicas de cada proposta.

                <h1 class="title-intro dark"><strong>LGPD (Lei Geral de Proteção de Dados)</strong></h1>
                <p class="lin-term dark"><strong class="cont-lin dark">2.0:</strong> O artista concorda e consente com a coleta, armazenamento e tratamento de seus dados pessoais cadastrais, conforme previsto na LGPD, exclusivamente para fins de: cadastro e seleção dos artistas; comunicação institucional; processos administrativos e financeiros da feira; cumprimento de obrigações legais.</p>
                <p class="lin-term dark"><strong class="cont-lin dark">2.1:</strong> A organização poderá coletar e tratar os seguintes dados pessoais: dados cadastrais (nome completo, CPF, RG, endereço, telefone, e-mail); dados bancários para pagamentos; imagens (fotografias e vídeos) captadas durante o evento.</p>
                <p class="lin-term dark"><strong class="cont-lin dark">2.2:</strong> A organização se compromete a adotar medidas de segurança técnicas e administrativas para proteção dos dados pessoais coletados.</p>
                <p class="lin-term dark"><strong class="cont-lin dark">2.3:</strong> Os dados pessoais serão armazenados pelo período necessário para cumprimento das finalidades descritas, exceto quando houver obrigação legal de mantê-los por prazo superior.</p>
                <p class="lin-term dark"><strong class="cont-lin dark">2.4:</strong> Para exercer seus direitos ou esclarecer dúvidas sobre proteção de dados, o artista poderá entrar em contato com o Encarregado da Feira Bosque da Paz através do e-mail: contatofeirabosquedapaz@gmail.com</p>
                <p class="lin-term dark"><strong class="cont-lin dark">2.5:</strong> Ao preencher o formulário de inscrição e participar da feira, o artista declara estar ciente e de acordo com todos os termos aqui estabelecidos, incluindo especialmente as disposições sobre proteção de dados pessoais.</p>
            </div>

            <form action="../../../actions/action-termos.php" method="post" class="form-aceitar-edital">

                <!-- arquivo de destino -->
                <input type="hidden" name="destino" value="../app/Views/Client/cadastro-artista.php">

                <!-- arquivo de origem -->
                <input type="hidden" name="origem" value="../app/Views/Client/termos-artistas.php">

                <div class="div-input-check">
                    <input type="checkbox" value="Sim" name="termos" id="termos" class="input-check">
                    <label for="aceito" class="label-edital dark">Aceito os termos das condições acima.</label>
                </div>
                <div class="btns">
                    <a href="escolher-cadastro.php" class="btn-edital link-edital">Cancelar</a>
                    <button type="submit" name="botao-continuar" class="btn-edital btn-edital-conti">Continuar</button>
                </div>

                <div id="modal-erro" class="modal-erro" style="display: none;">
                    <div class="modal-conteudo">
                        <span class="fechar-modal">&times;</span>
                        <p>Você deve aceitar os termos antes de continuar.</p>
                    </div>
                </div>

                <?php echo $tolken; ?>

            </form>

        </section>
    </main>

    <!-- <script src="../../../Public/js/js-home/main.js" defer></script> -->
    <script src="../../../Public/js/js-home/checkbox-termos.js" defer></script>
</body>

</html>