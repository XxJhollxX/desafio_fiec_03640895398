<?php

require_once '../Model/Endereco.php';
require_once '../Model/EnderecoModel.php';

if(isset($_POST['cep'])) {
    session_start();

    echo $_POST['cep'];
    echo $_POST['tipo'];
    echo $_POST['numero'];

    if (isset($_SESSION['endereco'])) {
        array_push($_SESSION["endereco"], [
            "cep" => $_POST['cep'],
            "tipo" => $_POST['tipo'],
            "numero" => $_POST['numero']
        ]);
    } else {
        $_SESSION["endereco"] = [
            [
                "cep" => $_POST['cep'],
                "tipo" => $_POST['tipo'],
                "numero" => $_POST['numero']
            ]
        ];
    }
    header('Location: http://localhost/site/clienteEdit.php');
    die();
}

class EnderecoController {
    private $endereco;
    private $enderecoModel;

    public function __construct() {
        $this->enderecoModel = new EnderecoModel();
    }

    public function listarTiposEndereco() {
        return $this->enderecoModel->listarTipos();
    }
}