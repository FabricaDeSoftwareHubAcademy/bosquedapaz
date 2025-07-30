<?php
require_once('../vendor/autoload.php');
use app\Controller\UtilidadePublica;

try {
    $util = new UtilidadePublica();
    $utilidades = $util->listar();

    header('Content-Type: application/json');
    echo json_encode($utilidades);
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
?>


