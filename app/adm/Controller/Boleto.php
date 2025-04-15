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
        $pesquisa = $_GET['pesquisa'] ?? '';
        if ($pesquisa !== '') {
            $sql = $pdo->prepare("SELECT * FROM banco_lista WHERE nome LIKE :nome");
            $sql->execute([':nome' => "%$pesquisa%"]);
        } else {
            $sql = $pdo->query("SELECT * FROM banco_lista");
        }
        $dados = $sql->fetchAll(PDO::FETCH_ASSOC);

        // Responde com JSON
        header('Content-Type: application/json');
        echo json_encode($dados);
    }
}
