<?php

require_once('../vendor/autoload.php');
use app\Controller\Expositor;
use app\suport\Csrf;

header('Content-Type: application/json');

if(isset($_GET['id_expo'])){
    $id = $_GET['id_expo'];
    $objExpositor = new Expositor();
    $dados = $objExpositor->listar("id_expositor = ". $id);
    
    $array = [
        "status" => 200,
        "msg" => "Dados requisitados com sucesso!!",
        "data" => $dados
    ];
    
    echo json_encode($array);
}

if(isset($_POST['tolkenCsrf']) && Csrf::validateTolkenCsrf($_POST['tolkenCsrf']) && isset($_POST['descricao'])){
    
    $id_expositor = $_POST['id_expositor'];
    $objExpo = new Expositor();
    
    // Configurar dados básicos
    $objExpo->setNome_marca($_POST['nome']);
    $objExpo->setDescricao($_POST['descricao']);
    $objExpo->setlink_instagram($_POST['instagram']);
    $objExpo->setLink_facebook($_POST['facebook']);
    $objExpo->setWhats($_POST['whatsapp']);
    $objExpo->setEmail($_POST['email']);
    
    // Processar imagens se foram enviadas
    $imagensProcessadas = [];
    $uploadDir = '../uploads/expositores/'; // Defina o diretório de upload
    
    // Criar diretório se não existir
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    
    // Processar cada imagem (assumindo até 6 imagens)
    for ($i = 1; $i <= 6; $i++) {
        $inputName = "foto_produto_$i";
        
        if (isset($_FILES[$inputName]) && $_FILES[$inputName]['error'] === UPLOAD_ERR_OK) {
            $arquivo = $_FILES[$inputName];
            
            // Validar tipo de arquivo
            $tiposPermitidos = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
            if (!in_array($arquivo['type'], $tiposPermitidos)) {
                continue; // Pula arquivo inválido
            }
            
            // Validar tamanho (máximo 5MB)
            if ($arquivo['size'] > 5 * 1024 * 1024) {
                continue; // Pula arquivo muito grande
            }
            
            // Gerar nome único para o arquivo
            $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
            $nomeArquivo = 'expositor_' . $id_expositor . '_img_' . $i . '_' . time() . '.' . $extensao;
            $caminhoCompleto = $uploadDir . $nomeArquivo;
            
            // Fazer upload do arquivo
            if (move_uploaded_file($arquivo['tmp_name'], $caminhoCompleto)) {
                $imagensProcessadas[] = [
                    'posicao' => $i,
                    'caminho' => $caminhoCompleto
                ];
            }
        }
    }
    
    // Definir imagens no objeto expositor
    if (!empty($imagensProcessadas)) {
        $objExpo->setImagens($imagensProcessadas);
    }
    
    // Atualizar dados
    $result = $objExpo->atualizar($id_expositor);
    
    if ($result) {
        $array = [
            "status" => 200,
            "msg" => "Perfil atualizado com sucesso!",
            "imagens_processadas" => count($imagensProcessadas)
        ];
    } else {
        $array = [
            "status" => 500,
            "msg" => "Erro ao atualizar perfil!"
        ];
    }
    
    echo json_encode($array);
}
?>