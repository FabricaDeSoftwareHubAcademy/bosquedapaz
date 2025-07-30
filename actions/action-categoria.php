<?php
require_once '../vendor/autoload.php';

use app\Controller\Categoria;

header("Content-Type: application/json");

$acao = $_GET['acao'] ?? $_POST['acao'] ?? '';

switch ($acao) {
    case 'listar':
        $cat = new Categoria();
        $categorias = $cat->listar();
        echo json_encode(['status' => 'success', 'dados' => $categorias]);
        break;

        case 'alterarStatus':
        // --- PASSO DE DEBUG PHP: Log do conteúdo de $_POST ---
        // error_log("DEBUG - Conteúdo de \$_POST na alteração de status: " . print_r($_POST, true));
        // --- FIM DO PASSO DE DEBUG ---

        $id = $_POST['id_categoria'] ?? null;
        $statusAtual = $_POST['status_atual'] ?? null;

        // --- PASSO DE DEBUG PHP: Log dos valores específicos e tipos ---
        // error_log("DEBUG - id_categoria: " . var_export($id, true) . " (Tipo: " . gettype($id) . ")");
        // error_log("DEBUG - status_atual: '" . var_export($statusAtual, true) . "' (Tipo: " . gettype($statusAtual) . ")");
        // error_log("DEBUG - in_array result: " . var_export(in_array($statusAtual, ['ativo', 'inativo']), true));
        // --- FIM DO PASSO DE DEBUG ---

        if ($id && in_array($statusAtual, ['ativo', 'inativo'])) {
            $cat = new Categoria();
            $novoStatus = ($statusAtual === 'ativo') ? 'inativo' : 'ativo';

            $res = $cat->alterarStatus($id, $novoStatus);

            if ($res) {
                echo json_encode(['status' => 'success', 'message' => 'Status alterado com sucesso para ' . ucfirst($novoStatus)]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Erro ao alterar o status no banco de dados.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Dados inválidos (ID ou status atual não passaram na validação).']);
        }
        break;

    case 'cadastrar':
        $descricao = $_POST['descricao'] ?? '';
        $cor = $_POST['cor'] ?? '';
        $icone = $_POST['icone'] ?? '';
        $status = $_POST['status_cat'] ?? 'ativo';

        if (empty($descricao)) {
            echo json_encode(['status' => 'error', 'message' => 'O nome da categoria não pode estar vazio']);
            exit;
        }

        $cat = new Categoria();
        $cat->setDescricao($descricao);
        $cat->setCor($cor);
        $cat->setIcone($icone);
        $cat->setStatus($status);

        $res = $cat->cadastrar();

        echo json_encode(['status' => 'success', 'message' => 'Categoria cadastrada']);
        break;

    default:
        echo json_encode(['status' => 'error', 'message' => 'Ação inválida']);
        break;
}
