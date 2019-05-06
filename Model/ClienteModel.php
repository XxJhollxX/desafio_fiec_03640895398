<?php

require_once "../ConnDB.php";
require_once "Cliente.php";

class ClienteModel {
    private $conn;

    public function __construct() {
        $this->conn = new ConnDB;
        $this->conn->conectaDB();
    }

    public function listar() {
        $query = "select * from clientes";
        $statement = $this->conn->getConexao()->prepare($query);
        $statement->execute();
        
        $result = $statement->fetchAll(PDO::FETCH_CLASS, "Cliente");

        return $result;
    }

    public function listarIdadeVogais() {
        $query = "SELECT * FROM clientes WHERE nome like 'a%' or nome like 'e%' or nome like 'i%' or nome like 'o%' or nome like 'u%' ORDER BY dataNasc DESC";
        $statement = $this->conn->getConexao()->prepare($query);
        $statement->execute();
        
        $result = $statement->fetchAll(PDO::FETCH_CLASS, "Cliente");

        return $result;
    }

    public function listarIdadeConsoantes() {
        $query = "SELECT * FROM clientes WHERE id NOT IN ( SELECT id FROM clientes WHERE nome like 'a%' or nome like 'e%' or nome like 'i%' or nome like 'o%' or nome like 'u%' ) ORDER BY dataNasc";
        $statement = $this->conn->getConexao()->prepare($query);
        $statement->execute();
        
        $result = $statement->fetchAll(PDO::FETCH_CLASS, "Cliente");

        return $result;
    }

    public function listarTerminaAResidencial() {
        $query = "SELECT * FROM clientes t1 JOIN endereco t2 ON t2.cliente = t1.id WHERE t1.nome like '%a' AND t2.tipo = 1";
        $statement = $this->conn->getConexao()->prepare($query);
        $statement->execute();
        
        $result = $statement->fetchAll(PDO::FETCH_CLASS, "Cliente");

        return $result;
    }

    public function listarMariaGroupEndereco() {
        $query = "SELECT * FROM clientes t1 JOIN endereco t2 ON t2.cliente = t1.id WHERE t1.nome like '%maria%' GROUP BY t2.tipo";
        $statement = $this->conn->getConexao()->prepare($query);
        $statement->execute();
        
        $result = $statement->fetchAll(PDO::FETCH_CLASS, "Cliente");

        return $result;
    }

    public function excluir($id) {
        $query = "delete from clientes where id = :id";
        $statement = $this->conn->getConexao()->prepare($query);
        $statement->bindParam(":id", $id);

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
}