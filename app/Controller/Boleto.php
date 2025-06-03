<?php

namespace app\Controller;

require_once('../vendor/autoload.php');

use PDO;
use app\Models\Database;

class Boleto
{
    private int $id_boleto;
    private string $nome_expositor;
    private string $cpf;
    private string $boleto_pdf;
    private string $vencimento;
    private string $mes_referencia;
    private float $valor;
    private ?string $status_exp;
    private int $id_expositor;

    // métodos getters
    // ---------------------
    public function getIdBoleto()
    {
        return $this->id_boleto;
    }

    public function getNomeExpositor()
    {
        return $this->nome_expositor;
    }

    public function getCPF()
    {
        return $this->cpf;
    }

    public function getBoletoPDF()
    {
        return $this->boleto_pdf;
    }

    public function getVencimento()
    {
        return $this->vencimento;
    }

    public function getMesReferencia()
    {
        return $this->mes_referencia;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function getStatusExp()
    {
        return $this->status_exp;
    }

    public function getIdExpositor()
    {
        return $this->id_expositor;
    }
    // ---------------------
    // métodos getters

    // métodos setters
    // ---------------------
    public function setIdBoleto($id_boleto)
    {
        $this->id_boleto = $id_boleto;
        return $this;
    }

    public function setNomeExpositor($nome_expositor)
    {
        $this->nome_expositor = $nome_expositor;
        return $this;
    }

    public function setCPF($cpf)
    {
        $this->cpf = $cpf;
        return $this;
    }

    public function setBoletoPDF($boleto_pdf)
    {
        $this->boleto_pdf = $boleto_pdf;
        return $this;
    }

    public function setVencimento($vencimento)
    {
        $this->vencimento = $vencimento;
        return $this;
    }

    public function setMesReferencia($mes_referencia)
    {
        $this->mes_referencia = $mes_referencia;
        return $this;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
    }

    public function setStatusExp($status_exp)
    {
        $this->status_exp = $status_exp;
        return $this;
    }

    public function setIdExpositor($id_expositor)
    {
        $this->id_expositor = $id_expositor;
        return $this;
    }
    // ---------------------
    // métodos setters

    // funcionalidades
    // ---------------------
    public function CadastrarBoleto() {
        $banco = new Database('boleto');
        $execucao = $banco->insert([
            'boleto_pdf' => $this->boleto_pdf,
            'mes_referencia' => $this->mes_referencia,
            'valor' => $this->valor,
            'vencimento' => $this->vencimento
        ]);
        return $execucao;
    }

    public function ListarBoletos() {
        
    }

}