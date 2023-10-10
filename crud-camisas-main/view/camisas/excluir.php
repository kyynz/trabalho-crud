<?php

require_once(__DIR__ . '/../../controller/CamisaController.php');

//Receber o parâmetro
$idCamisa = 0;
if(isset($_GET['idCamisa']))
    $idCamisa = $_GET['idCamisa'];

$camisaCont = new CamisaController();   
$camisa = $camisaCont->buscarPorId($idCamisa); 

if(! $camisa) {
    echo "Camisa não encontrada!<br>";
    echo "<a href='listar.php'>Voltar</a>";
    exit;
}

$camisaCont->excluirPorId($camisa->getId());

//Redirecionar para a listar
header("location: listar.php");