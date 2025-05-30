<?php 
require_once('../vendor/autoload.php');
use app\Controller\Colaborador;

$colab = new Colaborador;



if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $colab = $colab->get_imagem();

    $response = array($colab, "status" => 200);
    echo json_encode($response);
}

?>