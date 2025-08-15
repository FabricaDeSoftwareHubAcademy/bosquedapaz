<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../vendor/autoload.php');

use setasign\Fpdi\Fpdi;
use app\Controller\Boleto;
use app\suport\Csrf;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('Content-Type: application/json');

try {
    if (!isset($_POST['tolkenCsrf']) || !Csrf::validateTolkenCsrf($_POST['tolkenCsrf'])) {
        throw new Exception("Token CSRF inválido.");
    }

    if (!isset($_POST['salvar'])) {
        throw new Exception("Requisição inválida.");
    }

    if (!isset($_FILES['arquivo']) || $_FILES['arquivo']['error'] !== 0) {
        throw new Exception("Nenhum arquivo PDF enviado ou erro no upload.");
    }

    $caminhoPasta = '../Public/uploads/uploads-boletos/';
    if (!is_dir($caminhoPasta)) {
        mkdir($caminhoPasta, 0755, true);
    }

    $camposObrigatorios = ['nome_exp', 'valor_input', 'vencimento_input', 'referencia_input', 'id_expositor'];
    foreach ($camposObrigatorios as $campo) {
        if (empty($_POST[$campo])) {
            throw new Exception("Campo obrigatório: '{$campo}' está vazio.");
        }
    }

    $nomePessoa = $_POST['nome_exp'];
    $nomeLimpo = preg_replace('/[^a-z0-9]/', '_', strtolower(iconv('UTF-8', 'ASCII//TRANSLIT', $nomePessoa)));

    $meses = [
        'janeiro','fevereiro','março','abril','maio','junho',
        'julho','agosto','setembro','outubro','novembro','dezembro'
    ];

    $referenciaOriginal = strtolower($_POST['referencia_input']);
    $vencimentoOriginal = $_POST['vencimento_input'];
    $mesInicialIndex = array_search($referenciaOriginal, $meses);
    if ($mesInicialIndex === false) {
        throw new Exception("Mês de referência inválido.");
    }

    $dataVencimento = DateTime::createFromFormat('Y-m-d', $vencimentoOriginal);
    if (!$dataVencimento) {
        throw new Exception("Data de vencimento inválida.");
    }

    $idExpositor = $_POST['id_expositor'];

    $boletoController = new Boleto();
    $resultado = $boletoController->CapturarEmailExpositor($idExpositor);
    $emailExpositor = $resultado['email'] ?? null;
    if (!$emailExpositor) {
        throw new Exception("E-mail do expositor não encontrado.");
    }

    // === TRATAMENTO DO VALOR ===
    $valorBr = $_POST['valor_input'] ?? '';
    if ($valorBr === '') {
        throw new Exception("Valor não informado.");
    }
    $valorBr = preg_replace('/[^\d,\.]/', '', $valorBr);
    $valorLimpo = str_replace(['.', ','], ['', '.'], $valorBr);
    $valorFloat = (float) $valorLimpo;
    $valorFormatadoBanco = number_format($valorFloat, 2, '.', '');
    if (!is_numeric($valorFormatadoBanco)) {
        throw new Exception("Valor inválido.");
    }
    // ===========================

    $arquivoTmp = $_FILES['arquivo']['tmp_name'];
    $pdfReader = new Fpdi();
    $pageCount = $pdfReader->setSourceFile($arquivoTmp);

    if ($pageCount <= 0) {
        throw new Exception("Arquivo PDF sem páginas válidas.");
    }

    // Limite de páginas
    if ($pageCount > 6) {
        throw new Exception("O PDF não pode ter mais que 6 páginas.");
    }

    $sucesso = true;

    for ($pagina = 1; $pagina <= $pageCount; $pagina++) {
        $mesAtualIndex = ($mesInicialIndex + $pagina - 1) % 12;
        $mesReferencia = $meses[$mesAtualIndex];

        $dataVencimentoClone = clone $dataVencimento;
        $dataVencimentoClone->modify("+" . ($pagina - 1) . " months");
        $vencimento = $dataVencimentoClone->format('Y-m-d');

        $nomeArquivo = "boleto_{$nomeLimpo}_{$mesReferencia}_pagina{$pagina}.pdf";
        $caminhoCompleto = $caminhoPasta . '/' . $nomeArquivo;

        $pdfIndividual = new Fpdi();
        $pdfIndividual->AddPage();
        $pdfIndividual->setSourceFile($arquivoTmp);
        $tplId = $pdfIndividual->importPage($pagina);
        $pdfIndividual->useTemplate($tplId);
        $pdfIndividual->Output('F', $caminhoCompleto);

        $boleto = new Boleto();
        $boleto->valor = $valorFormatadoBanco;
        $boleto->pdf = $nomeArquivo;
        $boleto->mes_referencia = ucfirst($mesReferencia);
        $boleto->vencimento = $vencimento;
        $boleto->id_expositor = $idExpositor;

        if (!$boleto->CadastrarBoletos()) {
            $sucesso = false;
            break;
        }

        try {
            $mail = new PHPMailer(true);
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->Username = 'contatofeirabosquedapaz@gmail.com';
            $mail->Password = 'parw wwmm welz awot';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;

            $mail->setFrom('contatofeirabosquedapaz@gmail.com', 'Feira Bosque da Paz');
            $mail->addAddress($emailExpositor);
            $mail->isHTML(true);
            $mail->Subject = "Novo boleto gerado";

            $urlVisualizarBoletos = "https://feirabosquedapaz.com.br/app/Views/Expositor/listar-boletos.php";

            $mensagem = "
<div style='font-family: \"Segoe UI\", Tahoma, Geneva, Verdana, sans-serif; padding: 25px; background: #ffffff; border: 1px solid #e0e0e0; border-radius: 8px; max-width: 480px; margin: auto; box-shadow: 0 4px 12px rgba(0,0,0,0.05); color: #333333;'>
    <h2 style='color: #FF4612; margin-bottom: 20px; font-weight: 700; font-size: 24px;'>Novo boleto gerado</h2>
    <p style='font-size: 16px; margin-bottom: 12px;'>Olá, <strong>{$nomePessoa}</strong>!</p>
    <p style='font-size: 16px; margin-bottom: 12px;'>Foi gerado um boleto para você referente ao mês de <strong>" . ucfirst($mesReferencia) . "</strong>.</p>
    <p style='font-size: 16px; margin-bottom: 8px;'><strong>Vencimento:</strong> " . date('d/m/Y', strtotime($vencimento)) . "</p>
    <p style='font-size: 16px; margin-bottom: 20px;'><strong>Valor:</strong> R$ " . number_format($valorFloat, 2, ',', '.') . "</p>
    <p style='font-size: 16px;'>Você pode visualizar seu boleto no anexo acima ou clicar no botão abaixo:</p>
    <p style='text-align: center; margin: 25px 0;'>
        <a href='{$urlVisualizarBoletos}' target='_blank' style='display: inline-block; padding: 14px 24px; background-color: #ef233c; color: white; font-size: 18px; font-weight: bold; text-decoration: none; border-radius: 6px;'>Visualizar Boletos</a>
    </p>
    <img src='cid:logoEmpresa' alt='Logo da Empresa' style='max-width: 150px; margin-top: 20px;'>
    <p style='font-size: 12px; color: #888888; text-align: center;'>Feira Bosque da Paz</p>
</div>
";

            $mail->Body = $mensagem;
            $mail->AltBody = strip_tags($mensagem);
            $mail->addAttachment($caminhoCompleto);
            $mail->addEmbeddedImage('../Public/imgs/logo-nova-bosque-da-paz.png', 'logoEmpresa');

            $mail->send();
        } catch (Exception $e) {
            throw new Exception("Erro ao enviar e-mail: " . $mail->ErrorInfo);
        }
    }

    if (!$sucesso) {
        throw new Exception("Erro ao cadastrar boletos.");
    }

    echo json_encode(["status" => "success", "message" => "Boletos cadastrados com sucesso!"]);
    exit;
} catch (Exception $e) {
    echo json_encode([
        "status" => "error",
        "message" => $e->getMessage()
    ]);
    exit;
}