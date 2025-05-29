<?php
require_once('../vendor/autoload.php');
use app\Controller\Atracao; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $atracao = new Atracao();

    $atracao->setNome($_POST['nome_atracao']);
    $atracao->setDescricao($_POST['descricao_atracao']);
    $atracao->setIdEvento($_POST['id_evento']);

    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $nomeImagem = $_FILES['file']['name'];
        $caminhoDestino = '../../Public/uploads/atracoes/' . basename($nomeImagem);

        // Cria o diretório caso não exista
        if (!is_dir('../../Public/uploads/atracoes/')) {
            mkdir('../../Public/uploads/atracoes/', 0777, true);
        }

        move_uploaded_file($_FILES['file']['tmp_name'], $caminhoDestino);
        $atracao->setFoto($nomeImagem);
    } else {
        // Caso não envie nova imagem, mantemos a antiga
        $atracao->setFoto($_POST['foto_antiga']);
    }

    $id = (int) $_POST['id_atracao'];
    $atracao->atualizar($id);

    header('Location: ../Views/gerenciar-atracoes.php');
    exit;
}