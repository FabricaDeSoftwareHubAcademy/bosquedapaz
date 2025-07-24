<?php
require_once('../vendor/autoload.php');

use app\Controller\Parceiro;

// Função de sanitização
function sanitizarTexto($input) {
    return htmlspecialchars(strip_tags(trim($input)));
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
        $nomeOriginal = trim(basename($_FILES['logo']['name']));

        $ext = strtolower(pathinfo($nomeOriginal, PATHINFO_EXTENSION));
        $extensoesPermitidas = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($ext, $extensoesPermitidas)) {
            echo json_encode(['erro' => 'Extensão de imagem não permitida']);
            exit;
        }

        // Verificação de tipo MIME real (opcional, mas recomendado)
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $nomeTemporario);
        finfo_close($finfo);
        $mimesPermitidos = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($mime, $mimesPermitidos)) {
            echo json_encode(['erro' => 'Tipo MIME inválido']);
            exit;
        }

        $novoNome = uniqid('logo_') . '.' . $ext;
        $caminhoFinal = $pastaDestino . '/' . $novoNome;

        if (move_uploaded_file($nomeTemporario, $caminhoFinal)) {
            $caminhoLogo = 'uploads/uploads-parceiros/' . $novoNome;
        } else {
            echo json_encode(['erro' => 'Falha ao salvar o arquivo da logo']);
            exit;
        }
    }

    // Sanitização dos campos recebidos
    $dados = [
        'nome_parceiro' => sanitizarTexto($_POST['nome_parceiro'] ?? null),
        'telefone' => sanitizarTexto($_POST['telefone'] ?? null),
        'logo' => $caminhoLogo, // será null se não enviou nova imagem
        'email' => sanitizarTexto($_POST['email'] ?? null),
        'cpf_cnpj' => sanitizarTexto($_POST['cpf_cnpj'] ?? null),
        'nome_contato' => sanitizarTexto($_POST['nome_contato'] ?? null),
        'tipo' => sanitizarTexto($_POST['tipo'] ?? null),
        'cep' => sanitizarTexto($_POST['cep'] ?? null),
        'complemento' => sanitizarTexto($_POST['complemento'] ?? null),
        'num_residencia' => sanitizarTexto($_POST['num_residencia'] ?? null),
        'logradouro' => sanitizarTexto($_POST['logradouro'] ?? null),
        'estado' => sanitizarTexto($_POST['estado'] ?? null),
        'bairro' => sanitizarTexto($_POST['bairro'] ?? null)
    ];

    // Verificação de campos obrigatórios (exceto 'logo')
    foreach ($dados as $key => $value) {
        if ($value === null && $key !== 'logo') {
            echo json_encode(['erro' => "Campo $key não informado"]);
            exit;
        }
    }

    // Caso não tenha enviado nova logo, remove do array
    if ($dados['logo'] === null) {
        unset($dados['logo']);
    }

    $parceiro = new Parceiro();
    $resultado = $parceiro->AtualizarParceiro($id, $dados);

    if ($resultado) {
        echo json_encode(['sucesso' => 'Parceiro atualizado com sucesso']);
    } else {
        echo json_encode(['erro' => 'Falha ao atualizar parceiro']);
    }
} else {
    echo json_encode(['erro' => 'Requisição inválida']);
}
?>
