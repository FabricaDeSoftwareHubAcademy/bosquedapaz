<?php

require_once('../vendor/autoload.php');

use app\Controller\Parceiro;
use app\Controller\Endereco;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $endereco = new Endereco();
    $parceiro = new Parceiro();

    $parceiro->nome_parceiro = $_POST["nome_parceiro"];
    $parceiro->telefone = $_POST["telefone"];
    $parceiro->email = $_POST["email"];
    $parceiro->nome_contato = $_POST["nome_contato"];
    $parceiro->tipo = $_POST["tipo"];
    $parceiro->cpf_cnpj = $_POST["cpf_cnpj"];

    if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
        chmod("../Public/uploads/uploads-parceiros/", 0777);
        $arquivoTmp = $_FILES['logo']['tmp_name'];
        $nomeOriginal = basename($_FILES['logo']['name']);
        $extensao = strtolower(pathinfo($nomeOriginal, PATHINFO_EXTENSION));

        $extensoesPermitidas = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($extensao, $extensoesPermitidas)) {
            echo json_encode(["status" => "erro", "mensagem" => "Formato de imagem inválido."]);
            exit;
        }

        $nomeSeguro = uniqid('parceiro_', true) . '.' . $extensao;
        $pastaDestino = '../Public/uploads/uploads-parceiros/';
        $caminhoFinal = $pastaDestino . $nomeSeguro;

        

        if (!is_dir($pastaDestino)) {
            mkdir($pastaDestino, 0755, true);
        }

        if (!move_uploaded_file($arquivoTmp, $caminhoFinal)) {
            echo json_encode(["status" => "erro", "mensagem" => "Erro ao salvar o arquivo."]);
            exit;
        }
        
        $parceiro->logo = 'uploads/uploads-parceiros/' . $nomeSeguro;
    } else {
        echo json_encode(["status" => "erro", "mensagem" => "Erro no upload do banner."]);
        exit;
    }
}        

    $endereco->cep = $_POST["cep"];
    $endereco->logradouro = $_POST["logradouro"];
    $endereco->num_residencia = $_POST["num_residencia"];
    $endereco->bairro = $_POST["bairro"];
    $endereco->cidade = $_POST["cidade"];
    $endereco->estado = $_POST["estado"]; // ← Aqui você adiciona o estado
    $endereco->complemento = $_POST["complemento"];

    $result = $parceiro->cadastrar($endereco);

    if ($result) {
        echo json_encode(["status" => 200, "msg" => "Cadastrado com Sucesso!"]);
    } else {
        echo json_encode(["status" => "erro", "msg" => "Erro ao cadastrar!"]);
    }

?>
