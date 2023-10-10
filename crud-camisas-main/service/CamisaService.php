<?php 

require_once(__DIR__ . "/../model/Camisa.php");

class CamisaService {

    public function validarDados(Camisa $camisa) {
        $erros = array();
        
        if(! $camisa->getNome()) {
            array_push($erros, "Informe o nome!");
        }else if(strlen($camisa ->getNome()) > 40) array_push($erros, "Nome n~ao pode ser maior que 40 caracteres");

        if(! $camisa->getClube()) {
            array_push($erros, "Informe o clube!");
        }

        if(! $camisa->getMarca()) {
            array_push($erros, "Informe a marca!");
        }

        if(! $camisa->getSexo()) {
            array_push($erros, "Informe o sexo!");
        }
        

        if(! $camisa->getPreco()) {
            array_push($erros, "Informe o preco!");
        }else if(is_numeric($camisa->getPreco()) == false){
            array_push($erros, "Valor do preco deve ser numerico!");
        }
        return $erros;
    }

}