<?php 
require_once('../vendor/autoload.php');
use app\Controller\UtilidadePublica;

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    // Função auxiliar para limpar strings
    function limparTexto($texto) {
        return htmlspecialchars(trim($texto), ENT_QUOTES, 'UTF-8');
    }

    // Valida e limpa campos
    $id_utilidade_publica = isset($_POST['id']) && is_numeric($_POST['id']) ? (int)$_POST['id'] : null;
    $titulo = limparTexto($_POST['titulo'] ?? '');
    $descricao = limparTexto($_POST['descricao'] ?? ''); 
    $data_inicio = $_POST['data_inicio'] ?? '';
    $data_fim = $_POST['data_fim'] ?? '';
    $imagem = '';

    // Validação básica
    if (strlen($titulo) < 3 || strlen($titulo) > 50) {
        echo json_encode(['status' => 400, 'msg' => 'O título deve ter entre 3 e 50 caracteres.']);
        exit;
    }

    if (strlen($descricao) < 5 || strlen($descricao) > 2000) {
        echo json_encode(['status' => 400, 'msg' => 'A descrição deve ter entre 5 e 2000 caracteres.']);
        exit;
    }

    // Validação de data
    $data_regex = '/^\d{4}-\d{2}-\d{2}$/';
    if (!preg_match($data_regex, $data_inicio) || !preg_match($data_regex, $data_fim)) {
        echo json_encode(['status' => 400, 'msg' => 'Formato de data inválido.']);
        exit;
    }

    if (strtotime($data_fim) < strtotime($data_inicio)) {
        echo json_encode(['status' => 400, 'msg' => 'A data final não pode ser anterior à data inicial.']);
        exit;
    }

    // Imagem
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
        $arquivo = $_FILES['imagem'];
        $nome_foto = $arquivo['name'];
        $extensao = strtolower(pathinfo($nome_foto, PATHINFO_EXTENSION));
        $permitidas = ['png', 'jpg', 'jpeg', 'jfif', 'svg'];

        if (in_array($extensao, $permitidas)) {
            $novo_nome = uniqid('utilidade_', true);
            $pasta = '../Public/uploads/uploads-utilidade/'; 
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
    }

    // Criação do objeto
    $utilidadePublica = new UtilidadePublica();
    $utilidadePublica->id_utilidade_publica = $id_utilidade_publica;
    $utilidadePublica->titulo = $titulo;
    $utilidadePublica->descricao = $descricao;
    $utilidadePublica->data_inicio = $data_inicio;
    $utilidadePublica->data_fim = $data_fim;
    $utilidadePublica->imagem = $imagem;

    // Executa a edição
    if ($utilidadePublica->editar()) {
        echo json_encode(['status' => 200, 'msg' => 'Editado com sucesso!']);
    } else {
        echo json_encode(['status' => 400, 'msg' => 'Erro ao editar.']);
    }
}
?>
