<?php
header('Content-Type: application/json');
require_once '../../app/Controller/Boleto.php';

$boletos = new Boleto();

$nome = isset($_POST['nome']) ? trim($_POST['nome']) : null;
$status = isset($_POST['status']) ? trim($_POST['status']) : null;
$data_inicial = isset($_POST['data_inicial']) ? trim($_POST['data_inicial']) : null;
$data_final = isset($_POST['data_final']) ? trim($_POST['data_final']) : null;


function filtrarBoletos($boletos, $nome, $status, $data_inicial, $data_final) {
    
    // enquanto nenhuma filtragem for realizada
    // a tabela exibirá todos os dados o tempo todo
    if (!$nome && !$status && (!$data_inicial || !$data_final)) {
        return $boletos->ListarBoletos();
    }

    $todos = $boletos->ListarBoletos();

    // filtrando por nome
    if ($nome) {
        $todos = array_filter($todos, function($b) use ($nome) {
            return stripos($b['nome'], $nome) !== false;
        });
    }    

    // filtrando por status
    if ($status) {
        $todos = array_filter($todos, function($b) use ($status) {
            return strtolower($b['status_exp']) === strtolower($status);
        });
    }

    // filtrando entre data inicial e data final
    if ($data_inicial && $data_final) {
        $todos = array_filter($todos, function($b) use ($data_inicial, $data_final) {
            $vencimento = strtotime($b['vencimento']);
            $inicio = strtotime($data_inicial);
            $fim = strtotime($data_final);
            return $vencimento >= $inicio && $vencimento <= $fim;
        });
    }

    return array_values($todos);
}

$resultado = filtrarBoletos($boletos, $nome, $status, $data_inicial, $data_final);
echo json_encode($resultado);