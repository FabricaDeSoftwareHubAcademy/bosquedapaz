<?php

require_once('../vendor/autoload.php');

use app\Controller\Parceiro;
use app\Controller\Endereco;
use app\suport\Csrf;

header('Content-Type: application/json');

// 🔹 Função para sanitizar texto
function sanitizarTexto($texto) {
    return htmlspecialchars(trim($texto), ENT_QUOTES, 'UTF-8');
}

// 🔹 Funções para padronizar respostas
function respostaErro($mensagem) {
    echo json_encode(["status" => "error", "mensagem" => $mensagem]);
    exit;
}

function respostaSucesso($mensagem, $extra = []) {
    echo json_encode(array_merge(["status" => "success", "mensagem" => $mensagem], $extra));
    exit;
}

try {
    // 🔹 Valida CSRF
    if (!isset($_POST['tolkenCsrf']) || !Csrf::validateTolkenCsrf($_POST['tolkenCsrf'])) {
        throw new Exception("Requisição inválida.");
    }

    // 🔹 Campos obrigatórios
    $camposObrigatorios = [
        'nome_parceiro', 'telefone', 'email', 'nome_contato',
        'tipo', 'cpf_cnpj', 'cep', 'logradouro', 'num_residencia',
        'bairro', 'cidade', 'estado'
    ];

    $dadosSanitizados = [];

    foreach ($camposObrigatorios as $campo) {
        if (empty($_POST[$campo])) {
            throw new Exception("O campo " . ucfirst(str_replace("_", " ", $campo)) . " é obrigatório.");
        }
        $dadosSanitizados[$campo] = sanitizarTexto($_POST[$campo]);
    }

    // 🔹 Campo opcional
    $dadosSanitizados['complemento'] = isset($_POST['complemento']) ? sanitizarTexto($_POST['complemento']) : '';

    // 🔹 Validação de tamanho
    if (strlen($dadosSanitizados['nome_parceiro']) > 150) {
        throw new Exception("O nome do parceiro deve ter no máximo 150 caracteres.");
    }
    if (strlen($dadosSanitizados['email']) > 150) {
        throw new Exception("O e-mail deve ter no máximo 150 caracteres.");
    }

    // 🔹 Validação de e-mail
    if (!filter_var($dadosSanitizados['email'], FILTER_VALIDATE_EMAIL)) {
        throw new Exception("E-mail inválido.");
    }

    // 🔹 Validação de telefone
    if (!preg_match('/^\d{10,11}$/', $dadosSanitizados['telefone'])) {
        throw new Exception("O telefone deve ter 10 ou 11 dígitos numéricos.");
    }

    // 🔹 Validação de CPF/CNPJ
    $cpfCnpjNumerico = preg_replace('/\D/', '', $dadosSanitizados['cpf_cnpj']);
    if (!preg_match('/^\d{11}$|^\d{14}$/', $cpfCnpjNumerico)) {
        throw new Exception("CPF ou CNPJ inválido (apenas números, 11 ou 14 dígitos).");
    }

    // 🔹 Checa duplicidade
    $parceiro = new Parceiro();
    if ($parceiro->existeCpfCnpj($cpfCnpjNumerico)) {
        throw new Exception("Já existe um parceiro com esse CPF ou CNPJ.");
    }

    // 🔹 Upload da logo
    if (!isset($_FILES['logo']) || $_FILES['logo']['error'] !== UPLOAD_ERR_OK) {
        throw new Exception("Erro no upload da logo.");
    }

    $extensoesPermitidas = ['jpg', 'jpeg', 'png', 'gif'];
    $arquivoTmp = $_FILES['logo']['tmp_name'];
    $nomeOriginal = basename($_FILES['logo']['name']);
    $extensao = strtolower(pathinfo($nomeOriginal, PATHINFO_EXTENSION));

    if (!in_array($extensao, $extensoesPermitidas)) {
        throw new Exception("Formato de imagem inválido. Permitidos: jpg, jpeg, png, gif.");
    }

    $mime = mime_content_type($arquivoTmp);
    $mimesPermitidos = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($mime, $mimesPermitidos)) {
        throw new Exception("O arquivo enviado não é uma imagem válida.");
    }

    if ($_FILES['logo']['size'] > 2 * 1024 * 1024) {
        throw new Exception("A logo não pode ultrapassar 2MB.");
    }

    $nomeSeguro = uniqid('parceiro_', true) . '.' . $extensao;
    $pastaDestino = '../Public/uploads/uploads-parceiros/';
    $caminhoFinal = $pastaDestino . $nomeSeguro;

    if (!is_dir($pastaDestino)) {
        mkdir($pastaDestino, 0755, true);
    }

    if (!move_uploaded_file($arquivoTmp, $caminhoFinal)) {
        throw new Exception("Erro ao salvar a imagem.");
    }

    // 🔹 Preenche objeto Parceiro
    $parceiro->nome_parceiro = $dadosSanitizados["nome_parceiro"];
    $parceiro->telefone = $dadosSanitizados["telefone"];
    $parceiro->email = $dadosSanitizados["email"];
    $parceiro->nome_contato = $dadosSanitizados["nome_contato"];
    $parceiro->tipo = $dadosSanitizados["tipo"];
    $parceiro->cpf_cnpj = $cpfCnpjNumerico;
    $parceiro->logo = '../Public/uploads/uploads-parceiros/' . $nomeSeguro;

    // 🔹 Preenche objeto Endereco
    $endereco = new Endereco();
    $endereco->cep = $dadosSanitizados["cep"];
    $endereco->logradouro = $dadosSanitizados["logradouro"];
    $endereco->num_residencia = $dadosSanitizados["num_residencia"];
    $endereco->bairro = $dadosSanitizados["bairro"];
    $endereco->cidade = $dadosSanitizados["cidade"];
    $endereco->estado = $dadosSanitizados["estado"];
    $endereco->complemento = $dadosSanitizados["complemento"];

    // 🔹 Executa o cadastro
    if (!$parceiro->cadastrar($endereco)) {
        throw new Exception("Erro ao cadastrar o parceiro.");
    }

    respostaSucesso("Cadastrado com sucesso!");

} catch (Exception $e) {
    respostaErro($e->getMessage());
}

?>
