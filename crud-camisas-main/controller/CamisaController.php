<?php 

require_once(__DIR__ . "/../dao/CamisaDAO.php");
require_once(__DIR__ . "/../model/Camisa.php");
require_once(__DIR__ . "/../service/CamisaService.php");

class CamisaController {

    private $camisaDAO;
    private $camisaService;

    public function __construct() {
        $this->camisaDAO = new CamisaDAO();        
        $this->camisaService = new CamisaService();
    }

    public function listar() {
        return $this->camisaDAO->list();        
    }

    public function atualizar(Camisa $camisa){
        $erros = $this->camisaService->validarDados($camisa);
        if($erros){return $erros;}
        
        
        $this->camisaDAO->update($camisa);
        return array();
        
    }

    public function excluirPorId(int $id){
        return $this->camisaDAO->deleteById($id);
    }

    public function buscarPorId(int $id) {
        return $this->camisaDAO->findById($id);
    }

    public function inserir(Camisa $camisa) {
        //Valida e retorna os erros caso existam
        $erros = $this->camisaService->validarDados($camisa);
        if($erros) 
            return $erros;

        //Persiste o objeto e retorna um array vazio
        $this->camisaDAO->insert($camisa);
        return array();
    }
}