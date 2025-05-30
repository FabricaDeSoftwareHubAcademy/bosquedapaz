<?php
require '../../Models/Database.php';
require 'Imagem.php';


class Expositor extends Pessoa
{

    protected $id_expositor;
    protected $id_pessoa;
    protected $id_categoria;
    // protected $id_imagem;
    protected $nome_marca;
    protected $num_barraca;
    protected $voltagem;
    protected $energia;
    protected $contato2;
    protected $descricao;
    protected $metodos_pgto;
    protected $cor_rua;
    protected $responsavel;
    protected $produto;
    protected $imagens;



    public function cadastrar()
    {

        $db = new Database('pessoa');
        $pes_id = $db->insert_lastid(
            [
                'nome' => $this->nome,
                'email' => $this->email,
                'telefone' => $this->whats,
            ]
        );

        
        //     // Verifica se existem arquivos e os percorre
        // for ($i = 0; $i < count($this->imagens); $i++) {

        //     // Verifica se houve erro no upload
        //     // if ($fileError === UPLOAD_ERR_OK) {
        //     //     $uploadDir = 'uploads/'; // Define o diretório de upload
        //     //     $uploadFile = $uploadDir . basename($fileName);

        //     //     // Move o arquivo para o diretório final
        //     //     if (move_uploaded_file($fileTmp, $uploadFile)) {

        //     //         $db = new Database('imagem');
        //     //         $img_id = $db->insert_lastid([
        //     //             'imagem1' => "$fileName",
        //     //             'imagem2' => "$fileName",
        //     //             'imagem3' => "$fileName",
        //     //             'imagem4' => "$fileName",
        //     //             'imagem5' => "$fileName"
        //     //         ]);
        //     //         $fileIds[] = $img_id;
        //     //     }
        //     // }

        //     $db = new Database('imagem');
        //     $img_id = $db->insert_lastid([
        //         'imagem1' => $this->imagens[0],
        //         'imagem2' => $this->imagens[1],
        //         'imagem3' => $this->imagens[2],
        //         'imagem4' => $this->imagens[3],
        //         'imagem5' => $this->imagens[4]
        //     ]);
        // }

        $db = new Database('imagem');
        $img_id = $db->insert_lastid([
            'imagem1' => $this->imagens[0] ?? '',
            'imagem2' => $this->imagens[1] ?? '',
            'imagem3' => $this->imagens[2] ?? '',
            'imagem4' => $this->imagens[3] ?? '',
            'imagem5' => $this->imagens[4] ?? ''
        ]);


        $db = new Database('expositor');
        $res = $db->insert(
            [
                'id_expositor' => $this->id_expositor,
                'id_pessoa' => $pes_id,
                'id_categoria' => $this->id_categoria,
                'id_imagem' => $img_id,
                'nome_marca' => $this->nome_marca,
                'num_barraca' => $this->num_barraca,
                'voltagem' => $this->voltagem,
                'energia' => $this->energia,
                'contato2' => $this->contato2,
                'descricao' => $this->descricao,
                'metodos_pgto' => $this->metodos_pgto,
                'cor_rua' => $this->cor_rua,
                'responsavel' => $this->responsavel,
                'produto' => $this->produto
            ]
        );
        return $res;
    }
}
