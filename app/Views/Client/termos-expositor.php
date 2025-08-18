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
                    É importante ler os termos de condições abaixo para participar da feira bosque da paz. Nele está descrito todas as obrigações que um feirante da feira deve comprir.
                </p>
            </div>
            <div class="regras-container">
                <h1 class="title-intro dark"><strong>A TODOS OS EXPOSITORES</strong></h1>
                <p class="lin-term dark"><strong class="cont-lin dark">1.0:</strong> O preenchimento desta ficha não garante a participação na feira, pois será realizada uma curadoria (seleção) dos trabalhos que estejam de acordo com a proposta da Feira Bosque da Paz. Entraremos em contato com os selecionados por WhatsApp e forneceremos todas as informações necessárias.</p>
                <p class="lin-term dark"><strong class="cont-lin dark">1.1:</strong> Cada expositor é responsável pela sua estrutura, organização do seu espaço, venda e recebimento de seus produtos, exceto no caso de expositores da gastronomia.</p>
                <p class="lin-term dark"><strong class="cont-lin dark">1.2:</strong> Cada expositor é responsável pelo recolhimento do lixo gerado pela sua banca e pelos seus clientes.</p>
                <p class="lin-term dark"><strong class="cont-lin dark">1.3:</strong> A organização e localização dos expositores será feita de maneira antecipada e comunicada previamente. Será fornecido um mapeamento de localização.</p>
                <p class="lin-term dark"><strong class="cont-lin dark">1.4:</strong> O uso de energia é permitido apenas para expositores da gastronomia que comprovarem a necessidade.</p>
                <p class="lin-term dark"><strong class="cont-lin dark">1.5:</strong> O espaço de cada expositor é de 3x3m e não poderá ultrapassar essa medida, salvo para foodtrucks e barracas de alimentação feitas na hora. Mais informações estão disponíveis no fim da ficha.</p>
                <p class="lin-term dark"><strong class="cont-lin dark">1.6:</strong> Bebidas (água, suco, refrigerante, cerveja) só podem ser vendidas pelos expositores da gastronomia. É expressamente proibida a venda de bebidas por outras barracas na feira. Não aceitamos inscrições para "bar".</p>
                <p class="lin-term dark"><strong class="cont-lin dark">1.7:</strong> A Feira Bosque da Paz trabalha com mensalidade, tendo uma taxa a ser paga todos os meses, mesmo que o expositor eventualmente não possa comparecer a determinada edição.</p>
                <p class="lin-term dark"><strong class="cont-lin dark">1.8:</strong> Para foodtrucks e barracas de alimentação, é necessário indicar na ficha a medida exata do trailer e/ou barraca, incluindo rabichos e carretinhas. Inscrições sem as medidas mencionadas serão desconsideradas.</p>
                <p class="lin-term dark"><strong class="cont-lin dark">1.9:</strong> A taxa será recolhida por PIX. Após a curadoria, entraremos em contato com os selecionados por WhatsApp e forneceremos as informações referentes ao pagamento e funcionamento da feira.</p>
                <p class="lin-term dark"><strong class="cont-lin dark">2.0:</strong> Expositores selecionados não poderão, em hipótese alguma, expor produtos que não foram inscritos, nem dividir espaço com expositores não selecionados.</p>
                <p class="lin-term dark"><strong class="cont-lin dark">2.1:</strong> Pensando na organização geral da feira, é expressamente proibida a desmontagem do espaço antes do horário de término do evento.</p>

                <h1 class="title-intro dark"><strong>LGPD (Lei Geral de Proteção de Dados)</strong></h1>
                <p class="lin-term dark"><strong class="cont-lin dark">2.2:</strong> O expositor concorda e consente com a coleta, armazenamento e tratamento de seus dados pessoais cadastrais, conforme previsto na LGPD, exclusivamente para fins de: cadastro e seleção dos expositores; comunicação institucional; processos administrativos e financeiros da feira; cumprimento de obrigações legais.</p>
                <p class="lin-term dark"><strong class="cont-lin dark">2.3:</strong> A organização poderá coletar e tratar os seguintes dados pessoais: dados cadastrais (nome completo, CPF, RG, endereço, telefone, e-mail); dados bancários para pagamentos; imagens (fotografias e vídeos) captadas durante o evento.</p>
                <p class="lin-term dark"><strong class="cont-lin dark">2.4:</strong> Os dados coletados poderão ser compartilhados exclusivamente com: órgãos governamentais quando exigido por lei; prestadores de serviços essenciais para a realização da feira (ex: empresa de segurança, processadora de pagamentos); patrocinadores e apoiadores institucionais da feira.</p>
                <p class="lin-term dark"><strong class="cont-lin dark">2.5:</strong> O expositor tem direito a: acessar seus dados pessoais; solicitar a correção de dados incompletos, inexatos ou desatualizados; solicitar a anonimização, bloqueio ou eliminação de dados desnecessários ou excessivos; revogar o consentimento a qualquer momento, mediante manifestação expressa.</p>
                <p class="lin-term dark"><strong class="cont-lin dark">2.6:</strong> A organização se compromete a adotar medidas de segurança técnicas e administrativas para proteção dos dados pessoais coletados.</p>
                <p class="lin-term dark"><strong class="cont-lin dark">2.7:</strong> Os dados pessoais serão armazenados pelo período necessário para cumprimento das finalidades descritas, exceto quando houver obrigação legal de mantê-los por prazo superior.</p>
                <p class="lin-term dark"><strong class="cont-lin dark">2.8:</strong> Para exercer seus direitos ou esclarecer dúvidas sobre proteção de dados, o expositor poderá entrar em contato com o Encarregado da Feira Bosque da Paz através do e-mail: contatofeirabosquedapaz@gmail.com</p>
                <p class="lin-term dark"><strong class="cont-lin dark">2.9:</strong> Ao preencher o formulário de inscrição e participar da feira, o expositor declara estar ciente e de acordo com todos os termos aqui estabelecidos, incluindo especialmente as disposições sobre proteção de dados pessoais.</p>

            </div>

            <form action="../../../actions/action-termos.php" method="post" class="form-aceitar-edital">

                <!-- arquivo de destino -->
                <input type="hidden" name="destino" value="../app/Views/Client/cadastro-expositor-client.php">

                <!-- arquivo de origem -->
                <input type="hidden" name="origem" value="../app/Views/Client/termos-expositor.php">

                <div class="div-input-check">
                    <input type="checkbox" value="Sim" name="termos" id="termos" class="input-check">
                    <label for="termos" class="label-edital dark">Aceito os termos de condições acima.</label>
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