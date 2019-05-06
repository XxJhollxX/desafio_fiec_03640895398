<?php

class Endereco {
    private $id;
    private $cep;
    private $logradouro;
    private $complemento;
    private $bairro;
    private $localidade;
    private $uf;
    private $numero;
    private $tipo;
    private $cliente;

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getCEP() {
        return $this->cep;
    }
    public function setCEP($cep) {
        $this->cep = $cep;
    }
    public function getLogradouro() {
        return $this->logradouro;
    }
    public function setLogradouro($logradouro) {
        $this->logradouro = $logradouro;
    }
    public function getComplemento() {
        return $this->complemento;
    }
    public function setComplemento($complemento) {
        $this->complemento = $complemento;
    }
    public function getBairro() {
        return $this->bairro;
    }
    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }
    public function getLocalidade() {
        return $this->localidade;
    }
    public function setLocalidade($localidade) {
        $this->localidade = $localidade;
    }
    public function getUF() {
        return $this->uf;
    }
    public function setUF($uf) {
        $this->uf = $uf;
    }
    public function getNumero() {
        return $this->numero;
    }
    public function setNumero($numero) {
        $this->numero = $numero;
    }
    public function getTipo() {
        return $this->tipo;
    }
    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    public function getCliente() {
        return $this->cliente;
    }
    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    public static function ws_fiec($cep) {
        return file_get_contents("https://sistemas.sfiec.org.br/cep/?CEP=" . $cep);
    }
}