<?php
require_once('../vendor/autoload.php');
use app\Controller\Boleto;

// caminho da pasta onde será criada
// não mexer no caminho, por favor
$caminhoPasta = '../Public/uploads/uploads-boletos';

if (isset($_POST['botao-cadastrar'])) {
    
    if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] == 0) {
        
        if (!is_dir($caminhoPasta)) {
            mkdir($caminhoPasta, 0755, true);
        }

        $nomeArquivo = uniqid() . '-' . basename($_FILES['arquivo']['name']);
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