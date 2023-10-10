<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include_once(__DIR__ . "/../../controller/ClubeController.php");
include_once(__DIR__ . "/../../controller/MarcaController.php");
include_once(__DIR__ . "/../include/header.php");

$clubeCont = new ClubeController();
$clubes = $clubeCont->listar();
$marcaCont = new MarcaController();
$marcas = $marcaCont->listar();
?>
<h2><?php echo (!$camisa || $camisa->getId() <= 0 ? 'Inserir' : 'Alterar') ?> Camisa</h2>
<div class="row">
<div class="col-6">

<form id="frmCamisa" method="POST">
    <div class="form-group">
    <label for="txtNome" class="form-label">Nome: </label><br>
    <input type="text" class="form-control col-" name="nome" id="txtNome" value="<?php echo $camisa ? $camisa->getNome() : ""?>"><br>
    </div>

    <div class="form-group">
    <label for="selClube" class="form-label">Clube: </label><br>
    <select name="clube" class="form-control" id="selClube">
        <option value="">Selecione</option>
        <?php foreach($clubes as $clube): ?>
                        <option value="<?= $clube->getId(); ?>"
                            <?php 
                                if($camisa && $camisa->getClube() && 
                                    $camisa->getClube()->getId() == $clube->getId())
                                    echo 'selected';
                            ?>
                        >
                            <?= $clube->getNome(); ?>
                        </option>
                    <?php endforeach; ?>
    </select><br>
    </div>

    <div class="form-group">
    <label for="selMarca" class="form-label">Marca: </label><br>
    <select name="marca" class="form-control" id="selMarca">
        <option value="">Selecione</option>
        <?php foreach($marcas as $marca): ?>
                        <option value="<?= $marca->getId(); ?>"
                            <?php 
                                if($camisa && $camisa->getMarca() && 
                                    $camisa->getMarca()->getId() == $marca->getId())
                                    echo 'selected';
                            ?>
                        >
                            <?= $marca->getNome(); ?>
                        </option>
                    <?php endforeach; ?>
    </select><br>
    </div>
</div>
    <div class="col-6">

    

    

    <div class="form-group">
    <label for="selSexo" class="form-label">Sexo: </label><br>
    <select name="sexo" class="form-control" id="selSexo">
        <option value="">Selecione</option>
        <option value="M"
        <?php 
            if($camisa && $camisa->getSexo() && 
            $camisa->getSexo() == "M")
            echo 'selected';
                            ?>
        >Masculino</option>
        <option value="F"
        <?php 
            if($camisa && $camisa->getSexo() && 
            $camisa->getSexo() == "F")
            echo 'selected';
                            ?>
        >Feminino</option>
        <option value="U"
        <?php 
            if($camisa && $camisa->getSexo() && 
            $camisa->getSexo() == "U")
            echo 'selected';
                            ?>>Unisex</option>
    </select><br>
    </div>

    <div class="form-group">
    <label for="txtPreco" class="form-label">Preco: </label><br>
    <input type="number" class="form-control" name="preco" id="txtPreco" value="<?php echo $camisa ? $camisa->getPreco() : ""?>"><br>
    </div>
    
    </div>
    <input type="hidden" name="id" 
                value="<?php echo ($camisa ? $camisa->getId() : 0); ?>" />
            
            <input type="hidden" name="submetido" value="1" />

            <button type="submit" class="btn btn-primary col-2 m-4">Gravar</button>
            <button type="reset" class="btn btn-danger col-2 m-4">Limpar</button>
</form>
</div>
<?php if($msgErro): ?>
            <div class="alert alert-danger">
                <?php echo $msgErro; ?>
            </div>
        <?php endif; ?> 
<?php require_once(__DIR__ . "/../include/footer.php")?>