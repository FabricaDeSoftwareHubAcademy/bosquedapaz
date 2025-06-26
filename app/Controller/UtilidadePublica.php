<?php

namespace app\Controller;
require_once('../vendor/autoload.php');

use PDO;
use app\Models\Database;

    Class UtilidadePublica
    {
        public int $id_utilidadesPublica;
        public string $titulo;
        public string $descricao;
        public string $data_inicio;
        public string $data_fim;
        public string $imagem;
        public int $status_utilidade;

        public function cadastrar()
        {
            $db = new Database('utilidade_publica');
            $res = $db->insert(
                [
                    'titulo' => $this->titulo,
                    'descricao' => $this->descricao,
                    'data_inicio' => $this->data_inicio,
                    'data_fim' => $this->data_fim,
                    'imagem' => $this->imagem
                ]
            );
            return $res;
        } 


        public function listar($where = null, $order = null, $limit = null) {
            $db = new Database('utilidade_publica');
            $res = $db->select($where, $order, $limit)
                      ->fetchAll(PDO::FETCH_CLASS, self::class);
    
            return $res;
        }

        public function editar($id, $titulo, $descricao, $data_inicio, $data_fim, $imagem) {
            $db = new Database('utilidade_publica');
            $res = $db->editar("id =" . $id ,[
                'titulo' => $titulo,
                'descricao' => $descricao,
                'data_inicio' => $data_inicio,
                'data_fim' => $data_fim,
                'imagem' => $imagem
            ]);
    
            return $res;
        }

        public function excluir($id) {
           try {
            $db = new Database('utilidade_publica');
            $res = $db->excluir("id =" . $id);

           } catch (\Throwable $th) {
            //throw $th;
           }
        }
    
    }

?>