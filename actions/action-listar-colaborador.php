<?php
require_once('../vendor/autoload.php');

use app\Controller\Colaborador;

header('Content-Type: application/json');

try {
    $colaborador = new Colaborador();
    $dados = $colaborador->listarColaboradores();

    // Filtra apenas os campos necessários e colaboradores ativos
    $resultado = array_filter($dados, function($colab) {
        return strtolower($colab['status_pes']) === 'ativo';
    });

    // Mapeia os campos necessários
    $resultado = array_values(array_map(function($colab) {
        return [
            'nome' => $colab['nome'],
            'cargo' => $colab['cargo'],
            'imagem' => $colab['img_perfil'] ?? 'default.png'
        ];
    }, $resultado));

    echo json_encode(['data' => $resultado, 'status' => 200]);
} catch (Exception $e) {
    echo json_encode(['data' => [], 'status' => 500, 'error' => $e->getMessage()]);
}
