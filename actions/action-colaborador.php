<?php

require_once('../vendor/autoload.php');
require_once('../app/helpers/login.php');
use app\Controller\Colaborador;
use app\suport\Csrf;

function sanitizeString($str) {
    return htmlspecialchars(strip_tags($str));
}

function obterAdm(){
    return obterLogin();
}

function limparMaskTelefone($tel){
    return preg_replace('/[^0-9]/', '', $tel);
}


if (isset($_POST['tolkenCsrf']) && Csrf::validateTolkenCsrf($_POST['tolkenCsrf'])) {
    $admLogado = obterAdm();

    $colab = new Colaborador();

    // Cadastro <----------------------------------------------->
    if (isset($_POST["cadastrar"])) {
        //////// VALIDANDO EMAIL /////////////
        $email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);

        $emailExiste = $colab->emailExiste($email);
        if($emailExiste){
            echo json_encode([
                'success' => false,
                'message' => 'Não é possivel cadastrar, email existente',
            ]);
            exit;
        }

        $nome = sanitizeString($_POST['nome'] ?? '');
        $telefone = limparMaskTelefone(sanitizeString($_POST['tel'] ?? ''));
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
            $colab->setImagem('../../../Public/uploads/uploads-ADM/' . $imagemSalva);
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
    else if (isset($_POST['alternarStatus'])) {
        $colab = new Colaborador();

        $id = filter_var($_POST['id_login'], FILTER_VALIDATE_INT);
        $statusAtual = $_POST['status_atual'] ?? null;

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
        ////// validar email \\\\\\\\\\
        $email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);

        $emailExiste = $colab->emailExiste($email);
        if($emailExiste){
            echo json_encode([
                'success' => false,
                'message' => 'Não é possivel cadastrar, email existente',
            ]);
            exit;
        }

        $nome = sanitizeString($_POST['nome'] ?? '');
        $telefone = limparMaskTelefone(sanitizeString($_POST['tel'] ?? ''));
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
            $colab->setImagem($imagemSalva);
        } else {
            // Se não enviou nova imagem, mantenha a atual
            // Buscar a imagem atual para manter
            $colaboradorAtual = $colab->buscarPorIdPessoa($admLogado['jwt']->sub);
            $colab->setImagem($colaboradorAtual['img_perfil'] ?? null);
        }
        
        $res = $colab->atualizar($admLogado['jwt']->sub);
        if ($res) {
            $dadosAtualizados = $colab->buscarPorIdPessoa($admLogado['jwt']->sub);
            echo json_encode(['success' => true, 'message' => 'ADM editado com sucesso!', 'data' => $dadosAtualizados]);
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
            echo json_encode(['data' => $res]);
            exit;
        } else {
            echo json_encode(['data' => []]);
            http_response_code(400);
            exit;
        }
    }
}


// Listagem <----------------------------------------------->
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $admLogado = obterAdm();
    $colab = new Colaborador();

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['meu_perfil']) && $_GET['meu_perfil'] === '1') {
        
        // Instancia seu controller
        $colab = new \app\Controller\Colaborador();
        
        $dados = $colab->buscarPorIdPessoa($admLogado['jwt']->sub);
        
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

// Matheus Manja