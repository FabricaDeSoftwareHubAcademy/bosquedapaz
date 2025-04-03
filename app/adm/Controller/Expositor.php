<?php
require '../Models/Controller-ADM.php';
require '../Controller/Imagem.php';


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


    public function setId_expositor($id_expositor)
    {
        $this->id_expositor = $id_expositor;
    }

    public function setImagens($imagens)
    {
        $this->imagens = $imagens;
    }

    public function setd_pessoa($id_pessoa)
    {
        $this->id_pessoa = $id_pessoa;
    }
    public function setId_categoria($id_categoria)
    {
        $this->id_categoria = $id_categoria;
    }
    // public function setId_imagem($id_imagem)
    // {
    //     $this->id_imagem = $id_imagem;
    // }
    public function setNome_marca($nome_marca)
    {
        $this->nome_marca = $nome_marca;
    }

    public function setEnergia($energia)
    {
        $this->energia = $energia;
    }
    public function setVoltagem($voltagem)
    {
        $this->voltagem = $voltagem;
    }
    public function setContato2($contato2)
    {
        $this->contato2 =  $contato2;
    }
    public function setNum_barraca($num_barraca)
    {
        $this->num_barraca = $num_barraca;
    }
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }
    public function setMetodos_pgto($metodos_pgto)
    {
        $this->metodos_pgto =  $metodos_pgto;
    }
    public function setCor_rua($cor_rua)
    {
        $this->cor_rua = $cor_rua;
    }
    public function setResponsavel($responsavel)
    {
        $this->responsavel = $responsavel;
    }
    public function setProduto($produto)
    {
        $this->produto = $produto;
    }

    public function getId_expositor()
    {
        return $this->id_expositor;
    }

    public function getd_pessoa()
    {
        return $this->id_pessoa;
    }
    public function getId_categoria()
    {
        return $this->id_categoria;
    }
    // public function getId_imagem()
    // {
    //     return $this->id_imagem;
    // }
    public function getNome_marca()
    {
        return $this->nome_marca;
    }

    public function getEnergia()
    {
        return $this->energia;
    }
    public function getVoltagem()
    {
        return $this->voltagem;
    }
    public function getContato2()
    {
        return $this->contato2;
    }
    public function getNum_barraca()
    {
        return $this->num_barraca;
    }
    public function getDescricao()
    {
        return $this->descricao;
    }
    public function getMetodos_pgto()
    {
        return $this->metodos_pgto;
    }
    public function getCor_rua()
    {
        return $this->cor_rua;
    }
    public function getResponsavel()
    {
        return $this->responsavel;
    }
    public function getProduto()
    {
        return $this->produto;
    }

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
            'imagem1' => $this->imagens[0],
            'imagem2' => $this->imagens[1],
            'imagem3' => $this->imagens[2],
            'imagem4' => $this->imagens[3] ?? '',
            'imagem5' => $this->imagens[4] ?? ''
        ]);


        $db = new Database('expositor');
        $res = $db->insert(
            [
                'id_expositor' => $this->id_expositor,
                'id_pessoa' => $pes_id,
                'id_categoria' => $this->id_categoria,
                'id_imagem' => 1, // $img_id,
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
