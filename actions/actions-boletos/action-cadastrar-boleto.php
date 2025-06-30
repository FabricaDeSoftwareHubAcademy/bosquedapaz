<?php
require_once "../../app/Controller/Boleto.php";

// caminho da pasta, não mexer aqui
$caminhoPasta = '../../documentos-pdf';

if (isset($_POST['botao-cadastrar'])) {
    
    if (isset($_FILES['arq-cb']) && $_FILES['arq-cb']['error'] == 0) {
        
        if (!is_dir($caminhoPasta)) {
            mkdir($caminhoPasta, 0755, true);
        }
        
        // tratando nome dos arquivos
        $nomeArquivo = uniqid() . '-' . basename($_FILES['arq-cb']['name']);
        $caminhoCompleto = $caminhoPasta . '/' . $nomeArquivo;

        if (move_uploaded_file($_FILES['arq-cb']['tmp_name'], $caminhoCompleto)) {
            
            $boleto = new Boleto();
            $boleto->pdf = $nomeArquivo;
            $boleto->mes_referencia = $_POST['referencia'];
            $boleto->valor = $_POST['valor-cb'];
            $boleto->vencimento = $_POST['val-cb'];
            $boleto->id_expositor = $_POST['id_expositor'];

            if ($boleto->CadastrarBoletos()) {
                echo "<script>alert('Boleto cadastrado com sucesso!')</script>";
            } else {
                echo "<script>alert('Erro ao cadastrar boleto!')</script>";
            }

        } else {
            echo "<script>alert('Erro ao mover o arquivo PDF!')</script>";
        }

    } else {
        echo "<script>alert('Nenhum arquivo PDF enviado ou erro no upload!')</script>";
    }

} else {
    echo "<script>alert('Falha no Cadastro.')</script>";
    exit;
}
?>