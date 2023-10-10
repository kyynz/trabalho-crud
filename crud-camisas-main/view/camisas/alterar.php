<?php 

require_once(__DIR__ . "/../../controller/CamisaController.php");
require_once(__DIR__ . "/../../model/Camisa.php");
require_once(__DIR__ . "/../../model/Marca.php");
require_once(__DIR__ . "/../../model/Clube.php");

$msgErro = '';
$camisa = null;

$camisaCont = new CamisaController();

if(isset($_POST['submetido'])) {
    $nome = trim($_POST['nome']) ? trim($_POST['nome']) : null;
    $idClube = is_numeric($_POST['clube']) ? $_POST['clube'] : null;
    $idMarca = is_numeric($_POST['marca']) ? $_POST['marca'] : null;
    $sexo = trim($_POST['sexo']) ? trim($_POST['sexo']) : null;
    $preco = is_numeric($_POST['preco']) ? $_POST['preco'] : null;
    
    $idCamisa = $_POST['id'];
    //para persistencia
    $camisa = new Camisa();
    $camisa->setId($idCamisa);
    $camisa->setNome($nome);
    if($idClube) {
        $clube = new Clube();
        $clube->setId($idClube);
        $camisa->setClube($clube);
    }
    if($idMarca) {
        $marca = new Marca();
        $marca->setId($idMarca);
        $camisa->setMarca($marca);
    }
    $camisa->setPreco($preco);
    $camisa->setSexo($sexo);
    $camisaCont = new CamisaController();
    $erros = $camisaCont->atualizar($camisa);

    if(! $erros) { //Caso não tenha erros
        //Redirecionar para o listar
        header("location: listar.php");
        exit;
    } else { //Em caso de erros, exibí-los
        $msgErro = implode("<br>", $erros);
        //print_r($erros);
    }


} else {
    //Usuário apenas entrou na página para alterar
    $idCamisa = 0;
    if(isset($_GET['idCamisa']))
        $idCamisa = $_GET['idCamisa'];
    
    $camisa = $camisaCont->buscarPorId($idCamisa);
    if(! $camisa) {
        echo "Camisa não encontrada!<br>";
        echo "<a href='listar.php'>Voltar</a>";
        exit;
    }

}

//Inclui o formulário
include_once(__DIR__ . "/form.php");