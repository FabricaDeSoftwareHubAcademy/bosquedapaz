<?php

// require_once('../vendor/autoload.php');
// use app\Controller\Expositor;
// use app\suport\Csrf;

// header('Content-Type: application/json');

// if(isset($_GET['id_expo'])){
//     $id = $_GET['id_expo'];
//     $objExpositor = new Expositor();
//     $dados = $objExpositor->listar("id_expositor = ". $id);
    
//     $array = [
//         "status" => 200,
//         "msg" => "Dados requisitados com sucesso!!",
//         "data" => $dados
//     ];
    
//     echo json_encode($array);
// }

// if(isset($_POST['tolkenCsrf']) && Csrf::validateTolkenCsrf($_POST['tolkenCsrf']) && isset($_POST['descricao'])){
    
//     $id_expositor = $_POST['id_expositor'];
//     $objExpo = new Expositor();
    
//     // Configurar dados básicos
//     $objExpo->setNome_marca($_POST['nome']);
//     $objExpo->setDescricao($_POST['descricao']);
//     $objExpo->setlink_instagram($_POST['instagram']);
//     $objExpo->setLink_facebook($_POST['facebook']);
//     $objExpo->setWhats($_POST['whatsapp']);
//     $objExpo->setEmail($_POST['email']);
//     $imagensProcessadas = [];

//     $result = $objExpo->atualizar($id_expositor);
    
//     if ($result) {
//         $array = [
//             "status" => 200,
//             "msg" => "Perfil atualizado com sucesso!",
//             "imagens_processadas" => count($imagensProcessadas)
//         ];
//     } else {
//         $array = [
//             "status" => 500,
//             "msg" => "Erro ao atualizar perfil!"
//         ];
//     }
    
//     echo json_encode($array);
// }


// require_once('../vendor/autoload.php');
// use app\Controller\Expositor;
// use app\Models\Database;
// use app\Controller\Imagem;
// use app\suport\Csrf;
// require_once('../app/Models/Database.php');
// $db = new Database('expositor');
// $conn = $db->getConnection(); // Obtém a conexão

// header('Content-Type: application/json');

// // Função para fazer upload de imagem
// function uploadImagem($arquivo, $tipo = 'produto') {
//     $diretorio = $tipo === 'perfil' ? 
//         '../Public/uploads/uploads-expositor-perfil/' : 
//         '../Public/uploads/uploads-expositor/';
    
//     // Criar diretório se não existir
//     if (!is_dir($diretorio)) {
//         mkdir($diretorio, 0777, true);
//     }
    
//     $nomeOriginal = $arquivo['name'];
//     $nomeUnico = uniqid();
//     $extensao = strtolower(pathinfo($nomeOriginal, PATHINFO_EXTENSION));
    
//     // Validar extensão
//     $extensoesPermitidas = ['jpg', 'jpeg', 'png', 'webp'];
//     if (!in_array($extensao, $extensoesPermitidas)) {
//         return false;
//     }
    
//     // Validar tamanho (máximo 5MB)
//     $tamanhoMaximo = 5 * 1024 * 1024; // 5MB em bytes
//     if ($arquivo['size'] > $tamanhoMaximo) {
//         return false;
//     }
    
//     $caminhoCompleto = $diretorio . $nomeUnico . '.' . $extensao;
    
//     if (move_uploaded_file($arquivo['tmp_name'], $caminhoCompleto)) {
//         // Retornar caminho relativo para salvar no banco
//         return str_replace('../', '', $caminhoCompleto);
//     }
    
//     return false;
// }

// if(isset($_GET['id_expo'])){
//     $id = $_GET['id_expo'];
//     $objExpositor = new Expositor();
//     $dados = $objExpositor->listar("id_expositor = ". $id);
    
//     $array = [
//         "status" => 200,
//         "msg" => "Dados requisitados com sucesso!!",
//         "data" => $dados
//     ];
    
//     echo json_encode($array);
// }

// if(isset($_POST['tolkenCsrf']) && Csrf::validateTolkenCsrf($_POST['tolkenCsrf']) && isset($_POST['descricao'])){
    
