<?php

class ColaboradorEntity {
    public string $nome;
    public string $email;
    public string $telefone;
    public string $cargo;
    public string $senha;
    public string $imagem;

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function setTelefone(string $telefone): void {
        $this->telefone = $telefone;
    }

    public function setCargo(string $cargo): void {
        $this->cargo = $cargo;
    }

    public function setSenha(string $senha): void {
        $this->senha = $senha;
    }

    public function setImagem(string $imagem): void {
        $this->imagem = $imagem;
    }
}
