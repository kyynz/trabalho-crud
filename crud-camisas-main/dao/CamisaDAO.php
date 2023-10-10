<?php

include_once(__DIR__ . "/../util/Connection.php");
include_once(__DIR__ . "/../model/Clube.php");
include_once(__DIR__ . "/../model/Marca.php");
include_once(__DIR__ . "/../model/Camisa.php");
class CamisaDAO{
    private $conn;

    public function __construct()
    {
        $this->conn = Connection::getConnection();
    }

    public function list() {
        $sql = "SELECT c.*," . 
                " m.nome AS nome_marca, clu.nome AS nome_clube" . 
                " FROM camisas c" .
                " JOIN marcas m ON (m.id = c.id_marca) JOIN clubes clu ON (clu.id = c.id_clube)" .
                " ORDER BY c.nome";
        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        return $this->mapBancoParaObjeto($result);
    }

    public function insert(Camisa $camisa) {
        $sql = "INSERT INTO camisas" . 
                " (nome, id_clube, id_marca, preco, sexo)" .
                " VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$camisa->getNome(), 
                        $camisa->getClube()->getId(),
                        $camisa->getMarca()->getId(),
                        $camisa->getPreco(),
                        $camisa->getSexo()]);
    }

    public function update(Camisa $camisa) {
        $conn = Connection::getConnection();

        $sql = "UPDATE camisas SET nome = ?, id_clube = ?,". 
            " id_marca = ?, preco = ?, sexo = ?".
            " WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$camisa->getNome(), $camisa->getClube()->getId(), 
                        $camisa->getMarca()->getId(), $camisa->getPreco(),
                        $camisa->getSexo(), $camisa->getId()]);
    }

    public function deleteById(int $id) {
        $conn = Connection::getConnection();

        $sql = "DELETE FROM camisas WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
    }

    public function findById(int $id) {
        $conn = Connection::getConnection();

        $sql = "SELECT c.*," . 
        " m.nome AS nome_marca, clu.nome AS nome_clube" . 
        " FROM camisas c" .
        " JOIN marcas m ON (m.id = c.id_marca) JOIN clubes clu ON (clu.id = c.id_clube)" .
                " WHERE c.id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll();

        //Criar o objeto Aluno
        $camisas = $this->mapBancoParaObjeto($result);

        if(count($camisas) == 1)
            return $camisas[0];
        elseif(count($camisas) == 0)
            return null;

        die("CamisaDAO.findById - Erro: mais de uma camisa".
                " encontrada para o ID " . $id);
    }

    private function mapBancoParaObjeto($result) {
        $camisas = array();

        foreach($result as $reg) {
            $camisa = new Camisa();
            $camisa->setId($reg['id'])
                ->setNome($reg['nome']);
            $clube = new Clube();
            $clube->setId($reg['id_clube'])
                        ->setNome($reg['nome_clube']);
            $camisa->setClube($clube);
            $marca = new Marca();
            $marca->setId($reg['id_marca'])
                ->setNome($reg['nome_marca']);
            $camisa->setMarca($marca)
                    ->setPreco($reg["preco"])
                    ->setSexo($reg["sexo"]);
            ;
            array_push($camisas, $camisa);
        }

        return $camisas;
    }
}