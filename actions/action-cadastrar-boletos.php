<?php
require_once('../vendor/autoload.php');

use setasign\Fpdi\Fpdi;
use app\Controller\Boleto;
use app\suport\Csrf;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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

        $idExpositor = $_POST['id-expositor'];
        $boletoController = new Boleto();
        $resultado = $boletoController->CapturarEmailExpositor($idExpositor);
        $emailExpositor = null;
        if (!empty($resultado) && isset($resultado['email'])) {
            $emailExpositor = $resultado['email'];
        }

        if (!$emailExpositor) {
            echo "<script>alert('E-mail do expositor não encontrado!'); window.location.href = '../app/Views/Adm/cadastrar-boleto.php';</script>";
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

                $valorBr = $_POST['valor_input'];
                $valorLimpo = str_replace(['.', ','], ['', '.'], $valorBr);

                $boleto = new Boleto();
                $boleto->valor = floatval($valorLimpo);
                $boleto->pdf = $nomeArquivo;
                $boleto->mes_referencia = ucfirst($mesReferencia);
                $boleto->vencimento = $vencimento;
                $boleto->id_expositor = $idExpositor;

                if (!$boleto->CadastrarBoletos()) {
                    $sucesso = false;
                    break;
                }

                $mensagem = "
                    <div style='font-family: Arial; padding: 20px; background: #f9f9f9; border: 1px solid #ccc;'>
                        <h2 style='color: #333;'>Novo boleto gerado</h2>
                        <p>Olá, <strong>{$nomePessoa}</strong>!</p>
                        <p>Foi gerado um boleto para você referente ao mês de <strong>" . ucfirst($mesReferencia) . "</strong>.</p>
                        <p><strong>Vencimento:</strong> " . date('d/m/Y', strtotime($vencimento)) . "</p>
                        <p><strong>Valor:</strong> R$ " . number_format($valorLimpo, 2, ',', '.') . "</p>
                        <p>O boleto está disponível para visualização no sistema.</p>
                        <br>
                        <p style='font-size: 12px; color: gray;'>Feira Bosque da Paz</p>
                    </div>
                ";

                try {
                    $mail = new PHPMailer(true);
                    $mail->CharSet = 'UTF-8';
                    $mail->isSMTP();
                    $mail->SMTPAuth = true;
                    $mail->Username = 'camargogdy@gmail.com';
                    $mail->Password = 'esfg akxf funw kmtp';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Host = 'smtp.gmail.com';
                    $mail->Port = 587;

                    $mail->setFrom('camargogdy@gmail.com', 'Feira Bosque da Paz');
                    $mail->addAddress($emailExpositor);
                    $mail->isHTML(true);
                    $mail->Subject = "Novo boleto disponível - " . ucfirst($mesReferencia);
                    $mail->Body = $mensagem;
                    $mail->AltBody = "Novo boleto de " . ucfirst($mesReferencia) . " disponível. Valor: R$ " . number_format($valorLimpo, 2, ',', '.') . ". Vencimento: " . date('d/m/Y', strtotime($vencimento));
                    $mail->send();
                } catch (Exception $e) {
                    error_log("Erro ao enviar e-mail: {$mail->ErrorInfo}");
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
