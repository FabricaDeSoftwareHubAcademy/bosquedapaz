<?php
// require_once "../../app/adm/Controller/Categoria.php";
require_once "../app/adm/Controller/Categoria.php";

// Define o cabeçalho como JSON
header('Content-Type: application/json');

if (isset($_POST['descricao']) && isset($_POST['cor']) && isset($_FILES['icone'])) {
    $descricao = $_POST['descricao'];
    $cor = $_POST['cor'];
    $arquivo = $_FILES['icone'];

    if ($arquivo['error']) {
        echo json_encode([
            'status' => 'Error',
            'message' => 'Falha ao enviar arquivo'
        ]);
        exit;
    }

    $pasta = '../Public/imgs/uploads-categoria/'; //colocar caminho img

    // if (!is_dir($pasta)) {
    //     try{
    //         mkdir($pasta, 0777, true);
    //     }catch (Exception $error){
    //         $passou = "erro ao criar a pasta";
    //     }


    // }

    $nome_foto = $arquivo['name'];
    $novo_nome = uniqid();
    $extensao = strtolower(pathinfo($nome_foto, PATHINFO_EXTENSION));

    if (!in_array($extensao, ['png', 'jpg', 'jpeg', 'jfif', 'svg'])) {
        echo json_encode([
            'status' => 'Error',
            'message' => 'Extensão do arquivo inválida'
        ]);
        exit;
    }

    $caminho = $pasta . $novo_nome . '.' . $extensao;

    if (move_uploaded_file($arquivo['tmp_name'], $caminho)) {
        $cat = new Categoria();
        $cat->descricao = $descricao;
        $cat->cor = $cor;
        $cat->icone = $caminho;

        $res = $cat->cadastrar();

        if ($res) {
            echo json_encode([
                'status' => 'OK',
                'message' => 'Categoria cadastrada com sucesso!'
            ]);
        } else {
            echo json_encode([
                'status' => 'Error',
                'message' => 'Erro ao cadastrar a categoria'
            ]);
        }
    } else {
        echo json_encode([
            'status' => 'Error',
            'message' => 'Falha ao mover o arquivo para o diretório'
        ]);
    }
} else {
    echo json_encode([
        'status' => 'Error',
        'message' => 'Dados do formulário inválidos'
    ]);
}
