<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../app/adm/controller/Colaborador.php';

header('Content-Type: application/json');

$colab = new Colaborador();

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

if ($method === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'listar') {
        $busca = $_POST['busca'] ?? null;
        $lista = $colab->listar($busca);
        echo json_encode(['success' => true, 'dados' => $lista]);
        exit;
    }

    if ($action === 'cadastrar') {
        $colab->nome = $_POST['nome'] ?? '';
        $colab->email = $_POST['email'] ?? '';
        $colab->telefone = $_POST['telefone'] ?? '';
        $colab->cargo = $_POST['cargo'] ?? '';
        $colab->senha = $_POST['senha'] ?? '';

        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
            $extensoesPermitidas = ['png', 'jpg', 'jpeg'];
            $nomeArquivo = $_FILES['imagem']['name'];
            $ext = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));

            if (!in_array($ext, $extensoesPermitidas)) {
                echo json_encode(['success' => false, 'erro' => 'Formato de imagem não permitido']);
                exit;
            }

            $novoNome = uniqid() . '.' . $ext;
            $pastaUpload = __DIR__ . '/../../../Public/imgs/imgs-fotos-cadastro-adm/';

            if (!is_dir($pastaUpload)) {
                mkdir($pastaUpload, 0755, true);
            }

            $destino = $pastaUpload . $novoNome;

            if (move_uploaded_file($_FILES['imagem']['tmp_name'], $destino)) {
                $colab->imagem = 'imgs-fotos-cadastro-adm/' . $novoNome;
            } else {
                echo json_encode(['success' => false, 'erro' => 'Erro ao mover arquivo']);
                exit;
            }
        } else {
            $colab->imagem = ''; 
        }

        $res = $colab->cadastrar();

        if ($res) {
            echo json_encode(['success' => true, 'mensagem' => 'Colaborador cadastrado com sucesso', 'id' => $res]);
        } else {
            echo json_encode(['success' => false, 'erro' => 'Erro ao cadastrar colaborador']);
        }
        exit;
    }

    echo json_encode(['success' => false, 'erro' => 'Ação desconhecida']);
    exit;
}

if ($method === 'GET') {
    $busca = $_GET['busca'] ?? null;
    $lista = $colab->listar($busca);
    echo json_encode(['success' => true, 'dados' => $lista]);
    exit;
}

echo json_encode(['success' => false, 'erro' => 'Método HTTP não suportado']);
exit;
