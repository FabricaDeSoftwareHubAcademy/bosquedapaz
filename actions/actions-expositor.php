<?php

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

header('Content-Type: application/json');

require_once('../vendor/autoload.php');

use app\Controller\Expositor;


/////////////////// MEDOTO POST ///////////////////

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $expositor = new Expositor();

    try {

        // DADOS PESSOA
        $expositor->setNome(            !empty($_POST['nome'])          ? filter_var($_POST['nome'],            FILTER_UNSAFE_RAW) : NULL);
        $expositor->setWhats(           !empty($_POST['whats'])         ? filter_var($_POST['whats'],           FILTER_UNSAFE_RAW) : NULL);
        $expositor->setEmail(           !empty($_POST['email'])         ? filter_var($_POST['email'],           FILTER_UNSAFE_RAW) : NULL);
        $expositor->setTelefone(        !empty($_POST['whats'])         ? filter_var($_POST['whats'],           FILTER_UNSAFE_RAW) : NULL);
        $expositor->setlink_instagram(  !empty($_POST['link_instagram'])? filter_var($_POST['link_instagram'],  FILTER_UNSAFE_RAW) : NULL);

        /// upload foto perfil
        if (isset($_FILES['img_perfil'])) {

            /// verifica quantos mb
            if( 5 < ($_FILES['img_perfil']['size'] / 1024) / 1024){
                echo json_encode([
                    'status' => 400,
                    'msg' => 'Imagem enviada muito grande', 
                ]);
                exit;
            }

            ///////// MOVENDO A IMAGEM DE PERFIL ////////////

            $caminho            = '../Public/uploads/uploads-expositor/';
            $name_img            = $_FILES['img_perfil']['name'];
            $new_name           = uniqid();
            $extencao_imagem    = strtolower(pathinfo($name_img, PATHINFO_EXTENSION));

            /// verifiva qual o tipo de extenção
            if($extencao_imagem != 'jpg' && $extencao_imagem != 'jpeg' && $extencao_imagem != 'png'){
                echo json_encode([
                    'status' => 400, 
                    'msg' => 'Caminho '. $extencao_imagem. ' inválido.', 
                ]);
                exit;
            }

            // monta caminho da img
            $caminho_img = $caminho . $new_name. '.'. $extencao_imagem;
            // move a img
            $upload_img = move_uploaded_file($_FILES['img_perfil']['tmp_name'], $caminho_img);

            $expositor->setImg_perfil($caminho_img);
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
        if (isset($_GET['emespera'])){
            $emEspera = $expositor->listar("status_exp = 'aguardando'");
            $response = $emEspera ? ['expositor' => $emEspera, 'status' => 200] : ['msg' => 'Nenhum expositor foi encontrado.', 'status' => 400];
        }else if (isset($_GET['id'])){
            $buscarId = $expositor->listar("id_expositor = ". $_GET['id']);
            $response = $buscarId ? ['expositor' => $buscarId, 'status' => 200] : ['msg' => 'Nenhum expositor foi encontrado.', 'status' => 400];
        }else if (isset($_GET['inativo'])){
            $buscarInativo = $expositor->listar("status_exp = 'inativo'");
            $response = $buscarInativo ? ['expositor' => $buscarInativo, 'status' => 200] : ['msg' => 'Nenhum expositor foi encontrado.', 'status' => 400];
        }else if (isset($_GET['categoria'])){
            $buscarCategoria = $expositor->listar("descricao = '". $_GET['categoria']. "'");
            $response = $buscarCategoria ? ['expositor' => $buscarCategoria, 'status' => 200] : ['msg' => 'Nenhum expositor foi encontrado.', 'status' => 400];
        }else if (isset($_GET['filtrar'])){
            $filtrarExpositor = $expositor->filtrar($_GET['filtrar'], isset($_GET['aguardando']) ? '=' : '!=');
            $response = $filtrarExpositor ? ['expositor' => $filtrarExpositor, 'status' => 200, $_GET] : ['msg' => 'Nenhum expositor foi encontrado.', 'status' => 400];
        }else {
            $buscar = $expositor->listar();
            $response = $buscar ? ['expositor' => $buscar, 'status' => 200] : ['msg' => 'Nenhum expositor foi encontrado.', 'status' => 400];
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