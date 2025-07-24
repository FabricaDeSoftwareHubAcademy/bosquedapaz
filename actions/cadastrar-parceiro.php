<?php

require_once('../vendor/autoload.php');

use app\Controller\Parceiro;
use app\Controller\Endereco;

function sanitizarTexto($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Sanitização e validação básica
    $nome = sanitizarTexto($_POST["nome_parceiro"] ?? '');
    $telefone = sanitizarTexto($_POST["telefone"] ?? '');
    $email = sanitizarTexto($_POST["email"] ?? '');
    $nome_contato = sanitizarTexto($_POST["nome_contato"] ?? '');
    $tipo = sanitizarTexto($_POST["tipo"] ?? '');
    $cpf_cnpj = sanitizarTexto($_POST["cpf_cnpj"] ?? '');

    // Validação de e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["status" => "erro", "mensagem" => "E-mail inválido."]);
        exit;
    }

    // Validação de CPF/CNPJ (básica)
    if (!preg_match('/^\d{11}$|^\d{14}$/', preg_replace('/\D/', '', $cpf_cnpj))) {
        echo json_encode(["status" => "erro", "mensagem" => "CPF ou CNPJ inválido."]);
        exit;
    }

    // Instanciando objetos
    $endereco = new Endereco();
    $parceiro = new Parceiro();

    $parceiro->nome_parceiro = $nome;
    $parceiro->telefone = $telefone;
    $parceiro->email = $email;
    $parceiro->nome_contato = $nome_contato;
    $parceiro->tipo = $tipo;
    $parceiro->cpf_cnpj = $cpf_cnpj;

    // Upload da logo
    if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {

        $pastaDestino = '../Public/uploads/uploads-parceiros/';
        if (!is_dir($pastaDestino)) {
            mkdir($pastaDestino, 0755, true);
        }

        chmod($pastaDestino, 0777);

        $arquivoTmp = $_FILES['logo']['tmp_name'];
        $nomeOriginal = basename($_FILES['logo']['name']);
        $extensao = strtolower(pathinfo($nomeOriginal, PATHINFO_EXTENSION));

        $extensoesPermitidas = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($extensao, $extensoesPermitidas)) {
            echo json_encode(["status" => "erro", "mensagem" => "Formato de imagem inválido."]);
            exit;
        }

        // Verificação de MIME real
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $arquivoTmp);
        finfo_close($finfo);

        $mimesPermitidos = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($mime, $mimesPermitidos)) {
            echo json_encode(["status" => "erro", "mensagem" => "Tipo de arquivo inválido (MIME)."]);
            exit;
        }

        $nomeSeguro = uniqid('parceiro_', true) . '.' . $extensao;
        $caminhoFinal = $pastaDestino . $nomeSeguro;

        if (!move_uploaded_file($arquivoTmp, $caminhoFinal)) {
            echo json_encode(["status" => "erro", "mensagem" => "Erro ao salvar a imagem."]);
            exit;
        }

        $parceiro->logo = 'uploads/uploads-parceiros/' . $nomeSeguro;
    } else {
        echo json_encode(["status" => "erro", "mensagem" => "Erro no upload da logo."]);
        exit;
    }

    // Endereço
    $endereco->cep = sanitizarTexto($_POST["cep"] ?? '');
    $endereco->logradouro = sanitizarTexto($_POST["logradouro"] ?? '');
    $endereco->num_residencia = sanitizarTexto($_POST["num_residencia"] ?? '');
    $endereco->bairro = sanitizarTexto($_POST["bairro"] ?? '');
    $endereco->cidade = sanitizarTexto($_POST["cidade"] ?? '');
    $endereco->estado = sanitizarTexto($_POST["estado"] ?? '');
    $endereco->complemento = sanitizarTexto($_POST["complemento"] ?? '');

    // Cadastro
    $result = $parceiro->cadastrar($endereco);

    if ($result) {
        echo json_encode(["status" => 200, "msg" => "Cadastrado com Sucesso!"]);
    } else {
        echo json_encode(["status" => "erro", "msg" => "Erro ao cadastrar parceiro."]);
    }
}
?>
