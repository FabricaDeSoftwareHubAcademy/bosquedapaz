<?php
require_once('../vendor/autoload.php');
use app\Controller\Atracao; 

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id_evento = $_GET['id_evento'] ?? null;
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validação básica dos campos
    $id_evento = $_POST['id_evento'] ?? null;
    $nome = $_POST['nome_atracao'] ?? '';
    $descricao = $_POST['descricao_atracao'] ?? '';
    $id_evento = $_POST['id_evento'] ?? '';

    // Verifica se foi feito upload da imagem
    if (isset($_FILES['foto_atracao']) && $_FILES['foto_atracao']['error'] === UPLOAD_ERR_OK) {
        $fotoTmp = $_FILES['foto_atracao']['tmp_name'];
        $fotoNome = uniqid() . '_' . basename($_FILES['foto_atracao']['name']);
        $destino = '../../Uploads/Atracoes/' . $fotoNome;

        if (!is_dir('../../Uploads/Atracoes/')) {
            mkdir('../../Uploads/Atracoes/', 0777, true);
        }

        if (move_uploaded_file($fotoTmp, $destino)) {
            // Instancia a classe e define os valores
            $atracao = new Atracao();
            $atracao->setNome($nome);
            $atracao->setDescricao($descricao);
            $atracao->setFoto($fotoNome);
            $atracao->setIdEvento($id_evento);

            // Tenta cadastrar
            if ($atracao->cadastrar()) {
                header('Location: ../Views/atracoes.php?status=success');
                exit;
            } else {
                echo "Erro ao cadastrar atração no banco de dados.";
            }
        } else {
            echo "Falha ao mover a imagem para o diretório de destino.";
        }
    } else {
        echo "Imagem da atração não enviada corretamente.";
    }
} else {
    echo "Requisição inválida.";
}