<?php 
require_once('../vendor/autoload.php');
use app\Controller\UtilidadePublica;

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $id_utilidadePublica = $_POST['id'] ?? null;

    $titulo = $_POST['titulo'] ?? '';
    $descricao = $_POST['descricao'] ?? ''; 
    $data_inicio = $_POST['data_inicio'] ?? '';
    $data_fim = $_POST['data_fim'] ?? '';
    $imagem = $_POST['imagem'] ?? '';
    
    $imagem = '';

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
        $arquivo = $_FILES['imagem'];
        $nome_foto = $arquivo['name'];
        $extensao = strtolower(pathinfo($nome_foto, PATHINFO_EXTENSION));
        $permitidas = ['png', 'jpg', 'jpeg', 'jfif', 'svg'];

        if (in_array($extensao, $permitidas)) {
            $novo_nome = uniqid();
            $pasta = '../Public/imgs/uploads-utilidade/'; 
            $caminho = $pasta . $novo_nome . '.' . $extensao;

            if (!is_dir($pasta)) {
                mkdir($pasta, 0777, true);
            }

            if (move_uploaded_file($arquivo['tmp_name'], $caminho)) {
                $imagem = $caminho;
            } else {
                echo json_encode(['status' => 400, 'msg' => 'Falha ao mover o arquivo.']);
                exit;
            }
        } else {
            echo json_encode(['status' => 400, 'msg' => 'Extensão de arquivo inválida.']);
            exit;
        }
    } else {
        
    }

    $utilidadePublica = new UtilidadePublica();
    $utilidadePublica->id_utilidadePublica = $id_utilidadePublica;
    $utilidadePublica->titulo = $titulo;
    $utilidadePublica->descricao = $descricao;
    $utilidadePublica->data_inicio = $data_inicio;
    $utilidadePublica->data_fim = $data_fim;

    if ($imagem !== '') {
        $utilidadePublica->imagem = $imagem;
    }

    if ($utilidadePublica->editar()) {
        echo json_encode(['status' => 200, 'msg' => 'Editado com sucesso!!']);
    } else {
        echo json_encode(['status' => 400, 'msg' => 'Erro ao Editar!']);
    }
}
?>
