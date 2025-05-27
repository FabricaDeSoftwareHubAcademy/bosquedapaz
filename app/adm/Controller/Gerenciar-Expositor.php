<?php
require_once __DIR__ . '/../../Models/meuDatabase.php';

class Expositor
{
    public int $id_expositor;
    public string $categoria = '';
    public string $nome = '';
    public string $email = '';
    public string $whatsapp = '';
    public string $cpf = '';
    public string $marca = '';
    public ?int $numero_barraca = null;
    public string $cor_rua = '';


    public function CadastrarExpositorValidado()
    {
        $db = new Database("expositores_validados");
        $res = $db->insert(
            [
                'nome' => $this->nome,
                'email' => $this->email,
                'whatsapp' => $this->whatsapp,
                'cpf' => $this->cpf,
                'marca' => $this->marca,
                'numero_barraca' => $this->numero_barraca,
                'cor_rua' => $this->cor_rua,
            ]
        );
        return $res;
    }

    public function ListarPorId($id)
    {
        $db = new Database("expositores_pendentes");
        $res = $db->select("id_expositor = " . intval($id))->fetchObject(self::class);
        return $res;
    }

    public function DeletarExpositor($id)
    {
        $db = new Database("expositores_pendentes");
        $res = $db->delete("id_expositor = " . intval($id));
        return $res;
    }

    public function AlterarCategoria($id, $categoria) {
        $db = new Database("expositores_pendentes");
        $values = ['categoria' => $categoria];
        $res = $db->update('id_expositor = ' . intval($id), $values);
        return $res;
    }

    public function validarExpositor(int $id, int $numero_barraca, string $cor_rua): bool
    {
        $expositorPendente = $this->ListarPorId($id);

        if ($expositorPendente) {
            $this->nome = $expositorPendente->nome;
            $this->email = $expositorPendente->email;
            $this->whatsapp = $expositorPendente->whatsapp;
            $this->cpf = $expositorPendente->cpf;
            $this->marca = $expositorPendente->marca;
            $this->numero_barraca = $numero_barraca;
            $this->cor_rua = $cor_rua;

            $inserido = $this->CadastrarExpositorValidado();

            if ($inserido) {
                return $this->DeletarExpositor($id);
            }
        }
        return false;
    }
}