//     try {
//         $id_expositor = $_POST['id_expositor'];
//         $objExpo = new Expositor();
        
//         // Configurar dados básicos
//         $objExpo->setNome_marca($_POST['nome']);
//         $objExpo->setDescricao($_POST['descricao']);
//         $objExpo->setlink_instagram($_POST['instagram']);
//         $objExpo->setLink_facebook($_POST['facebook']);
//         $objExpo->setWhats($_POST['whatsapp']);
//         $objExpo->setEmail($_POST['email']);
        
//         $imagensProcessadas = [];
//         $errosImagens = [];
//         $novasImagens = [];

//         // Processar upload da imagem de perfil (logo)
//         if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
//             $caminhoLogo = uploadImagem($_FILES['foto'], 'perfil');
            
//             if ($caminhoLogo) {
//                 $objExpo->setFoto_perfil($caminhoLogo);
//                 $imagensProcessadas[] = "Logo atualizada";
//             } else {
//                 $errosImagens[] = "Erro ao fazer upload da logo";
//             }
//         }

//         // Processar imagens dos produtos
//         // ================== CONFIGURAÇÃO DE UPLOAD ==================
//         $diretorioUpload = __DIR__ . "/../Public/uploads/expositores/";
//         if (!is_dir($diretorioUpload)) {
//             mkdir($diretorioUpload, 0777, true);
//         }

//         // ================== LOGO DA EMPRESA ==================
//         if (isset($_FILES['foto']) && $_FILES['foto']['size'] > 0) {
//             $nomeLogo = uniqid() . "-" . preg_replace("/[^a-zA-Z0-9\.\-_]/", "_", basename($_FILES['foto']['name']));
//             $caminhoFisicoLogo = $diretorioUpload . $nomeLogo;
//             $caminhoBancoLogo = "Public/uploads/expositores/" . $nomeLogo;

//             if (move_uploaded_file($_FILES['foto']['tmp_name'], $caminhoFisicoLogo)) {
//                 // Atualiza a logo na tabela pessoa
//                 $sqlLogo = "UPDATE pessoa SET img_perfil = ? WHERE id_pessoa = ?";
//                 $stmtLogo = $conn->prepare($sqlLogo);
//                 $stmtLogo->execute([$caminhoBancoLogo, $_POST['id_pessoa']]);
//             }
//         }

//         // ================== IMAGENS DE PRODUTOS ==================
//         $totalProdutos = 6; // quantidade máxima de imagens de produto

//         for ($i = 1; $i <= $totalProdutos; $i++) {
//             $idImagem = $_POST["id_imagem_$i"] ?? null;
//             $imagemExistente = $_POST["imagem_existente_$i"] ?? null;
//             $campoArquivo = "foto_produto_$i";

//             if (isset($_FILES[$campoArquivo]) && $_FILES[$campoArquivo]['size'] > 0) {
//                 // Upload nova imagem
//                 $nomeArquivo = uniqid() . "-" . preg_replace("/[^a-zA-Z0-9\.\-_]/", "_", basename($_FILES[$campoArquivo]['name']));
//                 $caminhoFisico = $diretorioUpload . $nomeArquivo;
//                 $caminhoBanco = "Public/uploads/expositores/" . $nomeArquivo;

//                 if (move_uploaded_file($_FILES[$campoArquivo]['tmp_name'], $caminhoFisico)) {
//                     if ($idImagem) {
//                         // Atualiza imagem existente
//                         $sql = "UPDATE imagem SET caminho = ? WHERE id_imagem = ?";
//                         $stmt = $conn->prepare($sql);
//                         $stmt->execute([$caminhoBanco, $idImagem]);
//                     } else {
//                         // Insere nova imagem vinculada ao expositor
//                         $sql = "INSERT INTO imagem (caminho, id_expositor) VALUES (?, ?)";
//                         $stmt = $conn->prepare($sql);
//                         $stmt->execute([$caminhoBanco, $_POST['id_expositor']]);
//                     }
//                 }
//             } elseif ($imagemExistente) {
//                 // Mantém imagem antiga - não altera no banco
//                 continue;
//             }
//         }  

