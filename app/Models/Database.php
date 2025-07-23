<?php

namespace app\Models;

require_once '../vendor/autoload.php';

use app\Models\Env;
use PDO;

Env::load();

// sudo chown -R root:www-data /var/www

class Database
{
    //atributos do database
    private $conn;
    private string $local;
    private string $db;
    private string $user;
    private string $password;
    private string $table;


    // metodo construtor que íncia chamando o médoto de conexão com o db 
    function __construct($table = null)
    {
        $this->table = $table;
        $this->conecta();
    }

    function set_conn()
    {
        $this->local = $_ENV['DB_HOST'];
        $this->db = $_ENV['DB_DATABASE'];
        $this->user = $_ENV['DB_USER'];
        $this->password = $_ENV['DB_PASSWORD'];
    }

    // se conecta com o db
    private function conecta()
    {

        try {

            $this->set_conn();

            // echo $this->local;

            $this->conn = new PDO("mysql:host=" . $this->local . ";dbname=" . $this->db, $this->user, $this->password);

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $err) {
            die("Conection Failed" . $err->getMessage());
        }
    }

    // médoto para executar o CRUD no db
    // recebe dois parametros, a query e os binds
    public function execute($query, $binds = [])
    {
        try {

            $stmt = $this->conn->prepare($query);
            $stmt->execute($binds);
            return $stmt;
        } catch (\PDOException $err) {
            die("Connection failed" . $err->getMessage());
        }
    }

    // método para inserir no db, tem o parametro $values,
    // que recebe os valores do que serão inseridos
    public function insert($values)
    {
        $fields = array_keys($values);

        $binds = array_pad([], count($fields), '?');

        $query = 'INSERT INTO ' . $this->table . ' (' . implode(',', $fields) . ') VALUES (' . implode(',', $binds) . ')';

        $res = $this->execute($query, array_values($values));

        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function insert_lastid($values)
    {
        // quebrar o array associativo que veio como parametro
        $fields = array_keys($values);

        $binds = array_pad([], count($fields), '?');

        $query = 'INSERT INTO ' . $this->table . '(' . implode(',', $fields) . ') VALUES (' . implode(',', $binds) . ')';

        $res = $this->execute($query, array_values($values));

        $lastId = $this->conn->lastInsertId();

        if ($res) {
            return $lastId;
        } else {
            return false;
        }
    }

    // método de select
    public function select($where = null, $order = null, $limit = null, $fields = "*")
    {
        $where = $where != null ? ' WHERE ' . $where : '';
        $order = $order != null ? ' ORDER BY ' . $order : '';
        $limit = $limit != null ? ' LIMIT ' . $limit : '';

        $query = 'SELECT ' . $fields . ' FROM ' . $this->table . ' ' . $where . ' ' . $order . ' ' . $limit;

        return $this->execute($query);
    }

    public function select_all($tableP, $id_name, $where = null)
    {
        $where = strlen($where) ? " WHERE " . $where : '';
        $query = "SELECT * FROM " . $this->table . " AS A INNER JOIN " . $tableP . " AS B ON " . "A." . $id_name . " = B." . $id_name . ' ' . $where;
        return $this->execute($query);
    }

    // método update, com parametros $where, $values
    public function update($where, $values)
    {
        $fields = array_keys($values);
        $param = array_values($values);

        $query = "UPDATE " . $this->table . ' SET ' . implode('=?,', $fields) . '=? WHERE ' . $where;

        $res = $this->execute($query, $param);

        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function update_all($values1, $values2, $tableP, $id_name, $where)
    {
        $where = strlen($where) ? " WHERE " . $where : '';
        $fields = array_keys($values1);
        $fields2 = array_keys($values2);
        $masterArray = array_merge($values1, $values2);
        $param = array_values($masterArray);

        $query = "UPDATE " . $this->table . " SET " . implode('=?,', $fields) . "=? " . $where . "; UPDATE " . $tableP . " SET " . implode('=?,', $fields2) . "=? WHERE " . $id_name . " = ( SELECT " . $id_name . " FROM " . $this->table . $where . ")";

        $res = $this->execute($query, $param);
        return $res ? TRUE : FALSE;
    }

    public function delete($where, $status)
    {
        $query = "UPDATE " . $this->table . " SET status_pes = '". $status. "' WHERE " . $where;
        return $this->execute($query) ? true : false;
    }

    //Funções do fluxo do ADM: 
    public function listar_colaboradores()
    {
        $query = "SELECT
            c.id_colaborador,
            p.nome,
            p.email,
            p.telefone,
            c.cargo,
            p.status_pes,
            p.img_perfil
            FROM colaborador c
            INNER JOIN pessoa p ON c.id_pessoa = p.id_pessoa";
        return $this->execute($query);
    }
    

    public function filtrar_colaboradores($nome)
    {
        $query = "SELECT
        c.id_colaborador,
        p.nome,
        p.email,
        p.telefone,
        c.cargo,
        c.status_col
        FROM colaborador c
        INNER JOIN pessoa p ON c.id_pessoa = p.id_pessoa
        WHERE p.nome LIKE :nome";

        $binds = [":nome" => "%$nome%"];
        return $this->execute($query, $binds);
    }

    public function sts_adm($id_colaborador, $novoStatus)
    {
        $query = "UPDATE pessoa 
            SET status_pes = ?
            WHERE id_pessoa = (
            SELECT id_pessoa FROM colaborador WHERE id_colaborador = ?
            )";

        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$novoStatus, $id_colaborador]);
    }       
    
