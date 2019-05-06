<?php

require_once "../ConnDB.php";
require_once "Endereco.php";

class EnderecoModel {
    private $conn;

    public function __construct() {
        $this->conn = new ConnDB;
        $this->conn->conectaDB();
    }

    public function listarTipos() {
        $query = "select * from tipos_endereco";
        $statement = $this->conn->getConexao()->prepare($query);
        $statement->execute();
        
        $result = $statement->fetchAll();

        return $result;
    }
}