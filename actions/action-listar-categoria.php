<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
require_once '../vendor/autoload.php';

use app\Controller\Categoria;

header('Content-Type: application/json');

try {
    if(isset($_GET['ativos'])){
        $categoria = new Categoria();
        $categorias = $categoria->listarAtivos(); 
    
        echo json_encode([
            'status' => 'success',
            'dados' => $categorias
        ], JSON_PRETTY_PRINT);
    }else{
        
        $categoria = new Categoria();
        $categorias = $categoria->listar(); 
    
        echo json_encode([
            'status' => 'success',
            'dados' => $categorias
        ], JSON_PRETTY_PRINT);
    }

} catch (Exception $e) {
    echo json_encode([
        'status' => 'error',
        'mensagem' => $e->getMessage()
    ]);
}
