<?php
require_once('../vendor/autoload.php');

use setasign\Fpdi\Fpdi;
use app\Controller\Boleto;
use app\suport\Csrf;

$caminhoPasta = '../Public/uploads/uploads-boletos';

if (
    isset($_POST['tolkenCsrf']) && 
    Csrf::validateTolkenCsrf($_POST['tolkenCsrf']) && 
    isset($_POST['salvar'])
) {

    if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] == 0) {

        if (!is_dir($caminhoPasta)) {
            mkdir($caminhoPasta, 0755, true);
        }

        $nomePessoa = $_POST['nome_exp'] ?? '';
        $nomeLimpo = preg_replace('/[^a-z0-9]/', '_', strtolower(iconv('UTF-8', 'ASCII//TRANSLIT', $nomePessoa)));

        $meses = [
            'janeiro', 'fevereiro', 'março', 'abril', 'maio', 'junho',
            'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro'
        ];

        $referenciaOriginal = strtolower($_POST['referencia_input'] ?? '');
        $vencimentoOriginal = $_POST['vencimento_input'] ?? '';

        $mesInicialIndex = array_search($referenciaOriginal, $meses);
        if ($mesInicialIndex === false) {
            echo "<script>alert('Mês de referência inválido!'); window.location.href = '../app/Views/Adm/cadastrar-boleto.php';</script>";
            exit;
        }

        $dataVencimento = DateTime::createFromFormat('Y-m-d', $vencimentoOriginal);
        if (!$dataVencimento) {
            echo "<script>alert('Data de vencimento inválida!'); window.location.href = '../app/Views/Adm/cadastrar-boleto.php';</script>";
            exit;
        }

        $arquivoTmp = $_FILES['arquivo']['tmp_name'];
        $pdf = new Fpdi();
        $pageCount = $pdf->setSourceFile($arquivoTmp);

        if ($pageCount > 0) {
            $sucesso = true;

            for ($pagina = 1; $pagina <= $pageCount; $pagina++) {
                $mesAtualIndex = ($mesInicialIndex + $pagina - 1) % 12;
                $mesReferencia = $meses[$mesAtualIndex];

                $dataVencimentoClone = clone $dataVencimento;
                $dataVencimentoClone->modify("+".($pagina - 1)." months");
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
                $valorBr = $_POST['valor_input'];
                $valorLimpo = str_replace(['.', ','], ['', '.'], $valorBr);
                $boleto->valor = floatval($valorLimpo);
                $boleto->pdf = $nomeArquivo;
                $boleto->mes_referencia = ucfirst($mesReferencia);
                $boleto->vencimento = $vencimento;
                $boleto->id_expositor = $_POST['id-expositor'];

                if (!$boleto->CadastrarBoletos()) {
                    $sucesso = false;
                    break;
                }
            }

            if ($sucesso) {
                echo "<script>alert('Boletos cadastrados com sucesso!'); window.location.href = '../app/Views/Adm/cadastrar-boleto.php';</script>";
            } else {
                echo "<script>alert('Erro ao cadastrar algum boleto!'); window.location.href = '../app/Views/Adm/cadastrar-boleto.php';</script>";
            }

        } else {
            echo "<script>alert('Arquivo PDF sem páginas válidas!'); window.location.href = '../app/Views/Adm/cadastrar-boleto.php';</script>";
        }

    } else {
        echo "<script>alert('Nenhum arquivo PDF enviado ou erro no upload!'); window.location.href = '../app/Views/Adm/cadastrar-boleto.php';</script>";
    }

} else {
    echo "<script>alert('Falha no Cadastro.'); window.location.href = '../app/Views/Adm/cadastrar-boleto.php';</script>";
    exit;
}
?>
