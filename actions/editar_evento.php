<?php
require_once '../Controller/Evento.php';

// Verifica se veio um ID de evento
if (!isset($_POST['id_evento'])) {
    die('ID do evento não enviado!');
}

$evento = new Evento();

// Sanitização dos dados
$id_evento = (int) $_POST['id_evento'];
$nome_evento = trim($_POST['nome_evento']);
$descricao = trim($_POST['descricao']);
$data_evento = $_POST['data_evento'];
$banner = $_POST['banner'];
$status = isset($_POST['status']) ? 1 : 0; // Checkbox ou toggle

// Setters
$evento->setNome($nome_evento);
$evento->setDescricao($descricao);
$evento->setData($data_evento);
$evento->setBanner($banner);
$evento->setStatus($status);

// Atualiza
if ($evento->atualizar($id_evento)) {
    header('Location: ../Views/gerenciar-eventos.php?success=1');
    exit;
} else {
    header('Location: ../Views/editar-evento.php?id=' . $id_evento . '&error=1');
    exit;
}