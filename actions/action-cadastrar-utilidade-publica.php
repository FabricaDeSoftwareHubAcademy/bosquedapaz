<?php
require_once('../vendor/autoload.php');
use app\Controller\UtilidadePublica;

// Verifica se é uma requisição POST
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $id_utilidadePublica = $_POST['id_utilidadePublica'] ?? null;
    $titulo = $_POST['titulo'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $data_inicio = $_POST['data_inicio'] ?? '';
    $data_fim = $_POST['data_fim'] ?? '';
    $imagem = '';

    // Verifica se o arquivo foi enviado
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
        $arquivo = $_FILES['imagem'];
        $nome_foto = $arquivo['name'];
        $extensao = strtolower(pathinfo($nome_foto, PATHINFO_EXTENSION));
        $permitidas = ['png', 'jpg', 'jpeg', 'jfif', 'svg'];

        if (in_array($extensao, $permitidas)) {
            $novo_nome = uniqid();
            $pasta = '../Public/imgs/uploads-utilidade/'; // Altere o caminho se necessário
            $caminho = $pasta . $novo_nome . '.' . $extensao;

            // Cria o diretório se não existir
            if (!is_dir($pasta)) {
                mkdir($pasta, 0777, true);
            }

            if (move_uploaded_file($arquivo['tmp_name'], $caminho)) {
                $imagem = $caminho;
            } else {
                echo "Falha ao mover o arquivo.";
                exit;
            }
        } else {
            echo "Extensão de arquivo inválida.";
            exit;
        }
    }

    // Instancia e popula o objeto
    $utilidadePublica = new UtilidadePublica();
    $utilidadePublica->titulo = $titulo;
    $utilidadePublica->descricao = $descricao;
    $utilidadePublica->data_inicio = $data_inicio;
    $utilidadePublica->data_fim = $data_fim;
    $utilidadePublica->imagem = $imagem;

    if ($utilidadePublica->cadastrar()) {
        // Redirecionamento ou resposta de sucesso
        // header('Location: ../Views/Adm/cadastrar-utilidades.php?status=success');
        echo "Cadastro realizado com sucesso!";
        exit;
    } else {
        echo "Erro ao cadastrar utilidade pública no banco de dados.";
    }
}
?>
