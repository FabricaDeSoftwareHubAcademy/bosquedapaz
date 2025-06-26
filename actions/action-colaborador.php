<?php
session_start();

require_once('../vendor/autoload.php');
use app\Controller\Colaborador;

if (!isset($_SESSION['login']['id_pessoa'])) {
    echo json_encode(['success' => false, 'message' => 'Usuário não autenticado']);
    exit;
}

function sanitizeString($str) {
    return filter_var(trim($str), FILTER_SANITIZE_STRING);
}

$requestMethod = $_SERVER['REQUEST_METHOD'];



if ($requestMethod === 'POST') {
    $colab = new Colaborador();

    $input = json_decode(file_get_contents('php://input'), true);

    // Cadastro <----------------------------------------------->
    if (isset($_POST["cadastrar"])) {
        $nome = sanitizeString($_POST['nome'] ?? '');
        $email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
        $telefone = sanitizeString($_POST['tel'] ?? '');
        $cargo = sanitizeString($_POST['cargo'] ?? '');
        $senha = $_POST['senha'] ?? '';

        // Validação: 
        if (!$email) {
            echo json_encode(['success' => false, 'message' => 'Email inválido']);
            exit;
        }
        if (empty($nome) || empty($telefone) || empty($cargo) || empty($senha)) {
            echo json_encode(['success' => false, 'message' => 'Preencha todos os campos obrigátorios.']);
            exit;
        }
        if (strlen($nome) < 3 || strlen($nome) > 100) {
            echo json_encode(['success' => false, 'message' => 'O nome deve ter entre 3 e 100 caracteres.']);
            exit;
        }
        if(!preg_match('/^\d{10,11}$/', $telefone)) {
            echo json_encode(['success' => false, 'message' => 'Telefone inválido. Informe apenas números com DDD.']);
            exit;
        }
        if (strlen($senha) < 4) {
            echo json_encode(['success' => false, 'message' => 'A senha deve ter pelo menos 4 caracteres..']);
            exit;
        }

        // Validação: Somente Letras no input de Nome e Cargo: 
        if (!Colaborador::validarSomenteLetra($nome)) {
            echo json_encode(['success' => false, 'message' => 'Nome inválido. Apenas letras são permitidas.']);
            exit;
        }
        if (!Colaborador::validarSomenteLetra($cargo)) {
            echo json_encode(['success' => false, 'message' => 'Cargo inválido. Apenas letras são permitidas.']);
            exit;
        }

        $colab->setNome($nome);
        $colab->setTelefone($telefone);
        $colab->setEmail($email);
        $colab->setCargo($cargo);
        $colab->setImagem(null);
        $colab->setSenha(password_hash($senha, PASSWORD_DEFAULT));


        // Imagem: <----------------------------------------------->
        $uploadDir = '../Public/uploads/uploads-ADM/';
        $imagemSalva = null;

        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
            $imagemSalva = Colaborador::uploadImagem($_FILES['imagem'], $uploadDir);
            if ($imagemSalva === false) {
                echo json_encode(['success' => false, 'message' => 'Erro no upload da imagem. Verifique o tipo e tamanho do arquivo.']);
                exit;
            }
            $colab->setImagem('Public/uploads/uploads-ADM/' . $imagemSalva);
        } else {
            // Se não enviou nova imagem, mantenha a atual
            // Buscar a imagem atual para manter
            $colaboradorAtual = $colab->buscarPorIdPessoa($_SESSION['login']['id_pessoa']);
            $colab->setImagem($colaboradorAtual['img_perfil'] ?? null);
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

    
    // Alterar Status <----------------------------------------------->
    else if ($input !== null && isset($input['acao']) && $input['acao'] === 'alternarStatus') {
        $colab = new Colaborador();

        $id = filter_var($input['id_colaborador'], FILTER_VALIDATE_INT);
        $statusAtual = $input['status_atual'] ?? null;

        if (!$id || !in_array($statusAtual, ['ativo', 'inativo'])) {
            echo json_encode(['success' => false, 'message' => 'Dados inválidos']);
            exit;
        }

        try {
            $novoStatus = $statusAtual === 'ativo' ? 'inativo' : 'ativo';

            $result = $colab->mudar_status($id, $novoStatus);

            if ($result) {
                echo json_encode([
                    'success' => true,
                    'message' => "Status alterado para $novoStatus com sucesso!",
                    'novoStatus' => $novoStatus,
                    'novoStatusTexto' => ucfirst($novoStatus)
                ]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Erro ao alterar status.']);
            }
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Erro interno: ' . $e->getMessage()]);
        }
        exit;
    }


    // Update = Edição dos dados <----------------------------------------------->
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

        // Validações: 
        if (!$email) {
            echo json_encode(['success' => false, 'message' => 'Email inválido']);
            exit;
        }
        if (empty($nome) || empty($telefone) || empty($cargo)) {
            echo json_encode(['success' => false, 'message' => 'Preencha todos os campos obrigatórios.']);
            exit;
        }
        if (strlen($nome) < 3 || strlen($nome) > 100) {
            echo json_encode(['success' => false, 'message' => 'O nome deve ter entre 3 e 100 caracteres.']);
            exit;
        }
        if (!preg_match('/^\d{10,11}$/', $telefone)) {
            echo json_encode(['success' => false, 'message' => 'Telefone inválido. Informe apenas números com DDD.']);
            exit;
        }

        // Validação: Somente Letras no input de Nome e Cargo: 
        if (!Colaborador::validarSomenteLetra($nome)) {
            echo json_encode(['success' => false, 'message' => 'Nome inválido. Apenas letras são permitidas.']);
            exit;
        }
        if (!Colaborador::validarSomenteLetra($cargo)) {
            echo json_encode(['success' => false, 'message' => 'Cargo inválido. Apenas letras são permitidas.']);
            exit;
        }

        
        $colab->setNome($nome);
        $colab->setTelefone($telefone);
        $colab->setEmail($email);
        $colab->setCargo($cargo);


        // Imagem: <----------------------------------------------->
        $uploadDir = '../Public/uploads/uploads-ADM/';
        $imagemSalva = null;

        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
            $imagemSalva = Colaborador::uploadImagem($_FILES['imagem'], $uploadDir);
            if ($imagemSalva === false) {
                echo json_encode(['success' => false, 'message' => 'Erro no upload da imagem. Verifique o tipo e tamanho do arquivo.']);
                exit;
            }
            $colab->setImagem('Public/uploads/uploads-ADM/' . $imagemSalva);
        } else {
            // Se não enviou nova imagem, mantenha a atual
            // Buscar a imagem atual para manter
            $colaboradorAtual = $colab->buscarPorIdPessoa($_SESSION['login']['id_pessoa']);
            $colab->setImagem($colaboradorAtual['img_perfil'] ?? null);
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

    // Busca <----------------------------------------------->
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


// Listagem <----------------------------------------------->
if ($requestMethod === 'GET') {
    $colab = new Colaborador();

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['meu_perfil']) && $_GET['meu_perfil'] === '1') {
        if(!isset($_SESSION['login']['id_pessoa'])) {
            echo json_encode(['success' => false, 'message' => 'Usuário não autenticado']);
            exit;
        }
    
        $idSessao = $_SESSION['login']['id_pessoa'];
    
        // Instancia seu controller
        $colab = new \app\Controller\Colaborador();
    
        $dados = $colab->buscarPorIdPessoa($idSessao);
    
        // DEBUG: para garantir que só vem UM registro
        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'data' => $dados]);
        exit;
    }
    
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