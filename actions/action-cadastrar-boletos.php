<?php
require_once('../vendor/autoload.php');

use app\Controller\Boleto;

// Configurar o cabeçalho da resposta
header('Content-Type: application/json');

// Verifica se a requisição é POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'status' => 'error',
        'message' => 'Método não permitido.'
    ]);
    exit;
}

// Função para limpar os dados e evitar XSS
function limpar($valor) {
    return htmlspecialchars(trim($valor), ENT_QUOTES, 'UTF-8');
}

// Coleta e limpa os dados recebidos
$id_expositor = isset($_POST['id_expositor']) ? (int) $_POST['id_expositor'] : null;
$mes_referencia = isset($_POST['mes_referencia']) ? limpar($_POST['mes_referencia']) : null;
$vencimento = isset($_POST['vencimento']) ? limpar($_POST['vencimento']) : null;
$valor = isset($_POST['valor']) ? (float) str_replace(',', '.', $_POST['valor']) : null;
$pdf = isset($_FILES['pdf']) ? $_FILES['pdf'] : null;

// Verifica se todos os campos obrigatórios foram preenchidos
if (!$id_expositor || !$mes_referencia || !$vencimento || !$valor || !$pdf) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Preencha todos os campos obrigatórios.'
    ]);
    exit;
}

// Valida o tipo de arquivo
$extensao = strtolower(pathinfo($pdf['name'], PATHINFO_EXTENSION));
$permitidos = ['pdf'];

if (!in_array($extensao, $permitidos)) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Apenas arquivos PDF são permitidos.'
    ]);
    exit;
}

// Cria um nome único para o arquivo e move para a pasta desejada
$nomeArquivo = uniqid('boleto_', true) . '.' . $extensao;
$caminho = '../uploads/boletos/' . $nomeArquivo;

if (!move_uploaded_file($pdf['tmp_name'], $caminho)) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Falha ao salvar o arquivo PDF.'
    ]);
    exit;
}

// Cadastra o boleto
$boleto = new Boleto();
$boleto->id_expositor = $id_expositor;
$boleto->mes_referencia = $mes_referencia;
$boleto->vencimento = $vencimento;
$boleto->valor = $valor;
$boleto->pdf = $nomeArquivo;

$resultado = $boleto->CadastrarBoletos();

if ($resultado) {
    echo json_encode([
        'status' => 'success',
        'message' => 'Boleto cadastrado com sucesso.'
    ]);
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Erro ao cadastrar o boleto.'
    ]);
}
