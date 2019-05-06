<?php
require_once '../Utils.php';

class Cliente {
    private $id;
    private $nome;
    private $cpf;
    private $dataNasc;
    private $endecos;

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getNome() {
        return $this->nome;
    }
    public function setNome($nome) {
        return $this->nome = $nome;
    }
    public function getCPF() {
        return Utils::mask($this->cpf, '###.###.###-##');
    }
    public function setCPF($cpf) {
        return $this->cpf = $cpf;
    }
    public function getDataNasc() {
        $data = strtotime($this->dataNasc);
        return date('d/m/Y',$data);
    }
    public function getDataNascUnMask() {
        return $this->dataNasc;
        
    }
    public function setDataNasc(date $dataNasc) {
        return $this->dataNasc = $dataNasc;
    }
}