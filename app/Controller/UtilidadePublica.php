<?php

namespace app\Controller;
require_once('../vendor/autoload.php');

use PDO;
use app\Models\Database;

    Class UtilidadePublica
    {
        public int $id_utilidade_publica;
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


        public function listar() {
            $db = new Database('utilidade_publica');
            $res = $db->select_utilidades()
                      ->fetchAll(PDO::FETCH_CLASS, self::class);
    
            return $res;
        }

        public function editar() {
            $db = new Database('utilidade_publica');
            $res = $db->update("id_utilidade_publica =" . $this->id_utilidade_publica ,[
                'titulo' => $this->titulo,
                'descricao' => $this->descricao,
                'data_inicio' => $this->data_inicio,
                'data_fim' => $this->data_fim,
                'imagem' => $this->imagem,
                'status_utilidade' => $this->status_utilidade
            ]);
    
            return $res;
        }

        public function editar_status() {
            $db = new Database('utilidade_publica');
            $res = $db->update("id_utilidade_publica =" . $this->id_utilidade_publica ,[
                'status_utilidade' => $this->status_utilidade
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