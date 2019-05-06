<?php

class ConnDB {
    private const host = "localhost";
    private const user = "root";
    private const pass = "";
    private const db = "db_desafio_03640895398";

    private static $pdo;

    public function conectaDB() {
        try {
            if (!isset(self::$pdo)) {
                self::$pdo = new PDO("mysql:host=".self::host.";dbname=".self::db, self::user, self::pass);
            }
        } catch (Exception $ex) {
            echo $ex;
        }
    }

    public function getConexao() {
        return self::$pdo;
    }
}