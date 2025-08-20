<?php
require_once('../vendor/autoload.php');
require_once('../app/helpers/login.php');

use app\Controller\Boleto;
use app\Controller\Expositor;
if(!confirmaLogin(0)){
    echo json_encode([
        'erro' => 'Login Inválido',
    ]);
    http_response_code(400);
    exit;
}

header('Content-Type: application/json');

try {
    $tokenLogin = obterLogin()['jwt'];
    $id_login = $tokenLogin->sub;

    $expositor = new Expositor();
    $ex = $expositor->listar("id_login = '$id_login'");

    if (empty($ex)) {
        echo json_encode(["erro" => "Expositor não encontrado"]);
        exit;
    }

    $id_expositor = $ex[0]['id_expositor'];

    $boleto = new Boleto();

    $boletos = $boleto->CapturarBoletosPorUsuario($id_expositor);

    echo json_encode($boletos);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["erro" => $e->getMessage()]);
}
