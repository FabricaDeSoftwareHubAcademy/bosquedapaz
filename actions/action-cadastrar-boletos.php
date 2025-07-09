<?php
require_once('../vendor/autoload.php');
use app\Controller\Boleto;

// Caminho fixo da pasta
$caminhoPasta = '../Public/uploads/uploads-boletos';

if (isset($_POST['botao-cadastrar'])) {
    
    if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] == 0) {
        
        if (!is_dir($caminhoPasta)) {
            mkdir($caminhoPasta, 0755, true);
        }

        // Pegando o nome da pessoa do formulário (string)
        $nomePessoa = $_POST['nome_exp'] ?? '';

        // Limpa o nome: tira acento, espaços, caracteres especiais e deixa tudo minúsculo com _
        $nomeLimpo = preg_replace('/[^a-z0-9]/', '_', strtolower(iconv('UTF-8', 'ASCII//TRANSLIT', $nomePessoa)));

        // Pega o mês de referência e deixa minúsculo
        $mesReferencia = strtolower($_POST['referencia_input'] ?? '');

        // Pega a data de vencimento e formata
        $vencimento = $_POST['vencimento_input'] ?? ''; // formato esperado: YYYY-MM-DD

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

        // Monta o nome do arquivo conforme pedido
        $nomeArquivo = "boleto_{$nomeLimpo}_{$mesReferencia}_{$dia}_{$mes}_{$ano}.pdf";

        $caminhoCompleto = $caminhoPasta . '/' . $nomeArquivo;

        if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $caminhoCompleto)) {
            
            $boleto = new Boleto();
            $boleto->valor = floatval(str_replace(',', '.', $_POST['valor_input']));
            $boleto->pdf = $nomeArquivo;
            $boleto->mes_referencia = $_POST['referencia_input'];
            $boleto->vencimento = $_POST['vencimento_input'];
            $boleto->id_expositor = $_POST['id-expositor'];

            if ($boleto->CadastrarBoletos()) {
                echo "<script>alert('Boleto cadastrado com sucesso!'); window.location.href = '../app/Views/Adm/cadastrar-boleto.php';</script>";
            } else {
                echo "<script>alert('Erro ao cadastrar boleto!'); window.location.href = '../app/Views/Adm/cadastrar-boleto.php';</script>";
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
