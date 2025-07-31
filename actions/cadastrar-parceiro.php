<?php

require_once('../vendor/autoload.php');

use app\Controller\Parceiro;
use app\Controller\Endereco;
use app\suport\Csrf;

header('Content-Type: application/json');

function sanitizarTexto($texto) {
    return htmlspecialchars(trim($texto), ENT_QUOTES, 'UTF-8');
}

function respostaErro($mensagem) {
    echo json_encode(["status" => "erro", "mensagem" => $mensagem]);
    exit;
}

if (isset($_POST['tolkenCsrf']) && Csrf::validateTolkenCsrf($_POST['tolkenCsrf'])) {
    // Validações básicas dos campos obrigatórios
    $camposObrigatorios = [
        'nome_parceiro', 'telefone', 'email', 'nome_contato',
        'tipo', 'cpf_cnpj', 'cep', 'logradouro', 'num_residencia',
        'bairro', 'cidade', 'estado'
    ];

    $dadosSanitizados = [];

    foreach ($camposObrigatorios as $campo) {
        if (empty($_POST[$campo])) {
            respostaErro("O campo " . ucfirst(str_replace("_", " ", $campo)) . " é obrigatório.");
        }
        $dadosSanitizados[$campo] = sanitizarTexto($_POST[$campo]);
    }

    // Sanitiza campo opcional
    $dadosSanitizados['complemento'] = isset($_POST['complemento']) ? sanitizarTexto($_POST['complemento']) : '';

    // Validação de e-mail
    if (!filter_var($dadosSanitizados['email'], FILTER_VALIDATE_EMAIL)) {
        respostaErro("E-mail inválido.");
    }

    // Validação de CPF ou CNPJ (apenas formato numérico)
    $cpfCnpjNumerico = preg_replace('/\D/', '', $dadosSanitizados['cpf_cnpj']);
    if (!preg_match('/^\d{11}$|^\d{14}$/', $cpfCnpjNumerico)) {
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

    // Verificação de MIME real
    $mime = mime_content_type($arquivoTmp);
    $mimesPermitidos = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($mime, $mimesPermitidos)) {
        respostaErro("O arquivo enviado não é uma imagem válida.");
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
    $parceiro = new Parceiro();
    $endereco = new Endereco();

    // Atribui os dados ao objeto Parceiro
    $parceiro->nome_parceiro = $dadosSanitizados["nome_parceiro"];
    $parceiro->telefone = $dadosSanitizados["telefone"];
    $parceiro->email = $dadosSanitizados["email"];
    $parceiro->nome_contato = $dadosSanitizados["nome_contato"];
    $parceiro->tipo = $dadosSanitizados["tipo"];
    $parceiro->cpf_cnpj = $cpfCnpjNumerico;
    $parceiro->logo = 'uploads/uploads-parceiros/' . $nomeSeguro;

    // Atribui os dados ao objeto Endereco
    $endereco->cep = $dadosSanitizados["cep"];
    $endereco->logradouro = $dadosSanitizados["logradouro"];
    $endereco->num_residencia = $dadosSanitizados["num_residencia"];
    $endereco->bairro = $dadosSanitizados["bairro"];
    $endereco->cidade = $dadosSanitizados["cidade"];
    $endereco->estado = $dadosSanitizados["estado"];
    $endereco->complemento = $dadosSanitizados["complemento"];

    // Executa o cadastro
    $result = $parceiro->cadastrar($endereco);

    if ($result) {
        echo json_encode(["status" => 200, "msg" => "Cadastrado com sucesso!"]);
    } else {
        respostaErro("Erro ao cadastrar o parceiro.");
    }
}
?>
