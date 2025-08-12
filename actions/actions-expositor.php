<?php

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);


//////// IMPORTS DE ARQUIVOS \\\\\\\\\\\\\\\\\

require_once('../vendor/autoload.php');

use app\Controller\Expositor;
use app\Controller\Imagem;
use app\suport\Csrf;


/////////////////// FUNCOES \\\\\\\\\\\\\\\\

function uploadImagem($img) {
    // chmod ("../Public/uploads/uploads-carrosel/", 0777);
    $caminho = '../Public/uploads/uploads-expositor/';
    $new_img = $img['name'];
    $new_name = uniqid();
    $extencao_imagem = strtolower(pathinfo($new_img, PATHINFO_EXTENSION));

    $caminho_img = $caminho . $new_name. '.'. $extencao_imagem;
        
    $upload_img = move_uploaded_file($img['tmp_name'], $caminho_img);

    return $caminho_img;
}

function getImagens($imgs){
    $arrayImagens = array();

    foreach ($imgs as $key => $value) {
    
        $i = 0;
        
        do {
            $arrayImagens['imagem'.$i+1][$key] = $imgs[$key][$i];
            $i++;
        } while ($i < count($imgs['name']));
    }

    return $arrayImagens;
}

function limparMaskTelefone($tel){
    return preg_replace('/[^0-9]/', '', $tel);
}

function linkInstagram($ins){
    return 'https://instagram.com/'.trim($ins, '@');
}

/////////////////// MEDOTO POST ///////////////////

