<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Edital</title>
    <link rel="stylesheet" href="../../css/style-edital.css">
</head>
<body>

<?php include "../../assets/home/menu-home-client.html"; ?>

    <div class="edital-container">
        <div class="imagem-container">
            <img src="../../imgs/img-edital/image7.png" alt="Imagem do Edital">
            <div class="texto">
                <h1>Bosque da Paz</h1>
                <h2>Edital</h2>
            </div>
        </div>

        <div class="descricao-container">
            <p>
                Prestadores de serviço que buscam um local para mostrar seu trabalho e aumentar sua cartela de clientes (Networking), também podem participar da feira! Tanto para atendê-los no local, quanto para atraí-los para atendimentos futuros. Lembre-se, porém, que o foco da feira é em pequenos empreendedores locais e que seu negócio deve se enquadrar às diretrizes da Feira Bosque da Paz. Os valores são diferenciados. Maiores informações pelo WhatsApp <strong>(67) 9 9955-0017.</strong>
            </p>
        </div>

        <div class="regras-container">
            <h1 class="termos">Termos de Condições</h1>
            <p><strong>1.0:</strong> O preenchimento desta ficha não garante a participação da feira, pois será feita uma curadoria (seleção) dos trabalhos que estejam de acordo com a proposta da Feira Bosque da Paz. Entraremos em contato com os selecionados por WhatsApp e passaremos todas as informações.</p>
            <p><strong>1.1:</strong> Cada expositor é responsável pela sua estrutura, organização do seu espaço, venda e recebimento de seus produtos. (exceto gastronomia).</p>
            <p><strong>1.2:</strong> Cada expositor é também responsável pelo recolhimento do LIXO gerado pela sua banca e pelos seus clientes.</p>
            <p><strong>1.3:</strong> A organização e localização dos expositores será feita de maneira antecipada e comunicada previamente. Será fornecido um mapeamento de localização.</p>
            <p><strong>1.4:</strong> Uso de energia apenas para expositores da gastronomia que comprovarem a necessidade.</p>
            <p><strong>1.5:</strong> O espaço de cada expositor é de 3x3m e não poderá passar disso (salvo foodtrucks e barracas de alimentação feitas na hora, mais informações no fim da ficha).</p>
            <p><strong>1.6:</strong> Bebidas (água, suco, refrigerante, cerveja), só podem ser vendidos pelos expositores da gastronomia. É expressamente proibida a venda de bebidas por outras barracas na feira. Não aceitamos inscrições para "bar".</p>
            <p><strong>1.7:</strong> A Feira Bosque da Paz trabalha com mensalidade, tendo uma taxa a ser paga todos os meses, mesmo que o expositor eventualmente não possa comparecer em determinada edição.</p>
            <p><strong>1.8:</strong> Foodtrucks e barracas de alimentação é necessário indicar na ficha a medida EXATA do trailer e/ou barraca, incluindo rabichos e carretinhas. Inscrições sem as medidas mencionadas serão desconsideradas.</p>
            <p><strong>1.9:</strong> A taxa será recolhida por PIX. Após a curadoria entraremos em contato com os selecionados por WhatsApp e passaremos as informações referentes ao pagamento e funcionamento da feira.</p>
            <p><strong>2.0:</strong> Expositores selecionados não poderão, em hipótese alguma, expor produtos que não foram inscritos, nem dividir espaço com expositor não selecionado.</p>
            <p><strong>2.1:</strong> Pensando na organização geral da feira, é expressamente proibida a desmontagem do espaço antes do horário de término do evento.</p>
        </div>

        <div class="termos-container">
            <label for="termos">
                <input type="checkbox" id="termos"> Li e aceito os termos de condições
            </label>
            <div class="botoes-container">
                <button class="btn aceitar" id="aceitar">Aceitar Termos</button>
                <button class="btn voltar" id="voltar">Voltar</button>
            </div>
        </div>
    </div>

    <div id="modal" class="modal">
        <div class="modal-content">
            <h2>Deseja aceitar os termos?</h2>
            <div class="modal-buttons">
                <button id="btnAceitarModal" class="btn aceitar">Aceitar</button>
                <button id="btnRecusarModal" class="btn recusar">Recusar</button>
            </div>
        </div>
    </div>

    <script src="../JS/modal.js"></script>
    <script src="../JS/checkbox.js"></script>
    <script src="../JS/main.js"></script>
</body>
</html>