//         // Atualizar dados básicos do expositor (incluindo imagens)
//         $result = $objExpo->atualizar($id_expositor, $novasImagens);
        
//         if ($result) {
//             $array = [
//                 "status" => 200,
//                 "msg" => "Perfil atualizado com sucesso!",
//                 "imagens_processadas" => $imagensProcessadas,
//                 "total_imagens" => count($imagensProcessadas),
//                 "erros_imagens" => $errosImagens
//             ];
//         } else {
//             $array = [
//                 "status" => 500,
//                 "msg" => "Erro ao atualizar perfil!",
//                 "erros_imagens" => $errosImagens
//             ];
//         }
        
//     } catch (\Exception $e) {
//         error_log("Erro na edição do expositor: " . $e->getMessage());
//         $array = [
//             "status" => 500,
//             "msg" => "Erro interno no servidor: " . $e->getMessage()
//         ];
//     }
    
//     echo json_encode($array);
// }

require_once('../vendor/autoload.php');
use app\Controller\Expositor;
use app\Models\Database;
use app\Controller\Imagem;
use app\suport\Csrf;
require_once('../app/Models/Database.php');

header('Content-Type: application/json');

// Função para fazer upload de imagem
function uploadImagem($arquivo, $tipo = 'produto') {
    $diretorio = $tipo === 'perfil' ? 
        '../Public/uploads/uploads-expositor-perfil/' : 
        '../Public/uploads/uploads-expositor/';
    
    // Criar diretório se não existir
    if (!is_dir($diretorio)) {
        mkdir($diretorio, 0777, true);
    }
    
    $nomeOriginal = $arquivo['name'];
    $nomeUnico = uniqid();
    $extensao = strtolower(pathinfo($nomeOriginal, PATHINFO_EXTENSION));
    
    // Validar extensão
    $extensoesPermitidas = ['jpg', 'jpeg', 'png', 'webp'];
    if (!in_array($extensao, $extensoesPermitidas)) {
        return false;
    }
    
    // Validar tamanho (máximo 5MB)
    $tamanhoMaximo = 5 * 1024 * 1024; // 5MB em bytes
    if ($arquivo['size'] > $tamanhoMaximo) {
        return false;
    }
    
    $caminhoCompleto = $diretorio . $nomeUnico . '.' . $extensao;
    
    if (move_uploaded_file($arquivo['tmp_name'], $caminhoCompleto)) {
        // Retornar caminho relativo para salvar no banco
        return str_replace('../', '', $caminhoCompleto);
    }
    
    return false;
}