if(isset($_POST['tolkenCsrf']) && Csrf::validateTolkenCsrf($_POST['tolkenCsrf'])){
    try {
    
    $expositor = new Expositor();
    

    ///////////////  INATIVAR UM EXPOSITOR \\\\\\\\\\\\\\\\\\\\\
    if(isset($_POST['deletar'])){

        $id = htmlspecialchars(strip_tags($_POST['id']));
        $status = htmlspecialchars(strip_tags($_POST['status']));

        $mudarStatus = $expositor->alterarStatus($id, $status);

        if ($mudarStatus){
            echo json_encode([
                'status' => 200, 
                'msg' => 'Status alterado com sucesso', 
            ]);
            exit;
        }else {
            echo json_encode([
                'status' => 400, 
                'msg' => 'Erro ao alterar o status do expositor', 
            ]);
            exit;
        }

    //////////// CADASTRAR UM NOVO EXPOSITOR \\\\\\\\\\\\\\\\
    }else if (isset($_POST['cadastrar'])) {

            ////////////////// VALIDANDO O EMAIL\\\\\\\\\\\\\

            $email = htmlspecialchars(strip_tags($_POST['email']));
            
            $emailExiste = $expositor->emailExiste($email);
            if($emailExiste){
                echo json_encode([
                    'msg' => 'Não é possivel cadastrar, email existente',
                ]);
                http_response_code(400);
                exit;
            }

            $cpf = htmlspecialchars(strip_tags($_POST['cpf']));
            
            $cpfExiste = $expositor->cpfExiste($cpf);
            if($cpfExiste){
                echo json_encode([
                    'msg' => 'Não é possivel cadastrar, CPF existente',
                ]);
                http_response_code(400);
                exit;
            }

            ////// SETANDO DADOS \\\\\\\\\\\\

            /////// DADOS LOGIN \\\\\\\\\\\
            
            $expositor->setEmail($email);

            /////// DADOS ENDEREÇO \\\\\\\\
    
            $expositor->setCidade(htmlspecialchars(strip_tags($_POST['cidade'])));
    
            ////// DADOS PESSOA \\\\\\\\\\\
            $expositor->setNome(            htmlspecialchars(strip_tags($_POST['nome'])));
            $expositor->setCpf(             htmlspecialchars(strip_tags($_POST['cpf'])));
            $expositor->setWhats(           'https://wa.me/55'.limparMaskTelefone(htmlspecialchars(strip_tags($_POST['whats']))));
            $expositor->setTelefone(        limparMaskTelefone(htmlspecialchars(strip_tags($_POST['whats']))));
            $expositor->setlink_instagram(  linkInstagram(htmlspecialchars(strip_tags($_POST['link_instagram']))));

            $aceitou = '';

            if (isset($_POST['aceitou_termos'])) {
                $aceitou = $_POST['aceitou_termos']; // vem do input hidden do admin
            } elseif (isset($_SESSION['aceitou_termos'])) {
                $aceitou = $_SESSION['aceitou_termos']; // vem da sessão do visitante
            }

            

            //////// IMAGENS \\\\\\\\


            /// verificando se exite imagens
            if (isset($_FILES['imagens'])) {
                if (count($_FILES['imagens']['name']) == 6){
                    ///////// MOVENDO A IMAGEM DE PERFIL ////////////
                    
                    // separa es imagens
                    $imagens = getImagens($_FILES['imagens']);
    
                    $caminhosImagens = array();
                    
                    // move as imagens
                    foreach ($imagens as $img) {
                        // verifica quantos mb
                        if( 5 < ($img['size'] / 1024) / 1024){
                            echo json_encode([
                                'msg' => 'Imagem enviada muito grande', 
                            ]);
                            http_response_code(400);
                            exit;
                        }
    
                        $extencao_imagem = strtolower(pathinfo($img['name'], PATHINFO_EXTENSION));
                        
                        // verifiva qual o tipo de extenção
                        if($extencao_imagem != 'jpg' && $extencao_imagem != 'jpeg' && $extencao_imagem != 'png'){
                            echo json_encode([
                                'msg' => 'Caminho '. $extencao_imagem. ' inválido.', 
                            ]);
                            http_response_code(400);
                            exit;
                        }
                        $caminhosImagens[] = uploadImagem($img);
                    }
                    
                    $expositor->imagens = $caminhosImagens;
    
                    
                }else {
                    echo json_encode([
                        'msg' => 'É necessário enviar 6 imagens para realizar o cadastro', 
                    ]);
                    http_response_code(400);
                    exit;
                }
            }else {
                echo json_encode([
                    'msg' => 'É necessário enviar imagens para realizar o cadastro', 
                ]);
                http_response_code(400);
                exit;
            }
            
            
            //////// DADOS EXPOSITOR \\\\\\\\\\\\\
            $expositor->setNome_marca(     htmlspecialchars(strip_tags($_POST['marca'])));
            $expositor->setVoltagem(       htmlspecialchars(strip_tags($_POST['voltagem'])));
            $expositor->setEnergia(        htmlspecialchars(strip_tags($_POST['energia'])));
            $expositor->setTipo(           htmlspecialchars(strip_tags($_POST['tipo'])));
            $expositor->setId_categoria(   htmlspecialchars(strip_tags($_POST['id_categoria'])));
            
            
            ///////// CADASTRANDO NO BD \\\\\\\\\\\\\
            $res = $expositor->cadastrar();
            

            ////////// ENVIANDO RESPOSTA \\\\\\\\\ 
            if($res){
                echo json_encode([
                    'msg' => 'Expositor cadastrado com sucesso!',
                ]);
                http_response_code(200);
                exit;
            }else{
                echo json_encode([
                    'msg' => 'Não foi possível realizar o cadastro de expostor!',
                ]);
                http_response_code(400);
                exit;
            }   

    }
    } catch (\Throwable $th) {
        echo json_encode([
            'msg' => 'Falha no servidor!!'
        ]);
        http_response_code(500);
        exit;
    }
}


header('Content-Type: application/json');

