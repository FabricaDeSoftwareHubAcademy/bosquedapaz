<?php

require_once('../Controller/Controller-ADM.php');

class Carrossel {
    public int $id;
    public string $img1;
    public string $img2;
    public string $img3;

    public function atualizar(){
        $db = new Database('carrosel');

        $values = [
            "img1" => $this->img1,
            "img2" => $this->img2,
            "img3" => $this->img3
        ];

        $res = $db->update('id_carrosel = 2', $values);

        return $res ? true : false;
    }
}

$car = new Carrossel();
$car->img1 = '../../../Public/imgs/uploads-carrosel/imagem-carrossel-1.JPG';
$car->img2 = '../../../Public/imgs/uploads-carrosel/imagem-carrossel-2.JPG';
$car->img3 = '../../../Public/imgs/uploads-carrosel/imagem-carrossel-3.JPG';

$car->atualizar();

?>