<?php
    require_once ('../vendor/autoload.php');
    use app\Controller\UtilidadePublica;


        if ($_SERVER["REQUEST_METHOD"] === 'POST') {
            $id_utilidadePublica = $_POST['id_utilidadePublica'] ?? null;
            $titulo = $_POST['titulo'] ?? '';
            $descricao = $_POST['descricao'] ?? '';
            $data_inicio = $_POST['data_inicio'] ?? '';
            $data_fim = $_POST['data_fim'] ?? '';
            $imagem = $_POST['imagem'] ?? '';

            $utilidadePublica = new UtilidadePublica();

            $utilidadePublica->titulo = $titulo;
            $utilidadePublica->descricao = $descricao;
            $utilidadePublica->data_inicio = $data_inicio;
            $utilidadePublica->data_fim = $data_fim;
            $utilidadePublica->imagem = $imagem;


            if ($utilidadePublica->cadastrar()) {
                header('Location: ../Views/Adm/cadastrar-utilidades.php?status=success');
                exit;
            } else {
                echo "Erro ao cadastrar atração no banco de dados.";
            }
    }
?>