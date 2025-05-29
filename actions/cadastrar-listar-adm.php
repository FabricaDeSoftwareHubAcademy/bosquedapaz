<?php 
require '../app/adm/Controller/Colaborador.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Coleta os dados do formulário
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $telefone = $_POST['tel'] ?? '';
    $cargo = $_POST['cargo'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $confSenha = $_POST['confSenha'] ?? '';

    if ($senha !== $confSenha) {
        echo json_encode(['success' => false, 'message' => 'As senhas não coincidem.']);
        exit;
    }

    if (!isset($_FILES['imagem']) || $_FILES['imagem']['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(['success' => false, 'message' => 'Erro ao enviar a imagem.']);
        exit;
    }

    $arquivo = $_FILES['imagem'];
    $pasta = '../Public/imgs/imgs-fotos-cadastro-adm/';
    $nome_foto = $arquivo['name'];
    $novo_nome = uniqid();
    $extensao = strtolower(pathinfo($nome_foto, PATHINFO_EXTENSION));

    $caminho = $pasta . $novo_nome . '.' . $extensao;
    $fotoSalva = move_uploaded_file($arquivo['tmp_name'], $caminho);


    if (!$fotoSalva) {
        echo json_encode(['success' => false, 'message' => 'Falha ao mover o arquivo.']);
        exit;
    }

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $objColab = new Colaborador();
    $objColab->nome = $nome;
    $objColab->email = $email;
    $objColab->telefone = $telefone;
    $objColab->cargo = $cargo;
    $objColab->senha = $senhaHash;
    $objColab->imagem = $caminho;

    $res = $objColab->cadastrar();

    if ($res) {
        echo json_encode(['success' => true, 'message' => 'Cadastrado com sucesso!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao cadastrar no banco de dados.']);
    }

} else {
    echo json_encode(['success' => false, 'message' => 'Requisição inválida.']);
}
?>