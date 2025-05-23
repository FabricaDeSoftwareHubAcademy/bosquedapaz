<?php

require(__DIR__ . '/../../app/adm/Controller/Colaborador.php');

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cadastrar'])){
    
    function limparInput($data){
        return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
    }

    $nome = limparInput($_POST['nome'] ?? '');
    $email = limparInput($_POST['email'] ?? '');
    $telefone = limparInput($_POST['telefone'] ?? '');
    $cargo = limparInput($_POST['cargo'] ?? '');
    $senha = $_POST['senha'] ?? '';
    $confSenha = $_POST['confSenha'] ?? '';

    $response = ['success' => false, 'message' => ''];

    if (!$nome || !$email || !$telefone || !$cargo || !$senha || !$confSenha){
        $response['message'] = 'Por favor, preencha todos os campos corretamente.';
        echo json_encode($response);
        exit;
    }

    if ($senha !== $confSenha){
        $response['message'] = 'As senhas não coincidem!';
        echo json_encode($response);
        exit;
    }

    if (!isset($_FILES['imagem']) || $_FILES['imagem']['error'] !== UPLOAD_ERR_OK){
        $response['message'] = 'Falha ao enviar a foto';
        echo json_encode($response);
        exit;
    }

    $arquivo = $_FILES['imagem'];
    $pasta = '../../../Public/imgs/imgs-fotos-cadastro-adm/';
    $nome_foto = $arquivo['name'];
    $extensao = strtolower(pathinfo($nome_foto, PATHINFO_EXTENSION));

    $extensoesPermitidas = ['png', 'jpg', 'jpeg'];
    if(!in_array($extensao, $extensoesPermitidas)){
        $response['message'] = 'Eztensã de imagem inválida';
        echo json_encode($response);
        exit;
    }

    $novo_nome = uniqid('colab_', true) . '.' . $extensao;
    $caminhoRelativo = 'Public/imgs/imgs-fotos-cadastro-adm/' . $novo_nome;
    $caminhoCompleto = '../../../' . $caminhoRelativo;

    if(!move_uploaded_file($arquivo['tmp_name'], $caminhoCompleto)){
        $response['message'] = 'Erro ao salvar a imagem';
        echo json_encode($response);
        exit;
    }

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $objColab = new Colaborador();
    $objColab->nome = $nome;
    $objColab->email = $email;
    $objColab->telefone = $telefone;
    $objColab->cargo = $cargo;
    $objColab->senha = $senhaHash;
    $objColab->imagem = $caminhoRelativo;

    $res = $objColab->cadastar();

    if ($res) {
        $response['success'] = true;
        $response['message'] = 'Cadastrado com sucesso!';
    } else {
        $response['message'] = 'Erro ao cadastrar no banco';
    }    

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?>