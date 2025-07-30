<?php

require_once('../vendor/autoload.php');

use app\Controller\Parceiro;
use app\Controller\Endereco;
use app\suport\Csrf;

function respostaErro($mensagem) {
    echo json_encode(["status" => "erro", "mensagem" => $mensagem]);
    exit;
}

if(isset($_POST['tolkenCsrf']) && Csrf::validateTolkenCsrf($_POST['tolkenCsrf'])) {
    // Validações básicas dos campos obrigatórios
    $camposObrigatorios = [
        'nome_parceiro', 'telefone', 'email', 'nome_contato',
        'tipo', 'cpf_cnpj', 'cep', 'logradouro', 'num_residencia',
        'bairro', 'cidade', 'estado'
    ];

    foreach ($camposObrigatorios as $campo) {
        if (empty($_POST[$campo])) {
            respostaErro("O campo " . ucfirst(str_replace("_", " ", $campo)) . " é obrigatório.");
        }
    }

    // Validação de e-mail
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        respostaErro("E-mail inválido.");
    }

    // Validação CPF ou CNPJ simples (só formato, não lógica de validação)
    if (!preg_match('/^\d{11}$|^\d{14}$/', preg_replace('/\D/', '', $_POST['cpf_cnpj']))) {
        respostaErro("CPF ou CNPJ inválido (apenas números, 11 ou 14 dígitos).");
    }

    // Validação e upload da imagem
    if (!isset($_FILES['logo']) || $_FILES['logo']['error'] !== UPLOAD_ERR_OK) {
        respostaErro("Erro no upload da logo.");
    }

    $extensoesPermitidas = ['jpg', 'jpeg', 'png', 'gif'];
    $arquivoTmp = $_FILES['logo']['tmp_name'];
    $nomeOriginal = basename($_FILES['logo']['name']);
    $extensao = strtolower(pathinfo($nomeOriginal, PATHINFO_EXTENSION));

    if (!in_array($extensao, $extensoesPermitidas)) {
        respostaErro("Formato de imagem inválido. Permitidos: jpg, jpeg, png, gif.");
    }

    $nomeSeguro = uniqid('parceiro_', true) . '.' . $extensao;
    $pastaDestino = '../Public/uploads/uploads-parceiros/';
    $caminhoFinal = $pastaDestino . $nomeSeguro;

    if (!is_dir($pastaDestino)) {
        mkdir($pastaDestino, 0755, true);
    }

    if (!move_uploaded_file($arquivoTmp, $caminhoFinal)) {
        respostaErro("Erro ao salvar a imagem.");
    }

    // Instancia os objetos
    $endereco = new Endereco();
    $parceiro = new Parceiro();

    // Atribui os dados
    $parceiro->nome_parceiro = $_POST["nome_parceiro"];
    $parceiro->telefone = $_POST["telefone"];
    $parceiro->email = $_POST["email"];
    $parceiro->nome_contato = $_POST["nome_contato"];
    $parceiro->tipo = $_POST["tipo"];
    $parceiro->cpf_cnpj = $_POST["cpf_cnpj"];
    $parceiro->logo = 'uploads/uploads-parceiros/' . $nomeSeguro;

    $endereco->cep = $_POST["cep"];
    $endereco->logradouro = $_POST["logradouro"];
    $endereco->num_residencia = $_POST["num_residencia"];
    $endereco->bairro = $_POST["bairro"];
    $endereco->cidade = $_POST["cidade"];
    $endereco->estado = $_POST["estado"];
    $endereco->complemento = $_POST["complemento"] ?? '';

    // Tenta cadastrar
    $result = $parceiro->cadastrar($endereco);

    if ($result) {
        echo json_encode(["status" => 200, "msg" => "Cadastrado com sucesso!"]);
    } else {
        respostaErro("Erro ao cadastrar o parceiro.");
    }
}
?>
