<?php require_once '../Controllers/EnderecoController.php'; ?>
<?php include('header.php'); ?>

<?php 
    $controller = new EnderecoController();
    $tipos = $controller->listarTiposEndereco();
?>

<br />
<div class="row">
    <div class="col-sm-6">
    <h2>Endereço</h2>			
    </div>
</div>

<form method="post" class="mx-auto highlight" style="width:60%;" action="../Controllers/EnderecoController.php">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="cep">CEP</label>
            <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP" required>
        </div>
        <div class="form-group col-md-6">
            <label for="tipo">Tipo</label>
            <select id="tipo" name=tipo class="custom-select" required>
                <option value="">Selecione um tipo</option>
                <?php foreach ($tipos as $tipo): ?>
                    <option value="<?= $tipo['id'] ?>"><?= $tipo['tipo'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-10">
            <label for="logradouro">Rua</label>
            <input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="rua" disabled>
        </div>
        <div class="form-group col-md-2">
            <label for="numero">Número</label>
            <input type="text" class="form-control" id="numero" name="numero" placeholder="numero" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="bairro">Bairro</label>
            <input type="text" class="form-control" id="bairro" name="bairro" placeholder="bairro" disabled>
        </div>
        <div class="form-group col-md-4">
            <label for="localidade">Cidade</label>
            <input type="text" class="form-control" id="localidade" name="localidade" placeholder="localidade" disabled>
        </div>
        <div class="form-group col-md-2">
            <label for="uf">UF</label>
            <input type="text" class="form-control" id="uf" name="uf" placeholder="uf" disabled>
        </div>
    </div>
    <hr class="separator">

    <div class="row">
        <div class="col-sm-8">							
        </div>
        <div class="col-sm-4 text-right h2">		    	
            <button type="submit" class="btn btn-primary">Salvar</button>	    
        </div>
    </div>
</form>

<?php include('footer.php'); ?>

<script>
    $(document).ready(()=>{
        $('#cep')
            .mask('00000-000')
            .focusout(()=>{
                var cep = $('#cep');
                console.log('cep', 'buscando CEP.');

                endereco(cep.unmask().val());
                cep.mask('00000-000');
            });
    });

    function endereco(cep) {

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '../Controllers/ClienteController.php',
            async: true,
            data: `id=${cep}&acao=endereco`,
            success: (response)=>{
                if (response["erro"] != null && response.erro == true) {
                    limpaDados()
                } else {
                    carregaDados(response);
                }
            }
        });
        return false;
    }

    function carregaDados(resp) {
        $('#logradouro').val(resp.logradouro);
        $('#bairro').val(resp.bairro);
        $('#localidade').val(resp.localidade);
        $('#uf').val(resp.uf);
    }
    function limpaDados() {
        $('#logradouro').val('');
        $('#bairro').val('');
        $('#localidade').val('');
        $('#uf').val('');
    }
</script>