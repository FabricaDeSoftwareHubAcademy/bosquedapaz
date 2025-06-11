<?php
require_once('../vendor/autoload.php');
use app\Controller\Categoria;

header('Content-Type: application/json');

//  Função auxiliar para limpar os dados de texto
function sanitizarTexto($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

// 🚦 Apenas requisições POST são permitidas
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pega o ID e garante que seja um inteiro
    $id = (int) ($_POST['id_categoria'] ?? 0);

    // Sanitiza e pega os outros campos do formulário
    $descricao = sanitizarTexto($_POST['descricao'] ?? '');
    $cor = $_POST['cor'] ?? ''; // Cores não precisam de sanitização complexa

    // 📋 Validação dos campos obrigatórios
    if (empty($id) || empty($descricao) || empty($cor)) {
        echo json_encode(['status' => 'error', 'mensagem' => 'Preencha todos os campos obrigatórios.']);
        exit;
    }

    $categoriaController = new Categoria();
    
    // Busca a categoria existente para obter o caminho do ícone antigo
    $categoriaExistente = $categoriaController->buscarPorId($id);
    if (!$categoriaExistente) {
        echo json_encode(['status' => 'error', 'mensagem' => 'Categoria não encontrada.']);
        exit;
    }
    
    // Define o caminho do ícone como o já existente por padrão
    $categoriaController->setIcone($categoriaExistente->getIcone());

    // 👇 Verifica se um novo ícone foi enviado
    if (!empty($_FILES['icone']['name'])) {
        $extensoesPermitidas = ['jpg', 'jpeg', 'png', 'svg', 'gif'];
        $nomeArquivo = $_FILES['icone']['name'];
        $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));

        // Valida a extensão do arquivo
        if (!in_array($extensao, $extensoesPermitidas)) {
            echo json_encode(["status" => "error", "mensagem" => "Formato de ícone inválido. Use jpg, png, svg ou gif."]);
            exit;
        }

        // Cria um nome de arquivo único e seguro para evitar conflitos
        $nomeSeguro = uniqid('categoria_', true) . '.' . $extensao;
        $caminhoTemporario = $_FILES['icone']['tmp_name'];
        $diretorioDestino = __DIR__ . '/../Public/uploads/uploads-categorias/';
        $destino = $diretorioDestino . $nomeSeguro;

        // Cria o diretório de uploads se ele não existir
        if (!is_dir($diretorioDestino)) {
            mkdir($diretorioDestino, 0777, true);
        }

        // Move o arquivo enviado para o diretório de destino
        if (move_uploaded_file($caminhoTemporario, $destino)) {
            // Se o upload foi bem-sucedido, remove o ícone antigo
            $caminhoIconeAntigo = __DIR__ . '/../Public/' . $categoriaExistente->getIcone();
            if (file_exists($caminhoIconeAntigo) && is_file($caminhoIconeAntigo)) {
                unlink($caminhoIconeAntigo);
            }
            
            // Define o caminho do novo ícone para salvar no banco
            $categoriaController->setIcone('uploads/uploads-categorias/' . $nomeSeguro);
        } else {
            echo json_encode(['status' => 'error', 'mensagem' => 'Erro ao salvar o novo ícone.']);
            exit;
        }
    }

    // Define os demais dados no objeto
    $categoriaController->setDescricao($descricao);
    $categoriaController->setCor($cor);

    // Tenta atualizar a categoria no banco de dados
    $resultado = $categoriaController->atualizar($id);

    // Retorna uma resposta JSON informando o sucesso ou a falha da operação
    echo json_encode([
        'status' => $resultado ? 'success' : 'error',
        'mensagem' => $resultado ? 'Categoria atualizada com sucesso.' : 'Falha ao atualizar a categoria.'
    ]);
} else {
    // Se a requisição não for POST, retorna um erro
    echo json_encode(['status' => 'error', 'mensagem' => 'Requisição inválida.']);
}