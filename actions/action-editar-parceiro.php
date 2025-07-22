<?php
require_once('../vendor/autoload.php');

use app\Controller\Parceiro;

function validarCpfCnpj(string $valor): bool
{
    $valor = preg_replace('/\D/', '', $valor);

    if (strlen($valor) === 11) {
        if (preg_match('/^(\d)\1+$/', $valor)) return false;
        $soma = 0;
        for ($i = 0; $i < 9; $i++) $soma += intval($valor[$i]) * (10 - $i);
        $resto = ($soma * 10) % 11;
        if ($resto === 10) $resto = 0;
        if ($resto !== intval($valor[9])) return false;

        $soma = 0;
        for ($i = 0; $i < 10; $i++) $soma += intval($valor[$i]) * (11 - $i);
        $resto = ($soma * 10) % 11;
        if ($resto === 10) $resto = 0;
        if ($resto !== intval($valor[10])) return false;

        return true;
    } elseif (strlen($valor) === 14) {
        if (preg_match('/^(\d)\1+$/', $valor)) return false;

        $tamanho = 12;
        $numeros = substr($valor, 0, $tamanho);
        $digitos = substr($valor, $tamanho, 2);

        $soma = 0;
        $pos = $tamanho - 7;
        for ($i = $tamanho; $i >= 1; $i--) {
            $soma += intval($numeros[$tamanho - $i]) * $pos--;
            if ($pos < 2) $pos = 9;
        }
        $resultado = ($soma % 11) < 2 ? 0 : 11 - ($soma % 11);
        if ($resultado !== intval($digitos[0])) return false;

        $tamanho++;
        $numeros = substr($valor, 0, $tamanho);
        $soma = 0;
        $pos = $tamanho - 7;
        for ($i = $tamanho; $i >= 1; $i--) {
            $soma += intval($numeros[$tamanho - $i]) * $pos--;
            if ($pos < 2) $pos = 9;
        }
        $resultado = ($soma % 11) < 2 ? 0 : 11 - ($soma % 11);
        return $resultado === intval($digitos[1]);
    }
    return false;
}

function validarEmail(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function validarTelefone(string $telefone): bool
{
    // Remove tudo que não for número
    $numero = preg_replace('/\D/', '', $telefone);
    // Deve ter 10 ou 11 dígitos (ex: 11999999999)
    return preg_match('/^\d{10,11}$/', $numero);
}

function validarCep(string $cep): bool
{
    return preg_match('/^\d{5}-?\d{3}$/', $cep);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['salvar'])) {
    if (!isset($_GET['id'])) {
        echo json_encode(['erro' => 'ID não informado']);
        exit;
    }

    $id = intval($_GET['id']);

    $pastaDestino = "../Public/uploads/uploads-parceiros";
    if (!is_dir($pastaDestino)) {
        mkdir($pastaDestino, 0755, true);
    }

    $caminhoLogo = null;
    if (isset($_FILES['logo']) && $_FILES['logo']['error'] === 0) {
        $nomeTemporario = $_FILES['logo']['tmp_name'];
        $nomeOriginal = basename($_FILES['logo']['name']);

        $ext = pathinfo($nomeOriginal, PATHINFO_EXTENSION);
        $novoNome = uniqid('logo_') . '.' . $ext;
        $caminhoFinal = $pastaDestino . '/' . $novoNome;

        if (move_uploaded_file($nomeTemporario, $caminhoFinal)) {
            $caminhoLogo = $caminhoFinal;
        } else {
            echo json_encode(['erro' => 'Falha ao salvar o arquivo da logo']);
            exit;
        }
    }

    $dados = [
        'nome_parceiro' => $_POST['nome_parceiro'] ?? null,
        'telefone' => $_POST['telefone'] ?? null,
        'logo' => $caminhoLogo,
        'email' => $_POST['email'] ?? null,
        'cpf_cnpj' => $_POST['cpf_cnpj'] ?? null,
        'nome_contato' => $_POST['nome_contato'] ?? null,
        'tipo' => $_POST['tipo'] ?? null,
        'cep' => $_POST['cep'] ?? null,
        'complemento' => $_POST['complemento'] ?? null,
        'num_residencia' => $_POST['num_residencia'] ?? null,
        'logradouro' => $_POST['logradouro'] ?? null,
        'estado' => $_POST['estado'] ?? null,
        'bairro' => $_POST['bairro'] ?? null
    ];

    // Validação para campos nulos ou vazios
    foreach ($dados as $key => $value) {
        if ($key !== 'logo' && (is_null($value) || trim($value) === '')) {
            echo json_encode(['erro' => "Campo $key não informado ou vazio"]);
            exit;
        }
    }

    // Validações específicas
    if (!validarTelefone($dados['telefone'])) {
        echo json_encode(['erro' => 'Telefone inválido']);
        exit;
    }

    if (!validarEmail($dados['email'])) {
        echo json_encode(['erro' => 'E-mail inválido']);
        exit;
    }

    if (!validarCep($dados['cep'])) {
        echo json_encode(['erro' => 'CEP inválido']);
        exit;
    }

    if ($dados['tipo'] !== 'fisica' && $dados['tipo'] !== 'juridica') {
        echo json_encode(['erro' => 'Tipo inválido']);
        exit;
    }

    if (!validarCpfCnpj($dados['cpf_cnpj'])) {
        echo json_encode(['erro' => 'CPF/CNPJ inválido']);
        exit;
    }

    $parceiro = new Parceiro();

    // se nenhuma logo for colocada aqui
    // mantém mesma logo sem trocar
    if ($dados['logo'] === null) {
        unset($dados['logo']);
    }

    $resultado = $parceiro->AtualizarParceiro($id, $dados);

    if ($resultado) {
        echo json_encode(['sucesso' => 'Parceiro atualizado com sucesso']);
    } else {
        echo json_encode(['erro' => 'Falha ao atualizar parceiro']);
    }
} else {
    echo json_encode(['erro' => 'Requisição inválida']);
}
