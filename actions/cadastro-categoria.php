<?php
require_once('../vendor/autoload.php');

use app\Controller\Categoria;

header('Content-Type: application/json');

// Função para sanitizar texto
function sanitizarTexto($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

// Verifica se todos os dados esperados foram recebidos via POST
if (isset($_POST['descricao'], $_POST['cor']) && isset($_FILES['icone'])) {
    $descricao = sanitizarTexto($_POST['descricao']);
    $cor = $_POST['cor']; // Não precisa de sanitização complexa como texto
    $arquivo = $_FILES['icone'];

    // --- Validações ---
    if (empty($descricao)) {
        echo json_encode(['status' => 'error', 'message' => 'O nome da categoria é obrigatório.']);
        exit;
    }
    if (empty($cor)) {
        echo json_encode(['status' => 'error', 'message' => 'A cor é obrigatória.']);
        exit;
    }
    if ($arquivo['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(['status' => 'error', 'message' => 'Nenhum ícone foi enviado ou ocorreu um erro no upload.']);
        exit;
    }

    // --- Validação e Processamento do Arquivo ---
    $extensao = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
    $extensoesPermitidas = ['png', 'jpg', 'jpeg', 'jfif', 'svg'];
    if (!in_array($extensao, $extensoesPermitidas)) {
        echo json_encode(['status' => 'error', 'message' => 'Formato de ícone inválido. Use jpg, png, svg ou gif.']);
        exit;
    }

    $tamanhoMaximo = 2 * 1024 * 1024; // 2MB
    if ($arquivo['size'] > $tamanhoMaximo) {
        echo json_encode(['status' => 'error', 'message' => 'Arquivo muito grande. O máximo permitido é 2MB.']);
        exit;
    }

    // --- Tratamento de Caminhos e Upload ---
    
    // Caminho no sistema de arquivos para onde o arquivo será movido (com '../')
    $diretorioDeUpload = __DIR__ . '/../Public/uploads/uploads-categoria/';
    
    // Caminho que será salvo no banco de dados (sem '../', relativo à pasta Public)
    $caminhoParaBanco = 'uploads/uploads-categoria/';

    // Cria o diretório se ele não existir
    if (!is_dir($diretorioDeUpload)) {
        mkdir($diretorioDeUpload, 0777, true);
    }

    $novo_nome = uniqid('cat_', true) . '.' . $extensao;
    $caminhoCompletoParaMover = $diretorioDeUpload . $novo_nome;

    if (!move_uploaded_file($arquivo['tmp_name'], $caminhoCompletoParaMover)) {
        echo json_encode(['status' => 'error', 'message' => 'Falha ao salvar o arquivo no servidor.']);
        exit;
    }
    
    $caminhoFinalParaBanco = $caminhoParaBanco . $novo_nome;

    // --- Criação e Cadastro do Objeto ---

    // Cria uma nova instância da Categoria
    $cat = new Categoria();
    
    // **CORREÇÃO PRINCIPAL:** Usa os métodos SETTERS para definir os valores
    $cat->setDescricao($descricao);
    $cat->setCor($cor);
    $cat->setIcone($caminhoFinalParaBanco); // Salva o caminho limpo no objeto

    // Chama o método para cadastrar no banco
    $res = $cat->cadastrar();

    if ($res) {
        echo json_encode(['status' => 'OK', 'message' => 'Categoria cadastrada com sucesso!']);
    } else {
        // Em caso de falha, é uma boa prática remover o arquivo que foi salvo
        unlink($caminhoCompletoParaMover);
        echo json_encode(['status' => 'error', 'message' => 'Erro ao cadastrar a categoria no banco de dados.']);
    }

} else {
    echo json_encode(['status' => 'error', 'message' => 'Dados do formulário incompletos ou inválidos.']);
}