    public function buscarPorIdPessoa($idPessoa)
    {
        $query = "SELECT 
            c.id_colaborador,
            p.id_pessoa,
            p.nome,
            p.email,
            p.telefone,
            c.cargo,
            p.img_perfil
        FROM colaborador c
        INNER JOIN pessoa p ON c.id_pessoa = p.id_pessoa
        WHERE c.id_pessoa = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->execute([$idPessoa]);
        return $stmt->fetch(PDO::FETCH_ASSOC);  
    }

    // BLOCO DE CODIGOS PARA CLASSE BOLETO
    public function listar_expositor_para_cadastro($nome)
    {
        $query = "SELECT
        p.nome, p.cpf, e.id_expositor
        FROM pessoa p
        INNER JOIN expositor e ON p.id_pessoa = e.id_pessoa
        WHERE p.nome LIKE :nome";
        $binds = [":nome" => "%$nome%"];
        return $this->execute($query, $binds);
    }

    public function listar_todos_boletos()
    {
        $query = "SELECT
        b.id_boleto, 
        e.id_expositor,
        p.nome, 
        DATE_FORMAT(b.vencimento, '%d/%m/%Y') AS vencimento,
        b.mes_referencia,
        b.valor, 
        b.status_boleto
        FROM boleto b 
        INNER JOIN expositor e ON b.id_expositor = e.id_expositor
        INNER JOIN pessoa p ON e.id_pessoa = p.id_pessoa
        ORDER BY b.vencimento ASC";


        return $this->execute($query);
    }

    public function filtrar_boletos_por_nome($nome)
    {
        $query = "SELECT
        b.id_boleto, e.id_expositor,
        p.nome, b.vencimento,
        b.mes_referencia,
        b.valor, b.status_boleto
        FROM boleto b 
        INNER JOIN expositor e ON b.id_expositor = e.id_expositor
        INNER JOIN pessoa p ON e.id_pessoa = p.id_pessoa
        WHERE p.nome LIKE :nome;";

        $binds = [":nome" => "%$nome%"];
        return $this->execute($query, $binds);
    }

    public function filtrar_boletos_por_data($data_inicial, $data_final)
    {
        $query = "SELECT
        b.id_boleto, e.id_expositor,
        p.nome, b.vencimento as vencimento,
        b.mes_referencia,
        b.valor, b.status_boleto
        FROM boleto b 
        INNER JOIN expositor e ON b.id_expositor = e.id_expositor
        INNER JOIN pessoa p ON e.id_pessoa = p.id_pessoa
        WHERE b.vencimento BETWEEN STR_TO_DATE(:data_inicial, '%d/%m/%Y') and STR_TO_DATE(:data_final, '%d/%m/%Y')
        ORDER BY b.vencimento ASC";

        $binds = [
            ":data_inicial" => $data_inicial,
            ":data_final" => $data_final
        ];
        return $this->execute($query, $binds);
    }

    public function filtrar_boletos_por_status($status)
    {
        $query = "SELECT
        b.id_boleto, e.id_expositor,
        p.nome, b.vencimento,
        b.mes_referencia,
        b.valor, b.status_boleto
        FROM boleto b 
        INNER JOIN expositor e ON b.id_expositor = e.id_expositor
        INNER JOIN pessoa p ON e.id_pessoa = p.id_pessoa";

        $binds = [];

        if (!empty($status)) {
            $query .= " WHERE b.status_boleto = :status_boleto;";
            $binds = [":status_boleto" => "$status"];
        }
        return $this->execute($query, $binds);
    }

