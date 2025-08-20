<?php

require_once('../vendor/autoload.php');
require_once('../app/helpers/login.php');

use app\Controller\Expositor;
use app\Controller\Imagem;
use app\suport\Csrf;

header('Content-Type: application/json');

function linkInstagram($ins){
    return 'https://instagram.com/'.trim($ins, '@');
}
function linkWhatsapp($whats){
    return 'https://wa.me/55' . $whats;
}
function linkFacebook($facebook){
    return 'https://www.facebook.com/' . $facebook;
}
function limparMascaraTelefone($telefone) {
    return preg_replace('/[^0-9]/', '', $telefone);
}

// Função para upload de imagens
function uploadImagem($img, $tipo = 'produto') {
    // Sempre usar a pasta uploads-expositor para ambos logo e produtos
    $caminho = '../Public/uploads/uploads-expositor/';
    
    // Criar diretório se não existir
    if (!is_dir($caminho)) {
        mkdir($caminho, 0777, true);
    }
    
    $new_img = $img['name'];
    $new_name = uniqid();
    $extencao_imagem = strtolower(pathinfo($new_img, PATHINFO_EXTENSION));
    
    // Validar extensão
    $extensoes_permitidas = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($extencao_imagem, $extensoes_permitidas)) {
        http_response_code(400);
        echo json_encode([
            'status' => 400,
            'msg' => ucfirst($extencao_imagem).', não é permitido.',
        ]);
        exit;
    }
    
    // Validar tamanho (5MB)
    if (($img['size'] / 1024 / 1024) > 2) {
        http_response_code(400);
        echo json_encode([
            'status' => 400,
            'msg' => ucfirst($extencao_imagem).', imagem muito grande',
        ]);
        exit;
    }
    
    $caminho_img = $caminho . $new_name . '.' . $extencao_imagem;
    
    if (move_uploaded_file($img['tmp_name'], $caminho_img)) {
        return $caminho_img;
    }
    
    return false;
}

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
    if(!confirmaLogin(1)){
        echo json_encode([
            'msg' => 'Login Inválido',
        ]);
        http_response_code(400);
        exit;
    }
    
    $id_expositor = $_POST['id_expositor'];
    $objExpo = new Expositor();
    $objImagem = new Imagem();

    $email = htmlspecialchars(strip_tags($_POST['email']));
    $id = htmlspecialchars(strip_tags($_POST['id_login']));
    $emailExiste = $objExpo->emailExiste($email);
    if($emailExiste){
        if ($emailExiste['id_login'] != $id) {
            http_response_code(400);
            echo json_encode([
                'status' => 400,
                'msg' => 'Não é possivel cadastrar, email existente',
            ]);
            exit;
        }
    }
    
    // Configurar dados básicos
    $objExpo->setNome_marca(htmlspecialchars(strip_tags($_POST['nome'])));
    $objExpo->setDescricao(htmlspecialchars(strip_tags($_POST['descricao'])));
    $objExpo->setlink_instagram(linkInstagram(htmlspecialchars(strip_tags($_POST['instagram']))));
    $objExpo->setLink_facebook(htmlspecialchars(strip_tags($_POST['facebook'])));
    $objExpo->setWhats(linkWhatsapp(limparMascaraTelefone(htmlspecialchars(strip_tags($_POST['whatsapp'])))));
    $objExpo->setTelefone(limparMascaraTelefone(htmlspecialchars(strip_tags($_POST['whatsapp']))));
    $objExpo->setEmail($email);
    $objExpo->setNum_barraca(htmlspecialchars(strip_tags($_POST['num-barraca'])));
    $objExpo->setCor_rua(htmlspecialchars(strip_tags($_POST['cor-rua'])));
    $objExpo->setId_categoria(htmlspecialchars(strip_tags($_POST['categoria'])));
    
    $imagensProcessadas = [];
    $erros = [];
    
    try {
        // Processar logo da empresa
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $logo_path = uploadImagem($_FILES['foto']);
            if ($logo_path) {
                // Atualizar logo na tabela pessoa
                $objExpo->setFoto_perfil('../../'.$logo_path);
                $imagensProcessadas[] = 'logo';
            } else {
                $erros[] = 'Erro ao fazer upload da logo';
            }
        }
        
        // Processar imagens dos produtos
        $imagens_existentes = $objImagem->buscarPorExpositor($id_expositor);
        
        for ($i = 1; $i <= 6; $i++) {
            $campo_imagem = "foto_produto_$i";
            
            if (isset($_FILES[$campo_imagem]) && $_FILES[$campo_imagem]['error'] === UPLOAD_ERR_OK) {
                $novo_caminho = uploadImagem($_FILES[$campo_imagem]);
                
                if ($novo_caminho) {
                    // Verificar se já existe imagem nesta posição
                    if (isset($imagens_existentes[$i-1])) {
                        // Atualizar imagem existente
                        $id_imagem = $imagens_existentes[$i-1]['id_imagem'];
                        
                        // Deletar arquivo antigo
                        $caminho_antigo = $imagens_existentes[$i-1]['caminho'];
                        if (file_exists('../' . $caminho_antigo)) {
                            unlink('../' . $caminho_antigo);
                        }
                        
                        // Atualizar no banco
                        $objImagem->atualizar($id_imagem, $novo_caminho);
                    } else {
                        // Inserir nova imagem
                        $objImagem->caminho = $novo_caminho;
                        $objImagem->id_expositor = $id_expositor;
                        $objImagem->cadastro();
                    }
                    
                    $imagensProcessadas[] = "produto_$i";
                } else {
                    $erros[] = "Erro ao fazer upload da imagem do produto $i";
                }
            }
        }
        
        // Atualizar dados básicos do expositor
        $result = $objExpo->atualizar($id_expositor);
        
        if ($result) {
            $array = [
                "status" => 200,
                "msg" => "Perfil atualizado com sucesso!",
                "imagens_processadas" => count($imagensProcessadas),
                "detalhes" => $imagensProcessadas,
                "erros" => $erros
            ];
        } else {
            $array = [
                "status" => 500,
                "msg" => "Erro ao atualizar dados básicos do perfil!",
                "erros" => $erros
            ];
        }
        
    } catch (Exception $e) {
        $array = [
            "status" => 500,
            "msg" => "Erro interno do servidor: " . $e->getMessage()
        ];
    }
    
    echo json_encode($array);
}

?>