<?php
require_once('../vendor/autoload.php');
use app\Controller\Boleto;

header('Content-Type: application/json');
$boletos = new Boleto();

$nome = isset($_POST['nome']) ? trim($_POST['nome']) : null;
$status = isset($_POST['status']) ? trim($_POST['status']) : null;
$data_inicial = isset($_POST['data_inicial']) ? trim($_POST['data_inicial']) : null;
$data_final = isset($_POST['data_final']) ? trim($_POST['data_final']) : null;

function filtrarBoletos($boletos, $nome, $status, $data_inicial, $data_final)
{
    if (!$nome && !$status && (!$data_inicial || !$data_final)) {
        return $boletos->ListarBoletos();
    }

    $todos = $boletos->ListarBoletos();

    if ($nome) {
        $todos = array_filter($todos, function ($b) use ($nome) {
            return stripos($b['nome'], $nome) !== false;
        });
    }

    if ($status) {
        $todos = array_filter($todos, function ($b) use ($status) {
            return strtolower($b['status_boleto']) === strtolower($status);
        });
    }

    if ($data_inicial && $data_final) {
        $todos = array_filter($todos, function ($b) use ($data_inicial, $data_final) {
            $vencimento = strtotime(str_replace('/', '-', $b['vencimento']));
            $inicio = strtotime(str_replace('/', '-', $data_inicial));
            $fim = strtotime(str_replace('/', '-', $data_final));
            return $vencimento >= $inicio && $vencimento <= $fim;
        });

        usort($todos, function ($a, $b) {
            $dataA = strtotime(str_replace('/', '-', $a['vencimento']));
            $dataB = strtotime(str_replace('/', '-', $b['vencimento']));
            return $dataA <=> $dataB;
        });
    }

    return array_values($todos);
}

$resultado = filtrarBoletos($boletos, $nome, $status, $data_inicial, $data_final);

echo json_encode($resultado);
