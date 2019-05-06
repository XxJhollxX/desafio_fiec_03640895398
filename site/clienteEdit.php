<?php include('header.php'); ?>

<?php 
    if(isset($_SESSION["endereco"])) {
        //unset($_SESSION["endereco"]);
        //var_dump($_SESSION["endereco"]);
    } 
?>

<br />
<div class="row">
    <div class="col-sm-6">
    <h2>Clientes</h2>			
    </div>
</div>

<form class="mx-auto highlight" style="width:60%;" action="">
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" placeholder="Nome">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="cpf">CPF</label>
            <input type="email" class="form-control" id="cpf" placeholder="cpf">
        </div>
        <div class="form-group col-md-6">
            <label for="Nascimento">Nascimento</label>
            <input type="text" class="form-control" id="Nascimento" placeholder="Nascimento">
        </div>
    </div>
    <hr class="separator">
    <?php 
        if(isset($_SESSION["endereco"])) {
            foreach ($_SESSION["endereco"] as $endereco) {
                echo "<br />";
                echo "<div class='alert alert-secondary alert-dismissible text-center fade show mx-auto' role='alert' style='width:50%'>";
                echo $endereco['cep'] . '<->' . $endereco['tipo'] . '<->' . $endereco['numero'];
                echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
                echo "<span aria-hidden='true'>&times;</span>";
                echo "</button>";
                echo "</div>";
            }
        }
    ?>
    <hr class="separator">
    <div class="row">
        <div class="col-sm-8">							
        </div>
        <div class="col-sm-2 text-right h2">
            <a class="btn btn-dark" href="enderecoEdit.php">Endereco</a>	    
        </div>
        <div class="col-sm-2 text-right h2">		    	
            <button type="submit" class="btn btn-primary">Salvar</button>	    
        </div>
    </div>
</form>

<?php include('footer.php'); ?>