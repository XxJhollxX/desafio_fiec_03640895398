<?php

require_once '../Model/Endereco.php';
require_once '../Model/Cliente.php';
require_once '../Model/ClienteModel.php';

if(isset($_POST['id']) && isset($_POST['acao'])) {
    session_start();

    $acao = $_POST['acao'];
    $id = $_POST['id'];

    if ($acao == 'deletar') {
        $controler = new ClienteController;
        $deletou = $controler->deletarCliente($id);

        if ($deletou) {
            $_SESSION["mensagemCliente"] = 'Cliente com id = '. $id . ' deletado com sucesso.';
        } else {
            $_SESSION["mensagemCliente"] = 'Erro ao deletar o cliente com o id'. $id . '.';
        }

        header('Content-type: application/json');
        $encoded = json_encode($id);
        exit($encoded);
    } elseif ($acao == 'endereco') {
        $json = Endereco::ws_fiec($id);
        header('Content-type: application/json');
        exit($json);
    }
}

class ClienteController {
    private $cliente;
    private $clienteModel;

    public function __construct() {
        $this->clienteModel = new ClienteModel();
    }

    public function listarClientes() {
        return $this->clienteModel->listar();
    }

    public function listarClientesPorIdadeVogais() {
        return $this->clienteModel->listarIdadeVogais();
    }

    public function listarClientesPorIdadeConsoante() {
        return $this->clienteModel->listarIdadeConsoantes();
    }

    public function buscarCliente($id) {
        return $this->clienteModel->buscar($id);
    }

    public function deletarCliente($id) {
        return $this->clienteModel->excluir($id);
    }
}