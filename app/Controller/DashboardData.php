<?php
// Arquivo: app/Controller/DashboardData.php

namespace app\Controller;

require_once __DIR__ . '/../../vendor/autoload.php';

use app\Models\Database;

class DashboardData
{
    public function handleRequest()
    {
        if (isset($_GET['action'])) {
            $action = $_GET['action'];

            switch ($action) {
                case 'expositorStatus':
                    $this->expositorStatus();
                    break;
                case 'expositorCategoria':
                    $this->expositorCategoria();
                    break;
                case 'boletoStatus':
                    $this->boletoStatus();
                    break;
                case 'parceiroStatus':
                    $this->parceiroStatus();
                    break;
                case 'cidadesOrigem':
                    $this->cidadesOrigem();
                    break;
                case 'atracoesPorEvento':
                    $this->atracoesPorEvento();
                    break;
                case 'dadosGerais':
                    $db = new Database('dummy');
                    $dados = $db->getDadosGerais();
                    header('Content-Type: application/json');
                    echo json_encode($dados);
                    break;
                default:
                    http_response_code(404);
                    header('Content-Type: application/json');
                    echo json_encode(['error' => 'Ação não encontrada.']);
                    break;
            }
        } else {
            http_response_code(400);
            header('Content-Type: application/json');
            echo json_encode(['error' => 'Ação não especificada.']);
        }
    }

    public function expositorStatus()
    {
        $db = new Database('dummy');
        $data = $db->getExpositorStatus();
        $this->sendJsonResponse($data);
    }

    public function expositorCategoria()
    {
        $db = new Database('dummy');
        $data = $db->getExpositorCategoria();
        $this->sendJsonResponse($data);
    }

    public function boletoStatus()
    {
        $db = new Database('dummy');
        $data = $db->getBoletoStatus();
        $this->sendJsonResponse($data);
    }

    public function parceiroStatus()
    {
        $db = new Database('dummy');
        $data = $db->getParceiroStatus();
        $this->sendJsonResponse($data);
    }

    public function cidadesOrigem()
    {
        $db = new Database('dummy');
        $data = $db->getCidadesOrigem();
        $this->sendJsonResponse($data);
    }

    public function atracoesPorEvento()
    {
        $db = new Database('dummy');
        $data = $db->getAtracoesPorEvento();
        $this->sendJsonResponse($data);
    }
    public function dadosGerais()
    {
        $db = new Database('dummy');
        $data = $db->getDadosGerais();
        $this->sendJsonResponse($data);
    }

    private function sendJsonResponse($data, $statusCode = 200)
    {
        header('Content-Type: application/json');

        if ($data !== false) {
            http_response_code($statusCode);
            echo json_encode($data);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Não foi possível carregar os dados.']);
        }
    }


}

