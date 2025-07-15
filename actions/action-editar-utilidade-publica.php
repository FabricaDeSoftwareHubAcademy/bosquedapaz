<?php 
require_once('../vendor/autoload.php');
use app\Controller\UtilidadePublica;

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $id_utilidade_publica = $_POST['id'] ?? null;
    $titulo = $_POST['titulo'] ?? '';
    $descricao = $_POST['descricao'] ?? ''; 
    $data_inicio = $_POST['data_inicio'] ?? '';
    $data_fim = $_POST['data_fim'] ?? '';
    $imagem = $_POST['imagem'] ?? '';

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
        $arquivo = $_FILES['imagem'];
        $nome_foto = $arquivo['name'];
        $extensao = strtolower(pathinfo($nome_foto, PATHINFO_EXTENSION));
        $permitidas = ['png', 'jpg', 'jpeg', 'jfif', 'svg'];

        if (in_array($extensao, $permitidas)) {
            $novo_nome = uniqid();
            $pasta = '../Public/imgs/uploads-utilidade/'; 
            $caminho = $pasta . $novo_nome . '.' . $extensao;

            if (!is_dir($pasta)) {
                mkdir($pasta, 0777, true);
            }

            if (move_uploaded_file($arquivo['tmp_name'], $caminho)) {
                $imagem = $caminho;
            } else {
                echo json_encode(['status' => 400, 'msg' => 'Falha ao mover o arquivo.']);
                exit;
            }
        } else {
            echo json_encode(['status' => 400, 'msg' => 'Extensão de arquivo inválida.']);
            exit;
        }
    } else {
        $imagem = "";
    }

    $utilidadePublica = new UtilidadePublica();
    $utilidadePublica->id_utilidade_publica = $id_utilidade_publica;
    $utilidadePublica->titulo = $titulo;
    $utilidadePublica->descricao = $descricao;
    $utilidadePublica->data_inicio = $data_inicio;
    $utilidadePublica->data_fim = $data_fim;
    $utilidadePublica->imagem = $imagem;
    // $utilidadePublica->status_utilidade = $status;

    if ($imagem !== '') {
        $utilidadePublica->imagem = $imagem;
    }

    if (!empty($_FILES['imagem']['name'])) {
        $extensoesPermitidas = ['jpg', 'jpeg', 'png', 'gif'];
        $extensao = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));

        if (!in_array($extensao, $extensoesPermitidas)) {
            echo json_encode(["status" => "error", "mensagem" => "Formato de imagem inválido."]);
            exit;
        }

        $nomeSeguro = uniqid('evento_', true) . '.' . $extensao;
        $caminhoTemporario = $_FILES['imagem']['tmp_name'];
        $diretorioDestino = __DIR__ . '/../Public/uploads/uploads-utilidade/';
        $destino = $diretorioDestino . $nomeSeguro;

        if (move_uploaded_file($caminhoTemporario, $destino)) {
            $eventoExistente = $evento->buscarPorId_evento($id);
            if ($eventoExistente) {
                $caminhoAntigo = __DIR__ . '/../Public/' . $eventoExistente->banner_evento;
                if (file_exists($caminhoAntigo)) {
                    unlink($caminhoAntigo);
                }
            }
            $evento->banner_evento = 'uploads/uploads-utilidade/' . $nomeSeguro;
        } else {
            echo json_encode(['status' => 'error', 'mensagem' => 'Erro ao mover a nova imagem.']);
            exit;
        }
    } else {
        $eventoExistente = $evento->buscarPorId_evento($id);
        if ($eventoExistente) {
            $evento->banner_evento = $eventoExistente->banner_evento;
        }
    }

    if ($utilidadePublica->editar()) {
        echo json_encode(['status' => 200, 'msg' => 'Editado com sucesso!!']);
    } else {
        echo json_encode(['status' => 400, 'msg' => 'Erro ao Editar!']);
    }
}
?>
