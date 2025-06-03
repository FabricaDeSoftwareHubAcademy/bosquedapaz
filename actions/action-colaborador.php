<?php

require_once('../vendor/autoload.php');
use app\Controller\Colaborador;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["cadastrar"])){
        $colab = new Colaborador();

        $colab->setNome($_POST['nome'] ?? '');
        $colab->setTelefone($_POST['tel'] ?? '');
        $colab->setEmail($_POST['email'] ?? '');
        $colab->setCargo($_POST['cargo'] ?? '');
        $colab->setSenha(password_hash($_POST['senha'], PASSWORD_DEFAULT));
        $colab->setPerfil($_POST['perfil'] ?? '');

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
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro ao cadastrar ADM.']);
        }
    }
    else if (isset($_POST["atualizar"])){
        $colab = new Colaborador();
    
        $colab->setNome($_POST['nome'] ?? '');
        $colab->setTelefone($_POST['tel'] ?? '');
        $colab->setEmail($_POST['email'] ?? '');
        $colab->setCargo($_POST['cargo'] ?? '');
        $colab->setPerfil($_POST['perfil'] ?? '');
    
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
    
        $res = $colab->atualizar($_POST['id']);
    
        echo json_encode($res);
    }
    else if (isset($_POST['palavra'])) {
        $colab = new Colaborador();
        $termo = trim($_POST['palavra']);
        $res = $colab->busca_selecionada($termo);

        $html = '';
        foreach ($res as $colaborador) {
            $html .= '<tr>';
            $html .= '<td>' . htmlspecialchars($colaborador['nome']) . '</td>';
            $html .= '<td>' . htmlspecialchars($colaborador['email']) . '</td>';
            $html .= '<td>' . htmlspecialchars($colaborador['telefone']) . '</td>';
            $html .= '<td>' . htmlspecialchars($colaborador['cargo']) . '</td>';
            $html .= '<td><span class="status ativo">Ativo</span></td>';
            $html .= '</tr>';
        }

        echo $html;
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    if(isset($_GET['id'])){
        $colab = new Colaborador();
        $res = $colab->buscar_por_id($_GET['id']);
        $dados = array();
        
        foreach ($res as $key => $value) {
            if ($value != null){
                $dados[$key] = $value;
            }
            
        }
        
        echo json_encode([$dados, "status" => 200]);
    }
    else{
        $colab = new Colaborador();
        $res = $colab->buscar();
        $dados = array();
        
        foreach ($res as $key => $value) {
            if ($value != null){
                $dados[$key] = $value;
            }
            
        }
        
        echo json_encode([$dados, "status" => 200]);
    }
}

// $dadosPesq = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// $retorna = ['status' => true, 'dados' = $dadosPesq['busca']];

// echo json_encode($retorna);