<?php
require_once __DIR__ . '/../Models/Database.php';
// require_once __DIR__ . '/../Controller/Boleto.php';

$pdf = $_POST['pdf'];
$mes_referencia = $_POST['mes_referencia'];
$valor = $_POST['valor'];
$vencimento = $_POST['vencimento'];
$status = $_POST['status_exp'];
$id_expositor = $_POST['id_expositor'];

$banco = new Database('boleto');
$execucao = $banco->insert([
    'pdf' => $pdf,
    'mes_referencia' => $mes_referencia,
    'valor' => $valor,
    'vencimento' => $vencimento,
    'status_exp' => $status,
    'id_expositor' => $id_expositor
]);
// return $execucao
echo json_encode(['sucess' => true]);
?>