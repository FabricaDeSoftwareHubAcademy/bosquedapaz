<?php
// session_start();
// if (!isset($_SESSION['usuario_logado']) || $_SESSION['perfil'] !== 'ADM') {
//     echo json_encode(['success' => false, 'message' => 'Acesso negado']);
//     exit;
// }

require_once('../vendor/autoload.php');
use app\Controller\Colaborador;

function sanitizeString($str) {
    return filter_var(trim($str), FILTER_SANITIZE_STRING);
}

$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($requestMethod === 'POST') {
    $colab = new Colaborador();

    if (isset($_POST["cadastrar"])) {
        $nome = sanitizeString($_POST['nome'] ?? '');
        $email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
        $telefone = sanitizeString($_POST['tel'] ?? '');
        $cargo = sanitizeString($_POST['cargo'] ?? '');
        $senha = $_POST['senha'] ?? '';

        if (!$email) {
            echo json_encode(['success' => false, 'message' => 'Email inválido']);
            exit;
        }

        $colab->setNome($nome);
        $colab->setTelefone($telefone);
        $colab->setEmail($email);
        $colab->setCargo($cargo);
        $colab->setImagem(null);
        $colab->setSenha(password_hash($senha, PASSWORD_DEFAULT));

        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
            $diretorio = __DIR__ . '/../../Public/uploads/uploads-ADM/';

            if (!is_dir($diretorio)) {
                mkdir($diretorio, 0755, true);
            }

            $nomeImagem = uniqid() . '-' . basename($_FILES['imagem']['name']);
            $caminhoCompleto = $diretorio . $nomeImagem;

            if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoCompleto)) {
                $colab->setImagem('Public/uploads/uploads-ADM/' . $nomeImagem);
            } else {
                echo json_encode(['success' => false, 'message' => 'Erro ao mover arquivo.']);
                exit;
            }
        } else {
            $colab->setImagem(null);
        }

        $res = $colab->cadastrar();

        if ($res) {
            echo json_encode(['success' => true, 'message' => 'ADM cadastrado com sucesso!']);
            exit;
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro ao cadastrar ADM.']);
            exit;
        }
    }

    else if (isset($_POST["atualizar"])) {
        $id = filter_var($_POST['id'] ?? '', FILTER_VALIDATE_INT);
        if (!$id) {
            echo json_encode(['success' => false, 'message' => 'ID inválido']);
            exit;
        }

        $nome = sanitizeString($_POST['nome'] ?? '');
        $email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
        $telefone = sanitizeString($_POST['tel'] ?? '');
        $cargo = sanitizeString($_POST['cargo'] ?? '');

        if (!$email) {
            echo json_encode(['success' => false, 'message' => 'Email inválido']);
            exit;
        }

        $colab->setNome($nome);
        $colab->setTelefone($telefone);
        $colab->setEmail($email);
        $colab->setCargo($cargo);

        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
            $diretorio = __DIR__ . '/../../Public/uploads/uploads-ADM/';

            if (!is_dir($diretorio)) {
                mkdir($diretorio, 0755, true);
            }

            $nomeImagem = uniqid() . '-' . basename($_FILES['imagem']['name']);
            $caminhoCompleto = $diretorio . $nomeImagem;

            if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoCompleto)) {
                $colab->setImagem('Public/uploads/uploads-ADM/' . $nomeImagem);
            } else {
                echo json_encode(['success' => false, 'message' => 'Erro ao mover arquivo.']);
                exit;
            }
        } else {
            $colab->setImagem(null);
        }

        $res = $colab->atualizar($id);
        if ($res) {
            echo json_encode(['success' => true, 'message' => 'ADM editado com sucesso!']);
            exit;
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro ao editar ADM.']);
            exit;
        }
    }

    else if (isset($_POST['palavra'])) {
        $nome = sanitizeString($_POST['palavra']);
        $res = $colab->listarColaboradores($nome);

        if ($res) {
            $dados = array_map(function($c) {
                return [
                    'id_colaborador' => $c['id_colaborador'],
                    'nome' => $c['nome'],
                    'email' => $c['email'],
                    'telefone' => $c['telefone'],
                    'cargo' => $c['cargo'],
                    'status_col' => $c['status_col'],
                ];
            }, $res);

            echo json_encode(['data' => $dados]);
            exit;
        } else {
            echo json_encode(['data' => []]);
            exit;
        }
    }

    echo json_encode(['success' => false, 'message' => 'Requisição inválida']);
    exit;
}

if ($requestMethod === 'GET') {
    $colab = new Colaborador();

    if (isset($_GET['id'])) {
        $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
        if (!$id) {
            echo json_encode(['success' => false, 'message' => 'ID inválido']);
            exit;
        }

        $res = $colab->listarColaboradores($id);
        $dados = array_filter($res, fn($v) => $v != null);
        echo json_encode(['data' => $dados, 'status' => 200]);
        exit;
    } else {
        $res = $colab->listarColaboradores();
        echo json_encode(['data' => $res, 'status' => 200]);
        exit;
    }
}
