<?php 
//Página view para listagem de alunos
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once(__DIR__ . "/../../controller/CamisaController.php");

$camisaCont = new CamisaController();
$camisa = $camisaCont->listar();
?>

<?php 
require(__DIR__ . "/../include/header.php");
?>

<h4>Listagem de camisa</h4>

<div>
    <a href="inserir.php" class="btn btn-primary">Inserir</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Clube</th>
            <th>Marca</th>
            <th>Preco</th>
            <th>Sexo</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($camisa as $c): ?>
            <tr>
                <td><?= $c->getNome(); ?></td>
                <td><?= $c->getClube(); ?></td>
                <td><?= $c->getMarca(); ?></td>
                <td>R$<?= $c->getPreco(); ?></td>
                <td><?= $c->getSexoTexto(); ?></td>
                <td><a href="alterar.php?idCamisa=<?= $c->getId() ?>"> 
                        <img style="max-width: 25px; height:auto;" src="../../img/btn_editar.png" alt=""> 
                    </a>
                </td>
                <td><a href="excluir.php?idCamisa=<?= $c->getId() ?>"
                       onclick="return confirm('Confirma a exclusão?');" > 
                       <img style="max-width: 25px; height:auto;" src="../../img/btn_exluir.png" alt="">
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?php 
require(__DIR__ . "/../include/footer.php");
?>