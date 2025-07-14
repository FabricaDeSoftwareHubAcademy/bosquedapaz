<?php

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

header('Content-Type: application/json');

require_once('../vendor/autoload.php');

use app\Controller\Expositor;
use app\Controller\Imagem;

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


/////////////////// MEDOTO POST ///////////////////

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $expositor = new Expositor();

    try {

        if(isset($_POST['deletar'])){

        }else if (isset($_POST['cadastrar'])) {            
            $expositor->setCidade(!empty($_POST['cidade']) ? filter_var($_POST['cidade'], FILTER_UNSAFE_RAW) : NULL);
            
            // // DADOS PESSOA
            $expositor->setNome(            !empty($_POST['nome'])          ? filter_var($_POST['nome'],            FILTER_UNSAFE_RAW) : NULL);
            $expositor->setWhats(           !empty($_POST['whats'])         ? filter_var($_POST['whats'],           FILTER_UNSAFE_RAW) : NULL);
            $expositor->setEmail(           !empty($_POST['email'])         ? filter_var($_POST['email'],           FILTER_UNSAFE_RAW) : NULL);
            $expositor->setTelefone(        !empty($_POST['whats'])         ? filter_var($_POST['whats'],           FILTER_UNSAFE_RAW) : NULL);
            $expositor->setlink_instagram(  !empty($_POST['link_instagram'])? filter_var($_POST['link_instagram'],  FILTER_UNSAFE_RAW) : NULL);
            
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
                                'status' => 400,
                                'msg' => 'Imagem enviada muito grande', 
                            ]);
                            exit;
                        }

                        $extencao_imagem = strtolower(pathinfo($img['name'], PATHINFO_EXTENSION));
                        
                        // verifiva qual o tipo de extenção
                        if($extencao_imagem != 'jpg' && $extencao_imagem != 'jpeg' && $extencao_imagem != 'png'){
                            echo json_encode([
                                'status' => 400, 
                                'msg' => 'Caminho '. $extencao_imagem. ' inválido.', 
                            ]);
                            exit;
                        }
                        $caminhosImagens[] = uploadImagem($img);
                    }
                    
                    // print_r($caminhosImagens);
                    
                    $expositor->imagens = $caminhosImagens;

                    
                }else {
                    echo json_encode([
                        'status' => 400, 
                        'msg' => 'É necassário enviar 6 imagens para realizar o cadastro', 
                    ]);
                    exit;
                }
            }else {
                echo json_encode([
                    'status' => 400, 
                    'msg' => 'É necassário enviar imagens para realizar o cadastro', 
                ]);
                exit;
            }
            
            
            // DADOS EXPOSITOR
            $expositor->setNome_marca(     !empty($_POST['marca'])          ? filter_var($_POST['marca'],         FILTER_UNSAFE_RAW) : NULL);
            $expositor->setProduto(        !empty($_POST['produto'])        ? filter_var($_POST['produto'],       FILTER_UNSAFE_RAW) : NULL);
            $expositor->setContato2(       !empty($_POST['whats'])          ? filter_var($_POST['whats'],         FILTER_UNSAFE_RAW) : NULL);
            $expositor->setModalidade(     !empty($_POST['modalidade'])     ? filter_var($_POST['modalidade'],    FILTER_UNSAFE_RAW) : NULL);
            $expositor->setResponsavel(    !empty($_POST['responsavel'])    ? filter_var($_POST['responsavel'],   FILTER_UNSAFE_RAW) : NULL);
            $expositor->setIdade(          !empty($_POST['idade'])          ? filter_var($_POST['idade'],         FILTER_UNSAFE_RAW) : NULL);
            $expositor->setVoltagem(       !empty($_POST['voltagem'])       ? filter_var($_POST['voltagem'],      FILTER_UNSAFE_RAW) : NULL);
            $expositor->setEnergia(        !empty($_POST['energia'])        ? filter_var($_POST['energia'],       FILTER_UNSAFE_RAW) : NULL);
            $expositor->setTipo(           !empty($_POST['tipo'])           ? filter_var($_POST['tipo'],          FILTER_UNSAFE_RAW) : NULL);
            $expositor->setId_categoria(   !empty($_POST['id_categoria'])   ? filter_var($_POST['id_categoria'],  FILTER_UNSAFE_RAW) : NULL);
            
            // var_dump($expositor);
            
            $res = $expositor->cadastrar();
            
            if($res){
                echo json_encode([
                    'status' => 200, 
                    'msg' => 'Expositor cadastrado com sucesso!'
                ]);
            }else{
                echo json_encode([
                    'status' => 400, 
                    'msg' => 'Não foi possível realizar o cadastro de expostor!'
                ]);
            }
        }
        
    } catch (\Throwable $th) {
        //// no caso de erro
        echo json_encode([
            'status' => 500, 
            'msg' => 'Falha no servidor.'
        ]);
    }
}

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
            $imagens = new Imagem();
            //// busca imagens pelo id do expositor
            $buscarImagem = $imagens->listar($_GET['id']);
            $buscarId = $expositor->listar("id_expositor = ". $_GET['id']);
            //// faz append das imagens
            $buscarId[0]['imagens'] = $buscarImagem;
            $response = $buscarId ? ['expositor' => $buscarId[0], 'status' => 200] : ['msg' => 'Nenhum expositor foi encontrado.', 'status' => 400];


        //// RETORNA EXPOSITORES INATIVOS
        }else if (isset($_GET['inativo'])){
            $buscarInativo = $expositor->listar("status_pes = 'inativo' and validacao = 'aprovado'");
            $response = $buscarInativo ? ['expositor' => $buscarInativo, 'status' => 200] : ['msg' => 'Nenhum expositor foi encontrado.', 'status' => 400];


        //// RETORNA OS EXPOSITORES APROVADOS PERTENCENTE A CATEGORIA ESCOLIDA
        }else if (isset($_GET['categoria'])){
            $buscarCategoria = $expositor->listar("descricao = '". $_GET['categoria']. "' and validacao = 'aprovado'");
            $response = $buscarCategoria ? ['expositor' => $buscarCategoria, 'status' => 200] : ['msg' => 'Nenhum expositor foi encontrado.', 'status' => 400];


        //// RETORNA OS EXPOSITORES FILTRADOS
        }else if (isset($_GET['filtrar'])){
            $filtrarExpositor = $expositor->filtrar($_GET['filtrar'], isset($_GET['aguardando']) ? "!= 'aprovado'" : "= 'aprovado'");
            $response = $filtrarExpositor ? ['expositor' => $filtrarExpositor, 'status' => 200, $_GET] : ['msg' => 'Nenhum expositor foi encontrado.', 'status' => 400];


        //// RETORNA TODOS OS EXPOITORES VALIDADOS
        }else {
            $buscar = $expositor->listar();
            $response = count($buscar) > 0 ? ['expositor' => $buscar, 'status' => 200] : ['msg' => 'Nenhum expositor foi encontrado.', 'status' => 400];
        }

        echo json_encode($response);
    } catch (\Throwable $th) {
        $response = [
            'status' => 500,
            'msg' => 'Erro no servidor'. $th
        ];
        echo json_encode($response);
    }
}