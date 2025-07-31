<?php
require_once('../vendor/autoload.php');
use app\Controller\Boleto;
use app\suport\Csrf;
use setasign\Fpdi\Fpdi;

$caminhoPasta = '../Public/uploads/uploads-boletos';

if (
    isset($_POST['tolkenCsrf']) && 
    Csrf::validateTolkenCsrf($_POST['tolkenCsrf']) && 
    isset($_POST['salvar'])
) {

    if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] === 0) {

        if (!is_dir($caminhoPasta)) {
            mkdir($caminhoPasta, 0755, true);
        }

        $nomePessoa = $_POST['nome_exp'] ?? '';
        $nomeLimpo = preg_replace('/[^a-z0-9]/', '_', strtolower(iconv('UTF-8', 'ASCII//TRANSLIT', $nomePessoa)));

        $mesReferencia = strtolower($_POST['referencia_input'] ?? '');
        $vencimento = $_POST['vencimento_input'] ?? '';

        if ($vencimento) {
            $data = DateTime::createFromFormat('Y-m-d', $vencimento);
            if ($data) {
                $dia = $data->format('d');
                $mes = $data->format('m');
                $ano = $data->format('Y');
            } else {
                $dia = $mes = $ano = 'data_invalida';
            }
        } else {
            $dia = $mes = $ano = 'data_vazia';
        }

        $nomeArquivo = "boleto_{$nomeLimpo}_{$mesReferencia}_{$dia}_{$mes}_{$ano}.pdf";
        $caminhoCompleto = $caminhoPasta . '/' . $nomeArquivo;

        // Move o arquivo PDF inteiro para o diretório desejado
        if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $caminhoCompleto)) {

            // Conta quantas páginas tem o PDF enviado
            $pdf = new Fpdi();
            $totalPaginas = $pdf->setSourceFile($caminhoCompleto);

            $sucesso = true;

            // Para cada página, cadastra um boleto (referenciando o mesmo arquivo PDF)
            for ($i = 1; $i <= $totalPaginas; $i++) {
                $boleto = new Boleto();
                
                // Converte o valor para float (ajusta vírgula e pontos)
                $valorString = $_POST['valor_input'] ?? '0';
                $valorFloat = floatval(str_replace(['.', ','], ['', '.'], $valorString));
                $boleto->valor = $valorFloat;
                
                $boleto->pdf = $nomeArquivo; // Salva o nome do arquivo PDF inteiro
                $boleto->mes_referencia = $_POST['referencia_input'] ?? '';
                $boleto->vencimento = $_POST['vencimento_input'] ?? '';
                $boleto->id_expositor = $_POST['id-expositor'] ?? null;

                // Opcional: se quiser associar qual página do boleto é (pode salvar no banco)
                // $boleto->pagina = $i;

                if (!$boleto->CadastrarBoletos()) {
                    $sucesso = false;
                    break;
                }
            }

            if ($sucesso) {
                echo "<script>alert('Boletos cadastrados com sucesso!'); window.location.href = '../app/Views/Adm/cadastrar-boleto.php';</script>";
            } else {
                echo "<script>alert('Erro ao cadastrar um ou mais boletos!'); window.location.href = '../app/Views/Adm/cadastrar-boleto.php';</script>";
            }

        } else {
            echo "<script>alert('Erro ao mover o arquivo PDF!'); window.location.href = '../app/Views/Adm/cadastrar-boleto.php';</script>";
        }

    } else {
        echo "<script>alert('Nenhum arquivo PDF enviado ou erro no upload!'); window.location.href = '../app/Views/Adm/cadastrar-boleto.php';</script>";
    }

} else {
    echo "<script>alert('Falha no Cadastro.'); window.location.href = '../app/Views/Adm/cadastrar-boleto.php';</script>";
    exit;
}
?>
