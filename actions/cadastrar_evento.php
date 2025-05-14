<?php
require_once '../Controller/Evento.php';

function sanitizarTexto($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

function validarData($data) {
    $d = DateTime::createFromFormat('Y-m-d', $data);
    return $d && $d->format('Y-m-d') === $data;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = sanitizarTexto($_POST['nomedoevento'] ?? '');
    $descricao = sanitizarTexto($_POST['descricaodoevento'] ?? '');
    $data = $_POST['dataevento'] ?? '';

    
    if (empty($nome) || empty($descricao) || empty($data) || !validarData($data)) {
        echo "<script>alert('Preencha todos os campos corretamente.'); window.history.back();</script>";
        exit;
    }

    $evento = new Evento();
    $evento->setNome($nome);
    $evento->setDescricao($descricao);
    $evento->setData($data);

   
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $arquivoTmp = $_FILES['file']['tmp_name'];
        $nomeOriginal = basename($_FILES['file']['name']);
        $extensao = strtolower(pathinfo($nomeOriginal, PATHINFO_EXTENSION));

        
        $extensoesPermitidas = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($extensao, $extensoesPermitidas)) {
            echo "<script>alert('Formato de imagem inválido.'); window.history.back();</script>";
            exit;
        }

        
        $nomeSeguro = uniqid('evento_', true) . '.' . $extensao;
        $pastaDestino = '../../../Public/uploads/';
        $caminhoFinal = $pastaDestino . $nomeSeguro;

        if (!is_dir($pastaDestino)) {
            mkdir($pastaDestino, 0755, true);
        }

        if (!move_uploaded_file($arquivoTmp, $caminhoFinal)) {
            echo "<script>alert('Erro ao salvar o arquivo.'); window.history.back();</script>";
            exit;
        }

        $evento->setBanner($caminhoFinal);
    } else {
        echo "<script>alert('Erro no upload do banner.'); window.history.back();</script>";
        exit;
    }

    
    if ($evento->cadastrar()) {
        echo '<script>alert("Evento cadastrado com sucesso!"); window.location.href="Area-Adm.php";</script>';
    } else {
        echo '<script>alert("Erro ao cadastrar evento."); window.history.back();</script>';
    }

    exit;
}
?>