<?php
require_once('../vendor/autoload.php');
use app\Controller\Boleto;
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfParser\StreamReader;

$caminhoPasta = '../Public/uploads/uploads-boletos';

if (isset($_POST['botao-cadastrar'])) {
    if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] == 0) {

        if (!is_dir($caminhoPasta)) {
            mkdir($caminhoPasta, 0755, true);
        }

        $nomePessoa = $_POST['nome_exp'] ?? '';
        $nomeLimpo = preg_replace('/[^a-z0-9]/', '_', strtolower(iconv('UTF-8', 'ASCII//TRANSLIT', $nomePessoa)));

        $valorOriginal = floatval(str_replace(',', '.', $_POST['valor_input']));
        $vencimentoInicial = $_POST['vencimento_input'] ?? '';
        $idExpositor = $_POST['id-expositor'];

        if (!$vencimentoInicial) {
            echo "<script>alert('Data de vencimento inválida!'); window.location.href = '../app/Views/Adm/cadastrar-boleto.php';</script>";
            exit;
        }

        $dataVencimento = DateTime::createFromFormat('Y-m-d', $vencimentoInicial);
        if (!$dataVencimento) {
            echo "<script>alert('Formato de data inválido!'); window.location.href = '../app/Views/Adm/cadastrar-boleto.php';</script>";
            exit;
        }

        try {
            $pdf = new Fpdi();
            $pageCount = $pdf->setSourceFile(StreamReader::createByFile($_FILES['arquivo']['tmp_name']));
        } catch (Exception $e) {
            echo "<script>alert('Erro ao ler o PDF: {$e->getMessage()}'); window.location.href = '../app/Views/Adm/cadastrar-boleto.php';</script>";
            exit;
        }

        $backupNome = "{$nomeLimpo}_" . date('Ymd_His') . "_completo.pdf";
        move_uploaded_file($_FILES['arquivo']['tmp_name'], $caminhoPasta . '/' . $backupNome);

        $sucesso = true;

        for ($i = 0; $i < $pageCount; $i++) {
            $dataAtual = clone $dataVencimento;
            $dataAtual->modify("+{$i} month");

            $fmt = new IntlDateFormatter(
                'pt_BR',
                IntlDateFormatter::FULL,
                IntlDateFormatter::NONE,
                'America/Sao_Paulo',
                IntlDateFormatter::GREGORIAN,
                'LLLL'
            );
            $mesNome = $fmt->format($dataAtual);
            $mesNome = strtolower(iconv('UTF-8', 'ASCII//TRANSLIT', $mesNome));
            $mesNome = preg_replace('/[^a-z]/', '', $mesNome);

            $nomeArquivo = "{$nomeLimpo}_{$mesNome}.pdf";
            $caminhoArquivo = $caminhoPasta . '/' . $nomeArquivo;

            copy($caminhoPasta . '/' . $backupNome, $caminhoArquivo);

            $boleto = new Boleto();
            $boleto->valor = $valorOriginal;
            $boleto->pdf = $nomeArquivo;
            $boleto->mes_referencia = ucfirst($mesNome);
            $boleto->vencimento = $dataAtual->format('Y-m-d');
            $boleto->id_expositor = $idExpositor;

            if (!$boleto->CadastrarBoletos()) {
                $sucesso = false;
                break;
            }
        }

        if ($sucesso) {
            echo "<script>alert('Boletos cadastrados com sucesso!'); window.location.href = '../app/Views/Adm/cadastrar-boleto.php';</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar um dos boletos!'); window.location.href = '../app/Views/Adm/cadastrar-boleto.php';</script>";
        }

    } else {
        echo "<script>alert('Nenhum arquivo PDF enviado ou erro no upload!'); window.location.href = '../app/Views/Adm/cadastrar-boleto.php';</script>";
    }

} else {
    echo "<script>alert('Falha no Cadastro.'); window.location.href = '../app/Views/Adm/cadastrar-boleto.php';</script>";
    exit;
}