<?php
require_once('../vendor/autoload.php');

use app\Controller\Expositor;
use app\Controller\Categoria;

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);


if(isset($_GET['filtro'])){
    $categoria = new Categoria();
    $opcoes = $categoria->listar();

    echo json_encode($opcoes);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $expositor = new Expositor();

    // DADOS PESSOA
    $expositor->setNome(            !empty($_POST['nome'])          ? filter_var($_POST['nome'],            FILTER_UNSAFE_RAW) : NULL);
    $expositor->setWhats(           !empty($_POST['whats'])         ? filter_var($_POST['whats'],           FILTER_UNSAFE_RAW) : NULL);
    $expositor->setEmail(           !empty($_POST['email'])         ? filter_var($_POST['email'],           FILTER_UNSAFE_RAW) : NULL);
    $expositor->setTelefone(        !empty($_POST['whats'])         ? filter_var($_POST['whats'],           FILTER_UNSAFE_RAW) : NULL);
    $expositor->setlink_instagram(  !empty($_POST['link_instagram'])? filter_var($_POST['link_instagram'],  FILTER_UNSAFE_RAW) : NULL);

    /// upload foto perfil
    if (isset($_FILES['img_perfil'])) {
        /// verifica quantos megas
        if( 5 < ($_FILES['img_perfil']['size'] / 1024) / 1024){
            echo json_encode( ['status' => 400, 'msg' => 'Imagem enviada muito grande', 'erro' => true] );
            exit;
        }

        //// tenta mover
        try {

            $caminho            = '../Public/uploads/uploads-expositor/';
            $new_img            = $_FILES['img_perfil']['name'];
            $new_name           = uniqid();
            $extencao_imagem    = strtolower(pathinfo($new_img, PATHINFO_EXTENSION));

            /// verifiva qual o tipo de extenção
            if($extencao_imagem != 'jpg' && $extencao_imagem != 'jpeg' && $extencao_imagem != 'png'){
                echo json_encode( ['status' => 400, 'msg' => 'Caminho '. $extencao_imagem. ' inválido.', 'erro' => true] );
                exit;
            }

            $caminho_img = $caminho . $new_name. '.'. $extencao_imagem;
            $upload_img = move_uploaded_file($_FILES['img_perfil']['tmp_name'], $caminho_img);

            $expositor->setImg_perfil($caminho_img);

        } catch (\Throwable $th) {
            //// no caso de erro
            echo json_encode( ['status' => 500, 'msg' => 'Erro ao enviar a imagem', 'erro' => true] );
        }
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
    // exit;
    
    $res = $expositor->cadastrar();

    if($res){
        echo json_encode( ['status' => 200, 'msg' => 'Expositor cadastrado com sucesso!', 'code' => 100] );
    }else{
        echo json_encode( ['status' => 400, 'msg' => 'Erro ao cadastrar o expositor!','code' => 101] );
    }
}

?>
