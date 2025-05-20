<?php
require_once '../Controller/Evento.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $evento = new Evento();

    $evento->setNome($_POST['nomedoevento']);
    $evento->setDescricao($_POST['descricao']);
    $evento->setData($_POST['dataevento']);
    $evento->setStatus($_POST['status']);

    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $nomeImagem = $_FILES['file']['name'];
        $caminhoDestino = '../../Public/uploads/banners/' . basename($nomeImagem);
        move_uploaded_file($_FILES['file']['tmp_name'], $caminhoDestino);

        $evento->setBanner($nomeImagem);
    }

    $id = (int) $_POST['id_evento'];
    $evento->atualizar($id);

    header('Location: ../Views/gerenciar-eventos.php');
    exit;
}