// Função para deletar arquivo antigo
function deletarArquivoAntigo($caminho) {
    if ($caminho && file_exists('../' . $caminho)) {
        unlink('../' . $caminho);
    }
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
    
    try {
        $db = new Database('expositor');
        $conn = $db->getConnection();
        
        $id_expositor = $_POST['id_expositor'];
        $objExpo = new Expositor();
        
        // Buscar dados do expositor para obter id_pessoa
        $dadosExpositor = $objExpo->listar("id_expositor = " . $id_expositor);
        if (!$dadosExpositor || !isset($dadosExpositor[0])) {
            throw new Exception("Expositor não encontrado");
        }
        $id_pessoa = $dadosExpositor[0]['id_pessoa'];
        
        // Configurar dados básicos
        $objExpo->setNome_marca($_POST['nome']);
        $objExpo->setDescricao($_POST['descricao']);
        $objExpo->setlink_instagram($_POST['instagram']);
        $objExpo->setLink_facebook($_POST['facebook']);
        $objExpo->setWhats($_POST['whatsapp']);
        $objExpo->setEmail($_POST['email']);
        
        $imagensProcessadas = [];
        $errosImagens = [];

        // ================== LOGO DA EMPRESA ==================
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK && $_FILES['foto']['size'] > 0) {
            $caminhoLogo = uploadImagem($_FILES['foto'], 'perfil');
            
            if ($caminhoLogo) {
                // Buscar logo atual para deletar
                $sqlBuscarLogo = "SELECT img_perfil FROM pessoa WHERE id_pessoa = ?";
                $stmtBuscarLogo = $conn->prepare($sqlBuscarLogo);
                $stmtBuscarLogo->execute([$id_pessoa]);
                $logoAtual = $stmtBuscarLogo->fetch(PDO::FETCH_ASSOC);
                
                // Deletar logo antiga se existir
                if ($logoAtual && $logoAtual['img_perfil']) {
                    deletarArquivoAntigo($logoAtual['img_perfil']);
                }
                
                // Atualizar com nova logo
                $objExpo->setFoto_perfil($caminhoLogo);
                $sqlLogo = "UPDATE pessoa SET img_perfil = ? WHERE id_pessoa = ?";
                $stmtLogo = $conn->prepare($sqlLogo);
                $stmtLogo->execute([$caminhoLogo, $id_pessoa]);
                
                $imagensProcessadas[] = "Logo atualizada";
            } else {
                $errosImagens[] = "Erro ao fazer upload da logo";
            }
        }

        // ================== IMAGENS DE PRODUTOS ==================
        $totalProdutos = 6;
        $objImagem = new Imagem();

        for ($i = 1; $i <= $totalProdutos; $i++) {
            $idImagem = $_POST["id_imagem_$i"] ?? null;
            $imagemExistente = $_POST["imagem_existente_$i"] ?? null;
            $campoArquivo = "foto_produto_$i";

            // Se há uma nova imagem sendo enviada
            if (isset($_FILES[$campoArquivo]) && $_FILES[$campoArquivo]['error'] == UPLOAD_ERR_OK && $_FILES[$campoArquivo]['size'] > 0) {
                $novoCaminho = uploadImagem($_FILES[$campoArquivo], 'produto');
                
                if ($novoCaminho) {
                    if ($idImagem && $idImagem !== '') {
                        // Atualizar imagem existente
                        
                        // Buscar caminho da imagem atual para deletar
                        $sqlBuscarImagem = "SELECT caminho FROM imagem WHERE id_imagem = ?";
                        $stmtBuscarImagem = $conn->prepare($sqlBuscarImagem);
                        $stmtBuscarImagem->execute([$idImagem]);
                        $imagemAtual = $stmtBuscarImagem->fetch(PDO::FETCH_ASSOC);
                        
                        // Deletar imagem antiga
                        if ($imagemAtual && $imagemAtual['caminho']) {
                            deletarArquivoAntigo($imagemAtual['caminho']);
                        }
                        
                        // Atualizar no banco
                        $sql = "UPDATE imagem SET caminho = ? WHERE id_imagem = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute([$novoCaminho, $idImagem]);
                        
                        $imagensProcessadas[] = "Produto $i atualizado";
                    } else {
                        // Inserir nova imagem
                        $sql = "INSERT INTO imagem (caminho, id_expositor) VALUES (?, ?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute([$novoCaminho, $id_expositor]);
                        
                        $imagensProcessadas[] = "Produto $i adicionado";
                    }
                } else {
                    $errosImagens[] = "Erro ao fazer upload da imagem do produto $i";
                }
            }
            // Se não há nova imagem mas existe uma imagem existente, manter ela
            // (não faz nada, apenas mantém)
        }

        // Atualizar dados básicos do expositor
        $result = $objExpo->atualizar($id_expositor);
        
        if ($result) {
            $array = [
                "status" => 200,
                "msg" => "Perfil atualizado com sucesso!",
                "imagens_processadas" => $imagensProcessadas,
                "total_imagens" => count($imagensProcessadas),
                "erros_imagens" => $errosImagens
            ];
        } else {
            $array = [
                "status" => 500,
                "msg" => "Erro ao atualizar dados básicos do perfil!",
                "erros_imagens" => $errosImagens
            ];
        }
        
    } catch (\Exception $e) {
        error_log("Erro na edição do expositor: " . $e->getMessage());
        $array = [
            "status" => 500,
            "msg" => "Erro interno no servidor: " . $e->getMessage()
        ];
    }
    
    echo json_encode($array);
}

?>