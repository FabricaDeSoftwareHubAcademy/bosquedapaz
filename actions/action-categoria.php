<?php
require_once '../vendor/autoload.php';

use app\Controller\Categoria;

// Permitir acesso CORS (se precisar)
// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json");

$acao = $_GET['acao'] ?? $_POST['acao'] ?? '';

switch ($acao) {
    case 'listar':
        $cat = new Categoria();
        $categorias = $cat->listar();
        echo json_encode(['status' => 'success', 'dados' => $categorias]);
        break;

    case 'alterarStatus':
        $json = file_get_contents('php://input');
        $dados = json_decode($json, true);

        $id = $dados['id_categoria'] ?? null;
        $novoStatus = $dados['status_cat'] ?? null;

        if ($id && in_array($novoStatus, ['ativo', 'inativo'])) {
            $cat = new Categoria();
            $res = $cat->alterarStatus($id, $novoStatus);
            if ($res) {
                echo json_encode(['status' => 'success', 'mensagem' => 'Status alterado com sucesso']);
            } else {
                echo json_encode(['status' => 'error', 'mensagem' => 'Erro ao alterar o status']);
            }
        } else {
            echo json_encode(['status' => 'error', 'mensagem' => 'Dados inválidos']);
        }
        break;


    case 'cadastrar':
        $descricao = $_POST['descricao'] ?? '';
        $cor = $_POST['cor'] ?? '';
        $icone = $_POST['icone'] ?? '';
        $status = $_POST['status_cat'] ?? 'ativo';

        $cat = new Categoria();
        $cat->setDescricao($descricao);
        $cat->setCor($cor);
        $cat->setIcone($icone);
        $cat->setStatus($status);

        $res = $cat->cadastrar();

        echo json_encode(['status' => 'success', 'mensagem' => 'Categoria cadastrada']);
        break;

    case 'atualizar':
        $id = $_POST['id_categoria'] ?? '';
        $descricao = $_POST['descricao'] ?? '';
        $cor = $_POST['cor'] ?? '';
        $icone = $_POST['icone'] ?? '';
        $status = $_POST['status_cat'] ?? 'ativo';

        $cat = new Categoria();
        $cat->setDescricao($descricao);
        $cat->setCor($cor);
        $cat->setIcone($icone);
        $cat->setStatus($status);

        $res = $cat->atualizar($id);

        echo json_encode(['status' => 'success', 'mensagem' => 'Categoria atualizada']);
        break;

    case 'excluir':
        $id = $_POST['id_categoria'] ?? null;

        if ($id) {
            $cat = new Categoria();
            $cat->setId($id);
            $res = $cat->excluir();
            echo json_encode(['status' => 'success', 'mensagem' => 'Categoria excluída']);
        } else {
            echo json_encode(['status' => 'error', 'mensagem' => 'ID não informado']);
        }
        break;

    default:
        echo json_encode(['status' => 'error', 'mensagem' => 'Ação inválida']);
        break;
}
