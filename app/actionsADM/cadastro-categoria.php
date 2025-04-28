<?php
require_once "../../app/adm/Controller/Categoria.php";

if (isset($_POST['descricao']) && isset($_POST['cor']) && isset($_FILES['icone'])) {
    $descricao = $_POST['descricao'];
    $cor = $_POST['cor'];
    $arquivo = $_FILES['icone'];

    if ($arquivo['error']) {
        die("Falha ao enviar arquivo");
    }

    $pasta = './uploads-categoria/';

    if (!is_dir($pasta)) {
        mkdir($pasta, 0777, true);
    }

    $nome_foto = $arquivo['name'];
    $novo_nome = uniqid();
    $extensao = strtolower(pathinfo($nome_foto, PATHINFO_EXTENSION));

    if (!in_array($extensao, ['png', 'jpg', 'jpeg', 'jfif'])) {
        die("Extensão do arquivo inválida");
    }

    $caminho = $pasta . $novo_nome . '.' . $extensao;

    if (move_uploaded_file($arquivo['tmp_name'], $caminho)) {
        $cat = new Categoria();
        $cat->descricao = $descricao;
        $cat->cor = $cor;
        $cat->icone = $caminho;

        $res = $cat->cadastrar();

        if ($res) {
            $response = array('status' => 'OK');
            echo json_encode($response);
        } else {
            $response = array('status' => 'Error', 'message' => 'Erro ao cadastrar a categoria');
            echo json_encode($response);
        }
    } else {
        $response = array('status' => 'Error', 'message' => 'Falha ao mover o arquivo para o diretório');
        echo json_encode($response);
    }
} else {
    $response = array('status' => 'Error', 'message' => 'Dados do formulário inválidos');
    echo json_encode($response);
}
?>