    public function alterar_status($status, $id)
    {
        $query = "UPDATE boleto set status_boleto = :status_boleto
        WHERE id_boleto = :id_boleto";

        $binds = [
            ":status_boleto" => $status,
            ":id_boleto" => $id
        ];
        return $this->execute($query, $binds);
    }

    public function capturar_boletos_por_usuario($id)
    {
        $query = "SELECT
        e.id_expositor, b.id_boleto,
        p.nome, DATE_FORMAT(b.vencimento, '%d/%m/%Y') AS vencimento,
        b.mes_referencia,
        b.valor, b.status_boleto
        FROM pessoa p
        INNER JOIN expositor e ON p.id_pessoa = e.id_pessoa
        INNER JOIN boleto b on e.id_expositor = b.id_expositor
        WHERE p.id_pessoa = :id;";

        $binds = [":id" => "$id"];
        return $this->execute($query, $binds);
    }

    public function capturar_boleto_por_id($idPessoa, $idBoleto)
    {
        $query = "SELECT
        p.id_pessoa, b.id_boleto, b.pdf
        FROM pessoa p
        INNER JOIN expositor e ON p.id_pessoa = e.id_pessoa
        INNER JOIN boleto b on e.id_expositor = b.id_expositor
        WHERE p.id_pessoa = :id_pessoa AND b.id_boleto = :id_boleto";

        $binds = [
            ":id_pessoa" => $idPessoa,
            ":id_boleto" => $idBoleto
        ];

        return $this->execute($query, $binds);
    }

    // codigo listar parceiros
    public function listar_parceiros()
    {
        $query = "SELECT id_parceiro, nome_parceiro, nome_contato, telefone,
        email, status_parceiro FROM parceiro";

        return $this->execute($query);
    }

    public function buscar_parceiros($nome)
    {
        $query = "SELECT id_parceiro, nome_parceiro, nome_contato, telefone,
        email, status_parceiro FROM parceiro WHERE nome_parceiro LIKE :nome_parceiro";

        $binds = [":nome_parceiro" => "%$nome%"];
        return $this->execute($query, $binds);
    }

    public function alterar_status_parceiro($status, $id)
    {
        $query = "UPDATE parceiro set status_parceiro = :status_parceiro
        WHERE id_parceiro = :id_parceiro";

        $binds = [
            ":status_parceiro" => $status,
            ":id_parceiro" => $id
        ];
        return $this->execute($query, $binds);
    }

    public function obter_parceiros($id)
    {
        $query = "SELECT par.id_parceiro, par.nome_parceiro, par.telefone, par.logo, en.num_residencia,
        en.cidade, par.email, par.cpf_cnpj, en.cep, en.complemento, en.estado,
        par.nome_contato, par.tipo, en.logradouro, en.bairro, en.id_endereco
        FROM parceiro par
        INNER JOIN endereco en ON par.id_endereco = en.id_endereco
        WHERE id_parceiro = :id_parceiro;";

        $binds = [":id_parceiro" => $id];
        return $this->execute($query, $binds);
    }

    public function atualizar_parceiro($id, $dados)
    {
        $query = "UPDATE parceiro par
        JOIN endereco en ON par.id_endereco = en.id_endereco SET 
        par.nome_parceiro = :nome_parceiro,
        par.telefone = :telefone,
        par.email = :email,
        par.cpf_cnpj = :cpf_cnpj,
        par.nome_contato = :nome_contato,
        par.tipo = :tipo,
        en.cep = :cep,
        en.complemento = :complemento,
        en.num_residencia = :num_residencia,
        en.logradouro = :logradouro,
        en.estado = :estado,
        en.bairro = :bairro";

        $binds = [
            ":nome_parceiro" => $dados['nome_parceiro'],
            ":telefone" => $dados['telefone'],
            ":email" => $dados['email'],
            ":cpf_cnpj" => $dados['cpf_cnpj'],
            ":nome_contato" => $dados['nome_contato'],
            ":tipo" => $dados['tipo'],
            ":cep" => $dados['cep'],
            ":complemento" => $dados['complemento'],
            ":num_residencia" => $dados['num_residencia'],
            ":logradouro" => $dados['logradouro'],
            ":estado" => $dados['estado'],
            ":bairro" => $dados['bairro'],
            ":id_parceiro" => $id
        ];

        if (isset($dados['logo']) && $dados['logo'] !== '') {
            $query .= ", par.logo = :logo";
            $binds[":logo"] = $dados['logo'];
        }

        $query .= " WHERE par.id_parceiro = :id_parceiro;";

        return $this->execute($query, $binds);
    }
}
