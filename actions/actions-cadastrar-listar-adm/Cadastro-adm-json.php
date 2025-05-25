<?php
require_once __DIR__ . '../../../app/Models/Database.php';
require_once __DIR__ . '../../../app/adm/Controller/Colaborador.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    // Caminho relativo para salvar na pasta 'Public/imgs/imgs-fotos-cadastro-adm'
    $pasta_relativa = '../../../Public/imgs/img-cadastro-adm/';

    // Caminho absoluto da pasta no sistema de arquivos
    $pasta_absoluta = realpath(__DIR__ . '../../../Public/imgs/img-cadastro-adm/');

    if ($pasta_absoluta === false) {
        echo json_encode(['success' => false, 'message' => 'Diretório de destino não existe.']);
        exit;
    }

    $nome_foto = $arquivo['name'];
    $novo_nome = uniqid();
    $extensao = strtolower(pathinfo($nome_foto, PATHINFO_EXTENSION));

    if (!in_array($extensao, ['jpg', 'jpeg', 'png'])) {
        echo json_encode(['success' => false, 'message' => 'Extensão do arquivo inválida. Use .jpg, .jpeg ou .png.']);
        exit;
    }

    $caminho_absoluto_arquivo = $pasta_absoluta . DIRECTORY_SEPARATOR . $novo_nome . '.' . $extensao;
    $caminho_relativo_arquivo = $pasta_relativa . $novo_nome . '.' . $extensao;

    $fotoSalva = move_uploaded_file($arquivo['tmp_name'], $caminho_absoluto_arquivo);

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

    // Salva no banco o caminho relativo para usar no front-end
    $objColab->imagem = $caminho_relativo_arquivo;

    $res = $objColab->cadastrar();

    echo json_encode([
        'success' => $res,
        'message' => $res ? 'Cadastrado com sucesso!' : 'Erro ao cadastrar no banco de dados.'
    ]);
} else {
    echo json_encode(['success' => false, 'message' => 'Requisição inválida.']);
}
