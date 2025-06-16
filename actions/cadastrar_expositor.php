<?php
require_once('../vendor/autoload.php');

use app\Controller\Expositor;
use app\Controller\Categoria;
use app\Controller\Imagem;

if (isset($_GET['filtro'])) {
    $categoria = new Categoria();
    $opcoes = $categoria->listar();

    echo json_encode($opcoes);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $expositor = new Expositor();


    $expositor->setNome($_POST['nome']);
    $expositor->setWhats($_POST['whatsapp']);
    $expositor->setEmail($_POST['email']);
    $expositor->setTelefone($_POST['whatsapp']);
    $expositor->setNome_marca($_POST['marca']);
    $expositor->setVoltagem($_POST['voltagem']);
    $expositor->setEnergia($_POST['energia']);
    $expositor->setContato2($_POST['whatsapp']);
    $expositor->setProduto($_POST['produto']);
    $expositor->setId_categoria($_POST['id_categoria']);


    $res = $expositor->cadastrar();
    $imagem = new Imagem();

    if ($res) {
        for ($i = 0; $i < 6; $i++) {
            $imagem->id_expositor = $res;
            $imagem->posicao = $i +1;
            $cadastroImagem = $imagem->cadastroImagem();

            if ($cadastroImagem) {
                echo json_encode(['status' => 400, 'msg' => 'Erro ao cadastrar o expositor!', 'code' => 101]);

                exit;
            }
        }

        echo json_encode(['status' => 200, 'msg' => 'Expositor cadastrado com sucesso!', 'code' => 100]);
    } else {
        echo json_encode(['status' => 400, 'msg' => 'Erro ao cadastrar o expositor!', 'code' => 101]);
    }
}
