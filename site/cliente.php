<?php require_once '../Controllers/ClienteController.php'; ?>
<?php include('header.php'); ?>

<?php 
    if (isset($_SESSION["mensagemCliente"])) {
        echo "<br />";
        echo "<div class='alert alert-secondary alert-dismissible text-center fade show mx-auto' role='alert' style='width:50%'>";
        echo $_SESSION["mensagemCliente"];
        echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        echo "<span aria-hidden='true'>&times;</span>";
        echo "</button>";
        echo "</div>";
        
        unset($_SESSION["mensagemCliente"]);
    }
    $controller = new ClienteController();
    if (isset($_GET["tipo"]) && $_GET["tipo"] == 1) {
        $clientes = $controller->listarClientesPorIdadeVogais();
    } elseif (isset($_GET["tipo"]) && $_GET["tipo"] == 2) {
        $clientes = $controller->listarClientesPorIdadeConsoante();
    } else {
        $clientes = $controller->listarClientes();
    }
    
?>

<br />
<div class="row">
    <div class="col-sm-6">				
        <h2>Clientes</h2>			
    </div>
    <form class="col-md-4">
        <!-- <label for="tipo">Tipo</label> -->
        <select id="tipo" name=tipo class="custom-select" onchange="this.form.submit()">
            <option value="">Selecione um tipo</option>
            <option value="0">Todos</option>
            <option value="1">Maior idade e iniciado por vogal</option>
            <option value="2">Menor idade e iniciado por consoante</option>
        </select>
    </form>
    <div class="col-sm-2 text-right h2">		    	
        <a class="btn btn-primary" href="clienteEdit.php"><i class="fa fa-plus"></i> Novo Cliente</a>	    
    </div>
</div>

<table class="table table-striped table-bordered table-hover text-center">
    <thead>
        <th>Id</th>
        <th width="30%">Nome</th>
        <th>CPF</th>
        <th>Nascimento</th>
        <th>Opções</th>
    </thead>
    <tbody>
        <?php if(!$clientes) : ?>
            <td colspan="4">Nenhum registro encontrado.</td>
        <?php else: ?>
            <?php foreach($clientes as $cliente): ?>
                <tr>
                    <td><?php echo $cliente->getId(); ?></td>
                    <td><?php echo $cliente->getNome(); ?></td>
                    <td><?php echo $cliente->getCPF(); ?></td>
                    <td><?php echo $cliente->getDataNasc(); ?></td>
                    <td class="actions">
                        <a href="clienteEdit.php?cliente=<?= $cliente->getId(); ?>" class="btn btn-dark">Alterar</a>
                        <a href="#" class="btn btn-danger" onclick="deletarModal('<?php echo $cliente->getId(); ?>');">Excluir</a>
                    </td> 
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<?php include('footer.php'); ?>

<script>
    function deletarModal(id) {
        console.log('id', id);
        $('.modal-sm-info-sys .modal-content').html( ()=>{
            return `<div class="modal-header">
                        <h5 class="modal-title">Excluir Cliente</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-header">
                        <p>Deseja realmente deletar o cliente?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                        <button type="button" class="btn btn-primary" onclick=deletar("${id}");>Sim</button>
                    </div>`;
        });

        $('.modal-sm-info-sys').modal();
    }

    function deletar(id) {
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '../Controllers/ClienteController.php',
            async: true,
            data: `id=${id}&acao=deletar`,
            success: (response)=>{
                console.log('a', response);
                if (id === response)
                    location.reload();
                //else tratar erro.
            }
        });
        return false;
    }
</script>