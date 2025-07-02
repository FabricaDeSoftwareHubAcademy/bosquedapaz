<?php
require_once('../vendor/autoload.php');

use app\Controller\Expositor;
use app\Controller\Categoria;

if(isset($_GET['filtro'])){
    $categoria = new Categoria();
    $opcoes = $categoria->listar();

    echo json_encode($opcoes);
}

function update_carrossel($img,$num) {
    // chmod ("../Public/uploads/uploads-carrosel/", 0777);
    $caminho = '../Public/uploads/uploads-carrosel/';
    $new_img = $img['name'];
    $new_name = 'img-carrossel-'.$num;
    $extencao_imagem = strtolower(pathinfo($new_img, PATHINFO_EXTENSION));

    $caminho_img = $caminho . $new_name. '.'. $extencao_imagem;
        
    $upload_img = move_uploaded_file($img['tmp_name'], $caminho_img);

    return $caminho_img;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $expositor = new Expositor();

    // DADOS PESSOA
    $expositor->setNome(filter_var($_POST['nome'], FILTER_SANITIZE_STRING) == '' ? null : filter_var($_POST['nome'], FILTER_SANITIZE_STRING));
    $expositor->setEmail(filter_var($_POST['whats'], FILTER_SANITIZE_STRING) == '' ? null : filter_var($_POST['whats'], FILTER_SANITIZE_STRING));
    $expositor->setWhats(filter_var($_POST['email'], FILTER_SANITIZE_STRING) == '' ? null : filter_var($_POST['email'], FILTER_SANITIZE_STRING));
    $expositor->setTelefone(filter_var($_POST['whats'], FILTER_SANITIZE_STRING) == '' ? null : filter_var($_POST['whats'], FILTER_SANITIZE_STRING));
    if (isset($_FILES['img_perfil'])) {
        if( 5 < ($_FILES['img_perfil']['size'] / 1024) / 1024){
            echo json_encode( ['status' => 400, 'msg' => 'Imagem enviada muito grande', 'erro' => true] );
            exit;
        }
        try {
            $caminho = '../Public/uploads/uploads-expositor/';
            $new_img = $_FILES['img_perfil']['name'];
            $new_name = uniqid();
            $extencao_imagem = strtolower(pathinfo($new_img, PATHINFO_EXTENSION));
            if($extencao_imagem != 'jpg' && $extencao_imagem != 'jpeg' && $extencao_imagem != 'png'){
                echo json_encode( ['status' => 400, 'msg' => 'Caminho '. $extencao_imagem. ' inválido.', 'erro' => true] );
                exit;
            }
            $caminho_img = $caminho . $new_name. '.'. $extencao_imagem;
            $upload_img = move_uploaded_file($_FILES['img_perfil']['tmp_name'], $caminho_img);

            $expositor->setImg_perfil($caminho_img);
        } catch (\Throwable $th) {
            echo json_encode( ['status' => 500, 'msg' => 'Erro ao enviar a imagem', 'erro' => true] );
        }
    }
    
    // DADOS EXPOSITOR
    
    // $expositor->setNome_marca();
    // $expositor->setVoltagem();
    // $expositor->setEnergia();
    // $expositor->setModalidade();
    // $expositor->setTipo();
    // $expositor->setIdade();
    // $expositor->setContato2();
    // $expositor->setResponsavel();
    // $expositor->setProduto();
    var_dump($expositor);
    exit;
    
    // $res = $expositor->cadastrar();

    if($res){
        echo json_encode( ['status' => 200, 'msg' => 'Expositor cadastrado com sucesso!', 'code' => 100] );
    }else{
        echo json_encode( ['status' => 400, 'msg' => 'Erro ao cadastrar o expositor!','code' => 101] );
    }
}

?>
