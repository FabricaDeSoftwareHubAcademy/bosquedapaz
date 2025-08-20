<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
require_once('../vendor/autoload.php');

use app\suport\Csrf;

header('Content-Type: application/json');

// Verifica CSRF e botão de envio
if (!isset($_POST['tolkenCsrf']) || !Csrf::validateTolkenCsrf($_POST['tolkenCsrf']) || !isset($_POST['botao-continuar'])) {
    echo json_encode(['status'=>'error','mensagem'=>'Token inválido ou formulário não submetido corretamente.']);
    exit;
}

$id_evento = $_POST['id_evento'] ?? null;
if (!$id_evento || !is_numeric($id_evento)) {
    echo json_encode(['status'=>'error','mensagem'=>'ID do evento inválido.']);
    exit;
}

// Salva ID do evento na sessão
$_SESSION['id_evento'] = (int)$id_evento;

echo json_encode(['status'=>'success']);
exit;