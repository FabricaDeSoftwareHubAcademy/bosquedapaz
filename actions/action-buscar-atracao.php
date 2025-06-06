<?php
require_once('../vendor/autoload.php');
use app\Controller\Atracao;

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_evento'])) {
    $id_evento = (int) $_GET['id_evento'];
    $atracao = new Atracao();

    // Usamos o parâmetro where para filtrar as atrações pelo evento
    $atracoes = $atracao->listar("id_evento = $id_evento", "nome_atracao ASC");

    if ($atracoes) {
        // Criar array com dados limpos para enviar ao frontend
        $dados = array_map(function($a) {
            return [
                'id_atracao' => $a->getId(),            // ou $a->id_atracao se o atributo for público/protegido
                'nome_atracao' => $a->getNome(),
                'descricao_atracao' => $a->getDescricao(),
                'foto' => $a->getFoto(),
                'id_evento' => $a->getIdEvento()
            ];
        }, $atracoes);

        echo json_encode([
            'status' => 'success',
            'dados' => $dados
        ]);
    } else {
        echo json_encode([
            'status' => 'success',
            'dados' => []  // vazio, mas sucesso na resposta
        ]);
    }
} else {
    echo json_encode(['status' => 'error', 'mensagem' => 'Parâmetro id_evento não fornecido']);
}