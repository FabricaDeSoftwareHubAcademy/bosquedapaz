<?php
class Boleto
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function listarBoletos()
    {
        $sql = "SELECT * FROM expositores";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function atualizarSituacao($id, $novaSituacao)
    {
        $sql = "UPDATE expositores SET situacao = :situacao WHERE id_expositor = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':situacao' => $novaSituacao,
            ':id' => $id
        ]);
    }

    public function buscarPorNome($nome)
    {
        $sql = "SELECT * FROM expositores WHERE nome_expositor LIKE :nome";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':nome' => "%$nome%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