/////////////////// MEDOTO GET ///////////////////

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    try {
        $expositor = new Expositor();


        ////  RETORNA TODOS OS EXPOSITORES EM ESPERA
        if (isset($_GET['emespera'])){
            $emEspera = $expositor->listar("validacao = 'aguardando'");
            $response = $emEspera ? ['expositor' => $emEspera, 'status' => 200] : ['msg' => 'Nenhum expositor foi encontrado.', 'status' => 400];


        //// RETORNA OS EXPOSITOR RECUSADOS
        }else if (isset($_GET['recusado'])){
            $emEspera = $expositor->listar("validacao = 'recusado'");
            $response = $emEspera ? ['expositor' => $emEspera, 'status' => 200] : ['msg' => 'Nenhum expositor foi encontrado.', 'status' => 400];


        //// RETORNA OS EXPOSITOR DONO DO ID COM AS IMAGENS DELE
        }else if (isset($_GET['id'])){
            $id = htmlspecialchars(strip_tags($_GET['id']));
            $imagens = new Imagem();
            //// busca imagens pelo id do expositor
            $buscarImagem = $imagens->listar(htmlspecialchars(strip_tags($_GET['id'])));
            $buscarId = $expositor->listar("id_expositor = '$id'");
            //// faz append das imagens
            $buscarId[0]['imagens'] = $buscarImagem;
            $response = $buscarId ? ['expositor' => $buscarId[0],$_GET['id'], 'status' => 200] : ['msg' => 'Nenhum expositor foi encontrado.', 'status' => 400];


        //// RETORNA EXPOSITORES INATIVOS
        }else if (isset($_GET['inativo'])){
            $buscarInativo = $expositor->listar("status_pes = 'inativo' and validacao = 'aprovado'");
            $response = $buscarInativo ? ['expositor' => $buscarInativo, 'status' => 200] : ['msg' => 'Nenhum expositor foi encontrado.', 'status' => 400];


        //// RETORNA OS EXPOSITORES APROVADOS PERTENCENTE A CATEGORIA ESCOLIDA
        }else if (isset($_GET['categoria'])){
            $buscarCategoria = $expositor->listar("descricao = '". htmlspecialchars(strip_tags($_GET['categoria'])). "' and validacao = 'aprovado'");
            $response = $buscarCategoria ? ['expositor' => $buscarCategoria, 'status' => 200] : ['msg' => 'Nenhum expositor foi encontrado.', 'status' => 400];

        }else if (isset($_GET['categoriaHome'])){
            $buscarCategoria = $expositor->listar("descricao = '". htmlspecialchars(strip_tags($_GET['categoriaHome'])). "' and validacao = 'validado' and status_pes = 'ativo'");
            $response = $buscarCategoria ? ['expositor' => $buscarCategoria, 'status' => 200] : ['msg' => 'Nenhum expositor foi encontrado.', 'status' => 400];


        //// RETORNA OS EXPOSITORES FILTRADOS
        }else if (isset($_GET['filtrar'])){
            $filtrarExpositor = $expositor->filtrar(htmlspecialchars(strip_tags($_GET['filtrar'])), isset($_GET['aguardando']) ? "!= 'validado'" : "= 'validado'");
            $response = $filtrarExpositor ? ['expositor' => $filtrarExpositor, 'status' => 200, $_GET] : ['msg' => 'Nenhum expositor foi encontrado.', 'status' => 400];
        
        //// RETORNA OS EXPOSITORES FILTRADOS 2
        }else if (isset($_GET['filtrarAtivos'])){
            $filtrarExpositor = $expositor->filtrar(htmlspecialchars(strip_tags($_GET['filtrarAtivos'])), isset($_GET['aguardando']) ? "!= 'validado'" : "= 'validado'", true);
            $response = $filtrarExpositor ? ['expositor' => $filtrarExpositor, 'status' => 200, $_GET] : ['msg' => 'Nenhum expositor foi encontrado.', 'status' => 400];


        //// RETORNA OS EXPOSITORES FILTRADOS 3
        }else if (isset($_GET['filtrarHome'])){
            $filtrarExpositor = $expositor->filtrar(htmlspecialchars(strip_tags($_GET['filtrarHome'])), "= 'validado' and status_pes = 'ativo'");
            $response = $filtrarExpositor ? ['expositor' => $filtrarExpositor, 'status' => 200, $_GET] : ['msg' => 'Nenhum expositor foi encontrado.', 'status' => 400];


        //// RETORNA TODOS OS EXPOITORES PARA A HOME
        }else if (isset($_GET['home'])){
            $filtrarExpositor = $expositor->listar("validacao = 'validado' and status_pes = 'ativo'");
            $response = $filtrarExpositor ? ['expositor' => $filtrarExpositor, 'status' => 200, $_GET] : ['msg' => 'Nenhum expositor foi encontrado.', 'status' => 400];


        //// RETORNA TODOS OS EXPOITORES VALIDADOS
        }else if (isset($_GET['rand'])){
            $filtrarExpositor = $expositor->listarHome(1);
            $response = $filtrarExpositor ? ['expositor' => $filtrarExpositor, 'status' => 200, $_GET] : ['msg' => 'Nenhum expositor foi encontrado.', 'status' => 400];


        //// RETORNA TODOS OS EXPOITORES VALIDADOS
        }else {
            $buscar = $expositor->listar();
            $response = !empty($buscar) ? ['expositor' => $buscar, 'status' => 200] : ['msg' => 'Nenhum expositor foi encontrado.', 'status' => 400];
        }

        echo json_encode($response);
    } catch (\Throwable $th) {
        $response = [
            'status' => 500,
            'msg' => 'Erro no servidor'
        ];
        echo json_encode($response);
    }
}